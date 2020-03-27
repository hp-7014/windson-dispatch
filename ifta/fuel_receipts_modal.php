<?php
    session_start();
    include '../database/connection.php';
?>

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Fuel_Receipt"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="fuel-container" style="z-index: 1600"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Fuel Receipts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" onkeyup="searchText_Fuel(this)" placeholder="search" style="margin-left: 5px;">
 
                <form method="post" enctype="multipart/form-data">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_fuel_receipts"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                    <!-- <form method="post" enctype="multipart/form-data">-->
                    <!--<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add_fuel_receipts">ADD</button>-->
                    <!--<<button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_FuelReceipt()">Upload</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>-->

                    <!--<button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>-->
                <!--</form>-->
                </form>
                <br>

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="tech-companies-1" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Card Holder Name</th>
                                        <th scope="col" col width="160" data-priority="3">Unit Number</th>
                                        <th scope="col" col width="160" data-priority="6">Transaction Date</th>
                                        <th scope="col" col width="160" data-priority="6">Transaction Time</th>
                                        <th scope="col" col width="160" data-priority="6">Merchant Name</th>
                                        <th scope="col" col width="160" data-priority="1">Merchant City</th>
                                        <th scope="col" col width="160" data-priority="3">ST</th>
                                        <th scope="col" col width="160" data-priority="1">Diesel Gallons</th>
                                        <th scope="col" col width="160" data-priority="3">Diesel Gross Cost</th>
                                        <th scope="col" col width="160" data-priority="3">Cash Advance Amount</th>
                                        <th scope="col" col width="160" data-priority="6">Discount AMT</th>
                                        <th scope="col" col width="160" data-priority="6">Total Amt Due</th>
                                        <th scope="col" col width="160" data-priority="6">Invoice No</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="fuelBody">
                                <?php
                                    $limit = 100;
                                    $cursor =  $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['fuel_receipt']);
                                        $total_pages = ceil($total_records / $limit);
                                    }
                                    
                                    $g_data = $db->ifta_fuel_receipts->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('fuel_receipt' => array('$slice' => [0, $limit]))));
                                    
                                    $i = 1;
                                    
                                    foreach ($g_data as $data) {
                                    $fuel_s = $data['fuel_receipt'];
                                    
                                    foreach ($fuel_s as $fuel) {      
                                        $counter = $fuel['counter']; 
                                        $cardName = $fuel['cardHolderName'];
                                        $cardHolderName = "'".$fuel['cardHolderName']."'";
                                        $unit_number = "'".$fuel['unit_number']."'";
                                        $fuelDate = "'".$fuel['fuelDate']."'";
                                        $transacTime = "'".$fuel['transacTime']."'";
                                        $merchantName = "'".$fuel['merchantName']."'";
                                        $merchantCity = "'".$fuel['merchantCity']."'";
                                        $statePurch = "'".$fuel['statePurch']."'";
                                        $dGallons = "'".$fuel['dGallons']."'";
                                        $dGrossCost = "'".$fuel['dGrossCost']."'";
                                        $cashAdvanced = "'".$fuel['cashAdvanced']."'";
                                        $discountAmt = "'".$fuel['discountAmt']."'";
                                        $totalAmt = "'".$fuel['totalAmt']."'";
                                        $invoiceNo = "'".$fuel['invoiceNo']."'";

                                        $pencilid1 = "'"."cardHolderNamePencil$i"."'";
                                        $pencilid2 = "'"."unit_numberPencil$i"."'";
                                        $pencilid3 = "'"."fuelDatePencil$i"."'";
                                        $pencilid4 = "'"."transacTimePencil$i"."'";
                                        $pencilid5 = "'"."merchantNamePencil$i"."'";
                                        $pencilid6 = "'"."merchantCityPencil$i"."'";
                                        $pencilid7 = "'"."statePurchPencil$i"."'";
                                        $pencilid8 = "'"."dGallonsPencil$i"."'";
                                        $pencilid9 = "'"."dGrossCostPencil$i"."'";
                                        $pencilid10 = "'"."cashAdvancedPencil$i"."'";
                                        $pencilid11 = "'"."discountAmtPencil$i"."'";
                                        $pencilid12 = "'"."totalAmtPencil$i"."'";
                                        $pencilid13 = "'"."invoiceNoPencil$i"."'";

                                ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="custom-text" id="<?php echo "cardHolderName".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('cardHolderNamePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('cardHolderNamePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "cardHolderNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $cardHolderName; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'cardHolderName','Card Holder Name',<?php echo $pencilid1; ?>)"
                                                ></i>
                                                <?php echo $fuel['cardHolderName']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "unit_number".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('unit_numberPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('unit_numberPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "unit_numberPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $unit_number; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'unit_number','Unit Number',<?php echo $pencilid2; ?>)"
                                                ></i>
                                                <?php echo $fuel['unit_number']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "fuelDate".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('fuelDatePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('fuelDatePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "fuelDatePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $fuelDate; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'fuelDate','Fuel Date',<?php echo $pencilid3; ?>)"
                                                ></i>
                                                <?php echo $fuel['fuelDate']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "transacTime".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('transacTimePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('transacTimePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "transacTimePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $transacTime; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'transacTime','Transaction Time',<?php echo $pencilid4; ?>)"
                                                ></i>
                                                <?php echo $fuel['transacTime']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "merchantName".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('merchantNamePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('merchantNamePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "merchantNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $merchantName; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'merchantName','Merchant Name',<?php echo $pencilid5; ?>)"
                                                ></i>
                                                <?php echo $fuel['merchantName']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "merchantCity".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('merchantCityPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('merchantCityPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "merchantCityPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $merchantCity; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'merchantCity','Merchant City',<?php echo $pencilid6; ?>)"
                                                ></i>
                                                <?php echo $fuel['merchantCity']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "statePurch".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('statePurchPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('statePurchPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "statePurchPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $statePurch; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'statePurch','State Punch',<?php echo $pencilid7; ?>)"
                                                ></i>
                                                <?php echo $fuel['statePurch']; ?>
                                            </td> 
                                            <td class="custom-text" id="<?php echo "dGallons".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('dGallonsPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('dGallonsPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "dGallonsPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $dGallons; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'dGallons','Diesel Gallon',<?php echo $pencilid8; ?>)"
                                                ></i>
                                                <?php echo $fuel['dGallons']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "dGrossCost".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('dGrossCostPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('dGrossCostPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "dGrossCostPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $dGrossCost; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'dGrossCost','Diesel Gross Cost',<?php echo $pencilid9; ?>)"
                                                ></i>
                                                <?php echo $fuel['dGrossCost']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "cashAdvanced".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('cashAdvancedPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('cashAdvancedPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "cashAdvancedPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $cashAdvanced; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'cashAdvanced','Cash Advanced Amount',<?php echo $pencilid10; ?>)"
                                                ></i>
                                                <?php echo $fuel['cashAdvanced']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "discountAmt".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('discountAmtPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('discountAmtPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "discountAmtPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $discountAmt; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'discountAmt','Discount AMT',<?php echo $pencilid11; ?>)"
                                                ></i>
                                                <?php echo $fuel['discountAmt']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "totalAmt".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('totalAmtPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('totalAmtPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "totalAmtPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $totalAmt; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'totalAmt','Total Amt Due',<?php echo $pencilid12; ?>)"
                                                ></i>
                                                <?php echo $fuel['totalAmt']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "invoiceNo".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('invoiceNoPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('invoiceNoPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "invoiceNoPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $invoiceNo; ?>,'updateFuel','text',<?php echo $fuel['_id']; ?>,'invoiceNo','Invoice No.',<?php echo $pencilid13; ?>)"
                                                ></i>
                                                <?php echo $fuel['invoiceNo']; ?>
                                            </td>
                                            <td>
                                                <?php if ($counter == 0) { ?>
                                                    <a href="#" onclick="deleteFuel(<?php echo $fuel['_id']; ?>,<?php echo $cardName; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                <?php } else { ?>
                                                    <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php 
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Card Holder Name</th>
                                        <th>Unit Number</th>
                                        <th>Transaction Date</th>
                                        <th>Transaction Time</th>
                                        <th>Merchant Name</th>
                                        <th>Merchant City</th>
                                        <th>ST</th>
                                        <th>Diesel Gallons</th>
                                        <th>Diesel Gross Cost</th>
                                        <th>Cash Advance Amount</th>
                                        <th>Discount AMT</th>
                                        <th>Total Amt Due</th>
                                        <th>Invoice No</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <?php
                            $j = 1;
                            for ($i = 0; $i < $total_pages; $i++) {
                                if ($i == 0) {
                                    ?>
                                    <li class="pageitem active"
                                        onclick="paginate_ifta_fuel(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>
                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_ifta_fuel(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a class="page-link"
                                            data-id="<?php echo $i; ?>"><?php echo $j; ?></a></li>
                            <?php
                                }
                                $j++;
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_FuelReceipt()" class="btn btn-primary waves-effect" data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-----------------------------------------------Add Sub CreditCard------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_fuel_receipts"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Fuel Receipts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">

                    <div class="form-group col-md-3">
                        <label>Card Holder Name </label>
                        <div>
                            <select class="form-control" name="cardHolderName" id="cardHolderName" onchange="ajaxGetfuel(this)">
                                <option value="">Select Card Holder Name</option>
                                <?php

                                $show_data = $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['ifta_card'];
                                    foreach ($show as $s) {
                                        ?>
                                        <option value="<?php echo $s['_id']; ?>"><?php echo $s['cardHolderName']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Employee No </label>
                        <div>
                            <input class="form-control" placeholder="Employee No" type="text" name="employeeNo" id="employeeNo">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Card Number</label>
                        <div>
                            <input class="form-control" placeholder="Card Number" type="text" name="cardNo" id="cardNo">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Card Type</label>
                        <div>
                            <input class="form-control" placeholder="Card Type" type="text" name="cardType" id="cardType">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Unit Number <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Unit Number" type="text" name="unit_number" id="unit_number">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" type="date" name="fuelDate" id="fuelDate">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Transaction Time <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Transaction Time" type="text" name="transacTime" id="transacTime">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Merchant Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Merchant Name" type="text" name="merchantName" id="merchantName">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Merchant City </label>
                        <div>
                            <input class="form-control" placeholder="Merchant Name" type="text" name="merchantCity" id="merchantCity">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Select State Purch <span class="mandatory">*</span></label>
                        <div>
                            <select class="form-control " name="statePurch" id="statePurch" >
                                <option value="">Select State Purch</option>
                                <option value="AK" >AK</option>
                                <option value="AL" >AL</option>
                                <option value="AR" >AR</option>
                                <option value="AZ" >AZ</option>
                                <option value="CA" >CA</option>
                                <option value="CO" >CO</option>
                                <option value="CT" >CT</option>
                                <option value="DC" >DC</option>
                                <option value="DE" >DE</option>
                                <option value="FL" >FL</option>
                                <option value="GA" >GA</option>
                                <option value="Guam" >Guam</option>
                                <option value="HI" >HI</option>
                                <option value="IA" >IA</option>
                                <option value="ID" >ID</option>
                                <option value="IL" >IL</option>
                                <option value="IN" >IN</option>
                                <option value="KS" >KS</option>
                                <option value="KY" >KY</option>
                                <option value="LA" >LA</option>
                                <option value="MA" >MA</option>
                                <option value="MD" >MD</option>
                                <option value="ME" >ME</option>
                                <option value="MI" >MI</option>
                                <option value="MN" >MN</option>
                                <option value="MO" >MO</option>
                                <option value="MS" >MS</option>
                                <option value="MT" >MT</option>
                                <option value="NA" >NA</option>
                                <option value="NC" >NC</option>
                                <option value="ND" >ND</option>
                                <option value="NE" >NE</option>
                                <option value="NH" >NH</option>
                                <option value="NJ" >NJ</option>
                                <option value="NM" >NM</option>
                                <option value="NV" >NV</option>
                                <option value="NY" >NY</option>
                                <option value="OH" >OH</option>
                                <option value="OK" >OK</option>
                                <option value="OR" >OR</option>
                                <option value="PA" >PA</option>
                                <option value="RI" >RI</option>
                                <option value="SC" >SC</option>
                                <option value="SD">SD</option>
                                <option value="TN" >TN</option>
                                <option value="TX">TX</option>
                                <option value="UT" >UT</option>
                                <option value="VA" >VA</option>
                                <option value="Virgin Islands" >Virgin Islands</option>
                                <option value="VT" >VT</option>
                                <option value="WA" >WA</option>
                                <option value="WI" >WI</option>
                                <option value="WV" >WV</option>
                                <option value="WY" >WY</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Diesel Gallons <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Diesel Gallons" type="text" name="dGallons" id="dGallons">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Diesel Gross Cost <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Diesel Gross Cost" type="text" name="dGrossCost" id="dGrossCost">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Cash Advance Amount </label>
                        <div>
                            <input class="form-control" placeholder="Cash Advance Amount" type="text" name="cashAdvanced" id="cashAdvanced">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Discount AMT </label>
                        <div>
                            <input class="form-control" placeholder="Discount AMT" type="text" name="discountAmt" id="discountAmt">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Total Amt Due</label>
                        <div>
                            <input class="form-control" placeholder="Total Amt Due" type="text" name="totalAmt" id="totalAmt">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Invoice No <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Invoice No" type="text" name="invoiceNo" id="invoiceNo">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 600px"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="Add_FuelReceipts()" class="btn btn-primary waves-effect waves-light" >Save</button>
            </div>

        </div>
    </div>
</div>

<script type="text/javascript">
    function ajaxGetfuel(x)
    {
        var v = x.value;
        
        var companyId = document.getElementById('companyId').value;

        $.ajax({
            type: 'POST',
            url: 'ifta/fuel_receipts_driver.php?type='+'driver_detail',
            data: {
                getoption:v,
                companyId:companyId,
            },
            success: function (response) {
                var j = JSON.parse(response);
                
                $('#cardType').val(j.cardType);
                $('#employeeNo').val(j.employeeNo);
                $('#cardNo').val(j.iftaCardNo);
            }
        });
    }

</script>