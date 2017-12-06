$(document).ready(function() {


		var btn_zoom_in = document.getElementById('zoomin');
		if (btn_zoom_in !== null) {
			google.maps.event.addDomListener(btn_zoom_in, 'click', function() {
				mapObject.setZoom(mapObject.getZoom() + 1 );
			});
		}

		var btn_zoom_out = document.getElementById('zoomout');
		if (btn_zoom_out !== null) {
			google.maps.event.addDomListener(btn_zoom_out, 'click', function() {
				mapObject.setZoom(mapObject.getZoom() - 1 );
			});
		}
		var mapContainer = document.getElementById('map');
		
		if (mapContainer !== null) {
			create_map(mapContainer);
			create_marker();
		}
});

function create_map(mapContainer) {
	var mapOptions = {
		center: new google.maps.LatLng(Lat, Lng),
		zoom: 16,
		zoomControl: true,
            zoomControlOptions: {
                position: google.maps.ControlPosition.RIGHT_CENTER
            },
		navigationControl: false,
		mapTypeControl: false,
		scrollwheel: false,
		panControl: false,
		disableDefaultUI: false,
		disableDoubleClickZoom: true
	};
	
	mapObject = new google.maps.Map(mapContainer, mapOptions);

	var mapStyle = [{"featureType":"all","elementType":"all","stylers":[{"hue":"#e7ecf0"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-70}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"visibility":"simplified"},{"saturation":-60}]}];
	mapObject.setOptions({styles: mapStyle});
}
	
function create_marker() {		
	var pinImage = new google.maps.MarkerImage('../web/img/marker.png'),
	myPin = new google.maps.LatLng(Lat, Lng);
	
	marker = new google.maps.Marker({
		position: myPin,
		map: mapObject,
		title: 'Hello World!',
		icon: pinImage
	});
	
}
