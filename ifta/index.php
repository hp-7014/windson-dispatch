<?php
$latfrom = 22.416470;
$longfrom = 72.792732;

$latto = 22.359538;
$longto = 72.900242;

$theta = $longfrom - $longto;
$dist = sin(deg2rad($latfrom)) * sin(deg2rad($latto)) + cos(deg2rad($latfrom)) * cos(deg2rad($latto)) * cos(deg2rad($theta));
$dist = acos($dist);
$dist = rad2deg($dist);
$miles = $dist * 60 * 1.1515;

echo round($distance = ($miles * 1.609344),2).'km';
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Google Map</title>
</head>
<style type="text/css">
    #map{
        width: 650%;
        height: 450%;
    }
</style>
<body onload="myfunction();">
<div class="container-fluid upper">
    <div class="row">
        <div class="col-md-2">
            <input type="button" value="Get Direction" name="btn" class="form-control" id="getdirection" />
        </div>
    </div>
</div>
<div id="map">
</div>
</body>
</html>
<script type="text/javascript">
    function myfunction(){
        var map;
        var swabi = new google.maps.LatLng(22.416470,72.792732);
        var peshawar = new google.maps.LatLng(22.359538,72.900242);
        var option ={
            zoom : 10,
            center : swabi
        };
        map = new google.maps.Map(document.getElementById('map'),option);
        var display = new google.maps.DirectionsRenderer();
        var services = new google.maps.DirectionsService();
        display.setMap(map);
        function calculateroute(){
            var request ={
                origin : swabi,
                destination:peshawar,
                travelMode: 'DRIVING'
            };
            services.route(request,function(result,status){
                //console.log(result,status);
                if(status =='OK'){
                    display.setDirections(result);
                }
            });
        }
        document.getElementById('getdirection').onclick= function(){
            calculateroute();
        }
    }
</script>