<?php


namespace OmoSystemsApi\Models;


use Karriere\JsonDecoder\JsonDecoder;
use Psr\Http\Message\ResponseInterface;

class ApiResponse
{
    protected function __construct()
    {
    }

    /**
     * @var integer
     */
    protected $statusCode;
    /**
     * @var string
     */
    protected $reasonPhrase;
    /**
     * @var string
     */
    protected $body;
    public static function init(ResponseInterface $resp)
    {
        $obj = new self();
        $obj->body = $resp->getBody()->getContents();
        $obj->statusCode = $resp->getStatusCode();
        $obj->reasonPhrase = $resp->getReasonPhrase();
        return $obj;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getReasonPhrase()
    {
        return $this->reasonPhrase;
    }
    public function getRawBody() {
        return $this->body;
    }

    /**
     * @param $class
     * @return array|mixed
     */
    public function getObjMapped($class) {
        $jsonDecoder = new JsonDecoder(true);
        if(is_array(json_decode($this->body))) {
            return $jsonDecoder->decodeMultiple($this->body, $class);
        } else {
            return $jsonDecoder->decode($this->body, $class);
        }
    }
    public function getArr() {
        return json_decode($this->body, true);
    }
}