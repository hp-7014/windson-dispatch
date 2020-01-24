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
    var accountHolder = $("#accountHolder").val();
    alert(accountHolder);

    $.ajax({
        url: 'admin/bank_admin.php?type=' + 'edit_account',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            accountHolder: accountHolder,
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
                        $("#Add_CreditCard").modal("hide");
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
    alert(value);
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
