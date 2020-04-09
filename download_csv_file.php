<?php
if(!empty($_GET['file'])){
    $fileName = basename($_GET['file']);
    $filePath1 = 'master/files/'.$fileName;
    $filePath2 = 'admin/files/'.$fileName;
    if(!empty($fileName) && file_exists($filePath1)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        // Read the file
        readfile($filePath1);
        exit;
    } else if(!empty($fileName) && file_exists($filePath2)){
        // Define headers
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: binary");

        // Read the file
        readfile($filePath2);
        exit;
    } else {
        echo 'The file does not exist.';
    }
}