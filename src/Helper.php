<?php

namespace Sarahman\HttpRequestApiLog;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Config;

class Helper
{
    public static function getConfig($configName = null, $default = null)
    {
        $config = version_compare(Application::VERSION, '5.0', '<') ? 'laravel-http-request-api-log::config' : 'http-request-api-log';

        return Config::get($config . ($configName ? '.'.$configName : ''), $default);
    }
}
