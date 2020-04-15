<?php
    session_start();
    $helper = "helper";
    require "../../database/connection.php";

    if ($_GET['types'] == 'live_sub_credit') {
        $limit = 100;
        $cursor = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']));
    
        foreach ($cursor as $value) {
            $total_records = sizeof($value['sub_credit']);
            $total_pages = ceil($total_records / $limit);
        }

        $g_data = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('sub_credit' => array('$slice' => [0, $limit]))));
        
        $i = 0;
        $table = "";
        $pages = "";

        foreach ($g_data as $data) {
            $sub_credit = $data['sub_credit'];
            foreach ($sub_credit as $admin) {
                $counter = $admin['counter'];
                $id = $admin['_id'];
                $displayName = $admin['displayName'];
                $mainCard = $admin['mainCard'];
                $cardHolderName = $admin['cardHolderName'];
                $cardNo = $admin['cardNo'];

                $displayNameColumn = '"displayName"';
                $mainCardColumn = '"mainCard"';
                $cardHolderNameColumn = '"cardHolderName"';
                $cardNoColumn = '"cardNo"';
                $type = '"text"';
                $i++;
                $updateSubCredit = '"updateSubCredit"';

                $c_type1 = '"'.$displayName.'"';
                $c_type2 = '"'.$mainCard.'"';
                $c_type3 = '"'.$cardHolderName.'"';
                $c_type4 = '"'.$cardNo.'"';
                $title1 = '"Name of Display"';
                $title2 = '"Main Card"';
                $title3 = '"Card Holder Name"';
                $title4 = '"Card No"';
                $pencilid1 = '"displayNamePencil'.$i.'"';
                $pencilid2 = '"mainCardPencil'.$i.'"';
                $pencilid3 = '"cardHolderNamePencil'.$i.'"';
                $pencilid4 = '"cardNoPencil'.$i.'"';

                $table .= "<tr>
                    <th> $i</th>
                    <td class='custom-text' id='displayName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateSubCredit,$type,$id,$displayNameColumn,$title1,$pencilid1)'
                        ></i>
                        $displayName
                    </td>
                    <td class='custom-text'>
                        $mainCard
                    </td>
                    <td class='custom-text' id='cardHolderName$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateSubCredit,$type,$id,$cardHolderNameColumn,$title3,$pencilid3)'
                        ></i>
                        $cardHolderName
                    </td>
                    <td class='custom-text' id='cardNo$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateSubCredit,$type,$id,$cardNoColumn,$title4,$pencilid4)'
                        ></i>
                        $cardNo
                    </td>";

                if ($counter == 0) {
                    $table .= "<td><a href='#' onclick='deleteSubCredit($id,$mainCard)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    $table .= "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
            
            $fun_nm = '"paginate_subc_card"';
            $p_no = '"page_no"';

            $pages .= "<li id='bank_previous' style='display:none'>
                <a class='page-link btn btn-secondary waves-effect'
                    onclick='previous_page($fun_nm,$p_no,$limit,$total_pages)'>Previous</a>
                </li>
                <select class='form-control' id='page_active'
                    onchange='paginate_subc_card(this.value * $limit,$limit,$total_pages)'>";
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
        $g_data = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);

        $i = 0;
        
        foreach ($g_data as $data) {
            $sub_credit = $data['sub_credit'];
            foreach ($sub_credit as $admin) {
                if ($_POST['getoption'] == $admin['displayName'] || $_POST['getoption'] == $admin['mainCard'] || $_POST['getoption'] == $admin['cardHolderName'] || $_POST['getoption'] == $admin['cardNo']) {
                    $counter = $admin['counter'];
                    $id = $admin['_id'];
                    $displayName = $admin['displayName'];
                    $mainCard = $admin['mainCard'];
                    $cardHolderName = $admin['cardHolderName'];
                    $cardNo = $admin['cardNo'];

                    $displayNameColumn = '"displayName"';
                    $mainCardColumn = '"mainCard"';
                    $cardHolderNameColumn = '"cardHolderName"';
                    $cardNoColumn = '"cardNo"';
                    $type = '"text"';
                    $i++;
                    $updateSubCredit = '"updateSubCredit"';

                    $c_type1 = '"'.$displayName.'"';
                    $c_type2 = '"'.$mainCard.'"';
                    $c_type3 = '"'.$cardHolderName.'"';
                    $c_type4 = '"'.$cardNo.'"';
                    $title1 = '"Name of Display"';
                    $title2 = '"Main Card"';
                    $title3 = '"Card Holder Name"';
                    $title4 = '"Card No"';
                    $pencilid1 = '"displayNamePencil'.$i.'"';
                    $pencilid2 = '"mainCardPencil'.$i.'"';
                    $pencilid3 = '"cardHolderNamePencil'.$i.'"';
                    $pencilid4 = '"cardNoPencil'.$i.'"';

                    echo "<tr>
                        <th> $i</th>
                        <td class='custom-text' id='displayName$i'
                            onmouseover='showPencil_s($pencilid1)'
                            onmouseout='hidePencil_s($pencilid1)'
                            >
                            <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type1,$updateSubCredit,$type,$id,$displayNameColumn,$title1,$pencilid1)'
                            ></i>
                            $displayName
                        </td>
                        <td class='custom-text'>
                            $mainCard
                        </td>
                        <td class='custom-text' id='cardHolderName$i'
                            onmouseover='showPencil_s($pencilid3)'
                            onmouseout='hidePencil_s($pencilid3)'
                            >
                            <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type3,$updateSubCredit,$type,$id,$cardHolderNameColumn,$title3,$pencilid3)'
                            ></i>
                            $cardHolderName
                        </td>
                        <td class='custom-text' id='cardNo$i'
                            onmouseover='showPencil_s($pencilid4)'
                            onmouseout='hidePencil_s($pencilid4)'
                            >
                            <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                onclick='updateTableColumn($c_type4,$updateSubCredit,$type,$id,$cardNoColumn,$title4,$pencilid4)'
                            ></i>
                            $cardNo
                        </td>";

                    if ($counter == 0) {
                        echo "<td><a href='#' onclick='deleteSubCredit($id,$mainCard)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                    } else {
                        echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                    }
                }
            }

            if ($_POST['getoption'] == "") {
                $limit = 100;
                $cursor = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']));
                
                foreach ($cursor as $value) {
                    $total_records = sizeof($value['sub_credit']);
                    $total_pages = ceil($total_records / $limit);
                }

                $g_data = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('sub_credit' => array('$slice' => [0, $limit])))); 
                
                $i = 0;
        
                foreach ($g_data as $data) {
                    $sub_credit = $data['sub_credit'];
                    foreach ($sub_credit as $admin) {
                        $counter = $admin['counter']; 
                        $id = $admin['_id'];
                        $displayName = $admin['displayName'];
                        $mainCard = $admin['mainCard'];
                        $cardHolderName = $admin['cardHolderName'];
                        $cardNo = $admin['cardNo'];
    
                        $displayNameColumn = '"displayName"';
                        $mainCardColumn = '"mainCard"';
                        $cardHolderNameColumn = '"cardHolderName"';
                        $cardNoColumn = '"cardNo"';
                        $type = '"text"';
                        $i++;
                        $updateSubCredit = '"updateSubCredit"';
    
                        $c_type1 = '"'.$displayName.'"';
                        $c_type2 = '"'.$mainCard.'"';
                        $c_type3 = '"'.$cardHolderName.'"';
                        $c_type4 = '"'.$cardNo.'"';
                        $title1 = '"Name of Display"';
                        $title2 = '"Main Card"';
                        $title3 = '"Card Holder Name"';
                        $title4 = '"Card No"';
                        $pencilid1 = '"displayNamePencil'.$i.'"';
                        $pencilid2 = '"mainCardPencil'.$i.'"';
                        $pencilid3 = '"cardHolderNamePencil'.$i.'"';
                        $pencilid4 = '"cardNoPencil'.$i.'"';
    
                        echo "<tr>
                            <th> $i</th>
                            <td class='custom-text' id='displayName$i'
                                onmouseover='showPencil_s($pencilid1)'
                                onmouseout='hidePencil_s($pencilid1)'
                                >
                                <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type1,$updateSubCredit,$type,$id,$displayNameColumn,$title1,$pencilid1)'
                                ></i>
                                $displayName
                            </td>
                            <td>
                                $mainCard
                            </td>
                            <td class='custom-text' id='cardHolderName$i'
                                onmouseover='showPencil_s($pencilid3)'
                                onmouseout='hidePencil_s($pencilid3)'
                                >
                                <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type3,$updateSubCredit,$type,$id,$cardHolderNameColumn,$title3,$pencilid3)'
                                ></i>
                                $cardHolderName
                            </td>
                            <td class='custom-text' id='cardNo$i'
                                onmouseover='showPencil_s($pencilid4)'
                                onmouseout='hidePencil_s($pencilid4)'
                                >
                                <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                                    onclick='updateTableColumn($c_type4,$updateSubCredit,$type,$id,$cardNoColumn,$title4,$pencilid4)'
                                ></i>
                                $cardNo
                            </td>";

                        if ($counter == 0) {
                            echo "<td><a href='#' onclick='deleteSubCredit($id,$mainCard)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                        } else {
                            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                        }
                    }
                }
            } 
        }
    }

    if ($_GET['types'] == 'paginate_subcredit') {
        $start = (int)$_POST['start'];
        $limit = (int)$_POST['limit'];

        $cursor = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']));
        
        foreach ($cursor as $value) {
            $total_records = sizeof($value['sub_credit']);
            $total_pages = ceil($total_records / $limit);
        }

        $g_data = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('sub_credit' => array('$slice' => [$start, $limit])))); 
        
        $i = 0;

        foreach ($g_data as $data) {
            $sub_credit = $data['sub_credit'];
            foreach ($sub_credit as $admin) {
                $counter = $admin['counter'];
                $id = $admin['_id'];
                $displayName = $admin['displayName'];
                $mainCard = $admin['mainCard'];
                $cardHolderName = $admin['cardHolderName'];
                $cardNo = $admin['cardNo'];

                $displayNameColumn = '"displayName"';
                $mainCardColumn = '"mainCard"';
                $cardHolderNameColumn = '"cardHolderName"';
                $cardNoColumn = '"cardNo"';
                $type = '"text"';
                $i++;
                $start+=1;
                $updateSubCredit = '"updateSubCredit"';

                $c_type1 = '"'.$displayName.'"';
                $c_type2 = '"'.$mainCard.'"';
                $c_type3 = '"'.$cardHolderName.'"';
                $c_type4 = '"'.$cardNo.'"';
                $title1 = '"Name of Display"';
                $title2 = '"Main Card"';
                $title3 = '"Card Holder Name"';
                $title4 = '"Card No"';
                $pencilid1 = '"displayNamePencil'.$i.'"';
                $pencilid2 = '"mainCardPencil'.$i.'"';
                $pencilid3 = '"cardHolderNamePencil'.$i.'"';
                $pencilid4 = '"cardNoPencil'.$i.'"';

                echo "<tr>
                    <th> $start</th>
                    <td class='custom-text' id='displayName$i'
                        onmouseover='showPencil_s($pencilid1)'
                        onmouseout='hidePencil_s($pencilid1)'
                        >
                        <i id='displayNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type1,$updateSubCredit,$type,$id,$displayNameColumn,$title1,$pencilid1)'
                        ></i>
                        $displayName
                    </td>
                    <td>
                        $mainCard
                    </td>
                    <td class='custom-text' id='cardHolderName$i'
                        onmouseover='showPencil_s($pencilid3)'
                        onmouseout='hidePencil_s($pencilid3)'
                        >
                        <i id='cardHolderNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type3,$updateSubCredit,$type,$id,$cardHolderNameColumn,$title3,$pencilid3)'
                        ></i>
                        $cardHolderName
                    </td>
                    <td class='custom-text' id='cardNo$i'
                        onmouseover='showPencil_s($pencilid4)'
                        onmouseout='hidePencil_s($pencilid4)'
                        >
                        <i id='cardNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                            onclick='updateTableColumn($c_type4,$updateSubCredit,$type,$id,$cardNoColumn,$title4,$pencilid4)'
                        ></i>
                        $cardNo
                    </td>";

                if ($counter == 0) {
                    echo "<td><a href='#' onclick='deleteSubCredit($id,$mainCard)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
                } else {
                    echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
                }
            }
        } 
    }