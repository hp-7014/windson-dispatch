<?php session_start();
require "../database/connection.php";?>
<div id="truck" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Truck
                    Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>
            <div class="modal-body custom-modal-body">
                <div class="trucktype-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light"
                            data-toggle="modal"
                            data-target="#" id="addTruckType">Add
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importTruck()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light" href="download.php?file=Truck_Type.csv" style="margin-bottom: 2px;">CSV formate
                    </a>
                </form>
                <br>
                <table id="mainTable"
                       class="table table-striped mb-0 table-editable">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $show = $db->truck_add->find(['companyID' => $_SESSION['companyId']]);
                    $no = 1;
                    foreach ($show as $row){
                    $show1 = $row['truck'];
                    foreach ($show1 as $row1) {
                        $id = $row1['_id'];
                        $truckType = $row1['truckType'];

                        ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><div contenteditable="true" onblur="updateTruck(this,'truckType','<?php echo $id; ?>')" onclick="activate(this)"><?php echo $truckType; ?></div></td>
                            <td><a href="#" onclick="deleteTruck(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline"  style="font-size: 20px; color: #FC3B3B"></a></i>
                            </td>
                        </tr>
                    <?php } }?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="exportTruck(<?php echo $_SESSION['companyId']; ?>)" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
