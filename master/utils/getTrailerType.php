<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->trailer_add->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$table = "";
$type = '"text"';
foreach ($show as $row) {
    $show1 = $row['trailer'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];    
        $trailerType = $row1['trailerType'];
        $counter = $row1['counter'];

        $i++;
        $pencilid = '"equipmentPencil'.$i.'"';
        $updateTrailer = '"updateTrailer"';
        $trailer_Type = '"trailerType"';
        $title = '"Trailer Type"';
        $c_type = '"'.$trailerType.'"';
         
        echo "<tr>
            <td> $i</td>
            <td class='custom-text' id='trailerType$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='equipmentPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updateTrailer,$type,$id,$trailer_Type,$title,$pencilid)'
                ></i>
                $trailerType
            </td>";
        

        if ($counter == 0) {
            echo "<td><a href='#' onclick='deleteTrailer($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }
        
        $value = "'".$id.")&nbsp;".$trailerType."'";
    }
}

 //echo $table;
