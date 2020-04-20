<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Windson Dispatch: A Complete Trucking Business Solutions.</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
    <meta content="Themesdesign" name="author" />
    <link rel="shortcut icon" href="assets/images/fav-icon.png">

    <!--Morris Chart CSS-->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">
    <link href="assets/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/modalStyle.css" rel="stylesheet" type="text/css">
    <link href="assets/css/modalFormStyle.css" rel="stylesheet" type="text/css">
    <link href="assets/css/activeload.css" rel="stylesheet" type="text/css">
    <link href="assets/plugins/RWD-Table-Patterns/dist/css/rwd-table.min.css" rel="stylesheet" type="text/css"
        media="screen">
    <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"> -->
    </script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.9.1/firebase-database.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.1.0/firebase-analytics.js"></script>
    <script type="text/javascript">
    var firebaseConfig = {
        apiKey: "AIzaSyBq9ZG84S1wX0AhGi7FgtvN44S-Ij9oshc",
        authDomain: "windson-26222.firebaseapp.com",
        databaseURL: "https://windson-26222.firebaseio.com",
        projectId: "windson-26222",
        storageBucket: "windson-26222.appspot.com",
        messagingSenderId: "487372843980",
        appId: "1:487372843980:web:049b557cdd02fce445cb69",
        measurementId: "G-MPX7ETYC5Q"
    };
    // Initialize Firebase
    firebase.initializeApp(firebaseConfig);
    var database = firebase.database();
    </script>

    <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <script src="js/jquery.min.js"></script>
    <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
    <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>
    <script
        src='http://maps.googleapis.com/maps/api/js?v=3&sensor=false&amp;libraries=places&key=AIzaSyCkuoUOXCvpihWP1G2Gjqvwhef7XtkTTJg'>
    </script>
    <script src="js/activeload.js"></script>
    <link href="assets/plugins/sweet-alert2/sweetalert2.css" rel="stylesheet" type="text/css">
</head>

<body id="mainbody">
    <!-- WINDSON LOADER -->
    <div class="wrap-loader" style="display:none">
        <div class="loader">
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="box"></div>
            <div class="wrap-text">
                <div class="text">
                    <span>W</span><span>I</span><span>N</span><span>D</span><span>S</span><span>O</span><span>N</span>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bg">
        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">

                    <!-- Logo-->
                    <div>
                        <a href="Dashboard.php" class="logo">
                            <span class="logo-light">
                                <img src="assets/images/logo.png" width="140px" height="50px" alt="WINDSON DISPATCH">
                            </span>
                        </a>
                    </div>
                    <!-- End Logo-->

                    <div class="menu-extras topbar-custom navbar p-0">


                        <ul class="navbar-right ml-auto list-inline float-right mb-0">
                            <!-- full screen -->
                            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                                </a>
                            </li>

                            <!-- notification -->
                            <li class="dropdown notification-list list-inline-item">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown"
                                    href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <i class="mdi mdi-bell-outline noti-icon"></i>
                                    <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                                </a>
                                <div
                                    class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                                    <!-- item-->
                                    <h6 class="dropdown-item-text">
                                        Notifications
                                    </h6>
                                    <div class="slimscroll notification-item-list">
                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                            <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i>
                                            </div>
                                            <p class="notify-details"><b>Your order is placed</b><span
                                                    class="text-muted">Dummy text of the printing and typesetting
                                                    industry.</span>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-danger"><i
                                                    class="mdi mdi-message-text-outline"></i>
                                            </div>
                                            <p class="notify-details"><b>New Message received</b><span
                                                    class="text-muted">You have 87 unread messages</span>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i>
                                            </div>
                                            <p class="notify-details"><b>Your item is shipped</b><span
                                                    class="text-muted">It is a long established fact that a reader
                                                    will</span>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-success"><i
                                                    class="mdi mdi-message-text-outline"></i>
                                            </div>
                                            <p class="notify-details"><b>New Message received</b><span
                                                    class="text-muted">You have 87 unread messages</span>
                                            </p>
                                        </a>

                                        <!-- item-->
                                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                                            <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i>
                                            </div>
                                            <p class="notify-details"><b>Your order is placed</b><span
                                                    class="text-muted">Dummy text of the printing and typesetting
                                                    industry.</span>
                                            </p>
                                        </a>

                                    </div>
                                    <!-- All-->
                                    <a href="javascript:void(0);"
                                        class="dropdown-item text-center notify-all text-primary">
                                        View all <i class="fi-arrow-right"></i>
                                    </a>
                                </div>
                            </li>

                            <li class="dropdown notification-list list-inline-item">
                                <div class="dropdown notification-list nav-pro-img">
                                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown"
                                        href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        <!-- item-->
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i>
                                            Profile</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-wallet"></i> My Wallet</a>
                                        <a class="dropdown-item d-block" href="#"><span
                                                class="badge badge-success float-right">11</span><i
                                                class="mdi mdi-settings"></i> Settings</a>
                                        <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline"></i> Lock
                                            screen</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item text-danger" href="logout"><i
                                                class="mdi mdi-power text-danger"></i> Logout</a>
                                    </div>
                                </div>
                            </li>

                            <li class="menu-item dropdown notification-list list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>

                        </ul>

                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div>
                <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">

                    <div id="navigation">

                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">

                            <li class="has-submenu">
                                <a href="Dashboard.php"><i class="icon-accelerator"></i> Dashboard</a>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-life-buoy"></i> Master <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu">
                                    <li><a href="#" id="currency_setting">Currency Setting</a></li>

                                    <li>
                                        <a href="#" id="truck_type">Truck Type</a>
                                    </li>
                                    <li>
                                        <a href="#" id="equipment_type">Equipment Type</a>
                                    </li>
                                    <li>
                                        <a href="#" id="trailer_type">Trailer Type</a>
                                    </li>
                                    <li>
                                        <a href="#" id="fix_category">Fix Pay Category</a>
                                    </li>
                                    <li>
                                        <a href="#" class="add_bank">Bank Category</a>
                                    </li>
                                    <li>
                                        <a href="#" class="add_status">Status</a>
                                    </li>
                                    <li>
                                        <a href="#" class="ADDcompany">Company </a>
                                    </li>
                                    <li>
                                        <a href="#" class="add_office">Office </a>
                                    </li>
                                    <li>
                                        <a href="#" class="add_payment_terms">Payment Terms </a>
                                    </li>
                                    <li>
                                        <a href="#" class="add_loadType">Load Type </a>
                                    </li>
                                    <li>
                                        <a href="#" id="add_fuel_card">Fuel Card Type</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-squares"></i> Admin <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#" class="addShipper">Shipper</a>
                                    </li>
                                    <li>
                                        <a href="#" class="addDriver">Driver</a>
                                    </li>
                                    <li>
                                        <a href="#" class="addConsignee">Consignee</a>
                                    </li>

                                    <li>
                                        <a href="#" id="bankadmin">Add Bank</a>
                                    </li>

                                    <li>
                                        <a href="#" id="credit_card">Credit Card</a>
                                    </li>

                                    <li>
                                        <a href="#" id="sub_credit_card">Sub Credit Card</a>
                                    </li>

                                    <li>
                                        <a href="#" id="custom_broker">Custom Broker</a>
                                    </li>

                                    <li>
                                        <a href="#" class="addUser">User</a>
                                    </li>

                                    <li>
                                        <a href="#" class="addCustomer">Customer</a>
                                    </li>

                                    <li><a href="#" id="truck_add">Truck</a></li>

                                    <li><a href="#" id="trailer_add">Trailer</a></li>
                                    <li>
                                        <a href="#" id="addCarrier">External Carrier</a>
                                    </li>
                                    <li>
                                        <a href="#" id="factoring_company">Factoring Company</a>
                                    </li>

                                    <li>
                                        <a href="#" id="add_ifta_card">IFTA Card Category</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-graph"></i> IFTA <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu">
                                    <li>
                                        <a href="#" id="fuel_receipts">Fuel Receipts </a>
                                    </li>
                                    <li>
                                        <a href="#" id="add_toll">Add Toll </a>
                                    </li>
                                    <li><a href="#" id="verify_treep">Verify Treep</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">

                                <a href="#"><i class="icon-paper-pen"></i> Account <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu">
                                    <li>
                                        <ul>
                                            <li><a href="#" id="accountingModal">Accounting Manager</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="#" id="Payment_Reg">Payment Registration</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>


                            <li class="has-submenu">
                                <a href="#"><i class="icon-diamond"></i> Advanced UI <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">
                                    <li>
                                        <ul>
                                            <li><a href="advanced-alertify.html">Alertify</a></li>
                                            <li><a href="advanced-rating.html">Rating</a></li>
                                            <li><a href="advanced-nestable.html">Nestable</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="advanced-rangeslider.html">Range Slider</a></li>
                                            <li><a href="advanced-sweet-alert.html">Sweet-Alert</a></li>
                                            <li><a href="advanced-lightbox.html">Lightbox</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#"><i class="icon-paper-sheet"></i> Pages <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                                <ul class="submenu megamenu">

                                    <li>
                                        <ul>
                                            <li><a href="pages-pricing.html">Pricing</a></li>
                                            <li><a href="pages-invoice.html">Invoice</a></li>
                                            <li><a href="pages-timeline.html">Timeline</a></li>
                                            <li><a href="pages-faqs.html">FAQs</a></li>
                                            <li><a href="pages-maintenance.html">Maintenance</a></li>
                                            <li><a href="pages-comingsoon.html">Coming Soon</a></li>
                                            <li><a href="pages-starter.html">Starter Page</a></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><a href="pages-login.html">Login</a></li>
                                            <li><a href="pages-register.html">Register</a></li>
                                            <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                            <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                            <li><a href="pages-404.html">Error 404</a></li>
                                            <li><a href="pages-500.html">Error 500</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                        <!-- End navigation menu -->
                    </div>
                    <!-- end #navigation -->
                </div>
                <!-- end container -->
            </div>
            <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->
    <div class="modal-container"></div>
    <div class="driver-container"></div>
    <div class="account-container"></div>
    <div class="fuel-card-container"></div>
       
       