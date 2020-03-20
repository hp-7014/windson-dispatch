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
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
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
         if(($liabilityExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Liability Insurance is Expiring in less than 30 days.</b>"."<br>";
         }
         if(($autoExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Auto Insurance is Expiring in less than 30 days.</b>"."<br>";
         }
         if(($cargoExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Cargo Insurance is Expiring in less than 30 days.</b>"."<br>";
         } 

         if($row['blacklisted']  == "on"){
            echo "- <b style='color:red;font-weight:bold;line-height:1.5'>This carrier is blacklisted.</b>"."<br>";
         }

         echo "^".$row['email'];

      }
   }
 
}

if($_POST['type'] == 'driver'){
   $id = (int)$_POST['value'];
   $collection = $db->driver;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
           ['$unwind'=>'$driver'],
           ['$match'=>['driver._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $driver = array();
   $k = 0;
   $driver[$k] = $row['driver'];
   $k++;
   foreach ($driver as $row) {
         $now = strtotime("now");
         $licenseExpiry = $row['driverLicenseExp'];
         $nextMedical = $row['driverNextMedical'];
         $nextDrug = $row['driverNextDrugTest'];
         $passportExpiry = $row['passportExpiry'];
         $fastcardexpiry = $row['fastCardExpiry'];
         $hazmatexpiry = $row['hazmatExpiry'];
         $loadedMile = $row['driverLoadedMile'];
         $emptyMile = $row['driverEmptyMile'];
         $tarp = $row['tarp'];
         $pickrate = $row['pickupRate'];
         $pickafter = $row['pickupAfter'];
         $droprate = $row['dropRate'];
         $dropafter = $row['dropAfter']; 
         if($licenseExpiry - $now <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>License is Expiring in less than 30 days.</b>"."<br>";
         }
         if(($nextMedical - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Next Medical is within 30 days.</b>"."<br>";
         }
         if(($nextDrug - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Next Drugtest is within 30 days.</b>"."<br>";
         } 
         if(($passportExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Passport is expiring in 30 days.</b>"."<br>";
         }
         if(($fastcardexpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Fast card is expiring in 30 days.</b>"."<br>";
         }
         if(($hazmatexpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Hazmat is expiring in 30 days.</b>"."<br>";
         } 
         
         echo "^".$loadedMile."^".$emptyMile."^".$tarp."^".$pickrate."^".$pickafter."^".$droprate."^".$dropafter;

      }
   }
 
}

if($_POST['type'] == 'truck'){
   $id = (int)$_POST['value'];
   $collection = $db->truckadd;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
           ['$unwind'=>'$truck'],
           ['$match'=>['truck._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $driver = array();
   $k = 0;
   $driver[$k] = $row['truck'];
   $k++;
   foreach ($driver as $row) {
         $now = strtotime("now");
         $plateExpiry = $row['plateExpiry'];
         $inspectionExpiry = $row['inspectionExpiry'];
         $dotExpiry  =$row['dotexpiryDate'];
         if($plateExpiry - $now <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>License plate is Expiring in less than 30 days.</b>"."<br>";
         }
         if(($inspectionExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Inspection expiry is within 30 days.</b>"."<br>";
         }
         if(($dotExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>DOT is expiring in 30 days.</b>"."<br>";
         } 

      }
   }
 
}

if($_POST['type'] == 'trailer'){
   $id = (int)$_POST['value'];
   $collection = $db->trailer_admin_add;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
           ['$unwind'=>'$trailer'],
           ['$match'=>['trailer._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $driver = array();
   $k = 0;
   $driver[$k] = $row['trailer'];
   $k++;
   foreach ($driver as $row) {
         $now = strtotime("now");
         $plateExpiry = $row['plateExpiry'];
         $inspectionExpiry = $row['inspectionExpiration'];
         $dotExpiry  =$row['dot'];
         if($plateExpiry - $now <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>License plate is Expiring in less than 30 days.</b>"."<br>";
         }
         if(($inspectionExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>Inspection expiry is within 30 days.</b>"."<br>";
         }
         if(($dotExpiry - $now)  <= 2592000){
            echo "- <b style='font-weight:bold;line-height:1.5'>DOT is expiring in 30 days.</b>"."<br>";
         } 

      }
   }
 
}


if($_POST['type'] == 'owner'){
   $id = (int)$_POST['value'];
   $collection = $db->owner_operator_driver;
   $show1 = $collection->aggregate([
       ['$lookup' => [
           'from' => 'driver',
           'localField' => 'companyID',
           'foreignField' => 'companyID',
           'as' => 'owner'
       ]],
              ['$match'=>['companyID'=>$_SESSION['companyId']]],
              ['$unwind'=>'$ownerOperator'],
              ['$match'=>['ownerOperator._id'=>$id]],
              ['$unwind'=>'$owner'],
              ['$unwind'=>'$owner.driver'],
              ['$match'=>['owner.driver._id'=>$id]]
       ]);
   
       foreach ($show1 as $row) {
       $ownerOperator = array();
       $owner = array();
       $c = 0;
       $ownerOperator[$c] = $row['ownerOperator'];
       $c++;
       $a = 0;
       $owner[$a] = $row['owner'];
       $a++;
       foreach ($ownerOperator as $row1) {
               $driverPercentage = $row1['percentage'];
               $drivertruck = $row1['truckNo'];
               echo $driverPercentage."^".$drivertruck."^";
       }
       foreach ($owner as $row2) {
           $b = 0;
           $driver[$b] = $row2['driver'];
           $b++;
           foreach ($driver as $row3) {
            $now = strtotime("now");
            $licenseExpiry = $row3['driverLicenseExp'];
            $nextMedical = $row3['driverNextMedical'];
            $nextDrug = $row3['driverNextDrugTest'];
            $passportExpiry = $row3['passportExpiry'];
            $fastcardexpiry = $row3['fastCardExpiry'];
            $hazmatexpiry = $row3['hazmatExpiry'];
            $loadedMile = $row3['driverLoadedMile'];
            $emptyMile = $row3['driverEmptyMile'];
            if($licenseExpiry - $now <= 2592000){
               echo "- <b style='font-weight:bold;line-height:1.5'>License is Expiring in less than 30 days.</b>"."<br>";
            }
            if(($nextMedical - $now)  <= 2592000){
               echo "- <b style='font-weight:bold;line-height:1.5'>Next Medical is within 30 days.</b>"."<br>";
            }
            if(($nextDrug - $now)  <= 2592000){
               echo "- <b style='font-weight:bold;line-height:1.5'>Next Drugtest is within 30 days.</b>"."<br>";
            } 
            if(($passportExpiry - $now)  <= 2592000){
               echo "- <b style='font-weight:bold;line-height:1.5'>Passport is expiring in 30 days.</b>"."<br>";
            }
            if(($fastcardexpiry - $now)  <= 2592000){
               echo "- <b style='font-weight:bold;line-height:1.5'>Fast card is expiring in 30 days.</b>"."<br>";
            }
            if(($hazmatexpiry - $now)  <= 2592000){
               echo "- <b style='font-weight:bold;line-height:1.5'>Hazmat is expiring in 30 days.</b>"."<br>";
            } 
           }
       }
       }
 
}

if($_POST['type'] == 'customer'){
   $id = (int)$_POST['value'];
   $collection = $db->customer;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
           ['$unwind'=>'$customer'],
           ['$match'=>['customer._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $customer = array();
   $k = 0;
   $customer[$k] = $row['customer'];
   $k++;
   foreach ($customer as $row) {
         echo $row['custEmail'];

      }
   }
}

if($_POST['type'] == 'shipper'){
   $id = (int)$_POST['value'];
   $collection = $db->shipper;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
           ['$unwind'=>'$shipper'],
           ['$match'=>['shipper._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $shipper = array();
   $k = 0;
   $shipper[$k] = $row['shipper'];
   $k++;
   foreach ($shipper as $row) {
         echo $row['shipperAddress']."^".$row['shipperLocation'];

      }
   }
}

if($_POST['type'] == 'consignee'){
   $id = (int)$_POST['value'];
   $collection = $db->consignee;
   $show1 = $collection->aggregate([
           ['$match'=>['companyID'=>$_SESSION['companyId']]],
           ['$unwind'=>'$consignee'],
           ['$match'=>['consignee._id'=>$id]]
   ]);
   
   foreach ($show1 as $row) {
     
   $consignee = array();
   $k = 0;
   $consignee[$k] = $row['consignee'];
   $k++;
   foreach ($consignee as $row) {
         echo $row['consigneeAddress']."^".$row['consigneeLocation'];

      }
   }
}

