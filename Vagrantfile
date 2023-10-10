Vagrant.configure("2") do |config|
    config.vm.box = "jeffnoxon/ubuntu-20.04-arm64"
    config.vm.provider "parallels" do |v|
        v.name = "chatgpt-assignment-1"
        v.memory = 1024
        v.cpus = 1
        v.linked_clone = false
    end
    config.vm.synced_folder ".", "/var/www", mount_options: ["rw", "tcp", "nolock", "noacl", "async"], type: "nfs", nfs_udp: false

    config.vm.define "chatgpt-assignment-1"
    config.vm.hostname = "chatgpt-assignment-1"
    config.vm.network "private_network", ip: "192.168.56.12"

    config.vm.provision :shell, path: "provision/components/apache.sh"
    config.vm.provision :shell, path: "provision/components/php.sh"
    config.vm.provision :shell, path: "provision/components/mysql.sh"

    config.vm.provision "file", source: "provision/aliases", destination: "/tmp/bash_aliases"
    config.vm.provision "shell" do |s|
        s.inline = "awk '{ sub(\"\r$\", \"\"); print }' /tmp/bash_aliases > /home/vagrant/.bash_aliases"
    end

    config.vm.provision :shell, path: "provision/after.sh"
    config.vm.provision :shell, inline: "echo 'cd /var/www' >> /home/vagrant/.profile"
end
