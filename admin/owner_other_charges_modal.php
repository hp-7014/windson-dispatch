<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div id="ownerOtherCharges" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Other Charges</h5>
                <button type="button" class="close modalOtherOwner" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="container">
                    <table class=" table-responsive other-table" id="otherTable">
                        <thead>
                        <tr>
                            <td>Description</td>
                            <td>Amount</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody id="OwnerTextBoxContainer1">
                        <td width="200"><input name="ownerotherDescription" type="text" value=" " class="form-control"/></td>
                        <td width="150"><input name="Owner_other_charges" type="text" value=" " class="form-control"/></td>
                        
                        <td>
                            <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                            </button>
                        </td>
                        </tbody>
                        <tfoot>
                        <tr>
                            <th colspan="12" class="tableFooter">
                                <button id="btnAddOwner" type="button" class="btn btn-primary" data-toggle="tooltip"
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
                <button type="button" class="btn btn-danger waves-effect modalOtherOwner">
                    Close
                </button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="getownerOtherCharges()">Save
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>
<script>
    $(function () {
        $("#btnAddOwner").bind("click", function () {
            var div = $("<tr />");
            div.html(ownerGetDynamicTextBox(""));
            $("#OwnerTextBoxContainer1").append(div);
        });
        $("body").on("click", ".remove", function (){
            $(this).closest("tr").remove();
        });
        
    });

    function ownerRemoveRow(index){
        if(index == 0){
            return;
        }
      document.getElementById("ownerotherRow"+index).remove();
      ownerotherDescription.splice(index,1);
      ownerotherCharges.splice(index,1);
      
    }
    function ownerGetDynamicTextBox(value) {
        return '<td width="200"><input name = "ownerotherDescription" type="text" value = "' + value + '" class="form-control" /></td>' + '<td width="150"><input name = "Owner_other_charges" type="text" value = "' + value + '"class="form-control" />'+'<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
    }
</script>

