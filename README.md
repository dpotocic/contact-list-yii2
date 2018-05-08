# CONTACT LIST

# TABLE OF CONTENT

  1. [Requirements](#requirements)
  2. [Vagrant setup](#vagrant)
  3. [Local env setup](#local)
  4. [Getting started](#start)
  5. [Documentation](#docs)
  6. [Screens](#screens)

[![Yii2](https://img.shields.io/badge/Powered_by-Yii_Framework-green.svg?style=flat)](http://www.yiiframework.com/)

## <a name="requirements"></a>Requirements

Project general requirements are
* [PHP 7.1+](http://php.net/)
* [MySQL 5.x+](http://www.mysql.com/)
* [Composer](https://getcomposer.org/)

## <a name="vagrant"></a>Vagrant server setup instructions

    This repo comes with a full LAMP server used for development.
    You can use your own development server [setup](#local), but the provided Vagrant server setup is recommended since it
    matches the production server's setup.

### Vagrant requirements

   * [Vagrant 1.9.4](http://www.vagrantup.com/) on Win7+ skip 1.9.5 because of bug.
   * [Virtualbox latest](https://www.virtualbox.org/) or some other Vagrant provider
   * Optional: **NFS share** is activated by default for better performance and must me installed on host machine

### Init Vagrant

    1. Map `api.customer-list.loc` domain to local server's IP `127.0.0.1` using your systems `hosts` file
    2. Map `customer-list.loc` domain to local server's IP `127.0.0.1` using your systems `hosts` file
    3. Clone this repo: `git clone git@github.com:dpotocic/contact-list-yii2.git`
    4. Run `vagrant up` from project root (contact-list-yii2) to get the provided Vagrant server up & running

#### Common Vagrant commands

   * `vagrant up` - start server
   * `vagrant halt` - stop server
   * `vagrant ssh` - SSH into server

#### VagrantBox contains

   * Virtual Box Guest Additions 5.1.18
   * Apache httpd 2.4.6
   * MySQL 5.7.18
   * PHP 7.2
   * SSH port is 2222
   * The password of ROOT is: password
   * The password of vagrant is: vagrant
   * The password of ROOT for MySQL is: password

## <a name="local"></a>Local environment setup

    1. Clone this repo: `git clone git@github.com:dpotocic/contact-list-yii2.git`
    2. Move into newly created directory: `cd contact-list-yii2/`
    3. Install dependencies using [Composer](https://getcomposer.org/): `composer install`
    4. Create an Apache VirtualHost and `ServerName api.contact-list.loc:8080` and `DocumentRoot` pointing to [`api/web/`](api/web/)
    5. Create an Apache VirtualHost and `ServerName contact-list.loc:8080` and `DocumentRoot` pointing to [`frontend/web/`](frontend/web/)
    6. Adjust your `hosts` file accordingly

    After cloning the repo and installing Composer dependencies, initialize the app:

    1. Run [`init`](init) ('php init' in vagrant) to initialize the application with dev environment
    2. Apply migrations with `php yii migrate`. This will create tables needed for the application to work

## <a name="start"></a>Getting started

    Your web app is now available:
       * API End Point: http://api.contact-list.loc:8080/
       * Front End: http://contact-list.loc:8080/

## <a name="docs"></a>Swagger API documentation

### Docs
    * [Swagger docs](http://api.contact-list.loc:8080/doc) at api.contact-list.loc:8080/doc

    To generate Swagger API docs in [/api/web/swagger.json](/api/web/swagger.json), run:

    ```
    Unix based
    ./vendor/bin/swagger ./api --output api/web/swagger.json
    Win based
    vendor\bin\swagger.bat ./api --output api/web/swagger.json
    ```

## <a name="screens"></a>Demo screens

    * http://prntscr.com/jelpte
    * http://prntscr.com/jelq0t
    * http://prntscr.com/jelqra