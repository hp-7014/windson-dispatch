<?php

require 'model/LoadType.php';   // class file
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

// insert function here
if ($_GET['type'] == 'add_loadType') {
    $load_type = new LoadType();
    $load_type->setId($helper->getNextSequence("loadType", $db));
    $load_type->setCompanyID($_POST['companyid']);
    $load_type->setLoadName($_POST['loadName']);
    $load_type->setLoadType($_POST['loadType']);
    $load_type->insert($load_type, $db,$helper);
    echo 'Data Insert Successfully';
}
// update function here
else if ($_GET['type'] == 'edit_loadType') {
    $load_type = new LoadType();
    $load_type->setId($_POST['id']);
    $load_type->setCompanyID($_POST['companyid']);
    $load_type->setLoadName($_POST['value']);
    $load_type->setColumn($_POST['column']);
    $load_type->update($load_type, $db);
    echo 'Data Update Successfully';
}
// delete function here
else if ($_GET['type'] == 'delete_loadType') {
    $load_type = new LoadType();
    $load_type->setId($_POST['id']);
    $load_type->delete($load_type, $db);
    echo 'Remove Data Successfully';
}
// export excel function here
else if ($_GET['type'] == 'exportLoadType') {
    $load_type = new LoadType();
    $load_type->export($db);
}
// import excel here
else if ($_GET['type'] == 'importLoadType') {

    $allowedFileType = ['application/vnd.ms-excel', 'text/xls', 'text/xlsx', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'upload/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $load_type = new LoadType();
        $load_type->importExcel($targetPath, $helper);
        echo 'File Upload Successfully';
    }
}