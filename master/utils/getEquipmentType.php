<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->equipment_add->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($show as $row) {
     $show1 = $row['equipment'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $equipmentType = $row1['equipmentType'];
         $column = 'equipmentType';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateEquipment(this,$column, $id)'
                      onclick='activate(this)'>$equipmentType</div>
             </td>
             <td><a href='#' onclick='deleteEquipment( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
