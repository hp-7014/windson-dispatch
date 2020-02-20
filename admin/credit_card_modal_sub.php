<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Add_CreditCard"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add CreditCard</h5>
                <button type="button" class="close modalCreditCard" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

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
                            <input class="form-control" placeholder="Name To Display *" type="text" name="displayName"
                                   id="displayName">
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
                            <input class="form-control" placeholder="Card Holder Name *" type="text"
                                   name="cardHolderName" id="cardHolderName">
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
                            <input class="form-control" placeholder="Card Limit * " type="text" name="cardLimit"
                                   id="cardLimit">
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Opening Balance <span style="color: red">*</span></label>
                        <div>
                            <input class="form-control" type="text" placeholder="Opening Balance *"
                                   name="openingBalance" id="openingBalance">
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect modalCreditCard">Close</button>
                <button type="button" onclick="Add_Credit()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>

        </div>
    </div>
</div>