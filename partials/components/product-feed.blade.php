@if( $products = ProductFeed::byReference( 'product.feed.reference' )->products )
    <div class="product-feed">
        @foreach( $products as $key => $product )
            <div class="product-feed__item">
                @include( 'product-item' )
            </div>
        @endforeach
    </div>
@endif
