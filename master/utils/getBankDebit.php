<?php 
session_start();
$helper = "helper";

require "../../database/connection.php";
$show = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
$type = '"text"';
foreach ($show as $row) {
    $show1 = $row['bank_debit'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $counter = $row1['counter'];
        $bankName = $row1['bankName'];
        $column = '"bankName"';
        $i++;
        $pencilid = '"debitPencil'.$i.'"';
        $updateBankDebit = '"updateBankDebit"';
        $title = '"Bank Name"';
        $c_type = '"'.$bankName.'"';

        echo "<tr>
            <td> $i</td>
            <td class='custom-text' id='bankName$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='debitPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateBankDebit,$type,$id,$column,$title,$pencilid)'
                ></i>
                $bankName
            </td>";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteBankDebit($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
    }
}

 //echo $table;
