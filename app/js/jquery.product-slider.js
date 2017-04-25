"use strict";
( function() {

    $( function() {

        $.each( $( '.product__slider' ), function() {

            new ProductSlider ( $( this ) );

        } );

        $.each( $( '.featured-products' ), function() {

            new FeaturedProductsSlider ( $( this ) );

        } );
    });

    var ProductSlider = function( obj ) {

        //private properties
        var _self = this,
            _obj = obj,
            _slider,
            _galleryThumbs,
            _window = $(window),
            _loop = false,
            _slidesLength = 0;

        //private methods
        var _constructor = function() {
                _obj[ 0 ].obj = _self;
                _initSlider();
            },
            _initSlider = function () {

                _addSomeParams();

                _slider = new Swiper( _obj.find('.gallery-top') , {
                    slidesPerView: '1',
                    loop: _loop,
                    loopedSlides: _slidesLength,
                    centeredSlides: false,
                    spaceBetween: 30,
                    onSlideChangeEnd: function(swiper){

                        if(!_loop) {
                            var activeIndex = swiper.activeIndex;
                            $(_galleryThumbs.slides).removeClass('is-selected');
                            $(_galleryThumbs.slides).eq(activeIndex).addClass('is-selected');
                            _galleryThumbs.slideTo(activeIndex,500, false);
                        } else {

                            $('.swiper-slide .product__slider-thumbs').css({
                                "border-color": "transparent"
                            });
                            $('.swiper-slide-active .product__slider-thumbs').css({
                                "border-color": "rgba(244, 121, 32, 0.5)"
                            });

                        }

                    }
                } );

                _galleryThumbs = new Swiper( _obj.find('.gallery-thumbs'), {
                    centeredSlides: false,
                    slidesPerView: '4',
                    touchRatio: 0.2,
                    //freeMode: !_loop,
                    loop: _loop,
                    loopedSlides: _slidesLength,
                    slideToClickedSlide: true,
                    breakpoints: {
                        1440: {
                            slidesPerView: '3'
                        }
                    },
                    onInit: function(swiper) {

                        if(!_loop) {
                            $(swiper.slides).eq(swiper.activeIndex).addClass('is-selected');
                        }
                    },
                    onClick: function (swiper, event){

                        if(!_loop) {
                            var clicked = swiper.clickedIndex;
                            swiper.activeIndex = clicked;
                            swiper.updateClasses();
                            $(swiper.slides).removeClass('is-selected');
                            $(swiper.clickedSlide).addClass('is-selected');
                            _slider.slideTo(clicked,500, false);
                        }


                    }
                });

                _slider.params.control = _galleryThumbs;
                _galleryThumbs.params.control = _slider;

                if (_loop) {

                    $('.swiper-slide-active .product__slider-thumbs').css({
                        "border-color": "rgba(244, 121, 32, 0.5)"
                    });

                }

            },
            _addSomeParams = function() {

                if( _window.width() < 1440 ) {

                    if( _obj.find('.gallery-thumbs .swiper-slide').length >= 3 ) {

                        _loop = true;
                        _slidesLength = _obj.find('.gallery-thumbs .swiper-slide').length;

                    }

                }
                else {

                    if( _obj.find('.gallery-thumbs .swiper-slide').length >= 4 ) {

                        _loop = true;
                        _slidesLength = _obj.find('.gallery-thumbs .swiper-slide').length;

                    }

                }

            };

        _constructor();
    };
    var FeaturedProductsSlider = function( obj ) {

        //private properties
        var _self = this,
            _obj = obj,
            _slider,
            _window = $(window),
            _flag;

        //private methods
        var _constructor = function() {
                _obj[ 0 ].obj = _self;
                _addEvents();
                //_initSlider();
            },
            _addEvents = function () {

                _window.on( {
                    load: function () {

                        if( _window.width() <= 768 ) {

                            _flag = true;

                        } else {

                            _flag = true;

                            if( _flag ) {
                                _initSlider();
                                _flag = false;
                            }

                        }

                    },
                    resize: function () {

                        if( _window.width() <= 768 ) {

                            //_flag = false;

                            if( !_flag ) {
                                _destroy();
                                _flag = true;
                            }

                        } else {

                            //_flag = true;

                            if( _flag ) {
                                _initSlider();
                                _flag = false;
                            }

                        }

                    }
                } );

            },
            _destroy = function () {

                _slider.destroy(true, true);

            },
            _initSlider = function () {

                _slider = new Swiper( _obj.find( '.swiper-container' ), {
                    pagination: _obj.find('.swiper-pagination'),
                    slidesPerView: 5,
                    paginationClickable: true,
                    speed: 600,
                    loop: true,
                    autoplay: 5000,
                    autoplayDisableOnInteraction: false,
                    nextButton: _obj.find('.swiper-button-next'),
                    prevButton: _obj.find('.swiper-button-prev'),
                    breakpoints: {
                        1440: {
                            slidesPerView: 4
                        }
                    }
                } );
            };

        _constructor();
    };

} )();
