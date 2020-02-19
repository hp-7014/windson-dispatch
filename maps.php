<style>
    html, body { height: 100%; margin: 0; padding: 0; }
    #map { height: 100%; width: 100%; height: 100%; }
</style>
<div id="map"></div>
<script>
    function initMap() {
        var service = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'));

        // list of points
        var stations = [

            {lat: 22.398041, lng: 72.903259, name: 'borsad'},
            {lat: 22.4125887, lng: 72.8425804, name: 'dabhasi'},
            {lat: 22.489386, lng: 72.655642, name: 'tarapur'},
            {lat: 22.3929174, lng: 72.5961793, name: 'Khambhat'},
            {lat: 22.323400, lng: 72.630402, name: 'Khambhat'},
            {lat: 22.323400, lng: 72.340402, name: 'Khambhat'},
            {lat: 22.323400, lng: 72.634302, name: 'Khambhat'},
            {lat: 22.324340, lng: 72.632302, name: 'Khambhat'},
            {lat: 22.323400, lng: 74.630402, name: 'Khambhat'},
            {lat: 22.323400, lng: 82.630402, name: 'Khambhat'},
            {lat: 22.323400, lng: 76.630402, name: 'Khambhat'},
            {lat: 22.323400, lng: 70.630402, name: 'Khambhat'},
            {lat: 22.323400, lng: 65.630402, name: 'Khambhat'},
            {lat: 22.323400, lng: 72.688402, name: 'Khambhat'},
            {lat: 22.323770, lng: 72.688402, name: 'Khambhat'},
            {lat: 22.356750, lng: 72.688402, name: 'Khambhat'},
            {lat: 22.329787, lng: 72.688402, name: 'Khambhat'},
            {lat: 22.323400, lng: 72.436352, name: 'Khambhat'},
            {lat: 22.323400, lng: 72.698862, name: 'Khambhat'},
            {lat: 22.7888400, lng: 72.623762, name: 'Khambhat'},
            {lat: 22.38888800, lng: 72.623762, name: 'Khambhat'},
            {lat: 22.323888, lng: 72.623762, name: 'Khambhat'},
            {lat: 22.323456, lng: 72.623762, name: 'Khambhat'},
            {lat: 22.329043, lng: 72.623762, name: 'Khambhat'},
            {lat: 22.3245454, lng: 72.623762, name: 'Khambhat'},
            {lat: 42.3245454, lng: 72.623762, name: 'Khambhat'},
            {lat: 52.3245454, lng: 72.623762, name: 'Khambhat'},
            {lat: 12.3245454, lng: 72.623762, name: 'Khambhat'},
            {lat: 92.3245454, lng: 72.623762, name: 'Khambhat'},
            // ... as many other stations as you need
        ];

        // Zoom and center map automatically by stations (each station will be in visible map area)
        var lngs = stations.map(function(station) { return station.lng; });
        var lats = stations.map(function(station) { return station.lat; });
        map.fitBounds({
            west: Math.min.apply(null, lngs),
            east: Math.max.apply(null, lngs),
            north: Math.min.apply(null, lats),
            south: Math.max.apply(null, lats),
        });

        // Show stations on the map as markers
        for (var i = 0; i < stations.length; i++) {
            new google.maps.Marker({
                position: stations[i],
                map: map,
                title: stations[i].name
            });
        }

        // Divide route to several parts because max stations limit is 25 (23 waypoints + 1 origin + 1 destination)
        for (var i = 0, parts = [], max = 25 - 1; i < stations.length; i = i + max)
            parts.push(stations.slice(i, i + max + 1));

        // Service callback to process service results
        var service_callback = function(response, status) {
            if (status != 'OK') {
                console.log('Directions request failed due to ' + status);
                return;
            }
            var renderer = new google.maps.DirectionsRenderer;
            renderer.setMap(map);
            renderer.setOptions({ suppressMarkers: true, preserveViewport: true });
            renderer.setDirections(response);
        };
        alert(parts.length);
        // Send requests to service to get route (for stations count <= 25 only one request will be sent)
        for (var i = 0; i < parts.length; i++) {
            // Waypoints does not include first station (origin) and last station (destination)
            var waypoints = [];
            for (var j = 1; j < parts[i].length - 1; j++)
                waypoints.push({location: parts[i][j], stopover: false});
            // Service options
            var service_options = {
                origin: parts[i][0],
                destination: parts[i][parts[i].length - 1],
                waypoints: waypoints,
                travelMode: 'DRIVING'
            };
            // Send request
            service.route(service_options, service_callback);
        }
    }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&callback=initMap"></script>