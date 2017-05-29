"use strict";
( function(){

    $( function () {

        $.each( $('.product__add'), function () {

            new ProductsUpSals( $(this) );

        } );

    } );

    var ProductsUpSals = function (obj) {

        //private properties
        var _self = this,
            _obj = obj,
            _request = new XMLHttpRequest(),
            _objValue = {},
            _arr = [],
            _inputHidden = _obj.find('input[type=hidden][name=upsals]'),
            _selectsUpSals = _obj.find('.products__upsals-choice'),
            _totalPrice = $('.product__upsals-price');

        //private methods
        var _addEvents = function () {

                _selectsUpSals.on( {
                    change: function() {

                        var curItem = $(this),
                            name = curItem[0].getAttribute('name'),
                            value = curItem[0].value;

                        _writeInHidden(name, value);

                        _requestUpSalsProduct();

                    }
                } );

            },
            _requestUpSalsProduct = function () {

                _request.abort();
                _request = $.ajax( {
                    url: $('body').attr('data-action'),
                    data: {
                        action: "upsals",
                        value: _inputHidden.val(),
                        flag: "upsals",
                        id: _obj.parents('.product').data('id')
                    },
                    dataType: 'json',
                    type: "get",
                    success: function (m) {

                        _totalPrice.find('span').html(m.totalPrice);
                        _totalPrice.addClass('visible');

                    },
                    error: function (XMLHttpRequest) {
                        if ( XMLHttpRequest.statusText != "abort" ) {
                            alert("ERROR!!!");
                        }
                    }
                } );

            },
            _startView = function() {

                for( var i = 0; i<= _selectsUpSals.length-1; i++ ) {

                    var select = _selectsUpSals[i],
                        name = select.getAttribute('name'),
                        value = select[0].value;

                    _writeInHidden(name, value);

                }

            },
            _writeInHidden = function(name, value) {

                _objValue[name] = [value];


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
                _obj[0].obj = _self;
                _addEvents();
                _startView();
            };

        //public properties

        //public methods


        _init();
    };

} )();