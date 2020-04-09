<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if($_GET['types'] == 'live_consignee_table') {
    $show = $db->consignee->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('consignee' => array('$slice' => [0, 100]))));
    //$show = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    $table = "";
    $list  = "";
    foreach ($show as $row) {
        $show1 = $row['consignee'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $consigneeName = $row1['consigneeName'];
            $consigneeAddress = $row1['consigneeAddress'];
            $consigneeLocation = $row1['consigneeLocation'];
            $consigneePostal = $row1['consigneePostal'];
            $consigneeContact = $row1['consigneeContact'];
            $consigneeEmail = $row1['consigneeEmail'];
            $consigneeTelephone = $row1['consigneeTelephone'];
            $consigneeExt = $row1['consigneeExt'];
            $consigneeTollFree = $row1['consigneeTollFree'];
            $consigneeFax = $row1['consigneeFax'];
            $consigneeShippingHours = $row1['consigneeReceiving'];
            $consigneeAppointments = $row1['consigneeAppointments'];
            $consigneeIntersaction = $row1['consigneeIntersaction'];
            $consigneeStatus = $row1['consigneeStatus'];
            $consigneeNotes = $row1['consigneeRecivingNote'];
            $internalNotes = $row1['consigneeInternalNote'];

            $consigneeNameColmn = '"consigneeName"';
            $consigneeAddressColmn = '"consigneeAddress"';
            $consigneeLocationColmn = '"consigneeLocation"';
            $consigneePostalColmn = '"consigneePostal"';
            $consigneeContactColmn = '"consigneeContact"';
            $consigneeEmailColmn = '"consigneeEmail"';
            $consigneeTelephoneColmn = '"consigneeTelephone"';
            $consigneeExtColmn = '"consigneeExt"';
            $consigneeTollFreeColmn = '"consigneeTollFree"';
            $consigneeFaxColmn = '"consigneeFax"';
            $consigneeShippingHoursColmn = '"consigneeShippingHours"';
            $consigneeAppointmentsColmn = '"consigneeAppointments"';
            $consigneeIntersactionColmn = '"consigneeIntersaction"';
            $consigneeStatusColmn = '"consigneeStatus"';
            $consigneeNotesColmn = '"consigneeNotes"';
            $internalNotesColmn = '"internalNotes"';
            $type = '"text"';
            $i++;
            $updateConsignee = '"updateConsignee"';

            $c_type1 = '"'.$consigneeName.'"';
            $c_type2 = '"'.$consigneeAddress.'"';
            $c_type3 = '"'.$consigneeLocation.'"';
            $c_type4 = '"'.$consigneePostal.'"';
            $c_type5 = '"'.$consigneeContact.'"';
            $c_type6 = '"'.$consigneeEmail.'"';
            $c_type7 = '"'.$consigneeTelephone.'"';
            $c_type8 = '"'.$consigneeExt.'"';
            $c_type9 = '"'.$consigneeTollFree.'"';
            $c_type10 = '"'.$consigneeFax.'"';
            $c_type11 = '"'.$consigneeShippingHours.'"';
            $c_type12 = '"'.$consigneeAppointments.'"';
            $c_type13 = '"'.$consigneeIntersaction.'"';
            $c_type14 = '"'.$consigneeStatus.'"';
            $c_type15 = '"'.$consigneeNotes.'"';
            $c_type16 = '"'.$internalNotes.'"';

            $title1 = '"Consignee Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Contact Name"';
            $title6 = '"Contact Email"';
            $title7 = '"Telephone"';
            $title8 = '"Ext"';
            $title9 = '"Toll Free"';
            $title10 = '"Fax"';
            $title11 = '"Receiving Hours"';
            $title12 = '"Appoinments"';
            $title13 = '"Major Intersection / Directions"';
            $title14 = '"Status"';
            $title15 = '"Receiving Notes"';
            $title16 = '"Internal Notes"';

            $pencilid1 = '"consigneeNamePencil'.$i.'"';
            $pencilid2 = '"consigneeAddressPencil'.$i.'"';
            $pencilid3 = '"consigneeLocationPencil'.$i.'"';
            $pencilid4 = '"consigneePostalPencil'.$i.'"';
            $pencilid5 = '"consigneeContactPencil'.$i.'"';
            $pencilid6 = '"consigneeEmailPencil'.$i.'"';
            $pencilid7 = '"consigneeTelephonePencil'.$i.'"';
            $pencilid8 = '"consigneeExtPencil'.$i.'"';
            $pencilid9 = '"consigneeTollFreePencil'.$i.'"';
            $pencilid10 = '"consigneeFaxPencil'.$i.'"';
            $pencilid11 = '"consigneeShippingHoursPencil'.$i.'"';
            $pencilid12 = '"consigneeAppointmentsPencil'.$i.'"';
            $pencilid13 = '"consigneeIntersactionPencil'.$i.'"';
            $pencilid14 = '"consigneeStatusPencil'.$i.'"';
            $pencilid15 = '"consigneeNotesPencil'.$i.'"';
            $pencilid16 = '"internalNotesPencil'.$i.'"';

            echo "<tr>
                    <th>$i</th>
                    <th class='custom-text' id='consigneeName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='consigneeNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateConsignee,$type,$id,$consigneeNameColmn,$title1,$pencilid1)'
                        ></i>
                        $consigneeName
                    </th>
                    <td class='custom-text' id='consigneeAddress$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='consigneeAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateConsignee,$type,$id,$consigneeAddressColmn,$title2,$pencilid2)'
                        ></i>
                        $consigneeAddress
                    </td>
                    <td class='custom-text' id='consigneeLocation$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='consigneeLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateConsignee,$type,$id,$consigneeLocationColmn,$title3,$pencilid3)'
                        ></i>
                        $consigneeLocation
                    </td>
                    <td class='custom-text' id='consigneePostal$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='consigneePostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateConsignee,$type,$id,$consigneePostalColmn,$title4,$pencilid4)'
                        ></i>
                        $consigneePostal
                    </td>
                    <td class='custom-text' id='consigneeContact$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='consigneeContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateConsignee,$type,$id,$consigneeContactColmn,$title5,$pencilid5)'
                        ></i>
                        $consigneeContact
                    </td>
                    <td class='custom-text' id='consigneeEmail$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='consigneeEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateConsignee,$type,$id,$consigneeEmailColmn,$title6,$pencilid6)'
                        ></i>
                        $consigneeEmail
                    </td>
                    <td class='custom-text' id='consigneeTelephone$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='consigneeTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateConsignee,$type,$id,$consigneeTelephoneColmn,$title7,$pencilid7)'
                        ></i>
                        $consigneeTelephone
                    </td>
                    <td class='custom-text' id='consigneeExt$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='consigneeExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateConsignee,$type,$id,$consigneeExtColmn,$title8,$pencilid8)'
                        ></i>
                        $consigneeExt
                    </td>
                    <td class='custom-text' id='consigneeTollFree$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='consigneeTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateConsignee,$type,$id,$consigneeTollFreeColmn,$title9,$pencilid9)'
                        ></i>
                        $consigneeTollFree
                    </td>
                    <td class='custom-text' id='consigneeFax$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='consigneeFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateConsignee,$type,$id,$consigneeFaxColmn,$title10,$pencilid10)'
                        ></i>
                        $consigneeFax
                    </td>
                    <td class='custom-text' id='consigneeShippingHours$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='consigneeShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateConsignee,$type,$id,$consigneeShippingHoursColmn,$title11,$pencilid11)'
                        ></i>
                        $consigneeShippingHours
                    </td>
                    <td class='custom-text' id='consigneeAppointments$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='consigneeAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateConsignee,$type,$id,$consigneeAppointmentsColmn,$title12,$pencilid12)'
                        ></i>
                        $consigneeAppointments
                    </td>
                    <td class='custom-text' id='consigneeIntersaction$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='consigneeIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateConsignee,$type,$id,$consigneeIntersactionColmn,$title13,$pencilid13)'
                        ></i>
                        $consigneeIntersaction
                    </td>
                    <td class='custom-text' id='consigneeStatus$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='consigneeStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateConsignee,$type,$id,$consigneeStatusColmn,$title14,$pencilid14)'
                        ></i>
                        $consigneeStatus
                    </td>
                    <td class='custom-text' id='consigneeNotes$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='consigneeNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateConsignee,$type,$id,$consigneeNotesColmn,$title15,$pencilid15)'
                        ></i>
                        $consigneeNotes
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateConsignee,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteConsignee($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }

            $value = "'".$id.")&nbsp;".$consigneeName."'";
            $list .="<option value=$value></option>";
        }
        //echo $table."^".$list;
    }
}

if ($_GET['types'] == 'search_text') {
    $show = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;

    foreach ($show as $row) {
        $show1 = $row['consignee'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['consigneeName'] || $_POST['getoption'] == $row1['consigneeAddress'] || $_POST['getoption'] == $row1['consigneeLocation'] || $_POST['getoption'] == $row1['consigneePostal'] || $_POST['getoption'] == $row1['consigneeContact'] || $_POST['getoption'] == $row1['consigneeEmail'] || $_POST['getoption'] == $row1['consigneeTelephone'] || $_POST['getoption'] == $row1['consigneeExt'] || $_POST['getoption'] == $row1['consigneeTollFree'] || $_POST['getoption'] == $row1['consigneeFax'] || $_POST['getoption'] == $row1['consigneeReceiving'] || $_POST['getoption'] == $row1['consigneeAppointments'] || $_POST['getoption'] == $row1['consigneeIntersaction'] || $_POST['getoption'] == $row1['consigneeStatus'] || $_POST['getoption'] == $row1['consigneeRecivingNote'] || $_POST['getoption'] == $row1['consigneeInternalNote']) {
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $consigneeName = $row1['consigneeName'];
                $consigneeAddress = $row1['consigneeAddress'];
                $consigneeLocation = $row1['consigneeLocation'];
                $consigneePostal = $row1['consigneePostal'];
                $consigneeContact = $row1['consigneeContact'];
                $consigneeEmail = $row1['consigneeEmail'];
                $consigneeTelephone = $row1['consigneeTelephone'];
                $consigneeExt = $row1['consigneeExt'];
                $consigneeTollFree = $row1['consigneeTollFree'];
                $consigneeFax = $row1['consigneeFax'];
                $consigneeShippingHours = $row1['consigneeReceiving'];
                $consigneeAppointments = $row1['consigneeAppointments'];
                $consigneeIntersaction = $row1['consigneeIntersaction'];
                $consigneeStatus = $row1['consigneeStatus'];
                $consigneeNotes = $row1['consigneeRecivingNote'];
                $internalNotes = $row1['consigneeInternalNote'];

                $consigneeNameColmn = '"consigneeName"';
                $consigneeAddressColmn = '"consigneeAddress"';
                $consigneeLocationColmn = '"consigneeLocation"';
                $consigneePostalColmn = '"consigneePostal"';
                $consigneeContactColmn = '"consigneeContact"';
                $consigneeEmailColmn = '"consigneeEmail"';
                $consigneeTelephoneColmn = '"consigneeTelephone"';
                $consigneeExtColmn = '"consigneeExt"';
                $consigneeTollFreeColmn = '"consigneeTollFree"';
                $consigneeFaxColmn = '"consigneeFax"';
                $consigneeShippingHoursColmn = '"consigneeShippingHours"';
                $consigneeAppointmentsColmn = '"consigneeAppointments"';
                $consigneeIntersactionColmn = '"consigneeIntersaction"';
                $consigneeStatusColmn = '"consigneeStatus"';
                $consigneeNotesColmn = '"consigneeNotes"';
                $internalNotesColmn = '"internalNotes"';
                $type = '"text"';
                $i++;
                $updateConsignee = '"updateConsignee"';

                $c_type1 = '"'.$consigneeName.'"';
                $c_type2 = '"'.$consigneeAddress.'"';
                $c_type3 = '"'.$consigneeLocation.'"';
                $c_type4 = '"'.$consigneePostal.'"';
                $c_type5 = '"'.$consigneeContact.'"';
                $c_type6 = '"'.$consigneeEmail.'"';
                $c_type7 = '"'.$consigneeTelephone.'"';
                $c_type8 = '"'.$consigneeExt.'"';
                $c_type9 = '"'.$consigneeTollFree.'"';
                $c_type10 = '"'.$consigneeFax.'"';
                $c_type11 = '"'.$consigneeShippingHours.'"';
                $c_type12 = '"'.$consigneeAppointments.'"';
                $c_type13 = '"'.$consigneeIntersaction.'"';
                $c_type14 = '"'.$consigneeStatus.'"';
                $c_type15 = '"'.$consigneeNotes.'"';
                $c_type16 = '"'.$internalNotes.'"';

                $title1 = '"Consignee Name"';
                $title2 = '"Address"';
                $title3 = '"Location"';
                $title4 = '"Postal / Zip"';
                $title5 = '"Contact Name"';
                $title6 = '"Contact Email"';
                $title7 = '"Telephone"';
                $title8 = '"Ext"';
                $title9 = '"Toll Free"';
                $title10 = '"Fax"';
                $title11 = '"Receiving Hours"';
                $title12 = '"Appoinments"';
                $title13 = '"Major Intersection / Directions"';
                $title14 = '"Status"';
                $title15 = '"Receiving Notes"';
                $title16 = '"Internal Notes"';

                $pencilid1 = '"consigneeNamePencil'.$i.'"';
                $pencilid2 = '"consigneeAddressPencil'.$i.'"';
                $pencilid3 = '"consigneeLocationPencil'.$i.'"';
                $pencilid4 = '"consigneePostalPencil'.$i.'"';
                $pencilid5 = '"consigneeContactPencil'.$i.'"';
                $pencilid6 = '"consigneeEmailPencil'.$i.'"';
                $pencilid7 = '"consigneeTelephonePencil'.$i.'"';
                $pencilid8 = '"consigneeExtPencil'.$i.'"';
                $pencilid9 = '"consigneeTollFreePencil'.$i.'"';
                $pencilid10 = '"consigneeFaxPencil'.$i.'"';
                $pencilid11 = '"consigneeShippingHoursPencil'.$i.'"';
                $pencilid12 = '"consigneeAppointmentsPencil'.$i.'"';
                $pencilid13 = '"consigneeIntersactionPencil'.$i.'"';
                $pencilid14 = '"consigneeStatusPencil'.$i.'"';
                $pencilid15 = '"consigneeNotesPencil'.$i.'"';
                $pencilid16 = '"internalNotesPencil'.$i.'"';

                echo "<tr>
                        <th>$i</th>
                        <th class='custom-text' id='consigneeName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='consigneeNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateConsignee,$type,$id,$consigneeNameColmn,$title1,$pencilid1)'
                            ></i>
                            $consigneeName
                        </th>
                        <td class='custom-text' id='consigneeAddress$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='consigneeAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateConsignee,$type,$id,$consigneeAddressColmn,$title2,$pencilid2)'
                            ></i>
                            $consigneeAddress
                        </td>
                        <td class='custom-text' id='consigneeLocation$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='consigneeLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateConsignee,$type,$id,$consigneeLocationColmn,$title3,$pencilid3)'
                            ></i>
                            $consigneeLocation
                        </td>
                        <td class='custom-text' id='consigneePostal$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='consigneePostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateConsignee,$type,$id,$consigneePostalColmn,$title4,$pencilid4)'
                            ></i>
                            $consigneePostal
                        </td>
                        <td class='custom-text' id='consigneeContact$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='consigneeContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateConsignee,$type,$id,$consigneeContactColmn,$title5,$pencilid5)'
                            ></i>
                            $consigneeContact
                        </td>
                        <td class='custom-text' id='consigneeEmail$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='consigneeEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateConsignee,$type,$id,$consigneeEmailColmn,$title6,$pencilid6)'
                            ></i>
                            $consigneeEmail
                        </td>
                        <td class='custom-text' id='consigneeTelephone$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='consigneeTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateConsignee,$type,$id,$consigneeTelephoneColmn,$title7,$pencilid7)'
                            ></i>
                            $consigneeTelephone
                        </td>
                        <td class='custom-text' id='consigneeExt$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='consigneeExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateConsignee,$type,$id,$consigneeExtColmn,$title8,$pencilid8)'
                            ></i>
                            $consigneeExt
                        </td>
                        <td class='custom-text' id='consigneeTollFree$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='consigneeTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateConsignee,$type,$id,$consigneeTollFreeColmn,$title9,$pencilid9)'
                            ></i>
                            $consigneeTollFree
                        </td>
                        <td class='custom-text' id='consigneeFax$i'
                            onmouseover='showPencil_s($pencilid10)'
                            onmouseout='hidePencil_s($pencilid10)'
                            >
                            <i id='consigneeFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type10,$updateConsignee,$type,$id,$consigneeFaxColmn,$title10,$pencilid10)'
                            ></i>
                            $consigneeFax
                        </td>
                        <td class='custom-text' id='consigneeShippingHours$i'
                            onmouseover='showPencil_s($pencilid11)'
                            onmouseout='hidePencil_s($pencilid11)'
                            >
                            <i id='consigneeShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type11,$updateConsignee,$type,$id,$consigneeShippingHoursColmn,$title11,$pencilid11)'
                            ></i>
                            $consigneeShippingHours
                        </td>
                        <td class='custom-text' id='consigneeAppointments$i'
                            onmouseover='showPencil_s($pencilid12)'
                            onmouseout='hidePencil_s($pencilid12)'
                            >
                            <i id='consigneeAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type12,$updateConsignee,$type,$id,$consigneeAppointmentsColmn,$title12,$pencilid12)'
                            ></i>
                            $consigneeAppointments
                        </td>
                        <td class='custom-text' id='consigneeIntersaction$i'
                            onmouseover='showPencil_s($pencilid13)'
                            onmouseout='hidePencil_s($pencilid13)'
                            >
                            <i id='consigneeIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type13,$updateConsignee,$type,$id,$consigneeIntersactionColmn,$title13,$pencilid13)'
                            ></i>
                            $consigneeIntersaction
                        </td>
                        <td class='custom-text' id='consigneeStatus$i'
                            onmouseover='showPencil_s($pencilid14)'
                            onmouseout='hidePencil_s($pencilid14)'
                            >
                            <i id='consigneeStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type14,$updateConsignee,$type,$id,$consigneeStatusColmn,$title14,$pencilid14)'
                            ></i>
                            $consigneeStatus
                        </td>
                        <td class='custom-text' id='consigneeNotes$i'
                            onmouseover='showPencil_s($pencilid15)'
                            onmouseout='hidePencil_s($pencilid15)'
                            >
                            <i id='consigneeNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type15,$updateConsignee,$type,$id,$consigneeNotesColmn,$title15,$pencilid15)'
                            ></i>
                            $consigneeNotes
                        </td>
                        <td class='custom-text' id='internalNotes$i'
                            onmouseover='showPencil_s($pencilid16)'
                            onmouseout='hidePencil_s($pencilid16)'
                            >
                            <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type16,$updateConsignee,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                            ></i>
                            $internalNotes
                        </td>";

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deleteConsignee($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }                    
            }
        }

        if (empty($_POST['getoption'])) {
            $show = $db->consignee->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('consignee' => array('$slice' => [0, 100]))));
            $i = 0;

            foreach ($show as $row) {
                $show1 = $row['consignee'];
                foreach ($show1 as $row1) {
                    $counter = $row1['counter'];
                    $id = $row1['_id'];
                    $consigneeName = $row1['consigneeName'];
                    $consigneeAddress = $row1['consigneeAddress'];
                    $consigneeLocation = $row1['consigneeLocation'];
                    $consigneePostal = $row1['consigneePostal'];
                    $consigneeContact = $row1['consigneeContact'];
                    $consigneeEmail = $row1['consigneeEmail'];
                    $consigneeTelephone = $row1['consigneeTelephone'];
                    $consigneeExt = $row1['consigneeExt'];
                    $consigneeTollFree = $row1['consigneeTollFree'];
                    $consigneeFax = $row1['consigneeFax'];
                    $consigneeShippingHours = $row1['consigneeReceiving'];
                    $consigneeAppointments = $row1['consigneeAppointments'];
                    $consigneeIntersaction = $row1['consigneeIntersaction'];
                    $consigneeStatus = $row1['consigneeStatus'];
                    $consigneeNotes = $row1['consigneeRecivingNote'];
                    $internalNotes = $row1['consigneeInternalNote'];

                    $consigneeNameColmn = '"consigneeName"';
                    $consigneeAddressColmn = '"consigneeAddress"';
                    $consigneeLocationColmn = '"consigneeLocation"';
                    $consigneePostalColmn = '"consigneePostal"';
                    $consigneeContactColmn = '"consigneeContact"';
                    $consigneeEmailColmn = '"consigneeEmail"';
                    $consigneeTelephoneColmn = '"consigneeTelephone"';
                    $consigneeExtColmn = '"consigneeExt"';
                    $consigneeTollFreeColmn = '"consigneeTollFree"';
                    $consigneeFaxColmn = '"consigneeFax"';
                    $consigneeShippingHoursColmn = '"consigneeShippingHours"';
                    $consigneeAppointmentsColmn = '"consigneeAppointments"';
                    $consigneeIntersactionColmn = '"consigneeIntersaction"';
                    $consigneeStatusColmn = '"consigneeStatus"';
                    $consigneeNotesColmn = '"consigneeNotes"';
                    $internalNotesColmn = '"internalNotes"';
                    $type = '"text"';
                    $i++;
                    $updateConsignee = '"updateConsignee"';

                    $c_type1 = '"'.$consigneeName.'"';
                    $c_type2 = '"'.$consigneeAddress.'"';
                    $c_type3 = '"'.$consigneeLocation.'"';
                    $c_type4 = '"'.$consigneePostal.'"';
                    $c_type5 = '"'.$consigneeContact.'"';
                    $c_type6 = '"'.$consigneeEmail.'"';
                    $c_type7 = '"'.$consigneeTelephone.'"';
                    $c_type8 = '"'.$consigneeExt.'"';
                    $c_type9 = '"'.$consigneeTollFree.'"';
                    $c_type10 = '"'.$consigneeFax.'"';
                    $c_type11 = '"'.$consigneeShippingHours.'"';
                    $c_type12 = '"'.$consigneeAppointments.'"';
                    $c_type13 = '"'.$consigneeIntersaction.'"';
                    $c_type14 = '"'.$consigneeStatus.'"';
                    $c_type15 = '"'.$consigneeNotes.'"';
                    $c_type16 = '"'.$internalNotes.'"';

                    $title1 = '"Consignee Name"';
                    $title2 = '"Address"';
                    $title3 = '"Location"';
                    $title4 = '"Postal / Zip"';
                    $title5 = '"Contact Name"';
                    $title6 = '"Contact Email"';
                    $title7 = '"Telephone"';
                    $title8 = '"Ext"';
                    $title9 = '"Toll Free"';
                    $title10 = '"Fax"';
                    $title11 = '"Receiving Hours"';
                    $title12 = '"Appoinments"';
                    $title13 = '"Major Intersection / Directions"';
                    $title14 = '"Status"';
                    $title15 = '"Receiving Notes"';
                    $title16 = '"Internal Notes"';

                    $pencilid1 = '"consigneeNamePencil'.$i.'"';
                    $pencilid2 = '"consigneeAddressPencil'.$i.'"';
                    $pencilid3 = '"consigneeLocationPencil'.$i.'"';
                    $pencilid4 = '"consigneePostalPencil'.$i.'"';
                    $pencilid5 = '"consigneeContactPencil'.$i.'"';
                    $pencilid6 = '"consigneeEmailPencil'.$i.'"';
                    $pencilid7 = '"consigneeTelephonePencil'.$i.'"';
                    $pencilid8 = '"consigneeExtPencil'.$i.'"';
                    $pencilid9 = '"consigneeTollFreePencil'.$i.'"';
                    $pencilid10 = '"consigneeFaxPencil'.$i.'"';
                    $pencilid11 = '"consigneeShippingHoursPencil'.$i.'"';
                    $pencilid12 = '"consigneeAppointmentsPencil'.$i.'"';
                    $pencilid13 = '"consigneeIntersactionPencil'.$i.'"';
                    $pencilid14 = '"consigneeStatusPencil'.$i.'"';
                    $pencilid15 = '"consigneeNotesPencil'.$i.'"';
                    $pencilid16 = '"internalNotesPencil'.$i.'"';

                    echo "<tr>
                            <th>$i</th>
                            <th class='custom-text' id='consigneeName$i'
                                onmouseover='showPencil_s($pencilid1)'
                                onmouseout='hidePencil_s($pencilid1)'
                                >
                                <i id='consigneeNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type1,$updateConsignee,$type,$id,$consigneeNameColmn,$title1,$pencilid1)'
                                ></i>
                                $consigneeName
                            </th>
                            <td class='custom-text' id='consigneeAddress$i'
                                onmouseover='showPencil_s($pencilid2)'
                                onmouseout='hidePencil_s($pencilid2)'
                                >
                                <i id='consigneeAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type2,$updateConsignee,$type,$id,$consigneeAddressColmn,$title2,$pencilid2)'
                                ></i>
                                $consigneeAddress
                            </td>
                            <td class='custom-text' id='consigneeLocation$i'
                                onmouseover='showPencil_s($pencilid3)'
                                onmouseout='hidePencil_s($pencilid3)'
                                >
                                <i id='consigneeLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type3,$updateConsignee,$type,$id,$consigneeLocationColmn,$title3,$pencilid3)'
                                ></i>
                                $consigneeLocation
                            </td>
                            <td class='custom-text' id='consigneePostal$i'
                                onmouseover='showPencil_s($pencilid4)'
                                onmouseout='hidePencil_s($pencilid4)'
                                >
                                <i id='consigneePostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type4,$updateConsignee,$type,$id,$consigneePostalColmn,$title4,$pencilid4)'
                                ></i>
                                $consigneePostal
                            </td>
                            <td class='custom-text' id='consigneeContact$i'
                                onmouseover='showPencil_s($pencilid5)'
                                onmouseout='hidePencil_s($pencilid5)'
                                >
                                <i id='consigneeContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type5,$updateConsignee,$type,$id,$consigneeContactColmn,$title5,$pencilid5)'
                                ></i>
                                $consigneeContact
                            </td>
                            <td class='custom-text' id='consigneeEmail$i'
                                onmouseover='showPencil_s($pencilid6)'
                                onmouseout='hidePencil_s($pencilid6)'
                                >
                                <i id='consigneeEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type6,$updateConsignee,$type,$id,$consigneeEmailColmn,$title6,$pencilid6)'
                                ></i>
                                $consigneeEmail
                            </td>
                            <td class='custom-text' id='consigneeTelephone$i'
                                onmouseover='showPencil_s($pencilid7)'
                                onmouseout='hidePencil_s($pencilid7)'
                                >
                                <i id='consigneeTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type7,$updateConsignee,$type,$id,$consigneeTelephoneColmn,$title7,$pencilid7)'
                                ></i>
                                $consigneeTelephone
                            </td>
                            <td class='custom-text' id='consigneeExt$i'
                                onmouseover='showPencil_s($pencilid8)'
                                onmouseout='hidePencil_s($pencilid8)'
                                >
                                <i id='consigneeExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type8,$updateConsignee,$type,$id,$consigneeExtColmn,$title8,$pencilid8)'
                                ></i>
                                $consigneeExt
                            </td>
                            <td class='custom-text' id='consigneeTollFree$i'
                                onmouseover='showPencil_s($pencilid9)'
                                onmouseout='hidePencil_s($pencilid9)'
                                >
                                <i id='consigneeTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type9,$updateConsignee,$type,$id,$consigneeTollFreeColmn,$title9,$pencilid9)'
                                ></i>
                                $consigneeTollFree
                            </td>
                            <td class='custom-text' id='consigneeFax$i'
                                onmouseover='showPencil_s($pencilid10)'
                                onmouseout='hidePencil_s($pencilid10)'
                                >
                                <i id='consigneeFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type10,$updateConsignee,$type,$id,$consigneeFaxColmn,$title10,$pencilid10)'
                                ></i>
                                $consigneeFax
                            </td>
                            <td class='custom-text' id='consigneeShippingHours$i'
                                onmouseover='showPencil_s($pencilid11)'
                                onmouseout='hidePencil_s($pencilid11)'
                                >
                                <i id='consigneeShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type11,$updateConsignee,$type,$id,$consigneeShippingHoursColmn,$title11,$pencilid11)'
                                ></i>
                                $consigneeShippingHours
                            </td>
                            <td class='custom-text' id='consigneeAppointments$i'
                                onmouseover='showPencil_s($pencilid12)'
                                onmouseout='hidePencil_s($pencilid12)'
                                >
                                <i id='consigneeAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type12,$updateConsignee,$type,$id,$consigneeAppointmentsColmn,$title12,$pencilid12)'
                                ></i>
                                $consigneeAppointments
                            </td>
                            <td class='custom-text' id='consigneeIntersaction$i'
                                onmouseover='showPencil_s($pencilid13)'
                                onmouseout='hidePencil_s($pencilid13)'
                                >
                                <i id='consigneeIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type13,$updateConsignee,$type,$id,$consigneeIntersactionColmn,$title13,$pencilid13)'
                                ></i>
                                $consigneeIntersaction
                            </td>
                            <td class='custom-text' id='consigneeStatus$i'
                                onmouseover='showPencil_s($pencilid14)'
                                onmouseout='hidePencil_s($pencilid14)'
                                >
                                <i id='consigneeStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type14,$updateConsignee,$type,$id,$consigneeStatusColmn,$title14,$pencilid14)'
                                ></i>
                                $consigneeStatus
                            </td>
                            <td class='custom-text' id='consigneeNotes$i'
                                onmouseover='showPencil_s($pencilid15)'
                                onmouseout='hidePencil_s($pencilid15)'
                                >
                                <i id='consigneeNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type15,$updateConsignee,$type,$id,$consigneeNotesColmn,$title15,$pencilid15)'
                                ></i>
                                $consigneeNotes
                            </td>
                            <td class='custom-text' id='internalNotes$i'
                                onmouseover='showPencil_s($pencilid16)'
                                onmouseout='hidePencil_s($pencilid16)'
                                >
                                <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type16,$updateConsignee,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                                ></i>
                                $internalNotes
                            </td>";
                    
                        if ($counter == 0) { 
                            echo "<td><a href='#' onclick='deleteConsignee($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                        } else {
                            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                        }
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_consi') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    $i = 0;

    $cursor = $db->consignee->find(array('companyID' => $_SESSION['companyId']));
    foreach ($cursor as $value) {
        $total_records = sizeof($value['consignee']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->consignee->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('consignee' => array('$slice' => [0, 100]))));

    foreach ($show as $row) {
        $show1 = $row['consignee'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $consigneeName = $row1['consigneeName'];
            $consigneeAddress = $row1['consigneeAddress'];
            $consigneeLocation = $row1['consigneeLocation'];
            $consigneePostal = $row1['consigneePostal'];
            $consigneeContact = $row1['consigneeContact'];
            $consigneeEmail = $row1['consigneeEmail'];
            $consigneeTelephone = $row1['consigneeTelephone'];
            $consigneeExt = $row1['consigneeExt'];
            $consigneeTollFree = $row1['consigneeTollFree'];
            $consigneeFax = $row1['consigneeFax'];
            $consigneeShippingHours = $row1['consigneeReceiving'];
            $consigneeAppointments = $row1['consigneeAppointments'];
            $consigneeIntersaction = $row1['consigneeIntersaction'];
            $consigneeStatus = $row1['consigneeStatus'];
            $consigneeNotes = $row1['consigneeRecivingNote'];
            $internalNotes = $row1['consigneeInternalNote'];

            $consigneeNameColmn = '"consigneeName"';
            $consigneeAddressColmn = '"consigneeAddress"';
            $consigneeLocationColmn = '"consigneeLocation"';
            $consigneePostalColmn = '"consigneePostal"';
            $consigneeContactColmn = '"consigneeContact"';
            $consigneeEmailColmn = '"consigneeEmail"';
            $consigneeTelephoneColmn = '"consigneeTelephone"';
            $consigneeExtColmn = '"consigneeExt"';
            $consigneeTollFreeColmn = '"consigneeTollFree"';
            $consigneeFaxColmn = '"consigneeFax"';
            $consigneeShippingHoursColmn = '"consigneeShippingHours"';
            $consigneeAppointmentsColmn = '"consigneeAppointments"';
            $consigneeIntersactionColmn = '"consigneeIntersaction"';
            $consigneeStatusColmn = '"consigneeStatus"';
            $consigneeNotesColmn = '"consigneeNotes"';
            $internalNotesColmn = '"internalNotes"';
            $type = '"text"';
            $i++;
            $start+=1;
            $updateConsignee = '"updateConsignee"';

            $c_type1 = '"'.$consigneeName.'"';
            $c_type2 = '"'.$consigneeAddress.'"';
            $c_type3 = '"'.$consigneeLocation.'"';
            $c_type4 = '"'.$consigneePostal.'"';
            $c_type5 = '"'.$consigneeContact.'"';
            $c_type6 = '"'.$consigneeEmail.'"';
            $c_type7 = '"'.$consigneeTelephone.'"';
            $c_type8 = '"'.$consigneeExt.'"';
            $c_type9 = '"'.$consigneeTollFree.'"';
            $c_type10 = '"'.$consigneeFax.'"';
            $c_type11 = '"'.$consigneeShippingHours.'"';
            $c_type12 = '"'.$consigneeAppointments.'"';
            $c_type13 = '"'.$consigneeIntersaction.'"';
            $c_type14 = '"'.$consigneeStatus.'"';
            $c_type15 = '"'.$consigneeNotes.'"';
            $c_type16 = '"'.$internalNotes.'"';

            $title1 = '"Consignee Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Contact Name"';
            $title6 = '"Contact Email"';
            $title7 = '"Telephone"';
            $title8 = '"Ext"';
            $title9 = '"Toll Free"';
            $title10 = '"Fax"';
            $title11 = '"Receiving Hours"';
            $title12 = '"Appoinments"';
            $title13 = '"Major Intersection / Directions"';
            $title14 = '"Status"';
            $title15 = '"Receiving Notes"';
            $title16 = '"Internal Notes"';

            $pencilid1 = '"consigneeNamePencil'.$i.'"';
            $pencilid2 = '"consigneeAddressPencil'.$i.'"';
            $pencilid3 = '"consigneeLocationPencil'.$i.'"';
            $pencilid4 = '"consigneePostalPencil'.$i.'"';
            $pencilid5 = '"consigneeContactPencil'.$i.'"';
            $pencilid6 = '"consigneeEmailPencil'.$i.'"';
            $pencilid7 = '"consigneeTelephonePencil'.$i.'"';
            $pencilid8 = '"consigneeExtPencil'.$i.'"';
            $pencilid9 = '"consigneeTollFreePencil'.$i.'"';
            $pencilid10 = '"consigneeFaxPencil'.$i.'"';
            $pencilid11 = '"consigneeShippingHoursPencil'.$i.'"';
            $pencilid12 = '"consigneeAppointmentsPencil'.$i.'"';
            $pencilid13 = '"consigneeIntersactionPencil'.$i.'"';
            $pencilid14 = '"consigneeStatusPencil'.$i.'"';
            $pencilid15 = '"consigneeNotesPencil'.$i.'"';
            $pencilid16 = '"internalNotesPencil'.$i.'"';

            echo "<tr>
                    <th>$start</th>
                    <th class='custom-text' id='consigneeName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='consigneeNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateConsignee,$type,$id,$consigneeNameColmn,$title1,$pencilid1)'
                        ></i>
                        $consigneeName
                    </th>
                    <td class='custom-text' id='consigneeAddress$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='consigneeAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateConsignee,$type,$id,$consigneeAddressColmn,$title2,$pencilid2)'
                        ></i>
                        $consigneeAddress
                    </td>
                    <td class='custom-text' id='consigneeLocation$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='consigneeLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateConsignee,$type,$id,$consigneeLocationColmn,$title3,$pencilid3)'
                        ></i>
                        $consigneeLocation
                    </td>
                    <td class='custom-text' id='consigneePostal$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='consigneePostalPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateConsignee,$type,$id,$consigneePostalColmn,$title4,$pencilid4)'
                        ></i>
                        $consigneePostal
                    </td>
                    <td class='custom-text' id='consigneeContact$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='consigneeContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateConsignee,$type,$id,$consigneeContactColmn,$title5,$pencilid5)'
                        ></i>
                        $consigneeContact
                    </td>
                    <td class='custom-text' id='consigneeEmail$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='consigneeEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateConsignee,$type,$id,$consigneeEmailColmn,$title6,$pencilid6)'
                        ></i>
                        $consigneeEmail
                    </td>
                    <td class='custom-text' id='consigneeTelephone$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='consigneeTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateConsignee,$type,$id,$consigneeTelephoneColmn,$title7,$pencilid7)'
                        ></i>
                        $consigneeTelephone
                    </td>
                    <td class='custom-text' id='consigneeExt$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='consigneeExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateConsignee,$type,$id,$consigneeExtColmn,$title8,$pencilid8)'
                        ></i>
                        $consigneeExt
                    </td>
                    <td class='custom-text' id='consigneeTollFree$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='consigneeTollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateConsignee,$type,$id,$consigneeTollFreeColmn,$title9,$pencilid9)'
                        ></i>
                        $consigneeTollFree
                    </td>
                    <td class='custom-text' id='consigneeFax$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='consigneeFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateConsignee,$type,$id,$consigneeFaxColmn,$title10,$pencilid10)'
                        ></i>
                        $consigneeFax
                    </td>
                    <td class='custom-text' id='consigneeShippingHours$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='consigneeShippingHoursPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateConsignee,$type,$id,$consigneeShippingHoursColmn,$title11,$pencilid11)'
                        ></i>
                        $consigneeShippingHours
                    </td>
                    <td class='custom-text' id='consigneeAppointments$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='consigneeAppointmentsPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateConsignee,$type,$id,$consigneeAppointmentsColmn,$title12,$pencilid12)'
                        ></i>
                        $consigneeAppointments
                    </td>
                    <td class='custom-text' id='consigneeIntersaction$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='consigneeIntersactionPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateConsignee,$type,$id,$consigneeIntersactionColmn,$title13,$pencilid13)'
                        ></i>
                        $consigneeIntersaction
                    </td>
                    <td class='custom-text' id='consigneeStatus$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='consigneeStatusPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateConsignee,$type,$id,$consigneeStatusColmn,$title14,$pencilid14)'
                        ></i>
                        $consigneeStatus
                    </td>
                    <td class='custom-text' id='consigneeNotes$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='consigneeNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateConsignee,$type,$id,$consigneeNotesColmn,$title15,$pencilid15)'
                        ></i>
                        $consigneeNotes
                    </td>
                    <td class='custom-text' id='internalNotes$i'
                        onmouseover='showPencil_s($pencilid16)'
                        onmouseout='hidePencil_s($pencilid16)'
                        >
                        <i id='internalNotesPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type16,$updateConsignee,$type,$id,$internalNotesColmn,$title16,$pencilid16)'
                        ></i>
                        $internalNotes
                    </td>";

                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteConsignee($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
        }
    }
}