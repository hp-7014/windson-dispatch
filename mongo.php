<?php // Code to create connection and select database & collection

require 'vendor/autoload.php';
// session_start();
$connection = new MongoDB\Client("mongodb://127.0.0.1");
$db = $connection->WindsonDispatch;

$collection = $db->carrier;
// $no = 0;
// $collection->updateOne(['companyID' => 1, 'driver._id' => $no],
// ['$set' => ['driver.$.counter' => getCollectionSequence($no,$db->driver,"driver")]]
// );

// function getCollectionSequence($type,$collection1,$arrayName) {
//     $cursor = $collection1->find(['companyID' => 1],[
//         $arrayName => ['$elemMatch' => ['_id' => (int)$type]]
//     ]);
//     $array = iterator_to_array($cursor);
//     $id = 0;
//     foreach ($array as $value){
//         $counterID = $value[$arrayName];
//         foreach ($counterID as $row) {
//             if((int)$type == $row['_id']){
//                 $id = $row['counter'];
//             }
//         }
//     }
//     $id -= 1;
//     $collection1->updateOne(['companyID'=>1,$arrayName.'_id' => (int)$type],['$set'=>[$arrayName.'$.counter'=>$id]]);
//     return $id;
// }

// $collection->findOneAndUpdate(['companyID'=>1],['$set'=>['currency.$.counter'=>5]]);

// $db->driver->updateOne(['companyID' => (int)$_SESSION['companyId'], 'driver._id' => (int)$this->getId()],
// ['$set' => ['driver.$.' . $driver->getColumn() => $driver->getDriverName(),'driver.$.LastUpdateId' => $_SESSION['companyName']]]);

// $show1 = $collection->aggregate([
    
//     ['$match'=>['companyID'=>1]],
//     ['$project'=>['companyID'=>1,'trailer'=>['$slice'=>['$trailer',0,3]]]]
// ]);
//     foreach ($show1 as $row) {
//         $trailer = $row['trailer'];
//         foreach ($trailer as $row1) {
//             echo $row1['_id'];
//         } 
//     }


$show1 = $collection->aggregate([
    ['$lookup' => [
        'from' => 'payment_terms',
        'localField' => 'companyID',
        'foreignField' => 'companyID',
        'as' => 'paymentTerms'
    ]],
    ['$lookup' => [
        'from' => 'factoring_company_add',
        'localField' => 'companyID',
        'foreignField' => 'companyID',
        'as' => 'factoringCompany'
    ]],
    ['$match'=>['companyID'=>1]],
    ['$unwind'=>'$carrier'],
    ['$match'=>['carrier._id'=>0]]

    ]);

        foreach ($show1 as $row) {
            $carrier = array();
            $carrier[] = $row['carrier'];
            $paymentTerms = $row['paymentTerms'];
            $factoringCompany = $row['factoringCompany'];

            foreach ($paymentTerms as $row1) {
                $payment = $row1['payment'];
                $paymentTerm = array();
                foreach ($payment as $row2) {
                    $paymentid = $row2['_id'];
                    $paymentTerm[$paymentid] = $row2['paymentTerm'];
                }
            }

            foreach ($factoringCompany as $row3) {
                $factoring = $row3['factoring'];
                $factoringCompanyname = array();
                foreach ($factoring as $row4) {
                    $factoringid = $row4['_id'];
                    $factoringCompanyname[$factoringid] = $row4['factoringCompanyname'];
                }
            }

            foreach ($carrier as $row4) {
                    $carrierid = $row4['_id'];
                    $name = $row4['name'];
                    $address = $row4['address'];
                    $location = $row4['location'];
                    $zip = $row4['zip'];
                    $contactName = $row4['contactName'];
                    $email = $row4['email'];
                    $telephone = $row4['telephone'];
                    $ext = $row4['ext'];
                    $tollfree = $row4['tollfree'];
                    $fax = $row4['fax'];
                    $paymentTerms = $paymentTerm[$row4['paymentTerms']];
                    $taxID = $row4['taxID'];
                    $mc = $row4['mc'];
                    $dot = $row4['dot'];
                    $factoringCompany = $factoringCompanyname[$row4['factoringCompany']];
                    $carrierNotes = $row4['carrierNotes'];
                    $blacklisted = $row4['blacklisted'];
                    $corporation = $row4['corporation'];
                    $insuranceLiabilityCompany = $row4['insuranceLiabilityCompany'];
                    $insurancePolicyNo = $row4['insurancePolicyNo'];
                    $expiryDate = $row4['expiryDate'];
                    $insuranceTelephone = $row4['insuranceTelephone'];
                    $insuranceExt = $row4['insuranceExt'];
                    $insuranceContactName = $row4['insuranceContactName'];
                    $insuranceLiabilityAmount = $row4['insuranceLiabilityAmount'];
                    $insuranceNotes = $row4['insuranceNotes'];
                    $autoInsuranceCompany = $row4['autoInsuranceCompany'];
                    $autoInsPolicyNo = $row4['autoInsPolicyNo'];
                    $autoInsExpiryDate = $row4['autoInsExpiryDate'];
                    $autoInsTelephone = $row4['autoInsTelephone'];
                    $autoInsExt = $row4['autoInsExt'];
                    $autoInsContactName = $row4['autoInsContactName'];
                    $autoInsLiabilityAmount = $row4['autoInsLiabilityAmount'];
                    $autoInsuranceNotes = $row4['autoInsuranceNotes'];
                    $cargoCompany = $row4['cargoCompany'];
                    $cargoPolicyNo = $row4['cargoPolicyNo'];
                    $cargoExpiryDate = $row4['cargoExpiryDate'];
                    $cargoTelephone = $row4['cargoTelephone'];
                    $cargoExt = $row4['cargoExt'];
                    $cargoContactName = $row4['cargoContactName'];
                    $cargoInsuranceAmt = $row4['cargoInsuranceAmt'];
                    $WSIBNo = $row4['WSIBNo'];
                    $cargoNotes = $row4['cargoNotes'];
                    $primaryName = $row4['primaryName'];
                    $primaryTelephone = $row4['primaryTelephone'];
                    $primaryEmail = $row4['primaryEmail'];
                    $secondaryName = $row4['secondaryName'];
                    $secondaryTelephone = $row4['secondaryTelephone'];
                    $secondaryEmail = $row4['secondaryEmail'];
                    $accountingNotes = $row4['accountingNotes'];
                    $sizeOfFleet = $row4['sizeOfFleet'];
                    $equipmentNotes = $row4['equipmentNotes'];
                    $equipment = $row4['equipment'];
                    foreach ($equipment as $row5) {
                        $equipmenttype = $row5['equipment']."<br>";
                        $amount = $row5['amount'];                        
                    }

            }
        }

        //         foreach ($show1 as $row) {
        //             $customer = array();
        //             $customer[] = $row['customer'];
        //             $currencyType = $row['currencyType'];
        //             $factoringCompany = $row['factoringCompany'];
        //             $user = $row['user'];
        //             $paymentTerms = $row['paymentTerms'];

        //         foreach ($currencyType as $row2) {
        //             $currency = $row2['currency'];
        //             $currencyType = array();
        //             foreach ($currency as $row3) {
        //                 $currencyid = $row3['_id'];
        //                 $currencyType[$currencyid] = $row3['currencyType'];
        //             }
        //         }

        //         foreach ($factoringCompany as $row4) {
        //             $factoring = $row4['factoring'];
        //             $factoringCompanyname = array();
        //             foreach ($factoring as $row5) {
        //                 $factoringid = $row5['_id'];
        //                 $factoringCompanyname[$factoringid] = $row5['factoringCompanyname'];
        //             }
        //         }

        //         foreach ($user as $row6) {
        //             $user1 = $row6['user'];
        //             $userName = array();
        //             foreach ($user1 as $row7) {
        //                 $userid = $row7['_id'];
        //                 $userName[$userid] = $row7['userFirstName']." ".$row7['userLastName']; 
        //             }
        //         }

        //         foreach ($paymentTerms as $row8) {
        //             $payment = $row8['payment'];
        //             $payment_Term = array();
        //             foreach ($payment as $row9) {
        //                 $paymentid = $row9['_id'];
        //                 $payment_Term[$paymentid] = $row9['paymentTerm'];
        //             }
        //         }

        //         foreach ($customer as $row1) {
        //             $customerid = $row1['_id'];
        //             $custName = $row1['custName'];
        //             $custAddress = $row1['custAddress'];
        //             $custLocation = $row1['custLocation'];
        //             $custZip = $row1['custZip'];
        //             $billingAddress = $row1['billingAddress'];
        //             $billingLocation = $row1['billingLocation'];
        //             $billingZip = $row1['billingZip'];
        //             $primaryContact = $row1['primaryContact'];
        //             $custTelephone = $row1['custTelephone'];
        //             $custExt = $row1['custExt'];
        //             $custEmail = $row1['custEmail'];
        //             $custFax = $row1['custFax'];
        //             $billingContact = $row1['billingContact'];
        //             $billingEmail = $row1['billingEmail'];
        //             $billingTelephone = $row1['billingTelephone'];
        //             $billingExt = $row1['billingExt'];
        //             $URS = $row1['URS'];
        //             $currencySetting = $currencyType[$row1['currencySetting']];
        //             $paymentTerms = $payment_Term[$row1['paymentTerms']];
        //             $creditLimit = $row1['creditLimit'];
        //             $salesRep = $userName[$row1['salesRep']];
        //             $factoringCompany = $factoringCompanyname[$row1['factoringCompany']];
        //             $federalID = $row1['federalID'];
        //             $workerComp = $row1['workerComp'];
        //             $websiteURL = $row1['websiteURL'];
        //             $internalNotes = $row1['internalNotes'];
        //             $mc = $row1['MC'];
        //         }
        // }
        
                                    // $collection = $db->factoring_company_add;
                                    // $show1 = $collection->aggregate([
                                    //     ['$lookup' => [
                                    //         'from' => 'currency_add',
                                    //         'localField' => 'companyID', 
                                    //         'foreignField' => 'companyID',
                                    //         'as' => 'currency_1'
                                    //     ]],
                                    //     ['$lookup' => [
                                    //         'from' => 'payment_terms',
                                    //         'localField' => 'companyID', 
                                    //         'foreignField' => 'companyID',
                                    //         'as' => 'payment_1'
                                    //     ]],
                                    //     ['$match'=>['companyID'=>1]]
                                    //  ]);
                                    //  $i = 0;
                                    //  foreach ($show1 as $row) {
                                    //      $i++;
                                    //     $factoring = $row['factoring'];
                                    //     $currency_1 = $row['currency_1'];
                                    //     $payment_1 = $row['payment_1'];

                                    //     foreach ($currency_1 as $row2) {
                                    //         $i++;
                                    //         $currency = $row2['currency'];
                                    //         $currencyType = array();
                                    //         foreach ($currency as $row3) {
                                    //             $i++;
                                    //             $currencyid = $row3['_id'];
                                    //             $currencyType[$currencyid] = $row3['currencyType'];
                                    //         }
                                    //     }

                                    //     foreach ($payment_1 as $row4) {
                                    //         $i++;
                                    //             $payment = $row4['payment'];
                                    //             $paymentTerm = array();
                                    //             foreach ($payment as $row5) {
                                    //                 $i++;
                                    //               $paymentid = $row5['_id'];
                                    //               $paymentTerm[$paymentid] = $row5['paymentTerm'];  
                                    //             }
                                    //     }

                                    //     foreach ($factoring as $row1) {
                                    //         $i++;
                                    //         $id = $row1['_id'];
                                    //         $factoringCompanyname = $row1['factoringCompanyname'];
                                    //         $address = $row1['address'];
                                    //         $location = $row1['location'];
                                    //         $zip = $row1['zip'];
                                    //         $primaryContact = $row1['primaryContact'];
                                    //         $telephone = $row1['telephone'];
                                    //         $extFactoring = $row1['extFactoring'];
                                    //         $fax = $row1['fax'];
                                    //         $tollFree = $row1['tollFree'];
                                    //         $email = $row1['email'];
                                    //         $secondaryContact = $row1['secondaryContact'];
                                    //         $factoringtelephone = $row1['factoringtelephone'];
                                    //         $ext = $row1['ext'];
                                    //         $currencySetting = $currencyType[$row1['currencySetting']];
                                    //         $paymentTerms = $paymentTerm[$row1['paymentTerms']];
                                    //         $taxID = $row1['taxID'];
                                    //         $internalNote = $row1['internalNote'];
                                    //     }
                                    //  }
                                    //  echo $i;
// $collection = $db->customs_broker;
// $show1 = $collection->aggregate([
//    ['$match'=>['companyID'=>1]],
//    ['$project'=>['companyID'=>1,'custom_b'=>['$slice'=>[['$custom_b'],0,3]]]],
//    ['$unwind'=>'$custom_b'],
//    ['$match'=>['custom_b.delete_status'=>"0"]]
// ]);
// foreach ($show1 as $row) {
// $trailer1 = $row['custom_b'];
// foreach ($trailer1 as $row1) {
// $id = $row1['_id'];
// $name = $row1['brokerName'];
// echo $id ." ". $name ."<br>";
// }
// }

// $collection = $db->customs_broker;
// $show1 = $collection->aggregate([
//    ['$match'=>['companyID'=>1]],
//    ['$unwind'=>'$custom_b'],
//    ['$match'=>['custom_b.delete_status'=>"0"]],
//    ['$project'=>['companyID'=>1,'custom_b'=>['$slice'=>[['$custom_b'],0,3]]]]
// ]);
// foreach ($show1 as $row) {
// $trailer1 = $row['custom_b'];
// foreach ($trailer1 as $row1) {
// $id = $row1['_id'];
// $name = $row1['brokerName'];
// echo $id ." ". $name ."<br>";
// }
// }
// $collection = $db->active_load;

// $data = $collection->find(['companyID' => 1]);
// $count = 0;
// foreach ($data as $d) {
//     $count++;
// }

// if ($count == 1) {
//     $collection->updateOne(['companyID' => 1], ['$push' => [ 'invoice' => [
//             'invoiceNo' => '11087',
//             'customerID' => 1,
//             'truckID' => 1,
//             'trailerID' => 1,
//             'startLocation' => 'IN',
//             'endLocation' => 'MI',
//             'shipDate' => '1599238647',// store time stamp in second's
//             'consignee' => array([
//                 'consigneeName' => 'chetan',
//                 'ConsigneeLocation' => 'CH'
//             ]),
//             'shipperName' => array([
//                 'shipperName' => 'hasmukh',
//                 'ShipperLocation' => 'NY',
//             ]),
//         ]
//     ]]);
// } else {
//     $collection->insertOne([
//         '_id' => 2,
//         'companyID' => 1,
//         'counter' => 1,
//         'invoice' => array([
//             'invoiceNo' => '11043',
//             'customerID' => 1,
//             'truckID' => 1,
//             'trailerID' => 1,
//             'startLocation' => 'IN',
//             'endLocation' => 'MI',
//             'shipDate' => '07-02-2020',// store time stamp in second's
//             'consignee' => array([
//                 'consigneeName' => 'chetan',
//                 'ConsigneeLocation' => 'CH'
//             ]),
//             'shipperName' => array([
//                 'shipperName' => 'hasmukh',
//                 'ShipperLocation' => 'NY',
//             ]),
//         ])
//     ]);
// }

// $collection = $db->active_load;

// $data = $collection->find(['companyID' => 1]);
// $count = 0;
// foreach ($data as $d) {
//     $count++;
// }

// if ($count == 1) {
//     $collection->updateOne(['companyID' => 1], ['$push' => [ 'invoice' => [
//             'invoiceNo' => '11087',
//             'customerID' => 1,
//             'truckID' => 1,
//             'trailerID' => 1,
//             'startLocation' => 'IN',
//             'endLocation' => 'MI',
//             'shipDate' => '1599238647',// store time stamp in second's
//             'consignee' => array([
//                 'consigneeName' => 'chetan',
//                 'ConsigneeLocation' => 'CH'
//             ]),
//             'shipperName' => array([
//                 'shipperName' => 'hasmukh',
//                 'ShipperLocation' => 'NY',
//             ]),
//         ]
//     ]]);
// } else {
//     $collection->insertOne([
//         '_id' => 2,
//         'companyID' => 1,
//         'counter' => 1,
//         'invoice' => array([
//             'invoiceNo' => '11043',
//             'customerID' => 1,
//             'truckID' => 1,
//             'trailerID' => 1,
//             'startLocation' => 'IN',
//             'endLocation' => 'MI',
//             'shipDate' => '07-02-2020',// store time stamp in second's
//             'consignee' => array([
//                 'consigneeName' => 'chetan',
//                 'ConsigneeLocation' => 'CH'
//             ]),
//             'shipperName' => array([
//                 'shipperName' => 'hasmukh',
//                 'ShipperLocation' => 'NY',
//             ]),
//         ])
//     ]);
// }




//$data = $collection->aggregate([
//    ['$lookup' => [
//        'from' => 'consignee',
//        'localField' => 'companyID',
//        'foreignField' => 'companyID',
//        'as' => 'consigneeCollection'
//    ]]
//]);


//$data = $collection->find(['companyID' => 1]);


// $data = $collection->find()->limit(1);
// foreach ($data as $d) {
//     print_r($d);
// }
//update
//        $collection->updateOne(
//            ['companyID' => 1 ,'currency._id'=> 2],
//            ['$set' => ['currency.$.currencyType'=>'test 2 chetan']
//            ]);
// code to insert single entry in collection

//$db->payment_terms->insertOne([
//    "_id" => 2,
//    "category" => "Chutney",
//    "price" => 150
//]);
//$show = $collection->find(['user._id' => 0]);
//foreach ($show as $s) {
//    print_r($s);
//    $s1 = $s['user'];
////    foreach ($s1 as $s2) {
////        print_r($s2);
////    }
//}
// code to create a nested collection

//$collection->updateOne(['_id' => 2],['$set'=>['PackSizes'=>[[
//'_id'=>126,
//'PackSizeName'=>'abcd',
//'unitname'=>'pqr'
//]]]]);

//Code to push more items in embedded collection
//$collection->updateOne(['_id' => 2],['$push'=>['payment'=>[
//'_id'=>getNextSequence(2,$collection),
//'PackSizeName'=>'abcd'
//]]]);
//
//function getDocumentSequence($key,$collection) {
//   $cursor = $collection->find(['_id'=>$key]);
//   $array = iterator_to_array($cursor);
//   $id = 0;
//   foreach ($array as $value){
//       $id = $value['counter'];
//   }
//   $id += 1;
//   $collection->findOneAndUpdate(['_id'=>$key],['$set'=>['counter'=>$id]]);
//
//   return $id;
//}

//// code to find single entry based on id and printing its specific field
//$cursor = $collection->findOne(array('_id'=>2));
//
//echo $cursor["Url"];
//
//// code to fetch entire collection and display each document values in a tabular form
//
//$cursor = $collection->find();
//
//$array = iterator_to_array($cursor);
//
//foreach ( $array as $value){
//echo $value['category']." ".$value['itemnumber']." ".$value['name']." ".$value['price']."<br>";
//}

// code to fetch the embedded collection based on some value and print the entire sub collection

//$cursor = $collection->find(['companyID' => 1],['user._id' => 1]);

//$array = iterator_to_array($cursor);

//foreach ($cursor as $value) {
////    $array1 = iterator_to_array($value['user']);
//    $array1 = $value['user'];
//    foreach ($array1 as $value1) {
//        print_r($value1);
//    }
//}


// code to update the entries of embedded document through certain parameters
//$collection->updateOne(['_id'=>2,'details._id'=>'4'],['$set'=>['details.$.thali_type'=>'fixed']]);
// $start = (int)$_REQUEST['start'];
// $end = (int)$_REQUEST['limit'];
 
// $cursor = $db->customs_broker->find(array('companyID'=>$_SESSION['companyId']),array('projection'=>array('custom_b'=>array('$slice'=>[$start,$end]))));


// foreach ($cursor as $value) {
//         $array1 = $value['custom_b'];
//         foreach($array1 as $value1){
//             echo $value1['brokerName'];
//             echo "<br>";
//         }
        
//     }

// $cursor = $db->owner_operator_driver->aggregate([
//     ['$match'=>['companyID'=>$_SESSION['companyId']]],
//      ['$lookup'=>[
//             'from'=> "driver",  
//             'localField'=> "companyID",  
//             'foreignField'=> "companyID",
//             'as' => "owner"        
//      ]
    
//     ]]);
// db.owner_operator_driver.aggregate([
//    {
//      $lookup:{
//          from: "driver",  
//          localField: "companyID",  
//          foreignField: "companyID",
//          as: "owner"        
//      }
//  },
// { $project: {"owner.driver.driverName":1} },
// { $unwind: {
//     path: "$owner.driver",
//     preserveNullAndEmptyArrays: true
//     } },
//     {$match:{"owner.driver.driverName":"chetan"}}
// ])


// $collection = $db->owner_operator_driver;
// $show1 = $collection->aggregate([
//     ['$lookup' => [
//         'from' => 'driver',
//         'localField' => 'companyID',
//         'foreignField' => 'companyID',
//         'as' => 'owner'
//     ]],
//            ['$match'=>['companyID'=>1]],
//            ['$unwind'=>'$ownerOperator'],
//            ['$match'=>['ownerOperator._id'=>1]],
//            ['$unwind'=>'$owner'],
//            ['$unwind'=>'$owner.driver'],
//            ['$match'=>['owner.driver._id'=>1]]
//     ]);

//     foreach ($show1 as $row) {
//     $ownerOperator = array();
//     $owner = array();
//     $c = 0;
//     $ownerOperator[$c] = $row['ownerOperator'];
//     $c++;
//     $a = 0;
//     $owner[$a] = $row['owner'];
//     $a++;
//     foreach ($ownerOperator as $row1) {
//             $driverId = $row1['driverId'];
//             echo $driverId."<br>";
//     }
//     foreach ($owner as $row2) {
//         $b = 0;
//         $driver[$b] = $row2['driver'];
//         $b++;
//         foreach ($driver as $row3) {
//             $driverName = $row3['_id'];
//             echo $driverName; 
//         }
//     }
//     }

// $collection = $db->shipper;
// $show1 = $collection->aggregate([
//            ['$match'=>['companyID'=>1]],
//            ['$unwind'=>'$shipper'],
//            ['$match'=>['shipper.shipperStatus'=>"InActive"]]
//     ]);

//     foreach ($show1 as $row) {
//         $s = 0;
//         $shipper[$s] = $row['shipper'];
//         $s++;
//         foreach ($shipper as $row1) {
//             echo $row1['shipperName']."<br>";
//         }
//     }
// foreach ($show1 as $row) {
//     $ownerOperator = array();
//     $c = 0;
//     $ownerOperator[$c] = $row['ownerOperator'];
//     $c++;
//     $owner = $row['owner'];
//     $drivername = array();
//     foreach ($owner as $row2) {
//                 $owner1 = $row2['driver'];
//                 $k = 0;
//                 foreach ($owner1 as $row3) {
//                     $id = $row3['_id'];
//                     $drivername[$k] = $id." ".$row3['driverName'];
//                     $k++;
//                 }    
//         }

//     $j = 0;
//             foreach ($ownerOperator as $row1) {
//                 $drivername1 = $drivername[$row1['driverId']];
//                 $j++;
//                 echo $drivername1."<br>";
//             }
//         }
// parseFloat(rateAmount) +
// $show1 = $db->load_type->aggregate([
//     ['$match'=>['companyID'=>$_SESSION['companyId']]],
//     ['$unwind'=>'$loadType'],
//     ['$match'=>['loadType._id'=>0]]]);
//     foreach ($show1 as $showloadtype) {
//         $k = 0;
//         $load[$k] = $showloadtype['loadType'];
//         $k++;
//         foreach ($load as $sl) {
//            echo $sl['loadType'];
//         }
//      } 

// $n = 5;
// for ($i= 1; $i<=$n; $i++) {
//     for ($j=$n-$i; $j>=1; $j--) {
//         echo " ";
//     }
//     for ($k=1; $k<=2*$i-1; $k++) {
//         echo "<br>";
//     }
// }


// $broker = $db->carrier->find(array('companyID'=>$_SESSION['companyId']),array('projection'=>array('carrier'=>array('$match'=>['_id'=>0]))));
// $show1 = $db->carrier->aggregate([
//    ['$match'=>['companyID'=>$_SESSION['companyId']]],
//    ['$unwind'=>['$carrier']],
//    ['$match'=>['carrier._id'=>0]]
// ]);

// foreach($show1 as $value){
//    $carrier  =array();
//    $k = 0;
//    $carrier[$k] = $value['carrier'];
//    $k++;
//    foreach($carrier as $carr){
//       echo $carr['zip']."<br>";
//    }
// }

// $collection = $db->carrier;
// $show1 = $collection->aggregate([
//         ['$match'=>['companyID'=>2]],
//         ['$unwind'=>'$carrier'],
//         ['$match'=>['carrier._id'=>0]]
// ]);
// $i = 0;
// foreach ($show1 as $row) {
//    $i++;
// $carrier = array();
// $k = 0;
// $carrier[$k] = $row['carrier'];
// $k++;
// foreach ($carrier as $row1) {
//    $i++;
// echo $row1['_id']."<br>";
// }
// }
// echo "val of i"." ".$i;