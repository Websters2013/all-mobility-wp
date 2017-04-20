( function(){

    $(function () {

        $('.accordion').each(function () {

            new Accordion( $(this) );

        } );

    } );

    var Accordion = function (obj) {

        //private properties
        var _obj = obj,
            _btn = _obj.find('dt');

        //private methods

        var _addEvents = function () {

                _btn.on( {
                    click: function () {

                        var curItem = $(this),
                            next = curItem.next();

                        if( curItem.hasClass('opened') ) {

                            curItem.removeClass('opened');
                            next.css( {
                                'min-height': 0,
                                height: 0
                            } );

                        } else {

                            curItem.addClass('opened');
                            next.css( {
                                'min-height': next.find('>div').outerHeight(true)
                            } );

                            setTimeout( function() {

                                next.css( {
                                    'height': 'auto'
                                } );

                            }, 310 )

                        }


                        return false;
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