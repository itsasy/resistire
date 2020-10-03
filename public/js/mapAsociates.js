var map;

var Distrito = $('#district').text();
var IdDistrito = $('#iddistrict').text();
var Provincia = $('#provincia').text();
var Lima = [];

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
             
            obtenerDistritos();
            responsables();         
        });
    
      
      
    
}

    const marker = (points) => {
        return new google.maps.Marker({
            map: map,
            position: points,
            icon: "http://34.226.78.219:8080/api_covid19/public/images/icons/point_hospital_icon_blue.png"
        })
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
    
   
    
const responsables = () => {
    $.getJSON("http://34.226.78.219:8080/api_covid19/public/api/companies/"+IdDistrito).done(function (model) {
        model.forEach(element => {
            let points = new google.maps.LatLng(
                element.cmp_latitude,
                element.cmp_longitude);


            var iconBase = 'http://34.226.78.219:8080/api_covid19/public/images/companies/'+element.cmp_img;

            ModalPoint(
                element.id,
                marker(points),
                element.cmp_name,
                element.cmp_address,
                element.cmp_url,
                iconBase
            );
        });
    });
}

const ModalPoint = (id, marker, nombre, direccion, url, image) => {
    google.maps.event.addListener(marker, 'click', function () {
        $("#nombrePoint").text(nombre);
        $("#lugarPoint").text(direccion);
        $("#webPoint").text(url);
        $("#webPoint").attr("href", url);

        if (image != null) {
            $("#imgPoint").html("<img class='img-fluid' src='" + image + "'\>");
        }

        $('#modal').modal('show');
    });
}
