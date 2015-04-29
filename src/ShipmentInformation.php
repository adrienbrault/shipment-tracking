<?php

namespace Hautelook\ShipmentTracking;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class ShipmentInformation
{
    /**
     * @var ShipmentEvent[]
     */
    private $events;

    /**
     * @var \DateTime
     */
    private $estimatedDeliveryDate;

    public function __construct(
        array $events,
        \DateTime $estimatedDeliveryDate = null
    ) {
        foreach ($events as $event) {
            if (!$event instanceof ShipmentEvent) {
                throw new \InvalidArgumentException(
                    sprintf(
                        '$events must contain ShipmentEvent instances. %s given',
                        is_object($event) ? get_class($event) : gettype($event)
                    )
                );
            }
        }

        $this->events = $events;
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

    /**
     * @return ShipmentEvent[]
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * @return \DateTime
     */
    public function getDeliveredAt()
    {
        return $this->getLastEventDateOfType(ShipmentEvent::TYPE_DELIVERED);
    }

    /**
     * @return \DateTime
     */
    public function getLastDeliveryAttemptedAt()
    {
        return $this->getLastEventDateOfType(ShipmentEvent::TYPE_DELIVERY_ATTEMPTED);
    }

    /**
     * @return \DateTime
     */
    public function getReturnedToShipperAt()
    {
        return $this->getLastEventDateOfType(ShipmentEvent::TYPE_RETURNED_TO_SHIPPER);
    }

    /**
     * @return \DateTime
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate;
    }

    private function getLastEventDateOfType($eventType)
    {
        $date = null;
        foreach ($this->events as $event) {
            if ($eventType === $event->getType()) {
                $date = max($date, $event->getDate());
            }
        }

        return $date;
    }
}
