<?php


namespace OmoSystemsApi\Api;


class User extends AbstractApi
{
    protected $base_uri = "/commands/user";
    public function activate($userId) {
        $req = [
            'targetUserId' => $userId,
        ];
        return $this->api->call("POST", "{$this->base_uri}/activate", $req);
    }
    public function activateHub($userId, $hubId) {
        $req = [
            'targetUserId' => $userId,
            'hubId' => $hubId,
        ];
        return $this->api->call("POST", "{$this->base_uri}/activateHub", $req);
    }
    public function deactivate($userId) {
        $req = [
            'targetUserId' => $userId,
        ];
        return $this->api->call("POST", "{$this->base_uri}/deactivate", $req);
    }
    public function deactivateHub($userId, $hubId) {
        $req = [
            'targetUserId' => $userId,
            'hubId' => $hubId,
        ];
        return $this->api->call("POST", "{$this->base_uri}/deactivateHub", $req);
    }
}