<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['type'] == 'live_shipper_table') {
   // $show = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
    $limit = 100;
    $cursor = $db->shipper->find(array('companyID' => $_SESSION['companyId']));

    foreach ($cursor as $value) {
        $total_records = sizeof($value['shipper']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->shipper->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('shipper' => array('$slice' => [0, 100]))));
   
    $i = 0;
    $table = "";
    $pages  = "";
    $list  = "";
    foreach ($show as $row) {
        $mainID = $row['_id'];
        $show1 = $row['shipper'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $shipperName = $row1['shipperName'];
            $shipperAddress = $row1['shipperAddress'];
            $shipperLocation = $row1['shipperLocation'];
            $shipperPostal = $row1['shipperPostal'];
            $shipperContact = $row1['shipperContact'];
            $shipperEmail = $row1['shipperEmail'];
            $shipperTelephone = $row1['shipperTelephone'];
            $shipperExt = $row1['shipperExt'];
            $shipperTollFree = $row1['shipperTollFree'];
            $shipperFax = $row1['shipperFax'];
            $shipperShippingHours = $row1['shipperShippingHours'];
            $shipperAppointments = $row1['shipperAppointments'];
            $shipperIntersaction = $row1['shipperIntersaction'];
            $shipperStatus = $row1['shipperStatus'];
            $shippingNotes = $row1['shippingNotes'];
            $internalNotes = $row1['internalNotes'];

            $masterID = '"'.$id.')'.$mainID.'"';

            $shipperNameColmn = '"shipperName"';
            $shipperAddressColmn = '"shipperAddress"';
            $shipperLocationColmn = '"shipperLocation"';
            $shipperPostalColmn = '"shipperPostal"';
            $shipperContactColmn = '"shipperContact"';
            $shipperEmailColmn = '"shipperEmail"';
            $shipperTelephoneColmn = '"shipperTelephone"';
            $shipperExtColmn = '"shipperExt"';
            $shipperTollFreeColmn = '"shipperTollFree"';
            $shipperFaxColmn = '"shipperFax"';
            $shipperShippingHoursColmn = '"shipperShippingHours"';
            $shipperAppointmentsColmn = '"shipperAppointments"';
            $shipperIntersactionColmn = '"shipperIntersaction"';
            $shipperStatusColmn = '"shipperStatus"';
            $shippingNotesColmn = '"shippingNotes"';
            $internalNotesColmn = '"internalNotes"';
            $type = '"text"';

            $i++;
            $updateShipper = '"updateShipper"';

            $c_type1 = '"'.$shipperName.'"';
            $c_type2 = '"'.$shipperAddress.'"';
            $c_type3 = '"'.$shipperLocation.'"';
            $c_type4 = '"'.$shipperPostal.'"';
            $c_type5 = '"'.$shipperContact.'"';
            $c_type6 = '"'.$shipperEmail.'"';
            $c_type7 = '"'.$shipperTelephone.'"';
            $c_type8 = '"'.$shipperExt.'"';
            $c_type9 = '"'.$shipperTollFree.'"';
            $c_type10 = '"'.$shipperFax.'"';
            $c_type11 = '"'.$shipperShippingHours.'"';
            $c_type12 = '"'.$shipperAppointments.'"';
            $c_type13 = '"'.$shipperIntersaction.'"';
            $c_type14 = '"'.$shipperStatus.'"';
            $c_type15 = '"'.$shippingNotes.'"';
            $c_type16 = '"'.$internalNotes.'"';

            $title1 = '"Shipper Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Contact Name"';
            $title6 = '"Contact Email"';
            $title7 = '"Telephone"';
            $title8 = '"Ext"';
            $title9 = '"Toll Free"';
            $title10 = '"Fax"';
            $title11 = '"Shipping Hours"';
            $title12 = '"Appointments"';
            $title13 = '"Major Intersection / Directions"';
            $title14 = '"Status"';
            $title15 = '"Shipping Notes"';
            $title16 = '"Internal Notes"';

            $pencilid1 = '"shipperNamePencil'.$i.'"';
            $pencilid2 = '"shipperAddressPencil'.$i.'"';
            $pencilid3 = '"shipperLocationPencil'.$i.'"';
            $pencilid4 = '"shipperPostalPencil'.$i.'"';
            $pencilid5 = '"shipperContactPencil'.$i.'"';
            $pencilid6 = '"shipperEmailPencil'.$i.'"';
            $pencilid7 = '"shipperTelephonePencil'.$i.'"';
            $pencilid8 = '"shipperExtPencil'.$i.'"';
            $pencilid9 = '"shipperTollFreePencil'.$i.'"';
            $pencilid10 = '"shipperFaxPencil'.$i.'"';
            $pencilid11 = '"shipperShippingHoursPencil'.$i.'"';
            $pencilid12 = '"shipperAppointmentsPencil'.$i.'"';
            $pencilid13 = '"shipperIntersactionPencil'.$i.'"';
            $pencilid14 = '"shipperStatusPencil'.$i.'"';
            $pencilid15 = '"shippingNotesPencil'.$i.'"';
            $pencilid16 = '"internalNotesPencil'.$i.'"';

            $table .= "<tr>
                    <th>$i</th>
                    <th class='custom-text' id='shipperName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='shipperNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateShipper,$type,$masterID,$shipperNameColmn,$title1,$pencilid1)'
                        ></i>
                        $shipperName
                    </th>
                    <td class='custom-text' id='shipperAddress$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='shipperAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateShipper,$type,$masterID,$shipperAddressColmn,$title2,$pencilid2)'
                        ></i>
                        $shipperAddress
                    </td>
                    <td class='custom-text' id='shipperLocation$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='shipperAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateShipper,$type,$masterID,$shipperLocationColmn,$title3,$pencilid3)'
                        ></i>
                        $shipperLocation
                    </td>
                    <td class='custom-text' id='shipperPostal$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='shipperPostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateShipper,$type,$masterID,$shipperPostalColmn,$title4,$pencilid4)'
                        ></i>
                        $shipperPostal
                    </td>
                    <td class='custom-text' id='shipperContact$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='shipperContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateShipper,$type,$masterID,$shipperContactColmn,$title5,$pencilid5)'
                        ></i>
                        $shipperContact
                    </td>
                    <td class='custom-text' id='shipperEmail$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='shipperEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateShipper,$type,$masterID,$shipperEmailColmn,$title6,$pencilid6)'
                        ></i>
                        $shipperEmail
                    </td>
                    <td class='custom-text' id='shipperTelephone$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='shipperTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateShipper,$type,$masterID,$shipperTelephoneColmn,$title7,$pencilid7)'
                        ></i>
                        $shipperTelephone
                    </td>
                    <td class='custom-text' id='shipperExt$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='shipperExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateShipper,$type,$masterID,$shipperExtColmn,$title8,$pencilid8)'
                        ></i>
                        $shipperExt
                    </td>
                    <td class='custom-text' id='shipperTollFree$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='shipperTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateShipper,$type,$masterID,$shipperTollFreeColmn,$title9,$pencilid9)'
                        ></i>
                        $shipperTollFree
                    </td>
                    <td class='custom-text' id='shipperFax$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='shipperFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateShipper,$type,$masterID,$shipperFaxColmn,$title10,$pencilid10)'
                        ></i>
                        $shipperFax
                    </td>
                    <td class='custom-text' id='shipperShippingHours$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='shipperShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateShipper,$type,$masterID,$shipperShippingHoursColmn,$title11,$pencilid11)'
                        ></i>
                        $shipperShippingHours
                    </td>
                    <td class='custom-text' id='shipperAppointments$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='shipperAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateShipper,$type,$masterID,$shipperAppointmentsColmn,$title12,$pencilid12)'
                        ></i>
                        $shipperAppointments
                    </td>
                    <td class='custom-text' id='shipperIntersaction$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='shipperIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateShipper,$type,$masterID,$shipperIntersactionColmn,$title13,$pencilid13)'
                        ></i>
                        $shipperIntersaction
                    </td>
                    <td class='custom-text' id='shipperStatus$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='shipperStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateShipper,$type,$masterID,$shipperStatusColmn,$title14,$pencilid14)'
                        ></i>
                        $shipperStatus
                    </td>
                    <td class='custom-text' id='shippingNotes$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='shippingNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateShipper,$type,$masterID,$shippingNotesColmn,$title15,$pencilid15)'
                        ></i>
                        $shippingNotes
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateShipper,$type,$masterID,$internalNotesColmn,$title16,$pencilid16)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) { 
                    $table .= "<td><a href='#' onclick='deleteShipper($masterID)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
                if($shipperStatus == 'Active'){

                    $value = "'".$id.")&nbsp;".$shipperName."'";
                    $list .="<option value=$value></option>";
                }
              
        }

        $fun_nm = '"paginate_shipper"';
        $p_no = '"page_no"';

        $pages .= "<li id='bank_previous' style='display:none'>
            <a class='page-link btn btn-secondary waves-effect'
                onclick='previous_page($fun_nm,$p_no,$limit,$total_pages)'>Previous</a>
            </li>
            <select class='form-control' id='page_active'
                onchange='paginate_shipper(this.value * $limit,$limit,$total_pages)'>";
        $j = 1;

        for ($i = 0; $i < $total_pages; $i++) {
            if ($i == 0) {
                $pages .= "<option value='$i'>$j</option>";
            } else {
                $pages .= "<option value='$i'>$j</option>";
            }
            $j++;
        }

        if($total_pages > 0 && $total_pages > 1) {
            $pages .= "</select>
                <li id='bank_next'>
                    <a class='page-link btn btn-primary waves-effect waves-light'
                        onclick='next_page($fun_nm,$p_no,$limit,$total_pages)'>Next</a>
                </li>";

        }
    }
    echo $table."^".$pages."^".$list;
}

if ($_GET['type'] == 'search_text') {
    $show = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    $table = "";
    $list  = "";
    foreach ($show as $row) {
        $show1 = $row['shipper'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['shipperName'] 
                || $_POST['getoption'] == $row1['shipperAddress'] 
                || $_POST['getoption'] == $row1['shipperLocation'] 
                || $_POST['getoption'] == $row1['shipperPostal'] 
                || $_POST['getoption'] == $row1['shipperContact'] 
                || $_POST['getoption'] == $row1['shipperEmail'] 
                || $_POST['getoption'] == $row1['shipperTelephone'] 
                || $_POST['getoption'] == $row1['shipperExt'] 
                || $_POST['getoption'] == $row1['shipperTollFree'] 
                || $_POST['getoption'] == $row1['shipperFax'] 
                || $_POST['getoption'] == $row1['shipperShippingHours'] 
                || $_POST['getoption'] == $row1['shipperAppointments'] 
                || $_POST['getoption'] == $row1['shipperIntersaction'] 
                || $_POST['getoption'] == $row1['shipperStatus'] 
                || $_POST['getoption'] == $row1['shippingNotes'] 
                || $_POST['getoption'] == $row1['internalNotes']) {
                
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $shipperName = $row1['shipperName'];
                $shipperAddress = $row1['shipperAddress'];
                $shipperLocation = $row1['shipperLocation'];
                $shipperPostal = $row1['shipperPostal'];
                $shipperContact = $row1['shipperContact'];
                $shipperEmail = $row1['shipperEmail'];
                $shipperTelephone = $row1['shipperTelephone'];
                $shipperExt = $row1['shipperExt'];
                $shipperTollFree = $row1['shipperTollFree'];
                $shipperFax = $row1['shipperFax'];
                $shipperShippingHours = $row1['shipperShippingHours'];
                $shipperAppointments = $row1['shipperAppointments'];
                $shipperIntersaction = $row1['shipperIntersaction'];
                $shipperStatus = $row1['shipperStatus'];
                $shippingNotes = $row1['shippingNotes'];
                $internalNotes = $row1['internalNotes'];

                $shipperNameColmn = '"shipperName"';
                $shipperAddressColmn = '"shipperAddress"';
                $shipperLocationColmn = '"shipperLocation"';
                $shipperPostalColmn = '"shipperPostal"';
                $shipperContactColmn = '"shipperContact"';
                $shipperEmailColmn = '"shipperEmail"';
                $shipperTelephoneColmn = '"shipperTelephone"';
                $shipperExtColmn = '"shipperExt"';
                $shipperTollFreeColmn = '"shipperTollFree"';
                $shipperFaxColmn = '"shipperFax"';
                $shipperShippingHoursColmn = '"shipperShippingHours"';
                $shipperAppointmentsColmn = '"shipperAppointments"';
                $shipperIntersactionColmn = '"shipperIntersaction"';
                $shipperStatusColmn = '"shipperStatus"';
                $shippingNotesColmn = '"shippingNotes"';
                $internalNotesColmn = '"internalNotes"';
                $type = '"text"';
                $i++;
                $updateShipper = '"updateShipper"';

                $c_type1 = '"'.$shipperName.'"';
                $c_type2 = '"'.$shipperAddress.'"';
                $c_type3 = '"'.$shipperLocation.'"';
                $c_type4 = '"'.$shipperPostal.'"';
                $c_type5 = '"'.$shipperContact.'"';
                $c_type6 = '"'.$shipperEmail.'"';
                $c_type7 = '"'.$shipperTelephone.'"';
                $c_type8 = '"'.$shipperExt.'"';
                $c_type9 = '"'.$shipperTollFree.'"';
                $c_type10 = '"'.$shipperFax.'"';
                $c_type11 = '"'.$shipperShippingHours.'"';
                $c_type12 = '"'.$shipperAppointments.'"';
                $c_type13 = '"'.$shipperIntersaction.'"';
                $c_type14 = '"'.$shipperStatus.'"';
                $c_type15 = '"'.$shippingNotes.'"';
                $c_type16 = '"'.$internalNotes.'"';

                $title1 = '"Shipper Name"';
                $title2 = '"Address"';
                $title3 = '"Location"';
                $title4 = '"Postal / Zip"';
                $title5 = '"Contact Name"';
                $title6 = '"Contact Email"';
                $title7 = '"Telephone"';
                $title8 = '"Ext"';
                $title9 = '"Toll Free"';
                $title10 = '"Fax"';
                $title11 = '"Shipping Hours"';
                $title12 = '"Appointments"';
                $title13 = '"Major Intersection / Directions"';
                $title14 = '"Status"';
                $title15 = '"Shipping Notes"';
                $title16 = '"Internal Notes"';
                $pencilid1 = '"shipperNamePencil'.$i.'"';
                $pencilid2 = '"shipperAddressPencil'.$i.'"';
                $pencilid3 = '"shipperLocationPencil'.$i.'"';
                $pencilid4 = '"shipperPostalPencil'.$i.'"';
                $pencilid5 = '"shipperContactPencil'.$i.'"';
                $pencilid6 = '"shipperEmailPencil'.$i.'"';
                $pencilid7 = '"shipperTelephonePencil'.$i.'"';
                $pencilid8 = '"shipperExtPencil'.$i.'"';
                $pencilid9 = '"shipperTollFreePencil'.$i.'"';
                $pencilid10 = '"shipperFaxPencil'.$i.'"';
                $pencilid11 = '"shipperShippingHoursPencil'.$i.'"';
                $pencilid12 = '"shipperAppointmentsPencil'.$i.'"';
                $pencilid13 = '"shipperIntersactionPencil'.$i.'"';
                $pencilid14 = '"shipperStatusPencil'.$i.'"';
                $pencilid15 = '"shippingNotesPencil'.$i.'"';
                $pencilid16 = '"internalNotesPencil'.$i.'"';

                echo "<tr>
                        <th>$i</th>
                        <th class='custom-text' id='shipperName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='shipperNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateShipper,$type,$id,$shipperNameColmn,$title1,$pencilid1)'
                            ></i>
                            $shipperName
                        </th>
                        <td class='custom-text' id='shipperAddress$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='shipperAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateShipper,$type,$id,$shipperAddressColmn,$title2,$pencilid2)'
                            ></i>
                            $shipperAddress
                        </td>
                        <td class='custom-text' id='shipperLocation$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='shipperLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateShipper,$type,$id,$shipperLocationColmn,$title3,$pencilid3)'
                            ></i>
                            $shipperLocation
                        </td>
                        <td class='custom-text' id='shipperPostal$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='shipperPostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateShipper,$type,$id,$shipperPostalColmn,$title4,$pencilid4)'
                            ></i>
                            $shipperPostal
                        </td>
                        <td class='custom-text' id='shipperContact$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='shipperContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateShipper,$type,$id,$shipperContactColmn,$title5,$pencilid5)'
                            ></i>
                            $shipperContact
                        </td>
                        <td class='custom-text' id='shipperEmail$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='shipperEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateShipper,$type,$id,$shipperEmailColmn,$title6,$pencilid6)'
                            ></i>
                            $shipperEmail
                        </td>
                        <td class='custom-text' id='shipperTelephone$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='shipperTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateShipper,$type,$id,$shipperTelephoneColmn,$title7,$pencilid7)'
                            ></i>
                            $shipperTelephone
                        </td>
                        <td class='custom-text' id='shipperExt$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='shipperExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateShipper,$type,$id,$shipperExtColmn,$title8,$pencilid8)'
                            ></i>
                            $shipperExt
                        </td>
                        <td class='custom-text' id='shipperTollFree$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='shipperTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateShipper,$type,$id,$shipperTollFreeColmn,$title9,$pencilid9)'
                            ></i>
                            $shipperTollFree
                        </td>
                        <td class='custom-text' id='shipperFax$i'
                            onmouseover='showPencil_s($pencilid10)'
                            onmouseout='hidePencil_s($pencilid10)'
                            >
                            <i id='shipperFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type10,$updateShipper,$type,$id,$shipperFaxColmn,$title10,$pencilid10)'
                            ></i>
                            $shipperFax
                        </td>
                        <td class='custom-text' id='shipperShippingHours$i'
                            onmouseover='showPencil_s($pencilid11)'
                            onmouseout='hidePencil_s($pencilid11)'
                            >
                            <i id='shipperShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type11,$updateShipper,$type,$id,$shipperShippingHoursColmn,$title11,$pencilid11)'
                            ></i>
                            $shipperShippingHours
                        </td>
                        <td class='custom-text' id='shipperAppointments$i'
                            onmouseover='showPencil_s($pencilid12)'
                            onmouseout='hidePencil_s($pencilid12)'
                            >
                            <i id='shipperAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type12,$updateShipper,$type,$id,$shipperAppointmentsColmn,$title12,$pencilid12)'
                            ></i>
                            $shipperAppointments
                        </td>
                        <td class='custom-text' id='shipperIntersaction$i'
                            onmouseover='showPencil_s($pencilid13)'
                            onmouseout='hidePencil_s($pencilid13)'
                            >
                            <i id='shipperIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type13,$updateShipper,$type,$id,$shipperIntersactionColmn,$title13,$pencilid13)'
                            ></i>
                            $shipperIntersaction
                        </td>
                        <td class='custom-text' id='shipperStatus$i'
                            onmouseover='showPencil_s($pencilid14)'
                            onmouseout='hidePencil_s($pencilid14)'
                            >
                            <i id='shipperStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type14,$updateShipper,$type,$id,$shipperStatusColmn,$title14,$pencilid14)'
                            ></i>
                            $shipperStatus
                        </td>
                        <td class='custom-text' id='shippingNotes$i'
                            onmouseover='showPencil_s($pencilid15)'
                            onmouseout='hidePencil_s($pencilid15)'
                            >
                            <i id='shippingNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type15,$updateShipper,$type,$id,$shippingNotesColmn,$title15,$pencilid15)'
                            ></i>
                            $shippingNotes
                        </td>
                        <td class='custom-text' id='internalNotes$i'
                            onmouseover='showPencil_s($pencilid16)'
                            onmouseout='hidePencil_s($pencilid16)'
                            >
                            <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type16,$updateShipper,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                            ></i>
                            $internalNotes
                        </td>";

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deleteShipper($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
            }    
        }

        if ($_POST['getoption'] == "") {
            $show = $db->shipper->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('shipper' => array('$slice' => [0, 100]))));
            $i = 0;
            
            foreach ($show as $row) {
                $show1 = $row['shipper'];
                foreach ($show1 as $row1) {
                    $counter = $row1['counter'];
                    $id = $row1['_id'];
                    $shipperName = $row1['shipperName'];
                    $shipperAddress = $row1['shipperAddress'];
                    $shipperLocation = $row1['shipperLocation'];
                    $shipperPostal = $row1['shipperPostal'];
                    $shipperContact = $row1['shipperContact'];
                    $shipperEmail = $row1['shipperEmail'];
                    $shipperTelephone = $row1['shipperTelephone'];
                    $shipperExt = $row1['shipperExt'];
                    $shipperTollFree = $row1['shipperTollFree'];
                    $shipperFax = $row1['shipperFax'];
                    $shipperShippingHours = $row1['shipperShippingHours'];
                    $shipperAppointments = $row1['shipperAppointments'];
                    $shipperIntersaction = $row1['shipperIntersaction'];
                    $shipperStatus = $row1['shipperStatus'];
                    $shippingNotes = $row1['shippingNotes'];
                    $internalNotes = $row1['internalNotes'];

                    $shipperNameColmn = '"shipperName"';
                    $shipperAddressColmn = '"shipperAddress"';
                    $shipperLocationColmn = '"shipperLocation"';
                    $shipperPostalColmn = '"shipperPostal"';
                    $shipperContactColmn = '"shipperContact"';
                    $shipperEmailColmn = '"shipperEmail"';
                    $shipperTelephoneColmn = '"shipperTelephone"';
                    $shipperExtColmn = '"shipperExt"';
                    $shipperTollFreeColmn = '"shipperTollFree"';
                    $shipperFaxColmn = '"shipperFax"';
                    $shipperShippingHoursColmn = '"shipperShippingHours"';
                    $shipperAppointmentsColmn = '"shipperAppointments"';
                    $shipperIntersactionColmn = '"shipperIntersaction"';
                    $shipperStatusColmn = '"shipperStatus"';
                    $shippingNotesColmn = '"shippingNotes"';
                    $internalNotesColmn = '"internalNotes"';
                    $type = '"text"';
                    $i++;
                    $updateShipper = '"updateShipper"';

                    $c_type1 = '"'.$shipperName.'"';
                    $c_type2 = '"'.$shipperAddress.'"';
                    $c_type3 = '"'.$shipperLocation.'"';
                    $c_type4 = '"'.$shipperPostal.'"';
                    $c_type5 = '"'.$shipperContact.'"';
                    $c_type6 = '"'.$shipperEmail.'"';
                    $c_type7 = '"'.$shipperTelephone.'"';
                    $c_type8 = '"'.$shipperExt.'"';
                    $c_type9 = '"'.$shipperTollFree.'"';
                    $c_type10 = '"'.$shipperFax.'"';
                    $c_type11 = '"'.$shipperShippingHours.'"';
                    $c_type12 = '"'.$shipperAppointments.'"';
                    $c_type13 = '"'.$shipperIntersaction.'"';
                    $c_type14 = '"'.$shipperStatus.'"';
                    $c_type15 = '"'.$shippingNotes.'"';
                    $c_type16 = '"'.$internalNotes.'"';

                    $title1 = '"Shipper Name"';
                    $title2 = '"Address"';
                    $title3 = '"Location"';
                    $title4 = '"Postal / Zip"';
                    $title5 = '"Contact Name"';
                    $title6 = '"Contact Email"';
                    $title7 = '"Telephone"';
                    $title8 = '"Ext"';
                    $title9 = '"Toll Free"';
                    $title10 = '"Fax"';
                    $title11 = '"Shipping Hours"';
                    $title12 = '"Appointments"';
                    $title13 = '"Major Intersection / Directions"';
                    $title14 = '"Status"';
                    $title15 = '"Shipping Notes"';
                    $title16 = '"Internal Notes"';
                    $pencilid1 = '"shipperNamePencil'.$i.'"';
                    $pencilid2 = '"shipperAddressPencil'.$i.'"';
                    $pencilid3 = '"shipperLocationPencil'.$i.'"';
                    $pencilid4 = '"shipperPostalPencil'.$i.'"';
                    $pencilid5 = '"shipperContactPencil'.$i.'"';
                    $pencilid6 = '"shipperEmailPencil'.$i.'"';
                    $pencilid7 = '"shipperTelephonePencil'.$i.'"';
                    $pencilid8 = '"shipperExtPencil'.$i.'"';
                    $pencilid9 = '"shipperTollFreePencil'.$i.'"';
                    $pencilid10 = '"shipperFaxPencil'.$i.'"';
                    $pencilid11 = '"shipperShippingHoursPencil'.$i.'"';
                    $pencilid12 = '"shipperAppointmentsPencil'.$i.'"';
                    $pencilid13 = '"shipperIntersactionPencil'.$i.'"';
                    $pencilid14 = '"shipperStatusPencil'.$i.'"';
                    $pencilid15 = '"shippingNotesPencil'.$i.'"';
                    $pencilid16 = '"internalNotesPencil'.$i.'"';

                    echo "<tr>
                            <th>$i</th>
                            <th class='custom-text' id='shipperName$i'
                                onmouseover='showPencil_s($pencilid1)'
                                onmouseout='hidePencil_s($pencilid1)'
                                >
                                <i id='shipperNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type1,$updateShipper,$type,$id,$shipperNameColmn,$title1,$pencilid1)'
                                ></i>
                                $shipperName
                            </th>
                            <td class='custom-text' id='shipperAddress$i'
                                onmouseover='showPencil_s($pencilid2)'
                                onmouseout='hidePencil_s($pencilid2)'
                                >
                                <i id='shipperAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type2,$updateShipper,$type,$id,$shipperAddressColmn,$title2,$pencilid2)'
                                ></i>
                                $shipperAddress
                            </td>
                            <td class='custom-text' id='shipperLocation$i'
                                onmouseover='showPencil_s($pencilid3)'
                                onmouseout='hidePencil_s($pencilid3)'
                                >
                                <i id='shipperLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type3,$updateShipper,$type,$id,$shipperLocationColmn,$title3,$pencilid3)'
                                ></i>
                                $shipperLocation
                            </td>
                            <td class='custom-text' id='shipperPostal$i'
                                onmouseover='showPencil_s($pencilid4)'
                                onmouseout='hidePencil_s($pencilid4)'
                                >
                                <i id='shipperPostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type4,$updateShipper,$type,$id,$shipperPostalColmn,$title4,$pencilid4)'
                                ></i>
                                $shipperPostal
                            </td>
                            <td class='custom-text' id='shipperContact$i'
                                onmouseover='showPencil_s($pencilid5)'
                                onmouseout='hidePencil_s($pencilid5)'
                                >
                                <i id='shipperContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type5,$updateShipper,$type,$id,$shipperContactColmn,$title5,$pencilid5)'
                                ></i>
                                $shipperContact
                            </td>
                            <td class='custom-text' id='shipperEmail$i'
                                onmouseover='showPencil_s($pencilid6)'
                                onmouseout='hidePencil_s($pencilid6)'
                                >
                                <i id='shipperEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type6,$updateShipper,$type,$id,$shipperEmailColmn,$title6,$pencilid6)'
                                ></i>
                                $shipperEmail
                            </td>
                            <td class='custom-text' id='shipperTelephone$i'
                                onmouseover='showPencil_s($pencilid7)'
                                onmouseout='hidePencil_s($pencilid7)'
                                >
                                <i id='shipperTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type7,$updateShipper,$type,$id,$shipperTelephoneColmn,$title7,$pencilid7)'
                                ></i>
                                $shipperTelephone
                            </td>
                            <td class='custom-text' id='shipperExt$i'
                                onmouseover='showPencil_s($pencilid8)'
                                onmouseout='hidePencil_s($pencilid8)'
                                >
                                <i id='shipperExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type8,$updateShipper,$type,$id,$shipperExtColmn,$title8,$pencilid8)'
                                ></i>
                                $shipperExt
                            </td>
                            <td class='custom-text' id='shipperTollFree$i'
                                onmouseover='showPencil_s($pencilid9)'
                                onmouseout='hidePencil_s($pencilid9)'
                                >
                                <i id='shipperTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type9,$updateShipper,$type,$id,$shipperTollFreeColmn,$title9,$pencilid9)'
                                ></i>
                                $shipperTollFree
                            </td>
                            <td class='custom-text' id='shipperFax$i'
                                onmouseover='showPencil_s($pencilid10)'
                                onmouseout='hidePencil_s($pencilid10)'
                                >
                                <i id='shipperFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type10,$updateShipper,$type,$id,$shipperFaxColmn,$title10,$pencilid10)'
                                ></i>
                                $shipperFax
                            </td>
                            <td class='custom-text' id='shipperShippingHours$i'
                                onmouseover='showPencil_s($pencilid11)'
                                onmouseout='hidePencil_s($pencilid11)'
                                >
                                <i id='shipperShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type11,$updateShipper,$type,$id,$shipperShippingHoursColmn,$title11,$pencilid11)'
                                ></i>
                                $shipperShippingHours
                            </td>
                            <td class='custom-text' id='shipperAppointments$i'
                                onmouseover='showPencil_s($pencilid12)'
                                onmouseout='hidePencil_s($pencilid12)'
                                >
                                <i id='shipperAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type12,$updateShipper,$type,$id,$shipperAppointmentsColmn,$title12,$pencilid12)'
                                ></i>
                                $shipperAppointments
                            </td>
                            <td class='custom-text' id='shipperIntersaction$i'
                                onmouseover='showPencil_s($pencilid13)'
                                onmouseout='hidePencil_s($pencilid13)'
                                >
                                <i id='shipperIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type13,$updateShipper,$type,$id,$shipperIntersactionColmn,$title13,$pencilid13)'
                                ></i>
                                $shipperIntersaction
                            </td>
                            <td class='custom-text' id='shipperStatus$i'
                                onmouseover='showPencil_s($pencilid14)'
                                onmouseout='hidePencil_s($pencilid14)'
                                >
                                <i id='shipperStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type14,$updateShipper,$type,$id,$shipperStatusColmn,$title14,$pencilid14)'
                                ></i>
                                $shipperStatus
                            </td>
                            <td class='custom-text' id='shippingNotes$i'
                                onmouseover='showPencil_s($pencilid15)'
                                onmouseout='hidePencil_s($pencilid15)'
                                >
                                <i id='shippingNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type15,$updateShipper,$type,$id,$shippingNotesColmn,$title15,$pencilid15)'
                                ></i>
                                $shippingNotes
                            </td>
                            <td class='custom-text' id='internalNotes$i'
                                onmouseover='showPencil_s($pencilid16)'
                                onmouseout='hidePencil_s($pencilid16)'
                                >
                                <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type16,$updateShipper,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                                ></i>
                                $internalNotes
                            </td>"; 
                    
                        if ($counter == 0) { 
                            echo "<td><a href='#' onclick='deleteShipper($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                        } else {
                            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                        }
                }  
            }            
        }
    }
}

if ($_GET['type'] == 'paginate_ship') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    $i = 0;

    $cursor = $db->shipper->find(array('companyID' => $_SESSION['companyId']));
    foreach ($cursor as $value) {
        $total_records = sizeof($value['shipper']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->shipper->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('shipper' => array('$slice' => [$start, $limit]))));
    
    foreach ($show as $row) {
        $show1 = $row['shipper'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $shipperName = $row1['shipperName'];
            $shipperAddress = $row1['shipperAddress'];
            $shipperLocation = $row1['shipperLocation'];
            $shipperPostal = $row1['shipperPostal'];
            $shipperContact = $row1['shipperContact'];
            $shipperEmail = $row1['shipperEmail'];
            $shipperTelephone = $row1['shipperTelephone'];
            $shipperExt = $row1['shipperExt'];
            $shipperTollFree = $row1['shipperTollFree'];
            $shipperFax = $row1['shipperFax'];
            $shipperShippingHours = $row1['shipperShippingHours'];
            $shipperAppointments = $row1['shipperAppointments'];
            $shipperIntersaction = $row1['shipperIntersaction'];
            $shipperStatus = $row1['shipperStatus'];
            $shippingNotes = $row1['shippingNotes'];
            $internalNotes = $row1['internalNotes'];

            $shipperNameColmn = '"shipperName"';
            $shipperAddressColmn = '"shipperAddress"';
            $shipperLocationColmn = '"shipperLocation"';
            $shipperPostalColmn = '"shipperPostal"';
            $shipperContactColmn = '"shipperContact"';
            $shipperEmailColmn = '"shipperEmail"';
            $shipperTelephoneColmn = '"shipperTelephone"';
            $shipperExtColmn = '"shipperExt"';
            $shipperTollFreeColmn = '"shipperTollFree"';
            $shipperFaxColmn = '"shipperFax"';
            $shipperShippingHoursColmn = '"shipperShippingHours"';
            $shipperAppointmentsColmn = '"shipperAppointments"';
            $shipperIntersactionColmn = '"shipperIntersaction"';
            $shipperStatusColmn = '"shipperStatus"';
            $shippingNotesColmn = '"shippingNotes"';
            $internalNotesColmn = '"internalNotes"';
            $type = '"text"';
            $start += 1;
            $i++;
            $updateShipper = '"updateShipper"';

            $c_type1 = '"'.$shipperName.'"';
            $c_type2 = '"'.$shipperAddress.'"';
            $c_type3 = '"'.$shipperLocation.'"';
            $c_type4 = '"'.$shipperPostal.'"';
            $c_type5 = '"'.$shipperContact.'"';
            $c_type6 = '"'.$shipperEmail.'"';
            $c_type7 = '"'.$shipperTelephone.'"';
            $c_type8 = '"'.$shipperExt.'"';
            $c_type9 = '"'.$shipperTollFree.'"';
            $c_type10 = '"'.$shipperFax.'"';
            $c_type11 = '"'.$shipperShippingHours.'"';
            $c_type12 = '"'.$shipperAppointments.'"';
            $c_type13 = '"'.$shipperIntersaction.'"';
            $c_type14 = '"'.$shipperStatus.'"';
            $c_type15 = '"'.$shippingNotes.'"';
            $c_type16 = '"'.$internalNotes.'"';

            $title1 = '"Shipper Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Contact Name"';
            $title6 = '"Contact Email"';
            $title7 = '"Telephone"';
            $title8 = '"Ext"';
            $title9 = '"Toll Free"';
            $title10 = '"Fax"';
            $title11 = '"Shipping Hours"';
            $title12 = '"Appointments"';
            $title13 = '"Major Intersection / Directions"';
            $title14 = '"Status"';
            $title15 = '"Shipping Notes"';
            $title16 = '"Internal Notes"';

            $pencilid1 = '"shipperNamePencil'.$i.'"';
            $pencilid2 = '"shipperAddressPencil'.$i.'"';
            $pencilid3 = '"shipperLocationPencil'.$i.'"';
            $pencilid4 = '"shipperPostalPencil'.$i.'"';
            $pencilid5 = '"shipperContactPencil'.$i.'"';
            $pencilid6 = '"shipperEmailPencil'.$i.'"';
            $pencilid7 = '"shipperTelephonePencil'.$i.'"';
            $pencilid8 = '"shipperExtPencil'.$i.'"';
            $pencilid9 = '"shipperTollFreePencil'.$i.'"';
            $pencilid10 = '"shipperFaxPencil'.$i.'"';
            $pencilid11 = '"shipperShippingHoursPencil'.$i.'"';
            $pencilid12 = '"shipperAppointmentsPencil'.$i.'"';
            $pencilid13 = '"shipperIntersactionPencil'.$i.'"';
            $pencilid14 = '"shipperStatusPencil'.$i.'"';
            $pencilid15 = '"shippingNotesPencil'.$i.'"';
            $pencilid16 = '"internalNotesPencil'.$i.'"';

            echo "<tr>
                    <th>$start</th>
                    <th class='custom-text' id='shipperName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='shipperNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateShipper,$type,$id,$shipperNameColmn,$title1,$pencilid1)'
                        ></i>
                        $shipperName
                    </th>
                    <td class='custom-text' id='shipperAddress$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='shipperAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateShipper,$type,$id,$shipperAddressColmn,$title2,$pencilid2)'
                        ></i>
                        $shipperAddress
                    </td>
                    <td class='custom-text' id='shipperLocation$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='shipperLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateShipper,$type,$id,$shipperLocationColmn,$title3,$pencilid3)'
                        ></i>
                        $shipperLocation
                    </td>
                    <td class='custom-text' id='shipperPostal$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='shipperPostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateShipper,$type,$id,$shipperPostalColmn,$title4,$pencilid4)'
                        ></i>
                        $shipperPostal
                    </td>
                    <td class='custom-text' id='shipperContact$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='shipperContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateShipper,$type,$id,$shipperContactColmn,$title5,$pencilid5)'
                        ></i>
                        $shipperContact
                    </td>
                    <td class='custom-text' id='shipperEmail$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='shipperEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateShipper,$type,$id,$shipperEmailColmn,$title6,$pencilid6)'
                        ></i>
                        $shipperEmail
                    </td>
                    <td class='custom-text' id='shipperTelephone$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='shipperTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateShipper,$type,$id,$shipperTelephoneColmn,$title7,$pencilid7)'
                        ></i>
                        $shipperTelephone
                    </td>
                    <td class='custom-text' id='shipperExt$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='shipperExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateShipper,$type,$id,$shipperExtColmn,$title8,$pencilid8)'
                        ></i>
                        $shipperExt
                    </td>
                    <td class='custom-text' id='shipperTollFree$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='shipperTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateShipper,$type,$id,$shipperTollFreeColmn,$title9,$pencilid9)'
                        ></i>
                        $shipperTollFree
                    </td>
                    <td class='custom-text'id='shipperFax$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='shipperFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateShipper,$type,$id,$shipperFaxColmn,$title10,$pencilid10)'
                        ></i>
                        $shipperFax
                    </td>
                    <td class='custom-text' id='shipperShippingHours$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='shipperShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateShipper,$type,$id,$shipperShippingHoursColmn,$title11,$pencilid11)'
                        ></i>
                        $shipperShippingHours
                    </td>
                    <td class='custom-text' id='shipperAppointments$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='shipperAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateShipper,$type,$id,$shipperAppointmentsColmn,$title12,$pencilid12)'
                        ></i>
                        $shipperAppointments
                    </td>
                    <td class='custom-text' id='shipperIntersaction$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='shipperIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateShipper,$type,$id,$shipperIntersactionColmn,$title13,$pencilid13)'
                        ></i>
                        $shipperIntersaction
                    </td>
                    <td class='custom-text' id='shipperStatus$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='shipperStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateShipper,$type,$id,$shipperStatusColmn,$title14,$pencilid14)'
                        ></i>
                        $shipperStatus
                    </td>
                    <td class='custom-text' id='shippingNotes$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='shippingNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateShipper,$type,$id,$shippingNotesColmn,$title15,$pencilid15)'
                        ></i>
                        $shippingNotes
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateShipper,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                        ></i>
                        $internalNotes
                    </td>";   
                
                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteShipper($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
        }  
    }             
}