<!DOCTYPE html>
<html>
<head>
</head>
<style type="text/css">
    #map{
        height: 50%;
        width: 20%;
    }
    html , body {
        height: 90%;
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
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&libraries=places"></script>