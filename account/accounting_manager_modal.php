<?php
session_start();
include '../database/connection.php';
?>
<!------------------------------------------Add External Carrier------------------------------------------------------------------------------------>

<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
     id="accounting_modal"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Account</h5>
                <button type="button" class="close modalCarrier" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item1 show" id="home-title">
                        <a class="nav-link1 active" id="home-tab" data-toggle="tab"
                           href="#carrier" role="tab" aria-controls="home"
                           aria-selected="true" onclick="toggleAccount('first');">Deliver</a>
                    </li>
                    <li class="nav-item1" id="insurance-title">
                        <a class="nav-link1" id="insurance-tab" data-toggle="tab"
                           href="#insurance" role="tab" aria-controls="profile"
                           aria-selected="false" onclick="toggleAccount('second');">Invoice</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="carrier"
                         role="tabpanel" aria-labelledby="home-tab">
                        <br>
                        <!--- table one here --->
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                                       id="search" onkeyup="search_account_manager(this)" placeholder="search"
                                       style="margin-left: 5px;">
                                <div id="table-scroll" class="table-scroll">
                                    <table id="carrier_table" class="scroll">
                                        <thead>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="accountDeliverBody">
                                        <?php
                                        $show = $db->active_load->find(['companyID' => (int)$_SESSION['companyId']]);
                                        foreach ($show as $arrData1) {
                                            $arrData = $arrData1['Delivered'];
                                            foreach ($arrData as $row) {
                                                $invoiceID = $row['_id'];
                                                $loadNO = 1;
                                                $customer = $row['customer'];
                                                $driverName = $row['driver_name'];
                                                $activeLoadId = $row['_id'];
                                                $status = $row['status'];

                                                ?>
                                                <tr>
                                                    <td><?php echo $invoiceID; ?></td>
                                                    <td><?php echo $loadNO; ?></td>
                                                    <td></td>
                                                    <td><?php echo $customer; ?></td>
                                                    <td><?php echo $driverName; ?></td>
                                                    <td>
                                                        <select class="form-control"
                                                                onchange="changeStatus(<?php echo $invoiceID; ?>,'<?php echo $row["status"]; ?>',this.value)"
                                                                id="loadStatus"
                                                                style="width: 170px">
                                                            <option value="0">--Select--</option>
                                                            <option <?php if ($status == "Break Down") {
                                                                echo "selected";
                                                            } ?> value="Break Down)status_BreakDown_time">Break Down
                                                            </option>
                                                            <option <?php if ($status == "Loaded") {
                                                                echo "selected";
                                                            } ?> value="Loaded)status_Loaded_time">Loaded
                                                            </option>
                                                            <option <?php if ($status == "Arrived Consignee") {
                                                                echo "selected";
                                                            } ?> value="Arrived Consignee)status_ArrivedConsignee_time">
                                                                Arrived Consignee
                                                            </option>
                                                            <option <?php if ($status == "Arrived Shipper") {
                                                                echo "selected";
                                                            } ?> value="Arrived Shipper)status_ArrivedShipper_time">
                                                                Arrived Shipper
                                                            </option>
                                                            <option <?php if ($status == "Paid") {
                                                                echo "selected";
                                                            } ?> value="Paid)status_Paid_time">Paid
                                                            </option>
                                                            <option <?php if ($status == "Open") {
                                                                echo "selected";
                                                            } ?> value="Open)status_Open_time">Open
                                                            </option>
                                                            <option <?php if ($status == "On Route") {
                                                                echo "selected";
                                                            } ?> value="On Route)status_OnRoute_time">On Route
                                                            </option>
                                                            <option <?php if ($status == "Dispatched") {
                                                                echo "selected";
                                                            } ?> value="Dispatched)status_Dispatched_time">
                                                                Dispatched
                                                            </option>
                                                            <option <?php if ($status == "Delivered") {
                                                                echo "selected";
                                                            } ?> value="Delivered)status_Delivered_time">Delivered
                                                            </option>
                                                            <option <?php if ($status == "Invoiced") {
                                                                echo "selected";
                                                            } ?> value="Invoiced)status_Invoiced_time">Invoiced
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="toggleCarrier('first')" class="btn btn-success float-right">Next
                        </button>
                    </div>

                    <!--                    // invoice area-->
                    <div class="tab-pane fade" id="insurance" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <br>
                                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text"
                                       id="search" onkeyup="search_Invoice1(this)" placeholder="search"
                                       style="margin-left: 5px;">
                                <div id="table-scroll" class="table-scroll">
                                    <table id="carrier_table" class="scroll">
                                        <thead>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody id="accountInvoiceBody">
                                        <?php
                                        $limit = 5;

                                        //                                        $show1 = $db->active_load->find(array('companyID' => (int)$_SESSION['companyId']), array('projection' => array('activeload' => array('$slice' => [0, $limit]))));
                                        $show1 = $db->active_load->find(['companyID' => (int)$_SESSION['companyId']]);
                                        foreach ($show1 as $arrData1) {
                                            $arrData2 = $arrData1['Invoiced'];
                                            $total_records = sizeof($arrData1['Invoiced']);
                                            $total_pages = ceil($total_records / $limit);
                                            foreach ($arrData2 as $row1) {
                                                $invoiceID1 = $row1['_id'];
                                                $loadNO1 = date("d/m/Y", $row1['created_at']);
                                                $shipDate1 = date("d/m/Y", $row1['created_at']);
                                                $customer1 = $row1['customer'];
                                                $driverName1 = $row1['driver_name'];
                                                $activeLoadId1 = $row1['_id'];
                                                $status1 = $row1['status'];
                                                ?>
                                                <tr>
                                                    <td><?php echo $invoiceID1; ?></td>
                                                    <td><?php echo $loadNO1; ?></td>
                                                    <td><?php echo $shipDate1; ?></td>
                                                    <td><?php echo $customer1; ?></td>
                                                    <td><?php echo $driverName1; ?></td>
                                                    <td>
                                                        <select class="form-control"
                                                                onchange="changeStatus(<?php echo $invoiceID1; ?>,'<?php echo $status1; ?>',this.value)"
                                                                id="loadStatus1"
                                                                style="width: 170px">
                                                            <option value="0">--Select--</option>
                                                            <option <?php if ($status1 == "Break Down") {
                                                                echo "selected";
                                                            } ?> value="Break Down)status_BreakDown_time">Break Down
                                                            </option>
                                                            <option <?php if ($status1 == "Loaded") {
                                                                echo "selected";
                                                            } ?> value="Loaded)status_Loaded_time">Loaded
                                                            </option>
                                                            <option <?php if ($status1 == "Arrived Consignee") {
                                                                echo "selected";
                                                            } ?> value="Arrived Consignee)status_ArrivedConsignee_time">
                                                                Arrived Consignee
                                                            </option>
                                                            <option <?php if ($status1 == "Arrived Shipper") {
                                                                echo "selected";
                                                            } ?> value="Arrived Shipper)status_ArrivedShipper_time">
                                                                Arrived Shipper
                                                            </option>
                                                            <option <?php if ($status1 == "Paid") {
                                                                echo "selected";
                                                            } ?> value="Paid)status_Paid_time">Paid
                                                            </option>
                                                            <option <?php if ($status1 == "Open") {
                                                                echo "selected";
                                                            } ?> value="Open)status_Open_time">Open
                                                            </option>
                                                            <option <?php if ($status1 == "On Route") {
                                                                echo "selected";
                                                            } ?> value="On Route)status_OnRoute_time">On Route
                                                            </option>
                                                            <option <?php if ($status1 == "Dispatched") {
                                                                echo "selected";
                                                            } ?> value="Dispatched)status_Dispatched_time">
                                                                Dispatched
                                                            </option>
                                                            <option <?php if ($status1 == "Delivered") {
                                                                echo "selected";
                                                            } ?> value="Delivered)status_Delisvered_time">Delivered
                                                            </option>
                                                            <option <?php if ($status1 == "Invoiced") {
                                                                echo "selected";
                                                            } ?> value="Invoiced)status_Invoiced_time">Invoiced
                                                            </option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th scope="col" col width="50">Invoice #</th>
                                            <th scope="col" col width="160" data-priority="1">Load #</th>
                                            <th scope="col" col width="160" data-priority="3">Ship Date</th>
                                            <th scope="col" col width="160" data-priority="3">Customer</th>
                                            <th scope="col" col width="160" data-priority="3">Driver / Carrier</th>
                                            <th scope="col" col width="160" data-priority="3">Action</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <br>
                            <!---<nav aria-label="..." class="float-right">
                                <ul class="pagination">
                                    <?php
                            $j = 1;
                            for ($i = 0; $i < $total_pages; $i++) {
                                if ($i == 0) {
                                    ?>
                                            <li class="pageitem active"
                                                onclick="paginate_account(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                                id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                                                          class="page-link"><?php echo $j; ?></a></li>
                                            <?php
                                } else {
                                    ?>
                                            <li class="pageitem"
                                                onclick="paginate_account(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                                id="<?php echo $i; ?>"><a class="page-link"
                                                                          data-id="<?php echo $i; ?>"><?php echo $j; ?></a>
                                            </li>
                                            <?php
                                }
                                $j++;
                            }
                            ?>
                                </ul>
                            </nav>---->
                        </div>
                        <button style="margin-right: 3px"
                                class="float-right btn btn-secondary">Close
                        </button>
                    </div>
                </div>

            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->