#!/bin/bash

sudo apt-get install software-properties-common
sudo LC_ALL=C.UTF-8 add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install -y php8.2 php8.2-bcmath php8.2-bz2 php8.2-cli php8.2-curl php8.2-intl php-json php8.2-mbstring php8.2-opcache php8.2-soap php8.2-xml php8.2-xsl php8.2-zip libapache2-mod-php8.2 php8.2-mysql php8.2-gd php8.2-imagick

sudo php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
sudo php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer
sudo rm composer-setup.php

composer

sed -i 's/max_execution_time = .*/max_execution_time = 1200/' /etc/php/8.2/apache2/php.ini
sed -i 's/post_max_size = .*/post_max_size = 1024M/' /etc/php/8.2/apache2/php.ini
sed -i 's/upload_max_filesize = .*/upload_max_filesize = 1G/' /etc/php/8.2/apache2/php.ini
sed -i 's/memory_limit = .*/memory_limit = -1/' /etc/php/8.2/apache2/php.ini

sudo /bin/dd if=/dev/zero of=/var/swap.1 bs=1M count=1024
sudo /sbin/mkswap /var/swap.1
sudo /bin/chmod 0600 /var/swap.1
sudo /sbin/swapon /var/swap.1

sudo service apache2 restart
