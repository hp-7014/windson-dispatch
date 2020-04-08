//--------payment terms start-------
function val_payment_term(val) {
    if (val == '') {
        swal('Please Write an Name');
        return false;
    } else {
        return true;
    }
}

//--------payment terms end---------

//---------office start---------
function val_officeName(val) {
    if (val == '') {
        swal('Please Write an Office Name');
        return false;
    } else {
        return true;
    }
}

function val_officeLocation(val) {
    if (val == '') {
        swal('Please Write an Office Location');
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
        swal("Please Enter Telephone Number");
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
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val == '') {
        swal("Please Enter Email Address");
    } else {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('Please Enter Valid Email');
            return false;
        }
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
        swal('Please Write an Load Name');
        return false;
    } else {
        return true;
    }
}

function val_loadType(val) {
    if (val == '') {
        swal('Please Select an Load Type');
        return false;
    } else {
        return true;
    }
}

//---------load Type end----------

//Validation For Add Currency
function val_currencyType(val) {
    if (val == '') {
        swal('Please Enter Currency Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Equipment Type
function val_equipmentType(val) {
    if (val == '') {
        swal('Please Enter Equipment Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Truck Type
function val_truckType(val) {
    if (val == '') {
        swal('Please Enter Truck Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Trailer Type
function val_trailerType(val) {
    if (val == '') {
        swal('Please Enter Trailer Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Fix Pay
function val_fixpay(val) {
    if (val == '') {
        swal('Please Enter Fix Pay Category');
        return false;
    } else {
        return true;
    }
}

//Validation For Fix Pay
function val_loadType(val) {
    if (val == '') {
        swal('Please Enter Load Type');
        return false;
    } else {
        return true;
    }
}

//Validation For Fix Pay
function val_unit(val) {
    if (val == '') {
        swal('Please Enter Unit');
        return false;
    } else {
        return true;
    }
}

// BANK START
function val_DebitValidate(val) {
    if (val == '') {
        swal('Please Enter Debit Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_CreditValidate(val) {
    if (val == '') {
        swal('Please Enter Credit Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_CardValidate(val) {
    if (val == '') {
        swal('Please Enter Credit Card Name.');
        return false;
    } else {
        return true;
    }
}

// BANK ENDS


// Fuel Card Type START
function val_fuelcard_type(val) {
    if (val == '') {
        swal('Please Enter fuel Card Type');
        return false;
    } else {
        return true;
    }
}

// Fuel Card Type ENDS