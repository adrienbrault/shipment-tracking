<?php

namespace Hautelook\ShipmentTracking\Tests\Provider;

use Guzzle\Http\ClientInterface;
use Guzzle\Http\Message\RequestInterface;
use Guzzle\Http\Message\Response;
use Hautelook\ShipmentTracking\Provider\UspsProvider;
use Hautelook\ShipmentTracking\ShipmentInformation;

class UspsProviderTest extends \PHPUnit_Framework_TestCase
{
    public function test()
    {
        $clientProphecy = $this->prophesize(ClientInterface::class);
        $requestProphecy = $this->prophesize(RequestInterface::class);
        $responseProphecy = $this->prophesize(Response::class);

        $xml = <<<XML
<TrackFieldRequest USERID="userId">
    <TrackID ID="ABC"/>
</TrackFieldRequest>
XML;
        $xml = preg_replace('/\n\s*/', '', $xml);
        $xml = '<?xml version="1.0"?>' . "\n" . $xml . "\n";

        $clientProphecy
            ->post(
                'http://production.shippingapis.com/ShippingAPI.dll',
                [],
                [
                    'API' => 'TrackV2',
                    'XML' => $xml,
                ]
            )
            ->willReturn($requestProphecy)
        ;
        $requestProphecy->send()->willReturn($responseProphecy);

        $responseProphecy->getBody(true)->willReturn(file_get_contents(__DIR__ . '/../fixtures/usps.xml'));

        $provider = new UspsProvider(
            'userId',
            null,
            $clientProphecy->reveal()
        );
        $shipmentInformation = $provider->track('ABC');

        $this->assertInstanceOf(ShipmentInformation::class, $shipmentInformation);
        $this->assertEquals(
            new \DateTime('May 21, 2001 12:12 pm'),
            $shipmentInformation->getDeliveredAt()
        );
        $this->assertSame(null, $shipmentInformation->getEstimatedDeliveryDate());

        $events = $shipmentInformation->getEvents();
        $this->assertCount(3, $events);
        $event = $events[0];
        $this->assertEquals(new \DateTime('May 21, 2001 12:12 pm'), $event->getDate());
        $this->assertEquals('DELIVERED', $event->getLabel());
        $this->assertEquals('NEWTON, IA', $event->getLocation());
    }
}
