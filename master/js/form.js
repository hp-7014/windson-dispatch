//-----------------Payment Terms start-------------------------------------
// Insert function for ADD Payment Terms
function addPaymentTerms() {
    var payment_term = document.getElementById('payment_term').value;
    var companyId = document.getElementById('companyId').value;

    if (val_payment_term(payment_term)) {
        // alert("inside");
        $.ajax({
            url: 'master/payment_terms.php?type=' + 'add_payment_term',
            type: 'POST',
            data: {
                companyid: companyId,
                payment_term: payment_term,
            },
            beforeSend: function () {
                $('.load').load('master/js/loader.php');
                setTimeout(1000);
            },
            success: function (data) {
                // swal("Success", data, 'success');
                // $('#Add_Payment_Terms').modal('hide');
            }
        });
    }
}

// import excel function for Payment Terms
function importExcel() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/payment_terms.php?type=' + 'importExcel',
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

//edit function for updating Payment Terms
function updatePayment(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/payment_terms.php?type=' + 'edit_payment_term',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
            // $('#Payment_Terms').modal('hide');
        }
    });
}

// delete function for Delete Paytement Terms
function deletePayment(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'master/payment_terms.php?type=' + 'delete_payment_term',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, 'success');
            }
        });
    }
}

// Export Excel function for Payment Terms
function exportExcel(id) {

    $.ajax({
        url: 'master/payment_terms.php?type=' + 'export_payment_terms',
        data: {companyid: id},
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

//-----------------Payment Terms End-------------------------------------

//-----------------Office Terms start-------------------------------------
// Insert function
function addOffice() {
    var officeName = document.getElementById('officeName').value;
    var officeLocation = document.getElementById('officeLocation').value;
    var companyId = document.getElementById('companyId').value;

    if (val_officeName(officeName)) {
        if (val_officeLocation(officeLocation)) {
            $.ajax({
                url: 'master/office_driver.php?type=' + 'add_office',
                type: 'POST',
                data: {
                    companyId: companyId,
                    officeName: officeName,
                    officeLocation: officeLocation,
                },
                success: function (data) {
                    swal("Success", data, 'success');
                    $('#Add_Office').modal('hide');
                }
            });
        }
    }
}

// update function
function updateOffice(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/office_driver.php?type=' + 'edit_office',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
            // $('#Add_Office').modal('hide');
        }
    });
}

// delete function
function deleteOffice(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'master/office_driver.php?type=' + 'delete_office',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, 'success');
            }
        });
    }
}

// import excel function
function importOffice() {
    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'master/office_driver.php?type=' + 'importOffice',
        type: 'POST',
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
function exportOffice() {
    $.ajax({
        url: 'master/office_driver.php?type=' + 'exportOffice',
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
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//-------------office function end-----------------

//-------------Company function start--------------
// Insert function
function addCompany() {
    var companyName = document.getElementById('companyName').value;
    var shippingAddress = document.getElementById('shippingAddress').value;
    var telephoneNo = document.getElementById('telephoneNo').value;
    var faxNo = document.getElementById('faxNo').value;
    var mcNo = document.getElementById('mcNo').value;
    var usDotNo = document.getElementById('usDotNo').value;
    var mailingAddress = document.getElementById('mailingAddress').value;
    var factoringCompany = document.getElementById('factoringCompany').value;
    var factoringCompanyAddress = document.getElementById('factoringCompanyAddress').value;
    var companyId = document.getElementById('companyId').value;

    if (val_companyName(companyName)) {
        if (val_telephoneNo(telephoneNo)) {
            if (val_mailingAddress(mailingAddress)) {
                $.ajax({
                    url: 'master/company_driver.php?type=' + 'add_company',
                    type: 'POST',
                    data: {
                        companyid: companyId,
                        companyName: companyName,
                        shippingAddress: shippingAddress,
                        telephoneNo: telephoneNo,
                        faxNo: faxNo,
                        mcNo: mcNo,
                        usDotNo: usDotNo,
                        mailingAddress: mailingAddress,
                        factoringCompany: factoringCompany,
                        factoringCompanyAddress: factoringCompanyAddress,
                    },
                    success: function (data) {
                        swal("Success", data, 'success');
                        $('#add_company').modal('hide');
                    }
                });
            }
        }
    }
}

// delete company
function deleteCompany(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'master/company_driver.php?type=' + 'delete_company',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, 'success');
            }
        });
    }
}

// update function
function updateCompany(element, column, id) {
    var value = element.innerText;
    $.ajax({
        url: 'master/company_driver.php?type=' + 'edit_company',
        type: 'POST',
        data: {
            companyid: "1",
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, 'success');
            // $('#add_company').modal('hide');
        }
    });
}

//export company
function exportCompany() {
    $.ajax({
        url: 'master/company_driver.php?type=' + 'exportCompany',
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
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

// import excel function
function importCompany() {
    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'master/company_driver.php?type=' + 'importCompany',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}

//-------------Company function End--------------

//------------Load function Start----------------
function addLoadType() {
    var loadName = document.getElementById('loadName').value;
    var loadType = document.getElementById('loadType').value;
    var companyId = document.getElementById('companyId').value;

    if (val_loadName(loadName)) {
        if (val_loadType(loadType)) {
            $.ajax({
                url: 'master/loadType_driver.php?type=' + 'add_loadType',
                type: 'POST',
                data: {
                    companyid: companyId,
                    loadName: loadName,
                    loadType: loadType,
                },
                success: function (data) {
                    swal("Success", data, 'success');
                    $('#Active_Load_Type').modal('hide');
                }
            });
        }
    }
}

// update function
function updateloadType(element, column, id) {
    var companyId = document.getElementById('companyId').value;
    var value = element.innerText;
    $.ajax({
        url: 'master/loadType_driver.php?type=' + 'edit_loadType',
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

// delete load
function deleteloadType(id) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'master/loadType_driver.php?type=' + 'delete_loadType',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, 'success');
            }
        });
    }
}

//export load
function exportLoadType() {
    $.ajax({
        url: 'master/loadType_driver.php?type=' + 'exportLoadType',
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
            alert(link);
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

// import excel function
function importLoadType() {
    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $.ajax({
        url: 'master/loadType_driver.php?type=' + 'importLoadType',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, 'success');
        }
    });
}

//ajax Function For insert Currency Setting
function addCurrency() {
    var currencyType = document.getElementById("currency_add_type").value;
    var companyId = document.getElementById('companyId').value;
   
    if (val_currencyType(currencyType)) {
        $.ajax({
            url: 'master/currency_add.php?type=' + 'currencyadd',
            type: 'POST',
            data: {
                companyID: companyId,
                currencyType: currencyType,
            },
            dataType: 'text',
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('currency_settings').child(companyid).set({
                    data:randomString(),
                });
                swal("Success", data, "success");
                $('#center').modal('hide');
                
            },

        });
    }
}

//update currency table

    var path = "currency_settings/";
    var path1 = $('#companyid').val();
    var data = path1.toString();
    var test = path+data;
  

database.ref(test).on('child_added', function(data) {
    updateCurrencyTable();
});
database.ref(test).on('child_changed', function(data) {
    updateCurrencyTable();
});
database.ref(test).on('child_removed', function(data) {
    updateCurrencyTable();
});
//update table fields

function updateCurrencyTable(){
    $.ajax({
        url: 'master/utils/getCurrency.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
           document.getElementById('currencyBody').innerHTML = response;
            
        },

    });
}

//random string generator
function randomString() {
    var result           = '';
    var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for ( var i = 0; i < 7; i++ ) {
       result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
 }
 

//update currency Function
function updateCurrency(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/currency_add.php?type=' + 'edit_currency',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            var companyid = $('#companyid').val();
            database.ref('currency_settings').child(companyid).set({
                data:randomString(),
            });
            swal("Success", data, "success");
            //$('#currency').modal('hide');
        }
    });
}

//insert data into Database using Excel
function importCurrency() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/currency_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, "success");
        }
    });
}

// Delete Currency Function
function deleteCurrency(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'master/currency_add.php?type=' + 'delete_currency',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                var companyid = $('#companyid').val();
                database.ref('currency_settings').child(companyid).set({
                    data:randomString(),
                });
                swal("Success", data, "success");
               
                //$('#currency').modal('hide');
            }
        });
    }
}

// Export Excel Function for Currency Type
function exportCurrency() {
    $.ajax({
        url: 'master/currency_add.php?type=' + 'export_currency',
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

//ajax Function For insert Equipment Type
function addEquipment() {
    var equipmentType = document.getElementById("equipment_add_type").value;
    var companyId = document.getElementById('companyId').value;
    if (val_equipmentType(equipmentType)) {
        $.ajax({
            url: 'master/equipment_add.php?type=' + 'equipmentadd',
            type: 'POST',
            data: {

                companyID: companyId,
                equipmentType: equipmentType,
            },
            dataType: 'text',
            success: function (data) {
                swal("Success", data, "success");
                $('#Add_Equipment_Type').modal('hide');
            },

        });
    }
}

//update Equipment Function
function updateEquipment(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/equipment_add.php?type=' + 'edit_equipment',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, "success");
            //$('#currency').modal('hide');
        }
    });
}

// Delete Equipment Type Function
function deleteEquipment(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'master/equipment_add.php?type=' + 'delete_equipment',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

//insert Equipment Type Data into Database using Excel
function importEquipment() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/equipment_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, "success");
        }
    });
}

// Export Excel Function for Equipment Type
function exportEquipment() {
    $.ajax({
        url: 'master/equipment_add.php?type=' + 'export_equipment',
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

//ajax Function For insert Truck Type
function addTruck() {
    var truckType = document.getElementById("truck_add_type").value;
    var companyId = document.getElementById('companyId').value;
    if (val_truckType(truckType)) {
        $.ajax({
            url: 'master/truck_add.php?type=' + 'truckadd',
            type: 'POST',
            data: {
                companyID: companyId,
                truckType: truckType,
            },
            dataType: 'text',
            success: function (data) {
                swal("Success", data, "success");
                $('#Add_Truck_Type').modal('hide');
            },

        });
    }
}

//Update Truck Type
function updateTruck(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/truck_add.php?type=' + 'edit_truck',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, "success");
            //$('#currency').modal('hide');
        }
    });
}

// Delete Truck Type Function
function deleteTruck(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'master/truck_add.php?type=' + 'delete_Truck',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

//insert Truck Type Data into Database using Excel
function importTruck() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/truck_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, "success");
        }
    });
}

// Export Excel Function for Truck Type
function exportTruck() {
    $.ajax({
        url: 'master/truck_add.php?type=' + 'export_truck',
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

//ajax Function For insert Trailer Type
function addTrailer() {
    var trailerType = document.getElementById("trailer_add_type").value;
    var companyId = document.getElementById('companyId').value;
    if (val_trailerType(trailerType)) {
        $.ajax({
            url: 'master/trailer_add.php?type=' + 'traileradd',
            type: 'POST',
            data: {
                companyID: companyId,
                trailerType: trailerType,
            },
            dataType: 'text',
            success: function (data) {
                swal("Success", data, "success");
                $('#Add_Trailer_Type').modal('hide');
            },

        });
    }
}

//update Trailer Function
function updateTrailer(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/trailer_add.php?type=' + 'edit_trailer',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, "success");
            //$('#currency').modal('hide');
        }
    });
}

// Delete trailer Type Function
function deleteTrailer(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'master/trailer_add.php?type=' + 'delete_trailer',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

//insert Trailer Data into Database using Excel
function importTrailer() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/trailer_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, "success");
        }
    });
}

// Export Excel Function for Trailer Type
function exporttrailer() {
    $.ajax({
        url: 'master/trailer_add.php?type=' + 'export_trailer',
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

//ajax Function For insert Fix Pay
function addFixpay() {
    var fixpay = document.getElementById("fix_pay_add").value;
    var companyId = document.getElementById('companyId').value;
    if (val_fixpay(fixpay)) {
        $.ajax({
            url: 'master/fixpay_add.php?type=' + 'fixpayadd',
            type: 'POST',
            data: {
                companyID: companyId,
                fixpay: fixpay,
            },
            dataType: 'text',
            success: function (data) {
                swal("Success", data, "success");
                $('#Fix_Pay_Category').modal('hide');
            },

        });
    }
}

//update fixPay Function
function updatefixPay(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'master/fixpay_add.php?type=' + 'edit_fixpay',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success", data, "success");
            //$('#currency').modal('hide');
        }
    });
}

// Delete FixPay Function
function deletefixpay(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'master/fixpay_add.php?type=' + 'delete_fixpay',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success", data, "success");
                //$('#currency').modal('hide');
            }
        });
    }
}

// Export Excel Function for FixPay
function exportfixpay() {
    $.ajax({
        url: 'master/fixpay_add.php?type=' + 'export_fixpay',
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

//insert Fix Pay Data into Database using Excel
function importfixpay() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/fixpay_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success", data, "success");
        }
    });
}

/*------------- Debit Bank Category  START  --------------------*/

//Add Debit
function addDebitCategory() {
    var bankName = document.getElementById("debit_category_name").value;
    var companyId = document.getElementById('companyId').value;

    if (val_DebitValidate(bankName)) {
        $.ajax({
            url: 'master/bank_debit_category.php?type=' + 'bank_debit',
            type: 'POST',
            data: {
                companyId: companyId,
                bankName: bankName,
            },
            dataType: 'text',
            success: function (data) {
                swal('Success', data, 'success');
                $("#Add_Bank_Debit_Category").modal("hide");
            },
            error: function () {

            },
        });
    }
}

// Delete Debit
function deleteBankDebit(id) {
    if (confirm('Are you Sure ?')) {
        $.ajax({
            url: 'master/bank_debit_category.php?type=' + 'delete_bank_term',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Delete', 'Data Removed Successfully.', 'success');
            }
        });
    }
}

// Update Debit
function updateBankDebit(element, column, id) {
    var companyId = document.getElementById('companyId').value;
    var value = element.innerText;
    $.ajax({
        url: 'master/bank_debit_category.php?type=' + 'edit_bank_term',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal('Update', data, 'success');
            $('#Add_Bank_Debit_Category').modal('hide');
        }
    });
}

// Import Debit
function importDebit() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/bank_debit_category.php?type=' + 'import_Excel',
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

// Export debit
function export_Excel() {
    $.ajax({
        url: 'master/bank_debit_category.php?type=' + 'export_bank_terms',
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
            alert(link);
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_debit.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*------------------ Debit Bank Category END  -------------------------------*/

/*------------------ Credit Bank Category START -----------------------------*/

// Add Credit
function addCreditCategory() {
    var creditName = document.getElementById("credit_category_name").value;
    var companyId = document.getElementById('companyId').value;

    if (val_CreditValidate(creditName)) {
        $.ajax({
            url: 'master/bank_credit_category.php?type=' + 'bank_credit',
            type: 'POST',
            data: {
                companyId: companyId,
                creditName: creditName,
            },
            dataType: 'text',
            success: function (data) {
                swal('Success', data, 'success');
                $("#Credit_Category").modal("hide");
            },
            error: function () {
            },
        });
    }
}

// Update Credit
function updateBankCredit(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'master/bank_credit_category.php?type=' + 'edit_bank_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal('Update', "Data Update Successfully.", 'success');
            $('#Credit_Category').modal('hide');
        }
    });
}

// Delete Credit
function deleteBankCredit(id) {
    if (confirm("Are you Sure?")) {
        $.ajax({
            url: 'master/bank_credit_category.php?type=' + 'delete_bank_credit',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Delete', 'Data Delete Successfully.', 'success');
            }
        });
    }
}

// Import Credit
function importCredit() {
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file1", document.getElementById('file1').files[0]);

    $.ajax({
        url: 'master/bank_credit_category.php?type=' + 'importCredit',
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

// Export Credit
function exportExcelCredit() {
    $.ajax({
        url: 'master/bank_credit_category.php?type=' + 'export_bank_credit',
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
            link.setAttribute("download", "bank_credit.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*----------------------- Credit Bank Category END -------------------*/

/*----------------------- Credit Card Category START ------------------*/

// Add Card
function addCreditCard() {
    var cardName = document.getElementById("credit_card_name").value;
    var companyId = document.getElementById('companyId').value;

    if (val_CardValidate(cardName)) {
        $.ajax({
            url: 'master/credit_card_category.php?type=' + 'card_credit',
            type: 'POST',
            data: {
                companyId: companyId,
                cardName: cardName,
            },
            dataType: 'text',
            success: function (data) {
                swal('Success', data, 'success');
                $("#Category").modal("hide");
            },
            error: function () {

            },
        });
    }
}

// Update Card
function updateBankCard(element, column, id) {
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;

    $.ajax({
        url: 'master/credit_card_category.php?type=' + 'edit_bank_card',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal('Success', "Data Update Successfully.", 'success');
            $('#Category').modal('hide');
        }
    });
}

// Delete Card
function deleteBankCard(id) {
    if (confirm("Are you Sure ?")) {
        $.ajax({
            url: 'master/credit_card_category.php?type=' + 'delete_card',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Delete', 'Data Delete Successfully.', 'success');
            }
        });
    }
}

// Import Debit
function importCard() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file_test", document.getElementById('file_test').files[0]);

    $.ajax({
        url: 'master/credit_card_category.php?type=' + 'importCard',
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

function export_Card() {
    $.ajax({
        url: 'master/credit_card_category.php?type=' + 'export_Card',
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
            link.setAttribute("download", "credit_bank.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*--------------------------- Credit Card Category END  --------------------*/

/*----------------------- Status Type START ----------------------*/

function addStatusType() {
    var status_name = document.getElementById("status_name").value;
    var status_color = document.getElementById("status_color").value;
    var companyId = document.getElementById('companyId').value;

    if (val_statusValidate(status_name)) {
        $.ajax({
            url: 'master/status_types.php?type=' + 'status_type',
            type: 'POST',
            data: {
                companyId: companyId,
                status_name: status_name,
                status_color: status_color
            },
            dataType: 'text',
            success: function (data) {
                swal('Success', data, 'success');
                $("#Add_Status_Type").modal("hide");
            },
            error: function () {
            },
        });
    }
}

// Update Status
function updateStatus(element, column, id) {
    var value = element.innerText;
    //var statuscolor = document.getElementById('statuscolor').value;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/status_types.php?type=' + 'edit_status',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal('Success', "Data Update Success.", 'success');
            $('#Add_Status_Type').modal('hide');
        }
    });
}

function update_Status(element, column, id) {
    //var value = element.innerText;
    var statuscolor = document.getElementById('statuscolor').value;
    //alert(statuscolor);
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'master/status_types.php?type=' + 'edit_color',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            statuscolor: statuscolor,
        },
        success: function (data) {
            swal('Success', "Data Update Success.", 'success');
            $('#Add_Status_Type').modal('hide');
        }
    });
}

// Import Status
function importStatus() {
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'master/status_types.php?type=' + 'importStatus',
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

// Delete Status
function deleteStatus(id) {
    if (confirm("Are you Sure ?")) {
        $.ajax({
            url: 'master/status_types.php?type=' + 'delete_Status',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal('Success', 'Data Delete Success.', 'success');
            }
        });
    }
}

/*---------------------- Status Type END ------------------------*/

/*---------------------- IFTA Card Category START ------------------------*/

// Add Ifta Card
function add_CardCategory() {
    var cardHolderName = $("#cardHolderName").val();
    var iftaCardNo = document.getElementById("iftaCardNo").value;
    var employeeNo = document.getElementById("employeeNo").value;
    var cardType = document.getElementById("cardType").value;
    var companyId = document.getElementById('companyId').value;

    if (val_cardHolderName(cardHolderName)) {
        if (val_iftaCardNo(iftaCardNo)) {
            if (val_CardType(cardType)) {
                $.ajax({
                    url: 'master/ifta_card_category.php?type=' + 'card_category',
                    type: 'POST',
                    data: {
                        companyId: companyId,
                        cardHolderName: cardHolderName,
                        iftaCardNo: iftaCardNo,
                        employeeNo: employeeNo,
                        cardType: cardType,
                    },
                    dataType: 'text',
                    success: function (data) {
                        swal('Success', data, 'success');
                        $("#Add_Ifta_Card").modal("hide");
                    },
                    error: function () {
                    },
                });
            }
        }
    }
}

// Update IFTA Card
function updateCardCat(element,column,id){
    var value = element.innerText;

    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url:'master/ifta_card_category.php?type='+'edit_ifta',
        type:'POST',
        data:{
            companyId: companyId,
            column: column,
            id:id,
            value:value,
        },
        success: function (data) {
            swal('Success',"Data Update Success.",'success');
            $('#Add_Ifta_Card').modal('hide');
        }
    });
}

function deleteCardCat(id) {
    if (confirm("Are you Sure ?")) {
        $.ajax({
            url:'master/ifta_card_category.php?type='+'delete_Ifta',
            type:'POST',
            data:{id:id},
            success: function (data) {
                swal('Success','Data Delete Success.','success');
            }
        });
    }
}

// Import IFTA Card
function importCard_Cat() {
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file",document.getElementById('file').files[0]);

    $.ajax({
        url:'master/ifta_card_category.php?type='+'import_Ifta',
        method:'post',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal('Success',data,'success');
        }
    });
}


/*---------------------- IFTA Card Category END ------------------------*/

