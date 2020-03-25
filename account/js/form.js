$(document).ready(function() {
    $('#type').on('change', function() {
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

    $('#purpose').on('change', function() {
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

    $('#Advance').on('change', function() {
        if (this.value == '2') {
            $(".adv").css("display", "block");
        } else {
            $(".adv").css("display", "none");
        }
    });
    $('#card').on('change', function() {
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

    $('#receipt').on('change', function() {
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
$('#type').change(function() {
    $('#Advance').prop('selectedIndex', 0);
});
$('#type').change(function() {
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
$(document).ready(function() {
    $("#type").change(function() {
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

$(function() {
    $("#btnAddadv").bind("click", function() {
        var div = $("<tr />");
        div.html(GetDynamicTextBox(""));
        $("#TextBoxContainer1").append(div);
    });
    $("body").on("click", ".remove", function() {
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
$('')

$('.dropdown-menu a').on('click', function(event) {

    var $target = $(event.currentTarget),
        val = $target.attr('data-value'),
        $inp = $target.find('input'),
        idx;

    if ((idx = options.indexOf(val)) > -1) {
        options.splice(idx, 1);
        setTimeout(function() {
            $inp.prop('checked', false)
        }, 0);
    } else {
        options.push(val);
        setTimeout(function() {
            $inp.prop('checked', true)
        }, 0);
    }

    $(event.target).blur();

    console.log(options);
    return false;
});

function Paymentadd() {
   var paymentfrom = document.getElementById("type").value
   var Companyselect1 = document.getElementById("Companyselect").value
   var Company_select = Companyselect1.split(")");
   var Companyselect = Company_select[0];
   var Bankname1 = document.getElementById("selectbank").value
   var Bank_name = Bankname1.split(")");
   var Bankname = Bank_name[0];
   var payto = document.getElementById("purpose").value
   var drivername1 = document.getElementById("drivername").value
   var driver_name = drivername1.split(")");
   var drivername = driver_name[0];
   var selectdebite1 = document.getElementById("selectdebite").value
   var select_debite = selectdebite1.split(")");
   var selectdebite = select_debite[0];
   var invoice = document.getElementById("invoice").value
   var amount = document.getElementById("amount").value
   var advance = document.getElementById("advance").value
   var finalamount = document.getElementById("finalamount").value
   var checkdate = document.getElementById("checkdate").value
   var cheque = document.getElementById("cheque").value
   var ach = document.getElementById("ach").value
   var memo = document.getElementById("memo").value
   alert(memo);
}

// account step form
// function toggleAccount(val) {
//     if ($("#carrier").hasClass("show")) {
//         $("#carrier").toggleClass("show");
//     }
//     if ($("#carrier").hasClass("active")) {
//         $("#carrier").toggleClass("active");
//     }
//     if ($("#insurance").hasClass("show")) {
//         $("#insurance").toggleClass("show");
//     }
//     if ($("#insurance").hasClass("active")) {
//         $("#insurance").toggleClass("active");
//     }
//     if ($("#accounting").hasClass("show")) {
//         $("#accounting").toggleClass("show");
//     }
//     if ($("#accounting").hasClass("active")) {
//         $("#accounting").toggleClass("active");
//     }
//     if ($("#equipment").hasClass("show")) {
//         $("#equipment").toggleClass("show");
//     }
//     if ($("#equipment").hasClass("active")) {
//         $("#equipment").toggleClass("active");
//     }
//     if ($("#home-tab").hasClass("active")) {
//         $("#home-tab").toggleClass("active");
//     }
//     if ($("#insurance-tab").hasClass("active")) {
//         $("#insurance-tab").toggleClass("active");
//     }
//     if ($("#accounting-tab").hasClass("active")) {
//         $("#accounting-tab").toggleClass("active");
//     }
//     if ($("#equipment-tab").hasClass("active")) {
//         $("#equipment-tab").toggleClass("active");
//     }
//     if ($("#home-title").hasClass("show")) {
//         $("#home-title").toggleClass("show");
//     }
//     if ($("#insurance-title").hasClass("show")) {
//         $("#insurance-title").toggleClass("show");
//     }
//     if ($("#accounting-title").hasClass("show")) {
//         $("#accounting-title").toggleClass("show");
//     }
//     if ($("#equipment-title").hasClass("show")) {
//         $("#equipment-title").toggleClass("show");
//     }

//     if ($("#home-tab").attr("aria-selected") === 'true') {
//         $("#home-tab").attr("aria-selected", "false");
//     } else {
//         $("#home-tab").attr("aria-selected", "true");
//     }

//     if ($("#insurance-tab").attr("aria-selected") === 'true') {
//         $("#insurance-tab").attr("aria-selected", "false");
//     } else {
//         $("#insurance-tab").attr("aria-selected", "true");
//     }

//     if ($("#accounting-tab").attr("aria-selected") === 'true') {
//         $("#accounting-tab").attr("aria-selected", "false");
//     } else {
//         $("#accounting-tab").attr("aria-selected", "true");
//     }

//     if ($("#equipment-tab").attr("aria-selected") === 'true') {
//         $("#equipment-tab").attr("aria-selected", "false");
//     } else {
//         $("#equipment-tab").attr("aria-selected", "true");
//     }

//     if (val == 'first') {
//         $("#carrier").toggleClass("show");
//         $("#carrier").toggleClass("active");
//         $("#home-tab").toggleClass("active");
//         $("#home-title").toggleClass("show");
//     } else if (val == 'second') {
//         $("#insurance").toggleClass("show");
//         $("#insurance").toggleClass("active");
//         $("#insurance-tab").toggleClass("active");
//         $("#insurance-title").toggleClass("show");
//     } else if (val == 'third') {
//         $("#accounting").toggleClass("show");
//         $("#accounting").toggleClass("active");
//         $("#accounting-tab").toggleClass("active");
//         $("#accounting-title").toggleClass("show");
//     } else if (val == 'fourth') {
//         $("#equipment").toggleClass("show");
//         $("#equipment").toggleClass("active");
//         $("#equipment-tab").toggleClass("active");
//         $("#equipment-title").toggleClass("show");
//     }

// }