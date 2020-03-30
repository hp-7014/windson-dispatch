<?php
    session_start();
    include '../database/connection.php';
?>
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Ifta_Card_Category"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="iftacard-category-container" style="z-index: 1800"></div>
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
        
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary waves-effect waves-light" type="button" data-toggle="modal"
                        data-target="#" id="Add_Ifta_Card"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>

                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importCard_Cat()">Upload</button>

                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="cardfile"/>
                    </div>

                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>
                </form>
                <br>

                <div class="table-rep-plugin">
                    <div class="table-responsive" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="tech-companies-1" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Card Holder Name</th>
                                        <th scope="col" col width="160" data-priority="3">IFTA Card No.</th>
                                        <th scope="col" col width="160" data-priority="1">Card Type</th>
                                        <th scope="col" col width="160" data-priority="3">Action</th>
                                    </tr>
                                </thead>
                                
                                <tbody id="IftacardBody">
                                <?php
                                    $g_data =  $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);
                                    
                                    $i = 1;
                                    
                                    foreach ($g_data as $data) {
                                    $ifta_c = $data['ifta_card'];
                                    
                                    foreach ($ifta_c as $ifta) {      
                                        $counter = $ifta['counter'];                              
                                        $cardHolderName = "'".$ifta['cardHolderName']."'";
                                        $iftaCardNo = "'".$ifta['iftaCardNo']."'";
                                        $cardType = "'".$ifta['cardType']."'";

                                        $pencilid1 = "'"."cardHolderNamePencil$i"."'";
                                        $pencilid2 = "'"."iftaCardNoPencil$i"."'";
                                        $pencilid3 = "'"."cardTypePencil$i"."'";
                                ?>
                                        <tr>
                                            <td><?php echo $i++; ?></td>
                                            <td class="custom-text" id="<?php echo "cardHolderName".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('cardHolderNamePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('cardHolderNamePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "cardHolderNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $cardHolderName; ?>,'updateCardCat','text',<?php echo $ifta['_id']; ?>,'cardHolderName','Card Holder Name',<?php echo $pencilid1; ?>)"
                                                ></i>
                                                <?php echo $ifta['cardHolderName']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "iftaCardNo".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('iftaCardNoPencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('iftaCardNoPencil$i'); "?>"
                                                >
                                                <i id="<?php echo "iftaCardNoPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $iftaCardNo; ?>,'updateCardCat','text',<?php echo $ifta['_id']; ?>,'iftaCardNo','IFTA Card No.',<?php echo $pencilid2; ?>)"
                                                ></i>
                                                <?php echo $ifta['iftaCardNo']; ?>
                                            </td>
                                            <td class="custom-text" id="<?php echo "cardType".$i; ?>"
                                                onmouseout="<?php echo "hidePencil('cardTypePencil$i'); "?>"
                                                onmouseover="<?php echo "showPencil('cardTypePencil$i'); "?>"
                                                >
                                                <i id="<?php echo "cardTypePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                    onclick="updateTableColumn(<?php echo $cardType; ?>,'updateCardCat','text',<?php echo $ifta['_id']; ?>,'cardType','Card Type',<?php echo $pencilid3; ?>)"
                                                ></i>
                                                <?php echo $ifta['cardType']; ?>
                                            </td>
                                            <td>
                                                <?php if ($counter == 0) { ?>
                                                    <a href="#" onclick="deleteCardCat(<?php echo $ifta['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                <?php } else { ?>
                                                    <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php 
                                    }
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                    <tr>    
                                        <th>No</th>
                                        <th>Card Holder Name</th>
                                        <th>IFTA Card No.</th>
                                        <th>Card Type</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>