<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Tour</title>
	<script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
	<!-- Bootstrap CSS -->
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
	<style>
		#r1{ margin-top: 10px; }
		#r3{ margin-top: 10px; }
		#r0 {background-color: #99FFCC; }
		body { background-color: : #CCFFCC; }
		.small {height: 50px;}
	</style>
</head>
<body>
	<h1 class="text-center"><a href="http://localhost/mytour/index.php/tour/show/1/x">My Tour</a></h1>
	<div id="r0" class="container">
		<div id="r1" class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<?php echo "<b> Tour to travel ".$current_tour_name. ' '. $current_tour_price. ' USD </b>'; ?>
			</div>
			<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<?php echo '<b> '.$current_place_name. '</b>';?>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<b>All tours</b> | <a href="http://localhost/mytour/gmap/find_map"><b>Search place</b></a>
			</div>

		</div>

		<div class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<div id="map" style="width: 100%; height: 350px;"></div>
			</div>
			<div id="big" class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<img alt="" width="100%" height="350px" src="http://localhost/mytour/imageTour/logo.jpg">
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<?php echo $all_tours; ?>
			</div>
		</div>

		<div id="r3" class="row">
			<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
				<img alt="" width="100%" height="60px" src="http://localhost/mytour/imageTour/logo.jpg">
			</div>
			<div id="pic" class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
				<?php echo $small_pics; ?>
			</div>
		</div>
		<br>
	</div>
	<div id="cart" class="container">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<h3>Your carts</h3>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Tour ID</th>
						<th>Tour Name</th>
						<th>Price</th>
						<th>Amount</th>
						<th>Sum</th>
					</tr>
				</thead>
				<tbody>
					<?php
					if($cart <> ' '){
						foreach ($cart as $c) {
							echo '<tr>';
							echo '<td>'.$c['tour_id'].'</td>';
							echo '<td>'.$c['tour_name'].'</td>';
							echo '<td>'.$c['tour_price'].'</td>';
							echo '<td>'.$c['count'].'</td>';
							echo '<td>'.$c['sub_total'].'</td>';
							echo '</tr>';
						}
					}
					?>
				</tbody>
			</table>
			<?php
			if($cart <> ' '){
				echo "<h3>Total: ".number_format($total,0,',',' ')." USD </h3>";
			}
			?>
		</div>
	</div>
	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		var s3 = <?php echo json_encode($this->uri->segment(3)); ?>;
    // Get from controller 
    var c = <?php echo json_encode($c)?>;
    var zoom = <?php echo json_encode($zoom)?>;
    var locations = <?php echo json_encode($locations)?>;

    var center = new google.maps.LatLng(c.lat, c.lng);
    var mapOption = {
    	zoom: zoom,
    	center: center,
    	mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    //---- END get from controller
    
    var map = new google.maps.Map(document.getElementById('map'), mapOption);

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {  
    	marker = new google.maps.Marker({
    		position: new google.maps.LatLng(locations[i][1], locations[i][2]),
    		map: map
    	});

    	google.maps.event.addListener(marker, 'click', (function(marker, i) {
    		return function() {
    			infowindow.setContent(locations[i][0]);
    			//infowindow.open(map, marker);
    			
    			var url="http://localhost/mytour/index.php/tour/show/"+locations[i][4]+"/x";
    			window.location.href = url;
    			//alert('C0: '+locations[i][0]+'-c1: '+locations[i][1]+'-c2: '+locations[i][2]+'-c3: '+locations[i][3]+'-c4: '+locations[i][4]);
    		}
    	})(marker, i));
    }

    $('#pic').on('click', '.small', function(event){
    	event.preventDefault();
    	var pic = $(this).attr('id');
    	$('#big').html('<img alt="" width="100%" height="350px" src="http://localhost/mytour/imageTour/'+pic+'">');
    });
</script>

</body>
</html>