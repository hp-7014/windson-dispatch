<?php
session_start();
include '../database/connection.php';
?>

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Add_Toll"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Add Toll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add_tolls">ADD</button>
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
                        <th>Invoice No</th>
                        <th>Action</th>
                    </tr>
                    </thead>

                    <tbody>

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
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_tolls"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Toll</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">

                    <div class="form-group col-md-3">
                        <label>Invoice No</label>
                        <div>
                            <select class="form-control " name="statePurch" id="statePurch" >
                                <option value="">Select Invoice No.</option>
                                <option value="1" >1</option>
                                <option value="2" >2</option>
                                <option value="3" >3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Date</label>
                        <div>
                            <input class="form-control" type="date" name="fuelDate" id="fuelDate">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Transaction Type</label>
                        <div>
                            <input class="form-control" placeholder="Transaction Type" type="text" name="cardNo" id="cardNo">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Location</label>
                        <div>
                            <input class="form-control" placeholder="Location" type="text" name="cardType" id="cardType">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Transponder</label>
                        <div>
                            <input class="form-control" placeholder="Amount" type="text" name="transacTime" id="transacTime">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Amount</label>
                        <div>
                            <input class="form-control" placeholder="Amount" type="text" name="transacTime" id="transacTime">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>License Plate</label>
                        <div>
                            <input class="form-control" placeholder="License Plate" type="text" name="transacTime" id="transacTime">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Truck No</label>
                        <div>
                            <select class="form-control" name="cardHolderName" id="cardHolderName" >
                                <option value="">Select Truck Number</option>
                                <?php

                                $show_data = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['truck'];
                                    foreach ($show as $s) {
                                        ?>
                                        <option value="<?php echo $s['truckNumber']; ?>"><?php echo $s['truckNumber']; ?></option>
                                    <?php }
                                }?>
                            </select>
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
