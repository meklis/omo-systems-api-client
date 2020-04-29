<?php


namespace OmoSystemsApi\Api;


use OmoSystemsApi\ApiCaller;

abstract class AbstractApi
{
    protected $api;
    function __construct(ApiCaller $api)
    {
        $this->api = $api;
    }
}