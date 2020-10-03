var map;
var centroSanLuis = {
    lat: -12.072881,
    lng: -76.997137
};

var centroCajamarca = {
    lat: -7.1637802,
    lng: -78.500267
};

var centroJunin = {
    lat: -10.9166698,
    lng: -76.0333328
};

var nroAlertas = 0;
var Lima = [];

var markersArray = [];

var CoordendasCLimas = [];

function iniciarMap() {

    map = new google.maps.Map(document.getElementById("map"), {
        center: centroSanLuis,
        zoom: 10,
        mapTypeId: 'roadmap',
        zoomControl: true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: true,
        fullscreenControl: false,
    });

    //DownloadMarker();
    DownloadMarkerResponsables();

}



function DownloadMarkerResponsables() {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }

    markers = [];

    $.getJSON("http://34.226.78.219:8080/api_covid19/public/api/responsables/district/" + IdDistrito).done(function (model) {

        for (var i = 0; i < model.length; i++) {

            console.log(model);

            var namePoint = model[i].atp_name;
            var lugarPoint = model[i].atp_address;
            var webPoint = model[i].atp_url;


            var points = new google.maps.LatLng(model[i].atp_latitude, model[i].atp_length);

            var icon;

            if (model[i].atp_id_dst == "2000") {
                icon = "http://34.226.78.219:8080/api_covid19/public/images/icons/point_hospital_icon.png";
            } else {
                icon = "http://34.226.78.219:8080/api_covid19/public/images/icons/point_hospital_icon_blue.png";
            }

            var marker = new google.maps.Marker({
                map: map,
                position: points,
                icon: icon
            });

            var iconBase = 'http://34.226.78.219:8080/api_covid19/public/images/points/' + model[i].atp_img;

            ModalPoint(marker, namePoint, lugarPoint, webPoint, iconBase);
        }

    });
}



window.Echo.channel('channel-alertas').listen('NuevaAlerta', (e) => {
    DownloadMarker();
});
