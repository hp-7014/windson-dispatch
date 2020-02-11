<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Stexo - Responsive Admin & Dashboard Template | Themesdesign</title>
    <meta content="Responsive admin theme build on top of Bootstrap 4" name="description"/>
    <meta content="Themesdesign" name="author"/>
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!--Morris Chart CSS-->
    <link rel="stylesheet" href="assets/plugins/morris/morris.css">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <link href="assets/css/modalStyle.css" rel="stylesheet" type="text/css">
    <link href="assets/css/modalFormStyle.css" rel="stylesheet" type="text/css">
    <link href="assets/css/activeload.css" rel="stylesheet" type="text/css">



    <!--<link href="assets/css/select2.min.css" rel="stylesheet" type="text/css">-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.js"></script>-->
    <script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>

    <script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>

    <script src="master/js/form.js"></script>
    <script src="js/activeload.js"></script>
    <script src="admin/js/form.js"></script>
    <script src="master/js/validation.js"></script>
    <script src="admin/js/validation.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&libraries=places"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    <script>
            $(document).ready(function(){
                $(".driver").css("display","none");
                $(".owner").css("display","none");

            });


        $(document).on('click', '.addShipper', function () {
            // alert("called");
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/shipper_modal.php', function (result) {
                        $('#shipper').modal({show: true});
                    });
                }
            });
        });
        $(document).on('click', '.addUser', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/user_modal.php', function (result) {
                        $('#user').modal({show: true});
                    });
                }
            });
        });
         $(document).on('click', '.addConsignee', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/consignee_modal.php', function (result) {
                        $('#consignee').modal({show: true});
                    });
                }
            });
        });
         $(document).on('click', '.addCustomer', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/customer_modal.php', function (result) {
                        $('#customer').modal({show: true});
                    });
                }
            });
        });


         $(document).on("click", "#currency_setting", function () {
            //alert('test');
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_currency.php', function (result) {
                        $('#currency').modal({show: true});
                    });
                },
            });
        });


         $(document).on("click", "#truck_type", function () {
            //alert('test');
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_truck_type.php', function (result) {
                        $('#truck').modal({show: true});
                    });
                },
            });
        });


         $(document).on("click", "#equipment_type", function () {
            //alert('test');
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_equipment_type.php', function (result) {
                        $('#equipment').modal({show: true});
                    });
                },
            });
        });

         $(document).on("click", "#trailer_type", function () {
            //alert('test');
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_trailer_type.php', function (result) {
                        $('#trailer').modal({show: true});
                    });
                },
            });
        });

         $(document).on("click", "#fix_category", function () {
            //alert('test');
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_fixpaycategory.php', function (result) {
                        $('#Fix_Pay').modal({show: true});
                    });
                },
            });
        });

         $(document).on('click', '.ADDcompany', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_company.php', function (result) {
                        $('#company_modal').modal({show: true});
                    });
                }
            });
        });
         $(document).on('click', '#AddCompany', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.company-container').load('./master/add_company_sub.php', function (result) {
                        $('#add_company').modal({show: true});
                    });
                }
            });
        });

         $(document).on('click', '#AddCustomer', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.customer-container').load('./admin/customer_modal_sub.php', function (result) {
                        $('#add_customer').modal({show: true});
                    });
                }
            });
        });

            $(document).on('click', '#AddCarrier', function () {

                $.ajax({
                    type: 'POST',
                    success: function (data) {
                        $('.carrier-container').load('./admin/external_carrier_modal_sub.php', function (result) {
                            $('#add_External').modal({show: true});
                        });
                    }
                });
            });



            $(document).on('click', '.modalCompany', function () {
                $('#add_company').modal('hide');
            });
            $(document).on('click', '.modalCustomer', function () {
                $('#add_customer').modal('hide');
            });
            $(document).on('click', '.modalCarrier', function () {
                $('#add_External').modal('hide');
            });
         $(document).on('click', '.add_loadType', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_loadType.php', function (result) {
                        $('#Load_Type').modal({show: true});
                    });
                }
            });
        });

         $(document).on('click', '.add_office', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_office.php', function (result) {
                        $('#Office').modal({show: true});
                    });
                }
            });
        });

         $(document).on('click', '.add_payment_terms', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_paymentTerms.php', function (result) {
                        $('#Payment_Terms').modal({show: true});
                    });
                }
            });
        });

         $(document).on('click', '.add_bank', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/add_bank.php', function (result) {
                        $('#add_bank').modal({show: true});
                    });
                }
            });
        });

         $(document).on('click', '.add_status', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./master/status_type_modal.php', function (result) {
                        $('#Status_Type').modal({show: true});
                    });
                }
            });
        });

         $(document).on('click','#bankadmin', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {

                    $('.modal-container').load('./admin/bank_admin_modal.php', function (result) {
                        $('#bank').modal({show: true});
                    })
                }
            });
        });

         $(document).on('click','#credit_card', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/credit_card_modal.php', function (result) {
                        $('#CreditCard').modal({show: true});
                    })
                }
            });
        });

         $(document).on('click','#sub_credit_card', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {

                    $('.modal-container').load('./admin/sub_credit_card_modal.php', function (result) {
                        $('#Credit_Card').modal({show: true});
                    })
                }
            });
        });

         $(document).on('click','#custom_broker', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/custom_broker_modal.php', function (result) {
                        $('#Custom_Broker').modal({show: true});
                    })
                }
            });
        });

        //admin chetan

        // Add Truck Function
         $(document).on("click", "#truck_add", function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/add_truck_modal.php', function (result) {
                        $('#truck').modal({show: true});
                    });
                },
            });
        });

        // Add Trailer Function
         $(document).on("click", "#trailer_add", function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/add_trailer_modal.php', function (result) {
                        $('#trailer').modal({show: true});
                    });
                },
            });
        });

        // Add Factoring Company Function
         $(document).on("click", "#factoring_company", function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/add_factoring_modal.php', function (result) {
                        $('#factoring').modal({show: true});
                    });
                },
            });
        });

        //This function is invoked when external carrier is clicked from menu
         $(document).on('click','#addCarrier', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./admin/external_carrier_modal.php', function (result) {
                        $('#External').modal({show: true});
                    })
                }
            });
        });

        //This function is invoked when external carrier is clicked from menu
         $(document).on('click','#active_load_button', function () {
             $.ajax({
                type: 'POST',
                success: function (data) {
                    $('.modal-container').load('./activeLoad/active_load_modal.php', function (result) {
                        $('#new_active_load1').modal({show: true});
                    })
                }
            });
        });



    </script>
</head>

<body>

<div class="header-bg">
    <!-- Navigation Bar-->
    <header id="topnav">
        <div class="topbar-main">
            <div class="container-fluid">

                <!-- Logo-->
                <div>
                    <a href="index.html" class="logo">
                            <span class="logo-light">
                                    <i class="mdi mdi-camera-control"></i> Windson Dispatch
                            </span>
                    </a>
                </div>
                <!-- End Logo-->

                <div class="menu-extras topbar-custom navbar p-0">


                    <ul class="navbar-right ml-auto list-inline float-right mb-0">
                        <!-- language-->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                               role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="assets/images/flags/us_flag.jpg" class="mr-2" height="12" alt=""/> English
                                <span class="mdi mdi-chevron-down"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                                <a class="dropdown-item" href="#"><img src="assets/images/flags/french_flag.jpg" alt=""
                                                                       height="16"/><span> French </span></a>
                                <a class="dropdown-item" href="#"><img src="assets/images/flags/spain_flag.jpg" alt=""
                                                                       height="16"/><span> Spanish </span></a>
                                <a class="dropdown-item" href="#"><img src="assets/images/flags/russia_flag.jpg" alt=""
                                                                       height="16"/><span> Russian </span></a>
                                <a class="dropdown-item" href="#"><img src="assets/images/flags/germany_flag.jpg" alt=""
                                                                       height="16"/><span> German </span></a>
                                <a class="dropdown-item" href="#"><img src="assets/images/flags/italy_flag.jpg" alt=""
                                                                       height="16"/><span> Italian </span></a>
                            </div>
                        </li>

                        <!-- full screen -->
                        <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                            <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                                <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                            </a>
                        </li>

                        <!-- notification -->
                        <li class="dropdown notification-list list-inline-item">
                            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                               role="button" aria-haspopup="false" aria-expanded="false">
                                <i class="mdi mdi-bell-outline noti-icon"></i>
                                <span class="badge badge-pill badge-danger noti-icon-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated dropdown-menu-lg px-1">
                                <!-- item-->
                                <h6 class="dropdown-item-text">
                                    Notifications
                                </h6>
                                <div class="slimscroll notification-item-list">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-danger"><i class="mdi mdi-message-text-outline"></i>
                                        </div>
                                        <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-info"><i class="mdi mdi-filter-outline"></i></div>
                                        <p class="notify-details"><b>Your item is shipped</b><span class="text-muted">It is a long established fact that a reader will</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-success"><i class="mdi mdi-message-text-outline"></i>
                                        </div>
                                        <p class="notify-details"><b>New Message received</b><span class="text-muted">You have 87 unread messages</span>
                                        </p>
                                    </a>

                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                                        <div class="notify-icon bg-warning"><i class="mdi mdi-cart-outline"></i></div>
                                        <p class="notify-details"><b>Your order is placed</b><span class="text-muted">Dummy text of the printing and typesetting industry.</span>
                                        </p>
                                    </a>

                                </div>
                                <!-- All-->
                                <a href="javascript:void(0);" class="dropdown-item text-center notify-all text-primary">
                                    View all <i class="fi-arrow-right"></i>
                                </a>
                            </div>
                        </li>

                        <li class="dropdown notification-list list-inline-item">
                            <div class="dropdown notification-list nav-pro-img">
                                <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#"
                                   role="button" aria-haspopup="false" aria-expanded="false">
                                    <img src="assets/images/users/user-4.jpg" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle"></i> Profile</a>
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
                            <a href="index.html"><i class="icon-accelerator"></i> Dashboard</a>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="icon-life-buoy"></i> Admin <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu">
                                <li><a href="#" class="addShipper">Shipper</a></li>

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

                                <li>
                                    <a href="#" id="trailer_add">Trailer</a>
                                </li>
                                <li>
                                    <a href="#" id="factoring_company">Factoring Company</a>
                                </li>
                                <li>
                                    <a href="#" id="addCarrier">External Carrier</a>
                                </li>
                                <li>
                                    <a href="#" id="new_active_load">Active Load</a>
                                </li>
                            </ul>
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
                                    <a href="#" class="add_bank">Bank</a>
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
                            </ul>
                        </li>

                        <li class="has-submenu">
                            <a href="#"><i class="icon-pencil-ruler"></i> UI Elements <i
                                        class="mdi mdi-chevron-down mdi-drop"></i></a>
                            <ul class="submenu megamenu">
                                <li>
                                    <ul>
                                        <li><a href="ui-alerts.html">Alerts</a></li>
                                        <li><a href="ui-badge.html">Badge</a></li>
                                        <li><a href="ui-buttons.html">Buttons</a></li>
                                        <li><a href="ui-cards.html">Cards</a></li>
                                        <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                        <li><a href="ui-navs.html">Navs</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <ul>
                                        <li><a href="ui-tabs-accordions.html">Tabs &amp; Accordions</a></li>
                                        <li><a href="ui-modals.html">Modals</a></li>
                                        <li><a href="ui-images.html">Images</a></li>
                                        <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                        <li><a href="ui-pagination.html">Pagination</a></li>
                                        <li><a href="ui-popover-tooltips.html">Popover & Tooltips</a></li>
                                    </ul>
                                </li>

                                <li>
                                    <ul>
                                        <li><a href="ui-spinner.html">Spinner</a></li>
                                        <li><a href="ui-carousel.html">Carousel</a></li>
                                        <li><a href="ui-video.html">Video</a></li>
                                        <li><a href="ui-typography.html">Typography</a></li>
                                        <li><a href="ui-grid.html">Grid</a></li>
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
    <!--    <div class="add_company_modal"></div>-->
    <!--    <div class="add_office_modal"></div>-->
    <!--    <div class="add_paymentTerm_modal"></div>-->
    <!--    <div class="add_loadType_modal"></div>-->
    <div class="modal-container"></div>
    <!--    <div class="add_shipper_modal"></div>-->