( function(){

    window.onload = function() {

        $('.product_adding').each(function () {

            new AddToCartAnimation( $(this) );

        } );
    };

    var AddToCartAnimation = function (obj) {

        //private properties
        var _obj = obj,
            _window = $(window),
            _cart = $('.cart'),
            _header = $('.site__header');

        //private methods

        var _animatedAdding = function( event ) {

                _header.removeClass('site__header_hidden');

                var pic = $('.gallery-top .swiper-slide:first').data('image'),

                    e = event || window.event;

                var pageX = e.pageX,
                    pageY = e.pageY;

                $('body').append('<div class="site__product hidden" style="background-image:url('+ pic +')"></div>');
                $('.site__product').css( {
                    top: $('.gallery-top').offset().top ,
                    left: $('.gallery-top').offset().left,
                    width: $('.gallery-top').width(),
                    height: $('.gallery-top').height()
                } );

                setTimeout( function() {

                    $('.site__product').addClass('visible');
                    $('.site__product').css( {
                        top: _cart.offset().top + _cart.innerHeight()/2 - $('.site__product').height()/2 ,
                        left: _cart.offset().left + _cart.innerWidth()/2 - $('.site__product').width()/2
                    } );

                }, 500 );

                setTimeout( function() {

                    $('.site__product').removeClass('visible');
                    $('.site__product').css( {
                        '-webkit-transform': 'scale(0.3)',
                        'transform': 'scale(0.3)'
                    } );

                }, 1000 );

                setTimeout( function() {

                    $('.site__product').remove();

                }, 1300 );

            },
            _init = function () {
                _animatedAdding();
            };

        //public properties

        //public methods

        _init();
    };

} )();