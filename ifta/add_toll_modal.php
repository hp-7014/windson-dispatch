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
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importTolls()">Upload</button>
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
                            <th>Invoice No.</th>
                            <th>Transaction Date</th>
                            <th>Transaction Type</th>
                            <th>Location</th>
                            <th>Transponder</th>
                            <th>License Plate</th>
                            <th>Amount</th>
                            <th>Truck No.</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                        $toll_data = $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
                        $no = 1;
                    ?>

                    <tbody>
                    <?php foreach ($toll_data as $data) {
                        $t_dt = $data['tolls'];

                        foreach ($t_dt as $a_tl) {
                            if ($a_tl['delete_status'] == '0') {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'invoiceNumber',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['invoiceNumber']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'tollDate',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['tollDate']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'transType',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['transType']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'location',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['location']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'transponder',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['transponder']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'amount',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['amount']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'licensePlate',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['licensePlate']; ?></td>
                                    <td contenteditable="true" onblur="updateTolls(this,'truckNo',<?php echo $a_tl['_id']; ?>)"><?php echo $a_tl['truckNo']; ?></td>
                                    <td><a href="#" onclick="deleteTolls(<?php echo $a_tl['_id']; ?>)"><i
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
                <button type="button" onclick="exportTolls()" class="btn btn-primary waves-effect" data-dismiss="modal">
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
                            <select class="form-control " name="invoiceNumber" id="invoiceNumber" >
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
                            <input class="form-control" type="date" name="tollDate" id="tollDate">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Transaction Type</label>
                        <div>
                            <input class="form-control" placeholder="Transaction Type" type="text" name="transType" id="transType" style="text-transform:uppercase">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Location</label>
                        <div>
                            <input class="form-control" placeholder="Location" type="text" name="location" id="location">
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-3">
                        <label>Transponder</label>
                        <div>
                            <input class="form-control" placeholder="Transponder" type="text" name="transponder" id="transponder">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>Amount</label>
                        <div>
                            <input class="form-control" placeholder="Amount" type="text" name="amount" id="amount">
                        </div>
                    </div>

                    <div class="form-group col-md-3">
                        <label>License Plate</label>
                        <div>
                            <input class="form-control" placeholder="License Plate" type="text" name="licensePlate" id="licensePlate">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Truck No</label>
                        <div>
                            <select class="form-control" name="truckNo" id="truckNo" >
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
                <button type="button" onclick="Add_TollData()" class="btn btn-primary waves-effect waves-light" >Save</button>
            </div>

        </div>
    </div>
</div>
