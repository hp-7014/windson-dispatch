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

                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                       placeholder="search" style="margin-left: 5px;">

                <div class="bank-container" style="z-index: 1400"></div>
                <form action="" method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                            id="AddBank"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="import_Admin()">Upload
                    </button>
                </form>

                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="bank_table" class="scroll">
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

                                <tbody id="bankBody">
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
                                                    <a href="#" id="1bankName<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'bankName');"
                                                       class="text-overflow"><?php echo $admin['bankName']; ?></a>
                                                    <button type="button" id="bankName<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('bankName',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1bankAddresss<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'bankAddresss');"
                                                       class="text-overflow"><?php echo $admin['bankAddresss']; ?></a>
                                                    <button type="button" id="bankAddresss<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('bankAddresss',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
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
                                                    <a href="#" id="1accountNo<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'accountNo');"
                                                       class="text-overflow"><?php echo $admin['accountNo']; ?></a>
                                                    <button type="button" id="accountNo<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('accountNo',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1routingNo<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'routingNo');"
                                                       class="text-overflow"><?php echo $admin['routingNo']; ?></a>
                                                    <button type="button" id="routingNo<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('routingNo',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1openingBalDate<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalDate');"
                                                       class="text-overflow"><?php echo $admin['openingBalDate']; ?></a>
                                                    <button type="button"
                                                            id="openingBalDate<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('openingBalDate',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1openingBalance<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalance');"
                                                       class="text-overflow"><?php echo $admin['openingBalance']; ?></a>
                                                    <button type="button"
                                                            id="openingBalance<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('openingBalance',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1transacBalance<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'transacBalance');"
                                                       class="text-overflow"><?php echo $admin['openingBalance']; ?></a>
                                                    <button type="button"
                                                            id="transacBalance<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('transacBalance',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1currentcheqNo<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       ondblclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'currentcheqNo');"
                                                       class="text-overflow"><?php echo $admin['currentcheqNo']; ?></a>
                                                    <button type="button" id="currentcheqNo<?php echo $admin['_id']; ?>"
                                                            onclick="updateBank('currentcheqNo',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
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
                            for ($i = 1; $i <= $total_pages; $i++) {
                                if ($i == 1) {
                                    ?>
                                    <li class="pageitem active" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                          data-id="<?php echo $i; ?>"
                                                                                          class="page-link"><?php echo $i; ?></a>
                                    </li>

                                    <?php
                                } else {
                                    ?>
                                    <li class="pageitem" id="<?php echo $i; ?>"><a href="JavaScript:Void(0);"
                                                                                   class="page-link"
                                                                                   data-id="<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_Admin()" class="btn btn-primary waves-effect"
                        data-dismiss="modal">
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