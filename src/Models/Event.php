<?php


namespace OmoSystemsApi\Models;


class Event
{
    const DeviceAdded = "DeviceAdded";
    const SharedDeviceReceived = "SharedDeviceReceived";
    const DeviceDeleted = "DeviceDeleted";
    /**
     * @var string
     */
    private $eventType;
    /**
     * @var string
     */
    private $correlationId;
    /**
     * @var string
     */
    private $userId;
    /**
     * @var string
     */
    private $hubId;
    /**
     * @var string
     */
    private $deviceId;
    /**
     * @var string
     */
    private $deviceType;
    /**
     * @var string
     */
    private $receiverPhone;
    /**
     * @var string
     */
    private $sharedFromId;
    /**
     * @var string
     */
    private $sharedFromPhone;

    /**
     * @var string
     */
    private $reason;

    /**
     * @return string
     */
    public function getEventType()
    {
        return $this->eventType;
    }

    /**
     * @return string
     */
    public function getCorrelationId()
    {
        return $this->correlationId;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getHubId()
    {
        return $this->hubId;
    }

    /**
     * @return string
     */
    public function getDeviceId()
    {
        return $this->deviceId;
    }

    /**
     * @return string
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @return string
     */
    public function getReceiverPhone()
    {
        return $this->receiverPhone;
    }

    /**
     * @return string
     */
    public function getSharedFromId()
    {
        return $this->sharedFromId;
    }

    /**
     * @return string
     */
    public function getSharedFromPhone()
    {
        return $this->sharedFromPhone;
    }

    /**
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

}