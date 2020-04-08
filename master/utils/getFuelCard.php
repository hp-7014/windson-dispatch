<?php 
session_start();
$type = '"text"';
$helper = "helper";
require "../../database/connection.php";
 $show = $db->fuel_Card_Type->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 $table = "";
 foreach ($show as $row) {
    $show1 = $row['fuelCard'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $fuelCardType = $row1['fuelCardType'];
        $counter = $row1['counter'];
        $i++;
        $pencilid = '"fuelCardTypePencil'.$i.'"';
        $updateFuelCard = '"updateFuelCard"';
        $text = "'text'";
        $fuelCardType_S = '"fuelCardType"';
        $title = '"Fuel Card Type"';
        $c_type = '"'.$fuelCardType.'"';
        
        echo "<tr>
            <th>$i</th>
            <td id='fuelCardType$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='fuelCardTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateFuelCard,$type,$id,$fuelCardType_S,$title,$pencilid)'
                ></i>
                $fuelCardType
            </td>";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteFuelCard($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
    }
}

 //echo $table."^".$list."^".$list1."^".$list2;