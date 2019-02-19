var map;

function initMap() {
  console.log("Init...");
    
  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 9,
    minZoom: 9,
    center: {lat: 39.4077013, lng: -0.5015955},
    mapTypeId: google.maps.MapTypeId.SATELLITE
  });
    
  var layer = new google.maps.FusionTablesLayer({
    query: {
      select: 'geometry',
      from: '1g0EXLjJe2yMaY528j5X4SFeYz698w-pHRWDt23AN'
    },
    styles: [{

    }],
      styleId: 2
  });
    
    google.maps.event.addListener(layer, 'click', function(e) { 
        e.infoWindowHtml = e.row['cod_postal'].value + "<br>" + e.row['description'].value + '€'; 
        get_data_by_cp(e.row['cod_postal'].value);
    }); 

  layer.setMap(map);    
    console.log(layer);
    
}

function get_data_by_cp(cp){
    $.get( "include/ajax/get_data_by_cp.php?cp="+cp, function(data){
      $( "#data_script" ).html(data+";");
        dashboard('#dashboard', JSON.parse(data+";"));
        console.log("Datos de "+cp+" cargados.");
    });
}
