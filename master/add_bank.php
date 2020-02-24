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
                        <a class="nav-link1 active" id="home-tab" data-toggle="tab"
                           href="#Bank_Debit_Category" role="tab" aria-controls="home"
                           aria-selected="true">Debit Category </a>
                    </li>
                    <li class="nav-item1">
                        <a class="nav-link1" id="profile-tab" data-toggle="tab"
                           href="#Bank_Credit_Category" role="tab" aria-controls="profile"
                           aria-selected="false">Credit Category</a>
                    </li>
                    <li class="nav-item1">
                        <a class="nav-link1" id="contact-tab" data-toggle="tab"
                           href="#Credit_Card_Category" role="tab" aria-controls="contact"
                           aria-selected="false">Credit Card</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="Bank_Debit_Category"
                         role="tabpanel" aria-labelledby="home-tab">
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <button type="button" class="btn btn-primary waves-effect waves-light mt-0 header-title" data-toggle="modal" data-target="#" id="Add_Bank_Debit_Category">Add</button>

                                        <!--<form method="post" enctype="multipart/form-data">-->
                                        <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importDebit()">Upload</button>
                                        <div class="custom-upload-btn-wrapper float-right">
                                            <button class="custom-btn">Choose file</button>
                                            <input type="file" id="file" name="myfile" accept=".csv"/>
                                        </div>

                                        <a class="btn btn-outline-success waves-effect waves-light" href="download.php?file=Bank_Debit_Category.csv" style="margin-bottom: 5px;">CSV formate
                                        </a>
                                       <!-- <button type="button" class="btn btn-outline-success waves-effect waves-light float-right">CSV formate</button>-->
                                        <!--</form>-->

                                        <!--<table id="mainTable" class="table table-striped mb-0 table-editable">

                                       </table> -->

                                        <table class="table table-striped mb-0 table-editable table-debit">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <?php
                                                /*require '../vendor/autoload.php';

                                                $connection = new MongoDB\Client("mongodb://127.0.0.1/");
                                                $db = $connection->WindsonDispatch;*/
                                                $g_data = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                            ?>

                                            <tbody id="bankDebitID">
                                                <?php foreach ($g_data as $data) {
                                                    $bank_debit = $data['bank_debit'];

                                                    foreach ($bank_debit as $debit) { ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td contenteditable="true" onblur="updateBankDebit(this,'bankName',<?php echo $debit['_id']; ?>)"><?php echo $debit['bankName']; ?></td>
                                                        <td><a href="#" onclick="deleteBankDebit(<?php echo $debit['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="export_Excel()" class="btn btn-primary waves-effect" data-dismiss="modal">
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

                    <div class="tab-pane fade" id="Bank_Credit_Category" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <br>

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#" id="addCategory">Add</button>
                                            <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importCredit()">Upload</button>
                                            <div class="custom-upload-btn-wrapper float-right">
                                                <button class="custom-btn">Choose file</button>
                                                <input type="file" id="file1" name="creditfile" accept=".csv"/>
                                            </div>
                                            <a class="btn btn-outline-success waves-effect waves-light" href="download.php?file=Bank_Credit_Category.csv" style="margin-bottom: 2px;">CSV formate
                                            </a>
                                        </form>
                                        <br>
                                        <table class="table table-striped mb-0 table-editable">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <?php
                                                $credit_bk = $db->bank_credit_category->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                            ?>
                                            <tbody id="creditBody">
                                            <?php foreach ($credit_bk as $c_bank) {
                                                $bank_credit = $c_bank['bank_credit'];

                                                foreach ($bank_credit as $bank) { ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td contenteditable="true"
                                                            onblur="updateBankCredit(this,'bankName',<?php echo $bank['_id']; ?>)"><?php echo $bank['bankName']; ?></td>
                                                        <td><a href="#"
                                                               onclick="deleteBankCredit(<?php echo $bank['_id']; ?>)"><i
                                                                        class="mdi mdi-delete-sweep-outline"
                                                                        style="font-size: 20px; color: #FC3B3B"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                }
                                            ?>
                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="exportExcelCredit()" class="btn btn-primary waves-effect" data-dismiss="modal">
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

                    <div class="tab-pane fade" id="Credit_Card_Category" role="tabpanel"
                         aria-labelledby="contact-tab">
                        <br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#" id="creditCard">Add</button>

                                            <button type="button" class="btn btn-outline-info waves-effect waves-light float-right" onclick="importCard()">Upload</button>
                                            <div class="custom-upload-btn-wrapper float-right">
                                                <button class="custom-btn">Choose file</button>
                                                <input type="file" id="file_test" name="cardfile" accept=".csv"/>
                                            </div>
                                            <a class="btn btn-outline-success waves-effect waves-light" href="download.php?file=Credit_Card_Category.csv" style="margin-bottom: 2px;">CSV formate
                                            </a>
                                        </form>
                                        <br>
                                        <table id="mainTable3" class="table table-striped mb-0 table-editable">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <?php
                                                $card_credit = $db->credit_card_category->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                            ?>
                                            <tbody id="cardBody">
                                                <?php foreach ($card_credit as $card) {
                                                $credit_card = $card['credit_card'];

                                                foreach ($credit_card as $c_card) { ?>
                                                    <tr>
                                                        <td><?php echo $no++; ?></td>
                                                        <td contenteditable="true" onblur="updateBankCard(this,'cardName',<?php echo $c_card['_id']; ?>)"><?php echo $c_card['cardName']; ?></td>
                                                        <td><a href="#" onclick="deleteBankCard(<?php echo $c_card['_id']; ?>)"><i class="mdi mdi-delete-sweep-outline" style="font-size: 20px; color: #FC3B3B"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" onclick="export_Card()" class="btn btn-primary waves-effect" data-dismiss="modal">
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
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        </div>
    </div>
</div>