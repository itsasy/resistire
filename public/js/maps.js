var map;

var sonido = document.getElementById("sonido");
var nroAlertas = 0;
var Lima = [];
var markersArray = [];
var Distrito = $('#district').text();
var IdDistrito = $('#iddistrict').text();
var Provincia = $('#provincia').text();


var customIcons = {
    '1': {
        icon: 'marker_alert_01.svg'
    },
    '2': {
        icon: 'marker_alert_02.svg'
    },
    '3': {
        icon: 'marker_alert_03.svg'
    },
    '4': {
        icon: 'marker_alert_04.svg'
    },
    '5': {
        icon: 'marker_alert_05.svg'
    },
    '6': {
        icon: 'marker_alert_06.svg'
    },
    '7': {
        icon: 'marker_alert_07.svg'
    },
    '8': {
        icon: 'marker_alert_08.svg'
    }
};

var CoordendasCLimas = [];

    function iniciarMap() {
        
        
       $.getJSON("http://34.226.78.219:8080/api_covid19/public/puntos_centrales.json").done(function (model1) {
            

       console.log("DATOS___JSON___" + model1.CenterPoint[Distrito.toLowerCase()]);

            map = new google.maps.Map(document.getElementById("map"), {
                center: model1.CenterPoint[Distrito.toLowerCase()],
                zoom: 13,
                mapTypeId: 'roadmap',
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: false,
                rotateControl: true,
                fullscreenControl: false,
            });
    
             DownloadMarker();
             DownloadMarkerAtencion();
             obtenerDistritos();
        });
    }

    async function obtenerDistritos(){
        
        await $.getJSON( "http://34.226.78.219:8080/api_covid19/public/departamentos_json/"+Provincia+"_DISTRITOS.json", function(json) {

            var datos = json.features;        
             for(i= 0 ; i <= datos.length; i++){  
                if(datos[i].properties['Departamento'].toUpperCase()  == Distrito ){
                  
                  CoordendasCLimas = datos[i].geometry.coordinates[0][0];
                  //console.log(CoordendasCLimas);
                   
                    for (var i = 0; i < CoordendasCLimas.length; i++) {
                        
                        Lima.push(new google.maps.LatLng(CoordendasCLimas[i][1], CoordendasCLimas[i][0]));
                    }
                    
                    var Borde = new google.maps.Polygon({
                                    path: Lima,
                                    strokeColor: '#204969',
                                    strokeOpacity: 1.0,
                                    strokeWeight: 2.8,
                                    fillColor: '#696464',
                                    fillOpacity: 0.35,
                                    geodesic: true,
                                });
                    Borde.setMap(map);
                }       
             }
        });
         
    }
    
    
        
function Modal(id, type, marker, placeName, person, patname, matname, phone, dni, image, date, comentary) {
    url = 'http://34.226.78.219:8080/api_covid19/public/api/imageAlert/';

    google.maps.event.addListener(marker, 'click', function () {
        $("#titulo").text(type);
        $("#contacto").text(phone);
        $("#lugar").text(placeName);
        $("#nombre").text(person + ' ' + patname + ' ' + matname);
        $("#dni").text(dni);
        $("#date").text(date);

        if(comentary != null){
            $("#comentario").html("<h5>Comentario</h5><div class='border rounded p-2' id='comentario'><p id='comentary' class='text-secondary m-0'>" + comentary + "</p></div>");
        }
        
        if (image != null) {
            $("#img").html("<h5 class='mt-3'>Imagen de referencia</h5><div id='img'><img class='img-fluid' src='" + url + image + "'\></div>");
        }
        
        $('#Modal_maps_info').modal('show');
        sonido.pause();

        $('#atendido').click(function () {

            $('#loadCircle').show();
            $("#atendido").attr("disabled", true);

            $.ajax({
                url: 'http://34.226.78.219:8080/api_covid19/public/api/updateAlert/' + id,
                type: 'put',
                dataType: 'json',
                success: function () {
                    DownloadMarker(function () {
                        $('#Modal_maps_info').modal('hide');
                        Stop(nroAlertas);
                    });
                },
                error: function () {
                    alert("Sin conexión con el servidor.")
                    $('#Modal_maps_info').modal('hide');
                    Stop(nroAlertas);
                }
            });
        });

        $('#dismissButton').click(function () {
            $('#Modal_maps_info').modal('hide');
            Stop(nroAlertas);


        });

    });
}

//Modificar
function Stop(model) {
    if (model > 0) {
        sonido.play();
    }
    else {
        sonido.pause();
    }
}

function DownloadMarker(callback) {
    
    for (var i = 0; i < markersArray.length; i++) {
        markersArray[i].setMap(null);
    }
    markersArray = [];

    $.getJSON("http://34.226.78.219:8080/api_covid19/public/api/unattendedAlert/"+IdDistrito).done(function (model) {

        nroAlertas = model.length;
        //console.log(model);
         var iconBase = 'http://34.226.78.219:8080/api_covid19/public/images/icons/';

        for (var i = 0; i < model.length; i++) {
            
            var id = model[i].id;
            var placeName = model[i].alt_address;
            var person = model[i].info_user.usr_name;
            var patname = model[i].info_user.usr_patname;
            var matname = model[i].info_user.usr_matname;
            var phone = model[i].info_user.usr_phone_1;
            var dni = model[i].info_user.usr_document;
            var image = model[i].alt_img;
            var date = model[i].alt_date;
            var type = model[i].alt_id_altt;
            var comentary = model[i].alt_comentary;
            console.log(model[i]);
            if (type == '1') {
                type = 'SERENAZGO';
            } else if (type == '3') {
                type = 'AMBULANCIA';
            } else if (type == '2') {
                type = 'BOMBEROS';
            } else if (type == '4') {
                type = 'FISCALIZACIÓN';
            } else if (type=='5'){
                type = 'VIOLENCIA FAMILIAR'
            } else if (type == '6') {
                type = 'R.R.S.S.';
            } else if (type=='7'){
                type = 'RECICLAJE'
            } else if (type=='8'){
                type = 'SALUD MENTAL'
            }

            var icon = customIcons[model[i].alt_id_altt] || {};
            
  
            
            var points = new google.maps.LatLng(model[i].alt_latitude, model[i].alt_longitude);
            //console.log(model[i].alt_latitude+" - "+model[i].alet_longitude);
            var marker = new google.maps.Marker({
                map: map,
                position: points,
                icon:  iconBase + icon.icon
            });
            
            
            markersArray.push(marker);


            Modal(id, type, marker, placeName, person, patname, matname, phone, dni, image, date, comentary);
        }

        Stop(nroAlertas);
    });

    $('#loadCircle').hide();
    $("#atendido").attr("disabled", false);
    
    
    
    
    
    if (typeof callback === 'function') {
        callback();
    };
}

var markersArrayAtencion = [];

function DownloadMarkerAtencion() {
    
    for (var i = 0; i < markersArrayAtencion.length; i++) {
        markersArrayAtencion[i].setMap(null);
    }
    markersArrayAtencion = [];

    $.getJSON("http://34.226.78.219:8080/api_covid19/public/api/points/district/"+IdDistrito).done(function (model) {

        for (var i = 0; i < model.length; i++) {
            
            console.log(model);
            
            var namePoint = model[i].atp_name;
            var lugarPoint = model[i].atp_address;
            var webPoint = model[i].atp_url;

            
            var points = new google.maps.LatLng(model[i].atp_latitude, model[i].atp_length);
            
            var icon;
            
            if(model[i].atp_id_dst == "2000"){
                icon = "http://34.226.78.219:8080/api_covid19/public/images/icons/point_hospital_icon.png";
            }else{
                icon = "http://34.226.78.219:8080/api_covid19/public/images/icons/point_hospital_icon_blue.png";
            }
            
            var marker = new google.maps.Marker({
                map: map,
                position: points,
                icon: icon
            });
            
            var iconBase = 'http://34.226.78.219:8080/api_covid19/public/images/points/'+model[i].atp_img;
            
            ModalPoint(marker, namePoint, lugarPoint, webPoint, iconBase);
        }

    });
}

function ModalPoint(marker , nombre, direccion, url, image) {
    
    google.maps.event.addListener(marker, 'click', function () {
        
        $("#nombrePoint").text(nombre);
        $("#lugarPoint").text(direccion);
        $("#webPoint").text(url);
        $("#webPoint").attr("href", url);

        if (image != null) {
            $("#imgPoint").html("<img class='img-fluid rounded' src='"+ image +"'\>");
        }

        $('#ModalPuntoAtencion').modal('show');

        $('#atendidoPoint').click(function () {
            $('#ModalPuntoAtencion').modal('hide');
        });

    });
}

window.Echo.channel('channel-alertas').listen('NuevaAlerta', (e) => {
    //alert("hola");
    //console.log("hola");
    DownloadMarker();
});
