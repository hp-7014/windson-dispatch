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
function updateLoadStatus(id, old_value, new_value) {
    alert(old_value);
    alert(new_value);
    alert(id);
    // var value1 = document.getElementById('loadStatus').value;
    // var value_1 = value1.split(")");
    // var value = value_1[0];
    // var statusTimeColumn = value_1[1];
    // alert(value);
    // alert(statusTimeColumn);
    // alert(id);
    // var companyid = $('#companyid').val();
    // $.ajax({
    //     url: 'account/accountStatus_driver.php?type=UpdateStatus',
    //     method: 'POST',
    //     data: {
    //         id: id,
    //         value: value,
    //         statusTimeColumn: statusTimeColumn
    //     },
    //     success: function (data) {
    //         database.ref('accountDeliver').child(companyid).set({
    //             data: randomString(),
    //         });
    //         database.ref('accountInvoice').child(companyid).set({
    //             data: randomString(),
    //         });
    //         swal(data);
    //     }
    // });
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
        url: 'account/utils/getAccountDeliver.php?type=showDeliverData',
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
function updateLoadStatus1(id, value1) {
    alert(value1);
    // var value1 = document.getElementById('loadStatus1').value;
    var value_1 = value1.split(")");
    var value = value_1[0];
    alert(value);
    var statusTimeColumn = value_1[1];
    alert(statusTimeColumn);
    var companyid = $('#companyid').val();
    $.ajax({
        url: 'account/accountStatus_driver.php?type=UpdateStatus',
        method: 'POST',
        data: {
            id: id,
            value: value,
            statusTimeColumn: statusTimeColumn
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
        url: 'account/utils/getAccountInvoice.php?type=showAccountInvoice',
        method: 'POST',
        dataType: 'text',
        type: 'html',
        success: function (response) {
            if (accountInvoiceBody != null) {
                accountInvoiceBody.innerHTML = response;
            }
        },
    });
}

// account invoice end

// Search Trailer
function search_trailer(x) {
    var n = x.value;
    var companyId = $('#companyid').val();

    $.ajax({
        type: 'POST',
        url: 'account/utils/getAccountDeliver.php?type=search_text',
        data: {
            getoption: n,
            companyId: companyId,
        },
        success: function (response) {
            var j = response.trim();
            document.getElementById('accountDeliverBody').innerHTML = j;
        }
    });
}

function search_Invoice1(x) {
    var n = x.value;
    var companyId = $('#companyid').val();

    $.ajax({
        type: 'POST',
        url: 'account/utils/getAccountInvoice.php?type=search_text1',
        data: {
            getoption: n,
            companyId: companyId,
        },
        success: function (response) {
            var j = response.trim();
            document.getElementById('accountInvoiceBody').innerHTML = j;
        }
    });
}

// Paginate Trailer
function paginate_trailer(start, limit) {

    $.ajax({
        url: 'admin/utils/getTrailer.php?types=paginate_trailer_admin',
        type: 'POST',
        data: {
            start: start,
            limit: limit,
        },
        dataType: 'text',
        success: function (response) {
            document.getElementById('trailerBody').innerHTML = response;
        },
    });
}

// --------- bank code ---------------
$(document).ready(function () {
    $('#type').on('change', function () {
        if (this.value == '1') {
            $(".bank").css("display", "block");
            $(".cn").css("display", "block");
        } else {
            $(".bank").css("display", "none");
        }

        if (this.value == '2') {
            $(".Credit").css("display", "block");
        } else {
            $(".Credit").css("display", "none");
        }

        if (this.value == '3') {
            $(".fuel").css("display", "block");
        } else {
            $(".fuel").css("display", "none");
        }

        if (this.value == '4') {
            $(".cn").css("display", "block");
            $(".other1").css("display", "block");
        } else {
            $(".other1").css("display", "none");

        }
    });

    $('#purpose').on('change', function () {
        if (this.value == '1') {
            $(".driver").css("display", "block");
        } else {
            $(".driver").css("display", "none");
        }

        if (this.value == '2') {
            $(".carrier").css("display", "block");
        } else {
            $(".carrier").css("display", "none");
        }

        if (this.value == '3') {
            $(".factoring").css("display", "block");
        } else {
            $(".factoring").css("display", "none");
        }

        if (this.value == '4') {
            $(".Expenses").css("display", "block");
        } else {
            $(".Expenses").css("display", "none");
        }

        if (this.value == '5') {
            $(".Maintenance").css("display", "block");
        } else {
            $(".Maintenance").css("display", "none");
        }

        if (this.value == '6') {
            $(".Insurance").css("display", "block");
        } else {
            $(".Insurance").css("display", "none");
        }

        if (this.value == '7') {
            $(".Credit_Card").css("display", "block");
        } else {
            $(".Credit_Card").css("display", "none");
        }

        if (this.value == '8') {
            $(".Fuel_Card").css("display", "block");
        } else {
            $(".Fuel_Card").css("display", "none");
        }

        if (this.value == '9') {
            $(".other").css("display", "block");
        } else {
            $(".other").css("display", "none");
        }
    });

    $('#Advance').on('change', function () {
        if (this.value == '2') {
            $(".adv").css("display", "block");
        } else {
            $(".adv").css("display", "none");
        }
    });
    $('#card').on('change', function () {
        if (this.value == '2') {
            $(".sub").css("display", "block");
        } else {
            $(".sub").css("display", "none");
        }

        if (this.value == '1') {
            $(".main").css("display", "block");
        } else {
            $(".main").css("display", "none");
        }
    });

    $('#receipt').on('change', function () {
        if (this.value == '1') {
            $(".receipt").css("display", "block");
        } else {
            $(".receipt").css("display", "none");
        }

        if (this.value == '2') {
            $(".other").css("display", "block");
        } else {
            $(".other").css("display", "none");
        }
    });
});

function Showcheque() {
    $(".cheque").css("display", "block");
    $(".ach").css("display", "none");
}

function Showach() {
    $(".ach").css("display", "block");
    $(".cheque").css("display", "none");
}

$('#type').change(function () {
    $('#Advance').prop('selectedIndex', 0);
});
$('#type').change(function () {
    $("#purpose").prop("disabled", false);
    $(".cn").css("display", "none");
    $(".driver").css("display", "none");
    $(".carrier").css("display", "none");
    $(".factoring").css("display", "none");
    $(".Expenses").css("display", "none");
    $(".Maintenance").css("display", "none");
    $(".Insurance").css("display", "none");
    $(".Fuel_Card").css("display", "none");
    $(".other").css("display", "none");
    $(".adv").css("display", "none");
});
$(document).ready(function () {
    $("#type").change(function () {
        if (this.value == '1') {
            $("#purpose").html(
                '<option value="0" selected="true" disabled="disabled">--select--</option><option value="1">Driver</option><option value="2">Carrier</option><option value="3">Factoring</option><option value="4">Expense</option><option value="5">Maintenance</option><option value="6">Insurance</option><option value="7">Credit Card</option><option value="8">Fuel Card</option><option value="9">Other</option>'
            );
        }
        if (this.value == '2') {
            $("#purpose").html(
                '<option value="0" selected="true" disabled="disabled">--select--</option><option value="4">Expense</option><option value="5">Maintenance</option><option value="6">Insurance</option><option value="8">Fuel Card</option><option value="9">Other</option>'
            );
        }
        if (this.value == '3') {
            $("#purpose").html(
                '<option value="0" selected="true" disabled="disabled">--select--</option><option value="1">Driver</option><option value="2">Carrier</option><option value="4">Expense</option><option value="5">Maintenance</option><option value="9">Other</option>'
            );
        }
        if (this.value == '4') {
            $("#purpose").html(
                '<option value="0" selected="true" disabled="disabled">--select--</option><option value="1">Driver</option><option value="2">Carrier</option><option value="3">Factoring</option><option value="4">Expense</option><option value="5">Maintenance</option><option value="6">Insurance</option><option value="7">Credit Card</option><option value="8">Fuel Card</option><option value="10">Bank</option>'
            );
        }

    });
});

$(function () {
    $("#btnAddadv").bind("click", function () {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer1").append(div);
    });
    $("body").on("click", ".remove", function () {
        $(this).closest("tr").remove();
    });
});

function GetDynamicTextBox(value) {
    return '<td width="200"><input name = "DynamicTextBox" type="text" value = "' + value +
        '" class="form-control" /></td>' + '<td width="150"><input name = "DynamicTextBox" type="text" value = "' +
        value + '"class="form-control" /></td>' +
        '<td><button type="button" class="btn btn-danger remove"><span aria-hidden="true">&times;</span></button></td>'
}

function selectAll() {
    var items = document.getElementsByName('acs');
    for (var i = 0; i < items.length; i++) {
        if (items[i].type == 'checkbox')
            items[i].checked = true;

    }
}

function UnSelectAll() {
    var items = document.getElementsByName('acs');
    for (var i = 0; i < items.length; i++) {
        if (items[i].type == 'checkbox')
            items[i].checked = false;
    }
}

var options = [];

$('.dropdown-menu a').on('click', function (event) {

    var $target = $(event.currentTarget),
        val = $target.attr('data-value'),
        $inp = $target.find('input'),
        idx;

    if ((idx = options.indexOf(val)) > -1) {
        options.splice(idx, 1);
        setTimeout(function () {
            $inp.prop('checked', false)
        }, 0);
    } else {
        options.push(val);
        setTimeout(function () {
            $inp.prop('checked', true)
        }, 0);
    }

    $(event.target).blur();

    console.log(options);
    return false;
});

// update carrier invoice
var invoiceID = 0;
var invoiceAmount = 0;

function updateCarrierInvoice(value) {
    var value_1 = value.split(")");
    var carrierName = value_1[0];

    $.ajax({
        url: 'account/payment_driver.php?type=updateCarrierInvoice',
        method: 'POST',
        data: {carrierName: carrierName},
        success: function (data) {
            var j = JSON.parse(data);
            var o = '';
            for (let l = 0; l < j.arrayLength; l++) {
                invoiceID = j.invoiceId[l];
                invoiceAmount = j.carrierAmount[l];
                o += '<a href="#" class="small" data-value="option1" tabIndex="-1">' +
                    '                                        <input type="checkbox" id="invoice' + l + '" onchange="getCarrierTotalAmount(this.value)" value=' + invoiceID + ',' + invoiceAmount + ',' + l + ' name="acs"/>&nbsp;' + j.invoiceId[l] +
                    '                                  </a><br/>';
            }
            $('#invoiceID').html(o);
        }
    });
}

function getCarrierTotalAmount(invoiceID) {
    var data = invoiceID.split(",");
    var id = data[0];
    var Amount = data[1];
    var seqid = data[2];
    var totalAmount = document.getElementById('finalAmount').value;
    var invoID = document.getElementById('invoice' + seqid);
    if (invoID.checked == true) {
        let final = eval(totalAmount) + eval(Amount);
        document.getElementById('finalAmount').value = final;
    } else {
        totalAmount = totalAmount - Amount;
        document.getElementById('finalAmount').value = totalAmount;
    }
}

// update company Fields
var company_name = "";
var bankvalue = "";
function updatecompanyfield(value) {
    var value_1 = value.split(")");
    var companyname = value_1[0];

    $.ajax({
        url: 'account/utils/helpers.php?type=updatecompanyfields',
        method: 'POST',
        data: {companyname: companyname},
        success: function (data) {
            var j = JSON.parse(data);
            var o = '';
            for (var l = 0; l < j.arrayLength; l++) {
                bank_id = j.bankid[l];
                company_name = j.bankname[l];
                bankvalue = bank_id +') '+ company_name;
                o += '<option value="'+bankvalue+'">'+bankvalue+'</option>';
            }
            $('#companyfield').html(o);
        }
    });
}

// update driver invoice
var dinvoiceID = 0;
var dinvoiceAmount = 0;
var driveradvance = 0;
function updateDriverInvoice(value) {
    var value_1 = value.split(")");
    var driverName = value_1[0];
    $.ajax({
        url: 'account/utils/helpers.php?type=updateDriverInvoice',
        method: 'POST',
        data: {driverName: driverName},
        success: function (data) {
            var k = JSON.parse(data);
            var c = '';
            for (var i = 0; i < k.arraysize; i++) {
                dinvoiceID = k.driverid[i];
                dinvoiceAmount = k.drivertotal[i];
                driveradvance = k.advance[i];
                c += '<a href="#" class="small" data-value="option1" tabIndex="-1">' +
                '<input type="checkbox" id="dinvoice' + i + '" onchange="getDriverTotalAmount(this.value)" value=' + dinvoiceID + ',' + dinvoiceAmount + ',' + i + ','+ driveradvance +' name="acs"/>&nbsp;'+ dinvoiceID +
                '</a><br/>';
            }
            $('#driverinvoice').html(c);
        }
    });
}

function getDriverTotalAmount(dinvoiceID) {
    var driverinv = dinvoiceID.split(",");
    var drid = driverinv[0];
    var drAmount = driverinv[1];
    var drseqid = driverinv[2];
    var dradvance = driverinv[3];
    var drtotalAmount = document.getElementById('driveramount').value;
    var dradvancetotal = document.getElementById('dradvance').value;
    var drinvoID = document.getElementById('dinvoice' + drseqid);
    if (drinvoID.checked == true) {
        let drfinal = eval(drtotalAmount) + eval(drAmount);
        let drfinalad = eval(dradvancetotal) + eval(dradvance);
        let finaldriveramount = drfinal - drfinalad;
        document.getElementById('driveramount').value = drfinal;
        document.getElementById('dradvance').value = drfinalad;
        document.getElementById('drfinalamount').value = finaldriveramount;
    } else {
        drtotalAmount = drtotalAmount - drAmount;
        dradvancetotal = dradvancetotal - dradvance;
        let setfinalamount = drtotalAmount - dradvancetotal;
        document.getElementById('driveramount').value = drtotalAmount;
        document.getElementById('dradvance').value = dradvancetotal;
        document.getElementById('drfinalamount').value = setfinalamount;
    }
}

//add payment registration
function Paymentadd() {
    var paymentfrom = document.getElementById("type").value
    var Companyselect1 = document.getElementById("Companyselect").value
    var Company_select = Companyselect1.split(")");
    var Companyselect = Company_select[0];

    var Bankname1 = document.getElementById("companyfield").value
    var Bank_name = Bankname1.split(")");
    var Bankname = Bank_name[0];

    var payto = document.getElementById("purpose").value
    var drivername1 = document.getElementById("drivername").value
    var driver_name = drivername1.split(")");
    var drivername = driver_name[0];
    
    var selectdebite1 = document.getElementById("selectdebite").value
    var select_debite = selectdebite1.split(")");
    var selectdebite = select_debite[0];
    
    var invoice = document.getElementById("driverinvoice").value
    var amount = document.getElementById("driveramount").value
    var advance = document.getElementById("dradvance").value
    var finalamount = document.getElementById("drfinalamount").value
    var checkdate = document.getElementById("checkdate").value
    var cheque = document.getElementById("cheque").value
    var ach = document.getElementById("ach").value
    var memo = document.getElementById("memo").value

    $.ajax({
        url: 'account/payment_driver.php?type=' + 'driverpayment',
        type: 'POST',
        data: {
            paymentfrom: paymentfrom,
            Companyselect: Companyselect,
            Bankname: Bankname,
            payto: payto,
            drivername: drivername,
            selectdebite: selectdebite,
            invoice: invoice,
            amount: amount,
            advance: advance,
            finalamount: finalamount,
            checkdate: checkdate,
            cheque: cheque,
            ach: ach,
            memo: memo
        },
        dataType: "text",
        success: function (data) {
            swal("Success", data, "success");
            $('#Payment_Registration').modal('hide');
        },
    });
}