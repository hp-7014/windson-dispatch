<?php
require 'model/Payment.php';
//require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

//$helper = new Helper();

// Add Credit Here
if ($_GET['type'] == 'updateCarrierInvoice') {
    $payment = new Payment();
    $payment->setCarrierName($_POST['carrierName']);
    $payment->getCarrierInvoice($payment,$db);
}