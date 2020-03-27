<?php session_start();
require "../database/connection.php";?>
<!--  Modal content for the above example -->
<div id="Fix_Pay" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Fix Pay
                    Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="fixpay-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal"
                            data-target="#" id="Fix_Pay_Category"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importfixpay()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right" href="download.php?file=Fix_Pay_Category.csv" style="margin-bottom: 2px;">CSV formate
                    </a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="fixpay_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10" data-priority="1">Name</th>
                                        <th scope="col" col width="10" data-priority="3">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="fixpayBody">
                                <?php
                                    $show = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 0;
                                    foreach ($show as $row){
                                        $show1 = $row['fixPay'];
                                            foreach ($show1 as $row1) {
                                                $id = $row1['_id'];
                                                $fixPayType = "'".$row1['fixPayType']."'";
                                                $i++;
                                                $pencilid = "'"."fixPayPencil$i"."'";
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td> 
                                                <td class="custom-text" id="<?php echo "fixPayType".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('fixPayPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('fixPayPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "fixPayPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $fixPayType; ?>,'updatefixPay','text',<?php echo $row1['_id']; ?>,'fixPayType','Fix Pay Type',<?php echo $pencilid; ?>)"
                                                    ></i>
                                                    <?php echo $row1['fixPayType']; ?>
                                                </td> 
                                                <td><a href="#" onclick="deletefixpay(<?php echo $id; ?>)"><i class="mdi mdi-delete-sweep-outline"  style="font-size: 20px; color: #FC3B3B"></a></i>
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
                <button type="button" onclick="exportfixpay()" class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<!----------------------------------------------------------------------- Add Fix Pay Category-------------------------------------------------------------------->