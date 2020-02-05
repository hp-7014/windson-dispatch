<?php session_start();
require "../database/connection.php";
?>
<!-- Modal content for the above example -->
<style>
    .leftside, .rightside{
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
</style>
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
                    <div class="col">
                        <div class="leftside">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $show = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
                                foreach ($show as $row){
                                    $show1 = $row['truck'];
                                    foreach ($show1 as $row1) {
                                        $show12 = $row1['trucDoc'];
                                        foreach ($show12 as $row2) {
                                            $loc = $row2['location'];
                                            ?>
                                <tr>
                                    <th><input class="form-control row-md-6" type="text" id="origin" name="origin" value="<?php echo $loc; ?>" placeholder="Add Location">
                                </tr>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                                <button id="new" class="btn btn-primary">Add Location</button></th>
                                </tbody>
                            </table>
                        </div>
                        </div>
                    <div class="col">
                        <div class="rightside">
                            <iframe width="650" height="450" frameborder="1" style="border:1"
                                    src="https://www.google.com/maps/embed/v1/place?q=...&key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0" allowfullscreen align="right"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
    function addAddress() {

        $("#new").on("click", function() {

            var inc = $(".row_address").length + 1,
                $newAddressRow = `
					<div id="${inc}" class="row_address">
						<input class="form-control col-md-6" type="text" name="address" placeholder="Add Location">
  	        <button class="remove btn btn-danger">X</button>
          </div>
				`;

            $($newAddressRow).insertBefore($(this));

            var $newAddressInput = $("input[name='address']:last");
            $newAddressInput.focus();

            applySearchAddress($newAddressInput);

        });

    };

    function delAddress() {
        $(document).on("click", ".remove", function() {
            $(this).closest(".row_address").remove();
            // https://developers.google.com/maps/documentation/javascript/places-autocomplete#style_autocomplete
            // remove predictions
            $("#predictions_"+ $(this).closest("div").attr("id")).remove();
        });
    };

    function applySearchAddress($input) {

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

        autocomplete.addListener('place_changed', function() {

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
        setTimeout(function() {
            var rowId = $input.closest("div").attr("id");
            $(".pac-container:last").attr("id", "predictions_"+ rowId);
        }, 100);

    };

    $(document).ready(function () {
        addAddress();
        delAddress();
    });
</script>