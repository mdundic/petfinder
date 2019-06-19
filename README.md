# PetFinder #

Service for lost and found pets

## Environment

- PHP 7.3
- Laravel 5.8
- Postgres 11.3

## Prerequisites

Docker

https://docs.docker.com/engine/installation/

Docker-compose

https://docs.docker.com/v1.11/compose/install/

##### Note: you should be able to run docker without sudo

## Installation

Clone the project
```
$ git clone git@github.com:mdundic/petfinder.git
$ cd petfinder
```

Setup the laravel env
```
$ cp .env.example .env
```

Build the docker environment
```
$ docker-compose up -d
```

Install composer dependencies
```
$ docker exec -it petfinder-web composer install
```

Run laravel migration
```
$ docker exec -it petfinder-web php artisan migrate
```

## Usage

Access the laravel app on your local machine

http://localhost
