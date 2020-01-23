<?php

require 'model/Shipper.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

if ($_GET['type'] == 'add_shipper') {
    $shipper = new Shipper();
    $shipper->setId($helper->getNextSequence("shipper",$db));
    $shipper->setCompanyID($_POST['companyID']);
    $shipper->setShipperName($_POST['shipperName']);
    $shipper->setShipperAddress($_POST['shipperAddress']);
    $shipper->setShipperLocation($_POST['shipperLocation']);
    $shipper->setShipperPostal($_POST['shipperPostal']);
    $shipper->setShipperContact($_POST['shipperContact']);
    $shipper->setShipperEmail($_POST['shipperEmail']);
    $shipper->setShipperTelephone($_POST['shipperTelephone']);
    $shipper->setShipperExt($_POST)['shipperExt'];
    $shipper->setShipperTollFree($_POST['shipperTollFree']);
    $shipper->setShipperFax($_POST['shipperFax']);
    $shipper->setShipperShippingHours($_POST['shipperShippingHours']);
    $shipper->setShipperAppointments($_POST['shipperAppointments']);
    $shipper->setShipperIntersaction($_POST['shipperIntersaction']);
    $shipper->setShipperStatus($_POST['shipperStatus']);
    $shipper->setInternalNotes($_POST['shippingNotes']);
    $shipper->setInternalNotes($_POST['internalNotes']);
    $shipper->insert($shipper,$db);
}