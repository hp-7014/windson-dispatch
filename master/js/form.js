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
            success: function (data) {
                swal("Success",data,'success');
                $('#Add_Payment_Terms').modal('hide');
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
            swal("Success",data,'success');
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
            swal("Success",data,'success');
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
                swal("Success",data,'success');
            }
        });
    }
}

// Export Excel function for Payment Terms
function exportExcel(id) {

    $.ajax({
        url: 'master/payment_terms.php?type=' + 'export_payment_terms',
        data:{companyid:id},
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
                    companyId:companyId,
                    officeName: officeName,
                    officeLocation: officeLocation,
                },
                success: function (data) {
                    swal("Success",data,'success');
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
            swal("Success",data,'success');
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
                swal("Success",data,'success');
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
            swal("Success",data,'success');
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
                        swal("Success",data,'success');
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
                swal("Success",data,'success');
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
            swal("Success",data,'success');
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
            swal("Success",data,'success');
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
                        swal("Success",data,'success');
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
            swal("Success",data,'success');
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
                swal("Success",data,'success');
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
            swal("Success",data,'success');
        }
    });
}
