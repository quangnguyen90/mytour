<?php 

require_once 'conn.php';
$lat=($_GET['obj']['lat'][0]);
$lng=($_GET['obj']['lng'][0]);
$address=($_GET['obj']['address'][0]);


$var = array(
  'lat' => $lat,
  'lng' => $lng,
  'address' => $address,
  'name' => $address
);

$req = $DB->prepare("INSERT INTO markers (lat,lng,address,name) VALUE (:lat,:lng,:address,:name)");
$req->execute($var);

?>