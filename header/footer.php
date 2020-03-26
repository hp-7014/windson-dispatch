<!-- Footer -->
<footer class="footer">
    © 2019 Stexo <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesdesign</span>.
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
            if (filesize1 < 200000) {
            } else {
                swal("Oops...", "File size is to large! Please Select a file less than 200KB", "error");
                this.value = "";
            }
        }
    }
</script>
<!-- Sweet-Alert  -->
<script src="assets/plugins/sweet-alert2/sweetalert2.min.js"></script>
<script src="assets/pages/sweet-alert.init.js"></script>
</body>