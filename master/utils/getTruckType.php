<?php 
session_start();
$helper = "helper";
$table = "";
$list = "";
$type = '"text"';
require "../../database/connection.php";
 $show = $db->truck_add->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 foreach ($show as $row) {
    $show1 = $row['truck'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];    
        $truckType = $row1['truckType'];
        $counter = $row1['counter'];

        $i++;
        $pencilid = '"TruckPencil'.$i.'"';
        $updateTruck = '"updateTruck"';
        $truck_Type = '"truckType"';
        $title = '"Truck Type"';
        $c_type = '"'.$truckType.'"';

        echo "<tr>
            <th> $i</th>
            <td id='truckType$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='TruckPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateTruck,$type,$id,$truck_Type,$title,$pencilid)'
                ></i>
                $truckType
            </td>";
        
        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteTruck($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
        
        $value = "'".$id.")&nbsp;".$truckType."'";
        $list .= "<option value=$value></option>";
    }
 }

 //echo $table;

 