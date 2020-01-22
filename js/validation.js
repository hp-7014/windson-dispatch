//------------Company Register start-----------
function val_companyName1 (val) {
    if (val == '') {
        alert('Please Write an Company Name');
        return false;
    } else {
        return true;
    }
}
function val_companyEmail (val) {
    if (val == '') {
        alert('Please Write an Company Email');
        return false;
    } else {
        return true;
    }
}
function val_companyContact (val) {
    if (val == '') {
        alert('Please Write an Company Contact');
        return false;
    } else {
        return true;
    }
}
function val_companyAddress (val) {
    if (val == '') {
        alert('Please Write an Company Address');
        return false;
    } else {
        return true;
    }
}
function val_companyPassword (val) {
    if (val == '') {
        alert('Please Write an Password');
        return false;
    } else {
        return true;
    }
}
function val_companyConfirmPassword (val1 , val2) {
    if (val2 == '') {
        alert('Please Write an Confirm Password');
        return false;
    } else if (val1 != val2) {
        alert('Password Did Not Match!!Please Try Again');
        return false;
    }
    else {
        return true;
    }
}
//------------Company Register End-------------

//------------Company Login start--------------
function val_loginCompanyEmail (val) {
    if (val == '') {
        alert('Please Write an Email');
        return false;
    } else {
        return true;
    }
}

function val_loginCompanyPassword (val) {
    if (val == '') {
        alert('Please Write an Password');
        return false;
    } else {
        return true;
    }
}
//------------Company Login End----------------