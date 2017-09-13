<div class="post-item">
    <div class="post-item__image">
        <img src="{!! route( 'get.media-manager.size', [ 'post-item', $post->mainImageBasename ] ) !!}" alt="" />
    </div>
    <div class="post-item__meta">
        <a href="{{ $post->url }}" class="post-item__link">
            <span class="post-item__title">{{ $post->title }}</span>
        </a>
        <p class="post-item__excerpt">{{ $post->excerpt }}</p>
    </div>
</div>
