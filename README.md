<h1 align="center">Yay</h1>
<h2 align="center">A social network made in Laravel</h2>

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites
 - composer
 - npm or yarn
 - mysql

### Installing

A step by step series of examples that tell you how to get a development env running

Cloning project and installing packages

```
https://github.com/seapvnk/yay.git
cd yay
npm i
composer install
```

Creating the project database

```
sudo systemctl start mysql
sudo mysql -u root p

# mariadb console
sudo mysql -u root -p
create database yay character set utf8mb4 collate utf8mb4_unicode_ci;
```
then fill your .env file like this:
```
...
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=yay
DB_USERNAME=root
DB_PASSWORD=123
```

after setup the database run the migrations and seed the dabatase
```
php artisan migrate
php artisan db:seed
```

Now serve the project in localhost
```
php artisan serve
```

## Built With

* [Laravel](https://laravel.com/) - The web framework used
* [Composer](https://getcomposer.org/) - Dependency Management

## Authors

* **Pedro Sérgio** - *Initial work* - [seapvnk](https://github.com/seapvnk)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

