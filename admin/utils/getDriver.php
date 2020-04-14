<?php
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_driver_table') {
    $limit = 100;
    $cursor = $db->driver->find(array('companyID' => $_SESSION['companyId']));
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['driver']);
        $total_pages = ceil($total_records / $limit);
    }

    $show_data = $db->driver->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('driver' => array('$slice' => [0, $limit]))));
    
    $i = 0;
    $table = "";
    $list = "";
    foreach ($show_data as $row) {
        $mainID = $row['_id'];
        $show1 = $row['driver'];
        foreach ($show1 as $row1) {
            $id = $row1['_id'];
            $driverName = $row1['driverName'];
            $driverEmail = $row1['driverEmail'];
            $driverLocation = $row1['driverLocation'];
            $driverSocial = $row1['driverSocial'];
            $dateOfbirth = date("d-m-Y", $row1['dateOfbirth']);
            $dateOfhire = date("d-m-Y", $row1['dateOfhire']);
            $driverLicenseNo = $row1['driverLicenseNo'];
            $driverLicenseIssue = $row1['driverLicenseIssue'];
            $driverLicenseExp = date("d-m-Y", $row1['driverLicenseExp']);

            $masterID = '"'.$id.')'.$mainID.'"';

            $driverNameColumn = '"driverName"';
            $driverEmailColumn = '"driverEmail"';
            $driverLocationColumn = '"driverLocation"';
            $driverSocialColumn = '"driverSocial"';
            $dateOfbirthColumn = '"dateOfbirth"';
            $dateOfhireColumn = '"dateOfhire"';
            $driverLicenseNoColumn = '"driverLicenseNo"';
            $driverLicenseIssueColumn = '"driverLicenseIssue"';
            $driverLicenseExpColumn = '"driverLicenseExp"';
            $i++;
            $type = '"text"';
            $updateDriver = '"updateDriver"';

            $c_type1 = '"'.$driverName.'"';
            $c_type2 = '"'.$driverEmail.'"';
            $c_type3 = '"'.$driverLocation.'"';
            $c_type4 = '"'.$driverSocial.'"';
            $c_type5 = '"'.$dateOfbirth.'"';
            $c_type6 = '"'.$dateOfhire.'"';
            $c_type7 = '"'.$driverLicenseNo.'"';
            $c_type8 = '"'.$driverLicenseIssue.'"';
            $c_type9 = '"'.$driverLicenseExp.'"';

            $title1 = '"Driver Name"';
            $title2 = '"Driver Email"';
            $title3 = '"Location"';
            $title4 = '"Social security"';
            $title5 = '"Date of Birth"';
            $title6 = '"Date of Hire"';
            $title7 = '"License No."';
            $title8 = '"License Issue Date"';
            $title9 = '"License Exp Date"';

            $pencilid1 = '"driverNamePencil'.$i.'"';
            $pencilid2 = '"driverEmailPencil'.$i.'"';
            $pencilid3 = '"driverLocationPencil'.$i.'"';
            $pencilid4 = '"driverSocialPencil'.$i.'"';
            $pencilid5 = '"dateOfbirthPencil'.$i.'"';
            $pencilid6 = '"dateOfhirePencil'.$i.'"';
            $pencilid7 = '"driverLicenseNoPencil'.$i.'"';
            $pencilid8 = '"driverLicenseIssuePencil'.$i.'"';
            $pencilid9 = '"driverLicenseExpPencil'.$i.'"';

            $table .= "<tr>
                <th> $i</th>
                <th class='custom-text' id='driverName$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='driverNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateDriver,$type,$masterID,$driverNameColumn,$title1,$pencilid1)'
                    ></i>
                    $driverName
                </th>
                <td class='custom-text' id='driverEmail$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='driverEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateDriver,$type,$masterID,$driverEmailColumn,$title2,$pencilid2)'
                    ></i>
                    $driverEmail
                </td>
                <td class='custom-text' id='driverLocation$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='driverLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateDriver,$type,$masterID,$driverLocationColumn,$title3,$pencilid3)'
                    ></i>
                    $driverLocation
                </td>
                <td class='custom-text' id='driverSocial$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='driverSocialPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateDriver,$type,$masterID,$driverSocialColumn,$title4,$pencilid4)'
                    ></i>
                    $driverSocial
                </td>
                <td class='custom-text' id='dateOfbirth$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='dateOfbirthPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateDriver,$type,$masterID,$dateOfbirthColumn,$title5,$pencilid5)'
                    ></i>
                    $dateOfbirth
                </td>
                <td class='custom-text' id='dateOfhire$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='dateOfhirePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateDriver,$type,$masterID,$dateOfhireColumn,$title6,$pencilid6)'
                    ></i>
                    $dateOfhire
                </td>
                <td class='custom-text' id='driverLicenseNo$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='driverLicenseNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateDriver,$type,$masterID,$driverLicenseNoColumn,$title7,$pencilid7)'
                    ></i>
                    $driverLicenseNo
                </td>
                <td class='custom-text' id='driverLicenseIssue$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='driverLicenseIssuePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateDriver,$type,$masterID,$driverLicenseIssueColumn,$title8,$pencilid8)'
                    ></i>
                    $driverLicenseIssue
                </td>
                <td class='custom-text' id='driverLicenseExp$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='driverLicenseExpPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateDriver,$type,$masterID,$driverLicenseExpColumn,$title9,$pencilid9)'
                    ></i>
                    $driverLicenseExp
                </td>
                
                <td><a href='#' onclick='deleteDriver($masterID)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
                    <a href='#' onclick='editDriver($id)'><i id='editDriverDetail'
                        data-toggle='tooltip' data-placement='top' title='Edit Detail'
                        class='mdi mdi-file-document-edit-outline editModal'></i></a>
                </td>
            </tr>";

            $value = "'".$id.")&nbsp;".$driverName."'";
            $list .= "<option value=$value></option>";
        }
        echo $table."^".$list;
    }
}

if ($_GET['types'] == 'search_text') {
    $show = $db->driver->find(['companyID' => $_SESSION['companyId']]);
    $i = 0;
    $table = "";
    $list = "";
    foreach ($show as $row) {
        $show1 = $row['driver'];
        foreach ($show1 as $row1) {
            if ($_POST['getoption'] == $row1['driverName'] 
                || $_POST['getoption'] == $row1['driverEmail'] 
                || $_POST['getoption'] == $row1['driverLocation'] 
                || $_POST['getoption'] == $row1['driverSocial'] 
                || $_POST['getoption'] == date("d-m-Y", $row1['dateOfbirth'])
                || $_POST['getoption'] == date("d-m-Y", $row1['dateOfhire']) 
                || $_POST['getoption'] == $row1['driverLicenseNo']
                || $_POST['getoption'] == $row1['driverLicenseIssue']
                || $_POST['getoption'] == date("d-m-Y", $row1['driverLicenseExp'])
            ) { 
                $id = $row1['_id'];
                $driverName = $row1['driverName'];
                $driverEmail = $row1['driverEmail'];
                $driverLocation = $row1['driverLocation'];
                $driverSocial = $row1['driverSocial'];
                $dateOfbirth = date("d-m-Y", $row1['dateOfbirth']);
                $dateOfhire = date("d-m-Y", $row1['dateOfhire']);
                $driverLicenseNo = $row1['driverLicenseNo'];
                $driverLicenseIssue = $row1['driverLicenseIssue'];
                $driverLicenseExp = date("d-m-Y", $row1['driverLicenseExp']);

                $driverNameColumn = '"driverName"';
                $driverEmailColumn = '"driverEmail"';
                $driverLocationColumn = '"driverLocation"';
                $driverSocialColumn = '"driverSocial"';
                $dateOfbirthColumn = '"dateOfbirth"';
                $dateOfhireColumn = '"dateOfhire"';
                $driverLicenseNoColumn = '"driverLicenseNo"';
                $driverLicenseIssueColumn = '"driverLicenseIssue"';
                $driverLicenseExpColumn = '"driverLicenseExp"';
                $i++;
                $type = '"text"';
                $updateDriver = '"updateDriver"';

                $c_type1 = '"'.$driverName.'"';
                $c_type2 = '"'.$driverEmail.'"';
                $c_type3 = '"'.$driverLocation.'"';
                $c_type4 = '"'.$driverSocial.'"';
                $c_type5 = '"'.$dateOfbirth.'"';
                $c_type6 = '"'.$dateOfhire.'"';
                $c_type7 = '"'.$driverLicenseNo.'"';
                $c_type8 = '"'.$driverLicenseIssue.'"';
                $c_type9 = '"'.$driverLicenseExp.'"';

                $title1 = '"Driver Name"';
                $title2 = '"Driver Email"';
                $title3 = '"Location"';
                $title4 = '"Social security"';
                $title5 = '"Date of Birth"';
                $title6 = '"Date of Hire"';
                $title7 = '"License No."';
                $title8 = '"License Issue Date"';
                $title9 = '"License Exp Date"';

                $pencilid1 = '"driverNamePencil'.$i.'"';
                $pencilid2 = '"driverEmailPencil'.$i.'"';
                $pencilid3 = '"driverLocationPencil'.$i.'"';
                $pencilid4 = '"driverSocialPencil'.$i.'"';
                $pencilid5 = '"dateOfbirthPencil'.$i.'"';
                $pencilid6 = '"dateOfhirePencil'.$i.'"';
                $pencilid7 = '"driverLicenseNoPencil'.$i.'"';
                $pencilid8 = '"driverLicenseIssuePencil'.$i.'"';
                $pencilid9 = '"driverLicenseExpPencil'.$i.'"';

                echo "<tr>
                    <th> $i</th>
                    <th class='custom-text' id='driverName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='driverNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateDriver,$type,$id,$driverNameColumn,$title1,$pencilid1)'
                        ></i>
                        $driverName
                    </th>
                    <td class='custom-text' id='driverEmail$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='driverEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateDriver,$type,$id,$driverEmailColumn,$title2,$pencilid2)'
                        ></i>
                        $driverEmail
                    </td>
                    <td class='custom-text' id='driverLocation$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='driverLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateDriver,$type,$id,$driverLocationColumn,$title3,$pencilid3)'
                        ></i>
                        $driverLocation
                    </td>
                    <td class='custom-text' id='driverSocial$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='driverSocialPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateDriver,$type,$id,$driverSocialColumn,$title4,$pencilid4)'
                        ></i>
                        $driverSocial
                    </td>
                    <td class='custom-text' id='dateOfbirth$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='dateOfbirthPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateDriver,$type,$id,$dateOfbirthColumn,$title5,$pencilid5)'
                        ></i>
                        $dateOfbirth
                    </td>
                    <td class='custom-text' id='dateOfhire$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='dateOfhirePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateDriver,$type,$id,$dateOfhireColumn,$title6,$pencilid6)'
                        ></i>
                        $dateOfhire
                    </td>
                    <td class='custom-text' id='driverLicenseNo$i'
                        onmouseover='showPencil_s($pencilid7)'
                        onmouseout='hidePencil_s($pencilid7)'
                        >
                        <i id='driverLicenseNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type7,$updateDriver,$type,$id,$driverLicenseNoColumn,$title7,$pencilid7)'
                        ></i>
                        $driverLicenseNo
                    </td>
                    <td class='custom-text' id='driverLicenseIssue$i'
                        onmouseover='showPencil_s($pencilid8)'
                        onmouseout='hidePencil_s($pencilid8)'
                        >
                        <i id='driverLicenseIssuePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type8,$updateDriver,$type,$id,$driverLicenseIssueColumn,$title8,$pencilid8)'
                        ></i>
                        $driverLicenseIssue
                    </td>
                    <td class='custom-text' id='driverLicenseExp$i'
                        onmouseover='showPencil_s($pencilid9)'
                        onmouseout='hidePencil_s($pencilid9)'
                        >
                        <i id='driverLicenseExpPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type9,$updateDriver,$type,$id,$driverLicenseExpColumn,$title9,$pencilid9)'
                        ></i>
                        $driverLicenseExp
                    </td>
                    
                    <td><a href='#' onclick='deleteDriver($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
                        <a href='#' onclick='editDriver($id)'><i id='editDriverDetail'
                            data-toggle='tooltip' data-placement='top' title='Edit Detail'
                            class='mdi mdi-file-document-edit-outline editModal'></i></a>
                    </td>
                </tr>";
            }
        }

        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor = $db->driver->find(array('companyID' => $_SESSION['companyId']));
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['driver']);
                $total_pages = ceil($total_records / $limit);
            }

            $show_data = $db->driver->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('driver' => array('$slice' => [0, $limit]))));
            
            $i = 0;
            $table = "";
            $list = "";
            foreach ($show_data as $row) {
                $show1 = $row['driver'];
                foreach ($show1 as $row1) {
                    $id = $row1['_id'];
                    $driverName = $row1['driverName'];
                    $driverEmail = $row1['driverEmail'];
                    $driverLocation = $row1['driverLocation'];
                    $driverSocial = $row1['driverSocial'];
                    $dateOfbirth = date("d-m-Y", $row1['dateOfbirth']);
                    $dateOfhire = date("d-m-Y", $row1['dateOfhire']);
                    $driverLicenseNo = $row1['driverLicenseNo'];
                    $driverLicenseIssue = $row1['driverLicenseIssue'];
                    $driverLicenseExp = date("d-m-Y", $row1['driverLicenseExp']);

                    $driverNameColumn = '"driverName"';
                    $driverEmailColumn = '"driverEmail"';
                    $driverLocationColumn = '"driverLocation"';
                    $driverSocialColumn = '"driverSocial"';
                    $dateOfbirthColumn = '"dateOfbirth"';
                    $dateOfhireColumn = '"dateOfhire"';
                    $driverLicenseNoColumn = '"driverLicenseNo"';
                    $driverLicenseIssueColumn = '"driverLicenseIssue"';
                    $driverLicenseExpColumn = '"driverLicenseExp"';
                    $i++;
                    $type = '"text"';
                    $updateDriver = '"updateDriver"';

                    $c_type1 = '"'.$driverName.'"';
                    $c_type2 = '"'.$driverEmail.'"';
                    $c_type3 = '"'.$driverLocation.'"';
                    $c_type4 = '"'.$driverSocial.'"';
                    $c_type5 = '"'.$dateOfbirth.'"';
                    $c_type6 = '"'.$dateOfhire.'"';
                    $c_type7 = '"'.$driverLicenseNo.'"';
                    $c_type8 = '"'.$driverLicenseIssue.'"';
                    $c_type9 = '"'.$driverLicenseExp.'"';

                    $title1 = '"Driver Name"';
                    $title2 = '"Driver Email"';
                    $title3 = '"Location"';
                    $title4 = '"Social security"';
                    $title5 = '"Date of Birth"';
                    $title6 = '"Date of Hire"';
                    $title7 = '"License No."';
                    $title8 = '"License Issue Date"';
                    $title9 = '"License Exp Date"';

                    $pencilid1 = '"driverNamePencil'.$i.'"';
                    $pencilid2 = '"driverEmailPencil'.$i.'"';
                    $pencilid3 = '"driverLocationPencil'.$i.'"';
                    $pencilid4 = '"driverSocialPencil'.$i.'"';
                    $pencilid5 = '"dateOfbirthPencil'.$i.'"';
                    $pencilid6 = '"dateOfhirePencil'.$i.'"';
                    $pencilid7 = '"driverLicenseNoPencil'.$i.'"';
                    $pencilid8 = '"driverLicenseIssuePencil'.$i.'"';
                    $pencilid9 = '"driverLicenseExpPencil'.$i.'"';

                   echo "<tr>
                        <th> $i</th>
                        <td class='custom-text' id='driverName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='driverNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateDriver,$type,$id,$driverNameColumn,$title1,$pencilid1)'
                            ></i>
                            $driverName
                        </td>
                        <td class='custom-text' id='driverEmail$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='driverEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateDriver,$type,$id,$driverEmailColumn,$title2,$pencilid2)'
                            ></i>
                            $driverEmail
                        </td>
                        <td class='custom-text' id='driverLocation$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='driverLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateDriver,$type,$id,$driverLocationColumn,$title3,$pencilid3)'
                            ></i>
                            $driverLocation
                        </td>
                        <td class='custom-text' id='driverSocial$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='driverSocialPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateDriver,$type,$id,$driverSocialColumn,$title4,$pencilid4)'
                            ></i>
                            $driverSocial
                        </td>
                        <td class='custom-text' id='dateOfbirth$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='dateOfbirthPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateDriver,$type,$id,$dateOfbirthColumn,$title5,$pencilid5)'
                            ></i>
                            $dateOfbirth
                        </td>
                        <td class='custom-text' id='dateOfhire$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='dateOfhirePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateDriver,$type,$id,$dateOfhireColumn,$title6,$pencilid6)'
                            ></i>
                            $dateOfhire
                        </td>
                        <td class='custom-text' id='driverLicenseNo$i'
                            onmouseover='showPencil_s($pencilid7)'
                            onmouseout='hidePencil_s($pencilid7)'
                            >
                            <i id='driverLicenseNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type7,$updateDriver,$type,$id,$driverLicenseNoColumn,$title7,$pencilid7)'
                            ></i>
                            $driverLicenseNo
                        </td>
                        <td class='custom-text' id='driverLicenseIssue$i'
                            onmouseover='showPencil_s($pencilid8)'
                            onmouseout='hidePencil_s($pencilid8)'
                            >
                            <i id='driverLicenseIssuePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type8,$updateDriver,$type,$id,$driverLicenseIssueColumn,$title8,$pencilid8)'
                            ></i>
                            $driverLicenseIssue
                        </td>
                        <td class='custom-text' id='driverLicenseExp$i'
                            onmouseover='showPencil_s($pencilid9)'
                            onmouseout='hidePencil_s($pencilid9)'
                            >
                            <i id='driverLicenseExpPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type9,$updateDriver,$type,$id,$driverLicenseExpColumn,$title9,$pencilid9)'
                            ></i>
                            $driverLicenseExp
                        </td>
                        
                        <td><a href='#' onclick='deleteDriver($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
                            <a href='#' onclick='editDriver($id)'><i id='editDriverDetail'
                                data-toggle='tooltip' data-placement='top' title='Edit Detail'
                                class='mdi mdi-file-document-edit-outline editModal'></i></a>
                        </td>
                    </tr>";
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_drive') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];

    $cursor = $db->driver->find(array('companyID' => $_SESSION['companyId']));

    foreach ($cursor as $value) {
        $total_records = sizeof($value['driver']);
        $total_pages = ceil($total_records / $limit);
    }

    $show_data = $db->driver->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('driver' => array('$slice' => [$start, $limit]))));
    
    $i = 0;
    $table = "";
    $list = "";

    foreach ($show_data as $row) {
        $show1 = $row['driver'];
        foreach ($show1 as $row1) {
            $id = $row1['_id'];
            $driverName = $row1['driverName'];
            $driverEmail = $row1['driverEmail'];
            $driverLocation = $row1['driverLocation'];
            $driverSocial = $row1['driverSocial'];
            $dateOfbirth = date("d-m-Y", $row1['dateOfbirth']);
            $dateOfhire = date("d-m-Y", $row1['dateOfhire']);
            $driverLicenseNo = $row1['driverLicenseNo'];
            $driverLicenseIssue = $row1['driverLicenseIssue'];
            $driverLicenseExp = date("d-m-Y", $row1['driverLicenseExp']);

            $driverNameColumn = '"driverName"';
            $driverEmailColumn = '"driverEmail"';
            $driverLocationColumn = '"driverLocation"';
            $driverSocialColumn = '"driverSocial"';
            $dateOfbirthColumn = '"dateOfbirth"';
            $dateOfhireColumn = '"dateOfhire"';
            $driverLicenseNoColumn = '"driverLicenseNo"';
            $driverLicenseIssueColumn = '"driverLicenseIssue"';
            $driverLicenseExpColumn = '"driverLicenseExp"';
            
            $i++;
            $type = '"text"';
            $updateDriver = '"updateDriver"';

            $c_type1 = '"'.$driverName.'"';
            $c_type2 = '"'.$driverEmail.'"';
            $c_type3 = '"'.$driverLocation.'"';
            $c_type4 = '"'.$driverSocial.'"';
            $c_type5 = '"'.$dateOfbirth.'"';
            $c_type6 = '"'.$dateOfhire.'"';
            $c_type7 = '"'.$driverLicenseNo.'"';
            $c_type8 = '"'.$driverLicenseIssue.'"';
            $c_type9 = '"'.$driverLicenseExp.'"';

            $title1 = '"Driver Name"';
            $title2 = '"Driver Email"';
            $title3 = '"Location"';
            $title4 = '"Social security"';
            $title5 = '"Date of Birth"';
            $title6 = '"Date of Hire"';
            $title7 = '"License No."';
            $title8 = '"License Issue Date"';
            $title9 = '"License Exp Date"';

            $pencilid1 = '"driverNamePencil'.$i.'"';
            $pencilid2 = '"driverEmailPencil'.$i.'"';
            $pencilid3 = '"driverLocationPencil'.$i.'"';
            $pencilid4 = '"driverSocialPencil'.$i.'"';
            $pencilid5 = '"dateOfbirthPencil'.$i.'"';
            $pencilid6 = '"dateOfhirePencil'.$i.'"';
            $pencilid7 = '"driverLicenseNoPencil'.$i.'"';
            $pencilid8 = '"driverLicenseIssuePencil'.$i.'"';
            $pencilid9 = '"driverLicenseExpPencil'.$i.'"';

            echo "<tr>
                <th> $i</th>
                <th class='custom-text' id='driverName$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='driverNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateDriver,$type,$id,$driverNameColumn,$title1,$pencilid1)'
                    ></i>
                    $driverName
                </th>
                <td class='custom-text' id='driverEmail$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='driverEmailPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateDriver,$type,$id,$driverEmailColumn,$title2,$pencilid2)'
                    ></i>
                    $driverEmail
                </td>
                <td class='custom-text' id='driverLocation$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='driverLocationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateDriver,$type,$id,$driverLocationColumn,$title3,$pencilid3)'
                    ></i>
                    $driverLocation
                </td>
                <td class='custom-text' id='driverSocial$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='driverSocialPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateDriver,$type,$id,$driverSocialColumn,$title4,$pencilid4)'
                    ></i>
                    $driverSocial
                </td>
                <td class='custom-text' id='dateOfbirth$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='dateOfbirthPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateDriver,$type,$id,$dateOfbirthColumn,$title5,$pencilid5)'
                    ></i>
                    $dateOfbirth
                </td>
                <td class='custom-text' id='dateOfhire$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='dateOfhirePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateDriver,$type,$id,$dateOfhireColumn,$title6,$pencilid6)'
                    ></i>
                    $dateOfhire
                </td>
                <td class='custom-text' id='driverLicenseNo$i'
                    onmouseover='showPencil_s($pencilid7)'
                    onmouseout='hidePencil_s($pencilid7)'
                    >
                    <i id='driverLicenseNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type7,$updateDriver,$type,$id,$driverLicenseNoColumn,$title7,$pencilid7)'
                    ></i>
                    $driverLicenseNo
                </td>
                <td class='custom-text' id='driverLicenseIssue$i'
                    onmouseover='showPencil_s($pencilid8)'
                    onmouseout='hidePencil_s($pencilid8)'
                    >
                    <i id='driverLicenseIssuePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type8,$updateDriver,$type,$id,$driverLicenseIssueColumn,$title8,$pencilid8)'
                    ></i>
                    $driverLicenseIssue
                </td>
                <td class='custom-text' id='driverLicenseExp$i'
                    onmouseover='showPencil_s($pencilid9)'
                    onmouseout='hidePencil_s($pencilid9)'
                    >
                    <i id='driverLicenseExpPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type9,$updateDriver,$type,$id,$driverLicenseExpColumn,$title9,$pencilid9)'
                    ></i>
                    $driverLicenseExp
                </td>
                
                <td><a href='#' onclick='deleteDriver($id)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></a></i>
                    <a href='#' onclick='editDriver($id)'><i id='editDriverDetail'
                        data-toggle='tooltip' data-placement='top' title='Edit Detail'
                        class='mdi mdi-file-document-edit-outline editModal'></i></a>
                </td>
            </tr>";
        }
    }
}