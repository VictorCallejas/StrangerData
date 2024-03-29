
<div id="map-box">
  <div id="map"></div>
</div>


<div id="filtros">
  <div id="filtros-box">
  

   <h2> Ubicación: </h2>
  <div class="grupo">
  <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch11" id="Ubicacion" />
        <div class="state p-success">
            <label>Usar ubicacion actual</label>
        </div>
  </div>
    
  <!--<div class="pretty p-switch p-fill">
        <input type="checkbox" id="pac-input" class="controls" type="text" placeholder="Añada la ubicación de origen"/>
        <div class="state">
            <label>Fill</label>
        </div>
    </div>-->
  </div>
  
  <h2> Busco: </h2>
  <div class="grupo">
  <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch10" id="Busca_Oficina" checked/>
        <div class="state p-success">
            <label>Busca Oficina</label>
        </div>
    </div>
  <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch9" id="Busca_Cajero"/>
        <div class="state p-success">
            <label>Busca Cajero</label>
        </div>
    </div>
  </div>

  <h2> Operaciones disponibles: </h2>
  <div class="grupo">
  <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch8" id="Libreta"/>
        <div class="state p-success">
        <label>Libreta</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch7" id="Ingreso"/>
        <div class="state p-success">
            <label>Ingreso</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch6" id="Recibos"/>
        <div class="state p-success">
            <label>Recibos</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch5" id="Contactless"/>
        <div class="state p-success">
            <label>Contactless</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch4" id="Transferencia"/>
        <div class="state p-success">
            <label>Transferencia</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch3" id="Extraer"/>
        <div class="state p-success">
            <label>Extraer</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="checkbox" name="switch2" id="Con_Saldo"/>
        <div class="state p-success">
            <label>Consultar saldo</label>
        </div>
    </div>
  </div>

  <h2> Como desea ir: </h2>
  <div class="grupo">
  <div class="pretty p-switch p-fill">
        <input type="radio" name="switch1" id="Coche" checked/>
        <div class="state p-success">
            <label>Coche</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="radio" name="switch1" id="andando"/>
        <div class="state p-success">
            <label>Andando</label>
        </div>
    </div>
      <div class="pretty p-switch p-fill">
        <input type="radio" name="switch1" id="transporte_publico"/>
        <div class="state p-success">
            <label>Transporte Público</label>
        </div>
    </div>
    <div class="pretty p-switch p-fill">
        <input type="radio" name="switch1" id="bici"/>
        <div class="state p-success">
            <label>Bicicleta</label>
        </div>
    </div>
	  <button class="pointer" id="btn-func">Como funciona</button>
  </div>


  </div>
  
</div>
    
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA_i6oWqxHiZThh7uzo9UZxg3gShyhqGvU"></script>

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
var jArray;
var punto_final_no_tocar;
var punto_inicial_no_tocar;
var request_URL_nearest=[];
var request_duration_URL_nearest=[];
var request_URL_nearest_length;
var account_time=[];
//////////// parametros back
var ubicado="no"; //si es si, significa que coge la latitud y longitud, si es no, solo muestra cajeros de españa dependiendo de los parametros que elija, si/no
var libreta_url="no"; //cajeros que permiten libreta, si/no
var ingreso_url="no"; //cajeros que permiten ingreso, si/no
var recibos_url="no"; //cajeros que permiten recibos, si/no
var contactless_url="no"; //cajeros que permiten contactless, si/no
var transferencia_url="no"; //cajeros que permiten transferencias, si/no
var extraer_url="no"; //cajeros que permiten extraer, si/no
var con_saldo_url="no"; //cajeros que permiten contactless, si/no
var busca_oficina_url="si"; //el usuario está buscanto oficinas, si/no
var busca_cajero_url="no"; //el usuario está buscanto cajeros, si/no
var pertenece_banco_url="cajamar"; //el usuario pertenece al banco ... cajamar,santander, ...
var busca_bancos_url="cajamar"; //el usuario solo busca bancos de la entidad... ???? este no se si ponerlo
var dispuesto_url=0.65; //dispuesto a pagar de comision, 0, 0.65, 2 
var hora_url=11; ///hora de salida
var dia_url="2019-02-15"; ///dia de salida
var numero_recomendaciones=5; //numero de resultados que quiere que le recomiende 
////////// parametros front
var origin_latitud=39.470085;
var origin_longitud=-0.3488727;
var destination_latitud_val=[];
var destination_longitud_val=[];
var destination_latitud=0;
var destination_longitud=0;
var coche_url="si";
var andando_url="no";
var transporte_publico_url="no";
var bici_url="no"; 
var marker_value=0;
var bound_activo=0;
var URL; 
var bounds;
bounds = new google.maps.LatLngBounds();
  



if (navigator.geolocation) {
navigator.geolocation.getCurrentPosition(showPosition);
}
///////// api back
var URL_no="https://qmiets.tk:5000/nearest?ubicado=no&latitud="+origin_latitud+"&longitud="+origin_longitud+"&libreta="+libreta_url+"&ingreso="+ingreso_url+"&recibos="+recibos_url+"&contactless="+contactless_url+"&transferencia="+transferencia_url+"&extraer="+extraer_url+"&con_saldo="+con_saldo_url+"&busca_oficina_url="+busca_oficina_url+"&busca_cajero_url="+busca_cajero_url+"&pertenece_banco_url="+pertenece_banco_url+"&busca_bancos_url="+busca_bancos_url+"&dispuesto_url="+dispuesto_url+"&hora_url="+hora_url+"&dia_url="+dia_url+"&numero_recomendaciones="+numero_recomendaciones;
var URL_si="https://qmiets.tk:5000/nearest?ubicado=si&latitud="+origin_latitud+"&longitud="+origin_longitud+"&libreta="+libreta_url+"&ingreso="+ingreso_url+"&recibos="+recibos_url+"&contactless="+contactless_url+"&transferencia="+transferencia_url+"&extraer="+extraer_url+"&con_saldo="+con_saldo_url+"&busca_oficina_url="+busca_oficina_url+"&busca_cajero_url="+busca_cajero_url+"&pertenece_banco_url="+pertenece_banco_url+"&busca_bancos_url="+busca_bancos_url+"&dispuesto_url="+dispuesto_url+"&hora_url="+hora_url+"&dia_url="+dia_url+"&numero_recomendaciones="+numero_recomendaciones;

/////// api front
var URL_nearest="https://strangerdata.club/dashboard/respuesta.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;
 var URL_nearest_time="https://strangerdata.club/dashboard/respuesta_tiempo.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;

 
/////// actualizarURL_si
function actualizarURL_si(){
  URL_no="https://qmiets.tk:5000/nearest?ubicado=no&latitud="+origin_latitud+"&longitud="+origin_longitud+"&libreta="+libreta_url+"&ingreso="+ingreso_url+"&recibos="+recibos_url+"&contactless="+contactless_url+"&transferencia="+transferencia_url+"&extraer="+extraer_url+"&con_saldo="+con_saldo_url+"&busca_oficina_url="+busca_oficina_url+"&busca_cajero_url="+busca_cajero_url+"&pertenece_banco_url="+pertenece_banco_url+"&busca_bancos_url="+busca_bancos_url+"&dispuesto_url="+dispuesto_url+"&hora_url="+hora_url+"&dia_url="+dia_url+"&numero_recomendaciones="+numero_recomendaciones;
  //console.log(URL_no);
}
/////// actualizarURL_no
function actualizarURL_no(){
  URL_si="https://qmiets.tk:5000/nearest?ubicado=si&latitud="+origin_latitud+"&longitud="+origin_longitud+"&libreta="+libreta_url+"&ingreso="+ingreso_url+"&recibos="+recibos_url+"&contactless="+contactless_url+"&transferencia="+transferencia_url+"&extraer="+extraer_url+"&con_saldo="+con_saldo_url+"&busca_oficina_url="+busca_oficina_url+"&busca_cajero_url="+busca_cajero_url+"&pertenece_banco_url="+pertenece_banco_url+"&busca_bancos_url="+busca_bancos_url+"&dispuesto_url="+dispuesto_url+"&hora_url="+hora_url+"&dia_url="+dia_url+"&numero_recomendaciones="+numero_recomendaciones;
  //console.log(URL_si);
}

function actualizar_nearest(){
  URL_nearest="https://strangerdata.club/dashboard/respuesta.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;
}
function actualizar_nearest_tiempo(){
   URL_nearest_time="https://strangerdata.club/dashboard/respuesta_tiempo.php?origin_latitud="+origin_latitud+"&origin_longitud="+origin_longitud+"&destination_latitud="+destination_latitud+"&destination_longitud="+destination_longitud+"&andando="+andando_url+"coche="+coche_url+"transporte_publico="+transporte_publico_url+"bici="+bici_url+"&hora_url="+hora_url+"&dia_url="+dia_url;
}
//// funcion text to min
function to_min(s){
  //console.log(s);
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

function maestra(URL){
      //actualiza parametros de la url
       actualizarURL_si();
      actualizarURL_no();

      //llama a al api con los parametros de origen
        console.log(URL);

      request_URL_nearest_length = $.get(URL, function(ss){
        console.log(ss);
      });
      //cuando se tenga respuest, entoces selecciona lat y long que seran de destino
      $.when(request_URL_nearest_length).done(function(msg) {
          for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){
             destination_latitud_val[i] = request_URL_nearest_length.responseJSON.cajeros[i].latitud;  
           destination_longitud_val[i] = request_URL_nearest_length.responseJSON.cajeros[i].longitud;  
          }
          //llamo x n veces al api de google para obtener tiempo y camino
          for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){       
               destination_latitud=destination_latitud_val[i];
               destination_longitud=destination_longitud_val[i];
                actualizar_nearest_tiempo();
                actualizar_nearest();          
              request_URL_nearest[i] = $.get(URL_nearest, function(respuesta){
                steps=respuesta;
              });
              request_duration_URL_nearest[i] = $.get(URL_nearest_time, function(respuesta){
                step_duration=respuesta;
              }); 
          }
          //cuando se traiga todos los parametros de la llamada al api de google, entoces es el momento de saber cual es el cajero mas cercano segun ponderaciones
          $.when(request_URL_nearest[request_URL_nearest.length-1], request_duration_URL_nearest[request_duration_URL_nearest.length-1]).done(function(msg2) {
                  //console.log(request_duration_URL_nearest);
 
                  for(var i=0; i<request_duration_URL_nearest.length; i++){
                     account_time[i]= request_URL_nearest_length.responseJSON.cajeros[i].estado_estimado + to_min(request_duration_URL_nearest[i].responseText);
                       //console.log("3: " +account_time[i]);
                       //console.log("3: " +request_URL_nearest[i].responseText);
                   }
  
          //selecciono el cajero mas cercano, sabiendo la posicion del array del mejor ponderado
                   
                  for(var i=0; i<request_duration_URL_nearest.length; i++){
                    if(i==account_time.indexOf(Math.max.apply(Math,account_time))){
                      //console.log(to_min(request_duration_URL_nearest[i].responseText));
                     // console.log(request_URL_nearest_length.responseJSON.cajeros[i].estado_estimado);
                       jArray = JSON.parse(request_URL_nearest[i].responseText);
                    }                       
                  }

                  markers=[];
                  bounds = new google.maps.LatLngBounds();
                  punto_final_no_tocar=0;
                  punto_inicial_no_tocar=0;


          /// todos los puntos del camino.
                  for(var i=0; i<jArray.length; i++){
                      var aux = jArray[i];
                      var str = aux.split(',');
                      var lat = parseFloat(str[0]);
                      latitud_makers[i] = lat;
                      var long = parseFloat(str[1]);
                      longitud_makers[i] = long;
                      markers[i] = new google.maps.LatLng(latitud_makers[i], longitud_makers[i]); 
                      bounds.extend(markers[i]);
                   }

          ///punto unicial y final
                 punto_final_no_tocar = {lat: latitud_makers[jArray.length-1], lng: longitud_makers[jArray.length-1]};
                 punto_inicial_no_tocar = {lat: latitud_makers[0], lng: longitud_makers[0]};


          ////inicializo el mapa
          ubicado="si";
          bound_activo=1;
          marker_value=1;
                 initMap();       
          });
        });
}
function maestra_no_ubicado(URL){
//actualiza parametros de la url
       actualizarURL_si();
      actualizarURL_no();
      //llama a al api con los parametros de origen
              console.log(URL);


      request_URL_nearest_length = $.get(URL, function(ss){
        console.log(ss);
      });
      //cuando se tenga respuest, entoces selecciona lat y long que seran de destino
      $.when(request_URL_nearest_length).done(function(msg) {
          
          markers=[];
                  bounds = new google.maps.LatLngBounds();

          for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){
             destination_latitud_val[i] = request_URL_nearest_length.responseJSON.cajeros[i].latitud;  
           destination_longitud_val[i] = request_URL_nearest_length.responseJSON.cajeros[i].longitud; 
           }
           if(ubicado=="no"){
            polyline.setMap(null);
           }
           ubicado="no";
           marker_value=1;
           bound_activo=0;
           initMap(); 
          });
}
 
//guardo setup de las llamadas ajax, para que no me almacene en cache.
$.ajaxSetup({cache: false});
 

function showPosition(position) {
  origin_latitud = position.coords.latitude;
   origin_longitud = position.coords.longitude;
   
}



$(document).ready(function(){
    $(".check-male").click(function(){
        $("#male").prop("checked", true);
    });
     
});


/*******Ubicacion********/
//Ubicacion  
$(document).ready(function() {
    //set initial state.
    $('#Ubicacion').change(function() {
        if(this.checked === true) {
            ubicado="si";  
            if (navigator.geolocation) {
               console.log(origin_latitud);
               navigator.geolocation.getCurrentPosition(showPosition);
            } else {
              x.innerHTML = "Geolocation is not supported by this browser.";
            }  
            actualizarURL_si();
            actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
            ubicado="no"; 
            actualizarURL_si();
            actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});


//Ubicacion por texto 
function initAutocomplete() {
    var input = document.getElementById('pac-input');
    var searchBox = new google.maps.places.SearchBox(input);
    searchBox.addListener('places_changed', function() {
      var places = searchBox.getPlaces();
      if (places.length == 0) { return; }
        places.forEach(function(place) { 
          alert("guardar aqui las coordenadas " + place.geometry.location ) 
        });
     });
  }



/*******Posibilidades********/
//Libreta 
$(document).ready(function() {
    //set initial state.
    $('#Libreta').change(function() {
        if(this.checked === true) {
          console.log('libreta checked true');
          libreta_url="si";
           actualizarURL_si();
           actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
         }else{
          libreta_url="no";
           actualizarURL_si();
           actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Ingreso 
$(document).ready(function() {
    //set initial state.
    $('#Ingreso').change(function() {
        if($(this).is(":checked")) {
          ingreso_url="si";
           actualizarURL_si();
           actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          ingreso_url="no";
          actualizarURL_si();
           actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Recibos 
$(document).ready(function() {
    //set initial state.
    $('#Recibos').change(function() {
        if($(this).is(":checked")) {
          recibos_url="si";
           actualizarURL_si();
           actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          recibos_url="no";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Contactless 
$(document).ready(function() {
    //set initial state.
    $('#Contactless').change(function() {
        if($(this).is(":checked")) {
          contactless_url="si";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          contactless_url="no";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Transferencia 
$(document).ready(function() {
    //set initial state.
    $('#Transferencia').change(function() {
        if($(this).is(":checked")) {
          transferencia_url="si";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          transferencia_url="no";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Extraer 
$(document).ready(function() {
    //set initial state.
    $('#Extraer').change(function() {
        if($(this).is(":checked")) {
          extraer_url="si";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          extraer_url="no";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Con Saldo 
$(document).ready(function() {
    //set initial state.
    $('#Con_Saldo').change(function() {
        if($(this).is(":checked")) {
          con_saldo_url="si";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          con_saldo_url="no";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Busca Oficina 
$(document).ready(function() {
    //set initial state.
    $('#Busca_Oficina').change(function() {
        if($(this).is(":checked")) {
          busca_oficina_url="si";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          console.log("aqui estamos");

          if($('#Busca_Cajero').is(":checked")){
            busca_oficina_url="no";
          }else if($('#Busca_Cajero').prop('checked', false)){
            busca_oficina_url="si";
            $('#Busca_Oficina').prop('checked', true);
          }
 
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});
//Busca Cajero 
$(document).ready(function() {
    //set initial state.
    $('#Busca_Cajero').change(function() {
        if($(this).is(":checked")) {
          busca_cajero_url="si";
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{

          if($('#Busca_Oficina').is(":checked")){
            busca_cajero_url="no";
          }else if($('#Busca_Oficina').prop('checked', false)){
            busca_cajero_url="si";
            $('#Busca_Cajero').prop('checked', true);
          }


          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }
     });
});



 


//andando 
$(document).ready(function() {
    //set initial state.
    $('#andando').change(function() {
        if($(this).is(":checked")) {
        
        andando_url="si";
        coche_url="no";
        transporte_publico_url="no";
        bici_url="no";

         actualizar_nearest();
         actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          andando_url="no";
          actualizar_nearest();
          actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
         if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}

        }
     });
});

//bici 
$(document).ready(function() {
    //set initial state.
    $('#bici').change(function() {
        if($(this).is(":checked")) {
        
        andando_url="no";
        coche_url="no";
        transporte_publico_url="no";
        bici_url="si";

         actualizar_nearest();
         actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          bici_url="no";
          actualizar_nearest();
          actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
         if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}

        }
     });
});

//Coche 
$(document).ready(function() {
    //set initial state.
    $('#Coche').change(function() {
        if($(this).is(":checked")) {
        
        andando_url="no";
        coche_url="si";
        transporte_publico_url="no";
        bici_url="no";

         actualizar_nearest();
         actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          coche_url="no";
          actualizar_nearest();
          actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
         if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}

        }
     });
});

//transporte_publico 
$(document).ready(function() {
    //set initial state.
    $('#transporte_publico').change(function() {
        if($(this).is(":checked")) {
        
        andando_url="no";
        coche_url="no";
        transporte_publico_url="si";
        bici_url="no";

         actualizar_nearest();
         actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
          if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}
        }else{
          coche_url="no";
          actualizar_nearest();
          actualizar_nearest_tiempo();
          actualizarURL_si();
          actualizarURL_no();
         if(ubicado == "si"){maestra(URL_si);}else{ maestra_no_ubicado(URL_no);}

        }
     });
});
 
//FALTA
//Pertenece_Banco
//Busca_Bancos
//Dispuesto
//Hora
//DIA
//Numero de Recomendaciones

</script>




<script> 
///mapa
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
    if(bound_activo==0){
    }else{
      map.fitBounds(bounds);
    }
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
     
   var markador2 = new google.maps.Marker({
    position: punto_final_no_tocar,
    icon: { url: "https://maps.google.com/mapfiles/ms/icons/green-dot.png"},
    map: map,
    title: 'Punto recomendado'
   });

   var markador = new google.maps.Marker({
    position: punto_inicial_no_tocar,
    icon: { url: "https://maps.google.com/mapfiles/ms/icons/green-dot.png"},
    map: map,
    title: 'Punto de partida'
   });
    var contentString ='<p>Punto de partida</p>';  ////sale en blanco. Como poner en negro!!
    var infowindow = new google.maps.InfoWindow({
        content: contentString
     });
    markador.addListener('click', function() {
      infowindow.open(map, markador);
    });

    var contentString2 ='<p>Punto recomendado</p>';  ////sale en blanco. Como poner en negro!!
    var infowindow2 = new google.maps.InfoWindow({
        content: contentString2
     });
    markador2.addListener('click', function() {
      infowindow2.open(map, markador2);
    });
 
    for (var i =  0 ; i < markers.length; i++){ //LOOP TO DISPLAY THE MARKERS
        var pos = markers[i];
          var marker = new google.maps.Marker({
            position: pos,             
            icon: { url: "https://maps.google.com/mapfiles/ms/icons/none.png"},
            map: map
        });
       path[z].push(marker.getPosition()); //PUSH THE NEWLY CREATED MARKER'S POSITION TO THE PATH ARRAY
    }
 
  


if(ubicado=="si"){
  if(marker_value!=0){
      for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){
            if(request_URL_nearest_length.responseJSON.cajeros[i].tipo=="oficina"){
               showMarkerByLatLng(new google.maps.LatLng(destination_latitud_val[i],destination_longitud_val[i]), request_URL_nearest_length.responseJSON.cajeros[i].direccion, request_URL_nearest_length.responseJSON.cajeros[i].poblacion, request_URL_nearest_length.responseJSON.cajeros[i].distancia, to_min(request_duration_URL_nearest[i].responseText),request_URL_nearest_length.responseJSON.cajeros[i].estado_estimado); 
              }else if(request_URL_nearest_length.responseJSON.cajeros[i].tipo=="cajero"){
               showMarkerByLatLng2(new google.maps.LatLng(destination_latitud_val[i],destination_longitud_val[i]), request_URL_nearest_length.responseJSON.cajeros[i].direccion, request_URL_nearest_length.responseJSON.cajeros[i].poblacion, request_URL_nearest_length.responseJSON.cajeros[i].distancia, to_min(request_duration_URL_nearest[i].responseText),request_URL_nearest_length.responseJSON.cajeros[i].estado_estimado); 
              } 
          }
  }else{
  }
    
 
  function showMarkerByLatLng(pos, infoWindowTitle,infoWindowText,infoWindowText2,infoWindowText3, infoWindowText4, imageMarker){
      var myMarker1 = new google.maps.Marker();
      
      myMarker1.setMap(map);
      
      myMarker1.setPosition(pos);
      if(imageMarker!=false){
      myMarker1.setIcon(imageMarker);
      }
      console.log(infoWindowText3);
      
      var myMarker1ContentString = '<div style="color:black;" id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h2>'+infoWindowTitle+'</h2>' +
              '<div>' +
              "Municipio: "+
              infoWindowText+
              '</div>' +
              '<div>' +
              "Distancia: "+
              infoWindowText2+
              " min" +
              '</div>' +
              '<div>' +
              "Tiempo en llegar: "+
              infoWindowText3+
              " min" +
              '</div>' +
              '<div>' +
              "Tiempo de espera: "+
              infoWindowText4+
              " min" +
              '</div>' +
              '</div>';
      var myMarker1InfoWindow = new google.maps.InfoWindow({
          content: myMarker1ContentString
      });
      google.maps.event.addListener(myMarker1, 'click', function() {
          myMarker1InfoWindow.open(map, myMarker1);
      });

  }

   function showMarkerByLatLng2(pos, infoWindowTitle,infoWindowText,infoWindowText2,infoWindowText3, infoWindowText4, imageMarker2){
      var myMarker2 = new google.maps.Marker();
      
      myMarker2.setMap(map);
      
      myMarker2.setPosition(pos);
      if(imageMarker2!=false){
      myMarker2.setIcon("https://maps.google.com/mapfiles/ms/icons/blue-dot.png");
      }
      
      var myMarker2ContentString = '<div style="color:black;" id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h2>'+infoWindowTitle+'</h2>' +
              '<div>' +
              "Municipio: "+
              infoWindowText+
              '</div>' +
              '<div>' +
              "Distancia: "+
              infoWindowText2+
              " min" +
              '</div>' +
              '<div>' +
              "Tiempo en llegar: "+
              infoWindowText3+
              " min" +
              '</div>' +
              '<div>' +
              "Tiempo de espera: "+
              infoWindowText4+
              " min" +
              '</div>' +
              '</div>';
      var myMarker2InfoWindow = new google.maps.InfoWindow({
          content: myMarker2ContentString
      });
      google.maps.event.addListener(myMarker2, 'click', function() {
          myMarker2InfoWindow.open(map, myMarker2);
      });

  }
}else {


  if(marker_value!=0){
      for(var i=0; i<request_URL_nearest_length.responseJSON.cajeros.length; i++){
            if(request_URL_nearest_length.responseJSON.cajeros[i].tipo=="oficina"){
               showMarkerByLatLng3(new google.maps.LatLng(destination_latitud_val[i],destination_longitud_val[i]), request_URL_nearest_length.responseJSON.cajeros[i].direccion, request_URL_nearest_length.responseJSON.cajeros[i].poblacion, request_URL_nearest_length.responseJSON.cajeros[i].estado_estimado); 
              }else if(request_URL_nearest_length.responseJSON.cajeros[i].tipo=="cajero"){
               showMarkerByLatLng4(new google.maps.LatLng(destination_latitud_val[i],destination_longitud_val[i]), request_URL_nearest_length.responseJSON.cajeros[i].direccion, request_URL_nearest_length.responseJSON.cajeros[i].poblacion, request_URL_nearest_length.responseJSON.cajeros[i].estado_estimado); 
              } 
      }
  }else{
  }

  function showMarkerByLatLng3(pos, infoWindowTitle,infoWindowText, infoWindowText2, imageMarker){
      var myMarker1 = new google.maps.Marker();
      
      myMarker1.setMap(map);
      
      myMarker1.setPosition(pos);
      if(imageMarker!=false){
      myMarker1.setIcon(imageMarker);
      }
       
      var myMarker1ContentString = '<div style="color:black;" id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h2>'+infoWindowTitle+'</h2>' +
              '<div>' +
              "Municipio: "+
              infoWindowText+
              '</div>' +
              '<div>' +
              "Tiempo de espera: "+
              infoWindowText2+
              " min" +
              '</div>' +
              '</div>';
      var myMarker1InfoWindow = new google.maps.InfoWindow({
          content: myMarker1ContentString
      });
      google.maps.event.addListener(myMarker1, 'click', function() {
          myMarker1InfoWindow.open(map, myMarker1);
      });

  }

   function showMarkerByLatLng4(pos, infoWindowTitle,infoWindowText, infoWindowText2, imageMarker2){
      var myMarker2 = new google.maps.Marker();
      
      myMarker2.setMap(map);
      
      myMarker2.setPosition(pos);
      if(imageMarker2!=false){
      myMarker2.setIcon("https://maps.google.com/mapfiles/ms/icons/blue-dot.png");
      }
      
 var myMarker2ContentString = '<div style="color:black;" id="content">' +
              '<div id="siteNotice">' +
              '</div>' +
              '<h2>'+infoWindowTitle+'</h2>' +
              '<div>' +
              "Municipio: "+
              infoWindowText+
              '</div>' +
              '<div>' +
              "Tiempo de espera: "+
              infoWindowText2+
              " min" +
              '</div>' +
              '</div>';
              '</div>';
      var myMarker2InfoWindow = new google.maps.InfoWindow({
          content: myMarker2ContentString
      });
      google.maps.event.addListener(myMarker2, 'click', function() {
          myMarker2InfoWindow.open(map, myMarker2);
      });

  }

}
 
}
 
 window.onload = initMap;
</script>

