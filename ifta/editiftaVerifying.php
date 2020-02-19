<?php session_start();
require "../database/connection.php";

if ($_GET['type'] == 'editverifyLoad') {

    $invoiceno = $_POST['p_id'];

    $data = $db->active_load->find(['companyID' => $_SESSION['companyId']]);
    $output = "";

    foreach ($data as $d) { // for find the current company data

        foreach ($d['invoice'] as $date) { // fetch invoice array
            if ($date['invoiceNo'] == $invoiceno) {
                $output .= "<table><tr><td><input class='form-control col-md-12' type='text' id='originautocomplete' value=" . $date['startLocation'] . "></tr></td></table>";
                foreach ($date['shipperName'] as $shipper) {
                    $output .= "<table><tr><td><input class='form-control col-md-12' type='text' id='destinat' value=" . $shipper['ShipperLocation'] . "></tr></td></table>";
                }

                foreach ($date['consignee'] as $consignee) {
                    if (empty($consignee['ConsigneeLocation'])) {

                    } else {
                        $output .= "<table><tr><td><input class='form-control col-md-12' type='text' id='origin' name='origin' value=" . $consignee['ConsigneeLocation'] . "></tr></td></table>";
                    }
                }
                if (empty($date['endLocation'])) {

                } else {
                    $output .= "<table><tr><td><input class='form-control col-md-12' type='text' id='destinationautocomplete' value=" . $date['endLocation'] . "></td></tr></table><br><br>
                                <div id='outputRecommended'></div>
                   ";
                }
            }
        }
    }
        echo $output;
}
?>
<script type="text/javascript">
    $(document).ready(function () {
        //---------------------Auto Complete Start----------------------//
        originautocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('originautocomplete')), {
                types: ['geocode']
            });

        destinationautocomplete = new google.maps.places.Autocomplete(
            (document.getElementById('destinationautocomplete')), {
                types: ['geocode']
            });

        originautocomplete1 = new google.maps.places.Autocomplete(
            (document.getElementById('destinat')), {
                types: ['geocode']
            });

        destinationautocomplete1 = new google.maps.places.Autocomplete(
            (document.getElementById('origin')), {
                types: ['geocode']
            });
        //---------------------Auto Complete End---------------//


        //---------------------MAP Start----------------------//
        var service = new google.maps.DirectionsService;
        var map = new google.maps.Map(document.getElementById('map'),
            {center: new google.maps.LatLng(23.022683, 72.571448), zoom: 6});
        var linecolors = ['red', 'blue', 'orange', 'green'];
        var iconBase = 'upload/';
        var icons = {
            parking: {
                icon: iconBase + 'icons8-home-64.png'
            },
            info: {
                icon: iconBase + 'info-i_maps.png'
            }
        };

        // list of points
        var stations = [
            {lat: 23.022683, lng: 72.571448, name: 'Narolgam, Ahmedabad, Gujarat 380006'},
            {lat: 22.691201, lng: 72.863510, name: 'Manek Chowk, Junaraopura, Nadiad, Gujarat 387001'},
            {lat: 22.564477, lng: 72.928922, name: 'Purushottam Nagar, Anand, Gujarat 388120'},
            {lat: 22.307235, lng: 73.181462, name: 'Pratap Nagar Police Line, Sarod, Sayajiganj, Vadodara, Gujarat 390001'},

            // ... as many other stations as you need
        ];

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
        //---------------------MAP End----------------------//


        //---------------------Calculation Mile Start----------------------//
        var origin = document.getElementById('originautocomplete').value;
        var destination = document.getElementById('destinationautocomplete').value;

        var geocoder = new google.maps.Geocoder();
        var service = new google.maps.DistanceMatrixService();

        service.getDistanceMatrix({
            origins: [origin],
            destinations: [destination],
            travelMode: 'DRIVING',
            unitSystem: google.maps.UnitSystem.IMPERIAL,
            avoidHighways: false,
            avoidTolls: false,
            avoidFerries: false

        }, function(response, status) {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;
            var outputDiv = document.getElementById('outputRecommended');
            outputDiv.innerHTML = '';
            //Display distance recommended value
            for (var i = 0; i < originList.length; i++) {
                var results = response.rows[i].elements;
                for (var j = 0; j < results.length; j++) {
                    outputDiv.innerHTML += '<b>Summary: </b>' + '<br>' + originList[i] + ' to ' + destinationList[j] +
                        '. ' + '<br>' + '<b>Total Distance And Time:</b>' + '<br>' +results[j].distance.text + ' in ' +
                        results[j].duration.text + '<br>';
                }
            }
        });

    });
    //---------------------Calculation Mile End----------------------//
</script>
