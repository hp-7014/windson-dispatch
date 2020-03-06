<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="addRecurrence"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">

            <div class="fixpay-container" style="z-index: 1600"></div>

            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Recurrence</h5>
                <button type="button" class="close modalrecurrenceadd" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="container">
                    <table class=" table-responsive other-table" id="otherTable">
                        <thead>
                        <tr>
                            <td>Fix Pay Category <span class="mandatory">*</span>
                                <i class="mdi mdi-plus-circle plus" title="Add Fix Pay Category"
                                   id="Fix_Pay_Category"></i></td>
                            <td>Installment Type <span class="mandatory">*</span></td>
                            <td>Amount <span class="mandatory">*</span></td>
                            <td>Installment <span class="mandatory">*</span></td>
                            <td>start# <span class="mandatory">*</span></td>
                            <td>start Date <span class="mandatory">*</span></td>
                            <td>Internal Note <span class="mandatory">*</span></td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody id="TextBoxContainer2">
                        <td width="150">
                            <input class="form-control" id="installmentCategory" name="installmentCategory"
                                   list="fixpaycat"/>
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
                            <textarea rows="1" cols="20" class="form-control" type="textarea" name="internalNote"
                                      id="internalNote"></textarea>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                            </button>
                        </td>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="12" class="tableFooter">
                                <button id="btnAdd2" type="button" class="btn btn-primary" data-toggle="tooltip"
                                        data-original-title="Add more controls"><i
                                            class="glyphicon glyphicon-plus-sign"></i>&nbsp; Add&nbsp;
                                </button>
                            </th>
                        </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
            <div class="modal-footer">
                <label class="text-danger" style="padding-right: 70%"><b>Note :</b>&nbsp; * Fields are mandatory</label>
                <button type="button" class="btn btn-danger waves-effect modalrecurrenceadd">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="getrecurrence()">Save
                </button>
            </div>
            <datalist id="fixpaycat">
                <?php
                $show = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show as $row) {
                    $show1 = $row['fixPay'];
                    foreach ($show1 as $row1) {
                        $fix_pay = "'".$row1['fixPayType']."'";
                        echo "<option value=$fix_pay></option>";
                    }
                } ?>
            </datalist>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
    $(function () {
        $("#btnAdd2").bind("click", function () {
            var div = $("<tr />");
            div.html(GetDynamicRecurrence(""));
            $("#TextBoxContainer2").append(div);
        });
        $("body").on("click", ".remove", function () {
            $(this).closest("tr").remove();
        });

    });

    function removeRowRecurrence(index) {
        if (index == 0) {
            return;
        }

        document.getElementById("recurrence_add" + index).remove();
        installmentCategory.splice(index, 1);
        installmentType.splice(index, 1);
        amount.splice(index, 1);
        installment.splice(index, 1);
        startNo.splice(index, 1);
        startDate.splice(index, 1);
        internalNote.splice(index, 1);
    }

    function GetDynamicRecurrence(value) {
        return '<td width="150">'
            + '<input class="form-control" value = "' + value + '" id="installmentCategory" name="installmentCategory" list="fixpaycat"/></td>'
            + '<td width="150">'
            + '<select name="installmentType" id="installmentType" value = "' + value + '" class="form-control"><option value=""> Select Type</option><option value="Weekly"> Weekly</option><option value="Monthly"> Monthly</option><option value="Yearly"> Yearly</option><option value="Quartely"> Quartely</option></select></td>'
            + '<td width="100">'
            + '<input name="amount" id="amount" type="text" value = "' + value + '" class="form-control" /></td>'
            + '<td width="100">'
            + '<input name="installment" id="installment" type="text" value = "' + value + '" class="form-control" /></td>'
            + '<td width="100"><input name="startNo" id="startNo" type="text" value = "' + value + '" class="form-control" /></td>'
            + '<td width="10"><input name="startDate" id="startDate" type="date" value = "' + value + '" class="form-control" /></td>'
            + '<td width="250"><textarea rows="1" cols="30" value = "' + value + '" class="form-control" type="textarea" id="internalNote" name="internalNote"></textarea></td>'
            + '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
    }
</script>

