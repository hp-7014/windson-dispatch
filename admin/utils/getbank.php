<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_bank_table') {
    $limit = 100;
    $total_pages = 0;
    
    $cursor = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']));

    if (!empty($cursor)) {
        foreach ($cursor as $value) {
            $total_records = sizeof($value['admin_bank']);
            $total_pages = ceil($total_records / $limit);
        }
    }

    $g_data = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_bank' => array('$slice' => [0, $limit]))));
    
    $i = 0;
    $table = "";
    $pages = "";

    foreach ($g_data as $data) {
        $bank_admin = $data['admin_bank'];

        foreach ($bank_admin as $admin) {
            $counter = $admin['counter'];
            $id = $admin['_id'];
            $bankName = $admin['bankName'];
            $bankAddresss = $admin['bankAddresss'];
            $accountHolder = $admin['accountHolder'];
            $accountNo = $admin['accountNo'];
            $routingNo = $admin['routingNo'];
            $openingBalDate = $admin['openingBalDate'];
            $openingBalance = $admin['openingBalance'];
            $currentcheqNo = $admin['currentcheqNo'];

            $bankNameColumn = '"bankName"';
            $bankAddresssColumn = '"bankAddresss"';
            $accountHolderColumn = '"accountHolder"';
            $accountNoColumn = '"accountNo"';
            $routingNoColumn = '"routingNo"';
            $openingBalDateColumn = '"openingBalDate"';
            $openingBalanceColumn = '"openingBalance"';
            $currentcheqNoColumn = '"currentcheqNo"';
            $i++;
            $type = '"text"';
            $updateBank = '"updateBank"';

            $c_type1 = '"'.$bankName.'"';
            $c_type2 = '"'.$bankAddresss.'"';
            $c_type3 = '"'.$accountHolder.'"';
            $c_type4 = '"'.$accountNo.'"';
            $c_type5 = '"'.$routingNo.'"';
            $c_type6 = '"'.$openingBalDate.'"';
            $c_type7 = '"'.$currentcheqNo.'"';
            $title1 = '"Bank Name"';
            $title2 = '"Bank Addresss"';
            $title3 = '"Account Holder Name"';
            $title4 = '"Bank Account"';
            $title5 = '"Bank Routing"';
            $title6 = '"Opening Bal Dt"';
            $title7 = '"Current Cheque No"';
            $pencilid1 = '"bankNamePencil'.$i.'"';
            $pencilid2 = '"bankAddresssPencil'.$i.'"';
            $pencilid3 = '"accountHolderPencil'.$i.'"';
            $pencilid4 = '"accountNoPencil'.$i.'"';
            $pencilid5 = '"routingNoPencil'.$i.'"';
            $pencilid6 = '"openingBalDatePencil'.$i.'"';
            $pencilid7 = '"currentcheqNoPencil'.$i.'"';

            $table .= "<tr>
                <th> $i</th>
                <th class='custom-text' id='bankName$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='bankNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateBank,$type,$id,$bankNameColumn,$title1,$pencilid1)'
                    ></i>
                    $bankName
                </th>
                <td class='custom-text' id='bankAddresss$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='bankAddresssPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateBank,$type,$id,$bankAddresssColumn,$title2,$pencilid2)'
                    ></i>
                    $bankAddresss
                </td>
                <td class='custom-text'>
                    $accountHolder
                </td>
                <td class='custom-text' id='accountNo$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='accountNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateBank,$type,$id,$accountNoColumn,$title4,$pencilid4)'
                    ></i>
                    $accountNo
                </td>
                <td class='custom-text' id='routingNo$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='routingNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateBank,$type,$id,$routingNoColumn,$title5,$pencilid5)'
                    ></i>
                    $routingNo
                </td>
                <td class='custom-text' id='openingBalDate$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='openingBalDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateBank,$type,$id,$openingBalDateColumn,$title6,$pencilid6)'
                    ></i>
                    $openingBalDate
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>
                <td class='custom-text' id='currentcheqNo$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='currentcheqNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateBank,$type,$id,$currentcheqNoColumn,$title7,$pencilid7)'
                    ></i>
                    $currentcheqNo
                </td>"; 

            if ($counter == 0) { 
                $table .= "<td><a href='#' onclick='deleteBank($id,$accountHolder)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
        $fun_nm = '"paginate_bank_admin"';
        $p_no = '"page_no"';

        $pages .= "<li id='bank_previous' style='display:none'>
            <a class='page-link btn btn-secondary waves-effect'
                onclick='previous_page($fun_nm,$p_no,$limit,$total_pages)'>Previous</a>
            </li>
            <select class='form-control' id='page_active'
                onchange='paginate_bank_admin(this.value * $limit,$limit,$total_pages)'>";
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
    echo $table."^".$pages;
}

if ($_GET['types'] == 'search_text') {
    $g_data = $db->bank_admin->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    $table = "";

    foreach ($g_data as $data) {
        $bank_admin = $data['admin_bank'];
        foreach ($bank_admin as $admin) {
            if ($_POST['getoption'] == $admin['bankName'] || $_POST['getoption'] == $admin['bankAddresss'] || $_POST['getoption'] == $admin['accountHolder'] || $_POST['getoption'] == $admin['accountNo'] || $_POST['getoption'] == $admin['routingNo'] || $_POST['getoption'] == $admin['openingBalDate']  || $_POST['getoption'] == $admin['currentcheqNo']) { 
                $counter = $admin['counter'];
                $id = $admin['_id'];
                $bankName = $admin['bankName'];
                $bankAddresss = $admin['bankAddresss'];
                $accountHolder = $admin['accountHolder'];
                $accountNo = $admin['accountNo'];
                $routingNo = $admin['routingNo'];
                $openingBalDate = $admin['openingBalDate'];
                $openingBalance = $admin['openingBalance'];
                $currentcheqNo = $admin['currentcheqNo'];

                $bankNameColumn = '"bankName"';
                $bankAddresssColumn = '"bankAddresss"';
                $accountHolderColumn = '"accountHolder"';
                $accountNoColumn = '"accountNo"';
                $routingNoColumn = '"routingNo"';
                $openingBalDateColumn = '"openingBalDate"';
                $openingBalanceColumn = '"openingBalance"';
                $currentcheqNoColumn = '"currentcheqNo"';
                $i++;
                $type = '"text"';
                $updateBank = '"updateBank"';

                $c_type1 = '"'.$bankName.'"';
                $c_type2 = '"'.$bankAddresss.'"';
                $c_type3 = '"'.$accountHolder.'"';
                $c_type4 = '"'.$accountNo.'"';
                $c_type5 = '"'.$routingNo.'"';
                $c_type6 = '"'.$openingBalDate.'"';
                $c_type7 = '"'.$currentcheqNo.'"';
                $title1 = '"Bank Name"';
                $title2 = '"Bank Addresss"';
                $title3 = '"Account Holder Name"';
                $title4 = '"Bank Account"';
                $title5 = '"Bank Routing"';
                $title6 = '"Opening Bal Dt"';
                $title7 = '"Current Cheque No"';
                $pencilid1 = '"bankNamePencil'.$i.'"';
                $pencilid2 = '"bankAddresssPencil'.$i.'"';
                $pencilid3 = '"accountHolderPencil'.$i.'"';
                $pencilid4 = '"accountNoPencil'.$i.'"';
                $pencilid5 = '"routingNoPencil'.$i.'"';
                $pencilid6 = '"openingBalDatePencil'.$i.'"';
                $pencilid7 = '"currentcheqNoPencil'.$i.'"';

                echo "<tr>
                    <th> $i</th>
                    <th class='custom-text' id='bankName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='bankNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateBank,$type,$id,$bankNameColumn,$title1,$pencilid1)'
                        ></i>
                        $bankName
                    </th>
                    <td class='custom-text' id='bankAddresss$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='bankAddresssPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateBank,$type,$id,$bankAddresssColumn,$title2,$pencilid2)'
                        ></i>
                        $bankAddresss
                    </td>
                    <td class='custom-text'>
                        $accountHolder
                    </td>
                    <td class='custom-text' id='accountNo$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='accountNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateBank,$type,$id,$accountNoColumn,$title4,$pencilid4)'
                        ></i>
                        $accountNo
                    </td>
                    <td class='custom-text' id='routingNo$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='routingNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateBank,$type,$id,$routingNoColumn,$title5,$pencilid5)'
                        ></i>
                        $routingNo
                    </td>
                    <td class='custom-text' id='openingBalDate$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='openingBalDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateBank,$type,$id,$openingBalDateColumn,$title6,$pencilid6)'
                        ></i>
                        $openingBalDate
                    </td>
                    <td class='custom-text'>
                        $openingBalance
                    </td>
                    <td class='custom-text'>
                        $openingBalance
                    </td>
                    <td class='custom-text' id='currentcheqNo$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='currentcheqNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateBank,$type,$id,$currentcheqNoColumn,$title7,$pencilid7)'
                        ></i>
                        $currentcheqNo
                    </td>";

                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteBank($id,$accountHolder)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }  
            }
        }

        if ($_POST['getoption'] == "") {
            $limit = 100;
            $total_pages = 0;
            $cursor = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']));
            if(!empty($cursor)) {
                foreach ($cursor as $value) {
                    $total_records = sizeof($value['admin_bank']);
                    $total_pages = ceil($total_records / $limit);
                }
            }

            $g_data = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_bank' => array('$slice' => [0, $limit]))));
            $i = 0;
        
            foreach ($g_data as $data) {
                $bank_admin = $data['admin_bank'];
        
                foreach ($bank_admin as $admin) {
                    $counter = $admin['counter'];
                    $id = $admin['_id'];
                    $bankName = $admin['bankName'];
                    $bankAddresss = $admin['bankAddresss'];
                    $accountHolder = $admin['accountHolder'];
                    $accountNo = $admin['accountNo'];
                    $routingNo = $admin['routingNo'];
                    $openingBalDate = $admin['openingBalDate'];
                    $openingBalance = $admin['openingBalance'];
                    $currentcheqNo = $admin['currentcheqNo'];
    
                    $bankNameColumn = '"bankName"';
                    $bankAddresssColumn = '"bankAddresss"';
                    $accountHolderColumn = '"accountHolder"';
                    $accountNoColumn = '"accountNo"';
                    $routingNoColumn = '"routingNo"';
                    $openingBalDateColumn = '"openingBalDate"';
                    $openingBalanceColumn = '"openingBalance"';
                    $currentcheqNoColumn = '"currentcheqNo"';
                    $i++;
                    $type = '"text"';
                    $updateBank = '"updateBank"';
    
                    $c_type1 = '"'.$bankName.'"';
                    $c_type2 = '"'.$bankAddresss.'"';
                    $c_type3 = '"'.$accountHolder.'"';
                    $c_type4 = '"'.$accountNo.'"';
                    $c_type5 = '"'.$routingNo.'"';
                    $c_type6 = '"'.$openingBalDate.'"';
                    $c_type7 = '"'.$currentcheqNo.'"';
                    $title1 = '"Bank Name"';
                    $title2 = '"Bank Addresss"';
                    $title3 = '"Account Holder Name"';
                    $title4 = '"Bank Account"';
                    $title5 = '"Bank Routing"';
                    $title6 = '"Opening Bal Dt"';
                    $title7 = '"Current Cheque No"';
                    $pencilid1 = '"bankNamePencil'.$i.'"';
                    $pencilid2 = '"bankAddresssPencil'.$i.'"';
                    $pencilid3 = '"accountHolderPencil'.$i.'"';
                    $pencilid4 = '"accountNoPencil'.$i.'"';
                    $pencilid5 = '"routingNoPencil'.$i.'"';
                    $pencilid6 = '"openingBalDatePencil'.$i.'"';
                    $pencilid7 = '"currentcheqNoPencil'.$i.'"';
    
                    echo "<tr>
                        <th>$i</th>
                        <th class='custom-text' id='bankName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='bankNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateBank,$type,$id,$bankNameColumn,$title1,$pencilid1)'
                            ></i>
                            $bankName
                        </th>
                        <td class='custom-text' id='bankAddresss$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='bankAddresssPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateBank,$type,$id,$bankAddresssColumn,$title2,$pencilid2)'
                            ></i>
                            $bankAddresss
                        </td>
                        <td class='custom-text'>
                            $accountHolder
                        </td>
                        <td class='custom-text' id='accountNo$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='accountNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateBank,$type,$id,$accountNoColumn,$title4,$pencilid4)'
                            ></i>
                            $accountNo
                        </td>
                        <td class='custom-text' id='routingNo$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='routingNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateBank,$type,$id,$routingNoColumn,$title5,$pencilid5)'
                            ></i>
                            $routingNo
                        </td>
                        <td class='custom-text' id='openingBalDate$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='openingBalDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateBank,$type,$id,$openingBalDateColumn,$title6,$pencilid6)'
                            ></i>
                            $openingBalDate
                        </td>
                        <td class='custom-text'>
                            $openingBalance
                        </td>
                        <td class='custom-text'>
                            $openingBalance
                        </td>
                        <td class='custom-text' id='currentcheqNo$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='currentcheqNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateBank,$type,$id,$currentcheqNoColumn,$title7,$pencilid7)'
                            ></i>
                            $currentcheqNo
                        </td>";

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deleteBank($id,$accountHolder)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }
        }
    }  
}

if ($_GET['types'] == 'paginate_bank_admin') { 
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    $total_pages = 0;

    $cursor = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']));
    
    if (!empty($cursor)) {
        foreach ($cursor as $value) {
            $total_records = sizeof($value['admin_bank']);
            $total_pages = ceil($total_records / $limit);
        }
    }

    $g_data = $db->bank_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_bank' => array('$slice' => [$start, $limit]))));
    $table = "";
    $i = 0;
    
    foreach ($g_data as $data) {
        $bank_admin = $data['admin_bank'];
        
        foreach ($bank_admin as $admin) { 
            $counter = $admin['counter']; 
            $id = $admin['_id'];
            $bankName = $admin['bankName'];
            $bankAddresss = $admin['bankAddresss'];
            $accountHolder = $admin['accountHolder'];
            $accountNo = $admin['accountNo'];
            $routingNo = $admin['routingNo'];
            $openingBalDate = $admin['openingBalDate'];
            $openingBalance = $admin['openingBalance'];
            $currentcheqNo = $admin['currentcheqNo'];

            $bankNameColumn = '"bankName"';
            $bankAddresssColumn = '"bankAddresss"';
            $accountHolderColumn = '"accountHolder"';
            $accountNoColumn = '"accountNo"';
            $routingNoColumn = '"routingNo"';
            $openingBalDateColumn = '"openingBalDate"';
            $openingBalanceColumn = '"openingBalance"';
            $currentcheqNoColumn = '"currentcheqNo"';
            $start += 1;
            $type = '"text"';
            $updateBank = '"updateBank"';

            $c_type1 = '"'.$bankName.'"';
            $c_type2 = '"'.$bankAddresss.'"';
            $c_type3 = '"'.$accountHolder.'"';
            $c_type4 = '"'.$accountNo.'"';
            $c_type5 = '"'.$routingNo.'"';
            $c_type6 = '"'.$openingBalDate.'"';
            $c_type7 = '"'.$currentcheqNo.'"';
            $title1 = '"Bank Name"';
            $title2 = '"Bank Addresss"';
            $title3 = '"Account Holder Name"';
            $title4 = '"Bank Account"';
            $title5 = '"Bank Routing"';
            $title6 = '"Opening Bal Dt"';
            $title7 = '"Current Cheque No"';
            $pencilid1 = '"bankNamePencil'.$i.'"';
            $pencilid2 = '"bankAddresssPencil'.$i.'"';
            $pencilid3 = '"accountHolderPencil'.$i.'"';
            $pencilid4 = '"accountNoPencil'.$i.'"';
            $pencilid5 = '"routingNoPencil'.$i.'"';
            $pencilid6 = '"openingBalDatePencil'.$i.'"';
            $pencilid7 = '"currentcheqNoPencil'.$i.'"';
            
            $table .= "<tr>
                <th> $start</th>
                <th class='custom-text' id='bankName$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='bankNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateBank,$type,$id,$bankNameColumn,$title1,$pencilid1)'
                    ></i>
                    $bankName
                </th>
                <td class='custom-text' id='bankAddresss$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='bankAddresssPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateBank,$type,$id,$bankAddresssColumn,$title2,$pencilid2)'
                    ></i>
                    $bankAddresss
                </td>
                <td class='custom-text'>
                    $accountHolder
                </td>
                <td class='custom-text' id='accountNo$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='accountNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateBank,$type,$id,$accountNoColumn,$title4,$pencilid4)'
                    ></i>
                    $accountNo
                </td>
                <td class='custom-text' id='routingNo$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='routingNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateBank,$type,$id,$routingNoColumn,$title5,$pencilid5)'
                    ></i>
                    $routingNo
                </td>
                <td class='custom-text' id='openingBalDate$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='openingBalDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateBank,$type,$id,$openingBalDateColumn,$title6,$pencilid6)'
                    ></i>
                    $openingBalDate
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>
                <td class='custom-text'>
                    $openingBalance
                </td>
                <td class='custom-text' id='currentcheqNo$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='currentcheqNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateBank,$type,$id,$currentcheqNoColumn,$title7,$pencilid7)'
                    ></i>
                    $currentcheqNo
                </td>";  
            
            if ($counter == 0) { 
                $table .= "<td><a href='#' onclick='deleteBank($id,$accountHolder)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
            
        }
        echo $table;
    }    
}