<?php


namespace OmoSystemsApi;


use OmoSystemsApi\Exceptions\AuthException;
use OmoSystemsApi\Models\ApiResponse;

class ApiCaller
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $http;
    protected static $apiAddr = "https://api.omo.systems";

    /**
     * Api constructor.
     * @param $token
     * @param string $apiAddr
     */
    public function __construct($token, $apiAddr = "")
    {
        $baseUri = $apiAddr ? $apiAddr : self::$apiAddr;
        $this->http = new \GuzzleHttp\Client(['base_uri' => $baseUri,
            'defaults' => [
                'headers' => ['Authorization' => "Bearer $token"],
            ]]);
    }

    /**
     * @param $method
     * @param $uri
     * @param $data
     * @return ApiResponse
     * @throws \Exception
     */
    public function call($method, $uri, $data)
    {
        $params = [];
        if($method == "GET") {
            $params['query'] = $data;
        } else {
            $params['query'] = $data;
        }
        $data = $this->http->request($method, $uri, $params);
        if($data->getStatusCode() >= 500) {
            throw new \Exception("Error working with OMO API: {$data->getReasonPhrase()}", $data->getStatusCode());
        }
        if(in_array($data->getStatusCode(), [401])) {
            throw new AuthException($data->getReasonPhrase(), $data->getStatusCode());
        }
        return ApiResponse::init($data);
    }
}