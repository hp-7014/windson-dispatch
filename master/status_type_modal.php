<?php
    session_start();
    include '../database/connection.php';
?>

<div id="Status_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Status Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form>
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_Status_Type">Add</button>

                                <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importStatus()">Upload</button>

                                <div class="custom-upload-btn-wrapper float-right">
                                    <button class="custom-btn">Choose file</button>
                                    <input type="file" id="file" name="cardfile"/>
                                </div>

                                </form>
                                <br>
                                <table id="mainTable3" class="table table-striped mb-0 table-editable">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status Name</th>
                                        <th>Status Color</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>

                                    <?php

                                    $statustype = $db->status_type->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    ?>

                                    <tbody>
                                    <?php foreach ($statustype as $status) {
                                        $status_data = $status['status'];
                                        foreach ($status_data as $data) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td contenteditable="true" onblur="updateStatus(this,'status_name',<?php echo $data['_id']; ?>)"><?php echo $data['status_name']; ?></td>
                                            <td contenteditable="true" onblur="update_Status(this,'status_color',<?php echo $data['_id']; ?>)"><input class="form-control" type="color" value="<?php echo $data['status_color']; ?>" name="status_color" id="statuscolor"></td>
                                            <td><a href="#" onclick="deleteStatus(<?php echo $data['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                     }
                                    ?>
                                    </tbody>
                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                    Close
                                </button>
                                <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save
                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Status_Type" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Status Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name *" type="text" name="status_name" id="status_name">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Color </label>
                        <div>
                            <input class="form-control" type="color" name="status_color" id="status_color" value="">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addStatusType()" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
