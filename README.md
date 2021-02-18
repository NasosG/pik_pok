# [pik-pok](https://pikpoksocial.000webhostapp.com/index.php)

Pik-Pok (https://pikpoksocial.000webhostapp.com/index.php) started as an educational project. The main idea was to demonstrate how one can build from scratch a large scalable but most of all safe social network mostly with php. Pik Pok is a social media platform for creating, sharing and discovering photos, think Tik-Tok but for photos. The app can be used by people as an outlet to express themselves and their stories through their photos and albums.

## Download and Installation

You can download the files from https://github.com/NasosG/pik_pok. 
<br>We used XAMPP locally, so we installed it under xampp/htdocs folder and we made a mysql database (we named the database pik_pok).
All the tables of the database are in sql_db folder. `pik_pok_whole_db.sql` contains the whole database where `pik_pok.sql`contains only the tables of the database.

1. Open PHPMyAdmin & import `pik_pok_whole_db.sql` 
<br><b>or</b>
<br>open PHPMyAdmin, create your own database & import `pik_pok.sql`. 

2. Open `db/db.php` & fill up your host, username, password and database name 
for example: $dbhost = "localhost", $dbuser = "root", $dbpass = "", $db = "pik_pok"; but of course it's better to use another username and a stronger password for security reasons
3. Enjoy!!

## Requirements

1. PHP version 7.0 or later.

## Bugs and Issues

Have a bug or an issue with this project? Send an email at gnasos219@gmail.com


## Copyright and License

Copyright 2021 **[GNU General Public License v3.0 license](https://opensource.org/licenses/GPL-3.0)**


## Copyright claims
Some images that got posted and used in the project for testing purposes belong to their respective creators. No claim by us & those who use this project!!

**Thanks for reading**




