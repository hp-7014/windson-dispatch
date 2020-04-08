<?php session_start();
require "../database/connection.php";?>
<div id="truck" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Truck
                    Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="trucktype-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="addTruckType"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="importTruck()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right"
                        href="download_csv_file.php?file=Truck_Type.csv" style="margin-bottom: 2px;">CSV formate
                    </a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="truckType_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody id="truckBody">
                                    <?php
                                    $show = $db->truck_add->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 1;
                                    foreach ($show as $row){
                                    $show1 = $row['truck'];
                                    foreach ($show1 as $row1) {
                                        $id = $row1['_id'];
                                        $counter = $row1['counter'];
                                        $truckType = "'".$row1['truckType']."'";
                                        $pencilid = "'"."TruckPencil$i"."'";
                                        ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td id="<?php echo "truckType".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('TruckPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('TruckPencil$i'); "?>">
                                            <i id="<?php echo "TruckPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $truckType; ?>,'updateTruck','text',<?php echo $row1['_id']; ?>,'truckType','Truck Type',<?php echo $pencilid; ?>)"></i>
                                            <?php echo $row1['truckType']; ?>
                                        </td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#" onclick="deleteTruck(<?php echo $id; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></a></i>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                    <?php }
                                    }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <span class="mandatory">Note: CSV files must contain atmost 1000 rows at a time.</span>
                <button type="button" onclick="exportTruck(<?php echo $_SESSION['companyId']; ?>)"
                    class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->