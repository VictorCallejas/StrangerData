<!DOCTYPE text>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 

     
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="dashboard/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="dashboard/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="dashboard/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="dashboard/css/style.css" rel="stylesheet">
    <link href="dashboard/css/style-responsive.css" rel="stylesheet" />
    <link href="dashboard/style4.css" rel="stylesheet">

   </head>
  <body>
  <!-- container section start -->
  <section id="container" class="">
      <section id="main-content" style="min-width:100%;min-height:100%;margin-left:0px;">
            <div id="DIV_16"> <!-- Recuadro izquierda -->
                <div id="DIV_22"><!-- azul oscuro -->
                  <h1 id="H1_23"> Opciones de ruta </h1>
                  <div id="DIV_24">                       
                    <div id="DIV_26">
                      <div id="DIV_27">
                        <h2 id="H2_28"> Prefiero </h2>
                        <div> <input type="checkbox" value="1" id="Libreta" />Libreta </div>
                        <div> <input type="checkbox" value="2" id="Ingreso" />Ingreso </div>
                       </div>
                      <div id="DIV_57">
                        <h2 id="H2_58"> Rutas </h2>
                        <input  type="radio"  name="rutas" id="red"/>  Mejor ruta <br>
                        <input  type="radio"  name="rutas" id="pink"/>  Mejor ruta <br>
                      </div>
                    </div>
                  </div>
                </div>
            </div>   
                 <div class="col-lg-12" style="min-height:100%;margin-right:0px; padding:0px;">
                  <div style="height:80%; width:100%;" id="map"></div>
                </div>
         </section>
   </section> 
    <!-- javascripts -->
    <script src="dashboard/js/jquery.js"></script>
    <script src="dashboard/js/bootstrap.min.js"></script>
    <script src="dashboard/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="dashboard/js/d3.v3.min.js"></script>
    <script src="dashboard/js/radarChart.js"></script>    
   <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?key=AIzaSyA_i6oWqxHiZThh7uzo9UZxg3gShyhqGvU"></script>

<?php



//$origin = "39.4688751,-3.3976791";
//$destination = "39.688751,-3.3976791"; 
$request="https://maps.googleapis.com/maps/api/directions/json?origin=";
$request.=$origin;
$request.="&destination=";
$request.=$destination;
//$request.="&mode=walking&key=AIzaSyA_i6oWqxHiZThh7uzo9UZxg3gShyhqGvU";

$jsondata = file_get_contents($request);
$response_a = json_decode($jsondata);
$datanumber =  sizeof($response_a->routes[0]->legs[0]->steps);


for ($i = 0; $i < $datanumber; $i++) {
  $steps[$i] = (string)$response_a->routes[0]->legs[0]->steps[$i]->start_location->lat;
  $steps[$i] .= ",";
  $steps[$i] .= (string)$response_a->routes[0]->legs[0]->steps[$i]->start_location->lng;
}
$steps[$datanumber] = $destination;


include 'conexionbbdd.php';
 
//$query  = "SELECT * FROM cajeros limit 10";
//$query2  = "SELECT * FROM oficinas limit 10";
?>     


<script>   
var map;
var layer;
var bounds;
var polyline;
var valor_baston= 0;
var markers = [];
 var latitud_makers = [];
var longitud_makers = [];
var posicion_general = 0;
var posicion_inicial=0;
var posicion_final=0;
var steps= [];
var step_duration= [];


var ubicado="no"; //si es si, significa que coge la latitud y longitud, si es no, solo muestra cajeros de españa dependiendo de los parametros que elija, si/no
var latitud_url=""; //latitud de orijen del usuario (ubicado=si) tipo double
var longitud_url=""; //longitud de orijen del usuario (ubicado=si) tipo double
var libreta_url=""; //cajeros que permiten libreta, si/no
var ingreso_url=""; //cajeros que permiten ingreso, si/no
var recibos_url=""; //cajeros que permiten recibos, si/no
var contactless_url=""; //cajeros que permiten contactless, si/no
var transferencia_url=""; //cajeros que permiten transferencias, si/no
var extraer_url=""; //cajeros que permiten extraer, si/no
var con_saldo_url=""; //cajeros que permiten contactless, si/no
var busca_oficina_url=""; //el usuario está buscanto oficinas, si/no
var busca_cajero_url=""; //el usuario está buscanto cajeros, si/no
var pertenece_banco_url="cajamar"; //el usuario pertenece al banco ... cajamar,santander, ...
var busca_bancos_url=""; //el usuario solo busca bancos de la entidad... ???? este no se si ponerlo
var dispuesto_url=""; //dispuesto a pagar de comision, 0, 0.65, 2 
var hora_url; ///hora de salida
var dia_url; ///dia de salida
var numero_recomendaciones=5; //numero de resultados que quiere que le recomiende 

 
var URL="https://strangerdata.club/StrangerData/dashboard/respuestas.json?ubicado="+ubicado+"&latitud="+latitud_url+"&longitud="+longitud_url+"&libreta="+libreta_url+"&ingreso="+ingreso_url+"&recibos="+recibos_url+"&contactless="+contactless_url+"&transferencia="+transferencia_url+"&extraer="+extraer_url+"&con_saldo="+con_saldo_url+"&busca_oficina_url="+busca_oficina_url+"&busca_cajero_url="+busca_cajero_url+"&pertenece_banco_url="+pertenece_banco_url+"&busca_bancos_url="+busca_bancos_url+"&dispuesto_url="+dispuesto_url+"&hora_url="+hora_url+"&dia_url="+dia_url+"&numero_recomendaciones="+numero_recomendaciones;

  
 

var origin_latitud=39.4248751;
var origin_longitud=-3.3976291;
var destination_latitud_val=[];
var destination_longitud_val=[];
var destination_latitud=0;
var destination_longitud=0;
var andando_url="";
var coche_url="";
var transporte_publico_url="";
var bici_url=""; 

var URL_nearest="https://strangerdata.club/StrangerData/dashboard/respuesta.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;
 var URL_nearest_time="https://strangerdata.club/StrangerData/dashboard/respuesta.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;


var jArray;
var punto_final_no_tocar;
var punto_inicial_no_tocar;
var request_URL_nearest=[];
var request_duration_URL_nearest=[];
var request_URL_nearest_length;
var account_time=[];

</script>

<script> 

 

function actualizarURL(){
	URL="https://strangerdata.club/StrangerData/dashboard/respuesta.json?ubicado=si&latitud="+latitud_url+"&longitud="+longitud_url+"&libreta="+libreta_url+"&ingreso="+ingreso_url+"&recibos="+recibos_url+"&contactless="+contactless_url+"&transferencia="+transferencia_url+"&extraer="+extraer_url+"&con_saldo="+con_saldo_url;
}

function actualizar_nearest(){
	URL_nearest="https://strangerdata.club/StrangerData/dashboard/respuesta.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;
}
function actualizar_nearest_tiempo(){
	 URL_nearest_time="https://strangerdata.club/StrangerData/dashboard/respuesta_tiempo.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;
}

function to_min(s){
  console.log(s);
  if(s!=null){
  	var s = s.substring(1,s.length-1);
       s = s.split(' ');
      var min = 0;
      for(i = 1;i<s.length;i+=2){
          if(s[i] == "min" || s[i] == "mins"){
              min+= parseInt(s[i-1]);
          }else if(s[i] == "hour" || s[i] == "hours"){
              min+= parseInt(s[i-1]) * 60;
          }else if(s[i] == "day" || s[i] == "days"){
              min+= parseInt(s[i-1]) * 60 * 24;
          }
      }
    return min;
  }else{
    min=0;
    return min;
  }
}
 
//console.log(Date(1399995076));
/*var myDate="26-02-2012";
			myDate=myDate.split("-");
			var newDate=myDate[1]+"/"+myDate[0]+"/"+myDate[2];
			console.log(new Date(newDate).getTime()); */ 

/*******Posibilidades********/
//Libreta 
$.ajaxSetup({cache: false });

$(document).ready(function() {
    //set initial state.
    $('#Libreta').change(function() {
        if($(this).is(":checked")) {
        	latitud_url="SI";
         	actualizarURL();
         	request_URL_nearest_length = $.get( URL, function(ss){
         		console.log(ss);
			});

         	$.when(request_URL_nearest_length).done(function(msg) {
  	     			for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){
  	      			 destination_latitud_val[i] = request_URL_nearest_length.responseJSON.cajeros[i].latitutud; //valeria
  	     			 destination_longitud_val[i] = request_URL_nearest_length.responseJSON.cajeros[i].longitud; //valeria
  	     			}
 
 
 	          	//llamo x n veces al api de google para obtener tiempo y camino
       				for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){
      					   
      					   destination_longitud=destination_latitud_val[i];
      					   destination_latitud=destination_longitud_val[i];
               			actualizar_nearest_tiempo();
                    actualizar_nearest()
               			//console.log(i+ ":" +URL_nearest);
               			//console.log(i+ ":" +destination_longitud);
               			//console.log(i+ ":" +destination_latitud);
               		
       		   			request_URL_nearest[i] = $.get(URL_nearest, function(respuesta){
      		    			steps=respuesta;
      		 		   	});
      		 		   	request_duration_URL_nearest[i] = $.get(URL_nearest_time, function(respuesta){
      		    			step_duration=respuesta;
       		 		   	}); 
      				}
  				    //cuando se traiga todos los parametros de la llamada, entoces
      	 			$.when(request_URL_nearest[request_URL_nearest.length-1], request_duration_URL_nearest[request_duration_URL_nearest.length-1]).done(function(msg2) {
      	 				  	//console.log(request_URL_nearest);
      						  console.log(request_duration_URL_nearest);

                    
       
          	 				  for(var i=0; i<request_duration_URL_nearest.length; i++){
                         account_time[i]= request_URL_nearest_length.responseJSON.cajeros[i].tiempo + to_min(request_duration_URL_nearest[i].responseText);
                           console.log("3: " +account_time[i]);
                           console.log("3: " +request_URL_nearest[i].responseText);
                       }
                       
                       //ordeno descendiente

                      console.log("yeeee:" + account_time.indexOf(Math.max.apply(Math,account_time)));
                      // account_time = account_time.sort(function(a, b){return b-a});
                      //  console.log(account_time);
                      

              //aqui meto para llamar a los puntos del recorrido. Puedo crearme que meta todos los recorridos rojo el bueno y azul 
                      
                      for(var i=0; i<request_duration_URL_nearest.length; i++){
                        if(i==account_time.indexOf(Math.max.apply(Math,account_time))){
                           jArray = JSON.parse(request_URL_nearest[i].responseText);

                        }                       
                      }

                      for(var i=0; i<jArray.length; i++){
                          var aux = jArray[i];
                          var str = aux.split(',');
                          var lat = parseFloat(str[0]);
                          latitud_makers[i] = lat;
                          var long = parseFloat(str[1]);
                          longitud_makers[i] = long;
                          markers[i] = new google.maps.LatLng(latitud_makers[i], longitud_makers[i]); 
                       }


                     punto_final_no_tocar = {lat: latitud_makers[jArray.length-1], lng: longitud_makers[jArray.length-1]};
                     punto_inicial_no_tocar = {lat: latitud_makers[0], lng: longitud_makers[0]};
                     initMap();

      				});
			 });
        	          }else{
          //console.log("uncheck");
          //  latitud_url="nofuck";
         //	actualizarURL();
         //	console.log(URL);
        }
     });
});
//Ingreso 
$(document).ready(function() {
    //set initial state.
    $('#Ingreso').change(function() {
        if($(this).is(":checked")) {
             console.log("check");
        }else{
          console.log("uncheck");
        }
     });
});





</script>


<script> 

 
function initMap() {
    var customMapTypeId = "night_mode_style"
    var zoom = 0;
    var center_lat = 0;
    var center_lon = 0;
     zoom = 6;
    center_lat = 39.4688751;
    center_lon = -3.3976791;
    
    map = new google.maps.Map(document.getElementById('map'), {
    zoom: zoom,
    minZoom: zoom,
    center: {lat: center_lat, lng: center_lon},
     mapTypeControlOptions: {
      mapTypeIds: [customMapTypeId]
    }
  });


   var iconsetngs = {
        path: google.maps.SymbolPath.FORWARD_CLOSED_ARROW
     };

    var polylineoptns = {
        strokeOpacity: 0.8,
        strokeWeight: 3,
            strokeColor: "#088da5",
        map: map,
        icons: [{
            repeat: '70px', //CHANGE THIS VALUE TO CHANGE THE DISTANCE BETWEEN ARROWS
            icon: iconsetngs,
            offset: '100%'}]
    };
 

    polyline = new google.maps.Polyline(polylineoptns);
    

    var z = 0;
    
    var path = [];
        path[z] = polyline.getPath();

     
     var markador = new google.maps.Marker({
    position: punto_final_no_tocar,
    icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"},
    map: map
   });
   var markador = new google.maps.Marker({
    position: punto_inicial_no_tocar,
    icon: { url: "http://maps.google.com/mapfiles/ms/icons/blue-dot.png"},
    map: map
   });
 

    for ( i = 0 ; i < markers.length; i++){ //LOOP TO DISPLAY THE MARKERS
        var pos = markers[i];
          var marker = new google.maps.Marker({
            position: pos,             
            icon: { url: "http://maps.google.com/mapfiles/ms/icons/none.png"},
            map: map
        });
       path[z].push(marker.getPosition()); //PUSH THE NEWLY CREATED MARKER'S POSITION TO THE PATH ARRAY
    }
 
 

<?php
/* ejecutar multi consulta */
if ($mysqli->multi_query($query)) {
    do {
        /* almacenar primer juego de resultados */
         if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
 
              echo "showMarkerByLatLng(new google.maps.LatLng(". $row[9] . "," . $row[10] . "), false);";
             }
        }
    } while ($mysqli->next_result());
}
/* ejecutar multi consulta */
if ($mysqli->multi_query($query2)) {
    do {
        /* almacenar primer juego de resultados */
         if ($result = $mysqli->store_result()) {
            while ($row = $result->fetch_row()) {
              echo "showMarkerByLatLng2(new google.maps.LatLng(". $row[8] . "," . $row[9] . "), false);";
             }
        }
    } while ($mysqli->next_result());
}


/* cerrar conexión */
$mysqli->close();
?>



  function showMarkerByLatLng(pos, infoWindowTitle,infoWindowText,imageMarker){

      var myMarker1 = new google.maps.Marker();
      
      myMarker1.setMap(map);
      
      myMarker1.setPosition(pos);

      if(imageMarker!=false){
      myMarker1.setIcon(imageMarker);
      }
      
      var myMarker1ContentString = '<div id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h2>'+infoWindowTitle+'</h2>' +
              '<div>' +
              infoWindowText+
              '</div>' +
              '</div>';

      var myMarker1InfoWindow = new google.maps.InfoWindow({
          content: myMarker1ContentString
      });

      google.maps.event.addListener(myMarker1, 'click', function() {
          myMarker1InfoWindow.open(map, myMarker1);
      });
  }



  function showMarkerByLatLng2(pos, infoWindowTitle,infoWindowText,imageMarker2){

     
      var myMarker1 = new google.maps.Marker();
      
      myMarker1.setMap(map);
      
      myMarker1.setPosition(pos);

      if(imageMarker2!=false){
      myMarker1.setIcon("http://maps.google.com/mapfiles/ms/icons/blue-dot.png");
      }
      
   
      google.maps.event.addListener(myMarker1, 'click', function() {
          myMarker1InfoWindow.open(map, myMarker1);
      });
  }
}
 
 window.onload = initMap;

</script>

     
  </body>
</html>

 