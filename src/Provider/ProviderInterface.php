<?php

namespace Hautelook\ShipmentTracking\Provider;

use Hautelook\ShipmentTracking\ShipmentInformation;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
interface ProviderInterface
{
    /**
     * @param  string              $trackingNumber
     * @return ShipmentInformation
     */
    public function track($trackingNumber);
}
