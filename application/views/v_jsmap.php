<!DOCTYPE html>
<html> 
<head> 
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
  <title>Google Maps Multiple Markers</title> 
  <script src="http://maps.google.com/maps/api/js?sensor=false" 
          type="text/javascript"></script>
</head> 
<body>
  <div id="map" style="width: 500px; height: 400px;"></div>

  <script type="text/javascript">
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
          infowindow.open(map, marker);
        }
      })(marker, i));
    }
  </script>
</body>
</html>