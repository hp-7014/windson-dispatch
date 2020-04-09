<?php
    session_start();
    $helper = "helper";
    require "../../database/connection.php";

    if ($_GET['types'] == 'live_trailer_table') {
        $i = 0;
        $table = "";
        $list = "";
        $type = '"text"';
        $limit = 100;
        $cursor = $db->trailer_admin_add->find(array('companyID' => $_SESSION['companyId']));
                                    
        foreach ($cursor as $value) {
            $total_records = sizeof($value['trailer']);
            $total_pages = ceil($total_records / $limit);
        }

        $collection = $db->trailer_admin_add;
        $show1 = $collection->aggregate([
            ['$lookup' => [
                'from' => 'trailer_add',
                'localField' => 'companyID',
                'foreignField' => 'companyID',
                'as' => 'trailerdetails'
            ]],
            ['$match'=>['companyID' => $_SESSION['companyId']]],
            ['$project'=>['companyID'=>$_SESSION['companyId'],'trailer'=>['$slice'=>['$trailer',0,$limit]],'trailerdetails'=>1]]
        ]);

        foreach ($show1 as $row) {
            $trailer = $row['trailer'];
            $trailerdetails = $row['trailerdetails'];
            foreach ($trailerdetails as $row2) {
                $trailermaster = $row2['trailer'];
                $trailer_type = array();
                foreach ($trailermaster as $row3) {
                    $trailerid = $row3['_id'];
                    $trailer_type[$trailerid] = $row3['trailerType'];
                }
            }
            foreach ($trailer as $row4) {
                $counter = $row4['counter'];
                $id = $row4['_id'];
                $trailer_Type = $row4['trailerType'];
                $trailerNumber = $row4['trailerNumber'];
                $trailerType = $trailer_type[$row4['trailerType']];
                $licenseType = $row4['licenseType'];
                if(empty($row4['plateExpiry'])) {
                    $plateExpiry = "";
                } else {
                    $plateExpiry = date('d/m/Y',$row4['plateExpiry']);
                }
                if(empty($row4['inspectionExpiration'])) {
                    $inspectionExpiration = "";
                } else {
                    $inspectionExpiration = date('d/m/Y',$row4['inspectionExpiration']);
                }
                $status = $row4['status'];
                $model = $row4['model'];
                $year = $row4['year'];
                $axies = $row4['axies'];
                $registeredState = $row4['registeredState'];
                $vin = $row4['vin'];
                if(empty($row4['dot'])) {
                    $dot = "";
                } else {
                    $dot = date('d/m/Y',$row4['dot']);
                }
                if(empty($row4['activationDate'])) {
                    $activationDate = "";
                } else {
                    $activationDate = date('d/m/Y',$row4['activationDate']);
                }
                $internalNotes = $row4['internalNotes'];
            
                $i++;
                $updateTrailerAdd = '"updateTrailerAdd"';

                $trailerNumberColmn = '"trailerNumber"';
                $trailerTypeColmn = '"trailerType"';
                $licenseTypeColmn = '"licenseType"';
                $plateExpiryColmn = '"plateExpiry"';
                $inspectionExpirationColmn = '"inspectionExpiration"';
                $statusColmn = '"status"';
                $modelColmn = '"model"';
                $yearColmn = '"year"';
                $axiesColmn = '"axies"';
                $registeredStateColmn = '"registeredState"';
                $vinColmn = '"vin"';
                $dotColmn = '"dot"';
                $activationDateColmn = '"activationDate"';
                $internalNotesColmn = '"internalNotes"';

                $c_type1 = '"'.$trailerNumber.'"';
                $c_type2 = '"'.$trailerType.'"';
                $c_type3 = '"'.$licenseType.'"';
                $c_type4 = '"'.$plateExpiry.'"';
                $c_type5 = '"'.$inspectionExpiration.'"';
                $c_type6 = '"'.$status.'"';
                $c_type7 = '"'.$model.'"';
                $c_type8 = '"'.$year.'"';
                $c_type9 = '"'.$axies.'"';
                $c_type10 = '"'.$registeredState.'"';
                $c_type11 = '"'.$vin.'"';
                $c_type12 = '"'.$dot.'"';
                $c_type13 = '"'.$activationDate.'"';
                $c_type14 = '"'.$internalNotes.'"';

                $title1 = '"Trailer Number"';
                $title2 = '"Trailer Type"';
                $title3 = '"License Plate"';
                $title4 = '"Plate Expiry"';
                $title5 = '"Inspection Expiration"';
                $title6 = '"Status"';
                $title7 = '"Model"';
                $title8 = '"Year"';
                $title9 = '"Axios"';
                $title10 = '"Registered State"';
                $title11 = '"VIN"';
                $title12 = '"Dot Expiry Date"';
                $title13 = '"Activation Date"';
                $title14 = '"Internal Notes"';

                $pencilid1 = '"trailerNumberPencil'.$i.'"';
                $pencilid2 = '"trailerTypePencil'.$i.'"';
                $pencilid3 = '"licenseTypePencil'.$i.'"';
                $pencilid4 = '"plateExpiryPencil'.$i.'"';
                $pencilid5 = '"inspectionExpirationPencil'.$i.'"';
                $pencilid6 = '"statusPencil'.$i.'"';
                $pencilid7 = '"modelPencil'.$i.'"';
                $pencilid8 = '"yearPencil'.$i.'"';
                $pencilid9 = '"axiesPencil'.$i.'"';
                $pencilid10 = '"registeredStatePencil'.$i.'"';
                $pencilid11 = '"vinPencil'.$i.'"';
                $pencilid12 = '"dotPencil'.$i.'"';
                $pencilid13 = '"activationDatePencil'.$i.'"';
                $pencilid14 = '"internalNotesPencil'.$i.'"';

                echo "<tr>
                    <th>$i</th>
                    <th class='custom-text' id='trailerNumber$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='trailerNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTrailerAdd,$type,$id,$trailerNumberColmn,$title1,$pencilid1)'
                        ></i>
                        $trailerNumber
                    </th>
                    <td class='custom-text'>
                        $trailerType
                    </td>
                    <td class='custom-text' id='licenseType$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='licenseTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTrailerAdd,$type,$id,$licenseTypeColmn,$title3,$pencilid3)'
                        ></i>
                        $licenseType
                    </td>
                    <td class='custom-text' id='plateExpiry$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTrailerAdd,$type,$id,$plateExpiryColmn,$title4,$pencilid4)'
                        ></i>
                        $plateExpiry
                    </td>
                    <td class='custom-text' id='inspectionExpiration$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='inspectionExpirationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTrailerAdd,$type,$id,$inspectionExpirationColmn,$title5,$pencilid5)'
                        ></i>
                        $inspectionExpiration
                    </td>
                    <td class='custom-text' id='status$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTrailerAdd,$type,$id,$statusColmn,$title6,$pencilid6)'
                        ></i>
                        $status
                    </td>
                    <td class='custom-text' id='model$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='modelPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateTrailerAdd,$type,$id,$modelColmn,$title7,$pencilid7)'
                        ></i>
                        $model
                    </td>
                    <td class='custom-text' id='year$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateTrailerAdd,$type,$id,$yearColmn,$title8,$pencilid8)'
                        ></i>
                        $year
                    </td>
                    <td class='custom-text' id='axies$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateTrailerAdd,$type,$id,$axiesColmn,$title9,$pencilid9)'
                        ></i>
                        $axies
                    </td>
                    <td class='custom-text' id='registeredState$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateTrailerAdd,$type,$id,$registeredStateColmn,$title10,$pencilid10)'
                        ></i>
                        $registeredState
                    </td>
                    <td class='custom-text' id='vin$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateTrailerAdd,$type,$id,$vinColmn,$title11,$pencilid11)'
                        ></i>
                        $vin
                    </td>
                    <td class='custom-text' id='dot$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateTrailerAdd,$type,$id,$dotColmn,$title12,$pencilid12)'
                        ></i>
                        $dot
                    </td>
                    <td class='custom-text' id='activationDate$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='activationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateTrailerAdd,$type,$id,$activationDateColmn,$title13,$pencilid13)'
                        ></i>
                        $activationDate
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateTrailerAdd,$type,$id,$internalNotesColmn,$title14,$pencilid14)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteTrailerAdd($id,$trailer_Type)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }

            $value = "'".$id.")&nbsp;".$trailerNumber."'";
            $list .= "<option value=$value></option>";
            
            }
            //echo $table."^".$list;
        }
    }

    if ($_GET['types'] == 'search_text') {
        $i = 0;
        $type = '"text"';
        $collection = $db->trailer_admin_add;
        $show1 = $collection->aggregate([
            ['$lookup' => [
                'from' => 'trailer_add',
                'localField' => 'companyID', 
                'foreignField' => 'companyID',
                'as' => 'trailerdetails'
            ]],
            ['$match'=>['companyID'=>$_SESSION['companyId']]]
        ]);

        foreach ($show1 as $row) {
            $trailer = $row['trailer'];
            $trailerdetails = $row['trailerdetails'];
            foreach ($trailerdetails as $row2) {
                $trailermaster = $row2['trailer'];
                $trailer_type = array();
                foreach ($trailermaster as $row3) {
                    $trailerid = $row3['_id'];
                    $trailer_type[$trailerid] = $row3['trailerType'];
                }
            }
            foreach ($trailer as $row4) {
                $counter = $row4['counter'];
                $id = $row4['_id'];
                $trailer_Type = $row4['trailerType'];
                $trailerNumber = $row4['trailerNumber'];
                $trailerType = $trailer_type[$row4['trailerType']];
                $licenseType = $row4['licenseType'];
                if(empty($row4['plateExpiry'])) {
                    $plateExpiry = "";
                } else {
                    $plateExpiry = date('d/m/Y',$row4['plateExpiry']);
                }
                if(empty($row4['inspectionExpiration'])) {
                    $inspectionExpiration = "";
                } else {
                    $inspectionExpiration = date('d/m/Y',$row4['inspectionExpiration']);
                }
                $status = $row4['status'];
                $model = $row4['model'];
                $year = $row4['year'];
                $axies = $row4['axies'];
                $registeredState = $row4['registeredState'];
                $vin = $row4['vin'];
                if(empty($row4['dot'])) {
                    $dot = "";
                } else {
                    $dot = date('d/m/Y',$row4['dot']);
                }
                if(empty($row4['activationDate'])) {
                    $activationDate = "";
                } else {
                    $activationDate = date('d/m/Y',$row4['activationDate']);
                }
                $internalNotes = $row4['internalNotes'];
            
                $i++;
                $updateTrailerAdd = '"updateTrailerAdd"';

                $trailerNumberColmn = '"trailerNumber"';
                $trailerTypeColmn = '"trailerType"';
                $licenseTypeColmn = '"licenseType"';
                $plateExpiryColmn = '"plateExpiry"';
                $inspectionExpirationColmn = '"inspectionExpiration"';
                $statusColmn = '"status"';
                $modelColmn = '"model"';
                $yearColmn = '"year"';
                $axiesColmn = '"axies"';
                $registeredStateColmn = '"registeredState"';
                $vinColmn = '"vin"';
                $dotColmn = '"dot"';
                $activationDateColmn = '"activationDate"';
                $internalNotesColmn = '"internalNotes"';

                $c_type1 = '"'.$trailerNumber.'"';
                $c_type2 = '"'.$trailerType.'"';
                $c_type3 = '"'.$licenseType.'"';
                $c_type4 = '"'.$plateExpiry.'"';
                $c_type5 = '"'.$inspectionExpiration.'"';
                $c_type6 = '"'.$status.'"';
                $c_type7 = '"'.$model.'"';
                $c_type8 = '"'.$year.'"';
                $c_type9 = '"'.$axies.'"';
                $c_type10 = '"'.$registeredState.'"';
                $c_type11 = '"'.$vin.'"';
                $c_type12 = '"'.$dot.'"';
                $c_type13 = '"'.$activationDate.'"';
                $c_type14 = '"'.$internalNotes.'"';

                $title1 = '"Trailer Number"';
                $title2 = '"Trailer Type"';
                $title3 = '"License Plate"';
                $title4 = '"Plate Expiry"';
                $title5 = '"Inspection Expiration"';
                $title6 = '"Status"';
                $title7 = '"Model"';
                $title8 = '"Year"';
                $title9 = '"Axios"';
                $title10 = '"Registered State"';
                $title11 = '"VIN"';
                $title12 = '"Dot Expiry Date"';
                $title13 = '"Activation Date"';
                $title14 = '"Internal Notes"';

                $pencilid1 = '"trailerNumberPencil'.$i.'"';
                $pencilid2 = '"trailerTypePencil'.$i.'"';
                $pencilid3 = '"licenseTypePencil'.$i.'"';
                $pencilid4 = '"plateExpiryPencil'.$i.'"';
                $pencilid5 = '"inspectionExpirationPencil'.$i.'"';
                $pencilid6 = '"statusPencil'.$i.'"';
                $pencilid7 = '"modelPencil'.$i.'"';
                $pencilid8 = '"yearPencil'.$i.'"';
                $pencilid9 = '"axiesPencil'.$i.'"';
                $pencilid10 = '"registeredStatePencil'.$i.'"';
                $pencilid11 = '"vinPencil'.$i.'"';
                $pencilid12 = '"dotPencil'.$i.'"';
                $pencilid13 = '"activationDatePencil'.$i.'"';
                $pencilid14 = '"internalNotesPencil'.$i.'"';
                if ($_POST['getoption'] == $row4['trailerNumber']
                    || $_POST['getoption'] == $trailerType[$row4['trailerType']]
                    || $_POST['getoption'] == $row4['licenseType']
                    || $_POST['getoption'] == date('d/m/Y',$row4['plateExpiry'])
                    || $_POST['getoption'] == date('d/m/Y',$row4['inspectionExpiration'])
                    || $_POST['getoption'] == $row4['status']
                    || $_POST['getoption'] == $row4['model']
                    || $_POST['getoption'] == $row4['year']
                    || $_POST['getoption'] == $row4['axies']
                    || $_POST['getoption'] == $row4['registeredState']
                    || $_POST['getoption'] == $row4['vin'] 
                    || $_POST['getoption'] == date('d/m/Y',$row4['activationDate'])
                    || $_POST['getoption'] == $row4['internalNotes']
                
                ) {

                echo "<tr>
                    <th>$i</th>
                    <th class='custom-text' id='trailerNumber$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='trailerNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTrailerAdd,$type,$id,$trailerNumberColmn,$title1,$pencilid1)'
                        ></i>
                        $trailerNumber
                    </th>
                    <td class='custom-text'>
                        $trailerType
                    </td>
                    <td class='custom-text' id='licenseType$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='licenseTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTrailerAdd,$type,$id,$licenseTypeColmn,$title3,$pencilid3)'
                        ></i>
                        $licenseType
                    </td>
                    <td class='custom-text' id='plateExpiry$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTrailerAdd,$type,$id,$plateExpiryColmn,$title4,$pencilid4)'
                        ></i>
                        $plateExpiry
                    </td>
                    <td class='custom-text' id='inspectionExpiration$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='inspectionExpirationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTrailerAdd,$type,$id,$inspectionExpirationColmn,$title5,$pencilid5)'
                        ></i>
                        $inspectionExpiration
                    </td>
                    <td class='custom-text' id='status$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTrailerAdd,$type,$id,$statusColmn,$title6,$pencilid6)'
                        ></i>
                        $status
                    </td>
                    <td class='custom-text' id='model$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='modelPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateTrailerAdd,$type,$id,$modelColmn,$title7,$pencilid7)'
                        ></i>
                        $model
                    </td>
                    <td class='custom-text' id='year$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateTrailerAdd,$type,$id,$yearColmn,$title8,$pencilid8)'
                        ></i>
                        $year
                    </td>
                    <td class='custom-text' id='axies$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateTrailerAdd,$type,$id,$axiesColmn,$title9,$pencilid9)'
                        ></i>
                        $axies
                    </td>
                    <td class='custom-text' id='registeredState$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateTrailerAdd,$type,$id,$registeredStateColmn,$title10,$pencilid10)'
                        ></i>
                        $registeredState
                    </td>
                    <td class='custom-text' id='vin$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateTrailerAdd,$type,$id,$vinColmn,$title11,$pencilid11)'
                        ></i>
                        $vin
                    </td>
                    <td class='custom-text' id='dot$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateTrailerAdd,$type,$id,$dotColmn,$title12,$pencilid12)'
                        ></i>
                        $dot
                    </td>
                    <td class='custom-text' id='activationDate$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='activationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateTrailerAdd,$type,$id,$activationDateColmn,$title13,$pencilid13)'
                        ></i>
                        $activationDate
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateTrailerAdd,$type,$id,$internalNotesColmn,$title14,$pencilid14)'
                        ></i>
                        $internalNotes
                    </td>"; 

                    if ($counter == 0) {
                        echo "<td><a href='#' onclick='deleteTrailerAdd($id,$trailer_Type)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
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
            $collection = $db->trailer_admin_add;
            $show1 = $collection->aggregate([
                ['$lookup' => [
                    'from' => 'trailer_add',
                    'localField' => 'companyID',
                    'foreignField' => 'companyID',
                    'as' => 'trailerdetails'
                ]],
                ['$match'=>['companyID' => $_SESSION['companyId']]],
                ['$project'=>['companyID'=>$_SESSION['companyId'],'trailer'=>['$slice'=>['$trailer',0,$limit]],'trailerdetails'=>1]]
            ]);

            foreach ($show1 as $row) {
                $trailer = $row['trailer'];
                $trailerdetails = $row['trailerdetails'];
                foreach ($trailerdetails as $row2) {
                    $trailermaster = $row2['trailer'];
                    $trailer_type = array();
                    foreach ($trailermaster as $row3) {
                        $trailerid = $row3['_id'];
                        $trailer_type[$trailerid] = $row3['trailerType'];
                    }
                }

                foreach ($trailer as $row4) {
                    $counter = $row4['counter'];
                    $id = $row4['_id'];
                    $trailer_Type = $row4['trailerType'];
                    $trailerNumber = $row4['trailerNumber'];
                    $trailerType = $trailer_type[$row4['trailerType']];
                    $licenseType = $row4['licenseType'];
                    if(empty($row4['plateExpiry'])) {
                        $plateExpiry = "";
                    } else {
                        $plateExpiry = date('d/m/Y',$row4['plateExpiry']);
                    }
                    if(empty($row4['inspectionExpiration'])) {
                        $inspectionExpiration = "";
                    } else {
                        $inspectionExpiration = date('d/m/Y',$row4['inspectionExpiration']);
                    }
                    $status = $row4['status'];
                    $model = $row4['model'];
                    $year = $row4['year'];
                    $axies = $row4['axies'];
                    $registeredState = $row4['registeredState'];
                    $vin = $row4['vin'];
                    if(empty($row4['dot'])) {
                        $dot = "";
                    } else {
                        $dot = date('d/m/Y',$row4['dot']);
                    }
                    if(empty($row4['activationDate'])) {
                        $activationDate = "";
                    } else {
                        $activationDate = date('d/m/Y',$row4['activationDate']);
                    }
                    $internalNotes = $row4['internalNotes'];
                
                    $i++;
                    $updateTrailerAdd = '"updateTrailerAdd"';

                    $trailerNumberColmn = '"trailerNumber"';
                    $trailerTypeColmn = '"trailerType"';
                    $licenseTypeColmn = '"licenseType"';
                    $plateExpiryColmn = '"plateExpiry"';
                    $inspectionExpirationColmn = '"inspectionExpiration"';
                    $statusColmn = '"status"';
                    $modelColmn = '"model"';
                    $yearColmn = '"year"';
                    $axiesColmn = '"axies"';
                    $registeredStateColmn = '"registeredState"';
                    $vinColmn = '"vin"';
                    $dotColmn = '"dot"';
                    $activationDateColmn = '"activationDate"';
                    $internalNotesColmn = '"internalNotes"';

                    $c_type1 = '"'.$trailerNumber.'"';
                    $c_type2 = '"'.$trailerType.'"';
                    $c_type3 = '"'.$licenseType.'"';
                    $c_type4 = '"'.$plateExpiry.'"';
                    $c_type5 = '"'.$inspectionExpiration.'"';
                    $c_type6 = '"'.$status.'"';
                    $c_type7 = '"'.$model.'"';
                    $c_type8 = '"'.$year.'"';
                    $c_type9 = '"'.$axies.'"';
                    $c_type10 = '"'.$registeredState.'"';
                    $c_type11 = '"'.$vin.'"';
                    $c_type12 = '"'.$dot.'"';
                    $c_type13 = '"'.$activationDate.'"';
                    $c_type14 = '"'.$internalNotes.'"';

                    $title1 = '"Trailer Number"';
                    $title2 = '"Trailer Type"';
                    $title3 = '"License Plate"';
                    $title4 = '"Plate Expiry"';
                    $title5 = '"Inspection Expiration"';
                    $title6 = '"Status"';
                    $title7 = '"Model"';
                    $title8 = '"Year"';
                    $title9 = '"Axios"';
                    $title10 = '"Registered State"';
                    $title11 = '"VIN"';
                    $title12 = '"Dot Expiry Date"';
                    $title13 = '"Activation Date"';
                    $title14 = '"Internal Notes"';

                    $pencilid1 = '"trailerNumberPencil'.$i.'"';
                    $pencilid2 = '"trailerTypePencil'.$i.'"';
                    $pencilid3 = '"licenseTypePencil'.$i.'"';
                    $pencilid4 = '"plateExpiryPencil'.$i.'"';
                    $pencilid5 = '"inspectionExpirationPencil'.$i.'"';
                    $pencilid6 = '"statusPencil'.$i.'"';
                    $pencilid7 = '"modelPencil'.$i.'"';
                    $pencilid8 = '"yearPencil'.$i.'"';
                    $pencilid9 = '"axiesPencil'.$i.'"';
                    $pencilid10 = '"registeredStatePencil'.$i.'"';
                    $pencilid11 = '"vinPencil'.$i.'"';
                    $pencilid12 = '"dotPencil'.$i.'"';
                    $pencilid13 = '"activationDatePencil'.$i.'"';
                    $pencilid14 = '"internalNotesPencil'.$i.'"';

                    echo "<tr>
                        <th>$i</th>
                        <th class='custom-text' id='trailerNumber$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='trailerNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateTrailerAdd,$type,$id,$trailerNumberColmn,$title1,$pencilid1)'
                            ></i>
                            $trailerNumber
                        </th>
                        <td class='custom-text'>
                            $trailerType
                        </td>
                        <td class='custom-text' id='licenseType$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='licenseTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateTrailerAdd,$type,$id,$licenseTypeColmn,$title3,$pencilid3)'
                            ></i>
                            $licenseType
                        </td>
                        <td class='custom-text' id='plateExpiry$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateTrailerAdd,$type,$id,$plateExpiryColmn,$title4,$pencilid4)'
                            ></i>
                            $plateExpiry
                        </td>
                        <td class='custom-text' id='inspectionExpiration$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='inspectionExpirationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateTrailerAdd,$type,$id,$inspectionExpirationColmn,$title5,$pencilid5)'
                            ></i>
                            $inspectionExpiration
                        </td>
                        <td class='custom-text' id='status$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateTrailerAdd,$type,$id,$statusColmn,$title6,$pencilid6)'
                            ></i>
                            $status
                        </td>
                        <td class='custom-text' id='model$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='modelPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateTrailerAdd,$type,$id,$modelColmn,$title7,$pencilid7)'
                            ></i>
                            $model
                        </td>
                        <td class='custom-text' id='year$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateTrailerAdd,$type,$id,$yearColmn,$title8,$pencilid8)'
                            ></i>
                            $year
                        </td>
                        <td class='custom-text' id='axies$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateTrailerAdd,$type,$id,$axiesColmn,$title9,$pencilid9)'
                            ></i>
                            $axies
                        </td>
                        <td class='custom-text' id='registeredState$i'
                            onmouseover='showPencil_s($pencilid10)'
                            onmouseout='hidePencil_s($pencilid10)'
                            >
                            <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type10,$updateTrailerAdd,$type,$id,$registeredStateColmn,$title10,$pencilid10)'
                            ></i>
                            $registeredState
                        </td>
                        <td class='custom-text' id='vin$i'
                            onmouseover='showPencil_s($pencilid11)'
                            onmouseout='hidePencil_s($pencilid11)'
                            >
                            <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type11,$updateTrailerAdd,$type,$id,$vinColmn,$title11,$pencilid11)'
                            ></i>
                            $vin
                        </td>
                        <td class='custom-text' id='dot$i'
                            onmouseover='showPencil_s($pencilid12)'
                            onmouseout='hidePencil_s($pencilid12)'
                            >
                            <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type12,$updateTrailerAdd,$type,$id,$dotColmn,$title12,$pencilid12)'
                            ></i>
                            $dot
                        </td>
                        <td class='custom-text' id='activationDate$i'
                            onmouseover='showPencil_s($pencilid13)'
                            onmouseout='hidePencil_s($pencilid13)'
                            >
                            <i id='activationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type13,$updateTrailerAdd,$type,$id,$activationDateColmn,$title13,$pencilid13)'
                            ></i>
                            $activationDate
                        </td>
                        <td class='custom-text' id='internalNotes$i'
                            onmouseover='showPencil_s($pencilid14)'
                            onmouseout='hidePencil_s($pencilid14)'
                            >
                            <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type14,$updateTrailerAdd,$type,$id,$internalNotesColmn,$title14,$pencilid14)'
                            ></i>
                            $internalNotes
                        </td>";

                    if ($counter == 0) {
                        echo "<td><a href='#' onclick='deleteTrailerAdd($id,$trailer_Type)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }
        }
    }

    if ($_GET['types'] == 'paginate_trailer_admin') {
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

        $collection = $db->trailer_admin_add;
        $show1 = $collection->aggregate([
            ['$lookup' => [
                'from' => 'trailer_add',
                'localField' => 'companyID',
                'foreignField' => 'companyID',
                'as' => 'trailerdetails'
            ]],
            ['$match'=>['companyID' => $_SESSION['companyId']]],
            ['$project'=>['companyID'=>$_SESSION['companyId'],'trailer'=>['$slice'=>['$trailer',$start,$limit]],'trailerdetails'=>1]]
        ]);

        foreach ($show1 as $row) {
            $trailer = $row['trailer'];
            $trailerdetails = $row['trailerdetails'];
            foreach ($trailerdetails as $row2) {
                $trailermaster = $row2['trailer'];
                $trailer_type = array();
                foreach ($trailermaster as $row3) {
                    $trailerid = $row3['_id'];
                    $trailer_type[$trailerid] = $row3['trailerType'];
                }
            }
            foreach ($trailer as $row4) {
                $counter = $row4['counter'];
                $id = $row4['_id'];
                $trailer_Type = $row4['trailerType'];
                $trailerNumber = $row4['trailerNumber'];
                $trailerType = $trailer_type[$row4['trailerType']];
                $licenseType = $row4['licenseType'];
                if(empty($row4['plateExpiry'])) {
                    $plateExpiry = "";
                } else {
                    $plateExpiry = date('d/m/Y',$row4['plateExpiry']);
                }
                if(empty($row4['inspectionExpiration'])) {
                    $inspectionExpiration = "";
                } else {
                    $inspectionExpiration = date('d/m/Y',$row4['inspectionExpiration']);
                }
                $status = $row4['status'];
                $model = $row4['model'];
                $year = $row4['year'];
                $axies = $row4['axies'];
                $registeredState = $row4['registeredState'];
                $vin = $row4['vin'];
                if(empty($row4['dot'])) {
                    $dot = "";
                } else {
                    $dot = date('d/m/Y',$row4['dot']);
                }
                if(empty($row4['activationDate'])) {
                    $activationDate = "";
                } else {
                    $activationDate = date('d/m/Y',$row4['activationDate']);
                }
                $internalNotes = $row4['internalNotes'];
            
                $i++;
                $start += 1;

                $updateTrailerAdd = '"updateTrailerAdd"';

                $trailerNumberColmn = '"trailerNumber"';
                $trailerTypeColmn = '"trailerType"';
                $licenseTypeColmn = '"licenseType"';
                $plateExpiryColmn = '"plateExpiry"';
                $inspectionExpirationColmn = '"inspectionExpiration"';
                $statusColmn = '"status"';
                $modelColmn = '"model"';
                $yearColmn = '"year"';
                $axiesColmn = '"axies"';
                $registeredStateColmn = '"registeredState"';
                $vinColmn = '"vin"';
                $dotColmn = '"dot"';
                $activationDateColmn = '"activationDate"';
                $internalNotesColmn = '"internalNotes"';

                $c_type1 = '"'.$trailerNumber.'"';
                $c_type2 = '"'.$trailerType.'"';
                $c_type3 = '"'.$licenseType.'"';
                $c_type4 = '"'.$plateExpiry.'"';
                $c_type5 = '"'.$inspectionExpiration.'"';
                $c_type6 = '"'.$status.'"';
                $c_type7 = '"'.$model.'"';
                $c_type8 = '"'.$year.'"';
                $c_type9 = '"'.$axies.'"';
                $c_type10 = '"'.$registeredState.'"';
                $c_type11 = '"'.$vin.'"';
                $c_type12 = '"'.$dot.'"';
                $c_type13 = '"'.$activationDate.'"';
                $c_type14 = '"'.$internalNotes.'"';

                $title1 = '"Trailer Number"';
                $title2 = '"Trailer Type"';
                $title3 = '"License Plate"';
                $title4 = '"Plate Expiry"';
                $title5 = '"Inspection Expiration"';
                $title6 = '"Status"';
                $title7 = '"Model"';
                $title8 = '"Year"';
                $title9 = '"Axios"';
                $title10 = '"Registered State"';
                $title11 = '"VIN"';
                $title12 = '"Dot Expiry Date"';
                $title13 = '"Activation Date"';
                $title14 = '"Internal Notes"';

                $pencilid1 = '"trailerNumberPencil'.$i.'"';
                $pencilid2 = '"trailerTypePencil'.$i.'"';
                $pencilid3 = '"licenseTypePencil'.$i.'"';
                $pencilid4 = '"plateExpiryPencil'.$i.'"';
                $pencilid5 = '"inspectionExpirationPencil'.$i.'"';
                $pencilid6 = '"statusPencil'.$i.'"';
                $pencilid7 = '"modelPencil'.$i.'"';
                $pencilid8 = '"yearPencil'.$i.'"';
                $pencilid9 = '"axiesPencil'.$i.'"';
                $pencilid10 = '"registeredStatePencil'.$i.'"';
                $pencilid11 = '"vinPencil'.$i.'"';
                $pencilid12 = '"dotPencil'.$i.'"';
                $pencilid13 = '"activationDatePencil'.$i.'"';
                $pencilid14 = '"internalNotesPencil'.$i.'"';

                echo "<tr>
                    <th>$start</th>
                    <th class='custom-text' id='trailerNumber$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='trailerNumberPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTrailerAdd,$type,$id,$trailerNumberColmn,$title1,$pencilid1)'
                        ></i>
                        $trailerNumber
                    </th>
                    <td class='custom-text'>
                        $trailerType
                    </td>
                    <td class='custom-text' id='licenseType$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='licenseTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTrailerAdd,$type,$id,$licenseTypeColmn,$title3,$pencilid3)'
                        ></i>
                        $licenseType
                    </td>
                    <td class='custom-text' id='plateExpiry$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='plateExpiryPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTrailerAdd,$type,$id,$plateExpiryColmn,$title4,$pencilid4)'
                        ></i>
                        $plateExpiry
                    </td>
                    <td class='custom-text' id='inspectionExpiration$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='inspectionExpirationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTrailerAdd,$type,$id,$inspectionExpirationColmn,$title5,$pencilid5)'
                        ></i>
                        $inspectionExpiration
                    </td>
                    <td class='custom-text' id='status$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='statusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTrailerAdd,$type,$id,$statusColmn,$title6,$pencilid6)'
                        ></i>
                        $status
                    </td>
                    <td class='custom-text' id='model$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='modelPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateTrailerAdd,$type,$id,$modelColmn,$title7,$pencilid7)'
                        ></i>
                        $model
                    </td>
                    <td class='custom-text' id='year$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='yearPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateTrailerAdd,$type,$id,$yearColmn,$title8,$pencilid8)'
                        ></i>
                        $year
                    </td>
                    <td class='custom-text' id='axies$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='axiesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateTrailerAdd,$type,$id,$axiesColmn,$title9,$pencilid9)'
                        ></i>
                        $axies
                    </td>
                    <td class='custom-text' id='registeredState$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='registeredStatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateTrailerAdd,$type,$id,$registeredStateColmn,$title10,$pencilid10)'
                        ></i>
                        $registeredState
                    </td>
                    <td class='custom-text' id='vin$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='vinPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateTrailerAdd,$type,$id,$vinColmn,$title11,$pencilid11)'
                        ></i>
                        $vin
                    </td>
                    <td class='custom-text' id='dot$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateTrailerAdd,$type,$id,$dotColmn,$title12,$pencilid12)'
                        ></i>
                        $dot
                    </td>
                    <td class='custom-text' id='activationDate$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='activationDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateTrailerAdd,$type,$id,$activationDateColmn,$title13,$pencilid13)'
                        ></i>
                        $activationDate
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateTrailerAdd,$type,$id,$internalNotesColmn,$title14,$pencilid14)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteTrailerAdd($id,$trailer_Type)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            $value = "'".$id.")&nbsp;".$trailerNumber."'";
            $list .= "<option value=$value></option>";
            
            }
        } 
    }



    