<?php
require __DIR__ . "/../vendor/autoload.php";

//Load credentials to env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

//Server address
\OmoSystemsApi\Auth::$authServer = getenv('OMO_AUTH_SERVER');

$auth = new \OmoSystemsApi\Auth(getenv('OMO_SECRET'), getenv('OMO_USERNAME'), getenv('OMO_PASSWORD'));

/**
 * Return token as string or AuthException
 */
print_r($auth->getToken());
