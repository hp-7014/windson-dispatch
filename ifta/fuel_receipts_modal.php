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
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add_fuel_receipts">ADD</button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_FuelReceipt()">Upload</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>

                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                </form>
                <br>

                <table class="table table-striped mb-0 table-editable table-debit">
                    <thead>
                        <tr>
                            <th>No</th>
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
                    </thead>

                    <?php
                        $ifta_data = $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
                        $no = 1;
                    ?>

                    <tbody>
                        <?php foreach ($ifta_data as $data) {
                            $f_receipt = $data['fuel_receipt'];

                            foreach ($f_receipt as $fuel) {
                                if ($fuel['delete_status'] == '0') {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'cardHolderName',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['cardHolderName']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'employeeNo',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['employeeNo']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'cardNo',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['cardNo']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'cardType',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['cardType']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'unit_number',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['unit_number']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'fuelDate',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['fuelDate']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'transacTime',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['transacTime']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'merchantName',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['merchantName']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'merchantCity',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['merchantCity']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'statePurch',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['statePurch']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'dGallons',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['dGallons']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'dGrossCost',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['dGrossCost']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'cashAdvanced',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['cashAdvanced']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'discountAmt',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['discountAmt']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'totalAmt',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['totalAmt']; ?></td>
                                    <td contenteditable="true" onblur="updateFuel(this,'invoiceNo',<?php echo $fuel['_id']; ?>)"><?php echo $fuel['invoiceNo']; ?></td>
                                    <td><a href="#" onclick="deleteFuel(<?php echo $fuel['_id']; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                    </td>
                                </tr>
                            <?php }
                            }
                        }
                        ?>
                    </tbody>

                </table>
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
                            <input class="form-control" placeholder="Card Number" type="text" name="cardType" id="cardType">
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