<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $office_data = $db->office->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($office_data as $s_type) {
     $show1 = $s_type['office'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $officeName = $row1['officeName'];
         $officeLocation = $row1['officeLocation'];
         $column1 = 'officeName';
         $column2 = 'officeLocation';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateOffice(this,$column1, $id)'
                      onclick='activate(this)'>$officeName</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateOffice(this,$column2, $id)'
                      onclick='activate(this)'>$officeLocation</div>
             </td>
             <td><a href='#' onclick='deleteOffice( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }