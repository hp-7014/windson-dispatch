<?php 
session_start();
$helper = "helper";
$type = '"text"';
require "../../database/connection.php";
 $ifta_data = $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);
 $i = 0;
 foreach ($ifta_data as $row) {
     $show1 = $row['ifta_card'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];  
         $counter = $row1['counter'];  
         $cardHolderName = $row1['cardHolderName'];
         $employeeNo = $row1['employeeNo'];
         $iftaCardNo = $row1['iftaCardNo'];
         $cardType = $row1['cardType'];
         $updateCardCat = '"updateCardCat"';
         $i++;
         $column1 = '"cardHolderName"';
         $column2 = '"iftaCardNo"'; 
         $column3 = '"cardType"';

         $pencilid1 = '"cardHolderNamePencil'.$i.'"';
         $pencilid2 = '"iftaCardNoPencil'.$i.'"';
         $pencilid3 = '"cardTypePencil'.$i.'"';
        
         $title1 = '"Card Holder Name"';
         $title2 = '"IFTA Card No."';
         $title3 = '"Card Type."';

         $c_type1 = '"'.$cardHolderName.'"';
         $c_type2 = '"'.$iftaCardNo.'"';
         $c_type3 = '"'.$cardType.'"';

         echo "<tr>
            <th> $i</th>
            <td class='custom-text' id='cardHolderName$i'
                onmouseover='showPencil_s($pencilid1)'
                onmouseout='hidePencil_s($pencilid1)'
                >
                <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type1,$updateCardCat,$type,$id,$column1,$title1,$pencilid1)'
                ></i>
                $cardHolderName
            </td>
            <td class='custom-text' id='iftaCardNo$i'
                onmouseover='showPencil_s($pencilid2)'
                onmouseout='hidePencil_s($pencilid2)'
                >
                <i id='iftaCardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type2,$updateCardCat,$type,$id,$column2,$title2,$pencilid2)'
                ></i>
                $iftaCardNo
            </td>
            <td class='custom-text' id='cardType$i'
                onmouseover='showPencil_s($pencilid3)'
                onmouseout='hidePencil_s($pencilid3)'
                >
                <i id='cardTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type3,$updateCardCat,$type,$id,$column3,$title3,$pencilid3)'
                ></i>
                $cardType
            </td> ";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteCardCat($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }

      }
 }