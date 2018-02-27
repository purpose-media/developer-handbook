
<section class="cta">
    <div class="{{ $data->image1 ? 'cta--image' : '' }}">
        @if( $data->image1 )
            <img src="{{ $data->image1 }}" class="objFit">
        @endif
        <h3>{{ $data->title1 }}</h3>
        {!! $data->content1 !!}
        <a href="{{ $data->buttonUrl1 }}" class="button">{{ $data->buttonText1 }}</a>
    </div>
    <div class="{{ $data->image2 ? 'cta--image' : '' }}">
        @if( $data->image2 )
            <img src="{{ $data->image2 }}" class="objFit">
        @endif
        <h3>{{ $data->title2 }}</h3>
        {!! $data->content2 !!}
        <a href="{{ $data->buttonUrl2 }}" class="button">{{ $data->buttonText2 }}</a>
    </div>
</section>
