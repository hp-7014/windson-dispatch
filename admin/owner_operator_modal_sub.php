<?php
session_start();
require "../database/connection.php";
?>
<!----------------------------------Add as Owner-operator----------------------------------------------------->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="Owner_operator"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add as Owner operator</h5>
                <button type="button" class="close modalOwner"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" name="form_data" id="form_data" >
                <div class="modal-body custom-modal-body">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>Select Driver</label>
                            <select class="form-control" name="driverName" id="driverNames">
                                <option value="">Select Driver</option>
                                <?php

                                $show_data = $db->driver->find(['companyID' => $_SESSION['companyId']]);

                                foreach ($show_data as $show) {
                                    $show = $show['driver'];
                                    foreach ($show as $s) {
                                        if ($s['deleteStatus'] == '0') {
                                            ?>
                                            <option value="<?php echo $s['_id']; ?>"><?php echo $s['driverName']; ?></option>
                                        <?php }
                                    }
                                }?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>Pay Percentage</label>
                            <input id="percentage" type="text" class="form-control" name="percentage">
                        </div>

                        <div class="form-group col-md-4">
                            <label>Select Truck</label>&nbsp;<i class="mdi mdi-plus-circle plus" id="add_Truck_Modal"></i>
                            <select class="form-control" name="truckNo" id="truckNo">
                                <option value="123">123</option>
                                <option value="456">456</option>
                            </select>
                        </div>
                    </div>
                    <div class="container">
                        <div class="table-responsive">
                            <table class=" table-responsive">
                                <thead>
                                <tr>
                                    <td>Category</td>
                                    <td>Installment Type</td>
                                    <td>Amount</td>
                                    <td>Installment</td>
                                    <td>start#</td>
                                    <td>start Date</td>
                                    <td>Internal Note</td>
                                    <td>Delete</td>
                                </tr>
                                </thead>
                                <tbody id="TextBoxContainer">
                                <td width="150">
                                    <input class="form-control" id="installmentCategory" name="installmentCategory" list="fixpaycat"/>

                                </td>
                                <td width="150">
                                    <select name="installmentType" id="installmentType" class="form-control">
                                        <option value="">Select type</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="yearly">Yearly</option>
                                        <option value="Quarterly">Quarterly</option>
                                    </select>
                                </td>
                                <td width="100">
                                    <input name="amount" type="text" id="amount" class="form-control"/>
                                </td>
                                <td width="100">
                                    <input name="installment" type="text" id="installment" class="form-control"/>
                                </td>
                                <td width="100">
                                    <input name="startNo" type="text" id="startNo" class="form-control"/>
                                </td>
                                <td width="10">
                                    <input name="startDate" type="date" id="startDate" class="form-control"/>
                                </td>
                                <td width="250">
                                    <textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote" id="internalNote"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                                </tbody>

                                <tfoot>
                                <tr>
                                    <th colspan="12">
                                        <button id="btnAdd" type="button" class="btn btn-primary" data-toggle="tooltip"
                                                data-original-title="Add more controls"><i
                                                class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;
                                        </button>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect modalOwner" >
                    Close
                </button>
                <button type="button" onclick="addOwnerOperator()" class="btn btn-primary waves-effect waves-light">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<datalist id="fixpaycat">
    <?php

    $show_data = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);

    foreach ($show_data as $show) {
        $show = $show['fixPay'];
        foreach ($show as $s) {
            ?>
            <option value="<?php echo $s['fixPayType']; ?>"><?php echo $s['fixPayType']; ?></option>
        <?php }
    }?>
</datalist>
<!--- for driver->owner_operator --->
<script>
    $(function () {
        $("#btnAdd").bind("click", function () {
            var div = $("<tr />");
            div.html(GetDynamicTextBox(""));
            $("#TextBoxContainer").append(div);
        });
        $("body").on("click", ".remove", function () {
            $(this).closest("tr").remove();
        });
    });

    function GetDynamicTextBox(value) {
        return '<td width="150">'
            +'<input id="installmentCategory" class="form-control" name="installmentCategory" list="fixpaycat"/></td>'
            +'<td width="150">'
            +'<select name="installmentType" id="installmentType" class="form-control"><option value=""> Select Type</option><option value="Weekly"> Weekly</option><option value="Monthly"> Monthly</option><option value="Yearly"> Yearly</option><option value="Quartely"> Quartely</option></select></td>'
            +'<td width="100">'
            +'<input name="amount" id="amount" type="text" class="form-control" /></td>'
            +'<td width="100">'
            +'<input name="installment" id="installment" type="text" class="form-control" /></td>'
            +'<td width="100"><input name="startNo" id="startNo" type="text" class="form-control" /></td>'
            +'<td width="10"><input name="startDate" id="startDate" type="date" class="form-control" /></td>'
            +'<td width="250"><textarea rows="1" cols="30" class="form-control" type="textarea" id="internalNote" name="internalNote"></textarea></td>'
            +'<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
    }
</script>

<!----------------------------------------------------------------------------------------------------------------------------------------->

