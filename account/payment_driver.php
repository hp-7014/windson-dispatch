<?php

require 'model/Bank.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Insert Driver Payment Function Here
if ($_GET['type'] == 'driverpayment') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setFieldName($_POST['drivername']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['payto']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice']);
    $bank->setAmount($_POST['amount']);
    $bank->setAdvance($_POST['advance']);
    $bank->setFinalAmount($_POST['finalamount']);
    $bank->setCheckDate($_POST['checkdate']);
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->insert($bank,$db,$helper);
}

// bank carrier
else if ($_GET['type'] == 'carrierpayment') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setFieldName($_POST['carriername']);
    $bank->setCategory($_POST['category']); 
    $bank->setPayto($_POST['payto']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate($_POST['checkdate']);
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->insert($bank,$db,$helper);
}

// bank factoring
else if($_GET['type'] == 'bankFactoring'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setFieldName($_POST['selectFactoring']); 
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['payto']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate($_POST['checkdate']);
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->insert($bank,$db,$helper);
}
