<?php // Code to create connection and select database & collection

require 'vendor/autoload.php';
session_start();
$connection = new MongoDB\Client("mongodb://127.0.0.1");
$db = $connection->WindsonDispatch;

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

$collection = $db->owner_operator_driver;
$show1 = $collection->aggregate([
    ['$lookup' => [
        'from' => 'driver',
        'localField' => 'companyID',
        'foreignField' => 'companyID',
        'as' => 'owner'
    ]],
           ['$match'=>['companyID'=>1]],
           ['$unwind'=>'$ownerOperator'],
           ['$match'=>['ownerOperator._id'=>1]]
    ]);

foreach ($show1 as $row) {
    $ownerOperator = array();
    $c = 0;
    $ownerOperator[$c] = $row['ownerOperator'];
    $c++;
    $owner = $row['owner'];
    $drivername = array();
    foreach ($owner as $row2) {
                $owner1 = $row2['driver'];
                $k = 0;
                foreach ($owner1 as $row3) {
                    $id = $row3['_id'];
                    $drivername[$k] = $id." ".$row3['driverName'];
                    $k++;
                }    
        }

    $j = 0;
            foreach ($ownerOperator as $row1) {
                $drivername1 = $drivername[$row1['driverId']];
                $j++;
                echo $drivername1."<br>";
            }
        }
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

$collection = $db->carrier;
$show1 = $collection->aggregate([
        ['$match'=>['companyID'=>2]],
        ['$unwind'=>'$carrier'],
        ['$match'=>['carrier._id'=>0]]
]);
$i = 0;
foreach ($show1 as $row) {
   $i++;
$carrier = array();
$k = 0;
$carrier[$k] = $row['carrier'];
$k++;
foreach ($carrier as $row1) {
   $i++;
echo $row1['_id']."<br>";
}
}
echo "val of i"." ".$i;