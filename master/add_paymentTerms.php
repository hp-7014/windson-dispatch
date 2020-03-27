<?php session_start();
require "../database/connection.php"; ?>
<!--  Modal content for the above example -->
<div id="Payment_Terms" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
     <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Payment Terms</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="payment-container" style="z-index: 1800"></div>
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            data-target="#" id="Add_Payment_Terms"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <input type="submit" name="submit" onclick="importExcel()" class="btn btn-outline-info waves-effect waves-light float-right" value="Upload"/>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" name="file" id="file" accept=".csv"/>
                    </div>
                    <a class="btn btn-outline-success waves-effect waves-light float-right"
                        href="download.php?file=Payment_Terms.csv" style="margin-bottom: 2px;">CSV
                        formate
                    </a>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll-s" class="table-scroll-s">
                            <table id="paymentTerms_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="2">No</th>
                                        <th scope="col" col width="10" data-priority="1">Name</th>
                                        <th scope="col" col width="10" data-priority="3">Delete</th>
                                    </tr>
                                </thead>

                                <tbody id="paymentTermsBody">
                                    <?php
                                    require 'model/PaymentTerms.php';

                                    $payment = new PaymentTerms();
                                    $show_data = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 0;
                                    foreach ($show_data as $show) {
                                        $show = $show['payment'];
                                        foreach ($show as $s) {
                                            $paymentTerm = "'".$s['paymentTerm']."'";
                                            $counter = $s['counter'];
                                            $i++;
                                            $pencilid = "'"."paymentTermPencil$i"."'";
                                        ?>
                                            <tr>
                                                <td><?php echo $i ?></td>  
                                                <td class="custom-text" id="<?php echo "paymentTerm".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('paymentTermPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('paymentTermPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "paymentTermPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $paymentTerm; ?>,'updatePayment','text',<?php echo $s['_id']; ?>,'paymentTerm','Name',<?php echo $pencilid; ?>)"
                                                    ></i>
                                                    <?php echo $s['paymentTerm']; ?>
                                                </td>                                                                                          
                                                <td>
                                                    <?php if($counter == 0) { ?>
                                                        <a href="#" onclick="deletePayment(<?php echo $s['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
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
                                        <th>Delete</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="exportExcel(<?php echo $_SESSION['companyId']; ?>)"
                        class="btn btn-primary waves-effect waves-light">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-----------------------------------------Add Payment Terms-------------------------------------------------------------------------------->