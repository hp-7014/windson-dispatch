var companyid = $('#companyid').val();
//-----------------Payment Terms start-------------------------------------

//update Payment Terms table

var paymentpath = "payment_terms/";
var paymentpath1 = $('#companyid').val();
var paymentdata = paymentpath1.toString();
var payment_test = paymentpath + paymentdata;

database.ref(payment_test).on('child_added', function(data) {
    updatePaymentTermTable();
});

database.ref(payment_test).on('child_changed', function(data) {
    updatePaymentTermTable();
});

database.ref(payment_test).on('child_removed', function(data) {
    updatePaymentTermTable();
});

//update table fields

function updatePaymentTermTable() {
    var paymentTermsBody = document.getElementById("paymentTermsBody");

    $.ajax({
        url: 'master/utils/getPaymentTerms.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (paymentTermsBody != null) {
                paymentTermsBody.innerHTML = response;
            }
            //document.getElementById('paymentTermsBody').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Insert function for ADD Payment Terms
function addPaymentTerms() {
    var payment_term = document.getElementById('payment_term').value;
    var companyId = document.getElementById('companyId').value;

    if (val_payment_term(payment_term)) {
        $(".loader1").show();
        // alert("inside");
        $.ajax({
            url: 'master/payment_terms.php?type=' + 'add_payment_term',
            type: 'POST',
            data: {
                companyid: companyId,
                payment_term: payment_term,
            },
            // beforeSend: function () {
            //     $('.load').load('master/js/loader.php');
            //     setTimeout(1000);
            // },
            success: function(data) {
                database.ref('payment_terms').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $('#AddPayment').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }
        });
    }
}

// import excel function for Payment Terms
function importExcel() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();
    $.ajax({
        url: 'master/payment_terms.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('payment_terms').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            document.getElementById('file').value = null;
            $(".wrap-loader").hide();
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

//edit function for updating Payment Terms
function updatePayment(column, id, value) {

    //var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/payment_terms.php?type=' + 'edit_payment_term',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('payment_terms').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// delete function for Delete Paytement Terms
function deletePayment(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/payment_terms.php?type=' + 'delete_payment_term',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('payment_terms').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Export Excel function for Payment Terms
function exportExcel(id) {
    $.ajax({
        url: 'master/payment_terms.php?type=' + 'export_payment_terms',
        data: { companyid: id },
        type: 'POST',
        success: function(data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//update Office table

var officepath = "office/";
var officepath1 = $('#companyid').val();
var officedata = officepath1.toString();
var officetest = officepath + officedata;

database.ref(officetest).on('child_added', function(data) {
    updateOfficeTable();
});

database.ref(officetest).on('child_changed', function(data) {
    updateOfficeTable();
});

database.ref(officetest).on('child_removed', function(data) {
    updateOfficeTable();
});

//update table fields

function updateOfficeTable() {
    var officeBody = document.getElementById("officeBody");

    $.ajax({
        url: 'master/utils/getOffice.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (officeBody != null) {
                officeBody.innerHTML = response;
            }
            //document.getElementById('officeBody').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Insert function
function addOffice() {
    var officeName = document.getElementById('officeName').value;
    var officeLocation = document.getElementById('officeLocation').value;
    var companyId = document.getElementById('companyId').value;

    if (val_officeName(officeName)) {
        if (val_officeLocation(officeLocation)) {
            $(".loader1").show();
            $.ajax({
                url: 'master/office_driver.php?type=' + 'add_office',
                type: 'POST',
                data: {
                    companyId: companyId,
                    officeName: officeName,
                    officeLocation: officeLocation,
                },
                success: function(data) {
                    database.ref('office').child(companyid).set({
                        data: randomString(),
                    });
                    swal('Inserted', 'Data Inserted Successfully.', 'success');
                    $(".loader1").hide();
                    $('#addOffice').modal('hide');
                },
                error: function() {
                    swal("Try again !", "Problem occurred while entering your record", "error");
                }
            });
        }
    }
}

// update function
function updateOffice(column, id, value) {

    //var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/office_driver.php?type=' + 'edit_office',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('office').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// delete function
function deleteOffice(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/office_driver.php?type=' + 'delete_office',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('office').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// import excel function
function importOffice() {

    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }

    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();
    $.ajax({
        url: 'master/office_driver.php?type=' + 'importOffice',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('office').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        }
    });
}

// Export Excel
function exportOffice() {
    $.ajax({
        url: 'master/office_driver.php?type=' + 'exportOffice',
        type: 'post',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//update company table

var companypath = "company/";
var companypath1 = $('#companyid').val();
var companydata = companypath1.toString();
var companytest = companypath + companydata;


database.ref(companytest).on('child_added', function(data) {
    updateCompanyTable();
});
database.ref(companytest).on('child_changed', function(data) {
    updateCompanyTable();
});
database.ref(companytest).on('child_removed', function(data) {
    updateCompanyTable();
});

//update table fields

function updateCompanyTable() {
    var companyBody = document.getElementById('companyBody');
    var selectCompany = document.getElementById('selectCompany');
    var AccountHolderCompany = document.getElementById('accountHolder');
    $.ajax({
        url: 'master/utils/getCompany.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            //alert(response);
            var res = response.split('^');

            //alert(res.length);
            if (companyBody != null) {
                companyBody.innerHTML = res[0];
            }
            if (selectCompany != null) {
                selectCompany.innerHTML = res[1];
            }
            if (AccountHolderCompany != null) {
                AccountHolderCompany.innerHTML = res[2];
            }
        },
    });
}

// Insert function
function addCompany() {
    var companyName = document.getElementById('companyName').value;
    var shippingAddress = document.getElementById('shippingAddress').value;
    var telephoneNo = document.getElementById('telephoneNo').value;
    var faxNo = document.getElementById('faxNo').value;
    var mcNo = document.getElementById('mcNo').value;
    var usDotNo = document.getElementById('usDotNo').value;
    var mailingAddress = document.getElementById('mailingAddress').value;
    var factoringCompany1 = document.getElementById('factoringCompany').value;
    var factoringCompany_1 = factoringCompany1.split(")");
    var factoringCompany = factoringCompany_1[0];
    // var factoringCompanyAddress = document.getElementById('factoringCompanyAddress').value;
    var companyId = $('#compnayid').val();

    if (val_companyName(companyName)) {
        if (val_telephoneNo(telephoneNo)) {
            if (val_faxNo(faxNo)) {
                if (val_mailingAddress(mailingAddress)) {
                    $(".loader1").show();
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
                            // factoringCompanyAddress: factoringCompanyAddress,
                        },
                        success: function(data) {
                            database.ref('company').child(companyid).set({
                                data: randomString(),
                            });
                            swal('Inserted', 'Data Inserted Successfully.', 'success');
                            $(".loader1").hide();
                            $('#add_company').modal('hide');
                        },
                        error: function() {
                            swal("Try again !", "Problem occurred while entering your record", "error");
                        }
                    });
                }
            }
        }
    }
}

// delete company
function deleteCompany(id, factoringid) {
    if (confirm('Are you sure to remove this record ?')) {
        $.ajax({
            url: 'master/company_driver.php?type=' + 'delete_company',
            type: 'POST',
            data: { id: id, factoringid: factoringid },
            success: function(data) {
                database.ref('company').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// update function
function updateCompany(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/company_driver.php?type=' + 'edit_company',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('company').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

//export company
function exportCompany() {
    $.ajax({
        url: 'master/company_driver.php?type=' + 'exportCompany',
        type: 'post',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();
    $.ajax({
        url: 'master/company_driver.php?type=' + 'importCompany',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('company').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

//-------------Company function End--------------

//------------Load function Start----------------
//update Load Type table

var loadpath = "load_type/";
var loadpath1 = $('#companyid').val();
var loaddata = loadpath1.toString();
var loadtest = loadpath + loaddata;


database.ref(loadtest).on('child_added', function(data) {
    updateLoadTable();
});
database.ref(loadtest).on('child_changed', function(data) {
    updateLoadTable();
});
database.ref(loadtest).on('child_removed', function(data) {
    updateLoadTable();
});

//update table fields

function updateLoadTable() {
    var loadBody = document.getElementById('loadTypeBody');
    var loadList = document.getElementById('browsersloadtype');
    $.ajax({
        url: 'master/utils/getLoadType.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            var res = response.split('^');
            if (loadBody != null) {
                loadBody.innerHTML = res[0];
            }
            if (loadList != null) {
                loadList.innerHTML = res[1];
            }
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

function addLoadType() {
    var loadName = document.getElementById('loadName').value;
    var loadType = document.getElementById('loadType').value;
    var companyId = document.getElementById('companyId').value;

    if (val_loadName(loadName)) {
        if (val_loadType(loadType)) {
            $(".loader1").show();
            $.ajax({
                url: 'master/loadType_driver.php?type=' + 'add_loadType',
                type: 'POST',
                data: {
                    companyid: companyId,
                    loadName: loadName,
                    loadType: loadType,
                },
                success: function(data) {
                    database.ref('load_type').child(companyid).set({
                        data: randomString(),
                    });
                    swal('Inserted', 'Data Inserted Successfully.', 'success');
                    $(".loader1").hide();
                    $('#addLoad_Type').modal('hide');
                },
                error: function() {
                    swal("Try again !", "Problem occurred while entering your record", "error");
                }
            });
        }
    }
}

// update function
function updateloadType(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    //var value = element.innerText;
    $(".loader1").show();
    $.ajax({
        url: 'master/loadType_driver.php?type=' + 'edit_loadType',
        type: 'POST',
        data: {
            companyid: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('load_type').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $("#updateTable").modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// delete load
function deleteloadType(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/loadType_driver.php?type=' + 'delete_loadType',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('load_type').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

//export load
function exportLoadType() {
    $.ajax({
        url: 'master/loadType_driver.php?type=' + 'exportLoadType',
        type: 'post',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            //alert(link);
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

// import excel function
function importLoadType() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();
    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();
    $.ajax({
        url: 'master/loadType_driver.php?type=' + 'importLoadType',
        type: 'POST',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('load_type').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

//ajax Function For insert Currency Setting
function addCurrency() {
    var currencyType = document.getElementById("currency_add_type").value;
    var companyId = document.getElementById('companyId').value;

    if (val_currencyType(currencyType)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/currency_add.php?type=' + 'currencyadd',
            type: 'POST',
            data: {
                companyID: companyId,
                currencyType: currencyType,
            },
            dataType: 'text',
            success: function(data) {
                var companyid = $('#companyid').val();
                database.ref('currency_settings').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $('#currencysub').modal('hide');
                $(".loader1").hide();

            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }
        });
    }
}

//update currency table

var path = "currency_settings/";
var path1 = $('#companyid').val();
var data = path1.toString();
var test = path + data;

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

function updateCurrencyTable() {
    var currencyBody = document.getElementById('currencyBody');
    var currencyList = document.getElementById('selectCurrency');
    var currencyFactoring = document.getElementById('currencyset');
    var currencySetting = document.getElementById('currencySetting');
    var currencyList1 = document.getElementById('driverCurrency');

    $.ajax({
        url: 'master/utils/getCurrency.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            var res = response.split('^');

            if (currencyBody != null) {
                currencyBody.innerHTML = res[0];
            }
            if (currencyList != null) {
                currencyList.innerHTML = res[1];
            }
            if (currencyFactoring != null) {
                currencyFactoring.innerHTML = res[2];
            }
            if (currencySetting != null) {
                currencySetting.innerHTML = res[3];
            }
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

//update currency Function
function updateCurrency(column, id, value) {
    // var value = element.innerText;
    //var data = $('#currency_table').find('input[type="text"],textarea').val();
    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/currency_add.php?type=' + 'edit_currency',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            var companyid = $('#companyid').val();
            database.ref('currency_settings').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $("#updateTable").modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

//insert data into Database using Excel
function importCurrency() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }

    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();
    $.ajax({
        url: 'master/currency_add.php?type=' + 'importExcel_cur',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            var companyid = $('#companyid').val();
            database.ref('currency_settings').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            document.getElementById('file').value = null;
            $(".wrap-loader").hide();
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

// Delete Currency Function
function deleteCurrency(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/currency_add.php?type=' + 'delete_currency',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                var companyid = $('#companyid').val();
                database.ref('currency_settings').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
                $('#currencysub').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Export Excel Function for Currency Type
function exportCurrency() {
    $.ajax({
        url: 'master/currency_add.php?type=' + 'export_currency',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//update Equipment Type table

var equipmentpath = "equipment_add/";
var equipmentpath1 = $('#companyid').val();
var equipmentdata = equipmentpath1.toString();
var equipmenttest = equipmentpath + equipmentdata;


database.ref(equipmenttest).on('child_added', function(data) {
    updateEquipmentTypeTable();
});
database.ref(equipmenttest).on('child_changed', function(data) {
    updateEquipmentTypeTable();
});
database.ref(equipmenttest).on('child_removed', function(data) {
    updateEquipmentTypeTable();
});

//update table fields

function updateEquipmentTypeTable() {
    var equipmentBody = document.getElementById('equipmentBody');
    //var equipmentList = document.getElementById('browsersequipment');
    $.ajax({
        url: 'master/utils/getEquipmentType.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            //var res = response.split('^');
            if (equipmentBody != null) {
                equipmentBody.innerHTML = response;
            }
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }

    });
}

function addEquipment() {
    var equipmentType = document.getElementById("equipment_add_type").value;
    var companyId = document.getElementById('companyId').value;
    if (val_equipmentType(equipmentType)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/equipment_add.php?type=' + 'equipmentadd',
            type: 'POST',
            data: {

                companyID: companyId,
                equipmentType: equipmentType,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('equipment_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $('#Add_Equipment_Type').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }

        });
    }
}

//update Equipment Function
function updateEquipment(column, id, value) {
    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/equipment_add.php?type=' + 'edit_equipment',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('equipment_add').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete Equipment Type Function
function deleteEquipment(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/equipment_add.php?type=' + 'delete_equipment',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('equipment_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
                //$('#currency').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

//insert Equipment Type Data into Database using Excel
function importEquipment() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();
    $.ajax({
        url: 'master/equipment_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('equipment_add').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

// Export Excel Function for Equipment Type
function exportEquipment() {
    $.ajax({
        url: 'master/equipment_add.php?type=' + 'export_equipment',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//update Truck Type table

var trucktypepath = "truck_add/";
var trucktypepath1 = $('#companyid').val();
var trucktypedata = trucktypepath1.toString();
var trucktypetest = trucktypepath + trucktypedata;

database.ref(trucktypetest).on('child_added', function(data) {
    updateTruckTypeTable();
});
database.ref(trucktypetest).on('child_changed', function(data) {
    updateTruckTypeTable();
});
database.ref(trucktypetest).on('child_removed', function(data) {
    updateTruckTypeTable();
});

//update table fields

function updateTruckTypeTable() {
    var truckBody = document.getElementById('truckBody');

    $.ajax({
        url: 'master/utils/getTruckType.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            //alert(response);
            if (truckBody != null) {
                truckBody.innerHTML = response;
            }
            //document.getElementById('truckBody').innerHTML = response;
        },
    });
}

function addTruck() {
    var truckType = document.getElementById("truck_add_type").value;
    var companyId = document.getElementById('companyId').value;
    if (val_truckType(truckType)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/truck_add.php?type=' + 'truckadd',
            type: 'POST',
            data: {
                companyID: companyId,
                truckType: truckType,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('truck_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $('#Add_Truck_Type').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }

        });
    }
}

//Update Truck Type
function updateTruck(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/truck_add.php?type=' + 'edit_truck',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('truck_add').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $("#updateTable").modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete Truck Type Function
function deleteTruck(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/truck_add.php?type=' + 'delete_Truck',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('truck_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
                //$('#currency').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

//insert Truck Type Data into Database using Excel
function importTruck() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }

    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/truck_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('truck_add').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

// Export Excel Function for Truck Type
function exportTruck() {
    $.ajax({
        url: 'master/truck_add.php?type=' + 'export_truck',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//ajax Function For insert Trailer Type
var trailertypepath = "trailer_type_add/";
var trailertypepath1 = $('#companyid').val();
var trailertypedata = trailertypepath1.toString();
var trailertypetest = trailertypepath + trailertypedata;


database.ref(trailertypetest).on('child_added', function(data) {
    updateTrailerTypeTable();
});

database.ref(trailertypetest).on('child_changed', function(data) {
    updateTrailerTypeTable();
});

database.ref(trailertypetest).on('child_removed', function(data) {
    updateTrailerTypeTable();
});

//update table fields

function updateTrailerTypeTable() {
    var trailerTBody = document.getElementById("trailerTBody");
    $.ajax({
        url: 'master/utils/getTrailerType.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (trailerTBody != null) {
                trailerTBody.innerHTML = response;
            }
            //document.getElementById('trailerTBody').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

function addTrailer() {
    var trailerType = document.getElementById("trailer_add_type").value;
    var companyId = document.getElementById('companyId').value;
    if (val_trailerType(trailerType)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/trailer_add.php?type=' + 'traileradd',
            type: 'POST',
            data: {
                companyID: companyId,
                trailerType: trailerType,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('trailer_type_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $('#Add_Trailer_Type').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }

        });
    }
}

//update Trailer Function
function updateTrailer(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/trailer_add.php?type=' + 'edit_trailer',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('trailer_type_add').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete trailer Type Function
function deleteTrailer(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/trailer_add.php?type=' + 'delete_trailer',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('trailer_type_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
                //$('#currency').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

//insert Trailer Data into Database using Excel
function importTrailer() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/trailer_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('trailer_type_add').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

// Export Excel Function for Trailer Type
function exporttrailer() {
    $.ajax({
        url: 'master/trailer_add.php?type=' + 'export_trailer',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//update Fix Pay Category table

var fixpaypath = "fixpay_add/";
var fixpaypath1 = $('#companyid').val();
var fixpaydata = fixpaypath1.toString();
var fixpaytest = fixpaypath + fixpaydata;


database.ref(fixpaytest).on('child_added', function(data) {
    updateFixPayTable();
});

database.ref(fixpaytest).on('child_changed', function(data) {
    updateFixPayTable();
});

database.ref(fixpaytest).on('child_removed', function(data) {
    updateFixPayTable();
});

//update table fields

function updateFixPayTable() {
    var fixpayBody = document.getElementById("fixpayBody");
    $.ajax({
        url: 'master/utils/getFixPayCategory.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (fixpayBody != null) {
                fixpayBody.innerHTML = response;
            }
            //document.getElementById('fixpayBody').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

function addFixpay() {
    var fixpay = document.getElementById("fix_pay_add").value;
    var companyId = document.getElementById('companyId').value;
    if (val_fixpay(fixpay)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/fixpay_add.php?type=' + 'fixpayadd',
            type: 'POST',
            data: {
                companyID: companyId,
                fixpay: fixpay,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('fixpay_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $('#addFixPay').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }

        });
    }
}

//update fixPay Function
function updatefixPay(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/fixpay_add.php?type=' + 'edit_fixpay',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('fixpay_add').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete FixPay Function
function deletefixpay(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/fixpay_add.php?type=' + 'delete_fixpay',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('fixpay_add').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
                //$('#currency').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Export Excel Function for FixPay
function exportfixpay() {
    $.ajax({
        url: 'master/fixpay_add.php?type=' + 'export_fixpay',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }

    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/fixpay_add.php?type=' + 'importExcel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('fixpay_add').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

/*------------- Debit Bank Category  START  --------------------*/

//update Debit Bank table

var debitpath = "bank_debit_category/";
var debitpath1 = $('#companyid').val();
var debitdata = debitpath1.toString();
var debittest = debitpath + debitdata;


database.ref(debittest).on('child_added', function(data) {
    updateDebitTable();
});

database.ref(debittest).on('child_changed', function(data) {
    updateDebitTable();
});

database.ref(debittest).on('child_removed', function(data) {
    updateDebitTable();
});

//update table fields

function updateDebitTable() {
    var bankDebitID = document.getElementById("bankDebitID");
    $.ajax({
        url: 'master/utils/getBankDebit.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (bankDebitID != null) {
                bankDebitID.innerHTML = response;
            }
            //document.getElementById('bankDebitID').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

//Add Debit
function addDebitCategory() {
    var bankName = document.getElementById("debit_category_name").value;
    var companyId = document.getElementById('companyId').value;

    if (val_DebitValidate(bankName)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/bank_debit_category.php?type=' + 'bank_debit',
            type: 'POST',
            data: {
                companyId: companyId,
                bankName: bankName,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('bank_debit_category').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $("#Add_Debit_Category").modal("hide");
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }
        });
    }
}

// Delete Debit
function deleteBankDebit(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/bank_debit_category.php?type=' + 'delete_bank_term',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('bank_debit_category').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Update Debit
function updateBankDebit(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    //alert(companyId);
    $.ajax({
        url: 'master/bank_debit_category.php?type=' + 'edit_bank_term',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('bank_debit_category').child(companyId).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Import Debit
function importDebit() {

    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/bank_debit_category.php?type=' + 'import_Excel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('bank_debit_category').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

// Export debit
function export_Excel() {
    $.ajax({
        url: 'master/bank_debit_category.php?type=' + 'export_bank_terms',
        type: 'post',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            //alert(link);
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_debit.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

/*------------------ Debit Bank Category END  -------------------------------*/

/*------------------ Credit Bank Category START -----------------------------*/

//update Credit Bank table

var creditpath = "bank_credit_category/";
var creditpath1 = $('#companyid').val();
var creditdata = creditpath1.toString();
var credittest = creditpath + creditdata;


database.ref(credittest).on('child_added', function(data) {
    updateCreditTable();
});

database.ref(credittest).on('child_changed', function(data) {
    updateCreditTable();
});

database.ref(credittest).on('child_removed', function(data) {
    updateCreditTable();
});

//update table fields

function updateCreditTable() {
    var creditBody = document.getElementById("creditBody");
    $.ajax({
        url: 'master/utils/getCreditCategory.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (creditBody != null) {
                creditBody.innerHTML = response;
            }
            //document.getElementById('creditBody').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Add Credit
function addCreditCategory() {
    var creditName = document.getElementById("credit_category_name").value;
    var companyId = document.getElementById('companyId').value;

    if (val_CreditValidate(creditName)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/bank_credit_category.php?type=' + 'bank_credit',
            type: 'POST',
            data: {
                companyId: companyId,
                creditName: creditName,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('bank_credit_category').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $("#addCredit_Category").modal("hide");
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }
        });
    }
}

// Update Credit
function updateBankCredit(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/bank_credit_category.php?type=' + 'edit_bank_credit',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('bank_credit_category').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete Credit
function deleteBankCredit(id) {
    if (confirm("Are you sure you want to delete the record ?")) {
        $.ajax({
            url: 'master/bank_credit_category.php?type=' + 'delete_bank_credit',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('bank_credit_category').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Import Credit
function importCredit() {

    var file = document.getElementById('file1').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();

    form_data.append("file1", document.getElementById('file1').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/bank_credit_category.php?type=' + 'importCredit',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('bank_credit_category').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

// Export Credit
function exportExcelCredit() {
    $.ajax({
        url: 'master/bank_credit_category.php?type=' + 'export_bank_credit',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);
            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

//update Credit Card  table

var cardpath = "credit_card_category/";
var cardpath1 = $('#companyid').val();
var carddata = cardpath1.toString();
var cardtest = cardpath + carddata;


database.ref(cardtest).on('child_added', function(data) {
    updateCardTable();
});

database.ref(cardtest).on('child_changed', function(data) {
    updateCardTable();
});

database.ref(cardtest).on('child_removed', function(data) {
    updateCardTable();
});

//update table fields

function updateCardTable() {
    var cardBody = document.getElementById("cardBody");
    $.ajax({
        url: 'master/utils/getCreditCard.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            if (cardBody != null) {
                cardBody.innerHTML = response;
            }
            //document.getElementById('cardBody').innerHTML = response;
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Add Card
function addCreditCard() {
    var cardName = document.getElementById("credit_card_name").value;
    var companyId = document.getElementById('companyId').value;

    if (val_CardValidate(cardName)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/credit_card_category.php?type=' + 'card_credit',
            type: 'POST',
            data: {
                companyId: companyId,
                cardName: cardName,
            },
            dataType: 'text',
            success: function(data) {
                database.ref('credit_card_category').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $("#addCreditcard").modal("hide");
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }
        });
    }
}

// Update Card
function updateBankCard(column, id, value) {

    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/credit_card_category.php?type=' + 'edit_bank_card',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            database.ref('credit_card_category').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $('#updateTable').modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete Card
function deleteBankCard(id) {
    if (confirm("Are you sure you want to delete the record ?")) {
        $.ajax({
            url: 'master/credit_card_category.php?type=' + 'delete_card',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                database.ref('credit_card_category').child(companyid).set({
                    data: randomString(),
                });
                swal('Delete', 'Data Deleted Successfully.', 'success');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Import Debit
function importCard() {
    var file = document.getElementById('file2').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }
    var form_data = new FormData();
    //alert(form_data);
    form_data.append("file_test", document.getElementById('file_test').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/credit_card_category.php?type=' + 'importCard',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            database.ref('credit_card_category').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

function export_Card() {
    $.ajax({
        url: 'master/credit_card_category.php?type=' + 'export_Card',
        type: 'POST',

        success: function(data) {
            var rows = JSON.parse(data);
            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
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

/*----------------------Fuel Card Type START ---------------------------*/
var fuel_path = "fuel_Card_Type/";
var fuel_path1 = $('#companyid').val();
var data = fuel_path1.toString();
var fuel_test = fuel_path + data;

database.ref(fuel_test).on('child_added', function(data) {
    updateFuelCardTable();
});
database.ref(fuel_test).on('child_changed', function(data) {
    updateFuelCardTable();
});
database.ref(fuel_test).on('child_removed', function(data) {
    updateFuelCardTable();
});

//update table fields

function updateFuelCardTable() {
    var fuelCardBody = document.getElementById('fuelCardBody');

    $.ajax({
        url: 'master/utils/getFuelCard.php',
        type: 'POST',
        dataType: 'text',
        success: function(response) {
            var res = response.split('^');

            if (fuelCardBody != null) {
                fuelCardBody.innerHTML = res[0];
            }
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

function addFuelCardType() {
    var fuelcard_type = document.getElementById("fuel_card_type").value;
    var companyId = document.getElementById('companyId').value;

    if (val_fuelcard_type(fuelcard_type)) {
        $(".loader1").show();
        $.ajax({
            url: 'master/add_fuel_type.php?type=' + 'fueltypeadd',
            type: 'POST',
            data: {
                companyID: companyId,
                fuelcard_type: fuelcard_type,
            },
            dataType: 'text',
            success: function(data) {
                var companyid = $('#companyid').val();
                database.ref('fuel_Card_Type').child(companyid).set({
                    data: randomString(),
                });
                swal('Inserted', 'Data Inserted Successfully.', 'success');
                $(".loader1").hide();
                $('#fuelcardsub').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while entering your record", "error");
            }
        });
    }
}

//update currency Function
function updateFuelCard(column, id, value) {
    var companyId = document.getElementById('companyId').value;
    $(".loader1").show();
    $.ajax({
        url: 'master/add_fuel_type.php?type=' + 'edit_fueltype',
        type: 'POST',
        data: {
            companyID: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function(data) {
            var companyid = $('#companyid').val();
            database.ref('fuel_Card_Type').child(companyid).set({
                data: randomString(),
            });
            swal('Updated', 'Data Updated Successfully.', 'success');
            $(".loader1").hide();
            $("#updateTable").modal('hide');
        },
        error: function() {
            swal("Try again !", "Problem occurred while updating your record", "error");
        }
    });
}

// Delete Fuel Card Function
function deleteFuelCard(id) {
    if (confirm('Are you sure you want to delete the record ?')) {
        $.ajax({
            url: 'master/add_fuel_type.php?type=' + 'delete_fueltype',
            type: 'POST',
            data: { id: id },
            success: function(data) {
                var companyid = $('#companyid').val();
                database.ref('fuel_Card_Type').child(companyid).set({
                    data: randomString(),
                });
                swal("Success", data, "success");
                // $('#currencysub').modal('hide');
            },
            error: function() {
                swal("Try again !", "Problem occurred while deleting your record", "error");
            }
        });
    }
}

// Export Excel Function for Fuel Card Type
function exportFuelCard() {
    $.ajax({
        url: 'master/add_fuel_type.php?type=' + 'export_fueltype',
        type: 'POST',
        success: function(data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function(rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "fuel_card.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//insert data into Database using Excel
function importFuelCard() {
    var file = document.getElementById('file').value;

    if (file == "") {
        swal('warning', 'You must select atleast one .CSV file', 'warning');
        return false;
    }

    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);
    $(".wrap-loader").show();

    $.ajax({
        url: 'master/add_fuel_type.php?type=' + 'importExcel_Fuel',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            console.log(data);
            var companyid = $('#companyid').val();
            database.ref('fuel_Card_Type').child(companyid).set({
                data: randomString(),
            });
            swal('Inserted', data, 'success');
            $(".wrap-loader").hide();
            document.getElementById('file').value = null;
        },
        error: function() {
            swal("Try again !", "Problem occurred while entering your record", "error");
        }
    });
}

/*----------------------Fuel Card Type ENDS ---------------------------*/


/*---------------------- Update Table Scripts -----------------------*/
// function updateTableColumn_s(columnvalue,functionname,type,id,column,title,pencilid) {

// }
function updateTableColumn(columnvalue, functionname, type, id, column, title, pencilid) {
    //alert(columnvalue+" "+functionname+" "+type+" "+id+" "+column+" "+title+" "+pencilid);
    $.ajax({
        type: 'POST',
        success: function(data) {
            // Master Table START
            $('.currency-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.trucktype-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.equipment-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.trailer-container1').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.fixpay-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.status-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.office-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.payment-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.loadtype-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.masterbank-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.company-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.iftacard-category-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            // Master Table ENDS

            // Admin Table START
            $('.custombroker-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.bank-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.creditcard-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.subcreditcard-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.shipper-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.consigne-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.user-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.truck-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.trailer-container-admin').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.factoring-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.customer-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.carrier-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });

            $('.toll-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.fuel-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            $('.fuel-card-container').load('./admin/update_modal.php', function(result) {
                $('#updateTable').modal({ show: true });
            });
            // $('.driver-container').load('./admin/update_modal.php', function(result) {
            //     $('#updateTable').modal({ show: true });
            // });
            
            
            // Admin Table ENDS

            setTimeout(function() {
                document.getElementById('modal-title').innerHTML = "Update " + title;
                document.getElementById('fieldLabel').innerHTML = title;
                document.getElementById('field-value').value = columnvalue;
                document.getElementById('fieldid').value = id;
                document.getElementById('fieldname').value = column;
                document.getElementById('functionname').value = functionname;
            }, 300);
        }
    });

}

function updateTableField() {
    var value = document.getElementById('field-value').value;
    var id = document.getElementById('fieldid').value;
    var name = document.getElementById('fieldname').value;
    var functionname = document.getElementById('functionname').value;
    if (functionname == "updateCustom") {
        updateCustom(name, id, value);
    } else if (functionname == 'updateCurrency') {
        updateCurrency(name, id, value);
    } else if (functionname == 'updateTruck') {
        updateTruck(name, id, value);
    } else if (functionname == 'updateEquipment') {
        updateEquipment(name, id, value);
    } else if (functionname == 'updateTrailer') {
        updateTrailer(name, id, value);
    } else if (functionname == 'updatefixPay') {
        updatefixPay(name, id, value);
    } else if (functionname == 'updateStatus') {
        updateStatus(name, id, value);
    } else if (functionname == 'updateOffice') {
        updateOffice(name, id, value);
    } else if (functionname == 'updatePayment') {
        updatePayment(name, id, value);
    } else if (functionname == 'updateloadType') {
        updateloadType(name, id, value);
    } else if (functionname == 'updateBankDebit') {
        updateBankDebit(name, id, value);
    } else if (functionname == 'updateBankCredit') {
        updateBankCredit(name, id, value);
    } else if (functionname == 'updateBankCard') {
        updateBankCard(name, id, value);
    } else if (functionname == "updateCompany") {
        updateCompany(name, id, value);
    } else if (functionname == 'updateBank') {
        updateBank(name, id, value);
    } else if (functionname == 'updateCredit') {
        updateCredit(name, id, value);
    } else if (functionname == 'updateSubCredit') {
        updateSubCredit(name, id, value);
    } else if (functionname == 'updateShipper') {
        updateShipper(name, id, value);
    } else if (functionname == 'updateDriver') {
        updateDriver(name, id, value);
    } else if (functionname == 'updateConsignee') {
        updateConsignee(name, id, value);
    } else if (functionname == 'updateUser') {
        updateUser(name, id, value);
    } else if (functionname == 'updateTruckAdd') {
        updateTruckAdd(name, id, value);
    } else if (functionname == 'updateTrailerAdd') {
        updateTrailerAdd(name, id, value);
    } else if (functionname == 'updateFactoring') {
        updateFactoring(name, id, value);
    } else if (functionname == 'updateCustomer') {
        updateCustomer(name, id, value);
    } else if (functionname == 'updateExternal') {
        updateExternal(name, id, value);
    } else if (functionname == 'updateTolls') {
        updateTolls(name, id, value);
    } else if (functionname == 'updateCardCat') {
        updateCardCat(name, id, value);
    } else if (functionname == 'updateFuel') {
        updateFuel(name, id, value);
    } else if (functionname == 'updateFuelCard') {
        updateFuelCard(name, id, value);
    }

}

function showPencil(id) {
    document.getElementById(id).style.display = 'inline-block';
    document.getElementById(id).style.float = 'left';
    document.getElementById(id).style.marginRight = '5px';
}

function hidePencil(id) {
    document.getElementById(id).style.display = 'none';
}

function showPencil_s(id) {
    document.getElementById(id).style.display = 'inline-block';
    document.getElementById(id).style.float = 'left';
    document.getElementById(id).style.marginRight = '5px';
}

function hidePencil_s(id) {
    document.getElementById(id).style.display = 'none';
}