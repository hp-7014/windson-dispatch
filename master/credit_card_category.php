<?php 

require 'model/CreditCardCategory.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

// Add Card Here
if ($_GET['type'] == 'card_credit') {
    $card = new CreditCardCategory();
    $card->setId($helper->getNextSequence("credit_card_category",$db));
    $card->setCompanyID($_POST['companyId']);
    $card->setCategoryName($_POST['cardName']);
    $card->Insert($card,$db,$helper);

    /*$data['message'] = $_POST['bankName'];
    $pusher->trigger('my-channel', 'my-event', $data);*/
}

// edit Card Here
else if ($_GET['type'] == 'edit_bank_card') {
    $card = new CreditCardCategory();
    $card->setId($_POST['id']);
    $card->setCompanyID($_POST['companyId']);
    $card->setCategoryName($_POST['value']);
    $card->setColumn($_POST['column']);
    $card->updateBankCard($card,$db);
}

// delete function here
else if ($_GET['type'] == 'delete_card'){
    $card = new CreditCardCategory();
    $card->setId($_POST['id']);
    $card->deleteBankCard($card,$db);
}



// import Card Here
else if ($_GET['type'] == 'importCard') {
    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file_test"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file_test']['name'];
        move_uploaded_file($_FILES['file_test']['tmp_name'], $targetPath);

        $card = new CreditCardCategory();
        $card->import_Card($targetPath,$helper);
    }
}

// Export Card Here
else if ($_GET['type'] == 'export_Card') {
    $card = new CreditCardCategory();
    $card->export_Card($db);
}






