<?php
session_start();
include '../database/connection.php';
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="CreditCard"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="creditcard-container" style="z-index: 1400"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    CreditCard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                       placeholder="search" style="margin-left: 5px;">

                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            id="addCreditCard"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="import_creditCard()">Upload
                    </button>
                </form>

                <!--<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_CreditCard">ADD</button>-->
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">

                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="credit_bank_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Bank Name</th>
                                    <th scope="col" col width="160" data-priority="3">Display Name</th>
                                    <th scope="col" col width="160" data-priority="1">Card Type</th>
                                    <th scope="col" col width="160" data-priority="3">Account Holder Name</th>
                                    <th scope="col" col width="160" data-priority="3">Card No #</th>
                                    <th scope="col" col width="160" data-priority="6">Card Limit</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Balance Date</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Balance</th>
                                    <th scope="col" col width="160" data-priority="6">Transac Balance</th>
                                    <th scope="col" col width="160" data-priority="1">Action</th>
                                </tr>
                                </thead>
                                <?php
                                $g_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                                $i = 1;
                                ?>

                                <tbody id="CreditbankBody">
                                <?php foreach ($g_data as $data) {
                                    $admin_credit = $data['admin_credit'];
                                    foreach ($admin_credit as $admin) {
                                        $limit = 4;
                                        $total_records = $admin_credit->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($admin['delete_status'] == '0') {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++ ?></th>
                                                <td>
                                                    <a href="#" id="1Name<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'Name');"
                                                       class="text-overflow"><?php echo $admin['Name']; ?></a>
                                                    <button type="button" id="Name<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('Name',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1displayName<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'displayName');"
                                                       class="text-overflow"><?php echo $admin['displayName']; ?></a>
                                                    <button type="button" id="displayName<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('displayName',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href='#' id='1cardType<?php echo $admin['_id']; ?>' data-type='textarea' ondblclick='showTextarea(this.id,"text",<?php echo $admin['_id']; ?>,"cardTypeColumn")' class='text-overflow'><?php echo $admin['cardType']; ?></a>
                                                    <button type='button' id='cardType<?php echo $admin['_id']; ?>' style='display:none; margin-left:6px;' onclick='updateDriver("cardType",<?php echo $admin['_id']; ?>)' class='btn btn-success editable-submit btn-sm waves-effect waves-light text-center'><i class='mdi mdi - check'></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1cardHolderName<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardHolderName');"
                                                       class="text-overflow"><?php echo $admin['cardHolderName']; ?></a>
                                                    <button type="button"
                                                            id="cardHolderName<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('cardHolderName',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1cardNo<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardNo');"
                                                       class="text-overflow"><?php echo $admin['cardNo']; ?></a>
                                                    <button type="button" id="cardNo<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('cardNo',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1cardLimit<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardLimit');"
                                                       class="text-overflow"><?php echo $admin['cardLimit']; ?></a>
                                                    <button type="button" id="cardLimit<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('cardLimit',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1openingBalanceDt<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalanceDt');"
                                                       class="text-overflow"><?php echo $admin['cardLimit']; ?></a>
                                                    <button type="button" id="openingBalanceDt<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('openingBalanceDt',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1openingBalance<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalance');"
                                                       class="text-overflow"><?php echo date("d-m-Y",$admin['openingBalance']); ?></a>
                                                    <button type="button"
                                                            id="openingBalance<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('openingBalance',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="1transacBalance<?php echo $admin['_id']; ?>"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'transacBalance');"
                                                       class="text-overflow"><?php echo $admin['transacBalance']; ?></a>
                                                    <button type="button"
                                                            id="transacBalance<?php echo $admin['_id']; ?>"
                                                            onclick="updateCredit('transacBalance',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>

                                                <td><a href="#" onclick="deleteCredit(<?php echo $admin['_id']; ?>)"><i
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
                                    <th>Bank Name</th>
                                    <th>Display Name</th>
                                    <th>Card Type</th>
                                    <th>Account Holder Name</th>
                                    <th>Card No #</th>
                                    <th>Card Limit</th>
                                    <th>Opening Balance Date</th>
                                    <th>Opening Balance</th>
                                    <th>Transac Balance</th>
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
                <button type="button" onclick="export_CreditCard()" class="btn btn-primary waves-effect"
                        data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-----------------------------------------------Add CreditCard------------------------------------------------------------------------------------->