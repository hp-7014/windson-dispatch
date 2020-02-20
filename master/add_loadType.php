<?php session_start();
require "../database/connection.php";?>
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
                <div class="loadtype-container" style="z-index: 1800"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <button type="button" class="btn btn-primary waves-effect waves-light"
                                            data-toggle="modal"
                                            data-target="#" id="Active_Load_Type">Add
                                    </button>
                                    <input type="submit" name="submit" onclick="importLoadType()"
                                           class="btn btn-outline-info waves-effect waves-light float-right"
                                           value="Upload"/>
                                    <div class="custom-upload-btn-wrapper float-right">
                                        <button class="custom-btn">Choose file</button>
                                        <input type="file" name="file" id="file" accept=".csv"/>
                                    </div>
                                    <a class="btn btn-outline-success waves-effect waves-light" href="download.php?file=Active_Load_Type.csv" style="margin-bottom: 2px;">CSV formate
                                    </a>
                                </form>
                                <br>
                                <br>
                                <table id="mainTable"
                                       class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Unit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    require 'model/LoadType.php';

                                    $load_type = new LoadType();
                                    $show_data = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($show_data as $show) {
                                        $show = $show['loadType'];
                                        foreach ($show as $s) {
                                            ?>
                                            <tr>
                                                <td><a href="#" id="stdid"><?php echo $no++; ?></a></td>
                                                <td contenteditable="true"
                                                    onblur="updateloadType(this,'loadName',<?php echo $s['_id']; ?>)"><?php echo $s['loadName']; ?></td>
                                                <td contenteditable="true"
                                                    onblur="updateloadType(this,'loadType',<?php echo $s['_id']; ?>)"><?php echo $s['loadType']; ?></td>
                                                <td><a href="#" onclick="deleteloadType(<?php echo $s['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    } ?>
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