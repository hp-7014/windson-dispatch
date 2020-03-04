<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 $table = "";
 $list = "<option value='0'>--Select--</option>";
 $list1 = "<option value='0'>--Select--</option>";
 $list2 = "<option value='0'>--Select--</option>";
 foreach ($show as $row) {
     $show1 = $row['currency'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $currencyType = $row1['currencyType'];
         $column = 'currencyType';
         $no += 1;
         $table .= "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCurrency(this,$column, $id)'
                      onclick='activate(this)'>$currencyType</div>
             </td>
             <td><a href='#' onclick='deleteCurrency( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
         $list .= "<option value=".$id.">".$currencyType."</option>";
         $list1 .= "<option value=$id)$currencyType></option>";
         $list2 .= "<option value=$id>$currencyType</option>";
      }
 }

 echo $table."^".$list."^".$list1."^".$list2;
