//------------Fuel Receipts Start-------------
function val_CardHolderName(val) {
    if (val == '') {
        alert('Please Select Card Holder Name.');
        return false;
    } else {
        return true;
    }
}

function val_invoiceNumber(val) {
    if (val == '') {
        alert('Please Select Invoice Number.');
        return false;
    } else {
        return true;
    }
}