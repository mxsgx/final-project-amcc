<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## About This Final Project

_Coming soon_

## Requirements

- PHP 8.1+
- MariaDB 10+ / MySQL 5+

## Setup

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

## Code Formatter

```shell
./vendor/bin/pint
```

## Tests

```shell
./vendor/bin/phpunit
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
