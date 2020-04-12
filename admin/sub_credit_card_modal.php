<?php
    session_start();
    include '../database/connection.php';
?>

<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Credit_Card"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                    Sub Credit Card</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <div class="subcreditcard-container" style="z-index: 1800"></div>
                <input class="form-control col-md-2 col-sm-4 col-lg-2 float-right" type="text" id="search"
                    onkeyup="searchTextSub_Credit(this)" placeholder="search" style="margin-left: 5px;">
                <form method="post" enctype="multipart/form-data">
                    <button class="btn btn-primary float-left" type="button" data-toggle="modal" data-target="#"
                        id="addSubCreditCard"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                    </button>
                    <button type="button" class="btn btn-outline-info waves-effect waves-light float-right"
                        onclick="import_Sub_credit()">Upload
                    </button>
                    <div class="custom-upload-btn-wrapper float-right">
                        <button class="custom-btn">Choose file</button>
                        <input type="file" id="file" name="myfile" accept=".csv" onchange='triggerValidation(this)' />
                    </div>
                    <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV
                        formate
                    </button>
                </form>
                <div class="table-rep-plugin">
                    <div class="table-responsive b-0" data-pattern="priority-columns">
                        <br>
                        <div id="table-scroll" class="table-scroll">
                            <table id="sub_credit_table" class="scroll">
                                <thead>
                                    <tr>
                                        <th scope="col" col width="50">No</th>
                                        <th scope="col" col width="160" data-priority="1">Display Name</th>
                                        <th scope="col" col width="160" data-priority="1">Main Card</th>
                                        <th scope="col" col width="160" data-priority="1">Card Holder Name</th>
                                        <th scope="col" col width="160" data-priority="1">Card No</th>
                                        <th scope="col" col width="160" data-priority="1">Action</th>
                                    </tr>
                                </thead>

                                <input type="hidden" id="page_no" value="0">
                                <tbody id="SubCardBody">
                                    <?php
                                    $limit = 100;
                                    $total_pages = 0;
                                    $cursor = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']));
                                    
                                    if(!empty($cursor)) {
                                        foreach ($cursor as $value) {
                                            $total_records = sizeof($value['sub_credit']);
                                            $total_pages = ceil($total_records / $limit);
                                        }
                                    }

                                    $g_data = $db->sub_credit_card->find(array('companyID' => $_SESSION['companyId']), array('projection' => array('sub_credit' => array('$slice' => [0, $limit]))));                              
                                    
                                    $i = 1;
                                    
                                    foreach ($g_data as $data) {
                                        $sub_credit = $data['sub_credit'];

                                        foreach ($sub_credit as $admin) {
                                            $counter = $admin['counter'];
                                            $mCard = $admin['mainCard'];
                                            $displayName = "'".$admin['displayName']."'";
                                            $mainCard = "'".$admin['mainCard']."'";
                                            $cardHolderName = "'".$admin['cardHolderName']."'";
                                            $cardNo = "'".$admin['cardNo']."'";
                                            $pencilid1 = "'"."displayNamePencil$i"."'";
                                            $pencilid2 = "'"."mainCardPencil$i"."'";
                                            $pencilid3 = "'"."cardHolderNamePencil$i"."'";
                                            $pencilid4 = "'"."cardNoPencil$i"."'";

                                    ?>
                                    <tr>
                                        <th><?php echo $i++ ?></th>
                                        <td class="custom-text" id="<?php echo "displayName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('displayNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('displayNamePencil$i'); "?>">
                                            <i id="<?php echo "displayNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $displayName; ?>,'updateSubCredit','text',<?php echo $admin['_id']; ?>,'displayName','Name of Display',<?php echo $pencilid1; ?>)"></i>
                                            <?php echo $admin['displayName']; ?>
                                        </td>
                                        <td class="custom-text">
                                            <?php echo $admin['mainCard']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "cardHolderName".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('cardHolderNamePencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('cardHolderNamePencil$i'); "?>">
                                            <i id="<?php echo "cardHolderNamePencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $cardHolderName; ?>,'updateSubCredit','text',<?php echo $admin['_id']; ?>,'cardHolderName','Card Holder Name',<?php echo $pencilid3; ?>)"></i>
                                            <?php echo $admin['cardHolderName']; ?>
                                        </td>
                                        <td class="custom-text" id="<?php echo "cardNo".$i; ?>"
                                            onmouseout="<?php echo "hidePencil('cardNoPencil$i'); "?>"
                                            onmouseover="<?php echo "showPencil('cardNoPencil$i'); "?>">
                                            <i id="<?php echo "cardNoPencil".$i; ?>"
                                                class="mdi mdi-lead-pencil edit-pencil"
                                                onclick="updateTableColumn(<?php echo $cardNo; ?>,'updateSubCredit','text',<?php echo $admin['_id']; ?>,'cardNo','Card No',<?php echo $pencilid4; ?>)"></i>
                                            <?php echo $admin['cardNo']; ?>
                                        </td>
                                        <td>
                                            <?php if ($counter == 0) { ?>
                                            <a href="#"
                                                onclick="deleteSubCredit(<?php echo $admin['_id']; ?>,<?php echo $mCard; ?>)"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #FC3B3B"></i></a>
                                            <?php } else { ?>
                                            <a href="#" disabled onclick="deleteCurrencyError()"><i
                                                    class="mdi mdi-delete-sweep-outline"
                                                    style="font-size: 20px; color: #adb5bd"></i></a>
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
                                        <th>Display Name</th>
                                        <th>Main Card</th>
                                        <th>Card Holder Name</th>
                                        <th>Card No</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal-footer1">
                <button type="button" onclick="export_SubCredit(<?php echo $_SESSION['companyId']; ?>)"
                    class="btn btn-primary waves-effect waves-light float-left mr-1">Export
                </button>
                <button type="button" class="btn btn-danger waves-effect float-left" data-dismiss="modal">
                    Close
                </button>
                <span class="mandatory_admin">Note: CSV files must contain atmost 1000 rows at a time.</span>
                <nav aria-label="..." class="float-right">
                    <ul class="pagination" id="paginate">
                        <li id="bank_previous" style="display:none">
                            <a class="page-link btn btn-secondary waves-effect"
                                onclick="previous_page('paginate_subc_card','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Previous</a>
                        </li>
                        <select class="form-control" id="page_active"
                            onchange="paginate_subc_card(this.value * <?php echo $limit; ?>,<?php echo $limit ?>,<?php echo $total_pages; ?>)">
                            <?php
                            $j = 1;

                            for ($i = 0; $i < $total_pages; $i++) {
                                if ($i == 0) {
                            ?>
                            <option value="<?php echo $i; ?>"> <?php echo $j; ?>
                            </option>
                            <?php } else { ?>
                            <option value="<?php echo $i; ?>"> <?php echo $j; ?> </option>
                            <?php
                                }
                                $j++;
                            } 
                            if($total_pages > 0 && $total_pages > 1){
                            ?>
                        </select>
                        <li id="bank_next">
                            <a class="page-link btn btn-primary waves-effect waves-light"
                                onclick="next_page('paginate_subc_card','page_no',<?php echo $limit ?>,<?php echo $total_pages ?>)">Next</a>
                        </li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-----------------------------------------------Add Sub CreditCard------------------------------------------------------------------------------------->