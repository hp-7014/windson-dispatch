<?php session_start();
require "../database/connection.php"; ?>
<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="verifyTrip"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0">Verify Trip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <div class="row">
                    <div class="form-group col-md-2">
                        <label>Year</label>
                        <select class="form-control" id="year" style="width: 175px;">
                            <option>-- select Year --</option>
                            <?php $year = 2015;
                            for ($i = 0; $i <= 15; $i++) { ?>
                                <option value="<?php echo $year; ?>"><?php echo $year++; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-3">
                        <label>quarter</label>
                        <select class="form-control" id="quarter" style="width: 175px;">
                            <?php $quarter = 1;
                            for ($i = 1; $i <= 4; $i++) { ?>
                                <option value="<?php echo $quarter; ?>"><?php echo $quarter++; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-md-1">
                        <button onclick="verifyLoad()" class="float-right btn btn-primary"
                                style="margin-right: 85px;margin-top: 27px;">Submit
                        </button>
                    </div>
                </div>
                <br>
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Invoice No</th>
                        <th>Start Location</th>
                        <th>Shipper Location</th>
                        <th>Consignee Location</th>
                        <th>End Location</th>
                        <th>Ship Date</th>
                        <th>Empty Miles</th>
                        <th>Total Miles</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody id="verifyLoad">
                    </tbody>
                </table>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        function verifyLoad() {
            var year = document.getElementById('year').value;
            var quarter = document.getElementById('quarter').value;

            $.ajax({
                url: 'ifta/iftaVerifying.php?type=' + 'verifyLoad',
                method: 'POST',
                data: {
                    year:year,
                    quarter:quarter
                },
                type: 'html',
                success: function (data) {
                    $('#verifyLoad').html(data);
                }
            });
        }
    </script>
