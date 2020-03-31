<?php

require 'model/Bank.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// bank driver
if ($_GET['type'] == 'bankDriver') {
    $bank = new Bank();
    $bank->setId(); // <--- auto increment function called here
    $bank->setPaymentFrom();
    $bank->setCompanySelect();
    $bank->setBankName();
    $bank->setDriverName();
    $bank->setPayto();
    $bank->setSelectDebit();
    $bank->setDriverInvoice();
    $bank->setAmount();
    $bank->setAdvance();
    $bank->setFinalAmount();
    $bank->setCheckDate();
    $bank->setCheque();
    $bank->setAch();
    $bank->setMemo();
}

// bank carrier
else if ($_GET['type'] == 'bankCarrier') {
    $bank = new Bank();
    $bank->setId(); // <--- auto increment function called here
    $bank->setPaymentFrom();
    $bank->setCompanySelect();
    $bank->setBankName();
    $bank->setDriverName(); // as carrier name
    $bank->setPayto();
    $bank->setSelectDebit();
    $bank->setCarrierInvoice();
    $bank->setAmount();
    $bank->setCheckDate();
    $bank->setCheque();
    $bank->setAch();
    $bank->setMemo();
}

// bank factoring
else if($_GET['type'] == 'bankFactoring'){
    $bank = new Bank();
    $bank->setId(); // <--- auto increment function called here
    $bank->setPaymentFrom();
    $bank->setCompanySelect();
    $bank->setBankName();
    $bank->setDriverName(); // as factoring name
    $bank->setPayto();
    $bank->setSelectDebit();
    $bank->setFactoringInvoice();
    $bank->setAmount();
    $bank->setCheckDate();
    $bank->setCheque();
    $bank->setAch();
    $bank->setMemo();
}
