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
            _obj = obj;

        //private methods
        var _constructor = function() {
                _obj[ 0 ].obj = _self;
                _initSlider();
            },
            _initSlider = function () {

                $('.slider-for').slick( {
                    slidesToShow: 1,
                    slidesPerRow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    infinite: true,
                    asNavFor: '.slider-nav'
                });
                $('.slider-nav').slick( {
                    slidesToShow: 4,
                    slidesPerRow: 4,
                    asNavFor: '.slider-for',
                    dots: false,
                    arrows: false,
                    infinite: true,
                    centerMode: false,
                    focusOnSelect: true,
                    responsive: [
                        {
                            breakpoint: 1360,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 4,
                                slidesToScroll: 4
                            }
                        },
                        {
                            breakpoint: 412,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 3
                            }
                        }
                    ]
                });

            };

        _constructor();
    };
    var FeaturedProductsSlider = function( obj ) {

        //private properties
        var _self = this,
            _obj = obj,
            _slider,
            _window = $(window),
            _flag,
            _pagination = _obj.find('.swiper-pagination'),
            _prev = _obj.find('.swiper-button-prev'),
            _next = _obj.find('.swiper-button-next'),
            _loop = false;

        //private methods
        var _constructor = function() {
                _obj[ 0 ].obj = _self;
                _addEvents();

                if( _window.width() <= 768 ) {

                    _flag = false;

                } else {

                    _flag = true;
                    _initSlider();

                }

            },
            _addEvents = function () {

                _window.on( {
                    resize: function () {

                        if( _window.width() <= 768 ) {

                            if( _flag ) {

                                _flag = false;
                                _destroy();

                            }

                        } else {

                            if( !_flag ) {

                                _flag = true;
                                _initSlider();

                            }


                        }

                    }
                } );

            },
            _destroy = function () {

                _slider.slick('unslick');

            },
            _initSlider = function () {

                _addSomeParams();

                _slider = $('.featured-products__wrapper').slick( {
                    dots: true,
                    //centerMode: true,
                    slidesToShow: 5,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 5000,
                    prevArrow: _prev,
                    nextArrow: _next,
                    appendDots:  _pagination,
                    responsive: [
                        {
                            breakpoint: 1440,
                            settings: {
                                slidesToShow: 4
                            }
                        }
                    ]
                } );

            },
            _addSomeParams = function() {

                if( _window.width() >= 1024 ) {

                    if( _obj.find('.featured-products__slide').length >= 4 ) {

                        _loop = true;

                    }

                } else  if( _window.width() >= 1425 ) {

                    if( _obj.find('.featured-products__slide').length >= 5 ) {

                        _loop = true;

                    }

                }

                if(!_loop) {

                    _obj.find('.featured-products__controls').css({
                        display: 'none'
                    } );

                }

            };

        _constructor();
    };

} )();
