		<!DOCTYPE html>
<html>

	<head>
		<title>Test </title>
		</head>
	<body>
<!--- routes modal --->
		<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=AIzaSyDnID4vOGNgMgJxF3Y3AR2SwjzueSonmW0&libraries=geometry&sensor=false&v=weekly"></script>

		<script>
			page = "mileage";
		</script>
			<div id="vessel">
				<div id="map_wrap" class="core_item">
					<!-- addresses --->
					<div id="address_panel" class="panel panel-default">
						<div class="panel-heading" >
							Address Information  TEXAS  NEW JERSEY
                        </div>
						<div class="panel-body">
							<form id="form_addresses" >
								<table style="width: 70%">
									<tr style="height: 40px">
										<td>
											<input type="text" name="from" class="form-control" style="padding-left:7px; text-transform: uppercase; font-size: 11px;" placeholder="Origin address" value="">
										</td>
									</tr>
									<tr style="height: 40px">
										<td>
											<input type="text" name="to" class="form-control" style="padding-left:7px; text-transform: uppercase; font-size: 11px;" placeholder="Destination address" value="">
										</td>
									</tr>
									<tr style="height: 40px">
										<td>
											<button type="button" onclick="get_addresses();" class="btn btn-default"> Calculate Mileage</button>
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
					<!-- distance -->

					<div id="summary_panel" class="panel panel-default">
						<div class="panel-heading">
							Summary
						</div>
						<div class="panel-body">
							<div id="distance">
								<table>
									<tr>
										<td style="width: 75px;">
											From:
										</td>
										<td class="from_cell">
										</td>
									</tr>
									<tr>
										<td>
											To:
										</td>
										<td class="to_cell">
										</td>
									</tr>
									<tr>
										<td>
											Duration:
										</td>
										<td class="t_cell">
										</td>
									</tr>
								</table>
								<div id="by_state">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<script src="../ifta/main_mileage/jquery-1.11.1.min.js"></script>
		<script src="../ifta/main_mileage/main.js"></script>
	</body>
	</html>
