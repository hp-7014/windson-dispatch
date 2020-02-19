$(document).on('click', '.addShipper', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./admin/shipper_modal.php', function (result) {
                $('#shipper').modal({show: true});
            });
        }
    });
});

$(document).on('click', '.addDriver', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./admin/driver_modal.php', function (result) {
                $('#Driver').modal({show: true});
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

//--------------------IFTA Start----------------------//
// Add Verify Treep Function
$(document).on("click", "#verify_treep", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./ifta/verify_treep_model.php', function (result) {
                $('#verified').modal({show: true});
            });
        },
    });
});
// Add Fuel Receipts IFTA
$(document).on("click", "#fuel_receipts", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            // alert("test");
            $('.modal-container').load('./ifta/fuel_receipts_modal.php', function (result) {
                $('#Fuel_Receipt').modal({show: true});
            });
        },
    });
});

$(document).on("click", "#add_ifta_card", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./master/ifta_card_category_modal.php', function (result) {
                $('#Ifta_Card_Category').modal({show: true});
            });
        },
    });
});

$(document).on("click", "#add_toll", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./ifta/add_toll_modal.php', function (result) {
                $('#Add_Toll').modal({show: true});
            });
        },
    });
});

// Add Verify Treep Function
$(document).on("click", "#verify_treep", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./ifta/verify_treep_model.php', function (result) {
                $('#verified').modal({show: true});
            });
        },
    });
});

$(document).on('click', '#verify_trip', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./ifta/verifyTrip.php', function (result) {
                $('#verifyTrip').modal({show: true});
            });
        }
    });
});