<?php
    session_start();
    include '../database/connection.php';
?>

<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Custom_Broker"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Customs Broker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body">
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_Customs_Broker">ADD</button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_Custom_Broker()">Upload</button>
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
                            <th>Name</th>
                            <th>Crossing</th>
                            <th>Telephone</th>
                            <th>Ext</th>
                            <th>Toll Free</th>
                            <th>Fax</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                        $broker = $db->customs_broker->find(['companyID' => $_SESSION['companyId']]);
                        $no = 1;
                    ?>

                    <tbody>
                    <?php foreach ($broker as $brok) {
                        $c_broker = $brok['custom_b'];

                        foreach ($c_broker as $custom) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'brokerName',<?php echo $custom['_id']; ?>)"><?php echo $custom['brokerName']; ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'crossing',<?php echo $custom['_id']; ?>)"><?php echo $custom['crossing']; ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'telephone',<?php echo $custom['_id']; ?>)"><?php echo $custom['telephone']; ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'ext',<?php echo $custom['_id']; ?>)"><?php echo $custom['ext']; ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'tollfree',<?php echo $custom['_id']; ?>)"><?php echo $custom['tollfree']; ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'fax',<?php echo $custom['_id']; ?>)"><?php echo $custom['fax']; ?></td>
                                <td contenteditable="true" onblur="updateCustom(this,'Status',<?php echo $custom['_id']; ?>)"><?php echo $custom['Status']; ?></td>
                                <td><a href="#" onclick="deleteCustom(<?php echo $custom['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_CustomBroker()" class="btn btn-primary waves-effect" data-dismiss="modal">
                     Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-----------------------------------------------Add Custom Broker------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Add_Customs_Broker"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Customs Broker</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Broker Name*</label>
                        <div>
                            <input class="form-control" placeholder="Broker Name *" type="text" name="brokerName" id="brokerName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Crossing *</label>
                        <div>
                            <input class="form-control" placeholder="Crossing *" type="text" name="crossing" id="crossing">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Telephone</label>
                        <div>
                            <input class="form-control" placeholder="Telephone No" type="text" name="telephone" id="telephone">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Ext</label>
                        <div>
                            <input class="form-control" placeholder="Ext" type="text" name="ext" id="ext">
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label>Toll Free</label>
                        <div>
                            <input class="form-control" placeholder="Toll Free" type="text" name="tollfree" id="tollfree">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fax</label>
                        <div>
                            <input class="form-control" placeholder="Fax No" type="text" name="fax" id="fax">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Status </label>
                        <div class="row">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="Status1" name="Status" value="Active" checked>
                                <label class="custom-control-label" for="Status1">Active</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" class="custom-control-input" id="Status2" name="Status" value="InActive">
                                <label class="custom-control-label" for="Status2">Inactive</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary waves-effect waves-light" onclick="Add_CustomBroker()">Save</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

