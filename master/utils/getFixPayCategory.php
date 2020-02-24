<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($show as $row) {
     $show1 = $row['fixPay'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $fixPayType = $row1['fixPayType'];
         $column = 'fixPayType';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updatefixPay(this,$column, $id)'
                      onclick='activate(this)'>$fixPayType</div>
             </td>
             <td><a href='#' onclick='deletefixpay( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
