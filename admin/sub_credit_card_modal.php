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
            <div class="modal-body custom-modal-body">
                <form method="post" enctype="multipart/form-data">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#add_sub_credit">ADD</button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="import_Sub_credit()">Upload</button>
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
                            <th>Display Name</th>
                            <th>Main Card</th>
                            <th>Card Holder Name</th>
                            <th>Card No</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <?php
                        $g_data = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);
                        $no = 1;
                    ?>

                    <tbody>
                    <?php foreach ($g_data as $data) {
                        $sub_credit = $data['sub_credit'];

                        foreach ($sub_credit as $admin) { ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td contenteditable="true" onblur="updateSubCredit(this,'displayName',<?php echo $admin['_id']; ?>)"><?php echo $admin['displayName']; ?></td>
                                <td contenteditable="true" >
                                    <select class="form-control" id="mainCard" onchange="updateSub_Credit(this.value,'mainCard',<?php echo $admin['_id']; ?>)">
                                        <?php

                                        $show_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);

                                        foreach ($show_data as $show) {
                                            $show = $show['admin_credit'];
                                            foreach ($show as $s) {
                                                ?>
                                                <option value="<?php echo $s['Name']; ?>" <?php if($s['Name'] == $admin['mainCard']) { echo 'selected=selected';} ?>><?php echo $s['Name']; ?></option>
                                            <?php }
                                        }?>
                                    </select>
                                </td>
                                <td contenteditable="true" onblur="updateSubCredit(this,'cardHolderName',<?php echo $admin['_id']; ?>)"><?php echo $admin['cardHolderName']; ?></td>
                                <td contenteditable="true" onblur="updateSubCredit(this,'cardNo',<?php echo $admin['_id']; ?>)"><?php echo $admin['cardNo']; ?></td>
                                <td><a href="#" onclick="deleteSubCredit(<?php echo $admin['_id']; ?>,<?php echo $admin['delete_status']?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
                    </tbody>

                </table>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_SubCredit()" class="btn btn-primary waves-effect" data-dismiss="modal">
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
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_sub_credit"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Sub CreditCard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">

                    <div class="form-group col-md-6">
                        <label>Name To Display *</label>
                        <div>
                            <input class="form-control" placeholder="Name To Display *" type="text" name="displayName" id="displayName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Main Card *</label>
                        <div>
                            <select class="form-control" name="mainCard" id="mainCard">
                                <option value="">Select Credit Card</option>
                                <?php

                                $show_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['admin_credit'];
                                    foreach ($show as $s) {
                                        ?>
                                        <option value="<?php echo $s['Name']; ?>"><?php echo $s['Name']; ?></option>
                                    <?php }
                                }?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card Holder Name*</label>
                        <div>
                            <input class="form-control" placeholder="Card Holder Name *" type="text" name="cardHolderName" id="cardHolderName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Card No # </label>
                        <div>
                            <input class="form-control" placeholder="Card No # " type="text" name="cardNo" id="cardNo">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
                <button type="button" onclick="Add_SubCredit()" class="btn btn-primary waves-effect waves-light" >Save</button>
            </div>

        </div>
    </div>
</div>