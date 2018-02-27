
@if( isset( $items ) && ! $items->isEmpty() )
    <section class="socialBar">
        <h2>Join in the talk</h2>
        <div id="social__items">
            @foreach( $items as $item )
                <div class="social__item">
                    <div class="{{ $item->feed->type_id === 1 ? "s-instagram" : "s-twitter" }}">
                        @if( $item->feed->type_id === 2 )
                            <h4>{!! $item->contents !!}</h4>
                        @else
                            <img src="{{ $item->media }}" class="objFit" />
                        @endif
                        <span>
                            <a target="social" href="{{ $item->link }}">{{ "@{$item->feed->instagram_username}" }}</a>
                            | {{ ( new Westsworld\TimeAgo() )->inWords( $item->published ) }}
                        </span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endif
