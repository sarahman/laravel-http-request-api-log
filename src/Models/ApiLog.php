<?php

namespace Sarahman\HttpRequestApiLog\Models;

use Illuminate\Database\Eloquent\Model;
use Sarahman\HttpRequestApiLog\Helper;

/**
 * This model deals with Http API calls logging.
 *
 * @property int                 $id
 * @property string              $client
 * @property string              $method
 * @property string              $endpoint
 * @property string              $params
 * @property int|null            $response_code
 * @property string|null         $response
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 */
class ApiLog extends Model
{
    /**
     * @inheritDoc
     */
    protected $guarded = [];

    public function __construct(array $attributes = [])
    {
        $config = Helper::getConfig();

        isset($this->connection) || $this->setConnection($config['database_connection']);
        isset($this->table) || $this->setTable($config['table_name']);

        parent::__construct($attributes);
    }

    /**
     * @inheritDoc
     */
    protected static function boot()
    {
        parent::boot();

        self::creating(function (self $model) {
            $model->method = strtoupper($model->method);
            $model->params = json_encode($model->params);
        });
    }
}
