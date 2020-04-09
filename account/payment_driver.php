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
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'],$_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setAdvance($_POST['advance']);
    $bank->setFinalAmount($_POST['finalamount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertdriver($bank,$db,$helper);
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
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'],$_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertcarrier($bank,$db,$helper);
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
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'],$_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertfactoring($bank,$db,$helper);
}

// bank expense
else if($_GET['type'] == 'paymentexpense'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setExpensesbill($_POST['expensesbill']);
    $bank->setExpensesname($_POST['expensesname']);
    $bank->setAmount($_POST['amount']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertexpense($bank,$db,$helper);
}

// bank Maintenance
else if($_GET['type'] == 'paymentmaintenance'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setAch($_POST['maintenanceach']);
    $bank->setTruckno($_POST['truckno']);
    $bank->setTrailerno($_POST['trailerno']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertmaintenance($bank,$db,$helper);
}

// bank insurance
else if($_GET['type'] == 'paymentinsurance'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setInsurancecom($_POST['insurancecompany']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertinsurance($bank,$db,$helper);
}

// bank creditcard
else if($_GET['type'] == 'paymentcreditcard'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setAmount($_POST['amount']);
    $bank->setCard($_POST['card']);
    $bank->setCardcategory($_POST['cardcategory']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertcreditcard($bank,$db,$helper);
}

// bank fuelcard
else if($_GET['type'] == 'paymentfuelcard'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setAmount($_POST['amount']);
    $bank->setFuellist($_POST['fuellist']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertfuelcard($bank,$db,$helper);
}

// bank other
else if($_GET['type'] == 'paymentother'){
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount",$db)); 
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setPobox($_POST['pobox']);
    $bank->setAmount($_POST['amount']);
    $bank->setOther($_POST['other']);
    $bank->setCheckDate(strtotime($_POST['checkachdate']));
    $bank->setCheque($_POST['otherchequ']);
    $bank->setAch($_POST['otherach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertother($bank,$db,$helper);
}