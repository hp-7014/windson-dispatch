//----------Shipper Start-------------
// add shipper
function addShipper() {
    var companyID = document.getElementById('companyID').value;
    var shipperName = document.getElementById('shipperName').value;
    var shipperAddress = document.getElementById('shipperAddress').value;
    var shipperLocation = document.getElementById('shipperLocation').value;
    var shipperPostal = document.getElementById('shipperPostal').value;
    var shipperContact = document.getElementById('shipperContact').value;
    var shipperEmail = document.getElementById('shipperEmail').value;
    var shipperTelephone = document.getElementById('shipperTelephone').value;
    var shipperExt = document.getElementById('shipperExt').value;
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
                                                                        asConsignee:asConsignee
                                                                    },
                                                                    success: function (data) {
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
function updateShipper(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyID').value;
    $.ajax({
        url: 'admin/shipper_driver.php?type=' + 'edit_shipper',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
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
                                                                    },
                                                                    success: function (data) {
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
function updateConsignee(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/consignee_driver.php?type=' + 'edit_consignee',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
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


    if (val_custName(custName)) {
        if (val_custAddress(custAddress)) {
            if (val_custLocation(custLocation)) {
                if (val_custZip(custZip)) {

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

    var blacklisted = document.getElementsByName('blacklisted');
    var AsShipper = document.getElementsByName('AsShipper');
    var AsConsignee = document.getElementsByName('AsConsignee');
    var MC = document.getElementById('MC').value;

    var currencySetting = document.getElementById('currencySetting').value;
    var paymentTerms = document.getElementById('paymentTerms').value;
    var creditLimit = document.getElementById('creditLimit').value;
    var salesRep = document.getElementById('salesRep').value;
    var factoringCompany = document.getElementById('factoringCompany').value;
    var federalID = document.getElementById('federalID').value;
    var workerComp = document.getElementById('workerComp').value;
    var websiteURL = document.getElementById('websiteURL').value;
    var numberOninvoice = document.getElementsByName('numberOninvoice');
    var customerRate = document.getElementsByName('customerRate');
    var internalNotes = document.getElementById('internalNotes').value;

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
                                                                                                url: 'admin/customer_driver.php?type=' + 'addCustomer',
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
                                                                                                    MC: MC
                                                                                                },
                                                                                                success: function (data) {
                                                                                                    swal('Success', data, 'success');
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
                        }
                    }
                }
            }
        }
    }
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
function updateCustomer(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/customer_driver.php?type=' + 'edit_customer',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
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
                swal("Success", data, 'success');
            }
        });
    }
}

//----------Customer End--------------

//-----------User Start-----------------------------
// add customer
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
    }if (fixPayCategory.checked) {
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
                                                            swal('Success', data, 'success');
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
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//edit function
function updateUser(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/user_driver.php?type=' + 'edit_user',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
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
                swal("Success", data, 'success');
            }
        });
    }
}

//-----------User End------------------------------

/*----------------- Bank Admin Add START -------------------------*/

//Add Bank Admin
function AddBankAdmin() {
    var companyId = document.getElementById('companyId').value;
    var bankAddresss = document.getElementById('bankAddress').value;
    var bankName = document.getElementById('bankName').value;
    var accountHolder = $("#accountHolder").val();
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
function updateBank(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'edit_bank',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
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
    if (confirm('Are you Sure ?')) {
        $.ajax({
            url: 'admin/bank_admin.php?type=' + 'delete_bank',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

// Import Bank Admin
function import_Admin() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    //alert(document.getElementById('file').files);
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
                                        transacBalance: transacBalance,
                                    },
                                    dataType: 'text',
                                    success: function (data) {
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
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    //alert(document.getElementById('file').files);
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
    if (confirm('Are you Sure ?')) {
        $.ajax({
            url: 'admin/bank_credit.php?type=' + 'delete_credit',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

//Edit Bank Credit
function updateCredit(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/bank_credit.php?type=' + 'edit_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Update", data, 'success');
        }
    });
}

//Edit Card type
function update_Credit(element, column, id) {
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
            swal("Update", data, 'success');
        }
    });
}

/*----------------- Credit Card END -------------------------*/

/*----------------- Sub Credit Card START -------------------------*/

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

// Import Sub Credit
function import_Sub_credit() {
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    //alert(document.getElementById('file').files);
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
function updateSubCredit(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/sub_credit_card.php?type=' + 'edit_sub_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Update", data, 'success');
        }
    });
}

//Edit Sub Credit
function updateSub_Credit(element, column, id) {
    //var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'admin/sub_credit_card.php?type=' + 'edit_card_type',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            mainCard: element,
        },
        success: function (data) {
            swal("Update", data, 'success');
        }
    });
}

// Delete Sub Credit
function deleteSubCredit(id) {
    //alert(delete_status);
    if (confirm('Are you Sure ?')) {
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
function updateCustom(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    // alert(value);
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
            swal("Update", data, 'success');
        }
    });
}

// Delete Custom Broker
function deleteCustom(id) {
    //alert(delete_status);
    if (confirm('Are you Sure ?')) {
        $.ajax({
            url: 'admin/custom_broker.php?type=' + 'delete_custom_broker',
            type: 'POST',
            data: {id: id},
            success: function (data) {
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
    //alert(document.getElementById('file').files);
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

/*----------------- Customs Broker END -------------------------*/
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

if(val == 'first'){
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
    }
else if(val == 'second'){
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
}
else if(val == 'third'){
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
else if(val == 'fourth'){
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

function togglePrev(val){
    if(val == 'third'){
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
    }
    else if(val == 'second'){
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

function toggleAll(val){
    if($("#carrier").hasClass("show")) {
        $("#carrier").toggleClass("show");
    }
    if($("#carrier").hasClass("active")) {
        $("#carrier").toggleClass("active");
    }
    if($("#insurance").hasClass("show")) {
        $("#insurance").toggleClass("show");
    }
    if($("#insurance").hasClass("active")) {
        $("#insurance").toggleClass("active");
    }
    if($("#accounting").hasClass("show")) {
        $("#accounting").toggleClass("show");
    }
    if($("#accounting").hasClass("active")) {
        $("#accounting").toggleClass("active");
    }
    if($("#equipment").hasClass("show")) {
        $("#equipment").toggleClass("show");
    }
    if($("#equipment").hasClass("active")) {
        $("#equipment").toggleClass("active");
    }
    if($("#home-tab").hasClass("active")) {
        $("#home-tab").toggleClass("active");
    }
    if($("#insurance-tab").hasClass("active")) {
        $("#insurance-tab").toggleClass("active");
    }
    if($("#accounting-tab").hasClass("active")) {
        $("#accounting-tab").toggleClass("active");
    }
    if($("#equipment-tab").hasClass("active")) {
        $("#equipment-tab").toggleClass("active");
    }
    if($("#home-title").hasClass("show")) {
        $("#home-title").toggleClass("show");
    }
    if($("#insurance-title").hasClass("show")) {
        $("#insurance-title").toggleClass("show");
    }
    if($("#accounting-title").hasClass("show")) {
        $("#accounting-title").toggleClass("show");
    }
    if($("#equipment-title").hasClass("show")) {
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

    if(val == 'first'){
        $("#carrier").toggleClass("show");
        $("#carrier").toggleClass("active");
        $("#home-tab").toggleClass("active");
        $("#home-title").toggleClass("show");
    }
    else if(val == 'second'){
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        $("#insurance-title").toggleClass("show");
    }
    else if(val == 'third'){
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#accounting-title").toggleClass("show");
    }
    else if(val == 'fourth'){
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        $("#equipment-title").toggleClass("show");
    }

}
function setMobileInsurer(val){
    var checkBox = document.getElementById('customCheck9');
    if(checkBox.checked == true){
        document.getElementById('insuranceCompany').value = document.getElementById('liabilityCompany').value;
        document.getElementById('insurancePolicy').value = document.getElementById('liabilityPolicy').value;
        document.getElementById('insuranceExpDate').value = document.getElementById('liabilityExpDate').value;
        document.getElementById('insuranceTelephone').value = document.getElementById('liabilityTelephone').value;
        document.getElementById('insuranceExt').value = document.getElementById('liabilityEXT').value;
        document.getElementById('insuranceContactName').value = document.getElementById('liabilityContact').value;
        document.getElementById('insuranceAmt').value = document.getElementById('liabilityAmount').value;
        document.getElementById('insuranceNotes').value = document.getElementById('liabilityNotes').value;
    }
    else{
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
function setCargoInsurer(){
    var checkBox = document.getElementById('customCheck10');
    if(checkBox.checked == true){
        document.getElementById('cargoName').value = document.getElementById('liabilityCompany').value;
        document.getElementById('cargoPolicy').value = document.getElementById('liabilityPolicy').value;
        document.getElementById('cargoExpDate').value = document.getElementById('liabilityExpDate').value;
        document.getElementById('cargoTelephone').value = document.getElementById('liabilityTelephone').value;
        document.getElementById('cargoExt').value = document.getElementById('liabilityEXT').value;
        document.getElementById('cargoContactName').value = document.getElementById('liabilityContact').value;
        document.getElementById('cargoInsuranceAmount').value = document.getElementById('liabilityAmount').value;
        document.getElementById('cargoNotes').value = document.getElementById('liabilityNotes').value;
    }
    else{
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

function addCarrier(){
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
    var carrierPayTerms = document.getElementById('carrierPayTerms').value;
    var carrierTaxID = document.getElementById('carrierTaxID').value;
    var carrierMC = document.getElementById('carrierMC').value;
    var carrierDOT = document.getElementById('carrierDOT').value;
    var carrierFactoring = document.getElementById('carrierFactoring').value;
    var carrierNotes = document.getElementById('carrierNotes').value;
    var carrierBlacklisted = document.getElementById('carrierBlacklisted').value;
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
    var insuranceTelephone= document.getElementById('insuranceTelephone').value;
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

    $.ajax({
        url: 'admin/carrier_driver.php?type=' + 'add_carrier',
        type: 'POST',
        data: {
            carrierName: carrierName,
            companyID:companyId,
            carrierAddress:carrierAddress,
            carrierLocation:carrierLocation,
            carrierZip:carrierZip,
            carrierContactName:carrierContactName,
            carrierEmail:carrierEmail,
            carrierTelephone:carrierTelephone,
            carrierExt:carrierExt,
            carrierTollFree:carrierTollFree,
            carrierFax:carrierFax,
            carrierPayTerms:carrierPayTerms,
            carrierTaxID:carrierTaxID,
            carrierMC:carrierMC,
            carrierDOT:carrierDOT,
            carrierFactoring:carrierFactoring,
            carrierNotes:carrierNotes,
            carrierBlacklisted:carrierBlacklisted,
            carrierCorporation:carrierCorporation,
            liabilityCompany:liabilityCompany,
            liabilityPolicy:liabilityPolicy,
            liabilityExpDate:liabilityExpDate,
            liabilityTelephone:liabilityTelephone,
            liabilityEXT:liabilityEXT,
            liabilityContact:liabilityContact,
            liabilityAmount:liabilityAmount,
            liabilityNotes:liabilityNotes,
            insuranceCompany:insuranceCompany,
            insurancePolicy:insurancePolicy,
            insuranceExpDate:insuranceExpDate,
            insuranceTelephone:insuranceTelephone,
            insuranceExt:insuranceExt,
            insuranceContactName:insuranceContactName,
            insuranceAmt:insuranceAmt,
            insuranceNotes:insuranceNotes,
            cargoName:cargoName,
            cargoPolicy:cargoPolicy,
            cargoExpDate:cargoExpDate,
            cargoTelephone:cargoTelephone,
            cargoExt:cargoExt,
            cargoContactName:cargoContactName,
            cargoInsuranceAmount:cargoInsuranceAmount,
            cargoNotes:cargoNotes,
            wsib:wsib,
            primaryName:primaryName,
            primaryTelephone:primaryTelephone,
            primaryEmail:primaryEmail,
            secondaryName:secondaryName,
            secondaryTelephone:secondaryTelephone,
            secondaryEmail:secondaryEmail,
            primaryNotes:primaryNotes,
            sizeOfFleet:sizeOfFleet,
        },
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}