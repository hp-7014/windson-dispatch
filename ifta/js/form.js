
//-----------------Fuel Receipts Add START---------------------------------
//update Ifta Toll table

var fuelpath = "ifta_fuel_receipts/";
var fuelpath1 = $('#companyid').val();
var fueldata = fuelpath1.toString();
var fuel_test = fuelpath + fueldata;

database.ref(fuel_test).on('child_added', function (data) {
    updateFuelTable();
});

database.ref(fuel_test).on('child_changed', function (data) {
    updateFuelTable();
});

database.ref(fuel_test).on('child_removed', function (data) {
    updateFuelTable();
});

//update table fields

function updateFuelTable(){
    var fuelBody = document.getElementById("fuelBody");
   
    $.ajax({
        url: 'ifta/utils/getFuelReceipt.php?types=live_fuel_table',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            if(fuelBody != null) 
            {
                fuelBody.innerHTML = response;
            }
      
        },
    });
}

// Search Fuel Table
function searchText_Fuel(x) {
    var n = x.value;
    var companyId = document.getElementById('companyId').value;
    
    $.ajax({
        type: 'POST',
        url: 'ifta/utils/getFuelReceipt.php?types=search_text',
        data: {
            getoption:n,
            companyId:companyId,
        },
        success: function (response) {

            var j = response.trim();
            document.getElementById('fuelBody').innerHTML = j;
        }
    });
}

// Paginate Fuel Table
function paginate_ifta_fuel(start, limit) {
    $.ajax({
        url: 'ifta/utils/getFuelReceipt.php?types=paginate_ifta_fuel',
        type: 'POST',
        data: {
            start: start,
            limit: limit,
        },
        dataType: 'text',
        success: function (response) {
            document.getElementById('fuelBody').innerHTML = response;
        },
    });
}

// Add Fuel
function Add_FuelReceipts() {
    var companyId = document.getElementById('companyId').value;
    var cardHolderName = $("#cardHolderName").val();
    var employeeNo = document.getElementById('employeeNo').value;
    var cardNo = document.getElementById('cardNo').value;
    var cardType = document.getElementById('cardType').value;
    var unit_number = document.getElementById('unit_number').value;
    var fuelDate = document.getElementById('fuelDate').value;
    var transacTime = document.getElementById('transacTime').value;
    var merchantName = document.getElementById('merchantName').value;
    var merchantCity = document.getElementById('merchantCity').value;
    var statePurch = document.getElementById('statePurch').value;
    var dGallons = document.getElementById('dGallons').value;
    var dGrossCost = document.getElementById('dGrossCost').value;
    var cashAdvanced = document.getElementById('cashAdvanced').value;
    var discountAmt = document.getElementById('discountAmt').value;
    var totalAmt = document.getElementById('totalAmt').value;
    var invoiceNo = document.getElementById('invoiceNo').value;

    if (val_unitNumber(unit_number)) {
        if (val_fuelDate(fuelDate)) {
            if (val_transacTime(transacTime)) {
                if (val_merchantName(merchantName)) {
                    if (val_statePurch(statePurch)) {
                        if (val_dGallons(dGallons)) {
                            if (val_dGrossCost(dGrossCost)) {
                                if (val_invoiceNo(invoiceNo)) {
                                    $.ajax({
                                        url: 'ifta/fuel_receipts_driver.php?type=' + 'fuel_add',
                                        type: 'POST',
                                        data: {
                                            companyId: companyId,
                                            cardHolderName: cardHolderName,
                                            employeeNo: employeeNo,
                                            cardNo: cardNo,
                                            cardType: cardType,
                                            unit_number: unit_number,
                                            fuelDate: fuelDate,
                                            transacTime: transacTime,
                                            merchantName: merchantName,
                                            merchantCity: merchantCity,
                                            statePurch: statePurch,
                                            dGallons: dGallons,
                                            dGrossCost: dGrossCost,
                                            cashAdvanced: cashAdvanced,
                                            discountAmt: discountAmt,
                                            totalAmt: totalAmt,
                                            invoiceNo: invoiceNo,
                                        },
                                        dataType: "text",
                                        success: function (data) {
                                            var companyid = $('#companyid').val();
                                            database.ref('ifta_fuel_receipts').child(companyid).set({
                                                data: randomString(),
                                            });
                                            swal("Success", data, "success");
                                            $('#add_fuel_receipts').modal('hide');
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
}

// Edit Fuel
function updateFuel(column, id, value) {

    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'ifta/fuel_receipts_driver.php?type=' + 'edit_fuel',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('ifta_fuel_receipts').child(companyid).set({
                data: randomString(),
            });
            swal("Success", data, "success");
            $('#updateTable').modal('hide');
            $('#search').val("");
        }
    });
}

// Delete Fuel
function deleteFuel(id,cardName) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'ifta/fuel_receipts_driver.php?type='+'delete_fuel',
            type: 'POST',
            data: {id: id,cardName: cardName},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('ifta_fuel_receipts').child(companyid).set({
                    data: randomString(),
                });
                swal("Success",data,"success");
            }
        });
    }
}

// Export Fuel
function export_FuelReceipt() {
    $.ajax({
        url: 'ifta/fuel_receipts_driver.php?type='+'export_fuel',
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
            link.setAttribute("download", "fuel_receipts.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//Import Fuel
function import_FuelReceipt() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file",document.getElementById('file').files[0]);

    $.ajax({
        url:'ifta/fuel_receipts_driver.php?type='+'import_fuel',
        method:'post',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success",data,"success");
        }
    });
}

//-----------------Fuel Receipts Add ENDS---------------------------------

//-----------------Add Toll START-----------------------------------------

//update Ifta Toll table

var tollpath = "ifta_toll/";
var tollpath1 = $('#companyid').val();
var tolldata = tollpath1.toString();
var toll_test = tollpath + tolldata;

database.ref(toll_test).on('child_added', function (data) {
    updateTollTable();
});

database.ref(toll_test).on('child_changed', function (data) {
    updateTollTable();
});

database.ref(toll_test).on('child_removed', function (data) {
    updateTollTable();
});

//update table fields

function updateTollTable(){
    var tollBody = document.getElementById("tollBody");
   
    $.ajax({
        url: 'ifta/utils/getIftaToll.php?types=live_toll_table',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            if(tollBody != null) 
            {
                tollBody.innerHTML = response;
            }
            //document.getElementById('paymentTermsBody').innerHTML = response;   
        },
    });
}

// Search Toll Table
function searchText_Toll(x) {
    var n = x.value;
    var companyId = document.getElementById('companyId').value;
    
    $.ajax({
        type: 'POST',
        url: 'ifta/utils/getIftaToll.php?types=search_text',
        data: {
            getoption:n,
            companyId:companyId,
        },
        success: function (response) {

            var j = response.trim();
            document.getElementById('tollBody').innerHTML = j;
        }
    });
}

// Paginate Toll Table
function paginate_ifta_toll(start, limit) {
    $.ajax({
        url: 'ifta/utils/getIftaToll.php?types=paginate_ifta_toll',
        type: 'POST',
        data: {
            start: start,
            limit: limit,
        },
        dataType: 'text',
        success: function (response) {
            document.getElementById('tollBody').innerHTML = response;
        },

    });
}

// Add Toll
function Add_TollData() {
    var companyId = document.getElementById('companyId').value;
    var invoiceNumber = $("#invoiceNumber").val();
    var tollDate = document.getElementById('tollDate').value;
    var transType = document.getElementById('transType').value;
    var location = document.getElementById('location').value;
    var transponder = document.getElementById('transponder').value;
    var amount = document.getElementById('amount').value;
    var licensePlate = document.getElementById('licensePlate').value;
    var truckNo = document.getElementById('truckNo').value;

    if (val_invoiceNumber(invoiceNumber)) {
        if (val_tollDate(tollDate)) {
            if (val_transType(transType)) {
                if (val_location(location)) {
                    if (val_amount(amount)) {
                        if (val_licensePlate(licensePlate)) {
                            if (val_truckNo(truckNo)) {
                                $.ajax({
                                    url: 'ifta/add_toll_driver.php?type=' + 'toll_add',
                                    type: 'POST',
                                    data: {
                                        companyId: companyId,
                                        invoiceNumber: invoiceNumber,
                                        tollDate: tollDate,
                                        transType: transType,
                                        location: location,
                                        transponder: transponder,
                                        amount: amount,
                                        licensePlate: licensePlate,
                                        truckNo: truckNo,
                                    },
                                    dataType: "text",
                                    success: function (data) {
                                        var companyid = $('#companyid').val();
                                        database.ref('ifta_toll').child(companyid).set({
                                            data: randomString(),
                                        });
                                       
                                        swal("Success", data, "success");
                                        $('#add_toll_s').modal('hide');
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

// Edit Toll
function updateTolls(column,id,value) {
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'ifta/add_toll_driver.php?type=' + 'edit_toll',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('ifta_toll').child(companyid).set({
                data: randomString(),
            });
            
            swal("Success",data,"success");
            $('#updateTable').modal('hide');
            $('#search').val("");
        }
    });
}

// Delete Toll
function deleteTolls(id,truckid) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'ifta/add_toll_driver.php?type='+'delete_toll',
            type: 'POST',
            data: {id: id,truckid:truckid},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('ifta_toll').child(companyid).set({
                    data: randomString(),
                });

                swal("Success",data,"success");
            }
        });
    }
}

// Export Toll
function exportTolls() {
    $.ajax({
        url: 'ifta/add_toll_driver.php?type='+'export_toll',
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
            link.setAttribute("download", "tolls.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

// Import Toll
function importTolls() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file",document.getElementById('file').files[0]);

    $.ajax({
        url:'ifta/add_toll_driver.php?type='+'import_toll',
        method:'post',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('ifta_toll').child(companyid).set({
                data: randomString(),
            });
            swal("Success",data,"success");
        }
    });
}

//-----------------Add Toll ENDS------------------------------------------