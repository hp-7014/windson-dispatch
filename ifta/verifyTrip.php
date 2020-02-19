<?php session_start();
require "../database/connection.php"; ?>
<style>
    .leftside {
        height: 100vh;
        width: 100%;
    }

    .rightside {
        height: 100vh;
        width: 100%;
    }

    .row_address {
        display: flex;
        margin-bottom: 10px;
    }

    input, button {
        font-family: Arial;
        font-size: 12px;
        border: 1px solid #4285f4;
        padding: 8px;
        outline: none;
    }

    input {
        background: #fff;
        width: 50vw;
    }

    button {
        background: #4285f4;
        border-radius: 0;
        color: #fff;
        cursor: pointer;
    }

    #map {
        height: 73%;
        width: 100%;
    }

    html, body {
        height: 100%;
    }
</style>
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

    <!-- Modal content for the above example -->
    <div class="modal fade bs-example-modal-xlg" tabindex="-1" role="dialog" id="verified"
         aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xxl modal-dialog-scrollable">
            <div class="modal-content custom-modal-content">
                <div class="modal-header custom-modal-header">
                    <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">
                        Verified</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body custom-modal-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="leftside">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>Location</th>
                                    </tr>
                                    </thead>
                                    <tbody id="editverifyLoad">

                                    </tbody>
                                </table>
                                <!--<button id="new" class="btn btn-primary">Add Location</button>-->
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="rightside">
                                <div id="map">
                                </div>
                            </div>
                            <button type='button' onclick='get_addresses()' class='btn btn-success btn-sm'> Calculate Mileage</button>
                            <div id="summary_panel" class="panel panel-default">
                                <div class="panel-heading">
                                    Summary
                                </div>
                                <div class="panel-body">
                                    <div id="distance">
                                        <table>
                                            <tr>
                                                <td style="width: 75px;">
                                                    From:
                                                </td>
                                                <td class="from_cell">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    To:
                                                </td>
                                                <td class="to_cell">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Duration:
                                                </td>
                                                <td class="t_cell">
                                                </td>
                                            </tr>
                                        </table>
                                        <div id="by_state">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    <script>
        /*function addAddress() {

            $("#new").on("click", function () {

                var inc = $(".row_address").length + 1,
                    $newAddressRow = `<div id="${inc}" class="row_address">
						<input class="form-control col-md-8" type="text" name="address" placeholder="Add Location">
  	                    <button class="remove btn btn-danger">X</button>
                    </div>`;

                $($newAddressRow).insertBefore($(this));

                var $newAddressInput = $("input[name='address']:last");
                $newAddressInput.focus();

                applySearchAddress($newAddressInput);

            });

        };*/

        /*function delAddress() {
            $(document).on("click", ".remove", function () {
                $(this).closest(".row_address").remove();
                // https://developers.google.com/maps/documentation/javascript/places-autocomplete#style_autocomplete
                // remove predictions
                $("#predictions_" + $(this).closest("div").attr("id")).remove();
            });
        };*/

        /*function applySearchAddress($input) {

            if (google.maps.places.PlacesServiceStatus.OK != "OK") {
                console.warn(google.maps.places.PlacesServiceStatus)
                return false;
            }

            // https://developers.google.com/maps/documentation/javascript/geocoding#ComponentFiltering
            // country: matches a country name or a two letter ISO 3166-1 country code. Note: The API follows the ISO standard for defining countries, and the filtering works best when using the corresponding ISO code of the country.
            var options = {
                // componentRestrictions: {
                //   country: "en",
                //     types: [
                //       "address"
                //     ]
                // }
            };

            var autocomplete = new google.maps.places.Autocomplete($input.get(0), options);

            autocomplete.addListener('place_changed', function () {

                var place = autocomplete.getPlace();

                if (place.length == 0) {
                    return;
                }

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }
                $input.val(address);

            });

            // set attr id to the predictions list
            setTimeout(function () {
                var rowId = $input.closest("div").attr("id");
                $(".pac-container:last").attr("id", "predictions_" + rowId);
            }, 100);

        };*/

        $(document).ready(function () {

           // addAddress();
            //delAddress();
        });

        function verifyLoad() {
            var year = document.getElementById('year').value;
            var quarter = document.getElementById('quarter').value;

            $.ajax({
                url: 'ifta/iftaVerifying.php?type=' + 'verifyLoad',
                method: 'POST',
                data: {
                    year: year,
                    quarter: quarter
                },
                type: 'html',
                success: function (data) {
                    $('#verifyLoad').html(data);
                }
            });
        }

        // edit ifta
        $(document).on('click', '.editifta', function () {
            var p_id = $(this).attr("id");

            $.ajax({
                url: 'ifta/editiftaVerifying.php?type=' + 'editverifyLoad',
                method: 'POST',
                data: {
                    p_id: p_id
                },
                type: 'html',
                success: function (data) {
                    $('#editverifyLoad').html(data);
                }
            });
        });

    </script>

