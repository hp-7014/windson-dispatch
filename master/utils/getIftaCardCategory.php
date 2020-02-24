<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $ifta_data = $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 foreach ($ifta_data as $row) {
     $show1 = $row['ifta_card'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $cardHolderName = $row1['cardHolderName'];
         $employeeNo = $row1['employeeNo'];
         $iftaCardNo = $row1['iftaCardNo'];
         $cardType = $row1['cardType'];
         $column1 = 'cardHolderName';
         $column2 = 'employeeNo';
         $column3 = 'iftaCardNo';
         $column4 = 'cardType';
         $no += 1;
         echo "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCardCat(this,$column1, $id)'
                      onclick='activate(this)'>$cardHolderName</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCardCat(this,$column2, $id)'
                      onclick='activate(this)'>$employeeNo</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCardCat(this,$column3, $id)'
                      onclick='activate(this)'>$iftaCardNo</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCardCat(this,$column4, $id)'
                      onclick='activate(this)'>$cardType</div>
             </td>
             <td><a href='#' onclick='deleteCardCat($id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }
