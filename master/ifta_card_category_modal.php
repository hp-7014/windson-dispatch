<?php
    session_start();
    include '../database/connection.php';
?>
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Ifta_Card_Category"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
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
                <div class="iftacard-container" style="z-index: 1800"></div>
                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <form>
                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#" id="Add_Ifta_Card">Add</button>

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
                                    <tbody id="iftacardBody">
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
                                <button type="button" onclick="exportifta()" class="btn btn-primary waves-effect" data-dismiss="modal">
                                    Export
                                </button>

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