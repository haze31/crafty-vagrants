#!/bin/bash

# Prepare to install software
apt-get install -y dirmngr gnupg2 software-properties-common
apt-key adv --recv-keys --keyserver keyserver.ubuntu.com 0xF1656F24C74CD1D8
add-apt-repository 'deb [arch=amd64] http://nyc2.mirrors.digitalocean.com/mariadb/repo/10.2/debian stretch main'

# Update package list and install software
apt-get update
debconf-set-selections <<< "mariadb-server-10.2 mysql-server/root_password password craftpwd"
debconf-set-selections <<< "mariadb-server-10.2 mysql-server/root_password_again password craftpwd"
apt-get install -y curl mariadb-server nginx php7.0-curl php7.0-fpm php7.0-imagick php7.0-mbstring php7.0-mysql php7.0-xml php7.0-zip

# Create Craft database
mysql -u root -pcraftpwd -e "CREATE DATABASE craftdb;"
mysql -u root -pcraftpwd -e "GRANT ALL ON craftdb.* TO 'craftusr'@'localhost' IDENTIFIED BY 'craftpwd';"
mysql -u root -pcraftpwd -e "FLUSH PRIVILEGES;"

# Increase upload limit for Nginx and update server configuration
sed -i 's/http {/http { client_max_body_size 15m;/g' /etc/nginx/nginx.conf
sed -i 's/sendfile on/sendfile off/g' /etc/nginx/nginx.conf
cp conf/default /etc/nginx/sites-available/default
systemctl restart nginx

# Increase upload and memory limits for PHP
sed -i 's/post_max_size = 8M/post_max_size = 60M/g' /etc/php/7.0/fpm/php.ini
sed -i 's/upload_max_filesize = 2M/upload_max_filesize = 15M/g' /etc/php/7.0/fpm/php.ini
sed -i 's/memory_limit = 128M/memory_limit = 256M/g' /etc/php/7.0/fpm/php.ini
systemctl restart php7.0-fpm

# Download and install Composer
curl -sS https://getcomposer.org/installer -o composer-setup.php
php composer-setup.php --install-dir=/usr/local/bin --filename=composer

# Download and install Craft
composer create-project craftcms/craft /var/www/craft -s beta
cp /var/www/craft/config/db.php /var/www/craft/config/db-old.php
cp conf/db.php /var/www/craft/config/db.php

# Assign ownership of craft directory to www-data (Nginx)
usermod -aG www-data vagrant
chown -R vagrant:www-data /var/www/craft
