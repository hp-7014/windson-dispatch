$(document).ready(function () {

    $(".driver").css("display", "none");
    $(".owner").css("display", "none");

});
//--------------- accounting start --------------
$(document).on('click', '#accountingModal', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.account-container').load('./account/accounting_manager_modal.php', function (result) {
                $('#accounting_modal').modal({show: true});
            });
        }
    });
});
//--------------- accounting end --------------

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

// edit driver detail
function editDriver(id) {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.driverEdit-container').load('./admin/driver_edit_modal.php?id='+id, function (result) {
                $('#edit_Driver').modal({show: true});
            });

            setTimeout(function () {
                getDriverValues(id);
            }, 300);
        }
    });
}

// edit customer detail
function editCustomer(id) {
    alert(id);
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.customer-container').load('./admin/customer_edit_modal.php?id='+id, function (result) {
                $('#edit_customer').modal({show: true});
            });
        }
    });
}

// edit External Carrier detail
function editExternalCarrier(id) {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.carrier-container').load('./admin/external_edit_modal.php?id='+id, function (result) {
                $('#edit_External').modal({show: true});
            });
        }
    });
}

$(document).on('click', '#Add_Office', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.office-container').load('./master/office_modal_sub.php', function (result) {
                $('#addOffice').modal({show: true});
            });
        }
    });
});

$(document).on('click', '#AddBank', function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.bank-container').load('./admin/bank_modal_sub.php', function (result) {
                $('#add_bank').modal({show: true});
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
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });
        }
    });
});


$(document).on("click", "#currency_setting", function () {

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
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
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
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });
        }
    });
});
$(document).on('click', '#AddCurrency', function () {

    $.ajax({
        type: 'POST',
        success: function (data) {

            $('.currency-container').load('./master/add_currency_sub.php', function (result) {
                $('#currencysub').modal({show: true});
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
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
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
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });
        }
    });
});
$(document).on('click', '#AddDriver', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.driver-container').load('./admin/driver_modal_sub.php', function (result) {
                $('#add_Driver').modal({show: true});
                $(function () {
                    $('[data-toggle="tooltip"]').tooltip()
                });
            });
        }
    });
});

$(document).on('click', '#AddOwnerOperator', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.owner-container').load('./admin/owner_operator_modal_sub.php', function (result) {
                $('#Owner_operator').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#AddTruck', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.truck-container').load('./admin/add_truck_modal_sub.php', function (result) {
                $('#add_Truck').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#AddTrailer', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.trailer-container-admin').load('./admin/add_trailer_modal_sub.php', function (result) {
                $('#add_Trailer').modal({show: true});
            });
        }
    });
});

$(document).on('click', '#AddConsignee', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.consignee-container').load('./admin/consignee_modal_sub.php', function (result) {
                $('#add_consignee').modal({show: true});
            });
        }
    });
});
// $(document).on('click', '#AddActiveLoad', function () {
//     $.ajax({
//         type: 'POST',
//         success: function (data) {
//           //$('#mainbody').toggleClass('modal-open');
//            //$("#mainbody").addClass("modal-open");
//            $('#active_new').bind('mouseenter touchstart', function(e) {
//                 var current = $(window).scrollTop();
//                 $(window).scroll(function(event) {
//                     $(window).scrollTop(current);
//                 });
//             });
//             $('#active_new').bind('mouseleave touchend', function(e) {
//                 $(window).off('scroll');
//             });
//             $('.activeload-container').load('active_load.php', function (result) {
//                 $('#active_new').modal({show: true});
//             });
//         }
//     });
// });

$(document).on('click', '#AddFactoring', function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.factoring-container').load('./admin/add_factoring_modal_sub.php', function (result) {
                $('#add_factoring').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#AddCustomBroker', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.custombroker-container').load('./admin/add_custom_broker_sub.php', function (result) {
                $('#Add_Customs_Broker').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#AddOwnerOperator', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.owner-container').load('./admin/owner_operator_modal_sub.php', function (result) {
                $('#Owner_operator').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#AddShipper', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.shipper-container').load('./admin/shipper_modal_sub.php', function (result) {
                $('#add_shipper').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#add_driver_currency_modal', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.owner-container').load('./master/add_currency_sub.php', function (result) {
                $('#currencysub').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#driverpaybutton', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.owner-container').load('./admin/driver_pay_info.php', function (result) {
                $('#driverpayinfo').modal({show: true});
            });
            setTimeout(function () {
                addPayFields();
            }, 300);
        }
    });
});

$(document).on('click', '#recurrenceplus', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.owner-container').load('./admin/addRecurrence.php', function (result) {
                $('#addRecurrence').modal({show: true});
            });
            setTimeout(function () {
                addRecurrenceFields();
            }, 300);
        }
    });
});

$(document).on('click', '#recurrenceminus', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.owner-container').load('./admin/substractRecurrence.php', function (result) {
                $('#substractRecurrence').modal({show: true});
            });
            setTimeout(function () {
                Recurrence_Fields();
            }, 300);
        }
    });
});

$(document).on('click', '#addCreditCard', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.creditcard-container').load('./admin/credit_card_modal_sub.php', function (result) {
                $('#Add_CreditCard').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#addSubCreditCard', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.subcreditcard-container').load('./admin/sub_credit_card_modal_sub.php', function (result) {
                $('#add_sub_credit').modal({show: true});
            });
        }
    });
});

$(document).on('click', '#addTruckType', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.trucktype-container').load('./master/truck_type_modal_sub.php', function (result) {
                $('#Add_Truck_Type').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#addEquipmentType', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.equipment-container').load('./master/equipment_type_modal_sub.php', function (result) {
                $('#Add_Equipment_Type').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#addTrailerType', function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.trailer-container1').load('./master/trailer_type_modal_sub.php', function (result) {
                $('#Add_Trailer_Type').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#Fix_Pay_Category', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.fixpay-container').load('./master/fixpay_modal_sub.php', function (result) {
                $('#addFixPay').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#Add_Payment_Terms', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.payment-container').load('./master/paymentTerm_modal_sub.php', function (result) {
                $('#AddPayment').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#Active_Load_Type', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.loadtype-container').load('./master/loadtype_modal_sub.php', function (result) {
                $('#addLoad_Type').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#Add_Ifta_Card', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.iftacard-category-container').load('./master/iftacard_modal_sub.php', function (result) {
                $('#addIftaCard').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#Add_Bank_Debit_Category', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.masterbank-container').load('./master/debitcategory_modal_sub.php', function (result) {
                $('#Add_Debit_Category').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#addCategory', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.masterbank-container').load('./master/creditcategory_modal_sub.php', function (result) {
                $('#addCredit_Category').modal({show: true});
            });
        }
    });
});
$(document).on('click', '#creditCard', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.masterbank-container').load('./master/creditcard_modal_sub.php', function (result) {
                $('#addCreditcard').modal({show: true});
            });
        }
    });
});

$(document).on('click', '.modaldriverEdit', function () {
    $('#edit_Driver').modal('hide');
});
$(document).on('click', '.modalCreditcard', function () {
    $('#addCreditcard').modal('hide');
});
$(document).on('click', '.modalCreditcategory', function () {
    $('#addCredit_Category').modal('hide');
});
$(document).on('click', '.modalDebitCategory', function () {
    $('#Add_Debit_Category').modal('hide');
});
$(document).on('click', '.modalIftaCard', function () {
    $('#addIftaCard').modal('hide');
});
$(document).on('click', '.modalCompany', function () {
    $('#add_company').modal('hide');
});
$(document).on('click', '.modalLoadType', function () {
    $('#addLoad_Type').modal('hide');
});
$(document).on('click', '.modalPayment', function () {
    $('#AddPayment').modal('hide');
});
$(document).on('click', '.modalOfficeSub', function () {
    $('#addOffice').modal('hide');
});
$(document).on('click', '.modalFixPay', function () {
    $('#addFixPay').modal('hide');
});
$(document).on('click', '.modalTrailerType', function () {
    $('#Add_Trailer_Type').modal('hide');
});
$(document).on('click', '.modalEquipmentType', function () {
    $('#Add_Equipment_Type').modal('hide');
});
$(document).on('click', '.modalTruckType', function () {
    $('#Add_Truck_Type').modal('hide');
});
$(document).on('click', '.modalSubCredit', function () {
    $('#add_sub_credit').modal('hide');
});
$(document).on('click', '.modalCurrrency', function () {
    $('#currencysub').modal('hide');
});

    $(document).on('click', '.modalCompany', function () {
        $('#add_company').modal('hide');
    });
    $(document).on('click', '.modalupdatetable', function () {
        $('#updateTable').modal('hide');
    });
    $(document).on('click', '.modalOtherDriver', function () {
        $('#driverOtherCharges').modal('hide');
    });
    $(document).on('click', '.modalOtherOwner', function () {
        $('#ownerOtherCharges').modal('hide');
    });

    $(document).on('click', '.modalStartLocation', function () {
        $('#addstartlocation').modal('hide');
    });
    $(document).on('click', '.modalEndLocation', function () {
        $('#endlocationmodal').modal('hide');
    });

$(document).on('click', '.modalCustomer', function () {
    $('#add_customer').modal('hide');
});

$(document).on('click', '.modalCarrier', function () {
    $('#add_External').modal('hide');
});

$(document).on('click', '.modalDriver', function () {
    $('#add_Driver').modal('hide');
});
$(document).on('click', '.modalOwner', function () {
    $('#Owner_operator').modal('hide');
});
$(document).on('click', '.modalTruck', function () {
    $('#add_Truck').modal('hide');
});
$(document).on('click', '.modalTrailer', function () {
    $('#add_Trailer').modal('hide');
});
$(document).on('click', '.modalShipper', function () {
    $('#add_shipper').modal('hide');
});
$(document).on('click', '.modalConsignee', function () {
    $('#add_consignee').modal('hide');
});
$(document).on('click', '.modalOther', function () {
    $('#otherCharges').modal('hide');
});
$(document).on('click', '.modalFactoring', function () {
    $('#add_factoring').modal('hide');
});
$(document).on('click', '.modalBroker', function () {
    $('#Add_Customs_Broker').modal('hide');
});

$(document).on('click', '.modalCurrency', function () {
    $('#currency').modal('hide');
});

$(document).on('click', '.modalOtherCarrier', function () {
    $('#carrierOtherCharges').modal('hide');
});

$(document).on('click', '.modalDriverPay', function () {
    $('#driverpayinfo').modal('hide');
});
$(document).on('click', '.modalrecurrenceadd', function () {
    $('#addRecurrence').modal('hide');
});
$(document).on('click', '.modalrecurrencesubstarct', function () {
    $('#substractRecurrence').modal('hide');
});


$(document).on('click', '.modalDriver', function () {
    $('#add_Driver').modal('hide');
});
$(document).on('click', '.modalOwner', function () {
    $('#Owner_operator').modal('hide');
});
$(document).on('click', '.modalTruck', function () {
    $('#add_Truck').modal('hide');
});
$(document).on('click', '.modalTrailer', function () {
    $('#add_Trailer').modal('hide');
});
$(document).on('click', '.modalShipper', function () {
    $('#add_shipper').modal('hide');
});
$(document).on('click', '.modalConsignee', function () {
    $('#add_consignee').modal('hide');
});
$(document).on('click', '.modalOther', function () {
    $('#otherCharges').modal('hide');
});
$(document).on('click', '.modalBank', function () {
    $('#add_bank').modal('hide');
});
$(document).on('click', '.modalCreditCard', function () {
    $('#Add_CreditCard').modal('hide');
});

// edit modal close
$(document).on('click', '.modalCustomerEdit', function () {
    $('#edit_customer').modal('hide');
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

$(document).on('click', '#bankadmin', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {

            $('.modal-container').load('./admin/bank_admin_modal.php', function (result) {
                $('#bank').modal({show: true});
            })
        }
    });
});

$(document).on('click', '#credit_card', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./admin/credit_card_modal.php', function (result) {
                $('#CreditCard').modal({show: true});
            })
        }
    });
});

$(document).on('click', '#sub_credit_card', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {

            $('.modal-container').load('./admin/sub_credit_card_modal.php', function (result) {
                $('#Credit_Card').modal({show: true});
            })
        }
    });
});

$(document).on('click', '#custom_broker', function () {
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
$(document).on('click', '#addCarrier', function () {
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
$(document).on('click', '#active_load_button', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./activeLoad/active_load_modal.php', function (result) {
                $('#new_active_load1').modal({show: true});
            })
        }
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

//--------------------IFTA Start----------------------//
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
// Payment Registration bank
$(document).on("click", "#Payment_Reg", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.modal-container').load('./account/Payment.php', function (result) {
                $('#Payment_Registration').modal({show: true});
            });
        },
    });
});