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

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#add_bank"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="bank_table" class="scroll" >
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Name of Bank</th>
                                    <th scope="col" col width="160" data-priority="3">Address / Branch</th>
                                    <th scope="col" col width="160" data-priority="1">Account Holder Name</th>
                                    <th scope="col" col width="160" data-priority="3">Bank Account</th>
                                    <th scope="col" col width="160" data-priority="3">Bank Routing</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Bal Dt</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Balance</th>
                                    <th scope="col" col width="160" data-priority="6">Transac Balance</th>
                                    <th scope="col" col width="160" data-priority="1">Check #</th>
                                    <th scope="col" col width="160" data-priority="3">Action</th>
                                </tr>
                                </thead>
                                <?php
                                $g_data = $db->bank_admin->find(['companyID' => $_SESSION['companyId']]);
                                $i = 1;
                                ?>

                                <tbody>
                                <?php foreach ($g_data as $data) {
                                    $bank_admin = $data['admin_bank'];

                                    foreach ($bank_admin as $admin) {
                                        $limit = 4;
                                        $total_records = $admin->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($admin['delete_status'] == '0') {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++ ?></th>
                                                <td>
                                                    <a href="#" id="bankName<?php echo $admin['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'bankName');" class="text-overflow"><?php echo $admin['bankName']; ?></a>
                                                    <button type="button" id="bankName<?php echo $admin['_id']; ?>" onclick="updateBank('bankName',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="bankAddresss<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'bankAddresss');" class="text-overflow"><?php echo $admin['bankAddresss']; ?></a>
                                                    <button type="button" id="bankAddresss<?php echo $admin['_id']; ?>" onclick="updateBank('bankAddresss',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>

                                                <td>
                                                    <select class="form-control"
                                                            onchange="updateAccount(this.value,'accountHolder',<?php echo $admin['_id']; ?>)">
                                                        <?php
                                                        $show_data = $db->company->find(['companyID' => $_SESSION['companyId']]);

                                                        foreach ($show_data as $show) {
                                                            $show = $show['company'];
                                                            foreach ($show as $s) {
                                                                ?>
                                                                <option value="<?php echo $s['companyName']; ?>" <?php if ($s['companyName'] == $admin['accountHolder']) {
                                                                    echo 'selected=selected';
                                                                } ?>><?php echo $s['companyName']; ?></option>
                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="#" id="accountNo<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'accountNo');" class="text-overflow"><?php echo $admin['accountNo']; ?></a>
                                                    <button type="button" id="accountNo<?php echo $admin['_id']; ?>" onclick="updateBank('accountNo',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="routingNo<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'routingNo');" class="text-overflow"><?php echo $admin['routingNo']; ?></a>
                                                    <button type="button" id="routingNo<?php echo $admin['_id']; ?>" onclick="updateBank('routingNo',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="openingBalDate<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalDate');" class="text-overflow"><?php echo $admin['openingBalDate']; ?></a>
                                                    <button type="button" id="openingBalDate<?php echo $admin['_id']; ?>" onclick="updateBank('openingBalDate',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="openingBalance<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalance');" class="text-overflow"><?php echo $admin['openingBalance']; ?></a>
                                                    <button type="button" id="openingBalance<?php echo $admin['_id']; ?>" onclick="updateBank('openingBalance',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="transacBalance<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'transacBalance');" class="text-overflow"><?php echo $admin['openingBalance']; ?></a>
                                                    <button type="button" id="transacBalance<?php echo $admin['_id']; ?>" onclick="updateBank('transacBalance',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                 <td>
                                                    <a href="#" id="currentcheqNo<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'currentcheqNo');" class="text-overflow"><?php echo $admin['currentcheqNo']; ?></a>
                                                    <button type="button" id="currentcheqNo<?php echo $admin['_id']; ?>" onclick="updateBank('currentcheqNo',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td><a href="#" onclick="deleteBank(<?php echo $admin['_id']; ?>)"><i
                                                                class="mdi mdi-delete-sweep-outline"
                                                                style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
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
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <?php
                            for($i=1; $i<=$total_pages; $i++){
                                if($i == 1){
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" data-id="<?php echo $i;?>" class="page-link" ><?php echo $i;?></a></li>

                                    <?php
                                }
                                else{
                                    ?>
                                    <li class="pageitem" id="<?php echo $i;?>"><a href="JavaScript:Void(0);" class="page-link" data-id="<?php echo $i;?>"><?php echo $i;?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
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
                <div class="row ">
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_Admin()">Upload</button>
                </div>
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                        <input type="hidden" id="transacBalance" value="" name="transacBalance">
                        <label>Name of Bank: <span style="color: red">*</span></label>
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
                        <label>Account Holder Name <span style="color: red">*</span></label>
                        <div>
                            <select class="form-control " name="accountHolder" id="accountHolder" >
                                <option value="">Select Account Holder <span style="color: red">*</span></option>
                                <?php

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
                        <label>Bank Account <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Bank Account *" type="text" name="accountNo" id="accountNo">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Bank Routing: <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Bank Routing: *" type="text" name="routingNo" id="routingNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Bal Dt <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" type="date" name="openingBalDate" id="openingBalDate">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Opening Balance <span style="color: red">*</span></label>
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

<style>
    .table-scroll {
        position: relative;
        width: 100%;
        z-index: 1;
        margin: auto;
        overflow: auto;
        height: 320px;
    }

    .table-scroll table {
        width: 100%;
        min-width: 1280px;
        margin: auto;
        border-collapse: separate;
        border-spacing: 0;
    }

    .table-wrap {
        position: relative;
    }

    .table-scroll th,
    .table-scroll td {
        /*padding: 5px 10px;*/
        border: 1px solid #000;
        background: #fff;
        vertical-align: bottom;
        text-align: center;
    }

    .table-scroll thead th {
        background: #30419B;
        color: #fff;
        padding: 4px;
        position: -webkit-sticky;
        position: sticky;
        top: 0;
    }

    /* safari and ios need the tfoot itself to be position:sticky also */
    .table-scroll tfoot,
    .table-scroll tfoot th,
    .table-scroll tfoot td {
        position: -webkit-sticky;
        position: sticky;
        bottom: 0;
        background: #666;
        color: #fff;
        z-index: 4;
    }

    /* testing links*/

    th:first-child {
        position: -webkit-sticky;
        position: sticky;
        left: 0;
        z-index: 2;
        background: #ccc;
    }

    thead th:first-child,
    tfoot th:first-child {
        z-index: 5;
    }

    table {
        table-layout: fixed;
    }

    .text-overflow {
        padding-top: 10px;
        display:block;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    a.editable-click { border-bottom: none;
        color: #000000;}
    a.editable-click:hover{
        border-bottom: none;
    }
    .table-scroll::-webkit-scrollbar {
        width: 12px;
        height: 8px;
    }

    /* Track */

    .table-scroll::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 10px;
        border-radius: 10px;
    }


    .table-scroll::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: rgb(48, 65, 155);
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

</style>
