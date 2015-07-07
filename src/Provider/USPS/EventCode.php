<?php

namespace Hautelook\ShipmentTracking\Provider\USPS;

final class EventCode
{
    const DELIVERED = '01';
    const NOTICE_LEFT_1 = '02';
    const ACCEPT_OR_PICKUP = '03';
    const REFUSED = '04';
    const UNDELIVERABLE_AS_ADDRESSED = '05';
    const FORWARDED = '06';
    const ARRIVAL_AT_UNIT = '07';
    const MISSENT = '08';
    const RETURN_TO_SENDER_1 = '09';
    const PROCESSED_THROUGH_USPS_SORT_FACILITY = '10';
    const SEIZED_BY_LAW_ENFORCEMENT = '11';
    const VISIBLE_DAMAGE = '12';
    const AVAILABLE_FOR_PICKUP_1 = '14';
    const MIS_SHIPPED = '15';
    const AVAILABLE_FOR_PICKUP_2 = '16';
    const PICKED_UP_BY_AGENT = '17';
    const DC_EV_ARRIVE = '19';
    const NO_SUCH_NUMBER = '21';
    const INSUFFICIENT_ADDRESS = '22';
    const MOVED_LEFT_NO_ADDRESS = '23';
    const FORWARD_EXPIRED = '24';
    const ADDRESSEE_UNKNOWN = '25';
    const VACANT = '26';
    const UNCLAIMED = '27';
    const RETURN_TO_SENDER_2 = '28';
    const RETURN_TO_SENDER_3 = '29';
    const RETURN_TO_SENDER_NOT_PICKED_UP = '31';
    const DEAD_MAIL_DISPOSED_POST_OFFICE = '32';
    const DEAD_MAIL_SENT_RECOVERY_CENTER = '33';
    const VAULT_TURNOVER = '35';
    const TRANSFER_TO_EMPLOYEE = '36';
    const REGISTERED_MAIL_DISPATCH_SIGNATURE = '38';
    const REGISTERED_MAIL_DISPATCH_WITNESS = '38';
    const TRANSFER_FROM_VAULT = '40';
    const RECEIVED_AT_OPENING_UNIT = '41';
    const USPS_HAND_OF_SHIPPING_PARTNER = '42';
    const PICKED_UP = '43';
    const INTERCEPTED = '44';
    const TENDERED_TO_MILITARY_AGENT = '45';
    const DUPLICATE_LABEL_ID = '46';
    const BUSINESS_CLOSED = '51';
    const NOTICE_LEFT_2 = '52';
    const RECEPTABLE_BLOCKED = '53';
    const RECEPTABLE_FULL_ITEM_OVERSIZED = '54';
    const NO_SECURE_LOCATION_AVAILABLE = '55';
    const NO_AUTHORIZED_RECIPIENT_AVAILABLE = '56';
    const HAZARDOUS_UNSAFE_DELIVERY_CONDITIONS = '57';
    const ON_ROUTE = '59';
    const TENDERED_TO_AGENT_FINAL_DELIVERY = '60';
    const FOREIGN_ACCEPTANCE = 'A0';
    const TRAILER_ARRIVE = 'A1';
    const ACEPTANCE_AT_DESTINATION = 'AD';
    const ARRIVE_USPS_SORT_FACILITY = 'AE';
    const HANDOFF_INTERMEDIATE_CARRIER = 'AF';
    const RECEIVED_FROM_INTERMEDIATE_CARRIER = 'AG';
    const DELIVERED_TO_POSTAL_AGENT = 'AH';
    const INTERMEDIATE_TRANSFER_AIRPORT = 'AJ';
    const ACCEPTED_BY_ORIGIN_CARRIER = 'AP';
    const INBOUND_INTERNATIONAL_ARRIVAL = 'AR';
    const INBOUND_IN_DESTINATION_COUNTRY = 'AS';
    const ORIGIN_CARRIER_DEPARTED_UPLIFT = 'AT';
    const FOREIGN_ARRIVAL_AT_OUTWARD_OFFICE = 'B0';
    const OUTBOUND_INTO_US_CUSTOMS = 'B1';
    const BAD_ADDRESS = 'BA';
    const PROCESSED = 'BE';
    const DELIVERED_BY_BROKER = 'BR';
    const BUMPED_DELAY = 'BX';
    const FOREIGN_INTERNATIONAL_DISPATCH = 'C0';
    const CLOSED_ON_ARRIVAL = 'CA';
    const AWAITING_CONSIGNEE_COLLECTION = 'CC';
    const CLEARANCE_DELAY = 'CD';
    const INBOUND_INTO_CUSTOMS = 'CI';
    const CUSTOMER_MOVED = 'CM';
    const INBOUND_OUT_OF_CUSTOMS = 'CO';
    const RELEASE_FROM_CUSTOMS_BOND = 'CR';
    const ARRIVED_ABROAD = 'D0';
    const DISTRIBUTION_COMPLETE = 'DC';
    const INTERNATIONAL_DISPATCH_READY = 'DD';
    const DEPART_USPS_SORT_FACILITY = 'DE';
    const DELIVERED_WITH_SIGNATURE = 'DL';
    const DELIVERED_DAMAGED = 'DN';
    const DISPOSAL = 'DP';
    const TRANSMIT_MAIL_DISPATCH = 'DT';
    const DELIVERY_STATUS_NOT_UPDATED = 'DX';
    const INTO_FOREIGN_CUSTOMS = 'E0';
    const DEPARTED = 'E1';
    const ENROUTE_ARRIVAL_INWARD_OFFICE_EXCHANGE = 'EA';
    const ENROUTE_ARRIVAL_OUTWARD_OFFICE_EXCHANGE = 'EB';
    const ENROUTE_DEPARTURE = 'EB';
    const DISPATCHED_FROM_SORT_FACILITY = 'EF';
    const OUT_OF_FOREIGN_CUSTOMS = 'F0';
    const WITH_DELIVERY_COURIER = 'FD';
    const AT_FOREIGN_DELIVERY_UNIT = 'G0';
    const PREPARED_FOR_AGENT = 'GX';
    const ATTEMPTED_DELIVERY_ABROAD = 'H0';
    const FOREIGN_RETURN_TO_SENDER = 'H8';
    const HELD_FOR_PAYMENT = 'HP';
    const HOLIDAY_DELAY = 'HX';
    const DELIVERED_ABROAD = 'I0';
    const RECEIPT_INTO_CUSTOMS_BOND = 'IC';
    const ARRIVAL_AT_TRANSIT_OFFICE_FROM_EXCHANGE = 'J0';
    const DEPART_FROM_TRANSIT_OFFICE_OF_EXCHANGE = 'K0';
    const FORWARDING_TO_US_CUSTOMS = 'K1';
    const CONTACT_US_CUSTOMS = 'K2';
    const FORWARDED_BY_USPS = 'K3';
    const RTS_IMPROPER_DOCUMENTATION = 'K4';
    const RTS_ABANDONMENT = 'K5';
    const RTS_DUTY_NONPAYMENT = 'K6';
    const PICKED_UP_AT_CUSTOMS_UNIT = 'K7';
    const CONTAINER_LOAD = 'L1';
    const MISSED_DELIVERY_CYCLE = 'LT';
    const LOOP_MAIL_EXCEPTION = 'LX';
    const ELECTRONIC_SHIPPING_INFO_RECEIVED = 'MA';
    const MISCODE = 'MC';
    const PICKED_UP_AND_PROCESSED_BY_AGENT = 'MR';
    const MISSORT = 'MS';
    const MISSENT_ZIP_NOT_CHANGED_PMPC_SCAN = 'MT';
    const ALERT_MID_USER_NEEDS_TO_BE_REGISTERED = 'MU';
    const ALERT_UNAUTHORIZED_MID_USE = 'MX';
    const MISSENT_ZIP_CHANGED_PMPC_SCAN = 'MZ';
    const NOT_DELIVERED = 'ND';
    const NOT_HOME = 'NH';
    const ORIGIN_POST_IS_PREPARING_SHIPMENT = 'NP';
    const ORIGIN_ACCEPTANCE = 'OA';
    const PROCESSED_AT_DESTINATION_FACILITY = 'OD';
    const OUT_FOR_DELIVERY = 'OF';
    const ON_HOLD = 'OH';
    const INTERNATIONAL_DELIVERED_WITH_SIGNATURE = 'OK';
    const SORTING_PROCESSING_COMPLETE = 'PC';
    const PARTIAL_DELIVERY = 'PD';
    const EPG_ORIGIN_POST_IS_PREPARING_SHIPMENT = 'PE';
    const PROCESSED_AT_ORIGIN = 'PO';
    const SHIPMENT_PICK_UP = 'PU';
    const READY_TO_PROCESS = 'R1';
    const LISTED_ON_REGISTERED_MAIL_DISPATCH_BILL = 'RB';
    const REFUSED_DELIVERY = 'RD';
    const REFUSED_ENTRY_BY_CUSTOMS = 'RE';
    const RETURNED_TO_CONSIGNOR = 'RT';
    const SERVICE_CHANGE = 'SC';
    const DISPATCHED_TO_SORT_FACILITY = 'SF';
    const SHIPMENT_STOPPED = 'SS';
    const TRAILER_DEPART = 'T1';
    const TRANSIT_MAIL_ARRIVAL = 'TA';
    const SHIPMENT_ACCEPTANCE = 'TM';
    const ONFORWARDED_TO_THIRD_PARTY = 'TP';
    const TRANSFERRED_THROUGH_SERVICE_CENTER = 'TR';
    const CONTAINER_UNLOAD = 'U1';
    const UNMANIFESTED_ACCEPTANCE = 'UA';
    const PACKAGE_RESEARCH_CASE_CREATED = 'VC';
    const SECOND_NOTICE_GENERATED = 'VF';
    const REDELIVERY_SCHEDULED = 'VR';
    const PACKAGE_RETURN_NOTICE_GENERATED = 'VS';
    const PACKAGE_RESEARCH_ASE_CLOSED = 'VX';
    const WITH_COURIER = 'WC';
    const WEATHER_DELAY = 'WX';

    public static function getDeliveredCodes()
    {
        return [
            static::DELIVERED,
            static::DELIVERED_ABROAD,
            static::DELIVERED_BY_BROKER,
            static::DELIVERED_DAMAGED,
            static::DELIVERED_TO_POSTAL_AGENT,
            static::DELIVERED_WITH_SIGNATURE,
            static::INTERNATIONAL_DELIVERED_WITH_SIGNATURE,
        ];
    }

    public static function getReturnedToShipperCodes()
    {
        return [
            static::RETURN_TO_SENDER_1,
            static::RETURN_TO_SENDER_2,
            static::RETURN_TO_SENDER_3,
            static::RETURN_TO_SENDER_NOT_PICKED_UP,
            static::FOREIGN_RETURN_TO_SENDER,
            static::REFUSED,
            static::REFUSED_DELIVERY,
            static::REFUSED_ENTRY_BY_CUSTOMS,
            static::UNDELIVERABLE_AS_ADDRESSED,
            static::NO_SUCH_NUMBER,
            static::INSUFFICIENT_ADDRESS,
            static::MOVED_LEFT_NO_ADDRESS,
            static::FORWARD_EXPIRED,
            static::ADDRESSEE_UNKNOWN,
            static::VACANT,
            static::UNCLAIMED,
            static::BAD_ADDRESS,
            static::RTS_IMPROPER_DOCUMENTATION,
            static::RTS_ABANDONMENT,
            static::RTS_DUTY_NONPAYMENT,
            static::PICKED_UP_AT_CUSTOMS_UNIT,
            static::RETURNED_TO_CONSIGNOR,
        ];
    }

    public static function getDeliveryAttemptCodes()
    {
        return [
            static::NOTICE_LEFT_1,
            static::NOTICE_LEFT_2,
            static::BUSINESS_CLOSED,
            static::RECEPTABLE_BLOCKED,
            static::RECEPTABLE_FULL_ITEM_OVERSIZED,
            static::NO_SECURE_LOCATION_AVAILABLE,
            static::NO_AUTHORIZED_RECIPIENT_AVAILABLE,
            static::HAZARDOUS_UNSAFE_DELIVERY_CONDITIONS,
            static::CLOSED_ON_ARRIVAL,
            static::CUSTOMER_MOVED,
            static::ATTEMPTED_DELIVERY_ABROAD,
            static::NOT_HOME,
            static::BUSINESS_CLOSED,
            static::NO_AUTHORIZED_RECIPIENT_AVAILABLE,
        ];
    }
}
