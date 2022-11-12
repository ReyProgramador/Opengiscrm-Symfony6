# OpenGisCRM Symfony 6 Version
Manage your clients and leads with an Open Source Gis CRM Software.

## Starting 🚀

_These instructions will allow you to get a copy of the project running on your local machine for development and testing purposes._

## Demo Web-App :movie_camera: 


* [Demo Symfony 6](https://www.youtube.com/watch?v=nDQmo14mxuk)

### Pre-requirements 📋

- PHP 8.1 >=
- PostgreSQL (Or MySQL)
- [Composer](https://getcomposer.org/)

## Additional details on dependencies

Assuming you're running Ubuntu, and then install all dependencies from the following list:

sudo apt-get install php8.1 php8.1-pgsql php8.1-mysql php8.1-intl php8.1-json php8.1-mbstring

## Installation

The following steps are meant to be used on a development server.


- Clone Project

```bash
$ git clone https://github.com/jonathanc/opengiscrm-symfony6.git
``` 
- Setup vendor libraries 

```bash
$ composer install
```
- Run server 

```bash
$ symfony server:start
```
- Create Database and Run migrations

```bash
$ php bin/console doctrine:database:create
```

```bash
$ php bin/console make:migration  
```

```bash
$ php bin/console doctrine:migrations:migrate  
```

- Run fixtures

```bash
$ php bin/console doctrine:fixtures:load 
```

## Access Web-App:

_Admin: youremail@yourdomain.com

## Technologies 🛠️

* [Symfony v4.2.10](https://codeigniter.com/user_guide/index.html) 

## Courses :movie_camera: 

* [Youtube](https://www.youtube.com/channel/UCh7tHVI7ZmqJbJmpPlvl7HQ)
* [Udemy](https://www.udemy.com/course/codeigniter-4-desarrollando-en-linux/?referralCode=9607DCD14D42AE5C29F9)    

## Author ✒️

* **Jonathan Castro** - *Web Developer* - [jonathancastrodeveloper](https://github.com/jonathancastrodeveloper)

## Contact :telephone_receiver:

* [Discord](https://discord.gg/hzgXcPxkmq)

## Contact :mailbox:

_jonathancastro@opengiscrm.com_

## Donations 🎁

* [Paypal](https://paypal.me/joncastroweb?locale.x=es_XC) - Thank you very much for your contribution.
