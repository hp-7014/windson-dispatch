/*--------------- Add Bank Admin START -------------*/
function val_bankName(val) {
    if (val == '') {
        swal('Please Enter Bank Name.');
        return false;
    } else {
        return true;
    }
}

function val_accountHolder(val) {
    if (val == '') {
        swal('Please Select Account Holder Name');
        return false;
    } else {
        return true;
    }
}

function val_accountNo(val) {
    if (val == '') {
        swal('Please Enter Bank Account No.');
        return false;
    } else {
        return true;
    }
}

function val_routingNo(val) {
    if (val == '') {
        swal('Please Enter Bank Routing No.');
        return false;
    } else {
        return true;
    }
}

function val_openingBalDate(val) {
    if (val == '') {
        swal('Please Enter Opening Balance Date.');
        return false;
    } else {
        return true;
    }
}

function val_openingBalance(val) {
    if (val == '') {
        swal('Please Enter Opening Balance.');
        return false;
    } else {
        return true;
    }
}

/*--------------- Add Bank Admin END ---------------*/


/*--------------- Credit Card Admin START ---------------*/
function val_Name(val) {
    if (val == '') {
        swal('Please Enter Name of Bank.');
        return false;
    } else {
        return true;
    }
}

function val_displayName(val) {
    if (val == '') {
        swal('Please Enter Display Name.');
        return false;
    } else {
        return true;
    }
}

function val_cardType(val) {
    if (val == '') {
        swal('Please Select Card Type.');
        return false;
    } else {
        return true;
    }
}

function val_cardHolderName(val) {
    if (val == '') {
        swal('Please Enter Card Holder Name.');
        return false;
    } else {
        return true;
    }
}

function val_cardLimit(val) {
    if (val == '') {
        swal('Please Enter Card Limit.');
        return false;
    } else {
        return true;
    }
}

/*--------------- Credit Card Admin END ---------------*/


/*--------------- Sub Credit Card Admin START ---------------*/

function val_mainCard(val) {
    if (val == '') {
        swal('Please Select Main Card.');
        return false;
    } else {
        return true;
    }
}

/*--------------- Sub Credit Card Admin END ---------------*/

/*--------------- Customs Broker START ---------------*/

function val_brokerName(val) {
    if (val == '') {
        swal('Please Enter Broker Name.');
        return false;
    } else {
        return true;
    }
}

function val_Crossing(val) {
    if (val == '') {
        swal('Please Enter Crossing.');
        return false;
    } else {
        return true;
    }
}

function val_telephone(val) {
    if (val == '') {
        swal('Please Enter Telephone No.');
        return false;
    } else {
        return true;
    }
}
/*--------------- Customs Broker END ---------------*/


