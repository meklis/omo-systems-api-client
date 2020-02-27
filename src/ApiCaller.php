<?php


namespace OmoSystemsApi;


use OmoSystemsApi\Models\ApiResponse;

class ApiCaller
{
    protected $http;
    protected static $authTokenHeaderName = "";
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
            $params['json'] = $data;
        }
        $data = $this->http->request($method, $uri, $params);
        if($data->getStatusCode() >= 500) {
            throw new \Exception("Error working with OMO API: {$data->getReasonPhrase()}", $data->getStatusCode());
        }
        return ApiResponse::init($data);
    }
}