<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_fuel_table') {
    $limit = 100;
    $cursor =  $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['fuel_receipt']);
        $total_pages = ceil($total_records / $limit);
    }
    
    $g_data = $db->ifta_fuel_receipts->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('fuel_receipt' => array('$slice' => [0, $limit]))));
    $i = 0;
    
    foreach ($g_data as $data) {
        $fuel_s = $data['fuel_receipt'];
        foreach ($fuel_s as $fuel) {
            $counter = $fuel['counter'];
            $id = $fuel['_id'];
            $cardHolderName = $fuel['cardHolderName'];
            $fuelDate = $fuel['fuelDate'];
            $unit_number = $fuel['unit_number'];
            $transacTime = $fuel['transacTime'];
            $merchantName = $fuel['merchantName'];
            $merchantCity = $fuel['merchantCity'];
            $statePurch = $fuel['statePurch'];
            $dGallons = $fuel['dGallons'];
            $dGrossCost = $fuel['dGrossCost'];
            $cashAdvanced = $fuel['cashAdvanced'];
            $discountAmt = $fuel['discountAmt'];
            $totalAmt = $fuel['totalAmt'];
            $invoiceNo = $fuel['invoiceNo'];

            $cardHolderNameColumn = '"cardHolderName"';
            $fuelDateColumn = '"fuelDate"';
            $unit_numberColumn = '"unit_number"';
            $transacTimeColumn = '"transacTime"';
            $merchantNameColumn = '"merchantName"';
            $merchantCityColumn = '"merchantCity"';
            $statePurchColumn = '"statePurch"';
            $dGallonsColumn = '"dGallons"';
            $dGrossCostColumn = '"dGrossCost"';
            $cashAdvancedColumn = '"cashAdvanced"';
            $discountAmtColumn = '"discountAmt"';
            $totalAmtColumn = '"totalAmt"';
            $invoiceNoColumn = '"invoiceNo"';

            $i++;
            $type = '"text"';
            $updateFuel = '"updateFuel"';

            $c_type1 = '"'.$cardHolderName.'"';
            $c_type2 = '"'.$unit_number.'"';
            $c_type3 = '"'.$fuelDate.'"';
            $c_type4 = '"'.$transacTime.'"';
            $c_type5 = '"'.$merchantName.'"';
            $c_type6 = '"'.$merchantCity.'"';
            $c_type7 = '"'.$statePurch.'"';
            $c_type8 = '"'.$dGallons.'"';
            $c_type9 = '"'.$dGrossCost.'"';
            $c_type10 = '"'.$cashAdvanced.'"';
            $c_type11 = '"'.$discountAmt.'"';
            $c_type12 = '"'.$totalAmt.'"';
            $c_type13 = '"'.$invoiceNo.'"';

            $title1 = '"Card Holder Name"';
            $title2 = '"Unit Number"';
            $title3 = '"Fuel Date"';
            $title4 = '"Transaction Time"';
            $title5 = '"Merchant Name"';
            $title6 = '"Merchant City"';
            $title7 = '"State Punch"';
            $title8 = '"Diesel Gallons"';
            $title9 = '"Diesel Gross Cost"';
            $title10 = '"Cash Advanced Amount"';
            $title11 = '"Discount AMT"';
            $title12 = '"Total AMT"';
            $title13 = '"Invoice No"';

            $pencilid1 = '"cardHolderNamePencil'.$i.'"';
            $pencilid2 = '"unit_numberPencil'.$i.'"';
            $pencilid3 = '"fuelDatePencil'.$i.'"';
            $pencilid4 = '"transacTimePencil'.$i.'"';
            $pencilid5 = '"merchantNamePencil'.$i.'"';
            $pencilid6 = '"merchantCityPencil'.$i.'"';
            $pencilid7 = '"statePurchPencil'.$i.'"';
            $pencilid8 = '"dGallonsPencil'.$i.'"';
            $pencilid9 = '"dGrossCostPencil'.$i.'"';
            $pencilid10 = '"cashAdvancedPencil'.$i.'"';
            $pencilid11 = '"discountAmtPencil'.$i.'"';
            $pencilid12 = '"totalAmtPencil'.$i.'"';
            $pencilid13 = '"invoiceNoPencil'.$i.'"';

            echo "<tr>
                <td> $i</td>
                <td class='custom-text' id='cardHolderName$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateFuel,$type,$id,$cardHolderNameColumn,$title1,$pencilid1)'
                    ></i>
                    $cardHolderName
                </td>
                <td class='custom-text' id='unit_number$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='unit_numberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateFuel,$type,$id,$unit_numberColumn,$title2,$pencilid2)'
                    ></i>
                    $unit_number
                </td>
                <td class='custom-text' id='fuelDate$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='fuelDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateFuel,$type,$id,$fuelDateColumn,$title3,$pencilid3)'
                    ></i>
                    $fuelDate
                </td>
                <td class='custom-text' id='transacTime$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='transacTimePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateFuel,$type,$id,$transacTimeColumn,$title4,$pencilid4)'
                    ></i>
                    $transacTime
                </td>
                <td class='custom-text' id='merchantName$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='merchantNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateFuel,$type,$id,$merchantNameColumn,$title5,$pencilid5)'
                    ></i>
                    $merchantName
                </td>
                <td class='custom-text' id='merchantCity$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='merchantCityPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateFuel,$type,$id,$merchantCityColumn,$title6,$pencilid6)'
                    ></i>
                    $merchantCity
                </td>
                <td class='custom-text' id='statePurch$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='statePurchPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateFuel,$type,$id,$statePurchColumn,$title7,$pencilid7)'
                    ></i>
                    $statePurch
                </td>
                <td class='custom-text' id='dGallons$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='dGallonsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateFuel,$type,$id,$dGallonsColumn,$title8,$pencilid8)'
                    ></i>
                    $dGallons
                </td>
                <td class='custom-text' id='dGrossCost$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='dGrossCostPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateFuel,$type,$id,$dGrossCostColumn,$title9,$pencilid9)'
                    ></i>
                    $dGrossCost
                </td>
                <td class='custom-text' id='cashAdvanced$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='cashAdvancedPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateFuel,$type,$id,$cashAdvancedColumn,$title10,$pencilid10)'
                    ></i>
                    $cashAdvanced
                </td>
                <td class='custom-text' id='discountAmt$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='discountAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateFuel,$type,$id,$discountAmtColumn,$title11,$pencilid11)'
                    ></i>
                    $discountAmt
                </td>
                <td class='custom-text' id='totalAmt$i'
                    onmouseover='showPencil_s($pencilid12)'
                    onmouseout='hidePencil_s($pencilid12)'
                    >
                    <i id='totalAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type12,$updateFuel,$type,$id,$totalAmtColumn,$title12,$pencilid12)'
                    ></i>
                    $totalAmt
                </td>
                <td class='custom-text' id='invoiceNo$i'
                    onmouseover='showPencil_s($pencilid13)'
                    onmouseout='hidePencil_s($pencilid13)'
                    >
                    <i id='invoiceNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type13,$updateFuel,$type,$id,$invoiceNoColumn,$title13,$pencilid13)'
                    ></i>
                    $invoiceNo
                </td>";

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deleteFuel($id,$cardHolderName)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
    }
}

if ($_GET['types'] == 'search_text') {
    $g_data = $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    
    foreach ($g_data as $data) {
    $fuel_s = $data['fuel_receipt'];
        foreach ($fuel_s as $fuel) {
            $counter = $fuel['counter'];
            $id = $fuel['_id'];
            $cardHolderName = $fuel['cardHolderName'];
            $fuelDate = $fuel['fuelDate'];
            $unit_number = $fuel['unit_number'];
            $transacTime = $fuel['transacTime'];
            $merchantName = $fuel['merchantName'];
            $merchantCity = $fuel['merchantCity'];
            $statePurch = $fuel['statePurch'];
            $dGallons = $fuel['dGallons'];
            $dGrossCost = $fuel['dGrossCost'];
            $cashAdvanced = $fuel['cashAdvanced'];
            $discountAmt = $fuel['discountAmt'];
            $totalAmt = $fuel['totalAmt'];
            $invoiceNo = $fuel['invoiceNo'];

            if ($_POST['getoption'] == $cardHolderName 
                || $_POST['getoption'] == $fuelDate
                || $_POST['getoption'] == $unit_number
                || $_POST['getoption'] == $transacTime
                || $_POST['getoption'] == $merchantName
                || $_POST['getoption'] == $merchantCity
                || $_POST['getoption'] == $statePurch
                || $_POST['getoption'] == $dGallons
                || $_POST['getoption'] == $dGrossCost
                || $_POST['getoption'] == $cashAdvanced
                || $_POST['getoption'] == $discountAmt
                || $_POST['getoption'] == $totalAmt
                || $_POST['getoption'] == $invoiceNo
            ) {
                $cardHolderNameColumn = '"cardHolderName"';
                $fuelDateColumn = '"fuelDate"';
                $unit_numberColumn = '"unit_number"';
                $transacTimeColumn = '"transacTime"';
                $merchantNameColumn = '"merchantName"';
                $merchantCityColumn = '"merchantCity"';
                $statePurchColumn = '"statePurch"';
                $dGallonsColumn = '"dGallons"';
                $dGrossCostColumn = '"dGrossCost"';
                $cashAdvancedColumn = '"cashAdvanced"';
                $discountAmtColumn = '"discountAmt"';
                $totalAmtColumn = '"totalAmt"';
                $invoiceNoColumn = '"invoiceNo"';

                $i++;
                $type = '"text"';
                $updateFuel = '"updateFuel"';

                $c_type1 = '"'.$cardHolderName.'"';
                $c_type2 = '"'.$unit_number.'"';
                $c_type3 = '"'.$fuelDate.'"';
                $c_type4 = '"'.$transacTime.'"';
                $c_type5 = '"'.$merchantName.'"';
                $c_type6 = '"'.$merchantCity.'"';
                $c_type7 = '"'.$statePurch.'"';
                $c_type8 = '"'.$dGallons.'"';
                $c_type9 = '"'.$dGrossCost.'"';
                $c_type10 = '"'.$cashAdvanced.'"';
                $c_type11 = '"'.$discountAmt.'"';
                $c_type12 = '"'.$totalAmt.'"';
                $c_type13 = '"'.$invoiceNo.'"';

                $title1 = '"Card Holder Name"';
                $title2 = '"Unit Number"';
                $title3 = '"Fuel Date"';
                $title4 = '"Transaction Time"';
                $title5 = '"Merchant Name"';
                $title6 = '"Merchant City"';
                $title7 = '"State Punch"';
                $title8 = '"Diesel Gallons"';
                $title9 = '"Diesel Gross Cost"';
                $title10 = '"Cash Advanced Amount"';
                $title11 = '"Discount AMT"';
                $title12 = '"Total AMT"';
                $title13 = '"Invoice No"';

                $pencilid1 = '"cardHolderNamePencil'.$i.'"';
                $pencilid2 = '"unit_numberPencil'.$i.'"';
                $pencilid3 = '"fuelDatePencil'.$i.'"';
                $pencilid4 = '"transacTimePencil'.$i.'"';
                $pencilid5 = '"merchantNamePencil'.$i.'"';
                $pencilid6 = '"merchantCityPencil'.$i.'"';
                $pencilid7 = '"statePurchPencil'.$i.'"';
                $pencilid8 = '"dGallonsPencil'.$i.'"';
                $pencilid9 = '"dGrossCostPencil'.$i.'"';
                $pencilid10 = '"cashAdvancedPencil'.$i.'"';
                $pencilid11 = '"discountAmtPencil'.$i.'"';
                $pencilid12 = '"totalAmtPencil'.$i.'"';
                $pencilid13 = '"invoiceNoPencil'.$i.'"';

                echo "<tr>
                    <td> $i</td>
                    <td class='custom-text' id='cardHolderName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateFuel,$type,$id,$cardHolderNameColumn,$title1,$pencilid1)'
                        ></i>
                        $cardHolderName
                    </td>
                    <td class='custom-text' id='unit_number$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='unit_numberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateFuel,$type,$id,$unit_numberColumn,$title2,$pencilid2)'
                        ></i>
                        $unit_number
                    </td>
                    <td class='custom-text' id='fuelDate$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='fuelDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateFuel,$type,$id,$fuelDateColumn,$title3,$pencilid3)'
                        ></i>
                        $fuelDate
                    </td>
                    <td class='custom-text' id='transacTime$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='transacTimePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateFuel,$type,$id,$transacTimeColumn,$title4,$pencilid4)'
                        ></i>
                        $transacTime
                    </td>
                    <td class='custom-text' id='merchantName$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='merchantNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateFuel,$type,$id,$merchantNameColumn,$title5,$pencilid5)'
                        ></i>
                        $merchantName
                    </td>
                    <td class='custom-text' id='merchantCity$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='merchantCityPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateFuel,$type,$id,$merchantCityColumn,$title6,$pencilid6)'
                        ></i>
                        $merchantCity
                    </td>
                    <td class='custom-text' id='statePurch$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='statePurchPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateFuel,$type,$id,$statePurchColumn,$title7,$pencilid7)'
                        ></i>
                        $statePurch
                    </td>
                    <td class='custom-text' id='dGallons$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='dGallonsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateFuel,$type,$id,$dGallonsColumn,$title8,$pencilid8)'
                        ></i>
                        $dGallons
                    </td>
                    <td class='custom-text' id='dGrossCost$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='dGrossCostPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateFuel,$type,$id,$dGrossCostColumn,$title9,$pencilid9)'
                        ></i>
                        $dGrossCost
                    </td>
                    <td class='custom-text' id='cashAdvanced$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='cashAdvancedPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateFuel,$type,$id,$cashAdvancedColumn,$title10,$pencilid10)'
                        ></i>
                        $cashAdvanced
                    </td>
                    <td class='custom-text' id='discountAmt$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='discountAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateFuel,$type,$id,$discountAmtColumn,$title11,$pencilid11)'
                        ></i>
                        $discountAmt
                    </td>
                    <td class='custom-text' id='totalAmt$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='totalAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateFuel,$type,$id,$totalAmtColumn,$title12,$pencilid12)'
                        ></i>
                        $totalAmt
                    </td>
                    <td class='custom-text' id='invoiceNo$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='invoiceNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateFuel,$type,$id,$invoiceNoColumn,$title13,$pencilid13)'
                        ></i>
                        $invoiceNo
                    </td>";

                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteFuel($id,$cardHolderName)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
        }
        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor =  $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['fuel_receipt']);
                $total_pages = ceil($total_records / $limit);
            }
            
            $g_data = $db->ifta_fuel_receipts->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('fuel_receipt' => array('$slice' => [0, $limit]))));
            $i = 0;
            
            foreach ($g_data as $data) {
                $fuel_s = $data['fuel_receipt'];
                foreach ($fuel_s as $fuel) {
                    $counter = $fuel['counter'];
                    $id = $fuel['_id'];
                    $cardHolderName = $fuel['cardHolderName'];
                    $fuelDate = $fuel['fuelDate'];
                    $unit_number = $fuel['unit_number'];
                    $transacTime = $fuel['transacTime'];
                    $merchantName = $fuel['merchantName'];
                    $merchantCity = $fuel['merchantCity'];
                    $statePurch = $fuel['statePurch'];
                    $dGallons = $fuel['dGallons'];
                    $dGrossCost = $fuel['dGrossCost'];
                    $cashAdvanced = $fuel['cashAdvanced'];
                    $discountAmt = $fuel['discountAmt'];
                    $totalAmt = $fuel['totalAmt'];
                    $invoiceNo = $fuel['invoiceNo'];

                    $cardHolderNameColumn = '"cardHolderName"';
                    $fuelDateColumn = '"fuelDate"';
                    $unit_numberColumn = '"unit_number"';
                    $transacTimeColumn = '"transacTime"';
                    $merchantNameColumn = '"merchantName"';
                    $merchantCityColumn = '"merchantCity"';
                    $statePurchColumn = '"statePurch"';
                    $dGallonsColumn = '"dGallons"';
                    $dGrossCostColumn = '"dGrossCost"';
                    $cashAdvancedColumn = '"cashAdvanced"';
                    $discountAmtColumn = '"discountAmt"';
                    $totalAmtColumn = '"totalAmt"';
                    $invoiceNoColumn = '"invoiceNo"';

                    $i++;
                    $type = '"text"';
                    $updateFuel = '"updateFuel"';

                    $c_type1 = '"'.$cardHolderName.'"';
                    $c_type2 = '"'.$unit_number.'"';
                    $c_type3 = '"'.$fuelDate.'"';
                    $c_type4 = '"'.$transacTime.'"';
                    $c_type5 = '"'.$merchantName.'"';
                    $c_type6 = '"'.$merchantCity.'"';
                    $c_type7 = '"'.$statePurch.'"';
                    $c_type8 = '"'.$dGallons.'"';
                    $c_type9 = '"'.$dGrossCost.'"';
                    $c_type10 = '"'.$cashAdvanced.'"';
                    $c_type11 = '"'.$discountAmt.'"';
                    $c_type12 = '"'.$totalAmt.'"';
                    $c_type13 = '"'.$invoiceNo.'"';

                    $title1 = '"Card Holder Name"';
                    $title2 = '"Unit Number"';
                    $title3 = '"Fuel Date"';
                    $title4 = '"Transaction Time"';
                    $title5 = '"Merchant Name"';
                    $title6 = '"Merchant City"';
                    $title7 = '"State Punch"';
                    $title8 = '"Diesel Gallons"';
                    $title9 = '"Diesel Gross Cost"';
                    $title10 = '"Cash Advanced Amount"';
                    $title11 = '"Discount AMT"';
                    $title12 = '"Total AMT"';
                    $title13 = '"Invoice No"';

                    $pencilid1 = '"cardHolderNamePencil'.$i.'"';
                    $pencilid2 = '"unit_numberPencil'.$i.'"';
                    $pencilid3 = '"fuelDatePencil'.$i.'"';
                    $pencilid4 = '"transacTimePencil'.$i.'"';
                    $pencilid5 = '"merchantNamePencil'.$i.'"';
                    $pencilid6 = '"merchantCityPencil'.$i.'"';
                    $pencilid7 = '"statePurchPencil'.$i.'"';
                    $pencilid8 = '"dGallonsPencil'.$i.'"';
                    $pencilid9 = '"dGrossCostPencil'.$i.'"';
                    $pencilid10 = '"cashAdvancedPencil'.$i.'"';
                    $pencilid11 = '"discountAmtPencil'.$i.'"';
                    $pencilid12 = '"totalAmtPencil'.$i.'"';
                    $pencilid13 = '"invoiceNoPencil'.$i.'"';

                    echo "<tr>
                        <td> $i</td>
                        <td class='custom-text' id='cardHolderName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateFuel,$type,$id,$cardHolderNameColumn,$title1,$pencilid1)'
                            ></i>
                            $cardHolderName
                        </td>
                        <td class='custom-text' id='unit_number$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='unit_numberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateFuel,$type,$id,$unit_numberColumn,$title2,$pencilid2)'
                            ></i>
                            $unit_number
                        </td>
                        <td class='custom-text' id='fuelDate$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='fuelDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateFuel,$type,$id,$fuelDateColumn,$title3,$pencilid3)'
                            ></i>
                            $fuelDate
                        </td>
                        <td class='custom-text' id='transacTime$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='transacTimePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateFuel,$type,$id,$transacTimeColumn,$title4,$pencilid4)'
                            ></i>
                            $transacTime
                        </td>
                        <td class='custom-text' id='merchantName$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='merchantNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateFuel,$type,$id,$merchantNameColumn,$title5,$pencilid5)'
                            ></i>
                            $merchantName
                        </td>
                        <td class='custom-text' id='merchantCity$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='merchantCityPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateFuel,$type,$id,$merchantCityColumn,$title6,$pencilid6)'
                            ></i>
                            $merchantCity
                        </td>
                        <td class='custom-text' id='statePurch$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='statePurchPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateFuel,$type,$id,$statePurchColumn,$title7,$pencilid7)'
                            ></i>
                            $statePurch
                        </td>
                        <td class='custom-text' id='dGallons$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='dGallonsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateFuel,$type,$id,$dGallonsColumn,$title8,$pencilid8)'
                            ></i>
                            $dGallons
                        </td>
                        <td class='custom-text' id='dGrossCost$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='dGrossCostPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateFuel,$type,$id,$dGrossCostColumn,$title9,$pencilid9)'
                            ></i>
                            $dGrossCost
                        </td>
                        <td class='custom-text' id='cashAdvanced$i'
                            onmouseover='showPencil_s($pencilid10)'
                            onmouseout='hidePencil_s($pencilid10)'
                            >
                            <i id='cashAdvancedPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type10,$updateFuel,$type,$id,$cashAdvancedColumn,$title10,$pencilid10)'
                            ></i>
                            $cashAdvanced
                        </td>
                        <td class='custom-text' id='discountAmt$i'
                            onmouseover='showPencil_s($pencilid11)'
                            onmouseout='hidePencil_s($pencilid11)'
                            >
                            <i id='discountAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type11,$updateFuel,$type,$id,$discountAmtColumn,$title11,$pencilid11)'
                            ></i>
                            $discountAmt
                        </td>
                        <td class='custom-text' id='totalAmt$i'
                            onmouseover='showPencil_s($pencilid12)'
                            onmouseout='hidePencil_s($pencilid12)'
                            >
                            <i id='totalAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type12,$updateFuel,$type,$id,$totalAmtColumn,$title12,$pencilid12)'
                            ></i>
                            $totalAmt
                        </td>
                        <td class='custom-text' id='invoiceNo$i'
                            onmouseover='showPencil_s($pencilid13)'
                            onmouseout='hidePencil_s($pencilid13)'
                            >
                            <i id='invoiceNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type13,$updateFuel,$type,$id,$invoiceNoColumn,$title13,$pencilid13)'
                            ></i>
                            $invoiceNo
                        </td>";

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deleteFuel($id,$cardHolderName)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_ifta_fuel') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    
    $cursor =  $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
                                    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['fuel_receipt']);
        $total_pages = ceil($total_records / $limit);
    }
    
    $g_data = $db->ifta_fuel_receipts->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('fuel_receipt' => array('$slice' => [$start, $limit]))));
    
    $i = 0;
    
    foreach ($g_data as $data) {
        $fuel_s = $data['fuel_receipt'];
        foreach ($fuel_s as $fuel) {
            $counter = $fuel['counter'];
            $id = $fuel['_id'];
            $cardHolderName = $fuel['cardHolderName'];
            $fuelDate = $fuel['fuelDate'];
            $unit_number = $fuel['unit_number'];
            $transacTime = $fuel['transacTime'];
            $merchantName = $fuel['merchantName'];
            $merchantCity = $fuel['merchantCity'];
            $statePurch = $fuel['statePurch'];
            $dGallons = $fuel['dGallons'];
            $dGrossCost = $fuel['dGrossCost'];
            $cashAdvanced = $fuel['cashAdvanced'];
            $discountAmt = $fuel['discountAmt'];
            $totalAmt = $fuel['totalAmt'];
            $invoiceNo = $fuel['invoiceNo'];

            $cardHolderNameColumn = '"cardHolderName"';
            $fuelDateColumn = '"fuelDate"';
            $unit_numberColumn = '"unit_number"';
            $transacTimeColumn = '"transacTime"';
            $merchantNameColumn = '"merchantName"';
            $merchantCityColumn = '"merchantCity"';
            $statePurchColumn = '"statePurch"';
            $dGallonsColumn = '"dGallons"';
            $dGrossCostColumn = '"dGrossCost"';
            $cashAdvancedColumn = '"cashAdvanced"';
            $discountAmtColumn = '"discountAmt"';
            $totalAmtColumn = '"totalAmt"';
            $invoiceNoColumn = '"invoiceNo"';

            $i++;
            $start+=1;
            $type = '"text"';
            $updateFuel = '"updateFuel"';

            $c_type1 = '"'.$cardHolderName.'"';
            $c_type2 = '"'.$unit_number.'"';
            $c_type3 = '"'.$fuelDate.'"';
            $c_type4 = '"'.$transacTime.'"';
            $c_type5 = '"'.$merchantName.'"';
            $c_type6 = '"'.$merchantCity.'"';
            $c_type7 = '"'.$statePurch.'"';
            $c_type8 = '"'.$dGallons.'"';
            $c_type9 = '"'.$dGrossCost.'"';
            $c_type10 = '"'.$cashAdvanced.'"';
            $c_type11 = '"'.$discountAmt.'"';
            $c_type12 = '"'.$totalAmt.'"';
            $c_type13 = '"'.$invoiceNo.'"';

            $title1 = '"Card Holder Name"';
            $title2 = '"Unit Number"';
            $title3 = '"Fuel Date"';
            $title4 = '"Transaction Time"';
            $title5 = '"Merchant Name"';
            $title6 = '"Merchant City"';
            $title7 = '"State Punch"';
            $title8 = '"Diesel Gallons"';
            $title9 = '"Diesel Gross Cost"';
            $title10 = '"Cash Advanced Amount"';
            $title11 = '"Discount AMT"';
            $title12 = '"Total AMT"';
            $title13 = '"Invoice No"';

            $pencilid1 = '"cardHolderNamePencil'.$i.'"';
            $pencilid2 = '"unit_numberPencil'.$i.'"';
            $pencilid3 = '"fuelDatePencil'.$i.'"';
            $pencilid4 = '"transacTimePencil'.$i.'"';
            $pencilid5 = '"merchantNamePencil'.$i.'"';
            $pencilid6 = '"merchantCityPencil'.$i.'"';
            $pencilid7 = '"statePurchPencil'.$i.'"';
            $pencilid8 = '"dGallonsPencil'.$i.'"';
            $pencilid9 = '"dGrossCostPencil'.$i.'"';
            $pencilid10 = '"cashAdvancedPencil'.$i.'"';
            $pencilid11 = '"discountAmtPencil'.$i.'"';
            $pencilid12 = '"totalAmtPencil'.$i.'"';
            $pencilid13 = '"invoiceNoPencil'.$i.'"';

            echo "<tr>
                <td> $start</td>
                <td class='custom-text' id='cardHolderName$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateFuel,$type,$id,$cardHolderNameColumn,$title1,$pencilid1)'
                    ></i>
                    $cardHolderName
                </td>
                <td class='custom-text' id='unit_number$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='unit_numberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateFuel,$type,$id,$unit_numberColumn,$title2,$pencilid2)'
                    ></i>
                    $unit_number
                </td>
                <td class='custom-text' id='fuelDate$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='fuelDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateFuel,$type,$id,$fuelDateColumn,$title3,$pencilid3)'
                    ></i>
                    $fuelDate
                </td>
                <td class='custom-text' id='transacTime$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='transacTimePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateFuel,$type,$id,$transacTimeColumn,$title4,$pencilid4)'
                    ></i>
                    $transacTime
                </td>
                <td class='custom-text' id='merchantName$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='merchantNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateFuel,$type,$id,$merchantNameColumn,$title5,$pencilid5)'
                    ></i>
                    $merchantName
                </td>
                <td class='custom-text' id='merchantCity$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='merchantCityPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateFuel,$type,$id,$merchantCityColumn,$title6,$pencilid6)'
                    ></i>
                    $merchantCity
                </td>
                <td class='custom-text' id='statePurch$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='statePurchPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateFuel,$type,$id,$statePurchColumn,$title7,$pencilid7)'
                    ></i>
                    $statePurch
                </td>
                <td class='custom-text' id='dGallons$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='dGallonsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateFuel,$type,$id,$dGallonsColumn,$title8,$pencilid8)'
                    ></i>
                    $dGallons
                </td>
                <td class='custom-text' id='dGrossCost$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='dGrossCostPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateFuel,$type,$id,$dGrossCostColumn,$title9,$pencilid9)'
                    ></i>
                    $dGrossCost
                </td>
                <td class='custom-text' id='cashAdvanced$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='cashAdvancedPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateFuel,$type,$id,$cashAdvancedColumn,$title10,$pencilid10)'
                    ></i>
                    $cashAdvanced
                </td>
                <td class='custom-text' id='discountAmt$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='discountAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateFuel,$type,$id,$discountAmtColumn,$title11,$pencilid11)'
                    ></i>
                    $discountAmt
                </td>
                <td class='custom-text' id='totalAmt$i'
                    onmouseover='showPencil_s($pencilid12)'
                    onmouseout='hidePencil_s($pencilid12)'
                    >
                    <i id='totalAmtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type12,$updateFuel,$type,$id,$totalAmtColumn,$title12,$pencilid12)'
                    ></i>
                    $totalAmt
                </td>
                <td class='custom-text' id='invoiceNo$i'
                    onmouseover='showPencil_s($pencilid13)'
                    onmouseout='hidePencil_s($pencilid13)'
                    >
                    <i id='invoiceNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type13,$updateFuel,$type,$id,$invoiceNoColumn,$title13,$pencilid13)'
                    ></i>
                    $invoiceNo
                </td>";

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deleteFuel($id,$cardHolderName)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
    }
}

?>