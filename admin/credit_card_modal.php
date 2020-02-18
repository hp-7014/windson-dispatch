<?php
    session_start();
    include '../database/connection.php';
?>
    <!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="CreditCard"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right"type="text" id="search" placeholder="search" style="margin-left: 5px;">
                <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#Add_CreditCard"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                <!--<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_CreditCard">ADD</button>-->
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">

                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="credit_bank_table" class="scroll" >
                                <thead>
                                <tr>
                                    <th scope="col" col width="160">No</th>
                                    <th scope="col" col width="160" data-priority="1">Bank Name</th>
                                    <th scope="col" col width="160" data-priority="3">Display Name</th>
                                    <th scope="col" col width="160" data-priority="1">Card Type</th>
                                    <th scope="col" col width="160" data-priority="3">Account Holder Name</th>
                                    <th scope="col" col width="160" data-priority="3">Card No #</th>
                                    <th scope="col" col width="160" data-priority="6">Card Limit</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Balance</th>
                                    <th scope="col" col width="160" data-priority="6">Transac Balance</th>
                                    <th scope="col" col width="160" data-priority="1">Action</th>
                                </tr>
                                </thead>
                                <?php
                                    $g_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                                    $i = 1;
                                ?>

                                <tbody>
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
                                                        <a href="#" id="Name<?php echo $admin['_id']; ?>1" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'Name');" class="text-overflow"><?php echo $admin['Name']; ?></a>
                                                        <button type="button" id="Name<?php echo $admin['_id']; ?>" onclick="updateCredit('Name',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="displayName<?php echo $admin['_id']; ?>2" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'displayName');" class="text-overflow"><?php echo $admin['displayName']; ?></a>
                                                        <button type="button" id="displayName<?php echo $admin['_id']; ?>" onclick="updateCredit('displayName',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <select class="form-control"
                                                                onchange="update_Credit(this.value,'cardType',<?php echo $admin['_id']; ?>)">
                                                            <option value="">Select Card Type *</option>
                                                            <option value="Master" <?php if ('Master' == $admin['cardType']) {
                                                                echo 'selected=selected';
                                                            } ?>>Master
                                                            </option>
                                                            <option value="Visa" <?php if ('Visa' == $admin['cardType']) {
                                                                echo 'selected=selected';
                                                            } ?>>Visa
                                                            </option>
                                                            <option value="Other" <?php if ('Other' == $admin['cardType']) {
                                                                echo 'selected=selected';
                                                            } ?>>Other
                                                            </option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="cardHolderName<?php echo $admin['_id']; ?>4" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardHolderName');" class="text-overflow"><?php echo $admin['cardHolderName']; ?></a>
                                                        <button type="button" id="cardHolderName<?php echo $admin['_id']; ?>" onclick="updateCredit('cardHolderName',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="cardNo<?php echo $admin['_id']; ?>5" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardNo');" class="text-overflow"><?php echo $admin['cardNo']; ?></a>
                                                        <button type="button" id="cardNo<?php echo $admin['_id']; ?>" onclick="updateCredit('cardNo',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="cardLimit<?php echo $admin['_id']; ?>6" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'cardLimit');" class="text-overflow"><?php echo $admin['cardLimit']; ?></a>
                                                        <button type="button" id="cardLimit<?php echo $admin['_id']; ?>" onclick="updateCredit('cardLimit',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="openingBalance<?php echo $admin['_id']; ?>7" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'openingBalance');" class="text-overflow"><?php echo $admin['openingBalance']; ?></a>
                                                        <button type="button" id="openingBalance<?php echo $admin['_id']; ?>" onclick="updateCredit('openingBalance',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>
                                                    <td>
                                                        <a href="#" id="transacBalance<?php echo $admin['_id']; ?>8" data-type="textarea" onclick="showTextarea(this.id,'text',<?php echo $admin['_id']; ?>,'transacBalance');" class="text-overflow"><?php echo $admin['transacBalance']; ?></a>
                                                        <button type="button" id="transacBalance<?php echo $admin['_id']; ?>" onclick="updateCredit('transacBalance',<?php echo $admin['_id']; ?>)" style="display:none; margin-left:6px;" class="btn btn-success editable-submit btn-sm waves-effect waves-light text-center"><i class="mdi mdi-check"></i></button>
                                                    </td>

                                                    <td><a href="#" onclick="deleteCredit(<?php echo $admin['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
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
               <button type="button" onclick="export_CreditCard()" class="btn btn-primary waves-effect" data-dismiss="modal">
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
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Add_CreditCard"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add CreditCard</h5>
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
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_creditCard()">Upload</button>
                </div>
                <br>
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                    <input type="hidden" id="transacBalance" value="" name="transacBalance">
                    <div class="form-group col-md-6">
                        <label>Name of Bank: <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name of Bank: *" type="text" name="Name" id="Name">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Name To Display <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name To Display *" type="text" name="displayName" id="displayName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card Type <span style="color: red">*</span></label>
                        <div>
                            <select class="form-control" name="cardType" id="cardType">
                                <option value="">Select Card Type *</option>
                                <option value="Master">Master</option>
                                <option value="Visa">Visa</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Card Holder Name <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Card Holder Name *" type="text" name="cardHolderName" id="cardHolderName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card # </label>
                        <div>
                            <input class="form-control" placeholder="Card # " type="text" name="cardNo" id="cardNo">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Bal Dt <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" type="date" name="openingBalanceDt" id="openingBalanceDt">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card Limit <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Card Limit * " type="text" name="cardLimit" id="cardLimit">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Balance <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" type="text" placeholder="Opening Balance *" name="openingBalance" id="openingBalance">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="Add_Credit()" class="btn btn-primary waves-effect waves-light" >Save</button>
            </div>

        </div>
    </div>
</div>

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