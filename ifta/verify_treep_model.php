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
                <script  type="text/javascript">
                    var searchInput = 'search_input';

                    $(document).ready(function () {
                        var autocomplete;
                        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                            types :['geocode']
                        });

                        google.maps.event.addListener(autocomplete, 'place_changed', function () {
                            var near_place = autocomplete.getPlace();
                            document.getElementById('latitude_input').value = near_place.geometry.location.lat();
                            document.getElementById('longitude_input').value = near_place.geometry.location.lng();


                            document.getElementById('latitude_view').innerHTML = near_place.geometry.location.lat();
                            document.getElementById('longitude_view').innerHTML = near_place.geometry.location.lng();
                        });
                    });

                    $(document).on('change', '#'+searchInput, function () {
                        document.getElementById('latitude_input').value = '';
                        document.getElementById('longitude_input').value = '';
                        document.getElementById('latitude_view').innerHTML = '';
                        document.getElementById('longitude_view').innerHTML = '';
                    });
                </script>
                </head>

                <body>
                <div class="container">
                    <div class="form-group">
                        <label>Location:</label>
                        <input type="text" id="search_input" placeholder="Type Address...." />
                        <iframe width="650" height="450" frameborder="1" style="border:1"
                                src="https://www.google.com/maps/embed/v1/place?q=...&key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0" allowfullscreen align="right"></iframe>
                        <input type="hidden" id="latitude_input" />
                        <input type="hidden" id="longitude_input" />
                    </div>
                </div>

                <div class="latlong-view">
                    <p><b>Latitude:</b> <span id="latitude_view"></span></p>
                    <p><b>Longitude:</b> <span id="longitude_view"></span></p>
                </div>
                </body>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->