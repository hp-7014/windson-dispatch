<?php

require 'model/Customer.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// add function
if ($_GET['type'] == 'addCustomer') {
    $customer = new Customer();
    $customer->setId($helper->getNextSequence("customer",$db));
    $customer->setCompanyId($_SESSION['companyId']);
    $customer->setCustName($_POST['custName']);
    $customer->setCustAddress($_POST['custAddress']);
    $customer->setCustLocation($_POST['custLocation']);
    $customer->setCustZip($_POST['custZip']);
    $customer->setBillingAddress($_POST['billingAddress']);
    $customer->setBillingLocation($_POST['billingLocation']);
    $customer->setBillingZip($_POST['billingZip']);
    $customer->setPrimaryContact($_POST['primaryContact']);
    $customer->setCustTelephone($_POST['custTelephone']);
    $customer->setCustExt($_POST['custExt']);
    $customer->setCustEmail($_POST['custEmail']);
    $customer->setCustFax($_POST['custFax']);
    $customer->setBillingContact($_POST['billingContact']);
    $customer->setBillingEmail($_POST['billingEmail']);
    $customer->setBillingTelephone($_POST['billingTelephone']);
    $customer->setBillingExt($_POST['billingExt']);
    $customer->setURS($_POST['URS']);
    $customer->setCurrencySetting($_POST['currencySetting']);
    $customer->setPaymentTerms($_POST['paymentTerms']);
    $customer->setCreditLimit($_POST['creditLimit']);
    $customer->setSalesRep($_POST['salesRep']);
    $customer->setFactoringCompany($_POST['factoringCompany']);
    $customer->setFederalID($_POST['federalID']);
    $customer->setWorkerComp($_POST['workerComp']);
    $customer->setWebsiteURL($_POST['websiteURL']);
    $customer->setInternalNotes($_POST['internalNotes']);
    $customer->setMC($_POST['MC']);
    $customer->insert($customer, $db, $helper);
    echo "Data Added Successfully";
}
//import customer
else if ($_GET['type'] == 'importCustomer') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $customer = new Customer();
        $customer->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}

// export excel function here
else if ($_GET['type'] == 'exportCustomer') {
    $customer = new Customer();
    $customer->exportCustomer($db);
}

// update function here
else if ($_GET['type'] == 'edit_customer') {
    $customer = new Customer();
    $customer->setId($_POST['id']);
    $customer->setCompanyId($_POST['companyid']);
    $customer->setCustName($_POST['value']);
    $customer->setColumn($_POST['column']);
    $customer->updateCustomer($customer, $db);
    echo 'Data Update Successfully';
}

// delete function here
else if ($_GET['type'] == 'delete_customer') {
    $customer = new Customer();
    $customer->setId($_POST['id']);
    $customer->deleteCustomer($customer, $db);
    echo 'Data Removed Successfully';
}