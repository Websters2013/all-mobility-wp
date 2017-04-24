( function(){

    $(function () {

        $('.add-review__rate').each(function () {

            new Rate( $(this) );

        } );

    } );

    var Rate = function (obj) {

        //private properties
        var _obj = obj,
            _elem = document.getElementById('#el'),
            _inputHiddenRate = _obj.find('input[type=hidden]');

        //private methods

        var _initRate = function () {

                var rate = _elem,
                    currentRating = 0,
                    maxRating= 5,
                    callback = function(rating) {
                        _inputHiddenRate.val( rating );

                        console.log(_inputHiddenRate.val())
                    };

                var myRating = rating(rate, currentRating, maxRating, callback);

            },
            _init = function () {
                _initRate();
            };

        //public properties

        //public methods

        _init();
    };

} )();