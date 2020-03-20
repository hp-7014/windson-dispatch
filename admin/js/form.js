// //Driver Recurrence +
// var installmentCategory = [];
// var installmentType = [];
// var amount = [];
// var installment = [];
// var startNo = [];
// var startDate = [];
// var internalNote = [];
var recurrenceAddLength = '';
var recurrenceSubLength = '';
//
// var installment_Category = [];
// var installment_Type = [];
// var amount_recurrence = [];
// var installment_sub = [];
// var start_No = [];
// var start_Date = [];
// var internal_Note = [];

// driver pay variable
var loadedmiles = '';
var emptymiles = '';
var pickrate = '';
var pickstart = '';
var droprate = '';
var dropstart = '';
var driverTarp = '';

// recurence add
var AddinstallmentCategoryStore = [];
var AddinstallmentTypeStore = [];
var AddamountStore = [];
var AddinstallmentStore = [];
var AddstartNoStore = [];
var AddstartDateStore = [];
var AddinternalNoteStore = [];

// recurrence subtract
var SubinstallmentCategory_Store = [];
var SubinstallmentType_Store = [];
var Subamount_Store = [];
var Subinstallment_Store = [];
var SubstartNo_Store = [];
var SubstartDate_Store = [];
var SubinternalNote_Store = [];

// recurence add
var installmentCategoryStore = [];
var installmentTypeStore = [];
var amountStore = [];
var installmentStore = [];
var startNoStore = [];
var startDateStore = [];
var internalNoteStore = [];

// recurrence subtract
var installmentCategory_Store = [];
var installmentType_Store = [];
var amount_Store = [];
var installment_Store = [];
var startNo_Store = [];
var startDate_Store = [];
var internalNote_Store = [];

//----------Shipper Start-------------
// add shipper
function addShipper() {
    var companyID = document.getElementById('companyID').value;
    var shipperName = document.getElementById('shipperName').value;
    var shipperAddress = document.getElementById('shipperAddress').value;
    var shipperLocation = document.getElementById('shipperLocation').value;
    var shipperPostal = document.getElementById('shipperPostal').value;
    var shipperContact = document.getElementById('shipperContact').value;
    var shipperContact = document.getElementById('shipperContact').value;
    var shipperEmail = document.getElementById('shipperEmail').value;
    var shipperTelephone = document.getElementById('shipperTelephone').value;
    var shipperExt = document.getElementById('shipperExt').value;
    var shipperTollFree = document.getElementById('shipperTollFree').value;
    var shipperTollFree = document.getElementById('shipperTollFree').value;
    var shipperFax = document.getElementById('shipperFax').value;
    var shipperShippingHours = document.getElementById('shipperShippingHours').value;
    var shipperAppointments = document.getElementById('shipperAppointments').value;
    var shipperIntersaction = document.getElementById('shipperIntersaction').value;
    var shipperASconsignee = document.getElementsByName('shipperASconsignee');
    var shipperStatus = document.getElementsByName('shipperStatus');
    var shippingNotes = document.getElementById('shippingNotes').value;
    var internalNotes = document.getElementById('internalNotes').value;

    for (var i = 0; i < shipperASconsignee.length; i++) {
        if (shipperASconsignee[i].checked) {
            var asConsignee = 1;
            break;
        } else {
            var asConsignee = 0;
            break;
        }
    }

    for (var i = 0; i < shipperStatus.length; i++) {
        if (shipperStatus[i].checked) {
            var status = shipperStatus[i].value;
            break;
        }
    }
    if (val_shipperName(shipperName)) {
        if (val_shipperAddress(shipperAddress)) {
            if (val_shipperLocation(shipperLocation)) {
                if (val_shipperPostal(shipperPostal)) {
                    if (val_shipperContact(shipperContact)) {
                        if (val_shipperEmail(shipperEmail)) {
                            if (val_shipperTelephone(shipperTelephone)) {
                                if (val_shipperExt(shipperExt)) {
                                    if (val_shipperTollFree(shipperTollFree)) {
                                        if (val_shipperFax(shipperFax)) {
                                            if (val_shipperShippingHours(shipperShippingHours)) {
                                                if (val_shipperAppointments(shipperAppointments)) {
                                                    if (val_shipperIntersaction(shipperIntersaction)) {
                                                        if (val_shippingNotes(shippingNotes)) {
                                                            if (val_internalNotes(internalNotes)) {
                                                                $.ajax({
                                                                    url: 'admin/shipper_driver.php?type=' + 'add_shipper',
                                                                    type: 'POST',
                                                                    data: {
                                                                        companyID: companyID,
                                                                        shipperName: shipperName,
                                                                        shipperAddress: shipperAddress,
                                                                        shipperLocation: shipperLocation,
                                                                        shipperPostal: shipperPostal,
                                                                        shipperContact: shipperContact,
                                                                        shipperEmail: shipperEmail,
                                                                        shipperTelephone: shipperTelephone,
                                                                        shipperExt: shipperExt,
                                                                        shipperTollFree: shipperTollFree,
                                                                        shipperFax: shipperFax,
                                                                        shipperShippingHours: shipperShippingHours,
                                                                        shipperAppointments: shipperAppointments,
                                                                        shipperIntersaction: shipperIntersaction,
                                                                        shipperStatus: status,
                                                                        shippingNotes: shippingNotes,
                                                                        internalNotes: internalNotes,
                                                                        asConsignee: asConsignee
                                                                    },
                                                                    success: function (data) {
                                                                        var companyid = $('#companyid').val();
                                                                        database.ref('shipper').child(companyid).set({
                                                                            data: randomString(),
                                                                        });
                                                                        swal('Success', data, 'success');
                                                                        $('#add_shipper').modal('hide');
                                                                    }
                                                                });
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

//update currency table
var shipper_path = "shipper/";
var shipper_path1 = $('#companyid').val();
var shipper_data = shipper_path1.toString();
var shipper_test = shipper_path + shipper_data;

database.ref(shipper_test).on('child_added', function (data) {
    updateShipperTable();
});
database.ref(shipper_test).on('child_changed', function (data) {
    updateShipperTable();
});
database.ref(shipper_test).on('child_removed', function (data) {
    updateShipperTable();
});

// update table fields
function updateShipperTable() {
    var shipperBody = document.getElementById('shipperBody');
    var shipperList = document.getElementById('shipper');
    $.ajax({
        url: 'admin/utils/getShipper.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split('^');
            if (shipperBody != null) {
                shipperBody.innerHTML = res[0];
            }

            if (shipperList != null) {
                shipperList.innerHTML = res[1];
            }

        },
    });
}

//Import shipper
function importShipper() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'admin/shipper_driver.php?type=' + 'importShipper',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}

// Export Excel function for Payment Terms
function exportShipper(id) {

    $.ajax({
        url: 'admin/shipper_driver.php?type=' + 'exportShipper',
        data: {companyid: id},
        type: 'POST',
        success: function (data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//edit function
function updateShipper(column, id) {
    var data = $('#shipper_table').find('input[type="text"],textarea').val();

    var companyId = document.getElementById('companyid').value;

    $.ajax({
        url: 'admin/shipper_driver.php?type=' + 'edit_shipper',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('shipper').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// delete function
function deleteShipper(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/shipper_driver.php?type=' + 'delete_shipper',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('shipper').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, 'success');
            }
        });
    }
}

//----------Shipper Start-------------

//----------Consignee Start-----------
function addConsignee() {
    var companyID = document.getElementById('companyId').value;
    var consigneeName = document.getElementById('consigneeName').value;
    var consigneeAddress = document.getElementById('consigneeAddress').value;
    var consigneeLocation = document.getElementById('consigneeLocation').value;
    var consigneePostal = document.getElementById('consigneePostal').value;
    var consigneeContact = document.getElementById('consigneeContact').value;
    var consigneeEmail = document.getElementById('consigneeEmail').value;
    var consigneeTelephone = document.getElementById('consigneeTelephone').value;
    var consigneeExt = document.getElementById('consigneeExt').value;
    var consigneeTollFree = document.getElementById('consigneeTollFree').value;
    var consigneeFax = document.getElementById('consigneeFax').value;
    var consigneeReceiving = document.getElementById('consigneeReceiving').value;
    var consigneeAppointments = document.getElementById('consigneeAppointments').value;
    var consigneeIntersaction = document.getElementById('consigneeIntersaction').value;
    var consignASshipper = document.getElementsByName('consignASshipper');
    var consigneeStatus = document.getElementsByName('consigneeStatus');
    var consigneeRecivingNote = document.getElementById('consigneeRecivingNote').value;
    var consigneeInternalNote = document.getElementById('consigneeInternalNote').value;

    for (var i = 0; i < consignASshipper.length; i++) {
        if (consignASshipper[i].checked) {
            var asShipper = 1;
            break;
        } else {
            var asShipper = 0;
            break;
        }
    }

    for (var i = 0; i < consigneeStatus.length; i++) {
        if (consigneeStatus[i].checked) {
            var status = consigneeStatus[i].value;
            break;
        }
    }

    if (val_consigneeName(consigneeName)) {
        if (val_consigneeAddress(consigneeAddress)) {
            if (val_consigneeLocation(consigneeLocation)) {
                if (val_consigneePostal(consigneePostal)) {
                    if (val_consigneeContact(consigneeContact)) {
                        if (val_consigneeEmail(consigneeEmail)) {
                            if (val_consigneeTelephone(consigneeTelephone)) {
                                if (val_consigneeExt(consigneeExt)) {
                                    if (val_consigneeTollFree(consigneeTollFree)) {
                                        if (val_consigneeFax(consigneeFax)) {
                                            if (val_consigneeReceiving(consigneeReceiving)) {
                                                if (val_consigneeAppointments(consigneeAppointments)) {
                                                    if (val_consigneeIntersaction(consigneeIntersaction)) {
                                                        if (val_consigneeRecivingNote(consigneeRecivingNote)) {
                                                            if (val_consigneeInternalNote(consigneeInternalNote)) {
                                                                $.ajax({
                                                                    url: 'admin/consignee_driver.php?type=' + 'add_consignee',
                                                                    type: 'POST',
                                                                    data: {
                                                                        companyID: companyID,
                                                                        consigneeName: consigneeName,
                                                                        consigneeAddress: consigneeAddress,
                                                                        consigneeLocation: consigneeLocation,
                                                                        consigneePostal: consigneePostal,
                                                                        consigneeContact: consigneeContact,
                                                                        consigneeEmail: consigneeEmail,
                                                                        consigneeTelephone: consigneeTelephone,
                                                                        consigneeExt: consigneeExt,
                                                                        consigneeTollFree: consigneeTollFree,
                                                                        consigneeFax: consigneeFax,
                                                                        consigneeReceiving: consigneeReceiving,
                                                                        consigneeAppointments: consigneeAppointments,
                                                                        consigneeIntersaction: consigneeIntersaction,
                                                                        consigneeStatus: status,
                                                                        consigneeRecivingNote: consigneeRecivingNote,
                                                                        consigneeInternalNote: consigneeInternalNote,
                                                                        asShipper: asShipper,
                                                                    },
                                                                    success: function (data) {
                                                                        var companyid = $('#companyid').val();
                                                                        database.ref('consignee').child(companyid).set({
                                                                            data: randomString(),
                                                                        });
                                                                        swal('Success', data, 'success');
                                                                        $('#add_consignee').modal('hide');
                                                                    }
                                                                });
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

//update currency table
var consignee_path = "consignee/";
var consignee_path1 = $('#companyid').val();
var consignee_data = consignee_path1.toString();
var consignee_test = consignee_path + consignee_data;

database.ref(consignee_test).on('child_added', function (data) {
    updateConsigneeTable();
});
database.ref(consignee_test).on('child_changed', function (data) {
    updateConsigneeTable();
});
database.ref(consignee_test).on('child_removed', function (data) {
    updateConsigneeTable();
});


// update table fields
function updateConsigneeTable() {
    var consigneeBody = document.getElementById('consigneeBody');
    var consigneeList = document.getElementById('consigneee');
    $.ajax({
        url: 'admin/utils/getConsignee.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split('^');
            if (consigneeBody != null) {
                consigneeBody.innerHTML = res[0];
            }

            if (consigneeList != null) {
                consigneeList.innerHTML = res[1];
            }

        },
    });
}

//Import consignee
function importConsignee() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'admin/consignee_driver.php?type=' + 'importConsignee',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}

// Export Excel
function exportConsignee(id) {

    $.ajax({
        url: 'admin/consignee_driver.php?type=' + 'exportConsignee',
        data: {companyid: id},
        type: 'POST',
        success: function (data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//edit function
function updateConsignee(column, id) {
    var data = $('#consignee_table').find('input[type="text"],textarea').val();

    var companyId = $('#companyid').val();
    $.ajax({
        url: 'admin/consignee_driver.php?type=' + 'edit_consignee',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('consignee').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// delete function
function deleteConsignee(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/consignee_driver.php?type=' + 'delete_consignee',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('consignee').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, 'success');
            }
        });
    }
}

//----------Consignee End-------------

//----------Customer Start------------
// shown M.C. Fields
function showFields() {
    $('#mcShow').toggle();
}

// step form function
function toggle() {

    var custName = document.getElementById('custName').value;
    var custAddress = document.getElementById('custAddress').value;
    var custLocation = document.getElementById('custLocation').value;
    var custZip = document.getElementById('custZip').value;

    var billingAddress = document.getElementById('billingAddress').value;
    var billingLocation = document.getElementById('billingLocation').value;
    var billingZip = document.getElementById('billingZip').value;
    var primaryContact = document.getElementById('primaryContact').value;
    var custTelephone = document.getElementById('custTelephone').value;
    var custExt = document.getElementById('custExt').value;
    var custEmail = document.getElementById('custEmail').value;
    var custFax = document.getElementById('custFax').value;
    var billingContact = document.getElementById('billingContact').value;
    var billingEmail = document.getElementById('billingEmail').value;
    var billingTelephone = document.getElementById('billingTelephone').value;
    var billingExt = document.getElementById('billingExt').value;
    var URS = document.getElementById('URS').value;

    if (val_custName(custName)) {
        if (val_custAddress(custAddress)) {
            if (val_custLocation(custLocation)) {
                if (val_custZip(custZip)) {
                    if (val_billingAddress(billingAddress)) {
                        if (val_billingLocation(billingLocation)) {
                            if (val_billingZip(billingZip)) {
                                if (val_primaryContact(primaryContact)) {
                                    if (val_custTelephone(custTelephone)) {
                                        if (val_custExt(custExt)) {
                                            if (val_custEmail(custEmail)) {
                                                if (val_custFax(custFax)) {
                                                    if (val_billingContact(billingContact)) {
                                                        if (val_billingEmail(billingEmail)) {
                                                            if (val_billingTelephone(billingTelephone)) {
                                                                if (val_billingExt(billingExt)) {
                                                                    if (val_URS(URS)) {
                                                                        $("#home").toggleClass("show");
                                                                        $("#home").toggleClass("active");
                                                                        $("#profile").toggleClass("show");
                                                                        $("#profile").toggleClass("active");
                                                                        $("#home-tab").toggleClass("active");
                                                                        $("#profile-tab").toggleClass("active");

                                                                        if ($("#home-tab").attr("aria-selected") === 'true') {
                                                                            $("#home-tab").attr("aria-selected", "false");
                                                                        } else {
                                                                            $("#home-tab").attr("aria-selected", "true");
                                                                        }

                                                                        if ($("#profile-tab").attr("aria-selected") === 'true') {
                                                                            $("#profile-tab").attr("aria-selected", "false");
                                                                        } else {
                                                                            $("#profile-tab").attr("aria-selected", "true");
                                                                        }

                                                                        $("#home-title").toggleClass("show");
                                                                        $("#profile-title").toggleClass("show");
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function setBillingDetail(val) {
    var checkbox = document.getElementById('customCheck1');
    if (checkbox.checked == true) {
        document.getElementById('billingAddress').value = document.getElementById('custAddress').value;
        document.getElementById('billingLocation').value = document.getElementById('custLocation').value;
        document.getElementById('billingZip').value = document.getElementById('custZip').value;
    } else {
        document.getElementById('billingAddress').value = "";
        document.getElementById('billingLocation').value = "";
        document.getElementById('billingZip').value = "";
    }
}

//--- customer edit
// step form function
function toggle1() {

    var custName = document.getElementById('custNameEdit').value;
    var custAddress = document.getElementById('custAddressEdit').value;
    var custLocation = document.getElementById('custLocationEdit').value;
    var custZip = document.getElementById('custZipEdit').value;

    var billingAddress = document.getElementById('billingAddressEdit').value;
    var billingLocation = document.getElementById('billingLocationEdit').value;
    var billingZip = document.getElementById('billingZipEdit').value;
    var primaryContact = document.getElementById('primaryContactEdit').value;
    var custTelephone = document.getElementById('custTelephoneEdit').value;
    var custExt = document.getElementById('custExtEdit').value;
    var custEmail = document.getElementById('custEmailEdit').value;
    var custFax = document.getElementById('custFaxEdit').value;
    var billingContact = document.getElementById('billingContactEdit').value;
    var billingEmail = document.getElementById('billingEmailEdit').value;
    var billingTelephone = document.getElementById('billingTelephoneEdit').value;
    var billingExt = document.getElementById('billingExtEdit').value;
    var URS = document.getElementById('URSEdit').value;

    if (val_custName(custName)) {
        if (val_custAddress(custAddress)) {
            if (val_custLocation(custLocation)) {
                if (val_custZip(custZip)) {
                    if (val_billingAddress(billingAddress)) {
                        if (val_billingLocation(billingLocation)) {
                            if (val_billingZip(billingZip)) {
                                if (val_primaryContact(primaryContact)) {
                                    if (val_custTelephone(custTelephone)) {
                                        if (val_custExt(custExt)) {
                                            if (val_custEmail(custEmail)) {
                                                if (val_custFax(custFax)) {
                                                    if (val_billingContact(billingContact)) {
                                                        if (val_billingEmail(billingEmail)) {
                                                            if (val_billingTelephone(billingTelephone)) {
                                                                if (val_billingExt(billingExt)) {
                                                                    if (val_URS(URS)) {
                                                                        $("#home").toggleClass("show");
                                                                        $("#home").toggleClass("active");
                                                                        $("#profile").toggleClass("show");
                                                                        $("#profile").toggleClass("active");
                                                                        $("#home-tab").toggleClass("active");
                                                                        $("#profile-tab").toggleClass("active");

                                                                        if ($("#home-tab").attr("aria-selected") === 'true') {
                                                                            $("#home-tab").attr("aria-selected", "false");
                                                                        } else {
                                                                            $("#home-tab").attr("aria-selected", "true");
                                                                        }

                                                                        if ($("#profile-tab").attr("aria-selected") === 'true') {
                                                                            $("#profile-tab").attr("aria-selected", "false");
                                                                        } else {
                                                                            $("#profile-tab").attr("aria-selected", "true");
                                                                        }

                                                                        $("#home-title").toggleClass("show");
                                                                        $("#profile-title").toggleClass("show");
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

function setBillingDetail1(val) {
    var checkbox = document.getElementById('customCheck1');
    if (checkbox.checked == true) {
        document.getElementById('billingAddressEdit').value = document.getElementById('custAddressEdit').value;
        document.getElementById('billingLocationEdit').value = document.getElementById('custLocationEdit').value;
        document.getElementById('billingZipEdit').value = document.getElementById('custZipEdit').value;
    } else {
        document.getElementById('billingAddressEdit').value = document.getElementById('billingAddressEdit').value;
        document.getElementById('billingLocationEdit').value = document.getElementById('billingLocationEdit').value;
        document.getElementById('billingZipEdit').value = document.getElementById('billingZipEdit').value;
    }
}

function EditCustomerDetail() {
    var customerUpdateID = document.getElementById('customerUpdateID').value;
    var custName = document.getElementById('custNameEdit').value;
    var custAddress = document.getElementById('custAddressEdit').value;
    var custLocation = document.getElementById('custLocationEdit').value;
    var custZip = document.getElementById('custZipEdit').value;
    var sameAsMailingAddress = document.getElementsByName('sameAsMailingAddress');
    var billingAddress = document.getElementById('billingAddressEdit').value;
    var billingLocation = document.getElementById('billingLocationEdit').value;
    var billingZip = document.getElementById('billingZipEdit').value;
    var primaryContact = document.getElementById('primaryContactEdit').value;
    var custTelephone = document.getElementById('custTelephoneEdit').value;
    var custExt = document.getElementById('custExtEdit').value;
    var custEmail = document.getElementById('custEmailEdit').value;
    var custFax = document.getElementById('custFaxEdit').value;
    var billingContact = document.getElementById('billingContactEdit').value;
    var billingEmail = document.getElementById('billingEmailEdit').value;
    var billingTelephone = document.getElementById('billingTelephoneEdit').value;
    var billingExt = document.getElementById('billingExtEdit').value;
    var URS = document.getElementById('URSEdit').value;

    var blacklisted = "on";
    if (document.getElementById('customCheck2').checked == true) {
        blacklisted = "on";
    } else {
        blacklisted = "off";
    }

    if (document.getElementById('customCheck7').checked == true) {
        var AsShipper = 1;
    } else {
        var AsShipper = 0;
    }

    if (document.getElementById('customCheck8').checked == true) {
        var AsConsignee = 1;
    } else {
        var AsConsignee = 0;
    }

    var MC = document.getElementById('MCEdit').value;

    var currencySetting_1 = document.getElementById('currencySetting').value;
    var currencySetting1 = currencySetting_1.split(")");
    var currencySetting = currencySetting1[0];

    var paymentTerms_1 = document.getElementById('paymentTerms').value;
    var paymentTerms1 = paymentTerms_1.split(")");
    var paymentTerms = paymentTerms1[0];

    var creditLimit = document.getElementById('creditLimitEdit').value;

    var salesRep_1 = document.getElementById('salesRep').value;
    var salesRep1 = salesRep_1.split(")");
    var salesRep = salesRep1[0];

    var factoringCompany_1 = document.getElementById('factoringCompany').value;
    var factoringCompany1 = factoringCompany_1.split(")");
    var factoringCompany = factoringCompany1[0];

    var federalID = document.getElementById('federalIDEdit').value;
    var workerComp = document.getElementById('workerCompEdit').value;
    var websiteURL = document.getElementById('websiteURLEdit').value;

    var numberOninvoice = "on";
    if (document.getElementById('customCheck5').checked == true) {
        numberOninvoice = "on";
    } else {
        numberOninvoice = "off";
    }

    var customerRate = "on";
    if (document.getElementById('customCheck6').checked == true) {
        customerRate = "on";
    } else {
        customerRate = "off";
    }

    var internalNotes = document.getElementById('internalNotesEdit').value;

    if (val_currencySetting(currencySetting)) {
        if (val_paymentTerms(paymentTerms)) {
            if (val_creditLimit(creditLimit)) {
                if (val_salesRep(salesRep)) {
                    if (val_factoringCompany(factoringCompany)) {
                        if (val_federalID(federalID)) {
                            if (val_workerComp(workerComp)) {
                                if (val_websiteURL(websiteURL)) {
                                    if (val_internalNotes(internalNotes)) {
                                        $.ajax({
                                            url: 'admin/customer_driver.php?type=editCustomerDetail',
                                            type: 'POST',
                                            data: {
                                                customerUpdateID: customerUpdateID,
                                                custName: custName,
                                                custAddress: custAddress,
                                                custLocation: custLocation,
                                                custZip: custZip,
                                                billingAddress: billingAddress,
                                                billingLocation: billingLocation,
                                                billingZip: billingZip,
                                                primaryContact: primaryContact,
                                                custTelephone: custTelephone,
                                                custExt: custExt,
                                                custEmail: custEmail,
                                                custFax: custFax,
                                                billingContact: billingContact,
                                                billingEmail: billingEmail,
                                                billingTelephone: billingTelephone,
                                                billingExt: billingExt,
                                                URS: URS,
                                                currencySetting: currencySetting,
                                                paymentTerms: paymentTerms,
                                                creditLimit: creditLimit,
                                                salesRep: salesRep,
                                                factoringCompany: factoringCompany,
                                                federalID: federalID,
                                                workerComp: workerComp,
                                                websiteURL: websiteURL,
                                                internalNotes: internalNotes,
                                                MC: MC,

                                                blacklisted: blacklisted,
                                                AsShipper: AsShipper,
                                                AsConsignee: AsConsignee,
                                                numberOninvoice: numberOninvoice,
                                                customerRate: customerRate,
                                            },
                                            success: function (data) {
                                                // var companyid = $('#companyid').val();
                                                // database.ref('customer').child(companyid).set({
                                                //     data: randomString(),
                                                // });
                                                swal('Success', data, 'success');
                                                $('#edit_customer').modal('hide');
                                            }
                                        });
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

// add customer
function addCustomer() {
    var companyId = document.getElementById('companyId').value;
    var custName = document.getElementById('custName').value;
    var custAddress = document.getElementById('custAddress').value;
    var custLocation = document.getElementById('custLocation').value;
    var custZip = document.getElementById('custZip').value;
    var sameAsMailingAddress = document.getElementsByName('sameAsMailingAddress');
    var billingAddress = document.getElementById('billingAddress').value;
    var billingLocation = document.getElementById('billingLocation').value;
    var billingZip = document.getElementById('billingZip').value;
    var primaryContact = document.getElementById('primaryContact').value;
    var custTelephone = document.getElementById('custTelephone').value;
    var custExt = document.getElementById('custExt').value;
    var custEmail = document.getElementById('custEmail').value;
    var custFax = document.getElementById('custFax').value;
    var billingContact = document.getElementById('billingContact').value;
    var billingEmail = document.getElementById('billingEmail').value;
    var billingTelephone = document.getElementById('billingTelephone').value;
    var billingExt = document.getElementById('billingExt').value;
    var URS = document.getElementById('URS').value;
    var MC = document.getElementById('MC').value;

    var currencySetting = document.getElementById('currencySetting').value;

    var paymentTerms_1 = document.getElementById('paymentTerms').value;
    var paymentTerms1 = paymentTerms_1.split(")");
    var paymentTerms = paymentTerms1[0];

    var creditLimit = document.getElementById('creditLimit').value;

    var salesRep_1 = document.getElementById('salesRep').value;
    var salesRep1 = salesRep_1.split(")");
    var salesRep = salesRep1[0];

    var factoringCompany_1 = document.getElementById('factoringCompany').value;
    var factoringCompany1 = factoringCompany_1.split(")");
    var factoringCompany = factoringCompany1[0];

    var federalID = document.getElementById('federalID').value;
    var workerComp = document.getElementById('workerComp').value;
    var websiteURL = document.getElementById('websiteURL').value;
    var internalNotes = document.getElementById('internalNotes').value;

    var numberOninvoice = "on";
    if (document.getElementById('customCheck5').checked == true) {
        numberOninvoice = "on";
    } else {
        numberOninvoice = "off";
    }

    var customerRate = "on";
    if (document.getElementById('customCheck6').checked == true) {
        customerRate = "on";
    } else {
        customerRate = "off";
    }

    var blacklisted = "on";
    if (document.getElementById('customCheck2').checked == true) {
        blacklisted = "on";
    } else {
        blacklisted = "off";
    }

    if (document.getElementById('customCheck7').checked == true) {
        var AsShipper = 1;
    } else {
        var AsShipper = 0;
    }

    if (document.getElementById('customCheck8').checked == true) {
        var AsConsignee = 1;
    } else {
        var AsConsignee = 0;
    }

    if (val_currencySetting(currencySetting)) {
        if (val_paymentTerms(paymentTerms)) {
            if (val_creditLimit(creditLimit)) {
                if (val_salesRep(salesRep)) {
                    if (val_factoringCompany(factoringCompany)) {
                        if (val_federalID(federalID)) {
                            if (val_workerComp(workerComp)) {
                                if (val_websiteURL(websiteURL)) {
                                    if (val_internalNotes(internalNotes)) {
                                        $.ajax({
                                            url: 'admin/customer_driver.php?type=addCustomer',
                                            type: 'POST',
                                            data: {
                                                companyId: companyId,
                                                custName: custName,
                                                custAddress: custAddress,
                                                custLocation: custLocation,
                                                custZip: custZip,
                                                billingAddress: billingAddress,
                                                billingLocation: billingLocation,
                                                billingZip: billingZip,
                                                primaryContact: primaryContact,
                                                custTelephone: custTelephone,
                                                custExt: custExt,
                                                custEmail: custEmail,
                                                custFax: custFax,
                                                billingContact: billingContact,
                                                billingEmail: billingEmail,
                                                billingTelephone: billingTelephone,
                                                billingExt: billingExt,
                                                URS: URS,
                                                currencySetting: currencySetting,
                                                paymentTerms: paymentTerms,
                                                creditLimit: creditLimit,
                                                salesRep: salesRep,
                                                factoringCompany: factoringCompany,
                                                federalID: federalID,
                                                workerComp: workerComp,
                                                websiteURL: websiteURL,
                                                internalNotes: internalNotes,
                                                MC: MC,

                                                blacklisted: blacklisted,
                                                AsShipper: AsShipper,
                                                AsConsignee: AsConsignee,
                                                numberOninvoice: numberOninvoice,
                                                customerRate: customerRate,
                                            },
                                            success: function (data) {
                                                var companyid = $('#companyid').val();
                                                database.ref('customer').child(companyid).set({
                                                    data: randomString(),
                                                });
                                                swal('Success', data, 'success');
                                                $('#add_customer').modal('hide');
                                            }
                                        });
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

//update currency table
var customer_path = "customer/";
var customer_path1 = $('#companyid').val();
var customer_data = customer_path1.toString();
var customer_test = customer_path + customer_data;

database.ref(customer_test).on('child_added', function (data) {
    updateCustomerTable();
});
database.ref(customer_test).on('child_changed', function (data) {
    updateCustomerTable();
});
database.ref(customer_test).on('child_removed', function (data) {
    updateCustomerTable();
});

// update table fields
function updateCustomerTable() {
    var customerTable = document.getElementById('customerBody');
    var customerList = document.getElementById('browserscustomer');
    $.ajax({
        url: 'admin/utils/getCustomer.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split('^');
            if (customerTable != null) {
                customerTable.innerHTML = res[0];
            }

            if (customerList != null) {
                customerList.innerHTML = res[1];
            }

        },
    });
}

//Import customer
function importCustomer() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'admin/customer_driver.php?type=' + 'importCustomer',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}

// Export Excel
function exportCustomer(id) {

    $.ajax({
        url: 'admin/customer_driver.php?type=' + 'exportCustomer',
        data: {companyid: id},
        type: 'POST',
        success: function (data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//edit function
function updateCustomer(column, id) {
    var data = $('#customer_table').find('input[type="text"],textarea').val();

    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/customer_driver.php?type=' + 'edit_customer',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('customer').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// delete function
function deleteCustomer(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/customer_driver.php?type=' + 'delete_customer',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('customer').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, 'success');
            }
        });
    }
}

//----------Customer End--------------

//-----------User Start-----------------------------

// show privilege
function show_privilege(id) {
    $.ajax({
        url: 'admin/show_data.php',
        data: {id: id, type: 'pro'},
        method: "POST",
        dataType: 'html',
        success: function (data) {
            $('#final_privilege').html(data);
        }
    });
}

// update Privilege
function updatePrivilege() {
    var objID = document.getElementById('objID').value;
    var companyId = document.getElementById('companyId').value;
    var addBank = document.getElementById('addBank');
    var addCustomer = document.getElementById('addCustomer');
    var addCompany = document.getElementById('addCompany');
    var addShipper = document.getElementById('addShipper');
    var currency = document.getElementById('currency');
    var addConsignee = document.getElementById('addConsignee');
    var paymentTerms = document.getElementById('paymentTerms');
    var addDriver = document.getElementById('addDriver');
    var office = document.getElementById('office');
    var addTruck = document.getElementById('addTruck');
    var equipmentType = document.getElementById('equipmentType');
    var addTrailer = document.getElementById('addTrailer');
    var truckType = document.getElementById('truckType');
    var addExternalCarrier = document.getElementById('addExternalCarrier');
    var trailerType = document.getElementById('trailerType');
    var factoringCompany = document.getElementById('factoringCompany');
    var statusType = document.getElementById('statusType');
    var customsBroker = document.getElementById('customsBroker');
    var loadType = document.getElementById('loadType');
    var ownerOperator = document.getElementById('ownerOperator');
    var fixPayCategory = document.getElementById('fixPayCategory');

    if (addBank.checked) {
        var addBank = 1;
    } else {
        var addBank = 0;
    }
    if (addCustomer.checked) {
        var addCustomer = 1;
    } else {
        var addCustomer = 0;
    }
    if (addCompany.checked) {
        var addCompany = 1;
    } else {
        var addCompany = 0;
    }
    if (addShipper.checked) {
        var addShipper = 1;
    } else {
        var addShipper = 0;
    }
    if (currency.checked) {
        var currency = 1;
    } else {
        var currency = 0;
    }
    if (addConsignee.checked) {
        var addConsignee = 1;
    } else {
        var addConsignee = 0;
    }
    if (paymentTerms.checked) {
        var paymentTerms = 1;
    } else {
        var paymentTerms = 0;
    }
    if (addDriver.checked) {
        var addDriver = 1;
    } else {
        var addDriver = 0;
    }
    if (office.checked) {
        var office = 1;
    } else {
        var office = 0;
    }
    if (addTruck.checked) {
        var addTruck = 1;
    } else {
        var addTruck = 0;
    }
    if (equipmentType.checked) {
        var equipmentType = 1;
    } else {
        var equipmentType = 0;
    }
    if (addTrailer.checked) {
        var addTrailer = 1;
    } else {
        var addTrailer = 0;
    }
    if (truckType.checked) {
        var truckType = 1;
    } else {
        var truckType = 0;
    }
    if (addExternalCarrier.checked) {
        var addExternalCarrier = 1;
    } else {
        var addExternalCarrier = 0;
    }
    if (trailerType.checked) {
        var trailerType = 1;
    } else {
        var trailerType = 0;
    }
    if (factoringCompany.checked) {
        var factoringCompany = 1;
    } else {
        var factoringCompany = 0;
    }
    if (statusType.checked) {
        var statusType = 1;
    } else {
        var statusType = 0;
    }
    if (customsBroker.checked) {
        var customsBroker = 1;
    } else {
        var customsBroker = 0;
    }
    if (loadType.checked) {
        var loadType = 1;
    } else {
        var loadType = 0;
    }
    if (ownerOperator.checked) {
        var ownerOperator = 1;
    } else {
        var ownerOperator = 0;
    }
    if (fixPayCategory.checked) {
        var fixPayCategory = 1;
    } else {
        var fixPayCategory = 0;
    }

    $.ajax({
        url: 'admin/user_driver.php?type=' + 'update_privilege',
        method: 'POST',
        data: {
            objID: objID,
            companyId: companyId,
            addBank: addBank,
            addCustomer: addCustomer,
            addCompany: addCompany,
            addShipper: addShipper,
            currency: currency,
            addConsignee: addConsignee,
            paymentTerms: paymentTerms,
            addDriver: addDriver,
            office: office,
            addTruck: addTruck,
            equipmentType: equipmentType,
            addTrailer: addTrailer,
            truckType: truckType,
            addExternalCarrier: addExternalCarrier,
            trailerType: trailerType,
            factoringCompany: factoringCompany,
            statusType: statusType,
            customsBroker: customsBroker,
            loadType: loadType,
            ownerOperator: ownerOperator,
            fixPayCategory: fixPayCategory
        },
        success: function (data) {
            swal('Success', data, 'success');
            $('#show_privilege').modal('hide');
        }
    });
}

//update currency table
var user_path = "user/";
var user_path1 = $('#companyid').val();
var user_data = user_path1.toString();
var user_test = user_path + user_data;

database.ref(user_test).on('child_added', function (data) {
    updateUserTable();
});
database.ref(user_test).on('child_changed', function (data) {
    updateUserTable();
});
database.ref(user_test).on('child_removed', function (data) {
    updateUserTable();
});

// update table fields
function updateUserTable() {
    var UserBody = document.getElementById('UserBody');

    $.ajax({
        url: 'admin/utils/getUser.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {

            if (UserBody != null) {
                UserBody.innerHTML = response;
            }
        },
    });
}

// add user
function addUser() {
    var companyId = document.getElementById('companyId').value;
    var userEmail = document.getElementById('userEmail').value;
    var userName = document.getElementById('userName').value;
    var userPass = document.getElementById('userPass').value;
    var userFirstName = document.getElementById('userFirstName').value;
    var userLastName = document.getElementById('userLastName').value;
    var userAddress = document.getElementById('userAddress').value;
    var userLocation = document.getElementById('userLocation').value;
    var userZip = document.getElementById('userZip').value;
    var userTelephone = document.getElementById('userTelephone').value;
    var userExt = document.getElementById('userExt').value;
    var uerTollFree = document.getElementById('uerTollFree').value;
    var userFax = document.getElementById('userFax').value;

    var addBank = document.getElementById('addBank');
    var addCustomer = document.getElementById('addCustomer');
    var addCompany = document.getElementById('addCompany');
    var addShipper = document.getElementById('addShipper');
    var currency = document.getElementById('currency');
    var addConsignee = document.getElementById('addConsignee');
    var paymentTerms = document.getElementById('paymentTerms');
    var addDriver = document.getElementById('addDriver');
    var office = document.getElementById('office');
    var addTruck = document.getElementById('addTruck');
    var equipmentType = document.getElementById('equipmentType');
    var addTrailer = document.getElementById('addTrailer');
    var truckType = document.getElementById('truckType');
    var addExternalCarrier = document.getElementById('addExternalCarrier');
    var trailerType = document.getElementById('trailerType');
    var factoringCompany = document.getElementById('factoringCompany');
    var statusType = document.getElementById('statusType');
    var customsBroker = document.getElementById('customsBroker');
    var loadType = document.getElementById('loadType');
    var ownerOperator = document.getElementById('ownerOperator');
    var fixPayCategory = document.getElementById('fixPayCategory');

    if (addBank.checked) {
        var addBank = 1;
    } else {
        var addBank = 0;
    }
    if (addCustomer.checked) {
        var addCustomer = 1;
    } else {
        var addCustomer = 0;
    }
    if (addCompany.checked) {
        var addCompany = 1;
    } else {
        var addCompany = 0;
    }
    if (addShipper.checked) {
        var addShipper = 1;
    } else {
        var addShipper = 0;
    }
    if (currency.checked) {
        var currency = 1;
    } else {
        var currency = 0;
    }
    if (addConsignee.checked) {
        var addConsignee = 1;
    } else {
        var addConsignee = 0;
    }
    if (paymentTerms.checked) {
        var paymentTerms = 1;
    } else {
        var paymentTerms = 0;
    }
    if (addDriver.checked) {
        var addDriver = 1;
    } else {
        var addDriver = 0;
    }
    if (office.checked) {
        var office = 1;
    } else {
        var office = 0;
    }
    if (addTruck.checked) {
        var addTruck = 1;
    } else {
        var addTruck = 0;
    }
    if (equipmentType.checked) {
        var equipmentType = 1;
    } else {
        var equipmentType = 0;
    }
    if (addTrailer.checked) {
        var addTrailer = 1;
    } else {
        var addTrailer = 0;
    }
    if (truckType.checked) {
        var truckType = 1;
    } else {
        var truckType = 0;
    }
    if (addExternalCarrier.checked) {
        var addExternalCarrier = 1;
    } else {
        var addExternalCarrier = 0;
    }
    if (trailerType.checked) {
        var trailerType = 1;
    } else {
        var trailerType = 0;
    }
    if (factoringCompany.checked) {
        var factoringCompany = 1;
    } else {
        var factoringCompany = 0;
    }
    if (statusType.checked) {
        var statusType = 1;
    } else {
        var statusType = 0;
    }
    if (customsBroker.checked) {
        var customsBroker = 1;
    } else {
        var customsBroker = 0;
    }
    if (loadType.checked) {
        var loadType = 1;
    } else {
        var loadType = 0;
    }
    if (ownerOperator.checked) {
        var ownerOperator = 1;
    } else {
        var ownerOperator = 0;
    }
    if (fixPayCategory.checked) {
        var fixPayCategory = 1;
    } else {
        var fixPayCategory = 0;
    }

    if (val_userEmail(userEmail)) {
        if (val_userName(userName)) {
            if (val_userPass(userPass)) {
                if (val_userFirstName(userFirstName)) {
                    if (val_userLastName(userLastName)) {
                        if (val_userAddress(userAddress)) {
                            if (val_userLocation(userLocation)) {
                                if (val_userZip(userZip)) {
                                    if (val_userTelephone(userTelephone)) {
                                        if (val_userExt(userExt)) {
                                            if (val_uerTollFree(uerTollFree)) {
                                                if (val_userFax(userFax)) {
                                                    $.ajax({
                                                        url: 'admin/user_driver.php?type=' + 'add_user',
                                                        type: 'POST',
                                                        data: {
                                                            companyID: companyId,
                                                            userEmail: userEmail,
                                                            userName: userName,
                                                            userPass: userPass,
                                                            userFirstName: userFirstName,
                                                            userLastName: userLastName,
                                                            userAddress: userAddress,
                                                            userLocation: userLocation,
                                                            userZip: userZip,
                                                            userTelephone: userTelephone,
                                                            userExt: userExt,
                                                            TollFree: uerTollFree,
                                                            userFax: userFax,
                                                            addBank: addBank,
                                                            addCustomer: addCustomer,
                                                            addCompany: addCompany,
                                                            addShipper: addShipper,
                                                            currency: currency,
                                                            addConsignee: addConsignee,
                                                            paymentTerms: paymentTerms,
                                                            addDriver: addDriver,
                                                            office: office,
                                                            addTruck: addTruck,
                                                            equipmentType: equipmentType,
                                                            addTrailer: addTrailer,
                                                            truckType: truckType,
                                                            addExternalCarrier: addExternalCarrier,
                                                            trailerType: trailerType,
                                                            factoringCompany: factoringCompany,
                                                            statusType: statusType,
                                                            customsBroker: customsBroker,
                                                            loadType: loadType,
                                                            ownerOperator: ownerOperator,
                                                            fixPayCategory: fixPayCategory
                                                        },
                                                        success: function (data) {
                                                            var companyid = $('#companyid').val();
                                                            database.ref('user').child(companyid).set({
                                                                data: randomString(),
                                                            });
                                                            swal('Success', data, 'success');
                                                            $('#add_user').modal('hide');
                                                        }
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

//Import customer
function importUser() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'admin/user_driver.php?type=' + 'import_user',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}

// Export Excel
function exportUser(id) {

    $.ajax({
        url: 'admin/user_driver.php?type=' + 'export_user',
        data: {companyid: id},
        type: 'POST',
        success: function (data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "user_export.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//edit function
function updateUser(column, id) {
    var data = $('#user_table').find('input[type="text"],textarea').val();
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/user_driver.php?type=' + 'edit_user',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('user').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// delete function
function deleteUser(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/user_driver.php?type=' + 'delete_user',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('user').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, 'success');
            }
        });
    }
}

//-----------User End------------------------------

/*----------------- Bank Admin Add START -------------------------*/

//update credit Bank table
var bankpath = "bank/";
var bankpath1 = $('#companyid').val();
var bankdata = bankpath1.toString();
var banktest = bankpath + bankdata;

database.ref(banktest).on('child_added', function (data) {
    updateBankTable();
});

database.ref(banktest).on('child_changed', function (data) {
    updateBankTable();
});

database.ref(banktest).on('child_removed', function (data) {
    updateBankTable();
});

//update table fields

function updateBankTable() {
    var bankBody = document.getElementById('bankBody');
    var bankList = document.getElementById('Name');
    $.ajax({
        url: 'admin/utils/getBank.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split("^");
            if (bankBody != null) {
                bankBody.innerHTML = res[0];
            }
            if (bankList != null) {
                bankList.innerHTML = res[1];
            }

        },
    });
}

//Add Bank Admin
function AddBankAdmin() {
    var companyId = document.getElementById('companyId').value;
    var bankAddresss = document.getElementById('bankAddress').value;
    var bankName = document.getElementById('bankName').value;
    var accountHolder = document.getElementById('accountHolder').value;
    var accountNo = document.getElementById('accountNo').value;
    var routingNo = document.getElementById('routingNo').value;
    var openingBalDate = document.getElementById('openingBalDate').value;
    var openingBalance = document.getElementById('openingBalance').value;
    var currentcheqNo = document.getElementById('currentcheqNo').value;
    var transacBalance = document.getElementById('transacBalance').value;

    if (val_bankName(bankName)) {
        if (val_accountHolder(accountHolder)) {
            if (val_accountNo(accountNo)) {
                if (val_routingNo(routingNo)) {
                    if (val_openingBalDate(openingBalDate)) {
                        if (val_openingBalance(openingBalance)) {
                            $.ajax({
                                url: 'admin/bank_admin.php?type=' + 'bank_admin',
                                type: 'POST',
                                data: {
                                    companyId: companyId,
                                    bankName: bankName,
                                    bankAddresss: bankAddresss,
                                    accountHolder: accountHolder,
                                    accountNo: accountNo,
                                    routingNo: routingNo,
                                    openingBalDate: openingBalDate,
                                    openingBalance: openingBalance,
                                    currentcheqNo: currentcheqNo,
                                    transacBalance: transacBalance,
                                },
                                dataType: 'text',
                                success: function (data) {
                                    database.ref('bank').child(companyid).set({
                                        data: randomString(),
                                    });
                                    swal('Success', data, 'success');
                                    $("#add_bank").modal("hide");
                                },
                                error: function () {
                                },
                            });
                        }
                    }
                }
            }
        }
    }
}

//Edit Bank Admin
function updateBank(column, id) {
    var data = $('#bank_table').find('input[type="text"],textarea').val();
    var companyId = $('#companyid').val();

    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'edit_bank',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            database.ref('bank').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

function update_Date(element, column, id) {
    //var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'edit_date',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            openingBalDate: element,
        },
        success: function (data) {
            swal("Update", data, 'success');
        }
    });
}

function updateAccount(element, column, id) {
    //var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'edit_account',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            accountHolder: element,
        },
        success: function (data) {
            swal("Update", data, 'success');
        }
    });
}

//Delete Bank Admin
function deleteBank(id) {
    //var companyId = document.getElementById('companyId').value;

    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/bank_admin.php?type=' + 'delete_bank',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                database.ref('bank').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

// Import Bank Admin
function import_Admin() {
    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'import_admin_bank',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal('Success', data, 'success');
        }
    });
}

// Export Bank Here
function export_Admin() {
    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'export_admin',
        type: 'post',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "bank_admin.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*----------------- Bank Admin Add END -------------------------*/

/*----------------- Credit Card START -------------------------*/

//update credit Bank table
var bankCreditpath = "bank_credit/";
var bankCreditpath1 = $('#companyid').val();
var bankCreditdata = bankCreditpath1.toString();
var bankCredittest = bankCreditpath + bankCreditdata;

database.ref(bankCredittest).on('child_added', function (data) {
    updateBankCreditTable();
});

database.ref(bankCredittest).on('child_changed', function (data) {
    updateBankCreditTable();
});

database.ref(bankCredittest).on('child_removed', function (data) {
    updateBankCreditTable();
});

//update table fields

function updateBankCreditTable() {
    var CreditbankBody = document.getElementById('CreditbankBody');
    var CreditbankList = document.getElementById('mainCard');
    $.ajax({
        url: 'admin/utils/getBankCredit.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split("^");
            if (CreditbankBody != null) {
                CreditbankBody.innerHTML = res[0];
            }
            if (CreditbankList != null) {
                CreditbankList.innerHTML = res[1];
            }
        },
    });
}

// Add CreditCard Admin
function Add_Credit() {
    var companyId = document.getElementById('companyId').value;
    var Name = document.getElementById('Name').value;
    var displayName = document.getElementById('displayName').value;
    var cardType = $("#cardType").val();
    var cardHolderName = document.getElementById('cardHolderName').value;
    var cardNo = document.getElementById('cardNo').value;
    var openingBalanceDt = document.getElementById('openingBalanceDt').value;
    var cardLimit = document.getElementById('cardLimit').value;
    var openingBalance = document.getElementById('openingBalance').value;
    var transacBalance = document.getElementById('transacBalance').value;

    if (val_Name(Name)) {
        if (val_displayName(displayName)) {
            if (val_cardType(cardType)) {
                if (val_cardHolderName(cardHolderName)) {
                    if (val_openingBalDate(openingBalanceDt)) {
                        if (val_cardLimit(cardLimit)) {
                            if (val_openingBalance(openingBalance)) {
                                $.ajax({
                                    url: 'admin/bank_credit.php?type=' + 'credit_card',
                                    type: 'POST',
                                    data: {
                                        companyId: companyId,
                                        Name: Name,
                                        displayName: displayName,
                                        cardType: cardType,
                                        cardHolderName: cardHolderName,
                                        cardNo: cardNo,
                                        openingBalanceDt: openingBalanceDt,
                                        cardLimit: cardLimit,
                                        openingBalance: openingBalance,
                                        transacBalance: openingBalance,
                                    },
                                    dataType: 'text',
                                    success: function (data) {
                                        database.ref('bank_credit').child(companyid).set({
                                            data: randomString(),
                                        });
                                        swal('Success', data, 'success');
                                        $("#Add_CreditCard").modal("hide");
                                    },
                                    error: function () {
                                    },
                                });
                            }
                        }
                    }
                }
            }
        }
    }
}

/// Export Credit Here
function export_CreditCard() {
    $.ajax({
        url: 'admin/bank_credit.php?type=' + 'export_credit',
        type: 'post',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");

            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "bank_credit_admin.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

// Import Credit Card
function import_creditCard() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'admin/bank_credit.php?type=' + 'import_bank_credit',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal('Success', data, 'success');
        }
    });
}

// Delete Credit Card
function deleteCredit(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/bank_credit.php?type=' + 'delete_credit',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                database.ref('bank_credit').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

//Edit Bank Credit
function updateCredit(column, id) {
    var data = $('#credit_bank_table').find('input[type="text"],textarea').val();
    var companyId = document.getElementById('companyid').value;

    $.ajax({
        url: 'admin/bank_credit.php?type=' + 'edit_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            database.ref('bank_credit').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            console.log(column + id);
            document.getElementById(column + id).style.display = "none";
        }
    });
}

//Edit Card type
function update_Credit(column, id) {
    //var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/bank_credit.php?type=' + 'card_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            cardType: element,
        },
        success: function (data) {
            database.ref('bank_credit').child(companyid).set({
                data: randomString(),
            });
            swal("Update", data, 'success');
        }
    });
}

/*----------------- Credit Card END -------------------------*/

/*----------------- Sub Credit Card START -------------------------*/

//update credit Bank table
var subcardpath = "sub_credit_card/";
var subcardpath1 = $('#companyid').val();
var subcarddata = subcardpath1.toString();
var subcardtest = subcardpath + subcarddata;

database.ref(subcardtest).on('child_added', function (data) {
    updateSubCardTable();
});

database.ref(subcardtest).on('child_changed', function (data) {
    updateSubCardTable();
});

database.ref(subcardtest).on('child_removed', function (data) {
    updateSubCardTable();
});

//update table fields

function updateSubCardTable() {
    var SubCardBody = document.getElementById('SubCardBody');

    $.ajax({
        url: 'admin/utils/getSub_credit_card.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split("^");
            if (SubCardBody != null) {
                SubCardBody.innerHTML = response;
            }
        },
    });
}


// Add Sub Credit
function Add_SubCredit() {
    var companyId = document.getElementById('companyId').value;
    var displayName = document.getElementById('displayName').value;
    var mainCard = $("#mainCard").val();
    var cardHolderName = document.getElementById('cardHolderName').value;
    var cardNo = document.getElementById('cardNo').value;

    if (val_displayName(displayName)) {
        if (val_mainCard(mainCard)) {
            if (val_cardHolderName(cardHolderName)) {
                if (val_cardNo(cardNo)) {
                    $.ajax({
                        url: 'admin/sub_credit_card.php?type=' + 'sub_credit_card',
                        type: 'POST',
                        data: {
                            companyId: companyId,
                            displayName: displayName,
                            mainCard: mainCard,
                            cardHolderName: cardHolderName,
                            cardNo: cardNo,
                        },
                        dataType: 'text',
                        success: function (data) {
                            database.ref('sub_credit_card').child(companyid).set({
                                data: randomString(),
                            });
                            swal('Success', data, 'success');
                            $("#add_sub_credit").modal("hide");
                        },
                        error: function () {
                        },
                    });
                }
            }
        }
    }
}

// Import Sub Credit
function import_Sub_credit() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'admin/sub_credit_card.php?type=' + 'import_sub_credit',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal('Success', data, 'success');
        }
    });
}

//Edit Sub Credit
function updateSubCredit(column, id) {
    var data = $('#sub_credit_table').find('input[type="text"],textarea').val();
    var companyId = $('#companyid').val();

    $.ajax({
        url: 'admin/sub_credit_card.php?type=' + 'edit_sub_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            database.ref('sub_credit_card').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

//Edit Sub Credit
function updateSub_Credit(column, id) {
    //var value = element.innerText;
    var data = $('#sub_credit_table').find('input[type="text"],textarea').val();
    var companyId = $('#companyid').val();

    $.ajax({
        url: 'admin/sub_credit_card.php?type=' + 'edit_card_type',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            mainCard: data,
        },
        success: function (data) {
            database.ref('sub_credit_card').child(companyid).set({
                data: randomString(),
            });
            swal("Update", data, 'success');
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// Delete Sub Credit
function deleteSubCredit(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/sub_credit_card.php?type=' + 'delete_sub_credit',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

// Export Sub Credit

function export_SubCredit() {
    $.ajax({
        url: 'admin/sub_credit_card.php?type=' + 'export_sub_credit',
        type: 'post',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");

            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "sub_credit.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*----------------- Sub Credit Card END -------------------------*/

/*----------------- Customs Broker START -------------------------*/

//update credit Bank table
var custompath = "custom_broker/";
var custompath1 = $('#companyid').val();
var customdata = custompath1.toString();
var customtest = custompath + customdata;

database.ref(customtest).on('child_added', function (data) {
    UpdateCustomTable();
});

database.ref(customtest).on('child_changed', function (data) {
    UpdateCustomTable();
});

database.ref(customtest).on('child_removed', function (data) {
    UpdateCustomTable();
});

//update table fields

function UpdateCustomTable() {
    var custom_broker_body = document.getElementById('custom_broker_body');
    var custom_broker_body = document.getElementById('custom_broker_body');
    // var bankList = document.getElementById('Name');
    $.ajax({
        url: 'admin/utils/getCustom.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            if (custom_broker_body != null) {
                custom_broker_body.innerHTML = response;
            }
        },
    });
}


// Add Customs Broker
function Add_CustomBroker() {
    var companyId = document.getElementById('companyId').value;
    var brokerName = document.getElementById('brokerName').value;
    var crossing = document.getElementById('crossing').value;
    var telephone = document.getElementById('telephone').value;
    var ext = document.getElementById('ext').value;
    var tollfree = document.getElementById('tollfree').value;
    var fax = document.getElementById('fax').value;
    var Status = $("input[name='Status']:checked").val();
    if (val_brokerName(brokerName)) {
        if (val_Crossing(crossing)) {
            if (val_telephone(telephone)) {
                $.ajax({
                    url: 'admin/custom_broker.php?type=' + 'add_custom_broker',
                    type: 'POST',
                    data: {
                        companyId: companyId,
                        brokerName: brokerName,
                        crossing: crossing,
                        telephone: telephone,
                        ext: ext,
                        tollfree: tollfree,
                        fax: fax,
                        Status: Status,
                    },
                    dataType: 'text',
                    success: function (data) {
                        database.ref('custom_broker').child(companyid).set({
                            data: randomString(),
                        });
                        swal('Success', data, 'success');
                        $("#Add_Customs_Broker").modal("hide");
                    },
                    error: function () {
                    },
                });
            }
        }
    }
}

// Edit Custom Broker
function updateCustom(column, id, value) {
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/custom_broker.php?type=' + 'edit_custom_broker',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            database.ref('custom_broker').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");

        }
    });
}

// Delete Custom Broker
function deleteCustom(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/custom_broker.php?type=' + 'delete_custom_broker',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                database.ref('custom_broker').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

// Export Custom Broker
function export_CustomBroker() {
    $.ajax({
        url: 'admin/custom_broker.php?type=' + 'export_custom_broker',
        type: 'post',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "custom_broker.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

// Import Custom Broker
function import_Custom_Broker() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'admin/custom_broker.php?type=' + 'import_custom_broker',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal('Success', data, 'success');
        }
    });
}


function paginate_custom_broker(start, limit) {

    $.ajax({
        url: 'admin/utils/paginateCustomBroker.php',
        type: 'POST',
        data: {
            start: start,
            limit: limit,
        },
        dataType: 'text',
        success: function (response) {
            document.getElementById('custom_broker_body').innerHTML = response;
        },

    });
}

/*----------------- Customs Broker END -------------------------*/

//-----------------Truck Add start-------------------------------------

//ajax Function For insert Truck
function TruckAdd() {
    var form_data = new FormData(document.getElementById('truckform'));
    var totalfiles = document.getElementById('files').files.length;
    if (totalfiles <= 5) {
        for (var index = 0; index < totalfiles; index++) {
        }
        var truck_number = document.getElementById("truck_number").value;
        var trucktype1 = document.getElementById("trucktype").value;
        var truck_type = trucktype1.split(")");
        var trucktype = truck_type[0];
        form_data.append("trucktype1", trucktype);
        var license_plate = document.getElementById("license_plate").value;
        var plate_expiry = document.getElementById("plate_expiry").value;
        var vin = document.getElementById("vin").value;
        var ownership = document.getElementById('ownership').checked;
        var Own = document.getElementById('Own').checked;
        if ((ownership == "") && (Own == "")) {
            swal("Please Select Ownership");
            return false;
        }

        if (val_truck_number(truck_number)) {
            if (val_trucktype(trucktype1)) {
                if (val_license_plate(license_plate)) {
                    if (val_plate_expiry(plate_expiry)) {
                        if (val_vin(vin)) {
                            $.ajax({
                                url: 'admin/truckadd_driver.php?type=' + 'truckadd',
                                method: 'post',
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {
                                    var companyid = $('#companyid').val();
                                    database.ref('truck').child(companyid).set({
                                        data: randomString(),
                                    });
                                    swal("Success", data, "success");
                                    $('#add_Truck').modal('hide');
                                }
                            });
                        }
                    }
                }
            }
        }
    } else {
        swal('Please Select Only 5 File')
    }
}

//
//update truck table
var truck_path = "truck/";
var truck_path1 = $('#companyid').val();
var truck_data = truck_path1.toString();
var truck_test = truck_path + truck_data;

database.ref(truck_test).on('child_added', function (data) {
    updateTruckTable();
});
database.ref(truck_test).on('child_changed', function (data) {
    updateTruckTable();
});
database.ref(truck_test).on('child_removed', function (data) {
    updateTruckTable();
});

// update table fields
function updateTruckTable() {
    var truckBody = document.getElementById('truckBody');
    var truckList = document.getElementById('browserstruck');
    $.ajax({
        url: 'admin/utils/getTruck.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split('^');
            if (truckBody != null) {
                truckBody.innerHTML = res[0];
            }
            if (truckList != null) {
                truckList.innerHTML = res[1];
            }

        },
    });
}

//

// Export Excel Function For Truck Add
function exportTruckAdd() {
    $.ajax({
        url: 'admin/truckadd_driver.php?type=' + 'truckexport',
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//update Truck Function
function updateTruckAdd(column, id) {
    var data = $('#truck_table').find('input[type="text"],textarea').val();

    var companyId = $('#companyid').val();
    $.ajax({
        url: 'admin/truckadd_driver.php?type=' + 'edit_truck',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('truck').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// Delete Truck Function
function deleteTruckAdd(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/truckadd_driver.php?type=' + 'delete_truck',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('truck').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

//-----------------Truck Add End-------------------------------------


//-----------------Trailer Add start-------------------------------------

//Ajax Function For insert Trailer
function Traileradd() {
    var form_data = new FormData(document.getElementById('trailerform'));
    var totalfiles = document.getElementById('files').files.length;

    if (totalfiles <= 5) {
        for (var index = 0; index < totalfiles; index++) {
        }
        var trailer_number = document.getElementById("trailer_number").value;
        var trailertypes1 = document.getElementById("trailertype").value;
        var trailer_type = trailertypes1.split(")");
        var trailertype = trailer_type[0];
        form_data.append("traileradd_type", trailertype);
        var license_plate = document.getElementById("license_plate").value;
        var plate_expiry = document.getElementById("plate_expiry").value;
        var vin = document.getElementById("vin").value;

        if (val_trailer_number(trailer_number)) {
            if (val_trailer_type(trailertypes1)) {
                if (val_license_plate_trailer(license_plate)) {
                    if (val_plate_expiry_trailer(plate_expiry)) {
                        if (val_vin_trailer(vin)) {
                            $.ajax({
                                url: 'admin/traileradd_driver.php?type=' + 'traileradd',
                                method: 'post',
                                data: form_data,
                                contentType: false,
                                cache: false,
                                processData: false,
                                success: function (data) {
                                    var companyid = $('#companyid').val();
                                    database.ref('trailer').child(companyid).set({
                                        data: randomString(),
                                    });
                                    swal("Success", data, "success");
                                    $('#add_Trailer').modal('hide');
                                }
                            });
                        }
                    }
                }
            }
        }
    } else {
        swal("Please Select Only 5 File")
    }
}

//
//update trailer table
var trailer_path = "trailer/";
var trailer_path1 = $('#companyid').val();
var trailer_data = trailer_path1.toString();
var trailer_test = trailer_path + trailer_data;

database.ref(trailer_test).on('child_added', function (data) {
    updateTrailerTable();
});
database.ref(trailer_test).on('child_changed', function (data) {
    updateTrailerTable();
});
database.ref(trailer_test).on('child_removed', function (data) {
    updateTrailerTable();
});

// update table fields
function updateTrailerTable() {
    var trailerBody = document.getElementById('trailerBody');
    var trailerList = document.getElementById('browserstrailer');
    $.ajax({
        url: 'admin/utils/getTrailer.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {

            var res = response.split('^');

            if (trailerBody != null) {
                trailerBody.innerHTML = res[0];
            }
            if (trailerList != null) {
                trailerList.innerHTML = res[1];
            }
        },
    });
}

//

//update Trailer Function
function updateTrailerAdd(column, id) {
    var data = $('#trailer_table').find('input[type="text"],textarea').val();

    var companyId = $('#companyid').val();

    $.ajax({
        url: 'admin/traileradd_driver.php?type=' + 'edit_trailer',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('trailer').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");

            document.getElementById(column + id).style.display = "none";
        }
    });
}


// Delete Trailer Function
function deleteTrailerAdd(id) {

    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/traileradd_driver.php?type=' + 'delete_trailer',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('trailer').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

// Export Excel Function For Trailer Add
function exportTrailerAdd() {
    $.ajax({
        url: 'admin/traileradd_driver.php?type=' + 'trailerexport',
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//-----------------Trailer Add End-------------------------------------


//-----------------Factoring Add Start---------------------------------

//Ajax Function For insert Factoring
function FactoringCompany() {

    var factoring_company = document.getElementById("factoring_add_company").value;
    var faddress = document.getElementById('faddress').value;
    var flocation = document.getElementById("flocation").value;
    var fzip = document.getElementById('fzip').value;
    var fprimary_contact = document.getElementById("fprimary_contact").value;
    var factoringtelephone = document.getElementById('ftelephone').value;
    var factext = document.getElementById('factext').value;
    var ffax = document.getElementById('ffax').value;
    var ftollfree = document.getElementById("ftollfree").value;
    var femail = document.getElementById('femail').value;
    var fsecondaryContact = document.getElementById("fsecondaryContact").value;
    var ftelephone = document.getElementById('facttelephone').value;
    var ext = document.getElementById("ext").value;
    var fcurrency1 = document.getElementById('fcurrency').value;
    var fcurrency_1 = fcurrency1.split(")");
    var fcurrency = fcurrency_1[0];
    var fpaymentterms1 = document.getElementById('fpaymentterms').value;
    var fpaymentterms_1 = fpaymentterms1.split(")");
    var fpaymentterms = fpaymentterms_1[0];
    var ftaxid = document.getElementById("ftaxid").value;
    var finternal_notes = document.getElementById('finternal_notes_factoring').value;
    var companyId = document.getElementById('companyId').value;

    if (val_factoring_company(factoring_company)) {
        if (val_faddress(faddress)) {
            if (val_flocation(flocation)) {
                if (val_fzip(fzip)) {
                    if (val_ftaxid(ftaxid)) {
                        $.ajax({
                            url: 'admin/factoring_driver.php?type=' + 'factoringadd',
                            type: 'POST',
                            data: {
                                companyId: companyId,
                                factoring_company: factoring_company,
                                faddress: faddress,
                                flocation: flocation,
                                fzip: fzip,
                                fprimary_contact: fprimary_contact,
                                factoringtelephone: factoringtelephone,
                                fext: factext,
                                ffax: ffax,
                                ftollfree: ftollfree,
                                femail: femail,
                                fsecondaryContact: fsecondaryContact,
                                ftelephone: ftelephone,
                                ext: ext,
                                fcurrency: fcurrency,
                                fpaymentterms: fpaymentterms,
                                ftaxid: ftaxid,
                                finternal_notes: finternal_notes,
                            },
                            dataType: "text",
                            success: function (data) {
                                var companyid = $('#companyid').val();
                                database.ref('factoring').child(companyid).set({
                                    data: randomString(),
                                });
                                swal("Success", data, "success");
                                $('#add_factoring').modal('hide');
                            },
                        });
                    }
                }
            }
        }
    }
}

//update driver table
var factoring_path = "factoring/";
var factoring_path1 = $('#companyid').val();
var factoring_data = factoring_path1.toString();
var fatoring_test = factoring_path + factoring_data;

database.ref(fatoring_test).on('child_added', function (data) {
    updateFactoringTable();
});
database.ref(fatoring_test).on('child_changed', function (data) {
    updateFactoringTable();
});
database.ref(fatoring_test).on('child_removed', function (data) {
    updateFactoringTable();
});

//update table fields
function updateFactoringTable() {
    var factoringBody = document.getElementById('factoringBody');
    var factoringList = document.getElementById('searchFactoring');
    var factoringCustomer = document.getElementById('factoringlist');
    var browsers1 = document.getElementById('browsers1');

    $.ajax({
        url: 'admin/utils/getFactoring.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split("^");
            if (factoringBody != null) {
                factoringBody.innerHTML = res[0];
            }
            if (factoringList != null) {
                factoringList.innerHTML = res[1];
            }
            if (factoringCustomer != null) {
                factoringCustomer.innerHTML = res[2];
            }
            if (browsers1 != null) {
                browsers1.innerHTML = res[2];
            }
        },
    });
}

//

//update Factoring Function
function updateFactoring(column, id) {
    var data = $('#factoring_table').find('input[type="text"],textarea').val();

    var companyId = $('#companyid').val();
    $.ajax({
        url: 'admin/factoring_driver.php?type=' + 'edit_factoring',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('factoring').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            console.log(column + id);
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// Delete Factoring Function
function deletefactoring(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/factoring_driver.php?type=' + 'delete_factoring',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('factoring').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

// Export Excel Function for Factoring Company
function exportFactoring() {
    $.ajax({
        url: 'admin/factoring_driver.php?type=' + 'export_factoring',
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//-----------------Factoring Add End---------------------------------

/*------------------- Driver Start -----------------------------*/

// get driver pay info
function getDriverPayInfo() {
    loadedmiles = document.getElementById('loadedmiles').value;
    emptymiles = document.getElementById('emptymiles').value;
    pickrate = document.getElementById('pickrate').value;
    pickstart = document.getElementById('pickstart').value;
    droprate = document.getElementById('droprate').value;
    dropstart = document.getElementById('dropstart').value;
    driverTarp = document.getElementById('driverTarp').value;

    if (val_loadedMile(loadedmiles)) {
        if (val_emptyMile(emptymiles)) {
            if (val_pickupRate(pickrate)) {
                if (val_pickupAfter(pickstart)) {
                    if (val_dropRate(droprate)) {
                        if (val_dropAfter(dropstart)) {
                            if (val_tarp(driverTarp)) {
                                $('#driverpayinfo').modal('hide');
                            }
                        }
                    }
                }
            }
        }
    }
}

// get add fields
function addPayFields() {

    if (loadedmiles != '' || emptymiles != '' || pickrate != '' || pickstart != '' || droprate != '' || dropstart != '' || driverTarp != '') {
        document.getElementById('loadedmiles').value = loadedmiles;
        document.getElementById('emptymiles').value = emptymiles;
        document.getElementById('pickrate').value = pickrate;
        document.getElementById('pickstart').value = pickstart;
        document.getElementById('droprate').value = droprate;
        document.getElementById('dropstart').value = dropstart;
        document.getElementById('driverTarp').value = driverTarp;
    }
}
//Driver Recurrence +
var installmentCategory = [];
var installmentType = [];
var amount = [];
var installment = [];
var startNo = [];
var startDate = [];
var internalNote = [];

function getrecurrence() {
    var recurrence_id = document.getElementById('getnewaa').value;
    var counter = 0;
    var counter1 = 0;
    if (recurrence_id == 2) {
        recurrenceAddLength = document.getElementsByName('installmentCategory').length - 1;
        for (var i = 0; i < document.getElementsByName('installmentCategory').length; i++) {

            installmentCategory[i] = document.getElementsByName('installmentCategory')[i].value;
            installmentType[i] = document.getElementsByName('installmentType')[i].value;
            amount[i] = document.getElementsByName('amount')[i].value;
            installment[i] = document.getElementsByName('installment')[i].value;
            startNo[i] = document.getElementsByName('startNo')[i].value;
            startDate[i] = document.getElementsByName('startDate')[i].value;
            internalNote[i] = document.getElementsByName('internalNote')[i].value;
            if (val_installmentCategory(installmentCategory[i])) {
                if (val_installmentType(installmentType[i])) {
                    if (val_amount1(amount[i])) {
                        if (val_installment(installment[i])) {
                            if (val_startNo(val_startNo[i])) {
                                if (val_startDate(startDate[i])) {
                                    if (val_internalNote1(internalNote[i])) {
                                        counter++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }

        if (counter == document.getElementsByName('installmentCategory').length - 1) {
            $('#addRecurrence').modal('hide');
        } else {
            swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
        }

    } else {
        for (var i = 0; i < document.getElementsByName('installmentCategory').length; i++) {
            installmentCategory[i] = document.getElementsByName('installmentCategory')[i].value;
            installmentType[i] = document.getElementsByName('installmentType')[i].value;
            amount[i] = document.getElementsByName('amount')[i].value;
            installment[i] = document.getElementsByName('installment')[i].value;
            startNo[i] = document.getElementsByName('startNo')[i].value;
            startDate[i] = document.getElementsByName('startDate')[i].value;
            internalNote[i] = document.getElementsByName('internalNote')[i].value;
            if (val_installmentCategory(installmentCategory[i])) {
                if (val_installmentType(installmentType[i])) {
                    if (val_amount1(amount[i])) {
                        if (val_installment(installment[i])) {
                            if (val_startNo(val_startNo[i])) {
                                if (val_startDate(startDate[i])) {
                                    if (val_internalNote1(internalNote[i])) {
                                        counter1++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }
    }
    if (counter1 == document.getElementsByName('installmentCategory').length) {
        $('#addRecurrence').modal('hide');
    } else {
        swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
    }
}

function addRecurrenceFields() {
    if (installmentCategory.length > 0) {
        var innerData = "";
        for (var i = 0; i < installmentCategory.length; i++) {

            innerData += '<tr id="recurrence_add' + i + '">'
                + '<td width="150">'
                + '<input value = "' + installmentCategory[i] + '" id="installmentCategory" class="form-control" name="installmentCategory" list="fixpaycat"/></td>'
                + '<td width="150">'
                + '<input value = "' + installmentType[i] + '" id="installmentType" class="form-control" name="installmentType" list="instatype1"/></td>'
                + '<td width="100">'
                + '<input name="amount" id="amount" type="text" value = "' + amount[i] + '" class="form-control" /></td>'
                + '<td width="100">'
                + '<input name="installment" id="installment" type="text" value = "' + installment[i] + '" class="form-control" /></td>'
                + '<td width="100"><input name="startNo" id="startNo" type="text" value = "' + startNo[i] + '" class="form-control" /></td>'
                + '<td width="10"><input name="startDate" id="startDate" type="date" value = "' + startDate[i] + '" class="form-control" /></td>'
                + '<td width="250"><textarea rows="1" id="internalNote" cols="30" value = "' + internalNote[i] + '" class="form-control" type="textarea" name="internalNote">' + internalNote[i] + '</textarea></td>'
                + '<td><button type="button" class="btn btn-danger" onclick="removeRowRecurrence(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>'

        }
        document.getElementById('TextBoxContainer2').innerHTML = innerData;
    }
}

//Driver Recurrence -
var installment_Category = [];
var installment_Type = [];
var amount_recurrence = [];
var installment_sub = [];
var start_No = [];
var start_Date = [];
var internal_Note = [];
var counter2 = 0;
var counter3 = 0;
function recurrencesubstract() {
    var recurrencesubstract_id = document.getElementById('getnewaa').value;
    if (recurrencesubstract_id == 2) {
        recurrenceSubLength = document.getElementsByName('installment_Category').length - 1;

        for (var i = 0; i < document.getElementsByName('installment_Category').length; i++) {

            installment_Category[i] = document.getElementsByName('installment_Category')[i].value;
            installment_Type[i] = document.getElementsByName('installment_Type')[i].value;
            amount_recurrence[i] = document.getElementsByName('amount_recurrence')[i].value;
            installment_sub[i] = document.getElementsByName('installment_sub')[i].value;
            start_No[i] = document.getElementsByName('start_No')[i].value;
            start_Date[i] = document.getElementsByName('start_Date')[i].value;
            internal_Note[i] = document.getElementsByName('internal_Note')[i].value;
            if (val_installmentCategory(installment_Category[i])) {
                if (val_installmentType(installment_Type[i])) {
                    if (val_amount1(amount_recurrence[i])) {
                        if (val_installment(installment_sub[i])) {
                            if (val_startNo(start_No[i])) {
                                if (val_startDate(start_Date[i])) {
                                    if (val_internalNote1(internal_Note[i])) {
                                        counter2++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }
        if (counter2 == document.getElementsByName('installment_Category').length - 1) {
            $('#substractRecurrence').modal('hide');
        } else {
            swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
        }
    } else {
        for (var i = 0; i < document.getElementsByName('installment_Category').length; i++) {

            installment_Category[i] = document.getElementsByName('installment_Category')[i].value;
            installment_Type[i] = document.getElementsByName('installment_Type')[i].value;
            amount_recurrence[i] = document.getElementsByName('amount_recurrence')[i].value;
            installment_sub[i] = document.getElementsByName('installment_sub')[i].value;
            start_No[i] = document.getElementsByName('start_No')[i].value;
            start_Date[i] = document.getElementsByName('start_Date')[i].value;
            internal_Note[i] = document.getElementsByName('internal_Note')[i].value;
            if (val_installmentCategory(installment_Category[i])) {
                if (val_installmentType(installment_Type[i])) {
                    if (val_amount1(amount_recurrence[i])) {
                        if (val_installment(installment_sub[i])) {
                            if (val_startNo(start_No[i])) {
                                if (val_startDate(start_Date[i])) {
                                    if (val_internalNote1(internal_Note[i])) {
                                        counter3++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }
        if (counter3 == document.getElementsByName('installment_Category').length) {
            $('#substractRecurrence').modal('hide');
        } else {
            swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
        }
    }
}

function Recurrence_Fields() {
    if (installment_Category.length > 0) {
        var innerData = "";
        for (var i = 0; i < installment_Category.length; i++) {
            innerData += '<tr id="recurrencesubstract_add' + i + '">'
                + '<td width="150">'
                + '<input value = "' + installment_Category[i] + '" class="form-control" name="installment_Category" list="fixpay_cat"/></td>'
                + '<td width="150">'
                + '<input value = "' + installment_Type[i] + '" class="form-control" name="installment_Type" list="instatype"/></td>'
                + '<td width="100">'
                + '<input name="amount_recurrence" type="text" value = "' + amount_recurrence[i] + '" class="form-control" /></td>'
                + '<td width="100">'
                + '<input name="installment_sub" type="text" value = "' + installment_sub[i] + '" class="form-control" /></td>'
                + '<td width="100"><input name="start_No" type="text" value = "' + start_No[i] + '" class="form-control" /></td>'
                + '<td width="10"><input name="start_Date" type="date" value = "' + start_Date[i] + '" class="form-control" /></td>'
                + '<td width="250"><textarea rows="1" cols="30" value = "' + internal_Note[i] + '" class="form-control" type="textarea" name="internal_Note">' + internal_Note[i] + '</textarea></td>'
                + '<td><button type="button" class="btn btn-danger" onclick="recurrence_substract(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>'

        }

        document.getElementById('TextBoxContainer3').innerHTML = innerData;
    }
}

// driver data fetch
function getDriverValues(id) {
    $.ajax({
        url: './admin/driver_value.php?type=driverDataFetch',
        method: 'POST',
        data: {id: id},
        datatype: 'json',
        success: function (data) {
            var j = JSON.parse(data);

            $('#driverNameEdit').val(j.driverName);
            $('#driverUsernameEdit').val(j.driverUsername);
            $('#driverPasswordEdit').val(j.driverPassword);
            $('#driverTelephoneEdit').val(j.driverTelephone);
            $('#driverAltEdit').val(j.driverAlt);
            $('#driverEmailEdit').val(j.driverEmail);
            $('#driverAddressEdit').val(j.driverAddress);
            $('#driverLocationEdit').val(j.driverLocation);
            $('#driverZipEdit').val(j.driverZip);
            $('#driverStatusEdit').val(j.driverStatus);
            $('#driverSocialEdit').val(j.driverSocial);
            $('#dateOfbirthEdit').val(j.dateOfbirth);
            $('#dateOfhireEdit').val(j.dateOfhire);
            $('#driverLicenseNoEdit').val(j.driverLicenseNo);
            $('#driverLicenseIssueEdit').val(j.driverLicenseIssue);
            $('#driverLicenseExpEdit').val(j.driverLicenseExp);
            $('#driverLastMedicalEdit').val(j.driverLastMedical);
            $('#driverNextMedicalEdit').val(j.driverNextMedical);
            $('#driverLastDrugTestEdit').val(j.driverLastDrugTest);
            $('#driverNextDrugTestEdit').val(j.driverNextDrugTest);
            $('#passportExpiryEdit').val(j.passportExpiry);
            $('#fastCardExpiryEdit').val(j.fastCardExpiry);
            $('#hazmatExpiryEdit').val(j.hazmatExpiry);
            $('#rateEdit').val(j.rate);
            $('#driverCurrencyListEdit').val(j.currency);
            $('#terminationDateEdit').val(j.terminationDate);
            $('#driverUpdateID').val(j._id);
            $('#InternalNoteEdit').val(j.internalNote);
            loadedmiles = j.driverLoadedMile;
            emptymiles = j.driverEmptyMile;
            pickrate = j.pickupRate;
            pickstart = j.pickupAfter;
            droprate = j.dropRate;
            dropstart = j.dropAfter;
            driverTarp = j.tarp;

            // recurrence + array value
            for (let k = 0; k <= j.addRecLength - 1; k++) {
                installmentCategory[k] = j.installmentAdd[k];
                installmentType[k] = j.installmentTypAdd[k];
                amount[k] = j.amountStoAdd[k];
                installment[k] = j.installmentStoAdd[k];
                startNo[k] = j.startNoStoAdd[k];
                startDate[k] = j.startDateStoAdd[k];
                internalNote[k] = j.internalNoteStoAdd[k];
            }

            // recurrence - array value
            for (let l = 0; l <= j.subRecLength - 1; l++) {
                installment_Category[l] = j.installmentSub[l];
                installment_Type[l] = j.installmentTypSub[l];
                amount_recurrence[l] = j.amountStoSub[l];
                installment_sub[l] = j.installmentStoSub[l];
                start_No[l] = j.startNoStoSub[l];
                start_Date[l] = j.startDateStoSub[l];
                internal_Note[l] = j.internalNoteStoSub[l];
            }
        }
    });
}

//-------Recurence Code END----------

$(".toggle-password").click(function () {
    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
        input.attr("type", "text");
    } else {
        input.attr("type", "password");
    }
});

//-------Recurence Code Start----------
//Driver Recurrence +
var installmentCategory = [];
var installmentType = [];
var amount = [];
var installment = [];
var startNo = [];
var startDate = [];
var internalNote = [];

function getrecurrence() {
    var recurrence_id = document.getElementById('getnewaa').value;
    var counter = 0;
    var counter1 = 0;
    if (recurrence_id == 2) {
        for (var i = 0; i < document.getElementsByName('installmentCategory').length - 1; i++) {
            installmentCategory[i] = document.getElementsByName('installmentCategory')[i].value;
            installmentType[i] = document.getElementsByName('installmentType')[i].value;
            amount[i] = document.getElementsByName('amount')[i].value;
            installment[i] = document.getElementsByName('installment')[i].value;
            startNo[i] = document.getElementsByName('startNo')[i].value;
            startDate[i] = document.getElementsByName('startDate')[i].value;
            internalNote[i] = document.getElementsByName('internalNote')[i].value;
            if (val_installmentCategory(installmentCategory[i])) {
                if (val_installmentType(installmentType[i])) {
                    if (val_amount1(amount[i])) {
                        if (val_installment(installment[i])) {
                            if (val_startNo(val_startNo[i])) {
                                if (val_startDate(startDate[i])) {
                                    if (val_internalNote1(internalNote[i])) {
                                        counter++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }

        if (counter == document.getElementsByName('installmentCategory').length - 1) {
            $('#addRecurrence').modal('hide');
        } else {
            swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
        }

    } else {

        for (var i = 0; i < document.getElementsByName('installmentCategory').length; i++) {
            installmentCategory[i] = document.getElementsByName('installmentCategory')[i].value;
            installmentType[i] = document.getElementsByName('installmentType')[i].value;
            amount[i] = document.getElementsByName('amount')[i].value;
            installment[i] = document.getElementsByName('installment')[i].value;
            startNo[i] = document.getElementsByName('startNo')[i].value;
            startDate[i] = document.getElementsByName('startDate')[i].value;
            internalNote[i] = document.getElementsByName('internalNote')[i].value;
            if (val_installmentCategory(installmentCategory[i])) {
                if (val_installmentType(installmentType[i])) {
                    if (val_amount1(amount[i])) {
                        if (val_installment(installment[i])) {
                            if (val_startNo(val_startNo[i])) {
                                if (val_startDate(startDate[i])) {
                                    if (val_internalNote1(internalNote[i])) {
                                        counter1++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }
    }
    if (counter1 == document.getElementsByName('installmentCategory').length) {
        $('#addRecurrence').modal('hide');
    } else {
        swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
    }
}

function addRecurrenceFields() {
    if (installmentCategory.length > 0) {
        var innerData = "";
        for (var i = 0; i < installmentCategory.length; i++) {
            innerData += '<tr id="recurrence_add' + i + '">'
                + '<td width="150">'
                + '<input value = "' + installmentCategory[i] + '" id="installmentCategory" class="form-control" name="installmentCategory" list="fixpaycat"/></td>'
                + '<td width="150">'
                + '<select name="installmentType"' + i + '" value = "' + installmentType[i] + '" class="form-control">'
                + '<option value="" > Select Type</option>'
                + '<option value="Weekly"> Weekly</option>'
                + '<option value="Monthly"> Monthly</option>'
                + '<option value="Yearly"> Yearly</option>'
                + '<option value="Quartely"> Quartely</option>'
                + '</select></td>'
                + '<td width="100">'
                + '<input name="amount" id="amount" type="text" value = "' + amount[i] + '" class="form-control" /></td>'
                + '<td width="100">'
                + '<input name="installment" id="installment" type="text" value = "' + installment[i] + '" class="form-control" /></td>'
                + '<td width="100"><input name="startNo" id="startNo" type="text" value = "' + startNo[i] + '" class="form-control" /></td>'
                + '<td width="10"><input name="startDate" id="startDate" type="date" value = "' + startDate[i] + '" class="form-control" /></td>'
                + '<td width="250"><textarea rows="1" id="internalNote" cols="30" value = "' + internalNote[i] + '" class="form-control" type="textarea" name="internalNote">' + internalNote[i] + '</textarea></td>'
                + '<td><button type="button" class="btn btn-danger" onclick="removeRowRecurrence(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>'

        }

        document.getElementById('TextBoxContainer2').innerHTML = innerData;
        for (var i = 0; i < installmentCategory.length - 1; i++) {
            var id = "installmentType" + i;
            if (installmentType[i] == "Weekly") {
                document.getElementById(id).selectedIndex = "1";
            } else if (installmentType[i] == "Monthly") {
                document.getElementById(id).selectedIndex = "2";
            } else if (installmentType[i] == "Yearly") {
                document.getElementById(id).selectedIndex = "3";
            } else if (installmentType[i] == "Quarterly") {
                document.getElementById(id).selectedIndex = "4";
            }

        }
    }

}

//Driver Recurrence -
var installment_Category = [];
var installment_Type = [];
var amount_recurrence = [];
var installment_sub = [];
var start_No = [];
var start_Date = [];
var internal_Note = [];
var counter2 = 0;
var counter3 = 0;

function recurrencesubstract() {
    var recurrencesubstract_id = document.getElementById('getnewaa').value;
    if (recurrencesubstract_id == 2) {
        for (var i = 0; i < document.getElementsByName('installment_Category').length - 1; i++) {
            installment_Category[i] = document.getElementsByName('installment_Category')[i].value;
            installment_Type[i] = document.getElementsByName('installment_Type')[i].value;
            amount_recurrence[i] = document.getElementsByName('amount_recurrence')[i].value;
            installment_sub[i] = document.getElementsByName('installment_sub')[i].value;
            start_No[i] = document.getElementsByName('start_No')[i].value;
            start_Date[i] = document.getElementsByName('start_Date')[i].value;
            internal_Note[i] = document.getElementsByName('internal_Note')[i].value;
            if (val_installmentCategory(installment_Category[i])) {
                if (val_installmentType(installment_Type[i])) {
                    if (val_amount1(amount_recurrence[i])) {
                        if (val_installment(installment_sub[i])) {
                            if (val_startNo(start_No[i])) {
                                if (val_startDate(start_Date[i])) {
                                    if (val_internalNote1(internal_Note[i])) {
                                        counter2++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }

        if (counter2 == document.getElementsByName('installment_Category').length - 1) {
            $('#substractRecurrence').modal('hide');
        } else {
            swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
        }
    } else {
        for (var i = 0; i < document.getElementsByName('installment_Category').length; i++) {
            installment_Category[i] = document.getElementsByName('installment_Category')[i].value;
            installment_Type[i] = document.getElementsByName('installment_Type')[i].value;
            amount_recurrence[i] = document.getElementsByName('amount_recurrence')[i].value;
            installment_sub[i] = document.getElementsByName('installment_sub')[i].value;
            start_No[i] = document.getElementsByName('start_No')[i].value;
            start_Date[i] = document.getElementsByName('start_Date')[i].value;
            internal_Note[i] = document.getElementsByName('internal_Note')[i].value;
            if (val_installmentCategory(installment_Category[i])) {
                if (val_installmentType(installment_Type[i])) {
                    if (val_amount1(amount_recurrence[i])) {
                        if (val_installment(installment_sub[i])) {
                            if (val_startNo(start_No[i])) {
                                if (val_startDate(start_Date[i])) {
                                    if (val_internalNote1(internal_Note[i])) {
                                        counter2++;
                                    } else {
                                        break;
                                    }
                                } else {
                                    break;
                                }
                            } else {
                                break;
                            }
                        } else {
                            break;
                        }
                    } else {
                        break;
                    }
                } else {
                    break;
                }
            } else {
                break;
            }
        }
        if (counter2 == document.getElementsByName('installment_Category').length) {
            $('#substractRecurrence').modal('hide');
        } else {
            swal('<h5>Please Fill all Fields !!!</h5>', '', 'question');
        }
    }
}

function Recurrence_Fields() {
    if (installment_Category.length > 0) {
        var innerData = "";
        for (var i = 0; i < installment_Category.length; i++) {
            innerData += '<tr id="recurrencesubstract_add' + i + '">'
                + '<td width="150">'
                + '<input value = "' + installment_Category[i] + '" class="form-control" name="installment_Category" list="fixpay_cat"/></td>'
                + '<td width="150">'
                + '<select name="installment_Type" id="installment_Type' + i + '" value = "' + installment_Type[i] + '" class="form-control">'
                + '<option value="" > Select Type</option>'
                + '<option value="Weekly" > Weekly</option>'
                + '<option value="Monthly"> Monthly</option>'
                + '<option value="Yearly"> Yearly</option>'
                + '<option value="Quartely"> Quartely</option>'
                + '</select></td>'
                + '<td width="100">'
                + '<input name="amount_recurrence" type="text" value = "' + amount_recurrence[i] + '" class="form-control" /></td>'
                + '<td width="100">'
                + '<input name="installment_sub" type="text" value = "' + installment_sub[i] + '" class="form-control" /></td>'
                + '<td width="100"><input name="start_No" type="text" value = "' + start_No[i] + '" class="form-control" /></td>'
                + '<td width="10"><input name="start_Date" type="date" value = "' + start_Date[i] + '" class="form-control" /></td>'
                + '<td width="250"><textarea rows="1" cols="30" value = "' + internal_Note[i] + '" class="form-control" type="textarea" name="internal_Note">' + internal_Note[i] + '</textarea></td>'
                + '<td><button type="button" class="btn btn-danger" onclick="recurrence_substract(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>'

        }

        document.getElementById('TextBoxContainer3').innerHTML = innerData;
        for (var i = 0; i < installment_Category.length - 1; i++) {
            var id = "installment_Type" + i;
            if (installment_Type[i] == "Weekly") {
                document.getElementById(id).selectedIndex = "1";
            } else if (installment_Type[i] == "Monthly") {
                document.getElementById(id).selectedIndex = "2";
            } else if (installment_Type[i] == "Yearly") {
                document.getElementById(id).selectedIndex = "3";
            } else if (installment_Type[i] == "Quarterly") {
                document.getElementById(id).selectedIndex = "4";
            }

        }
    }
}

//-------Recurence Code END----------

function addDriver() {
    var companyId = document.getElementById('companyId').value;
    var driverName = document.getElementById('driverName').value;
    var driverUsername = document.getElementById('driverUsername').value;
    var driverPassword = document.getElementById('driverPassword').value;
    var driverTelephone = document.getElementById('driverTelephone').value;
    var driverAlt = document.getElementById('driverAlt').value;
    var driverEmail = document.getElementById('driverEmail').value;
    var driverAddress = document.getElementById('driverAddress').value;
    var driverLocation = document.getElementById('driverLocation').value;
    var driverZip = document.getElementById('driverZip').value;
    var driverStatus = document.getElementById('driverStatus').value;
    var driverSocial = document.getElementById('driverSocial').value;
    var dateOfbirth = document.getElementById('dateOfbirth').value;
    var dateOfhire = document.getElementById('dateOfhire').value;
    var driverLicenseNo = document.getElementById('driverLicenseNo').value;
    var driverLicenseIssue = document.getElementById('driverLicenseIssue').value;
    var driverLicenseExp = document.getElementById('driverLicenseExp').value;
    var driverLastMedical = document.getElementById('driverLastMedical').value;
    var driverNextMedical = document.getElementById('driverNextMedical').value;
    var driverLastDrugTest = document.getElementById('driverLastDrugTest').value;
    var driverNextDrugTest = document.getElementById('driverNextDrugTest').value;
    var passportExpiry = document.getElementById('passportExpiry').value;
    var fastCardExpiry = document.getElementById('fastCardExpiry').value;
    var hazmatExpiry = document.getElementById('hazmatExpiry').value;
    var rate = document.getElementById('rate').value;
    var currency_1 = document.getElementById('currency').value;
    var currency1 = currency_1.split(')');
    var currency = currency1[0];

    var driverLoadedMile = loadedmiles;
    var driverEmptyMile = emptymiles;

    if (pickrate == '') {
        var pickupRate = 0;
    } else {
        var pickupRate = pickrate;
    }

    if (pickstart == '') {
        var pickupAfter = 0;
    } else {
        var pickupAfter = pickstart;
    }

    if (droprate == '') {
        var dropRate = 0;
    } else {
        var dropRate = droprate;
    }

    if (dropstart == '') {
        var dropAfter = 0;
    } else {
        var dropAfter = dropstart;
    }

    var tarp = driverTarp;
    var terminationDate = document.getElementById('terminationDate').value;
    var InternalNote = document.getElementById('InternalNote').value;

    for (var i = 0; i < recurrenceAddLength; i++) {
        installmentCategoryStore[i] = installmentCategory[i];
        installmentTypeStore[i] = installmentType[i];
        amountStore[i] = amount[i];
        installmentStore[i] = installment[i];
        startNoStore[i] = startNo[i];
        startDateStore[i] = startDate[i];
        internalNoteStore[i] = internalNote[i];
    }

    for (var i = 0; i < recurrenceSubLength; i++) {
        installmentCategory_Store[i] = installment_Category[i];
        installmentType_Store[i] = installment_Type[i];
        amount_Store[i] = amount_recurrence[i];
        installment_Store[i] = installment_sub[i];
        startNo_Store[i] = start_No[i];
        startDate_Store[i] = start_Date[i];
        internalNote_Store[i] = internal_Note[i];
    }


    $.ajax({
        url: 'admin/driver_driver.php?type=' + 'addDriver',
        method: 'POST',
        data: {
            companyId: companyId,
            driverName: driverName,
            driverUsername: driverUsername,
            driverPassword: driverPassword,
            driverTelephone: driverTelephone,
            driverAlt: driverAlt,
            driverEmail: driverEmail,
            driverAddress: driverAddress,
            driverLocation: driverLocation,
            driverZip: driverZip,
            driverStatus: driverStatus,
            driverSocial: driverSocial,
            dateOfbirth: dateOfbirth,
            dateOfhire: dateOfhire,
            driverLicenseNo: driverLicenseNo,
            driverLicenseIssue: driverLicenseIssue,
            driverLicenseExp: driverLicenseExp,
            driverLastMedical: driverLastMedical,
            driverNextMedical: driverNextMedical,
            driverLastDrugTest: driverLastDrugTest,
            driverNextDrugTest: driverNextDrugTest,
            passportExpiry: passportExpiry,
            fastCardExpiry: fastCardExpiry,
            hazmatExpiry: hazmatExpiry,

            rate: rate,
            currency: currency,
            driverLoadedMile: driverLoadedMile,
            driverEmptyMile: driverEmptyMile,
            pickupRate: pickupRate,
            pickupAfter: pickupAfter,
            dropRate: dropRate,
            dropAfter: dropAfter,
            tarp: tarp,
            terminationDate: terminationDate,
            InternalNote: InternalNote,

            installmentCategoryStore: installmentCategoryStore,
            installmentTypeStore: installmentTypeStore,
            amountStore: amountStore,
            installmentStore: installmentStore,
            startNoStore: startNoStore,
            startDateStore: startDateStore,
            internalNoteStore: internalNoteStore,

            installmentCategory_Store: installmentCategory_Store,
            installmentType_Store: installmentType_Store,
            amount_Store: amount_Store,
            installment_Store: installment_Store,
            startNo_Store: startNo_Store,
            startDate_Store: startDate_Store,
            internalNote_Store: internalNote_Store,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('driver').child(companyid).set({
                data: randomString(),
            });

            // recurrence + array null
            installmentCategory = [];
            installmentType = [];
            amount = [];
            installment = [];
            startNo = [];
            startDate = [];
            internalNote = [];

            // recurrence - array null
            installment_Category = [];
            installment_Type = [];
            amount_recurrence = [];
            installment_sub = [];
            start_No = [];
            start_Date = [];
            internal_Note = [];

            swal('Success', data, 'success');
            $('#add_Driver').modal('hide');
        }
    });
}

function DriverUpdateDetail() {
    var driver_id = document.getElementById('driverUpdateID').value;
    var driverName = document.getElementById('driverNameEdit').value;
    var driverUsername = document.getElementById('driverUsernameEdit').value;
    var driverPassword = document.getElementById('driverPasswordEdit').value;
    var driverTelephone = document.getElementById('driverTelephoneEdit').value;
    var driverAlt = document.getElementById('driverAltEdit').value;
    var driverEmail = document.getElementById('driverEmailEdit').value;
    var driverAddress = document.getElementById('driverAddressEdit').value;
    var driverLocation = document.getElementById('driverLocationEdit').value;
    var driverZip = document.getElementById('driverZipEdit').value;
    var driverStatus = document.getElementById('driverStatusEdit').value;
    var driverSocial = document.getElementById('driverSocialEdit').value;
    var dateOfbirth = document.getElementById('dateOfbirthEdit').value;
    var dateOfhire = document.getElementById('dateOfhireEdit').value;
    var driverLicenseNo = document.getElementById('driverLicenseNoEdit').value;
    var driverLicenseIssue = document.getElementById('driverLicenseIssueEdit').value;
    var driverLicenseExp = document.getElementById('driverLicenseExpEdit').value;
    var driverLastMedical = document.getElementById('driverLastMedicalEdit').value;
    var driverNextMedical = document.getElementById('driverNextMedicalEdit').value;
    var driverLastDrugTest = document.getElementById('driverLastDrugTestEdit').value;
    var driverNextDrugTest = document.getElementById('driverNextDrugTestEdit').value;
    var passportExpiry = document.getElementById('passportExpiryEdit').value;
    var fastCardExpiry = document.getElementById('fastCardExpiryEdit').value;
    var hazmatExpiry = document.getElementById('hazmatExpiryEdit').value;
    var rate = document.getElementById('rateEdit').value;

    var currency_1 = document.getElementById('driverCurrencyListEdit').value;
    var currency1 = currency_1.split(')');
    var currency = currency1[0];

    var terminationDate = document.getElementById('terminationDateEdit').value;
    var InternalNote = document.getElementById('InternalNoteEdit').value;

    var driverLoadedMile = loadedmiles;
    var driverEmptyMile = emptymiles;

    if (pickrate == '') {
        var pickupRate = 0;
    } else {
        var pickupRate = pickrate;
    }

    if (pickstart == '') {
        var pickupAfter = 0;
    } else {
        var pickupAfter = pickstart;
    }

    if (droprate == '') {
        var dropRate = 0;
    } else {
        var dropRate = droprate;
    }

    if (dropstart == '') {
        var dropAfter = 0;
    } else {
        var dropAfter = dropstart;
    }
    var tarp = driverTarp;

    for (var i = 0; i <= installmentCategory.length; i++) {

        AddinstallmentCategoryStore[i] = installmentCategory[i];
        AddinstallmentTypeStore[i] = installmentType[i];
        AddamountStore[i] = amount[i];
        AddinstallmentStore[i] = installment[i];
        AddstartNoStore[i] = startNo[i];
        AddstartDateStore[i] = startDate[i];
        AddinternalNoteStore[i] = internalNote[i];
    }

    for (var i = 0; i < installment_Category.length; i++) {
        SubinstallmentCategory_Store[i] = installment_Category[i];
        SubinstallmentType_Store[i] = installment_Type[i];
        Subamount_Store[i] = amount_recurrence[i];
        Subinstallment_Store[i] = installment_sub[i];
        SubstartNo_Store[i] = start_No[i];
        SubstartDate_Store[i] = start_Date[i];
        SubinternalNote_Store[i] = internal_Note[i];
    }

    $.ajax({
        url: 'admin/driver_driver.php?type=driverUpdateId',
        method: 'POST',
        data: {
            driver_id: driver_id,
            driverName: driverName,
            driverUsername: driverUsername,
            driverPassword: driverPassword,
            driverTelephone: driverTelephone,
            driverAlt: driverAlt,
            driverEmail: driverEmail,
            driverAddress: driverAddress,
            driverLocation: driverLocation,
            driverZip: driverZip,
            driverStatus: driverStatus,
            driverSocial: driverSocial,
            dateOfbirth: dateOfbirth,
            dateOfhire: dateOfhire,
            driverLicenseNo: driverLicenseNo,
            driverLicenseIssue: driverLicenseIssue,
            driverLicenseExp: driverLicenseExp,
            driverLastMedical: driverLastMedical,
            driverNextMedical: driverNextMedical,
            driverLastDrugTest: driverLastDrugTest,
            driverNextDrugTest: driverNextDrugTest,
            passportExpiry: passportExpiry,
            fastCardExpiry: fastCardExpiry,
            hazmatExpiry: hazmatExpiry,
            rate: rate,
            currency: currency,
            terminationDate: terminationDate,
            InternalNote: InternalNote,

            driverLoadedMile: driverLoadedMile,
            driverEmptyMile: driverEmptyMile,
            pickupRate: pickupRate,
            pickupAfter: pickupAfter,
            dropRate: dropRate,
            dropAfter: dropAfter,
            tarp: tarp,

            installmentCategoryStore: AddinstallmentCategoryStore,
            installmentTypeStore: AddinstallmentTypeStore,
            amountStore: AddamountStore,
            installmentStore: AddinstallmentStore,
            startNoStore: AddstartNoStore,
            startDateStore: AddstartDateStore,
            internalNoteStore: AddinternalNoteStore,

            installmentCategory_Store: SubinstallmentCategory_Store,
            installmentType_Store: SubinstallmentType_Store,
            amount_Store: Subamount_Store,
            installment_Store: Subinstallment_Store,
            startNo_Store: SubstartNo_Store,
            startDate_Store: SubstartDate_Store,
            internalNote_Store: SubinternalNote_Store,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('driver').child(companyid).set({
                data: randomString(),
            });

            // recurrence + array null
            installmentCategory = [];
            installmentType = [];
            amount = [];
            installment = [];
            startNo = [];
            startDate = [];
            internalNote = [];

            // recurrence - array null
            installment_Category = [];
            installment_Type = [];
            amount_recurrence = [];
            installment_sub = [];
            start_No = [];
            start_Date = [];
            internal_Note = [];

            swal('Success', data, 'success');
            $('#edit_Driver').modal('hide');
        }
    });
}

//update driver table
var driver_path = "driver/";
var driver_path1 = $('#companyid').val();
var driver_data = driver_path1.toString();
var driver_test = driver_path + driver_data;


database.ref(driver_test).on('child_added', function (data) {
    updateDriverTable();
});
database.ref(driver_test).on('child_changed', function (data) {
    updateDriverTable();
});
database.ref(driver_test).on('child_removed', function (data) {
    updateDriverTable();
});

//update table fields
function updateDriverTable() {
    var driverBody = document.getElementById('driverBody');
    var driverList = document.getElementById('browsersdriver');
    $.ajax({
        url: 'admin/utils/getDriver.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split('^');
            if (driverBody != null) {
                driverBody.innerHTML = res[0];
            }
            if (driverList != null) {
                driverList.innerHTML = res[1];
            }
        },
    });
}

// Import function
function importDriver() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'admin/driver_driver.php?type=' + 'importDriver',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal('Success', data, 'success');
        }
    });
}

// Edit function
function updateDriver(column, id) {
    var data = $('#driver_table').find('input[type="text"],textarea').val();

    var companyId = $('#companyid').val();

    $.ajax({
        url: 'admin/driver_driver.php?type=' + 'editDriver',
        type: 'POST',
        data: {
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('driver').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

// Delete function
function deleteDriver(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'admin/driver_driver.php?type=' + 'delete_Driver',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('driver').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

// Export function
function export_Driver(id) {

    $.ajax({
        url: 'admin/driver_driver.php?type=' + 'export_driver',
        data: {companyid: id},
        type: 'POST',
        success: function (data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "driver.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*------------------- Driver End -----------------------------*/

/*------------------- Owner Operator Driver Start-----------------------------*/

// Add Function
function addOwnerOperator() {

    var driverName = document.getElementById('driverNames').value;
    var percentage = document.getElementById('percentage').value;
    var truckNo = document.getElementById('truckNo').value;
    var installmentCategory = [];
    var installmentType = [];
    var amount = [];
    var installment = [];
    var startNo = [];
    var startDate = [];
    var internalNote = [];

    for (var i = 0; i < document.getElementsByName('installmentCategory').length; i++) {
        installmentCategory[i] = document.getElementsByName('installmentCategory')[i].value;
    }
    for (var i = 0; i < document.getElementsByName('installmentType').length; i++) {
        installmentType[i] = document.getElementsByName('installmentType')[i].value;
    }
    for (var i = 0; i < document.getElementsByName('amount').length; i++) {
        amount[i] = document.getElementsByName('amount')[i].value;
    }
    for (var i = 0; i < document.getElementsByName('installment').length; i++) {
        installment[i] = document.getElementsByName('installment')[i].value;
    }
    for (var i = 0; i < document.getElementsByName('startNo').length; i++) {
        startNo[i] = document.getElementsByName('startNo')[i].value;
    }
    for (var i = 0; i < document.getElementsByName('startDate').length; i++) {
        startDate[i] = document.getElementsByName('startDate')[i].value;
    }
    for (var i = 0; i < document.getElementsByName('internalNote').length; i++) {
        internalNote[i] = document.getElementsByName('internalNote')[i].value;
    }

    $.ajax({
        url: 'admin/owner_operator_driver.php?type=' + 'addOwner',
        method: 'POST',
        data: {
            driverName: driverName,
            percentage: percentage,
            truckNo: truckNo,
            installmentCategory: installmentCategory,
            installmentType: installmentType,
            amount: amount,
            installment: installment,
            startNo: startNo,
            startDate: startDate,
            internalNote: internalNote,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('owner').child(companyid).set({
                data: randomString(),
            });
            swal('Success', data, 'success');
            $("#Owner_operator").modal("hide");

        }
    });


}

//update driver table
var owner_path = "owner/";
var owner_path1 = $('#companyid').val();
var owner_data = owner_path1.toString();
var owner_test = owner_path + owner_data;


database.ref(owner_test).on('child_added', function (data) {
    updateOwnerTable();
});
database.ref(owner_test).on('child_changed', function (data) {
    updateOwnerTable();
});
database.ref(owner_test).on('child_removed', function (data) {
    updateOwnerTable();
});

//update table fields
function updateOwnerTable() {
    var ownerList = document.getElementById('browsersowner');
    $.ajax({
        url: 'admin/utils/getOwnerOperator.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            if (ownerList != null) {
                ownerList.innerHTML = response;
            }
        },
    });
}

/*----------------- External Carrier Starts --------------------*/
function toggleCarrier(val) {

    var name = document.getElementById('carrierName').value;
    var address = document.getElementById('carrierAddress').value;
    var location = document.getElementById('carrierLocation').value;
    var zip = document.getElementById('carrierZip').value;
    var email = document.getElementById('carrierEmail').value;
    var telephone = document.getElementById('carrierTelephone').value;
    var taxID = document.getElementById('carrierTaxID').value;
    var mc = document.getElementById('carrierMC').value;
    var dot = document.getElementById('carrierDOT').value;

    if (val == 'first') {
        if (val_carrName(name)) {
            if (val_carrAddress(address)) {
                if (val_carrLocation(location)) {
                    if (val_carrZip(zip)) {
                        if (val_carrEmail(email)) {
                            if (val_carrTelephone(telephone)) {
                                if (val_carrTaxID(taxID)) {
                                    if (val_carrMC(mc)) {
                                        if (val_carrDOT(dot)) {

                                            $("#carrier").toggleClass("show");
                                            $("#carrier").toggleClass("active");
                                            $("#insurance").toggleClass("show");
                                            $("#insurance").toggleClass("active");
                                            $("#home-tab").toggleClass("active");
                                            $("#insurance-tab").toggleClass("active");
                                            // $("#accounting").toggleClass("show");
                                            // $("#accounting").toggleClass("active");
                                            // $("#equipment").toggleClass("show");
                                            // $("#equipment").toggleClass("active");


                                            if ($("#home-tab").attr("aria-selected") === 'true') {
                                                $("#home-tab").attr("aria-selected", "false");
                                            } else {
                                                $("#home-tab").attr("aria-selected", "true");
                                            }

                                            if ($("#insurance-tab").attr("aria-selected") === 'true') {
                                                $("#insurance-tab").attr("aria-selected", "false");
                                            } else {
                                                $("#insurance-tab").attr("aria-selected", "true");
                                            }

                                            $("#home-title").toggleClass("show");
                                            $("#insurance-title").toggleClass("show");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    } else if (val == 'second') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#equipment-tab").attr("aria-selected") === 'true') {
            $("#equipment-tab").attr("aria-selected", "false");
        } else {
            $("#equipment-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#equipment-title").toggleClass("show");
    } else if (val == 'fourth') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#equipment-tab").attr("aria-selected") === 'true') {
            $("#equipment-tab").attr("aria-selected", "false");
        } else {
            $("#equipment-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#equipment-title").toggleClass("show");
    }
}

function togglePrev(val) {
    if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'second') {
        $("#carrier").toggleClass("show");
        $("#carrier").toggleClass("active");
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#home-tab").toggleClass("active");
        $("#insurance-tab").toggleClass("active");

        if ($("#home-tab").attr("aria-selected") === 'true') {
            $("#home-tab").attr("aria-selected", "false");
        } else {
            $("#home-tab").attr("aria-selected", "true");
        }

        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }

        $("#home-title").toggleClass("show");
        $("#insurance-title").toggleClass("show");
    }
}

function toggleAll(val) {
    if ($("#carrier").hasClass("show")) {
        $("#carrier").toggleClass("show");
    }
    if ($("#carrier").hasClass("active")) {
        $("#carrier").toggleClass("active");
    }
    if ($("#insurance").hasClass("show")) {
        $("#insurance").toggleClass("show");
    }
    if ($("#insurance").hasClass("active")) {
        $("#insurance").toggleClass("active");
    }
    if ($("#accounting").hasClass("show")) {
        $("#accounting").toggleClass("show");
    }
    if ($("#accounting").hasClass("active")) {
        $("#accounting").toggleClass("active");
    }
    if ($("#equipment").hasClass("show")) {
        $("#equipment").toggleClass("show");
    }
    if ($("#equipment").hasClass("active")) {
        $("#equipment").toggleClass("active");
    }
    if ($("#home-tab").hasClass("active")) {
        $("#home-tab").toggleClass("active");
    }
    if ($("#insurance-tab").hasClass("active")) {
        $("#insurance-tab").toggleClass("active");
    }
    if ($("#accounting-tab").hasClass("active")) {
        $("#accounting-tab").toggleClass("active");
    }
    if ($("#equipment-tab").hasClass("active")) {
        $("#equipment-tab").toggleClass("active");
    }
    if ($("#home-title").hasClass("show")) {
        $("#home-title").toggleClass("show");
    }
    if ($("#insurance-title").hasClass("show")) {
        $("#insurance-title").toggleClass("show");
    }
    if ($("#accounting-title").hasClass("show")) {
        $("#accounting-title").toggleClass("show");
    }
    if ($("#equipment-title").hasClass("show")) {
        $("#equipment-title").toggleClass("show");
    }

    if ($("#home-tab").attr("aria-selected") === 'true') {
        $("#home-tab").attr("aria-selected", "false");
    } else {
        $("#home-tab").attr("aria-selected", "true");
    }

    if ($("#insurance-tab").attr("aria-selected") === 'true') {
        $("#insurance-tab").attr("aria-selected", "false");
    } else {
        $("#insurance-tab").attr("aria-selected", "true");
    }

    if ($("#accounting-tab").attr("aria-selected") === 'true') {
        $("#accounting-tab").attr("aria-selected", "false");
    } else {
        $("#accounting-tab").attr("aria-selected", "true");
    }

    if ($("#equipment-tab").attr("aria-selected") === 'true') {
        $("#equipment-tab").attr("aria-selected", "false");
    } else {
        $("#equipment-tab").attr("aria-selected", "true");
    }

    if (val == 'first') {
        $("#carrier").toggleClass("show");
        $("#carrier").toggleClass("active");
        $("#home-tab").toggleClass("active");
        $("#home-title").toggleClass("show");
    } else if (val == 'second') {
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#accounting-title").toggleClass("show");
    } else if (val == 'fourth') {
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        $("#equipment-title").toggleClass("show");
    }

}

function setMobileInsurer(val) {
    var checkBox = document.getElementById('customCheck9');
    if (checkBox.checked == true) {
        document.getElementById('insuranceCompany').value = document.getElementById('liabilityCompany').value;
        document.getElementById('insurancePolicy').value = document.getElementById('liabilityPolicy').value;
        document.getElementById('insuranceExpDate').value = document.getElementById('liabilityExpDate').value;
        document.getElementById('insuranceTelephone').value = document.getElementById('liabilityTelephone').value;
        document.getElementById('insuranceExt').value = document.getElementById('liabilityEXT').value;
        document.getElementById('insuranceContactName').value = document.getElementById('liabilityContact').value;
        document.getElementById('insuranceAmt').value = document.getElementById('liabilityAmount').value;
        document.getElementById('insuranceNotes').value = document.getElementById('liabilityNotes').value;
    } else {
        document.getElementById('insuranceCompany').value = "";
        document.getElementById('insurancePolicy').value = "";
        document.getElementById('insuranceExpDate').value = "";
        document.getElementById('insuranceTelephone').value = "";
        document.getElementById('insuranceExt').value = "";
        document.getElementById('insuranceContactName').value = "";
        document.getElementById('insuranceAmt').value = "";
        document.getElementById('insuranceNotes').value = "";
    }
}

function setCargoInsurer() {
    var checkBox = document.getElementById('customCheck10');
    if (checkBox.checked == true) {
        document.getElementById('cargoName').value = document.getElementById('liabilityCompany').value;
        document.getElementById('cargoPolicy').value = document.getElementById('liabilityPolicy').value;
        document.getElementById('cargoExpDate').value = document.getElementById('liabilityExpDate').value;
        document.getElementById('cargoTelephone').value = document.getElementById('liabilityTelephone').value;
        document.getElementById('cargoExt').value = document.getElementById('liabilityEXT').value;
        document.getElementById('cargoContactName').value = document.getElementById('liabilityContact').value;
        document.getElementById('cargoInsuranceAmount').value = document.getElementById('liabilityAmount').value;
        document.getElementById('cargoNotes').value = document.getElementById('liabilityNotes').value;
    } else {
        document.getElementById('cargoName').value = "";
        document.getElementById('cargoPolicy').value = "";
        document.getElementById('cargoExpDate').value = "";
        document.getElementById('cargoTelephone').value = "";
        document.getElementById('cargoExt').value = "";
        document.getElementById('cargoContactName').value = "";
        document.getElementById('cargoInsuranceAmount').value = "";
        document.getElementById('cargoNotes').value = "";
    }
}

function addCarrier() {
    var carrierName = document.getElementById('carrierName').value;
    var companyId = document.getElementById('companyId').value;
    var carrierAddress = document.getElementById('carrierAddress').value;
    var carrierLocation = document.getElementById('carrierLocation').value;
    var carrierZip = document.getElementById('carrierZip').value;
    var carrierContactName = document.getElementById('carrierContactName').value;
    var carrierEmail = document.getElementById('carrierEmail').value;
    var carrierTelephone = document.getElementById('carrierTelephone').value;
    var carrierExt = document.getElementById('carrierExt').value;
    var carrierTollFree = document.getElementById('carrierTollFree').value;
    var carrierFax = document.getElementById('carrierFax').value;

    var carrierPayTerms1 = document.getElementById('carrierPayTerms').value;
    var carrierPay_Terms = carrierPayTerms1.split(")");
    var carrierPayTerms = carrierPay_Terms[0];

    var carrierTaxID = document.getElementById('carrierTaxID').value;
    var carrierMC = document.getElementById('carrierMC').value;
    var carrierDOT = document.getElementById('carrierDOT').value;

    var carrierFactoring1 = document.getElementById('carrierFactoring').value;
    var carrier_Factoring = carrierFactoring1.split(")");
    var carrierFactoring = carrier_Factoring[0];

    var carrierNotes = document.getElementById('carrierNotes').value;
    var carrierBlacklisted = "on";
    if (document.getElementById('carrierBlacklisted').checked == true) {
        carrierBlacklisted = "on";
    } else {
        carrierBlacklisted = "off";
    }
    var carrierCorporation = document.getElementById('carrierCorporation').value;
    var liabilityCompany = document.getElementById('liabilityCompany').value;
    var liabilityPolicy = document.getElementById('liabilityPolicy').value;
    var liabilityExpDate = document.getElementById('liabilityExpDate').value;
    var liabilityTelephone = document.getElementById('liabilityTelephone').value;
    var liabilityEXT = document.getElementById('liabilityEXT').value;
    var liabilityContact = document.getElementById('liabilityContact').value;
    var liabilityAmount = document.getElementById('liabilityAmount').value;
    var liabilityNotes = document.getElementById('liabilityNotes').value;
    var insuranceCompany = document.getElementById('insuranceCompany').value;
    var insurancePolicy = document.getElementById('insurancePolicy').value;
    var insuranceExpDate = document.getElementById('insuranceExpDate').value;
    var insuranceTelephone = document.getElementById('insuranceTelephone').value;
    var insuranceExt = document.getElementById('insuranceExt').value;
    var insuranceContactName = document.getElementById('insuranceContactName').value;
    var insuranceAmt = document.getElementById('insuranceAmt').value;
    var insuranceNotes = document.getElementById('insuranceNotes').value;
    var cargoName = document.getElementById('cargoName').value;
    var cargoPolicy = document.getElementById('cargoPolicy').value;
    var cargoExpDate = document.getElementById('cargoExpDate').value;
    var cargoTelephone = document.getElementById('cargoTelephone').value;
    var cargoExt = document.getElementById('cargoExt').value;
    var cargoContactName = document.getElementById('cargoContactName').value;
    var cargoInsuranceAmount = document.getElementById('cargoInsuranceAmount').value;
    var cargoNotes = document.getElementById('cargoNotes').value;
    var wsib = document.getElementById('wsib').value;
    var primaryName = document.getElementById('primaryName').value;
    var primaryTelephone = document.getElementById('primaryTelephone').value;
    var primaryEmail = document.getElementById('primaryEmail').value;
    var secondaryName = document.getElementById('secondaryName').value;
    var secondaryTelephone = document.getElementById('secondaryTelephone').value;
    var secondaryEmail = document.getElementById('secondaryEmail').value;
    var primaryNotes = document.getElementById('primaryNotes').value;
    var sizeOfFleet = document.getElementById('sizeOfFleet').value;
    var equipment = [];
    for (var i = 0; i < document.getElementsByName('equipment').length; i++) {
        equipment[i] = document.getElementsByName('equipment')[i].value;
    }
    var quantity = [];
    for (var i = 0; i < document.getElementsByName('quantity').length; i++) {
        quantity[i] = document.getElementsByName('quantity')[i].value;
    }
    $.ajax({
        url: 'admin/carrier_driver.php?type=' + 'add_carrier',
        type: 'POST',
        data: {
            carrierName: carrierName,
            companyID: companyId,
            carrierAddress: carrierAddress,
            carrierLocation: carrierLocation,
            carrierZip: carrierZip,
            carrierContactName: carrierContactName,
            carrierEmail: carrierEmail,
            carrierTelephone: carrierTelephone,
            carrierExt: carrierExt,
            carrierTollFree: carrierTollFree,
            carrierFax: carrierFax,
            carrierPayTerms: carrierPayTerms,
            carrierTaxID: carrierTaxID,
            carrierMC: carrierMC,
            carrierDOT: carrierDOT,
            carrierFactoring: carrierFactoring,
            carrierNotes: carrierNotes,
            carrierBlacklisted: carrierBlacklisted,
            carrierCorporation: carrierCorporation,
            liabilityCompany: liabilityCompany,
            liabilityPolicy: liabilityPolicy,
            liabilityExpDate: liabilityExpDate,
            liabilityTelephone: liabilityTelephone,
            liabilityEXT: liabilityEXT,
            liabilityContact: liabilityContact,
            liabilityAmount: liabilityAmount,
            liabilityNotes: liabilityNotes,
            insuranceCompany: insuranceCompany,
            insurancePolicy: insurancePolicy,
            insuranceExpDate: insuranceExpDate,
            insuranceTelephone: insuranceTelephone,
            insuranceExt: insuranceExt,
            insuranceContactName: insuranceContactName,
            insuranceAmt: insuranceAmt,
            insuranceNotes: insuranceNotes,
            cargoName: cargoName,
            cargoPolicy: cargoPolicy,
            cargoExpDate: cargoExpDate,
            cargoTelephone: cargoTelephone,
            cargoExt: cargoExt,
            cargoContactName: cargoContactName,
            cargoInsuranceAmount: cargoInsuranceAmount,
            cargoNotes: cargoNotes,
            wsib: wsib,
            primaryName: primaryName,
            primaryTelephone: primaryTelephone,
            primaryEmail: primaryEmail,
            secondaryName: secondaryName,
            secondaryTelephone: secondaryTelephone,
            secondaryEmail: secondaryEmail,
            primaryNotes: primaryNotes,
            sizeOfFleet: sizeOfFleet,
            quantity: quantity,
            equipment: equipment,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('carrier').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, 'success');
            $('#add_External').modal('hide');
        }
    });
}

function updateExternal(column, id) {
    var data = $('#carrier_table').find('input[type="text"],textarea').val();

    var companyId = document.getElementById('companyid').value;

    $.ajax({
        url: 'admin/carrier_driver.php?type=' + 'edit_external',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: data,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('carrier').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            document.getElementById(column + id).style.display = "none";
        }
    });
}

//update external carrier table
var external_path = "carrier/";
var external_path1 = $('#companyid').val();
var external_data = external_path1.toString();
var external_test = external_path + external_data;


database.ref(external_test).on('child_added', function (data) {
    updateCarrierTable();
});
database.ref(external_test).on('child_changed', function (data) {
    updateCarrierTable();
});
database.ref(external_test).on('child_removed', function (data) {
    updateCarrierTable();
});

//update table fields
function updateCarrierTable() {
    var carrierBody = document.getElementById('carrierBody');
    var carrierList = document.getElementById('browserscarrier');
    $.ajax({
        url: 'admin/utils/getCarrier.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            var res = response.split('^');
            if (carrierBody != null) {
                carrierBody.innerHTML = res[0];
            }
            if (carrierList != null) {
                carrierList.innerHTML = res[1];
            }
        },
    });
}

// external carrier Full Update
function toggleCarrier1(val) {
    var name = document.getElementById('carrierNameEdit').value;
    var address = document.getElementById('carrierAddressEdit').value;
    var location = document.getElementById('carrierLocationEdit').value;
    var zip = document.getElementById('carrierZipEdit').value;
    var email = document.getElementById('carrierEmailEdit').value;
    var telephone = document.getElementById('carrierTelephoneEdit').value;
    var taxID = document.getElementById('carrierTaxIDEdit').value;
    var mc = document.getElementById('carrierMCEdit').value;
    var dot = document.getElementById('carrierDOTEdit').value;

    if (val == 'first') {
        if (val_carrName(name)) {
            if (val_carrAddress(address)) {
                if (val_carrLocation(location)) {
                    if (val_carrZip(zip)) {
                        if (val_carrEmail(email)) {
                            if (val_carrTelephone(telephone)) {
                                if (val_carrTaxID(taxID)) {
                                    if (val_carrMC(mc)) {
                                        if (val_carrDOT(dot)) {

                                            $("#carrier").toggleClass("show");
                                            $("#carrier").toggleClass("active");
                                            $("#insurance").toggleClass("show");
                                            $("#insurance").toggleClass("active");
                                            $("#home-tab").toggleClass("active");
                                            $("#insurance-tab").toggleClass("active");
                                            // $("#accounting").toggleClass("show");
                                            // $("#accounting").toggleClass("active");
                                            // $("#equipment").toggleClass("show");
                                            // $("#equipment").toggleClass("active");


                                            if ($("#home-tab").attr("aria-selected") === 'true') {
                                                $("#home-tab").attr("aria-selected", "false");
                                            } else {
                                                $("#home-tab").attr("aria-selected", "true");
                                            }

                                            if ($("#insurance-tab").attr("aria-selected") === 'true') {
                                                $("#insurance-tab").attr("aria-selected", "false");
                                            } else {
                                                $("#insurance-tab").attr("aria-selected", "true");
                                            }

                                            $("#home-title").toggleClass("show");
                                            $("#insurance-title").toggleClass("show");
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    } else if (val == 'second') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#equipment-tab").attr("aria-selected") === 'true') {
            $("#equipment-tab").attr("aria-selected", "false");
        } else {
            $("#equipment-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#equipment-title").toggleClass("show");
    } else if (val == 'fourth') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#equipment-tab").attr("aria-selected") === 'true') {
            $("#equipment-tab").attr("aria-selected", "false");
        } else {
            $("#equipment-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#equipment-title").toggleClass("show");
    }
}

function togglePrev1(val) {
    if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        if ($("#accounting-tab").attr("aria-selected") === 'true') {
            $("#accounting-tab").attr("aria-selected", "false");
        } else {
            $("#accounting-tab").attr("aria-selected", "true");
        }

        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }

        $("#accounting-title").toggleClass("show");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'second') {
        $("#carrier").toggleClass("show");
        $("#carrier").toggleClass("active");
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#home-tab").toggleClass("active");
        $("#insurance-tab").toggleClass("active");

        if ($("#home-tab").attr("aria-selected") === 'true') {
            $("#home-tab").attr("aria-selected", "false");
        } else {
            $("#home-tab").attr("aria-selected", "true");
        }

        if ($("#insurance-tab").attr("aria-selected") === 'true') {
            $("#insurance-tab").attr("aria-selected", "false");
        } else {
            $("#insurance-tab").attr("aria-selected", "true");
        }

        $("#home-title").toggleClass("show");
        $("#insurance-title").toggleClass("show");
    }
}

function toggleAll1(val) {
    if ($("#carrier").hasClass("show")) {
        $("#carrier").toggleClass("show");
    }
    if ($("#carrier").hasClass("active")) {
        $("#carrier").toggleClass("active");
    }
    if ($("#insurance").hasClass("show")) {
        $("#insurance").toggleClass("show");
    }
    if ($("#insurance").hasClass("active")) {
        $("#insurance").toggleClass("active");
    }
    if ($("#accounting").hasClass("show")) {
        $("#accounting").toggleClass("show");
    }
    if ($("#accounting").hasClass("active")) {
        $("#accounting").toggleClass("active");
    }
    if ($("#equipment").hasClass("show")) {
        $("#equipment").toggleClass("show");
    }
    if ($("#equipment").hasClass("active")) {
        $("#equipment").toggleClass("active");
    }
    if ($("#home-tab").hasClass("active")) {
        $("#home-tab").toggleClass("active");
    }
    if ($("#insurance-tab").hasClass("active")) {
        $("#insurance-tab").toggleClass("active");
    }
    if ($("#accounting-tab").hasClass("active")) {
        $("#accounting-tab").toggleClass("active");
    }
    if ($("#equipment-tab").hasClass("active")) {
        $("#equipment-tab").toggleClass("active");
    }
    if ($("#home-title").hasClass("show")) {
        $("#home-title").toggleClass("show");
    }
    if ($("#insurance-title").hasClass("show")) {
        $("#insurance-title").toggleClass("show");
    }
    if ($("#accounting-title").hasClass("show")) {
        $("#accounting-title").toggleClass("show");
    }
    if ($("#equipment-title").hasClass("show")) {
        $("#equipment-title").toggleClass("show");
    }

    if ($("#home-tab").attr("aria-selected") === 'true') {
        $("#home-tab").attr("aria-selected", "false");
    } else {
        $("#home-tab").attr("aria-selected", "true");
    }

    if ($("#insurance-tab").attr("aria-selected") === 'true') {
        $("#insurance-tab").attr("aria-selected", "false");
    } else {
        $("#insurance-tab").attr("aria-selected", "true");
    }

    if ($("#accounting-tab").attr("aria-selected") === 'true') {
        $("#accounting-tab").attr("aria-selected", "false");
    } else {
        $("#accounting-tab").attr("aria-selected", "true");
    }

    if ($("#equipment-tab").attr("aria-selected") === 'true') {
        $("#equipment-tab").attr("aria-selected", "false");
    } else {
        $("#equipment-tab").attr("aria-selected", "true");
    }

    if (val == 'first') {
        $("#carrier").toggleClass("show");
        $("#carrier").toggleClass("active");
        $("#home-tab").toggleClass("active");
        $("#home-title").toggleClass("show");
    } else if (val == 'second') {
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#accounting-title").toggleClass("show");
    } else if (val == 'fourth') {
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        $("#equipment-title").toggleClass("show");
    }

}

function setMobileInsurer1(val) {
    var checkBox = document.getElementById('customCheck9');
    if (checkBox.checked == true) {
        document.getElementById('insuranceCompanyEdit').value = document.getElementById('liabilityCompanyEdit').value;
        document.getElementById('insurancePolicyEdit').value = document.getElementById('liabilityPolicyEdit').value;
        document.getElementById('insuranceExpDateEdit').value = document.getElementById('liabilityExpDateEdit').value;
        document.getElementById('insuranceTelephoneEdit').value = document.getElementById('liabilityTelephoneEdit').value;
        document.getElementById('insuranceExtEdit').value = document.getElementById('liabilityEXTEdit').value;
        document.getElementById('insuranceContactNameEdit').value = document.getElementById('liabilityContactEdit').value;
        document.getElementById('insuranceAmtEdit').value = document.getElementById('liabilityAmountEdit').value;
        document.getElementById('insuranceNotesEdit').value = document.getElementById('liabilityNotesEdit').value;
    } else {
        document.getElementById('insuranceCompanyEdit').value = document.getElementById('insuranceCompanyEdit').value;
        document.getElementById('insurancePolicyEdit').value = document.getElementById('insurancePolicyEdit').value;
        document.getElementById('insuranceExpDateEdit').value = document.getElementById('insuranceExpDateEdit').value;
        document.getElementById('insuranceTelephoneEdit').value = document.getElementById('insuranceTelephoneEdit').value;
        document.getElementById('insuranceExtEdit').value = document.getElementById('insuranceExtEdit').value;
        document.getElementById('insuranceContactNameEdit').value = document.getElementById('insuranceContactNameEdit').value;
        document.getElementById('insuranceAmtEdit').value = document.getElementById('insuranceAmtEdit').value;
        document.getElementById('insuranceNotesEdit').value = document.getElementById('insuranceNotesEdit').value;
    }
}

function setCargoInsurer1() {
    var checkBox1 = document.getElementById('customCheck10');
    if (checkBox1.checked == true) {
        document.getElementById('cargoNameEdit').value = document.getElementById('liabilityCompanyEdit').value;
        document.getElementById('cargoPolicyEdit').value = document.getElementById('liabilityPolicyEdit').value;
        document.getElementById('cargoExpDateEdit').value = document.getElementById('liabilityExpDateEdit').value;
        document.getElementById('cargoTelephoneEdit').value = document.getElementById('liabilityTelephoneEdit').value;
        document.getElementById('cargoExtEdit').value = document.getElementById('liabilityEXTEdit').value;
        document.getElementById('cargoContactNameEdit').value = document.getElementById('liabilityContactEdit').value;
        document.getElementById('cargoInsuranceAmountEdit').value = document.getElementById('liabilityAmountEdit').value;
        document.getElementById('cargoNotesEdit').value = document.getElementById('liabilityNotesEdit').value;
    } else {
        document.getElementById('cargoNameEdit').value = document.getElementById('cargoNameEdit').value;
        document.getElementById('cargoPolicyEdit').value = document.getElementById('cargoPolicyEdit').value;
        document.getElementById('cargoExpDateEdit').value = document.getElementById('cargoExpDateEdit').value;
        document.getElementById('cargoTelephoneEdit').value = document.getElementById('cargoTelephoneEdit').value;
        document.getElementById('cargoExtEdit').value = document.getElementById('cargoExtEdit').value;
        document.getElementById('cargoContactNameEdit').value = document.getElementById('cargoContactNameEdit').value;
        document.getElementById('cargoInsuranceAmountEdit').value = document.getElementById('cargoInsuranceAmountEdit').value;
        document.getElementById('cargoNotesEdit').value = document.getElementById('cargoNotesEdit').value;
    }
}

function editExternalCarrierID() {
    var carrierid = document.getElementById('carrierid').value;
    var carrierName = document.getElementById('carrierNameEdit').value;
    var companyId = document.getElementById('companyId').value;
    var carrierAddress = document.getElementById('carrierAddressEdit').value;
    var carrierLocation = document.getElementById('carrierLocationEdit').value;
    var carrierZip = document.getElementById('carrierZipEdit').value;
    var carrierContactName = document.getElementById('carrierContactNameEdit').value;
    var carrierEmail = document.getElementById('carrierEmailEdit').value;
    var carrierTelephone = document.getElementById('carrierTelephoneEdit').value;
    var carrierExt = document.getElementById('carrierExtEdit').value;
    var carrierTollFree = document.getElementById('carrierTollFreeEdit').value;
    var carrierFax = document.getElementById('carrierFaxEdit').value;

    var carrierPayTerms1 = document.getElementById('carrierPayTermsEdit').value;
    var carrierPay_Terms = carrierPayTerms1.split(")");
    var carrierPayTerms = carrierPay_Terms[0];

    var carrierTaxID = document.getElementById('carrierTaxIDEdit').value;
    var carrierMC = document.getElementById('carrierMCEdit').value;
    var carrierDOT = document.getElementById('carrierDOTEdit').value;

    var carrierFactoring1 = document.getElementById('carrierFactoringEdit').value;
    var carrier_Factoring = carrierFactoring1.split(")");
    var carrierFactoring = carrier_Factoring[0];

    var carrierNotes = document.getElementById('carrierNotesEdit').value;

    var carrierBlacklisted = "on";
    if (document.getElementById('carrierBlacklistedEdit').checked == true) {

        carrierBlacklisted = "on";
    } else {
        carrierBlacklisted = "off";
    }

    var carrierCorporation = "on";
    if (document.getElementById('carrierCorporationEdit').checked == true) {
        carrierCorporation = "on";
    } else {
        carrierCorporation = "off";
    }
    var liabilityCompany = document.getElementById('liabilityCompanyEdit').value;
    var liabilityPolicy = document.getElementById('liabilityPolicyEdit').value;
    var liabilityExpDate = document.getElementById('liabilityExpDateEdit').value;
    var liabilityTelephone = document.getElementById('liabilityTelephoneEdit').value;
    var liabilityEXT = document.getElementById('liabilityEXTEdit').value;
    var liabilityContact = document.getElementById('liabilityContactEdit').value;
    var liabilityAmount = document.getElementById('liabilityAmountEdit').value;
    var liabilityNotes = document.getElementById('liabilityNotesEdit').value;
    var insuranceCompany = document.getElementById('insuranceCompanyEdit').value;
    var insurancePolicy = document.getElementById('insurancePolicyEdit').value;
    var insuranceExpDate = document.getElementById('insuranceExpDateEdit').value;
    var insuranceTelephone = document.getElementById('insuranceTelephoneEdit').value;
    var insuranceExt = document.getElementById('insuranceExtEdit').value;
    var insuranceContactName = document.getElementById('insuranceContactNameEdit').value;
    var insuranceAmt = document.getElementById('insuranceAmtEdit').value;
    var insuranceNotes = document.getElementById('insuranceNotesEdit').value;
    var cargoName = document.getElementById('cargoNameEdit').value;
    var cargoPolicy = document.getElementById('cargoPolicyEdit').value;
    var cargoExpDate = document.getElementById('cargoExpDateEdit').value;
    var cargoTelephone = document.getElementById('cargoTelephoneEdit').value;
    var cargoExt = document.getElementById('cargoExtEdit').value;
    var cargoContactName = document.getElementById('cargoContactNameEdit').value;
    var cargoInsuranceAmount = document.getElementById('cargoInsuranceAmountEdit').value;
    var cargoNotes = document.getElementById('cargoNotesEdit').value;
    var wsib = document.getElementById('wsibEdit').value;
    var primaryName = document.getElementById('primaryNameEdit').value;
    var primaryTelephone = document.getElementById('primaryTelephoneEdit').value;
    var primaryEmail = document.getElementById('primaryEmailEdit').value;
    var secondaryName = document.getElementById('secondaryNameEdit').value;
    var secondaryTelephone = document.getElementById('secondaryTelephoneEdit').value;
    var secondaryEmail = document.getElementById('secondaryEmailEdit').value;
    var primaryNotes = document.getElementById('primaryNotesEdit').value;
    var sizeOfFleet = document.getElementById('sizeOfFleetEdit').value;
    var equipment = [];
    for (var i = 0; i < document.getElementsByName('equipment').length; i++) {
        equipment[i] = document.getElementsByName('equipment')[i].value;
    }
    var quantity = [];
    for (var i = 0; i < document.getElementsByName('quantity').length; i++) {
        quantity[i] = document.getElementsByName('quantity')[i].value;
    }
    $.ajax({
        url: 'admin/carrier_driver.php?type=Update_carrierDetail',
        type: 'POST',
        data: {
            carrierid: carrierid,
            carrierName: carrierName,
            companyID: companyId,
            carrierAddress: carrierAddress,
            carrierLocation: carrierLocation,
            carrierZip: carrierZip,
            carrierContactName: carrierContactName,
            carrierEmail: carrierEmail,
            carrierTelephone: carrierTelephone,
            carrierExt: carrierExt,
            carrierTollFree: carrierTollFree,
            carrierFax: carrierFax,
            carrierPayTerms: carrierPayTerms,
            carrierTaxID: carrierTaxID,
            carrierMC: carrierMC,
            carrierDOT: carrierDOT,
            carrierFactoring: carrierFactoring,
            carrierNotes: carrierNotes,
            carrierBlacklisted: carrierBlacklisted,
            carrierCorporation: carrierCorporation,
            liabilityCompany: liabilityCompany,
            liabilityPolicy: liabilityPolicy,
            liabilityExpDate: liabilityExpDate,
            liabilityTelephone: liabilityTelephone,
            liabilityEXT: liabilityEXT,
            liabilityContact: liabilityContact,
            liabilityAmount: liabilityAmount,
            liabilityNotes: liabilityNotes,
            insuranceCompany: insuranceCompany,
            insurancePolicy: insurancePolicy,
            insuranceExpDate: insuranceExpDate,
            insuranceTelephone: insuranceTelephone,
            insuranceExt: insuranceExt,
            insuranceContactName: insuranceContactName,
            insuranceAmt: insuranceAmt,
            insuranceNotes: insuranceNotes,
            cargoName: cargoName,
            cargoPolicy: cargoPolicy,
            cargoExpDate: cargoExpDate,
            cargoTelephone: cargoTelephone,
            cargoExt: cargoExt,
            cargoContactName: cargoContactName,
            cargoInsuranceAmount: cargoInsuranceAmount,
            cargoNotes: cargoNotes,
            wsib: wsib,
            primaryName: primaryName,
            primaryTelephone: primaryTelephone,
            primaryEmail: primaryEmail,
            secondaryName: secondaryName,
            secondaryTelephone: secondaryTelephone,
            secondaryEmail: secondaryEmail,
            primaryNotes: primaryNotes,
            sizeOfFleet: sizeOfFleet,
            quantity: quantity,
            equipment: equipment,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('carrier').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, 'success');
            $('#edit_External').modal('hide');
        }
    });
}