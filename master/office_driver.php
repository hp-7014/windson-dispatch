<?php

require 'model/Office.php';   // class file
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// insert function here
if ($_GET['type'] == 'add_office') {
    $office = new Office();
    $office->setId($helper->getNextSequence("office",$db));
    $office->setCompanyID($_POST['companyId']);
    $office->setofficeName($_POST['officeName']);
    $office->setofficeLocation($_POST['officeLocation']);
    $office->insert($office,$db);
    echo 'Data Added Successfully';
}
else if ($_GET['type'] == 'edit_office') {
    $Office = new Office();
    $Office->setId($_POST['id']);
    $Office->setCompanyID($_POST['companyid']);
    $Office->setofficeName($_POST['value']);
    $Office->setColumn($_POST['column']);
    $Office->update($Office,$db);
    echo 'Data Update Successfully';
}
else if ($_GET['type'] == 'delete_office'){
    $Office = new Office();
    $Office->setId($_POST['id']);
    $Office->delete($Office,$db);
    echo 'Remove Data Successfully';
}
// import excel here
else if ($_GET['type'] == 'importOffice') {

    $allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'upload/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Office = new Office();
        $Office->importExcel($targetPath,$helper);
    }
}
// export excel function here
else if ($_GET['type'] == 'exportOffice') {
    $Office = new Office();
    $Office->export($db);
}