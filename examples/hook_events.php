<?php
use \OmoSystemsApi\Models\Event;
use \OmoSystemsApi\EventHook;

require __DIR__ . "/../vendor/autoload.php";

$events = (new EventHook())->handle();
foreach ($events as $event) {
    echo "CorrelationId: " . $event->getCorrelationId() . "\n";
    echo "EventType: " . $event->getEventType() . "\n";
    switch ($event->getEventType()) {
        case Event::DeviceAdded:
            echo "Event to device is added\n";
            break;
        case Event::SharedDeviceReceived:
            echo "Event to device is shared\n";
            break;
        case Event::DeviceDeleted:
            echo "Event to device is deleted\n";
            break;
        default:
            echo "Unknown event type\n";
    }
}
