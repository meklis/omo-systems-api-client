<?php


namespace OmoSystemsApi\Api;


class Device  extends DefaultApi
{
    protected $base_uri = "/commands/device";
    public function revoke($deviceId, $receiverId, $receiverPhone) {
        $query = [
            'deviceId' => $deviceId,
            'receiverId' => $receiverId,
            'receiverPhone' => $receiverPhone,
        ];
        return $this->api->call("POST", "{$this->base_uri}/revoke", $query);
    }

    public function share($deviceId, $receiverPhone, $newDeviceLabel = "", $canShare = false, $setAsOwner = false) {

        $query = [
            'deviceId' => $deviceId,
            'receiverPhone' => $receiverPhone,
            'newDeviceLabel' => $newDeviceLabel,
            'canShare' => $canShare,
            'setAsOwner' => $setAsOwner,
        ];
        return $this->api->call("POST", "{$this->base_uri}/share", $query);
    }

    public function update($deviceId, $desired) {
        $query = [
            'deviceId' => $deviceId,
            'desired' => $desired,
        ];
        return $this->api->call("POST", "{$this->base_uri}/update", $query);

    }
}