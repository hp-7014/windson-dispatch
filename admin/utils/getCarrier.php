<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
$no = 0;
$table = "";

foreach ($show as $row) {
    $show1 = $row['carrier'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $name = $row1['name'];
        $address = $row1['address'];
        $contactName = $row1['contactName'];
        $email = $row1['email'];
        $telephone = $row1['telephone'];
        $mc = $row1['mc'];
        $dot = $row1['dot'];
        $factoringCompany = $row1['factoringCompany'];
        $column = 'currencyType';
        $no += 1;
        $table .= "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'>$name</div>
             </td>
             <td>
                 <div contenteditable='true'>$address</div>
             </td>
             <td>
                 <div contenteditable='true'>$contactName</div>
             </td>
             <td>
                 <div contenteditable='true'>$email</div>
             </td>
             <td>
                 <div contenteditable='true'>$telephone</div>
             </td>
             <td>
                 <div contenteditable='true'>$mc</div>
             </td>
             <td>
                 <div contenteditable='true'>$dot</div>
             </td>
             <td>
                 <div contenteditable='true'>$factoringCompany</div>
             </td>
             <td><a href='#' onclick='deleteCurrency($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";

    }
}

echo $table;
