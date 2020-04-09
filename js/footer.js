// google location suggestion
var options = {
    types: ['(cities)']
}

function getLocation(fieldID) {
    var location = new google.maps.places.Autocomplete(document.getElementById(fieldID), options);

}

// if counter != 0 than call  this
function deleteCurrencyError() {
    swal('<h5> Unable to delete as this entry has been used somewhere else !!!</h5>', '', 'warning');
    return false;
}

// random string function for live data
function randomString() {
    var result = '';
    var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < 7; i++) {
        result += characters.charAt(Math.floor(Math.random() * charactersLength));
    }
    return result;
}

// Import Excel only .csv Format
var regex = new RegExp("(.*?)\.(csv)$");

function triggerValidation(el) {
    if (!(regex.test(el.value.toLowerCase()))) {
        el.value = '';
        swal('warning', 'Only CSV files are allowed', 'warning');
    }
}

function next_page(func, curr_page, limit, total_pages) {
    var current_page = document.getElementById(curr_page).value;
    var len = parseInt(current_page) + 1;

    $('#page_active').find('option').removeAttr('selected', 'selected');

    $('#page_active').find('option[value=' + len + ']').attr('selected', 'selected');

    if (current_page == 0 || current_page > 0 || current_page == (total_pages - 1)) {
        document.getElementById("bank_previous").style.display = "block";
    }

    if (current_page == (total_pages - 2) || current_page > (total_pages - 2)) {
        document.getElementById("bank_next").style.display = "none";
    }

    if (current_page > (total_pages - 1)) {
        document.getElementById("bank_next").style.display = "block";
    }

    var next_page = ((parseInt(current_page) + 1) * limit);
    //alert(current_page);
    if (func == "paginate_bank_admin") {
        paginate_bank_admin(next_page, limit, total_pages);
    }

    if (func == "paginate_shipper") {
        paginate_shipper(next_page, limit, total_pages);
    }

    if (func == "paginate_driver") {
        paginate_driver(next_page, limit, total_pages);
    }

    if (func == "paginate_consignee") {
        paginate_consignee(next_page, limit, total_pages);
    }

    if (func == "paginate_credit_card") {
        paginate_credit_card(next_page, limit, total_pages);
    }

    if (func == "paginate_subc_card") {
        paginate_subc_card(next_page, limit, total_pages);
    }

    if (func == "paginate_custom_broker") {
        paginate_custom_broker(next_page, limit, total_pages);
    }

    if (func == "paginate_user") {
        paginate_user(next_page, limit, total_pages);
    }

    if (func == "paginate_customer") {
        paginate_customer(next_page, limit, total_pages);
    }

    if (func == "paginate_trucks") {
        paginate_trucks(next_page, limit, total_pages);
    }

    if (func == "paginate_trailer") {
        paginate_trailer(next_page, limit, total_pages);
    }

    if (func == "paginate_carrier") {
        paginate_carrier(next_page, limit, total_pages);
    }

    if (func == "paginate_factoring") {
        paginate_factoring(next_page, limit, total_pages);
    }
}

function previous_page(func, curr_page, limit, total_pages) {
    var current_page = document.getElementById(curr_page).value;

    var len1 = parseInt(current_page) - 1;

    $('#page_active').find('option').removeAttr('selected', 'selected');
    $('#page_active').find('option[value=' + len1 + ']').attr('selected', 'selected');
    // if(current_page == 1){
    //     document.getElementById("bank_previous").style.display = "none";
    // }

    // if(current_page == (total_pages - 1)){
    //     document.getElementById("bank_next").style.display = "block";
    // }

    if (current_page == (total_pages - 1) || current_page < (total_pages - 1)) {
        document.getElementById("bank_next").style.display = "block";
    }

    var next_page = ((current_page - 1) * limit);

    //alert("Value of Current page = "+current_page+" next page = "+next_page+" total pages = "+total_pages);
    if (func == "paginate_bank_admin") {
        paginate_bank_admin(next_page, limit, total_pages);
    }

    if (func == "paginate_shipper") {
        paginate_shipper(next_page, limit, total_pages);
    }

    if (func == "paginate_driver") {
        paginate_driver(next_page, limit, total_pages);
    }

    if (func == "paginate_consignee") {
        paginate_consignee(next_page, limit, total_pages);
    }

    if (func == "paginate_credit_card") {
        paginate_credit_card(next_page, limit, total_pages);
    }

    if (func == "paginate_subc_card") {
        paginate_subc_card(next_page, limit, total_pages);
    }

    if (func == "paginate_custom_broker") {
        paginate_custom_broker(next_page, limit, total_pages);
    }

    if (func == "paginate_user") {
        paginate_user(next_page, limit, total_pages);
    }

    if (func == "paginate_customer") {
        paginate_customer(next_page, limit, total_pages);
    }

    if (func == "paginate_trucks") {
        paginate_trucks(next_page, limit, total_pages);
    }

    if (func == "paginate_trailer") {
        paginate_trailer(next_page, limit, total_pages);
    }

    if (func == "paginate_carrier") {
        paginate_carrier(next_page, limit, total_pages);
    }

    if (func == "paginate_factoring") {
        paginate_factoring(next_page, limit, total_pages);
    }
}

function getfiles(files) {
    for (var i = 0; i < files.length; i++) {
        var filesize1 = files[i].size;
        if (filesize1 < 200000) {} else {
            swal("Oops...", "File size is to large! Please Select a file less than 200KB", "error");
            this.value = "";
        }
    }
}