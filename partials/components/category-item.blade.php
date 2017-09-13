<div class="category-item">
    <a class="category-item__link" href="{{ $category->url }}"></a>
    <div class="category-item__image">
        <img src="{{ route( 'get.media-manager.size', [ 'category-item', $category->mainImageBasename ] ) }}" alt="{{ $category->name }}" />
    </div>
    <div class="category-item__meta">
        <div class="category-item__title">
            {{ $category->name }}
        </div>
    </div>
</div>
