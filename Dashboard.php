<!DOCTYPE html>
<html lang="en">
<?php session_start();
$page = "dashboard";
require "database/connection.php";
?>
<?php include 'header/header.php'; ?>

</div>
<!-- header-bg -->
<div class="wrapper">
    <div class="container-fluid">
        <!-- Page-Title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">
                        <button type="button" id="activeloadbtn" class="btn btn-primary waves-effect waves-light"
                            data-toggle="modal" data-target="#active_new" data-color="blue">New active load
                        </button>
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#Quick_load">Quick load
                        </button>
                    </h4>
                </div>
            </div>
        </div>
        <!-- end row -->
        <!--New active load model -->
        <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
            id="active_new" aria-hidden="true">
            <div class="modal-dialog modal-xxl modal-dialog-scrollable">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">New
                            Active Load</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div class="activeload-container" style="z-index: 1800"></div>
                        <!-- Modal First Row Start -->

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Select Your Company</label><i class="mdi mdi-plus-circle plus"
                                    title="Add Company" id="add_Company_Modal"></i>
                                <input list="browserscompany" placeholder="--Select--" class="form-control"
                                    id="selectCompany" name="selectCompany">
                                <datalist id="browserscompany">
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

                            <div class="form-group col-md-3">
                                <label>Customer</label> <i class="mdi mdi-plus-circle plus" title="Add Customer"
                                    id="add_Customer_Modal"></i>
                                <input list="browserscustomer" placeholder="--Select--" class="form-control"
                                    onchange="getCustomer(this.value)" id="customerlist" name="customerlist">
                                <datalist id="browserscustomer">
                                    <?php
                                        $show_customer = $db->customer->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_customer as $showcustomer) {
                                            $customer = $showcustomer['customer'];
                                            foreach ($customer as $scus) {
                                                $customervalue = "'" . $scus['_id'] . ")&nbsp;" . $scus['custName'] . "'";
                                                echo "<option value=$customervalue></option>";
                                            }
                                        } ?>
                                </datalist>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Dispatcher</label>
                                <input list="browsersdispatcher" placeholder="--Select--" class="form-control"
                                    id="dispatcherlist" name="dispatcherlist">
                                <datalist id="browsersdispatcher">
                                    <?php
                                        $show_user = $db->user->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_user as $showuser) {
                                            $user = $showuser['user'];
                                            foreach ($user as $su) {
                                                ?>
                                    <option
                                        value="<?php echo $su['_id'] . ") " . $su['userFirstName'] . " " . $su['userLastName']; ?>">
                                    </option>
                                    <?php }
                                        } ?>
                                </datalist>
                            </div>

                            <div class="form-group col-md-2">
                                <label>CN No.</label>
                                <div>
                                    <input class="form-control" placeholder="Cn#" type="text" id="cnno">
                                    <input type="hidden" id="companyid" value="<?php echo $_SESSION['companyId']; ?>">
                                </div>
                            </div>

                                <div class="form-group col-md-2">
                                    <label>Status</label>
                                    <select class="form-control" id="status">
                                        <option value="Open">1) Open</option>
                                        <option value="Dispatched" disabled>2) Dispatched</option>
                                        <option value="Arrived Shipper" disabled>3) Arrived Shipper</option>
                                        <option value="Loaded" disabled>4) Loaded</option>
                                        <option value="On Route" disabled>5) On Route</option>
                                        <option value="Arrived Consignee" disabled>6) Arrived Consignee</option>
                                        <option value="Delivered" disabled>7) Delivered</option>
                                        <option value="Completed" disabled>8) Completed</option>
                                        <option value="Invoiced">9) Invoiced</option>
                                        <option value="Break Down" disabled>10) Break Down</option>
                                    </select>
                                </div>
                            </div>
                            <!-- End of Modal First Row  -->


                        <!-- Start of Modal Second Row -->
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label>Active Type</label><i class="mdi mdi-plus-circle plus" title="Add Active Type"
                                    id="active_type_Modal"></i>
                                <input list="browsersloadtype" placeholder="--Select--"
                                    onchange="enableUnits(this.value)" class="form-control" id="loadtypelist"
                                    name="loadtypelist">
                                <datalist id="browsersloadtype">
                                    <?php
                                        $show_loadtype = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_loadtype as $showloadtype) {
                                            $loadtype = $showloadtype['loadType'];
                                            foreach ($loadtype as $sl) {
                                                $loadValue = "'" . $sl['_id'] . ")&nbsp;" . $sl['loadName'] . "'";
                                                echo "<option value=$loadValue></option>";
                                            }
                                        } ?>
                                </datalist>
                            </div>

                            <div class="form-group col-md-1">
                                <label>Rate</label>
                                <div>
                                    <input class="form-control" placeholder="Rate" type="text" id="rateAmount"
                                        name="rateAmount" onkeyup="getTotal()">
                                </div>
                            </div>

                            <div class="form-group col-md-1">
                                <label># of Units</label>
                                <div>
                                    <input class="form-control" placeholder="Units" type="text" id="no-of-units"
                                        name="no-of-units" onkeyup="getTotal()" disabled>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label style="display:inline">F.S.C.</label>&nbsp;&nbsp;<div style="display:inline"
                                    class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1"
                                        data-parsley-multiple="groups" data-parsley-mincheck="2" onclick="getTotal()">
                                    <label class="custom-control-label" for="customCheck1">Rate%</label>
                                </div>
                                <div>
                                    <input class="form-control mt-2" placeholder="F.S.C." type="text" id="fsc"
                                        name="fsc" onkeyup="getTotal()">
                                </div>
                            </div>

                            <!-- <div class="form-group  col-md-1">
                                            <label>Rate %</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input"
                                                       id="customCheck1" data-parsley-multiple="groups"
                                                       data-parsley-mincheck="2">
                                                <label class="custom-control-label"
                                                       for="customCheck1">Rate%</label>
                                            </div>
                                        </div> -->

                            <div class="form-group col-md-2">
                                <label>Other Charges</label>&nbsp;<i class="mdi mdi-plus-circle plus"
                                    id="add_other"></i>
                                <div>
                                    <input class="form-control" placeholder="Other Charges" type="text"
                                        id="OtherCharges" name="OtherCharges" onkeyup="getTotal()" readonly>
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Total Rate</label>
                                <div>
                                    <input class="form-control" placeholder="Total Rate" type="text" id="totalAmount"
                                        name="totalAmount">
                                </div>
                            </div>

                            <div class="form-group col-md-2">
                                <label>Equipment Type</label><i class="mdi mdi-plus-circle plus"
                                    title="Add Equipment Type" id="equipment_type_Modal"></i>
                                <input list="browsersequipment" class="form-control" placeholder="--Select--"
                                    id="equipmentlist" name="equipmentlist">
                                <datalist id="browsersequipment">
                                    <?php
                                        $show_equipment = $db->equipment_add->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_equipment as $showequipment) {
                                            $equipment = $showequipment['equipment'];
                                            foreach ($equipment as $se) {
                                                $equipValue = "'" . $se['_id'] . ")&nbsp;" . $se['equipmentType'] . "'";
                                                echo " <option value=$equipValue></option>"
                                                ?>

                                    <?php }
                                        } ?>
                                </datalist>
                            </div>
                        </div>
                        <!-- End of Modal Second Row -->

                        <!-- Start of Modal Third Row -->
                        <div class="row col-md-12">
                            <div class="form-group col-md-2">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="carrier" name="typeofloder"
                                        value="Carrier" checked onclick="Showcarrier()" />
                                    <label class="custom-control-label" for="carrier">Carrier</label>
                                </div>

                                <!-- Group of default radios - option 2 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="driver" name="typeofloder"
                                        value="Driver" onclick="Showdriver()" />
                                    <label class="custom-control-label" for="driver">Driver</label>
                                </div>

                                <!-- Group of default radios - option 3 -->
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="owner" name="typeofloder"
                                        value="Owner Operator" onclick="Showowner()" />
                                    <label class="custom-control-label" for="owner">Owner
                                        Operator</label>
                                </div>

                            </div>
                            <div class="form-group col-md-2 carrier">
                                <label>Carrier Name</label><i class="mdi mdi-plus-circle plus"
                                    id="add_Carrier_Modal"></i>
                                <input list="browserscarrier" class="form-control" onchange="getCarrier(this.value)"
                                    placeholder="--Select--" id="carrierlist" name="carrierlist">
                                <datalist id="browserscarrier">
                                    <?php
                                        $show_carrier = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_carrier as $showcarrier) {
                                            $carrier = $showcarrier['carrier'];
                                            foreach ($carrier as $scar) {
                                                $carrierValue = "'" . $scar['_id'] . ")&nbsp;" . $scar['name'] . "'";
                                                echo "<option value=$carrierValue></option>";
                                            }
                                        } ?>
                                </datalist>
                            </div>
                            <div class="form-group col-md-1 carrier">
                                <label>Flat Rate</label>
                                <div>
                                    <input class="form-control" placeholder="Flat Rate" type="text" id="carrierFlat"
                                        onkeyup="getCarrierTotal()">
                                </div>
                            </div>
                            <div class="form-group col-md-2 carrier">
                                <label>Advance Charges</label><i class="mdi mdi-plus-circle plus"
                                    id="add_carrier_other"></i>
                                <div>
                                    <input class="form-control" placeholder="Other Charges" type="text"
                                        id="carrierOther" onkeyup="getCarrierTotal()" readonly>
                                </div>
                            </div>


                            <div class="form-group col-md-2 carrier">
                                <label>Total</label>
                                <div>
                                    <input class="form-control" placeholder="Total Rate" type="text" id="carrierTotal">
                                </div>
                            </div>

                            <div class="form-group col-md-2 carrier">
                                <label>Currency</label><i class="mdi mdi-plus-circle plus" id="add_currency_modal"></i>
                                <input list="selectCurrency" class="form-control" placeholder="--Select--"
                                    id="currencylist" name="currencylist">
                                <datalist id="selectCurrency">
                                    <?php
                                        $show_currency = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_currency as $showcurrency) {
                                            $currency = $showcurrency['currency'];
                                            foreach ($currency as $scur) {
                                                $currencyValue = "'" . $scur['_id'] . ")&nbsp;" . $scur['currencytype'] . "'";
                                                echo "<option value=$currencyValue></option>";
                                            }
                                        } ?>
                                </datalist>
                            </div>


                            <div class="form-group col-md-2 driver">
                                <label>Driver name</label><i class="mdi mdi-plus-circle plus" id="add_Driver_Modal">
                                    <input type="hidden" id="getnewaa" name="getnewaa" value="1"></i>
                                <input list="browsersdriver" class="form-control" placeholder="--Select--"
                                    id="driverlist" name="driverlist" onchange="getDriver(this.value); ">
                                <datalist id="browsersdriver">
                                    <?php
                                        $show_driver = $db->driver->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_driver as $showdriver) {
                                            $driver = $showdriver['driver'];
                                            foreach ($driver as $sdri) {
                                                $driverValue = "'" . $sdri['_id'] . ")&nbsp;" . $sdri['driverName'] . "'";
                                                echo "<option value=$driverValue></option>";
                                            }
                                        } ?>
                                </datalist>

                            </div>
                            <div class="form-group col-md-1 driver">
                                <label>Truck </label>&nbsp;<i class="mdi mdi-plus-circle plus" id="add_Truck_Modal"></i>
                                <input list="browserstruck" class="form-control" placeholder="--Select--" id="trucklist"
                                    name="trucklist" onchange="getTruck(this.value); ">
                                <datalist id="browserstruck">
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
                            <div class="form-group col-md-1 driver">
                                <label>Trailer </label>&nbsp;<i class="mdi mdi-plus-circle plus"
                                    id="add_Trailer_Modal"></i>
                                <input list="browserstrailer" class="form-control" id="trailerlist"
                                    placeholder="--Select--" name="trailerlist" onchange="getTrailer(this.value); ">
                                <datalist id="browserstrailer">
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
                            <div class="form-group col-md-1 driver">
                                <label>Loaded Mi</label>
                                <div>
                                    <input class="form-control" placeholder="Load Mi " type="text" id="loadedmile">
                                </div>
                            </div>
                            <div class="form-group col-md-1 driver">
                                <label>Empty Mi</label>
                                <div>
                                    <input class="form-control" placeholder="Empty Mi " type="text" id="emptymile">
                                </div>
                            </div>


                            <div class="form-group col-md-1 driver">
                                <label>Other</label><i class="mdi mdi-plus-circle plus" id="add_Driver_Other"></i>
                                <div>
                                    <input class="form-control" placeholder="Other " type="text" id="driverothercharges"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-1 driver">
                                <label>Tarp</label>
                                <div>
                                    <input class="form-control" placeholder="Tarp " type="text" id="driverTarp">
                                </div>
                            </div>
                            <div class="form-group col-md-1 driver">
                                <label>Flat </label>
                                <div>
                                    <input class="form-control" placeholder="Flat " type="text" id="driverflat"
                                        onkeyup="changeDriverTotal()">
                                </div>
                            </div>
                            <div class="form-group col-md-1 driver">
                                <label>$ Total </label>
                                <div>
                                    <input class="form-control" placeholder="$ Total" type="text" id="driverTotal">
                                </div>
                            </div>
                            <div class="form-group col-md-2 owner">
                                <label>Owner Operator</label><i class="mdi mdi-plus-circle plus"
                                    id="add_Owner_Operator"></i>
                                <input list="browsersowner" class="form-control" placeholder="--Select--" id="ownerlist"
                                    name="ownerlist" onchange="getOwner(this.value); ">
                                <datalist id="browsersowner">
                                    <?php
                                        $collection = $db->owner_operator_driver;
                                        $show1 = $collection->aggregate([
                                            ['$lookup' => [
                                                'from' => 'driver',
                                                'localField' => 'companyID',
                                                'foreignField' => 'companyID',
                                                'as' => 'owner'
                                            ]], ['$match' => ['companyID' => $_SESSION['companyId']]]
                                        ]);

                                        foreach ($show1 as $row) {
                                            $ownerOperator = $row['ownerOperator'];
                                            $owner = $row['owner'];
                                            $drivername = array();
                                            foreach ($owner as $row2) {
                                                $owner1 = $row2['driver'];
                                                $k = 0;
                                                foreach ($owner1 as $row3) {
                                                    $id = $row3['_id'];
                                                    $drivername[$k] = $id . ")&nbsp;" . $row3['driverName'];
                                                    $k++;
                                                }
                                            }

                                            $j = 0;
                                            foreach ($ownerOperator as $row1) {
                                                $drivername1 = "'" . $drivername[$row1['driverId']] . "'";
                                                $j++;
                                                $list .= "<option value=$drivername1></option>";

                                            }
                                        } ?>
                                </datalist>
                            </div>
                            <div class="form-group col-md-2 owner">
                                <label>Pay Percentage</label>
                                <input class="form-control" placeholder="Pay %" type="text" id="ownerPercentage"
                                    readonly>
                            </div>


                            <div class="form-group col-md-1 owner">
                                <label>
                                    Truck</label><i class="mdi mdi-plus-circle plus" id="add_Truck_Modal1"></i>
                                <input list="browsers1truck" class="form-control" placeholder="--Select--"
                                    id="truck1list" name="truck1list" onchange="getTruck(this.value); ">
                                <datalist id="browsers1truck">
                                    <?php
                                        $show_truck = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_truck as $showtruck) {
                                            $truck = $showtruck['truck'];
                                            foreach ($truck as $stru) {
                                                ?>
                                    <option value="<?php echo $stru['_id'] . ") " . $stru['truckNumber']; ?>">
                                    </option>
                                    <?php }
                                        } ?>
                                </datalist>
                            </div>
                            <div class="form-group col-md-1 owner">
                                <label>
                                    Trailer</label><i class="mdi mdi-plus-circle plus" id="add_Trailer_Modal1"></i>
                                <input list="browserstrailer1" class="form-control" id="trailer1list"
                                    placeholder="--Select--" name="trailer1list" onchange="getTrailer(this.value); ">
                                <datalist id="browserstrailer1">
                                    <?php
                                        $show_trailer = $db->trailer_admin_add->find(['companyID' => $_SESSION['companyId']]);
                                        $no = 1;
                                        foreach ($show_trailer as $showtrailer) {
                                            $trailer = $showtrailer['trailer'];
                                            foreach ($trailer as $stra) {
                                                ?>
                                    <option value="<?php echo $stra['_id'] . ") " . $stra['trailerNumber']; ?>">
                                    </option>
                                    <?php }
                                        } ?>
                                </datalist>
                            </div>
                            <div class="form-group col-md-2 driver owner">
                                <label>Other</label><i class="mdi mdi-plus-circle plus" id="add_Owner_Other"></i>
                                <div>
                                    <input class="form-control" placeholder="Other " type="text" id="ownerothercharges"
                                        readonly>
                                </div>
                            </div>
                            <div class="form-group col-md-2 driver owner">
                                <label>$ Total </label>
                                <div>
                                    <input class="form-control" placeholder="$ Total" type="text" id="ownerTotal">
                                </div>
                            </div>

                        </div>

                        <!-- End of Modal Third Row -->

                        <!-- partial:index.partial.html -->
                        <div class="ui small form segment">
                            <h6><img src="assets/images/home.png" height="50px" width="50px" id="startLocation"
                                    data-toggle="tooltip" data-placement="top"
                                    title="Click here to add start location.">
                                <button class="btn btn-primary" onclick="add_fields();" data-toggle="tooltip"
                                    data-placement="top" title="Click here to add more shippers.">ADD
                                    SHIPPER
                                </button>
                                <i class="mdi mdi-plus-circle plus-xs" id="add_shipper_modal"></i>
                            </h6>
                            <div class="card m-b-30 shadow" id="sc-card">
                                <div class="card-header cardbg">
                                    <ul class="nav nav-tabs main-tabs" id="myTab" role="tablist">
                                        <li class="nav-item list-item" id="home-title">
                                            <a class="nav-link active shipper list-anchors" id="home-tab0"
                                                data-toggle="tab" href="#home0" role="tab" aria-controls="home"
                                                aria-selected="true">Shipper
                                                1</a><i class="mdi mdi-window-close ico"
                                                onclick="removeTab('home-title','home')" aria-hidden="true"></i>
                                        </li>
                                    </ul>
                                </div>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home0" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div class="row m-2">
                                            <div class="form-group col-md-3">
                                                <label>Name*</label>
                                                <input list="shipper" class="form-control" placeholder="--Select--"
                                                    id="shipperlist" name="shipperlist"
                                                    onchange="getShipper(this.value,0); ">
                                                <datalist id="shipper" name = "shipper">
                                                    <?php

                                                        $collection = $db->shipper;
                                                        $show1 = $collection->aggregate([
                                                                ['$match'=>['companyID'=>$_SESSION['companyId']]],
                                                                ['$unwind'=>'$shipper'],
                                                                ['$match'=>['shipper.shipperStatus'=>"Active"]]
                                                            ]);

                                                            foreach ($show1 as $row) {
                                                                $s = 0;
                                                                $shipper[$s] = $row['shipper'];
                                                                $s++;
                                                                foreach ($shipper as $row1) {
                                                                    $shipperValue = "'".$row1['_id'].")&nbsp;".$row1['shipperName']."'";
                                                                     echo "<option value=$shipperValue></option>";
                                                                }
                                                            }
                                                        ?>
                                                </datalist>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Address*</label>
                                                <div>
                                                    <input class="form-control" placeholder="Address *" type="text"
                                                        id="shipperaddress0" name="shipperaddress">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Location *</label>
                                                <div>
                                                    <input class="form-control" placeholder="Enter a location"
                                                        type="text" onkeydown="getLocation('activeshipper0')"
                                                        id="activeshipper0" name="activeshipper">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Pickup Date</label>

                                                <div>
                                                    <input class="form-control" type="date" id="shipperdate"
                                                        name="shipperdate">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Pickup Time</label>
                                                <div>
                                                    <input class="form-control" type="time" id="shippertime"
                                                        name="shippertime">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Type*</label>
                                                <div class="row">
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" class="custom-control-input" id="tl0"
                                                            name="tl0" checked>
                                                        <label class="custom-control-label" for="tl0">TL</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">

                                                        <input type="radio" class="custom-control-input" id="ltl0"
                                                            name="tl0">
                                                        <label class="custom-control-label" for="ltl0">LTL</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Commodity</label>
                                                <div>
                                                    <input class="form-control" type="text" placeholder="Commodity"
                                                        id="shippercommodity" name="shippercommodity">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1 ">
                                                <label>Qty</label>
                                                <div>
                                                    <input class="form-control" placeholder="Qty" id="shipperqty"
                                                        name="shipperqty" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group col-md-2 ">
                                                <label>Weight</label>
                                                <div>
                                                    <input class="form-control" type="text" placeholder="Weight"
                                                        id="shipperweight" name="shipperweight">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label>Pickup #</label>
                                                <div>
                                                    <input class="form-control" placeholder="Pickup #" type="text"
                                                        id="shipperpickup" name="shipperpickup">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label>Sr#</label>
                                                <div>
                                                    <input class="form-control" placeholder="Sr#" type="number"
                                                        id="shipseq0" name="shipseq" value="0">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label>Pickup Notes</label>
                                                <div>
                                                    <textarea rows="1" cols="30" class="form-control" type="textarea"
                                                        id="shippernotes" name="shippernotes"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="ui small form segment">
                                <h6>
                                    <img src="assets/images/destination.png" height="50px" id="endLocation"
                                        data-toggle="tooltip" data-placement="top"
                                        title="Click here to enter destination." width="50px">
                                    <button class="btn btn-primary" onclick="add_consignee();" data-toggle="tooltip"
                                        data-placement="top" title="Click here to add more consignees.">ADD
                                        CONSIGNEE
                                    </button>
                                    <i class="mdi mdi-plus-circle plus-xs" id="add_consignee_modal"></i>
                                </h6>
                                <div class="card m-b-30 shadow" id="c-card">
                                    <div class="card-header cardbg">
                                        <ul class="nav nav-tabs main-tabs" id="consignee" role="tablist">
                                            <li class="nav-item list-item" id="consig-title">
                                                <a class="nav-link active consignee list-anchors-consig"
                                                    id="consig-tab0" data-toggle="tab" href="#consig0" role="tab"
                                                    aria-controls="home" aria-selected="true">Consignee 1</a><i
                                                    class="mdi mdi-window-close ico"
                                                    onclick="removeConsignee('consig-title','consig')"
                                                    aria-hidden="true"></i>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="tab-content" id="consigneeContent">
                                        <div class="tab-pane fade show active" id="consig0" role="tabpanel"
                                            aria-labelledby="consig-tab0">
                                            <div class="row m-2">
                                                <div class="form-group col-md-3">
                                                    <label>Name*</label>
                                                    <input list="consigneee" class="form-control"
                                                        placeholder="--Select--" id="consigneelist" name="consigneelist"
                                                        onchange="getConsignee(this.value,0)">
                                                    <datalist id="consigneee" name = "consignee">
                                                        <?php
                                                            $collection = $db->consignee;
                                                            $show1 = $collection->aggregate([
                                                                ['$match' => ['companyID' => $_SESSION['companyId']]],
                                                                ['$unwind' => '$consignee'],
                                                                ['$match' => ['consignee.consigneeStatus' => "Active"]]
                                                            ]);

                                                            foreach ($show1 as $row) {
                                                                $s = 0;
                                                                $consignee[$s] = $row['consignee'];
                                                                $s++;
                                                                foreach ($consignee as $row1) {
                                                                    $consigneeValue = "'" . $row1['_id'] . ")&nbsp;" . $row1['consigneeName'] . "'";
                                                                    echo "<option value=$consigneeValue></option>";
                                                                }
                                                            }
                                                            ?>
                                                    </datalist>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Address*</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Address *" type="text"
                                                            id="consigneeaddress0" name="consigneeaddress">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Location *</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Enter a location"
                                                            type="text" onkeydown="getLocation('activeconsignee0')"
                                                            id="activeconsignee0" name="activeconsignee">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Pickup Date</label>
                                                    <div>
                                                        <input class="form-control" type="date" id="consigneepickdate"
                                                            name="consigneepickdate">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Pickup Time</label>
                                                    <div>
                                                        <input class="form-control" type="time" id="consigneepicktime"
                                                            name="consigneepicktime">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>Type*</label>
                                                    <div class="row">
                                                        <div class="custom-control custom-radio custom-control-inline">
                                                            <input type="radio" class="custom-control-input" id="ctl0"
                                                                name="ctl0" checked>
                                                            <label class="custom-control-label" for="ctl0">TL</label>
                                                        </div>
                                                        <div class="custom-control custom-radio custom-control-inline">

                                                            <input type="radio" class="custom-control-input" id="cltl0"
                                                                name="ctl0">
                                                            <label class="custom-control-label" for="cltl0">LTL</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Commodity</label>
                                                    <div>
                                                        <input class="form-control" type="text" placeholder="Commodity"
                                                            id="consigneecommodity" name="consigneecommodity">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1 ">
                                                    <label>Qty</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Qty" type="text"
                                                            id="consigneeqty" name="consigneeqty">
                                                    </div>
                                                </div>

                                                <div class="form-group col-md-2 ">
                                                    <label>Weight</label>
                                                    <div>
                                                        <input class="form-control" type="text" placeholder="Weight"
                                                            id="consigneeweight" name="consigneeweight">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-2">
                                                    <label>Delivery #</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Delivery #" type="text"
                                                            id="consigneedelivery" name="consigneedelivery">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-1">
                                                    <label>Sr#</label>
                                                    <div>
                                                        <input class="form-control" placeholder="Sr#" type="number"
                                                            id="consigseq0" name="consigseq" value="0">
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label>Delivery Notes</label>
                                                    <div>
                                                        <textarea rows="1" cols="30" placeholder="Delivery Notes"
                                                            class="form-control" type="textarea" id="deliverynotes"
                                                            name="deliverynotes"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12 ">
                            <div class="form-group col-md-2">
                                <label>Tarp</label>
                                <select class="form-control" onchange="getDriverTotal()" id="driverTarpSelect">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-md-2 ">
                                <label>Calculate Miles</label>
                                <div>
                                    <button id="calcmiles" onclick="calculateMiles()"
                                        class="btn btn-outline-dark waves-effect waves-light">
                                        Calculate Miles
                                    </button>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Loaded Miles</label>
                                <div>
                                    <input class="form-control" placeholder="Loaded Miles" type="text" id="loadedmiles"
                                        value="0" onchange="getDriverMiles()">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Empty Miles</label>
                                <div>
                                    <input class="form-control" placeholder="Empty Miles" type="text" id="emptymiles"
                                        value="0" onchange="getDriverMiles()">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Driver Miles</label>
                                <div>
                                    <input class="form-control" placeholder="Driver Miles" type="text" id="drivermiles"
                                        value="0">
                                </div>
                            </div>

                        </div>
                        <div class="row col-md-12">
                            <div class="upload-button ">
                                <label>Upload Files</label>
                                <button class="button">Upload a file</button>
                                <input type="file" id="files" onchange="getfiles(this.files);" name="files[]" multiple
                                    accept=".png, .jpg, .jpeg, .pdf" />
                            </div>
                            <div class="form-group col-md-6">
                                <label>Load Notes</label>
                                <div>
                                    <input class="form-control" placeholder="Load Notes" type="text" id="loadnotes">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Send carrier rate con</label>
                                <div>
                                    
                                
                                    <button id="carrierratecon" name="carrierratecon"
                                        class="btn btn-outline-primary waves-effect waves-light">
                                        Add Email
                                    </button>
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Send customer rate con</label>
                                <div>
                                    
                                    <button id="customerratecon" name="customerratecon"
                                        class="btn btn-outline-primary waves-effect waves-light">
                                        Add Email
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="addactiveload">Add</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div><!-- /.modal-dialog -->
        </div>
        <!--End of new active modal -->
        <!--Quick load load model-->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="Quick_load"
            aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header custom-modal-header">
                        <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Quick load</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-modal-body">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Status</label>
                                <div>
                                    <input class="form-control" placeholder="Status" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Ship Date</label>
                                <input class="form-control" type="date">


                            </div>
                            <div class="form-group col-md-2">
                                <label>Del Date</label>
                                <input class="form-control" type="date">
                            </div>
                            <div class="form-group col-md-2">
                                <label>Customer</label>
                                <div>
                                    <input class="form-control" placeholder="Customer" type="text">
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <label>Driver</label>
                                <div>
                                    <input class="form-control" placeholder="Driver" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>Carrier</label>
                                <div>
                                    <input class="form-control" placeholder="Carrier" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Origin</label>
                                <div>
                                    <input class="form-control" placeholder="Origin" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Destination</label>
                                <div>
                                    <input class="form-control" placeholder="Destination" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>TRUCK</label>
                                <div>
                                    <input class="form-control" placeholder="TRUCK" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-1">
                                <label>TRAILER</label>
                                <div>
                                    <input class="form-control" placeholder="TRAILER" type="text">
                                </div>
                            </div>
                            <div class="form-group col-md-2">
                                <label>LOAD PAY</label>
                                <div>
                                    <input class="form-control" placeholder="LOAD PAY" type="text">
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">
                                Close
                            </button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Save
                            </button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        </div>
        <!--End of Quick load load model-->

        <div class="row">

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-cube-outline bg-primary  text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16">Active Sessions</h5>
                        </div>
                        <h3 class="mt-4">43,225</h3>
                        <div class="progress mt-4" style="height: 4px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                                aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">75%</span></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-briefcase-check bg-success text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16">Total Revenue</h5>
                        </div>
                        <h3 class="mt-4">$73,265</h3>
                        <div class="progress mt-4" style="height: 4px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 88%"
                                aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">88%</span></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-tag-text-outline bg-warning text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16">Average Price</h5>
                        </div>
                        <h3 class="mt-4">447</h3>
                        <div class="progress mt-4" style="height: 4px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 68%"
                                aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">68%</span></p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-heading p-4">
                        <div class="mini-stat-icon float-right">
                            <i class="mdi mdi-buffer bg-danger text-white"></i>
                        </div>
                        <div>
                            <h5 class="font-16">Add to Card</h5>
                        </div>
                        <h3 class="mt-4">86%</h3>
                        <div class="progress mt-4" style="height: 4px;">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <p class="text-muted mt-2 mb-0">Previous period<span class="float-right">82%</span></p>
                    </div>
                </div>
            </div>

        </div>
        <!-- START ROW -->
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">

                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table  table-striped " style="text-align:center">
                                    <thead>
                                        <tr>
                                            <th class="tableFooter" data-priority="1">#</th>
                                            <th data-priority="1">Invoice</th>
                                            <th data-priority="3">Status</th>
                                            <th data-priority="3">Ship_Date</th>
                                            <th data-priority="6">Del_Date</th>
                                            <th data-priority="6">Customer</th>
                                            <th data-priority="6">Driver/Carrier</th>
                                            <th data-priority="1">Origin</th>
                                            <th data-priority="3">Destination</th>
                                            <th data-priority="3">Truck</th>
                                            <th data-priority="6">Trailer</th>
                                            <th data-priority="1">Load Pay</th>
                                            <th data-priority="3">Driver Pay</th>
                                            <th data-priority="6">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th><a title="Driver/Carrier" data-toggle="popover" data-placement="right"
                                                    data-trigger="hover" data-content="TRUCK MAIKEL GONZALEZ INC"><i
                                                        class="mdi mdi-gamepad-round"></i></a></th>
                                            <!-- <td>
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="table1"
                                                        data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                    <label class="custom-control-label" for="table1"></label>
                                                </div>
                                            </td> -->
                                            <td>76565</td>
                                            <td>
                                                <div class="form-group col-md-">
                                                    <select class="form-control">
                                                        <option>xyz</option>
                                                        <option>abc</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td>03-05-20</td>
                                            <td>03-05-20</td>
                                            <td class="max-width-50"><a title="Customer" data-toggle="popover"
                                                    data-placement="left" data-trigger="hover" data-content="SOUTHERN MILLING
                                                    AND LUMBER INC">SOUTHERN MILLING
                                                    AND LUMBER INC</td>
                                            <td class="max-width-50"><a title="Driver/Carrier" data-toggle="popover"
                                                    data-placement="left" data-trigger="hover"
                                                    data-content="TRUCK MAIKEL GONZALEZ INC">
                                                    TRUCK MAIKEL GONZALEZ INC</a></td>
                                            <td class="max-width-50"><a title="Origin" data-toggle="popover"
                                                    data-placement="left" data-trigger="hover"
                                                    data-content="Lakeland, FL/">Lakeland, FL/</a></td>
                                            <td class="max-width-50"><a title="Destination" data-toggle="popover"
                                                    data-placement="left" data-trigger="hover"
                                                    data-content="Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/Cross City, FL/">Cross
                                                    City, FL/</a></td>
                                            <td>731</td>
                                            <td>742</td>
                                            <td>550.00</td>
                                            <td>550.00</td>
                                            <td>
                                                <div class="btn-group mb-2 dropleft"><a type="button"
                                                        class="mdi mdi-xbox-controller-menu" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false"
                                                        style="font-size:25px;"></a>
                                                    <div class="dropdown-menu">
                                                        <i class="mdi mdi-delete-sweep-outline delete"></i>
                                                        <i class="mdi mdi-printer printer"></i>
                                                        <i class="mdi mdi-lead-pencil pencil"></i>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-xl-8">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title mb-4">Area Chart</h4>

                        <div id="morris-area-example" class="morris-charts morris-chart-height"></div>

                    </div>
                </div>
            </div>
            <!-- end col -->

            <div class="col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Donut Chart</h4>

                        <div id="morris-donut-example" class="morris-charts morris-chart-height"></div>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Friends Suggestions</h4>
                        <div class="friends-suggestions">
                            <a href="#" class="friends-suggestions-list">
                                <div class="border-bottom position-relative">
                                    <div class="float-left mb-0 mr-3">
                                        <img src="assets/images/users/user-2.jpg" alt=""
                                            class="rounded-circle thumb-md">
                                    </div>
                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                        <i class="mdi mdi-plus"></i>
                                    </div>

                                    <div class="desc">
                                        <h5 class="font-14 mb-1 pt-2 text-dark">Ralph Ramirez</h5>
                                        <p class="text-muted">3 Friend suggest</p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="friends-suggestions-list">
                                <div class="border-bottom position-relative">
                                    <div class="float-left mb-0 mr-3">
                                        <img src="assets/images/users/user-3.jpg" alt=""
                                            class="rounded-circle thumb-md">
                                    </div>
                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                        <i class="mdi mdi-plus"></i>
                                    </div>

                                    <div class="desc">
                                        <h5 class="font-14 mb-1 pt-2 text-dark">Patrick Beeler</h5>
                                        <p class="text-muted">17 Friend suggest</p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="friends-suggestions-list">
                                <div class="border-bottom position-relative">
                                    <div class="float-left mb-0 mr-3">
                                        <img src="assets/images/users/user-4.jpg" alt=""
                                            class="rounded-circle thumb-md">
                                    </div>
                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                        <i class="mdi mdi-plus"></i>
                                    </div>

                                    <div class="desc">
                                        <h5 class="font-14 mb-1 pt-2 text-dark">Victor Zamora</h5>
                                        <p class="text-muted">12 Friend suggest</p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="friends-suggestions-list">
                                <div class="border-bottom position-relative">
                                    <div class="float-left mb-0 mr-3">
                                        <img src="assets/images/users/user-5.jpg" alt=""
                                            class="rounded-circle thumb-md">
                                    </div>
                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                        <i class="mdi mdi-plus"></i>
                                    </div>

                                    <div class="desc">
                                        <h5 class="font-14 mb-1 pt-2 text-dark">Bryan Lacy</h5>
                                        <p class="text-muted">18 Friend suggest</p>
                                    </div>
                                </div>
                            </a>

                            <a href="#" class="friends-suggestions-list">
                                <div class="position-relative">
                                    <div class="float-left mb-0 mr-3">
                                        <img src="assets/images/users/user-6.jpg" alt=""
                                            class="rounded-circle thumb-md">
                                    </div>
                                    <div class="suggestion-icon float-right mt-2 pt-1">
                                        <i class="mdi mdi-plus"></i>
                                    </div>

                                    <div class="desc">
                                        <h5 class="font-14 mb-1 pt-2 text-dark">James Sorrells</h5>
                                        <p class="text-muted mb-1">6 Friend suggest</p>
                                    </div>
                                </div>
                            </a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Sales Analytics</h4>
                        <div id="morris-line-example" class="morris-chart" style="height: 360px"></div>

                    </div>
                </div>

            </div>

            <div class="col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">

                        <h4 class="mt-0 header-title mb-4">Recent Activity</h4>
                        <ol class="activity-feed mb-0">
                            <li class="feed-item">
                                <div class="feed-item-list">
                                    <p class="text-muted mb-1">Now</p>
                                    <p class="font-15 mt-0 mb-0">Andrei Coman posted a new article: <b
                                            class="text-primary">Forget UX Rowland</b></p>
                                </div>
                            </li>
                            <li class="feed-item">
                                <p class="text-muted mb-1">Yesterday</p>
                                <p class="font-15 mt-0 mb-0">Andrei Coman posted a new article: <b
                                        class="text-primary">Designer Alex</b></p>
                            </li>
                            <li class="feed-item">
                                <p class="text-muted mb-1">2:30PM</p>
                                <p class="font-15 mt-0 mb-0">Zack Wetass, <b class="text-primary"> Developer
                                        Moreno</b>
                                </p>
                            </li>
                            <li class="feed-item pb-1">
                                <p class="text-muted mb-1">12:48 PM</p>
                                <p class="font-15 mt-0 mb-2">Zack Wetass, <b class="text-primary">UX Murphy</b></p>
                            </li>

                        </ol>

                    </div>
                </div>
            </div>
        </div>


    </div>
    <!-- end container-fluid -->
</div>
<!-- end wrapper -->
<?php include 'header/footer.php' ?>

</html>
<?php
//} else {
//    header("Location:index.php");
//} ?>