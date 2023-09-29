# API Log Activity inside Laravel Application

[![Latest Version on Packagist](https://img.shields.io/packagist/v/sarahman/laravel-http-request-api-log.svg?style=flat-square)](https://packagist.org/packages/sarahman/laravel-http-request-api-log)
[![Build Status](https://img.shields.io/travis/sarahman/laravel-http-request-api-log/master.svg?style=flat-square)](https://travis-ci.org/sarahman/laravel-http-request-api-log)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/sarahman/laravel-http-request-api-log/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/sarahman/laravel-http-request-api-log/?branch=master)
[![StyleCI](https://styleci.io/repos/686139900/shield)](https://styleci.io/repos/686139900)
[![Total Downloads](https://img.shields.io/packagist/dt/sarahman/laravel-http-request-api-log.svg?style=flat-square)](https://packagist.org/packages/sarahman/laravel-http-request-api-log)

The `sarahman/laravel-http-request-api-log` package provides easy to use functionality to log the http api logs in  the `Laravel` application. All the api logs will be stored in the `_api_calls` table.

You can retrieve all api logs using the `Sarahman\HttpRequestApiLog\Models\ApiLog` model.

```php
ApiLog::all();
```

Here's a more advanced example:

```php
...
use Sarahman\HttpRequestApiLog\Traits\WritesHttpLogs;
use Illuminate\Database\Eloquent\Model;

class ApiClient
{
    use LogsActivityWithPivots;
    ...
    ...

    public function __construct()
    {
        ...
        ...
        $this->enableLogging = false;
    }
}
```

## Installation

You can install the package via composer:

``` bash
composer require sarahman/laravel-http-request-api-log
```

Next, you must install the service provider:

```php
// app/config/app.php
'providers' => [
    ...
    Sarahman\HttpRequestApiLog\HttpRequestApiLogServiceProvider::class,
];
```

You can publish the config file with:

```bash
php artisan config:publish sarahman/laravel-http-request-api-log
```

This is the contents of the published config file:

```php
return [
    /*
     * If set to false, no api log will be saved to the database.
     */
    'enabled' => true,

    /*
     * This model will be used to log activity.
     * It should extend Illuminate\Database\Eloquent\Model.
     */
    'api_log_model' => \Sarahman\HttpRequestApiLog\Models\ApiLog::class,

    /*
     * This is the database connection that will be used by the migration and
     * the ApiLog model shipped with this package. In case it's not set
     * Laravel's database.default will be used instead.
     */
    'database_connection' => 'mysql',

    /*
     * This is the name of the table that will be created by the migration and
     * used by the ApiLog model shipped with this package.
     */
    'table_name' => '_api_calls',
];
```

You can publish the migration with:

```bash
php artisan migrate:publish sarahman/laravel-http-request-api-log
```

Now, you can create the `_api_calls` table by running the migrations:

```bash
php artisan migrate
```

**N.B.:** You can disable the api logging to a specific api client using the `enableLogging` property.

## Testing

``` bash
$ composer test
```

## Security

If you discover any security related issues, please email to this <aabid048@gmail.com> address instead of using the issue tracker.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
