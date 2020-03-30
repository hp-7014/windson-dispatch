<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $office_data = $db->office->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 $table = "";
 $type = '"text"';
 foreach ($office_data as $s_type) {
     $show1 = $s_type['office'];
     foreach ($show1 as $row1) {
         $counter = $row1['counter'];
         $id = $row1['_id'];
         $officeName = $row1['officeName'];
         $officeLocation = $row1['officeLocation'];
         $column1 = '"officeName"';
         $column2 = '"officeLocation"';
         $i++;
         $pencilid1 = '"officePencil'.$i.'"';
         $pencilid2 = '"officeLocPencil'.$i.'"';
         $updateOffice = '"updateOffice"';
         $title1 = '"Office Name"';
         $title2 = '"Office Location"';
         $c_type1 = '"'.$officeName.'"';
         $c_type2 = '"'.$officeLocation.'"';
         
         echo "<tr>
             <td> $i</td>
             <td class='custom-text' id='officeName$i'
                onmouseover='showPencil_s($pencilid1)'
                onmouseout='hidePencil_s($pencilid1)'
                >
                <i id='officePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type1,$updateOffice,$type,$id,$column1,$title1,$pencilid1)'
                ></i>
                $officeName
             </td>
             <td class='custom-text' id='officeLocation$i'
                onmouseover='showPencil_s($pencilid2)'
                onmouseout='hidePencil_s($pencilid2)'
                >
                <i id='officeLocPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type2,$updateOffice,$type,$id,$column2,$title2,$pencilid2)'
                ></i>
                $officeLocation
             </td>";

         if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteOffice($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
         } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
         }
      }
 }

 //echo $table;