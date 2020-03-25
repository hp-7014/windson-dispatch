<?php
session_start();
$helper = "helper";
require "../../database/connection.php";
$show1 = $db->active_load->find(['companyID' => (int)$_SESSION['companyId']], [
    'active_load' => ['$elemMatch' => ['status' => "Delivered"]]
]);
$table = "";
foreach ($show1 as $arrData1) {
    $arrData1 = $arrData1['activeload'];
    foreach ($arrData1 as $row1) {
        if ($row1['status'] == "Delivered") {
            $invoiceID1 = $row1['_id'];
            $loadNO1 = 1;
            foreach ($row1['shipper'] as $shipperData1) {
                $shipDate1 = $shipperData1['shipper_pickup'];
            }
            $customer1 = $row1['customer'];
            $driverName1 = $row1['driver_name'];
            $activeLoadId1 = $row1['_id'];
            $status1 = $row1['status'];
            $table .= '<tr>
                <td>' . $invoiceID1 . '</td>
                <td>' . $loadNO1 . '</td>
                <td>' . $shipDate1 . '</td>
                <td>' . $customer1 . '</td>
                <td>' . $driverName1 . '</td>
                <td>
                    <select class="form-control" onchange="updateLoadStatus(' . $invoiceID1 . ')" id="loadStatus"
                            style="width: 170px">
                        <option value="0">--Select--</option>';

            if ($status1 == "Break Down") {
                $table .= '<option selected value="Break Down)status_BreakDown_time">Break Down</option>';
            } else {
                $table .= '<option value="Break Down)status_BreakDown_time">Break Down </option>';
            }

            if ($status1 == "Loaded") {
                $table .= '<option selected value="Loaded)status_Loaded_time">Loaded</option>';
            } else {
                $table .= '<option value="Loaded)status_Loaded_time">Loaded</option>';
            }

            if ($status1 == "Arrived Consignee") {
                $table .= '<option selected value="Arrived Consignee)status_ArrivedConsignee_time">Arrived Consignee</option>';
            } else {
                $table .= '<option value="Arrived Consignee)status_ArrivedConsignee_time">Arrived Consignee</option>';
            }

            if ($status1 == "Arrived Shipper") {
                $table .= '<option selected value="Arrived Shipper)status_ArrivedShipper_time">Arrived Shipper</option>';
            } else {
                $table .= '<option value="Arrived Shipper)status_ArrivedShipper_time">Arrived Shipper</option>';
            }

            if ($status1 == "Paid") {
                $table .= '<option selected value="Paid)status_Paid_time">Paid</option>';
            } else {
                $table .= '<option value="Paid)status_Paid_time">Paid</option>';
            }

            if ($status1 == "Open") {
                $table .= '<option selected value="Open)status_Open_time">Open</option>';
            } else {
                $table .= '<option value="Open)status_Open_time">Open</option>';
            }

            if ($status1 == "On Route") {
                $table .= '<option selected value="On Route)status_OnRoute_time">On Route</option>';
            } else {
                $table .= '<option value="On Route)status_OnRoute_time">On Route</option>';
            }

            if ($status1 == "Dispatched") {
                $table .= '<option selected value="Dispatched)status_Dispatched_time">Dispatched</option>';
            } else {
                $table .= '<option value="Dispatched)status_Dispatched_time">Dispatched</option>';
            }

            if ($status1 == "Delivered") {
                $table .= '<option selected value="Delivered)status_Delivered_time">Delivered</option>';
            } else {
                $table .= '<option value="Delivered)status_Delivered_time">Delivered</option>';
            }

            if ($status1 == "Invoiced") {
                $table .= '<option selected value="Invoiced)status_Invoiced_time">Invoiced</option>';
            } else {
                $table .= '<option value="Invoiced)status_Invoiced_time">Invoiced</option>';
            }

            $table .= '</select>
                </td>
            </tr>';
        }
    }
}
echo $table;