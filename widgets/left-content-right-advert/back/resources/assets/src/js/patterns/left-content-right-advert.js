
(function () {

    $.fn.leftContentRightAdvertWidget = function( options )
    {

        var LeftContentRightAdvert = function( elm )
        {

            var _self = this;

            this.elm = elm;

            this.dataField = $('[data-for="post-value"]', this.elm );

            var elements = function()
            {
                return $('input, textarea, select', _self.elm);
            };

            var serialiseArray = function()
            {
                var data = [];
                elements().each( function() {
                    if( $(this).attr( 'data-name' ) ) {
                        data.push({
                            name: $(this).attr( 'data-name' ),
                            value: $(this).val()
                        });
                    }
                });
                return data;
            };

            var serialise = function()
            {
                return JSON.stringify( serialiseArray() );
            };

            var onKeyUpEventHandler = function(e)
            {
                _self.dataField.val( serialise() );
            };

            ( function init() {

                elements().on( 'blur', onKeyUpEventHandler );
                _self.elm.removeAttr( 'data-widget' );

            })();

            return api = {
                elements : elements(),
                serialiseArray : serialiseArray(),
                serialise : serialise()
            };

        };

        return $(this).each( function() {
            $(this).data( 'left-content-right-advert', new LeftContentRightAdvert( $(this) ) );
        });

    };

})();


$(function() {

    $('[data-widget="left-content-right-advert"]').leftContentRightAdvertWidget();
    $(document).on( 'region-added', '.region', function(){
        $('[data-widget="left-content-right-advert"]').leftContentRightAdvertWidget();
    });

});
