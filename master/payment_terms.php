<?php

require 'model/PaymentTerms.php';   // class file
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// import excel here
if ($_GET['type'] == 'importExcel') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $payment_term = new PaymentTerms();
        $payment_term->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}
// insert function here
else if ($_GET['type'] == 'add_payment_term') {
    $payment_term = new PaymentTerms();
    $payment_term->setId($helper->getNextSequence("payment_term", $db));
    $payment_term->setCompanyID($_POST['companyid']);
    $payment_term->setPaymentTerm($_POST['payment_term']);
    $payment_term->insert($payment_term, $db,$helper);
    echo 'Data Insert Successfully';
}
// update function here
else if ($_GET['type'] == 'edit_payment_term') {
    $payment_term = new PaymentTerms();
    $payment_term->setId($_POST['id']);
    $payment_term->setCompanyID($_POST['companyid']);
    $payment_term->setPaymentTerm($_POST['value']);
    $payment_term->setColumn($_POST['column']);
    $payment_term->updatePayment($payment_term, $db);
    echo 'Data Update Successfully';
}
// delete function here
else if ($_GET['type'] == 'delete_payment_term') {
    $payment_term = new PaymentTerms();
    $payment_term->setId($_POST['id']);
    $payment_term->deletePayment($payment_term, $db);
    echo 'Remove Data Successfully';
}
// export excel function here
else if ($_GET['type'] == 'export_payment_terms') {

    $payment_term = new PaymentTerms();
    $payment_term->exportPayment($db);
}