<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";
 $company_data = $db->company->find(['companyID' => $_SESSION['companyId']]);
 $no = 0;
 $option = "<option value='0'>--Select--</option>";
 $option1 = "<option value='0'>--Select--</option>";
 $table = "";
 foreach ($company_data as $s_type) {
     $show1 = $s_type['company'];
     foreach ($show1 as $row1) {
         $id = $row1['_id'];
         $companyName = $row1['companyName'];
         $shippingAddress = $row1['shippingAddress'];
         $telephoneNo = $row1['telephoneNo'];
         $faxNo = $row1['faxNo'];
         $mcNo = $row1['mcNo'];
         $usDotNo = $row1['usDotNo'];
         $mailingAddress = $row1['mailingAddress'];
         $factoringCompany = $row1['factoringCompany'];
         $factoringCompanyAddress = $row1['factoringCompanyAddress'];
         $column1 = 'companyName';
         $column2 = 'shippingAddress';
         $column3 = 'telephoneNo';
         $column4 = 'faxNo';
         $column5 = 'mcNo';
         $column6 = 'usDotNo';
         $column7 = 'mailingAddress';
         $column8 = 'factoringCompany';
         $column9 = 'factoringCompanyAddress';
         $no += 1;
         $table .= "<tr>
             <td> $no</td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column1, $id)'
                      onclick='activate(this)'>$companyName</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column2, $id)'
                      onclick='activate(this)'>$shippingAddress</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column3, $id)'
                      onclick='activate(this)'>$telephoneNo</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column4, $id)'
                      onclick='activate(this)'>$faxNo</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column5, $id)'
                      onclick='activate(this)'>$mcNo</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column6, $id)'
                      onclick='activate(this)'>$usDotNo</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column7, $id)'
                      onclick='activate(this)'>$mailingAddress</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column8, $id)'
                      onclick='activate(this)'>$factoringCompany</div>
             </td>
             <td>
                 <div contenteditable='true'
                      onblur='updateCompany(this,$column9, $id)'
                      onclick='activate(this)'>$factoringCompanyAddress</div>
             </td>
             <td><a href='#' onclick='deleteCompany( $id)'><i
                             class='mdi mdi-delete-sweep-outline'
                             style='font-size: 20px; color: #FC3B3B'></a></i>
             </td>
         </tr>";


         $option .= "<option value='$companyName'>$companyName</option>";
         $option1 .= "<option value='$id'>$companyName</option>";
      }
 }

 echo $table."^".$option."^".$option1;