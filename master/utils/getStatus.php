<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
$status = $db->status_type->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
$type = '"text"';
foreach ($status as $s_type) {
    $show1 = $s_type['status'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $status_name = $row1['status_name'];
        $i++;
        $pencilid = '"statusPencil'.$i.'"';
        $updateStatus = '"updateStatus"';
        $column = '"status_name"';
        $title = '"Status Type"';
        $c_type = '"'.$status_name.'"';
        $status_color = $row1['status_color'];
        $column2 = '"status_color"';
         
        $table .= "<tr>
            <td> $i</td>
            <td class='custom-text' id='statusPencil$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateStatus,$type,$id,$column,$title,$pencilid)'
                ></i>
                $status_name
            </td>
            <td> 
                <input class='form-control' type='color' value='$status_color' name='status_color' onchange='update_Status(this.value,$column2, $id)'>
            </td>
            <td><a href='#' onclick='deleteStatus( $id)'><i
                    class='mdi mdi-delete-sweep-outline'
                    style='font-size: 20px; color: #FC3B3B'></a></i>
            </td>
        </tr>";
    }
}

echo $table;