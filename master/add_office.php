<?php session_start(); ?>
<div id="Office" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#Add_Office">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importOffice()"
                                           class="btn btn-outline-info waves-effect waves-light float-right"
                                           value="Upload"/>
                                    <div class="custom-upload-btn-wrapper float-right">
                                        <button class="custom-btn">Choose file</button>
                                        <input type="file" name="file" id="file" accept=".csv"/>
                                    </div>
                                    <button type="button"
                                            class="btn btn-outline-success waves-effect waves-light float-right">CSV formate
                                    </button>
                                </form>
                                <br>
                                <table id="mainTable"
                                       class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/PaymentTerms.php';
                                    require '../vendor/autoload.php';
                                    require '../database/connection.php';
                                    //connection to mongoDB
                                    $connect = new MongoDB\Client("mongodb://127.0.0.1/");

                                    // database selection
                                    $db = $connect->WindsonDispatch;
                                    $payment = new PaymentTerms();
                                    $show_data = $db->office->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        ?>
                                        <tr>
                                            <td><?php echo $no++; ?></td>
                                            <td contenteditable="true" onblur="updateOffice(this,'officeName',<?php echo $show['_id']; ?>)"><?php echo $show['officeName']; ?></td>
                                            <td contenteditable="true" onblur="updateOffice(this,'officeLocation',<?php echo $show['_id']; ?>)"><?php echo $show['officeLocation']; ?></td>
                                            <td><a href="#" onclick="deleteOffice(<?php echo $show['_id']; ?>)"><i
                                                            class="mdi mdi-delete-sweep-outline"
                                                            style="font-size: 20px; color: #FC3B3B"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div>
            <div class="modal-footer">
                <button type="button" onclick="exportOffice()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!---- Add office Modal here ----->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Add_Office" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Office</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name *</label>
                        <div>
                            <input class="form-control" placeholder="Name *" id="officeName" type="text"
                                   id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Location *</label>
                        <div>
                            <input class="form-control" placeholder="Location *" id="officeLocation" type="text"
                                   id="example-text-input">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect"
                            data-dismiss="modal">Close
                    </button>
                    <input type="submit" name="submit" onclick="addOffice()" value="Save" class="btn btn-primary waves-effect waves-light" />
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>