# UBCEats.ca 🧀🌭🍕

## Prerequisites

Before getting started with UBCeats you will need PHP7 and composer installed. You will also need a web server. UBCeats works with Apache and the builtin PHP web server out of the box.


## Getting the code

```sh
$ git clone git@github.com:ubceats/foodfoodfood.git
$ cd foodfoodfood
```

## Installing dependencies

 ```sh
 $ composer install
 OR
 $ php path/to/composer.phar install
 ```
 
## Config database connection  
To tell UBCEats how to connect to your database you must create a file called `db.json` in the main project directory. The content should be of the format.

```json
{
  "hostname": "sql.example.com",
  "user": "db_username",
  "password": "password123",
  "dbName": "db_name"
}
```

## Provisioning the database

Upon completion of the project we will upload a final `.sql` file for provisioning the database. 


## Starting the app
If you are using the builtin PHP server, you can do

```sh
$ cd path/to/foodfoodfood
$ php -S localhost:8080 -t public public/index.php
```