<?php
session_start();
$helper = "helper";
include '../../database/connection.php';
$start = (int)$_POST['start'];
$limit = (int)$_POST['limit'];
$broker = $db->customs_broker->find(array('companyID'=>$_SESSION['companyId']),array('projection'=>array('custom_b'=>array('$slice'=>[$start,$limit]))));
$i = 0;

foreach ($broker as $brok) {
    $c_broker = $brok['custom_b'];

    foreach ($c_broker as $custom) {
        
        $start += 1;
        
        if ($custom['delete_status'] == '0') {
            echo "<tr>";
               echo "<th>$start</th>";
                echo "<td>";
                    echo $custom['brokerName'];
                echo "</td>";
                }
    }
}
