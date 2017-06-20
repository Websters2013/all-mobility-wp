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
            _itemsWrap = _obj.find('.main-slider__items'),
            _pagination = _obj.find('.swiper-pagination'),
            _prev = _obj.find('.main-slider__constrols .swiper-button-prev'),
            _next = _obj.find('.main-slider__constrols .swiper-button-next'),
            _globalWinWidth = _window.width();

        //private methods

        var _addEvents = function () {

                _itemsWrap.on('init', function(slick) {

                    _itemsWrap.find('.slick-current').find('.main-slider__content').addClass('visible');

                } );

                _itemsWrap.on('afterChange', function(slick, currentSlide) {

                    $(currentSlide.$slides).find('.main-slider__content').removeClass('visible');
                    $(currentSlide.$slides).filter('.slick-current').find('.main-slider__content').addClass('visible');

                } );

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

                _itemsWrap.slick( {
                    dots: true,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    prevArrow: _prev,
                    nextArrow: _next,
                    appendDots:  _pagination
                } );

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
