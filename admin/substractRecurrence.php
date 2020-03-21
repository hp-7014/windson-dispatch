<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="substractRecurrence" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
        <div class="fixpay-container" style="z-index: 1600"></div>
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Substract Recurrence</h5>
                <button type="button" class="close modalrecurrencesubstarct"  aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="container">
                    <table class=" table-responsive other-table" id="otherTable">
                        <thead>
                        <tr>
                            <td>Category <span class="mandatory">*</span><i class="mdi mdi-plus-circle plus" title="Add Fix Pay Category" id="Fix_Pay_Category"></i></td>
                            <td>Installment Type <span class="mandatory">*</span></td>
                            <td>Amount <span class="mandatory">*</span></td>
                            <td>Installment <span class="mandatory">*</span></td>
                            <td>start# <span class="mandatory">*</span></td>
                            <td>start Date <span class="mandatory">*</span></td>
                            <td>Internal Note <span class="mandatory">*</span></td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody id="TextBoxContainer3">
                        <td width="150">
                                    <input class="form-control" id="installment_Category" name="installment_Category" list="fixpay_cat"/>
                                </td>
                                <td width="150">
                                    <input class="form-control" id="installment_Type" name="installment_Type" list="instatype"/>
                                </td>
                                <td width="100">
                                    <input name="amount_recurrence" type="text" id="amount_recurrence" class="form-control"/>
                                </td>
                                <td width="100">
                                    <input name="installment_sub" type="text" id="installment_sub" class="form-control"/>
                                </td>
                                <td width="100">
                                    <input name="start_No" type="text" id="start_No" class="form-control"/>
                                </td>
                                <td width="10">
                                    <input name="start_Date" type="date" id="start_Date" class="form-control"/>
                                </td>
                                <td width="250">
                                    <textarea rows="1" cols="20" class="form-control" type="textarea" name="internal_Note" id="internal_Note"></textarea>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                                    </button>
                                </td>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="12" class="tableFooter">
                                <button id="btnAdd3" type="button" class="btn btn-primary" data-toggle="tooltip"
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
                <button type="button" class="btn btn-danger waves-effect modalrecurrencesubstarct">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="recurrencesubstract()">Save
                </button>
            </div>
            <datalist id="fixpay_cat">
                <?php
                $show = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);
                foreach ($show as $row) {
                    $show1 = $row['fixPay'];
                    foreach ($show1 as $row1) {
                        $equipValue = "'".$row1['fixPayType']."'";
                        echo " <option value=$equipValue></option>";
                    }
                } ?>
            </datalist>
            <datalist id="instatype">
                    <option value="Weekly">Weekly</option>
                    <option value="Monthly"></option>
                    <option value="yearly"></option>
                    <option value="Quarterly"></option>
            </datalist>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
    $(function () {
        $("#btnAdd3").bind("click", function () {
            var div = $("<tr />");
            div.html(GetDynamicRecurrencesubstract(""));
            $("#TextBoxContainer3").append(div);
        });
        $("body").on("click", ".remove", function (){
            $(this).closest("tr").remove();
        });
        
    });

    function recurrence_substract(index){
        if(index == 0){
            return;
        }
            document.getElementById("recurrencesubstract_add"+index).remove();
            installment_Category.splice(index,1);
            installment_Type.splice(index,1);
            amount_recurrence.splice(index,1);
            installment_sub.splice(index,1);
            start_No.splice(index,1);
            start_Date.splice(index,1);
            internal_Note.splice(index,1);
        }

    function GetDynamicRecurrencesubstract(value) {
        return '<td width="150">'
            +'<input class="form-control" value = "' + value + '" id="installment_Category" name="installment_Category" list="fixpay_cat"/></td>'
            +'<td width="150">'
            +'<input class="form-control" value = "' + value + '" id="installment_Type" name="installment_Type" list="instatype"/></td>'
            +'<td width="100">'
            +'<input name="amount_recurrence" type="text" value = "' + value + '" class="form-control" /></td>'
            +'<td width="100">'
            +'<input name="installment_sub" type="text" value = "' + value + '" class="form-control" /></td>'
            +'<td width="100"><input name="start_No" type="text" value = "' + value + '" class="form-control" /></td>'
            +'<td width="10"><input name="start_Date" type="date" value = "' + value + '" class="form-control" /></td>'
            +'<td width="250"><textarea rows="1" cols="30" value = "' + value + '" class="form-control" type="textarea" name="internal_Note"></textarea></td>'
            +'<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
    }
</script>

