
//-----------------Fuel Receipts Add START---------------------------------

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

    if (val_CardHolderName(cardHolderName)) {
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
                swal("Success", data, "success");
                $('#add_fuel_receipts').modal('hide');
            },
        });
    }
}

// Edit Fuel
function updateFuel(element,column,id) {
    var value = element.innerText;

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
            swal("Success",data,"success");
        }
    });
}

// Delete Fuel
function deleteFuel(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'ifta/fuel_receipts_driver.php?type='+'delete_fuel',
            type: 'POST',
            data: {id: id},
            success: function (data) {
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
                swal("Success", data, "success");
                $('#add_tolls').modal('hide');
            },
        });
    }
}

// Edit Toll
function updateTolls(element,column,id) {
    var value = element.innerText;

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
            swal("Success",data,"success");
        }
    });
}


//-----------------Add Toll ENDS------------------------------------------

