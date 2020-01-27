<?php
    session_start();
    include '../database/connection.php';
?>

<!-- Modal content for the above example -->
    <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="bank"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xxl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                        Bank</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add_bank">ADD</button>
                        <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_Admin()">Upload</button>
                        <div class="custom-upload-btn-wrapper float-right">
                            <button class="custom-btn">Choose file</button>
                            <input type="file" id="file" name="myfile" />
                        </div>

                        <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                    </form><br>

                    <table class="table table-striped mb-0 table-editable table-debit">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name of Bank</th>
                                <th>Address / Branch</th>
                                <th>Account Holder Name</th>
                                <th>Bank Account</th>
                                <th>Bank Routing</th>
                                <th>Opening Bal Dt</th>
                                <th>Opening Balance</th>
                                <th>Transac Balance</th>
                                <th>Check #</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <?php
                            $g_data = $db->bank_admin->find(['companyID' => $_SESSION['companyId']]);
                            $no = 1;
                        ?>


                        <tbody>
                        <?php foreach ($g_data as $data) {
                            $bank_admin = $data['admin_bank'];

                            foreach ($bank_admin as $admin) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'bankName',<?php echo $admin['_id']; ?>)"><?php echo $admin['bankName']; ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'bankAddresss',<?php echo $admin['_id']; ?>)"><?php echo $admin['bankAddresss']; ?></td>
                                    <td contenteditable="true" >
                                        <select class="form-control" id="accountHolder" onchange="updateAccount(this.value,'accountHolder',<?php echo $admin['_id']; ?>)">
                                            <?php
                                               $show_data = $db->company->find(['companyID' => $_SESSION['companyId']]);

                                            foreach ($show_data as $show) {
                                                $show = $show['company'];
                                                foreach ($show as $s) {
                                                    ?>
                                                    <option value="<?php echo $s['companyName']; ?>" <?php if($s['companyName'] == $admin['accountHolder']) { echo 'selected=selected';} ?>><?php echo $s['companyName']; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </td>
                                    <td contenteditable="true" onblur="updateBank(this,'accountNo',<?php echo $admin['_id']; ?>)"><?php echo $admin['accountNo']; ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'routingNo',<?php echo $admin['_id']; ?>)"><?php echo $admin['routingNo']; ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'openingBalDate',<?php echo $admin['_id']; ?>)"><?php echo $admin['openingBalDate']; ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'openingBalance',<?php echo $admin['_id']; ?>)"><?php echo $admin['openingBalance']; ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'transacBalance',<?php echo $admin['_id']; ?>)"><?php echo $admin['transacBalance']; ?></td>
                                    <td contenteditable="true" onblur="updateBank(this,'currentcheqNo',<?php echo $admin['_id']; ?>)"><?php echo $admin['currentcheqNo']; ?></td>
                                    <td><a href="#" onclick="deleteBank(<?php echo $admin['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                    </td>
                                </tr>
                            <?php }
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button type="button" onclick="export_Admin()" class="btn btn-primary waves-effect" data-dismiss="modal">
                        Export
                    </button>

                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        Close
                    </button>

                    <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save
                    </button>-->
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-----------------------------------------------Add bank------------------------------------------------------------------------------------->
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_bank"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        <input type="hidden" id="transacBalance" value="" name="transacBalance">
                        <label>Name of Bank: *</label>
                        <div>
                            <input class="form-control" placeholder="Name of Bank: *" type="text" name="bankName" id="bankName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Address / Branch </label>
                        <div>
                            <input class="form-control" placeholder="Address / Branch " type="text" name="bankAddress" id="bankAddress">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Account Holder Name *</label>
                        <div>
                            <select class="form-control" name="accountHolder" id="accountHolder">
                                <option value="">Select Account Holder *</option>
                                <?php
                                    //$company = new Company();
                                    $show_data = $db->company->find(['companyID' => $_SESSION['companyId']]);

                                    foreach ($show_data as $show) {
                                        $show = $show['company'];
                                        foreach ($show as $s) {
                                            ?>
                                            <option value="<?php echo $s['companyName']; ?>"><?php echo $s['companyName']; ?></option>
                                        <?php }
                                    }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Bank Account *</label>
                        <div>
                            <input class="form-control" placeholder="Bank Account *" type="text" name="accountNo" id="accountNo">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Bank Routing: *</label>
                        <div>
                            <input class="form-control" placeholder="Bank Routing: *" type="text" name="routingNo" id="routingNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Bal Dt *</label>
                        <div>
                            <input class="form-control" type="date" name="openingBalDate" id="openingBalDate">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Opening Balance *</label>
                        <div>
                            <input class="form-control" placeholder="Opening Balance * " type="text" name="openingBalance" id="openingBalance">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Current Cheque no </label>
                        <div>
                            <input class="form-control" placeholder="Current Cheque no " type="text" name="currentcheqNo" id="currentcheqNo">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" onclick="AddBankAdmin()" class="btn btn-primary waves-effect waves-light" >Save</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->