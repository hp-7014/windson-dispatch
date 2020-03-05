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
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Windson</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>

        <div class="row">

            <div class="col-sm-6 col-md-3 m-t-30">
                <div class="text-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target="#active_new">New active load
                    </button>
                </div>

                <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" id="active_new" aria-hidden="true">
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
                                                        $value = "'".$sc['_id'].')'.$sc['companyName']."'";
                                                        
                                                        echo "<option value=$value></option>";
                                                     } }?>
                                        </datalist>
                                    </div>

                                    <div class="form-group col-md-3">
                                        <label>Customer</label> <i class="mdi mdi-plus-circle plus" title="Add Customer"
                                            id="add_Customer_Modal"></i>
                                        <input list="browserscustomer" placeholder="--Select--" class="form-control"
                                            id="customerlist" name="customerlist">
                                        <datalist id="browserscustomer">
                                            <?php
                                                $show_customer = $db->customer->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_customer as $showcustomer) {
                                                     $customer = $showcustomer['customer'];
                                                    foreach ($customer as $scus) {
                                                        $customervalue = "'".$scus['_id'].")&nbsp;".$scus['custName']."'";
                                                       echo "<option value=$customervalue></option>";
                                                    } }?>
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
                                                value="<?php echo $su['_id'].") ".$su['userFirstName']." ".$su['userLastName'] ;?>">
                                            </option>
                                            <?php } }?>
                                        </datalist>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>CN No.</label>
                                        <div>
                                            <input class="form-control" placeholder="Company Name" type="text"
                                                id="example-text-input">
                                            <input type="hidden" id="companyid"
                                                value="<?php echo $_SESSION['companyId']; ?>">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2">
                                        <label>Status</label>
                                        <select class="form-control">
                                            <option value="0">--Select--</option>
                                            <?php
                                            $show_status = $db->status_type->find(['companyID' => $_SESSION['companyId']]);
                                            $no = 1;
                                            foreach ($show_status as $showstatus) {
                                                $status = $showstatus['status'];
                                                foreach ($status as $ss) {
                                                    ?>
                                            <option value="<?php echo $ss['_id'];?>"><?php echo $ss['status_name'];?>
                                            </option>
                                            <?php } }?>
                                        </select>
                                    </div>
                                </div>
                                <!-- End of Modal First Row  -->


                                <!-- Start of Modal Second Row -->
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label>Active Type</label><i class="mdi mdi-plus-circle plus"
                                            title="Add Active Type" id="active_type_Modal"></i>
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
                                                        $loadValue = "'".$sl['_id'].")&nbsp;".$sl['loadName']."'";
                                                        echo "<option value=$loadValue></option>";
                                                        } } ?>
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
                                        <label style="display:inline">F.S.C.</label>&nbsp;&nbsp;<div
                                            style="display:inline" class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                data-parsley-multiple="groups" data-parsley-mincheck="2"
                                                onclick="getTotal()">
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
                                            <input class="form-control" placeholder="Total Rate" type="text"
                                                id="totalAmount" name="totalAmount">
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
                                                         $equipValue = "'".$se['_id'].")&nbsp;".$se['equipmentType']."'";
                                                         echo " <option value=$equipValue></option>"
                                                        ?>

                                            <?php } }?>
                                        </datalist>
                                    </div>
                                </div>
                                <!-- End of Modal Second Row -->

                                <!-- Start of Modal Third Row -->
                                <div class="row col-md-12">
                                    <div class="form-group col-md-2">
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="carrier"
                                                name="groupOfDefaultRadios" checked onclick="Showcarrier()" />
                                            <label class="custom-control-label" for="carrier">Carrier</label>
                                        </div>

                                        <!-- Group of default radios - option 2 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="driver"
                                                name="groupOfDefaultRadios" onclick="Showdriver()" />
                                            <label class="custom-control-label" for="driver">Driver</label>
                                        </div>

                                        <!-- Group of default radios - option 3 -->
                                        <div class="custom-control custom-radio">
                                            <input type="radio" class="custom-control-input" id="owner"
                                                name="groupOfDefaultRadios" onclick="Showowner()" />
                                            <label class="custom-control-label" for="owner">Owner
                                                Operator</label>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-2 carrier">
                                        <label>Carrier Name</label><i class="mdi mdi-plus-circle plus"
                                            id="add_Carrier_Modal"></i>
                                        <input list="browserscarrier" class="form-control"
                                            onchange="getCarrier(this.value)" placeholder="--Select--" id="carrierlist"
                                            name="carrierlist">
                                        <datalist id="browserscarrier">
                                            <?php
                                                $show_carrier = $db->carrier->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_carrier as $showcarrier) {
                                                    $carrier = $showcarrier['carrier'];
                                                    foreach ($carrier as $scar) {
                                                        $carrierValue = "'".$scar['_id'].")&nbsp;".$scar['name']."'";
                                                        echo "<option value=$carrierValue></option>";
                                                         } }?>
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-1 carrier">
                                        <label>Flat Rate</label>
                                        <div>
                                            <input class="form-control" placeholder="Flat Rate" type="text"
                                                id="carrierFlat" onkeyup="getCarrierTotal()">
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
                                            <input class="form-control" placeholder="Total Rate" type="text"
                                                id="carrierTotal">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-2 carrier">
                                        <label>Currency</label><i class="mdi mdi-plus-circle plus"
                                            id="add_currency_modal"></i>
                                        <input list="selectCurrency" class="form-control" placeholder="--Select--"
                                            id="currencylist" name="currencylist">
                                        <datalist id="selectCurrency">
                                            <?php
                                                $show_currency = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_currency as $showcurrency) {
                                                    $currency = $showcurrency['currency'];
                                                    foreach ($currency as $scur) {
                                                        $currencyValue = "'".$scur['_id'].")&nbsp;".$scur['currencytype']."'";
                                                        echo "<option value=$currencyValue></option>";
                                                         } }?>
                                        </datalist>
                                    </div>



                                    <div class="form-group col-md-2 driver">
                                        <label>Driver name</label><i class="mdi mdi-plus-circle plus"
                                            id="add_Driver_Modal">
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
                                                            $driverValue = "'".$sdri['_id'].")&nbsp;".$sdri['driverName']."'";
                                                            echo "<option value=$driverValue></option>";
                                                            } }?>
                                        </datalist>

                                    </div>
                                    <div class="form-group col-md-1 driver">
                                        <label>Truck </label>&nbsp;<i class="mdi mdi-plus-circle plus"
                                            id="add_Truck_Modal"></i>
                                        <input list="browserstruck" class="form-control" placeholder="--Select--"
                                            id="trucklist" name="trucklist" onchange="getTruck(this.value); ">
                                        <datalist id="browserstruck">
                                            <?php
                                                $show_truck = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_truck as $showtruck) {
                                                    $truck = $showtruck['truck'];
                                                    foreach ($truck as $stru) {
                                                        $truckValue = "'".$stru['_id'].")&nbsp;".$stru['truckNumber']."'";
                                                        echo "<option value=$truckValue></option>";
                                                        } }?>
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
                                                        $trialerValue = "'".$stra['_id'].")&nbsp;".$stra['trialerNumber']."'";
                                                        echo "<option value=$trialerValue></option>";
                                                        } }?>
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-1 driver">
                                        <label>Loaded Mi</label>
                                        <div>
                                            <input class="form-control" placeholder="Load Mi " type="text"
                                                id="loadedmile">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-1 driver">
                                        <label>Empty Mi</label>
                                        <div>
                                            <input class="form-control" placeholder="Empty Mi " type="text"
                                                id="emptymile">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group col-md-1 driver">
                                        <label>Other</label><i class="mdi mdi-plus-circle plus"
                                            id="add_Driver_Other"></i>
                                        <div>
                                            <input class="form-control" placeholder="Other " type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-1 driver">
                                        <label>Tarp</label>
                                        <div>
                                            <input class="form-control" placeholder="Tarp " type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-1 driver">
                                        <label>Flat </label>
                                        <div>
                                            <input class="form-control" placeholder="Flat " type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-1 driver">
                                        <label>$ Total </label>
                                        <div>
                                            <input class="form-control" placeholder="$ Total" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 owner">
                                        <label>Select Owner Operator</label><i class="mdi mdi-plus-circle plus"
                                            id="add_Owner_Operator"></i>
                                        <input list="browsersowner" class="form-control" placeholder="--Select--"
                                            id="ownerlist" name="ownerlist">
                                        <datalist id="browsersowner">
                                            <?php 
                                            $collection = $db->owner_operator_driver;
                                            $show1 = $collection->aggregate([
                                            ['$lookup' => [
                                                'from' => 'driver',
                                                'localField' => 'companyID',
                                                'foreignField' => 'companyID',
                                                'as' => 'owner'
                                            ]
                                            ]]);

                                                foreach ($show1 as $row) {
                                                    $ownerOperator = $row['ownerOperator'];
                                                    $owner = $row['owner'];
                                                    $drivername = array();
                                                    foreach ($owner as $row2) {
                                                                $owner1 = $row2['driver'];
                                                                $k = 0;
                                                                foreach ($owner1 as $row3) {
                                                                    $id = $row3['_id'];
                                                                    $drivername[$k] = $id.")&nbsp;".$row3['driverName'];
                                                                    $k++;
                                                                }    
                                                        }

                                                    $j = 0;
                                                            foreach ($ownerOperator as $row1) {
                                                                $drivername1 = "'".$drivername[$row1['driverId']]."'";
                                                                $j++;
                                                            $list .= "<option value=$drivername1></option>";

                                                            }
                                                        } ?>
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-2 owner">
                                        <label>Pay Percentage</label>
                                        <input class="form-control" placeholder="Pay %" type="text" id="demo1">
                                    </div>
                                    
                                    <div class="form-group col-md-2 driver owner">
                                        <label>Other</label><i class="mdi mdi-plus-circle plus"
                                            id="add_Owner_Other"></i>
                                        <div>
                                            <input class="form-control" placeholder="Other " type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-1 owner">
                                        <label>
                                            Truck</label><i class="mdi mdi-plus-circle plus" id="add_Truck_Modal1"></i>
                                        <input list="browsers1truck" class="form-control" placeholder="--Select--"
                                            id="truck1list" name="truck1list">
                                        <datalist id="browsers1truck">
                                            <?php
                                                $show_truck = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_truck as $showtruck) {
                                                    $truck = $showtruck['truck'];
                                                    foreach ($truck as $stru) {
                                                        ?>
                                            <option value="<?php echo $stru['_id'].") ".$stru['truckNumber'] ;?>">
                                            </option>
                                            <?php } }?>
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-1 owner">
                                        <label>
                                            Trailer</label><i class="mdi mdi-plus-circle plus"
                                            id="add_Trailer_Modal1"></i>
                                        <input list="browserstrailer1" class="form-control" id="trailer1list"
                                            placeholder="--Select--" name="trailer1list">
                                        <datalist id="browserstrailer1">
                                            <?php
                                                $show_trailer = $db->trailer_admin_add->find(['companyID' => $_SESSION['companyId']]);
                                                $no = 1;
                                                foreach ($show_trailer as $showtrailer) {
                                                    $trailer = $showtrailer['trailer'];
                                                    foreach ($trailer as $stra) {
                                                        ?>
                                            <option value="<?php echo $stra['_id'].") ".$stra['trailerNumber'] ;?>">
                                            </option>
                                            <?php } }?>
                                        </datalist>
                                    </div>
                                    <div class="form-group col-md-2 driver owner">
                                        <label>$ Total </label>
                                        <div>
                                            <input class="form-control" placeholder="$ Total" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>

                                </div>

                                <!-- End of Modal Third Row -->

                                <!-- partial:index.partial.html -->
                                <div class="ui small form segment">
                                    <h6>
                                        <button class="btn btn-primary" onclick="add_fields();">ADD SHIPPER</button><i
                                            class="mdi mdi-plus-circle plus-xs" id="add_shipper_modal"></i>
                                    </h6>
                                    <div class="card m-b-30 shadow" id="sc-card">
                                        <div class="card-header cardbg">
                                            <ul class="nav nav-tabs main-tabs" id="myTab" role="tablist">
                                                <li class="nav-item list-item" id="home-title">
                                                    <a class="nav-link active shipper list-anchors" id="home-tab0"
                                                        data-toggle="tab" href="#home0" role="tab" aria-controls="home"
                                                        aria-selected="true">Shipper 1</a><i
                                                        class="mdi mdi-window-close ico"
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
                                                        <input list="shipper" class="form-control"
                                                            placeholder="--Select--" id="shipperlist"
                                                            name="shipperlist" onchange="getShipper(this.value);>
                                                        <datalist id="shipper">
                                                            <?php
                                                                $show_shipper = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
                                                                $no = 1;
                                                                foreach ($show_shipper as $showshipper) {
                                                                    $shipper = $showshipper['shipper'];
                                                                    foreach ($shipper as $sshi) {
                                                                         $shipperValue = "'".$sshi['_id'].")&nbsp;".$sshi['shipperName']."'";
                                                                         echo "<option value=$shipperValue></option>";
                                                                     } }?>
                                                        </datalist>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Address*</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Address *"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Location *</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Enter a location"
                                                                type="text" onkeydown="getLocation('activeshipper')"
                                                                id="activeshipper">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Pickup Date</label>
                                                        <div>
                                                            <input class="form-control" type="date">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Pickup Time</label>
                                                        <div>
                                                            <input class="form-control" type="time">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1">
                                                        <label>Type*</label>
                                                        <div class="row">
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">
                                                                <input type="radio" class="custom-control-input"
                                                                    id="defaultInline22"
                                                                    name="inlineDefaultRadiosExample" checked>
                                                                <label class="custom-control-label"
                                                                    for="defaultInline22">TL</label>
                                                            </div>
                                                            <div
                                                                class="custom-control custom-radio custom-control-inline">

                                                                <input type="radio" class="custom-control-input"
                                                                    id="defaultInline23"
                                                                    name="inlineDefaultRadiosExample">
                                                                <label class="custom-control-label"
                                                                    for="defaultInline23">LTL</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Commodity</label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                placeholder="Commodity">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-1 ">
                                                        <label>Qty</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Qty" type="text">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2 ">
                                                        <label>Weight</label>
                                                        <div>
                                                            <input class="form-control" type="text"
                                                                placeholder="Weight">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-2">
                                                        <label>Pickup #</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Pickup #"
                                                                type="text">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-5">
                                                        <label>Pickup Notes</label>
                                                        <div>
                                                            <textarea rows="1" cols="30" class="form-control"
                                                                type="textarea"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="ui small form segment">
                                        <h6>
                                            <button class="btn btn-primary" onclick="add_consignee();">ADD CONSIGNEE
                                            </button><i class="mdi mdi-plus-circle plus-xs"
                                                id="add_consignee_modal"></i>
                                        </h6>
                                        <div class="card m-b-30 shadow" id="c-card">
                                            <div class="card-header cardbg">
                                                <ul class="nav nav-tabs main-tabs" id="consignee" role="tablist">
                                                    <li class="nav-item list-item" id="consig-title">
                                                        <a class="nav-link active consignee list-anchors-consig"
                                                            id="consig-tab0" data-toggle="tab" href="#consig0"
                                                            role="tab" aria-controls="home"
                                                            aria-selected="true">Consignee 1</a><i
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
                                                                placeholder="--Select--" id="consigneelist"
                                                                name="consigneelist">
                                                            <datalist id="consigneee">
                                                                <?php
                                                                        $show_consignee = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
                                                                        $no = 1;
                                                                        foreach ($show_consignee as $showconsignee) {
                                                                            $consignee = $showconsignee['consignee'];
                                                                            foreach ($consignee as $scon) {
                                                                                $consigneeValue = "'".$scon['_id'].")&nbsp;".$scon['consigneeName']."'";
                                                                                echo "<option value=$consigneeValue></option>";
                                                                               } }?>
                                                            </datalist>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Address*</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Address *"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Location *</label>
                                                            <div>
                                                                <input class="form-control"
                                                                    placeholder="Enter a location" type="text"
                                                                    onkeydown="getLocation('activeconsignee')"
                                                                    id="activeconsignee">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Pickup Date</label>
                                                            <div>
                                                                <input class="form-control" type="date">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Pickup Time</label>
                                                            <div>
                                                                <input class="form-control" type="time">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1">
                                                            <label>Type*</label>
                                                            <div class="row">
                                                                <div
                                                                    class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" class="custom-control-input"
                                                                        id="defaultInline22"
                                                                        name="inlineDefaultRadiosExample" checked>
                                                                    <label class="custom-control-label"
                                                                        for="defaultInline22">TL</label>
                                                                </div>
                                                                <div
                                                                    class="custom-control custom-radio custom-control-inline">

                                                                    <input type="radio" class="custom-control-input"
                                                                        id="defaultInline23"
                                                                        name="inlineDefaultRadiosExample">
                                                                    <label class="custom-control-label"
                                                                        for="defaultInline23">LTL</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Commodity</label>
                                                            <div>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Commodity">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-1 ">
                                                            <label>Qty</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Qty"
                                                                    type="text">
                                                            </div>
                                                        </div>

                                                        <div class="form-group col-md-2 ">
                                                            <label>Weight</label>
                                                            <div>
                                                                <input class="form-control" type="text"
                                                                    placeholder="Weight">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label>Delivery #</label>
                                                            <div>
                                                                <input class="form-control" placeholder="Delivery #"
                                                                    type="text">
                                                            </div>
                                                        </div>
                                                        <div class="form-group col-md-5">
                                                            <label>Delivery Notes</label>
                                                            <div>
                                                                <textarea rows="1" cols="30"
                                                                    placeholder="Delivery Notes" class="form-control"
                                                                    type="textarea"></textarea>
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
                                        <select class="form-control">
                                            <option>Select</option>
                                            <option>Yes</option>
                                            <option>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Stop</label>
                                        <div>
                                            <input class="form-control" placeholder="1" type="number"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Other</label>
                                        <div>
                                            <input class="form-control" placeholder="Other" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Loaded Miles</label>
                                        <div>
                                            <input class="form-control" placeholder="Loaded Miles" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Empty Miles</label>
                                        <div>
                                            <input class="form-control" placeholder="Empty Miles" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Driver Miles</label>
                                        <div>
                                            <input class="form-control" placeholder="Driver Miles" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="row col-md-12">
                                    <div class="upload-button">
                                        <label>Upload Files</label>
                                        <button class="button">Upload a file</button>
                                        <input type="file" name="myfile" />
                                    </div>
                                    <div class="form-group col-md-10">
                                        <label>Load Notes</label>
                                        <div>
                                            <input class="form-control" placeholder="Load Notes" type="text"
                                                id="example-text-input">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->

            </div>
        </div>
    </div>
</div>
<!-- end col -->
</div>
<!-- end row -->
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
                    <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88"
                        aria-valuemin="0" aria-valuemax="100"></div>
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
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68"
                        aria-valuemin="0" aria-valuemax="100"></div>
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


    <div class="card m-b-30">
        <div class="card-body">
            <h4 class="mt-0 header-title mb-4">Donut Chart</h4>


            <div class="col-sm-6 col-md-3 m-t-30">
                <div class="text-center">
                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                        data-target=".bs-example-modal-lg">Large modal
                    </button>
                </div>


                <!--  Modal content for the above example -->
                <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content custom-modal-content">
                            <div class="modal-header custom-modal-header">
                                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">New
                                    Active Load</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body custom-modal-body">
                                <form>
                                    <!-- Modal First Row Start -->


                                    <div class="row">
                                        <div class="form-group col-md-3">
                                            <label>Select Your Company</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label>Company</label> <i class="mdi mdi-gamepad-round"></i>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Dispatcher</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>CN No.</label>
                                            <div>
                                                <input class="form-control" placeholder="Company Name" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Status</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- End of Modal First Row  -->


                                    <!-- Start of Modal Second Row -->
                                    <div class="row">
                                        <div class="form-group col-md-2">
                                            <label>Active Type</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label>Rate</label>
                                            <div>
                                                <input class="form-control" placeholder="Rate" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label># of Units</label>
                                            <div>
                                                <input class="form-control" placeholder="Units" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label>F.S.C.</label>
                                            <div>
                                                <input class="form-control" placeholder="F.S.C." type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Rate %</label>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1"
                                                    data-parsley-multiple="groups" data-parsley-mincheck="2">
                                                <label class="custom-control-label" for="customCheck1">Rate
                                                    %</label>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Other Charges</label><i class="mdi mdi-gamepad-round"></i>
                                            <div>
                                                <input class="form-control" placeholder="Other Charges" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Total Rate</label>
                                            <div>
                                                <input class="form-control" placeholder="Total Rate" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Equipment Type</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- End of Modal Second Row -->


                                    <!-- Start of Modal Third Row -->

                                    <div class="row">

                                        <div class="form-group col-md-2">
                                            <div>
                                                <input type="radio">
                                                <label>Carrier</label><i class="mdi mdi-gamepad-round"></i>
                                            </div>
                                            <div>
                                                <input type="radio">
                                                <label>Driver</label><i class="mdi mdi-gamepad-round"></i>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-2">
                                            <label>Carrier / Driver Name</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label>Flat Rate</label>
                                            <div>
                                                <input class="form-control" placeholder="Units" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-1">
                                            <label>Advance</label>
                                            <div>
                                                <input class="form-control" placeholder="F.S.C." type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Charges</label><i class="mdi mdi-gamepad-round"></i>
                                            <div>
                                                <input class="form-control" placeholder="Other Charges" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Total</label>
                                            <div>
                                                <input class="form-control" placeholder="Total Rate" type="text"
                                                    id="example-text-input">
                                            </div>
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label>Currency</label>
                                            <select class="form-control">
                                                <option>Select</option>
                                                <option>Large select</option>
                                                <option>Small select</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="row">

                                        <ul class="nav nav-tabs">
                                            <li class="active"><a href="#tab01" data-toggle="tab">Joe
                                                    Smith</a><span>X</span></li>
                                            <li><a href="#tab02" data-toggle="tab">Molly</a><span>X</span></li>
                                            <li><a href="#" class="add-contact" data-toggle="tab">+ Add</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="contact_01">Contact From: Joe
                                                Smith
                                            </div>
                                            <div class="tab-pane" id="contact_02">Contact From: Molly Lewis
                                            </div>
                                        </div>


                                    </div>

                                    <!-- End of Modal Third Row -->

                                </form>

                                <!--                                            <div role="tabpanel">-->
                                <!--                                                 Nav tabs -->
                                <!--                                                <ul class="nav nav-tabs" role="tablist">-->
                                <!--                                                    <li role="presentation" class="active"><a href="#uploadTab" class="btn btn-link waves-effect" aria-controls="uploadTab" role="tab" data-toggle="tab">Upload</a>-->
                                <!---->
                                <!--                                                    </li>-->
                                <!--                                                    <li role="presentation"><a href="#browseTab" class="btn btn-link waves-effect" aria-controls="browseTab" role="tab" data-toggle="tab">Browse</a>-->
                                <!---->
                                <!--                                                    </li>-->
                                <!--                                                </ul>-->
                                <!--                                                 Tab panes -->
                                <!--                                                <div class="tab-content custom-modal-content">-->
                                <!--                                                    <div role="tabpanel" class="tab-pane active" id="uploadTab">Upload Tab</div>-->
                                <!--                                                    <div role="tabpanel" class="tab-pane" id="browseTab">Browse Tab</div>-->
                                <!--                                                </div>-->
                                <!--                                            </div>-->


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Add</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>


        </div>
    </div>
</div>
<!-- end col -->
</div>
<!-- end row -->


<!-- START ROW -->
<div class="row">
    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title mb-4">Active Deals</h4>
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Location</th>
                                <th scope="col" colspan="2">Date</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Philip Smead</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                                <td>$9,420,000</td>
                                <td>
                                    <div>
                                        <img src="assets/images/users/user-2.jpg" alt=""
                                            class="thumb-md rounded-circle mr-2"> Philip Smead
                                    </div>
                                </td>
                                <td>Houston, TX 77074</td>
                                <td>15/1/2018</td>

                                <td>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Brent Shipley</td>
                                <td><span class="badge badge-warning">Pending</span></td>
                                <td>$3,120,000</td>
                                <td>
                                    <div>
                                        <img src="assets/images/users/user-3.jpg" alt=""
                                            class="thumb-md rounded-circle mr-2"> Brent Shipley
                                    </div>
                                </td>
                                <td>Oakland, CA 94612</td>
                                <td>16/1/2019</td>

                                <td>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Robert Sitton</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                                <td>$6,360,000</td>
                                <td>
                                    <div>
                                        <img src="assets/images/users/user-4.jpg" alt=""
                                            class="thumb-md rounded-circle mr-2"> Robert Sitton
                                    </div>
                                </td>
                                <td>Hebron, ME 04238</td>
                                <td>17/1/2019</td>

                                <td>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Alberto Jackson</td>
                                <td><span class="badge badge-danger">Cancel</span></td>
                                <td>$5,200,000</td>
                                <td>
                                    <div>
                                        <img src="assets/images/users/user-5.jpg" alt=""
                                            class="thumb-md rounded-circle mr-2"> Alberto Jackson
                                    </div>
                                </td>
                                <td>Salinas, CA 93901</td>
                                <td>18/1/2019</td>

                                <td>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>David Sanchez</td>
                                <td><span class="badge badge-success">Delivered</span></td>
                                <td>$7,250,000</td>
                                <td>
                                    <div>
                                        <img src="assets/images/users/user-6.jpg" alt=""
                                            class="thumb-md rounded-circle mr-2"> David Sanchez
                                    </div>
                                </td>
                                <td>Cincinnati, OH 45202</td>
                                <td>19/1/2019</td>

                                <td>
                                    <div>
                                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
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
<!-- END ROW -->

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