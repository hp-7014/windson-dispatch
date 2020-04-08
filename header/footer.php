<!-- Footer -->
<footer class="footer">
    © 2020 Windson Dispatch <span class="d-none d-sm-inline-block"> - Crafted with <i
            class="mdi mdi-heart text-danger"></i> by
        WindsonTech</span>.
</footer>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/waves.min.js"></script>
<script src="master/js/form.js"></script>
<script src="admin/js/form.js"></script>
<script src="ifta/js/form.js"></script>
<script src="master/js/validation.js"></script>
<script src="admin/js/validation.js"></script>
<script src="ifta/js/validation.js"></script>
<script src="account/js/form.js"></script>

<!--Morris Chart-->
<script src="./assets/plugins/morris/morris.min.js"></script>
<script src="assets/plugins/raphael/raphael.min.js"></script>
<script src="assets/plugins/tiny-editable/mindmup-editabletable.js"></script>
<script src="assets/plugins/tiny-editable/numeric-input-example.js"></script>


<!-- Required datatable js -->
<script src="assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="assets/plugins/datatables/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/datatables/jszip.min.js"></script>
<script src="assets/plugins/datatables/pdfmake.min.js"></script>
<script src="assets/plugins/datatables/vfs_fonts.js"></script>
<script src="assets/plugins/datatables/buttons.html5.min.js"></script>
<script src="assets/plugins/datatables/buttons.print.min.js"></script>
<script src="assets/plugins/datatables/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="assets/plugins/datatables/dataTables.responsive.min.js"></script>
<script src="assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

<!-- Datatable init js -->
<script src="assets/pages/datatables.init.js"></script>
<script src="assets/pages/dashboard.init.js"></script>

<!------------------- Function to get location suggestion -------------------->
<script src="assets/js/app.js"></script>
<script src="assets/js/modalTab.js"></script>
<script type="text/javascript">
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
</script>
<script src="assets/plugins/moment/moment.js"></script>
<script src="assets/plugins/x-editable/js/bootstrap-editable.min.js"></script>
<script src="assets/pages/xeditable.js"></script>

<!-- Responsive-table-->
<script src="assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>
<script src="js/link.js"></script>
<script>
function getfiles(files) {
    for (var i = 0; i < files.length; i++) {
        var filesize1 = files[i].size;
        if (filesize1 < 200000) {} else {
            swal("Oops...", "File size is to large! Please Select a file less than 200KB", "error");
            this.value = "";
        }
    }
}
</script>
<!-- Responsive-table-->
<script src="assets/plugins/RWD-Table-Patterns/dist/js/rwd-table.min.js"></script>
<script>
$(function() {
    $('.table-responsive').responsiveTable({
        addDisplayAllBtn: 'btn btn-secondary'
    });
});
</script>
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/sweet-alert.init.js"></script>
</body>