@if( $categories = CategoryFeed::byReference( 'category.feed.reference' )->categories )
    <div class="category-feed">
        @foreach( $categories as $key => $category )
            <div class="category-feed__item">
                @include( 'category-item' )
            </div>
        @endforeach
    </div>
@endif
