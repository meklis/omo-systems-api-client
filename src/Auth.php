<?php

namespace OmoSystemsApi;


use OmoSystemsApi\Exceptions\AuthException;

/**
 * Class Auth
 * @package SwitcherCore\Auth
 */
class Auth
{
    protected $credentials = [];
    public static $authServer = "https://ryy1xcx7jh.execute-api.eu-west-1.amazonaws.com/v6/access-token";
    protected $http;
    function __construct($secret, $username, $password, $authServer = "")
    {
        $this->credentials = [
            'secret' => $secret,
            'username' => $username,
            'password' => $password
        ];
        $baseUri = $authServer !== "" ? $authServer : self::$authServer;
        $this->http = new \GuzzleHttp\Client(['base_uri' => $baseUri]);
    }

    /**
     * @return string
     * @throws AuthException
     */
    function getToken() {
        $resp = $this->http->post("/v6/access-token", [
           'json' => $this->credentials,
        ]);
        $token = json_decode($resp->getBody()->getContents());
        if (!$token) {
            throw new AuthException("Invalid secret or username/password");
        }
        return $token;
    }
}