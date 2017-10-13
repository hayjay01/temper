# Temper Retention Dashboard
This is a Dashboard to view weekly retention rate of onboarding new users.

## Requirements
* PHP 7.0+
* MySQL
* composer


## Setup
* clone Repository containing the project `git remote add origin git@github.com:superirale/temper.git`
* cd project `cd temper`
* set up MySQL
* Setup Environment variables (check the .env.sample to see the environment variables needed).
* Run `php artisan migrate` to create the database table
* Run `php artisan db:seed` to seed the database

## How to run
Run this command to run the application `php artisan serve` which will launch the application on `http://localhost:3000` and you can also use [nginx](http://nginx.org/en/download.html) or [apache](https://httpd.apache.org/download.cgi) consult [Laravel official documentation](https://laravel.com/docs/5.5/deployment) for configuration.



## ADMIN LOGIN
* email: admin@admin.com
* password: admin2017

#### Note: you must seed the database to get the above login details.


## Contributors
[Irale Usman](https://github.com/superirale)