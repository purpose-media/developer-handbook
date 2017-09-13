<div class="product-item">
    <a class="product-item__link" href="{{ $product->url }}"></a>
    <div class="product-item__image">
        <img src="{{ route( 'get.media-manager.size', [ 'product-item', $product->mainImageBasename ] ) }}" alt="{{ $product->name }}" />
    </div>
    <div class="product-item__meta">
        <div class="product-item__title">
            {{ $product->name }}
        </div>
        <div class="product-item__price">
            @if( $product->display_price )
                @if( $product->priceRange[0] != $product->priceRange[1] )
                    <span>From</span>
                @endif
                {{ Currency::display( $product->display_price ) }}
            @endif
        </div>
    </div>
</div>
