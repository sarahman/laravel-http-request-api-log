<?php

namespace Sarahman\HttpRequestApiLog\Traits;

use Psr\Http\Message\ResponseInterface;
use Sarahman\HttpRequestApiLog\Helper;
use Sarahman\HttpRequestApiLog\Models\ApiLog;

trait WritesHttpLogs
{
    use RemovesUnwantedParams;

    protected $enableLogging = true;

    /**
     * Write HTTP log to the database.
     *
     * @param string            $method   Name of the method
     * @param string            $endpoint Name of the endpoint
     * @param array|null        $params   Request parameters
     * @param ResponseInterface $response Response received
     */
    final protected function log($method, $endpoint, $params, ResponseInterface $response)
    {
        if (!($this->enableLogging && Helper::getConfig('enabled', true))) {
            return;
        }

        $params = (array) $params;

        ApiLog::create([
            'client'        => class_basename($this),
            'method'        => $method,
            'endpoint'      => $endpoint,
            'params'        => $this->removeUnwantedParams($params),
            'response_code' => $response->getStatusCode(),
            'response'      => (string) $response->getBody(),
        ]);
    }
}
