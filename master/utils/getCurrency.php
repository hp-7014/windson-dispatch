<?php 
session_start();
$type = '"text"';
$helper = "helper";
require "../../database/connection.php";
 $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 $table = "";
 $list = "";
 $list1 = "";
 foreach ($show as $row) {
    $show1 = $row['currency'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $currencyType = $row1['currencyType'];
        $counter = $row1['counter'];
        $i++;
        $pencilid = '"currencyPencil'.$i.'"';
        $updateCurrency = '"updateCurrency"';
        $text = "'text'";
        $currencyType_S = '"currencyType"';
        $title = '"Currency Type"';
        $c_type = '"'.$currencyType.'"';
        
        $table .= "<tr>
            <th>$i</th>
            <td id='currencyType$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='currencyPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateCurrency,$type,$id,$currencyType_S,$title,$pencilid)'
                ></i>
                $currencyType
            </td>";

        if ($counter == 0) { 
            $table .= "<td><a href='#' onclick='deleteCurrency($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
        
        $list .= "<option value=".$id.">".$currencyType."</option>";
        $list1 .= "<option value=$id)$currencyType></option>";
    
    }
}

 echo $table."^".$list."^".$list1;