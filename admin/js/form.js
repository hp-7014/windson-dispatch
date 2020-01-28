//-----------------Truck Add start-------------------------------------

//ajax Function For insert Truck
function TruckAdd() {
    var truck_number = document.getElementById("truck_number").value;
    var trucktype = document.getElementById('trucktype').value;
    var license_plate = document.getElementById("license_plate").value;
    var plate_expiry = document.getElementById('plate_expiry').value;
    var inspection = document.getElementById("inspection").value;
    var status = document.getElementById('status').value;
    var ownership = document.getElementsByName('ownershipp');
    var mileage = document.getElementById('mileage').value;
    var axies = document.getElementById("axies").value;
    var year = document.getElementById('year').value;
    var fuel_type = document.getElementById("fuel_type").value;
    var start_date = document.getElementById('start_date').value;
    var deactivation = document.getElementById("deactivation").value;
    var registered_state = document.getElementById('registered_state').value;
    var Insurance_Policy = document.getElementById("Insurance_Policy").value;
    var gross = document.getElementById('gross').value;
    var vin = document.getElementById("vin").value;
    var dot = document.getElementById('dot').value;
    var transponder = document.getElementById("transponder").value;
    var ifta = document.getElementById('customCheck1').value;
    var Internal_note = document.getElementById("Internal_note").value;
    var companyId = document.getElementById('companyId').value;

//Get Radio Button Value
    for (var i = 0; i < ownership.length; i++) {
        if (ownership[i].checked) {
            var ownershipstatus = ownership[i].value;
            break;
        }
    }
    if (val_truck_number(truck_number)) {
        if(val_trucktype(trucktype)) {
            if(val_license_plate(license_plate)) {
                if(val_plate_expiry(plate_expiry)) {
                    //if(val_inspection(inspection)) {
                        //if(val_status(status)) {
                            if(val_ownershipstatus(ownershipstatus)) {
                                // if(val_mileage(mileage)) {
                                //     if(val_axies(axies)) {
                                //         if(val_year(year)) {
                                //             if(val_fuel_type(fuel_type)) {
                                //                 if(val_start_date(start_date)) {
                                //                     if(val_deactivation(deactivation)) {
                                //                         if(val_registered_state(registered_state)) {
                                //                             if(val_Insurance_Policy(Insurance_Policy )) {
                                //                                 if(val_gross(gross)) {
                                                                    if(val_vin(vin)) {
                                                                        // if(val_dot(dot)) {
                                                                        //     if(val_transponder(transponder)) {
                                                                        //         if(val_ifta(ifta)){
                                                                        //             if(val_Internal_note(Internal_note)){
                                                                                        $.ajax({
                                                                                            url: 'admin/truckadd_driver.php?type='+'truckadd',
                                                                                            type: 'POST',
                                                                                            data: {
                                                                                                companyId:companyId,
                                                                                                truck_number: truck_number,
                                                                                                trucktype: trucktype,
                                                                                                license_plate: license_plate,
                                                                                                plate_expiry: plate_expiry,
                                                                                                inspection: inspection,
                                                                                                status: status,
                                                                                                ownership: ownershipstatus,
                                                                                                mileage: mileage,
                                                                                                axies: axies,
                                                                                                year: year,
                                                                                                fuel_type: fuel_type,
                                                                                                start_date: start_date,
                                                                                                deactivation: deactivation,
                                                                                                registered_state: registered_state,
                                                                                                Insurance_Policy: Insurance_Policy,
                                                                                                gross: gross,
                                                                                                vin: vin,
                                                                                                dot: dot,
                                                                                                transponder: transponder,
                                                                                                ifta: ifta,
                                                                                                Internal_note: Internal_note,
                                                                                            },
                                                                                                dataType: "text",
                                                                                                success: function (data) {
                                                                                                swal("Success",data,"success");
                                                                                                $('#add_Truck').modal('hide');
                                                                                            },
                                                                                        });
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
    //                                                         }
    //                                                     }
    //                                                 }
    //                                             }
    //                                         }
    //                                     }
    //                                 }
    //                             }
    //                         }
    //                     }
    //                 }
    //             }
    //         }
    //     }
    // }
}

//Import Excel Function For Truck Add
function importExceltruck() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file",document.getElementById('file').files[0]);

    $.ajax({
        url:'admin/truckadd_driver.php?type='+'truckimport',
        method:'post',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success",data,"success");
        }
    });
}

// Export Excel Function For Truck Add
function exportTruckAdd() {
    $.ajax({
        url: 'admin/truckadd_driver.php?type='+'truckexport',
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//update Truck Function
function updateTruckAdd(element,column,id){
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/truckadd_driver.php?type='+'edit_truck',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success",data,"success");
            //$('#currency').modal('hide');
        }
    });
}

// Delete Truck Function
function deleteTruckAdd(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'admin/truckadd_driver.php?type='+'delete_truck',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success",data,"success");
                //$('#currency').modal('hide');
            }
        });
    }
}
//-----------------Truck Add End-------------------------------------


//-----------------Trailer Add start-------------------------------------

//Ajax Function For insert Trailer
function Traileradd() {
    var trailer_number = document.getElementById("trailer_number").value;
    var trailer_type = document.getElementById('traileradd_type').value;
    var license_plate = document.getElementById("license_plate").value;
    var plate_expiry = document.getElementById('plate_expiry').value;
    var inspection = document.getElementById("inspection").value;
    var status = document.getElementById('status').value;
    var model = document.getElementById('truckmod').value;
    var year = document.getElementById('year').value;
    var axies = document.getElementById("axies").value;
    var register_state = document.getElementById('register_state').value;
    var vin = document.getElementById("vin").value;
    var dot = document.getElementById('dot').value;
    var activation_date = document.getElementById("activation_date").value;
    var internal_notes = document.getElementById('internal_notes').value;
    var companyId = document.getElementById('companyId').value;

    if (val_trailer_number(trailer_number)) {
        if (val_trailer_type(trailer_type)) {
            if (val_license_plate_trailer(license_plate)) {
                if (val_plate_expiry_trailer(plate_expiry)) {
                    if (val_vin_trailer(vin)) {
                        $.ajax({
                            url: 'admin/traileradd_driver.php?type='+'traileradd',
                            type: 'POST',
                            data: {
                                companyId: companyId,
                                trailer_number: trailer_number,
                                trailer_type: trailer_type,
                                license_plate: license_plate,
                                plate_expiry: plate_expiry,
                                inspection: inspection,
                                status: status,
                                model: model,
                                year: year,
                                axies: axies,
                                register_state: register_state,
                                vin: vin,
                                dot: dot,
                                activation_date: activation_date,
                                internal_notes: internal_notes,
                            },
                            dataType: "text",
                            success: function (data) {
                                swal("Success", data, "success");
                                $('#add_Trailer').modal('hide');
                            },
                        });
                    }
                }
            }
        }
    }
}

//update Trailer Function
function updateTrailerAdd(element,column,id){
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/traileradd_driver.php?type=' + 'edit_trailer',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success",data,"success");
            //$('#currency').modal('hide');
        }
    });
}


// Delete Trailer Function
function deleteTrailerAdd(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'admin/traileradd_driver.php?type='+'delete_trailer',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success",data,"success");
                //$('#currency').modal('hide');
            }
        });
    }
}


//Import Excel Function For Trailer Add
function importExceltrailer() {
    // var file = document.getElementById('file').value;
    var form_data = new FormData();

    form_data.append("file",document.getElementById('file').files[0]);

    $.ajax({
        url:'admin/traileradd_driver.php?type='+'trailerimport',
        method:'post',
        data:form_data,
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            swal("Success",data,"success");
        }
    });
}

// Export Excel Function For Trailer Add
function exportTrailerAdd() {
    $.ajax({
        url: 'admin/traileradd_driver.php?type='+'trailerexport',
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//-----------------Trailer Add End-------------------------------------


//-----------------Factoring Add Start---------------------------------

//Ajax Function For insert Factoring
function FactoringCompany() {

    var factoring_company = document.getElementById("factoring_add_company").value;
    var faddress = document.getElementById('faddress').value;
    var flocation = document.getElementById("flocation").value;
    var fzip = document.getElementById('fzip').value;
    var fprimary_contact = document.getElementById("fprimary_contact").value;
    var factoringtelephone = document.getElementById('ftelephone').value;
    var factext = document.getElementById('factext').value;
    var ffax = document.getElementById('ffax').value;
    var ftollfree = document.getElementById("ftollfree").value;
    var femail = document.getElementById('femail').value;
    var fsecondaryContact = document.getElementById("fsecondaryContact").value;
    var ftelephone = document.getElementById('facttelephone').value;
    var ext = document.getElementById("ext").value;
    var fcurrency = document.getElementById('fcurrency').value;
    var fpaymentterms = document.getElementById('fpaymentterms').value;
    var ftaxid = document.getElementById("ftaxid").value;
    var finternal_notes = document.getElementById('finternal_notes_factoring').value;
    var companyId = document.getElementById('companyId').value;

    if (val_factoring_company(factoring_company)) {
        if (val_faddress(faddress)) {
            if (val_flocation(flocation)) {
                if (val_fzip(fzip)) {
                    if (val_ftaxid(ftaxid)) {
                        $.ajax({
                            url: 'admin/factoring_driver.php?type='+'factoringadd',
                            type: 'POST',
                            data: {
                                companyId: companyId,
                                factoring_company: factoring_company,
                                faddress: faddress,
                                flocation: flocation,
                                fzip: fzip,
                                fprimary_contact: fprimary_contact,
                                factoringtelephone: factoringtelephone,
                                fext: factext,
                                ffax: ffax,
                                ftollfree: ftollfree,
                                femail: femail,
                                fsecondaryContact: fsecondaryContact,
                                ftelephone: ftelephone,
                                ext: ext,
                                fcurrency: fcurrency,
                                fpaymentterms: fpaymentterms,
                                ftaxid: ftaxid,
                                finternal_notes: finternal_notes,
                            },
                            dataType: "text",
                            success: function (data) {
                                swal("Success", data, "success");
                                $('#add_factoring').modal('hide');
                            },
                        });
                    }
                }
            }
        }
    }
}

//update Factoring Function
function updateFactoring(element,column,id){
    var value = element.innerText;
    var companyId = document.getElementById('companyId').value;
    $.ajax({
        url: 'admin/factoring_driver.php?type=' + 'edit_factoring',
        type: 'POST',
        data: {
            companyId: companyId,
            column: column,
            id: id,
            value: value,
        },
        success: function (data) {
            swal("Success",data,"success");
            //$('#currency').modal('hide');
        }
    });
}

// Delete Factoring Function
function deletefactoring(id) {
    if (confirm('Are you sure ???')) {
        $.ajax({
            url: 'admin/factoring_driver.php?type='+'delete_factoring',
            type: 'POST',
            data: {id: id},
            success: function (data) {
                swal("Success",data,"success");
                //$('#currency').modal('hide');
            }
        });
    }
}

// Export Excel Function for Factoring Company
function exportFactoring() {
    $.ajax({
        url: 'admin/factoring_driver.php?type='+'export_factoring',
        type: 'POST',
        success: function (data) {
            var rows = JSON.parse(data);

            let csvContent = "data:text/csv;charset=utf-8,";

            rows.forEach(function (rowArray) {
                let row = rowArray.join(",");
                csvContent += row + "\r\n";
            });

            // var encodedUri = encodeURI(csvContent);
            // window.open(encodedUri);

            var encodedUri = encodeURI(csvContent);
            var link = document.createElement("a");
            link.setAttribute("href", encodedUri);
            link.setAttribute("download", "my_data.csv");
            document.body.appendChild(link); // Required for FF

            link.click();
        }
    });
}

//-----------------Factoring Add End---------------------------------