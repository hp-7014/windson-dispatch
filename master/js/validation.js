//--------payment terms start-------
function val_payment_term(val) {
    if (val == '') {
        alert('Please Write an Name');
        return false;
    } else {
        return true;
    }
}

//--------payment terms end---------

//---------office start---------
function val_officeName(val) {
    if (val == '') {
        alert('Please Write an Office Name');
        return false;
    } else {
        return true;
    }
}

function val_officeLocation(val) {
    if (val == '') {
        alert('Please Write an Office Location');
        return false;
    } else {
        return true;
    }
}

//---------office start---------

//---------company start-------
function val_companyName(val) {
    if (val == '') {
        swal('Please Write an Company Name');
        return false;
    } else {
        return true;
    }
}

function val_telephoneNo(val) {
    if (val == '') {
        swal('Please Write an Telephone Number');
        return false;
    } else {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Telephone Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Telephone Number');
            return false;
        } else {
            return true;
        }
    }
}

function val_mailingAddress(val) {
    if (val == '') {
        swal('Please Write an Mailing Address');
        return false;
    } else {
        return true;
    }
}

function val_faxNo(val) {
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Fax Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Fax Number');
            return false;
        } else {
            return true;
        }
    }
}

//------company end--------------

//---------load Type start----------
function val_loadName(val) {
    if (val == '') {
        alert('Please Write an Load Name');
        return false;
    } else {
        return true;
    }
}

function val_loadType(val) {
    if (val == '') {
        alert('Please Select an Load Type');
        return false;
    } else {
        return true;
    }
}

//---------load Type end----------

//Validation For Add Currency
function val_currencyType(val) {
    if (val == '') {
        alert('Please Enter Currency Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Equipment Type
function val_equipmentType(val) {
    if (val == '') {
        alert('Please Enter Equipment Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Truck Type
function val_truckType(val) {
    if (val == '') {
        alert('Please Enter Truck Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Trailer Type
function val_trailerType(val) {
    if (val == '') {
        alert('Please Enter Trailer Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Fix Pay
function val_fixpay(val) {
    if (val == '') {
        alert('Please Enter Fix Pay Category');
        return false;
    } else {
        return true;
    }
}

//Validation For Fix Pay
function val_loadType(val) {
    if (val == '') {
        alert('Please Enter Load Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Fix Pay
function val_unit(val) {
    if (val == '') {
        alert('Please Enter Unit');
        return false;
    } else {
        return true;
    }
}

// BANK START
function val_DebitValidate(val) {
    if (val == '') {
        alert('Please Enter Debit Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_CreditValidate(val) {
    if (val == '') {
        alert('Please Enter Credit Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_CardValidate(val) {
    if (val == '') {
        alert('Please Enter Credit Card Name.');
        return false;
    } else {
        return true;
    }
}

// BANK ENDS

// STATUS TYPE START
function val_statusValidate(val) {
    if (val == '') {
        alert('Please Enter Status Name.');
        return false;
    } else {
        return true;
    }
}

// STATUS TYPE ENDS

// IFTA CARD CATEGORY START
function val_cardHolderName(val) {
    if (val == '') {
        swal('Please Select Card Holder Name.');
        return false;
    } else {
        return true;
    }
}

function val_iftaCardNo(val) {
    if (val == '') {
        swal('Please Enter IFTA Card NO.');
        return false;
    } else {
        return true;
    }
}

function val_CardType(val) {
    if (val == '') {
        swal('Please Enter Card Type (Capital Letter).');
        return false;
    } else {
        return true;
    }
}
function val_cardNo(val) {
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('Please Write Only Numeric Value');
            return false;
        } else {
            return true;
        }
    }
}

// IFTA CARD CATEGORY ENDS