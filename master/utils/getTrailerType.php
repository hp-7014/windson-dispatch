<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->trailer_add->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($show as $row) {
     $show1 = $row['trailer'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $trailerType = $row1['trailerType'];
         $column = 'trailerType';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateTrailer(this,$column, $id)'
                      onclick='activate(this)'>$trailerType</div>
             </td>
             <td><a href='#' onclick='deleteEquipment( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
