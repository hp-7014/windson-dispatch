<?php
@session_start();

require 'model/Fuel_Receipts.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Get Driver / Card Holder Details
if ($_GET['type'] == 'driver_detail') {

    $show_data = $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);

    foreach ($show_data as $drive) {
        $d = $drive['ifta_card'];
        foreach ($d as $t) {
            if ($_POST['getoption'] == $t['_id']) {
                echo json_encode($t);
                break;
            }
        }
    }
}

// Add Fuel Receipts
if ($_GET['type'] == 'fuel_add') {
    $f_receipt = new Fuel_Receipts();
    $f_receipt->setId($helper->getNextSequence("fuel_receipts_ifta",$db));
    $f_receipt->setCompanyID($_POST['companyId']);
    $f_receipt->setCardHolderName($_POST['cardHolderName']);
    $f_receipt->setEmployeeNo($_POST['employeeNo']);
    $f_receipt->setCardNo($_POST['cardNo']);
    $f_receipt->setCardType($_POST['cardType']);
    $f_receipt->setUnitNumber($_POST['unit_number']);
    $f_receipt->setFuelDate($_POST['fuelDate']);
    $f_receipt->setTransacTime($_POST['transacTime']);
    $f_receipt->setMerchantName($_POST['merchantName']);
    $f_receipt->setMerchantCity($_POST['merchantCity']);
    $f_receipt->setStatePurch($_POST['statePurch']);
    $f_receipt->setDGallons($_POST['dGallons']);
    $f_receipt->setDGrossCost($_POST['dGrossCost']);
    $f_receipt->setCashAdvanced($_POST['cashAdvanced']);
    $f_receipt->setDiscountAmt($_POST['cashAdvanced']);
    $f_receipt->setTotalAmt($_POST['totalAmt']);
    $f_receipt->setInvoiceNo($_POST['invoiceNo']);
    $f_receipt->Insert($f_receipt,$db,$helper);

}

// Edit Fuel Receipts
else if ($_GET['type'] == 'edit_fuel') {
    $f_receipt = new Fuel_Receipts();
    $f_receipt->setId($_POST['id']);
    $f_receipt->setCompanyID($_POST['companyId']);
    $f_receipt->setCardHolderName($_POST['value']);
    $f_receipt->setColumn($_POST['column']);
    $f_receipt->update_FuelReceipt($f_receipt,$db);
}

// Delete Fuel Receipts
else if ($_GET['type'] == 'delete_fuel') {
    $f_receipt = new Fuel_Receipts();
    $f_receipt->setId($_POST['id']);
    $f_receipt->setCardHolderName($_POST['cardName']);
    
    $f_receipt->delete_FuelReceipts($f_receipt,$db,$helper);
}

// Export Fuel Receipts
else if ($_GET['type'] == 'export_fuel') {
    $f_receipt = new Fuel_Receipts();
    $f_receipt->export_FuelReceipts($db);
}

// Import Fuel Receipts
else if ($_GET['type'] == 'import_fuel') {
    // print_r($_FILES['file']);
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $f_receipt = new Fuel_Receipts();
        $f_receipt->import_FuelReceipts($targetPath,$helper);
    }
}




