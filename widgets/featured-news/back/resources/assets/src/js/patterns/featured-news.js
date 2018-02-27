
(function () {


    window.parseSaidPosts = function( elm, subContainer, response, newResponse )
    {
        var result = $( '.result', subContainer );
        $( '.c-ajax-filter__results', subContainer ).remove();
        var container = $('<div style="margin: 0;" />').addClass('c-ajax-filter__results');
        for( var i in newResponse ) {
            $('<div />').addClass('c-ajax-filter__results__item').attr( 'data-id', i ).attr( 'data-for', 'selecting-post' ).html( newResponse[i] ).appendTo( container );
        }
        container.appendTo( $('.c-ajax-filter', subContainer ) );
        $( '[data-for="selecting-post"]', subContainer ).on( 'click', function(e) {
            e.preventDefault();
            elm.val( $('span', $(this) ).text() );
            elm.parent().next().val( $(this).attr( 'data-id' ) );
            $('.c-ajax-filter__results:visible').remove();
        });
    };

    $.fn.featuredNewsWidget = function( options )
    {

        var FeaturedNews = function( elm )
        {

            var _self = this;

            this.elm = elm;

            var xhr;

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

            var setBindingsOnNewContent = function( subContainer, response )
            {
                if( typeof response.on !== 'undefined' ) {
                    $( response.selector, subContainer ).on( response.on, function(e) {
                        var _elm = $(this);
                        var parameters = {};
                        if( typeof response.parameter !== 'undefined' ) {
                            parameters[response.parameter] = $(this).val();
                        }
                        if( xhr && xhr.readyState != 4 ){
                            xhr.abort();
                        }
                        xhr = $[response.type]( response.url, parameters, function( newResponse ) {
                            window[response.parse]( _elm, subContainer, response, newResponse );
                        });
                    });
                }
            };

            var onTypeChangeEventHandler = function(e)
            {
                var type = $(this).val();
                var iteration = $(this).attr( 'data-iteration' );
                var subContainer = $(this).parents('.sub-container:eq(0)');
                var result = $( '.result', subContainer );
                $.get( '/widgets/featured-news/type/' + type + '/' + iteration, function( response ) {
                    if( ! result.hasClass( 'start' ) ) {
                        result.html('').append($(response.view));
                    } else {
                        result.removeClass( 'start' );
                    }
                    setBindingsOnNewContent( subContainer, response );
                })
                .fail(function() {
                    result.html('');
                    result.removeClass( 'start' );
                });
            };

            var onDocumentClickHandler = function(e)
            {
                if( ! $(e.target).parents( '.c-ajax-filter:eq(0)').length ) {
                    var visible = $('.c-ajax-filter__results:visible');
                    if( visible.length ) {
                        visible.prev().val('');
                        visible.remove();
                    }
                }
            };

            ( function init() {

                $(document).on( 'click', onKeyUpEventHandler );
                $( '.type', _self.elm ).on( 'change', onTypeChangeEventHandler ).trigger( 'change' );
                $(document).on( 'click', onDocumentClickHandler );
                _self.elm.removeAttr( 'data-widget' );

            })();

            return api = {
                elements : elements(),
                serialiseArray : serialiseArray(),
                serialise : serialise()
            };

        };

        return $(this).each( function() {
            $(this).data( 'featured-news', new FeaturedNews( $(this) ) );
        });

    };

})();


$(function() {

    $('[data-widget="featured-news"]').featuredNewsWidget();
    $(document).on( 'region-added', '.region', function(){
        $('[data-widget="featured-news"]').featuredNewsWidget();
    });

});
