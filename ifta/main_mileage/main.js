var dt;

var directionDisplay;
var directionsService;
var route_map;
var dir_response = null;
var states;
var cover_data = [];
var pb;
var state_lines = [];
var border_snoop;

$("document").ready(function(){
	var page = "mileage";
	if(page === "zipsearch"){

		form_submit();

	}else if(page === "heatmap"){

		init_map();

		bind_collection();

		bind_equip();

		heat();

	}else if(page === "nearby"){

		locate();

	}else if(page === "mileage"){
		
		trigger_mileage();

	}else if(page === "load-table"){

		count_loads();

		filter();

		set_filter();

		format_val();

		format_tel();

		format_money();

		validate();

	}else if(page == undefined){

		console.log("miscellaneous page");

	}

});

//---trigger mileage

function trigger_mileage(){

	directionsService = new google.maps.DirectionsService();

	if(api_mode === true){

		calcRoute(from,to);

	}else{

		loading_gif(false);

	}

}

//---get addresses

function get_addresses(){

	var to = $("[name=to]").val();
	var from = $("[name=from]").val();
	//alert(from);
	//alert(to);
	calcRoute(from,to);

}

//---bind submit

function form_submit(){

	$("#form_zip input").keydown(function(event){

		if(event.keyCode == 13) {

			event.preventDefault();
			return false;

		}

	});

}

//---bind dollar

function bind_dollar(){

	$(".get_dollar").unbind("click");

	$(".get_dollar").click(function(){

		if($(this).hasClass("active")){

			$("#dollar_modal").modal('toggle');

		}

	});

}

//---format values

function format_val(){

	$(".tel").each(function(index,el){

		if($(el).val() == ""){

			return;

		}

		$(el).val(function(i, text) {
			return text.replace(/\d{3}(?=(\d{3})+)/g,'$&-');
		});

	});

	$(".money").each(function(index,el){

		if($(el).val() == "" || $(el).val() == "TBD"){

			return;

		}

		var amt = $(el).val();

		amt = amt.replace(',','');

		amt = parseInt(amt);

		amt = amt.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

		$(el).val(amt);

	});

}

//---format telephone

function format_tel(){

	$(".tel").on("keyup",function(){

		$(this).val(function(i, text) {

			return text.replace(/\d{3}(?=(\d{3}))/g,'$&-');

		});

	});

}

//---format money

function format_money(el){

	$(".money").on("change",function(){

		if($(this).val() == "TBD"){

			return;

		}

		var amt = $(this).val().replace(",","");

		amt = parseInt(amt);

		amt = amt.toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');

		$(this).val(amt);

	});

}

//---validate email

function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}

//---validate money

function validate_money(money){

	var re = /(?=.)^\$?(([1-9][0-9]{0,2}(,[0-9]{3})*)|[0-9]+)?(\.[0-9]{1,2})?$/;
	return re.test(money);

}

//---validate tel

function validate_tel(tel){

	var re = /^\d{3}\-\d{3}\-\d{4}$/;
	return re.test(tel);

}

//---validate zip

function validate_zip(zip){

	var re = /(^\d{5}$)|(^\d{5}-\d{4}$)/;
	return re.test(zip);

}

//---validate field

function validate(){

	$(".email").focusout(function(){

		var email = $(this).val();

		var is_valid = validateEmail(email);

		if(!is_valid){

			$(this).val("");

			$(".msg").html('<span style="color: #ff0000;">Please provide a valid email address.</span>');

		}else{

			$(".msg").empty();

		}

	});

	$(".money").focusout(function(){

		var money = $(this).val();

		var is_valid = validate_money(money);

		var current = $(this).val();

		if(!is_valid && current != ""){

			$(this).val("");

			$(".msg").html('<span style="color: #ff0000;">Please enter digits only.</span>');

		}else{

			$(".msg").empty();

		}


	});

	$(".phone").focusout(function(){

		var tel = $(this).val();

		var is_valid = validate_tel(tel);

		if(!is_valid){

			$(this).val("");

			$(".msg").html('<span style="color: #ff0000;">Please provide a valid telephone number</span>');

		}else{

			$(".msg").empty();

		}


	});

	$(".zip").focusout(function(){

		var zip = $(this).val();

		var is_valid = validate_zip(zip);

		if(!is_valid){

			$(this).val("");

			$(".msg").html('<span style="color: #ff0000;">Please provide a valid zip code</span>');

		}else{

			$(".msg").empty();

		}


	});

}

//---any undefined

function any(v){

	var count = [1];

	$.each(v,function(index,el){

		if(typeof(el) === "undefined"){

			count = [];

			count.push(1);

			return false;

		}else{

			count = [];

		}

	});

	if(count.length > 0){

		return true;

	}else{

		return false;

	}

}

//---sanitise vector

function treat(v){

	$.each(v,function(index,el){

		if(el == ""){

			v[index] = undefined;

		}

	});

	return v;

}

//---check empties

function empties(mode){

	var elements = [];

	var fields = [];

	switch(mode){

		case "factoring":
		var serial = $("#form_factoring").serializeArray();
		break;

		case "fuel":
		var serial = $("#form_fuel").serializeArray();
		break;

	}

	$.each(serial,function(index,el){

		var f_name = el.name;

		var matches = f_name.match(/^month$|^day$|^year$|^blank_|^dur_/);

		if(matches === null){

			if($("[name="+ f_name +"]").attr('not_required') === "true"){

				return true;

			}

			elements.push(el.name);

			fields.push(el.value);

		}

	});

	fields = treat(fields);

	var empties_data = {"fields": fields, "elements": elements};

	return empties_data;

}

//---render recaptcha

function recap(){

	recaptcha1 = grecaptcha.render('recaptcha1', {
		'sitekey' : '6Le4zP0SAAAAAFh3DsedV2-eF2IrM75w1Q9A9MRp',
		'theme' : 'light'
	});


	recaptcha2 = grecaptcha.render('recaptcha2', {
		'sitekey' : '6Le4zP0SAAAAAFh3DsedV2-eF2IrM75w1Q9A9MRp',
		'theme' : 'light'
	});
}

//---send form

function factor(){

	var empties_data = empties("factoring");

	var fields = empties_data['fields'];
	var elements = empties_data['elements'];

	var data = $("#form_factoring").serialize();

	if(any(fields)){

		$("#form_factoring .msg").html('<span style="color: #ff0000; font-weight: bold;">Please complete all fields.</span>');

		return;

	}else{

		$("#form_factoring .msg").empty();

	}

	var issent;

	console.log(data);

	var get_sent = $.post("/truckload/send_form.php",data,function(response){

		issent = response;

	});

	get_sent.complete(function(){

		$("#form_factoring .msg").html('<span style="display: block; font-weight: bold; color: #00ff00;">We have received your form, thank you.</span>');

		setTimeout(function(){

			$("#form_factoring .msg").empty();

			$("#dollar_modal").modal('toggle');

		},5000);

	});

}

//---send form

function fuel(){

	var empties_data = empties("fuel");

	var fields = empties_data['fields'];
	var elements = empties_data['elements'];

	var data = $("#form_fuel").serialize();

	if(any(fields)){

		$("#form_fuel .msg").html('<span style="color: #ff0000; font-weight: bold;">Please complete all fields.</span>');

		return;

	}else{

		$("#form_fuel .msg").empty();

	}

	var issent;

	console.log(data);

	var get_sent = $.post("/truckload/send_form.php",data,function(response){

		issent = response;

	});

	get_sent.complete(function(){

		$("#form_fuel .msg").html('<span style="display: block; font-weight: bold; color: #00ff00;">We have received your form, thank you.</span>');

		setTimeout(function(){

			$("#form_fuel .msg").empty();

			$("#fuel_modal").modal('toggle');

		},5000);

	});

}

//---set filter

function set_filter(){

	$(".fragment").click(function(){

		if($(this).hasClass("state")){

			$(".state.fragment").removeClass("active");

		}

		if($(this).hasClass("equip")){

			$(".equip.fragment").removeClass("active");

		}

		$(this).addClass("active");

		if($(this).hasClass("state")){

			count_loads();

		}

		filter();

	});

}

//---count loads

function count_loads(){

	var state = $(".state.active").data("state");

	var count;

	var get_counts = $.getJSON("/truckload/count_loads.php?state=" + state,function(response){

		count = response;

	});

	get_counts.complete(function(){

		$(".desk .fragment.equip").each(function(index,el){

			$(el).find(".badge").text(count[index]);

		});

		$(".mob .fragment.equip").each(function(index,el){

			$(el).find(".badge").text(count[index]);

		});

	});

}

//---filter table

function filter(){

	$(".desk #loading, .mob #loading").show();

	var state = $(".state.active").data("state");

	var equip = $(".equip.active").data("equip");

	var values = 'state=' + state + '&equipment=' + equip;

	grab_loads(values);

}

//---grab truck loads

function grab_loads(values){

	values = (values) ? '?' + values : '' ;

	var loads;

	var get_loads = $.getJSON("/truckload/grab_loads.php" + values,function(response){

		loads = response;

	});

	get_loads.complete(function(){

		$(".desk #loading, .mob #loading").hide();

		if($(dt).find("td").length > 0){

			dt.destroy();

		}

		dt = $('#units').DataTable({

			"aaData": loads,
			"responsive": true,
			"destroy": true,
			"aoColumns": [
				{ "sTitle": "Pick Up", "sClass": "center"},
				{ "sTitle": "Origin" , "sType": "string","sClass": "center"},
				{ "sTitle": "Origin State" , "sType": "string","sClass": "center"},
				{ "sTitle": "Dest City", "sClass": "center"},
				{ "sTitle": "Dest State", "sClass": "center"},
				{ "sTitle": "Full / Partial", "sClass": "center"},
				{ "sTitle": "Equipment", "sClass": "center"},
				{ "sTitle": "Rate", "sClass": "center none"},
				{ "sTitle": "Weight", "sClass": "center none"},
				{ "sTitle": "Length", "sClass": "center none"},
				{ "sTitle": "Stops", "sClass": "center none"},
				{ "sTitle": "Contact", "sClass": "center none"},
				{ "sTitle": "Phone", "sClass": "center none"},
				{ "sTitle": "Company", "sClass": "center"},
				{ "sTitle": "Notes", "sClass": "center none"},
				{ "sTitle": "Map", "sClass": "center none"},
				{ "sTitle": "", "sClass": "center"}
			],
			"aaSorting": [[ 1, "asc" ]] ,
			"iDisplayLength": 100,
			"oLanguage": {"sSearch": "Filter:"},
			"columnDefs": [
							{
								"targets": [7,8,9,10,11,14,15],
								"visible": false
							},
							{
								"orderable": false,
								targets: [14,15]
							}
			],
			"fnDrawCallback": function(){

				$('[data-toggle="popover"]').popover({html:true});

				bind_dollar();

			}

		});

		bind_dollar();

	});

}

//---grab loads zip

function grab_loads_zip(){

	$("#loading,.btn_row.mob #loading").css("visibility","visible");

	var values = $("#form_zip").serialize();

	values = (values) ? '?' + values : '' ;

	var loads;

	var get_loads = $.getJSON("/truckload/grab_loads_zip.php" + values,function(response){

		loads = response;

	});

	get_loads.complete(function(){

		$("#loading,.btn_row.mob #loading").css("visibility","hidden");

		if($(dt).find("td").length > 0){

			dt.destroy();

		}

		dt = $('#units').DataTable({

			"aaData": loads,
			"responsive": true,
			"destroy": true,
			"aoColumns": [
				{ "sTitle": "Pick Up", "sClass": "center"},
				{ "sTitle": "Origin" , "sType": "string","sClass": "center"},
				{ "sTitle": "Origin State" , "sType": "string","sClass": "center"},
				{ "sTitle": "Dest City", "sClass": "center"},
				{ "sTitle": "Dest State", "sClass": "center"},
				{ "sTitle": "Full / Partial", "sClass": "center"},
				{ "sTitle": "Equipment", "sClass": "center"},
				{ "sTitle": "Rate", "sClass": "center none"},
				{ "sTitle": "Weight", "sClass": "center none"},
				{ "sTitle": "Length", "sClass": "center none"},
				{ "sTitle": "Stops", "sClass": "center none"},
				{ "sTitle": "Contact", "sClass": "center none"},
				{ "sTitle": "Phone", "sClass": "center none"},
				{ "sTitle": "Company", "sClass": "center"},
				{ "sTitle": "Notes", "sClass": "center none"},
				{ "sTitle": "Map", "sClass": "center none"},
				{ "sTitle": "", "sClass": "center"}
			],
			"aaSorting": [[ 1, "asc" ]] ,
			"iDisplayLength": 100,
			"oLanguage": {"sSearch": "Filter:"},
			"columnDefs": [
							{
								"targets": [7,8,9,10,11,14,15],
								"visible": false
							},
							{
								"orderable": false,
								targets: [14,15]
							}
			],
			"fnDrawCallback": function(){

				$('[data-toggle="popover"]').popover({html:true});

				bind_dollar();

			}

		});

		bind_dollar();

	});

}

//---init map

function init_map(){

	map = [];

	var mapOptions = {
			zoom: 4,
			minZoom: 2,
			center: {lat: 39.8282, lng: -98.5795},
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			styles: [{
						stylers: [{
							hue: "#ff1a00"
						}, {
							invert_lightness: !0
						}, {
							saturation: -100
						}, {
							lightness: 33
						}, {
							gamma: .5
						}]
					},
					{
						featureType: "water",
						elementType: "geometry",
						stylers: [{
							color: "#2D333C"
						}]
					},
					{
					  featureType: 'administrative.country',
					  elementType: 'label',
					  stylers: [
						{ visibility: 'off' }
					  ]
					},
					{
					  featureType: 'water',
					  elementType: 'label',
					  stylers: [
						{ visibility: 'off' }
					  ]
					}
				]
        };

	map = new google.maps.Map(document.getElementById('map'),mapOptions);

}

//---render heatmap

function heat(){

	$("#loading").css("visibility","visible");

	var layer;

	var get_layer = $.getJSON("https://trulos-loads.data-ai.com/freight/grab_all_equip.php",function(response){

		layer = response;

	});

	get_layer.complete(function(){

		$("#loading").css("visibility","hidden");

		var heat_layer = [];

		for(var i = 0; i < layer.length; i++){

			var point = new Object;

			point = {location: new google.maps.LatLng(layer[i].lat, layer[i].lng),weight: layer[i].weight };

			heat_layer.push(point);

		}

		heatmap = new google.maps.visualization.HeatmapLayer({
		  data: heat_layer,
		  radius: 25
		});

		heatmap.setMap(map);

	});

}

//---bind equipment

function bind_equip(){

	$("[name=equip]").change(function(){

		var obj = $("[name=equip]:checked").serializeArray();

		var equipment = obj.map(function(element){return element.value})

		equipment = equipment.join(",");

		var pickup = $("[name=collection]:checked").val();

		heat_specific(equipment,pickup);

	});

}

//---bind collection

function bind_collection(){

	$("[name=collection]").change(function(){

		var pickup = $("[name=collection]:checked").val();

		var obj = $("[name=equip]:checked").serializeArray();

		var equipment = obj.map(function(element){return element.value})

		equipment = equipment.join(",");

		heat_specific(equipment,pickup);

	});

}

//---heat specific

function heat_specific(equipment,pickup){

	$("#loading").css("visibility","visible");

	var layer;

	if(equipment == ""){

		heatmap.setMap(null);

		$("#loading").css("visibility","hidden");

		return;

	}

	var get_layer = $.getJSON("https://trulos-loads.data-ai.com/freight/grab_specific_equip.php?equip=" + equipment + "&collect=" + pickup,function(response){

		layer = response;

	});

	get_layer.complete(function(){

		$("#loading").css("visibility","hidden");

		var heat_layer = [];

		for(var i = 0; i < layer.length; i++){

			var point = new Object;

			point = {location: new google.maps.LatLng(layer[i].lat, layer[i].lng),weight: layer[i].weight };

			heat_layer.push(point);

		}

		heatmap.setMap(null);

		heatmap = new google.maps.visualization.HeatmapLayer({
		  data: heat_layer,
		  radius: 25
		});

		heatmap.setMap(map);

	});

}

//---display coord

function show_coord(pos){

	lat = pos.coords.latitude;
	lon = pos.coords.longitude;

	$("[name=lat]").val(lat.toString());
	$("[name=lon]").val(lon.toString());

}

//---coordinates error

function error(err) {

  console.log('ERROR(' + err.code + '): ' + err.message);

}

//---locate

function locate(){

	var options = {
		enableHighAccuracy: true,
		timeout: 5000,
		maximumAge: 0
	};


	geo = navigator.geolocation;

	geo.watchPosition(show_coord, error, options);

	if($("#units").children().length == 0){

		grab_loads_near();

	}

}

//---grab loads near

function grab_loads_near(){

	$("#loading,.btn_row.mob #loading").css("visibility","visible");

	if($("[name=lat]").val() == "" || $("[name=lon]").val() == ""){

		$("[name=lat]").val("32.769");
		$("[name=lon]").val("-96.812");

	}else if(parseFloat($("[name=lon]").val()) > -60){

		$("[name=lat]").val("32.769");
		$("[name=lon]").val("-96.812");

	}

	var values = $("#form_nearby").serialize();

	values = (values) ? '?' + values : '' ;

	var loads;

	var get_loads = $.getJSON("https://trulos-loads.data-ai.com/nearby/loads.php" + values,function(response){

		loads = response;

	});

	get_loads.complete(function(){

		$("#loading,.btn_row.mob #loading").css("visibility","hidden");

		if($("#units").find(".condensed").length > 0){

			dt.destroy();

		}

		dt = $('#units').DataTable({

			"aaData": loads,
			"responsive": true,
			"destroy": true,
			"aoColumns": [
				{ "sTitle": "Details", "sClass": "center"},

			],
			"aaSorting": [[ 0, "asc" ]] ,
			"iDisplayLength": 100,
			"oLanguage": {"sSearch": "<span class='filter_str'>Filter by:</span>"},
			"fnDrawCallback": function(){

				$('[data-toggle="popover"]').popover({html:true});

				bind_dollar();

			}

		});

		bind_dollar();

	});

}

//---capitalize words

String.prototype.capitalize = function() {
    return this.replace(/(?:^|\s)\S/g, function(a) { return a.toUpperCase(); });
};

//---get route

function calcRoute(from,to){

	border_snoop = 0;

	if($("#summary_panel").is(":visible") == false || $("#route_panel").is(":visible") == false || $("#directions_panel").is(":visible") == false){

		$("#summary_panel,#route_panel,#directions_panel").fadeIn('slow');

	}

	loading_gif(true);

	var start = from;
	var end = to;
	//alert("start"+start);
	//alert("End"+end);
	var re = /(Puerto Rico)/;

	if(re.test(from) || re.test(to)){

		render_error(from,to);

		return;

	}

	var request = {
		origin:start,
		destination:end,
		travelMode: google.maps.DirectionsTravelMode.DRIVING,
		unitSystem: google.maps.DirectionsUnitSystem.METRIC
	};

	function round(number,X) {
		X = (!X ? 2 : X);
		return Math.round(number*Math.pow(10,X))/Math.pow(10,X);
	}
	//var directionsService = new google.maps.DirectionsService();

	directionsService.route(request, function(response, status) {

	  if (status == google.maps.DirectionsStatus.OK) {

		dir_response = response;

		state_codes();

		$("#distance").hide();

		/*
		
		//---

		directionsDisplay = new google.maps.DirectionsRenderer();

		var opt = {

			zoom: 8,
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: {lat: 39.8282, lng: -98.5795}
		}
		
		route_map = new google.maps.Map(document.getElementById("map"), opt);
		directionsDisplay.setMap(route_map);

		//---

		directionsDisplay.setDirections(response);
		
		*/

		var distance = response.routes[0].legs[0].distance.text;
		var time_taken = response.routes[0].legs[0].duration.text;

		var calc_distance = response.routes[0].legs[0].distance.value;

		function roundNumber(numbr,decimalPlaces){

			var placeSetter = Math.pow(10, decimalPlaces);
			numbr = Math.round(numbr * placeSetter) / placeSetter;
			return numbr;

		}

		var mi =  calc_distance / 1.609;
		var mi = mi/1000;
		var mi = roundNumber(mi, 2);

		$(".from_cell").html(response.routes[0].legs[0].start_address);
		$(".to_cell").html(response.routes[0].legs[0].end_address);

		$(".t_cell").html(time_taken);
		
		/*
		
		var steps = "<ul class='dir_steps'>";
		var myRoute = response.routes[0].legs[0];

		for (var i = 0; i < myRoute.steps.length; i++) {

			steps += "<li>" + myRoute.steps[i].instructions + "</li>";

		}

		steps += "</ul>";

		$("#steps").html('<div class="steps-inner"><h5>Driving directions to '+response.routes[0].legs[0].end_address+'</h5>'+steps+'</div>');
		
		*/
		
	  }else{

		render_error(from,to);

	  }

	});

}

//---render error

function render_error(from,to,msg){

	loading_gif(false);

	if($("#distance").is(":visible") == false){

		$("#distance").show();

	}

	$("#route_panel,#directions_panel").hide();

	if(msg == undefined){

		var msg = "Error: Route is outside our coverage area.";

	}

	$(".from_cell").html(from.toUpperCase());
	$(".to_cell").html(to.toUpperCase());

	$(".t_cell").html("n/a");

	clearTimeout(pb);

	var mileage_data = new Object;

	mileage_data.to = to;
	mileage_data.from = from;

	mileage_data.regions = [];

	cover_data.push(mileage_data);

	$("#by_state").html('<table style="margin-top: 8px;"><tr><td><span style="font-size: 13px; color: #ff0000;">'+ msg +'</span></td></tr></table>');

}

//---toggle gif

function loading_gif(mode){

	if(mode == true){

		var w = $("#address_panel").width() - 40;
		$("#address_panel .panel-heading").css("background-position",w + 'px 6px');

	}else{

		var w = $("#address_panel").width() - 40;
		$("#address_panel .panel-heading").css("background-position", w + "px -50px");

	}

}

//---div check

function div_tags(step,index,og){

	var text = step.instructions;

	text = (function(text){

		var re_state = /Passing through\s([a-zA-Z\s,\/<>"\:\=\-\d\.]+)/;

		if(re_state.test(text)){

			var re_state_a = /,/;

			if(re_state_a.test(text)){

				var matches = re_state.exec(text);

				var state = matches[0];

				state = state.replace(/</g,"</div>");
				state = state.replace(/,/g,"</div>Passing through");

				return state;

			}else{

				return text;

			}

		}else{

			return text;

		}

	})(text);

	var re = /<\/div>/;

	if(re.test(text)){

		return text;

	}else{

		return null;

	}

}

//---get instructions

function instruct(text,index,og){

	var state = (function(text){

		var re = /(Saskatchewan)|(Nevada)|(Arizona)|(Georgia)|(Kansas)|(Connecticut)|(Indiana)|(Maine)|(Massachusetts)|(Montana)|(Maryland)|(Arkansas)|(Alabama)|(Virginia)|(Nebraska)|(Guam)|(Kentucky)|(Colorado)|(District of Columbia)|(Wisconsin)|(New York)|(Vermont)|(South Dakota)|(Michigan)|(Missouri)|(North Carolina)|(Rhode Island)|(Idaho)|(Delaware)|(New Hampshire)|(Minnesota)|(North Dakota)|(Oklahoma)|(Iowa)|(Tennessee)|(Florida)|(Louisiana)|(New Mexico)|(Wyoming)|(Pennsylvania)|(South Carolina)|(Utah)|(West Virginia)|(Washington)|(Mississippi)|(Oregon)|(Illinois)|(New Jersey)|(California)|(Ohio)|(Texas)|(British Columbia)|(Manitoba)|(New Brunswick)|(Northwest Territories)|(Nova Scotia)|(Ontario)|(Prince Edward Island)|(Quebec)|(Québec City)|(Yukon)|(Alberta)|(Alaska)/;

		if(re.test(text)){

			var matches = re.exec(text);

			return matches[0];

		}else{

			return null;

		}

	})(text);

	if(state)
		return state;

	var state = (function(text){var re_state = /Passing through\s([a-zA-Z\s]+)[^\/]/; if(re_state.test(text)){var matches = re_state.exec(text);var state = matches[1];return state;}return state;})(text)

		if(state)
			return state;

	var re = /Entering/g;

	if(re.test(text)){

		//---

		var state = (function(text){var re_state = /\((.*?)\)/; if(re_state.test(text)){var matches = re_state.exec(text);var state = matches[1];return state;}return state;})(text)

		if(state)
			return state;

		//---

		var re_state = /Entering\s([a-zA-Z\s]+)[^\/]/g;
		var matches = re_state.exec(text);

		var state = matches[1];

		if(state == "the United States of America " || state == "Canada "){

			return null;

		}else{

			state = state.replace("Territory","");
			state = state.trim();

			return state;

		}

	}else{

		return null;

	}

}

//---check name

function check_name(text,index,og){

	var re = /Saskatchewan|Nevada|Arizona|Georgia|Kansas|Connecticut|Indiana|Maine|Massachusetts|Montana|Maryland|Arkansas|Alabama|Virginia|Nebraska|Guam|Kentucky|Colorado|District of Columbia|Wisconsin|New York|Vermont|South Dakota|Michigan|Missouri|North Carolina|Rhode Island|Idaho|Delaware|New Hampshire|Minnesota|North Dakota|Oklahoma|Iowa|Tennessee|Florida|Louisiana|New Mexico|Wyoming|Pennsylvania|South Carolina|Utah|West Virginia|Washington|Mississippi|Oregon|Illinois|New Jersey|California|Ohio|Texas|British Columbia|Manitoba|New Brunswick|Northwest Territories|Nova Scotia|Ontario|Prince Edward Island|Quebec|Québec City|Yukon|Alberta|Alaska/g;

	if(re.test(text)){

		var re_a = /Entering|Passing/g;

		if(re_a.test(text)){

			return text;

		}else{

			return null;
		}

	}else{

		return null;

	}

}

//---gen names

function gen_names(){

	var state_names = dir_response.routes[0].legs[0].steps.map(div_tags);

	state_names = state_names.filter(function(e){return e;});

	state_names = state_names.join();

	state_names = state_names.split("/div>");

	state_names = state_names.map(check_name);

	state_names = state_names.filter(function(e){return e;});

	state_names = state_names.map(instruct);

	state_names = state_names.filter(function(e){return e;});

	state_names = state_names.filter(function(item, pos, arr){

		return pos === 0 || item !== arr[pos-1];

	});

	state_names = state_names.filter(function(e){return e;});

	return state_names;

}

//---gen name

function gen_names_fs(){

	sequence = [];

	var path = path_full();
	path = path.map(gen_latlng);

	path = new google.maps.Polyline({path: path});
	path = path.simplify(0.01);

	path = path.map(get_nodes);

	path = path.map(function(node){return [node[1],node[0]]});

	var path_str = JSON.stringify(path);

	var data = {"path": path_str};

	var codes = [];

	var get_states = $.post("https://trulos-loads.data-ai.com/mileage/state_miles-x.php",data,function(response){

		codes = response;

	});

	get_states.complete(function(){

		sequence = codes;

	});

	return get_states;

}

//---merge steps

function merge_steps(route_steps){

	var path = [];

	for(var i = 0; i < route_steps.length; i++){

		var step = route_steps[i];

		for(var j = 0; j < step.length; j++){

			path.push(step[j]);

		}

	}

	return path;

}

//---get nodes

function get_nodes(node,index,og){

	return [node.lat(),node.lng()];

}

//---get steps

function get_steps(step,index,og){

	var fragment = step.lat_lngs.map(get_nodes);

	return fragment;

}

//---detailed route

function path_full(){

	var route_steps = dir_response.routes[0].legs[0].steps.map(get_steps);

	var path = merge_steps(route_steps);

	return path;

}

//---export path

function export_path(path,code){

	var data = {"path": JSON.stringify(path),"code": code};

	var is_exported;

	var exported = $.post("https://trulos-loads.data-ai.com/mileage/export_path.php",data,function(response){

		is_exported = response;

	});

	exported.complete(function(){

		console.log(is_exported);

	});

}

//---flatten path

function o_flatten(point,index,og){

  var mode = this.mode;

  if(mode === "lnglat"){

	  return [point.lng(),point.lat()];

  }else if(mode === "latlng"){

	  return [point.lat(),point.lng()];

  }

}

//---get path

function get_path(mode){

	var path = dir_response.routes[0].overview_path;

	path = path.map(o_flatten,{'mode':mode});

	path = path.filter(function(e){return e;});

	return path;

}

//---route tips

function route_tips(){

	var path = get_path("lnglat");

	return [path[0],path[path.length - 1]];

}

//---state codes

function state_codes(){

	var names = gen_names();

	var tips = route_tips();

	var data = {

		'names': JSON.stringify(names),
		'start_address': JSON.stringify(tips[0])

	};
	var get_states = $.post("https://trulos-loads.data-ai.com/mileage/state_miles-y.php",data,function(response){

		states = response;

	});

	get_states.complete(function(){

		allocate(states);

	});

}

//---southern hemisphere

function south_hemi(node,index,og){

	if(node.lat() > 0){

		return node;

	}else{

		return null;
	}

}

//---state codes

function diagnostics(){

	//var boundaries = ["Minnesota","Quebec","Wisconsin","Michigan","Ontario","British Columbia","Nova Scotia","New Brunswick","Prince Edward Island"];

	var boundaries = ["Manitoba"];

	function plot_shp(){

		states_dia = []

		var data = {'name': boundaries[0]};

		var get_states = $.post("https://trulos-loads.data-ai.com/mileage/diagnostics.php",data,function(response){

			states_dia = response;

		});

		get_states.complete(function(){

			shp_ln = new google.maps.Polyline({path: states_dia[0].polygon[0].map(gen_latlng)});
			shp_ln = shp_ln.simplify(0.01);

			shp_ln = shp_ln.map(south_hemi);
			shp_ln = shp_ln.filter(function(e){return e;});

			shp_ln = new google.maps.Polygon({path: shp_ln, strokeColor: '#00ff00',fillColor: '#00ff00'});
			shp_ln.setMap(route_map);

			shp = shp_ln.getPath();
			shp = shp.j;

			shp = shp.map(o_flatten,{'mode':"latlng"});

			shapefile = [shp];

			export_path(shapefile,boundaries[0]);

			boundaries.shift();

			if(boundaries.length > 0){

				plot_shp();

			}

		});

	}

	plot_shp();

}

//---get points

function gen_latlng(point,index,og){

  return new google.maps.LatLng(point[0],point[1]);

}

//---render miles

function render_miles(states){

	var mu = '<table class="table table-stripe" style="margin-top: 8px;">'+

				'<thead>'+

					'<tr>'+

						'<th style="width: 50px;">'+
							'State'+
						'</th>'+

						'<th>'+
							'Distance (miles)'+
						'</th>'+

					'</tr>'+

				'</thead>';

	var d = 0;

	for(var i = 0; i < states.length; i++){

		var mileage;

		if(states[i].distance != undefined){

			d = d + states[i].distance;
			mileage = states[i].distance.toFixed(2);

		}else{

			d = d + 0;
			mileage = 'error';

		}

		mu = mu + '<tr>'+

				'<td>'+
					states[i].state +
				'</td>'+

				'<td>'+
					mileage +
				'</td>'+

			'</tr>';

	}

	var total = d.toFixed(2);

	mu = mu + '<tfoot>'+

			'<tr class="success">'+

				'<td style="width: 50px;">'+

					'Total'+

				'</td>'+

				'<td>'+

					total+

				'</td>'+

			'</tr>'+

		'</tfoot></table>';

	$("#by_state").html(mu);

	loading_gif(false);

	$("#distance").fadeIn("fast");

}

//---array unique

Array.prototype.unique = function() {
	var unique = [];
	for (var i = 0; i < this.length; i++) {
		if (unique.indexOf(this[i]) == -1) {
			unique.push(this[i]);
		}
	}
	return unique;
};

/* point: the point of which location is needed
 * returns: the location of point */
function get_state(node,tol){

	if(tol === undefined){

		tol = 0.01;

	}

	var tf;

	for(var i = 0; i < states.length; i++){

		switch(states[i].state){

			case "KY":
			var boundary = states[i].polygon[1][0].map(gen_latlng);
			break;

			default:
			var boundary = states[i].polygon[0].map(gen_latlng);
			break;

		}

		boundary = new google.maps.Polygon({

			paths: boundary

		});

		tf = google.maps.geometry.poly.isLocationOnEdge(new google.maps.LatLng(node[0],node[1]),boundary,tol);

		if(tf === true){

			return states[i].state;

		}

		tf = google.maps.geometry.poly.containsLocation(new google.maps.LatLng(node[0],node[1]),boundary);

		if(tf === true){

			return states[i].state;

		}else{

			continue;

		}

	}

	return "XX";

}
/* route_section: array of points to search for state change within
 * from: index (inclusive) from which state change search should begin
 * to: index (exclusive) at which state search should end
 * returns: null if there is no state change, otherwise the triple:
 *          (last index before first state change, before state, after state) */

function single_change_info(route_section, from, to, tol) {

	if(tol === undefined){

		tol = 0.01;

	}

	// If there are less than two points, there can be no state change
	if(to - from < 1) return null;
	var N2 = Math.ceil((from + to) / 2);
	var state1 = get_state(route_section[N2-1],tol);
	var state2 = get_state(route_section[N2],tol);

	if(get_state(route_section[from]) != state1){

		return single_change_info(route_section, from, N2, tol);

	} else if(state1 != state2) {

		return [N2-1, state1, state2];

	} else if(to == from + 2) {

		if(get_borders.index == 0){

			border_snoop++;

			if(border_snoop > 20){

				setTimeout(function(){

					var from = $(".from_cell").html();
					var to = $(".to_cell").html();

					render_error(from,to,"Error: we are unable to determine intermediate states for this route.");

				},1000);

				return [route_section.length -1,state1,state1];

			}

			return single_change_info(route_section, 0, route_section.length - 1, 0.001);

		}

		return null;

	} else {

		return single_change_info(route_section, N2, to, tol);

	}

}

//---get borders

function get_borders(route){

	state_lines = [];

	if(states.length == 1){

		var last = route.length - 1;
		var lone_state = states[0].state;

		state_lines = [[0,lone_state,lone_state]];

		return [0,last];

	}

	var border;

	var indicies = [0];

	var to = route.length - 1;

	for(var i = indicies[indicies.length - 1]; i < route.length; i++ ){

		this.get_borders.index = i;

		border = single_change_info(route, i, to);

		if(border === null){

		  break;

		}else{

			state_lines.push(border);

			i = border[0];

			indicies.push(border[0]);

		}

	}

	indicies.push(route.length - 1);

	return indicies;

}

//---section indicies

function range(value,index,og){

	if(index == og.length -1){

		return null;

	}

	var a = value;
	var b = og[index + 1];

	return [a,b];

}

//---section distances

function sec_dist(border,index,og){

	var nodes = this;

	var s = border[0];
	var e = border[1];

	var frag = nodes.slice(s,e);

	var distance = google.maps.geometry.spherical.computeLength(frag);

	distance = (distance/1000)/1.609;

	border.push(distance);

	return border;

}

//---substitute state

function sub_state(border,index,og){

	var sequence = this;

	if(border[2] === "XX"){

		var state2 = border[3];

		var i = sequence.indexOf(state2);

		var j = i - 1;

		var state = sequence[j];

		border.splice(2,1,state);

		return border;

	}else if(border[3] === "XX"){

		var state1 = border[2];

		var i = sequence.indexOf(state1);

		var j = i + 1;

		var state = sequence[j];

		border.splice(3,1,state);

		return border;

	}else{

		return border;

	}

}

//---section stopper

function stopper(border,index,og){

	if(index === 0){

		border.splice(0,0,0);

		return border;

	}else{

		border.splice(0,0,og[index - 1][1]);

		return border;

	}

}

//---allocate distances

function allocate(states){

	var route = path_full();

	var sequence = states.map(function(state){return state.state;});

	var borders = get_borders(route);

	state_lines = state_lines.map(stopper);

	state_lines.push([state_lines[state_lines.length - 1][1],route.length,sequence[sequence.length - 1],sequence[sequence.length - 1]]);

	state_lines = state_lines.map(sub_state,sequence);

	var indicies = borders;

	var mileage_data = new Object;

	mileage_data.to = dir_response.routes[0].legs[0].end_address;
	mileage_data.from = dir_response.routes[0].legs[0].start_address;

	if(indicies.length == 0){

		mileage_data.regions = [];

		cover_data.push(mileage_data);

		var w = $("#address_panel").width() - 40;

		$("#address_panel .panel-heading").css("background-position", w + "px -50px");

		$("#distance").fadeIn();

		$("#by_state").html('<table style="margin-top: 8px;"><tr><td><span id="mileage_error" class="label label-danger">Error calculating mileage by state.</span></td></tr></table>');

		return;

	}

	var nodes = route.map(gen_latlng);

	state_lines = state_lines.map(sec_dist,nodes)

	var regions = [];

	var seen = [];

	for(var i = 0; i < state_lines.length; i++){

		var region = new Object;

		region.state = state_lines[i][2];

		if(seen.indexOf(state_lines[i][2]) > -1){

			var j = seen.indexOf(state_lines[i][2]);

			regions[j].distance = regions[j].distance + state_lines[i][4];

			continue;

		}

		seen.push(state_lines[i][2]);

		region.distance = state_lines[i][4];

		regions.push(region);

	}

	mileage_data.regions = regions;

	cover_data.push(mileage_data);

	render_miles(regions);

}

//---mileage totals

function mileage(regions){

	if(regions.length == 0){

		return ["Unable to calculate mileage",0];

	}

	var totals = 0;

	var summary = '';

	for(var i = 0; i < regions.length; i++){

		var region = regions[i];

		summary = summary + region.state + ': ' + region.distance.toFixed(2) + ' |';

		totals = totals + region.distance;

	}

	summary = summary.replace(/\|$/,"");

	totals = totals.toFixed(2);

	return [summary,totals];

}
