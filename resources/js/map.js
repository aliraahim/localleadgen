var marker;
var searchCircle;
var map;
var coords = {
    lat: 31.483868657320123
    , lng: 74.32620605
};
var radius = 2;
var units = 'kilometers';

function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: coords
        , zoom: 12
        , mapTypeControl: false
        , scaleControl: true
    });
    coords = map.getCenter();
    clearMarker();
    placeMarkerAndPanTo();
    map.addListener('click', function (e) {
        coords = e.latLng;
        clearMarker();
        placeMarkerAndPanTo();
        //map.setZoom(13);
    });
    var input = /** @type {!HTMLInputElement} */ (document.getElementById('pac-input'));
    var types = document.getElementById('type-selector');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            //window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        }
        else {
            map.setCenter(place.geometry.location);
            //map.setZoom(17); // Why 17? Because it looks good.
        }
        coords = map.getCenter();
        placeMarkerAndPanTo();
    });
}
// This event listener calls addMarker() when the map is clicked.
function placeMarkerAndPanTo() {
    clearMarker();
    marker = new google.maps.Marker({
        position: coords
        , map: map
        , draggable: true
    });
    map.panTo(coords);
    drawCircle();
    $('#coords').text(coords);
    marker.addListener('dragend', function (ev) {
        coords = ev.latLng;
        map.panTo(coords);
        drawCircle();
        $('#coords').text(coords);
    });
}

function drawCircle() {
    if (units == 'kilometers') radius = parseFloat($("#radius").slider('getValue')) * 1000;
    else radius = parseFloat($("#radius").slider('getValue')) * 1000 / 0.621371;
    if (searchCircle != null) searchCircle.setMap(null);
    searchCircle = new google.maps.Circle({
        strokeColor: '#FF0000'
        , strokeOpacity: 0.8
        , strokeWeight: 1
        , fillColor: '#FF0000'
        , fillOpacity: 0.2
        , map: map
        , center: coords
        , radius: radius
    });
}

function clearMarker() {
    if (marker != null) marker.setMap(null);
}
$("#radius").slider({
    tooltip: 'always'
});
$('#radius').on('slideStop', function () {
    drawCircle();
    console.log('hello');
});
$("#units").change(function () {
    drawCircle();
});
//$('input[type=radio]').change(function () {
//    console.log('hello');
//    alert($(this).attr('name'));
//});

$(document).on('change', 'input:radio', function (event) {
    units = $(this).attr('value');
    drawCircle();
});