<?php
$arrMap = array();
$address = (isset($_POST['address']) && $_POST['address'] != null) ? $_POST['address'] : "";
$lat = (isset($_POST['lat'])  && $_POST['lat'] != null) ? $_POST['lat'] : "";
$lng = (isset($_POST['lng'])  && $_POST['lng'] != null) ? $_POST['lng'] : "";

function getlatlong($address)
{
  $url = 'http://maps.googleapis.com/maps/api/geocode/json?address=' . urlencode($address) . '&sensor=true';
  $json = @file_get_contents($url);
  $data = json_decode($json);
  if ($data->status == "OK")
    return $data;
  else
    return false;
}

function getaddress($lat, $lng)
{
  $url = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . trim($lat) . ',' . trim($lng) . '&sensor=true';
  $json = @file_get_contents($url);
  $data = json_decode($json);
  if ($data->status == "OK")
    return $data->results[0]->formatted_address;
  else
    return false;
}

if ($lat && $lng) {
  $arrMap['address'][] = getaddress($lat, $lng);
  $arrMap['lat'][] = $lat;
  $arrMap['lng'][] = $lng;
}
if ($address) {
  $coordinates = getlatlong($address);
  $arrMap['lat'][] = @$coordinates->results[0]->geometry->location->lat;
  $arrMap['lng'][] = @$coordinates->results[0]->geometry->location->lng;
  $arrMap['address'][] = $address;
}

if($arrMap != NULL && $arrMap != ''){
  var_dump($arrMap);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Localizing the Map</title>
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
  <meta charset="utf-8">
  <style>
    html, body, #map-canvas {
      height: 90%;
      margin: 20px;
      padding: 0px
    }
  </style>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=true&language=en"></script>
  <script type="text/javascript">
    function initialize() {
      var map = new google.maps.Map(document.getElementById("map-canvas"), {
        center: new google.maps.LatLng(28.635308, 77.22496),
        zoom: 4,
        mapTypeId: 'roadmap'
      });
      var infoWindow = new google.maps.InfoWindow;

      <?php for ($i = 0; $i < count($arrMap['lat']); $i++) { ?>
        var lat = '<?php echo $arrMap['lat'][$i] ?>';
        var lng = '<?php echo $arrMap['lng'][$i] ?>';
        var address = '<?php echo $arrMap['address'][$i] ?>';
        var point = new google.maps.LatLng(parseFloat(lat), parseFloat(lng));
        var marker = new google.maps.Marker({
          map: map,
          position: point
        });
        var html = '<div id="content">'+
        '<div id="siteNotice">'+
        '</div>'+
        '<h1 id="firstHeading" class="firstHeading"> </h1>'+
        '<div id="bodyContent">'+
        '<p><b>Latitude: </b>'+lat+
        '<br><b>Longitude: </b>'+lng+
        '<br><b>Address: </b>'+address+
        '</p>'+
        '</div>'+
        '</div>';
        bindInfoWindow(marker, map, infoWindow, html);
        <?php } ?>
        google.maps.event.addListener(map,'click',function(event) {
                // alert(event.latLng.lat() + ', ' + event.latLng.lng());
                var clickLat = event.latLng.lat().toFixed(8);;
                var clickLng = event.latLng.lng().toFixed(8);;
                document.getElementById("lat").value=clickLat;
                document.getElementById("lng").value=clickLng;
                marker.setPosition(event.latLng);
              });

      }

      function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
        });
      }
      google.maps.event.addDomListener(window, 'load', initialize);

    </script>
  </head>
  <body>
    <form action="" name="searchForm" id="searchForm" method="post">
      <h4>SEARCH PLACE</h4>
      <a href="http://localhost/mytour/"><h5>Home</h5></a>

      <div class="click-latlong">
        <label>Latitude: </label>
        <input type="text" name="lat" id="lat" value="">
        <label>Longitude: </label>
        <input type="text" name="lng" id="lng" value="">
        <input type="submit" name="sbmtLatlong" id="updateLatlong" value="Submit"/>
      </div>
      <div class="click-latlong">
        <label>Address: </label><input type="text" name="address" id="address" value="" />
        <input type="submit" name="sbmtAddress" id="sbmtFrm" value="Search" />
      </div>
    </form>
    <div id="map-canvas"></div>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
      jQuery(document).ready(function($) {
        $('#updateLatlong').click(function(event) {
          var arrMap=<?php echo json_encode($arrMap); ?>;
          $.get('http://localhost/mytour/gmap/add_map', {obj:arrMap},function(data) {
            var json_response = JSON.parse(data);
            alert(json_response.info);
          });
        });
      });
    </script>
  </body>
  </html>
