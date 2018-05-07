#!/bin/bash
cd /tmp
wget -q http://rpms.remirepo.net/enterprise/remi-release-7.rpm
wget -q https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
rpm -Uvh remi-release-7.rpm epel-release-latest-7.noarch.rpm
yum-config-manager --enable remi-php71
yum install php -y
yum install php-devel
yum install php-pear
yum install gcc gcc-c++ autoconf automake

cd /tmp/
sudo curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

yum install composer -y

sudo yum install php-intl

cd /var/www/html/
/usr/local/bin/composer install

systemctl enable httpd.service
mv /etc/localtime /etc/localtime.bak
ln -s /usr/share/zoneinfo/Europe/Zagreb /etc/localtime

mysql -uroot -ppassword -e "CREATE DATABASE IF NOT EXISTS contact_list"
php /var/www/html/yii migrate --interactive=0
php /var/www/html/yii fixture/generate-all --templatePath=@tests/common/templates --count=10


