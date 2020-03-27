<?php
session_start();
include '../database/connection.php';
?>
<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="CreditCard"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="creditcard-container" style="z-index: 1400"></div>
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    CreditCard</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search" onkeyup="searchText_Credit(this)"
                       placeholder="search" style="margin-left: 5px;">

                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal"
                            id="addCreditCard"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile"/>
                    </div>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                            onclick="import_creditCard()">Upload
                    </button>
                </form>

                <!--<button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#Add_CreditCard">ADD</button>-->
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="credit_bank_table" class="scroll">
                                <thead>
                                <tr>
                                    <th scope="col" col width="50">No</th>
                                    <th scope="col" col width="160" data-priority="1">Bank Name</th>
                                    <th scope="col" col width="160" data-priority="3">Display Name</th>
                                    <th scope="col" col width="160" data-priority="1">Card Type</th>
                                    <th scope="col" col width="160" data-priority="3">Account Holder Name</th>
                                    <th scope="col" col width="160" data-priority="3">Card No #</th>
                                    <th scope="col" col width="160" data-priority="6">Card Limit</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Balance Date</th>
                                    <th scope="col" col width="160" data-priority="6">Opening Balance</th>
                                    <th scope="col" col width="160" data-priority="6">Transac Balance</th>
                                    <th scope="col" col width="160" data-priority="1">Action</th>
                                </tr>
                                </thead>
                                <?php
                                    $limit = 100;
                                    $cursor = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    foreach ($cursor as $value) {
                                        $total_records = sizeof($value['admin_credit']);
                                        $total_pages = ceil($total_records / $limit);
                                    }

                                    $g_data = $db->credit_card_admin->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('admin_credit' => array('$slice' => [0, $limit]))));                              
                                    
                                    $i = 1;
                                                                        
                                ?>

                                <tbody id="CreditbankBody">
                                <?php foreach ($g_data as $data) {
                                    $admin_credit = $data['admin_credit'];
                                    foreach ($admin_credit as $admin) {
                                        $counter = $admin['counter'];
                                        $nm = $admin['Name'];
                                        $Name = "'".$admin['Name']."'";
                                        $displayName = "'".$admin['displayName']."'";
                                        $cardType = "'".$admin['cardType']."'";
                                        $cardHolderName = "'".$admin['cardHolderName']."'";
                                        $cardNo = "'".$admin['cardNo']."'";
                                        $cardLimit = "'".$admin['cardLimit']."'";
                                        $openingBalanceDt = "'".$admin['openingBalanceDt']."'";
                                        $pencilid1 = "'"."NamePencil$i"."'";
                                        $pencilid2 = "'"."displayNamePencil$i"."'";
                                        $pencilid3 = "'"."cardTypePencil$i"."'";
                                        $pencilid4 = "'"."cardHolderNamePencil$i"."'";
                                        $pencilid5 = "'"."cardNoPencil$i"."'";
                                        $pencilid6 = "'"."cardLimitPencil$i"."'";
                                        $pencilid7 = "'"."openingBalanceDtPencil$i"."'";

                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <td class="custom-text">
                                                    <?php echo $admin['Name']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "displayName".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('displayNamePencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('displayNamePencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "displayNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $displayName; ?>,'updateCredit','text',<?php echo $admin['_id']; ?>,'displayName','Name of Display',<?php echo $pencilid2; ?>)"
                                                    ></i>
                                                    <?php echo $admin['displayName']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "cardType".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('cardTypePencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('cardTypePencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "cardTypePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $cardType; ?>,'updateCredit','text',<?php echo $admin['_id']; ?>,'cardType','Card Type',<?php echo $pencilid3; ?>)"
                                                    ></i>
                                                    <?php echo $admin['cardType']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "cardHolderName".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('cardHolderNamePencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('cardHolderNamePencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "cardHolderNamePencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $cardHolderName; ?>,'updateCredit','text',<?php echo $admin['_id']; ?>,'cardHolderName','Card Holder Name',<?php echo $pencilid4; ?>)"
                                                    ></i>
                                                    <?php echo $admin['cardHolderName']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "cardNo".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('cardNoPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('cardNoPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "cardNoPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $cardNo; ?>,'updateCredit','text',<?php echo $admin['_id']; ?>,'cardNo','Card #',<?php echo $pencilid5; ?>)"
                                                    ></i>
                                                    <?php echo $admin['cardNo']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "cardLimit".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('cardLimitPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('cardLimitPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "cardLimitPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $cardLimit; ?>,'updateCredit','text',<?php echo $admin['_id']; ?>,'cardLimit','Card Limit',<?php echo $pencilid6; ?>)"
                                                    ></i>
                                                    <?php echo $admin['cardLimit']; ?>
                                                </td>
                                                <td class="custom-text" id="<?php echo "openingBalanceDt".$i; ?>"
                                                    onmouseout="<?php echo "hidePencil('openingBalanceDtPencil$i'); "?>"
                                                    onmouseover="<?php echo "showPencil('openingBalanceDtPencil$i'); "?>"
                                                    >
                                                    <i id="<?php echo "openingBalanceDtPencil".$i; ?>" class="mdi mdi-lead-pencil edit-pencil"
                                                        onclick="updateTableColumn(<?php echo $openingBalanceDt; ?>,'updateCredit','text',<?php echo $admin['_id']; ?>,'openingBalanceDt','Opening Bal Dt',<?php echo $pencilid7; ?>)"
                                                    ></i>
                                                    <?php echo date("d-m-Y",$admin['openingBalanceDt']); ?>
                                                </td>
                                            
                                                <td class="custom-text">
                                                    <?php echo $admin['openingBalance']; ?>
                                                </td>
                                                <td class="custom-text"> 
                                                    <?php echo $admin['openingBalance']; ?>
                                                </td>
                                                <td>
                                                    <?php if ($counter == 0) { ?>
                                                        <a href="#" onclick="deleteCredit(<?php echo $admin['_id']; ?>,<?php echo $nm; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
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
                                    <th>Bank Name</th>
                                    <th>Display Name</th>
                                    <th>Card Type</th>
                                    <th>Account Holder Name</th>
                                    <th>Card No #</th>
                                    <th>Card Limit</th>
                                    <th>Opening Balance Date</th>
                                    <th>Opening Balance</th>
                                    <th>Transac Balance</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <br>
                    <nav aria-label="..." class="float-right">
                        <ul class="pagination">
                            <?php
                            $j = 1;
                            for ($i = 0; $i < $total_pages; $i++) {
                                if ($i == 0) {
                                    ?>
                                    <li class="pageitem active"
                                        onclick="paginate_credit_card(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a data-id="<?php echo $i; ?>"
                                            class="page-link"><?php echo $j; ?></a></li>
                            <?php
                                } else {
                                    ?>
                                    <li class="pageitem"
                                        onclick="paginate_credit_card(<?php echo $i * $limit; ?>,<?php echo $limit ?>)"
                                        id="<?php echo $i; ?>"><a class="page-link"
                                            data-id="<?php echo $i; ?>"><?php echo $j; ?></a></li>
                            <?php
                                }
                                $j++;
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="export_CreditCard()" class="btn btn-primary waves-effect"
                        data-dismiss="modal">
                    Export
                </button>

                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-----------------------------------------------Add CreditCard------------------------------------------------------------------------------------->