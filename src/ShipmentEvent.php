<?php

namespace Hautelook\ShipmentTracking;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class ShipmentEvent
{
    const TYPE_UNKNOWN = 'UNKNOWN';
    const TYPE_DELIVERED = 'DELIVERED';
    const TYPE_DELIVERY_ATTEMPTED = 'DELIVERY_ATTEMPTED';
    const TYPE_RETURNED_TO_SHIPPER = 'RETURNED_TO_SHIPPER';

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $label;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $type;

    public function __construct(\DateTime $date, $label, $location, $type = null)
    {
        $this->date = $date;
        $this->label = $label;
        $this->location = $location;
        $this->type = $type ?: self::TYPE_UNKNOWN;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}
