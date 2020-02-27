<?php
require __DIR__ . "/../vendor/autoload.php";

//Load credentials to env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();

//Server address
\OmoSystemsApi\Auth::$authServer = getenv('OMO_AUTH_SERVER');
$auth = new \OmoSystemsApi\Auth(getenv('OMO_SECRET'), getenv('OMO_USERNAME'), getenv('OMO_PASSWORD'));

$device = new \OmoSystemsApi\Api\Device(
    new \OmoSystemsApi\ApiCaller($auth->getToken())
);

/**
 * Share device to another user
 */
//String - UUID of device from OMO systems
$deviceId = "";
//string
$receiverPhone = "";
//string
$newDeviceLabel = "";
//boolean
$canShare = false;
//boolean
$setAsOwner = false;
$device->share($deviceId, $receiverPhone, $newDeviceLabel, $canShare, $setAsOwner);




