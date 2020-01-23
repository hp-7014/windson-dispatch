//----------Shipper Start-------------
// add shipper
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
    var shipperASconsignee = document.getElementsByName('shipperASconsignee');
    var shipperStatus = document.getElementsByName('shipperStatus');
    var shippingNotes = document.getElementById('shippingNotes').value;
    var internalNotes = document.getElementById('internalNotes').value;

    for (var i = 0; i < shipperStatus.length; i++) {
        if (shipperStatus[i].checked) {
            var status = shipperStatus[i].value;
            break;
        }
    }
    // alert(status);
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
                                                        if (val_shippingNotes(shippingNotes)) {
                                                            if (val_internalNotes(internalNotes)) {
                                                                $.ajax({
                                                                    url: 'admin/shipper_driver.php?type=' + 'add_shipper',
                                                                    type: 'POST',
                                                                    data: {
                                                                        companyID: companyID,
                                                                        shipperName: shipperName,
                                                                        shipperAddress: shipperAddress,
                                                                        shipperLocation: shipperLocation,
                                                                        shipperPostal: shipperPostal,
                                                                        shipperContact: shipperContact,
                                                                        shipperEmail: shipperEmail,
                                                                        shipperTelephone: shipperTelephone,
                                                                        shipperExt: shipperExt,
                                                                        shipperTollFree: shipperTollFree,
                                                                        shipperFax: shipperFax,
                                                                        shipperShippingHours: shipperShippingHours,
                                                                        shipperAppointments: shipperAppointments,
                                                                        shipperIntersaction: shipperIntersaction,
                                                                        shipperStatus: status,
                                                                        shippingNotes: shippingNotes,
                                                                        internalNotes: internalNotes,
                                                                    },
                                                                    success: function (data) {
                                                                        swal('Success', data, 'success');
                                                                        $('#add_shipper').modal('hide');
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

//Import shipper
function importShipper() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file", document.getElementById('file').files[0]);

    $.ajax({
        url: 'admin/shipper_driver.php?type=' + 'importShipper',
        method: 'post',
        data: form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success",data,'success');
        }
    });
}

// Export Excel function for Payment Terms
function exportShipper(id) {

    $.ajax({
        url: 'admin/shipper_driver.php?type=' + 'exportShipper',
        data:{companyid:id},
        type: 'POST',
        success: function (data) {

            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}
//----------Shipper Start-------------