<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_credit_table') {
    $limit = 100;
    $cursor = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['admin_credit']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_credit' => array('$slice' => [0, $limit]))));
    
    $i = 0;
    $table = "";

    foreach ($show as $row) {
        $show1 = $row['admin_credit'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $Name = $row1['Name'];
            $displayName = $row1['displayName'];
            $cardType = $row1['cardType'];
            $cardHolderName = $row1['cardHolderName'];
            $cardNo = $row1['cardNo'];
            $openingBalanceDt = date("d-m-Y",$row1['openingBalanceDt']);
            $cardLimit = $row1['cardLimit'];
            $openingBalance = $row1['openingBalance'];
            $type = '"text"';
            $updateCredit = '"updateCredit"';

            $NameColumn = '"Name"';
            $displayNameColumn = '"displayName"';
            $cardTypeColumn = '"cardType"';
            $cardHolderNameColumn = '"cardHolderName"';
            $cardNoColumn = '"cardNo"';
            $openingBalanceDtColumn = '"openingBalanceDt"';
            $cardLimitColumn = '"cardLimit"';
            $openingBalanceColumn = '"openingBalance"';
            $i++;

            $c_type1 = '"'.$Name.'"';
            $c_type2 = '"'.$displayName.'"';
            $c_type3 = '"'.$cardType.'"';
            $c_type4 = '"'.$cardHolderName.'"';
            $c_type5 = '"'.$cardNo.'"';
            $c_type6 = '"'.$openingBalanceDt.'"';
            $c_type7 = '"'.$cardLimit.'"';
            $title1 = '"Name of Bank"'; 
            $title2 = '"Name of Display"';
            $title3 = '"Card Type"';
            $title4 = '"Card Holder Name"';
            $title5 = '"Card #"';
            $title6 = '"Opening Bal Dt"';
            $title7 = '"Card Limit"';
            $pencilid1 = '"NamePencil'.$i.'"'; 
            $pencilid2 = '"displayNamePencil'.$i.'"';
            $pencilid3 = '"cardTypePencil'.$i.'"';
            $pencilid4 = '"cardHolderNamePencil'.$i.'"';
            $pencilid5 = '"cardNoPencil'.$i.'"';
            $pencilid6 = '"openingBalanceDtPencil'.$i.'"';
            $pencilid7 = '"cardLimitPencil'.$i.'"';

            echo "<tr>
                <td>$i</td>
                <td class='custom-text'>
                    $Name
                </td>
                <td class='custom-text' id='displayName$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateCredit,$type,$id,$displayNameColumn,$title2,$pencilid2)'
                    ></i>
                    $displayName
                </td>
                <td class='custom-text' id='cardType$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='cardTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateCredit,$type,$id,$cardTypeColumn,$title3,$pencilid3)'
                    ></i>
                    $cardType
                </td>
                <td class='custom-text' id='cardHolderName$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateCredit,$type,$id,$cardHolderNameColumn,$title4,$pencilid4)'
                    ></i>
                    $cardHolderName
                </td>
                <td class='custom-text' id='cardNo$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateCredit,$type,$id,$cardNoColumn,$title5,$pencilid5)'
                    ></i>
                    $cardNo
                </td>
                <td class='custom-text' id='cardLimit$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='cardLimitPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateCredit,$type,$id,$cardLimitColumn,$title7,$pencilid7)'
                    ></i>
                    $cardLimit
                </td>
                <td class='custom-text' id='openingBalanceDt$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='openingBalanceDtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateCredit,$type,$id,$openingBalanceDtColumn,$title6,$pencilid6)'
                    ></i>
                    $openingBalanceDt
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>";

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deleteCredit($id,$Name)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
        //echo $table;
    }
}

if ($_GET['types'] == 'search_text') {
    $show = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;

    foreach ($show as $row) {
        $show1 = $row['admin_credit'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['Name'] || $_POST['getoption'] == $row1['displayName'] || $_POST['getoption'] == $row1['cardType'] || $_POST['getoption'] == $row1['cardHolderName'] || $_POST['getoption'] == $row1['cardNo'] || $_POST['getoption'] == $row1['openingBalanceDt']  || $_POST['getoption'] == $row1['cardLimit'] || $_POST['getoption'] == $row1['openingBalance']) { 
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $Name = $row1['Name'];
                $displayName = $row1['displayName'];
                $cardType = $row1['cardType'];
                $cardHolderName = $row1['cardHolderName'];
                $cardNo = $row1['cardNo'];
                $openingBalanceDt = date("d-m-Y",$row1['openingBalanceDt']);
                $cardLimit = $row1['cardLimit'];
                $openingBalance = $row1['openingBalance'];
                $type = '"text"';
                $updateCredit = '"updateCredit"';

                $NameColumn = '"Name"';
                $displayNameColumn = '"displayName"';
                $cardTypeColumn = '"cardType"';
                $cardHolderNameColumn = '"cardHolderName"';
                $cardNoColumn = '"cardNo"';
                $openingBalanceDtColumn = '"openingBalanceDt"';
                $cardLimitColumn = '"cardLimit"';
                $openingBalanceColumn = '"openingBalance"';
                $i++;

                $c_type1 = '"'.$Name.'"';
                $c_type2 = '"'.$displayName.'"';
                $c_type3 = '"'.$cardType.'"';
                $c_type4 = '"'.$cardHolderName.'"';
                $c_type5 = '"'.$cardNo.'"';
                $c_type6 = '"'.$openingBalanceDt.'"';
                $c_type7 = '"'.$cardLimit.'"';
                $title1 = '"Name of Bank"'; 
                $title2 = '"Name of Display"';
                $title3 = '"Card Type"';
                $title4 = '"Card Holder Name"';
                $title5 = '"Card #"';
                $title6 = '"Opening Bal Dt"';
                $title7 = '"Card Limit"';
                $pencilid1 = '"NamePencil'.$i.'"'; 
                $pencilid2 = '"displayNamePencil'.$i.'"';
                $pencilid3 = '"cardTypePencil'.$i.'"';
                $pencilid4 = '"cardHolderNamePencil'.$i.'"';
                $pencilid5 = '"cardNoPencil'.$i.'"';
                $pencilid6 = '"openingBalanceDtPencil'.$i.'"';
                $pencilid7 = '"cardLimitPencil'.$i.'"';

                echo "<tr>
                    <td>$i</td>
                    <td >
                        $Name
                    </td>
                    <td class='custom-text' id='displayName$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateCredit,$type,$id,$displayNameColumn,$title2,$pencilid2)'
                        ></i>
                        $displayName
                    </td>
                    <td class='custom-text' id='cardType$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='cardTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateCredit,$type,$id,$cardTypeColumn,$title3,$pencilid3)'
                        ></i>
                        $cardType
                    </td>
                    <td class='custom-text' id='cardHolderName$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateCredit,$type,$id,$cardHolderNameColumn,$title4,$pencilid4)'
                        ></i>
                        $cardHolderName
                    </td>
                    <td class='custom-text' id='cardNo$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateCredit,$type,$id,$cardNoColumn,$title5,$pencilid5)'
                        ></i>
                        $cardNo
                    </td>
                    <td class='custom-text' id='cardLimit$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='cardLimitPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateCredit,$type,$id,$cardLimitColumn,$title7,$pencilid7)'
                        ></i>
                        $cardLimit
                    </td>
                    <td class='custom-text' id='openingBalanceDt$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='openingBalanceDtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateCredit,$type,$id,$openingBalanceDtColumn,$title6,$pencilid6)'
                        ></i>
                        $openingBalanceDt
                    </td>
                    <td class='custom-text'>
                        $openingBalance
                    </td>
                    <td class='custom-text'>
                        $openingBalance
                    </td>";  
                
                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteCredit($id,$Name)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
        }

        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']));
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['admin_credit']);
                $total_pages = ceil($total_records / $limit);
            }

            $show = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_credit' => array('$slice' => [0, $limit]))));
            
            $i = 0;

            foreach ($show as $row) {
                $show1 = $row['admin_credit'];
                foreach ($show1 as $row1) {
                    $counter = $row1['counter'];
                    $id = $row1['_id'];
                    $Name = $row1['Name'];
                    $displayName = $row1['displayName'];
                    $cardType = $row1['cardType'];
                    $cardHolderName = $row1['cardHolderName'];
                    $cardNo = $row1['cardNo'];
                    $openingBalanceDt = date("d-m-Y",$row1['openingBalanceDt']);
                    $cardLimit = $row1['cardLimit'];
                    $openingBalance = $row1['openingBalance'];
                    $type = '"text"';
                    $updateCredit = '"updateCredit"';

                    $NameColumn = '"Name"';
                    $displayNameColumn = '"displayName"';
                    $cardTypeColumn = '"cardType"';
                    $cardHolderNameColumn = '"cardHolderName"';
                    $cardNoColumn = '"cardNo"';
                    $openingBalanceDtColumn = '"openingBalanceDt"';
                    $cardLimitColumn = '"cardLimit"';
                    $openingBalanceColumn = '"openingBalance"';
                    $i++;

                    $c_type1 = '"'.$Name.'"';
                    $c_type2 = '"'.$displayName.'"';
                    $c_type3 = '"'.$cardType.'"';
                    $c_type4 = '"'.$cardHolderName.'"';
                    $c_type5 = '"'.$cardNo.'"';
                    $c_type6 = '"'.$openingBalanceDt.'"';
                    $c_type7 = '"'.$cardLimit.'"';
                    $title1 = '"Name of Bank"'; 
                    $title2 = '"Name of Display"';
                    $title3 = '"Card Type"';
                    $title4 = '"Card Holder Name"';
                    $title5 = '"Card #"';
                    $title6 = '"Opening Bal Dt"';
                    $title7 = '"Card Limit"';
                    $pencilid1 = '"NamePencil'.$i.'"'; 
                    $pencilid2 = '"displayNamePencil'.$i.'"';
                    $pencilid3 = '"cardTypePencil'.$i.'"';
                    $pencilid4 = '"cardHolderNamePencil'.$i.'"';
                    $pencilid5 = '"cardNoPencil'.$i.'"';
                    $pencilid6 = '"openingBalanceDtPencil'.$i.'"';
                    $pencilid7 = '"cardLimitPencil'.$i.'"';

                    echo "<tr>
                        <td>$i</td>
                        <td class='custom-text'>
                            $Name
                        </td>
                        <td class='custom-text' id='displayName$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateCredit,$type,$id,$displayNameColumn,$title2,$pencilid2)'
                            ></i>
                            $displayName
                        </td>
                        <td class='custom-text' id='cardType$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='cardTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateCredit,$type,$id,$cardTypeColumn,$title3,$pencilid3)'
                            ></i>
                            $cardType
                        </td>
                        <td class='custom-text' id='cardHolderName$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateCredit,$type,$id,$cardHolderNameColumn,$title4,$pencilid4)'
                            ></i>
                            $cardHolderName
                        </td>
                        <td class='custom-text' id='cardNo$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateCredit,$type,$id,$cardNoColumn,$title5,$pencilid5)'
                            ></i>
                            $cardNo
                        </td>
                        <td class='custom-text' id='cardLimit$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='cardLimitPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateCredit,$type,$id,$cardLimitColumn,$title7,$pencilid7)'
                            ></i>
                            $cardLimit
                        </td>
                        <td class='custom-text' id='openingBalanceDt$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='openingBalanceDtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateCredit,$type,$id,$openingBalanceDtColumn,$title6,$pencilid6)'
                            ></i>
                            $openingBalanceDt
                        </td>
                        <td class='custom-text'>
                            $openingBalance
                        </td>
                        <td class='custom-text'>
                            $openingBalance
                        </td>";

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deleteCredit($id,$Name)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }
        }
    }  
}

if ($_GET['types'] == 'paginate_creditcard') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    
    $cursor = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['admin_credit']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_credit' => array('$slice' => [$start, $limit]))));
    
    $i = 0;

    foreach ($show as $row) {
        $show1 = $row['admin_credit'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $Name = $row1['Name'];
            $displayName = $row1['displayName'];
            $cardType = $row1['cardType'];
            $cardHolderName = $row1['cardHolderName'];
            $cardNo = $row1['cardNo'];
            $openingBalanceDt = date("d-m-Y",$row1['openingBalanceDt']);
            $cardLimit = $row1['cardLimit'];
            $openingBalance = $row1['openingBalance'];
            $type = '"text"';
            $updateCredit = '"updateCredit"';

            $NameColumn = '"Name"';
            $displayNameColumn = '"displayName"';
            $cardTypeColumn = '"cardType"';
            $cardHolderNameColumn = '"cardHolderName"';
            $cardNoColumn = '"cardNo"';
            $openingBalanceDtColumn = '"openingBalanceDt"';
            $cardLimitColumn = '"cardLimit"';
            $openingBalanceColumn = '"openingBalance"';
            $i++;

            $c_type1 = '"'.$Name.'"';
            $c_type2 = '"'.$displayName.'"';
            $c_type3 = '"'.$cardType.'"';
            $c_type4 = '"'.$cardHolderName.'"';
            $c_type5 = '"'.$cardNo.'"';
            $c_type6 = '"'.$openingBalanceDt.'"';
            $c_type7 = '"'.$cardLimit.'"';
            $title1 = '"Name of Bank"'; 
            $title2 = '"Name of Display"';
            $title3 = '"Card Type"';
            $title4 = '"Card Holder Name"';
            $title5 = '"Card #"';
            $title6 = '"Opening Bal Dt"';
            $title7 = '"Card Limit"';
            $pencilid1 = '"NamePencil'.$i.'"'; 
            $pencilid2 = '"displayNamePencil'.$i.'"';
            $pencilid3 = '"cardTypePencil'.$i.'"';
            $pencilid4 = '"cardHolderNamePencil'.$i.'"';
            $pencilid5 = '"cardNoPencil'.$i.'"';
            $pencilid6 = '"openingBalanceDtPencil'.$i.'"';
            $pencilid7 = '"cardLimitPencil'.$i.'"';

            echo "<tr>
                <td>$start</td>
                <td class='custom-text'>
                    $Name
                </td>
                <td class='custom-text' id='displayName$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateCredit,$type,$id,$displayNameColumn,$title2,$pencilid2)'
                    ></i>
                    $displayName
                </td>
                <td class='custom-text' id='cardType$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='cardTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateCredit,$type,$id,$cardTypeColumn,$title3,$pencilid3)'
                    ></i>
                    $cardType
                </td>
                <td class='custom-text' id='cardHolderName$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateCredit,$type,$id,$cardHolderNameColumn,$title4,$pencilid4)'
                    ></i>
                    $cardHolderName
                </td>
                <td class='custom-text' id='cardNo$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateCredit,$type,$id,$cardNoColumn,$title5,$pencilid5)'
                    ></i>
                    $cardNo
                </td>
                <td class='custom-text' id='cardLimit$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='cardLimitPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateCredit,$type,$id,$cardLimitColumn,$title7,$pencilid7)'
                    ></i>
                    $cardLimit
                </td>
                <td class='custom-text' id='openingBalanceDt$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='openingBalanceDtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateCredit,$type,$id,$openingBalanceDtColumn,$title6,$pencilid6)'
                    ></i>
                    $openingBalanceDt
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>";

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deleteCredit($id,$Name)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
    }
}

?>