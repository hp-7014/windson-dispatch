<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $show = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 $table = "";
 $type = '"text"';
 foreach ($show as $row) {
     $show1 = $row['fixPay'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];    
         $fixPayType = $row1['fixPayType'];
         $i++;
         $pencilid = '"fixPayPencil'.$i.'"';
         $updatefixPay = '"updatefixPay"';
         $column = '"fixPayType"';
         $title = '"Fix Pay Type"';
         $c_type = '"'.$fixPayType.'"';

         $table .= "<tr>
             <td>$i</td>
             <td class='custom-text' id='fixPayType$i'
                onmouseover='showPencil_s($pencilid)'
                onmouseout='hidePencil_s($pencilid)'
                >
                <i id='fixPayPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type,$updatefixPay,$type,$id,$column,$title,$pencilid)'
                ></i>
                $fixPayType
             </td>
             <td><a href='#' onclick='deletefixpay( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";
      }
 }

 echo $table;
