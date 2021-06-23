var map = L.map('map', {
    center: [42.00, 2.00],
    minZoom: 2,
    zoom: 2,
});

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>',
    subdomains: ['a', 'b', 'c'],
}).addTo(map);

var blueIcon = L.icon({
    iconUrl: 'images/marker-blue.png',
    iconSize: [42, 45],
    iconAnchor: [10, 24],
    popupAnchor: [0, -14],
});

var redIcon = L.icon({
    iconUrl: 'images/marker-red.png',
    iconSize: [40, 40],
    iconAnchor: [9, 21],
    popupAnchor: [0, -14],
});

var markerClusters = L.markerClusterGroup();

const total = document.getElementById('total').value;
for (var j = 0; j < total; j++) {
    var lat = document.getElementById("coordonites_" + j).getAttribute('data-lat');
    var long = document.getElementById("coordonites_" + j).getAttribute('data-long');
    var sentiment = document.getElementById("coordonites_" + j).getAttribute('data-sentiment');
    if(sentiment === '1') {
        var positiveMarker = L.marker(new L.LatLng(lat, long), {
            icon: blueIcon,
        });
        markerClusters.addLayer(positiveMarker);
    }
    else {
        var negaiveMarker = L.marker(new L.LatLng(lat, long), {
            icon: redIcon,
        });
        markerClusters.addLayer(negaiveMarker);
    }
 }
map.addLayer(markerClusters);

