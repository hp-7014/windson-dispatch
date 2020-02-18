<?php session_start();
require "../database/connection.php";

if ($_GET['type'] == 'editverifyLoad') {

    $invoiceno = $_POST['p_id'];

    $data = $db->active_load->find(['companyID' => $_SESSION['companyId']]);
    $output = "";

    foreach ($data as $d) { // for find the current company data

        foreach ($d['invoice'] as $date) { // fetch invoice array
            if ($date['invoiceNo'] == $invoiceno) {

              echo "<div id='start' ><input class='form-control col-md-10' type='text' id='originautocomplete' value=" . $date['startLocation'] . " name='from'></div><br>";
                $i = 1;
                foreach ($date['shipperName'] as $shipper) {
                    $shipperLocation = $shipper['ShipperLocation'];
                    echo '<div id="shipper'.$i.'"><input class="form-control col-md-10" type="text" id="destinat" value="'.$shipperLocation.'"></div><div><button class="btn btn-primary btn-sm" onclick="addShipper('.$i.')">Add Location</button></div><br>';
                    $i++;
                }
                $j = 1;
                foreach ($date['consignee'] as $consignee) {

                    if (empty($consignee['ConsigneeLocation'])) {

                    } else {
                        $consigneeLocation = $consignee['ConsigneeLocation'];
                        echo '<div id="consigee'.$j.'"><input class="form-control col-md-10" type="text" id="" name="origin" value="'.$consigneeLocation.'"></div><div><button class="btn btn-primary btn-sm" onclick="addConsignee('.$j.')" >Add Location</button></div><br>';
                        $j++;
                    }
                }

              echo "<div id='end_loc'><input class='form-control col-md-10' type='text' id='destinationautocomplete' value=" . $date['endLocation'] . " name='to'></div><div></div><button class='btn btn-primary btn-sm' onclick='addEndLoc()'>Add Location</button></div><br>";
              echo "<div id='outputRecommended'></div><br>";
             // echo "<button type='button' onclick='get_addresses()' class='btn btn-success btn-sm'> Calculate Mileage</button>";
             // echo "<div id='address_panel' class='panel panel-default'><div id='summary_panel' class='panel panel-default'><div class='panel-heading'>Summary</div><div class='panel-body'><div id='distance'><table><tr><td style='width: 75px;'>From:</td><td class='from_cell'></td></tr><tr><td>To:</td><td class='to_cell'></td></tr><tr><td>Duration:</td><td class='t_cell'></td></tr></table><div id='by_state'></div></div></div></div></div>";
            }
        }
    }
}
?>

<script>
   var page = "mileage";
</script>

<script type="text/javascript">
    // Add Shipper
    function addShipper(i){
        var ship = document.getElementById('shipper'+i);
        var row = '<br><div class="shipper_rm"><input class="form-control col-md-10" onkeyup="getLocation(this.id)" id="shipper_data" type="cities" name="shipper" placeholder="Add Location"> <button class="btn btn-success btn-sm" onclick="addNew_Loc()">+</button>&nbsp;<button class="btn btn-danger btn-sm ship_del" >X</button> </div><br>';
        ship.innerHTML += row;
    }

    // Add origin
    /*function addOrigin(){
        var start = document.getElementById('start');
        var row = '<br><div class="origin_rm"><input class="form-control col-md-10" type="text" onkeyup="origin_key()" id="origin_test" placeholder="Add Origin"><button class="btn btn-success btn-sm">+</button>&nbsp;<button class="btn btn-danger btn-sm origin_del">X</button> </div><br>';
        start.innerHTML += row;
    }*/

    // Add End Location

    function addEndLoc() {
        var end = document.getElementById('end_loc');
        var row = '<br><div class="end_rm"> <input class="form-control col-md-10" type="text" onkeyup="getLocation(this.id)" id="destination_com" name="end" placeholder="Add Location"><button class="btn btn-success btn-sm" >+</button>&nbsp;<button class="btn btn-danger btn-sm end_del">X</button> </div><br>';
        end.innerHTML += row;
    }

    // Add Consignee Location

    function addConsignee(j) {
        var cons = document.getElementById('consigee'+j);
        var row = '<br><div class="consig_rm"> <input class="form-control col-md-10" type="text" onkeyup="getLocation(this.id)" id="consignee_data" name="consignee" placeholder="Add Consignee"><button class="btn btn-success btn-sm" >+</button>&nbsp;<button class="btn btn-danger btn-sm consig_del">X</button> </div><br>';
        cons.innerHTML += row;
    }

    // Remove Shipper
    $(document).on("click", ".ship_del", function () {
        $(this).closest(".shipper_rm").remove();

        $("#predictions_" + $(this).closest("div").attr("id")).remove();
    });

    // Remove Origin
    /*$(document).on("click", ".origin_del", function () {
        $(this).closest(".origin_rm").remove();

        $("#predictions_" + $(this).closest("div").attr("id")).remove();
    });*/

    // Remove End Location
    $(document).on("click", ".end_del", function () {
        $(this).closest(".end_rm").remove();

        $("#predictions_" + $(this).closest("div").attr("id")).remove();
    });

    // Remove Consignee Location
    $(document).on("click", ".consig_del", function () {
        $(this).closest(".consig_rm").remove();

        $("#predictions_" + $(this).closest("div").attr("id")).remove();
    });

    // Search Autocomplete START

    /*function origin_key() {
        new google.maps.places.Autocomplete(document.getElementById('origin_test'));
        google.maps.event.addListener(places, 'place_changed', function ()
        {
            var getaddress = places.getPlace();
        });
    }*/

    function endloc_key(l) {
        new google.maps.places.Autocomplete(
            (document.getElementById('destination_com'+l)), {
                types: ['geocode']
            });
    }

    function shipperloc_key(k) {
        new google.maps.places.Autocomplete(
            (document.getElementById('shipper_data'+k)), {
               types: ['geocode']
            });
    }

    function consig_key(m) {
        new google.maps.places.Autocomplete(
            (document.getElementById('consignee_data'+m)), {
               types: ['geocode']
            });
    }

    // Search Autocomplete ENDS

    /*function addAddress() {
        var test = 1;
        //alert(test);

        $(".new").on("click", function () {

            var inc = $(".row_address").length + 1,
            $newAddressRow = `<div class="row_address">
                    <input class="form-control col-md-8" type="text" name="address" placeholder="Add Location">
                    <button class="remove btn btn-danger">X</button>
                </div>`;


            $("#origin").append($newAddressRow);
        });
    };*/

    /*function delAddress() {
        $(document).on("click", ".remove", function () {
            $(this).closest(".row_address").remove();

            $("#predictions_" + $(this).closest("div").attr("id")).remove();
        });
    }*/

    $(document).ready(function () {
        //addAddress();
        //delAddress();
        /*var searchInput = 'search_input';
        $(document).ready(function () {
            var autocomplete;
            autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
                types :['geocode']
            });
        });*/


        //---------------------Auto Complete Start----------------------//
        /*originautocomplete = new google.maps.places.Autocomplete(
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
            });*/

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
