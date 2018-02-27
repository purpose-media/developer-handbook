
(function () {

    $.fn.doubleCtaWidget = function( _options )
    {

        var DoubleCTA = function( elm )
        {

            var _self = this;

            var options = $.extend({
                onInit: function(){}
            }, _options );

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
                            value: $(this)[0].tagName.toLowerCase() === 'textarea' ? $(this).redactor('code.get') : $(this).val()
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

                //elements().on( 'blur', onKeyUpEventHandler );
                $(document).on( 'click', onKeyUpEventHandler );
                $.fn.ensphere.veto.wysiwyg( 'textarea', _self.elm );
                options.onInit( _self.elm );
                _self.elm.removeAttr( 'data-widget' );

            })();

            return api = {
                elements : elements(),
                serialiseArray : serialiseArray(),
                serialise : serialise()
            };

        };

        return $(this).each( function() {
            $(this).data( 'double-cta', new DoubleCTA( $(this) ) );
        });

    };

})();


$(function() {

    $('[data-widget="double-cta"]').doubleCtaWidget();
    $(document).on( 'region-added', '.region', function(){
        $('[data-widget="double-cta"]').doubleCtaWidget({
            onInit: function( elm ) {
                $( '[data-for="media-attachment"]', elm ).mediaManager();
            }
        });
    });

});
