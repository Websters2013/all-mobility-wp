"use strict";
( function(){

    $( function () {

        $.each( $('.my-cart__product'), function () {

            new ProductsInCart( $(this) );

        } );

    } );

    var ProductsInCart = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _input = _obj.find('.count-product__input'),
            _btnChangeCount = _obj.find('.count-product__btn'),
            _btnRemoveProduct = _obj.find('.my-cart__remove'),
            _request = new XMLHttpRequest(),
            _cart = $('.cart'),
            oldCount = 0,
            newCount = 0,
            _totalPrice = $('.my-cart__total'),
            _subTotalPrice = $('.my-cart__subtotal'),
            _taxesPrice = $('.my-cart__taxes'),
            _load = _obj.find('.my-cart__loading'),
            _btnPromo = $('.my-cart__define .btn'),
            _inputCoupon = $('.my-cart__define input'),
            _discount = $('.my-cart__discount'),
            _define = $('.my-cart__define'),
            _applied = $('.my-cart__applied'),
            _invalid = $('.my-cart__invalid'),
            _window = $(window);

        //private methods
        var _addEvents = function () {


                _window.on({
                    resize: function () {

                        _setHeight();

                    }
                } );

                _input.on( {
                    keypress: function () {

                        if ( !(( event.which != 46 || $( this ).val().indexOf( '.' ) != -1 ) && ( event.which < 48 || event.which > 57 )) ) {

                            _requestCountChange( $(this).parents('.my-cart__product') );

                        }

                    }
                } );

                _input.on( {
                    keyup: function () {

                        setTimeout( function() {

                            _writeInCart();
                            _requestCountChange( _obj );
                        }, 100 );

                    }
                } );

                _btnChangeCount.on( {
                    click: function () {

                        _btnRemoveProduct.addClass('loading');

                        setTimeout( function() {

                            _requestCountChange( _obj );
                          
                        }, 500 );

                    }
                } );

                _btnChangeCount.on( {
                    mouseup: function () {

                        setTimeout( function() {

                            _writeInCart();

                        }, 100 );

                    }
                } );

                _btnRemoveProduct.on( {
                    click: function () {

                        var cirItem = $(this);

                        if( !( cirItem.hasClass('loading') ) ) {

                            _load.addClass('visible');

                            setTimeout( function() {

                                _requestProductRemove( cirItem.parents('.my-cart__product') );

                            }, 500 );


                        }

                        return false;

                    }
                } );

                _btnPromo.on( {
                    click: function () {

                        var cirItem = $(this);

                        if( !( _inputCoupon.val() == '' ) ) {

                            $('.my-cart__promo-loading').addClass('loading');
                            _define.addClass('hidden');

                            if( !( cirItem.hasClass('ajax-loading') ) ) {

                                _requestCouponDiscount();

                            }

                        } else {

                            _inputCoupon.focus();

                        }


                        return false;

                    }
                } );

                _invalid.find('a').on( {
                    click: function () {

                        $('.my-cart__promo-loading').removeClass('loading');

                        _invalid.removeClass('visible');
                        _define.removeClass('hidden');

                        return false;

                    }
                } );

                _applied.find('a').on( {
                    click: function () {

                        $('.my-cart__promo-loading').removeClass('loading');

                        _requestCancelCouponDiscount();

                        return false;

                    }
                } );
                _inputCoupon.on( {
                    keypress: function (event) {

                        if ( ( event.which == 13 ) ) {
                            event.preventDefault();
                        }

                    }
                } );

            },
            _removeProduct = function( elem ) {

                elem.addClass('hidden');

                setTimeout( function() {

                    elem.remove();

                }, 500 );

            },
            _requestProductRemove = function ( elem ) {

                _request.abort();
                _request = $.ajax( {
                    url: $('body').attr('data-action'),
                    data: {
                        action: 'remove_cart_item',
                        id: elem.attr('data-product-key'),
                        flag: 'remove'
                    },
                    dataType: 'json',
                    type: "get",
                    success: function (m) {

                        _removeProduct( elem );

                        if( parseInt(m.cartCountProducts) == 0 ) {

                            _cart.find('.cart__price').remove();
                            _cart.find('.cart__name').remove();
                            _cart.append('<span class="cart__name">Cart</span>');
                            $('.my-cart').addClass('empty');


                        } else {

                            _cart.find('.cart__name').remove();
                            _cart.find('.cart__price').remove();
                            _cart.append('<span class="cart__price"></span>');
                            _cart.find('.cart__price').html(m.cartCountPrice);
                            _taxesPrice.find('dd').html( m.taxes );
                            _discount.find('dd').html( m.discount );
                            _cart.addClass('cart_fill');

                        }
                        _totalPrice.find('dd').html( m.total );
                        _subTotalPrice.find('dd').html( m.subtotal );

                        setTimeout( function() {

                            _load.removeClass('visible');

                        }, 500 );

                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            alert("ERROR!!!");
                        }
                    }
                } );

            },
            _requestCountChange = function ( elem ) {
                
                _request.abort();
                _request = $.ajax( {
                    url: $('body').attr('data-action'),
                    data: {
                        action: 'cart_quantity_changes',
                        id: elem.attr('data-product-id'),
                        key: elem.attr('data-product-key'),
                        variation: elem.attr('data-variation-id'),
                        countProduct: elem.find('.count-product__input').val(),
                        flag: 'changeCount'
                    },
                    dataType: 'json',
                    type: "get",
                    success: function (m) {

                        elem.find('.my-cart__total-price').html( m.productTotal );
                        _subTotalPrice.find('dd').html( m.subtotal );
                        _totalPrice.find('dd').html( m.total );
                        _cart.find('.cart__price').html(m.cartCountPrice);
                        _discount.find('dd').html( m.discount );
                        _taxesPrice.find('dd').html( m.taxes );

                        setTimeout( function() {

                            _btnRemoveProduct.removeClass('loading');

                        }, 500 );

                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            console.log("Error");
                        }
                    }
                } );

            },
            _requestCouponDiscount = function () {

                _request.abort();
                _request = $.ajax( {
                    url: $('body').attr('data-action'),
                    data: {
                        action: 'apply_coupon_to_order',
                        inputVal: _inputCoupon.val(),
                        flag: 'coupon',
                        id: ''
                    },
                    dataType: 'json',
                    type: "get",
                    success: function (m) {

                        setTimeout( function() {

                            if( m.status == 1 ) {

                                _discount.addClass('visible');
                                _define.addClass('hidden');
                                _applied.addClass('visible');
                                _totalPrice.find('dd').html( m.total );
                                _subTotalPrice.find('dd').html( m.subtotal );
                                _taxesPrice.find('dd').html( m.taxes );
                                _discount.find('dd').html( m.discount );
                                _cart.find('.cart__price').html(m.total);

                            } else {

                                _define.addClass('hidden');
                                _invalid.addClass('visible');
                                _applied.addClass('hidden');

                            }

                            _btnPromo.removeClass('ajax-loading');
                            $('.my-cart__promo-loading').removeClass('loading');

                        }, 500 );

                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            console.log("Error");
                        }
                    }
                } );

            },
            _requestCancelCouponDiscount = function ( ) {

                _request.abort();
                _request = $.ajax( {
                    url: $('body').attr('data-action'),
                    data: {
                        action: 'remove_coupon_to_order',
                        inputVal: _inputCoupon.val(),
                        flag: 'couponRemove',
                        id: ''
                    },
                    dataType: 'json',
                    type: "get",
                    success: function (m) {

                        setTimeout( function() {

                            _totalPrice.find('dd').html( m.total );
                            _cart.find('.cart__price').html(m.total);
                            _subTotalPrice.find('dd').html( m.subtotal );
                            _taxesPrice.find('dd').html( m.taxes );
                            _discount.find('dd').html( m.discount );
                            _discount.removeClass('visible');
                            _define.removeClass('hidden');
                            _applied.removeClass('visible');
                            $('.my-cart__promo-loading').removeClass('loading');

                        }, 500 );


                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            console.log("Error");
                        }
                    }
                } );

            },
            _setHeight = function() {

                //_obj.each( function() {

                    var curItem = _obj,
                        children = curItem.find('>div');

                    curItem.height( children.outerHeight(true) );

                //} )

            },
            _writeInCart =  function() {

                newCount = 0;

                if( !( _cart.hasClass('cart_fill') ) ) {

                    $('.my-cart__products .count-product__input').each( function() {

                        var curItem = $(this),
                            value = parseInt( curItem.val() );

                        newCount += value;

                    } );

                    setTimeout( function() {

                        _cart.addClass('cart_fill');


                    }, 600 );

                } else {

                    $('.my-cart__products .count-product__input').each( function() {

                        var curItem = $(this),
                            value = parseInt( curItem.val() );

                        newCount += value;

                    } );

                }

            },
            _init = function () {
                _obj[0].obj = _self;
                _addEvents();
                _setHeight();
            };

        //public properties

        //public methods


        _init();
    };

} )();