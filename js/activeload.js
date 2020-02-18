var room = 0;
var count = 0;
function add_fields() {
    room++;

    var mainID = "'home-title"+room+"'";
    var contentID = "'home"+room+"'";
    var objTo = document.getElementById('myTab');
    var divtest = '<li class="nav-item list-item" id = "home-title'+room+'"><a class = "nav-link shipper list-anchors" id = "home-tab'+room+'" data-toggle="tab" href="#home'+room+'" role="tab" aria-controls="home" aria-selected="false">Shipper</a><i class="mdi mdi-window-close ico" onclick="removeTab('+mainID+','+contentID+')" aria-hidden="true"></i></li>'
    objTo.innerHTML += divtest;
    document.getElementById('sc-card').classList.add("shadow");
    //var contentTo = document.getElementById("myTabContent");
    var contentTo = $("#myTabContent");
    var contenttest = '<div class="tab-pane fade" id="home'+room+'" role="tabpanel" aria-labelledby="home-tab'+room+'"><div class="row m-2">\n' +
        '                                            <div class="form-group col-md-3">\n' +
        '                                                <label>Name*</label>\n' +
        '                                                 <input list="shipper'+room+'" class="form-control" placeholder="--Select--" id="shipperlist'+room+'" name="shipperlist">\n'+
        '                                                 <datalist id="shipper'+room+'">\n'+
        '                                                 </datalist>\n'+
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
        '                                                           type="text" onkeydown="getLocation(this.id)" id="activeshipper'+room+'">\n' +
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
        '                                                               id="defaultInline22" name="inlineDefaultRadiosExample"\n' +
        '                                                               checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="defaultInline22">TL</label>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="defaultInline23" name="inlineDefaultRadiosExample">\n' +
        '                                                        <label class="custom-control-label" for="defaultInline23">LTL</label>\n' +
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
    getShip("shipper"+room);
    renameShipper();
    makeActive();

}
function makeActive(){

    for(var i = 0; i < room; i++){
        var component = document.getElementById('home-tab'+i);
        var component1 = document.getElementById('home'+i);
        if(component && component1){
            component.classList.remove("active");
            component1.classList.remove("show");
            component1.classList.remove("active");
            component.setAttribute("aria-selected",false);
        }
    }
    var newcomponent = document.getElementById('home-tab'+i);
    var newcomponent1 = document.getElementById('home'+i);
    newcomponent.classList.add("active");
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    newcomponent.setAttribute("aria-selected",true);
}

function renameShipper(){
    var shippers = document.getElementsByClassName('shipper');
    for(var i = 0; i < document.getElementById('myTab').getElementsByTagName("li").length; i++){

        shippers[i].innerHTML = "Shipper "+(i+1);
    }
}

function removeTab(mainid,contentid){

    var element1 = document.getElementById(mainid);
    var element2 = document.getElementById(contentid);
    if(mainid == 'home-title'){
        alert("First Shipper can't be removed");
        return;
    }
    if(document.getElementById('myTab').getElementsByTagName("li").length > 1){
        document.getElementById('myTab').removeChild(element1);
        document.getElementById('myTabContent').removeChild(element2);
        renameShipper();
    }
    else{
        alert("All shippers cannot be removed.");
    }
}


function add_consignee() {
    count++;
    var mainID = "'consig-title"+count+"'";
    var contentID = "'consig"+count+"'";
    var objTo = document.getElementById('consignee');
    var divtest = '<li class="nav-item list-item"  id="consig-title'+count+'"><a class="nav-link active consignee list-anchors-consig" id="consig-tab'+count+'" data-toggle="tab" href="#consig'+count+'" role="tab" aria-controls="home" aria-selected="true">Consignee</a><i class="mdi mdi-window-close ico" onclick="removeConsignee('+mainID+','+contentID+')" aria-hidden="true"></i> </li>'
    objTo.innerHTML += divtest;

    //var contentTo = document.getElementById("consigneeContent");
    var contentTo = $("#consigneeContent");
    var contenttest = '<div class="tab-pane fade" id="consig'+count+'" role="tabpanel" aria-labelledby="consig-tab'+count+'"><div class="row m-2">\n' +
        '                                            <div class="form-group col-md-3">\n' +
        '                                                <label>Name*</label>\n' +
        '                                                <input list="consigneee'+count+'" class="form-control" placeholder="--Select--" id="consigneelist'+count+'" name="consigneelist">\n'+
        '                                                 <datalist id="consigneee'+count+'">\n'+
        '                                                 </datalist>\n'+
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
        '                                                           type="text" onkeydown="getLocation(this.id)" id="activeconsignee'+count+'">\n' +
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
        '                                                               id="defaultInline22" name="inlineDefaultRadiosExample"\n' +
        '                                                               checked>\n' +
        '                                                        <label class="custom-control-label"\n' +
        '                                                               for="defaultInline22">TL</label>\n' +
        '                                                    </div>\n' +
        '                                                    <div class="custom-control custom-radio custom-control-inline">\n' +
        '                                                        <input type="radio" class="custom-control-input"\n' +
        '                                                               id="defaultInline23" name="inlineDefaultRadiosExample">\n' +
        '                                                        <label class="custom-control-label" for="defaultInline23">LTL</label>\n' +
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
    getConsig("consigneee"+count);
    makeConsigneeActive();

}

function renameConsignee(){
    var consignee = document.getElementsByClassName('consignee');
    for(var i = 0; i < document.getElementById('consignee').getElementsByTagName("li").length; i++){

        consignee[i].innerHTML = "Consignee "+(i+1);
    }
}

function makeConsigneeActive(){

    for(var i = 0; i < count; i++){
        var component = document.getElementById('consig-tab'+i);
        var component1 = document.getElementById('consig'+i);
        if(component && component1){
            component.classList.remove("active");
            component1.classList.remove("show");
            component1.classList.remove("active");
            component.setAttribute("aria-selected",false);
        }
    }
    var newcomponent = document.getElementById('consig-tab'+i);
    var newcomponent1 = document.getElementById('consig'+i);
    newcomponent.classList.add("active");
    newcomponent1.classList.add("show");
    newcomponent1.classList.add("active");
    newcomponent.setAttribute("aria-selected",true);
}

function removeConsignee(consigid,consigcontent){
    var element1 = document.getElementById(consigid);
    var element2 = document.getElementById(consigcontent);
    if(consigid == 'consig-title'){
        alert("First Consignee can't be removed");
        return;
    }
    if(document.getElementById('consignee').getElementsByTagName("li").length > 1){
        document.getElementById('consignee').removeChild(element1);
        document.getElementById('consigneeContent').removeChild(element2);
        renameConsignee();
    }
    else{
        alert("All consignee cannot be removed.");
    }

}


function Showcarrier() {
    $(".carrier").css("display","block");
    $(".driver").css("display","none");
    $(".owner").css("display","none");
}

function Showdriver() {
    $(".carrier").css("display","none");
    $(".driver").css("display","block");
    $(".owner").css("display","none");
}

function Showowner() {
    $(".carrier").css("display","none");
    $(".driver").css("display","none");
    $(".owner").css("display","block");
}

function getShip(shipID){
    $.ajax({
        url: 'admin/getShipper.php',
        type: 'POST',
        success: function (data) {
            document.getElementById(shipID).innerHTML += data;
        }
    });
}

function getConsig(consigID){
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
            $('.activeload-container').load('admin/other_charges_modal.php', function (result) {
                $('#otherCharges').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_Driver_Other", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/other_charges_modal.php', function (result) {
                $('#otherCharges').modal({show: true});
            });
        }
    });
});
$(document).on("click", "#add_carrier_other", function () {

    $.ajax({
        type: 'POST',
        success: function (data) {
            $('.activeload-container').load('admin/other_charges_modal.php', function (result) {
                $('#otherCharges').modal({show: true});
            });
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
        }
    });
});