<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 $table = "";
 $list = "";
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
         $value = "'".$id.")&nbsp;".$currencyType."'";
         $list .= "<option value=$value></option>";
      }
 }

 echo $table."^".$list;
