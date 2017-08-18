# Crafty Vagrants

A simple and lightweight Vagrant machine for **[Craft 3](https://craftcms.com/3)** development within **VirtualBox**.

## Getting Started

1. You will need to already have [Vagrant](https://www.vagrantup.com) and [VirtualBox](https://www.virtualbox.org) installed along with the following Vagrant plugins:
```
$ vagrant plugin install vagrant-hostsupdater
$ vagrant plugin install vagrant-vbguest
```

2. Download or clone this repo.

3. Edit `Vagrantfile` and replace the included `mycraftproject.dev` domain with the one you want to use for your Craft test site.

4. Open Terminal, `cd` into your project directory, and run `vagrant up`.

## Technical Stuff
This is a quick overview of what this Vagrant machine is configured to do. Feel free to modify the `Vagrantfile` and `setup.sh` for your project if needed. They're both commented fairly well.

- Based off of the Debian Stretch box.
- Configured to mimic the lowest configuration for a DigitalOcean droplet. 1 CPU, 512MB RAM.
- Points your .dev domain to a private IP address of `192.168.50.5` in the hosts file.
- Syncs the `conf` directory so that `setup.sh` can update Nginx server and database configuration.
- Creates and syncs the `craft` directory.
- Installs the following packages:
	- `curl`
	- `mariadb-server`
	- `nginx`
	- `php7.0-curl` `php7.0-fpm` `php7.0-imagick` `php7.0-mbstring` `php7.0-mysql` `php7.0-xml` `php7.0-zip`
- Increases upload and memory limits in Nginx and PHP configuration.
- Installs Composer.
- Installs Craft to `/var/www/craft`.
- Fills in database fields for installation.
- Assigns ownership to `www-data`.
