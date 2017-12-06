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

		var sectionHeight = parseInt($(".step1").height());	
		$('.map').css('height',sectionHeight-72);	

		var mapContainer = document.getElementById('map');
		
		if (mapContainer !== null) {
			create_map(mapContainer);
			create_marker();

		}
});

function create_map(mapContainer) {
		var mapOptions = {
			center: new google.maps.LatLng(53.924327, 27.633202),
			zoom: 15,
			navigationControl: true,
			mapTypeControl: true,
			scrollwheel: true,
			disableDefaultUI: false,
			disableDoubleClickZoom: true
		};
		
		mapObject = new google.maps.Map(mapContainer, mapOptions);

		var mapStyle = [
			{
				"stylers": [
					{ "hue": "#ff000c" },
					{ "saturation": -80 },
					{ "gamma": 0.40 },
					{ "lightness": 25 }
				]
			},{featureType: "poi",elementType: "labels",stylers: [{visibility:"off"}]}
		];
		
		mapObject.setOptions({styles: mapStyle});
	}
	
function create_marker() {		
		var pinImage = new google.maps.MarkerImage('img/marker.png'),
		myPin = new google.maps.LatLng(53.924327, 27.633202);
		
		marker = new google.maps.Marker({
			position: myPin,
			map: mapObject,
			title: 'Hello World!',
			icon: pinImage
		});
		
	}

function create_info() {
		var infoOptions = {
			disableAutoPan: true,
			maxWidth: 0,
			pixelOffset: new google.maps.Size(-120, -165),
			zIndex: null,
			boxStyle: { 
				background: "url('img/marker-label.png') no-repeat",
				width: "400px",
				height: "215px"
			},
			infoBoxClearance: new google.maps.Size(1, 1),
			isHidden: false,
			pane: "mapPane",
			enableEventPropagation: true
		};
		
		var ib = new InfoBox(infoOptions);
		ib.open(mapObject, marker);
		
	}