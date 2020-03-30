<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_truck_table') {
    $i = 0;
    $table = "";
    $list = "";
    $type = '"text"';
    $limit = 100;

    $cursor = $db->truckadd->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['truck']);
        $total_pages = ceil($total_records / $limit);
    }

    $collection = $db->truckadd;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'truck_add',
            'localField' => 'companyID',
            'foreignField' => 'companyID',
            'as' => 'truckdetails'
        ]],
        ['$match'=>['companyID' => $_SESSION['companyId']]],
        ['$project'=>['companyID'=>$_SESSION['companyId'],'truck'=>['$slice'=>['$truck',0,100]],'truckdetails'=>1]]
    ]);
        
    foreach ($show1 as $row) {
        $truck = $row['truck'];
        $truckdetails = $row['truckdetails'];
        foreach ($truckdetails as $row3) {
            $truckmaster = $row3['truck'];
            $truck_Type = array();
            foreach ($truckmaster as $row4) {
                $trucktypeid = $row4['_id'];
                $truck_Type[$trucktypeid] = $row4['truckType'];
            }
        }
        foreach ($truck as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $truckNumber = $row1['truckNumber'];
            $truckT = $row1['truckType'];
            $truckType = $truck_Type[$row1['truckType']]."<br>";
            $licensePlate = $row1['licensePlate'];
            if(empty($row1['plateExpiry'])) {
               $plateExpiry = "";
            } else {
                $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
            }
            if(empty($row1['inspectionExpiry'])) {
                $inspectionExpiry = "";
            } else {
                $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
            }
            $status = $row1['status'];
            $ownership = $row1['ownership'];
            $mileage = $row1['mileage'];
            $axies = $row1['axies'];
            $year = $row1['year'];
            $fuelType = $row1['fuelType'];
            if(empty($row1['startDate'])) {
               $startDate = "";
            } else {
                $startDate = date('d/m/Y',$row1['startDate']);
            }
            if(empty($row1['deactivationDate'])){
                $deactivationDate = "";
            }else {
                $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
            }
            $ifta = $row1['ifta'];
            $registeredState = $row1['registeredState'];
            $insurancePolicy = $row1['insurancePolicy'];
            $grossWeight = $row1['grossWeight'];
            $vin = $row1['vin'];
            if(empty($row1['dotexpiryDate'])){
               $dotexpiryDate = "";
            }else {
                $dotexpiryDate = date('d/m/Y',$row1['dotexpiryDate']);
            }
            $transponder = $row1['transponder'];
            $internalNotes = $row1['internalNotes'];
                
            $updateTruckAdd = '"updateTruckAdd"';
            $i++;

            $column1 = '"truckNumber"';
            $column2 = '"licensePlate"';
            $column3 = '"plateExpiry"';
            $column4 = '"inspectionExpiry"';
            $column5 = '"status"';
            $column6 = '"Ownership"';
            $column7 = '"mileage"';
            $column8 = '"axies"';
            $column9 = '"year"';
            $column10 = '"fuelType"';
            $column11 = '"startDate"';
            $column12 = '"deactivationDate"';
            $column13 = '"ifta"';
            $column14 = '"registeredState"';
            $column15 = '"insurancePolicy"';
            $column16 = '"grossWeight"';
            $column17 = '"vin"';
            $column18 = '"dotexpiryDate"';
            $column19 = '"transponder"';
            $column20 = '"internalNotes"';

            $c_type1 = '"'.$truckNumber.'"';
            $c_type2 = '"'.$licensePlate.'"';
            $c_type3 = '"'.$plateExpiry.'"';
            $c_type4 = '"'.$inspectionExpiry.'"';
            $c_type5 = '"'.$status.'"';
            $c_type6 = '"'.$ownership.'"';
            $c_type7 = '"'.$mileage.'"';
            $c_type8 = '"'.$axies.'"';
            $c_type9 = '"'.$year.'"';
            $c_type10 = '"'.$fuelType.'"';
            $c_type11 = '"'.$startDate.'"';
            $c_type12 = '"'.$deactivationDate.'"';
            $c_type13 = '"'.$ifta.'"';
            $c_type14 = '"'.$registeredState.'"';
            $c_type15 = '"'.$insurancePolicy.'"';
            $c_type16 = '"'.$grossWeight.'"';
            $c_type17 = '"'.$vin.'"';
            $c_type18 = '"'.$dotexpiryDate.'"';
            $c_type19 = '"'.$transponder.'"';
            $c_type20 = '"'.$internalNotes.'"';

            $title1 = '"Truck Number"';
            $title2 = '"License Plate"';
            $title3 = '"Plate Expiry"';
            $title4 = '"Inspection Expiry"';
            $title5 = '"Status"';
            $title6 = '"Ownership"';
            $title7 = '"Mileage"';
            $title8 = '"Axies"';
            $title9 = '"Year"';
            $title10 = '"Fuel Type"';
            $title11 = '"Start Date"';
            $title12 = '"Deactivation Date"';
            $title13 = '"IFTA Truck"';
            $title14 = '"Registered State"';
            $title15 = '"Insurance Policy"';
            $title16 = '"Gross Weight"';
            $title17 = '"VIN"';
            $title18 = '"Dot Expiry Date"';
            $title19 = '"Transponder"';
            $title20 = '"Internal Notes"';

            $pencilid1 = '"truckNumberPencil'.$i.'"';
            $pencilid2 = '"licensePlatePencil'.$i.'"';
            $pencilid3 = '"plateExpiryPencil'.$i.'"';
            $pencilid4 = '"inspectionExpiryPencil'.$i.'"';
            $pencilid5 = '"statusPencil'.$i.'"';
            $pencilid6 = '"ownershipPencil'.$i.'"';
            $pencilid7 = '"mileagePencil'.$i.'"';
            $pencilid8 = '"axiesPencil'.$i.'"';
            $pencilid9 = '"yearPencil'.$i.'"';
            $pencilid10 = '"fuelTypePencil'.$i.'"';
            $pencilid11 = '"startDatePencil'.$i.'"';
            $pencilid12 = '"deactivationDatePencil'.$i.'"';
            $pencilid13 = '"iftaPencil'.$i.'"';
            $pencilid14 = '"registeredStatePencil'.$i.'"';
            $pencilid15 = '"insurancePolicyPencil'.$i.'"';
            $pencilid16 = '"grossWeightPencil'.$i.'"';
            $pencilid17 = '"vinPencil'.$i.'"';
            $pencilid18 = '"dotexpiryDatePencil'.$i.'"';
            $pencilid19 = '"transponderPencil'.$i.'"';
            $pencilid20 = '"internalNotesPencil'.$i.'"';

                echo "<tr>
                    <td>$i</td>
                    <td class='custom-text' id='truckNumber$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='truckNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTruckAdd,$type,$id,$column1,$title1,$pencilid1)'
                        ></i>
                        $truckNumber
                    </td>
                    <td class='custom-text'>
                        $truckType
                    </td>
                    <td class='custom-text' id='licensePlate$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateTruckAdd,$type,$id,$column2,$title2,$pencilid2)'
                        ></i>
                        $licensePlate
                    </td>
                    <td class='custom-text' id='plateExpiry$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTruckAdd,$type,$id,$column3,$title3,$pencilid3)'
                        ></i>
                        $plateExpiry
                    </td>
                    <td class='custom-text' id='inspectionExpiry$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='inspectionExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTruckAdd,$type,$id,$column4,$title4,$pencilid4)'
                        ></i>
                        $inspectionExpiry
                    </td>
                    <td class='custom-text' id='status$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTruckAdd,$type,$id,$column5,$title5,$pencilid5)'
                        ></i>
                        $status
                    </td>
                    <td class='custom-text' id='ownership$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='ownershipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTruckAdd,$type,$id,$column6,$title6,$pencilid6)'
                        ></i>
                        $ownership
                    </td>
                    <td class='custom-text' id='mileage$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='mileagePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateTruckAdd,$type,$id,$column7,$title7,$pencilid7)'
                        ></i>
                        $mileage
                    </td>
                    <td class='custom-text' id='axies$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateTruckAdd,$type,$id,$column8,$title8,$pencilid8)'
                        ></i>
                        $axies
                    </td>
                    <td class='custom-text' id='year$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateTruckAdd,$type,$id,$column9,$title9,$pencilid9)'
                        ></i>
                        $year
                    </td>
                    <td class='custom-text' id='fuelType$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='fuelTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateTruckAdd,$type,$id,$column10,$title10,$pencilid10)'
                        ></i>
                        $fuelType
                    </td>
                    <td class='custom-text' id='startDate$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='startDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateTruckAdd,$type,$id,$column11,$title11,$pencilid11)'
                        ></i>
                        $startDate
                    </td>
                    <td class='custom-text' id='deactivationDate$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='deactivationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateTruckAdd,$type,$id,$column12,$title12,$pencilid12)'
                        ></i>
                        $deactivationDate
                    </td>
                    <td class='custom-text' id='ifta$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='iftaPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateTruckAdd,$type,$id,$column13,$title13,$pencilid13)'
                        ></i>
                        $ifta
                    </td>
                    <td class='custom-text' id='registeredState$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateTruckAdd,$type,$id,$column14,$title14,$pencilid14)'
                        ></i>
                        $registeredState
                    </td>
                    <td class='custom-text' id='insurancePolicy$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='insurancePolicyPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateTruckAdd,$type,$id,$column15,$title15,$pencilid15)'
                        ></i>
                        $insurancePolicy
                    </td>
                    <td class='custom-text' id='grossWeight$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='grossWeightPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateTruckAdd,$type,$id,$column16,$title16,$pencilid16)'
                        ></i>
                        $grossWeight
                    </td>
                    <td class='custom-text' id='vin$i'
                        onmouseover='showPencil_s($pencilid17)'
                        onmouseout='hidePencil_s($pencilid17)'
                        >
                        <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type17,$updateTruckAdd,$type,$id,$column17,$title17,$pencilid17)'
                        ></i>
                        $vin
                    </td>
                    <td class='custom-text' id='dotexpiryDate$i'
                        onmouseover='showPencil_s($pencilid18)'
                        onmouseout='hidePencil_s($pencilid18)'
                        >
                        <i id='dotexpiryDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type18,$updateTruckAdd,$type,$id,$column18,$title18,$pencilid18)'
                        ></i>
                        $dotexpiryDate
                    </td>
                    <td class='custom-text' id='transponder$i'
                        onmouseover='showPencil_s($pencilid19)'
                        onmouseout='hidePencil_s($pencilid19)'
                        >
                        <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type19,$updateTruckAdd,$type,$id,$column19,$title19,$pencilid19)'
                        ></i>
                        $transponder
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid20)'
                        onmouseout='hidePencil_s($pencilid20)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type20,$updateTruckAdd,$type,$id,$column20,$title20,$pencilid20)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteTruckAdd($id,$truckT)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }

                $value = "'".$id.")&nbsp;".$truckNumber."'";
                $list .= "<option value=$value></option>";
            }
    }
       // echo $table."^".$list;
}

if ($_GET['types'] == 'search_text') {
    $i = 0;
    $type = '"text"';
    $collection = $db->truckadd;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'truck_add',
            'localField' => 'companyID',
            'foreignField' => 'companyID',
            'as' => 'truckdetails'
        ]],
        ['$match'=>['companyID'=>$_SESSION['companyId']]]
     ]);
        
    foreach ($show1 as $row) {
        $truck = $row['truck'];
        $truckdetails = $row['truckdetails'];
        foreach ($truckdetails as $row3) {
            $truckmaster = $row3['truck'];
            $truck_Type = array();
            foreach ($truckmaster as $row4) {
                $trucktypeid = $row4['_id'];
                $truck_Type[$trucktypeid] = $row4['truckType'];
            }
        }
        foreach ($truck as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $truckT = $row1['truckType'];
            $truckNumber = $row1['truckNumber'];
            $truckType = $truck_Type[$row1['truckType']]."<br>";
            $licensePlate = $row1['licensePlate'];
            if(empty($row1['plateExpiry'])) {
            $plateExpiry = "";
            } else {
                $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
            }
            if(empty($row1['inspectionExpiry'])) {
            $inspectionExpiry = "";
                } else {
                $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
            }
            $status = $row1['status'];
            $ownership = $row1['ownership'];
            $mileage = $row1['mileage'];
            $axies = $row1['axies'];
            $year = $row1['year'];
            $fuelType = $row1['fuelType'];
            if(empty($row1['startDate'])) {
            $startDate = "";
            } else {
                $startDate = date('d/m/Y',$row1['startDate']);
            }
            if(empty($row1['deactivationDate'])){
                $deactivationDate = "";
            }else {
                $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
            }
            $ifta = $row1['ifta'];
            $registeredState = $row1['registeredState'];
            $insurancePolicy = $row1['insurancePolicy'];
            $grossWeight = $row1['grossWeight'];
            $vin = $row1['vin'];
            if(empty($row1['dotexpiryDate'])){
            $dotexpiryDate = "";
            }else {
                $dotexpiryDate = date('d/m/Y',$row1['dotexpiryDate']);
            }
            $transponder = $row1['transponder'];
            $internalNotes = $row1['internalNotes'];
            
            $updateTruckAdd = '"updateTruckAdd"';
            $i++;

            $column1 = '"truckNumber"';
            $column2 = '"licensePlate"';
            $column3 = '"plateExpiry"';
            $column4 = '"inspectionExpiry"';
            $column5 = '"status"';
            $column6 = '"Ownership"';
            $column7 = '"mileage"';
            $column8 = '"axies"';
            $column9 = '"year"';
            $column10 = '"fuelType"';
            $column11 = '"startDate"';
            $column12 = '"deactivationDate"';
            $column13 = '"ifta"';
            $column14 = '"registeredState"';
            $column15 = '"insurancePolicy"';
            $column16 = '"grossWeight"';
            $column17 = '"vin"';
            $column18 = '"dotexpiryDate"';
            $column19 = '"transponder"';
            $column20 = '"internalNotes"';

            $c_type1 = '"'.$truckNumber.'"';
            $c_type2 = '"'.$licensePlate.'"';
            $c_type3 = '"'.$plateExpiry.'"';
            $c_type4 = '"'.$inspectionExpiry.'"';
            $c_type5 = '"'.$status.'"';
            $c_type6 = '"'.$ownership.'"';
            $c_type7 = '"'.$mileage.'"';
            $c_type8 = '"'.$axies.'"';
            $c_type9 = '"'.$year.'"';
            $c_type10 = '"'.$fuelType.'"';
            $c_type11 = '"'.$startDate.'"';
            $c_type12 = '"'.$deactivationDate.'"';
            $c_type13 = '"'.$ifta.'"';
            $c_type14 = '"'.$registeredState.'"';
            $c_type15 = '"'.$insurancePolicy.'"';
            $c_type16 = '"'.$grossWeight.'"';
            $c_type17 = '"'.$vin.'"';
            $c_type18 = '"'.$dotexpiryDate.'"';
            $c_type19 = '"'.$transponder.'"';
            $c_type20 = '"'.$internalNotes.'"';

            $title1 = '"Truck Number"';
            $title2 = '"License Plate"';
            $title3 = '"Plate Expiry"';
            $title4 = '"Inspection Expiry"';
            $title5 = '"Status"';
            $title6 = '"Ownership"';
            $title7 = '"Mileage"';
            $title8 = '"Axies"';
            $title9 = '"Year"';
            $title10 = '"Fuel Type"';
            $title11 = '"Start Date"';
            $title12 = '"Deactivation Date"';
            $title13 = '"IFTA Truck"';
            $title14 = '"Registered State"';
            $title15 = '"Insurance Policy"';
            $title16 = '"Gross Weight"';
            $title17 = '"VIN"';
            $title18 = '"Dot Expiry Date"';
            $title19 = '"Transponder"';
            $title20 = '"Internal Notes"';

            $pencilid1 = '"truckNumberPencil'.$i.'"';
            $pencilid2 = '"licensePlatePencil'.$i.'"';
            $pencilid3 = '"plateExpiryPencil'.$i.'"';
            $pencilid4 = '"inspectionExpiryPencil'.$i.'"';
            $pencilid5 = '"statusPencil'.$i.'"';
            $pencilid6 = '"ownershipPencil'.$i.'"';
            $pencilid7 = '"mileagePencil'.$i.'"';
            $pencilid8 = '"axiesPencil'.$i.'"';
            $pencilid9 = '"yearPencil'.$i.'"';
            $pencilid10 = '"fuelTypePencil'.$i.'"';
            $pencilid11 = '"startDatePencil'.$i.'"';
            $pencilid12 = '"deactivationDatePencil'.$i.'"';
            $pencilid13 = '"iftaPencil'.$i.'"';
            $pencilid14 = '"registeredStatePencil'.$i.'"';
            $pencilid15 = '"insurancePolicyPencil'.$i.'"';
            $pencilid16 = '"grossWeightPencil'.$i.'"';
            $pencilid17 = '"vinPencil'.$i.'"';
            $pencilid18 = '"dotexpiryDatePencil'.$i.'"';
            $pencilid19 = '"transponderPencil'.$i.'"';
            $pencilid20 = '"internalNotesPencil'.$i.'"';

            if ($_POST['getoption'] == $row1['truckNumber'] 
                || $_POST['getoption'] == $truckType 
                || $_POST['getoption'] == $row1['licensePlate'] 
                || $_POST['getoption'] == $plateExpiry 
                || $_POST['getoption'] == $inspectionExpiry
                || $_POST['getoption'] == $row1['status']
                || $_POST['getoption'] == $row1['ownership']
                || $_POST['getoption'] == $row1['mileage']
                || $_POST['getoption'] == $row1['axies']
                || $_POST['getoption'] == $row1['year']
                || $_POST['getoption'] == $row1['fuelType']
                || $_POST['getoption'] == $startDate
                || $_POST['getoption'] == $deactivationDate
                || $_POST['getoption'] == $row1['ifta']
                || $_POST['getoption'] == $row1['registeredState']
                || $_POST['getoption'] == $row1['insurancePolicy']
                || $_POST['getoption'] == $row1['grossWeight']
                || $_POST['getoption'] == $row1['vin']
                || $_POST['getoption'] == $dotexpiryDate
                || $_POST['getoption'] == $row1['transponder']
                || $_POST['getoption'] == $row1['internalNotes']
            ) {
                echo "<tr>
                    <td>$i</td>
                    <td class='custom-text' id='truckNumber$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='truckNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTruckAdd,$type,$id,$column1,$title1,$pencilid1)'
                        ></i>
                        $truckNumber
                    </td>
                    <td class='custom-text'>
                        $truckType
                    </td>
                    <td class='custom-text' id='licensePlate$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateTruckAdd,$type,$id,$column2,$title2,$pencilid2)'
                        ></i>
                        $licensePlate
                    </td>
                    <td class='custom-text' id='plateExpiry$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTruckAdd,$type,$id,$column3,$title3,$pencilid3)'
                        ></i>
                        $plateExpiry
                    </td>
                    <td class='custom-text' id='inspectionExpiry$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='inspectionExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTruckAdd,$type,$id,$column4,$title4,$pencilid4)'
                        ></i>
                        $inspectionExpiry
                    </td>
                    <td class='custom-text' id='status$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTruckAdd,$type,$id,$column5,$title5,$pencilid5)'
                        ></i>
                        $status
                    </td>
                    <td class='custom-text' id='ownership$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='ownershipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTruckAdd,$type,$id,$column6,$title6,$pencilid6)'
                        ></i>
                        $ownership
                    </td>
                    <td class='custom-text' id='mileage$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='mileagePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateTruckAdd,$type,$id,$column7,$title7,$pencilid7)'
                        ></i>
                        $mileage
                    </td>
                    <td class='custom-text' id='axies$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateTruckAdd,$type,$id,$column8,$title8,$pencilid8)'
                        ></i>
                        $axies
                    </td>
                    <td class='custom-text' id='year$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateTruckAdd,$type,$id,$column9,$title9,$pencilid9)'
                        ></i>
                        $year
                    </td>
                    <td class='custom-text' id='fuelType$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='fuelTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateTruckAdd,$type,$id,$column10,$title10,$pencilid10)'
                        ></i>
                        $fuelType
                    </td>
                    <td class='custom-text' id='startDate$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='startDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateTruckAdd,$type,$id,$column11,$title11,$pencilid11)'
                        ></i>
                        $startDate
                    </td>
                    <td class='custom-text' id='deactivationDate$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='deactivationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateTruckAdd,$type,$id,$column12,$title12,$pencilid12)'
                        ></i>
                        $deactivationDate
                    </td>
                    <td class='custom-text' id='ifta$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='iftaPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateTruckAdd,$type,$id,$column13,$title13,$pencilid13)'
                        ></i>
                        $ifta
                    </td>
                    <td class='custom-text'id='registeredState$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateTruckAdd,$type,$id,$column14,$title14,$pencilid14)'
                        ></i>
                        $registeredState
                    </td>
                    <td class='custom-text' id='insurancePolicy$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='insurancePolicyPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateTruckAdd,$type,$id,$column15,$title15,$pencilid15)'
                        ></i>
                        $insurancePolicy
                    </td>
                    <td class='custom-text' id='grossWeight$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='grossWeightPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateTruckAdd,$type,$id,$column16,$title16,$pencilid16)'
                        ></i>
                        $grossWeight
                    </td>
                    <td class='custom-text' id='vin$i'
                        onmouseover='showPencil_s($pencilid17)'
                        onmouseout='hidePencil_s($pencilid17)'
                        >
                        <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type17,$updateTruckAdd,$type,$id,$column17,$title17,$pencilid17)'
                        ></i>
                        $vin
                    </td>
                    <td class='custom-text' id='dotexpiryDate$i'
                        onmouseover='showPencil_s($pencilid18)'
                        onmouseout='hidePencil_s($pencilid18)'
                        >
                        <i id='dotexpiryDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type18,$updateTruckAdd,$type,$id,$column18,$title18,$pencilid18)'
                        ></i>
                        $dotexpiryDate
                    </td>
                    <td class='custom-text' id='transponder$i'
                        onmouseover='showPencil_s($pencilid19)'
                        onmouseout='hidePencil_s($pencilid19)'
                        >
                        <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type19,$updateTruckAdd,$type,$id,$column19,$title19,$pencilid19)'
                        ></i>
                        $transponder
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid20)'
                        onmouseout='hidePencil_s($pencilid20)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type20,$updateTruckAdd,$type,$id,$column20,$title20,$pencilid20)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteTruckAdd($id,$truckT)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
        }
    }

    if ($_POST['getoption'] == "") {
        $i = 0;
        $type = '"text"';
        $limit = 100;
        
        $cursor = $db->truckadd->find(array('companyID' => $_SESSION['companyId']));
    
        foreach ($cursor as $value) {
            $total_records = sizeof($value['truck']);
            $total_pages = ceil($total_records / $limit);
        }

        $collection = $db->truckadd;
        $show1 = $collection->aggregate([
            ['$lookup' => [
                'from' => 'truck_add',
                'localField' => 'companyID',
                'foreignField' => 'companyID',
                'as' => 'truckdetails'
            ]],
            ['$match'=>['companyID' => $_SESSION['companyId']]],
            ['$project'=>['companyID'=>$_SESSION['companyId'],'truck'=>['$slice'=>['$truck',0,100]],'truckdetails'=>1]]
        ]);
            
        foreach ($show1 as $row) {
            $truck = $row['truck'];
            $truckdetails = $row['truckdetails'];
            foreach ($truckdetails as $row3) {
                $truckmaster = $row3['truck'];
                $truck_Type = array();
                foreach ($truckmaster as $row4) {
                    $trucktypeid = $row4['_id'];
                    $truck_Type[$trucktypeid] = $row4['truckType'];
                }
            }
            foreach ($truck as $row1) {
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $truckT = $row1['truckType'];
                $truckNumber = $row1['truckNumber'];
                $truckType = $truck_Type[$row1['truckType']]."<br>";
                $licensePlate = $row1['licensePlate'];
                if(empty($row1['plateExpiry'])) {
                    $plateExpiry = "";
                } else {
                    $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
                }
                if(empty($row1['inspectionExpiry'])) {
                    $inspectionExpiry = "";
                } else {
                    $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
                }
                $status = $row1['status'];
                $ownership = $row1['ownership'];
                $mileage = $row1['mileage'];
                $axies = $row1['axies'];
                $year = $row1['year'];
                $fuelType = $row1['fuelType'];
                if(empty($row1['startDate'])) {
                    $startDate = "";
                } else {
                    $startDate = date('d/m/Y',$row1['startDate']);
                }
                if(empty($row1['deactivationDate'])){
                    $deactivationDate = "";
                }else {
                    $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
                }
                $ifta = $row1['ifta'];
                $registeredState = $row1['registeredState'];
                $insurancePolicy = $row1['insurancePolicy'];
                $grossWeight = $row1['grossWeight'];
                $vin = $row1['vin'];
                if(empty($row1['dotexpiryDate'])){
                    $dotexpiryDate = "";
                }else {
                    $dotexpiryDate = date('d/m/Y',$row1['dotexpiryDate']);
                }
                $transponder = $row1['transponder'];
                $internalNotes = $row1['internalNotes'];
                    
                $updateTruckAdd = '"updateTruckAdd"';
                $i++;

                $column1 = '"truckNumber"';
                $column2 = '"licensePlate"';
                $column3 = '"plateExpiry"';
                $column4 = '"inspectionExpiry"';
                $column5 = '"status"';
                $column6 = '"Ownership"';
                $column7 = '"mileage"';
                $column8 = '"axies"';
                $column9 = '"year"';
                $column10 = '"fuelType"';
                $column11 = '"startDate"';
                $column12 = '"deactivationDate"';
                $column13 = '"ifta"';
                $column14 = '"registeredState"';
                $column15 = '"insurancePolicy"';
                $column16 = '"grossWeight"';
                $column17 = '"vin"';
                $column18 = '"dotexpiryDate"';
                $column19 = '"transponder"';
                $column20 = '"internalNotes"';

                $c_type1 = '"'.$truckNumber.'"';
                $c_type2 = '"'.$licensePlate.'"';
                $c_type3 = '"'.$plateExpiry.'"';
                $c_type4 = '"'.$inspectionExpiry.'"';
                $c_type5 = '"'.$status.'"';
                $c_type6 = '"'.$ownership.'"';
                $c_type7 = '"'.$mileage.'"';
                $c_type8 = '"'.$axies.'"';
                $c_type9 = '"'.$year.'"';
                $c_type10 = '"'.$fuelType.'"';
                $c_type11 = '"'.$startDate.'"';
                $c_type12 = '"'.$deactivationDate.'"';
                $c_type13 = '"'.$ifta.'"';
                $c_type14 = '"'.$registeredState.'"';
                $c_type15 = '"'.$insurancePolicy.'"';
                $c_type16 = '"'.$grossWeight.'"';
                $c_type17 = '"'.$vin.'"';
                $c_type18 = '"'.$dotexpiryDate.'"';
                $c_type19 = '"'.$transponder.'"';
                $c_type20 = '"'.$internalNotes.'"';

                $title1 = '"Truck Number"';
                $title2 = '"License Plate"';
                $title3 = '"Plate Expiry"';
                $title4 = '"Inspection Expiry"';
                $title5 = '"Status"';
                $title6 = '"Ownership"';
                $title7 = '"Mileage"';
                $title8 = '"Axies"';
                $title9 = '"Year"';
                $title10 = '"Fuel Type"';
                $title11 = '"Start Date"';
                $title12 = '"Deactivation Date"';
                $title13 = '"IFTA Truck"';
                $title14 = '"Registered State"';
                $title15 = '"Insurance Policy"';
                $title16 = '"Gross Weight"';
                $title17 = '"VIN"';
                $title18 = '"Dot Expiry Date"';
                $title19 = '"Transponder"';
                $title20 = '"Internal Notes"';

                $pencilid1 = '"truckNumberPencil'.$i.'"';
                $pencilid2 = '"licensePlatePencil'.$i.'"';
                $pencilid3 = '"plateExpiryPencil'.$i.'"';
                $pencilid4 = '"inspectionExpiryPencil'.$i.'"';
                $pencilid5 = '"statusPencil'.$i.'"';
                $pencilid6 = '"ownershipPencil'.$i.'"';
                $pencilid7 = '"mileagePencil'.$i.'"';
                $pencilid8 = '"axiesPencil'.$i.'"';
                $pencilid9 = '"yearPencil'.$i.'"';
                $pencilid10 = '"fuelTypePencil'.$i.'"';
                $pencilid11 = '"startDatePencil'.$i.'"';
                $pencilid12 = '"deactivationDatePencil'.$i.'"';
                $pencilid13 = '"iftaPencil'.$i.'"';
                $pencilid14 = '"registeredStatePencil'.$i.'"';
                $pencilid15 = '"insurancePolicyPencil'.$i.'"';
                $pencilid16 = '"grossWeightPencil'.$i.'"';
                $pencilid17 = '"vinPencil'.$i.'"';
                $pencilid18 = '"dotexpiryDatePencil'.$i.'"';
                $pencilid19 = '"transponderPencil'.$i.'"';
                $pencilid20 = '"internalNotesPencil'.$i.'"';

                echo "<tr>
                    <td>$i</td>
                    <td class='custom-text' class='custom-text' id='truckNumber$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='truckNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTruckAdd,$type,$id,$column1,$title1,$pencilid1)'
                        ></i>
                        $truckNumber
                    </td>
                    <td class='custom-text'>
                        $truckType
                    </td>
                    <td class='custom-text' id='licensePlate$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateTruckAdd,$type,$id,$column2,$title2,$pencilid2)'
                        ></i>
                        $licensePlate
                    </td>
                    <td class='custom-text' id='plateExpiry$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTruckAdd,$type,$id,$column3,$title3,$pencilid3)'
                        ></i>
                        $plateExpiry
                    </td>
                    <td class='custom-text' id='inspectionExpiry$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='inspectionExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTruckAdd,$type,$id,$column4,$title4,$pencilid4)'
                        ></i>
                        $inspectionExpiry
                    </td>
                    <td class='custom-text' id='status$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTruckAdd,$type,$id,$column5,$title5,$pencilid5)'
                        ></i>
                        $status
                    </td>
                    <td class='custom-text' id='ownership$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='ownershipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTruckAdd,$type,$id,$column6,$title6,$pencilid6)'
                        ></i>
                        $ownership
                    </td>
                    <td class='custom-text' id='mileage$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='mileagePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateTruckAdd,$type,$id,$column7,$title7,$pencilid7)'
                        ></i>
                        $mileage
                    </td>
                    <td class='custom-text' id='axies$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateTruckAdd,$type,$id,$column8,$title8,$pencilid8)'
                        ></i>
                        $axies
                    </td>
                    <td class='custom-text' id='year$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateTruckAdd,$type,$id,$column9,$title9,$pencilid9)'
                        ></i>
                        $year
                    </td>
                    <td class='custom-text' id='fuelType$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='fuelTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateTruckAdd,$type,$id,$column10,$title10,$pencilid10)'
                        ></i>
                        $fuelType
                    </td>
                    <td class='custom-text' id='startDate$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='startDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateTruckAdd,$type,$id,$column11,$title11,$pencilid11)'
                        ></i>
                        $startDate
                    </td>
                    <td class='custom-text' id='deactivationDate$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='deactivationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateTruckAdd,$type,$id,$column12,$title12,$pencilid12)'
                        ></i>
                        $deactivationDate
                    </td>
                    <td class='custom-text' id='ifta$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='iftaPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateTruckAdd,$type,$id,$column13,$title13,$pencilid13)'
                        ></i>
                        $ifta
                    </td>
                    <td class='custom-text' id='registeredState$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateTruckAdd,$type,$id,$column14,$title14,$pencilid14)'
                        ></i>
                        $registeredState
                    </td>
                    <td class='custom-text' id='insurancePolicy$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='insurancePolicyPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateTruckAdd,$type,$id,$column15,$title15,$pencilid15)'
                        ></i>
                        $insurancePolicy
                    </td>
                    <td class='custom-text' id='grossWeight$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='grossWeightPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateTruckAdd,$type,$id,$column16,$title16,$pencilid16)'
                        ></i>
                        $grossWeight
                    </td>
                    <td class='custom-text' id='vin$i'
                        onmouseover='showPencil_s($pencilid17)'
                        onmouseout='hidePencil_s($pencilid17)'
                        >
                        <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type17,$updateTruckAdd,$type,$id,$column17,$title17,$pencilid17)'
                        ></i>
                        $vin
                    </td>
                    <td class='custom-text' id='dotexpiryDate$i'
                        onmouseover='showPencil_s($pencilid18)'
                        onmouseout='hidePencil_s($pencilid18)'
                        >
                        <i id='dotexpiryDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type18,$updateTruckAdd,$type,$id,$column18,$title18,$pencilid18)'
                        ></i>
                        $dotexpiryDate
                    </td>
                    <td class='custom-text' id='transponder$i'
                        onmouseover='showPencil_s($pencilid19)'
                        onmouseout='hidePencil_s($pencilid19)'
                        >
                        <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type19,$updateTruckAdd,$type,$id,$column19,$title19,$pencilid19)'
                        ></i>
                        $transponder
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid20)'
                        onmouseout='hidePencil_s($pencilid20)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type20,$updateTruckAdd,$type,$id,$column20,$title20,$pencilid20)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteTruckAdd($id,$truckT)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_truck_admin') {
    $i = 0;
    $table = "";
    $list = "";
    $type = '"text"';

    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    
    $cursor = $db->truckadd->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['truck']);
        $total_pages = ceil($total_records / $limit);
    }

    $collection = $db->truckadd;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'truck_add',
            'localField' => 'companyID',
            'foreignField' => 'companyID',
            'as' => 'truckdetails'
        ]],
        ['$match'=>['companyID' => $_SESSION['companyId']]],
        ['$project'=>['companyID'=>$_SESSION['companyId'],'truck'=>['$slice'=>['$truck',$start,$limit]],'truckdetails'=>1]]
    ]);
        
    foreach ($show1 as $row) {
        $truck = $row['truck'];
        $truckdetails = $row['truckdetails'];
        foreach ($truckdetails as $row3) {
            $truckmaster = $row3['truck'];
            $truck_Type = array();
            foreach ($truckmaster as $row4) {
                $trucktypeid = $row4['_id'];
                $truck_Type[$trucktypeid] = $row4['truckType'];
            }
        }
        foreach ($truck as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $truckT = $row1['truckType'];
            $truckNumber = $row1['truckNumber'];
            $truckType = $truck_Type[$row1['truckType']]."<br>";
            $licensePlate = $row1['licensePlate'];
            if(empty($row1['plateExpiry'])) {
               $plateExpiry = "";
            } else {
                $plateExpiry = date('d/m/Y',$row1['plateExpiry']);
            }
            if(empty($row1['inspectionExpiry'])) {
                $inspectionExpiry = "";
            } else {
                $inspectionExpiry = date('d/m/Y',$row1['inspectionExpiry']);
            }
            $status = $row1['status'];
            $ownership = $row1['ownership'];
            $mileage = $row1['mileage'];
            $axies = $row1['axies'];
            $year = $row1['year'];
            $fuelType = $row1['fuelType'];
            if(empty($row1['startDate'])) {
               $startDate = "";
            } else {
                $startDate = date('d/m/Y',$row1['startDate']);
            }
            if(empty($row1['deactivationDate'])){
                $deactivationDate = "";
            }else {
                $deactivationDate = date('d/m/Y',$row1['deactivationDate']);
            }
            $ifta = $row1['ifta'];
            $registeredState = $row1['registeredState'];
            $insurancePolicy = $row1['insurancePolicy'];
            $grossWeight = $row1['grossWeight'];
            $vin = $row1['vin'];
            if(empty($row1['dotexpiryDate'])){
               $dotexpiryDate = "";
            }else {
                $dotexpiryDate = date('d/m/Y',$row1['dotexpiryDate']);
            }
            $transponder = $row1['transponder'];
            $internalNotes = $row1['internalNotes'];
                
            $updateTruckAdd = '"updateTruckAdd"';
            $i++;
            $start += 1;

            $column1 = '"truckNumber"';
            $column2 = '"licensePlate"';
            $column3 = '"plateExpiry"';
            $column4 = '"inspectionExpiry"';
            $column5 = '"status"';
            $column6 = '"Ownership"';
            $column7 = '"mileage"';
            $column8 = '"axies"';
            $column9 = '"year"';
            $column10 = '"fuelType"';
            $column11 = '"startDate"';
            $column12 = '"deactivationDate"';
            $column13 = '"ifta"';
            $column14 = '"registeredState"';
            $column15 = '"insurancePolicy"';
            $column16 = '"grossWeight"';
            $column17 = '"vin"';
            $column18 = '"dotexpiryDate"';
            $column19 = '"transponder"';
            $column20 = '"internalNotes"';

            $c_type1 = '"'.$truckNumber.'"';
            $c_type2 = '"'.$licensePlate.'"';
            $c_type3 = '"'.$plateExpiry.'"';
            $c_type4 = '"'.$inspectionExpiry.'"';
            $c_type5 = '"'.$status.'"';
            $c_type6 = '"'.$ownership.'"';
            $c_type7 = '"'.$mileage.'"';
            $c_type8 = '"'.$axies.'"';
            $c_type9 = '"'.$year.'"';
            $c_type10 = '"'.$fuelType.'"';
            $c_type11 = '"'.$startDate.'"';
            $c_type12 = '"'.$deactivationDate.'"';
            $c_type13 = '"'.$ifta.'"';
            $c_type14 = '"'.$registeredState.'"';
            $c_type15 = '"'.$insurancePolicy.'"';
            $c_type16 = '"'.$grossWeight.'"';
            $c_type17 = '"'.$vin.'"';
            $c_type18 = '"'.$dotexpiryDate.'"';
            $c_type19 = '"'.$transponder.'"';
            $c_type20 = '"'.$internalNotes.'"';

            $title1 = '"Truck Number"';
            $title2 = '"License Plate"';
            $title3 = '"Plate Expiry"';
            $title4 = '"Inspection Expiry"';
            $title5 = '"Status"';
            $title6 = '"Ownership"';
            $title7 = '"Mileage"';
            $title8 = '"Axies"';
            $title9 = '"Year"';
            $title10 = '"Fuel Type"';
            $title11 = '"Start Date"';
            $title12 = '"Deactivation Date"';
            $title13 = '"IFTA Truck"';
            $title14 = '"Registered State"';
            $title15 = '"Insurance Policy"';
            $title16 = '"Gross Weight"';
            $title17 = '"VIN"';
            $title18 = '"Dot Expiry Date"';
            $title19 = '"Transponder"';
            $title20 = '"Internal Notes"';

            $pencilid1 = '"truckNumberPencil'.$i.'"';
            $pencilid2 = '"licensePlatePencil'.$i.'"';
            $pencilid3 = '"plateExpiryPencil'.$i.'"';
            $pencilid4 = '"inspectionExpiryPencil'.$i.'"';
            $pencilid5 = '"statusPencil'.$i.'"';
            $pencilid6 = '"ownershipPencil'.$i.'"';
            $pencilid7 = '"mileagePencil'.$i.'"';
            $pencilid8 = '"axiesPencil'.$i.'"';
            $pencilid9 = '"yearPencil'.$i.'"';
            $pencilid10 = '"fuelTypePencil'.$i.'"';
            $pencilid11 = '"startDatePencil'.$i.'"';
            $pencilid12 = '"deactivationDatePencil'.$i.'"';
            $pencilid13 = '"iftaPencil'.$i.'"';
            $pencilid14 = '"registeredStatePencil'.$i.'"';
            $pencilid15 = '"insurancePolicyPencil'.$i.'"';
            $pencilid16 = '"grossWeightPencil'.$i.'"';
            $pencilid17 = '"vinPencil'.$i.'"';
            $pencilid18 = '"dotexpiryDatePencil'.$i.'"';
            $pencilid19 = '"transponderPencil'.$i.'"';
            $pencilid20 = '"internalNotesPencil'.$i.'"';

            echo "<tr>
                <td>$start</td>
                <td class='custom-text' id='truckNumber$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='truckNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateTruckAdd,$type,$id,$column1,$title1,$pencilid1)'
                    ></i>
                    $truckNumber
                </td>
                <td class='custom-text'>
                    $truckType
                </td>
                <td class='custom-text' id='licensePlate$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateTruckAdd,$type,$id,$column2,$title2,$pencilid2)'
                    ></i>
                    $licensePlate
                </td>
                <td class='custom-text' id='plateExpiry$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateTruckAdd,$type,$id,$column3,$title3,$pencilid3)'
                    ></i>
                    $plateExpiry
                </td>
                <td class='custom-text' id='inspectionExpiry$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='inspectionExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateTruckAdd,$type,$id,$column4,$title4,$pencilid4)'
                    ></i>
                    $inspectionExpiry
                </td>
                <td class='custom-text' id='status$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateTruckAdd,$type,$id,$column5,$title5,$pencilid5)'
                    ></i>
                    $status
                </td>
                <td class='custom-text' id='ownership$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='ownershipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateTruckAdd,$type,$id,$column6,$title6,$pencilid6)'
                    ></i>
                    $ownership
                </td>
                <td class='custom-text' id='mileage$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='mileagePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateTruckAdd,$type,$id,$column7,$title7,$pencilid7)'
                    ></i>
                    $mileage
                </td>
                <td class='custom-text' id='axies$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateTruckAdd,$type,$id,$column8,$title8,$pencilid8)'
                    ></i>
                    $axies
                </td>
                <td class='custom-text' id='year$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateTruckAdd,$type,$id,$column9,$title9,$pencilid9)'
                    ></i>
                    $year
                </td>
                <td class='custom-text' id='fuelType$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='fuelTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateTruckAdd,$type,$id,$column10,$title10,$pencilid10)'
                    ></i>
                    $fuelType
                </td>
                <td class='custom-text' id='startDate$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='startDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateTruckAdd,$type,$id,$column11,$title11,$pencilid11)'
                    ></i>
                    $startDate
                </td>
                <td class='custom-text' id='deactivationDate$i'
                    onmouseover='showPencil_s($pencilid12)'
                    onmouseout='hidePencil_s($pencilid12)'
                    >
                    <i id='deactivationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type12,$updateTruckAdd,$type,$id,$column12,$title12,$pencilid12)'
                    ></i>
                    $deactivationDate
                </td>
                <td class='custom-text' id='ifta$i'
                    onmouseover='showPencil_s($pencilid13)'
                    onmouseout='hidePencil_s($pencilid13)'
                    >
                    <i id='iftaPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type13,$updateTruckAdd,$type,$id,$column13,$title13,$pencilid13)'
                    ></i>
                    $ifta
                </td>
                <td class='custom-text' id='registeredState$i'
                    onmouseover='showPencil_s($pencilid14)'
                    onmouseout='hidePencil_s($pencilid14)'
                    >
                    <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type14,$updateTruckAdd,$type,$id,$column14,$title14,$pencilid14)'
                    ></i>
                    $registeredState
                </td>
                <td class='custom-text' id='insurancePolicy$i'
                    onmouseover='showPencil_s($pencilid15)'
                    onmouseout='hidePencil_s($pencilid15)'
                    >
                    <i id='insurancePolicyPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type15,$updateTruckAdd,$type,$id,$column15,$title15,$pencilid15)'
                    ></i>
                    $insurancePolicy
                </td>
                <td class='custom-text' id='grossWeight$i'
                    onmouseover='showPencil_s($pencilid16)'
                    onmouseout='hidePencil_s($pencilid16)'
                    >
                    <i id='grossWeightPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type16,$updateTruckAdd,$type,$id,$column16,$title16,$pencilid16)'
                    ></i>
                    $grossWeight
                </td>
                <td class='custom-text' id='vin$i'
                    onmouseover='showPencil_s($pencilid17)'
                    onmouseout='hidePencil_s($pencilid17)'
                    >
                    <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type17,$updateTruckAdd,$type,$id,$column17,$title17,$pencilid17)'
                    ></i>
                    $vin
                </td>
                <td class='custom-text' id='dotexpiryDate$i'
                    onmouseover='showPencil_s($pencilid18)'
                    onmouseout='hidePencil_s($pencilid18)'
                    >
                    <i id='dotexpiryDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type18,$updateTruckAdd,$type,$id,$column18,$title18,$pencilid18)'
                    ></i>
                    $dotexpiryDate
                </td>
                <td class='custom-text' id='transponder$i'
                    onmouseover='showPencil_s($pencilid19)'
                    onmouseout='hidePencil_s($pencilid19)'
                    >
                    <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type19,$updateTruckAdd,$type,$id,$column19,$title19,$pencilid19)'
                    ></i>
                    $transponder
                </td>
                <td class='custom-text' id='internalNotes$i'
                    onmouseover='showPencil_s($pencilid20)'
                    onmouseout='hidePencil_s($pencilid20)'
                    >
                    <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type20,$updateTruckAdd,$type,$id,$column20,$title20,$pencilid20)'
                    ></i>
                    $internalNotes
                </td>";
            
            if ($counter == 0) {
                echo "<td><a href='#' onclick='deleteTruckAdd($id,$truckT)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }

            $value = "'".$id.")&nbsp;".$truckNumber."'";
            $list .= "<option value=$value></option>";
        }
    }
}
