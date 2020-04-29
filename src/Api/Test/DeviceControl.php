<?php


namespace OmoSystemsApi\Api\Test;


use OmoSystemsApi\Api\AbstractApi;

class DeviceControl extends AbstractApi
{
    protected $base_uri = "/commands/test";
    public function addDevice($deviceId, $hubId, $deviceLabel = "") {
        $req = [
          'deviceId' => $deviceId,
          'hubId' => $hubId,
        ];
        if($deviceLabel) {
            $req['deviceLabel'] = $deviceLabel;
        }
        return $this->api->call("POST", "{$this->base_uri}/revoke", $req);
    }
    public function addHub($hubId, $providerId) {
        $req = [
          'providerId' => $providerId,
          'hubId' => $hubId,
        ];
        return $this->api->call("POST", "{$this->base_uri}/add-hub", $req);
    }
    public function deleteDevice($deviceId, $cascade = false) {
        $req = [
          'deviceId' => $deviceId,
          'cascade' => $cascade,
        ];
        return $this->api->call("POST", "{$this->base_uri}/delete-device", $req);
    }
}