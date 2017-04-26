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
            _globalCheckFlag = false,
            _loading = $('<div class="loading"></div>'),
            _inputHidden = _obj.find('input[type=hidden].value-check'),
            _inputHiddenPage = _obj.find('input[type=hidden].current-page'),
            _sortingPage = _obj.find('#items-page'),
            _sortingDate = _obj.find('#sorting-date'),
            _dataRatePath = _obj.find('.category__wrap').data('rate-path'),
            _window = $(window),
            _objValue = {},
            _arr = [];

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

                        if( _obj.hasClass('category_sub') ) {

                            _addLoading();
                            _requestContent( null, null, null, true );

                        }

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
                                _requestContent( null, null, null, true );

                            }


                        } else if( curItem.hasClass('pagination__next') ) {

                            if( !( curItem.prev().hasClass('active') ) ) {

                                _inputHiddenPage.val( parseInt( _inputHiddenPage.val() ) - 1 );
                                _addLoading();
                                _requestContent( null, null, null, true );

                            }

                        } else {

                            if( value != parseInt( _inputHiddenPage.val() ) ) {

                                _inputHiddenPage.val(value);
                                _addLoading();
                                _requestContent( null, null, null, true );

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
                _filterItem.find('input[type=checkbox]').on( {
                    change: function () {

                        var curItem = $(this),
                            curItemName = curItem.attr('name'),
                            label = curItem.next(),
                            labelText = label.text(),
                            name = curItem.attr('name'),
                            id = curItem.data('id');

                        _globalCheckFlag = curItem.prop('checked');

                        _addLoading();
                        _closeFilter();
                        _writeInHidden( name, id, _globalCheckFlag );
                        _requestContent( labelText, id, name, false );

                    }
                } );
                _sortingPage.on( {
                    change: function () {

                        _addLoading();
                        _requestContent( null, null, null, true );

                    }
                } );
                _sortingDate.on( {
                    change: function () {

                        _addLoading();
                        _requestContent( null, null, null, true );

                    }
                } );

            },
            _addLoading = function() {

                _loading = $('<div class="loading"></div>');

                $('.category__content').append(_loading);

            },
            _closeLoading = function() {

                setTimeout( function() {
                    _loading.addClass('hidden');
                }, 300 );

                setTimeout( function() {
                    _loading.remove();
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
                _requestContent( null, null, null, true );

            },
            _clearSingleFilter = function( itemId, itemName ) {

                _filterItem.find('input[data-id='+ itemId +']').prop('checked', false);
                _globalCheckFlag = false;
                _addingFilteredBy( '', itemId );
                _addLoading();
                _requestContent( null, null, null, true );
                _writeInHidden( itemName, itemId, _globalCheckFlag );

            },
            _closeFilter = function() {

                if( _btn2.hasClass('opened') ) {

                    _btn2.removeClass('opened');
                    _filters.removeClass('opened');
                    $('.site__content').attr( 'style', '' );

                } else {

                    _btn2.addClass('opened');
                    _filters.addClass('opened');
                    $('.site__content').css( { 'z-index': 100 } )

                }
            },
            _addingFilteredBy = function( itemText, itemId, itemName ) {

                if( _globalCheckFlag ) {

                    _filteredList.append('<li data-name='+ itemName +' data-id="'+ itemId +'">'+ itemText +' <a href="#" class="category__filtered-remove"></a></li>');

                } else {

                    _filteredList.find('li[data-id=' + itemId + ']').remove();

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
            _pasteNewProducts = function( data ) {

                var newData = data.products;

                var productsWrap = '<div class="products-subcategory">';

                $.each( newData, function() {

                    var product = this;

                    productsWrap += '<div class="products-subcategory__item">';

                    if( product.featured != undefined && product.featured != "" ) {

                        productsWrap += '<span class="site__featured">'+ product.featured +'</span>';

                    }

                    productsWrap += '<div class="products-subcategory__head">\
                                            <div>\
                                                <div class="products-subcategory__pic" style="background-image: url('+ product.picture +')"></div>\
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



                    if( product.content.description != undefined ) {

                        productsWrap +='<div>\
                                        <ul class="products-subcategory__description">';

                        for( var i = 0; i <= product.content.description.length-1; i++ ) {
                            productsWrap +='<li>'+ product.content.description[i] +'</li>'
                        }

                        productsWrap +='</ul>\
                                    </div>';

                    }

                    productsWrap +='<div>\
                                            <div class="products-subcategory__items">\
                                                <div>\
                                                    <div class="products-subcategory__specification">\
                                                        <div class="products-subcategory__specification-head">';

                    for( var i = 0; i <= product.content.specification.head.length-1; i++ ) {
                        productsWrap +='<div>'+ product.content.specification.head[i] +'</div>'
                    }
                    productsWrap +='</div>\
                                                        <div class="products-subcategory__specification-content">';

                    for( var i = 0; i <= product.content.specification.content.length-1; i++ ) {
                        productsWrap +='<div>'+ product.content.specification.content[i] +'</div>'
                    }

                    productsWrap +='</div>\
                                                    </div>\
                                                </div>';

                    if( product.oldPrice != undefined ) {

                        productsWrap +='<div class="products-subcategory__footer">\
                                                    <div class="products-subcategory__price">\
                                                        <del>'+ product.oldPrice +'</del> '+ product.price +'\
                                                    </div>';

                    } else {

                        productsWrap +='<div class="products-subcategory__footer">\
                                                    <div class="products-subcategory__price">\
                                                        '+ product.price +'\
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
            _requestContent = function ( itemText, itemId, itemName, clear ) {

                _request.abort();
                _request = $.ajax( {
                    url: _path,
                    data: {
                        value: _inputHidden.val(),
                        pageSorting: _sortingPage.val(),
                        dateSorting: _sortingDate.val(),
                        currentPage: _inputHiddenPage.val(),
                        idCategory: _obj.data('id-category')
                    },
                    dataType: 'json',
                    type: "get",
                    success: function ( m ) {

                        if( !clear ) {

                            _addingFilteredBy( itemText, itemId, itemName );

                        }

                        _pasteNewProducts( m );
                        _closeLoading();
                        _createPagination( m );

                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            console.log("Error");
                        }
                    }
                } );

            },
            _createPagination = function( data ) {

                var pages = parseInt(data.settings.pagesAll),
                    activePage = parseInt(data.settings.currentPage);

                _inputHiddenPage.val(activePage);

                if( pages != 1 ) {

                    var paginationWrap = '<div class="pagination">';

                    paginationWrap +='<a href="#" class="pagination__prev"></a>';

                    if( pages <= 7 ) {

                        for( var i = 1; i <= pages - 1; i++ ) {

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
            _init = function () {
                _addEvents();
            };

        //public properties

        //public methods

        _init();
    };

} )();