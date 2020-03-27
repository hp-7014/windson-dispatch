<?php

require 'model/Company.php';   // class file
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// insert function here
if ($_GET['type'] == 'add_company') {
    $Company = new Company();
    $Company->setId($helper->getNextSequence("company",$db));
    $Company->setCompanyID($_SESSION['companyId']);
    $Company->setCompanyName($_POST['companyName']);
    $Company->setShippingAddress($_POST['shippingAddress']);
    $Company->setTelephoneNo($_POST['telephoneNo']);
    $Company->setFaxNo($_POST['faxNo']);
    $Company->setMcNo($_POST['mcNo']);
    $Company->setUsDotNo($_POST['usDotNo']);
    $Company->setMailingAddress($_POST['mailingAddress']);
    $Company->setFactoringCompany($_POST['factoringCompany']);
//    $Company->setFactoringCompanyAddress($_POST['factoringCompanyAddress']);
    $Company->insert($Company,$db,$helper);
    echo 'Data Added Successfully';
}

//delete function
else if ($_GET['type'] == 'delete_company') {
    $Company = new Company();
    $Company->setId($_POST['id']);
    $Company->setFactoringCompany($_POST['factoringid']);
    $Company->delete($Company,$db,$helper);
    echo 'Data Removed Successfully';
}

// edit function
else if ($_GET['type'] == 'edit_company') {
    $Company = new Company();
    $Company->setId($_POST['id']);
//    $Company->setCompanyID($_POST['companyid']);
    $Company->setcompanyName($_POST['value']);
    $Company->setColumn($_POST['column']);
    $Company->update($Company,$db);
    echo 'Data Update Successfully';
}

//export company
else if ($_GET['type'] == 'exportCompany') {
    $Company = new Company();
    $Company->export($db);
}

//import company
else if ($_GET['type'] == 'importCompany') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Company = new Company();
        $Company->importExcel($targetPath,$helper,$db);
    }
}