<?php 
session_start();
$helper = "helper";
require "../../database/connection.php";

if ($_GET['types'] == 'live_toll_table') {
    $limit = 100;
    $cursor =  $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['tolls']);
        $total_pages = ceil($total_records / $limit);
    }
    
    $g_data = $db->ifta_toll->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('tolls' => array('$slice' => [0, $limit]))));
    
    $i = 0;
    $table = "";

    foreach ($g_data as $data) {
        $toll_s = $data['tolls'];

        foreach ($toll_s as $toll) {
            $counter = $toll['counter'];
            $id = $toll['_id'];
            $invoiceNumber = $toll['invoiceNumber'];
            $tollDate = $toll['tollDate'];
            $transType = $toll['transType'];
            $location = $toll['location'];
            $transponder = $toll['transponder'];
            $amount = $toll['amount'];
            $licensePlate = $toll['licensePlate'];
            $truckNo = $toll['truckNo'];
            
            $tollDateColumn = '"tollDate"';
            $transTypeColumn = '"transType"';
            $locationColumn = '"location"';
            $transponderColumn = '"transponder"';
            $amountColumn = '"amount"';
            $licensePlateColumn = '"licensePlate"';
            
            $i++;
            $type = '"text"';
            $updateTolls = '"updateTolls"';

            $c_type1 = '"'.$tollDate.'"';
            $c_type2 = '"'.$transType.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$transponder.'"';
            $c_type5 = '"'.$amount.'"';
            $c_type6 = '"'.$licensePlate.'"';
            
            $title1 = '"Toll Date"';
            $title2 = '"Transaction Type"';
            $title3 = '"Location"';
            $title4 = '"Transponder"';
            $title5 = '"Amount"';
            $title6 = '"License Plate"';

            $pencilid1 = '"tollDatePencil'.$i.'"';
            $pencilid2 = '"transTypePencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"transponderPencil'.$i.'"';
            $pencilid5 = '"amountPencil'.$i.'"';
            $pencilid6 = '"licensePlatePencil'.$i.'"';;

            echo "<tr>
                <td> $i</td>
                <td> $invoiceNumber</td>
                <td class='custom-text' id='tollDate$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='tollDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateTolls,$type,$id,$tollDateColumn,$title1,$pencilid1)'
                    ></i>
                    $tollDate
                </td>
                <td class='custom-text' id='transType$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='transTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateTolls,$type,$id,$transTypeColumn,$title2,$pencilid2)'
                    ></i>
                    $transType
                </td>
                <td class='custom-text' id='location$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateTolls,$type,$id,$locationColumn,$title3,$pencilid3)'
                    ></i>
                    $location
                </td>
                <td class='custom-text' id='transponder$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateTolls,$type,$id,$transponderColumn,$title4,$pencilid4)'
                    ></i>
                    $transponder
                </td>
                <td class='custom-text' id='amount$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='amountPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateTolls,$type,$id,$amountColumn,$title5,$pencilid5)'
                    ></i>
                    $amount
                </td>
                <td class='custom-text' id='licensePlate$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateTolls,$type,$id,$licensePlateColumn,$title6,$pencilid6)'
                    ></i>
                    $licensePlate
                </td>
                <td>$truckNo</td>"; 

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deleteTolls($id,$truckNo)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
    }
    //echo $table;
}

if ($_GET['types'] == 'search_text') {
    $g_data = $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
    
    $i = 0;
    foreach ($g_data as $data) {
        $toll_s = $data['tolls'];

        foreach ($toll_s as $toll) {
            $counter = $toll['counter'];
            $id = $toll['_id'];
            $invoiceNumber = $toll['invoiceNumber'];
            $tollDate = $toll['tollDate'];
            $transType = $toll['transType'];
            $location = $toll['location'];
            $transponder = $toll['transponder'];
            $amount = $toll['amount'];
            $licensePlate = $toll['licensePlate'];
            $truckNo = $toll['truckNo'];

            if ($_POST['getoption'] == $invoiceNumber 
                || $_POST['getoption'] == $tollDate
                || $_POST['getoption'] == $transType
                || $_POST['getoption'] == $location
                || $_POST['getoption'] == $transponder
                || $_POST['getoption'] == $amount
                || $_POST['getoption'] == $licensePlate
                || $_POST['getoption'] == $truckNo
            ) {
                $tollDateColumn = '"tollDate"';
                $transTypeColumn = '"transType"';
                $locationColumn = '"location"';
                $transponderColumn = '"transponder"';
                $amountColumn = '"amount"';
                $licensePlateColumn = '"licensePlate"';
                
                $i++;
                $type = '"text"';
                $updateTolls = '"updateTolls"';

                $c_type1 = '"'.$tollDate.'"';
                $c_type2 = '"'.$transType.'"';
                $c_type3 = '"'.$location.'"';
                $c_type4 = '"'.$transponder.'"';
                $c_type5 = '"'.$amount.'"';
                $c_type6 = '"'.$licensePlate.'"';
                
                $title1 = '"Toll Date"';
                $title2 = '"Transaction Type"';
                $title3 = '"Location"';
                $title4 = '"Transponder"';
                $title5 = '"Amount"';
                $title6 = '"License Plate"';

                $pencilid1 = '"tollDatePencil'.$i.'"';
                $pencilid2 = '"transTypePencil'.$i.'"';
                $pencilid3 = '"locationPencil'.$i.'"';
                $pencilid4 = '"transponderPencil'.$i.'"';
                $pencilid5 = '"amountPencil'.$i.'"';
                $pencilid6 = '"licensePlatePencil'.$i.'"';;

                echo "<tr>
                    <td> $i</td>
                    <td> $invoiceNumber</td>
                    <td class='custom-text' id='tollDate$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='tollDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateTolls,$type,$id,$tollDateColumn,$title1,$pencilid1)'
                        ></i>
                        $tollDate
                    </td>
                    <td class='custom-text' id='transType$i'
                        onmouseover='showPencil_s($pencilid2)'
                        onmouseout='hidePencil_s($pencilid2)'
                        >
                        <i id='transTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type2,$updateTolls,$type,$id,$transTypeColumn,$title2,$pencilid2)'
                        ></i>
                        $transType
                    </td>
                    <td class='custom-text' id='location$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateTolls,$type,$id,$locationColumn,$title3,$pencilid3)'
                        ></i>
                        $location
                    </td>
                    <td class='custom-text' id='transponder$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateTolls,$type,$id,$transponderColumn,$title4,$pencilid4)'
                        ></i>
                        $transponder
                    </td>
                    <td class='custom-text' id='amount$i'
                        onmouseover='showPencil_s($pencilid5)'
                        onmouseout='hidePencil_s($pencilid5)'
                        >
                        <i id='amountPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type5,$updateTolls,$type,$id,$amountColumn,$title5,$pencilid5)'
                        ></i>
                        $amount
                    </td>
                    <td class='custom-text' id='licensePlate$i'
                        onmouseover='showPencil_s($pencilid6)'
                        onmouseout='hidePencil_s($pencilid6)'
                        >
                        <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type6,$updateTolls,$type,$id,$licensePlateColumn,$title6,$pencilid6)'
                        ></i>
                        $licensePlate
                    </td>
                    <td>$truckNo</td>"; 

                if ($counter == 0) { 
                    echo "<td><a href='#' onclick='deleteTolls($id,$truckNo)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }                            
            }
        }
        if ($_POST['getoption'] == "") {
            $limit = 100;
            $cursor =  $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
            
            foreach ($cursor as $value) {
                $total_records = sizeof($value['tolls']);
                $total_pages = ceil($total_records / $limit);
            }
            
            $g_data = $db->ifta_toll->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('tolls' => array('$slice' => [0, $limit]))));
            
            $table = "";

            foreach ($g_data as $data) {
                $toll_s = $data['tolls'];

                foreach ($toll_s as $toll) {
                    $counter = $toll['counter'];
                    $id = $toll['_id'];
                    $invoiceNumber = $toll['invoiceNumber'];
                    $tollDate = $toll['tollDate'];
                    $transType = $toll['transType'];
                    $location = $toll['location'];
                    $transponder = $toll['transponder'];
                    $amount = $toll['amount'];
                    $licensePlate = $toll['licensePlate'];
                    $truckNo = $toll['truckNo'];
                    
                    $tollDateColumn = '"tollDate"';
                    $transTypeColumn = '"transType"';
                    $locationColumn = '"location"';
                    $transponderColumn = '"transponder"';
                    $amountColumn = '"amount"';
                    $licensePlateColumn = '"licensePlate"';
                    
                    $i++;
                    $type = '"text"';
                    $updateTolls = '"updateTolls"';

                    $c_type1 = '"'.$tollDate.'"';
                    $c_type2 = '"'.$transType.'"';
                    $c_type3 = '"'.$location.'"';
                    $c_type4 = '"'.$transponder.'"';
                    $c_type5 = '"'.$amount.'"';
                    $c_type6 = '"'.$licensePlate.'"';
                    
                    $title1 = '"Toll Date"';
                    $title2 = '"Transaction Type"';
                    $title3 = '"Location"';
                    $title4 = '"Transponder"';
                    $title5 = '"Amount"';
                    $title6 = '"License Plate"';

                    $pencilid1 = '"tollDatePencil'.$i.'"';
                    $pencilid2 = '"transTypePencil'.$i.'"';
                    $pencilid3 = '"locationPencil'.$i.'"';
                    $pencilid4 = '"transponderPencil'.$i.'"';
                    $pencilid5 = '"amountPencil'.$i.'"';
                    $pencilid6 = '"licensePlatePencil'.$i.'"';;

                    echo "<tr>
                        <td> $i</td>
                        <td> $invoiceNumber</td>
                        <td class='custom-text' id='tollDate$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='tollDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateTolls,$type,$id,$tollDateColumn,$title1,$pencilid1)'
                            ></i>
                            $tollDate
                        </td>
                        <td class='custom-text' id='transType$i'
                            onmouseover='showPencil_s($pencilid2)'
                            onmouseout='hidePencil_s($pencilid2)'
                            >
                            <i id='transTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type2,$updateTolls,$type,$id,$transTypeColumn,$title2,$pencilid2)'
                            ></i>
                            $transType
                        </td>
                        <td class='custom-text' id='location$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateTolls,$type,$id,$locationColumn,$title3,$pencilid3)'
                            ></i>
                            $location
                        </td>
                        <td class='custom-text' id='transponder$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateTolls,$type,$id,$transponderColumn,$title4,$pencilid4)'
                            ></i>
                            $transponder
                        </td>
                        <td class='custom-text' id='amount$i'
                            onmouseover='showPencil_s($pencilid5)'
                            onmouseout='hidePencil_s($pencilid5)'
                            >
                            <i id='amountPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type5,$updateTolls,$type,$id,$amountColumn,$title5,$pencilid5)'
                            ></i>
                            $amount
                        </td>
                        <td class='custom-text' id='licensePlate$i'
                            onmouseover='showPencil_s($pencilid6)'
                            onmouseout='hidePencil_s($pencilid6)'
                            >
                            <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type6,$updateTolls,$type,$id,$licensePlateColumn,$title6,$pencilid6)'
                            ></i>
                            $licensePlate
                        </td>
                        <td>$truckNo</td>"; 

                    if ($counter == 0) { 
                        echo "<td><a href='#' onclick='deleteTolls($id,$truckNo)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }
        }
    }
}

if ($_GET['types'] == 'paginate_ifta_toll') {
    $start = (int)$_POST['start'];
    $limit = (int)$_POST['limit'];
    
    $cursor =  $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
    
    foreach ($cursor as $value) {
        $total_records = sizeof($value['tolls']);
        $total_pages = ceil($total_records / $limit);
    }
    
    $g_data = $db->ifta_toll->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('tolls' => array('$slice' => [$start, $limit]))));
    
    $i = 0;
    $table = "";

    foreach ($g_data as $data) {
        $toll_s = $data['tolls'];

        foreach ($toll_s as $toll) {
            $counter = $toll['counter'];
            $id = $toll['_id'];
            $invoiceNumber = $toll['invoiceNumber'];
            $tollDate = $toll['tollDate'];
            $transType = $toll['transType'];
            $location = $toll['location'];
            $transponder = $toll['transponder'];
            $amount = $toll['amount'];
            $licensePlate = $toll['licensePlate'];
            $truckNo = $toll['truckNo'];
            
            $tollDateColumn = '"tollDate"';
            $transTypeColumn = '"transType"';
            $locationColumn = '"location"';
            $transponderColumn = '"transponder"';
            $amountColumn = '"amount"';
            $licensePlateColumn = '"licensePlate"';
            
            $i++;
            $start+= 1;
            $type = '"text"';
            $updateTolls = '"updateTolls"';

            $c_type1 = '"'.$tollDate.'"';
            $c_type2 = '"'.$transType.'"';
            $c_type3 = '"'.$location.'"';
            $c_type4 = '"'.$transponder.'"';
            $c_type5 = '"'.$amount.'"';
            $c_type6 = '"'.$licensePlate.'"';
            
            $title1 = '"Toll Date"';
            $title2 = '"Transaction Type"';
            $title3 = '"Location"';
            $title4 = '"Transponder"';
            $title5 = '"Amount"';
            $title6 = '"License Plate"';

            $pencilid1 = '"tollDatePencil'.$i.'"';
            $pencilid2 = '"transTypePencil'.$i.'"';
            $pencilid3 = '"locationPencil'.$i.'"';
            $pencilid4 = '"transponderPencil'.$i.'"';
            $pencilid5 = '"amountPencil'.$i.'"';
            $pencilid6 = '"licensePlatePencil'.$i.'"';;

            echo "<tr>
                <td> $start</td>
                <td> $invoiceNumber</td>
                <td class='custom-text' id='tollDate$i'
                    onmouseover='showPencil_s($pencilid1)'
                    onmouseout='hidePencil_s($pencilid1)'
                    >
                    <i id='tollDatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type1,$updateTolls,$type,$id,$tollDateColumn,$title1,$pencilid1)'
                    ></i>
                    $tollDate
                </td>
                <td class='custom-text' id='transType$i'
                    onmouseover='showPencil_s($pencilid2)'
                    onmouseout='hidePencil_s($pencilid2)'
                    >
                    <i id='transTypePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type2,$updateTolls,$type,$id,$transTypeColumn,$title2,$pencilid2)'
                    ></i>
                    $transType
                </td>
                <td class='custom-text' id='location$i'
                    onmouseover='showPencil_s($pencilid3)'
                    onmouseout='hidePencil_s($pencilid3)'
                    >
                    <i id='locationPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type3,$updateTolls,$type,$id,$locationColumn,$title3,$pencilid3)'
                    ></i>
                    $location
                </td>
                <td class='custom-text' id='transponder$i'
                    onmouseover='showPencil_s($pencilid4)'
                    onmouseout='hidePencil_s($pencilid4)'
                    >
                    <i id='transponderPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type4,$updateTolls,$type,$id,$transponderColumn,$title4,$pencilid4)'
                    ></i>
                    $transponder
                </td>
                <td class='custom-text' id='amount$i'
                    onmouseover='showPencil_s($pencilid5)'
                    onmouseout='hidePencil_s($pencilid5)'
                    >
                    <i id='amountPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type5,$updateTolls,$type,$id,$amountColumn,$title5,$pencilid5)'
                    ></i>
                    $amount
                </td>
                <td class='custom-text' id='licensePlate$i'
                    onmouseover='showPencil_s($pencilid6)'
                    onmouseout='hidePencil_s($pencilid6)'
                    >
                    <i id='licensePlatePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                        onclick='updateTableColumn($c_type6,$updateTolls,$type,$id,$licensePlateColumn,$title6,$pencilid6)'
                    ></i>
                    $licensePlate
                </td>
                <td>$truckNo</td>"; 

            if ($counter == 0) { 
                echo "<td><a href='#' onclick='deleteTolls($id,$truckNo)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
            } else {
                echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
            }
        }
    }
}

?>