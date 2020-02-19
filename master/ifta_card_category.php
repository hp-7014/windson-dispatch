<?php
@session_start();

require 'model/Ifta_Card_Category.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Get Driver / Card Holder Details
if ($_GET['type'] == 'driverdetails') {

    $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);

    foreach ($show_data as $drive) {
        $d = $drive['driver'];

        foreach ($d as $t) {
            //echo $t;
            if ($_POST['getoption'] == $t['driverName']) {
                echo json_encode($t);
                break;
            }
        }
    }
}

// Add Function Here
if ($_GET['type'] == 'card_category') {
    $card_cat = new Ifta_Card_Category();
    $card_cat->setId($helper->getNextSequence("ifta_card_cat",$db));
    $card_cat->setCompanyID($_POST['companyId']);
    $card_cat->setCardHolderName($_POST['cardHolderName']);
    $card_cat->setEmployeeNo($_POST['employeeNo']);
    $card_cat->setIftaCardNo($_POST['iftaCardNo']);
    $card_cat->setCardType($_POST['cardType']);
    $card_cat->Insert($card_cat,$db,$helper);
}

// Edit Function Here
else if ($_GET['type'] == 'edit_ifta'){
    $card_cat = new Ifta_Card_Category();
    $card_cat->setId($_POST['id']);
    $card_cat->setCompanyID($_POST['companyId']);
    $card_cat->setCardHolderName($_POST['value']);
    $card_cat->setColumn($_POST['column']);
    $card_cat->updateIftaCard($card_cat,$db);
}

// Delete Function Here
else if ($_GET['type'] == 'delete_Ifta'){
    $card_cat = new Ifta_Card_Category();
    $card_cat->setId($_POST['id']);
    $card_cat->deleteIftaCard($card_cat,$db);
}

// Import Excel Here
else if ($_GET['type'] == 'import_Ifta') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $i_card = new Ifta_Card_Category();
        $i_card->importIftaCard($targetPath,$helper);
    }
}

// Export Excel Here
else if ($_GET['type'] == 'export_ifta') {
    $i_card = new Ifta_Card_Category();
    $i_card->exportIftaCard($db);
}




