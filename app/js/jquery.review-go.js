( function(){

    var globalScrollFlag = true;

    $(function () {

        $('.go_review').each(function () {

            new ReviewGo( $(this) );

        } );

    } );

    var ReviewGo = function (obj) {

        //private properties
        var _obj = obj,
            _window = $(window),
            _reviews = $('.reviews'),
            _dom = $( 'html, body'),
            _header = $('.site__header');

        //private methods

        var _addEvents = function () {

                _window.on( {
                    load: function() {

                        var heightHeader = _header.innerHeight();

                        _dom.stop( true, false );
                        _dom.animate( {
                            scrollTop: _reviews.offset().top - 30

                        }, {
                            duration: 500,
                            progress: function () {
                                globalScrollFlag = false;
                                _header.addClass( 'site__header_hidden' );
                                heightHeader = _header.innerHeight();
                            },
                            complete: function () {

                                setTimeout( function() {
                                    globalScrollFlag = false;
                                }, 200 );

                                setTimeout( function() {
                                    globalScrollFlag = true
                                }, 500 );

                            }
                        });

                    }
                } );

            },
            _init = function () {
                _addEvents();
            };

        //public properties

        //public methods

        _init();
    };

} )();