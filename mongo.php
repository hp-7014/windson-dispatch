<?php // Code to create connection and select database & collection

require 'vendor/autoload.php';
$connection = new MongoDB\Client("mongodb://127.0.0.1");
$db = $connection->WindsonDispatch;
$collection = $db->payment_terms;
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
$show = $collection->find(
        ['$where' => function() {
            return ['payment._id'] == 1;
        }]
);
foreach ($show as $s) {
    print_r($s);
}
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

//$cursor = $collection->find(['companyID.currencyType'=> 'test']);
////var_dump($cursor);
//$array = iterator_to_array($cursor);
//
//foreach($array as $value){
//$array1 = iterator_to_array($value['companyID']);
//foreach($array1 as $value1){
//echo $value1['currencyType'];
//}
//}


// code to update the entries of embedded document through certain parameters
//$collection->updateOne(['_id'=>2,'details._id'=>'4'],['$set'=>['details.$.thali_type'=>'fixed']]);
