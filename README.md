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
    copy .env.example .env
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

2. Run sail
    ```shell
    ./vendor/bin/sail up -d
    ```

Please see [Laravel Sail documentation](https://laravel.com/docs/10.x/sail) for more information.

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
