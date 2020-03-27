var room = 0;
var count = 0;
var otherDescription = [""];
var otherCharges = [""];
var carrierotherDescription = [""];
var carrierotherCharges = [""];
var carrierotherAdvances = [""];
var driverotherDescription = [""];
var driverotherCharges = [""];
var ownerotherDescription = [""];
var ownerotherCharges = [""];
var startLocation = "";
var endLocation = "";
var tarp = 0;
var directionsService = new google.maps.DirectionsService();
var directionsDisplay = new google.maps.DirectionsRenderer();
var distance = 0;
var total = 0;
var pickrate = 0;
var pickafter = 0;
var droprate = 0;
var dropafter = 0;
var customeremail = "";
var carrieremail = "";

function add_fields() {
    room++;

    var mainID = "'home-title" + room + "'";
    var contentID = "'home" + room + "'";
    var objTo = document.getElementById('myTab');
    var divtest = '<li class="nav-item list-item" id = "home-title' + room + '"><a class = "nav-link shipper list-anchors" id = "home-tab' + room + '" data-toggle="tab" href="#home' + room + '" role="tab" aria-controls="home" aria-selected="false">Shipper</a><i class="mdi mdi-window-close ico" onclick="removeTab(' + mainID + ',' + contentID + ')" aria-hidden="true"></i></li>'
    objTo.innerHTML += divtest;
    document.getElementById('sc-card').classList.add("shadow");
    //var contentTo = document.getElementById("myTabContent");
    var contentTo = $("#myTabContent");
    var contenttest = '<div class="tab-pane fade" id="home' + room + '" role="tabpanel" aria-labelledby="home-tab' + room + '"><div class="row m-2">\n' +
        '                                            <div class="form-group col-md-3">\n' +
        '                                                <label>Name*</label>\n' +
        '                                                 <input list="shipper' + room + '" class="form-control" placeholder="--Select--" id="shipperlist' + room + '" name="shipperlist" onchange="getShipper(this.value,' + room + '); ">\n' +
        '                                                 <datalist id="shipper' + room + '">\n' +
        '                                                 </datalist>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Address*</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" id = "shipperaddress' + room + '" placeholder="Address *" type="text"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Location *</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Enter a location"\n' +
        '                                                           type="text" id = "activeshipper' + room + '" onkeydown="getLocation(this.id)" id="activeshipper' + room + '" name="activeshipper">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Pickup Date</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control"  type="date"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Pickup Time</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control"  type="time"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-1">\n' +
        '                                                <label>Type*</label>\n' +
        '                                                <div class="row">\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="tl' + room + '" name="tl' + room + '"\n' +
        '                                                               checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="tl' + room + '">TL</label>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="ltl' + room + '" name="tl' + room + '">\n' +
        '                                                        <label class="custom-control-label" for="ltl' + room + '">LTL</label>\n' +
        '                                                    </div>\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Commodity</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" type="text"\n' +
        '                                                           placeholder="Commodity" " >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +

        '<div class="form-group col-md-1 ">\n' +
        '                                                <label>Qty</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Qty" type="text" >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2 ">\n' +
        '                                                <label>Weight</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" type="text" placeholder="Weight">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Pickup #</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Pickup #" type="text"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                                <div class="form-group col-md-1">\n' +
        '                                                <label>Sr#</label>\n' +
        '                                                <div>\n' +
        '                                                <input class="form-control" placeholder="Sr#" type="number" id="shipseq' + room + '" name="shipseq" value="0">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-4">\n' +
        '                                                <label>Pickup Notes</label>\n' +
        '                                                <div>\n' +
        '                                                    <textarea rows="1" cols="30" class="form-control" type="textarea"\n' +
        '                                                              ></textarea>\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                        </div></div>';
    //contentTo.innerHTML += contenttest;
    $(contentTo).append(contenttest);
    getShip("shipper" + room);
    renameShipper();
    makeActive();

}

function makeActive() {

    for (var i = 0; i < room; i++) {
        var component = document.getElementById('home-tab' + i);
        var component1 = document.getElementById('home' + i);
        if (component && component1) {
            component.classList.remove("active");
            component1.classList.remove("show");
            component1.classList.remove("active");
            component.setAttribute("aria-selected", false);
        }
    }
    var newcomponent = document.getElementById('home-tab' + i);
    var newcomponent1 = document.getElementById('home' + i);
    newcomponent.classList.add("active");
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    newcomponent.setAttribute("aria-selected", true);
}

function renameShipper() {
    var shippers = document.getElementsByClassName('shipper');
    for (var i = 0; i < document.getElementById('myTab').getElementsByTagName("li").length; i++) {
        shippers[i].innerHTML = "Shipper " + (i + 1);
    }
}

function removeTab(mainid, contentid) {

    var element1 = document.getElementById(mainid);
    var element2 = document.getElementById(contentid);
    if (mainid == 'home-title') {
        swal({
            title: 'First Shipper Cannot be removed!!',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
        return;
    }
    if (document.getElementById('myTab').getElementsByTagName("li").length > 1) {
        // var activeID = "";
        // for (var i = 1; i < document.getElementById('myTab').getElementsByTagName("li").length; i++) {
        //         if(mainid == document.getElementById('myTab').getElementsByTagName("li")[i].getAttribute("id")){        
        //             activeID = i - 1;
        //         }
        // }
        document.getElementById('myTab').removeChild(element1);
        document.getElementById('myTabContent').removeChild(element2);

        // for (var i = 0; i < document.getElementById('myTab').getElementsByTagName("li").length + 1; i++) {
        //     var component = document.getElementById('home-tab' + i);
        //     var component1 = document.getElementById('home' + i);
        //     if (component && component1) {
        //         alert(document.getElementById('myTab').getElementsByTagName("li").length);
        //         component.classList.remove("active");
        //         component1.classList.remove("show");
        //         component1.classList.remove("active");
        //         component.setAttribute("aria-selected", false);
        //     }
        // }
        // var newcomponent = document.getElementById('home-tab' + activeID);
        // var newcomponent1 = document.getElementById('home' + activeID);
        // newcomponent.classList.add("active");
        // newcomponent1.classList.add("show");
        // newcomponent1.classList.add("active");
        // newcomponent.setAttribute("aria-selected", true);
        renameShipper();

    } else {
        swal({
            title: 'First Shipper Cannot be removed!!',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
    }
}


function add_consignee() {
    count++;
    var mainID = "'consig-title" + count + "'";
    var contentID = "'consig" + count + "'";
    var objTo = document.getElementById('consignee');
    var divtest = '<li class="nav-item list-item"  id="consig-title' + count + '"><a class="nav-link active consignee list-anchors-consig" id="consig-tab' + count + '" data-toggle="tab" href="#consig' + count + '" role="tab" aria-controls="home" aria-selected="true">Consignee</a><i class="mdi mdi-window-close ico" onclick="removeConsignee(' + mainID + ',' + contentID + ')" aria-hidden="true"></i> </li>'
    objTo.innerHTML += divtest;

    //var contentTo = document.getElementById("consigneeContent");
    var contentTo = $("#consigneeContent");
    var contenttest = '<div class="tab-pane fade" id="consig' + count + '" role="tabpanel" aria-labelledby="consig-tab' + count + '"><div class="row m-2">\n' +
        '                                            <div class="form-group col-md-3">\n' +
        '                                                <label>Name*</label>\n' +
        '                                                <input list="consigneee' + count + '" class="form-control" placeholder="--Select--" id="consigneelist' + count + '" name="consigneelist" onchange="getConsignee(this.value,' + count + ')">\n' +
        '                                                 <datalist id="consigneee' + count + '">\n' +
        '                                                 </datalist>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Address*</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Address *" type="text" id="consigneeaddress' + count + '"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Location *</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Enter a location"\n' +
        '                                                           type="text" onkeydown="getLocation(this.id)" id="activeconsignee' + count + '" name="activeconsignee">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Pickup Date</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control"  type="date"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Pickup Time</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control"  type="time"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-1">\n' +
        '                                                <label>Type*</label>\n' +
        '                                                <div class="row">\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="ctl' + count + '" name="ctl' + count + '"\n' +
        '                                                               checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="ctl' + count + '">TL</label>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="cltl' + count + '" name="ctl' + count + '">\n' +
        '                                                        <label class="custom-control-label" for="cltl' + count + '">LTL</label>\n' +
        '                                                    </div>\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Commodity</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" type="text"\n' +
        '                                                           placeholder="Commodity" " >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +

        '<div class="form-group col-md-1 ">\n' +
        '                                                <label>Qty</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Qty" type="text" >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2 ">\n' +
        '                                                <label>Weight</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" type="text" placeholder="Weight">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Delivery #</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Delivery #" type="text"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                                 <div class="form-group col-md-1">\n' +
        '                                                <label>Sr#</label>\n' +
        '                                                <div>\n' +
        '                                                <input class="form-control" placeholder="Sr#" type="number" id="consigseq' + count + '" name="consigseq" value="0">\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-4">\n' +
        '                                                <label>Delivery Notes</label>\n' +
        '                                                <div>\n' +
        '                                                    <textarea rows="1" cols="30" placeholder="Delivery Notes" class="form-control" type="textarea"\n' +
        '                                                              ></textarea>\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                        </div></div>';
    //contentTo.innerHTML += contenttest;
    $(contentTo).append(contenttest);
    renameConsignee();
    getConsig("consigneee" + count);
    makeConsigneeActive();

}

function renameConsignee() {
    var consignee = document.getElementsByClassName('consignee');
    for (var i = 0; i < document.getElementById('consignee').getElementsByTagName("li").length; i++) {

        consignee[i].innerHTML = "Consignee " + (i + 1);
    }
}

function makeConsigneeActive() {

    for (var i = 0; i < count; i++) {
        var component = document.getElementById('consig-tab' + i);
        var component1 = document.getElementById('consig' + i);
        if (component && component1) {
            component.classList.remove("active");
            component1.classList.remove("show");
            component1.classList.remove("active");
            component.setAttribute("aria-selected", false);
        }
    }
    var newcomponent = document.getElementById('consig-tab' + i);
    var newcomponent1 = document.getElementById('consig' + i);
    newcomponent.classList.add("active");
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    newcomponent.setAttribute("aria-selected", true);
}

function removeConsignee(consigid, consigcontent) {
    var element1 = document.getElementById(consigid);
    var element2 = document.getElementById(consigcontent);
    if (consigid == 'consig-title') {
        swal({
            title: 'First Consignee Cannot be removed!!',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
        return;
    }
    if (document.getElementById('consignee').getElementsByTagName("li").length > 1) {
        document.getElementById('consignee').removeChild(element1);
        document.getElementById('consigneeContent').removeChild(element2);
        renameConsignee();
    } else {
        alert("All consignee cannot be removed.");
    }

}


function Showcarrier() {
    $(".carrier").css("display", "block");
    $(".driver").css("display", "none");
    $(".owner").css("display", "none");
}

function Showdriver() {
    $(".carrier").css("display", "none");
    $(".driver").css("display", "block");
    $(".owner").css("display", "none");
}

function Showowner() {
    $(".carrier").css("display", "none");
    $(".driver").css("display", "none");
    $(".owner").css("display", "block");
}

function getShip(shipID) {
    $.ajax({
        url: 'admin/utils/getShipper.php',
        type: 'POST',
        success: function (data) {
            document.getElementById(shipID).innerHTML += data;
        }
    });
}

function getConsig(consigID) {
    $.ajax({
        url: 'admin/utils/getConsignee.php',
        type: 'POST',
        success: function (data) {
            document.getElementById(consigID).innerHTML += data;
        }
    });
}

$(document).on("click", "#startLocation", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('master/add_startlocation.php', function (result) {
                $('#addstartlocation').modal({show: true});
            });
            setTimeout(function () {
                addStartfield();
            }, 300);
        }
    });
});

$(document).on("click", "#endLocation", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('master/add_endlocation.php', function (result) {
                $('#endlocationmodal').modal({show: true});
            });
            setTimeout(function () {
                addEndfield();
            }, 300);
        }
    });
});


$(document).on("click", "#add_Customer_Modal", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/customer_modal_sub.php', function (result) {
                $('#add_customer').modal({show: true});
            });
        }
    });
});


$(document).on("click", "#add_Carrier_Modal", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/external_carrier_modal_sub.php', function (result) {
                $('#add_External').modal({show: true});
            });
        }
    });
});

$(document).on("click", "#add_Driver_Modal", function () {
    //alert("clicked");
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/driver_modal_sub.php', function (result) {
                $('#add_Driver').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Truck_Modal", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/add_truck_modal_sub.php', function (result) {
                $('#add_Truck').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Trailer_Modal", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/add_trailer_modal_sub.php', function (result) {
                $('#add_Trailer').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Truck_Modal1", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/add_truck_modal_sub.php', function (result) {
                $('#add_Truck').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Trailer_Modal1", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/add_trailer_modal_sub.php', function (result) {
                $('#add_Trailer').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Owner_Operator", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/owner_operator_modal_sub.php', function (result) {
                $('#Owner_operator').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_shipper_modal", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/shipper_modal_sub.php', function (result) {
                $('#add_shipper').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_consignee_modal", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/consignee_modal_sub.php', function (result) {
                $('#add_consignee').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Owner_Other", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/owner_other_charges_modal.php', function (result) {
                $('#ownerOtherCharges').modal({show: true});
            });
            setTimeout(function () {
                addOwnerFields();
            }, 300);
        }
    });
});
$(document).on("click", "#add_Driver_Other", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/driver_other_charges_modal.php', function (result) {
                $('#driverOtherCharges').modal({show: true});
            });
            setTimeout(function () {
                addDriverFields();
            }, 300);
        }
    });
});
$(document).on("click", "#add_carrier_other", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/carrier_other_charges_modal.php', function (result) {
                $('#carrierOtherCharges').modal({show: true});
            });
            setTimeout(function () {
                addcarrierFields();
            }, 300);
        }
    });
});

$(document).on("click", "#add_other", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/other_charges_modal.php', function (result) {
                $('#otherCharges').modal({show: true});
            });
            setTimeout(function () {
                addFields();
            }, 300);

        }

    });

});


$(document).on("click", "#carrierOther", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/carrier_other_charges_modal.php', function (result) {
                $('#carrierOtherCharges').modal({show: true});
            });
            setTimeout(function () {
                addcarrierFields();
            }, 300);
        }
    });
});

$(document).on("click", "#OtherCharges", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/other_charges_modal.php', function (result) {
                $('#otherCharges').modal({show: true});
            });
            setTimeout(function () {
                addFields();
            }, 300);

        }

    });


});

$(document).on("click", "#add_Company_Modal", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('master/add_company_sub.php', function (result) {
                $('#add_company').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#active_type_Modal", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('master/loadtype_modal_sub.php', function (result) {
                $('#addLoad_Type').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#equipment_type_Modal", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('master/equipment_type_modal_sub.php', function (result) {
                $('#Add_Equipment_Type').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_currency_modal", function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('master/add_currency_sub.php', function (result) {
                $('#currencysub').modal({show: true});
            });
        }
    });
});

$(document).on('click', '#carrierratecon', function () {
    alert("inside");
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/carrieremail.php', function (result) {
                $('#AddEmail').modal({show: true});
            });
            setTimeout(function () {
                addcarrieremail();
            }, 300);
        }
    });
});

$(document).on('click', '.modelemail', function () {
    $('#AddEmail').modal('hide');
});

$(document).on('click', '#customerratecon', function () {
    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/customeremail.php', function (result) {
                $('#Addcustomeremail').modal({show: true});
            });
            setTimeout(function () {
                addcustomeremail();
            }, 300);
        }
    });
});
$(document).on('click', '.modelcustomer', function () {
    $('#Addcustomeremail').modal('hide');
});

function enableUnits(value) {
    var values = value.split(')');
    var val = values[0];

    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'enableUnit',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            if (data == 'Yes') {
                document.getElementById('no-of-units').disabled = false;
            }
            if (data == "No") {
                document.getElementById('no-of-units').disabled = true;
            }
        }
    });
}

function getCustomer(value) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'customer',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            if (data != "") {
                customeremail = data;
            } else {
                swal({
                    title: '<h5>Customer\'s email is empty.</h5>',
                    type: 'warning',
                    html: "",
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    buttonsStyling: false
                });
            }
        }
    });
}

function getCarrier(value) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'carrier',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var response = data.split("^");
            if (response[0] != "") {
                swal({
                    title: 'Are you sure? You Want to Continue!',
                    type: 'warning',
                    html: response[0],
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    buttonsStyling: false
                });
            }

            if (response[1] != "") {
                carrieremail = response[1];
            }
        }
    });
}

function getTotal() {
    var rateAmount = document.getElementById('rateAmount').value;
    var noOfUnits = document.getElementById('no-of-units').value;
    var fsc = document.getElementById('fsc').value;
    var totalAmount = document.getElementById('totalAmount');
    var ratePercentage = document.getElementById('customCheck1');
    var otherCharges = document.getElementById('OtherCharges').value;
    if (rateAmount != "" && noOfUnits == "" && fsc == "" && otherCharges == "") {
        totalAmount.value = parseFloat(rateAmount).toFixed(2);
    }

    if (noOfUnits != "" && fsc == "") {
        if (rateAmount != "") {
            totalAmount.value = parseFloat(rateAmount * noOfUnits).toFixed(2);
        } else {
            swal({
                title: 'Warning!',
                text: "Rate cannot be empty",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-danger ml-2',
            });

        }
    }
    if (fsc != "" && otherCharges == "") {
        if (ratePercentage.checked == true) {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc) / 100 : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc) / 100));
                totalAmount.value = total.toFixed(2);
            } else {
                swal({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        } else {
            if (rateAmount != "") {
                if (typeof (rateAmount) == 'number') {
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseInt(rateAmount * noOfUnits) + parseInt(fsc);
                    totalAmount.value = total.toFixed(2);
                    ;
                } else {
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseFloat(rateAmount * noOfUnits) + parseFloat(fsc);
                    totalAmount.value = total.toFixed(2);
                    ;
                }
            } else {
                swal({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
    }

    if (otherCharges != "") {
        if (ratePercentage.checked == true) {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc) / 100 + parseFloat(otherCharges) : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc) / 100) + parseFloat(otherCharges));
                totalAmount.value = total.toFixed(2);
            } else {
                swal({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        } else {
            if (rateAmount != "") {
                var total = noOfUnits == "" ? parseFloat(rateAmount) + getFSC(fsc) + parseFloat(otherCharges) : parseInt(rateAmount * noOfUnits) + getFSC(fsc) + parseFloat(otherCharges);
                totalAmount.value = total.toFixed(2);

            } else {
                swal({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
    }
}

function getFSC(fsc) {
    if (fsc == "") {
        return 0;
    } else {
        return parseFloat(fsc);
    }
}

function getOtherCharges() {
    var oth_chg = document.getElementById('OtherCharges');
    var other_total = 0;
    for (var i = 0; i < document.getElementsByName('otherDescription').length; i++) {
        otherDescription[i] = document.getElementsByName('otherDescription')[i].value;
        otherCharges[i] = document.getElementsByName('other_charges')[i].value;
        other_total += parseInt(document.getElementsByName('other_charges')[i].value);

    }
    oth_chg.value = other_total;
    $('#otherCharges').modal('hide');
    getTotal();
}

function addFields() {
    if (otherDescription.length > 0) {
        var innerData = "";
        for (var i = 0; i < otherDescription.length; i++) {
            innerData += '<tr id="otherRow' + i + '"><td width="200"><input name = "otherDescription" type="text" value = "' + otherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "other_charges" type="text" value = "' + otherCharges[i] + '"class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger" onclick="removeRow(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('TextBoxContainer1').innerHTML = innerData;
    }

}

function getcarrierOtherCharges() {
    var oth_chg = document.getElementById('carrierOther');
    var carrier_other_total = 0;
    for (var i = 0; i < document.getElementsByName('carrierotherDescription').length; i++) {

        carrierotherDescription[i] = document.getElementsByName('carrierotherDescription')[i].value;
        carrierotherCharges[i] = document.getElementsByName('Carrier_other_charges')[i].value;
        carrierotherAdvances[i] = document.getElementsByName('Carrier_other_advances')[i].value;
        carrier_other_total += parseFloat(parseFloat(document.getElementsByName('Carrier_other_charges')[i].value) + parseFloat(document.getElementsByName('Carrier_other_advances')[i].value));


    }
    oth_chg.value = carrier_other_total;
    getCarrierTotal();
    $('#carrierOtherCharges').modal('hide');

}

function addcarrierFields() {
    if (carrierotherDescription.length > 0) {
        var innerData = "";
        for (var i = 0; i < carrierotherDescription.length; i++) {
            innerData += '<tr id="carrierotherRow' + i + '"><td width="200"><input name = "carrierotherDescription" type="text" value = "' + carrierotherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "Carrier_other_charges" type="text" value = "' + carrierotherCharges[i] + '"class="form-control" /></td>' + '<td width="150"><input name="Carrier_other_advances" type="text" value="' + carrierotherAdvances[i] + '" class="form-control"/></td>' + '<td><button type="button" class="btn btn-danger" onclick="carrierRemoveRow(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('CarrierTextBoxContainer1').innerHTML = innerData;
    }

}

function getCarrierTotal() {
    var flatrate = document.getElementById('carrierFlat').value;
    var advancecharges = document.getElementById('carrierOther').value;
    var total_charges = document.getElementById('carrierTotal');
    if (flatrate != "" && advancecharges == "") {
        total_charges.value = parseFloat(flatrate).toFixed(2);
    }
    if (advancecharges != "") {
        if (flatrate == "") {
            swal({
                title: 'Warning!',
                text: "Flatrate cannot be empty",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-danger ml-2',
            });
        } else {
            total_charges.value = parseFloat(parseFloat(flatrate) + parseFloat(advancecharges)).toFixed(2);
        }
    }


}


function getDriver(value) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'driver',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var response = data.split('^');
            document.getElementById('loadedmile').value = response[1];
            document.getElementById('emptymile').value = response[2];
            pickrate = response[4];
            pickafter = response[5];
            droprate = response[6];
            dropafter = response[7];
            tarp = response[3];
            if (response[0] != "") {
                swal({
                    title: 'Are you sure? You Want to Continue!',
                    type: 'warning',
                    type: 'info',
                    html: response[0],
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    buttonsStyling: false
                });
            }
        }
    });
}

function getTruck(value) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'truck',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {

            if (data != "") {
                swal({
                    title: 'Are you sure? You Want to Continue!',
                    type: 'warning',
                    type: 'info',
                    html: data,
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    buttonsStyling: false
                });
            }
        }
    });
}

function getTrailer(value) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'trailer',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            if (data != "") {
                swal({
                    title: 'Are you sure? You Want to Continue!',
                    type: 'warning',
                    type: 'info',
                    html: data,
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    buttonsStyling: false
                });
            }
        }
    });
}

//active Shipper
function getShipper(value, id) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'shipper',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var values = data.split("^");
            if (values[0] != "" && values[1] != "") {
                document.getElementById("shipperaddress" + id + "").value = values[0];
                document.getElementById("activeshipper" + id + "").value = values[1];
            }
        }
    });
}

//active Consignee
function getConsignee(value, id) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'consignee',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var values = data.split("^");
            if (values[0] != "" && values[1] != "") {
                document.getElementById("consigneeaddress" + id + "").value = values[0];
                document.getElementById("activeconsignee" + id + "").value = values[1];
            }
        }
    });
}

function getOwner(value) {
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {
            value: val,
            type: 'owner',
        },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var values = data.split('^');
            document.getElementById('truck1list').value = values[1];
            document.getElementById('ownerPercentage').value = values[0];
            var otherCharges = document.getElementById('ownerothercharges');
            if (otherCharges.value == "") {
                document.getElementById('ownerTotal').value = parseFloat((parseFloat(document.getElementById('rateAmount').value) * parseFloat(values[0])) / 100).toFixed(2);
            } else {
                document.getElementById('ownerTotal').value = parseFloat((parseFloat(document.getElementById('rateAmount').value) * parseFloat(values[0])) / 100) + parseFloat(otherCharges.value).toFixed(2);
            }

            if (values[2] != "") {
                swal({
                    title: 'Are you sure? You Want to Continue!',
                    type: 'warning',
                    type: 'info',
                    html: values[2],
                    showCancelButton: true,
                    confirmButtonText: 'Yes, Continue!',
                    cancelButtonText: 'No, cancel!',
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger ml-2',
                    buttonsStyling: false
                });
            }
        }
    });
}


function getdriverOtherCharges() {
    var oth_chg = document.getElementById('driverothercharges');
    var driver_other_total = 0;
    for (var i = 0; i < document.getElementsByName('driverotherDescription').length; i++) {

        driverotherDescription[i] = document.getElementsByName('driverotherDescription')[i].value;
        driverotherCharges[i] = document.getElementsByName('Driver_other_charges')[i].value;
        driver_other_total += parseFloat(document.getElementsByName('Driver_other_charges')[i].value);


    }
    oth_chg.value = driver_other_total;
    getDriverTotal();
    $('#driverOtherCharges').modal('hide');

}

function addDriverFields() {
    if (driverotherDescription.length > 0) {
        var innerData = "";
        for (var i = 0; i < driverotherDescription.length; i++) {
            innerData += '<tr id="driverotherRow' + i + '"><td width="200"><input name = "driverotherDescription" type="text" value = "' + driverotherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "Driver_other_charges" type="text" value = "' + driverotherCharges[i] + '"class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger" onclick="driverRemoveRow(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('DriverTextBoxContainer1').innerHTML = innerData;
    }

}

function getDriverTotal() {
    var driver_other_charges = document.getElementById('driverothercharges');
    var driver_total = document.getElementById('driverTotal');
    var loadedMiles = document.getElementById('loadedmiles');
    var emptyMiles = document.getElementById('emptymiles');
    var shipLoc = document.getElementsByName('activeshipper');
    var consigLoc = document.getElementsByName('activeconsignee');

    if (driver_other_charges.value != "") {
        driver_total.value = parseFloat(driver_other_charges.value).toFixed(2);
    }
    var driver_tarp = document.getElementById('driverTarp');
    var tarp_select = document.getElementById('driverTarpSelect');
    // alert(tarp_select.value);

    if (tarp_select.value == "Yes") {
        driver_tarp.value = parseFloat(tarp).toFixed(2);
        driver_total.value = parseFloat(parseFloat(driver_other_charges.value) + parseFloat(tarp)).toFixed(2);
    } else if (tarp_select.value == "No") {
        if (driver_tarp.value != "") {
            driver_tarp.value = "";
            driver_total.value = parseFloat(driver_other_charges.value).toFixed(2);
        }
    } else {
        swal({
            title: 'Tarp is not added for selected driver.',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
    }

    if (loadedMiles.value != "") {
        var loadedTotal = parseFloat(parseFloat(loadedMiles.value) * parseFloat(document.getElementById('loadedmile').value));
        //alert("loadedtotal"+loadedTotal);
        driver_total.value = parseFloat(parseFloat(driver_total.value) + parseFloat(loadedTotal)).toFixed(2);
    }
    if (emptyMiles.value != "") {
        var emptyTotal = parseFloat(parseFloat(emptyMiles.value) * parseFloat(document.getElementById('emptymile').value));
        //alert("emptytotal"+emptyTotal);
        driver_total.value = parseFloat(parseFloat(driver_total.value) + parseFloat(emptyTotal)).toFixed(2);
    }

    if (loadedMiles.value != 0) {
        if (shipLoc.length >= 0) {
            if (pickrate > 0) {
                //alert("pickrate "+pickrate+" pickafter "+pickafter);
                driver_total.value = parseFloat(parseFloat(driver_total.value) + parseFloat(pickrate * (shipLoc.length - pickafter))).toFixed(2);
                ;
            }
        }
        if (consigLoc.length >= 0) {
            if (droprate > 0) {
                //alert("droprate "+droprate+" dropafter "+dropafter);
                driver_total.value = parseFloat(parseFloat(driver_total.value) + parseFloat(pickrate * (consigLoc.length - dropafter))).toFixed(2);
                ;
            }
        }

    }

}

function changeDriverTotal() {
    var driverflat = document.getElementById('driverflat');
    var driver_other_charges = document.getElementById('driverothercharges');
    var driver_total = document.getElementById('driverTotal');

    if (driver_other_charges.value != "") {
        driver_total.value = parseFloat(parseFloat(driverflat.value) + parseFloat(driver_other_charges.value)).toFixed(2);
    } else {
        driver_total.value = parseFloat(driverflat.value).toFixed(2);
    }
    if (driverflat.value == "") {
        driver_total.value = 0;
    }

}

function getownerOtherCharges() {
    var oth_chg = document.getElementById('ownerothercharges');
    var owner_other_total = 0;
    for (var i = 0; i < document.getElementsByName('ownerotherDescription').length; i++) {

        ownerotherDescription[i] = document.getElementsByName('ownerotherDescription')[i].value;
        ownerotherCharges[i] = document.getElementsByName('Owner_other_charges')[i].value;
        owner_other_total += parseFloat(document.getElementsByName('Owner_other_charges')[i].value);


    }
    oth_chg.value = owner_other_total;
    getOwnerTotal();
    $('#ownerOtherCharges').modal('hide');

}

function addOwnerFields() {
    if (ownerotherDescription.length > 0) {
        var innerData = "";
        for (var i = 0; i < ownerotherDescription.length; i++) {
            innerData += '<tr id="ownerotherRow' + i + '"><td width="200"><input name = "ownerotherDescription" type="text" value = "' + ownerotherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "Owner_other_charges" type="text" value = "' + ownerotherCharges[i] + '"class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger" onclick="ownerRemoveRow(' + i + ')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('OwnerTextBoxContainer1').innerHTML = innerData;
    }

}

function getOwnerTotal() {
    var owner_other_charges = document.getElementById('ownerothercharges');
    var owner_percentage = document.getElementById('ownerPercentage');
    var owner_total = document.getElementById('ownerTotal');
    if (owner_percentage.value != "") {
        if (owner_other_charges.value != "") {
            var rateamount = parseFloat(document.getElementById('rateAmount').value);
            var peramount = parseFloat((rateamount * parseFloat(owner_percentage.value)) / 100);
            owner_total.value = peramount + parseFloat(owner_other_charges.value);
        }
    } else {
        swal({
            title: 'Are you sure? You Want to Continue!',
            type: 'warning',
            type: 'info',
            html: "<b> Pay Percentage cannot be Empty. </b>",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
    }


}

function addStartLocation() {
    startLocation = document.getElementById('add_start_location').value;
    $('#addstartlocation').modal('hide');
}

function addEndLocation() {
    endLocation = document.getElementById('add_end_location').value;
    $('#endlocationmodal').modal('hide');

}

function addStartfield() {
    document.getElementById('add_start_location').value = startLocation;
}

function addEndfield() {
    document.getElementById('add_end_location').value = endLocation;
}


function calculateMiles() {
    document.getElementById('drivermiles').value = 0;
    document.getElementById('loadedmiles').value = 0;
    document.getElementById('emptymiles').value = 0;
    var shipLoc = document.getElementsByName('activeshipper');
    var shipseq = document.getElementsByName('shipseq');
    var consigLoc = document.getElementsByName('activeconsignee');
    var consigseq = document.getElementsByName('consigseq');
    var locations = [];
    for (var i = 0; i < shipLoc.length; i++) {
        if (shipLoc[i].value == "") {
            swal({
                title: '<h5>One of the shipper\'s location is empty. Please fill it to continue</h5>',
                type: 'warning',
                type: 'info',
                html: "",
                showCancelButton: true,
                confirmButtonText: 'Yes, Continue!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-2',
                buttonsStyling: false
            });
            return;
        }
        locations.push({seq: shipseq[i].value, location: shipLoc[i].value});

    }
    for (var i = 0; i < consigLoc.length; i++) {
        if (consigLoc[i].value == "") {
            swal({
                title: '<h5>One of the consignees\'s location is empty. Please fill it to continue</h5>',
                type: 'warning',
                type: 'info',
                html: "",
                showCancelButton: true,
                confirmButtonText: 'Yes, Continue!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger ml-2',
                buttonsStyling: false
            });
            return;
        }
        locations.push({seq: consigseq[i].value, location: consigLoc[i].value});
    }

    if (locations.length <= 1) {
        swal({
            title: '<h5>There should be atleast one shipper and one consignee</h5>',
            type: 'warning',
            type: 'info',
            html: "",
            showCancelButton: true,
            confirmButtonText: 'Yes, Continue!',
            cancelButtonText: 'No, cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger ml-2',
            buttonsStyling: false
        });
        return;
    }
    locations.sort(compare);
    if (startLocation != "") {
        calcRoute(startLocation, locations[0].location, "empty");
    }
    if (endLocation != "") {
        calcRoute(endLocation, locations[locations.length - 1].location, "empty");
    }
    for (var i = 0; i < locations.length - 1; i++) {
        calcRoute(locations[i].location, locations[i + 1].location, "loaded");
        //  alert(locations[i].location);
        //  console.log(locations[i])+"\n";
    }

    setTimeout(function () {
        document.getElementById('drivermiles').value = parseFloat(parseFloat(document.getElementById('emptymiles').value) + parseFloat(document.getElementById('loadedmiles').value)).toFixed(2);
        //alert("Empty Miles"+document.getElementById('emptymiles').value+"Loaded Miles" + document.getElementById('loadedMiles'));
        if (document.getElementById('driver').checked) {

            getDriverTotal();
        }

    }, 1250);

}


function compare(a, b) {
    // Use toUpperCase() to ignore character casing
    const seqA = a.seq;
    const seqB = b.seq;

    let comparison = 0;
    if (seqA > seqB) {
        comparison = 1;
    } else if (seqA < seqB) {
        comparison = -1;
    }
    return comparison;
}


function calcRoute(start, end, type) {
    var request = {
        origin: start,
        destination: end,
        travelMode: google.maps.TravelMode.DRIVING,
        unitSystem: google.maps.UnitSystem.IMPERIAL
    }


    directionsService.route(request, function (result, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            distance = result.routes[0].legs[0].distance.text;
            duration = result.routes[0].legs[0].duration.text;
            if (type == "empty") {
                //alert(distance+"between"+start+" and "+end);
                distance = distance.replace(",", "");
                document.getElementById('emptymiles').value = parseFloat(document.getElementById('emptymiles').value) + parseFloat(distance);
            } else {
                //alert(distance+"between"+start+" and "+end);
                distance = distance.replace(",", "");
                document.getElementById('loadedmiles').value = parseFloat(document.getElementById('loadedmiles').value) + parseFloat(distance);
            }
        } else {
            directionsDisplay.setDirections({routes: []});
            map.setCenter(myLatLng);
        }
    });


}

//________________________________________________________________
// carrieremail variable
var email2 = '';
var email3 = '';


// get active load email
function getactiveemail() {
    if (document.getElementById('email2').value == "") {
        email2 = " ";
    } else {
        email2 = document.getElementById('email2').value;
    }

    if (document.getElementById('email3').value == "") {
        email3 = " ";
    } else {
        email3 = document.getElementById('email3').value;
    }

    $('#AddEmail').modal('hide');
    return true;
}

// get add fields
function addcarrieremail() {

    if (email1 != '' || email2 != '' || email3 != '') {
        document.getElementById('email1').value = carrieremail;
        document.getElementById('email2').value = email2;
        document.getElementById('email3').value = email3;
    }
}

//________________________________________________________________

//________________________________________________________________
// Email variable
var emailcustomer2 = '';
var emailcustomer3 = '';


// get active load email
function getcustomerload() {
    if (document.getElementById('emailcustomer2').value == "") {
        emailcustomer2 = " ";
    } else {
        emailcustomer2 = document.getElementById('emailcustomer2').value;
    }

    if (document.getElementById('emailcustomer3').value == "") {
        emailcustomer3 = " ";
    } else {
        emailcustomer3 = document.getElementById('emailcustomer3').value;
    }

    $('#Addcustomeremail').modal('hide');
    return true;
}

// get add fields
function addcustomeremail() {

    if (emailcustomer1 != '' || emailcustomer2 != '' || emailcustomer3 != '') {
        document.getElementById('emailcustomer1').value = customeremail;
        document.getElementById('emailcustomer2').value = emailcustomer2;
        document.getElementById('emailcustomer3').value = emailcustomer3;
    }
}

//________________________________________________________________

$(document).on("click", "#addactiveload", function () {
    var companyselect = document.getElementById('selectCompany').value;
    var company_1 = companyselect.split(")");
    var company = company_1[0];
    var customerselect = document.getElementById('customerlist').value;
    var customer_1 = customerselect.split(")");
    var customer = customer_1[0];
    var dispatcherlist = document.getElementById('dispatcherlist').value;
    var dispatcher_1 = dispatcherlist.split(")");
    var dispatcher = dispatcher_1[0];
    var cnno = document.getElementById('cnno').value;
    var status = document.getElementById('status').value;
    var loadtypelist = document.getElementById('loadtypelist').value;
    var loadtype_1 = loadtypelist.split(")");
    var loadtype = loadtype_1[0];
    var rate = document.getElementById('rateAmount').value;
    var noofunits = document.getElementById('no-of-units').value;
    var fsc = document.getElementById('fsc').value;
    var fsccheck = document.getElementById('customCheck1').value;
    var otherchargestotal = document.getElementById('OtherCharges').value;
    var totalamount = document.getElementById('totalAmount').value;
    var equiptypelist = document.getElementById('equipmentlist').value;
    var equiptype_1 = equiptypelist.split(")");
    var equiptype = equiptype_1[0];
    var type = document.getElementsByName("typeofloder");
    if (type[0].checked) {
        var typeofloader = type[0].value;
    } else if (type[1].checked) {
        var typeofloader = type[1].value;
    } else if (type[2].checked) {
        var typeofloader = type[2].value;
    }
    var carriernamelist = document.getElementById('carrierlist').value;
    var carriername_1 = carriernamelist.split(")");
    var carriername = carriername_1[0];
    var carrierflat = document.getElementById('carrierFlat').value;
    var carrierother = document.getElementById('carrierOther').value;
    var carrierTotal = document.getElementById('carrierTotal').value;
    var currencylist = document.getElementById('currencylist').value;
    var currency_1 = currencylist.split(")");
    var currency = currency_1[0];
    var drivername = document.getElementById('driverlist').value;
    var truck = document.getElementById('trucklist').value;
    var trailer = document.getElementById('trailerlist').value;
    var loadedmile = document.getElementById('loadedmile').value;
    var emptymile = document.getElementById('emptymile').value;
    var driverother = document.getElementById('driverothercharges').value;
    var tarp = document.getElementById('driverTarp').value;
    var flat = document.getElementById('driverflat').value;
    var drivertotal = document.getElementById('driverTotal').value;
    var owner = document.getElementById('ownerlist').value;
    var ownerpay = document.getElementById('ownerPercentage').value;
    var ownertruck = document.getElementById('truck1list').value;
    var ownertrailer = document.getElementById('trailer1list').value;
    var ownerother = document.getElementById('ownerothercharges').value;
    var ownertotal = document.getElementById('ownerTotal').value;
    var shippername = [];
    for (var i = 0; i < document.getElementsByName('shipperlist').length; i++) {
        shippername[i] = document.getElementsByName('shipperlist')[i].value;
    }
    var shipperaddress = [];
    for (var i = 0; i < document.getElementsByName('shipperaddress').length; i++) {
        shipperaddress[i] = document.getElementsByName('shipperaddress')[i].value;
    }
    var shipperlocation = [];
    for (var i = 0; i < document.getElementsByName('activeshipper').length; i++) {
        shipperlocation[i] = document.getElementsByName('activeshipper')[i].value;
    }
    var shipperpickup = [];
    for (var i = 0; i < document.getElementsByName('shipperdate').length; i++) {
        shipperpickup[i] = document.getElementsByName('shipperdate')[i].value;
    }
    var shipperpicktime = [];
    for (var i = 0; i < document.getElementsByName('shippertime').length; i++) {
        shipperpicktime[i] = document.getElementsByName('shippertime')[i].value;
    }
    var shipperloadtype = [];
    for (var i = 0; i < document.getElementsByName('tl0').length; i++) {
        shipperloadtype[i] = document.getElementsByName('tl0')[i].value;
    }
    var shippercommodity = [];
    for (var i = 0; i < document.getElementsByName('shippercommodity').length; i++) {
        shippercommodity[i] = document.getElementsByName('shippercommodity')[i].value;
    }
    var shipperqty = [];
    for (var i = 0; i < document.getElementsByName('shipperqty').length; i++) {
        shipperqty[i] = document.getElementsByName('shipperqty')[i].value;
    }
    var shipperweight = [];
    for (var i = 0; i < document.getElementsByName('shipperweight').length; i++) {
        shipperweight[i] = document.getElementsByName('shipperweight')[i].value;
    }
    var shipperpickupnumber = [];
    for (var i = 0; i < document.getElementsByName('shipperpickup').length; i++) {
        shipperpickupnumber[i] = document.getElementsByName('shipperpickup')[i].value;
    }
    var shipperseq = [];
    for (var i = 0; i < document.getElementsByName('shipseq').length; i++) {
        shipperseq[i] = document.getElementsByName('shipseq')[i].value;
    }
    var shippernotes = [];
    for (var i = 0; i < document.getElementsByName('shippernotes').length; i++) {
        shippernotes[i] = document.getElementsByName('shippernotes')[i].value;
    }
    var consigneename = [];
    for (var i = 0; i < document.getElementsByName('consigneelist').length; i++) {
        consigneename[i] = document.getElementsByName('consigneelist')[i].value;
    }
    var consigneeaddress = [];
    for (var i = 0; i < document.getElementsByName('consigneeaddress').length; i++) {
        consigneeaddress[i] = document.getElementsByName('consigneeaddress')[i].value;
    }
    var consigneelocation = [];
    for (var i = 0; i < document.getElementsByName('activeconsignee').length; i++) {
        consigneelocation[i] = document.getElementsByName('activeconsignee')[i].value;
    }
    var consigneepickup = [];
    for (var i = 0; i < document.getElementsByName('consigneepickdate').length; i++) {
        consigneepickup[i] = document.getElementsByName('consigneepickdate')[i].value;
    }
    var consigneepicktime = [];
    for (var i = 0; i < document.getElementsByName('consigneepicktime').length; i++) {
        consigneepicktime[i] = document.getElementsByName('consigneepicktime')[i].value;
    }
    var consigneeloadtype = [];
    for (var i = 0; i < document.getElementsByName('ctl0').length; i++) {
        consigneeloadtype[i] = document.getElementsByName('ctl0')[i].value;
    }
    var consigneecommodity = [];
    for (var i = 0; i < document.getElementsByName('consigneecommodity').length; i++) {
        consigneecommodity[i] = document.getElementsByName('consigneecommodity')[i].value;
    }
    var consigneeqty = [];
    for (var i = 0; i < document.getElementsByName('consigneeqty').length; i++) {
        consigneeqty[i] = document.getElementsByName('consigneeqty')[i].value;
    }
    var consigneeweight = [];
    for (var i = 0; i < document.getElementsByName('consigneeweight').length; i++) {
        consigneeweight[i] = document.getElementsByName('consigneeweight')[i].value;
    }
    var consigneedropnumber = [];
    for (var i = 0; i < document.getElementsByName('consigneedelivery').length; i++) {
        consigneedropnumber[i] = document.getElementsByName('consigneedelivery')[i].value;
    }
    var consigneeseq = [];
    for (var i = 0; i < document.getElementsByName('consigseq').length; i++) {
        consigneeseq[i] = document.getElementsByName('consigseq')[i].value;
    }
    var consigneenotes = [];
    for (var i = 0; i < document.getElementsByName('deliverynotes').length; i++) {
        consigneenotes[i] = document.getElementsByName('deliverynotes')[i].value;
    }
    var tarpselect = document.getElementById('driverTarpSelect').value;
    var loadedMilesValue = document.getElementById('loadedmiles').value;
    var emptymilesvalue = document.getElementById('emptymiles').value;
    var drivermilesvalue = document.getElementById('drivermiles').value;
    var loadnotes = document.getElementById('loadnotes').value;

    var totalfiles = document.getElementById('files').files.length;
    if (totalfiles <= 5) {
        for (var index = 0; index < totalfiles; index++) {
        }
        $.ajax({
            url: 'admin/active_load_driver.php?type=add_new_load',
            method: "POST",
            dataType: 'html',
            data: {
                company: company,
                customer: customer,
                dispatcher: dispatcher,
                cnno: cnno,
                status: status,
                active_type: loadtype,
                rate: rate,
                noofunits: noofunits,
                fsc: fsc,
                fsc_percentage: fsccheck,
                other_charges_total: otherchargestotal,
                other_description: otherDescription,
                other_charges: otherCharges,
                setTotalRate: totalamount,
                equipment_type: equiptype,
                typeofLoader: typeofloader,
                carrier_name: carriername,
                flat_rate: carrierflat,
                advance_charges: carrierother,
                carrier_other_description: carrierotherDescription,
                carrier_other_advance: carrierotherAdvances,
                carrier_other_charges: carrierotherCharges,
                carrier_total: carrierTotal,
                currency: currency,
                driver_name: drivername,
                truck: truck,
                trailer: trailer,
                loaded_mile: loadedmile,
                empty_mile: emptymile,
                driver_other: driverother,
                driver_other_description: driverotherDescription,
                driver_other_charges: driverotherCharges,
                tarp: tarp,
                flat: flat,
                driver_total: drivertotal,
                owner_name: owner,
                owner_percentage: ownerpay,
                owner_truck: ownertruck,
                owner_trailer: ownertrailer,
                owner_other: ownerother,
                owner_other_description: ownerotherDescription,
                owner_other_charges: ownerotherCharges,
                owner_total: ownertotal,
                startlocation: startLocation,
                endlocation: endLocation,
                shipper_name: shippername,
                shipper_address: shipperaddress,
                shipper_location: shipperlocation,
                shipper_pickup: shipperpickup,
                shipper_picktime: shipperpicktime,
                shipper_load_type: shipperloadtype,
                shipper_commodity: shippercommodity,
                shipper_qty: shipperqty,
                shipper_weight: shipperweight,
                shipper_pickup_number: shipperpickupnumber,
                shipper_seq: shipperseq,
                shipper_notes: shippernotes,
                consignee_name: consigneename,
                consignee_address: consigneeaddress,
                consignee_location: consigneelocation,
                consignee_pickup: consigneepickup,
                consignee_picktime: consigneepicktime,
                consignee_load_type: consigneeloadtype,
                consignee_commodity: consigneecommodity,
                consignee_qty: consigneeqty,
                consignee_weight: consigneeweight,
                consignee_delivery_number: consigneedropnumber,
                consignee_seq: consigneeseq,
                consignee_notes: consigneenotes,
                tarp_select: tarpselect,
                loaded_miles_value: loadedMilesValue,
                empty_miles_value: emptymilesvalue,
                driver_miles_value: drivermilesvalue,
                load_notes: loadnotes,
                carrier_email: carrieremail,
                email2: email2,
                email3: email3,
                customer_email: customeremail,
                emailcustomer2: emailcustomer2,
                emailcustomer3: emailcustomer3
            },
            success: function (data) {
                var flags = uploadfiles(data,status);
                if (flags == "no") {
                    document.getElementById('addactiveload').style.display = "block";
                }
                console.log(data);
            }
        })

    } else {
        swal('Please Select Only 5 File')
    }

});

function uploadfiles(id,status) {
    var form_data = new FormData();
    form_data.append("id", id);
    form_data.append("status", status);
    var ins = document.getElementById('files').files.length;
    if (ins > 0) {
        for (var x = 0; x < ins; x++) {
            form_data.append("files[]", document.getElementById('files').files[x]);
        }
        $.ajax({
            url: 'admin/active_load_driver.php?type=fileupload ', // point to server-side PHP script
            dataType: 'text', // what to expect back from the PHP script
            cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
            success: function (response) {
                document.getElementById('addactiveload').style.display = "block";
            },
            error: function (response) {
            }
        });
    } else {
        return 'no';
    }
}

// update active load value status wise
function changeStatus(id, old_array, new_array) {
    var new_array_1 = new_array.split(")"); // split a value status time stamp column and value
    var new_array1 = new_array_1[0];

    alert(old_array);
    alert(new_array1);
    alert(id);
    $.ajax({
        url: 'admin/active_load_driver.php?type=changeStatus ', // point to server-side PHP script
        method: 'POST',
        data: {
            id: id,
            old_array: old_array,
            new_array: new_array1,
        },
        success: function (data) {
            swal(data);
        }
    });
}