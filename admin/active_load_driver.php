<?php
require 'model/ActiveLoad.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

if ($_GET['type'] == "add_new_load") {
    $activeload = new ActiveLoad();
    $activeload->setId($helper->getNextSequence("active_load", $db));
    $activeload->setCompanyID($_SESSION['companyId']);
    $activeload->setCompany($_POST['company']);
    $activeload->setCustomer($_POST['customer']);
    $activeload->setDispatcher($_POST['dispatcher']);
    $activeload->setCnno($_POST['cnno']);
    $activeload->setStatus($_POST['status']);
    $activeload->setActiveType($_POST['active_type']);
    $activeload->setRate($_POST['rate']);
    $activeload->setUnits($_POST['noofunits']);
    $activeload->setFsc($_POST['fsc']);
    $activeload->setFscPercentage($_POST['fsc_percentage']);
    $activeload->setOtherCharges($_POST['other_charges_total']);
    $activeload->setOtherChargesModal($_POST['other_description'], $_POST['other_charges']);
    $activeload->setTotalRate($_POST['setTotalRate']);
    $activeload->setEquipmentType($_POST['equipment_type']);
    $activeload->setTypeofLoader($_POST['typeofLoader']);
    $activeload->setCarrierName($_POST['carrier_name']);
    $activeload->setFlatRate($_POST['flat_rate']);
    $activeload->setAdvanceCharges($_POST['advance_charges']);
    $activeload->setCarrierOtherModal($_POST['carrier_other_description'], $_POST['carrier_other_advance'], $_POST['carrier_other_charges']);
    $activeload->setCarrierTotal($_POST['carrier_total']);
    $activeload->setCurrency($_POST['currency']);
    $activeload->setDriverName($_POST['driver_name']);
    $activeload->setTruck($_POST['truck']);
    $activeload->setTrailer($_POST['trailer']);
    $activeload->setLoadedMile($_POST['loaded_mile']);
    $activeload->setEmptyMile($_POST['empty_mile']);
    $activeload->setDriverOther($_POST['driver_other']);
    $activeload->setDriverOtherModal($_POST['driver_other_description'], $_POST['driver_other_charges']);
    $activeload->setTarp($_POST['tarp']);
    $activeload->setFlat($_POST['flat']);
    $activeload->setDriverTotal($_POST['driver_total']);
    $activeload->setOwnerName($_POST['owner_name']);
    $activeload->setOwnerPercentage($_POST['owner_percentage']);
    $activeload->setOwnerTruck($_POST['owner_truck']);
    $activeload->setOwnerTrailer($_POST['owner_trailer']);
    $activeload->setOwnerOther($_POST['owner_other']);
    $activeload->setOwnerTotal($_POST['owner_total']);
    $activeload->setOwnerOtherModal($_POST['owner_other_description'], $_POST['owner_other_charges']);
    $activeload->setStartLocation($_POST['startlocation']);
    $activeload->setEndLocation($_POST['endlocation']);
    $activeload->setShipper($_POST['shipper_name'], $_POST['shipper_address'], $_POST['shipper_location'], $_POST['shipper_pickup'], $_POST['shipper_picktime'], $_POST['shipper_load_type'], $_POST['shipper_commodity'], $_POST['shipper_qty'], $_POST['shipper_weight'], $_POST['shipper_pickup_number'], $_POST['shipper_seq'], $_POST['shipper_notes']);
    $activeload->setConsignee($_POST['consignee_name'], $_POST['consignee_address'], $_POST['consignee_location'], $_POST['consignee_pickup'], $_POST['consignee_picktime'], $_POST['consignee_load_type'], $_POST['consignee_commodity'], $_POST['consignee_qty'], $_POST['consignee_weight'], $_POST['consignee_delivery_number'], $_POST['consignee_seq'], $_POST['consignee_notes']);
    $activeload->setTarpSelect($_POST['tarp_select']);
    $activeload->setLoadedMilesValue($_POST['loaded_miles_value']);
    $activeload->setEmptyMilesValue($_POST['empty_miles_value']);
    $activeload->setDriverMilesValue($_POST['driver_miles_value']);
    // $activeload->setFile($_POST['file']);
    $activeload->setLoadNotes($_POST['load_notes']);
    $activeload->setCarrierEmail($_POST['carrier_email'], $_POST['email2'], $_POST['email3']);
    $activeload->setCustomerEmail($_POST['customer_email'], $_POST['emailcustomer2'], $_POST['emailcustomer3']);
    // $activeload->insert($activeload,$db,$helper);

    if ($_POST['status'] == "Break Down") {
        $activeload->setStatusBreakDownTime(time());
    } else {
        $activeload->setStatusBreakDownTime(0);
    }
    if ($_POST['status'] == "Loaded") {
        $activeload->setStatusLoadedTime(time());
    } else {
        $activeload->setStatusLoadedTime(0);
    }
    if ($_POST['status'] == "Arrived Consignee") {
        $activeload->setStatusArrivedConsigneeTime(time());
    } else {
        $activeload->setStatusArrivedConsigneeTime(0);
    }
    if ($_POST['status'] == "Arrived Shipper") {
        $activeload->setStatusArrivedShipperTime(time());
    } else {
        $activeload->setStatusArrivedShipperTime(0);
    }
    if ($_POST['status'] == "Paid") {
        $activeload->setStatusPaidTime(time());
    } else {
        $activeload->setStatusPaidTime(0);
    }
    if ($_POST['status'] == "Open") {
        $activeload->setStatusOpenTime(time());
    } else {
        $activeload->setStatusOpenTime(0);
    }
    if ($_POST['status'] == "On Route") {
        $activeload->setStatusOnRouteTime(time());
    } else {
        $activeload->setStatusOnRouteTime(0);
    }
    if ($_POST['status'] == "Dispatched") {
        $activeload->setStatusDispatchedTime(time());
    } else {
        $activeload->setStatusDispatchedTime(0);
    }
    if ($_POST['status'] == "Delivered") {
        $activeload->setStatusDeliveredTime(time());
    } else {
        $activeload->setStatusDeliveredTime(0);
    }
    if ($_POST['status'] == "Completed") {
        $activeload->setStatusCompletedTime(time());
    } else {
        $activeload->setStatusCompletedTime(0);
    }
    if ($_POST['status'] == "Invoiced") {
        $activeload->setStatusInvoicedTime(time());
    } else {
        $activeload->setStatusInvoicedTime(0);
    }

    $activeload->insert($activeload, $db, $helper);
    
} else if ($_GET['type'] == "fileupload") {
    $activeload = new ActiveLoad();
    $id = $_POST['id'];
    if (isset($_FILES['files']) && !empty($_FILES['files'])) {
        $uploadDir = 'upload/ActiveLoade/';
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
                    $activeload->setFile($fileName, $originalname, $fileSize, $targetFilePath, $i);

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
        $activeload->updatefile($activeload, $db, $id);
    }
} // change Load Status
else if ($_GET['type'] == 'changeStatus') {
    $arrayName = $_POST['old_array'];
    $cursor = $db->active_load->find(["companyID" => (int)$_SESSION['companyId']], [$arrayName => ['$elemMatch' => ['_id' => $_POST['id']]]]);
    $array = iterator_to_array($cursor);
    foreach ($array as $value) {
        $counterID = $value[$arrayName];
        foreach ($counterID as $row) {
            if ($_POST['id'] == $row['_id']) {
                $activeload = new ActiveLoad();
                $activeload->setId($row['_id']);
                $activeload->setCompany($row['company']);
                $activeload->setCustomer($row['customer']);
                $activeload->setDispatcher($row['dispatcher']);
                $activeload->setCnno($row['cnno']);
                $activeload->setStatus($row['status']);
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
                $activeload->setNewStatus($_POST['new_array']);
                $activeload->setOldArray($arrayName);
                $activeload->changeStatus($activeload,$db);
            }
        }
    }
}
