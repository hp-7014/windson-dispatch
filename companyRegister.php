<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Windson Dispatch</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="js/authForm.js"></script>
    <script src="js/validation.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body>

<!-- Begin page -->
<div class="accountbg"></div>
<div class="wrapper-page">
    <div class="card card-pages shadow-none">
        <div class="card-body">
            <div class="text-center m-t-0 m-b-15">
                <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
            </div>
            <h5 class="font-18 text-center">Register</h5>
            <br>
            <div class="row">
                <div class="col-6">
                    <label>Company Name</label>
                    <input class="form-control" type="text" value="" id="companyName" placeholder="Company Name">
                </div>

                <div class="col-6">
                    <label>Company Email</label>
                    <input class="form-control" type="text" value="" id="companyEmail" placeholder="Company Email">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <label>Company Contact</label>
                    <input class="form-control" type="text" value="" id="companyContact" placeholder="Company Contact">
                </div>

                <div class="col-6">
                    <label>Company Address</label>
                    <input class="form-control" type="text" value="" id="companyAddress" placeholder="Company Address">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-6">
                    <label>Password</label>
                    <input class="form-control" type="password" value="" id="companyPassword"
                           placeholder="Password">
                </div>

                <div class="col-6">
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" value="" id="companyConfirmPassword"
                           placeholder=" Confirm Password">
                </div>
            </div>
            <br>
            <div class="col-12">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                    <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#"
                                                                                                          class="text-primary">Terms
                            and Conditions</a></label>
                </div>
            </div>
            <div class="text-center m-t-20">
                <div class="col-12">
                    <input type="submit" name="submit" value="Register" onclick="companyRegister()"
                           class="btn btn-primary btn-block btn-lg waves-effect waves-light">
                </div>
            </div>
            <div class="mb-0 row">
                <div class="col-12 m-t-10 text-center">
                    <a href="index.php" class="text-muted">Already have account?</a>
                </div>
            </div>
        </div>
        <!--                    </form>-->
    </div>

</div>
</div>
<!-- END wrapper -->

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/metismenu.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>