( function(){

    $(function () {

        $('.search').each(function () {

            new Search( $(this) );

        } );

    } );

    var Search = function (obj) {

        //private properties
        var _obj = obj,
            _input = _obj.find('input[type=search]'),
            _request = new XMLHttpRequest(),
            _path = _obj.data('path'),
            suggestSelected = 0,
            countItems = 0,
            valueInput = _input.val(),
            _result = _obj.find('.search__result');

        //private methods

        var _addEvents = function () {

                _input.on( {
                    keyup: function(I) {

                        if( $(window).width() >= 1024 ) {

                            switch(I.keyCode) {
                                case 13:

                                    if( _result.find('.search__found li').filter('.active').length == 0 ) {
                                        _obj.find('form').submit();
                                    }

                                    break;
                                case 32:
                                case 27:
                                case 37:
                                case 38:
                                case 39:
                                case 40:
                                    break;
                                default:

                                    var valueInput = $(this).val();
                                    var count = 0;

                                    if( valueInput.length >= _obj.data('symbols') ) {

                                        _ajaxRequest( $(this), valueInput.length);


                                    } else {

                                        if( $(this).val() == '' ){
                                            _result.removeClass('visible');
                                            suggestSelected = 0;
                                        }
                                    }

                                    break;
                            }

                        }
                    },
                    keydown: function(I) {

                        _result.find('.search__found').html('');
                        _result.find('.top-products').html('');

                        suggestSelected = 0;

                        if( $(window).width() >= 1024 ) {

                            switch( I.keyCode ) {
                                case 13:

                                    if( _result.find('.search__found li').filter('.active').length == 0 ) {
                                        window.location.href = _obj.data('action');
                                    } else {
                                        window.location.href = _result.find('.search__found li').filter('.active').find('a').attr('href')
                                    }
                                    return false;
                                    break;

                                case 27:
                                    _result.remove();
                                    suggestSelected = 0;
                                    return false;
                                    break;

                                case 38:
                                case 40:
                                    I.preventDefault();

                                    if( countItems > 0 ){
                                        _keyActivate( I.keyCode );

                                        if( suggestSelected == countItems){
                                            suggestSelected = 0
                                        }

                                    }

                                    break;
                            }

                        }

                    }

                } );
                $('html').click( function() {

                    _result.removeClass('visible');

                    suggestSelected = 0;

                } );
                $(document).on(
                    "click",
                    "body",
                    function( event ){
                        event = event || window.event;

                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else {
                            event.cancelBubble = true;
                        }
                    }
                );
                $(document).on(
                    "click",
                    ".search__found li",
                    function() {
                        var curItem = $(this),
                            curText = curItem.find('a').text();

                        _input.val(curText);
                        _result.removeClass('visible');
                        suggestSelected = 0;
                    }
                );
                $(document).on(
                    "keydown",
                    ".search__found li",
                    function(I){
                        switch(I.keyCode) {
                            case 13:

                                $(this).trigger('click');
                                break;
                        }
                    }
                );

            },
            _keyActivate = function(n) {

                _result.find('.search__found li').removeClass('active');

                if( _obj.parents().hasClass('site__footer') ) {

                    if( n == 38 && suggestSelected < countItems ) {

                        suggestSelected++;

                    } else if ( n == 40 && suggestSelected > 0 ) {

                        suggestSelected--;
                    }

                    if( suggestSelected > 0 ) {

                        _result.find('.search__found li').eq( -1 - (suggestSelected - 1) ).addClass('active');
                        _input.val( _result.find('.search__found li').eq( -1 - (suggestSelected - 1) ).find('a').text() );

                    } else {

                        _input.val( valueInput );

                    }

                } else {

                    if( n == 40 && suggestSelected < countItems ) {

                        suggestSelected++;

                    } else if ( n == 38 && suggestSelected > 0 ) {

                        suggestSelected--;
                    }

                    if( suggestSelected > 0 ) {

                        _result.find('.search__found li').eq( suggestSelected - 1 ).addClass('active');
                        _input.val( _result.find('.search__found li').eq( suggestSelected - 1 ).find('a').text() );

                    } else {

                        _input.val( valueInput );

                    }

                }


            },
            _addData = function( data ) {

                var data = data,
                    categories = data.categories,
                    categoriesAvailability = categories.length != 0,
                    products = data.products,
                    productsAvailability = products.length != 0,
                    allProductsCategoriesArr = [],
                    productsCategoriesArr = [],
                    urlProductsCategoriesArr = [],
                    flag = true;

                if( productsAvailability ) {

                    var productsWrap = '<div class="top-products__wrap">';

                    $.each( products, function() {

                        var product = this;

                        productsWrap += '<div>\
                                                <div class="top-products__item">\
                                                    <div class="top-products__pic" style="background-image: url('+ product.src +')">\
                                                    </div>\
                                                    <span class="top-products__price"><del>'+ product.oldPrice +'</del> '+ product.price +'</span>\
                                                    <h3 class="top-products__item-title">'+ product.name +'</h3>\
                                                    <a href="'+ product.href +'" class="top-products__btn">view</a>\
                                                </div>\
                                            </div>';
                        if( !categoriesAvailability ) {

                            allProductsCategoriesArr.push( [product.categories.mainCategory, product.categories.urlMainCategory, product.categories.subcategories, product.categories.urlSubcategories] );

                        }

                    } );

                    productsWrap += '</div>';

                    _result.find('div').eq(1).find('.top-products').html('<h2 class="top-products__title">Top Products</h2>' + productsWrap);

                    var resultStr = '<ul class="search__found">';

                    if( categoriesAvailability ) {

                        $.each( categories, function() {

                            var subcategories = this.subcategories,
                                urlSubcategories = this.urlSubcategories,
                                subcategoriesWrap = '';

                            if( subcategories != undefined ) {

                                for( var i = 0; i <= subcategories.length-1; i++ ) {

                                    subcategoriesWrap += '<li class="search__found-sub"><a href="'+ urlSubcategories[i] +'">' + subcategories[i] + '</a></li>';
                                }

                                subcategoriesWrap += '';

                            }

                            resultStr += '<li><a href="'+ this.urlCategory +'">'+ this.name +'</a></li>'+ subcategoriesWrap +'';

                        } );

                    } else {

                        for ( var i = 0; i <= allProductsCategoriesArr.length-1; i++ ) {

                            if( flag ){
                                productsCategoriesArr.push(allProductsCategoriesArr[i]);
                                flag = false;
                            }

                            if( productsCategoriesArr[productsCategoriesArr.length-1][0] != allProductsCategoriesArr[i][0] ) {

                                productsCategoriesArr.push(allProductsCategoriesArr[i]);

                            } else {

                                for ( var j = 0; j <= allProductsCategoriesArr[i].length-1; j++ ) {

                                    for ( var z = 0; z <= allProductsCategoriesArr[i][2].length-1; z++ ) {

                                        if( productsCategoriesArr[productsCategoriesArr.length-1][2].indexOf( allProductsCategoriesArr[i][2][z]) == -1 ) {

                                            productsCategoriesArr[productsCategoriesArr.length-1][2].push( allProductsCategoriesArr[i][2][z] )

                                        }

                                    }

                                }

                            }

                        }

                        var count = 0;

                        for ( var i = 0; i <= productsCategoriesArr.length-1; i++ ) {

                            for ( var j = 0; j <= productsCategoriesArr[i].length-1; j++ ) {

                                var subcategoriesWrap = '';

                                for( var z = 0; z <= productsCategoriesArr[i][2].length-1; z++ ) {

                                    subcategoriesWrap += '<li class="search__found-sub"><a href="' + productsCategoriesArr[i][3][z] + '">' + productsCategoriesArr[i][2][z] + '</a></li>';
                                    count ++;

                                }

                                subcategoriesWrap += '';

                            }

                            resultStr += '<li><a href="' + productsCategoriesArr[i][1] + '">' + productsCategoriesArr[i][0] + '</a></li>'+ subcategoriesWrap +'';

                        }

                    }

                    resultStr += '</ul>';

                    _result.find('div:first').html(resultStr);

                    _result.find('.search__found').find('li:not(:lt(11))').remove();

                    countItems = _result.find('.search__found').find('li').length;

                    _result.addClass('visible');

                } else {

                    _result.removeClass('visible');

                }
            },
            _ajaxRequest =  function( input, n ) {

                _request.abort();
                _request = $.ajax( {
                    url: _path,
                    data: {
                        value: input.val(),
                        action:'main_search'
                    },
                    dataType: 'json',
                    type: "get",
                    success: function ( msg ) {

                        if( Object.keys(msg).length != 0 ) {
                            _addData( msg );
                        }

                    },
                    error: function (XMLHttpRequest) {
                        if (XMLHttpRequest.statusText != "abort") {
                            console.log("Error");
                        }
                    }
                });

                return false;
        },
            _init = function () {
                _addEvents();
            };

        //public properties

        //public methods

        _init();
    };

} )();