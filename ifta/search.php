<html>
<head>
    <title>Google Map API Location Search Input</title>

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
        <input type="hidden" id="latitude_input" />
        <input type="hidden" id="longitude_input" />
    </div>
</div>

<div class="latlong-view">
    <p><b>Latitude:</b> <span id="latitude_view"></span></p>
    <p><b>Longitude:</b> <span id="longitude_view"></span></p>
</div>
</body>
</html>