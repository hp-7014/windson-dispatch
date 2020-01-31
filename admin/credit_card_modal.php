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
            <div class="modal-body custom-modal-body">
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_CreditCard">ADD</button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_creditCard()">Upload</button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" />
                    </div>

                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                </form>
                <br>

                <table class="table table-striped mb-0 table-editable table-debit">
                    <thead>
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
                    </thead>

                    <?php
                        $g_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                        $no = 1;
                    ?>

                    <tbody>
                    <?php foreach ($g_data as $data) {
                        $admin_credit = $data['admin_credit'];

                        foreach ($admin_credit as $admin) {
                            if ($admin['delete_status'] == '0') {
                                ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'Name',<?php echo $admin['_id']; ?>)"><?php echo $admin['Name']; ?></td>
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'displayName',<?php echo $admin['_id']; ?>)"><?php echo $admin['displayName']; ?></td>
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
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'cardHolderName',<?php echo $admin['_id']; ?>)"><?php echo $admin['cardHolderName']; ?></td>
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'cardNo',<?php echo $admin['_id']; ?>)"><?php echo $admin['cardNo']; ?></td>
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'cardLimit',<?php echo $admin['_id']; ?>)"><?php echo $admin['cardLimit']; ?></td>
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'openingBalance',<?php echo $admin['_id']; ?>)"><?php echo $admin['openingBalance']; ?></td>
                                    <td contenteditable="true"
                                        onblur="updateCredit(this,'transacBalance',<?php echo $admin['_id']; ?>)"><?php echo $admin['transacBalance']; ?></td>
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
                </table>
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
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                    <input type="hidden" id="transacBalance" value="" name="transacBalance">
                    <div class="form-group col-md-6">
                        <label>Name of Bank: *</label>
                        <div>
                            <input class="form-control" placeholder="Name of Bank: *" type="text" name="Name" id="Name">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Name To Display *</label>
                        <div>
                            <input class="form-control" placeholder="Name To Display *" type="text" name="displayName" id="displayName">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card Type *</label>
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
                        <label>Card Holder Name*</label>
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
                        <label>Opening Bal Dt *</label>
                        <div>
                            <input class="form-control" type="date" name="openingBalanceDt" id="openingBalanceDt">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card Limit*</label>
                        <div>
                            <input class="form-control" placeholder="Card Limit * " type="text" name="cardLimit" id="cardLimit">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Balance *</label>
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