<!DOCTYPE html>
<html>
<head>
    <title>Custom Markers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
        /* Always set the map height explicitly to define the size of the div
         * element that contains the map. */
        #map {
            height: 100%;
        }
        /* Optional: Makes the sample page fill the window. */
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="map"></div>
<script>
    var map;
    function initMap() {
        map = new google.maps.Map(
            document.getElementById('map'),
            {center: new google.maps.LatLng(23.022683, 72.571448), zoom: 8});

        var iconBase =
            'upload/';

        var icons = {
            origin: {
                icon: iconBase + 'icons8-home-64.png'
            },
            Destination: {
                icon: iconBase + 'icons8-flag-filled-48.png'
            }
        };

        var features = [
             {
                position: new google.maps.LatLng(23.022683, 72.571448),
                type: 'origin'
            }, {
                position: new google.maps.LatLng(22.307235, 73.181462),
                type: 'Destination'
            }
        ];

        // Create markers.
        for (var i = 0; i < features.length; i++) {
            var marker = new google.maps.Marker({
                position: features[i].position,
                icon: icons[features[i].type].icon,
                map: map
            });
        };
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&callback=initMap">
</script>
</body>
</html>