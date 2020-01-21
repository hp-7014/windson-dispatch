<?php session_start(); ?>
<!--  Modal content for the above example -->
<div id="Load_Type" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Active Load Type</h5>
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
                                            data-target="#Active_Load_Type">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importLoadType()"
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
                                <br>
                                <table id="mainTable"
                                       class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Type</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/LoadType.php';
                                    require '../vendor/autoload.php';
                                    require '../database/connection.php';
                                    //connection to mongoDB
                                    $connect = new MongoDB\Client("mongodb://127.0.0.1/");

                                    // database selection
                                    $db = $connect->WindsonDispatch;
                                    $load_type = new LoadType();
                                    $show_data = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        ?>
                                        <tr>
                                            <td><a href="#" id="stdid"><?php echo $no++; ?></a></td>
                                            <td contenteditable="true"
                                                onblur="updateloadType(this,'loadName',<?php echo $show['_id']; ?>)"><?php echo $show['loadName']; ?></td>
                                            <td contenteditable="true"
                                                onblur="updateloadType(this,'loadType',<?php echo $show['_id']; ?>)"><?php echo $show['loadType']; ?></td>
                                            <td><a href="#" onclick="deleteloadType(<?php echo $show['_id']; ?>)"><i
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
                <button type="button" onclick="exportLoadType()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!-----------------------------------------------------------------------Add Active Load Type-------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="Active_Load_Type" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Active Load Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Name *</label>
                        <div>
                            <input class="form-control" placeholder="Name *" type="text"
                                   id="loadName">
                            <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>
                            Unit # *</label>
                        <select class="form-control" id="loadType">
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect"
                            data-dismiss="modal">Close
                    </button>
                    <button type="submit" name="submit" onclick="addLoadType()"
                            class="btn btn-primary waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!------------------------------------------------------------------------------------------------------------------------------------------------>