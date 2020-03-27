<?php session_start();
require "../database/connection.php";?>
<div id="equipment" class="modal fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
     <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Equipment
                    Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="equipment-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            data-target="#" id="addEquipmentType"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importEquipment()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right" href="download.php?file=Equipment_Type.csv" style="margin-bottom: 2px;">CSV formate
                    </a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="equipment_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10" data-priority="1">Name</th>
                                        <th scope="col" col width="10" data-priority="3">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="equipmentBody">
                                <?php
                                    $show = $db->equipment_add->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 0;
                                    foreach ($show as $row){
                                        $show1 = $row['equipment'];
                                            foreach ($show1 as $row1) {
                                                $id = $row1['_id'];
                                                $counter = $row1['counter'];
                                                $equipmentType = "'".$row1['equipmentType']."'";
                                                $i++;
                                                $pencilid = "'"."equipmentPencil$i"."'";
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td> 
                                                <td class="custom-text" id="<?php echo "equipmentType".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('equipmentPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('equipmentPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "equipmentPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $equipmentType; ?>,'updateEquipment','text',<?php echo $row1['_id']; ?>,'equipmentType','Equipment Type',<?php echo $pencilid; ?>)"
                                                    ></i>
                                                    <?php echo $row1['equipmentType']; ?>
                                                </td>
                                                                                                                                           
                                                <td>
                                                    <?php if ($counter == 0) { ?>
                                                        <a href="#" onclick="deleteEquipment(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline"  style="font-size: 20px; color: #FC3B3B"></a></i>
                                                    <?php } else { ?>
                                                        <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
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
                <button type="button" onclick="exportEquipment()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->