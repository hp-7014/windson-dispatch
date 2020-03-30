<?php 
    session_start();
    include '../database/connection.php';
?>

<!--  Modal content for the above example -->
<div id="add_bank" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Bank</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body custom-modal-body">
                <div class="masterbank-container" style="z-index: 1800"></div>
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item1 show">
                        <a class="nav-link1 active" id="home-tab" data-toggle="tab" href="#Bank_Debit_Category"
                            role="tab" aria-controls="home" aria-selected="true">Debit Category </a>
                    </li>
                    <li class="nav-item1">
                        <a class="nav-link1" id="profile-tab" data-toggle="tab" href="#Bank_Credit_Category" role="tab"
                            aria-controls="profile" aria-selected="false">Credit Category</a>
                    </li>
                    <li class="nav-item1">
                        <a class="nav-link1" id="contact-tab" data-toggle="tab" href="#Credit_Card_Category" role="tab"
                            aria-controls="contact" aria-selected="false">Credit Card</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Bank_Debit_Category" role="tabpanel"
                        aria-labelledby="home-tab">
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                                        <div class="debit-bank-container" style="z-index: 1800"></div>
                                        <form method="post" enctype="multipart/form-data">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"
                                                data-toggle="modal" data-target="#" id="Add_Bank_Debit_Category"><i
                                                    class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                                            </button>
                                            <button type="button"
                                                class="btn btn-outline-info waves-effect waves-light float-right"
                                                onclick="importDebit()">Upload
                                            </button>
                                            <div class="custom-upload-btn-wrapper float-right">
                                                <button class="custom-btn">Choose file</button>
                                                <input type="file" id="file" name="myfile" />
                                            </div>
                                            <a class="btn btn-outline-success waves-effect waves-light float-right"
                                                href="download.php?file=Bank_Debit_Category.csv"
                                                style="margin-bottom: 2px;">CSV formate
                                            </a>
                                        </form>

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                                <br>
                                                <div id="table-scroll-s" class="table-scroll-s">
                                                    <table id="addbankdebit_table" class="scroll">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" col width="2">No</th>
                                                                <th scope="col" col width="6" data-priority="1">Name
                                                                </th>
                                                                <th scope="col" col width="6" data-priority="3">Action
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="bankDebitID">
                                                            <?php
                                                            $g_data = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                                            $i = 0;
                                    
                                                            foreach ($g_data as $data) {
                                                                $bank_debit = $data['bank_debit'];

                                                                foreach ($bank_debit as $debit) { 
                                                                    $counter = $debit['counter'];
                                                                    $bankName = "'".$debit['bankName']."'";
                                                                    $i++;
                                                                    $pencilid = "'"."debitPencil$i"."'";
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td class="custom-text" id="<?php echo "bankName".$i; ?>"
                                                                    onmouseout="<?php echo "hidePencil('debitPencil$i'); "?>"
                                                                    onmouseover="<?php echo "showPencil('debitPencil$i'); "?>">
                                                                    <i id="<?php echo "debitPencil".$i; ?>"
                                                                        class="mdi mdi-lead-pencil edit-pencil"
                                                                        onclick="updateTableColumn(<?php echo $bankName; ?>,'updateBankDebit','text',<?php echo $debit['_id']; ?>,'bankName','Bank Name',<?php echo $pencilid; ?>)"></i>
                                                                    <?php echo $debit['bankName']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($counter == 0) { ?>
                                                                        <a href="#" onclick="deleteBankDebit(<?php echo $debit['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                                    <?php } else { ?>
                                                                        <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                            }
                                                        ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="export_Excel()"
                                            class="btn btn-primary waves-effect" data-dismiss="modal">
                                            Export
                                        </button>

                                        <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                            Close
                                        </button>

                                        <!--<button type="button" class="btn btn-primary waves-effect waves-light">Save
                                        </button>-->
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
                    </div>

                    <div class="tab-pane fade" id="Bank_Credit_Category" role="tabpanel" aria-labelledby="profile-tab">
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                                        <div class="credit-bank-container" style="z-index: 1800"
                                            id="credit-bank-container"></div>
                                        <form method="post" enctype="multipart/form-data">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#" id="addCategory"><i
                                                    class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>
                                            <button type="button"
                                                class="btn btn-outline-info waves-effect waves-light float-right"
                                                onclick="importCredit()">Upload</button>
                                            <div class="custom-upload-btn-wrapper float-right">
                                                <button class="custom-btn">Choose file</button>
                                                <input type="file" id="file1" name="creditfile" accept=".csv" />
                                            </div>
                                            <a class="btn btn-outline-success waves-effect waves-light float-right"
                                                href="download.php?file=Bank_Credit_Category.csv"
                                                style="margin-bottom: 2px;">CSV formate
                                            </a>
                                        </form>

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                                <br>
                                                <div id="table-scroll-s" class="table-scroll-s">
                                                    <table id="addbankcredit_table" class="scroll">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" col width="2">No</th>
                                                                <th scope="col" col width="6" data-priority="1">Name
                                                                </th>
                                                                <th scope="col" col width="6" data-priority="3">Action
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="creditBody">

                                                            <?php
                                                                $credit_bk = $db->bank_credit_category->find(['companyID' => $_SESSION['companyId']]);
                                                                $i = 0;
                                                                foreach ($credit_bk as $c_bank) {
                                                                $bank_credit = $c_bank['bank_credit'];
                                                                    foreach ($bank_credit as $bank) { 
                                                                        $counter = $bank['counter'];
                                                                        $bankName_s = "'".$bank['bankName']."'";
                                                                        $i++;
                                                                        $pencilid2 = "'"."creditPencil$i"."'";
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td class="custom-text" id="<?php echo "bankName".$i; ?>"
                                                                    onmouseout="<?php echo "hidePencil('creditPencil$i'); "?>"
                                                                    onmouseover="<?php echo "showPencil('creditPencil$i'); "?>">
                                                                    <i id="<?php echo "creditPencil".$i; ?>"
                                                                        class="mdi mdi-lead-pencil edit-pencil"
                                                                        onclick="updateTableColumn(<?php echo $bankName_s; ?>,'updateBankCredit','text',<?php echo $bank['_id']; ?>,'bankName','Credit Bank',<?php echo $pencilid2; ?>)"></i>
                                                                    <?php echo $bank['bankName']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($counter == 0) { ?>
                                                                        <a href="#" onclick="deleteBankCredit(<?php echo $bank['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                                    <?php } else { ?>
                                                                        <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="exportExcelCredit()"
                                            class="btn btn-primary waves-effect" data-dismiss="modal">
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

                    <div class="tab-pane fade" id="Credit_Card_Category" role="tabpanel" aria-labelledby="contact-tab">
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                                        <div class="card-credit-container" style="z-index: 1200"></div>
                                        <form method="post" enctype="multipart/form-data">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target="#" id="creditCard"><i
                                                    class="mdi mdi-gamepad-down"></i>&nbsp;ADD</button>

                                            <button type="button"
                                                class="btn btn-outline-info waves-effect waves-light float-right"
                                                onclick="importCard()">Upload</button>
                                            <div class="custom-upload-btn-wrapper float-right">
                                                <button class="custom-btn">Choose file</button>
                                                <input type="file" id="file_test" name="cardfile" accept=".csv" />
                                            </div>
                                            <a class="btn btn-outline-success waves-effect waves-light float-right"
                                                href="download.php?file=Credit_Card_Category.csv"
                                                style="margin-bottom: 2px;">CSV formate
                                            </a>
                                        </form>

                                        <div class="table-rep-plugin">
                                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                                <br>
                                                <div id="table-scroll-s" class="table-scroll-s">
                                                    <table id="addbankcard_table" class="scroll">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" col width="2">No</th>
                                                                <th scope="col" col width="6" data-priority="1">Name
                                                                </th>
                                                                <th scope="col" col width="6" data-priority="3">Action
                                                                </th>
                                                            </tr>
                                                        </thead>

                                                        <tbody id="cardBody">

                                                            <?php
                                                                $card_credit = $db->credit_card_category->find(['companyID' => $_SESSION['companyId']]);
                                                                $i = 0;
                                                                foreach ($card_credit as $card) {
                                                                    $credit_card = $card['credit_card'];
                                                                    foreach ($credit_card as $c_card) { 
                                                                        $counter = $c_card['counter'];
                                                                        $cardName = "'".$c_card['cardName']."'";
                                                                        $i++;
                                                                        $pencilid3 = "'"."cardPencil$i"."'";
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td class="custom-text" id="<?php echo "cardName".$i; ?>"
                                                                    onmouseout="<?php echo "hidePencil('cardPencil$i'); "?>"
                                                                    onmouseover="<?php echo "showPencil('cardPencil$i'); "?>">
                                                                    <i id="<?php echo "cardPencil".$i; ?>"
                                                                        class="mdi mdi-lead-pencil edit-pencil"
                                                                        onclick="updateTableColumn(<?php echo $cardName; ?>,'updateBankCard','text',<?php echo $c_card['_id']; ?>,'cardName','Card Name',<?php echo $pencilid3; ?>)"></i>
                                                                    <?php echo $c_card['cardName']; ?>
                                                                </td>
                                                                <td>
                                                                    <?php if ($counter == 0) { ?>
                                                                        <a href="#" onclick="deleteBankCard(<?php echo $c_card['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                                    <?php } else { ?>
                                                                        <a href="#" disabled onclick="deleteCurrencyError()"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #adb5bd"></i></a>
                                                                    <?php } ?>
                                                                </td>
                                                            </tr>
                                                            <?php }
                                                                }
                                                            ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <th>No</th>
                                                                <th>Name</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="export_Card()"
                                            class="btn btn-primary waves-effect" data-dismiss="modal">
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
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
    </div>
</div>
</div>