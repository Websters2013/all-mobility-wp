( function(){

    $(function () {

        $('.category__filters').each(function () {

            new Filters( $(this) );

        } );

    } );

    var Filters = function (obj) {

        //private properties
        var _obj = obj,
            _btn = _obj.find('.category__filters-item span'),
            _btn2 = _obj.find('.category__filters-title'),
            _filters = _obj.find('.category__filters-items'),
            _window = $(window);

        //private methods

        var _addEvents = function () {

                _btn.on( {
                    click: function () {

                        var curItem = $(this),
                            parent = curItem.parent(),
                            nextFilters = curItem.next();

                        if( parent.hasClass('opened') ) {

                            parent.removeClass('opened');
                            nextFilters.css( {
                                'min-height': 0,
                                height: 0
                            } );

                        } else {

                            parent.addClass('opened');
                            nextFilters.css( {
                                'min-height': nextFilters.find('>div').innerHeight()
                            } );
                            setTimeout( function() {

                                nextFilters.css( {
                                    'height': 'auto'
                                } );

                            }, 310 )

                        }

                    }
                } );

                _btn2.on( {
                    click: function () {

                        var curItem = $(this);

                        if( curItem.hasClass('opened') ) {

                            curItem.removeClass('opened');
                            _filters.removeClass('opened');
                            $('.site__header').attr( 'style', '' );

                        } else {

                            curItem.addClass('opened');
                            _filters.addClass('opened');
                            $('.site__header').css( { 'z-index': 0 } )

                        }

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