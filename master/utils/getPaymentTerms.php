<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $payment_data = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
$list = "<option value='0'>--Select--</option>";
$table = "";
 foreach ($payment_data as $row) {
     $show1 = $row['payment'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $paymentTerm = $row1['paymentTerm'];
         $column = 'paymentTerm';
         $no += 1;
         $table .= "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updatePayment(this,$column, $id)'
                      onclick='activate(this)'>$paymentTerm</div>
             </td>
             <td><a href='#' onclick='deletePayment( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
//         $list .= "<option value=$id)$paymentTerm></option>";
         $value = "'".$id.")&nbsp;".$paymentTerm."'";
         $list .= "<option value=$value></option>";
      }
 }
 echo $table."^".$list;
