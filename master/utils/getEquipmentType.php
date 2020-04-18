<?php 
session_start();
$helper = "helper";
$type = '"text"';
$list = "";
require "../../database/connection.php";
$show = $db->equipment_add->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
foreach ($show as $row) {
    $show1 = $row['equipment'];
    foreach ($show1 as $row1) {
        $id = $row1['_id']; 
        $counter = $row1['counter'];   
        $equipmentType = $row1['equipmentType'];
        $i++;
        $pencilid = '"equipmentPencil'.$i.'"';
        $updateEquipment = '"updateEquipment"';
        $equipment_Type = '"equipmentType"';
        $title = '"Equipment Type"';
        $c_type = '"'.$equipmentType.'"';
        
        $table .= "<tr>
            <th> $i</th>
            <td class='custom-text' id='equipmentType$i'
            onmouseover='showPencil_s($pencilid)'
            onmouseout='hidePencil_s($pencilid)'
            >
            <i id='equipmentPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                onclick='updateTableColumn($c_type,$updateEquipment,$type,$id,$equipment_Type,$title,$pencilid)'
            ></i>
            $equipmentType
            </td>";

        if ($counter == 0) { 
        $table .= "<td><a href='#' onclick='deleteEquipment($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
        $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }

        $value = "'".$id.")&nbsp;".$equipmentType."'";
        $list .= "<option value=$value></option>";
    }

    echo $table ."^". $list;
}