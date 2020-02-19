<?php
    session_start();
    include '../database/connection.php';
?>

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Fuel_Receipt"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Fuel Receipts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
               <!-- <form method="post" enctype="multipart/form-data">-->
                    <!--<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add_fuel_receipts">ADD</button>-->
                    <!--<<button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_FuelReceipt()">Upload</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>-->

                    <!--<button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>-->
                <!--</form>-->
                <br>
                <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                    <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_fuel_receipts"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">

                            <br>
                            <div id="table-scroll" class="table-scroll">
                                <table id="fuel_receipt_table" class="scroll" >
                                    <thead>
                                    <tr>
                                        <th scope="col" col width="160">No</th>
                                        <th scope="col" col width="160" data-priority="1">Card Holder Name</th>
                                        <th scope="col" col width="160" data-priority="3">Employee Number</th>
                                        <th scope="col" col width="160" data-priority="1">Card Number</th>
                                        <th scope="col" col width="160" data-priority="3">Card Type</th>
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
                                    <tbody>
                                    <?php
                                        $ifta_data = $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
                                        $i = 1;
                                    ?>

                                    <tbody>
                                    <?php foreach ($ifta_data as $data) {

                                        $f_receipt = $data['fuel_receipt'];
                                        $limit = 3;
                                        //$test = $db->ifta_fuel_receipts->find([$f_receipt])->limit($limit);
                                       // var_dump($test);
                                        $options = [
                                            "limit" => 10,
                                            "skip" => 0
                                        ];
                                        //$test = $f_receipt->find(array(),array('limit' => 1));
                                        $limit = 4;
                                        $total_records = $f_receipt->count();
                                        $total_pages = ceil($total_records / $limit);

                                        foreach ($f_receipt as $fuel) {
                                          /*  if (empty($fuel['fuelDate'])) {
                                                $fuelDate = "";
                                            } else {
                                                $fuelDate = date('mm/m/Y', $fuel['fuelDate']);
                                            }*/

                                            if ($fuel['delete_status'] == '0') {

                                                ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <td>
                                                        <a href="#" id="cardHolderName<?php echo $fuel['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'cardHolderName');" class="text-overflow"><?php echo $fuel['cardHolderName']; ?></a>
                                                        <button type="button" id="cardHolderName<?php echo $fuel['_id']; ?>" onclick="updateFuel('cardHolderName',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="employeeNo<?php echo $fuel['_id']; ?>2" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'employeeNo');" class="text-overflow"><?php echo $fuel['employeeNo']; ?></a>
                                                        <button type="button" id="employeeNo<?php echo $fuel['_id']; ?>" onclick="updateFuel('employeeNo',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="cardNo<?php echo $fuel['_id']; ?>3" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'cardNo');" class="text-overflow"><?php echo $fuel['cardNo']; ?></a>
                                                        <button type="button" id="cardNo<?php echo $fuel['_id']; ?>" onclick="updateFuel('cardNo',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="cardType<?php echo $fuel['_id']; ?>4" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'cardType');" class="text-overflow"><?php echo $fuel['cardType']; ?></a>
                                                        <button type="button" id="cardType<?php echo $fuel['_id']; ?>" onclick="updateFuel('cardType',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="unit_number<?php echo $fuel['_id']; ?>5" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'unit_number');" class="text-overflow"><?php echo $fuel['unit_number']; ?></a>
                                                        <button type="button" id="unit_number<?php echo $fuel['_id']; ?>" onclick="updateFuel('unit_number',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="fuelDate<?php echo $fuel['_id']; ?>6" data-type="date" ondblclick="showTextarea(this.id,'date',<?php echo $fuel['_id']; ?>,'fuelDate');" class="text-overflow"><?php echo $fuel['fuelDate']; ?></a>
                                                        <button type="button" id="fuelDate<?php echo $fuel['_id']; ?>" onclick="updateFuel('fuelDate',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="transacTime<?php echo $fuel['_id']; ?>7" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'transacTime');" class="text-overflow"><?php echo $fuel['transacTime']; ?></a>
                                                        <button type="button" id="transacTime<?php echo $fuel['_id']; ?>" onclick="updateFuel('transacTime',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="merchantName<?php echo $fuel['_id']; ?>8" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'merchantName');" class="text-overflow"><?php echo $fuel['merchantName']; ?></a>
                                                        <button type="button" id="merchantName<?php echo $fuel['_id']; ?>" onclick="updateFuel('merchantName',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="statePurch<?php echo $fuel['_id']; ?>9" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'statePurch');" class="text-overflow"><?php echo $fuel['statePurch']; ?></a>
                                                        <button type="button" id="statePurch<?php echo $fuel['_id']; ?>" onclick="updateFuel('statePurch',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="merchantCity<?php echo $fuel['_id']; ?>10" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'merchantCity');" class="text-overflow"><?php echo $fuel['merchantCity']; ?></a>
                                                        <button type="button" id="merchantCity<?php echo $fuel['_id']; ?>" onclick="updateFuel('merchantCity',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="dGallons<?php echo $fuel['_id']; ?>11" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'dGallons');" class="text-overflow"><?php echo $fuel['dGallons']; ?></a>
                                                        <button type="button" id="dGallons<?php echo $fuel['_id']; ?>" onclick="updateFuel('dGallons',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="dGrossCost<?php echo $fuel['_id']; ?>12" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'dGrossCost');" class="text-overflow"><?php echo $fuel['dGrossCost']; ?></a>
                                                        <button type="button" id="dGrossCost<?php echo $fuel['_id']; ?>" onclick="updateFuel('dGrossCost',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="cashAdvanced<?php echo $fuel['_id']; ?>13" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'cashAdvanced');" class="text-overflow"><?php echo $fuel['cashAdvanced']; ?></a>
                                                        <button type="button" id="cashAdvanced<?php echo $fuel['_id']; ?>" onclick="updateFuel('cashAdvanced',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="discountAmt<?php echo $fuel['_id']; ?>14" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'discountAmt');" class="text-overflow"><?php echo $fuel['discountAmt']; ?></a>
                                                        <button type="button" id="discountAmt<?php echo $fuel['_id']; ?>" onclick="updateFuel('discountAmt',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="totalAmt<?php echo $fuel['_id']; ?>15" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'totalAmt');" class="text-overflow"><?php echo $fuel['totalAmt']; ?></a>
                                                        <button type="button" id="totalAmt<?php echo $fuel['_id']; ?>" onclick="updateFuel('totalAmt',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="invoiceNo<?php echo $fuel['_id']; ?>16" data-type="textarea" ondblclick="showTextarea(this.id,'text',<?php echo $fuel['_id']; ?>,'invoiceNo');" class="text-overflow"><?php echo $fuel['invoiceNo']; ?></a>
                                                        <button type="button" id="invoiceNo<?php echo $fuel['_id']; ?>" onclick="updateFuel('invoiceNo',<?php echo $fuel['_id']; ?>)" style="display:none; margin-left:6px;"class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td><a href="#" onclick="deleteFuel(<?php echo $fuel['_id']; ?>)"><i
                                                                    class="mdi mdi-delete-sweep-outline"
                                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                                    </td>
                                                </tr>
                                            <?php }

                                            }

                                        //}
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>No.</th>
                                            <th>Card Holder Name</th>
                                            <th>Employee Number</th>
                                            <th>Card Number</th>
                                            <th>Card Type</th>
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
                                for($i=1; $i<=$total_pages; $i++){
                                    if($i == 1){
                                        ?>
                                        <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>

                                        <?php
                                    }
                                    else{
                                        ?>
                                        <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                        <?php
                                    }
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
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
                                        <option value="<?php echo $s['cardHolderName']; ?>"><?php echo $s['cardHolderName']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Employee No</label>
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
                        <label>Unit Number</label>
                        <div>
                            <input class="form-control" placeholder="Unit Number" type="text" name="unit_number" id="unit_number">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <div>
                            <input class="form-control" type="date" name="fuelDate" id="fuelDate">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Transaction Time </label>
                        <div>
                            <input class="form-control" placeholder="Transaction Time" type="text" name="transacTime" id="transacTime">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Merchant Name</label>
                        <div>
                            <input class="form-control" placeholder="Merchant Name" type="text" name="merchantName" id="merchantName">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Merchant City</label>
                        <div>
                            <input class="form-control" placeholder="Merchant Name" type="text" name="merchantCity" id="merchantCity">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Select State Purch</label>
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
                        <label>Diesel Gallons</label>
                        <div>
                            <input class="form-control" placeholder="Diesel Gallons" type="text" name="dGallons" id="dGallons">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Diesel Gross Cost </label>
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
                        <label>Invoice No </label>
                        <div>
                            <input class="form-control" placeholder="Invoice No" type="text" name="invoiceNo" id="invoiceNo">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="Add_FuelReceipts()" class="btn btn-primary waves-effect waves-light" >Save</button>
            </div>

        </div>
    </div>
</div>

<script>
    /*function show(d) {
        $("show"+d).show();
    }*/
    /*function hide() {
        document.getElementById("show").style.display = "none";
    }*/

</script>

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

    $("#search").keyup(function () {
        var value = this.value.toLowerCase().trim();

        $("table tr").each(function (index) {
            if (!index) return;
            $(this).find("td").each(function () {
                var id = $(this).text().toLowerCase().trim();
                var not_found = (id.indexOf(value) == -1);
                $(this).closest('tr').toggle(!not_found);
                return not_found;
            });
        });
    });

    /*function loaData(page) {

    }*/
</script>

<!--<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
<script src="assets/pages/xeditable.js"></script>-->

<!-- Responsive-table-->
<!--<script src="assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>-->

<style>
    .table-scroll {
        position: relative;
        width: 100%;
        z-index: 1;
        margin: auto;
        overflow: auto;
        height: 320px;
    }

    .table-scroll table {
        width: 100%;
        min-width: 1280px;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-wrap {
        position: relative;
    }

    .table-scroll th,
    .table-scroll td {
        /*padding: 5px 10px;*/
        border: 1px solid #000;
        background: #fff;
        vertical-align: bottom;
        text-align: center;
    }

    .table-scroll thead th {
        background: #30419B;
        color: #fff;
        padding: 4px;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }

    /* safari and ios need the tfoot itself to be position:sticky also */
    .table-scroll tfoot,
    .table-scroll tfoot th,
    .table-scroll tfoot td {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background: #666;
        color: #fff;
        z-index: 4;
    }

    /* testing links*/

    th:first-child {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background: #ccc;
    }

    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    table {
        table-layout: fixed;
    }

    .text-overflow {
        padding-top: 10px;
        display:block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    a.editable-click { border-bottom: none;
        color: #000000;}
    a.editable-click:hover{
        border-bottom: none;
    }
    .table-scroll::-webkit-scrollbar {
        width: 12px;
        height: 8px;
    }

    /* Track */

    .table-scroll::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }


    .table-scroll::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgb(48, 65, 155);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

</style>
