<?php

namespace Hautelook\ShipmentTracking\Provider;

use Guzzle\Http\Client;
use Guzzle\Http\ClientInterface;
use Guzzle\Http\Exception\HttpException;
use Hautelook\ShipmentTracking\Exception\Exception;
use Hautelook\ShipmentTracking\ShipmentEvent;
use Hautelook\ShipmentTracking\ShipmentInformation;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class UspsProvider implements ProviderInterface
{
    /**
     * @var string
     */
    private $userId;

    /**
     * @var string
     */
    private $url;

    /**
     * @var ClientInterface
     */
    private $httpClient;

    public function __construct($userId, $url = null, ClientInterface $httpClient = null)
    {
        $this->userId = $userId;
        $this->url = $url ?: 'http://production.shippingapis.com/ShippingAPI.dll';
        $this->httpClient = $httpClient ?: new Client();
    }

    public function track($trackingNumber)
    {
        try {
            $response = $this->httpClient->post($this->url, array(), array(
                'API' => 'TrackV2',
                'XML' => $this->createTrackRequestXml($trackingNumber),
            ))->send();
        } catch (HttpException $e) {
            throw Exception::createFromHttpException($e);
        }

        return $this->parseTrackResponse($response->getBody(true), $trackingNumber);
    }

    private function createTrackRequestXml($trackingNumber)
    {
<<<XML
<TrackFieldRequest USERID="">
    <TrackID ID=""></TrackID>
</TrackFieldRequest>
XML;

        $xml = new \SimpleXMLElement('<TrackFieldRequest/>');
        $xml->addAttribute('USERID', $this->userId);
        $xml->addChild('TrackID')->addAttribute('ID', $trackingNumber);

        return $xml->asXML();
    }

    private function parseTrackResponse($xml, $trackingNumber)
    {
        try {
            $trackResponseXml = new \SimpleXMLElement($xml);
        } catch (\Exception $e) {
            throw Exception::createFromSimpleXMLException($e);
        }

        $trackInfoElements = $trackResponseXml->xpath(sprintf('//TrackInfo[@ID=\'%s\']', $trackingNumber));

        if (count($trackInfoElements) < 1) {
            throw new \Exception('tracking information not found in the response');
        }

        $trackInfoXml = reset($trackInfoElements);

        $events = array();
        foreach ($trackInfoXml->xpath('./*[self::TrackDetail|self::TrackSummary]') as $trackDetailXml) {
            $city = (string) $trackDetailXml->EventCity;
            $state = (string) $trackDetailXml->EventState;
            $label = (string) $trackDetailXml->Event;

            $location = null;
            if (strlen($city) > 0 && strlen($state) > 0) {
                $location = sprintf('%s, %s', $city, $state);
            }

            $date = new \DateTime((string) $trackDetailXml->EventDate . ' ' . (string) $trackDetailXml->EventTime);

            $shipmentEventType = null;

            if (in_array($label, static::getDeliveredEventLabels())) {
                $shipmentEventType = ShipmentEvent::TYPE_DELIVERED;
            } elseif (in_array($label, static::getReturnedToShipperEventLabels())) {
                $shipmentEventType = ShipmentEvent::TYPE_RETURNED_TO_SHIPPER;
            } elseif (in_array($label, static::getDeliveryAttemptEventLabels())) {
                $shipmentEventType = ShipmentEvent::TYPE_DELIVERY_ATTEMPTED;
            }

            $events[] = new ShipmentEvent($date, $label, $location, $shipmentEventType);
        }

        return new ShipmentInformation($events);
    }

    private static function getDeliveredEventLabels()
    {
        return [
            'DELIVERED',
            'AUTHORIZED AGENT',
            'DELIVERED BY BROKER',
            'DELIVERED (WITH SIGNATURE)',
            'DELIVERED DAMAGED',
            'DELIVERED ABROAD',
            'INTERNATIONAL DELIVERED WITH SIGNATURE',
        ];
    }

    private static function getReturnedToShipperEventLabels()
    {
        return [
            'REFUSED',
            'UNDELIVERABLE AS ADDRESSED',
            'RETURN TO SENDER',
            'NO SUCH NUMBER',
            'INSUFFICIENT ADDRESS',
            'MOVED, LEFT NO ADDRESS',
            'FORWARD EXPIRED',
            'ADDRESSEE UNKNOWN',
            'VACANT',
            'UNCLAIMED',
            'RETURN TO SENDER / NOT PICKED UP',
            'BAD ADDRESS',
            'FOREIGN RETURN TO SENDER',
            'R.T.S: IMPROPER DOCUMENTATION',
            'R.T.S: ABANDONMENT',
            'R.T.S: DUTY NONPAYMENT',
            'PICKED UP AT CUSTOMS UNIT',
            'REFUSED DELIVERY',
            'REFUSED ENTRY BY CUSTOMS',
            'RETURNED TO CONSIGNOR',
        ];
    }

    private static function getDeliveryAttemptEventLabels()
    {
        return [
            'NOTICE LEFT',
            'BUSINESS CLOSED',
            'RECEPTACLE BLOCKED',
            'RECEPTACLE FULL/ITEM OVERSIZED',
            'NO SECURE LOCATION AVAILABLE',
            'NO AUTHORIZED RECIPIENT AVAILABLE',
            'HAZARDOUS/UNSAFE DELIVERY CONDITIONS',
            'CLOSED ON ARRIVAL',
            'CUSTOMER MOVED',
            'ATTEMPTED DELIVERY ABROAD',
            'NOT HOME',
            'NOTICE LEFT (BUSINESS CLOSED)',
            'NOTICE LEFT (NO AUTHORIZED RECIPIENT AVAILABLE)',
        ];
    }
}
