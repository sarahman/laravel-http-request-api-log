<?php

namespace Sarahman\HttpRequestApiLog\Traits;

trait RemovesUnwantedParams
{
    private $unwantedKeys = ['password'];

    private function removeUnwantedParams(array &$params = [])
    {
        foreach ($params as $key => &$value) {
            if (in_array($key, $this->unwantedKeys, true)) {
                unset($params[$key]);
            } elseif (is_array($value)) {
                $this->removeUnwantedParams($value);
            }
        }

        return $params;
    }
}
