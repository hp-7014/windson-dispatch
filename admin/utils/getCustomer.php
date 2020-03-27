<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_customer_table') {
    $limit = 100;
    $cursor = $db->customer->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['customer']);
        $total_pages = ceil($total_records / $limit);
    }

    $show_data = $db->customer->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('customer' => array('$slice' => [0, $limit]))));

    $i = 0;
    $table = "";
    $list = "";
    foreach ($show_data as $row) {
        $show1 = $row['customer'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $currencySetting = $row1['currencySetting'];
            $paymentTerms = $row1['paymentTerms'];
            $factoringCompany = $row1['factoringCompany'];
            $custName = $row1['custName'];
            $custLocation = $row1['custLocation'];
            $custZip = $row1['custZip'];
            $primaryContact = $row1['primaryContact'];
            $custTelephone = $row1['custTelephone'];
            $custEmail = $row1['custEmail'];

            $type = '"text"';
            $custNameColumn = '"custName"';
            $custLocationColumn = '"custLocation"';
            $custZipColumn = '"custZip"';
            $primaryContactColumn = '"primaryContact"';
            $custTelephoneColumn = '"custTelephone"';
            $custEmailColumn = '"custEmail"';

            $i++;
            $updateCustomer = '"updateCustomer"';
            
            $c_type1 = '"'.$custName.'"';
            $c_type2 = '"'.$custLocation.'"';
            $c_type3 = '"'.$custZip.'"';
            $c_type4 = '"'.$primaryContact.'"';
            $c_type5 = '"'.$custTelephone.'"';
            $c_type6 = '"'.$custEmail.'"';

            $title1 = '"Customer Name"';
            $title2 = '"Location"';
            $title3 = '"Zip"';
            $title4 = '"Primary Contact"';
            $title5 = '"Telephone"';
            $title6 = '"Email"';

            $pencilid1 = '"custNamePencil'.$i.'"';
            $pencilid2 = '"custLocationPencil'.$i.'"';
            $pencilid3 = '"custZipPencil'.$i.'"';
            $pencilid4 = '"primaryContactPencil'.$i.'"';
            $pencilid5 = '"custTelephonePencil'.$i.'"';
            $pencilid6 = '"custEmailPencil'.$i.'"';

            echo "<tr>
                    <td>$i</td>
                    <td class='custom-text' id='custName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='custNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateCustomer,$type,$id,$custNameColumn,$title1,$pencilid1)'
                        ></i>
                        $custName
                    </td>
                    <td class='custom-text' id='custLocation$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='custLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateCustomer,$type,$id,$custLocationColumn,$title2,$pencilid2)'
                        ></i>
                        $custLocation
                    </td>
                    <td class='custom-text' id='custZip$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='custZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateCustomer,$type,$id,$custZipColumn,$title3,$pencilid3)'
                        ></i>
                        $custZip
                    </td>
                    <td class='custom-text' id='primaryContact$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateCustomer,$type,$id,$primaryContactColumn,$title4,$pencilid4)'
                        ></i>
                        $primaryContact
                    </td>
                    <td class='custom-text' id='custTelephone$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='custTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateCustomer,$type,$id,$custTelephoneColumn,$title5,$pencilid5)'
                        ></i>
                        $custTelephone
                    </td>
                    <td class='custom-text' id='custEmail$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='custEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateCustomer,$type,$id,$custEmailColumn,$title6,$pencilid6)'
                        ></i>
                        $custEmail
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteCustomer($id,$currencySetting,$paymentTerms,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }

            $value = "'".$id.')&nbsp;'.$custName."'";
            $list .= "<option value=$value></option>";
        }
        //echo $table."^".$list;
    }
}

if ($_GET['types'] == 'search_text') {
    $show = $db->customer->find(array('companyID' => $_SESSION['companyId']));

    $i = 0;
    $table = "";
    $list = "";
    foreach ($show as $row) {
        $show1 = $row['customer'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['custName'] 
                || $_POST['getoption'] == $row1['custLocation'] 
                || $_POST['getoption'] == $row1['custZip'] 
                || $_POST['getoption'] == $row1['primaryContact'] 
                || $_POST['getoption'] == $row1['custTelephone']
                || $_POST['getoption'] == $row1['custEmail'] 
            ) { 
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $currencySetting = $row1['currencySetting'];
                $paymentTerms = $row1['paymentTerms'];
                $factoringCompany = $row1['factoringCompany'];
                $custName = $row1['custName'];
                $custLocation = $row1['custLocation'];
                $custZip = $row1['custZip'];
                $primaryContact = $row1['primaryContact'];
                $custTelephone = $row1['custTelephone'];
                $custEmail = $row1['custEmail'];

                $type = '"text"';

                $custNameColumn = '"custName"';
                $custLocationColumn = '"custLocation"';
                $custZipColumn = '"custZip"';
                $primaryContactColumn = '"primaryContact"';
                $custTelephoneColumn = '"custTelephone"';
                $custEmailColumn = '"custEmail"';

                $i++;
                $updateCustomer = '"updateCustomer"';
                
                $c_type1 = '"'.$custName.'"';
                $c_type2 = '"'.$custLocation.'"';
                $c_type3 = '"'.$custZip.'"';
                $c_type4 = '"'.$primaryContact.'"';
                $c_type5 = '"'.$custTelephone.'"';
                $c_type6 = '"'.$custEmail.'"';

                $title1 = '"Customer Name"';
                $title2 = '"Location"';
                $title3 = '"Zip"';
                $title4 = '"Primary Contact"';
                $title5 = '"Telephone"';
                $title6 = '"Email"';

                $pencilid1 = '"custNamePencil'.$i.'"';
                $pencilid2 = '"custLocationPencil'.$i.'"';
                $pencilid3 = '"custZipPencil'.$i.'"';
                $pencilid4 = '"primaryContactPencil'.$i.'"';
                $pencilid5 = '"custTelephonePencil'.$i.'"';
                $pencilid6 = '"custEmailPencil'.$i.'"';

                echo "<tr>
                        <td>$i</td>
                        <td class='custom-text' id='custName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='custNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateCustomer,$type,$id,$custNameColumn,$title1,$pencilid1)'
                            ></i>
                            $custName
                        </td>
                        <td class='custom-text' id='custLocation$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='custLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateCustomer,$type,$id,$custLocationColumn,$title2,$pencilid2)'
                            ></i>
                            $custLocation
                        </td>
                        <td class='custom-text' id='custZip$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='custZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateCustomer,$type,$id,$custZipColumn,$title3,$pencilid3)'
                            ></i>
                            $custZip
                        </td>
                        <td class='custom-text' id='primaryContact$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateCustomer,$type,$id,$primaryContactColumn,$title4,$pencilid4)'
                            ></i>
                            $primaryContact
                        </td>
                        <td class='custom-text' id='custTelephone$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='custTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateCustomer,$type,$id,$custTelephoneColumn,$title5,$pencilid5)'
                            ></i>
                            $custTelephone
                        </td>
                        <td class='custom-text' id='custEmail$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='custEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateCustomer,$type,$id,$custEmailColumn,$title6,$pencilid6)'
                            ></i>
                            $custEmail
                        </td>";

                    if ($counter == 0) {
                        echo "<td><a href='#' onclick='deleteCustomer($id,$currencySetting,$paymentTerms,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
            }
        }

        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor = $db->customer->find(array('companyID' => $_SESSION['companyId']));
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['customer']);
                $total_pages = ceil($total_records / $limit);
            }

            $show_data = $db->customer->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('customer' => array('$slice' => [0, $limit]))));
            
            $i = 0;
            $table = "";
            $list = "";
            foreach ($show_data as $row) {
                $show1 = $row['customer'];
                foreach ($show1 as $row1) { 
                    $counter = $row1['counter'];
                    $id = $row1['_id'];
                    $currencySetting = $row1['currencySetting'];
                    $paymentTerms = $row1['paymentTerms'];
                    $factoringCompany = $row1['factoringCompany'];
                    $custName = $row1['custName'];
                    $custLocation = $row1['custLocation'];
                    $custZip = $row1['custZip'];
                    $primaryContact = $row1['primaryContact'];
                    $custTelephone = $row1['custTelephone'];
                    $custEmail = $row1['custEmail'];

                    $type = '"text"';

                    $custNameColumn = '"custName"';
                    $custLocationColumn = '"custLocation"';
                    $custZipColumn = '"custZip"';
                    $primaryContactColumn = '"primaryContact"';
                    $custTelephoneColumn = '"custTelephone"';
                    $custEmailColumn = '"custEmail"';

                    $i++;
                    $updateCustomer = '"updateCustomer"';
                    
                    $c_type1 = '"'.$custName.'"';
                    $c_type2 = '"'.$custLocation.'"';
                    $c_type3 = '"'.$custZip.'"';
                    $c_type4 = '"'.$primaryContact.'"';
                    $c_type5 = '"'.$custTelephone.'"';
                    $c_type6 = '"'.$custEmail.'"';

                    $title1 = '"Customer Name"';
                    $title2 = '"Location"';
                    $title3 = '"Zip"';
                    $title4 = '"Primary Contact"';
                    $title5 = '"Telephone"';
                    $title6 = '"Email"';

                    $pencilid1 = '"custNamePencil'.$i.'"';
                    $pencilid2 = '"custLocationPencil'.$i.'"';
                    $pencilid3 = '"custZipPencil'.$i.'"';
                    $pencilid4 = '"primaryContactPencil'.$i.'"';
                    $pencilid5 = '"custTelephonePencil'.$i.'"';
                    $pencilid6 = '"custEmailPencil'.$i.'"';

                    echo "<tr>
                            <td>$i</td>
                            <td class='custom-text' id='custName$i'
                                onmouseover='showPencil_s($pencilid1)'
                                onmouseout='hidePencil_s($pencilid1)'
                                >
                                <i id='custNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type1,$updateCustomer,$type,$id,$custNameColumn,$title1,$pencilid1)'
                                ></i>
                                $custName
                            </td>
                            <td class='custom-text' id='custLocation$i'
                                onmouseover='showPencil_s($pencilid2)'
                                onmouseout='hidePencil_s($pencilid2)'
                                >
                                <i id='custLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type2,$updateCustomer,$type,$id,$custLocationColumn,$title2,$pencilid2)'
                                ></i>
                                $custLocation
                            </td>
                            <td class='custom-text' id='custZip$i'
                                onmouseover='showPencil_s($pencilid3)'
                                onmouseout='hidePencil_s($pencilid3)'
                                >
                                <i id='custZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type3,$updateCustomer,$type,$id,$custZipColumn,$title3,$pencilid3)'
                                ></i>
                                $custZip
                            </td>
                            <td class='custom-text' id='primaryContact$i'
                                onmouseover='showPencil_s($pencilid4)'
                                onmouseout='hidePencil_s($pencilid4)'
                                >
                                <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type4,$updateCustomer,$type,$id,$primaryContactColumn,$title4,$pencilid4)'
                                ></i>
                                $primaryContact
                            </td>
                            <td class='custom-text' id='custTelephone$i'
                                onmouseover='showPencil_s($pencilid5)'
                                onmouseout='hidePencil_s($pencilid5)'
                                >
                                <i id='custTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type5,$updateCustomer,$type,$id,$custTelephoneColumn,$title5,$pencilid5)'
                                ></i>
                                $custTelephone
                            </td>
                            <td class='custom-text' id='custEmail$i'
                                onmouseover='showPencil_s($pencilid6)'
                                onmouseout='hidePencil_s($pencilid6)'
                                >
                                <i id='custEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type6,$updateCustomer,$type,$id,$custEmailColumn,$title6,$pencilid6)'
                                ></i>
                                $custEmail
                            </td>";

                        if ($counter == 0) {
                            echo "<td><a href='#' onclick='deleteCustomer($id,$currencySetting,$paymentTerms,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                        } else {
                            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                        }
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_cust') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];

    $cursor = $db->customer->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['customer']);
        $total_pages = ceil($total_records / $limit);
    }

    $show_data = $db->customer->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('customer' => array('$slice' => [$start, $limit]))));

    $i = 0;
    $table = "";
    $list = "";
    foreach ($show_data as $row) {
        $show1 = $row['customer'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $currencySetting = $row1['currencySetting'];
            $paymentTerms = $row1['paymentTerms'];
            $factoringCompany = $row1['factoringCompany'];
            $custName = $row1['custName'];
            $custLocation = $row1['custLocation'];
            $custZip = $row1['custZip'];
            $primaryContact = $row1['primaryContact'];
            $custTelephone = $row1['custTelephone'];
            $custEmail = $row1['custEmail'];

            $type = '"text"';

            $custNameColumn = '"custName"';
            $custLocationColumn = '"custLocation"';
            $custZipColumn = '"custZip"';
            $primaryContactColumn = '"primaryContact"';
            $custTelephoneColumn = '"custTelephone"';
            $custEmailColumn = '"custEmail"';

            $i++;
            $start += 1;
            $updateCustomer = '"updateCustomer"';
            
            $c_type1 = '"'.$custName.'"';
            $c_type2 = '"'.$custLocation.'"';
            $c_type3 = '"'.$custZip.'"';
            $c_type4 = '"'.$primaryContact.'"';
            $c_type5 = '"'.$custTelephone.'"';
            $c_type6 = '"'.$custEmail.'"';

            $title1 = '"Customer Name"';
            $title2 = '"Location"';
            $title3 = '"Zip"';
            $title4 = '"Primary Contact"';
            $title5 = '"Telephone"';
            $title6 = '"Email"';

            $pencilid1 = '"custNamePencil'.$i.'"';
            $pencilid2 = '"custLocationPencil'.$i.'"';
            $pencilid3 = '"custZipPencil'.$i.'"';
            $pencilid4 = '"primaryContactPencil'.$i.'"';
            $pencilid5 = '"custTelephonePencil'.$i.'"';
            $pencilid6 = '"custEmailPencil'.$i.'"';

            echo "<tr>
                    <td>$start</td>
                    <td class='custom-text' id='custName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='custNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateCustomer,$type,$id,$custNameColumn,$title1,$pencilid1)'
                        ></i>
                        $custName
                    </td>
                    <td class='custom-text' id='custLocation$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='custLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateCustomer,$type,$id,$custLocationColumn,$title2,$pencilid2)'
                        ></i>
                        $custLocation
                    </td>
                    <td class='custom-text' id='custZip$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='custZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateCustomer,$type,$id,$custZipColumn,$title3,$pencilid3)'
                        ></i>
                        $custZip
                    </td>
                    <td class='custom-text' id='primaryContact$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateCustomer,$type,$id,$primaryContactColumn,$title4,$pencilid4)'
                        ></i>
                        $primaryContact
                    </td>
                    <td class='custom-text' id='custTelephone$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='custTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateCustomer,$type,$id,$custTelephoneColumn,$title5,$pencilid5)'
                        ></i>
                        $custTelephone
                    </td>
                    <td class='custom-text' id='custEmail$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='custEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateCustomer,$type,$id,$custEmailColumn,$title6,$pencilid6)'
                        ></i>
                        $custEmail
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteCustomer($id,$currencySetting,$paymentTerms,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
        }
    }
}