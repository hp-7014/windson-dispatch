<?php // Code to create connection and select database & collection

require 'vendor/autoload.php';
// session_start();
$connection = new MongoDB\Client("mongodb://127.0.0.1");
$db = $connection->WindsonDispatch;
$collection = $db->carrier;
//$collection->updateOne(['companyID' => 1], [
//        '$pull' => ['Delivered' => ['_id' => 3]]]
//);
// $show = $db->active_load->find(['companyID' => 1]);
// $i = 0;
// foreach($show as $row) {
//     $i++;
//     $invoice = $row['Invoiced'];
//     foreach ($invoice as $row1) {
//         $i++;
//         if ($row1['driver_name'] == "1") {
//             $driverid = $row1['_id'];
//             $drivertotle = $row1['driver_total'];
//             echo $driverid.") ".$drivertotle . "<br>";
//         }
//     }
// }
// echo $i;

$collection = $db->active_load;
$show1 = $collection->aggregate([
        ['$match'=>['companyID'=>1]],
        ['$unwind'=>'$Invoiced'],
        ['$match'=>['Invoiced.driver_name'=>"1"]]
]);
$i = 0;
foreach ($show1 as $row) {
$i++;
$Invoiced = array();
$k = 0;
$Invoiced[$k] = $row['Invoiced'];
$k++;
foreach ($Invoiced as $row) {
    $i++;
    echo $row['_id'].")".$row['driver_total']."<br>";
    $other_charges_modal = $row['other_charges_modal'];
    foreach ($other_charges_modal as $row2) {
        $i++;
        echo $row2['description']." ".$row2['amount']."<br>";
    }
   }
}
echo $i;

                                    // $collection = $db->bank_admin;
                                    // $show1 = $collection->aggregate([
                                    //     ['$lookup' => [
                                    //         'from' => 'company',
                                    //         'localField' => 'companyID', 
                                    //         'foreignField' => 'companyID',
                                    //         'as' => 'company'
                                    //     ]],
                                    //     ['$match'=>['companyID'=>1]]
                                    //  ]);

                                    //  foreach ($show1 as $row) {
                                    //      $admin_bank = $row['admin_bank'];
                                    //      $company = $row['company'];
                                    //      $companyName = array();
                                    //      foreach ($company as $row1) {
                                    //         $company1 = $row1['company'];
                                    //         foreach ($company1 as $row2) {
                                    //             $companyid = $row2['_id'];
                                    //             $companyName[$companyid] = $row2['companyName'];
                                    //         }
                                    //      }
                                    //      foreach ($admin_bank as $row3) {
                                    //         $accountHolder = $companyName[$row3['accountHolder']];
                                    //         echo $accountHolder;
                                    //      }
                                    //  }
//$show1 = $db->active_load->find(['companyID' => 1],['activeload' => ['$slice' => 5]]);
// $show1 = $db->active_load->find(array('companyID' => 1), array('projection' => array('activeload' => array('$slice' => [0,5]))));
// foreach ($show1 as $show) {
//     foreach ($show['activeload'] as $s){
//         print_r($s);
//     }
// }

//$old_value = "Delivered";
//$new_value = "Loaded";
//$id = 0;
//$idname = "._id";
//
//$cursor = $collection->find(["companyID" => 1],["Delivered" => ['$elemMatch' => ['_id' => 6]]]);
//$array = iterator_to_array($cursor);
//foreach ($array as $value){
//    $counterID = $value['Delivered'];
//    foreach ($counterID as $row) {
//        if(6 == $row['_id']){
//            $id = $row['_id'];
//        }
//    }
//}
//
//$collection->updateOne(['companyID' => 1], ['$push' => ["Loaded" => [
//    '_id' => $id,
//]]]);

//$collection->update(['companyID' => 1],['$pop' => ['Delivered' => ['Delivered.$._id' => 5]]]);


//db.mycollection.update(
//    {'_id': ObjectId("576b63d49d20504c1360f688")},
//    { $pull: { "books" : { "title": "abc" } } },
//false,
//true
//);

//function getDocumentSequenceId($type,$collection1,$arrayName,$companyid) {
//    $cursor = $collection1->find(['companyID' => $companyid],[
//        $arrayName => ['$elemMatch' => ['_id' => (int)$type]]
//    ]);
//    $array = iterator_to_array($cursor);
//    $id = 0;
//    foreach ($array as $value){
//        $counterID = $value[$arrayName];
//        foreach ($counterID as $row) {
//            if((int)$type == $row['_id']){
//                $id = $row['counter'];
//            }
//        }
//    }
//    $id += 1;
//    $collection1->updateOne(['companyID'=>$companyid,$arrayName.'_id' => (int)$type],['$set'=>[$arrayName.'$.counter'=>$id]]);
//    return $id;
//}

//$db->active_load->updateOne(['companyID' => (int)$_SESSION['companyId'], 'activeload._id' => (int)$id],
//    ['$set' => ['activeload.$.file' => $this->getFile()]]
//);

//$collection->updateOne(['companyID' => 1,$old_value.'._id' => (int)$id],
//    ['$set' => [$new_value]]
//);

//var doc = db.col.findOne({_id: "foo"});
//var arrayDocToMove = doc.arrayField[0];
//db.col.update({_id: "foo", arrayField: { $elemMatch: arrayDocToMove} }, { $pull: { arrayField: arrayDocToMove }, $addToSet: { someOtherArrayField: arrayDocToMove } })

//$collection->update(["companyID" => 1, "Delivered" => ["$elemMatch" => "Loaded"]],["$pull" => ["Delivered" => "Loaded"]]);

//db.foo.update({"_id": param._id}, {"$move": [{"array": {id: 0}}, {"zeroes": 1}]}

//$show1 = $db->active_load->find(['companyID' => 1],['activeload' => ['$slice' => 5]]);
//$show1 = $db->active_load->find(array('companyID' => 1), array('projection' => array('activeload' => array('$slice' => [0,5]))));
//foreach ($show1 as $show) {
//    foreach ($show['activeload'] as $s){
//        print_r($s);
//    }
//}

//db.mycollection.update(
//    {'_id': ObjectId("576b63d49d20504c1360f688")},
//    { $pull: { "books" : { "title": "abc" } } },
//false,
//true
//);

//$collection = $db->consignee;
//$db->consignee->updateOne(['companyID' => (int)$_SESSION['compnayId']],
//    ['$pull' => ['consignee' => ['_id' => (int)getId()]]]
//);

//$show1 = $collection->aggregate([
//    ['$lookup' => [
//        'from' => 'currency_add',
//        'localField' => 'companyID',
//        'foreignField' => 'companyID',
//        'as' => 'DriverDetail'
//    ]],
//    ['$match' => ['companyID' => 1]],
//    ['$unwind' => '$driver'],
//    ['$match' => ['driver._id' => 0]],
//]);
//foreach ($show1 as $row) {
//    $id = $row['_id'];
//    $driver[$id] = $row['driver'];
//    $currency = $row['currency'];
//    foreach ($driver as $row2) {
//
//    }
//}

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