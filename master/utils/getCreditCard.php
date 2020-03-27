<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->credit_card_category->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
$type = '"text"';
foreach ($show as $row) {
    $show1 = $row['credit_card'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $counter = $row1['counter'];
        $cardName = $row1['cardName'];
        $column = '"cardName"';
        $i++;
        $pencilid = '"cardPencil'.$i.'"';
        $updateBankCard = '"updateBankCard"';
        $title = '"Card Name"';
        $c_type = '"'.$cardName.'"';
        
        echo "<tr>
            <td> $i</td>
            <td class='custom-text' id='cardName$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='cardPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateBankCard,$type,$id,$column,$title,$pencilid)'
                ></i>
                $cardName
            </td>";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteBankCard($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
    }
}

//echo $table;
