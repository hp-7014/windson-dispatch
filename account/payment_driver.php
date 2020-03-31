<?php

require 'model/Bank.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Driver Payment Function Here
if ($_GET['type'] == 'bankDriver') {
    $bank = new Bank();
    $bank->setId(); // <--- auto increment function called here
    $bank->setPaymentFrom();
    $bank->setCompanySelect();
    $bank->setBankName();
    $bank->setDriverName();
    $bank->setPayto();
    $bank->setSelectDebit();
    $bank->setInvoice();
    $bank->setAmount();
    $bank->setAdvance();
    $bank->setFinalAmount();
    $bank->setCheckDate();
    $bank->setCheque();
    $bank->setAch();
    $bank->setMemo();
}
