<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Final Project

_Coming soon_

## Setup

### Local

#### Requirements

- PHP 8.1+
- MariaDB 10+ / MySQL 5+

1. Clone this repository
    ```shell
    git clone https://github.com/mxsgx/final-project-amcc.git
    ```

2. Install dependencies
    ```shell
    composer install
    ```

3. Configure environment
    ```shell
    cp .env.example .env
    ```
    ```shell
    php artisan key:generate
    ```

4. Run migrations and seeder
    ```shell
    php artisan migrate --seed
    ```

5. Run server
    ```shell
    php artisan serve
    ```

### Laravel Sail

#### Requirements

- Docker 24+

1. Clone this repository
    ```shell
    git clone https://github.com/mxsgx/final-project-amcc.git
    ```

2. Install dependencies
    ```shell
    docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest composer install --ignore-platform-reqs
    ```

3. Configure environment
    ```shell
    cp .env.sail .env
    ```
    ```shell
    docker run --rm -u "$(id -u):$(id -g)" -v "$(pwd):/var/www/html" -w /var/www/html laravelsail/php82-composer:latest php artisan key:generate
    ```

4. Run sail
    ```shell
    ./vendor/bin/sail up -d
    ```

5. Run migrations and seeder
    ```shell
    ./vendor/bin/sail artisan migrate:fresh --seed
    ```

Please see [Laravel Sail documentation](https://laravel.com/docs/10.x/sail) for more information.

## Others

### Credentials

- Super Admin (`super.admin@mahaakses.id` / `password`)
- Admin (`admin@mahaakses.id` / `password`)

### URLs

- Admin Dashboard (`http://admin.localhost`)
- Instructor Dashboard (`http://instructor.localhost`)
- Application (`http://localhost`)

## Code Formatter

```shell
./vendor/bin/pint
```

or

```shell
./vendor/bin/sail pint
```

## Tests

```shell
./vendor/bin/phpunit
```

or

```shell
./vendor/bin/sail test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
