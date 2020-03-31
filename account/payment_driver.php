<?php

require 'model/Bank.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Driver Payment Function Here
if ($_GET['type'] == 'driverpayment') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); // <--- auto increment function called here
    $bank->setCompanyID($_POST['companyId']);
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setDriverName($_POST['drivername']);
    $bank->setPayto($_POST['payto']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice']);
    $bank->setAmount($_POST['amount']);
    $bank->setAdvance($_POST['advance']);
    $bank->setFinalAmount($_POST['finalamount']);
    $bank->setCheckDate($_POST['checkdate']);
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['companyId']);
    $bank->insert($bank,$db,$helper);
}
