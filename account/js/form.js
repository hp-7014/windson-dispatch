// account step form
function toggleAccount(val) {
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

    if ($("#home-tab").hasClass("active")) {
        $("#home-tab").toggleClass("active");
    }
    if ($("#insurance-tab").hasClass("active")) {
        $("#insurance-tab").toggleClass("active");
    }

    if ($("#home-title").hasClass("show")) {
        $("#home-title").toggleClass("show");
    }
    if ($("#insurance-title").hasClass("show")) {
        $("#insurance-title").toggleClass("show");
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
    }
}
// accouunt deliver start
function updateLoadStatus(id) {
    var value1 = document.getElementById('loadStatus').value;
    var value_1 = value1.split(")");
    var value = value_1[0];
    var statusTimeColumn = value_1[1];
    alert(value);
    alert(statusTimeColumn);
    alert(id);
    var companyid = $('#companyid').val();
    $.ajax({
       url:'account/accountStatus_driver.php?type=UpdateStatus',
       method:'POST',
       data:{
            id:id,
            value:value,
            statusTimeColumn:statusTimeColumn
       },
       success: function (data) {
           database.ref('accountDeliver').child(companyid).set({
               data: randomString(),
           });
           database.ref('accountInvoice').child(companyid).set({
               data: randomString(),
           });
           swal(data);
       }
    });
}

//update Payment Terms table
var accountDeliverPath = "accountDeliver/";
var accountDeliverPath1 = $('#companyid').val();
var accountDeliverData = accountDeliverPath1.toString();
var accountDeliverTest = accountDeliverPath + accountDeliverData;

database.ref(accountDeliverTest).on('child_added', function (data) {
    updateAccountDeliverTable();
});

database.ref(accountDeliverTest).on('child_changed', function (data) {
    updateAccountDeliverTable();
});

database.ref(accountDeliverTest).on('child_removed', function (data) {
    updateAccountDeliverTable();
});

//update table fields

function updateAccountDeliverTable() {
    var accountDeliverBody = document.getElementById('accountDeliverBody');

    $.ajax({
        url: 'account/utils/getAccountDeliver.php',
        type: 'POST',
        dataType: 'text',
        success: function (response) {
            // var res = response.split('^');
            if (accountDeliverBody != null) {
                accountDeliverBody.innerHTML = response;
            }
        },
    });
}
// account deliver end

// account invoice start
function updateLoadStatus1(id) {
    // var value1 = document.getElementById('loadStatus1').value;
    var e = document.getElementById('loadStatus1');
    var value1 = e.options[e.selectedIndex].value;
    alert(id);
    alert(value1);
    var value_1 = value1.split(")");
    var value = value_1[0];
    var statusTimeColumn = value_1[1];
    alert(value);
    alert(statusTimeColumn);
    var companyid = $('#companyid').val();
    $.ajax({
        url:'account/accountStatus_driver.php?type=UpdateStatus',
        method:'POST',
        data:{
            id:id,
            value:value,
            statusTimeColumn:statusTimeColumn
        },
        success: function (data) {
            database.ref('accountInvoice').child(companyid).set({
                data: randomString(),
            });
            database.ref('accountDeliver').child(companyid).set({
                data: randomString(),
            });
            swal(data);
        }
    });
}

//update Payment Terms table
var accountinvoicePath = "accountInvoice/";
var accountinvoicePath1 = $('#companyid').val();
var accountinvoiceData = accountinvoicePath1.toString();
var accountinvoiceTest = accountinvoicePath + accountinvoiceData;

database.ref(accountinvoiceTest).on('child_added', function (data) {
    updateAccountInvoiceTable();
});

database.ref(accountinvoiceTest).on('child_changed', function (data) {
    updateAccountInvoiceTable();
});

database.ref(accountinvoiceTest).on('child_removed', function (data) {
    updateAccountInvoiceTable();
});

//update table fields

function updateAccountInvoiceTable() {
    var accountInvoiceBody = document.getElementById('accountInvoiceBody');

    $.ajax({
        url: 'account/utils/getAccountInvoice.php',
        method: 'POST',
        dataType: 'text',
        type:'html',
        success: function (response) {
            if (accountInvoiceBody != null) {
                accountInvoiceBody.innerHTML = response;
            }
        },
    });
}
// account invoice end