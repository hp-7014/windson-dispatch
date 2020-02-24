<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->credit_card_category->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($show as $row) {
     $show1 = $row['credit_card'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $cardName = $row1['cardName'];
         $column = 'cardName';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                <div contenteditable='true'
                    onblur='updateBankCard(this,$column, $id)'
                    >$cardName</div>
             </td>
             <td><a href='#' onclick='deleteBankCard($id)'><i
                        class='mdi mdi-delete-sweep-outline'
                        style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
