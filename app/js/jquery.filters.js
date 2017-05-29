( function(){

    $(function () {

        $('.category').each(function () {

            new Filters( $(this) );

        } );

    } );

    var Filters = function (obj) {

        //private properties
        var _obj = obj,
            _path = $('body').data('action'),
            _request = new XMLHttpRequest(),
            _btn = _obj.find('.category__filters-item span'),
            _btn2 = _obj.find('.category__filters-title'),
            _filters = _obj.find('.category__filters-items'),
            _form = _filters.find('form'),
            _closeFilters = _obj.find('.category__filtered-close'),
            _filterItem = _obj.find('.category__filters-list'),
            _filtered = _obj.find('.category__filtered'),
            _filteredList = _obj.find('.category__filtered-list'),
            _countFiltered = 0,
            _title = _obj.find('.category__filters-title'),
            _titleInner = _obj.find('.category__filters-title-inner'),
            _clearFilters = _obj.find('.category__filtered .btn, .category__filters-clear'),
            _clearSingle = _obj.find('.category__filtered-remove'),
            _additionalParameters = _obj.find('.category__find-parameters'),
            _globalCheckFlag = false,
            _loading = $('<div class="loading"></div>'),
            _inputHidden = _obj.find('input[type=hidden].value-check'),
            _inputHiddenPage = _obj.find('input[type=hidden].current-page'),
            _sortingPage = _obj.find('#items-page'),
            _sortingDate = _obj.find('#sorting-date'),
            _dataRatePath = _obj.find('.category__wrap').data('rate-path'),
            _apply = _obj.find('.category__filters-apply'),
            _window = $(window),
            _objValue = {},
            _timeout = null,
            _arr = [],
            _checkName = '',
            _checkPrice = '',
            _priceCategory = _obj.find('input[name=_price]');

        //private methods

        var _addEvents = function () {

                _window.on( {
                    resize: function() {

                        _btn.each( function() {

                            var curItem = $(this),
                                parent = curItem.parent(),
                                nextFilters = curItem.next();

                            if( parent.hasClass('opened') ) {

                                nextFilters.css( {
                                    'min-height': nextFilters.find('>div').innerHeight()
                                } );

                            }

                        } );

                        if( _window.width() >= 1024 ) {

                            $('.site__content').css( { 'z-index': '' } )

                        }

                    },
                    load: function() {


                    }
                } );
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

                        _closeFilter();

                    }
                } );
                _clearFilters.on( {
                    click: function () {

                        _inputHiddenPage.val('1');
                        _clearFilter();

                        return false;
                    }
                } );
                $(document).on(
                    "click",
                    ".pagination a",
                    function() {
                        var curItem = $(this),
                            value = parseInt(curItem.text());

                        if( curItem.hasClass('pagination__prev') ) {

                            if( parseInt( _inputHiddenPage.val() ) != 1 ) {

                                _inputHiddenPage.val( _inputHiddenPage.val() - 1 );
                                _addLoading();
                                _requestContent();

                            }


                        } else if( curItem.hasClass('pagination__next') ) {

                            if( !( curItem.prev().hasClass('active') ) ) {

                                _inputHiddenPage.val( parseInt( _inputHiddenPage.val() ) + 1 );
                                _addLoading();
                                _requestContent();

                            }

                        } else {

                            if( value != parseInt( _inputHiddenPage.val() ) ) {

                                _inputHiddenPage.val(value);
                                _addLoading();
                                _requestContent();

                            }

                        }

                        return false;
                    }
                );
                $(document).on(
                    "click",
                    ".category__filtered-remove",
                    function() {
                        var curItem = $(this),
                            parent = curItem.parent(),
                            dataId = parent.data('id'),
                            dataName = parent.data('name');

                        _inputHiddenPage.val('1');
                        _clearSingleFilter( dataId, dataName );

                        return false;
                    }
                );
                _closeFilters.on( {
                    click: function () {

                        _closeFilter();

                        return false;

                    }
                } );
                _apply.on( {
                    click: function () {

                        _closeFilter();

                        return false;

                    }
                } );
                _filterItem.find('input[type=checkbox]').on( {
                    change: function () {

                        var curItem = $(this),
                            label = curItem.next(),
                            labelText = label.clone().children().remove().end().text(),
                            name = curItem.attr('name'),
                            id = curItem.data('id'),
                            categoryName = curItem.parents('.category__filters-item').find('span')[0].innerText;

                        _globalCheckFlag = curItem.prop('checked');

                        if( _window.width() >= 1024 ) {

                            _addLoading();
                            _closeFilter();

                        }

                        _writeInHidden( name, id, _globalCheckFlag );
                        _inputHiddenPage.val('1');
                        _addingFilteredBy( labelText, id, name, categoryName );
                        _requestContent();

                    }
                } );
                _sortingPage.on( {
                    change: function () {

                        _inputHiddenPage.val('1');
                        _addLoading();
                        _requestContent();

                    }
                } );
                _sortingDate.on( {
                    change: function () {

                        _inputHiddenPage.val('1');
                        _addLoading();
                        _requestContent();

                    }
                } );
                _additionalParameters.on({
                   submit: function() {

                       if( _window.width() >= 1024 ) {

                           _addLoading();

                       }

                       _inputHiddenPage.val('1');
                       _requestContent();

                       return false;

                   }
                });

            },
            _addingFilteredBy = function( itemText, itemId, itemName, categoryName ) {

                if( _globalCheckFlag ) {

                    _filteredList.append('<li data-name='+ itemName +' data-id="'+ itemId +'">'+ categoryName +': '+ itemText +' <a href="#" class="category__filtered-remove"></a></li>');

                } else {

                    _filteredList.find('li[data-id="' + itemId + '"]').remove();

                }
                _countFiltered = _filteredList.find('li').length;

                if( _countFiltered > 0 ) {

                    _filtered.removeClass('hidden');
                    _title.find('span').html('('+ _countFiltered +')');
                    _titleInner.find('span').html('('+ _countFiltered +')');
                    _title.addClass('selected');
                    _clearFilters.removeClass('hidden');

                } else {

                    _filtered.addClass('hidden');
                    _title.find('span').html('');
                    _titleInner.find('span').html('');
                    _title.removeClass('selected');
                    _clearFilters.addClass('hidden');

                }

            },
            _addLoading = function() {

                _loading = $('<div class="loading"></div>');

                $('.category__content').append(_loading);

                _loading.css({
                    top: $('.category__wrap').position().top - 20
                })

            },
            _closeLoading = function() {

                if (_timeout) {

                    clearTimeout(_timeout);
                    _timeout = null;

                }

                _timeout = setTimeout( function() {
                    $('.loading').addClass('hidden');
                }, 300 );

                _timeout = setTimeout( function() {
                    $('.loading').remove();
                }, 620 );

            },
            _clearFilter = function() {

                _filtered.addClass('hidden');
                _title.find('span').html('');
                _titleInner.find('span').html('');
                _title.removeClass('selected');
                _filteredList.find('li').remove();
                _filterItem.find('input[type=checkbox]').prop('checked', false);
                _inputHidden.val('');

                _addLoading();
                _requestContent();

            },
            _clearSingleFilter = function( itemId, itemName ) {

                _filterItem.find('input[data-id="'+ itemId +'"]').prop('checked', false);
                _globalCheckFlag = false;
                _addingFilteredBy( '', itemId, '', '' );
                _addLoading();
                _writeInHidden( itemName, itemId, _globalCheckFlag );
                _requestContent();


            },
            _closeFilter = function() {

                if( _btn2.hasClass('opened') ) {

                    _btn2.removeClass('opened');
                    _filters.removeClass('opened');
                    $('.site__content').css( { 'z-index': '' } );

                } else {

                    _btn2.addClass('opened');
                    _filters.addClass('opened');

                    if(  _window.width() < 1024 ) {

                        $('.site__content').css( { 'z-index': 100 } );

                    }

                }
            },
            _createPagination = function( data ) {

                var pages = parseInt(data.settings.pagesAll),
                    activePage = parseInt(data.settings.currentPage);

                _inputHiddenPage.val(activePage);

                if( pages != 1 &&  pages != 0 ) {

                    var paginationWrap = '<div class="pagination">';

                    paginationWrap +='<a href="#" class="pagination__prev"></a>';

                    if( pages <= 7 ) {

                        for( var i = 1; i <= pages; i++ ) {

                            if( i == activePage ) {
                                paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                            } else {
                                paginationWrap +='<a href="#">'+ i +'</a>';
                            }

                        }

                    }
                    else {

                        if( activePage <= 3 || activePage > pages-3 ) {

                            for( var i = 1; i <= 3; i++ ) {

                                if( i == activePage ) {
                                    paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                                } else {
                                    paginationWrap +='<a href="#">'+ i +'</a>';
                                }

                            }

                            paginationWrap +='<span>...</span>';

                            for( var i = pages-2; i <= pages; i++ ) {

                                if( i == activePage ) {
                                    paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                                } else {
                                    paginationWrap +='<a href="#">'+ i +'</a>';
                                }

                            }

                        }
                        if( activePage > 3 && activePage <= pages-3 ) {

                            paginationWrap +='<a href="#">1</a>';
                            paginationWrap +='<span>...</span>';

                            if( (activePage-1 > 3) && (activePage+1 <= pages-3) ) {

                                for( var i = activePage-1; i <= activePage+1; i++ ) {

                                    if( i == activePage ) {
                                        paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                                    } else {
                                        paginationWrap +='<a href="#">'+ i +'</a>';
                                    }

                                }

                            } else if( activePage-1 <= 3 ) {

                                for( var i = activePage; i <= activePage+2; i++ ) {

                                    if( i == activePage ) {
                                        paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                                    } else {
                                        paginationWrap +='<a href="#">'+ i +'</a>';
                                    }

                                }

                            } else if( activePage+1 >= pages-3 ) {

                                for( var i = activePage-2; i <= activePage; i++ ) {

                                    if( i == activePage ) {
                                        paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                                    } else {
                                        paginationWrap +='<a href="#">'+ i +'</a>';
                                    }

                                }

                            }

                            paginationWrap +='<span>...</span>';
                            paginationWrap +='<a href="#">'+ pages +'</a>';

                        }
                        if( pages == 8 ) {

                            if( activePage > 3 && activePage <= pages-3 ) {
                                paginationWrap +='<a href="#">1</a>';
                                paginationWrap +='<span>...</span>';

                                for( var i = 4; i <= 5; i++ ) {

                                    if( i == activePage ) {
                                        paginationWrap +='<a href="#" class="active">'+ i +'</a>';
                                    } else {
                                        paginationWrap +='<a href="#">'+ i +'</a>';
                                    }

                                }

                                paginationWrap +='<span>...</span>';
                                paginationWrap +='<a href="#">'+ pages +'</a>';

                            }

                        }

                    }

                    paginationWrap +='<a href="#" class="pagination__next"></a>';
                    paginationWrap += '</div>';

                    $('.pagination-wrap').html(paginationWrap);

                } else {

                    if( $('.pagination').length ) {

                        $('.pagination').remove();

                    }

                }

            },
            _pasteNewProducts = function( data ) {

                var newData = data.products,
                    productsWrap = '<div class="products-subcategory">',
                    newArrPriceRange = [];

                if( _objValue['price'] != undefined ) {

                    for (var i = 0; i <= _objValue['price'].length-1; i++ ) {

                        var priceItem = parseFloat(_objValue['price'][i].replace('$','').replace(',',''));

                        newArrPriceRange.push(priceItem);

                    }

                }

                if( _priceCategory.length ) {

                    var checkedPriceRange = _priceCategory.filter(':checked'),
                        startingPrice = parseInt(checkedPriceRange.attr('value').split('-')[0]);

                }

                if( newArrPriceRange.length ) {

                    var priceRange;

                    if( startingPrice == 0 ) {

                        priceRange = Math.min.apply(null, newArrPriceRange);

                    } else {

                        for( var i = 0; i <= newArrPriceRange.length-1; i++ ) {

                            if( newArrPriceRange[i] >= startingPrice ) {

                                priceRange = newArrPriceRange[i];

                                break;

                            }

                        }

                    }


                }

                $.each( newData, function() {

                    var product = this,
                        price = product.price[0],
                        salePrice = product.oldPrice[0],
                        priceItem;

                    if( _priceCategory.length ) {

                        for (var i = 0; i <= product.price.length-1; i++ ) {

                            priceItem = parseFloat(product.price[i].replace('$','').replace(',',''));

                            if( priceItem >= startingPrice ) {

                                price = product.price[i];
                                salePrice = product.oldPrice[i];

                                break;

                            }

                        }

                    }
                    if( newArrPriceRange.length ) {

                        for (var i = 0; i <= product.price.length-1; i++ ) {

                            priceItem = parseFloat(product.price[i].replace('$','').replace(',',''));

                            if( priceItem >= priceRange ) {

                                price = product.price[i];
                                salePrice = product.oldPrice[i];

                                break;

                            }

                        }

                    }

                    productsWrap += '<div class="products-subcategory__item">';

                    if( product.featured != undefined && product.featured != "" ) {

                        productsWrap += '<span class="site__featured">'+ product.featured +'</span>';

                    }

                    productsWrap += '<div class="products-subcategory__head">\
                                            <div>\
                                                <a href="'+ product.urlDetails +'" class="products-subcategory__pic" style="background-image: url('+ product.picture +')"></a>\
                                            </div>\
                                            <div>\
                                                <h2 class="products-subcategory__title"><a href="'+ product.urlDetails +'">'+ product.title +'</a></h2>';

                    if( product.rate != undefined ) {

                        productsWrap += '<div class="rate">';

                        for( var i = 0; i <= product.rate.starsCount-1; i++ ) {
                            productsWrap +='<img src="'+ _dataRatePath +'img/star.png" width="60" height="50" alt="">&nbsp;'
                        }

                        productsWrap +='<a href="'+ product.rate.urlReviews +'" class="rate__reviews">'+ product.rate.reviewsCount +'</a>\
                                                </div>';

                    }

                    productsWrap +='</div>\
                                        </div>\
                                        <div class="products-subcategory__content">';



                    if( product.content.description != undefined && product.content.description != "" ) {

                        productsWrap +='<div>\
                                        <ul class="products-subcategory__description">';

                        for( var i = 0; i <= product.content.description.length-1; i++ ) {
                            productsWrap +='<li>'+ product.content.description[i] +'</li>'
                        }

                        productsWrap +='</ul>\
                                    </div>';

                    }

                    productsWrap +='<div>\
                                            <div class="products-subcategory__items">';

                    if( product.content.specification != undefined && product.content.specification != "" ) {

                        productsWrap +='<div>\
                    <div class="products-subcategory__specification">\
                                                        <div class="products-subcategory__specification-head">';

                        for( var i = 0; i <= product.content.specification.head.length-1; i++ ) {
                            productsWrap +='<div style="width:'+ (100/product.content.specification.head.length) +'%">'+ product.content.specification.head[i] +'</div>'
                        }
                        productsWrap +='</div>\
                                                        <div class="products-subcategory__specification-content">';

                        for( var i = 0; i <= product.content.specification.content.length-1; i++ ) {
                            productsWrap +='<div style="width:'+ (100/product.content.specification.head.length) +'%">'+ product.content.specification.content[i] +'</div>'
                        }
                        productsWrap +='</div>\
                                                    </div>\
                                                </div>';

                    }

                    if( salePrice != undefined && salePrice != "" ) {

                        productsWrap +='<div class="products-subcategory__footer">\
                                                    <div class="products-subcategory__price">\
                                                        <del>'+ salePrice +'</del> '+ price +'\
                                                    </div>';

                    } else {

                        productsWrap +='<div class="products-subcategory__footer">\
                                                    <div class="products-subcategory__price">\
                                                        '+ price +'\
                                                    </div>';

                    }

                    productsWrap +='<a href="'+ product.urlDetails +'" class="btn btn_3">see details</a>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                    </div>';



                } );

                productsWrap += '</div>';

                $('.category__wrap').html(productsWrap);

                _closeLoading();

            },
            _requestContent = function () {

                _request.abort();
                _request = $.ajax( {
                    url: _path,
                    data: {
                        action : 'get_filtered_products',
                        value: _inputHidden.val(),
                        pageSorting: _sortingPage.val(),
                        dateSorting: _sortingDate.val(),
                        currentPage: _inputHiddenPage.val(),
                        idCategory: _obj.data('id-category'),
                        additionalParameters: _additionalParameters.serialize()
                    },
                    dataType: 'json',
                    type: "get",
                    success: function ( m ) {

                        _pasteNewProducts( m );
                        _createPagination( m );

                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            console.log("Error");
                        }
                    }
                } );

            },
            _writeInHidden = function(name, value, checkFlag) {

                if( checkFlag ) {

                    if(_objValue.hasOwnProperty(name)) {

                        for (var prop in _objValue) {

                            if( prop == name ) {

                                _objValue[prop].push(value);

                            }

                        }


                    } else {

                        _objValue[name] = [value]

                    }

                } else {

                    for (var prop in _objValue) {

                        if( prop == name ) {

                            var i = _objValue[prop].indexOf(value);

                            if(i != -1) {

                                _objValue[prop].splice(i, 1);

                            }

                        }

                    }

                    if( _objValue[name].length == 0 ) {

                        delete _objValue[name];

                    }

                }

                var strFinish = '',
                    strValues = '',
                    strFull = '',
                    arrAll = [];

                for( var key in _objValue ) {

                    _arr = [];

                    var item = _objValue[ key ];

                    _arr.push( item );

                    for( var i = 0; i <= _arr.length-1; i++) {

                        strValues = _arr.join(',');

                    }

                    strFull = key + '=' + strValues;

                    arrAll.push(strFull);

                    strFinish = arrAll.join('&');

                }

                _inputHidden.val( strFinish );

            },
            _init = function () {
                _addEvents();

                if( _obj.hasClass('category_sub') ) {

                    _addLoading();
                    _requestContent();

                }

            };

        //public properties

        //public methods

        _init();
    };

} )();