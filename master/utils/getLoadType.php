<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $load_data = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 $table = "";
 $list = "";
 foreach ($load_data as $s_type) {
     $show1 = $s_type['loadType'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $loadName = $row1['loadName'];
         $loadType = $row1['loadType'];
         $column1 = 'loadName';
         $column2 = 'loadType';
         $no += 1;
         $table .= "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateloadType(this,$column1, $id)'
                      onclick='activate(this)'>$loadName</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateloadType(this,$column2, $id)'
                      onclick='activate(this)'>$loadType</div>
             </td>
             <td><a href='#' onclick='deleteloadType($id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
         $value = "'".$id.")&nbsp;".$loadName."'";
         $list .= "<option value=$value></option>";
      }
      echo $table."^".$list;
 }