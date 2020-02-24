<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $status = $db->status_type->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($status as $s_type) {
     $show1 = $s_type['status'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $status_name = $row1['status_name'];
         $status_color = $row1['status_color'];
         $column1 = 'status_name';
         $column2 = 'status_color';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateStatus(this,$column1, $id)'
                      onclick='activate(this)'>$status_name</div>
             </td>
             <td> 
                <div contenteditable='true'>
                <input class='form-control' type='color' value='$status_color' name='status_color' onchange='update_Status(this.value,$column2, $id)'></div>
             </td>
             <td><a href='#' onclick='deleteStatus( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }