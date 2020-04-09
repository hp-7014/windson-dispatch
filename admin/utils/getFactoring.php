<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_factoring_table') {
    $i = 0;
    $limit = 100;
    $cursor = $db->factoring_company_add->find(array('companyID' => $_SESSION['companyId']));
                                    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['factoring']);
        $total_pages = ceil($total_records / $limit);
    }

    $collection = $db->factoring_company_add;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'currency_add',
            'localField' => 'companyID', 
            'foreignField' => 'companyID',
            'as' => 'currency_1'
        ]],
        ['$lookup' => [
            'from' => 'payment_terms',
            'localField' => 'companyID', 
            'foreignField' => 'companyID',
            'as' => 'payment_1'
        ]],
        ['$match'=>['companyID' => $_SESSION['companyId']]],
        ['$project'=>['companyID'=>$_SESSION['companyId'],'factoring'=>['$slice'=>['$factoring',0,$limit]],'payment_1'=>1,'currency_1'=>1]]
    ]);

    foreach ($show1 as $row) {
        $factoring = $row['factoring'];
        $currency_1 = $row['currency_1'];
        $payment_1 = $row['payment_1'];
    
        foreach ($currency_1 as $row2) {
            $currency = $row2['currency'];
            $currencyType = array();
            foreach ($currency as $row3) {
                $currencyid = $row3['_id'];
                $currencyType[$currencyid] = $row3['currencyType'];
            }
        }
    
        foreach ($payment_1 as $row4) {
            $payment = $row4['payment'];
            $paymentTerm = array();
            foreach ($payment as $row_5) {
                $paymentid = $row_5['_id'];
                $paymentTerm[$paymentid] = $row_5['paymentTerm'];  
            }
        }
    
        foreach ($factoring as $row5) {
            $id = $row5['_id'];
            $counter = $row5['counter'];
            $currencyid = $row5['currencySetting'];
            $paymentid = $row5['paymentTerms'];
            $factoringCompanyname = $row5['factoringCompanyname'];
            $address = $row5['address'];
            $location = $row5['location'];
            $zip = $row5['zip'];
            $primaryContact = $row5['primaryContact'];
            $telephone = $row5['telephone'];
            $extFactoring = $row5['extFactoring'];
            $fax = $row5['fax'];
            $tollFree = $row5['tollFree'];
            $email = $row5['email'];
            $secondaryContact = $row5['secondaryContact'];
            $factoringtelephone = $row5['factoringtelephone'];
            $ext = $row5['ext'];
            $currencySetting = $currencyType[$row5['currencySetting']];
            $paymentTerms = $paymentTerm[$row5['paymentTerms']];
            $taxID = $row5['taxID'];
            $internalNote = $row5['internalNote'];

            $table = "";
            $factoringCompanynamecolumn = '"factoringCompanyname"';
            $addresscolumn = '"address"';
            $locationcolumn = '"location"';
            $zipcolumn = '"zip"';
            $primaryContactcolumn = '"primaryContact"';
            $telephonecolumn = '"telephone"';
            $extFactoringcolumn = '"extFactoring"';
            $faxcolumn = '"fax"';
            $tollFreecolumn = '"tollFree"';
            $emailcolumn = '"email"';
            $secondaryContactcolumn = '"secondaryContact"';
            $factoringtelephonecolumn = '"factoringtelephone"';
            $extcolumn = '"ext"';
            $currencySettingcolumn = '"currencySetting"';
            $paymentTermscolumn = '"paymentTerms"';
            $taxIDcolumn = '"taxID"';
            $internalNotecolumn = '"internalNote"';
            $type = '"text"';
            $list = "<option value='0'>--Select--</option>";
            $list1 = "<option value='0'>--Select--</option>";
            $i++;
            $updateFactoring = '"updateFactoring"';

            $c_type1 = '"'.$factoringCompanyname.'"';
            $c_type2 = '"'.$address.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$zip.'"';
            $c_type5 = '"'.$primaryContact.'"';
            $c_type6 = '"'.$telephone.'"';
            $c_type7 = '"'.$extFactoring.'"';
            $c_type8 = '"'.$fax.'"';
            $c_type9 = '"'.$tollFree.'"';
            $c_type10 = '"'.$email.'"';
            $c_type11 = '"'.$secondaryContact.'"';
            $c_type12 = '"'.$factoringtelephone.'"';
            $c_type13 = '"'.$ext.'"';
            $c_type14 = '"'.$taxID.'"';
            $c_type15 = '"'.$internalNote.'"';

            $title1 = '"Factoring Company Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Primary contact"';
            $title6 = '"Telephone"';
            $title7 = '"Ext Fact"';
            $title8 = '"Fax"';
            $title9 = '"Toll Free"';
            $title10 = '"Conatact Email"';
            $title11 = '"Secondary Contact"';
            $title12 = '"Fact Telephone"';
            $title13 = '"Ext"';
            $title14 = '"Tax ID"';
            $title15 = '"Internal Notes"';

            $pencilid1 = '"factoringCompanynamePencil'.$i.'"';
            $pencilid2 = '"addressPencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"zipPencil'.$i.'"';
            $pencilid5 = '"primaryContactPencil'.$i.'"';
            $pencilid6 = '"telephonePencil'.$i.'"';
            $pencilid7 = '"extFactoringPencil'.$i.'"';
            $pencilid8 = '"faxPencil'.$i.'"';
            $pencilid9 = '"tollFreePencil'.$i.'"';
            $pencilid10 = '"emailPencil'.$i.'"';
            $pencilid11 = '"secondaryContactPencil'.$i.'"';
            $pencilid12 = '"factoringtelephonePencil'.$i.'"';
            $pencilid13 = '"extPencil'.$i.'"';
            $pencilid14 = '"taxIDPencil'.$i.'"';
            $pencilid15 = '"internalNotePencil'.$i.'"';

            echo "<tr>
                <th>$i</th>
                <th class='custom-text' id='factoringCompanyname$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='factoringCompanynamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateFactoring,$type,$id,$factoringCompanynamecolumn,$title1,$pencilid1)'
                    ></i>
                    $factoringCompanyname
                </th>
                <td class='custom-text' id='address$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateFactoring,$type,$id,$addresscolumn,$title2,$pencilid2)'
                    ></i>
                    $address
                </td>
                <td class='custom-text' id='location$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateFactoring,$type,$id,$locationcolumn,$title3,$pencilid3)'
                    ></i>
                    $location
                </td>
                <td class='custom-text' id='zip$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateFactoring,$type,$id,$zipcolumn,$title4,$pencilid4)'
                    ></i>
                    $zip
                </td>
                <td class='custom-text' id='primaryContact$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateFactoring,$type,$id,$primaryContactcolumn,$title5,$pencilid5)'
                    ></i>
                    $primaryContact
                </td>
                <td class='custom-text' id='telephone$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateFactoring,$type,$id,$telephonecolumn,$title6,$pencilid6)'
                    ></i>
                    $telephone
                </td>
                <td class='custom-text' id='extFactoring$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='extFactoringPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateFactoring,$type,$id,$extFactoringcolumn,$title7,$pencilid7)'
                    ></i>
                    $extFactoring
                </td>
                <td class='custom-text' id='fax$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateFactoring,$type,$id,$faxcolumn,$title8,$pencilid8)'
                    ></i>
                    $fax
                </td>
                <td class='custom-text' id='tollFree$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='tollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateFactoring,$type,$id,$tollFreecolumn,$title9,$pencilid9)'
                    ></i>
                    $tollFree
                </td>
                <td class='custom-text' id='email$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateFactoring,$type,$id,$emailcolumn,$title10,$pencilid10)'
                    ></i>
                    $email
                </td>
                <td class='custom-text' id='secondaryContact$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='secondaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateFactoring,$type,$id,$secondaryContactcolumn,$title11,$pencilid11)'
                    ></i>
                    $secondaryContact
                </td>
                <td class='custom-text' id='factoringtelephone$i'
                    onmouseover='showPencil_s($pencilid12)'
                    onmouseout='hidePencil_s($pencilid12)'
                    >
                    <i id='factoringtelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type12,$updateFactoring,$type,$id,$factoringtelephonecolumn,$title12,$pencilid12)'
                    ></i>
                    $factoringtelephone
                </td>
                <td class='custom-text' id='ext$i'
                    onmouseover='showPencil_s($pencilid13)'
                    onmouseout='hidePencil_s($pencilid13)'
                    >
                    <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type13,$updateFactoring,$type,$id,$extcolumn,$title13,$pencilid13)'
                    ></i>
                    $ext
                </td>
                <td class='custom-text'>
                    $currencySetting
                </td>
                <td class='custom-text'>
                    $paymentTerms
                </td>
                <td class='custom-text' id='taxID$i'
                    onmouseover='showPencil_s($pencilid14)'
                    onmouseout='hidePencil_s($pencilid14)'
                    >
                    <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type14,$updateFactoring,$type,$id,$taxIDcolumn,$title14,$pencilid14)'
                    ></i>
                    $taxID
                </td>
                <td class='custom-text' id='internalNote$i'
                    onmouseover='showPencil_s($pencilid15)'
                    onmouseout='hidePencil_s($pencilid15)'
                    >
                    <i id='internalNotePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type15,$updateFactoring,$type,$id,$internalNotecolumn,$title15,$pencilid15)'
                    ></i>
                    $internalNote
                </td>";

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deletefactoring($id,$currencyid,$paymentid)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
            
        }
        //echo $table."^".$list."^".$list1;
    }
}

if ($_GET['types'] == 'search_text') {
    $i = 0;
    $limit = 100;
    $collection = $db->factoring_company_add;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'currency_add',
            'localField' => 'companyID', 
            'foreignField' => 'companyID',
            'as' => 'currency_1'
        ]],
        ['$lookup' => [
            'from' => 'payment_terms',
            'localField' => 'companyID', 
            'foreignField' => 'companyID',
            'as' => 'payment_1'
        ]],
        ['$match'=>['companyID' => $_SESSION['companyId']]],
        ['$project'=>['companyID'=>$_SESSION['companyId'],'factoring'=>['$slice'=>['$factoring',0,$limit]],'payment_1'=>1,'currency_1'=>1]]
    ]);

    foreach ($show1 as $row) {
        $factoring = $row['factoring'];
        $currency_1 = $row['currency_1'];
        $payment_1 = $row['payment_1'];
    
        foreach ($currency_1 as $row2) {
            $currency = $row2['currency'];
            $currencyType = array();
            foreach ($currency as $row3) {
                $currencyid = $row3['_id'];
                $currencyType[$currencyid] = $row3['currencyType'];
            }
        }
    
        foreach ($payment_1 as $row4) {
            $payment = $row4['payment'];
            $paymentTerm = array();
            foreach ($payment as $row_5) {
                $paymentid = $row_5['_id'];
                $paymentTerm[$paymentid] = $row_5['paymentTerm'];  
            }
        }
        
        foreach ($factoring as $row5) {
            $id = $row5['_id'];
            $counter = $row5['counter'];
            $currencyid = $row5['currencySetting'];
            $paymentid = $row5['paymentTerms'];
            $factoringCompanyname = $row5['factoringCompanyname'];
            $address = $row5['address'];
            $location = $row5['location'];
            $zip = $row5['zip'];
            $primaryContact = $row5['primaryContact'];
            $telephone = $row5['telephone'];
            $extFactoring = $row5['extFactoring'];
            $fax = $row5['fax'];
            $tollFree = $row5['tollFree'];
            $email = $row5['email'];
            $secondaryContact = $row5['secondaryContact'];
            $factoringtelephone = $row5['factoringtelephone'];
            $ext = $row5['ext'];
            $currencySetting = $currencyType[$row5['currencySetting']];
            $paymentTerms = $paymentTerm[$row5['paymentTerms']];
            $taxID = $row5['taxID'];
            $internalNote = $row5['internalNote'];

            $table = "";
            $factoringCompanynamecolumn = '"factoringCompanyname"';
            $addresscolumn = '"address"';
            $locationcolumn = '"location"';
            $zipcolumn = '"zip"';
            $primaryContactcolumn = '"primaryContact"';
            $telephonecolumn = '"telephone"';
            $extFactoringcolumn = '"extFactoring"';
            $faxcolumn = '"fax"';
            $tollFreecolumn = '"tollFree"';
            $emailcolumn = '"email"';
            $secondaryContactcolumn = '"secondaryContact"';
            $factoringtelephonecolumn = '"factoringtelephone"';
            $extcolumn = '"ext"';
            $currencySettingcolumn = '"currencySetting"';
            $paymentTermscolumn = '"paymentTerms"';
            $taxIDcolumn = '"taxID"';
            $internalNotecolumn = '"internalNote"';
            $type = '"text"';
            $list = "<option value='0'>--Select--</option>";
            $list1 = "<option value='0'>--Select--</option>";
            $i++;
            $updateFactoring = '"updateFactoring"';

            $c_type1 = '"'.$factoringCompanyname.'"';
            $c_type2 = '"'.$address.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$zip.'"';
            $c_type5 = '"'.$primaryContact.'"';
            $c_type6 = '"'.$telephone.'"';
            $c_type7 = '"'.$extFactoring.'"';
            $c_type8 = '"'.$fax.'"';
            $c_type9 = '"'.$tollFree.'"';
            $c_type10 = '"'.$email.'"';
            $c_type11 = '"'.$secondaryContact.'"';
            $c_type12 = '"'.$factoringtelephone.'"';
            $c_type13 = '"'.$ext.'"';
            $c_type14 = '"'.$taxID.'"';
            $c_type15 = '"'.$internalNote.'"';

            $title1 = '"Factoring Company Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Primary contact"';
            $title6 = '"Telephone"';
            $title7 = '"Ext Fact"';
            $title8 = '"Fax"';
            $title9 = '"Toll Free"';
            $title10 = '"Conatact Email"';
            $title11 = '"Secondary Contact"';
            $title12 = '"Fact Telephone"';
            $title13 = '"Ext"';
            $title14 = '"Tax ID"';
            $title15 = '"Internal Notes"';

            $pencilid1 = '"factoringCompanynamePencil'.$i.'"';
            $pencilid2 = '"addressPencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"zipPencil'.$i.'"';
            $pencilid5 = '"primaryContactPencil'.$i.'"';
            $pencilid6 = '"telephonePencil'.$i.'"';
            $pencilid7 = '"extFactoringPencil'.$i.'"';
            $pencilid8 = '"faxPencil'.$i.'"';
            $pencilid9 = '"tollFreePencil'.$i.'"';
            $pencilid10 = '"emailPencil'.$i.'"';
            $pencilid11 = '"secondaryContactPencil'.$i.'"';
            $pencilid12 = '"factoringtelephonePencil'.$i.'"';
            $pencilid13 = '"extPencil'.$i.'"';
            $pencilid14 = '"taxIDPencil'.$i.'"';
            $pencilid15 = '"internalNotePencil'.$i.'"';

            if ($_POST['getoption'] == $row5['factoringCompanyname'] 
                || $_POST['getoption'] == $row5['address']
                || $_POST['getoption'] == $row5['location']
                || $_POST['getoption'] == $row5['zip']
                || $_POST['getoption'] == $row5['primaryContact']
                || $_POST['getoption'] == $row5['telephone']
                || $_POST['getoption'] == $row5['extFactoring']
                || $_POST['getoption'] == $row5['fax']
                || $_POST['getoption'] == $row5['tollFree']
                || $_POST['getoption'] == $row5['email']
                || $_POST['getoption'] == $row5['secondaryContact']
                || $_POST['getoption'] == $row5['factoringtelephone']
                || $_POST['getoption'] == $row5['ext']
                || $_POST['getoption'] == $row5['taxID']
                || $_POST['getoption'] == $row5['internalNote']
                || $_POST['getoption'] == $currencySetting
                || $_POST['getoption'] == $paymentTerms
            ) {
                echo "<tr>
                    <th>$i</th>
                    <th class='custom-text' id='factoringCompanyname$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='factoringCompanynamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateFactoring,$type,$id,$factoringCompanynamecolumn,$title1,$pencilid1)'
                        ></i>
                        $factoringCompanyname
                    </th>
                    <td class='custom-text' id='address$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateFactoring,$type,$id,$addresscolumn,$title2,$pencilid2)'
                        ></i>
                        $address
                    </td>
                    <td class='custom-text' id='location$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateFactoring,$type,$id,$locationcolumn,$title3,$pencilid3)'
                        ></i>
                        $location
                    </td>
                    <td class='custom-text' id='zip$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateFactoring,$type,$id,$zipcolumn,$title4,$pencilid4)'
                        ></i>
                        $zip
                    </td>
                    <td class='custom-text' id='primaryContact$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateFactoring,$type,$id,$primaryContactcolumn,$title5,$pencilid5)'
                        ></i>
                        $primaryContact
                    </td>
                    <td class='custom-text' id='telephone$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateFactoring,$type,$id,$telephonecolumn,$title6,$pencilid6)'
                        ></i>
                        $telephone
                    </td>
                    <td class='custom-text' id='extFactoring$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='extFactoringPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateFactoring,$type,$id,$extFactoringcolumn,$title7,$pencilid7)'
                        ></i>
                        $extFactoring
                    </td>
                    <td class='custom-text' id='fax$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateFactoring,$type,$id,$faxcolumn,$title8,$pencilid8)'
                        ></i>
                        $fax
                    </td>
                    <td class='custom-text' id='tollFree$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='tollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateFactoring,$type,$id,$tollFreecolumn,$title9,$pencilid9)'
                        ></i>
                        $tollFree
                    </td>
                    <td class='custom-text' id='email$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateFactoring,$type,$id,$emailcolumn,$title10,$pencilid10)'
                        ></i>
                        $email
                    </td>
                    <td class='custom-text' id='secondaryContact$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='secondaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateFactoring,$type,$id,$secondaryContactcolumn,$title11,$pencilid11)'
                        ></i>
                        $secondaryContact
                    </td>
                    <td class='custom-text' id='factoringtelephone$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='factoringtelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateFactoring,$type,$id,$factoringtelephonecolumn,$title12,$pencilid12)'
                        ></i>
                        $factoringtelephone
                    </td>
                    <td class='custom-text' id='ext$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateFactoring,$type,$id,$extcolumn,$title13,$pencilid13)'
                        ></i>
                        $ext
                    </td>
                    <td class='custom-text'>
                        $currencySetting
                    </td>
                    <td class='custom-text'>
                        $paymentTerms
                    </td>
                    <td class='custom-text' id='taxID$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateFactoring,$type,$id,$taxIDcolumn,$title14,$pencilid14)'
                        ></i>
                        $taxID
                    </td>
                    <td class='custom-text' id='internalNote$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='internalNotePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateFactoring,$type,$id,$internalNotecolumn,$title15,$pencilid15)'
                        ></i>
                        $internalNote
                    </td>";

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deletefactoring($id,$currencyid,$paymentid)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
            }
        }
    }

    if ($_POST['getoption'] == "") {
        $i = 0;
        $limit = 100;
        $collection = $db->factoring_company_add;
        $show1 = $collection->aggregate([
            ['$lookup' => [
                'from' => 'currency_add',
                'localField' => 'companyID', 
                'foreignField' => 'companyID',
                'as' => 'currency_1'
            ]],
            ['$lookup' => [
                'from' => 'payment_terms',
                'localField' => 'companyID', 
                'foreignField' => 'companyID',
                'as' => 'payment_1'
            ]],
            ['$match'=>['companyID' => $_SESSION['companyId']]],
            ['$project'=>['companyID'=>$_SESSION['companyId'],'factoring'=>['$slice'=>['$factoring',0,$limit]],'payment_1'=>1,'currency_1'=>1]]
        ]);

        foreach ($show1 as $row) {
            $factoring = $row['factoring'];
            $currency_1 = $row['currency_1'];
            $payment_1 = $row['payment_1'];
        
            foreach ($currency_1 as $row2) {
                $currency = $row2['currency'];
                $currencyType = array();
                foreach ($currency as $row3) {
                    $currencyid = $row3['_id'];
                    $currencyType[$currencyid] = $row3['currencyType'];
                }
            }
        
            foreach ($payment_1 as $row4) {
                $payment = $row4['payment'];
                $paymentTerm = array();
                foreach ($payment as $row_5) {
                    $paymentid = $row_5['_id'];
                    $paymentTerm[$paymentid] = $row_5['paymentTerm'];  
                }
            }
            
            foreach ($factoring as $row5) {
                $id = $row5['_id'];
                $counter = $row5['counter'];
                $currencyid = $row5['currencySetting'];
                $paymentid = $row5['paymentTerms'];
                $factoringCompanyname = $row5['factoringCompanyname'];
                $address = $row5['address'];
                $location = $row5['location'];
                $zip = $row5['zip'];
                $primaryContact = $row5['primaryContact'];
                $telephone = $row5['telephone'];
                $extFactoring = $row5['extFactoring'];
                $fax = $row5['fax'];
                $tollFree = $row5['tollFree'];
                $email = $row5['email'];
                $secondaryContact = $row5['secondaryContact'];
                $factoringtelephone = $row5['factoringtelephone'];
                $ext = $row5['ext'];
                $currencySetting = $currencyType[$row5['currencySetting']];
                $paymentTerms = $paymentTerm[$row5['paymentTerms']];
                $taxID = $row5['taxID'];
                $internalNote = $row5['internalNote'];

                $table = "";
                $factoringCompanynamecolumn = '"factoringCompanyname"';
                $addresscolumn = '"address"';
                $locationcolumn = '"location"';
                $zipcolumn = '"zip"';
                $primaryContactcolumn = '"primaryContact"';
                $telephonecolumn = '"telephone"';
                $extFactoringcolumn = '"extFactoring"';
                $faxcolumn = '"fax"';
                $tollFreecolumn = '"tollFree"';
                $emailcolumn = '"email"';
                $secondaryContactcolumn = '"secondaryContact"';
                $factoringtelephonecolumn = '"factoringtelephone"';
                $extcolumn = '"ext"';
                $currencySettingcolumn = '"currencySetting"';
                $paymentTermscolumn = '"paymentTerms"';
                $taxIDcolumn = '"taxID"';
                $internalNotecolumn = '"internalNote"';
                $type = '"text"';
                $list = "<option value='0'>--Select--</option>";
                $list1 = "<option value='0'>--Select--</option>";
                $i++;
                $updateFactoring = '"updateFactoring"';

                $c_type1 = '"'.$factoringCompanyname.'"';
                $c_type2 = '"'.$address.'"';
                $c_type3 = '"'.$location.'"';
                $c_type4 = '"'.$zip.'"';
                $c_type5 = '"'.$primaryContact.'"';
                $c_type6 = '"'.$telephone.'"';
                $c_type7 = '"'.$extFactoring.'"';
                $c_type8 = '"'.$fax.'"';
                $c_type9 = '"'.$tollFree.'"';
                $c_type10 = '"'.$email.'"';
                $c_type11 = '"'.$secondaryContact.'"';
                $c_type12 = '"'.$factoringtelephone.'"';
                $c_type13 = '"'.$ext.'"';
                $c_type14 = '"'.$taxID.'"';
                $c_type15 = '"'.$internalNote.'"';

                $title1 = '"Factoring Company Name"';
                $title2 = '"Address"';
                $title3 = '"Location"';
                $title4 = '"Postal / Zip"';
                $title5 = '"Primary contact"';
                $title6 = '"Telephone"';
                $title7 = '"Ext Fact"';
                $title8 = '"Fax"';
                $title9 = '"Toll Free"';
                $title10 = '"Conatact Email"';
                $title11 = '"Secondary Contact"';
                $title12 = '"Fact Telephone"';
                $title13 = '"Ext"';
                $title14 = '"Tax ID"';
                $title15 = '"Internal Notes"';

                $pencilid1 = '"factoringCompanynamePencil'.$i.'"';
                $pencilid2 = '"addressPencil'.$i.'"';
                $pencilid3 = '"locationPencil'.$i.'"';
                $pencilid4 = '"zipPencil'.$i.'"';
                $pencilid5 = '"primaryContactPencil'.$i.'"';
                $pencilid6 = '"telephonePencil'.$i.'"';
                $pencilid7 = '"extFactoringPencil'.$i.'"';
                $pencilid8 = '"faxPencil'.$i.'"';
                $pencilid9 = '"tollFreePencil'.$i.'"';
                $pencilid10 = '"emailPencil'.$i.'"';
                $pencilid11 = '"secondaryContactPencil'.$i.'"';
                $pencilid12 = '"factoringtelephonePencil'.$i.'"';
                $pencilid13 = '"extPencil'.$i.'"';
                $pencilid14 = '"taxIDPencil'.$i.'"';
                $pencilid15 = '"internalNotePencil'.$i.'"';

                echo "<tr>
                    <th>$i</th>
                    <th class='custom-text' id='factoringCompanyname$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='factoringCompanynamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateFactoring,$type,$id,$factoringCompanynamecolumn,$title1,$pencilid1)'
                        ></i>
                        $factoringCompanyname
                    </th>
                    <td class='custom-text' id='address$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateFactoring,$type,$id,$addresscolumn,$title2,$pencilid2)'
                        ></i>
                        $address
                    </td>
                    <td class='custom-text' id='location$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateFactoring,$type,$id,$locationcolumn,$title3,$pencilid3)'
                        ></i>
                        $location
                    </td>
                    <td class='custom-text' id='zip$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateFactoring,$type,$id,$zipcolumn,$title4,$pencilid4)'
                        ></i>
                        $zip
                    </td>
                    <td class='custom-text' id='primaryContact$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateFactoring,$type,$id,$primaryContactcolumn,$title5,$pencilid5)'
                        ></i>
                        $primaryContact
                    </td>
                    <td class='custom-text' id='telephone$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateFactoring,$type,$id,$telephonecolumn,$title6,$pencilid6)'
                        ></i>
                        $telephone
                    </td>
                    <td class='custom-text' id='extFactoring$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='extFactoringPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateFactoring,$type,$id,$extFactoringcolumn,$title7,$pencilid7)'
                        ></i>
                        $extFactoring
                    </td>
                    <td class='custom-text' id='fax$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateFactoring,$type,$id,$faxcolumn,$title8,$pencilid8)'
                        ></i>
                        $fax
                    </td>
                    <td class='custom-text' id='tollFree$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='tollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateFactoring,$type,$id,$tollFreecolumn,$title9,$pencilid9)'
                        ></i>
                        $tollFree
                    </td>
                    <td class='custom-text' id='email$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateFactoring,$type,$id,$emailcolumn,$title10,$pencilid10)'
                        ></i>
                        $email
                    </td>
                    <td class='custom-text' id='secondaryContact$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='secondaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateFactoring,$type,$id,$secondaryContactcolumn,$title11,$pencilid11)'
                        ></i>
                        $secondaryContact
                    </td>
                    <td class='custom-text' id='factoringtelephone$i'
                        onmouseover='showPencil_s($pencilid12)'
                        onmouseout='hidePencil_s($pencilid12)'
                        >
                        <i id='factoringtelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type12,$updateFactoring,$type,$id,$factoringtelephonecolumn,$title12,$pencilid12)'
                        ></i>
                        $factoringtelephone
                    </td>
                    <td class='custom-text' id='ext$i'
                        onmouseover='showPencil_s($pencilid13)'
                        onmouseout='hidePencil_s($pencilid13)'
                        >
                        <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type13,$updateFactoring,$type,$id,$extcolumn,$title13,$pencilid13)'
                        ></i>
                        $ext
                    </td>
                    <td class='custom-text'>
                        $currencySetting
                    </td>
                    <td class='custom-text'>
                        $paymentTerms
                    </td>
                    <td class='custom-text' id='taxID$i'
                        onmouseover='showPencil_s($pencilid14)'
                        onmouseout='hidePencil_s($pencilid14)'
                        >
                        <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type14,$updateFactoring,$type,$id,$taxIDcolumn,$title14,$pencilid14)'
                        ></i>
                        $taxID
                    </td>
                    <td class='custom-text' id='internalNote$i'
                        onmouseover='showPencil_s($pencilid15)'
                        onmouseout='hidePencil_s($pencilid15)'
                        >
                        <i id='internalNotePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type15,$updateFactoring,$type,$id,$internalNotecolumn,$title15,$pencilid15)'
                        ></i>
                        $internalNote
                    </td>";
                    
                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deletefactoring($id,$currencyid,$paymentid)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_factoring_com') {
    $i = 0;
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];

    $cursor = $db->factoring_company_add->find(array('companyID' => $_SESSION['companyId']));
                                    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['factoring']);
        $total_pages = ceil($total_records / $limit);
    }

    $collection = $db->factoring_company_add;
    $show1 = $collection->aggregate([
        ['$lookup' => [
            'from' => 'currency_add',
            'localField' => 'companyID', 
            'foreignField' => 'companyID',
            'as' => 'currency_1'
        ]],
        ['$lookup' => [
            'from' => 'payment_terms',
            'localField' => 'companyID', 
            'foreignField' => 'companyID',
            'as' => 'payment_1'
        ]],
        ['$match'=>['companyID' => $_SESSION['companyId']]],
        ['$project'=>['companyID'=>$_SESSION['companyId'],'factoring'=>['$slice'=>['$factoring',$start,$limit]],'payment_1'=>1,'currency_1'=>1]]
    ]);

    foreach ($show1 as $row) {
        $factoring = $row['factoring'];
        $currency_1 = $row['currency_1'];
        $payment_1 = $row['payment_1'];
    
        foreach ($currency_1 as $row2) {
            $currency = $row2['currency'];
            $currencyType = array();
            foreach ($currency as $row3) {
                $currencyid = $row3['_id'];
                $currencyType[$currencyid] = $row3['currencyType'];
            }
        }
    
        foreach ($payment_1 as $row4) {
            $payment = $row4['payment'];
            $paymentTerm = array();
            foreach ($payment as $row_5) {
                $paymentid = $row_5['_id'];
                $paymentTerm[$paymentid] = $row_5['paymentTerm'];  
            }
        }
    
        foreach ($factoring as $row5) {
            $id = $row5['_id'];
            $counter = $row5['counter'];
            $currencyid = $row5['currencySetting'];
            $paymentid = $row5['paymentTerms'];
            $factoringCompanyname = $row5['factoringCompanyname'];
            $address = $row5['address'];
            $location = $row5['location'];
            $zip = $row5['zip'];
            $primaryContact = $row5['primaryContact'];
            $telephone = $row5['telephone'];
            $extFactoring = $row5['extFactoring'];
            $fax = $row5['fax'];
            $tollFree = $row5['tollFree'];
            $email = $row5['email'];
            $secondaryContact = $row5['secondaryContact'];
            $factoringtelephone = $row5['factoringtelephone'];
            $ext = $row5['ext'];
            $currencySetting = $currencyType[$row5['currencySetting']];
            $paymentTerms = $paymentTerm[$row5['paymentTerms']];
            $taxID = $row5['taxID'];
            $internalNote = $row5['internalNote'];

            $table = "";
            $factoringCompanynamecolumn = '"factoringCompanyname"';
            $addresscolumn = '"address"';
            $locationcolumn = '"location"';
            $zipcolumn = '"zip"';
            $primaryContactcolumn = '"primaryContact"';
            $telephonecolumn = '"telephone"';
            $extFactoringcolumn = '"extFactoring"';
            $faxcolumn = '"fax"';
            $tollFreecolumn = '"tollFree"';
            $emailcolumn = '"email"';
            $secondaryContactcolumn = '"secondaryContact"';
            $factoringtelephonecolumn = '"factoringtelephone"';
            $extcolumn = '"ext"';
            $currencySettingcolumn = '"currencySetting"';
            $paymentTermscolumn = '"paymentTerms"';
            $taxIDcolumn = '"taxID"';
            $internalNotecolumn = '"internalNote"';
            $type = '"text"';
            $list = "<option value='0'>--Select--</option>";
            $list1 = "<option value='0'>--Select--</option>";
            
            $i++;
            $start += 1;

            $updateFactoring = '"updateFactoring"';

            $c_type1 = '"'.$factoringCompanyname.'"';
            $c_type2 = '"'.$address.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$zip.'"';
            $c_type5 = '"'.$primaryContact.'"';
            $c_type6 = '"'.$telephone.'"';
            $c_type7 = '"'.$extFactoring.'"';
            $c_type8 = '"'.$fax.'"';
            $c_type9 = '"'.$tollFree.'"';
            $c_type10 = '"'.$email.'"';
            $c_type11 = '"'.$secondaryContact.'"';
            $c_type12 = '"'.$factoringtelephone.'"';
            $c_type13 = '"'.$ext.'"';
            $c_type14 = '"'.$taxID.'"';
            $c_type15 = '"'.$internalNote.'"';

            $title1 = '"Factoring Company Name"';
            $title2 = '"Address"';
            $title3 = '"Location"';
            $title4 = '"Postal / Zip"';
            $title5 = '"Primary contact"';
            $title6 = '"Telephone"';
            $title7 = '"Ext Fact"';
            $title8 = '"Fax"';
            $title9 = '"Toll Free"';
            $title10 = '"Conatact Email"';
            $title11 = '"Secondary Contact"';
            $title12 = '"Fact Telephone"';
            $title13 = '"Ext"';
            $title14 = '"Tax ID"';
            $title15 = '"Internal Notes"';

            $pencilid1 = '"factoringCompanynamePencil'.$i.'"';
            $pencilid2 = '"addressPencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"zipPencil'.$i.'"';
            $pencilid5 = '"primaryContactPencil'.$i.'"';
            $pencilid6 = '"telephonePencil'.$i.'"';
            $pencilid7 = '"extFactoringPencil'.$i.'"';
            $pencilid8 = '"faxPencil'.$i.'"';
            $pencilid9 = '"tollFreePencil'.$i.'"';
            $pencilid10 = '"emailPencil'.$i.'"';
            $pencilid11 = '"secondaryContactPencil'.$i.'"';
            $pencilid12 = '"factoringtelephonePencil'.$i.'"';
            $pencilid13 = '"extPencil'.$i.'"';
            $pencilid14 = '"taxIDPencil'.$i.'"';
            $pencilid15 = '"internalNotePencil'.$i.'"';

            echo "<tr>
                <th>$start</th>
                <th class='custom-text' id='factoringCompanyname$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='factoringCompanynamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateFactoring,$type,$id,$factoringCompanynamecolumn,$title1,$pencilid1)'
                    ></i>
                    $factoringCompanyname
                </th>
                <td class='custom-text' id='address$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='addressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateFactoring,$type,$id,$addresscolumn,$title2,$pencilid2)'
                    ></i>
                    $address
                </td>
                <td class='custom-text' id='location$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateFactoring,$type,$id,$locationcolumn,$title3,$pencilid3)'
                    ></i>
                    $location
                </td>
                <td class='custom-text' id='zip$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='zipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateFactoring,$type,$id,$zipcolumn,$title4,$pencilid4)'
                    ></i>
                    $zip
                </td>
                <td class='custom-text' id='primaryContact$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='primaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateFactoring,$type,$id,$primaryContactcolumn,$title5,$pencilid5)'
                    ></i>
                    $primaryContact
                </td>
                <td class='custom-text' id='telephone$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='telephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateFactoring,$type,$id,$telephonecolumn,$title6,$pencilid6)'
                    ></i>
                    $telephone
                </td>
                <td class='custom-text' id='extFactoring$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='extFactoringPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateFactoring,$type,$id,$extFactoringcolumn,$title7,$pencilid7)'
                    ></i>
                    $extFactoring
                </td>
                <td class='custom-text' id='fax$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='faxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateFactoring,$type,$id,$faxcolumn,$title8,$pencilid8)'
                    ></i>
                    $fax
                </td>
                <td class='custom-text' id='tollFree$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='tollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateFactoring,$type,$id,$tollFreecolumn,$title9,$pencilid9)'
                    ></i>
                    $tollFree
                </td>
                <td class='custom-text' id='email$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='emailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateFactoring,$type,$id,$emailcolumn,$title10,$pencilid10)'
                    ></i>
                    $email
                </td>
                <td class='custom-text' id='secondaryContact$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='secondaryContactPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateFactoring,$type,$id,$secondaryContactcolumn,$title11,$pencilid11)'
                    ></i>
                    $secondaryContact
                </td>
                <td class='custom-text' id='factoringtelephone$i'
                    onmouseover='showPencil_s($pencilid12)'
                    onmouseout='hidePencil_s($pencilid12)'
                    >
                    <i id='factoringtelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type12,$updateFactoring,$type,$id,$factoringtelephonecolumn,$title12,$pencilid12)'
                    ></i>
                    $factoringtelephone
                </td>
                <td class='custom-text' id='ext$i'
                    onmouseover='showPencil_s($pencilid13)'
                    onmouseout='hidePencil_s($pencilid13)'
                    >
                    <i id='extPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type13,$updateFactoring,$type,$id,$extcolumn,$title13,$pencilid13)'
                    ></i>
                    $ext
                </td>
                <td class='custom-text'>
                    $currencySetting
                </td>
                <td class='custom-text'>
                    $paymentTerms
                </td>
                <td class='custom-text' id='taxID$i'
                    onmouseover='showPencil_s($pencilid14)'
                    onmouseout='hidePencil_s($pencilid14)'
                    >
                    <i id='taxIDPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type14,$updateFactoring,$type,$id,$taxIDcolumn,$title14,$pencilid14)'
                    ></i>
                    $taxID
                </td>
                <td class='custom-text' id='internalNote$i'
                    onmouseover='showPencil_s($pencilid15)'
                    onmouseout='hidePencil_s($pencilid15)'
                    >
                    <i id='internalNotePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type15,$updateFactoring,$type,$id,$internalNotecolumn,$title15,$pencilid15)'
                    ></i>
                    $internalNote
                </td>";

                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deletefactoring($id,$currencyid,$paymentid)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }   
        }
        //echo $table."^".$list."^".$list1;
    }
}