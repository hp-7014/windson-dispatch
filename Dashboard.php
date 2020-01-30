<?php session_start();
if ($_SESSION['company'] == 'user') {


?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header/header.php';?>

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
            <!-- end row -->
        </div>

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
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="progress-bar bg-success" role="progressbar" style="width: 88%" aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
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

            <div class="col-xl-4">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title mb-4">Donut Chart</h4>


                        <div class="col-sm-6 col-md-3 m-t-30">
                            <div class="text-center">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
                            </div>


                            <!--  Modal content for the above example -->
                            <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content custom-modal-content">
                                        <div class="modal-header custom-modal-header">
                                            <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">New Active Load</h5>
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
                                                            <input class="form-control" placeholder="Company Name" type="text" id="example-text-input">
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
                                                            <input class="form-control" placeholder="Rate" type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-1">
                                                        <label># of Units</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Units" type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-1">
                                                        <label>F.S.C.</label>
                                                        <div>
                                                            <input class="form-control" placeholder="F.S.C." type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Rate %</label>
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input" id="customCheck1" data-parsley-multiple="groups"
                                                                   data-parsley-mincheck="2">
                                                            <label class="custom-control-label" for="customCheck1">Rate %</label>
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label>Other Charges</label><i class="mdi mdi-gamepad-round"></i>
                                                        <div>
                                                            <input class="form-control" placeholder="Other Charges" type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label>Total Rate</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Total Rate" type="text" id="example-text-input">
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
                                                            <input class="form-control" placeholder="Units" type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-1">
                                                        <label>Advance</label>
                                                        <div>
                                                            <input class="form-control" placeholder="F.S.C." type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label>Charges</label><i class="mdi mdi-gamepad-round"></i>
                                                        <div>
                                                            <input class="form-control" placeholder="Other Charges" type="text" id="example-text-input">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-md-2">
                                                        <label>Total</label>
                                                        <div>
                                                            <input class="form-control" placeholder="Total Rate" type="text" id="example-text-input">
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
                                                        <li class="active"><a href="#tab01" data-toggle="tab">Joe Smith</a><span>X</span></li>
                                                        <li><a href="#tab02" data-toggle="tab">Molly</a><span>X</span></li>
                                                        <li><a href="#" class="add-contact" data-toggle="tab">+ Add</a></li>
                                                    </ul>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="contact_01">Contact From: Joe Smith</div>
                                                        <div class="tab-pane" id="contact_02">Contact From: Molly Lewis</div>
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
                                            <img src="assets/images/users/user-2.jpg" alt="" class="thumb-md rounded-circle mr-2"> Philip Smead
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
                                            <img src="assets/images/users/user-3.jpg" alt="" class="thumb-md rounded-circle mr-2"> Brent Shipley
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
                                            <img src="assets/images/users/user-4.jpg" alt="" class="thumb-md rounded-circle mr-2"> Robert Sitton
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
                                            <img src="assets/images/users/user-5.jpg" alt="" class="thumb-md rounded-circle mr-2"> Alberto Jackson
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
                                            <img src="assets/images/users/user-6.jpg" alt="" class="thumb-md rounded-circle mr-2"> David Sanchez
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
} else {
    header("Location:index.php");
} ?>