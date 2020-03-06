//------------Consignee Start-------------
function val_consigneeName(val) {
    if (val == '') {
        swal('Please Write an Consignee Name');
        return false;
    } else {
        return true;
    }
}

function val_consigneeAddress(val) {
    if (val == '') {
        swal('Please Write an Address');
        return false;
    } else {
        return true;
    }
}

function val_consigneeLocation(val) {
    if (val == '') {
        swal('Please Write an Location');
        return false;
    } else {
        return true;
    }
}

function val_consigneePostal(val) {
    if (val == '') {
        swal('Please Write an Postal / Zip');
        return false;
    } else if (val.length < 4) {
        swal('Please Write an Valid Postal / Zip Code');
        return false;
    } else {
        return true;
    }
}

function val_consigneeContact(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_consigneeEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val == '') {
        return true;
    } else {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('Please Enter Valid Email');
            return false;
        }
    }
}

function val_consigneeTelephone(val) {
    if (val == '') {
        return true;
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

function val_consigneeExt(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_consigneeTollFree(val) {
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Toll Free');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Toll Free');
            return false;
        } else {
            return true;
        }
    }
}

function val_consigneeFax(val) {
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

function val_consigneeReceiving(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_consigneeAppointments(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_consigneeIntersaction(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_consigneeRecivingNote(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_consigneeInternalNote(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

//------------Consignee Start-------------

//------------Shipper Start-----------
function val_shipperName(val) {
    if (val == '') {
        swal('Please Write an Shipper Name');
        return false;
    } else {
        return true;
    }
}

function val_shipperAddress(val) {
    if (val == '') {
        swal('Please Write an Address');
        return false;
    } else {
        return true;
    }
}

function val_shipperLocation(val) {
    if (val == '') {
        swal('Please Write an Location');
        return false;
    } else {
        return true;
    }
}

function val_shipperPostal(val) {
    if (val == '') {
        swal('Please Write an Postal / Zip');
        return false;
    } else if (val.length < 4) {
        swal('Please Write an Valid Postal / Zip Code');
        return false;
    } else {
        return true;
    }
}

function val_shipperContact(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_shipperEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val == '') {
        return true;
    } else {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('Please Enter Valid Email');
            return false;
        }
    }
}

function val_shipperTelephone(val) {
    if (val == '') {
        return true;
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

function val_shipperExt(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_shipperTollFree(val) {
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Toll Free');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Toll Free');
            return false;
        } else {
            return true;
        }
    }
}

function val_shipperFax(val) {
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

function val_shipperShippingHours(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_shipperAppointments(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_shipperIntersaction(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_shippingNotes(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_internalNotes(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

//------------Shipper Start-----------

//-------------Customer Start---------
function val_custName(val) {
    if (val == '') {
        swal("Please Write an Customer Name");
        return false;
    } else {
        return true;
    }
}

function val_custAddress(val) {
    if (val == '') {
        swal("Please Write an Customer Address");
        return false;
    } else {
        return true;
    }
}

function val_custLocation(val) {
    if (val == '') {
        swal("Please Write an Customer Location");
        return false;
    } else {
        return true;
    }
}

function val_custZip(val) {
    if (val == '') {
        swal("Please Write an Customer Zip Code");
        return false;
    } else {
        if (val.length < 4) {
            swal("Please Write an Valid Customer Zip Code");
            return false;
        } else {
            return true;
        }
    }
}

function val_billingAddress(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_billingLocation(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_billingZip(val) {
    if (val != '') {
        if (val.length < 4) {
            swal("Please Write an Valid Billing Zip Code");
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_primaryContact(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_custTelephone(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Customer Telephone Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Customer Telephone Number');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_custExt(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_custEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val != '') {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('Please Write an Valid Customer Email');
            return false;
        }
    } else {
        return true;
    }
}

function val_custFax(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Customer Fax Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Customer Fax Number');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_billingContact(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_billingEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val != '') {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('Please Enter Valid Billing Email');
            return false;
        }
    } else {
        return true;
    }
}

function val_billingTelephone(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Billing Telephone Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Enter valid Billing Telephone Number');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_billingExt(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_URS(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_currencySetting(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_paymentTerms(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_creditLimit(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Enter Only Numeric Credit Limit');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_salesRep(val) {
    if (val == '') {
        return true;
    } else {
        return true;
    }
}

function val_factoringCompany(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_federalID(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_workerComp(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_websiteURL(val) {
    if (val != '') {
        var reg = /[-a-zA-Z0-9@:%_\+.~#?&//=]{2,256}\.[a-z]{2,4}\b(\/[-a-zA-Z0-9@:%_\+.~#?&//=]*)?/gi;
        if (val.match(reg)) {
            return true;
        } else {
            swal('Please Write an Valid URL');
            return false;
        }
    } else {
        return true;
    }
}

function val_internalNotes(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

//-------------Customer End-----------

//---------------User Start------------
function val_userEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val == '') {
        swal('Please Write an User Email');
        return false;
    } else {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('Please Write an Valid Email');
            return false;
        }
    }
}

function val_userName(val) {
    if (val == '') {
        swal("Please Write an User Name");
        return false;
    } else {
        return true;
    }
}

function val_userPass(val) {
    if (val == '') {
        swal("Please Write an User Password");
        return false;
    } else {
        return true;
    }
}

function val_userFirstName(val) {
    var reg = /^[A-Za-z]+$/;
    if (val == '') {
        swal("Please Write an User First Name");
        return false;
    } else {
        if (val.match(reg)) {
            return true;
        } else {
            swal("Please Write Alphabet Characters Only");
            return false;
        }
    }
}

function val_userLastName(val) {
    var reg = /^[A-Za-z]+$/;
    if (val == '') {
        swal("Please Write an User Last Name");
        return false;
    } else {
        if (val.match(reg)) {
            return true;
        } else {
            swal("Please Write Alphabet Characters Only");
            return false;
        }
    }
}

function val_userAddress(val) {
    if (val == '') {
        swal("Please Write an User Address");
        return false;
    } else {
        return true;
    }
}

function val_userLocation(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_userZip(val) {
    if (val != '') {
        if (val.length < 4) {
            swal('Please Write an Valid Zip Code');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_userTelephone(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Write Only Numeric Telephone Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Write valid Telephone Number');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_userExt(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_uerTollFree(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Write Only Numeric Toll Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Write valid Toll Number');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

function val_userFax(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('Please Write Only Numeric Fax Number');
            return false;
        } else if (val.length != 10) {
            swal('Please Write valid Fax Number');
            return false;
        } else {
            return true;
        }
    } else {
        return true;
    }
}

//---------------User End---------------

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
        swal('Please Enter Bank Account Number');
        return false;
    } else if (isNaN(val)) {
        swal('Please Enter Only Numeric Bank Account Number');
        return false;
    } else {
        return true;
    }
}

function val_routingNo(val) {
    if (val == '') {
        swal('Please Enter Bank Routing Number');
        return false;
    } else if (isNaN(val)) {
        swal('Please Enter Only Numeric Bank Routing Number');
        return false;
    } else if (val.length != 9) {
        swal('Please Enter valid Bank Routing Number');
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

/*----------------Driver Start-----------------------*/
function val_driverName(val) {
    if (val == '') {
        swal('<h5>Please write Driver Name !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverUsername(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverPassword(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverTelephone(val) {
    if (val != '') {
        if (isNaN(val)) {
            swal('<h5>Please Write Only Numeric Telephone Number !!!</h5>','','question');
            return false;
        } else if (val.length != 10) {
            swal('<h5>Please Write valid Telephone Number !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    } else {
        swal('<h5>Please Write Telephone Number !!!</h5>','','question');
        return false;
    }
}

function val_driverAlt(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val == '') {
        return true;
    } else {
        if (val.match(mailformat)) {
            return true;
        } else {
            swal('<h5>Please Write Valid Email !!!</h5>','','question');
            return false;
        }
    }
}

function val_driverAddress(val) {
    if (val == '') {
        swal('<h5>Please Write Driver Address !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverLocation(val) {
    if (val == '') {
        swal('<h5>Please Write Location !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverZip(val) {
    if (val == '') {
        swal('<h5>Please Write Zip !!!</h5>','','question');
        return false;
    } else if (val.length < 4) {
        swal('<h5>Please Write Valid Zip Code !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverStatus(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverSocial(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_dateOfbirth(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_dateOfhire(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverLicenseNo(val) {
    if (val == '') {
        swal('<h5>Please Write License Number !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverLicenseIssue(val) {
    if (val == '') {
        swal('<h5>Please Write License Issue Date !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverLicenseExp(val) {
    if (val == '') {
        swal('<h5>Please Write License Expiry Date !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_driverLastMedical(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverNextMedical(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverLastDrugTest(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_driverNestDrugTest(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_passportExpiry(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_fastCardExpiry(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_hazmatExpiry(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_rate(val){
    if (val == '0') {
        swal('<h5>Please Write Driver Rate !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_currency(val){
    if (val == '') {
        swal('');
        swal('<h5>Please Write Currency !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}

function val_loadedMile(val){
    if (val == '') {
        swal('<h5>Please Write Loaded Mile !!!</h5>','','question');
        return false;
    } else {
        if (isNaN(val)) {
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_emptyMile(val){
    if (val == '') {
        swal('<h5>Please Write Empty Mile Only !!!</h5>','','question');
        return false;
    } else {
        if (isNaN(val)) {
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_pickupRate(val){
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_pickupAfter(val){
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_dropRate(val){
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('Please Write an Numeric Value Only');
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_tarp(val){
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('Please Write an Numeric Value Only');
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_dropAfter(val){
    if (val == '') {
        return true;
    } else {
        if (isNaN(val)) {
            swal('<h5>Please Write Numeric Value Only !!!</h5>','','question');
            return false;
        } else {
            return true;
        }
    }
}

function val_terminationDate(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}

function val_InternalNote(val) {
    if (val != '') {
        return true;
    } else {
        return true;
    }
}
/*----------------Driver End-----------------*/

//--------Truck Add start-------
//Truck Number
function val_truck_number(val) {
    if (val == '') {
        swal('Please Add Truck Number');
        return false;
    } else {
        return true;
    }
}

//Truck Type
function val_trucktype(val) {
    if (val == '') {
        swal('Please Add Truck Type');
        return false;
    } else {
        return true;
    }
}

//License Plate
function val_license_plate(val) {
    if (val == '') {
        swal('Please Add License Plate');
        return false;
    } else {
        return true;
    }
}

//Plate Expiry
function val_plate_expiry(val) {
    if (val == '') {
        swal('Please Add Plate Expiry');
        return false;
    } else {
        return true;
    }
}

//vin
function val_vin(val) {
    if (val == '') {
        swal('Please Add VIN');
        return false;
    } else {
        return true;
    }
}

// --------Truck Add End-------


//--------Trailer Add Start-------

//Trailer Number
function val_trailer_number(val) {
    if (val == '') {
        swal('Please Add Trailer Number');
        return false;
    } else {
        return true;
    }
}

//Trailer Type
function val_trailer_type(val) {
    if (val == '') {
        swal('Please Add Trailer Type');
        return false;
    } else {
        return true;
    }
}

//License Plate
function val_license_plate_trailer(val) {
    if (val == '') {
        swal('Please Add License Plate');
        return false;
    } else {
        return true;
    }
}

//Plate Expiry
function val_plate_expiry_trailer(val) {
    if (val == '') {
        swal('Please Add Plate Expiry');
        return false;
    } else {
        return true;
    }
}

//vin
function val_vin_trailer(val) {
    if (val == '') {
        swal('Please Add VIN');
        return false;
    } else {
        return true;
    }
}

//--------Trailer Add End------------------


//--------Factoring Add Start--------------

//Factoring Company
function val_factoring_company(val) {
    if (val == '') {
        swal('Please Add Factoring Company');
        return false;
    } else {
        return true;
    }
}

//Factoring Address
function val_faddress(val) {
    if (val == '') {
        swal('Please Add Factoring Address');
        return false;
    } else {
        return true;
    }
}

//Factoring Location
function val_flocation(val) {
    if (val == '') {
        swal('Please Add Factoring Location');
        return false;
    } else {
        return true;
    }
}

//Factoring ZIP
function val_fzip(val) {
    if (val == '') {
        swal('Please Add Factoring ZIP');
        return false;
    } else {
        return true;
    }
}

//Factoring Tax
function val_ftaxid(val) {
    if (val == '') {
        swal('Please Add Factoring Tax');
        return false;
    } else {
        return true;
    }
}

//--------Factoring Add End--------------

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

//--------Factoring Add End--------------//
function val_carrName(val) {
    if (val == '') {
        swal('Please Enter Carrier name');
        return false;
    } else {
        return true;
    }
}

//--------Carrier Add Starts--------------//
function val_carrAddress(val) {
    if (val == '') {
        swal('Please Enter Carrier Address');
        return false;
    } else {
        return true;
    }
}

function val_carrLocation(val) {
    if (val == '') {
        swal('Please Enter Carrier Location');
        return false;
    } else {
        return true;
    }
}

function val_carrZip(val) {
    if (val == '') {
        swal('Please Enter Zip Code');
        return false;
    } else {
        return true;
    }
}

function val_carrEmail(val) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (val.match(mailformat)) {
        return true;
    } else {
        swal('Please Enter Valid Email');
        return false;
    }
}

function val_carrTelephone(val) {
    if (val.length != 10) {
        swal('Please Enter valid Phone Number');
        return false;
    } else {
        return true;
    }
}

function val_carrTaxID(val) {
    if (val == '') {
        swal('Please Enter Valid Tax ID');
        return false;
    } else {
        return true;
    }
}

function val_carrMC(val) {
    if (val == '') {
        swal('Please Enter Valid MC No');
        return false;
    } else {
        return true;
    }
}

function val_carrDOT(val) {
    if (val == '') {
        swal('Please Enter valid DOT No');
        return false;
    } else {
        return true;
    }
}

//--- driver Installment
function val_installmentCategory(val) {
    if (val == '') {
        swal('<h5>Please Select Installment Category !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}
function val_installmentType(val) {
    if (val == '') {
        swal('<h5>Please Select Installment Type !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}
function val_amount1(val) {
    if (val == '') {
        swal('<h5>Please Select Installment Amount !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}
function val_installment(val) {
    if (val == '') {
        swal('<h5>Please Select Installment !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}
function val_startNo(val) {
    if (val == '') {
        swal('<h5>Please Select Start Number !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}
function val_startDate(val) {
    if (val == '') {
        swal('<h5>Please Select Start Date !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}
function val_internalNote(val) {
    if (val == '') {
        swal('<h5>Please Select Internal Note !!!</h5>','','question');
        return false;
    } else {
        return true;
    }
}