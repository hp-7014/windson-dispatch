//--------payment terms start-------
function  val_payment_term(val) {
    if (val == '') {
        alert('Please Write an Name');
        return false;
    } else {
        return true;
    }
}
//--------payment terms end---------

//---------office start---------
function val_officeName (val) {
    if (val == '') {
        alert('Please Write an Office Name');
        return false;
    } else {
        return true;
    }
}

function val_officeLocation (val) {
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
        alert('Please Write an Company Name');
        return false;
    } else {
        return true;
    }
}
function val_telephoneNo(val) {
    if (val == '') {
        alert('Please Write an Telephone Number');
        return false;
    } else {
        return true;
    }
}
function val_mailingAddress(val) {
    if (val == '') {
        alert('Please Write an Mailing Address');
        return false;
    } else {
        return true;
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

// BANK START
function val_DebitValidate(val) {
    if(val == '')
    {
        swal('Please Enter Debit Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_CreditValidate(val) {
    if(val == '')
    {
        swal('Please Enter Credit Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_CardValidate(val) {
    if(val == '')
    {
        swal('Please Enter Credit Card Name.');
        return false;
    } else {
        return true;
    }
}
// BANK ENDS

// STATUS TYPE START
function val_statusValidate(val) {
    if(val == '')
    {
        swal('Please Enter Status Name.');
        return false;
    } else {
        return true;
    }
}
// STATUS TYPE ENDS