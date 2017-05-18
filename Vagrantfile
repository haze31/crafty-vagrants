# Replace mycraftproject.dev with the domain you want use for your Craft test site
domain = "mycraftproject.dev"

Vagrant.configure("2") do |config|
	# Create a machine based on Debian Jessie and run setup.sh
	config.vm.box = "debian/jessie64"
	config.vm.provision :shell, path: "setup.sh"

	config.vm.provider :virtualbox do |v|
		v.name = domain
		v.customize ["modifyvm", :id, "--audio", "none"]

		# Set CPU and memory to mimic the lowest configuration on DigitalOcean
		v.memory = 512
		v.cpus = 1
	end

	config.ssh.forward_agent = true

	# Assign an IP address and .dev domain for hostsupdater to use
	## Change the subnet if you're running more than one virtual machine at once
	config.vm.network :private_network, ip: "192.168.50.5"
	config.vm.hostname = domain

	# Sync folders
	## Not necessary to sync the root folder
	config.vm.synced_folder '.', '/vagrant', disabled: true
	## Sync the conf directory so that setup.sh can update Nginx server configuration
	config.vm.synced_folder "conf/", "/home/vagrant/conf"
	## Sync the craft directory
	config.vm.synced_folder "craft/", "/var/www/craft", :create => true, :group => "www-data", :owner => "www-data", :mount_options => [ "dmode=775", "fmode=774" ]
end
