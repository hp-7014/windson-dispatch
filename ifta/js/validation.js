//------------Fuel Receipts Start-----------------//

function val_unitNumber(val) {
    if (val == '') {
        swal('Please Enter Unit Number.');
        return false;
    } else {
        return true;
    }
}

function val_fuelDate(val) {
    if (val == '') {
        swal('Please Select Fuel Date');
        return false;
    } else {
        return true;
    }
}

function val_transacTime(val) {
    if (val == '') {
        swal('Please Enter Transaction Time');
        return false;
    } else {
        return true;
    }
}

function val_merchantName(val) {
    if (val == '') {
        swal('Please Enter Merchant Name');
        return false;
    } else {
        return true;
    }
}

function val_statePurch(val) {
    if (val == '') {
        swal('Please Select State Purch');
        return false;
    } else {
        return true;
    }
}

function val_dGallons(val) {
    if (val == '') {
        swal('Please Enter Diesel Gallons');
        return false;
    } else {
        return true;
    }
}

function val_dGrossCost(val) {
    if (val == '') {
        swal('Please Enter Diesel Gross Cost');
        return false;
    } else {
        return true;
    }
}

function val_invoiceNo(val) {
    if (val == '') {
        swal('Please Select Invoice No.');
        return false;
    } else {
        return true;
    }
}

//------------Fuel Receipts ENDS-----------------//

//----------------Toll Start-------------------//

function val_invoiceNumber(val) {
    if (val == '') {
        swal('Please Select Invoice Number.');
        return false;
    } else {
        return true;
    }
}

function val_tollDate(val) {
    if (val == '') {
        swal('Please Select Toll Date.');
        return false;
    } else {
        return true;
    }
}

function val_transType(val) {
    if (val == '') {
        swal('Please Enter Transaction Type.');
        return false;
    } else {
        return true;
    }
}

function val_location(val) {
    if (val == '') {
        swal('Please Enter Toll Location');
        return false;
    } else {
        return true;
    }
}

function val_amount(val) {
    if (val == '') {
        swal('Please Enter Amount');
        return false;
    } else {
        return true;
    }
}

function val_licensePlate(val) {
    if (val == '') {
        swal('Please Enter License Plate');
        return false;
    } else {
        return true;
    }
}

function val_truckNo(val) {
    if (val == '') {
        swal('Please Select Truck Number');
        return false;
    } else {
        return true;
    }
}