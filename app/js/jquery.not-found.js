( function(){

    $(function () {

        $('.not-found').each(function () {

            new NotFound( $(this) );

        } );

    } );


    var NotFound = function (obj) {

        //private properties
        var _obj = obj,
            _window = $(window),
            _globalWinWidth = _window.width();

        //private methods

        var _addEvents = function () {

                _window.on( {
                    resize: function () {

                        if ( _globalWinWidth != _window.width() ) {

                            _globalWinWidth = _window.width();

                            _setHeight();

                        }
                    }
                } );
            },
            _setHeight = function() {

                console.log(34)

                _obj.css( {
                    minHeight: ''
                } );
                _obj.css( {
                    minHeight: _window.height() - $('.site__header').innerHeight() - $('.site__footer').innerHeight() - $('.breadcrumbs').innerHeight()
                } );

            },
            _init = function () {
                _addEvents();
                _setHeight();
            };

        //public properties

        //public methods

        _init();
    };

} )();
