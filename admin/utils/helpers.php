<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";

if($_POST['type'] == 'enableUnit'){
    $id = (int)$_POST['value'];
   
    $show1 = $db->load_type->aggregate([
      ['$match'=>['companyID'=>$_SESSION['companyId']]],
      ['$unwind'=>'$loadType'],
      ['$match'=>['loadType._id'=>$id]]]);
      foreach ($show1 as $showloadtype) {
          $k = 0;
          $load[$k] = $showloadtype['loadType'];
          $k++;
          foreach ($load as $sl) {
             echo $sl['loadType'];
          }
       } 
  
}

if($_POST['type'] == 'carrier'){
   $id = (int)$_POST['value'];
   $collection = $db->carrier;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>2]],
           ['$unwind'=>'$carrier'],
           ['$match'=>['carrier._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $carrier = array();
   $k = 0;
   $carrier[$k] = $row['carrier'];
   $k++;
   foreach ($carrier as $row) {
         $now = strtotime("now");
         $liabilityExpiry = strtotime($row['expiryDate']);
         $autoExpiry = strtotime($row['autoInsExpiryDate']);
         $cargoExpiry = strtotime($row['cargoExpiryDate']);
         if($row['insuranceLiabilityCompany'] == "" || $row['insurancePolicyNo'] == "" || $row['expiryDate'] == "" || $row['insuranceTelephone'] == "" || $row['insuranceExt'] =="" || $row['insuranceContactName'] == "" || $row['insuranceLiabilityAmount'] == "" || $row['autoInsuranceCompany'] == "" || $row['autoInsPolicyNo'] == "" || $row['autoInsExpiryDate'] == "" || $row['autoInsTelephone'] == "" || $row['autoInsExt'] == "" || $row['autoInsContactName'] == "" || $row['autoInsLiabilityAmount'] == "" || $row['cargoCompany'] == "" || $row['cargoPolicyNo'] == "" || $row['cargoExpiryDate'] == "" || $row['cargoTelephone'] == "" || $row['cargoExt'] == "" || $row['cargoContactName'] == "" || $row['cargoInsuranceAmt'] == "" || $row['WSIBNo'] == "")
         {
               echo "- <b style='font-weight:bold;line-height:1.5'>Some fields are empty.</b>"."<br>";
         }
         if(($now - $liabilityExpiry)  >= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Liability Insurance is Expired.</b>"."<br>";
         }
         if(($now - $autoExpiry)  >= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Auto Insurance is Expired.</b>"."<br>";
         }
         if(($now - $cargoExpiry)  >= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Cargo Insurance is Expired.</b>"."<br>";
         } 

         if($row['blacklisted']  == "on"){
            echo "- <b style='color:red;font-weight:bold;line-height:1.5'>This carrier is blacklisted.</b>"."<br>";
         }

      }
   }
 
}

