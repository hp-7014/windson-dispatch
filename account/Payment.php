<?php
session_start();
require "../database/connection.php";
?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="Payment_Registration"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xxl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Payment Registration</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body" style="padding: 0.1rem">
                <button class="btn btn-primary float-left" data-toggle="modal" data-target="#Add_Payment"
                    style="margin-right:8px;"><i class="mdi mdi-gamepad-down"></i>&nbsp;ADD
                </button>
                <!-- Nav tabs -->
                <ul class="nav nav-pills nav-justified" role="tablist" id="scroll">
                    <li class="nav-item">
                        <a class="nav-link active a" data-toggle="tab" href="#Driver" role="tab">
                            Driver
                        </a>
                        
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" data-toggle="tab" href="#Carrier" role="tab">
                            Carrier
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link a" data-toggle="tab" href="#Factoring" role="tab">
                            Factoring
                        </a>
                    </li>
                    <li class="nav-itemt">
                        <a class="nav-link a" data-toggle="tab" href="#Expense" role="tab">
                            Expense
                        </a>
                    </li>
                    <li class="nav-itemt">
                        <a class="nav-link a" data-toggle="tab" href="#Maintenance" role="tab">
                            Maintenance
                        </a>
                    </li>
                    <li class="nav-itemt">
                        <a class="nav-link a" data-toggle="tab" href="#Insurance" role="tab">
                            Insurance
                        </a>
                    </li>
                    <li class="nav-itemt">
                        <a class="nav-link a" data-toggle="tab" href="#Credit_card" role="tab">
                            Credit card
                        </a>
                    </li>
                    <li class="nav-itemt">
                        <a class="nav-link a" data-toggle="tab" href="#Fuel_card" role="tab">
                            Fuel card
                        </a>
                    </li>
                    <li class="nav-itemt">
                        <a class="nav-link a" data-toggle="tab" href="#Other" role="tab">
                            Other
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active p-3" id="Driver" role="tabpanel">
                    <?php
                            // Sets the top option to be the current year. (IE. the option that is chosen by default).
                            $currently_selected = date('Y'); 
                            // Year to start available options at
                            $earliest_year = 2018; 
                            // Set your latest year you want in the range, in this case we use PHP to just set it to the current year.
                            $latest_year = date('Y'); 

                            print '<select id="year">';
                            // Loops over each int[year] from current year, back to the $earliest_year [1950]
                            foreach ( range( $latest_year, $earliest_year ) as $i ) {
                                // Prints the option with the next year in range.
                                print '<option value="'.$i.'"'.($i === $currently_selected ? ' selected="selected"' : '').'>'.$i.'</option>';
                            }
                            print '</select>';
                    ?>
                    <select size="1" id="month">
                        <option selected value="January">January</option>
                        <option value="February">February</option>
                        <option value="March">March</option>
                        <option value="April">April</option>
                        <option value="May">May</option>
                        <option value="June">June</option>
                        <option value="July">July</option>
                        <option value="August">August</option>
                        <option value="September">September</option>
                        <option value="October">October</option>
                        <option value="November">November</option>
                        <option value="December">December</option>
                    </select>
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="finddriver" onclick="getPaymentdata()">Find
                    </button>
                    <table style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                      <th>No</th>
                      <th>paymentfrom</th>
                      <th>companyselect</th>
                      <th>bankname</th>
                      <th>payto</th>
                      <th>driver</th>
                      <th>debitcategory</th>
                      <th>amount</th>
                      <th>advance</th>
                      <th>finalamount</th>
                      <th>checkdate</th>
                      <th>cheque</th>
                      <th>ach</th>
                      <th>memo</th>
                    </tr>
                    <tr style="border: 1px solid black;" id="drivertable">
                      
                    </tr>
                  </table>
            </div>
                    <div class="tab-pane p-3" id="Carrier" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Factoring" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Expense" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Maintenance" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Insurance" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Credit_card" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Fuel_card" role="tabpanel">

                    </div>
                    <div class="tab-pane p-3" id="Other" role="tabpanel">

                    </div>
    
            </div><!-- /.modal-content -->
        </div><!-- /.moda l-dialog -->
    </div><!-- /.modal -->
    <!------------------------------------------------------------------------------------------------------------------------------>
    <!--  Modal content for the above example -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="Add_Payment"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add Payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label>Payment From</label>
                            <select class="form-control" id='type'>
                                <option value="0" selected="true" disabled="disabled">--Select--</option>
                                <option value="1">Bank</option>
                                <option value="2">Credit Card</option>
                                <option value="3">Fuel Card</option>
                                <option value="4">Other/Cash</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 cn" style="display:none">
                            <label>Company Name *</label>
                            <input list="companyname" placeholder="--Select--" class="form-control" id="Companyselect"
                                name="Companyselect" onchange="updatecompanyfield(this.value)">
                            <datalist id="companyname">
                                <?php
                                $show_company = $db->company->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($show_company as $showcompany) {
                                    $company = $showcompany['company'];
                                    foreach ($company as $sc) {
                                        $value = "'" . $sc['_id'] . ')' . $sc['companyName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 bank" style="display:none;" id="bank_name">
                            <label>Bank Name*</label>
                            <select class="form-control" id="companyfield" onchange="baseamount(this.value)">
                            
                            </select>
                        </div>
                        <div class="form-group col-md-2 Credit" style="display:none;">
                            <label>Select card</label>
                            <select class="form-control" id="select_card">
                                <option value="0" selected="true" disabled="disabled">--select--</option>
                                <option value="1">Main Card</option>
                                <option value="2">Sub Card</option>
                            </select>
                        </div>
                        <input type="hidden" id="baseamount" name="baseamount" value="">
                        <div class="form-group col-md-2 main1" style="display:none;">
                            <label>Main Card</label>
                            <input list="creditcard1" placeholder="--Select--" class="form-control" id="maincreditcard"
                                name="maincreditcard" onchange="baseamountcredit(this.value)">
                            <datalist id="creditcard1">
                                <?php
                                $show = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($show as $credit) {
                                    $bankcreadit = $credit['admin_credit'];
                                    foreach ($bankcreadit as $sc) {
                                        $value = "'" . $sc['_id'] . ')' . $sc['displayName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <input type="hidden" id="baseamountcredit" name="baseamountcredit" value="">
                        <div class="form-group col-md-2 sub1" style="display:none;">
                            <label>Sub Card</label>
                            <input list="subcreditcard1" placeholder="--Select--" class="form-control" id="subcreditcard"
                                name="subcreditcard">
                            <datalist id="subcreditcard1">
                                <?php
                                $showsub = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showsub as $subcredit) {
                                    $banksubcreadit = $subcredit['sub_credit'];
                                    foreach ($banksubcreadit as $scard) {
                                        $value = "'" . $scard['_id'] . ')' . $scard['displayName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 fuel" style="display:none;">
                            <label>Fuel list</label>
                            <input list="fuelcard2" placeholder="--Select--" class="form-control" id="fuelcardmain"
                                name="fuelcardmain" onchange="baseamountfuel(this.value)">
                            <datalist id="fuelcard2">
                                <?php
                                $showsub = $db->fuel_Card_Type->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showsub as $subfuel) {
                                    $subfuelcard = $subfuel['fuelCard'];
                                    foreach ($subfuelcard as $scard) {
                                        $value = "'" . $scard['_id'] . ')' . $scard['fuelCardType'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <input type="hidden" id="basefuelcard" value="">
                        <div class="form-group col-md-2 fuel" style="display:none;">
                            <label>Payment list</label>
                            <select class="form-control" id="paymentlist">
                                <option value="0" selected="true" disabled="disabled">--select--</option>
                                <option value="1">xyz</option>
                                <option value="2">Advance</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 adv" style="display:none;">
                            <label>Invoice</label>
                            <br>
                            <button id="checkbtn" class=" btn btn-outline-dark waves-effect waves-light" type="button"
                                data-toggle="dropdown">
                                Invoice<i class="mdi mdi-menu-down-outline"
                                    style="padding-left:15px;padding-right:50px"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <input type="checkbox"  onclick='selectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Select all
                                </li>
                                <li>
                                    <input type="checkbox" onclick='UnSelectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Unselect all
                                </li>
                            </ul>
                        </div>
                        <div class="form-group col-md-2 adv" style="display:none;">
                            <label>Driver</label>
                            <div>
                                <input class="form-control" placeholder="Driver" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 adv" style="display:none;">
                            <label>Truck No*</label>
                            <select class="form-control">
                                <option>xyz</option>
                                <option>abc</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 adv" style="display:none;">
                            <label>Advance Date</label>
                            <div>
                                <input class="form-control" placeholder="Driver" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 adv" style="display:none;">
                            <label>Advance Amount</label>
                            <div>
                                <button type="button" class=" btn btn-outline-dark waves-effect waves-light"
                                    data-toggle="modal" data-target="#Advance_amount">Advance Amount
                                </button>
                            </div>
                        </div>
                        <div class="form-group col-md-2 other1" style="display:none;">
                        <label>Pay Type</label>
                            <select class="form-control" id='pay_type'>
                                <option value="0" selected="true" disabled="disabled">--Select--</option>
                                <option value="1">Bank</option>
                                <!-- <option value="2">Credit Card</option> -->
                            </select>
                        </div>
                        <div class="form-group col-md-2 other1" style="display:none;">
                            <label>Name</label>
                            <div>
                                <input class="form-control" placeholder="Name" type="text" id="othername">
                            </div>
                        </div>
                        <div class="form-group col-md-2 other1" style="display:none;">
                            <label>Amount</label>
                            <div>
                                <input class="form-control" placeholder="Amount" type="text" id="otherpayamount">
                            </div>
                        </div>
                        <div class="form-group col-md-2 other1" style="display:none;">
                            <label>Transaction Date *</label>
                            <div>
                                <input class="form-control" id="transactiondate" name="checkdate" placeholder="Check Date *"
                                    type="date">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="disable">Pay To</label>
                            <select class="form-control" id='purpose' disabled>
                                <option value="0" selected="true" disabled="disabled">--select--</option>
                                <option value="1">Driver</option>
                                <option value="2">Carrier</option>
                                <option value="3">Factoring</option>
                                <option value="4">Expense</option>
                                <option value="5">Maintenance</option>
                                <option value="6">Insurance</option>
                                <option value="7">Credit Card</option>
                                <option value="8">Fuel Card</option>
                                <option value="9">Other</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Driver Name</label>
                            <input list="driverlist" placeholder="--Select--" class="form-control" id="drivername"
                                name="drivername" onchange="updateDriverInvoice(this.value)">
                            <datalist id="driverlist">
                                <?php
                                $showdriver = $db->driver->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdriver as $drivername) {
                                    $driver = $drivername['driver'];
                                    foreach ($driver as $sd) {
                                        $value = "'" . $sd['_id'] . ')' . $sd['driverName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Debit Category</label>
                            <input list="debitcat" placeholder="--Select--" class="form-control" id="selectdebite"
                                name="selectdebite">
                            <datalist id="debitcat">
                                <?php
                                $showdebit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdebit as $showbankdebit) {
                                    $bankdebit = $showbankdebit['bank_debit'];
                                    foreach ($bankdebit as $sb) {
                                        $value = "'" . $sb['_id'] . ')' . $sb['bankName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Invoice</label>
                            <br>
                            <button id="checkbtn" class=" btn btn-outline-dark waves-effect waves-light" type="button"
                                data-toggle="dropdown">
                                Invoice<i class="mdi mdi-menu-down-outline"
                                    style="padding-left:15px;padding-right:50px"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <input type="checkbox" onclick='selectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Select all
                                </li>
                                <li>
                                    <input type="checkbox" onclick='UnSelectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Unselect all
                                </li>
                                <li class="space" id="driverinvoice">

                                </li>
                            </ul>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" value="0" id="driveramount" name="driveramount"
                                    placeholder="Amount *" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Advance *</label>
                            <div>
                                <input class="form-control" value="0" id="dradvance" name="dradvance"
                                    placeholder="Advance *" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Final Amount *</label>
                            <div>
                                <input class="form-control" value="0" id="drfinalamount" name="finalamount"
                                    placeholder="Final Amount *" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Check/ACH Date *</label>
                            <div>
                                <input class="form-control" id="checkdate" name="checkdate" placeholder="Check Date *"
                                    type="date">
                            </div>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>Cheque #*</label>
                            <div>
                                <input class="form-control" id="cheque" name="cheque" placeholder="Cheque #*"
                                    type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 driver" style="display:none;">
                            <label>ACH #*</label>
                            <div>
                                <input class="form-control" id="ach" name="ach" placeholder="ACH #*" type="text">
                            </div>
                        </div>
                        <!--Carrier #  -->
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>Carrier Name</label>
                            <div>
                                <input list="carrierlist" placeholder="--Select--" class="form-control" id="carriername"
                                    onchange="updateCarrierInvoice(this.value)" name="carriername">
                                <datalist id="carrierlist">
                                    <?php
                                    $showcarrier = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
                                    $no = 1;
                                    foreach ($showcarrier as $carriername) {
                                        $carrier = $carriername['carrier'];
                                        foreach ($carrier as $sd) {
                                            $value = "'" . $sd['_id'] . ')' . $sd['name'] . "'";
                                            echo "<option value=$value></option>";
                                        }
                                    } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>Debit Category</label>
                            <input list="debitcat" placeholder="--Select--" class="form-control" id="selectdebite1"
                                name="selectdebite1">
                            <datalist id="debitcat">
                                <?php
                                $showdebit1 = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                foreach ($showdebit1 as $showbankdebit1) {
                                    $bankdebit1 = $showbankdebit1['bank_debit'];
                                    foreach ($bankdebit1 as $sb1) {
                                        $value1 = "'" . $sb1['_id'] . ')' . $sb1['bankName'] . "'";
                                        echo "<option value=$value1></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>Invoice</label>
                            <br>
                            <button id="checkbtn" class=" btn btn-outline-dark waves-effect waves-light" type="button"
                                data-toggle="dropdown">
                                Invoice<i class="mdi mdi-menu-down-outline"
                                    style="padding-left:15px;padding-right:50px"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <input type="checkbox" onclick='selectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Select all
                                </li>
                                <li>
                                    <input type="checkbox" onclick='UnSelectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Unselect all
                                </li>
                                <li class="space" id="invoiceID">
                                </li>
                            </ul>
                        </div>
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" value="0" id="finalAmount"
                                    name="finalAmount" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>Check/ACH Date *</label>
                            <div>
                                <input class="form-control" placeholder="Check Date *" type="date" id="carcheckdate">
                            </div>
                        </div>
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>Cheque #*</label>
                            <div>
                                <input class="form-control" placeholder="Cheque #*" type="text" id="carcheque">
                            </div>
                        </div>
                        <div class="form-group col-md-2 carrier" style="display:none;">
                            <label>ACH #*</label>
                            <div>
                                <input class="form-control" placeholder="ACH #*" type="text" id="carach">
                            </div>
                        </div>
                        <!--factoring -->
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>Factoring Name</label>
                            <div>
                                <input list="factoringList" placeholder="--Select--" class="form-control"
                                    id="selectFactoring" onchange="getFactoringInvoice(this.value)"
                                    name="selectFactoring">
                                <datalist id="factoringList">
                                    <?php
                                    $factoringData = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
                                    foreach ($factoringData as $factoringArray) {
                                        $factoringArray1 = $factoringArray['factoring'];
                                        foreach ($factoringArray1 as $factoring) {
                                            $value1 = "'" . $factoring['_id'] . ')' . $factoring['factoringCompanyname'] . "'";
                                            echo "<option value=$value1></option>";
                                        }
                                    } ?>
                                </datalist>
                            </div>
                        </div>
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>Debit Category</label>
                            <input list="facdebitcat" placeholder="--Select--" class="form-control" id="debitecat"
                                name="selectdebite">
                            <datalist id="facdebitcat">
                                <?php
                                $showdebit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdebit as $showbankdebit) {
                                    $bankdebit = $showbankdebit['bank_debit'];
                                    foreach ($bankdebit as $sb) {
                                        $value = "'" . $sb['_id'] . ')' . $sb['bankName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>Invoice</label>
                            <br>
                            <button id="checkbtn" class=" btn btn-outline-dark waves-effect waves-light" type="button"
                                data-toggle="dropdown">
                                Invoice<i class="mdi mdi-menu-down-outline"
                                    style="padding-left:15px;padding-right:50px"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <input type="checkbox" onclick='selectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Select all
                                </li>
                                <li>
                                    <input type="checkbox" onclick='UnSelectAll()'
                                        style="margin-left:20px;margin-top:10px" value="Select All" />&nbsp;Unselect all
                                </li>
                                <li class="space" id="factoringINVOICE">
                                </li>
                            </ul>
                        </div>
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" value="0" id="factoringAmount"
                                    name="factoringAmount" type="text">
                            </div>
                        </div>
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>Check/ACH Date *</label>
                            <div>
                                <input class="form-control" placeholder="Check Date *" type="date" id="faccheck">
                            </div>
                        </div>
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>Cheque #*</label>
                            <div>
                                <input class="form-control" placeholder="Cheque #*" type="text" id="faccheque">
                            </div>
                        </div>
                        <div class="form-group col-md-2 factoring" style="display:none;">
                            <label>ACH #*</label>
                            <div>
                                <input class="form-control" placeholder="ACH #*" type="text" id="facach">
                            </div>
                        </div>
                        <!-- Expenses -->
                        <div class="form-group col-md-2 Expenses" style="display:none;">
                            <label>Bill No *</label>
                            <div>
                                <input class="form-control" placeholder="Bill No *" type="text" id="expensesbill">
                            </div>
                        </div>
                        <div class="form-group col-md-2 Expenses" style="display:none;">
                            <label>Name *</label>
                            <div>
                                <input class="form-control" placeholder="Name *" type="text" id="expensesname">
                            </div>
                        </div>
                        <div class="form-group col-md-2 Expenses" style="display:none;">
                            <label>Debit Category</label>
                            <input list="debitexpence" placeholder="--Select--" class="form-control" id="expensesdebit"
                                name="expensesdebit">
                            <datalist id="debitexpence">
                                <?php
                                $showdebit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdebit as $showbankdebit) {
                                    $bankdebit = $showbankdebit['bank_debit'];
                                    foreach ($bankdebit as $sb) {
                                        $value = "'" . $sb['_id'] . ')' . $sb['bankName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 Expenses" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" type="text" id="expensesamount">
                            </div>
                        </div>
                        <!--Maintenance-->
                        <div class="form-group col-md-2 Maintenance" style="display:none;">
                            <label>Debit Category</label>
                            <input list="Maintenance" placeholder="--Select--" class="form-control"
                                id="debitmaintenance" name="debitmaintenance">
                            <datalist id="Maintenance">
                                <?php
                                $showdebit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdebit as $showbankdebit) {
                                    $bankdebit = $showbankdebit['bank_debit'];
                                    foreach ($bankdebit as $sb) {
                                        $value = "'" . $sb['_id'] . ')' . $sb['bankName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 Maintenance" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" type="text" id="maintenanceamount">
                            </div>
                        </div>
                        <div class="form-group col-md-3 Maintenance" style="display:none;">
                            <label>Payment ACH NO/REF NO</label>
                            <div>
                                <input class="form-control" placeholder="Payment ACH NO/REF NO" type="text"
                                    id="maintenanceach">
                            </div>
                        </div>
                        <div class="form-group col-md-2 Maintenance" style="display:none;">
                            <label>Truck No</label>
                            <input list="truck" placeholder="--Select--" class="form-control" id="truckmaintenance"
                                name="truckmaintenance">
                            <datalist id="truck">
                                <?php
                                        $show_truck = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_truck as $showtruck) {
                                            $truck = $showtruck['truck'];
                                            foreach ($truck as $stru) {
                                                $truckValue = "'" . $stru['_id'] . ")&nbsp;" . $stru['truckNumber'] . "'";
                                                echo "<option value=$truckValue></option>";
                                            }
                                        } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 Maintenance" style="display:none;">
                            <label>Trailer No</label>
                            <input list="trailer" placeholder="--Select--" class="form-control" id="trailermaintenance"
                                name="trailermaintenance">
                            <datalist id="trailer">
                                <?php
                                        $show_trailer = $db->trailer_admin_add->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_trailer as $showtrailer) {
                                            $trailer = $showtrailer['trailer'];
                                            foreach ($trailer as $stra) {
                                                $trialerValue = "'" . $stra['_id'] . ")&nbsp;" . $stra['trailerNumber'] . "'";
                                                echo "<option value=$trialerValue></option>";
                                            }
                                        } ?>
                            </datalist>
                        </div>
                        <!--Insurance-->
                        <div class="form-group col-md-2 Insurance" style="display:none;">
                            <label>Insurance Company *</label>
                            <div>
                                <input class="form-control" placeholder="Insurance Company *" type="text"
                                    id="insurancecompany">
                            </div>
                        </div>
                        <div class="form-group col-md-2 Insurance" style="display:none;">
                            <label>Debit Category</label>
                            <input list="Insurance" placeholder="--Select--" class="form-control" id="debitInsurance"
                                name="debitInsurance">
                            <datalist id="Insurance">
                                <?php
                                $showdebit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdebit as $showbankdebit) {
                                    $bankdebit = $showbankdebit['bank_debit'];
                                    foreach ($bankdebit as $sb) {
                                        $value = "'" . $sb['_id'] . ')' . $sb['bankName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 Insurance" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" type="text" id="insuranceamount">
                            </div>
                        </div>
                        <!--Credit Card -->
                        <div class="form-group col-md-2 Credit_Card" style="display:none;">
                            <label>select Card</label>
                            <select class="form-control" id='card'>
                                <option>-select--</option>
                                <option value="1">Main Card</option>
                                <option value="2">Sub Card</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2 main" style="display:none;">
                            <label>Main Card</label>
                            <input list="creditcard" placeholder="--Select--" class="form-control" id="maincard"
                                name="maincard">
                            <datalist id="creditcard">
                                <?php
                                $show = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($show as $credit) {
                                    $bankcreadit = $credit['admin_credit'];
                                    foreach ($bankcreadit as $sc) {
                                        $value = "'" . $sc['_id'] . ')' . $sc['displayName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 sub" style="display:none;">
                            <label>Sub Card</label>
                            <input list="subcreditcard1" placeholder="--Select--" class="form-control" id="subcard"
                                name="subcard">
                            <datalist id="subcreditcard1">
                                <?php
                                $showsub = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showsub as $subcredit) {
                                    $banksubcreadit = $subcredit['sub_credit'];
                                    foreach ($banksubcreadit as $scard) {
                                        $value = "'" . $scard['_id'] . ')' . $scard['displayName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 Credit_Card" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" type="text" id="cardamount">
                            </div>
                        </div>
                        <!--Fuel Card -->
                        <div class="form-group col-md-2 Fuel_Card" style="display:none;">
                            <label>Fuel list</label>
                            <input list="fuelcard1" placeholder="--Select--" class="form-control" id="fuelcard"
                                name="fuelcard">
                            <datalist id="fuelcard1">
                                <?php
                                $showsub = $db->fuel_Card_Type->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showsub as $subfuel) {
                                    $subfuelcard = $subfuel['fuelCard'];
                                    foreach ($subfuelcard as $scard) {
                                        $value = "'" . $scard['_id'] . ')' . $scard['fuelCardType'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 Fuel_Card" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" type="text" id="fuelamount">
                            </div>
                        </div>
                        <!--other -->
                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>Other</label>
                            <div>
                                <input class="form-control" placeholder="Other" type="text" id="otherpay">
                            </div>
                        </div>
                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>Debit Category</label>
                            <input list="other" placeholder="--Select--" class="form-control" id="otherdebit"
                                name="otherdebit">
                            <datalist id="other">
                                <?php
                                $showdebit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
                                $no = 1;
                                foreach ($showdebit as $showbankdebit) {
                                    $bankdebit = $showbankdebit['bank_debit'];
                                    foreach ($bankdebit as $sb) {
                                        $value = "'" . $sb['_id'] . ')' . $sb['bankName'] . "'";

                                        echo "<option value=$value></option>";
                                    }
                                } ?>
                            </datalist>
                        </div>
                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>PO BOX# *</label>
                            <div>
                                <input class="form-control" placeholder="PO BOX# *" type="text" id="pobox">
                            </div>
                        </div>

                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>Amount *</label>
                            <div>
                                <input class="form-control" placeholder="Amount *" type="text" id="otheramount">
                            </div>
                        </div>
                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>Check/ACH Date *</label>
                            <div>
                                <input class="form-control" placeholder="Check Date *" type="date" id="checkachdate">
                            </div>
                        </div>
                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>Cheque #*</label>
                            <div>
                                <input class="form-control" placeholder="Cheque #*" type="text" id="otherchequ">
                            </div>
                        </div>
                        <div class="form-group col-md-2 other" style="display:none;">
                            <label>ACH #*</label>
                            <div>
                                <input class="form-control" placeholder="ACH #*" type="text" id="otherach">
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <div class="upload-button">
                                <label>Upload Files</label>
                                <button class="button">Upload a file</button>
                                <input type="file" id="files" onchange="getfiles(this.files);" name="files[]" multiple
                                    accept=".png, .jpg, .jpeg, .pdf" />
                            </div>
                            <div class="form-group col-md-10">
                                <label>Memo *</label>
                                <div>
                                    <textarea class="form-control" rows="1" id="memo" name="memo"
                                        placeholder="Memo *"></textarea>
                                    <input type="hidden" id="companyId" value="<?php echo $_SESSION['companyId']; ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary waves-effect waves-light" id="addbankpayment" onclick="Paymentadd()">ADD
                    </button>
                    <button type="button" class="btn btn-success waves-effect waves-light">ADD & PRINT
                    </button>
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    <!-- Advance Amount -->
    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
        id="Advance_amount" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #2A3988;">
                    <h5 class="modal-title mt-0" style="color: white;">Advance Amount</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class=" table-responsive">
                        <thead>
                            <tr>
                                <td>Advance Amount</td>
                                <td>Memo</td>
                                <td>Delete</td>
                            </tr>
                        </thead>
                        <tbody id="TextBoxContainer1">
                            <td width="150"><input name=" " type="text" value=" " class="form-control" />
                            </td>
                            <td width="300"><input name=" " type="text" value=" " class="form-control" />
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger"><span aria-hidden="true">&times;</span>
                                </button>
                            </td>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="12">
                                    <button id="btnAddadv" type="button" class="btn btn-primary"
                                        data-toggle="tooltip"><i class="glyphicon glyphicon-plus-sign"></i>&nbsp;
                                        Add&nbsp;
                                    </button>
                                </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Close
                    </button>
                    <button type="button" class="btn btn-primary waves-effect waves-light">
                        Save
                    </button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
</div>
<script src="account/js/form.js"></script>