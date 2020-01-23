//----------Shipper Start-------------
function addShipper() {
    var companyID = document.getElementById('companyID').value;
    var shipperName = document.getElementById('shipperName').value;
    var shipperAddress = document.getElementById('shipperAddress').value;
    var shipperLocation = document.getElementById('shipperLocation').value;
    var shipperPostal = document.getElementById('shipperPostal').value;
    var shipperContact = document.getElementById('shipperContact').value;
    var shipperEmail = document.getElementById('shipperEmail').value;
    var shipperTelephone = document.getElementById('shipperTelephone').value;
    var shipperExt = document.getElementById('shipperExt').value;
    var shipperTollFree = document.getElementById('shipperTollFree').value;
    var shipperFax = document.getElementById('shipperFax').value;
    var shipperShippingHours = document.getElementById('shipperShippingHours').value;
    var shipperAppointments = document.getElementById('shipperAppointments').value;
    var shipperIntersaction = document.getElementById('shipperIntersaction').value;
    var shipperASconsignee = document.getElementsByName('shipperASconsignee').value;
    var shipperStatus = document.getElementsByName('shipperStatus');
    var shippingNotes = document.getElementById('shippingNotes').value;
    var internalNotes = document.getElementById('internalNotes').value;
    // alert(shipperStatus);
    if (val_shipperName(shipperName)) {
        if (val_shipperAddress(shipperAddress)) {
            if (val_shipperLocation(shipperLocation)) {
                if (val_shipperPostal(shipperPostal)) {
                    if (val_shipperContact(shipperContact)) {
                        if (val_shipperEmail(shipperEmail)) {
                            if (val_shipperTelephone(shipperTelephone)) {
                                if (val_shipperExt(shipperExt)) {
                                    if (val_shipperTollFree(shipperTollFree)) {
                                        if (val_shipperFax(shipperFax)) {
                                            if (val_shipperShippingHours(shipperShippingHours)) {
                                                if (val_shipperAppointments(shipperAppointments)) {
                                                    if (val_shipperIntersaction(shipperIntersaction)) {
                                                        if (val_shipperStatus(shipperStatus)) {
                                                            if (val_shippingNotes(shippingNotes)) {
                                                                if (val_internalNotes(internalNotes)) {
                                                                    $.ajax({
                                                                        url: 'admin/shipper_driver.php?type=' + 'add_shipper',
                                                                        type:'POST',
                                                                        data:{
                                                                            companyID:companyID,
                                                                            shipperName:shipperName,
                                                                            shipperAddress:shipperAddress,
                                                                            shipperLocation:shipperLocation,
                                                                            shipperPostal:shipperPostal,
                                                                            shipperContact:shipperContact,
                                                                            shipperEmail:shipperEmail,
                                                                            shipperTelephone:shipperTelephone,
                                                                            shipperExt:shipperExt,
                                                                            shipperTollFree:shipperTollFree,
                                                                            shipperFax:shipperFax,
                                                                            shipperShippingHours:shipperShippingHours,
                                                                            shipperAppointments:shipperAppointments,
                                                                            shipperIntersaction:shipperIntersaction,
                                                                            shipperStatus:shipperStatus,
                                                                            shippingNotes:shippingNotes,
                                                                            internalNotes:internalNotes,
                                                                            shipperASconsignee:shipperASconsignee
                                                                        },
                                                                        success: function (data) {
                                                                            swal('Success',data,'success');
                                                                        }
                                                                    });
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

//----------Shipper Start-------------