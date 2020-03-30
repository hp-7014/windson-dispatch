<?php
session_start();
include '../database/connection.php';
?>
<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="addIftaCard"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add IFTA Card Category</h5>
                <button type="button" class="close modalIftaCard" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                    <label>Card Holder Name <span class="mandatory">*</span></label>
                    <div>
                        <select class="form-control" name="cardHolderName" id="cardHolderName"
                                onchange="ajaxGetid(this)">
                            <option value="">Select Card Holder Name</option>
                            <?php

                            $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);

                            foreach ($show_data as $show) {
                                $show = $show['driver'];
                                foreach ($show as $s) {
                                    ?>
                                    <option value="<?php echo $s['driverName']; ?>"><?php echo $s['driverName']; ?></option>
                                <?php }
                            } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Employee No </label>
                    <div>
                        <input class="form-control" placeholder="Employee No" type="text" name="employeeNo"
                               id="employeeNo" readonly>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label>IFTA Card Number </label>
                    <div>
                        <input class="form-control" placeholder="IFTA Card Number" type="text" name="iftaCardNo"
                               id="iftaCardNo">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Card Type</label>
                    <div>
                        <input class="form-control" placeholder="Card Type" type="text" name="cardType" id="cardType"
                               style="text-transform:uppercase">
                    </div>
                </div>
            </div>

            <span class="mandatory">Note : * Field are Mandatory</span>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect modalIftaCard">
                    Close
                </button>
                <button type="submit" name="submit" onclick="add_CardCategory()"
                        class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    function ajaxGetid(x) {
        var v = x.value;
        var companyId = document.getElementById('companyId').value;
        //alert(v);
        $.ajax({
            type: 'POST',
            url: 'master/ifta_card_category.php?type=' + 'driverdetails',
            data: {
                getoption: v,
                companyId: companyId,
            },
            success: function (response) {
                var j = JSON.parse(response);
                //alert(j);
                $("#employeeNo").val(j._id);
            }
        });
    }

</script>