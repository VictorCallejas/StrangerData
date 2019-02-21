<?php
$origin_latitud = $_GET["origin_latitud"];
$origin_longitud = $_GET["origin_longitud"];
$destination_latitud = $_GET["destination_latitud"];
$destination_longitud = $_GET["destination_longitud"];
$origin = $origin_latitud.",".$origin_longitud;
$destination = $destination_latitud.",".$destination_longitud;
 
$andando = $_GET["andando"];
$coche = $_GET["coche"];
$transporte_publico = $_GET["transporte_publico"];
$bici = $_GET["bici"];
if ($andando=="si"){
	$mode = "walking";
}else if ($coche=="si"){
	$mode = "driving";
}else if ($transporte_publico=="si"){
	$mode = "driving";
} else if ($bici=="si"){
	$mode = "bicycling";
}else{
	$mode = "walking";
}
/*$origin = "39.4688751,-3.3976791";
$destination = "39.4688751,-3.4976792"; */
//$mode="walking"; //"available_travel_modes" : [ "DRIVING", "BICYCLING", "WALKING" ],
$request="https://maps.googleapis.com/maps/api/directions/json?origin=";
$request.=$origin;
$request.="&destination=";
$request.=$destination;
$request.="&mode=";
$request.=$mode;
$request.="&mode=walking&key=AIzaSyA_i6oWqxHiZThh7uzo9UZxg3gShyhqGvU";
 
$jsondata = file_get_contents($request);
$response_a = json_decode($jsondata);
$datanumber =  sizeof($response_a->routes[0]->legs[0]->steps);
for ($i = 0; $i < $datanumber; $i++) {
  $steps[$i] = (string)$response_a->routes[0]->legs[0]->steps[$i]->start_location->lat;
  $steps[$i] .= ",";
  $steps[$i] .= (string)$response_a->routes[0]->legs[0]->steps[$i]->start_location->lng;
}
$steps[$datanumber] = $destination;
echo json_encode($steps);
 
?>
