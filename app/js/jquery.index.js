( function(){

    $(function () {

        $('.main-slider').each(function () {

            new MainSlider( $(this) );

        } );

    } );

    var MainSlider = function (obj) {

        //private properties
        var _obj = obj,
            _window = $(window),
            _itemsWrap = _obj.find('.swiper-container'),
            _pagination = _obj.find('.swiper-pagination'),
            _prev = _obj.find('.main-slider__constrols .swiper-button-prev'),
            _next = _obj.find('.main-slider__constrols .swiper-button-next'),
            _globalWinWidth = _window.width();

        //private methods

        var _addEvents = function () {

                _window.on( {
                    resize: function () {

                        if (_globalWinWidth < _window.width()) {

                            _globalWinWidth = _window.width() - 1;

                            _obj.find( '.main-slider__item' ).css( {
                                minHeight: ''
                            } );

                            _obj.find( '.main-slider__item' ).css( {
                                minHeight: _itemsWrap.height()
                            } );

                        }
                    }
                } );
            },
            _initSlider = function() {

                var swiper = new Swiper(_itemsWrap, {
                    dots: true,
                    slideActiveClass: 'visible',
                    //paginationType: 'bullets',
                    nextButton: _next,
                    prevButton: _prev,
                    autoplay : 3500,
                    loop : true
                });

                _obj.find( '.main-slider__item' ).css( {
                    minHeight: _itemsWrap.height()
                } );

            },
            _init = function () {
                _addEvents();
                _initSlider();
            };

        //public properties

        //public methods

        _init();
    };

} )();
