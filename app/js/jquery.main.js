( function(){

    var globalScrollFlag = true;

    $(function () {

        $('.site__menu').each(function () {

            new SubMenu( $(this) );
            new Menu( $(this) );

        } );

        $('.not-found').each(function () {

            new FullHeight( $(this) );

        } );

        $('.confirmation').each(function () {

            new FullHeight( $(this) );

        } );

        $('#wpsl-stores').each(function () {

            $(this).perfectScrollbar({
                wheelPropagation: true
            });

        } );

        $('.checkout').each(function () {

            new CheckoutHeight( $(this) );

        } );

        $('.product__items').each(function () {

            new ChangePrice( $(this) );

        } );

    } );

    var SubMenu = function (obj) {

        //private properties
        var _obj = obj,
            _items = _obj.find('.site__menu-item'),
            _arrow = _obj.find('.site__menu-icon'),
            _window = $(window),
            timeout = null,
            _startWinWidth = _window.width();

        //private methods

        var _addEvents = function () {

                _window.on( {
                    resize: function () {

                        if( _startWinWidth > _window.width() ) {

                            _startWinWidth = _window.width();

                            _window.find('.opened').removeClass('opened');

                        }

                    }
                } );
                $('body').on('click', '.site__menu-icon', function() {

                    if( jQuery(window).width() < 1000 ) {

                        var curItem = jQuery(this),
                            parent = curItem.parent('li');

                        if ( parent.hasClass('opened') ) {

                            parent.removeClass('opened');

                        } else {

                            parent.addClass('opened');

                        }

                    }

                    return false;

                });
                _arrow.on( {
                    click: function () {

                        var curItem = jQuery(this),
                            parent = curItem.parents('li'),
                            subMenu = parent.find('.site__menu-sub');

                        if( _window.width() < 1024 ) {
                            if ( parent.hasClass('opened') ) {

                                parent.removeClass('opened');
                                subMenu.slideUp();

                            } else {

                                parent.addClass('opened');
                                subMenu.slideDown();

                            }
                        }

                        return false;
                    }
                } );
                _items.on( {
                    mouseenter: function() {

                        if( _window.width() >= 1024 ) {

                            var curItem = $(this),
                                parent = curItem.parent('ul');

                            if( curItem.hasClass('site__menu-item_sub') ) {

                                curItem.addClass('opened');

                                var subMenu = curItem.find('.site__menu-sub');

                                if( ( _window.width() - ( subMenu.innerWidth() + curItem.offset().left ) ) < 0 ) {

                                    if( ( ( curItem.offset().left + curItem.innerWidth() ) - subMenu.innerWidth() ) < 0 ) {

                                        subMenu.css( {
                                            left: '50%',
                                            '-webkit-transform': 'translateX(-50%)',
                                            'transform': 'translateX(-50%)'
                                        } );

                                    } else {

                                        subMenu.css( {
                                            left: curItem.position().left - subMenu.innerWidth() + curItem.innerWidth()
                                        } );

                                    }

                                } else  {

                                    subMenu.css( {
                                        left: curItem.position().left
                                    } );

                                }

                            }

                        }

                    }
                } );
                $('[data-product]').on( {
                    mouseenter: function() {

                        if( _window.width() >= 1024 ) {

                            $('.featured-product__loading').addClass('visible');

                            if (timeout) {

                                clearTimeout(timeout);
                                timeout = null;

                            }

                            var curItem = $(this);

                            var data = curItem.data('product');

                            //if( $('.featured-product__loading').hasClass('visible') ) {

                                timeout = setTimeout( function() {
                                    console.log(data);

                                    _obj.find('.featured-product').find('.featured-product__title').text(data.name);
                                    _obj.find('.featured-product').find('.featured-product__pic img').attr('src', data.src);
                                    _obj.find('.featured-product').find('.btn').attr('href', data.href);
                                    _obj.find('.featured-product').find('.featured-product__price span').text(data.price);

                                    if( data.onSale ) {
                                        _obj.find('.featured-product').find('.featured-product__remark').addClass('visible');
                                    } else {
                                        _obj.find('.featured-product').find('.featured-product__remark').removeClass('visible');
                                    }

                                    if( data.oldPrice ) {
                                        _obj.find('.featured-product').find('.featured-product__price del').text(data.oldPrice );
                                    } else {
                                        _obj.find('.featured-product').find('.featured-product__price del').addClass('hidden');
                                    }

                                }, 160 );

                                timeout = setTimeout( function() {

                                    $('.featured-product__loading').removeClass('visible');

                                }, 200 );

                            //}

                        }

                    }
                } );
                _obj.on( 'mouseleave', function(){

                    if( _window.width() >= 1024 ) {

                        $(this).find('.opened').removeClass('opened');

                    }

                } );
                _obj.find('ul').on( 'mouseleave', function(){

                    if( _window.width() >= 1024 ) {

                        $(this).find('.opened').removeClass('opened');

                    }

                } );
                _obj.find('li').on( 'mouseleave', function(){

                    if( _window.width() >= 1024 ) {

                        $(this).removeClass('opened');

                    }

                } );

            },
            _init = function () {
                _addEvents();
            };

        //public properties

        //public methods

        _init();
    };
    var Menu = function (obj) {

        //private properties
        var _self = this,
            _menu = obj,
            _window = $(window),
            _action = false,
            _actionScroll = false,
            _lastPos,
            _header = $('.site__header'),
            _hiddenBlockMenu = $('.site__hidden-items'),
            _headerHeight = _header.innerHeight(),
            _showBtn = $('.site__header-btn'),
            _closeBtn = $('.site__hidden-close'),
            _search = $('.search'),
            _openSearch = $('.search-btn'),
            _closeSearch = $('.search__cancel'),
            _getFree = $('.site__hidden-btn'),
            _site = $('.site'),
            _dom = $( 'html' ),
            siteScrollTop,
            _content = $('.site__content'),
            _lastScrollTop = 0;

        //private methods
        var _addEvents = function () {

                $(document).on(
                    "click",
                    ".search",
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
                    "body",
                    function(){

                        _closeSearchBox();

                    }
                );

                _showBtn.on({
                    click: function () {

                        _openMenu($(this));

                    }
                });
                _closeBtn.on({
                    click: function () {

                        _closeMenu();

                        return false;

                    }
                });
                _openSearch.on({
                    click: function () {

                        _openSearchBox($(this));

                        return false;

                    }
                });
                _closeSearch.on({
                    click: function () {

                        _closeSearchBox();

                        return false;

                    }
                });
                _window.on( {
                    scroll: function ( e ) {
                        _fixedHeader();
                        _action = _window.scrollTop() >= _headerHeight;


                        if( _window.scrollTop() == 0 ) {
                            _header.removeClass('site__header_hidden');
                        }

                    },
                    DOMMouseScroll: function (e) {

                        var delta = e.originalEvent.detail;

                        if (delta) {
                            var direction = (delta > 0) ? 1 : -1;

                            _checkScroll(direction);

                        }

                    },
                    mousewheel: function (e) {

                        var delta = e.originalEvent.wheelDelta;

                        if (delta) {
                            var direction = (delta > 0) ? -1 : 1;

                            _checkScroll(direction);

                        }

                    },
                    touchmove: function (e) {

                        var currentPos = e.originalEvent.touches[0].clientY;

                        if (currentPos > _lastPos) {

                            _checkScroll(-1);


                        } else if (currentPos < _lastPos) {

                            _checkScroll(1);

                        }

                        _lastPos = currentPos;

                    },
                    keydown: function (e) {
                        switch (e.which) {

                            case 32:
                                _checkScroll(1);
                                break;
                            case 33:
                                _checkScroll(-1);
                                break;
                            case 34 :
                                _checkScroll(1);
                                break;
                            case 35 :
                                _checkScroll(1);
                                break;
                            case 36 :
                                _checkScroll(-1);
                                break;
                            case 38:
                                _checkScroll(-1);
                                break;
                            case 40:
                                _checkScroll(1);
                                break;

                            default:
                                return;
                        }
                    },
                    resize: function() {

                        if( _window.width()>=1024 ) {

                            _site.css( {
                                'height': ''
                            } );

                            setTimeout( function() {

                                if( _site.height() > _window.height() ) {
                                    _dom.css( {
                                        'overflow-y': ''
                                    } );
                                }

                            }, 10);

                        }

                    }
                } );

            },
            _checkScroll = function (direction) {

                if (direction > 0 && !_header.hasClass('site__header_hidden') && !_showBtn.hasClass('opened') && _action ) {

                    _header.addClass('site__header_hidden');

                }

                if (direction < 0 && _header.hasClass('site__header_hidden') && !_showBtn.hasClass('opened') && _action && globalScrollFlag) {

                    _header.removeClass('site__header_hidden');

                }

            },
            _fixedHeader = function () {

                if (_window.scrollTop() > _headerHeight + 150  ) {

                    _header.addClass('fixed');

                } else {


                    _header.removeClass('fixed');

                }

            },
            _openMenu = function (elem) {

                var curItem = elem;

                if (curItem.hasClass('opened')) {

                    curItem.removeClass('opened');
                    _hiddenBlockMenu.removeClass('opened');

                } else {

                    curItem.addClass('opened');
                    _hiddenBlockMenu.addClass('opened');

                }

                siteScrollTop = _window.scrollTop();


                setTimeout( function() {

                    if( _site.height() > _window.height() ) {
                        _dom.css( {
                            'overflow-y': 'scroll'
                        } );
                    }

                    setTimeout( function() {

                        _site.css( {
                            'height': '100%'
                        } );

                    }, 10);

                }, 300);

            },
            _openSearchBox = function (elem) {

                var curItem = elem;

                if (curItem.hasClass('opened')) {

                    curItem.removeClass('opened');
                    _search.removeClass('active');
                    _getFree.removeClass('hidden');

                } else {

                    curItem.addClass('opened');
                    _search.addClass('active');
                    _getFree.addClass('hidden');

                }

            },
            _closeMenu = function () {

                _showBtn.removeClass('opened');
                _hiddenBlockMenu.removeClass('opened');
                _search.find('input').focusout();


                _site.css( {
                    'height': ''
                } );

                setTimeout( function() {

                    if( _site.height() > _window.height() ) {
                        _dom.css( {
                            'overflow-y': ''
                        } );
                    }

                    _window.scrollTop( siteScrollTop );

                }, 10);

            },
            _closeSearchBox = function () {

                _openSearch.removeClass('opened');
                _search.removeClass('active');
                _getFree.removeClass('hidden');

            },
            _init = function () {
                _menu[0].obj = _self;
                _addEvents();
                _fixedHeader();
            };

        _init();
    };
    var FullHeight = function (obj) {

        //private properties
        var _obj = obj,
            _window = $(window),
            _globalWinWidth = _window.width();

        //private methods

        var _addEvents = function () {

                _window.on( {
                    resize: function () {

                        if ( _globalWinWidth != _window.width() ) {

                            _globalWinWidth = _window.width();

                            _setHeight();

                        }
                    }
                } );
            },
            _setHeight = function() {

                _obj.css( {
                    minHeight: ''
                } );
                _obj.css( {
                    minHeight: _window.height() - $('.site__header').innerHeight() - $('.site__footer').innerHeight() - $('.breadcrumbs').innerHeight()
                } );

            },
            _init = function () {
                _addEvents();
                _setHeight();
            };

        //public properties

        //public methods

        _init();
    };
    var CheckoutHeight = function (obj) {

        //private properties
        var _obj = obj,
            _totalOrder = _obj.find('.total-order');

        //private methods

        var _addEvents = function () {

            },
            _setHeight = function() {

                _obj.css( {
                    minHeight: _totalOrder.innerHeight()
                } );

            },
            _init = function () {
                _addEvents();
                _setHeight();
            };

        //public properties

        //public methods

        _init();
    };

    var ChangePrice = function (obj) {

        Number.prototype.formatMoney = function(c, d, t){
            var n = this,
                c = isNaN(c = Math.abs(c)) ? 2 : c,
                d = d == undefined ? "." : d,
                t = t == undefined ? "," : t,
                s = n < 0 ? "-" : "",
                i = String(parseInt(n = Math.abs(Number(n) || 0).toFixed(c))),
                j = (j = i.length) > 3 ? j % 3 : 0;
            return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
        };

        $('.variations_form').on('change', function () {
           var variation = $('.variations').find('select'),
               counter = 0;


           variation.each(function ($value) {
               if($( this ).val()) {
                   counter++;
               }
           });
           if(counter === variation.length) {
               var price = $('.price>span').text(),
                   symbol = $('.price>span>span').text();

               price = parseFloat((price.slice(1).split(',')).join(''));

               $upsells = $('.variations_form>.websters-select').find('select');
               $upsells.each(function () {
                   var select = $( this ).val();

                   if(select > 0) {
                       $( this ).find('option').each(function () {
                           if($(this).val() === select) {
                               price += $(this).data('price');
                           }
                       });
                   }
               });
               $('.price').css('display', 'none');
               $('.featured-product__price>strong').html('<span>'+symbol+'</span>'+price.formatMoney(2, '.', ','));

           }

        });

    }


} )();

