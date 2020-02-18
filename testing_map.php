<div>
  <h2>
    Orign Location
  </h2>
</div>
<div id="locationField">
  <input id="originautocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
</div>

<div>
  <h2>
    Destination Location
  </h2>
</div>
<div id="locationField">
  <input id="destinationautocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"></input>
</div>
<br>
<div>
  <input type='button' value="Find travelled distance" onclick="CalculatedRecommededDistance()"></input>
</div>
<br>
<div>
  <strong>Recommended Route Total Distance</strong>
</div>
<div id="outputRecommended"></div>
<div>
  <strong>Longeest Route Total Distance</strong>
</div>
<div id="output"></div>


<!-- Replace the value of the key parameter with your own API key. -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&libraries=places&callback=initAutocomplete" async defer></script>

<script type="text/javascript">

function CalculatedRecommededDistance() {
  CalculateDistanceforAllAlternativeRoutes();

  var origin = document.getElementById('originautocomplete').value;
  var destination = document.getElementById('destinationautocomplete').value;

  var geocoder = new google.maps.Geocoder();
  var service = new google.maps.DistanceMatrixService();

  service.getDistanceMatrix({
    origins: [origin],
    destinations: [destination],
    travelMode: 'DRIVING',
    unitSystem: google.maps.UnitSystem.METRIC,
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
        outputDiv.innerHTML += originList[i] + ' to ' + destinationList[j] +
          ': ' + results[j].distance.text + ' in ' +
          results[j].duration.text + '<br>';
      }
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

</style><link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500"><style>#locationField,
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