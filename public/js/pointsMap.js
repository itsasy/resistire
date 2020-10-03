var centroLima = {
    lat: -12.043443,
    lng: -77.042407
};

var marker;
var Distrito = $('#district').text();
var Lima = [];

function iniciarMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        center: centroLima,
        zoom: 12,
        mapTypeId: 'roadmap',
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: true,
    });

    google.maps.event.addListener(map, 'click', function (pos) {
        placeMarker(pos.latLng);
        document.getElementById("latitude_place").value = pos.latLng.lat();
        document.getElementById("length_place").value = pos.latLng.lng();
    });

    function placeMarker(location) {
        if (marker) {
            marker.setPosition(location);
        } else {
            marker = new google.maps.Marker({
                position: centroLima,
                map: map,
                draggable: true
            });
            google.maps.event.addListener(marker, "drag", function (pos) {
                populateInputs(pos.latLng);
            });
        }
    }

    function populateInputs(pos) {
        document.getElementById("latitude_place").value = pos.lat()
        document.getElementById("length_place").value = pos.lng();
    }

}


$.getJSON("http://34.226.78.219:8080/api_covid19/public/LIMA_DISTRITOS.json", function (json) {

    var datos = json.features;
    for (i = 0; i <= datos.length; i++) {
        if (datos[i].properties['Departamento'].toUpperCase() == Distrito) {

            CoordendasCLimas = datos[i].geometry.coordinates[0][0];
            console.log(CoordendasCLimas);

            for (var i = 0; i < CoordendasCLimas.length; i++) {

                Lima.push(new google.maps.LatLng(CoordendasCLimas[i][1], CoordendasCLimas[i][0]));
            }

            var Borde = new google.maps.Polyline({
                path: Lima,
                strokeColor: '#204969',
                strokeOpacity: 1.0,
                strokeWeight: 2.8,
                //fillColor: '#696464',
                //fillOpacity: 0.35,
                geodesic: true,
            });
            Borde.setMap(map);


        }
    }
});
