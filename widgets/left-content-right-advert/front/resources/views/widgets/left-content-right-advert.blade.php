
<section class="article">
    <div>
        {!! $content !!}
    </div>
    <div>
        <div data-api="advert-widget" data-model-id="{{ $advert->id }}" data-api-callback="renderAdvertWidget" class="advert"></div>
    </div>
</section>
