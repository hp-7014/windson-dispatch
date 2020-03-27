<?php 
session_start();
$helper = "helper";
$type = '"text"';
require "../../database/connection.php";

$company_data = $db->company->find(['companyID' => $_SESSION['companyId']]);
$i = 0;
$option = "";
$table = "";
foreach ($company_data as $s_type) {
    $show1 = $s_type['company'];
    foreach ($show1 as $row1) {
        $id = $row1['_id'];
        $counter = $row1['counter'];
        $companyName = $row1['companyName'];
        $shippingAddress = $row1['shippingAddress'];
        $telephoneNo = $row1['telephoneNo'];
        $faxNo = $row1['faxNo'];
        $mcNo = $row1['mcNo'];
        $usDotNo = $row1['usDotNo'];
        $mailingAddress = $row1['mailingAddress'];
        $factoringCompany = $row1['factoringCompany'];
        //  $factoringCompanyAddress = $row1['factoringCompanyAddress'];
        $column1 = '"companyName"';
        $column2 = '"shippingAddress"';
        $column3 = '"telephoneNo"';
        $column4 = '"faxNo"';
        $column5 = '"mcNo"';
        $column6 = '"usDotNo"';
        $column7 = '"mailingAddress"';
        $column8 = '"factoringCompany"';
        $column9 = '"factoringCompanyAddress"';
        $i++;
        $updateCompany = '"updateCompany"';
        $pencilid1 = '"companyNamePencil'.$i.'"';
        $pencilid2 = '"shippingAddressPencil'.$i.'"';
        $pencilid3 = '"telephoneNoPencil'.$i.'"';
        $pencilid4 = '"faxNoPencil'.$i.'"';
        $pencilid5 = '"mcNoPencil'.$i.'"';
        $pencilid6 = '"usDotNoPencil'.$i.'"';
        $pencilid7 = '"mailingAddressPencil'.$i.'"';
        $pencilid8 = '"factoringCompanyPencil'.$i.'"';
        //  $pencilid9 = '"factoringCompanyAddressPencil'.$i.'"';
        $title1 = '"Bank Name"';
        $title2 = '"Shipping Address"';
        $title3 = '"Telephone No"';
        $title4 = '"Fax No"';
        $title5 = '"MC No"';
        $title6 = '"US Dot No"';
        $title7 = '"Mailing Address"';
        $title8 = '"Factoring Company"';
        //  $title9 = '"Factoring Company Address"';
        $c_type1 = '"'.$companyName.'"';
        $c_type2 = '"'.$shippingAddress.'"';
        $c_type3 = '"'.$telephoneNo.'"';
        $c_type4 = '"'.$faxNo.'"';
        $c_type5 = '"'.$mcNo.'"';
        $c_type6 = '"'.$usDotNo.'"';
        $c_type7 = '"'.$mailingAddress.'"';
        $c_type8 = '"'.$factoringCompany.'"';
        //  $c_type9 = '"'.$factoringCompanyAddress.'"';

        echo "<tr>
            <td> $i</td>
            <td class='custom-text' id='companyName$i'
                onmouseover='showPencil_s($pencilid1)'
                onmouseout='hidePencil_s($pencilid1)'
                >
                <i id='companyNamePencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type1,$updateCompany,$type,$id,$column1,$title1,$pencilid1)'
                ></i>
                $companyName
            </td>
            <td class='custom-text' id='shippingAddress$i'
                onmouseover='showPencil_s($pencilid2)'
                onmouseout='hidePencil_s($pencilid2)'
                >
                <i id='shippingAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type2,$updateCompany,$type,$id,$column2,$title2,$pencilid2)'
                ></i>
                $shippingAddress
            </td>
            <td class='custom-text' id='telephoneNo$i'
                onmouseover='showPencil_s($pencilid3)'
                onmouseout='hidePencil_s($pencilid3)'
                >
                <i id='telephoneNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type3,$updateCompany,$type,$id,$column3,$title3,$pencilid3)'
                ></i>
                $telephoneNo
            </td>
            <td class='custom-text' id='faxNo$i'
                onmouseover='showPencil_s($pencilid4)'
                onmouseout='hidePencil_s($pencilid4)'
                >
                <i id='faxNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type4,$updateCompany,$type,$id,$column4,$title4,$pencilid4)'
                ></i>
                $faxNo
            </td>
            <td class='custom-text' id='mcNo$i'
                onmouseover='showPencil_s($pencilid5)'
                onmouseout='hidePencil_s($pencilid5)'
                >
                <i id='mcNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type5,$updateCompany,$type,$id,$column5,$title5,$pencilid5)'
                ></i>
                $mcNo
            </td>
            <td class='custom-text' id='usDotNo$i'
                onmouseover='showPencil_s($pencilid6)'
                onmouseout='hidePencil_s($pencilid6)'
                >
                <i id='usDotNoPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type6,$updateCompany,$type,$id,$column6,$title6,$pencilid6)'
                ></i>
                $usDotNo
            </td>
            <td class='custom-text' id='mailingAddress$i'
                onmouseover='showPencil_s($pencilid7)'
                onmouseout='hidePencil_s($pencilid7)'
                >
                <i id='mailingAddressPencil$i' class='mdi mdi-lead-pencil edit-pencil'
                    onclick='updateTableColumn($c_type7,$updateCompany,$type,$id,$column7,$title7,$pencilid7)'
                ></i>
                $mailingAddress
            </td>
            <td class='custom-text'>
                $factoringCompany
            </td>";

        if ($counter == 0) { 
            echo "<td><a href='#' onclick='deleteCompany($id,$factoringCompany)'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #FC3B3B'></i></a></td>";
        } else {
            echo "<td><a href='#' disabled onclick='deleteCurrencyError()'><i class='mdi mdi-delete-sweep-outline' style='font-size: 20px; color: #adb5bd'></i></a></td></tr>";
        }

        $option .= "<option value='$companyName'>$companyName</option>";
        // $option1 .= "<option value='$id'>$companyName</option>";

        $value = "'".$id.')&nbsp;'.$companyName."'";

        $option .= "<option value=$value></option>";
    }
}

//echo $table."^".$option."^".$option1;