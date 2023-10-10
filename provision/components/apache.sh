#!/bin/bash

apt-get update
apt-get install -y apache2

cp /var/www/provision/config/apache/vhosts/chatgpt-assignment-1.local.conf /etc/apache2/sites-available/chatgpt-assignment-1.local.conf

a2dissite 000-default
a2ensite chatgpt-assignment-1.local.conf
a2enmod rewrite

service apache2 restart
