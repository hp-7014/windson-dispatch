<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->bank_credit_category->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($show as $row) {
     $show1 = $row['bank_credit'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $bankName = $row1['bankName'];
         $column = 'bankName';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateBankCredit(this,$column, $id)'
                      >$bankName</div>
             </td>
             <td><a href='#' onclick='deleteBankCredit($id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
