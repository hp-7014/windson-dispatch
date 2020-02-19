<div>
    <input type='button' value="Find travelled distance" onclick="find()"></input>
</div>
<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&libraries=places&callback=initAutocomplete"
        async defer></script>

<script type="text/javascript">
    var myLatLng = {lat: 37.0902, lng: 95.7129};
    var mapOptions = {
        center: myLatLng,
        zoom: 1,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    // Hide result box
    document.getElementById("output").style.display = "none";
    document.getElementById("duration").style.display = "none";

    // Create/Init map
    var map = new google.maps.Map(document.getElementById('map'), mapOptions);

    // Create a DirectionsService object to use the route method and get a result for our request
    var directionsService = new google.maps.DirectionsService();

    // Create a DirectionsRenderer object which we will use to display the route
    var directionsDisplay = new google.maps.DirectionsRenderer();

    // Bind the DirectionsRenderer to the map
    directionsDisplay.setMap(map);

    var distance = "";
    var duration = "";

    //create autocomplete objects for all inputs
    var options = {
        types: ['(cities)']
    }

    function cityfrom() {
        //var input1 = document.getElementById("from");

        var autocomplete1 = new google.maps.places.Autocomplete(document.getElementById("originautocomplete"), options);
    }

    function cityto() {
        //var input2 = document.getElementById("to");

        var autocomplete2 = new google.maps.places.Autocomplete(document.getElementById("destinationautocomplete"), options);
    }

    // function find() {
    //     // var start = document.getElementsByName("originautocomplete[]");
    //     // var end = document.getElementsByName("destinationautocomplete");
    //
    //     var startArr= ["Borsad, Gujarat, India","Dabhasi, Gujarat, India"];
    //     var endArr= ["Dharmaj, Gujarat, India","Tarapur, Gujarat, India","Khambhat, Gujarat, India"];
    //
    //     var final = startArr.concat(endArr);
    //
    //
    //     for (let i = 0; i < final.length - 1; i++ ) {
    //         calcRoute(final[i],final[i + 1],i);
    //     }
    //
    // }

    // Define calcRoute function
    function calcRoute(start,end) {
        //create request
        alert("Start = "+start+"End = "+end);
        var request = {
            origin: start,
            destination: end,
            travelMode: google.maps.TravelMode.DRIVING,
            unitSystem: google.maps.UnitSystem.IMPERIAL
        }

        let directionsService = new google.maps.DirectionsService();

        // Routing
        directionsService.route(request, function (result, status) {
            if (status == google.maps.DirectionsStatus.OK) {

                //Get distance and time

                distance = result.routes[0].legs[0].distance.text;
                duration = result.routes[0].legs[0].duration.text;
               console.log(distance);
                // return distance;

                //display route
                // directionsDisplay.setDirections(result);
            } else {
                //delete route from map
                directionsDisplay.setDirections({routes: []});
                //center map in London
                map.setCenter(myLatLng);

                //Show error message

                alert("Can't find road! Please try again!");

            }
        });

    }
</script>

<style type="text/css">
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

</style>
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
<style>#locationField,
    #controls {
        position: relative;
        width: 480px;
    }

    #autocomplete {
        position: absolute;
        top: 0px;
        left: 0px;
        width: 99%;
    }

    .label {
        text-align: right;
        font-weight: bold;
        width: 100px;
        color: #303030;
    }

    #address {
        border: 1px solid #000090;
        background-color: #f0f0ff;
        width: 480px;
        padding-right: 2px;
    }

    #address td {
        font-size: 10pt;
    }

    .field {
        width: 99%;
    }

    .slimField {
        width: 80px;
    }

    .wideField {
        width: 200px;
    }

    #locationField {
        height: 20px;
        margin-bottom: 2px;
    }
</style>