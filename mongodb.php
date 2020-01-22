// Code to create connection and select database & collection

require 'vendor/autoload.php';
$s = new MongoDB\Client("mongodb://localhost:27017");
$db = $s->mydb;
$collection = $db->demo;

// code to insert single entry in collection

$insertSingleResult = $collection->insertOne([
      "_id"=>2,
        "Url" => "https://i1.wp.com/vegecravings.com/wp-content/uploads/2016/12/coriander-tomato-chutney-recipe-step-by-step-instructions.jpg?fit=750%2C562&ssl=1",
        "category" => "Chutney",
        "itemnumber" => 1,
        "name" => "Green Chutney",
        "price" => 150

]);


// code to create a nested collection

$collection->updateOne(['_id' => 2],['$set’=>['PackSizes'=>[[
    '_id'=>126,
    'PackSizeName'=>'abcd',
    'unitname'=>'pqr'
]]]]);

//Code to push more items in embedded collection

$collection->updateOne(['_id' => 2],['$push'=>['PackSizes'=>[
    '_id'=>126,
    'PackSizeName'=>'abcd',
    'unitname'=>'pqr'
]]]);


//code to auto increment the id of of the collection

db.counters.insert(
   {
      _id: "userid",
      seq: 0
   }
)

1. function getNextSequence(name) {
2.    var ret = db.counters.findAndModify(
3.           {
4.             query: { _id: name },
5.             update: { $inc: { seq: 1 } },
6.             new: true
7.           }
8.    );
9.
10.    return ret.seq;
11. }

db.users.insert(
   {
     _id: getNextSequence("userid"),
     name: "Sarah C."
   }
)

db.users.insert(
   {
     _id: getNextSequence("userid"),
     name: "Bob D."
   }
)

// code to find single entry based on id and printing its specific field
$cursor = $collection->findOne(array('_id'=>2));

echo $cursor["Url"];

// code to fetch entire collection and display each document values in a tabular form

$cursor = $collection->find();

$array = iterator_to_array($cursor);

foreach ( $array as $value){
    echo $value['category']." ".$value['itemnumber']." ".$value['name']." ".$value['price']."<br>";
}

// code to fetch the embedded collection based on some value and print the entire sub collection

$cursor = $collection->find(['PackSizes.unitname'=> 'pqr']);
var_dump($cursor);
$array = iterator_to_array($cursor);

foreach($array as $value){
    $array1 = iterator_to_array($value['PackSizes']);
    foreach($array1 as $value1){
        echo $value1['unitname'];
    }
}


// code to update the entries of embedded document through certain parameters
$collection->updateOne(['_id'=>2 ,'details._id'=>'4'],['$set'=>['details.$.thali_type'=>'fixed']]);

    //update
    public function updateCurrency($currency,$db){
        $db->currency_add->updateOne(
            ['_id' => 1 ,'currency._id'=>'0'],
            ['$set' => ['currency.$.currencyType'=>'fixed']
            ]);
    }