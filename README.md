# ui42 project

## To install this application:

- download zip from this repository
- unzip
- in terminal:
    - composer install

## To run this application locally:

- (manually) create database
- edit .env file and set up connection to the database
- in terminal:
    - php artisan migrate
    - php artisan data:import
    - php artisan serve
- http://127.0.0.1:8000 -> homepage
- http://127.0.0.1:8000/detail/{id} -> city detail
