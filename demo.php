<?php

require 'vendor/autoload.php';
$s = new MongoDB\Client("mongodb://127.0.0.1/");
$db = $s->demodb;
$collection = $db->test;

$insertManyResult = $collection->insertOne([
    [
      "Url" => "https://i1.wp.com/vegecravings.com/wp-content/uploads/2016/12/coriander-tomato-chutney-recipe-step-by-step-instructions.jpg?fit=750%2C562&ssl=1",
      "category" => "Chutney",
      "itemnumber" => 1,
      "name" => "Green Chutney",
      "price" => 150
    ],
]);

printf("Inserted %d document(s)\n", $insertManyResult->getInsertedCount());

