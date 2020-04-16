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
function search_account_manager(x) {
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
            //var j = response.trim();
            document.getElementById('accountDeliverBody').innerHTML = response;
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
function paginate_account(start, limit) {

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
    $('#select_card').on('change', function () {
        if (this.value == '1') {
            $(".main1").css("display", "block");
        } else {
            $(".main1").css("display", "none");
        }
        if (this.value == '2') {
            $(".sub1").css("display", "block");
        } else {
            $(".sub1").css("display", "none");
        }
    });

    $('#card').on('change', function () {
        if (this.value == '1') {
            $(".main").css("display", "block");
        } else {
            $(".main").css("display", "none");
        }
        if (this.value == '2') {
            $(".sub").css("display", "block");
        } else {
            $(".sub").css("display", "none");
        }


    });
    $('#pay_type').on('change', function () {
        if (this.value == '1') {
            $("#bank_name").css("display", "block");
        } else {
            $("#bank_name").css("display", "none");
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
    $('#select_card').prop('selectedIndex', 0);
});
$('#type').change(function () {
    $('#card').prop('selectedIndex', 0);
});
$('#type').change(function () {
    $("#purpose").prop("disabled", false);
    $(".cn").css("display", "none");
    $(".sub1").css("display", "none");
    $(".main1").css("display", "none");
    $(".sub").css("display", "none");
    $(".main").css("display", "none");
    $(".Credit_Card").css("display", "none");
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
            $("#purpose").css("display", "none");
            $(".disable").css("display", "none");
        } else {
            $("#purpose").css("display", "block");
            $(".disable").css("display", "block");
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
var storeInvoiceNumber = [];
var storeInvoiceAmount = [];

// get carrier invoice
function updateCarrierInvoice(value) {
    var value_1 = value.split(")");
    var carrierName = value_1[0];

    $.ajax({
        url: 'account/utils/helpers.php?type=CarrierInvoice',
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

// get selected carrier invoice list & amount
function getCarrierTotalAmount(invoiceID) {

    var data = invoiceID.split(",");
    var id = data[0];
    var Amount = data[1];
    var seqid = data[2];

    var totalAmount = document.getElementById('finalAmount').value;
    var invoID = document.getElementById('invoice' + seqid);
    if (invoID.checked == true) {
        let final = parseFloat(totalAmount) + parseFloat(Amount);
        document.getElementById('finalAmount').value = final;
        storeInvoiceNumber.push(id);
        storeInvoiceAmount.push(Amount);
    } else {

        totalAmount = totalAmount - Amount;
        document.getElementById('finalAmount').value = totalAmount;
        for (var l = 0; l < storeInvoiceNumber.length; l++) {
            if (storeInvoiceNumber[l] === id && storeInvoiceAmount[l] === Amount) {
                storeInvoiceNumber.splice(l, 1);
                storeInvoiceAmount.splice(l, 1);
                l--;
            }
        }
    }
}

// get company and bank name
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
                bankvalue = bank_id + ') ' + company_name;
                o += '<option value="' + bankvalue + '">' + bankvalue + '</option>';
            }
            $('#companyfield').html('<option value=" ">--select--</option>' + o);
        }
    });
}

//------------------get update driver invoice start---------------------
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
                    '<input type="checkbox" id="dinvoice' + i + '" onchange="getDriverTotalAmount(this.value)" value=' + dinvoiceID + ',' + dinvoiceAmount + ',' + i + ',' + driveradvance + ' name="acs"/>&nbsp;' + dinvoiceID +
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
        let drfinal = parseFloat(drtotalAmount) + parseFloat(drAmount);
        let drfinalad = parseFloat(dradvancetotal) + parseFloat(dradvance);
        let finaldriveramount = drfinal - drfinalad;
        document.getElementById('driveramount').value = drfinal;
        document.getElementById('dradvance').value = drfinalad;
        document.getElementById('drfinalamount').value = finaldriveramount;

        storeInvoiceNumber.push(drid);
        storeInvoiceAmount.push(drAmount);
    } else {
        drtotalAmount = drtotalAmount - drAmount;
        dradvancetotal = dradvancetotal - dradvance;
        let setfinalamount = drtotalAmount - dradvancetotal;
        document.getElementById('driveramount').value = drtotalAmount;
        document.getElementById('dradvance').value = dradvancetotal;
        document.getElementById('drfinalamount').value = setfinalamount;

        for (var l = 0; l < storeInvoiceNumber.length; l++) {
            if (storeInvoiceNumber[l] === drid && storeInvoiceAmount[l] === drAmount) {
                storeInvoiceNumber.splice(l, 1);
                storeInvoiceAmount.splice(l, 1);
                l--;
            }
        }
    }
}

//------------------get update driver invoice end---------------------

//------------------get company bank base balance start---------------------
function baseamount(bankid) {
    var bank1 = bankid.split(")");
    var bankname = bank1[0];
    $.ajax({
        url: 'account/utils/helpers.php?type=basebalance',
        method: 'POST',
        data: {bankname: bankname},
        success: function (data) {
            var j = JSON.parse(data);
            var bamoount = j.openingBalance;
            document.getElementById('baseamount').value = bamoount;
        }
    });
}

function baseamountcredit(creditid) {
    var creditid1 = creditid.split(")");
    var creditcard = creditid1[0];
    $.ajax({
        url: 'account/utils/helpers.php?type=basebalancecredit',
        method: 'POST',
        data: {creditcard: creditcard},
        success: function (data) {
            var k = JSON.parse(data);
            var creditamount = k.openingBalancecredit;
            alert(creditamount);
            document.getElementById('baseamountcredit').value = creditamount;
        }
    });
}

function baseamountfuel(fuelid) {
    var fuelid1 = fuelid.split(")");
    var fuelcard = fuelid1[0];
    $.ajax({
        url: 'account/utils/helpers.php?type=basebalancefuelcard',
        method: 'POST',
        data: {fuelcard: fuelcard},
        success: function (data) {
            var f = JSON.parse(data);
            var fuelamount = f.openingBalancefuel;
            document.getElementById('basefuelcard').value = fuelamount;
        }
    });
}

//------------------get company bank base balance end---------------------

// factoring company invoice
var factoringInvoiceID = 0;
var factoringInvoiceAmount = 0;

// get factoring invoice
function getFactoringInvoice(value) {
    var value_1 = value.split(")");
    var factoringName = value_1[0];
    alert(factoringName);
    $.ajax({
        url: 'account/utils/helpers.php?type=factoringInvoice',
        method: 'POST',
        data: {factoringName: factoringName},
        success: function (data) {
            var j = JSON.parse(data);
            var o = '';
            for (let l = 0; l < j.arrayLength; l++) {
                factoringInvoiceID = j.factoringInvoice[l];
                factoringInvoiceAmount = j.factoringAmount[l];
                o += '<a href="#" class="small" data-value="option1" tabIndex="-1">' +
                    '                                        <input type="checkbox" id="factinvoice' + l + '" onchange="getFactoringTotalAmount(this.value)" value=' + factoringInvoiceID + ',' + factoringInvoiceAmount + ',' + l + '>&nbsp;' + j.factoringInvoice[l] +
                    '                                  </a><br/>';
            }
            $('#factoringINVOICE').html(o);
        }
    });
}

// get factoring invoice list $ Amount
function getFactoringTotalAmount(factinvoiceID) {
    var data = factinvoiceID.split(",");
    var id = data[0];
    var Amount = data[1];
    var seqid = data[2];

    var totalAmount = document.getElementById('factoringAmount').value;
    var invoID = document.getElementById('factinvoice' + seqid);
    if (invoID.checked == true) {
        let final = parseFloat(totalAmount) + parseFloat(Amount);
        document.getElementById('factoringAmount').value = final;
        storeInvoiceNumber.push(id);
        storeInvoiceAmount.push(Amount);
    } else {
        totalAmount = totalAmount - Amount;
        document.getElementById('factoringAmount').value = totalAmount;

        for (var l = 0; l < storeInvoiceNumber.length; l++) {
            if (storeInvoiceNumber[l] === id && storeInvoiceAmount[l] === Amount) {
                storeInvoiceNumber.splice(l, 1);
                storeInvoiceAmount.splice(l, 1);
                l--;
            }
        }
    }
}

//----------Add Payment Registration Start-------------
function Paymentadd() {
    //Add Payment common field
    var payto = document.getElementById("purpose").value
    var memo = document.getElementById("memo").value
    var companyId = document.getElementById('companyId').value;
    var baseamount = document.getElementById("baseamount").value
    var baseamountcredit = document.getElementById("baseamountcredit").value
    var basefuelcard = document.getElementById("basefuelcard").value
    var payfrom = document.getElementById("type").value

    var Companyselect1 = document.getElementById("Companyselect").value
    var Company_select = Companyselect1.split(")");
    var Companyselect = Company_select[0];

    var Bankname1 = document.getElementById("companyfield").value
    var Bank_name = Bankname1.split(")");
    var Bankname = Bank_name[0];

    if (payfrom == "1") {
        var paymentfrom = "bank";
    } else if (payfrom == "2") {
        var paymentfrom = "creditcard";
    } else if (payfrom == "3") {
        var paymentfrom = "fuelcard";
        var fuelcardmain1 = document.getElementById("fuelcardmain").value
        var fuel_cardmain = fuelcardmain1.split(")");
        var fuelcardmain = fuel_cardmain[0];
        var paymentlist = document.getElementById("paymentlist").value
    } else if (payfrom == "4") {
        var paymentfrom = "Other";
    }
    switch (payto) {
        //case 1 for get bank driver value
        case "1":
            if (paymentfrom == 'bank') {
                var category = "driver";

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
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'driverpayment',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            drivername: drivername,
                            category: category,
                            selectdebite: selectdebite,
                            invoice: storeInvoiceNumber,
                            invoiceAmount: storeInvoiceAmount,
                            amount: amount,
                            advance: advance,
                            finalamount: finalamount,
                            checkdate: checkdate,
                            cheque: cheque,
                            ach: ach,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            storeInvoiceNumber = [];
                            storeInvoiceAmount = [];
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'fuelcard') {
                var category = "FuelCardDriver";

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
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'FuelCardDriver',
                        type: 'POST',
                        data: {
                            fuelcardmain: fuelcardmain,
                            paymentlist: paymentlist,

                            paymentfrom: paymentfrom,
                            payto: payto,
                            drivername: drivername,
                            category: category,
                            selectdebite: selectdebite,
                            invoice: storeInvoiceNumber,
                            invoiceAmount: storeInvoiceAmount,
                            amount: amount,
                            advance: advance,
                            finalamount: finalamount,
                            checkdate: checkdate,
                            cheque: cheque,
                            ach: ach,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            storeInvoiceNumber = [];
                            storeInvoiceAmount = [];
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        //case 2 for get bank carrier value
        case "2":
            if (paymentfrom == 'bank') {
                var category = "carrier";

                var carriername1 = document.getElementById("carriername").value
                var carrier_name = carriername1.split(")");
                var carriername = carrier_name[0];

                var selectdebite1 = document.getElementById("selectdebite1").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var invoice = document.getElementById("invoiceID").value
                var amount = document.getElementById("finalAmount").value
                var checkdate = document.getElementById("carcheckdate").value
                var cheque = document.getElementById("carcheque").value
                var ach = document.getElementById("carach").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'carrierpayment',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            carriername: carriername,
                            category: category,
                            selectdebite: selectdebite,
                            invoice: storeInvoiceNumber,
                            invoiceAmount: storeInvoiceAmount,
                            amount: amount,
                            advance: advance,
                            finalamount: finalamount,
                            checkdate: checkdate,
                            cheque: cheque,
                            ach: ach,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            storeInvoiceNumber = [];
                            storeInvoiceAmount = [];
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'fuelcard') {
                var category = "FuelCardCarrier";

                var carriername1 = document.getElementById("carriername").value
                var carrier_name = carriername1.split(")");
                var carriername = carrier_name[0];

                var selectdebite1 = document.getElementById("selectdebite1").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var invoice = document.getElementById("invoiceID").value
                var amount = document.getElementById("finalAmount").value
                var checkdate = document.getElementById("carcheckdate").value
                var cheque = document.getElementById("carcheque").value
                var ach = document.getElementById("carach").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'FuelCardCarrier',
                        type: 'POST',
                        data: {
                            fuelcardmain: fuelcardmain,
                            paymentlist: paymentlist,
                            paymentfrom: paymentfrom,
                            payto: payto,
                            carriername: carriername,
                            category: category,
                            selectdebite: selectdebite,
                            invoice: storeInvoiceNumber,
                            invoiceAmount: storeInvoiceAmount,
                            amount: amount,
                            advance: advance,
                            finalamount: finalamount,
                            checkdate: checkdate,
                            cheque: cheque,
                            ach: ach,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            storeInvoiceNumber = [];
                            storeInvoiceAmount = [];
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        //case 3 for get bank factoringcompany value
        case "3":
            var category = "factoringcompany";

            var selectFactoring1 = document.getElementById("selectFactoring").value
            var select_Factoring = selectFactoring1.split(")");
            var selectFactoring = select_Factoring[0];

            var selectdebite1 = document.getElementById("debitecat").value
            var select_debite = selectdebite1.split(")");
            var selectdebite = select_debite[0];

            var invoice = document.getElementById("factoringINVOICE").value
            var amount = document.getElementById("factoringAmount").value
            var checkdate = document.getElementById("faccheck").value
            var cheque = document.getElementById("faccheque").value
            var ach = document.getElementById("facach").value
            var totalfiles = document.getElementById('files').files.length;
            if (totalfiles <= 5) {
                $.ajax({
                    url: 'account/payment_driver.php?type=' + 'bankFactoring',
                    type: 'POST',
                    data: {
                        paymentfrom: paymentfrom,
                        Companyselect: Companyselect,
                        Bankname: Bankname,
                        payto: payto,
                        selectFactoring: selectFactoring,
                        category: category,
                        selectdebite: selectdebite,
                        invoice: storeInvoiceNumber,
                        invoiceAmount: storeInvoiceAmount,
                        amount: amount,
                        advance: advance,
                        finalamount: finalamount,
                        checkdate: checkdate,
                        cheque: cheque,
                        ach: ach,
                        memo: memo,
                        baseamount: baseamount,
                        companyId: companyId
                    },
                    dataType: "text",
                    success: function (data) {
                        storeInvoiceNumber = [];
                        storeInvoiceAmount = [];
                        swal("Success", data, "success");
                        $('#Payment_Registration').modal('hide');
                        var flags = uploadfiles(data, Bankname);
                        if (flags == "no") {
                            document.getElementById('addbankpayment').style.display = "block";
                        }
                    },
                });
            } else {
                swal('Please Select Only 5 File')
            }
            break;
        //case 4 for get bank Expense value
        case "4":
            if (paymentfrom == 'bank') {
                var category = "Expense";
                var expensesbill = document.getElementById("expensesbill").value

                var selectdebite1 = document.getElementById("expensesdebit").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var expensesname = document.getElementById("expensesname").value
                var amount = document.getElementById("expensesamount").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'paymentexpense',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            expensesbill: expensesbill,
                            category: category,
                            selectdebite: selectdebite,
                            expensesname: expensesname,
                            amount: amount,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == "creditcard") {
                var category = "CreditExpense";
                var expensesbill = document.getElementById("expensesbill").value
                var expensesname = document.getElementById("expensesname").value

                var selectdebite1 = document.getElementById("expensesdebit").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("expensesamount").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'creditexpense',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            payto: payto,
                            expensesbill: expensesbill,
                            category: category,
                            selectdebite: selectdebite,
                            expensesname: expensesname,
                            amount: amount,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'fuelcard') {
                var category = "FuelCardExpense";
                var expensesbill = document.getElementById("expensesbill").value
                var expensesname = document.getElementById("expensesname").value

                var selectdebite1 = document.getElementById("expensesdebit").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("expensesamount").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'FuelCardExpense',
                        type: 'POST',
                        data: {
                            fuelcardmain: fuelcardmain,
                            paymentlist: paymentlist,
                            paymentfrom: paymentfrom,
                            payto: payto,
                            expensesbill: expensesbill,
                            category: category,
                            selectdebite: selectdebite,
                            expensesname: expensesname,
                            amount: amount,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        //case 5 for get bank Maintenance value
        case "5":
            if (paymentfrom == 'bank') {
                var category = "Maintenance";

                var selectdebite1 = document.getElementById("debitmaintenance").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("maintenanceamount").value
                var maintenanceach = document.getElementById("maintenanceach").value

                var truckno1 = document.getElementById("truckmaintenance").value
                var truck_no = truckno1.split(")");
                var truckno = truck_no[0];

                var trailerno1 = document.getElementById("trailermaintenance").value
                var trailer_no = trailerno1.split(")");
                var trailerno = trailer_no[0];

                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'paymentmaintenance',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            selectdebite: selectdebite,
                            amount: amount,
                            maintenanceach: maintenanceach,
                            truckno: truckno,
                            trailerno: trailerno,
                            category: category,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'creditcard') {
                var category = "CreditMaintenance";

                var selectdebite1 = document.getElementById("debitmaintenance").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("maintenanceamount").value
                var maintenanceach = document.getElementById("maintenanceach").value

                var truckno1 = document.getElementById("truckmaintenance").value
                var truck_no = truckno1.split(")");
                var truckno = truck_no[0];

                var trailerno1 = document.getElementById("trailermaintenance").value
                var trailer_no = trailerno1.split(")");
                var trailerno = trailer_no[0];

                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'CreditMaintenance',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            payto: payto,
                            selectdebite: selectdebite,
                            amount: amount,
                            maintenanceach: maintenanceach,
                            truckno: truckno,
                            trailerno: trailerno,
                            category: category,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'fuelcard') {
                var category = "FuelCardMaintenance";

                var selectdebite1 = document.getElementById("debitmaintenance").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("maintenanceamount").value
                var maintenanceach = document.getElementById("maintenanceach").value

                var truckno1 = document.getElementById("truckmaintenance").value
                var truck_no = truckno1.split(")");
                var truckno = truck_no[0];

                var trailerno1 = document.getElementById("trailermaintenance").value
                var trailer_no = trailerno1.split(")");
                var trailerno = trailer_no[0];

                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'FuelCardMaintenance',
                        type: 'POST',
                        data: {
                            fuelcardmain: fuelcardmain,
                            paymentlist: paymentlist,
                            paymentfrom: paymentfrom,
                            payto: payto,
                            selectdebite: selectdebite,
                            amount: amount,
                            maintenanceach: maintenanceach,
                            truckno: truckno,
                            trailerno: trailerno,
                            category: category,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        //case 6 for get bank Insurance value
        case "6":
            if (paymentfrom == 'bank') {
                var category = "Insurance";

                var selectdebite1 = document.getElementById("debitInsurance").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("insuranceamount").value
                var insurancecompany = document.getElementById("insurancecompany").value

                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'paymentinsurance',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            selectdebite: selectdebite,
                            amount: amount,
                            insurancecompany: insurancecompany,
                            category: category,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'creditcard') {
                var category = "CreditInsurance";

                var selectdebite1 = document.getElementById("debitInsurance").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var amount = document.getElementById("insuranceamount").value
                var insurancecompany = document.getElementById("insurancecompany").value

                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'CreditInsurance',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            payto: payto,
                            selectdebite: selectdebite,
                            amount: amount,
                            insurancecompany: insurancecompany,
                            category: category,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        //case 7 for get bank creditcard value
        case "7":
            var category = "creditcard";

            var amount = document.getElementById("cardamount").value
            var card1 = document.getElementById("card").value
            if (card1 == "1") {
                var card = "maincard";
            } else {
                var card = "subcard";
            }
            var maincard1 = document.getElementById("maincard").value
            var main_card = maincard1.split(")");
            var maincard = main_card[0];

            var subcard1 = document.getElementById("subcard").value
            var sub_card = subcard1.split(")");
            var subcard = sub_card[0];
            if (maincard1 == "") {
                var cardcategory = subcard;
            } else {
                var cardcategory = maincard;
            }
            var totalfiles = document.getElementById('files').files.length;
            if (totalfiles <= 5) {
                $.ajax({
                    url: 'account/payment_driver.php?type=' + 'paymentcreditcard',
                    type: 'POST',
                    data: {
                        paymentfrom: paymentfrom,
                        Companyselect: Companyselect,
                        Bankname: Bankname,
                        payto: payto,
                        card: card,
                        cardcategory: cardcategory,
                        amount: amount,
                        category: category,
                        memo: memo,
                        baseamount: baseamount,
                        companyId: companyId
                    },
                    dataType: "text",
                    success: function (data) {
                        swal("Success", data, "success");
                        $('#Payment_Registration').modal('hide');
                        var flags = uploadfiles(data, Bankname);
                        if (flags == "no") {
                            document.getElementById('addbankpayment').style.display = "block";
                        }
                    },
                });
            } else {
                swal('Please Select Only 5 File')
            }
            break;
        //case 8 for get bank fuelcard value
        case "8":
            if (paymentfrom == 'bank') {
                var category = "fuelcard";
                var amount = document.getElementById("fuelamount").value
                var fuellist1 = document.getElementById("fuelcard").value
                var fuel_list = fuellist1.split(")");
                var fuellist = fuel_list[0];
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'paymentfuelcard',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            fuellist: fuellist,
                            amount: amount,
                            category: category,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'creditcard') {
                var category = "CreditFuelCard";
                var amount = document.getElementById("fuelamount").value
                var fuellist1 = document.getElementById("fuelcard").value
                var fuel_list = fuellist1.split(")");
                var fuellist = fuel_list[0];
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'CreditFuelCard',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            payto: payto,
                            fuellist: fuellist,
                            amount: amount,
                            category: category,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        //case 9 for get bank other value
        case "9":
            if (paymentfrom == 'bank') {
                var category = "other";
                var other = document.getElementById("otherpay").value

                var selectdebite1 = document.getElementById("otherdebit").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var pobox = document.getElementById("pobox").value
                var amount = document.getElementById("otheramount").value
                var checkachdate = document.getElementById("checkachdate").value
                var otherchequ = document.getElementById("otherchequ").value
                var otherach = document.getElementById("otherach").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'paymentother',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            Companyselect: Companyselect,
                            Bankname: Bankname,
                            payto: payto,
                            other: other,
                            selectdebite: selectdebite,
                            pobox: pobox,
                            amount: amount,
                            checkachdate: checkachdate,
                            otherchequ: otherchequ,
                            otherach: otherach,
                            category: category,
                            memo: memo,
                            baseamount: baseamount,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'creditcard') {
                var category = "CreditOther";
                var other = document.getElementById("otherpay").value

                var selectdebite1 = document.getElementById("otherdebit").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var pobox = document.getElementById("pobox").value
                var amount = document.getElementById("otheramount").value
                var checkachdate = document.getElementById("checkachdate").value
                var otherchequ = document.getElementById("otherchequ").value
                var otherach = document.getElementById("otherach").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'CreditOther',
                        type: 'POST',
                        data: {
                            paymentfrom: paymentfrom,
                            payto: payto,
                            other: other,
                            selectdebite: selectdebite,
                            pobox: pobox,
                            amount: amount,
                            checkachdate: checkachdate,
                            otherchequ: otherchequ,
                            otherach: otherach,
                            category: category,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            } else if (paymentfrom == 'fuelcard') {
                var category = "FuelCardOther";
                var other = document.getElementById("otherpay").value

                var selectdebite1 = document.getElementById("otherdebit").value
                var select_debite = selectdebite1.split(")");
                var selectdebite = select_debite[0];

                var pobox = document.getElementById("pobox").value
                var amount = document.getElementById("otheramount").value
                var checkachdate = document.getElementById("checkachdate").value
                var otherchequ = document.getElementById("otherchequ").value
                var otherach = document.getElementById("otherach").value
                var totalfiles = document.getElementById('files').files.length;
                if (totalfiles <= 5) {
                    $.ajax({
                        url: 'account/payment_driver.php?type=' + 'FuelCardOther',
                        type: 'POST',
                        data: {
                            fuelcardmain: fuelcardmain,
                            paymentlist: paymentlist,
                            paymentfrom: paymentfrom,
                            payto: payto,
                            other: other,
                            selectdebite: selectdebite,
                            pobox: pobox,
                            amount: amount,
                            checkachdate: checkachdate,
                            otherchequ: otherchequ,
                            otherach: otherach,
                            category: category,
                            memo: memo,
                            companyId: companyId
                        },
                        dataType: "text",
                        success: function (data) {
                            swal("Success", data, "success");
                            $('#Payment_Registration').modal('hide');
                            var flags = uploadfiles(data, Bankname);
                            if (flags == "no") {
                                document.getElementById('addbankpayment').style.display = "block";
                            }
                        },
                    });
                } else {
                    swal('Please Select Only 5 File')
                }
            }
            break;
        default:
            var category = "bank";
            var paytype1 = document.getElementById("pay_type").value
            if (paytype1 == "1") {
                var paytype = "bank";
            }
            var othername = document.getElementById("othername").value
            var amount = document.getElementById("otherpayamount").value
            var transactiondate = document.getElementById("transactiondate").value
            var totalfiles = document.getElementById('files').files.length;
            if (totalfiles <= 5) {
                $.ajax({
                    url: 'account/payment_driver.php?type=' + 'othercash',
                    type: 'POST',
                    data: {
                        paymentfrom: paymentfrom,
                        Companyselect: Companyselect,
                        Bankname: Bankname,
                        paytype: paytype,
                        othername: othername,
                        transactiondate: transactiondate,
                        amount: amount,
                        memo: memo,
                        baseamount: baseamount,
                        companyId: companyId
                    },
                    dataType: "text",
                    success: function (data) {
                        swal("Success", data, "success");
                        $('#Payment_Registration').modal('hide');
                        var flags = uploadfiles(data, Bankname);
                        if (flags == "no") {
                            document.getElementById('addbankpayment').style.display = "block";
                        }
                    },
                });
            } else {
                swal('Please Select Only 5 File')
            }
    }
}

//----------Add Payment Registration End-------------

//----------Upload File Start-------------
function uploadfiles(id, Bankname) {
    var form_data = new FormData();
    form_data.append("id", id);
    form_data.append("Bankname", Bankname);
    var ins = document.getElementById('files').files.length;
    if (ins > 0) {
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('files').files[x]);
        }
        $.ajax({
            url: 'account/payment_driver.php?type=' + 'fileupload', // point to server-side PHP script
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                document.getElementById('addbankpayment').style.display = "block";
            },
            error: function (response) {
            }
        });
    } else {
        return 'no';
    }
}
//----------Upload File End-------------

//get Driver Data
function getPaymentdata(){
var year = document.getElementById('year').value
var month = document.getElementById('month').value
$.ajax({
    url: 'account/utils/getDriver.php?type=getdriver',
    method: 'POST',
    data: {
         year: year,
         month:month
        },
    success: function (data) {
        var drivertab = data;
        $('#drivertable').html(drivertab);
    }
});
}
