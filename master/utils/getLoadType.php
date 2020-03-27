<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $load_data = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 $type = '"text"';
 $table = "";
 $list = "";
 foreach ($load_data as $s_type) {
    $show1 = $s_type['loadType'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $counter = $row1['counter'];
        $loadName = $row1['loadName'];
        $loadType = $row1['loadType'];
        $column1 = '"loadName"';
        $column2 = '"loadType"';
        $i++;
        $pencilid1 = '"loadPencil'.$i.'"';
        $pencilid2 = '"loadTypepencil'.$i.'"';
        $updateloadType = '"updateloadType"';
        $title1 = '"Load Name"';
        $title2 = '"Load Type"';
        $c_type1 = '"'.$loadName.'"';
        $c_type2 = '"'.$loadType.'"';

        echo "<tr>
             <td> $i</td>
             <td class='custom-text' id='loadName$i'
                onmouseover='showPencil_s($pencilid1)'
                onmouseout='hidePencil_s($pencilid1)'
                >
                <i id='loadPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type1,$updateloadType,$type,$id,$column1,$title1,$pencilid1)'
                ></i>
                $loadName
             </td>
             <td class='custom-text' id='loadType$i'
                onmouseover='showPencil_s($pencilid2)'
                onmouseout='hidePencil_s($pencilid2)'
                >
                <i id='loadTypepencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type2,$updateloadType,$type,$id,$column2,$title2,$pencilid2)'
                ></i>
                $loadType
             </td>";

         if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteloadType($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
         } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
         }

         $value = "'".$id.")&nbsp;".$loadName."'";
         //$list .= "<option value=$value></option>";
    }
      //echo $table."^".$list;
}