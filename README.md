<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Contents

<!-- toc -->

- [Start Server](#start-server)
- [Dependencies](#dependencies)
- [Generate Dummy Data](#generate-dummy-data)
- [Artisan Commands](#artisan-commands)
- [Schedule Commands](#schedule-commands)
- [Tests](#tests)

<!-- tocstop -->

## Start Server

- To start Laravel application server, run the below command in code repository.
```
    nohup php artisan serve --port=8081 &
```
Here, nohup is used just to run the server in background


- Copy ```.env.example file to .env```

##Dependencies

First you will need to install all dependencies, to do this simply run the following command in code repo

```
composer install
```
## Generate Dummy Data

```
php artisan migrate

php artisan db:seed
```

## Artisan Commands
- Generate dummy data in every minute
```
    php artisan generate:ticket
```

  - Process ticket in every 5 minutes
```
    php artisan generate:ticket
```

## Schedule Commands

The above artisan commands are schedule. Just to run the scheduler run below commands.

``nohup php artisan schedule:work``

##Tests
```
php vendor/bin/phpunit
```

While inside the VM in either the root or the `./api` directory.

##### PHPUnit flags
-  `--stop-on-failure`, stop execution upon first error or failure (`F` or `E`)
-  `--filter <test class name>`, run all tests within a test class
-  `--filter <tests method name>`, run a single test
-  `--coverage-html build/coverage`, run full test suite and generate full coverage report as HTML format. Coverage reports will be generated at `/build.coverage`. Simply open the `index.html` file in preferred web browser.
-  `--coverage-html build/coverage --filter <test class name>`, generate coverage report for a single test class
-  `--exclude-group smoke` used to exclude external `smoke` group tests
