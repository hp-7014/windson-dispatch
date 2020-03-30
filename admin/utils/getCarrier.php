<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_carrier_table') {
    $limit = 100;
    $cursor = $db->carrier->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['carrier']);
        $total_pages = ceil($total_records / $limit);
    }

    $show_data = $db->carrier->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('carrier' => array('$slice' => [0, $limit]))));

    $i = 0;
    $table = "";
    $list = "";
    foreach ($show_data as $row) {
        $show1 = $row['carrier'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $paymentTerm = $row1['paymentTerms'];
            $factoringCompany = $row1['factoringCompany'];
            $name = $row1['name'];
            $address = $row1['address'];
            $location = $row1['location'];
            $zip = $row1['zip'];
            $contactName = $row1['contactName'];
            $email = $row1['email'];
            $telephone = $row1['telephone'];
            $mc = $row1['mc'];
            $dot = $row1['dot'];
            $taxID = $row1['taxID'];
            
            $type = '"text"';

            $nameColumn = '"name"';
            $addressColumn = '"address"';
            $locationColumn = '"location"';
            $zipColumn = '"zip"';
            $contactNameColumn = '"contactName"';
            $emailColumn = '"email"';
            $telephoneColumn = '"telephone"';
            $mcColumn = '"mc"';
            $dotColumn = '"dot"';
            $taxIDColumn = '"taxID"';

            $i++;
            $updateExternal = '"updateExternal"';
                
            $c_type1 = '"'.$name.'"';
            $c_type2 = '"'.$address.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$zip.'"';
            $c_type5 = '"'.$contactName.'"';
            $c_type6 = '"'.$email.'"';
            $c_type7 = '"'.$taxID.'"';
            $c_type8 = '"'.$telephone.'"';
            $c_type9 = '"'.$mc.'"';
            $c_type10 = '"'.$dot.'"';

            $title1 = '"Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Zip"';
            $title5 = '"Contact Name"';
            $title6 = '"Email"';
            $title7 = '"Tax ID"';
            $title8 = '"Telephone"';
            $title9 = '"M.C #"';
            $title10 = '"D.O.T"';

            $pencilid1 = '"namePencil'.$i.'"';
            $pencilid2 = '"addressPencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"zipPencil'.$i.'"';
            $pencilid5 = '"contactNamePencil'.$i.'"';
            $pencilid6 = '"emailPencil'.$i.'"';
            $pencilid7 = '"taxIDPencil'.$i.'"';
            $pencilid8 = '"telephonePencil'.$i.'"';
            $pencilid9 = '"mcPencil'.$i.'"';
            $pencilid10 = '"dotPencil'.$i.'"';

            echo "<tr>
                    <td> $i</td>
                    <td class='custom-text' id='name$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='namePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateExternal,$type,$id,$nameColumn,$title1,$pencilid1)'
                        ></i>
                        $name
                    </td>
                    <td class='custom-text' id='address$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateExternal,$type,$id,$addressColumn,$title2,$pencilid2)'
                        ></i>
                        $address
                    </td>
                    <td class='custom-text' id='location$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateExternal,$type,$id,$locationColumn,$title3,$pencilid3)'
                        ></i>
                        $location
                    </td>
                    <td class='custom-text' id='zip$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateExternal,$type,$id,$zipColumn,$title4,$pencilid4)'
                        ></i>
                        $zip
                    </td>
                    <td class='custom-text' id='contactName$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='contactNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateExternal,$type,$id,$contactNameColumn,$title5,$pencilid5)'
                        ></i>
                        $contactName
                    </td>
                    <td class='custom-text' id='email$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateExternal,$type,$id,$emailColumn,$title6,$pencilid6)'
                        ></i>
                        $email
                    </td>
                    <td class='custom-text' id='taxID$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateExternal,$type,$id,$taxIDColumn,$title7,$pencilid7)'
                        ></i>
                        $taxID
                    </td>
                    <td class='custom-text' id='telephone$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateExternal,$type,$id,$telephoneColumn,$title8,$pencilid8)'
                        ></i>
                        $telephone
                    </td>
                    <td class='custom-text' id='mc$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='mcPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateExternal,$type,$id,$mcColumn,$title9,$pencilid9)'
                        ></i>
                        $mc
                    </td>
                    <td class='custom-text' id='dot$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateExternal,$type,$id,$dotColumn,$title10,$pencilid10)'
                        ></i>
                        $dot
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteExternal($id,$paymentTerm,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }

                $value = "'".$id.")&nbsp;".$name."'";
                $list .="<option value=$value></option>";
        }
        //echo $table."^".$list;
    }
}

if ($_GET['types'] == 'search_text') {
    $show = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    $table = "";
    $list = "";
    foreach ($show as $row) {
        $show1 = $row['carrier'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['name'] 
                || $_POST['getoption'] == $row1['address'] 
                || $_POST['getoption'] == $row1['location'] 
                || $_POST['getoption'] == $row1['zip'] 
                || $_POST['getoption'] == $row1['contactName']
                || $_POST['getoption'] == $row1['email'] 
                || $_POST['getoption'] == $row1['telephone'] 
                || $_POST['getoption'] == $row1['mc'] 
                || $_POST['getoption'] == $row1['dot'] 
                || $_POST['getoption'] == $row1['taxID'] 
            ) {
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $paymentTerm = $row1['paymentTerms'];
                $factoringCompany = $row1['factoringCompany'];
                $name = $row1['name'];
                $address = $row1['address'];
                $location = $row1['location'];
                $zip = $row1['zip'];
                $contactName = $row1['contactName'];
                $email = $row1['email'];
                $telephone = $row1['telephone'];
                $mc = $row1['mc'];
                $dot = $row1['dot'];
                $taxID = $row1['taxID'];
                
                $type = '"text"';

                $nameColumn = '"name"';
                $addressColumn = '"address"';
                $locationColumn = '"location"';
                $zipColumn = '"zip"';
                $contactNameColumn = '"contactName"';
                $emailColumn = '"email"';
                $telephoneColumn = '"telephone"';
                $mcColumn = '"mc"';
                $dotColumn = '"dot"';
                $taxIDColumn = '"taxID"';

                $i++;
                $updateExternal = '"updateExternal"';
                    
                $c_type1 = '"'.$name.'"';
                $c_type2 = '"'.$address.'"';
                $c_type3 = '"'.$location.'"';
                $c_type4 = '"'.$zip.'"';
                $c_type5 = '"'.$contactName.'"';
                $c_type6 = '"'.$email.'"';
                $c_type7 = '"'.$taxID.'"';
                $c_type8 = '"'.$telephone.'"';
                $c_type9 = '"'.$mc.'"';
                $c_type10 = '"'.$dot.'"';

                $title1 = '"Name"';
                $title2 = '"Address"';
                $title3 = '"Location"';
                $title4 = '"Zip"';
                $title5 = '"Contact Name"';
                $title6 = '"Email"';
                $title7 = '"Tax ID"';
                $title8 = '"Telephone"';
                $title9 = '"M.C #"';
                $title10 = '"D.O.T"';

                $pencilid1 = '"namePencil'.$i.'"';
                $pencilid2 = '"addressPencil'.$i.'"';
                $pencilid3 = '"locationPencil'.$i.'"';
                $pencilid4 = '"zipPencil'.$i.'"';
                $pencilid5 = '"contactNamePencil'.$i.'"';
                $pencilid6 = '"emailPencil'.$i.'"';
                $pencilid7 = '"taxIDPencil'.$i.'"';
                $pencilid8 = '"telephonePencil'.$i.'"';
                $pencilid9 = '"mcPencil'.$i.'"';
                $pencilid10 = '"dotPencil'.$i.'"';

                echo "<tr>
                        <td> $i</td>
                        <td class='custom-text' id='name$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='namePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateExternal,$type,$id,$nameColumn,$title1,$pencilid1)'
                            ></i>
                            $name
                        </td>
                        <td class='custom-text' id='address$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateExternal,$type,$id,$addressColumn,$title2,$pencilid2)'
                            ></i>
                            $address
                        </td>
                        <td class='custom-text' id='location$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateExternal,$type,$id,$locationColumn,$title3,$pencilid3)'
                            ></i>
                            $location
                        </td>
                        <td class='custom-text' id='zip$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateExternal,$type,$id,$zipColumn,$title4,$pencilid4)'
                            ></i>
                            $zip
                        </td>
                        <td class='custom-text' id='contactName$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='contactNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateExternal,$type,$id,$contactNameColumn,$title5,$pencilid5)'
                            ></i>
                            $contactName
                        </td>
                        <td class='custom-text' id='email$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateExternal,$type,$id,$emailColumn,$title6,$pencilid6)'
                            ></i>
                            $email
                        </td>
                        <td class='custom-text' id='taxID$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateExternal,$type,$id,$taxIDColumn,$title7,$pencilid7)'
                            ></i>
                            $taxID
                        </td>
                        <td class='custom-text' id='telephone$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateExternal,$type,$id,$telephoneColumn,$title8,$pencilid8)'
                            ></i>
                            $telephone
                        </td>
                        <td class='custom-text' id='mc$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='mcPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateExternal,$type,$id,$mcColumn,$title9,$pencilid9)'
                            ></i>
                            $mc
                        </td>
                        <td class='custom-text' id='dot$i'
                            onmouseover='showPencil_s($pencilid10)'
                            onmouseout='hidePencil_s($pencilid10)'
                            >
                            <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type10,$updateExternal,$type,$id,$dotColumn,$title10,$pencilid10)'
                            ></i>
                            $dot
                        </td>";

                    if ($counter == 0) {
                        echo "<td><a href='#' onclick='deleteExternal($id,$paymentTerm,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
            }
        }

        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor = $db->carrier->find(array('companyID' => $_SESSION['companyId']));
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['carrier']);
                $total_pages = ceil($total_records / $limit);
            }

            $show_data = $db->carrier->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('carrier' => array('$slice' => [0, $limit]))));

            $i = 0;
            $table = "";
            $list = "";
            foreach ($show_data as $row) {
                $show1 = $row['carrier'];
                foreach ($show1 as $row1) {
                    $counter = $row1['counter'];
                    $id = $row1['_id'];
                    $paymentTerm = $row1['paymentTerms'];
                    $factoringCompany = $row1['factoringCompany'];
                    $name = $row1['name'];
                    $address = $row1['address'];
                    $location = $row1['location'];
                    $zip = $row1['zip'];
                    $contactName = $row1['contactName'];
                    $email = $row1['email'];
                    $telephone = $row1['telephone'];
                    $mc = $row1['mc'];
                    $dot = $row1['dot'];
                    $taxID = $row1['taxID'];
                    
                    $type = '"text"';

                    $nameColumn = '"name"';
                    $addressColumn = '"address"';
                    $locationColumn = '"location"';
                    $zipColumn = '"zip"';
                    $contactNameColumn = '"contactName"';
                    $emailColumn = '"email"';
                    $telephoneColumn = '"telephone"';
                    $mcColumn = '"mc"';
                    $dotColumn = '"dot"';
                    $taxIDColumn = '"taxID"';

                    $i++;
                    $updateExternal = '"updateExternal"';
                        
                    $c_type1 = '"'.$name.'"';
                    $c_type2 = '"'.$address.'"';
                    $c_type3 = '"'.$location.'"';
                    $c_type4 = '"'.$zip.'"';
                    $c_type5 = '"'.$contactName.'"';
                    $c_type6 = '"'.$email.'"';
                    $c_type7 = '"'.$taxID.'"';
                    $c_type8 = '"'.$telephone.'"';
                    $c_type9 = '"'.$mc.'"';
                    $c_type10 = '"'.$dot.'"';

                    $title1 = '"Name"';
                    $title2 = '"Address"';
                    $title3 = '"Location"';
                    $title4 = '"Zip"';
                    $title5 = '"Contact Name"';
                    $title6 = '"Email"';
                    $title7 = '"Tax ID"';
                    $title8 = '"Telephone"';
                    $title9 = '"M.C #"';
                    $title10 = '"D.O.T"';

                    $pencilid1 = '"namePencil'.$i.'"';
                    $pencilid2 = '"addressPencil'.$i.'"';
                    $pencilid3 = '"locationPencil'.$i.'"';
                    $pencilid4 = '"zipPencil'.$i.'"';
                    $pencilid5 = '"contactNamePencil'.$i.'"';
                    $pencilid6 = '"emailPencil'.$i.'"';
                    $pencilid7 = '"taxIDPencil'.$i.'"';
                    $pencilid8 = '"telephonePencil'.$i.'"';
                    $pencilid9 = '"mcPencil'.$i.'"';
                    $pencilid10 = '"dotPencil'.$i.'"';

                    echo "<tr>
                            <td> $i</td>
                            <td class='custom-text' id='name$i'
                                onmouseover='showPencil_s($pencilid1)'
                                onmouseout='hidePencil_s($pencilid1)'
                                >
                                <i id='namePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type1,$updateExternal,$type,$id,$nameColumn,$title1,$pencilid1)'
                                ></i>
                                $name
                            </td>
                            <td class='custom-text' id='address$i'
                                onmouseover='showPencil_s($pencilid2)'
                                onmouseout='hidePencil_s($pencilid2)'
                                >
                                <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type2,$updateExternal,$type,$id,$addressColumn,$title2,$pencilid2)'
                                ></i>
                                $address
                            </td>
                            <td class='custom-text' id='location$i'
                                onmouseover='showPencil_s($pencilid3)'
                                onmouseout='hidePencil_s($pencilid3)'
                                >
                                <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type3,$updateExternal,$type,$id,$locationColumn,$title3,$pencilid3)'
                                ></i>
                                $location
                            </td>
                            <td class='custom-text' id='zip$i'
                                onmouseover='showPencil_s($pencilid4)'
                                onmouseout='hidePencil_s($pencilid4)'
                                >
                                <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type4,$updateExternal,$type,$id,$zipColumn,$title4,$pencilid4)'
                                ></i>
                                $zip
                            </td>
                            <td class='custom-text' id='contactName$i'
                                onmouseover='showPencil_s($pencilid5)'
                                onmouseout='hidePencil_s($pencilid5)'
                                >
                                <i id='contactNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type5,$updateExternal,$type,$id,$contactNameColumn,$title5,$pencilid5)'
                                ></i>
                                $contactName
                            </td>
                            <td class='custom-text' id='email$i'
                                onmouseover='showPencil_s($pencilid6)'
                                onmouseout='hidePencil_s($pencilid6)'
                                >
                                <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type6,$updateExternal,$type,$id,$emailColumn,$title6,$pencilid6)'
                                ></i>
                                $email
                            </td>
                            <td class='custom-text' id='taxID$i'
                                onmouseover='showPencil_s($pencilid7)'
                                onmouseout='hidePencil_s($pencilid7)'
                                >
                                <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type7,$updateExternal,$type,$id,$taxIDColumn,$title7,$pencilid7)'
                                ></i>
                                $taxID
                            </td>
                            <td class='custom-text' id='telephone$i'
                                onmouseover='showPencil_s($pencilid8)'
                                onmouseout='hidePencil_s($pencilid8)'
                                >
                                <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type8,$updateExternal,$type,$id,$telephoneColumn,$title8,$pencilid8)'
                                ></i>
                                $telephone
                            </td>
                            <td class='custom-text' id='mc$i'
                                onmouseover='showPencil_s($pencilid9)'
                                onmouseout='hidePencil_s($pencilid9)'
                                >
                                <i id='mcPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type9,$updateExternal,$type,$id,$mcColumn,$title9,$pencilid9)'
                                ></i>
                                $mc
                            </td>
                            <td class='custom-text' id='dot$i'
                                onmouseover='showPencil_s($pencilid10)'
                                onmouseout='hidePencil_s($pencilid10)'
                                >
                                <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type10,$updateExternal,$type,$id,$dotColumn,$title10,$pencilid10)'
                                ></i>
                                $dot
                            </td>";

                        if ($counter == 0) {
                            echo "<td><a href='#' onclick='deleteExternal($id,$paymentTerm,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                        } else {
                            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                        }
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_extCar') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];

    $cursor = $db->carrier->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['carrier']);
        $total_pages = ceil($total_records / $limit);
    }

    $show_data = $db->carrier->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('carrier' => array('$slice' => [$start, $limit]))));

    $i = 0;
    $table = "";
    $list = "";
    foreach ($show_data as $row) {
        $show1 = $row['carrier'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $paymentTerm = $row1['paymentTerms'];
            $factoringCompany = $row1['factoringCompany'];
            $name = $row1['name'];
            $address = $row1['address'];
            $location = $row1['location'];
            $zip = $row1['zip'];
            $contactName = $row1['contactName'];
            $email = $row1['email'];
            $telephone = $row1['telephone'];
            $mc = $row1['mc'];
            $dot = $row1['dot'];
            $taxID = $row1['taxID'];
            
            $type = '"text"';

            $nameColumn = '"name"';
            $addressColumn = '"address"';
            $locationColumn = '"location"';
            $zipColumn = '"zip"';
            $contactNameColumn = '"contactName"';
            $emailColumn = '"email"';
            $telephoneColumn = '"telephone"';
            $mcColumn = '"mc"';
            $dotColumn = '"dot"';
            $taxIDColumn = '"taxID"';

            $i++;
            $start += 1;
            $updateExternal = '"updateExternal"';
                
            $c_type1 = '"'.$name.'"';
            $c_type2 = '"'.$address.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$zip.'"';
            $c_type5 = '"'.$contactName.'"';
            $c_type6 = '"'.$email.'"';
            $c_type7 = '"'.$taxID.'"';
            $c_type8 = '"'.$telephone.'"';
            $c_type9 = '"'.$mc.'"';
            $c_type10 = '"'.$dot.'"';

            $title1 = '"Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Zip"';
            $title5 = '"Contact Name"';
            $title6 = '"Email"';
            $title7 = '"Tax ID"';
            $title8 = '"Telephone"';
            $title9 = '"M.C #"';
            $title10 = '"D.O.T"';

            $pencilid1 = '"namePencil'.$i.'"';
            $pencilid2 = '"addressPencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"zipPencil'.$i.'"';
            $pencilid5 = '"contactNamePencil'.$i.'"';
            $pencilid6 = '"emailPencil'.$i.'"';
            $pencilid7 = '"taxIDPencil'.$i.'"';
            $pencilid8 = '"telephonePencil'.$i.'"';
            $pencilid9 = '"mcPencil'.$i.'"';
            $pencilid10 = '"dotPencil'.$i.'"';

            echo "<tr>
                    <td> $start</td>
                    <td class='custom-text' id='name$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='namePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateExternal,$type,$id,$nameColumn,$title1,$pencilid1)'
                        ></i>
                        $name
                    </td>
                    <td class='custom-text' id='address$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateExternal,$type,$id,$addressColumn,$title2,$pencilid2)'
                        ></i>
                        $address
                    </td>
                    <td class='custom-text' id='location$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateExternal,$type,$id,$locationColumn,$title3,$pencilid3)'
                        ></i>
                        $location
                    </td>
                    <td class='custom-text' id='zip$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateExternal,$type,$id,$zipColumn,$title4,$pencilid4)'
                        ></i>
                        $zip
                    </td>
                    <td class='custom-text' id='contactName$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='contactNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateExternal,$type,$id,$contactNameColumn,$title5,$pencilid5)'
                        ></i>
                        $contactName
                    </td>
                    <td class='custom-text' id='email$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateExternal,$type,$id,$emailColumn,$title6,$pencilid6)'
                        ></i>
                        $email
                    </td>
                    <td class='custom-text' id='taxID$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateExternal,$type,$id,$taxIDColumn,$title7,$pencilid7)'
                        ></i>
                        $taxID
                    </td>
                    <td class='custom-text' id='telephone$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateExternal,$type,$id,$telephoneColumn,$title8,$pencilid8)'
                        ></i>
                        $telephone
                    </td>
                    <td class='custom-text' id='mc$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='mcPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateExternal,$type,$id,$mcColumn,$title9,$pencilid9)'
                        ></i>
                        $mc
                    </td>
                    <td class='custom-text' id='dot$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='dotPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateExternal,$type,$id,$dotColumn,$title10,$pencilid10)'
                        ></i>
                        $dot
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteExternal($id,$paymentTerm,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
        }
    }
}