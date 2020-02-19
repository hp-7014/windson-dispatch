<button type="button" onclick="find()">Calc</button>
<div id="heightPlaceholder"></div>
<script type="text/javascript">

    function find() {
        var startArr = ["New York, NY, USA"];
        var endArr = ["Ohio, USA"];

        var final = startArr.concat(endArr);

        for (var i = 0; i < final.length - 1; i++) {
            calculate_route(final[i], final[i + 1]);
        }
    }

    function calculate_route(origin, destination) {
        
    }
</script>