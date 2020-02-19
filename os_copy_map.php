<div>
    <button type="button" onclick="find()">FIND</button>
</div>
<br>
<input type="text" name="output">
<br>
<div id="output"></div>
<?php
//
//$startArr = ["New York, NY, USA", "Pennsylvania, USA"];
//$endArr = ["Ohio, USA", "Indianapolis, IN, USA", "Michigan, USA", "Illinois, USA", "Wisconsin, USA", "Minnesota, USA", "North Dakota, USA", "South Dakota, USA", "Montana, USA", "Washington, USA","New York, NY, USA", "Pennsylvania, USA"];
//$storeLatLng = array();
//$storeDisDur = array();
//$final = array_merge($startArr, $endArr);
//
//for ($i = 0; $i < sizeof($final) - 1; $i++) {
////    $storeLatLng[] .= calculateLatLng($final[$i]);
//    $storeDisDur[] .= GetDrivingDistance($final[$i], $final[$i + 1]);
//}
//print_r($storeDisDur);
//function calculateLatLng($start)
//{
//    $url = "https://maps.google.com/maps/api/geocode/json?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&address=" . urlencode($start);
//
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    $responseJson = curl_exec($ch);
//    curl_close($ch);
//
//    $response = json_decode($responseJson);
//
//    if ($response->status == 'OK') {
//        $latitude = $response->results[0]->geometry->location->lat;
//        $longitude = $response->results[0]->geometry->location->lng;
//        return $latitude . ',' . $longitude;
//    } else {
//        echo $response->status;
//    }
//
//}
//
//function GetDrivingDistance($start, $end)
//{
//    $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=" . calculateLatLng($start) . "&destinations=" . calculateLatLng($end) . "&mode=driving&key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&language=pl-PL";
//    $ch = curl_init();
//    curl_setopt($ch, CURLOPT_URL, $url);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//    curl_setopt($ch, CURLOPT_PROXYPORT, 3128);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//    $response = curl_exec($ch);
//    curl_close($ch);
//    $response_a = json_decode($response, true);
//
//    $dist = $response_a['rows'][0]['elements'][0]['distance']['text'];
//    $time = $response_a['rows'][0]['elements'][0]['duration']['text'];
//
//    return $dist . ',' . $time;
//}

?>
-
<script type="text/javascript" defer
        src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0"></script>
<script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    var distance = 0;
    function cityfrom() {
        //var input1 = document.getElementById("from")
        var autocomplete1 = new google.maps.places.Autocomplete(document.getElementById("from"), options);
    }

    function cityto() {
        //var input2 = document.getElementById("to")
        var autocomplete2 = new google.maps.places.Autocomplete(document.getElementById("to"), options);
    }

    function find() {
        var startArr = ["New York"];
        var endArr = ["Ohio", "Michigan"];
        var final = startArr.concat(endArr);

        var storeArr = '';

        for (let i = 0; i <= final.length - 1; i++) {
            calcRoute(final[i], final[i + 1]);
            storeArr += document.getElementsByName('output').value;
        }
        var j = JSON.stringify(storeArr);
        console.log(j);
        // for (let n = 0; n <= storeArr.length - 1; n++) {
        //     console.log(storeArr);
        // }

        // console.log(j);
        // setTimeout(function(){ alert(distance);},2000);

    }
       function setDistance(dist){
            alert(dist);
            distance = dist;
       }
    function calcRoute(start, end) {
        var origin = start;
        var destination = end;
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
        },function (response, status) {
            var originList = response.originAddresses;
            var destinationList = response.destinationAddresses;

            var outputDiv = document.getElementById('output');
            outputDiv.innerHTML = '';
            var store ;
            //Display distance recommended value
            for (var i = 0; i < originList.length; i++) {
                var results = response.rows[i].elements;
                for (var j = 0; j < results.length; j++) {
                    var store = document.getElementsByName('output')[j].value += results[j].distance.text;
                    // console.log(originList[i] + ' to ' + destinationList[j] + ' . ' + '<br>' + '<b>Total Distance And Time:</b>' + '<br>' + results[j].distance.text + ' in ' + results[j].duration.text + '<br>');
                    // setDistance(results[j].distance.text);
                }
            }
            return store;
        });

    }

    // function calcRoute(start, end) {
    //
    //     //create request
    //     var request = {
    //         origin: start,
    //         destination: end,
    //         travelMode: google.maps.TravelMode.DRIVING,
    //         unitSystem: google.maps.UnitSystem.IMPERIAL
    //     }
    //
    //     var delayFactor = 0;
    //
    //     var directionsService = new google.maps.DirectionsService();
    //
    //     // Routing
    //     directionsService.route(request, function (result, status) {
    //         if (status == google.maps.DirectionsStatus.OK) {
    //             //Get distance and time
    //             // distance = result.routes[0].legs[0].distance.text;
    //             // duration = result.routes[0].legs[0].duration.text;
    //             console.log(result.routes[0].legs[0].distance.text);
    //         } else if (status == google.maps.DirectionsStatus.OVER_QUERY_LIMIT) {
    //             delayFactor++;
    //             setTimeout(function () {calcRoute(start,end); delayFactor = 0;},1000);
    //         } else {
    //             var directionsDisplay = new google.maps.DirectionsRenderer();
    //             directionsDisplay.setDirections({routes: []});
    //             map.setCenter(myLatLng);
    //
    //             //Show error message
    //             alert("Can't find road! Please try again!");
    //         }
    //     });
    // }

    // showRoute(final[i],final[i + 1]);
    // calcRoute(final[i],final[i + 1]);
    //     geocoder = new google.maps.Geocoder();
    //     //var address = document.getElementById("my-address").value;
    //     geocoder.geocode({'address': final[i]}, function (results, status) {
    //         if (status == google.maps.GeocoderStatus.OK) {
    //             la[i] = results[0].geometry.location.lat() + "-" + results[0].geometry.location.lng();
    //         } else {
    //             alert("Geocode was not successful for the following reason: " + status);
    //         }
    //     });
    // }
    // alert(la[0]);

    // function showRoute(start, end) {
    //     var latlng2 = new google.maps.LatLng(40.84, 14.25);
    //     var myOptions2 = {
    //         zoom: 10,
    //         center: latlng2,
    //         mapTypeId: google.maps.MapTypeId.ROADMAP
    //     };
    //
    //     var mapObject = new google.maps.Map(document.getElementById("map"), myOptions2);
    //
    //     var directionsRequest = {
    //         origin: start,
    //         destination: end,
    //         travelMode: google.maps.DirectionsTravelMode.DRIVING,
    //         unitSystem: google.maps.UnitSystem.METRIC
    //     };
    //
    //     var directionsService = new google.maps.DirectionsService();
    //
    //     // Marker
    //     directionsService.route(directionsRequest,
    //         function (response, status) {
    //             if (status == google.maps.DirectionsStatus.OK) {
    //                 new google.maps.DirectionsRenderer({
    //                     map: mapObject,
    //                     directions: response
    //                 });
    //                 //alert( response.routes[0].legs[0].distance.value );
    //             } else
    //                 $("#error").append("Unable to retrieve your route<br />");
    //         }
    //     );
    // }


</script>
 