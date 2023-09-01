<?php

return [
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
