<?php session_start();
require "../database/connection.php";

if ($_GET['type'] == 'verifyLoad') {

    $firstMonth = "";
    $lastMonth = "";
    $year = $_POST['year'];

    if ($_POST['quarter'] == '1') {
        $firstMonth = "1";
        $lastMonth = "3";
    } else if ($_POST['quarter'] == '2') {
        $firstMonth = "4";
        $lastMonth = "6";
    } else if ($_POST['quarter'] == '3') {
        $firstMonth = "7";
        $lastMonth = "9";
    } else if ($_POST['quarter'] == '4') {
        $firstMonth = "10";
        $lastMonth = "12";
    }

    $data = $db->active_load->find(['companyID' => $_SESSION['companyId']]);
    $output = "";

    $fMonth = date("F", mktime(0, 0, 0, $firstMonth));
    $lMonth = date("F", mktime(0, 0, 0, $lastMonth));

    $fromdt = strtotime("First Day Of  $fMonth $year");
    $todt = strtotime("Last Day of $lMonth $year 23:59:00");
    $no = 1;
    foreach ($data as $d) { // for find the current company data

        foreach ($d['invoice'] as $date) { // fetch invoice array

            if ($date['shipDate'] >= $fromdt && $date['shipDate'] <= $todt) {

                $output .= "
                    <tr>
                        <td>".$no++."</td>
                        <td>" . $date['invoiceNo'] . "</td>
                        <td>" . $date['startLocation'] . "</td>";

                foreach ($date['shipper'] as $shipper) {
                    $output .= "<td>" . $shipper['ShipperLocation'] . "</td>";
                }

                foreach ($date['consignee'] as $consignee) {
                    $output .= "<td>" . $consignee['ConsigneeLocation'] . "</td>";
                }

                $output .= "<td>" . $date['endLocation'] . "</td>
                            <td>" . date("d-m-Y",$date['shipDate']) . "</td>
                            <td></td>
                            <td></td>
                            <td><a href='#' class='btn btn-primary'>Edit</a></td></tr>";
            }
        }
    }
    echo $output;
}