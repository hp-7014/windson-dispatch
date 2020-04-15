<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if($_GET['types'] == 'live_user_table') {
    $limit = 100;
    $cursor = $db->user->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['user']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->user->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('user' => array('$slice' => [0, $limit]))));                              

    $i = 0;
    $table = "";
    $pages = "";
    foreach ($show as $row) {
        $show1 = $row['user'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $userEmail = $row1['userEmail'];
            $userName = $row1['userName'];
            $userFirstName = $row1['userFirstName'];
            $userLastName = $row1['userLastName'];
            $userAddress = $row1['userAddress'];
            $userLocation = $row1['userLocation'];
            $userZip = $row1['userZip'];
            $userTelephone = $row1['userTelephone'];
            $userExt = $row1['userExt'];
            $TollFree = $row1['TollFree'];
            $userFax = $row1['userFax'];

            $type = '"text"';

            $userEmailColumn = '"userEmail"';
            $userNameColumn = '"userName"';
            $userFirstNameColumn = '"userFirstName"';
            $userLastNameColumn = '"userLastName"';
            $userAddressColumn = '"userAddress"';
            $userLocationColumn = '"userLocation"';
            $userZipColumn = '"userZip"';
            $userTelephoneColumn = '"userTelephone"';
            $userExtColumn = '"userExt"';
            $TollFreeColumn = '"TollFree"';
            $userFaxColumn = '"userFax"';
            $i++;
            $updateUser = '"updateUser"';

            $c_type1 = '"'.$userEmail.'"';
            $c_type2 = '"'.$userName.'"';
            $c_type3 = '"'.$userFirstName.'"';
            $c_type4 = '"'.$userLastName.'"';
            $c_type5 = '"'.$userAddress.'"';
            $c_type6 = '"'.$userLocation.'"';
            $c_type7 = '"'.$userZip.'"';
            $c_type8 = '"'.$userTelephone.'"';
            $c_type9 = '"'.$userExt.'"';
            $c_type10 = '"'.$TollFree.'"';
            $c_type11 = '"'.$userFax.'"';

            $title1 = '"Email"';
            $title2 = '"User Name"';
            $title3 = '"First Name"';
            $title4 = '"Last Name"';
            $title5 = '"Address"';
            $title6 = '"Location"';
            $title7 = '"Zip"';
            $title8 = '"Telephone"';
            $title9 = '"Ext"';
            $title10 = '"Toll Free"';
            $title11 = '"Fax"';

            $pencilid1 = '"userEmailPencil'.$i.'"';
            $pencilid2 = '"userNamePencil'.$i.'"';
            $pencilid3 = '"userFirstNamePencil'.$i.'"';
            $pencilid4 = '"userLastNamePencil'.$i.'"';
            $pencilid5 = '"userAddressPencil'.$i.'"';
            $pencilid6 = '"userLocationPencil'.$i.'"';
            $pencilid7 = '"userZipPencil'.$i.'"';
            $pencilid8 = '"userTelephonePencil'.$i.'"';
            $pencilid9 = '"userExtPencil'.$i.'"';
            $pencilid10 = '"TollFreePencil'.$i.'"';
            $pencilid11 = '"userFaxPencil'.$i.'"';

            $table .= "<tr>
                <th> $i</th>
                <td class='custom-text' id='userEmail$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='userEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateUser,$type,$id,$userEmailColumn,$title1,$pencilid1)'
                    ></i>
                    $userEmail
                </td>
                <td class='custom-text' id='userName$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='userNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateUser,$type,$id,$userNameColumn,$title2,$pencilid2)'
                    ></i>
                    $userName
                </td>
                <td class='custom-text' id='userFirstName$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='userFirstNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateUser,$type,$id,$userFirstNameColumn,$title3,$pencilid3)'
                    ></i>
                    $userFirstName
                </td>
                <td class='custom-text' id='userLastName$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='userLastNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateUser,$type,$id,$userLastNameColumn,$title4,$pencilid4)'
                    ></i>
                    $userLastName
                </td>
                <td class='custom-text 'id='userAddress$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='userAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateUser,$type,$id,$userAddressColumn,$title5,$pencilid5)'
                    ></i>
                    $userAddress
                </td>
                <td class='custom-text' id='userLocation$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='userLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateUser,$type,$id,$userLocationColumn,$title6,$pencilid6)'
                    ></i>
                    $userLocation
                </td>
                <td class='custom-text' id='userZip$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='userZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateUser,$type,$id,$userZipColumn,$title7,$pencilid7)'
                    ></i>
                    $userZip
                </td>
                <td class='custom-text' id='userTelephone$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='userTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateUser,$type,$id,$userTelephoneColumn,$title8,$pencilid8)'
                    ></i>
                    $userTelephone
                </td>
                <td class='custom-text' id='userExt$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='userExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateUser,$type,$id,$userExtColumn,$title9,$pencilid9)'
                    ></i>
                    $userExt
                </td>
                <td class='custom-text' id='TollFree$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='TollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateUser,$type,$id,$TollFreeColumn,$title10,$pencilid10)'
                    ></i>
                    $TollFree
                </td>
                <td class='custom-text' id='userFax$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='userFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateUser,$type,$id,$userFaxColumn,$title11,$pencilid11)'
                    ></i>
                    $userFax
                </td>
                <td><a href='#' onclick='show_privilege($id)' data-toggle='modal' data-target='#show_privilege' class='btn btn-warning'>Privilege</a></td>";

            if ($counter == 0) {
                $table .= "<td><a href='#' onclick='deleteUser($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }

        $fun_nm = '"paginate_user"';
        $p_no = '"page_no"';

        $pages .= "<li id='bank_previous' style='display:none'>
            <a class='page-link btn btn-secondary waves-effect'
                onclick='previous_page($fun_nm,$p_no,$limit,$total_pages)'>Previous</a>
            </li>
            <select class='form-control' id='page_active'
                onchange='paginate_user(this.value * $limit,$limit,$total_pages)'>";
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
    $show = $db->user->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    $table = "";

    foreach ($show as $row) {
        $show1 = $row['user'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['userEmail'] || $_POST['getoption'] == $row1['userName'] || $_POST['getoption'] == $row1['userFirstName'] || $_POST['getoption'] == $row1['userLastName'] || $_POST['getoption'] == $row1['userAddress'] || $_POST['getoption'] == $row1['userLocation'] || $_POST['getoption'] == $row1['userZip'] || $_POST['getoption'] == $row1['userTelephone'] || $_POST['getoption'] == $row1['userExt'] || $_POST['getoption'] == $row1['TollFree'] || $_POST['getoption'] == $row1['userFax']) {
                $counter = $row1['counter'];
                $id = $row1['_id'];
                $userEmail = $row1['userEmail'];
                $userName = $row1['userName'];
                $userFirstName = $row1['userFirstName'];
                $userLastName = $row1['userLastName'];
                $userAddress = $row1['userAddress'];
                $userLocation = $row1['userLocation'];
                $userZip = $row1['userZip'];
                $userTelephone = $row1['userTelephone'];
                $userExt = $row1['userExt'];
                $TollFree = $row1['TollFree'];
                $userFax = $row1['userFax'];

                $type = '"text"';

                $userEmailColumn = '"userEmail"';
                $userNameColumn = '"userName"';
                $userFirstNameColumn = '"userFirstName"';
                $userLastNameColumn = '"userLastName"';
                $userAddressColumn = '"userAddress"';
                $userLocationColumn = '"userLocation"';
                $userZipColumn = '"userZip"';
                $userTelephoneColumn = '"userTelephone"';
                $userExtColumn = '"userExt"';
                $TollFreeColumn = '"TollFree"';
                $userFaxColumn = '"userFax"';
                $i++;
                $updateUser = '"updateUser"';

                $c_type1 = '"'.$userEmail.'"';
                $c_type2 = '"'.$userName.'"';
                $c_type3 = '"'.$userFirstName.'"';
                $c_type4 = '"'.$userLastName.'"';
                $c_type5 = '"'.$userAddress.'"';
                $c_type6 = '"'.$userLocation.'"';
                $c_type7 = '"'.$userZip.'"';
                $c_type8 = '"'.$userTelephone.'"';
                $c_type9 = '"'.$userExt.'"';
                $c_type10 = '"'.$TollFree.'"';
                $c_type11 = '"'.$userFax.'"';

                $title1 = '"Email"';
                $title2 = '"User Name"';
                $title3 = '"First Name"';
                $title4 = '"Last Name"';
                $title5 = '"Address"';
                $title6 = '"Location"';
                $title7 = '"Zip"';
                $title8 = '"Telephone"';
                $title9 = '"Ext"';
                $title10 = '"Toll Free"';
                $title11 = '"Fax"';

                $pencilid1 = '"userEmailPencil'.$i.'"';
                $pencilid2 = '"userNamePencil'.$i.'"';
                $pencilid3 = '"userFirstNamePencil'.$i.'"';
                $pencilid4 = '"userLastNamePencil'.$i.'"';
                $pencilid5 = '"userAddressPencil'.$i.'"';
                $pencilid6 = '"userLocationPencil'.$i.'"';
                $pencilid7 = '"userZipPencil'.$i.'"';
                $pencilid8 = '"userTelephonePencil'.$i.'"';
                $pencilid9 = '"userExtPencil'.$i.'"';
                $pencilid10 = '"TollFreePencil'.$i.'"';
                $pencilid11 = '"userFaxPencil'.$i.'"';

                echo "<tr>
                    <th> $i</th>
                    <td class='custom-text' id='userEmail$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='userEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateUser,$type,$id,$userEmailColumn,$title1,$pencilid1)'
                        ></i>
                        $userEmail
                    </td>
                    <td class='custom-text' id='userName$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='userNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateUser,$type,$id,$userNameColumn,$title2,$pencilid2)'
                        ></i>
                        $userName
                    </td>
                    <td class='custom-text' id='userFirstName$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='userFirstNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateUser,$type,$id,$userFirstNameColumn,$title3,$pencilid3)'
                        ></i>
                        $userFirstName
                    </td>
                    <td class='custom-text' id='userLastName$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='userLastNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateUser,$type,$id,$userLastNameColumn,$title4,$pencilid4)'
                        ></i>
                        $userLastName
                    </td>
                    <td class='custom-text' id='userAddress$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='userAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateUser,$type,$id,$userAddressColumn,$title5,$pencilid5)'
                        ></i>
                        $userAddress
                    </td>
                    <td class='custom-text' id='userLocation$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='userLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateUser,$type,$id,$userLocationColumn,$title6,$pencilid6)'
                        ></i>
                        $userLocation
                    </td>
                    <td class='custom-text' id='userZip$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='userZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateUser,$type,$id,$userZipColumn,$title7,$pencilid7)'
                        ></i>
                        $userZip
                    </td>
                    <td class='custom-text' id='userTelephone$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='userTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateUser,$type,$id,$userTelephoneColumn,$title8,$pencilid8)'
                        ></i>
                        $userTelephone
                    </td>
                    <td class='custom-text' id='userExt$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='userExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateUser,$type,$id,$userExtColumn,$title9,$pencilid9)'
                        ></i>
                        $userExt
                    </td>
                    <td class='custom-text' id='TollFree$i'
                        onmouseover='showPencil_s($pencilid10)'
                        onmouseout='hidePencil_s($pencilid10)'
                        >
                        <i id='TollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type10,$updateUser,$type,$id,$TollFreeColumn,$title10,$pencilid10)'
                        ></i>
                        $TollFree
                    </td>
                    <td class='custom-text' id='userFax$i'
                        onmouseover='showPencil_s($pencilid11)'
                        onmouseout='hidePencil_s($pencilid11)'
                        >
                        <i id='userFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type11,$updateUser,$type,$id,$userFaxColumn,$title11,$pencilid11)'
                        ></i>
                        $userFax
                    </td>
                    <td><a href='#' onclick='show_privilege($id)' data-toggle='modal' data-target='#show_privilege' class='btn btn-warning'>Privilege</a></td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteUser($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
        }

        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor = $db->user->find(array('companyID' => $_SESSION['companyId']));
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['user']);
                $total_pages = ceil($total_records / $limit);
            }

            $show = $db->user->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('user' => array('$slice' => [0, $limit]))));
            
            $i = 0;
            $table = "";

            foreach ($show as $row) {
                $show1 = $row['user'];
                foreach ($show1 as $row1) {
                    $counter = $row1['counter'];
                    $id = $row1['_id'];
                    $userEmail = $row1['userEmail'];
                    $userName = $row1['userName'];
                    $userFirstName = $row1['userFirstName'];
                    $userLastName = $row1['userLastName'];
                    $userAddress = $row1['userAddress'];
                    $userLocation = $row1['userLocation'];
                    $userZip = $row1['userZip'];
                    $userTelephone = $row1['userTelephone'];
                    $userExt = $row1['userExt'];
                    $TollFree = $row1['TollFree'];
                    $userFax = $row1['userFax'];

                    $type = '"text"';

                    $userEmailColumn = '"userEmail"';
                    $userNameColumn = '"userName"';
                    $userFirstNameColumn = '"userFirstName"';
                    $userLastNameColumn = '"userLastName"';
                    $userAddressColumn = '"userAddress"';
                    $userLocationColumn = '"userLocation"';
                    $userZipColumn = '"userZip"';
                    $userTelephoneColumn = '"userTelephone"';
                    $userExtColumn = '"userExt"';
                    $TollFreeColumn = '"TollFree"';
                    $userFaxColumn = '"userFax"';
                    $i++;
                    $updateUser = '"updateUser"';

                    $c_type1 = '"'.$userEmail.'"';
                    $c_type2 = '"'.$userName.'"';
                    $c_type3 = '"'.$userFirstName.'"';
                    $c_type4 = '"'.$userLastName.'"';
                    $c_type5 = '"'.$userAddress.'"';
                    $c_type6 = '"'.$userLocation.'"';
                    $c_type7 = '"'.$userZip.'"';
                    $c_type8 = '"'.$userTelephone.'"';
                    $c_type9 = '"'.$userExt.'"';
                    $c_type10 = '"'.$TollFree.'"';
                    $c_type11 = '"'.$userFax.'"';

                    $title1 = '"Email"';
                    $title2 = '"User Name"';
                    $title3 = '"First Name"';
                    $title4 = '"Last Name"';
                    $title5 = '"Address"';
                    $title6 = '"Location"';
                    $title7 = '"Zip"';
                    $title8 = '"Telephone"';
                    $title9 = '"Ext"';
                    $title10 = '"Toll Free"';
                    $title11 = '"Fax"';

                    $pencilid1 = '"userEmailPencil'.$i.'"';
                    $pencilid2 = '"userNamePencil'.$i.'"';
                    $pencilid3 = '"userFirstNamePencil'.$i.'"';
                    $pencilid4 = '"userLastNamePencil'.$i.'"';
                    $pencilid5 = '"userAddressPencil'.$i.'"';
                    $pencilid6 = '"userLocationPencil'.$i.'"';
                    $pencilid7 = '"userZipPencil'.$i.'"';
                    $pencilid8 = '"userTelephonePencil'.$i.'"';
                    $pencilid9 = '"userExtPencil'.$i.'"';
                    $pencilid10 = '"TollFreePencil'.$i.'"';
                    $pencilid11 = '"userFaxPencil'.$i.'"';

                    echo "<tr>
                        <th> $i</th>
                        <td class='custom-text' id='userEmail$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='userEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateUser,$type,$id,$userEmailColumn,$title1,$pencilid1)'
                            ></i>
                            $userEmail
                        </td>
                        <td class='custom-text' id='userName$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='userNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateUser,$type,$id,$userNameColumn,$title2,$pencilid2)'
                            ></i>
                            $userName
                        </td>
                        <td class='custom-text' id='userFirstName$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='userFirstNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateUser,$type,$id,$userFirstNameColumn,$title3,$pencilid3)'
                            ></i>
                            $userFirstName
                        </td>
                        <td class='custom-text' id='userLastName$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='userLastNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateUser,$type,$id,$userLastNameColumn,$title4,$pencilid4)'
                            ></i>
                            $userLastName
                        </td>
                        <td class='custom-text' id='userAddress$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='userAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateUser,$type,$id,$userAddressColumn,$title5,$pencilid5)'
                            ></i>
                            $userAddress
                        </td>
                        <td class='custom-text' id='userLocation$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='userLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateUser,$type,$id,$userLocationColumn,$title6,$pencilid6)'
                            ></i>
                            $userLocation
                        </td>
                        <td class='custom-text' id='userZip$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='userZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateUser,$type,$id,$userZipColumn,$title7,$pencilid7)'
                            ></i>
                            $userZip
                        </td>
                        <td class='custom-text' id='userTelephone$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='userTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateUser,$type,$id,$userTelephoneColumn,$title8,$pencilid8)'
                            ></i>
                            $userTelephone
                        </td>
                        <td class='custom-text' id='userExt$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='userExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateUser,$type,$id,$userExtColumn,$title9,$pencilid9)'
                            ></i>
                            $userExt
                        </td>
                        <td class='custom-text' id='TollFree$i'
                            onmouseover='showPencil_s($pencilid10)'
                            onmouseout='hidePencil_s($pencilid10)'
                            >
                            <i id='TollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type10,$updateUser,$type,$id,$TollFreeColumn,$title10,$pencilid10)'
                            ></i>
                            $TollFree
                        </td>
                        <td class='custom-text' id='userFax$i'
                            onmouseover='showPencil_s($pencilid11)'
                            onmouseout='hidePencil_s($pencilid11)'
                            >
                            <i id='userFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type11,$updateUser,$type,$id,$userFaxColumn,$title11,$pencilid11)'
                            ></i>
                            $userFax
                        </td>
                        <td><a href='#' onclick='show_privilege($id)' data-toggle='modal' data-target='#show_privilege' class='btn btn-warning'>Privilege</a></td>";

                    if ($counter == 0) {
                        echo "<td><a href='#' onclick='deleteUser($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_us') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];

    $cursor = $db->user->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['user']);
        $total_pages = ceil($total_records / $limit);
    }

    $show = $db->user->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('user' => array('$slice' => [$start, $limit]))));
    
    $i = 0;
    $table = "";

    foreach ($show as $row) {
        $show1 = $row['user'];
        foreach ($show1 as $row1) {
            $counter = $row1['counter'];
            $id = $row1['_id'];
            $userEmail = $row1['userEmail'];
            $userName = $row1['userName'];
            $userFirstName = $row1['userFirstName'];
            $userLastName = $row1['userLastName'];
            $userAddress = $row1['userAddress'];
            $userLocation = $row1['userLocation'];
            $userZip = $row1['userZip'];
            $userTelephone = $row1['userTelephone'];
            $userExt = $row1['userExt'];
            $TollFree = $row1['TollFree'];
            $userFax = $row1['userFax'];

            $type = '"text"';

            $userEmailColumn = '"userEmail"';
            $userNameColumn = '"userName"';
            $userFirstNameColumn = '"userFirstName"';
            $userLastNameColumn = '"userLastName"';
            $userAddressColumn = '"userAddress"';
            $userLocationColumn = '"userLocation"';
            $userZipColumn = '"userZip"';
            $userTelephoneColumn = '"userTelephone"';
            $userExtColumn = '"userExt"';
            $TollFreeColumn = '"TollFree"';
            $userFaxColumn = '"userFax"';
            $i++;
            $start += 1;
            
            $updateUser = '"updateUser"';

            $c_type1 = '"'.$userEmail.'"';
            $c_type2 = '"'.$userName.'"';
            $c_type3 = '"'.$userFirstName.'"';
            $c_type4 = '"'.$userLastName.'"';
            $c_type5 = '"'.$userAddress.'"';
            $c_type6 = '"'.$userLocation.'"';
            $c_type7 = '"'.$userZip.'"';
            $c_type8 = '"'.$userTelephone.'"';
            $c_type9 = '"'.$userExt.'"';
            $c_type10 = '"'.$TollFree.'"';
            $c_type11 = '"'.$userFax.'"';

            $title1 = '"Email"';
            $title2 = '"User Name"';
            $title3 = '"First Name"';
            $title4 = '"Last Name"';
            $title5 = '"Address"';
            $title6 = '"Location"';
            $title7 = '"Zip"';
            $title8 = '"Telephone"';
            $title9 = '"Ext"';
            $title10 = '"Toll Free"';
            $title11 = '"Fax"';

            $pencilid1 = '"userEmailPencil'.$i.'"';
            $pencilid2 = '"userNamePencil'.$i.'"';
            $pencilid3 = '"userFirstNamePencil'.$i.'"';
            $pencilid4 = '"userLastNamePencil'.$i.'"';
            $pencilid5 = '"userAddressPencil'.$i.'"';
            $pencilid6 = '"userLocationPencil'.$i.'"';
            $pencilid7 = '"userZipPencil'.$i.'"';
            $pencilid8 = '"userTelephonePencil'.$i.'"';
            $pencilid9 = '"userExtPencil'.$i.'"';
            $pencilid10 = '"TollFreePencil'.$i.'"';
            $pencilid11 = '"userFaxPencil'.$i.'"';

            echo "<tr>
                <th> $start</th>
                <td class='custom-text' id='userEmail$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='userEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateUser,$type,$id,$userEmailColumn,$title1,$pencilid1)'
                    ></i>
                    $userEmail
                </td>
                <td class='custom-text' id='userName$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='userNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateUser,$type,$id,$userNameColumn,$title2,$pencilid2)'
                    ></i>
                    $userName
                </td>
                <td class='custom-text' id='userFirstName$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='userFirstNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateUser,$type,$id,$userFirstNameColumn,$title3,$pencilid3)'
                    ></i>
                    $userFirstName
                </td>
                <td class='custom-text' id='userLastName$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='userLastNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateUser,$type,$id,$userLastNameColumn,$title4,$pencilid4)'
                    ></i>
                    $userLastName
                </td>
                <td class='custom-text' id='userAddress$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='userAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateUser,$type,$id,$userAddressColumn,$title5,$pencilid5)'
                    ></i>
                    $userAddress
                </td>
                <td class='custom-text' id='userLocation$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='userLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateUser,$type,$id,$userLocationColumn,$title6,$pencilid6)'
                    ></i>
                    $userLocation
                </td>
                <td class='custom-text' id='userZip$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='userZipPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateUser,$type,$id,$userZipColumn,$title7,$pencilid7)'
                    ></i>
                    $userZip
                </td>
                <td class='custom-text' id='userTelephone$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='userTelephonePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateUser,$type,$id,$userTelephoneColumn,$title8,$pencilid8)'
                    ></i>
                    $userTelephone
                </td>
                <td class='custom-text' id='userExt$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='userExtPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateUser,$type,$id,$userExtColumn,$title9,$pencilid9)'
                    ></i>
                    $userExt
                </td>
                <td class='custom-text' id='TollFree$i'
                    onmouseover='showPencil_s($pencilid10)'
                    onmouseout='hidePencil_s($pencilid10)'
                    >
                    <i id='TollFreePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type10,$updateUser,$type,$id,$TollFreeColumn,$title10,$pencilid10)'
                    ></i>
                    $TollFree
                </td>
                <td class='custom-text' id='userFax$i'
                    onmouseover='showPencil_s($pencilid11)'
                    onmouseout='hidePencil_s($pencilid11)'
                    >
                    <i id='userFaxPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type11,$updateUser,$type,$id,$userFaxColumn,$title11,$pencilid11)'
                    ></i>
                    $userFax
                </td>
                <td><a href='#' onclick='show_privilege($id)' data-toggle='modal' data-target='#show_privilege' class='btn btn-warning'>Privilege</a></td>";

            if ($counter == 0) {
                echo "<td><a href='#' onclick='deleteUser($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
    }
}