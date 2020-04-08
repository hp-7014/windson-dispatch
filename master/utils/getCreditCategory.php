<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->bank_credit_category->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
$type = '"text"';
foreach ($show as $row) {
    $show1 = $row['bank_credit'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $counter = $row1['counter'];
        $bankName_s = $row1['bankName'];
        $column = '"bankName"';
        $i++;
        $pencilid2 = '"creditPencil'.$i.'"';
        $updateBankCredit = '"updateBankCredit"';
        $title = '"Name"';
        $c_type = '"'.$bankName_s.'"';

        echo "<tr>
            <th> $i</th>
            <td class='custom-text' id='bankName$i'
                onmouseover='showPencil_s($pencilid2)'
                onmouseout='hidePencil_s($pencilid2)'
                >
                <i id='creditPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateBankCredit,$type,$id,$column,$title,$pencilid2)'
                ></i>
                $bankName_s
            </td>";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteBankCredit($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
    }
}

 //echo $table;