
@if( ! $posts->isEmpty() )
    <section class="secondaryMedia">
        <div>
            <a href="{{ $data->showMoreUrl }}" class="button__seeAll">{{ $data->showMoreText }}</a>
            <h2>{{ $data->title }}</h2>
            <div class="{{ $data->display === '1' ? 'carousel' : '' }}">
                @foreach( $posts as $post )
                    @include( $post->typeView )
                @endforeach
            </div>
        </div>
    </section>
@endif
