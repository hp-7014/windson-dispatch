var room = 0;
var count = 0;
var otherDescription = [];
var otherCharges = [];
var carrierotherDescription = [];
var carrierotherCharges = [];
var carrierotherAdvances = [];
var driverotherDescription = [];
var driverotherCharges = [];
var ownerotherDescription = [];
var ownerotherCharges = [];

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
        '                                                 <input list="shipper' + room + '" class="form-control" placeholder="--Select--" id="shipperlist' + room + '" name="shipperlist">\n' +
        '                                                 <datalist id="shipper' + room + '">\n' +
        '                                                 </datalist>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Address*</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Address *" type="text"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Location *</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Enter a location"\n' +
        '                                                           type="text" onkeydown="getLocation(this.id)" id="activeshipper' + room + '">\n' +
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
        '                                                               id="tl'+room+'" name="tl'+room+'"\n' +
        '                                                               checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="tl'+room+'">TL</label>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="ltl'+room+'" name="tl'+room+'">\n' +
        '                                                        <label class="custom-control-label" for="ltl'+room+'">LTL</label>\n' +
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
        '                                            <div class="form-group col-md-5">\n' +
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
        '                                                <input list="consigneee' + count + '" class="form-control" placeholder="--Select--" id="consigneelist' + count + '" name="consigneelist">\n' +
        '                                                 <datalist id="consigneee' + count + '">\n' +
        '                                                 </datalist>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Address*</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Address *" type="text"\n' +
        '                                                           >\n' +
        '                                                </div>\n' +
        '                                            </div>\n' +
        '                                            <div class="form-group col-md-2">\n' +
        '                                                <label>Location *</label>\n' +
        '                                                <div>\n' +
        '                                                    <input class="form-control" placeholder="Enter a location"\n' +
        '                                                           type="text" onkeydown="getLocation(this.id)" id="activeconsignee' + count + '">\n' +
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
        '                                                               id="ctl'+count+'" name="ctl'+count+'"\n' +
        '                                                               checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="ctl'+count+'">TL</label>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="cltl'+count+'" name="ctl'+count+'">\n' +
        '                                                        <label class="custom-control-label" for="cltl'+count+'">LTL</label>\n' +
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
        '                                            <div class="form-group col-md-5">\n' +
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
        url: 'admin/getShipper.php',
        type: 'POST',
        success: function (data) {
            document.getElementById(shipID).innerHTML += data;
        }
    });
}

function getConsig(consigID) {
    $.ajax({
        url: 'admin/getConsignee.php',
        type: 'POST',
        success: function (data) {
            document.getElementById(consigID).innerHTML += data;
        }
    });
}

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
            setTimeout(function(){  addOwnerFields(); }, 300);
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
            setTimeout(function(){  addDriverFields(); }, 300);
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
            setTimeout(function(){  addcarrierFields(); }, 300);
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
            setTimeout(function(){  addFields(); }, 300);
           
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
            setTimeout(function(){  addcarrierFields(); }, 300);
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
            setTimeout(function(){  addFields(); }, 300);
           
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



function enableUnits(value){
    var values = value.split(')');
    var val = values[0];
   
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'enableUnit',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            if(data == 'Yes'){
                document.getElementById('no-of-units').disabled = false;
            }
            if(data == "No"){
                document.getElementById('no-of-units').disabled = true;
            }
        }
    });
}
function getCarrier(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'carrier',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            if(data != ""){
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
function getTotal(){
    var rateAmount = document.getElementById('rateAmount').value;
    var noOfUnits = document.getElementById('no-of-units').value;
    var fsc = document.getElementById('fsc').value;
    var totalAmount = document.getElementById('totalAmount');
    var ratePercentage = document.getElementById('customCheck1');
    var otherCharges = document.getElementById('OtherCharges').value;
    if(rateAmount != "" && noOfUnits == "" && fsc == "" && otherCharges == ""){
        totalAmount.value = parseFloat(rateAmount).toFixed(2);
    }

    if(noOfUnits != "" && fsc == ""){
        if(rateAmount != ""){
            totalAmount.value = parseFloat(rateAmount * noOfUnits).toFixed(2);
        }
        else{
            swal({
                title: 'Warning!',
                text: "Rate cannot be empty",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-danger ml-2',
            });
           
        }
    }
     if(fsc != "" && otherCharges == ""){
        if(ratePercentage.checked == true){
            if(rateAmount != ""){
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc)/100 : parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc)/100));
                    totalAmount.value = total.toFixed(2);
            }
            else{
                swal({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
        else{
                if(rateAmount != ""){ 
                    if(typeof(rateAmount) == 'number'){
                        var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseInt(rateAmount * noOfUnits) + parseInt(fsc);
                        totalAmount.value = total.toFixed(2);;
                    }
                    else{
                        var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(fsc) : parseFloat(rateAmount * noOfUnits) + parseFloat(fsc);
                        totalAmount.value = total.toFixed(2);;
                    }
                }
                else{
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

    if(otherCharges != ""){
        if(ratePercentage.checked == true){
            if(rateAmount != ""){
                    var total = noOfUnits == "" ? parseFloat(rateAmount) + parseFloat(rateAmount * fsc)/100 + parseFloat(otherCharges): parseFloat(parseFloat(rateAmount * noOfUnits) + (parseFloat(rateAmount * noOfUnits * fsc)/100) + parseFloat(otherCharges));
                    totalAmount.value = total.toFixed(2);
            }
            else{
                swal({
                    title: 'Warning!',
                    text: "Rate cannot be empty",
                    type: 'warning',
                    showCancelButton: true,
                    cancelButtonClass: 'btn btn-danger ml-2',
                });
            }
        }
        else{
                if(rateAmount != ""){ 
                        var total = noOfUnits == "" ? parseFloat(rateAmount) + getFSC(fsc) + parseFloat(otherCharges) : parseInt(rateAmount * noOfUnits) +getFSC(fsc) +parseFloat(otherCharges);
                        totalAmount.value = total.toFixed(2);
                   
                }
                else{
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
function getFSC(fsc){
    if(fsc == ""){
        return 0;
    }
    else{
        return parseFloat(fsc);
    }
}

function getOtherCharges(){
    var oth_chg = document.getElementById('OtherCharges');
    var other_total = 0;
    for(var i = 0; i < document.getElementsByName('otherDescription').length; i++){
        otherDescription[i] = document.getElementsByName('otherDescription')[i].value;
        otherCharges[i] = document.getElementsByName('other_charges')[i].value;
        other_total += parseInt(document.getElementsByName('other_charges')[i].value);
        
    }
    oth_chg.value = other_total;
    $('#otherCharges').modal('hide');
    getTotal();
}

function addFields(){
    if(otherDescription.length > 0){
        var innerData = "";
        for(var i = 0 ; i < otherDescription.length; i++){
            innerData += '<tr id="otherRow'+i+'"><td width="200"><input name = "otherDescription" type="text" value = "' + otherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "other_charges" type="text" value = "' + otherCharges[i] + '"class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger" onclick="removeRow('+i+')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('TextBoxContainer1').innerHTML = innerData;
    }
    
}

function getcarrierOtherCharges(){
    var oth_chg = document.getElementById('carrierOther');
    var carrier_other_total = 0;
    for(var i = 0; i < document.getElementsByName('carrierotherDescription').length; i++){
        
        carrierotherDescription[i] = document.getElementsByName('carrierotherDescription')[i].value;
        carrierotherCharges[i] = document.getElementsByName('Carrier_other_charges')[i].value;
        carrierotherAdvances[i] = document.getElementsByName('Carrier_other_advances')[i].value;
        carrier_other_total += parseFloat(parseFloat(document.getElementsByName('Carrier_other_charges')[i].value) + parseFloat(document.getElementsByName('Carrier_other_advances')[i].value));
        
        
        
    }
    oth_chg.value = carrier_other_total;
    getCarrierTotal();
    $('#carrierOtherCharges').modal('hide');
    
}

function addcarrierFields(){
    if(carrierotherDescription.length > 0){
        var innerData = "";
        for(var i = 0 ; i < carrierotherDescription.length; i++){
            innerData += '<tr id="carrierotherRow'+i+'"><td width="200"><input name = "carrierotherDescription" type="text" value = "' + carrierotherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "Carrier_other_charges" type="text" value = "' + carrierotherCharges[i] + '"class="form-control" /></td>' +'<td width="150"><input name="Carrier_other_advances" type="text" value="' + carrierotherAdvances[i] + '" class="form-control"/></td>'+ '<td><button type="button" class="btn btn-danger" onclick="carrierRemoveRow('+i+')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('CarrierTextBoxContainer1').innerHTML = innerData;
    }
    
}

function getCarrierTotal(){
    var flatrate = document.getElementById('carrierFlat').value;
    var advancecharges = document.getElementById('carrierOther').value;
    var total_charges = document.getElementById('carrierTotal');
    if(flatrate != "" && advancecharges == ""){
        total_charges.value = parseFloat(flatrate).toFixed(2);
    }
    if(advancecharges != ""){
        if(flatrate == ""){
            swal({
                title: 'Warning!',
                text: "Flatrate cannot be empty",
                type: 'warning',
                showCancelButton: true,
                cancelButtonClass: 'btn btn-danger ml-2',
            });
        }
        else{
            total_charges.value = parseFloat(parseFloat(flatrate) + parseFloat(advancecharges)).toFixed(2); 
        }
    }
    

}


function getDriver(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'driver',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var response = data.split('^');
            document.getElementById('loadedmile').value = response[1];
            document.getElementById('emptymile').value = response[2];
            if(response[0] != ""){
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

function getTruck(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'truck',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
           
            if(data != ""){
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

function getTrailer(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'trailer',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            if(data != ""){
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
function getShipper(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'shipper',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var values = data.split("^");
            if(values[0] != "" && values[1] != ""){
                document.getElementById("shipperaddress").value = values[0];
                document.getElementById("activeshipper").value = values[1];
            }
        }
    });
}
//active Consignee
function getConsignee(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'consignee',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var values = data.split("^");
            if(values[0] != "" && values[1] != ""){
                document.getElementById("consigneeaddress").value = values[0];
                document.getElementById("activeconsignee").value = values[1];
            }
        }
    });
}

function getOwner(value){
    var values = value.split(')');
    var val = values[0];
    $.ajax({
        url: 'admin/utils/helpers.php',
        data: {value: val,
               type: 'owner',
            },
        method: "POST",
        dataType: 'html',
        success: function (data) {
            var values = data.split('^');
            document.getElementById('truck1list').value = values[1];
            document.getElementById('ownerPercentage').value = values[0];
            var otherCharges = document.getElementById('ownerothercharges');
            if(otherCharges.value == ""){
                document.getElementById('ownerTotal').value = parseFloat((parseFloat(document.getElementById('rateAmount').value) * parseFloat(values[0]))/100).toFixed(2);
            }
            else{
                document.getElementById('ownerTotal').value = parseFloat((parseFloat(document.getElementById('rateAmount').value) * parseFloat(values[0]))/100) + parseFloat(otherCharges.value).toFixed(2); 
            }

            if(values[2] != ""){
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







function getdriverOtherCharges(){
    var oth_chg = document.getElementById('driverothercharges');
    var driver_other_total = 0;
    for(var i = 0; i < document.getElementsByName('driverotherDescription').length; i++){
        
        driverotherDescription[i] = document.getElementsByName('driverotherDescription')[i].value;
        driverotherCharges[i] = document.getElementsByName('Driver_other_charges')[i].value;
        driver_other_total += parseFloat(document.getElementsByName('Driver_other_charges')[i].value);
        
        
        
    }
    oth_chg.value = driver_other_total;
    getDriverTotal();
    $('#driverOtherCharges').modal('hide');
    
}

function addDriverFields(){
    if(driverotherDescription.length > 0){
        var innerData = "";
        for(var i = 0 ; i < driverotherDescription.length; i++){
            innerData += '<tr id="driverotherRow'+i+'"><td width="200"><input name = "driverotherDescription" type="text" value = "' + driverotherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "Driver_other_charges" type="text" value = "' + driverotherCharges[i] + '"class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger" onclick="driverRemoveRow('+i+')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('DriverTextBoxContainer1').innerHTML = innerData;
    }
    
}

function getDriverTotal(){
    var driver_other_charges = document.getElementById('driverothercharges');
    var driver_total = document.getElementById('driverTotal');
    if(driver_other_charges.value != ""){
        
        driver_total.value = parseFloat(driver_other_charges.value).toFixed(2);
    }
    
}

function changeDriverTotal(){
    var driverflat= document.getElementById('driverflat');
    var driver_other_charges = document.getElementById('driverothercharges');
    var driver_total = document.getElementById('driverTotal'); 
    
    if(driver_other_charges.value != ""){
        driver_total.value = parseFloat(parseFloat(driverflat.value) + parseFloat(driver_other_charges.value)).toFixed(2);
    }
    else{
        driver_total.value = parseFloat(driverflat.value).toFixed(2);
    }
    if(driverflat.value == ""){
        driver_total.value = 0;
    }

}
function getownerOtherCharges(){
    var oth_chg = document.getElementById('ownerothercharges');
    var owner_other_total = 0;
    for(var i = 0; i < document.getElementsByName('ownerotherDescription').length; i++){
        
        ownerotherDescription[i] = document.getElementsByName('ownerotherDescription')[i].value;
        ownerotherCharges[i] = document.getElementsByName('Owner_other_charges')[i].value;
        owner_other_total += parseFloat(document.getElementsByName('Owner_other_charges')[i].value);
        
        
        
    }
    oth_chg.value = owner_other_total;
    getOwnerTotal();
    $('#ownerOtherCharges').modal('hide');
    
}

function addOwnerFields(){
    if(ownerotherDescription.length > 0){
        var innerData = "";
        for(var i = 0 ; i < ownerotherDescription.length; i++){
            innerData += '<tr id="ownerotherRow'+i+'"><td width="200"><input name = "ownerotherDescription" type="text" value = "' + ownerotherDescription[i] + '" class="form-control" /></td>' + '<td width="150"><input name = "Owner_other_charges" type="text" value = "' + ownerotherCharges[i] + '"class="form-control" /></td>' + '<td><button type="button" class="btn btn-danger" onclick="ownerRemoveRow('+i+')"><span aria-hidden="true">&times;</span></button></td></tr>';
        }
        document.getElementById('OwnerTextBoxContainer1').innerHTML = innerData;
    }
    
}

function getOwnerTotal(){
    var owner_other_charges = document.getElementById('ownerothercharges');
    var owner_percentage  = document.getElementById('ownerPercentage');
    var owner_total = document.getElementById('ownerTotal');
    if(owner_percentage.value != ""){
            if(owner_other_charges.value != ""){
                var rateamount = parseFloat(document.getElementById('rateAmount').value);
                var peramount = parseFloat((rateamount * parseFloat(owner_percentage.value)) /100);
                owner_total.value = peramount + parseFloat(owner_other_charges.value);
        }
    }else{
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


