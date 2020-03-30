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
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="status-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_Status_Type"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importStatus()">Upload</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="cardfile"/>
                    </div>
                    <!-- <a class="btn btn-outline-success waves-effect waves-light float-right" href="download.php?file=Trailer_Type.csv" style="margin-bottom: 2px;">CSV formate
                    </a> -->
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="status_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10" data-priority="1">Status Name</th>
                                        <th scope="col" col width="10" data-priority="3">Status Color</th>
                                        <th scope="col" col width="10" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="statusBody">
                                <?php
                                    $statustype = $db->status_type->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 0;
                                    foreach ($statustype as $status) {
                                        $status_data = $status['status'];
                                        foreach ($status_data as $data) {
                                            $status_name = "'".$data['status_name']."'";
                                            $i++;
                                            $pencilid = "'"."statusPencil$i"."'";
                                    ?>
                                            <tr>
                                                <td><?php echo $i ?></td>  
                                                <td class="custom-text" id="<?php echo "status_name".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('statusPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('statusPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "statusPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $status_name; ?>,'updateStatus','text',<?php echo $data['_id']; ?>,'status_name','Status Type',<?php echo $pencilid; ?>)"
                                                    ></i>
                                                    <?php echo $data['status_name']; ?>
                                                </td> 
                                                <td><input class="form-control" type="color" value="<?php echo $data['status_color']; ?>" name="status_color" onchange="update_Status(this.value,'status_color',<?php echo $data['_id']; ?>)"></td>
                                                <td><a href="#" onclick="deleteStatus(<?php echo $data['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td> 
                                            </tr>
                                        <?php }
                                    }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Status Name</th>
                                        <th>Status Color</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
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
                        <label>Name <span class="mandatory">*</span></label>
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
                <span class="mandatory">Note: * Fields are Mandatory</span>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" onclick="addStatusType()" class="btn btn-primary waves-effect waves-light">Save</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
