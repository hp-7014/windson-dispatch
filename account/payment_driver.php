<?php

require 'model/Bank.php';
require '../admin/model/ActiveLoad.php';
require 'utils/Helper.php';
require '../vendor/autoload.php';
require '../database/connection.php';

$helper = new Helper();

//----------Driver insert function start-----------------------------------------------------------------------------------------------------------------------------
// Insert Driver Payment Function Here
if ($_GET['type'] == 'driverpayment') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setFieldName($_POST['drivername']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'], $_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setAdvance($_POST['advance']);
    $bank->setFinalAmount($_POST['finalamount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertdriver($bank, $db, $helper);
} // Insert carrier Payment Function Here
else if ($_GET['type'] == 'carrierpayment') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setFieldName($_POST['carriername']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'], $_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertcarrier($bank, $db, $helper);
} // Insert factoring Payment Function Here
else if ($_GET['type'] == 'bankFactoring') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setFieldName($_POST['selectFactoring']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'], $_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertfactoring($bank, $db, $helper);
} // Insert expense Payment Function Here
else if ($_GET['type'] == 'paymentexpense') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setExpensesbill($_POST['expensesbill']);
    $bank->setExpensesname($_POST['expensesname']);
    $bank->setAmount($_POST['amount']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertexpense($bank, $db, $helper);
} // Insert Maintenance Payment Function Here
else if ($_GET['type'] == 'paymentmaintenance') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setAch($_POST['maintenanceach']);
    $bank->setTruckno($_POST['truckno']);
    $bank->setTrailerno($_POST['trailerno']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertmaintenance($bank, $db, $helper);
} // Insert insurance Payment Function Here
else if ($_GET['type'] == 'paymentinsurance') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setInsurancecom($_POST['insurancecompany']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertinsurance($bank, $db, $helper);
} // Insert creditcard Payment Function Here
else if ($_GET['type'] == 'paymentcreditcard') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setAmount($_POST['amount']);
    $bank->setCard($_POST['card']);
    $bank->setCardcategory($_POST['cardcategory']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertcreditcard($bank, $db, $helper);
} // Insert fuelcard Payment Function Here
else if ($_GET['type'] == 'paymentfuelcard') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setAmount($_POST['amount']);
    $bank->setFuellist($_POST['fuellist']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertfuelcard($bank, $db, $helper);
} // Insert other Payment Function Here
else if ($_GET['type'] == 'paymentother') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setPobox($_POST['pobox']);
    $bank->setAmount($_POST['amount']);
    $bank->setOther($_POST['other']);
    $bank->setCheckDate(strtotime($_POST['checkachdate']));
    $bank->setCheque($_POST['otherchequ']);
    $bank->setAch($_POST['otherach']);
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertother($bank, $db, $helper);
} // Insert other cash Function Here
else if ($_GET['type'] == 'othercash') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("paymentbankcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setNextMonth(date("F", strtotime("+1 month")));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCompanySelect($_POST['Companyselect']);
    $bank->setBankName($_POST['Bankname']);
    $bank->setPaytype($_POST['paytype']);
    $bank->setOthername($_POST['othername']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate(strtotime($_POST['transactiondate']));
    $bank->setMemo($_POST['memo']);
    $bank->setBaseamount($_POST['baseamount']);
    $bank->insertothercash($bank, $db, $helper);
}
//----------Driver insert function end-----------------------------------------------------------------------------------------------------------------------------
//----------Credit card insert function start-----------------------------------------------------------------------------------------------------------------------------
// Insert Credit Card Expanse
else if ($_GET['type'] == 'creditexpense') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("creditcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setCategory($_POST['category']);
    $bank->setPaymentFrom($_POST['paymentfrom']);
//    $bank->setPaytype($_POST['paytype']);
//    $bank->setOthername($_POST['Bankname']);
    $bank->setExpensesbill($_POST['expensesbill']);
    $bank->setExpensesname($_POST['expensesname']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setMemo($_POST['memo']);
    $bank->setPayto($_POST['payto']);
    $bank->insertCrediCardExpanse($bank, $db, $helper);
} // insert credit card maintenance
else if ($_GET['type'] == 'CreditMaintenance') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("creditcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setAch($_POST['maintenanceach']);
    $bank->setTruckno($_POST['truckno']);
    $bank->setTrailerno($_POST['trailerno']);
    $bank->setMemo($_POST['memo']);
    $bank->insertCreditCardMaintenance($bank, $db, $helper);
} // Insert creidtcard insurence Function Here
else if ($_GET['type'] == 'CreditInsurance') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("creditcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setInsurancecom($_POST['insurancecompany']);
    $bank->setMemo($_POST['memo']);
    $bank->insertCreditCardInsurance($bank, $db, $helper);
} // Insert creidtcard Fual card Function Here
else if ($_GET['type'] == 'CreditFuelCard') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("creditcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setAmount($_POST['amount']);
    $bank->setFuellist($_POST['fuellist']);
    $bank->setMemo($_POST['memo']);
    $bank->insertCreditCardFuelCard($bank, $db, $helper);
} // Insert credit other Function Here
else if ($_GET['type'] == 'CreditOther') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("creditcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setPobox($_POST['pobox']);
    $bank->setAmount($_POST['amount']);
    $bank->setOther($_POST['other']);
    $bank->setCheckDate(strtotime($_POST['checkachdate']));
    $bank->setCheque($_POST['otherchequ']);
    $bank->setAch($_POST['otherach']);
    $bank->setMemo($_POST['memo']);
    $bank->insertCreditCardOther($bank, $db, $helper);
}

//----------Credit card insert function end-----------------------------------------------------------------------------------------------------------------------------
//----------fuel card insert function start-----------------------------------------------------------------------------------------------------------------------------
// Insert Driver Payment Function Here
if ($_GET['type'] == 'FuelCardDriver') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("fuelcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));

    $bank->setFuelcardmain($_POST['fuelcardmain']);
    $bank->setPaymentlist($_POST['paymentlist']);

    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setFieldName($_POST['drivername']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'], $_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setAdvance($_POST['advance']);
    $bank->setFinalAmount($_POST['finalamount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->insertFuelDriver($bank, $db, $helper);
} // Insert credit card carrier Function Here
else if ($_GET['type'] == 'FuelCardCarrier') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("fuelcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);

    $bank->setFuelcardmain($_POST['fuelcardmain']);
    $bank->setPaymentlist($_POST['paymentlist']);

    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setFieldName($_POST['carriername']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setInvoice($_POST['invoice'], $_POST['invoiceAmount']);
    $bank->setAmount($_POST['amount']);
    $bank->setCheckDate(strtotime($_POST['checkdate']));
    $bank->setCheque($_POST['cheque']);
    $bank->setAch($_POST['ach']);
    $bank->setMemo($_POST['memo']);
    $bank->insertFuelCarrier($bank, $db, $helper);
} else if ($_GET['type'] == 'FuelCardExpense') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("fuelcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);

    $bank->setFuelcardmain($_POST['fuelcardmain']);
    $bank->setPaymentlist($_POST['paymentlist']);

    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setExpensesbill($_POST['expensesbill']);
    $bank->setExpensesname($_POST['expensesname']);
    $bank->setAmount($_POST['amount']);
    $bank->setMemo($_POST['memo']);
    $bank->insertFuelExpense($bank, $db, $helper);
} else if ($_GET['type'] == 'FuelCardMaintenance') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("fuelcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);

    $bank->setFuelcardmain($_POST['fuelcardmain']);
    $bank->setPaymentlist($_POST['paymentlist']);

    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setAmount($_POST['amount']);
    $bank->setAch($_POST['maintenanceach']);
    $bank->setTruckno($_POST['truckno']);
    $bank->setTrailerno($_POST['trailerno']);
    $bank->setMemo($_POST['memo']);
    $bank->insertFuelMaintenance($bank, $db, $helper);
} else if ($_GET['type'] == 'FuelCardOther') {
    $bank = new Bank();
    $bank->setId($helper->getNextSequence("fuelcardcount", $db));
    $bank->setCompanyID($_POST['companyId']);
    $bank->setFuelcardmain($_POST['fuelcardmain']);
    $bank->setPaymentlist($_POST['paymentlist']);
    $bank->setYear(date("Y"));
    $bank->setMonth(date("F"));
    $bank->setPaymentFrom($_POST['paymentfrom']);
    $bank->setCategory($_POST['category']);
    $bank->setPayto($_POST['category']);
    $bank->setSelectDebit($_POST['selectdebite']);
    $bank->setPobox($_POST['pobox']);
    $bank->setAmount($_POST['amount']);
    $bank->setOther($_POST['other']);
    $bank->setCheckDate(strtotime($_POST['checkachdate']));
    $bank->setCheque($_POST['otherchequ']);
    $bank->setAch($_POST['otherach']);
    $bank->setMemo($_POST['memo']);
    $bank->insertFuelOther($bank, $db, $helper);
}
//----------fuel card insert function end-----------------------------------------------------------------------------------------------------------------------------
//Upload Files
else if ($_GET['type'] == "fileupload") {
    $bank = new Bank();
    $id = $_POST['id'];
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $uploadDir = 'upload/Bank/';
        $response = '';
        $allowTypes = array('pdf', 'jpg', 'png', 'jpeg');
        $i = 0;
        $docs = array();
        foreach ($_FILES['files']['name'] as $key => $val) {
            $fileName = rand(0, 9999999999) . $_FILES["files"]["name"][$key];
            $originalname = $_FILES["files"]["name"][$key];

            $temLoc = $_FILES['files']['tmp_name'][$key];
            $targetFilePath = $uploadDir . $fileName;
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            $fileSize = $_FILES['files']['size'][$key];
            if (in_array($fileType, $allowTypes)) {
                if ($fileSize < 200000) {
                    $docs[] = $fileName;
                    $bank->setBankName($_POST['Bankname']);
                    $bank->setYear(date("Y"));
                    $bank->setMonth(date("F"));
                    $bank->setFile($fileName, $originalname, $fileSize, $targetFilePath, $i);
                } else {
                    echo "File Size is To Large For " . $fileName;
                    exit();
                }
            } else {
                echo "File Type Error For " . $fileName;
                exit();
            }
            $i++;
        }
        for ($i = 0; $i < count($docs); $i++) {
            move_uploaded_file($_FILES["files"]["tmp_name"][$i], $uploadDir . $docs[$i]);
        }
        $bank->updatefile($bank, $db, $id);
    }
}

// send data to paid
function paidStatus($mainID, $documentID, $db, $helper)
{
//    print_r($documentID[0]['invoiceNo']);
// count - 1
    for ($l = 0; $l < count($documentID); $l++) {
        $cursor = $db->Invoiced->find(["companyID" => (int)$_SESSION['companyId']], ['load' => ['$elemMatch' => ['_id' => $documentID[$l]['invoiceNo']]]]);
        $array = iterator_to_array($cursor);
        foreach ($array as $value) {
            $counterID = $value['load'];
            foreach ($counterID as $row) {
                if ($documentID[$l]['invoiceNo'] == $row['_id']) {
                    $activeload = new ActiveLoad();
                    $activeload->setMasterID($helper->getNextSequence("active_load", $db));
                    $activeload->setId($row['_id']);
                    $activeload->setCompany($row['company']);
                    $activeload->setCustomer($row['customer']);
                    $activeload->setDispatcher($row['dispatcher']);
                    $activeload->setCnno($row['cnno']);
                    $activeload->setStatus('Paid');
                    $activeload->setActiveType($row['active_type']);
                    $activeload->setRate($row['rate']);
                    $activeload->setUnits($row['units']);
                    $activeload->setFsc($row['fsc']);
                    $activeload->setFscPercentage($row['fsc_percentage']);
                    $activeload->setOtherCharges($row['other_charges']);
//                $activeload->setOtherChargesModal($row['other_description'], $row['other_charges']);
                    $activeload->setTotalRate($row['total_rate']);
                    $activeload->setEquipmentType($row['equipment_type']);
                    $activeload->setTypeofLoader($row['typeofloader']);
                    $activeload->setCarrierName($row['carrier_name']);
                    $activeload->setFlatRate($row['flat_rate']);
                    $activeload->setAdvanceCharges($row['advance_charges']);
//                $activeload->setCarrierOtherModal($row['carrier_other_description'], $row['carrier_other_advance'], $row['carrier_other_charges']);
                    $activeload->setCarrierTotal($row['carrier_total']);
                    $activeload->setCurrency($row['currency']);
                    $activeload->setDriverName($row['driver_name']);
                    $activeload->setTruck($row['truck']);
                    $activeload->setTrailer($row['trailer']);
                    $activeload->setLoadedMile($row['loaded_mile']);
                    $activeload->setEmptyMile($row['empty_mile']);
                    $activeload->setDriverOther($row['driver_other']);
//                $activeload->setDriverOtherModal($row['driver_other_description'], $row['driver_other_charges']);
                    $activeload->setTarp($row['tarp']);
                    $activeload->setFlat($row['flat']);
                    $activeload->setDriverTotal($row['driver_total']);
                    $activeload->setOwnerName($row['owner_name']);
                    $activeload->setOwnerPercentage($row['owner_percentage']);
                    $activeload->setOwnerTruck($row['owner_truck']);
                    $activeload->setOwnerTrailer($row['owner_trailer']);
                    $activeload->setOwnerOther($row['owner_other']);
                    $activeload->setOwnerTotal($row['owner_total']);
//                $activeload->setOwnerOtherModal($row['owner_other_description'], $row['owner_other_charges']);
                    $activeload->setStartLocation($row['start_location']);
                    $activeload->setEndLocation($row['end_location']);
//                $activeload->setShipper($row['shipper_name'], $_POST['shipper_address'], $row['shipper_location'], $row['shipper_pickup'], $row['shipper_picktime'], $row['shipper_load_type'], $row['shipper_commodity'], $row['shipper_qty'], $row['shipper_weight'], $row['shipper_pickup_number'], $row['shipper_seq'], $row['shipper_notes']);
//                $activeload->setConsignee($row['consignee_name'], $row['consignee_address'], $row['consignee_location'], $row['consignee_pickup'], $row['consignee_picktime'], $row['consignee_load_type'], $row['consignee_commodity'], $row['consignee_qty'], $row['consignee_weight'], $row['consignee_delivery_number'], $row['consignee_seq'], $row['consignee_notes']);
                    $activeload->setTarpSelect($row['tarp_select']);
                    $activeload->setLoadedMilesValue($row['loaded_miles_value']);
                    $activeload->setEmptyMilesValue($row['empty_miles_value']);
                    $activeload->setDriverMilesValue($row['driver_miles_value']);
                    // $activeload->setFile($row['file']);
                    $activeload->setLoadNotes($row['load_notes']);
//                $activeload->setCarrierEmail($row['carrier_email'], $row['email2'], $row['email3']);
//                $activeload->setCustomerEmail($row['customer_email'], $row['emailcustomer2'], $row['emailcustomer3']);
                    $activeload->setStatusBreakDownTime($row['status_BreakDown_time']);
                    $activeload->setStatusLoadedTime($row['status_Loaded_time']);
                    $activeload->setStatusArrivedConsigneeTime($row['status_ArrivedConsignee_time']);
                    $activeload->setStatusArrivedShipperTime($row['status_ArrivedShipper_time']);
                    $activeload->setStatusPaidTime(time());
                    $activeload->setStatusOpenTime($row['status_Open_time']);
                    $activeload->setStatusOnRouteTime($row['status_OnRoute_time']);
                    $activeload->setStatusDispatchedTime($row['status_Dispatched_time']);
                    $activeload->setStatusDeliveredTime($row['status_Delivered_time']);
                    $activeload->setStatusCompletedTime($row['status_Completed_time']);
                    $activeload->setStatusInvoicedTime($row['status_Invoiced_time']);
                    $activeload->insertPaid($activeload, $db, $helper);
                }
            }
        }
    }
}