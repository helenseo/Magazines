# Magazines

A demo app / code sample in ZF2 Zend Framework 2

## Installation

```bash

$ mysql -A -uroot -p

mysql> create database magazines;

mysql> grant all privileges on magazines.* to 'magazines'@'localhost' identified by 'magazines';

mysql> flush privileges;

mysql> exit

$ mysql -uroot -p < install/magazines.sql

$ sudo vi /etc/hosts

# add a line like this to /etc/hosts

127.0.0.1    magazines.local

# the following instructions are ubuntu specific

$ sudo cp install/vhost.conf /etc/apache2/sites-available/magazines.conf

$ cd /etc/apache2/sites-available

$ sudo a2ensite magazines.conf

$ sudo service apache2 reload
```
