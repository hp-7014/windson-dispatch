<?php
session_start();
include '../database/connection.php';
?>

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Credit_Card"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Sub Credit Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="subcreditcard-container" style="z-index: 1800"></div>
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                       placeholder="search" style="margin-left: 5px;">
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            data-target="#" id="addSubCreditCard"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>

                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="import_Sub_credit()">Upload
                    </button>
                </form>
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="sub_credit_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Display Name</th>
                                    <th scope="col" col width="160" data-priority="3">Main Card</th>
                                    <th scope="col" col width="160" data-priority="1">Card Holder Name</th>
                                    <th scope="col" col width="160" data-priority="3">Card No</th>
                                    <th scope="col" col width="160" data-priority="3">Action</th>
                                </tr>
                                </thead>
                                <?php
                                $g_data = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);
                                $i = 1;
                                ?>

                                <tbody>
                                <?php foreach ($g_data as $data) {
                                    $sub_credit = $data['sub_credit'];

                                    foreach ($sub_credit as $admin) {
                                        $limit = 4;
                                        $total_records = $admin->count();
                                        $total_pages = ceil($total_records / $limit);
                                        if ($admin['delete_status'] == '0') {
                                            ?>
                                            <tr>
                                                <th><?php echo $i++ ?></th>
                                                <td>
                                                    <a href="#" id="displayName<?php echo $admin['_id']; ?>1"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'displayName');"
                                                       class="text-overflow"><?php echo $admin['displayName']; ?></a>
                                                    <button type="button" id="displayName<?php echo $admin['_id']; ?>"
                                                            onclick="updateSubCredit('displayName',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <select class="form-control"
                                                            onchange="updateSub_Credit(this.value,'mainCard',<?php echo $admin['_id']; ?>)">
                                                        <?php
                                                        $show_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                                                        foreach ($show_data as $show) {
                                                            $show = $show['admin_credit'];
                                                            foreach ($show as $s) {
                                                                ?>
                                                                <option value="<?php echo $s['Name']; ?>" <?php if ($s['Name'] == $admin['mainCard']) {
                                                                    echo 'selected=selected';
                                                                } ?>><?php echo $s['Name']; ?></option>
                                                            <?php }
                                                        } ?>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="#" id="cardHolderName<?php echo $admin['_id']; ?>2"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardHolderName');"
                                                       class="text-overflow"><?php echo $admin['cardHolderName']; ?></a>
                                                    <button type="button"
                                                            id="cardHolderName<?php echo $admin['_id']; ?>"
                                                            onclick="updateSubCredit('cardHolderName',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td>
                                                    <a href="#" id="cardNo<?php echo $admin['_id']; ?>3"
                                                       data-type="textarea"
                                                       onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardNo');"
                                                       class="text-overflow"><?php echo $admin['cardNo']; ?></a>
                                                    <button type="button" id="cardNo<?php echo $admin['_id']; ?>"
                                                            onclick="updateSubCredit('cardNo',<?php echo $admin['_id']; ?>)"
                                                            style="display:none; margin-left:6px;"
                                                            class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center">
                                                        <i class="mdi mdi-check"></i></button>
                                                </td>
                                                <td><a href="#" onclick="deleteSubCredit(<?php echo $admin['_id']; ?>)"><i
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
                                    <th>Display Name</th>
                                    <th>Main Card</th>
                                    <th>Card Holder Name</th>
                                    <th>Card No</th>
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
                <button type="button" onclick="export_SubCredit()" class="btn btn-primary waves-effect"
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

<!-----------------------------------------------Add Sub CreditCard------------------------------------------------------------------------------------->