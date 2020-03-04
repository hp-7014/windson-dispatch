<?php
session_start();
require "../database/connection.php";
?>

<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="add_sub_credit"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add Sub CreditCard</h5>
                <button type="button" class="close modalSubCredit" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="creditcard-container" style="z-index: 1600"></div>
                <br>
                <div class="row">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">

                    <div class="form-group col-md-6">
                        <label>Name To Display <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Name To Display *" type="text" name="displayName"
                                   id="displayName">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Main Card <span class="mandatory">*</span></label><i class="mdi mdi-plus-circle plus" title="Add Main Card" id="addCreditCard"></i>
                        <div>
                            <select class="form-control" name="mainCard" id="mainCard">
                                <option value="">Select Credit Card</option>
                                <?php
                                $show_data = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                                foreach ($show_data as $show) {
                                    $show = $show['admin_credit'];
                                    foreach ($show as $s) {
                                        ?>
                                        <option value="<?php echo $s['_id']; ?>"><?php echo $s['cardHolderName']; ?></option>
                                    <?php }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Card Holder Name <span class="mandatory">*</span></label>
                        <div>
                            <input class="form-control" placeholder="Card Holder Name *" type="text"
                                   name="cardHolderName" id="cardHolderName">
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
                <label class="text-danger" style="padding-right: 148px"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                <button type="button" class="btn btn-danger waves-effect modalSubCredit">Close</button>
                <button type="button" onclick="Add_SubCredit()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>

        </div>
    </div>
</div>