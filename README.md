# My ToGo List
[![](https://img.shields.io/badge/version-1.0.0-green.svg)](https://github.com/alkhachatryan/accontech/releases/tag/1.0.0) [![](https://img.shields.io/badge/license-MIT-green.svg)](https://github.com/alkhachatryan/accontech/blob/master/LICENSE)

------------

Create and manage the places list. This application has the following features:
- Creating new place;
- Editing the place;
- Single and group removal of places;
- Autofill of fields by clicking on Google Map. Getting information such as Country, City, Address and coordinates;
- Fill the coordinates and the system will show the place on Google map;
-Filtering of places list;
- The resources (places) are protected and only owner can edit / remove the place;

## Server Requirement
- PHP >= 7.1.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Ctype PHP Extension
- JSON PHP Extension

## Installation
It is expected that the Composer program is installed.

For first download and install the repo:
```bash
git clone https://github.com/alkhachatryan/accontech.git
cd accontech
composer install
```

Once the installation is complete, create a DB, re-name **.env.example** to **.env**, and give the DB settings in this file. When you done, migrate the DB,  generate a secret APP key and finally run the APP
```bash
php artisan migrate
php artisan key:generate
php artisan serve
```


## About application
This application uses ready frameworks and libraries both in front-end and in back-end. 

In front-end this application uses:
- JavaScript / jQuery/ DybaTable
- CSS / Bootstrap / FontAwesome

In back-end uses:
- PHP / Laravel

It was written as little code as possible for compactness both in front-end and in back-end.

### Author
[![Alexey Khachatryan](https://scontent.fevn1-1.fna.fbcdn.net/v/t1.0-1/p200x200/27072256_2114773238750938_3907997419089800418_n.png?oh=6b7f20e8b19a8ecb2ac0730757ae792d&oe=5B03669E "Alexey Khachatryan")](https://khachatryan.org/ "Alexey Khachatryan")

**Name:** [Alexey Khachatryan](https://github.com/alkhachatryan/ "Alexey Khachatryan")

**Website:** [https://khachatryan.org/](https://khachatryan.org/ "https://khachatryan.org/")



### Demo
You can check a demo of this application

**URL:** [https://places.khachatryan.org](https://places.khachatryan.org "https://places.khachatryan.org")

**Testing user login:** test@example.com

**Testing user password:** testtest11


### License
[MIT](https://github.com/alkhachatryan/accontech/blob/master/LICENSE "MIT")

