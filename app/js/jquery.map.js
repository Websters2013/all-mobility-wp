( function(){

    $(function () {

        $('.google-map').each(function () {

            new GoogleMap( $(this) );

        } );

    } );

    var GoogleMap = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            mapName = _obj.attr('id'),
            settings = _obj.data('settings'),
            mapLat = parseFloat(settings.lat),
            mapLng = parseFloat(settings.lng),
            iconPath = settings.icon,
            iconWidth = parseInt(settings.iconWidth),
            iconHeight = parseInt(settings.iconHeight),
            mapZoom = parseInt(settings.zoom),
            myLatLng = { lat: mapLat, lng: mapLng },
            _window = $( window ),
            map,
            tileListener,
            marker,
            deltaY = 1.4;

        //private methods
        var _addEvents = function () {

                google.maps.event.addDomListener( window, 'resize', function() {

                    map.setCenter( myLatLng );
                    _offsetCenter( map.getCenter(), 0, 0);

                } );

            },
            _initMap = function () {

                map = new google.maps.Map( document.getElementById('contact-google-map'), {
                    zoom: mapZoom,
                    //disableDefaultUI: true,
                    scrollwheel: false,
                    center: { lat: mapLat, lng: mapLng }
                } );

                var icon = {
                    url: iconPath,
                    scaledSize: new google.maps.Size(iconWidth, iconHeight),
                    origin: new google.maps.Point(0,0),
                    anchor: new google.maps.Point(iconWidth/2,iconHeight)
                };

                var beachMarker = new google.maps.Marker( {
                    position: { lat: mapLat, lng: mapLng },
                    map: map,
                    icon: icon
                } );

                google.maps.event.addListenerOnce(map, 'idle', function() {

                    map.setCenter( myLatLng );
                    _offsetCenter( map.getCenter(), 0, 0);

                } );

            },
            _offsetCenter = function ( latlng, offsetx, offsety ) {

                var scale = Math.pow( 2, map.getZoom() ),
                    worldCoordinateCenter = map.getProjection().fromLatLngToPoint( latlng ),
                    pixelOffset = new google.maps.Point( ( offsetx/scale ) || 0, ( offsety/scale ) || 0 ),
                    worldCoordinateNewCenter = new google.maps.Point(

                        worldCoordinateCenter.x - pixelOffset.x,
                        worldCoordinateCenter.y + pixelOffset.y

                    ),

                    newCenter = map.getProjection().fromPointToLatLng( worldCoordinateNewCenter );

                map.setCenter( newCenter );

            },
            _init = function () {

                _initMap();
                _addEvents();

            };

        _init();
    };

} )();