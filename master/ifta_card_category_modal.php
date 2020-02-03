<?php
    session_start();
    include '../database/connection.php';
?>
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Ifta_Card_Category"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    IFTA Card Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_Ifta_Card">Add</button>

                                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importCard_Cat()">Upload</button>

                                    <div class="custom-upload-btn-wrapper float-right">
                                        <button class="custom-btn">Choose file</button>
                                        <input type="file" id="file" name="cardfile"/>
                                    </div>

                                </form>
                                <br>
                                <table id="mainTable3" class="table table-striped mb-0 table-editable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Card Holder Name</th>
                                            <th>IFTA Card No.</th>
                                            <th>Card Type</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <?php
                                    $card_cat = $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    ?>
                                    <tbody>
                                    <?php foreach ($card_cat as $card) {
                                        $ifta_card = $card['ifta_card'];

                                        foreach ($ifta_card as $c_card) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td contenteditable="true" onblur="updateCardCat(this,'cardHolderName',<?php echo $c_card['_id']; ?>)"><?php echo $c_card['cardHolderName']; ?></td>
                                                <td contenteditable="true" onblur="updateCardCat(this,'iftaCardNo',<?php echo $c_card['_id']; ?>)"><?php echo $c_card['iftaCardNo']; ?></td>
                                                <td contenteditable="true" onblur="updateCardCat(this,'cardType',<?php echo $c_card['_id']; ?>)"><?php echo $c_card['cardType']; ?></td>
                                                <td><a href="#" onclick="deleteCardCat(<?php echo $c_card['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                </td>
                                            </tr>
                                        <?php }
                                    }
                                    ?>
                                    </tbody>

                                </table>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                    Close
                                </button>
                                <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save
                                </button>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" id="Add_Ifta_Card"
     aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #2A3988;">
                <h5 class="modal-title mt-0" style="color: white;">Add IFTA Card Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-md-12">
                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                    <label>Card Holder Name <span style="color: red">*</span></label>
                    <div>
                        <select class="form-control" name="cardHolderName" id="cardHolderName">
                            <option value="">Select Holder Name</option>
                            <option value="DAVID GAGICH">DAVID GAGICH</option>
                            <option value="DAUERNHEIM MICHAEL JOHN">DAUERNHEIM MICHAEL JOHN</option>
                            <option value="CRAIG ELLIOTT">CRAIG ELLIOTT</option>
                        </select>
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Employee No </label>
                    <div>
                        <input class="form-control" placeholder="Employee No" type="text" value="1" name="employeeNo" id="employeeNo" readonly>
                    </div>
                </div>

                <div class="form-group col-md-12">
                    <label>IFTA Card Number </label>
                    <div>
                        <input class="form-control" placeholder="IFTA Card Number" type="text" name="iftaCardNo" id="iftaCardNo">
                    </div>
                </div>
                <div class="form-group col-md-12">
                    <label>Card Type</label>
                    <div>
                        <input class="form-control" placeholder="Card Type" type="text" name="cardType" id="cardType" style="text-transform:uppercase">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
                <button type="submit" name="submit" onclick="add_CardCategory()" class="btn btn-primary waves-effect waves-light">Save</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->





