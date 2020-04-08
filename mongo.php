<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php // Code to create connection and select database & collection

// Code to create connection and select database & collection
require 'vendor/autoload.php';
$connection = new MongoDB\Client("mongodb://127.0.0.1");
$db = $connection->WindsonDispatch;

$bankID = 2;
$curYear = 2020;

//$show = $db->Loaded->find(['companyID' => 2, 'bankID' => $bankID,'year' => $curYear]);
$show = $db->payment_bank->find(['companyID' => 1, 'bankID' => $bankID, 'year' => $curYear]);
$counter = [];
$id = [];
$bankid = [];
$yearID = [];

$mainID = null;
$incrementNumber = null;
$bank = null;
$years = null;
$companyID = null;

$i = 0;
foreach ($show as $s) {
    print_r($s);
//    exit();
    $id[] = $s['_id'];
    $counter[] = $s['counter'];
    $bankid[] = $s['bankID'];
    $yearID[] = $s['year'];
    $companyID = $s['companyID'];

    if ($counter[$i] < 5 && $bankid[$i] == $bankID && $yearID[$i] == $curYear) {
        $mainID = $id[$i];
        $incrementNumber = $counter[$i];
        $bank = $bankid[$i];
        $years = $curYear;
    }
    $i++;
}
echo $mainID . ' ' . $incrementNumber . ' ' . $bank . ' ' . $years;
//exit();
if (!empty($mainID)) {
    echo "<script>alert('second entry');</script>";
    $db->payment_bank->updateOne(['companyID' => $companyID, '_id' => $mainID], ['$set' => ['counter' => $incrementNumber + 1]]);
} else {
    echo "<script>alert('first entry');</script>";
    $db->payment_bank->insertOne(['_id' => getNextSequence('paymentbankcount', $db), 'companyID' => 1, 'bankID' => $bankID, 'counter' => 0,'year' => $curYear]);
}

function getNextSequence($name, $collection)
{
    $cursor = $collection->counter->find(['_id' => $name]);
    $arr = iterator_to_array($cursor);
    $id = 0;
    foreach ($arr as $value) {
        $id = $value['seq'];
    }
    $id += 1;
    $collection->counter->findOneAndUpdate(['_id' => $name], ['$set' => ['seq' => $id]]);
    return $id;
}