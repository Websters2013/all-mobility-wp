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
            _slide = _obj.find('.swiper-slide'),
            _swiper,
            _globalWinWidth = _window.width();

        //private methods

        var _addEvents = function () {

                _window.on({
                    resize: function () {

                        if (_globalWinWidth < _window.width()) {

                            _globalWinWidth = _window.width() - 1;

                            _slide.css({
                                minHeight: ''
                            });
                            _obj.find( '.swiper-slide' ).css( {
                                minHeight: $('.swiper-container').height()
                            } );

                        }
                    }
                });
            },
            _initSlider = function() {

                _swiper = new Swiper( _obj.find( '.swiper-container' ), {
                    pagination: _obj.find('.swiper-pagination'),
                    paginationClickable: true,
                    speed: 600,
                    loop: true,
                    loopedSlides: 1,
                    autoplay: 5000,
                    touchRatio: 2,
                    autoplayDisableOnInteraction: false,
                    nextButton: _obj.find('.swiper-button-next'),
                    prevButton: _obj.find('.swiper-button-prev'),
                    onSlideChangeEnd: function(swiper) {

                        swiper.slides.find('.main-slider__content').removeClass('visible');
                        swiper.slides.eq(swiper.activeIndex).find('.main-slider__content').addClass('visible');

                    }
                } );

                _obj.find( '.swiper-slide' ).css( {
                    minHeight: $('.swiper-container').height()
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
