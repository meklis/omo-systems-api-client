<?php


namespace OmoSystemsApi\Api;


use OmoSystemsApi\ApiCaller;

abstract class DefaultApi
{
    protected $api;
    function __construct(ApiCaller $api)
    {
        $this->api = $api;
    }
}