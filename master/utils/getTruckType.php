<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->truck_add->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($show as $row) {
     $show1 = $row['truck'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $truckType = $row1['truckType'];
         $column = 'truckType';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                <div contenteditable='true'
                    onblur='updateTruck(this,$column, $id)'
                    onclick='activate(this)'>$truckType</div>
             </td>
             <td><a href='#' onclick='deleteTruck( $id)'><i
                        class='mdi mdi-delete-sweep-outline'
                        style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
