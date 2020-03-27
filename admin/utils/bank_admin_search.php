<?php
session_start();
$helper = "helper";
include '../../database/connection.php';

if ($_GET['type'] == 'search_text') {
    $no = 1;
    $show_data = $db->bank_admin->find(['companyID' => $_SESSION['companyId']]);

    foreach ($show_data as $drive) {
        $d = $drive['admin_bank'];
        foreach ($d as $t) {
            //echo json_encode($t);
            if ($_POST['getoption'] == $t['bankName'] || $_POST['getoption'] == $t['bankAddresss'] || $_POST['getoption'] == $t['accountHolder']) {
                echo "<tr>";
                echo "<th>$no</th>"; 
                echo "<td>";
                    echo $t['bankName'];
                echo "</td>";
                echo "<td>";
                    echo $t['bankAddresss'];
                echo "</td>";
                echo "<td>";
                    echo $t['accountHolder'];
                echo "</td>";
                echo "</tr>";
                
            } 

            if ($_POST['getoption'] == ''){
                echo "<tr>";
                echo "<th>$no</th>"; 
                echo "<td>";
                    echo $t['bankName'];
                echo "</td>";
                echo "<td>";
                    echo $t['bankAddresss'];
                echo "</td>";
                echo "<td>";
                    echo $t['accountHolder'];
                echo "</td>";
                echo "</tr>";
            }
            
        }
    }
}

?>