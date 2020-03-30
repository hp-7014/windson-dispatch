<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
$payment_data = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
$list = "";
$type = '"text"';
foreach ($payment_data as $row) {
    $show1 = $row['payment'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];    
        $paymentTerm = $row1['paymentTerm'];
        $counter = $row1['counter'];
        
        $column = '"paymentTerm"';
        $i++;
        $c_type1 = '"'.$paymentTerm.'"';
        $updatePayment = '"updatePayment"';
        $title = '"Name"';
        $pencilid1 = '"paymentTermPencil'.$i.'"';

        echo "<tr>
            <td> $i</td>
            <td class='custom-text' id='paymentTerm$i'
                onmouseover='showPencil_s($pencilid1)'
                onmouseout='hidePencil_s($pencilid1)'
                >
                <i id='paymentTermPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type1,$updatePayment,$type,$id,$column,$title,$pencilid1)'
                ></i>
                $paymentTerm
            </td>";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deletePayment($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
//         $list .= "<option value=$id)$paymentTerm></option>";
        $value = "'".$id.")&nbsp;".$paymentTerm."'";
        $list .= "<option value=$value></option>";
    }
}

//echo $table;
