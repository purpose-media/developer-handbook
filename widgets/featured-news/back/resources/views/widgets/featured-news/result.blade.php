@php
    $typeValue = $data["type-{$iteration}"];
    switch( $typeValue ) {
        case '1' :
            $categories = app( Purposemedia\AdminBlog\Contracts\Blueprints\BlogCategories::class )->model()->all()->pluck( 'title', 'id' )->toArray();
            echo view( 'widgets.featured-news.latest-post-from-said-category-view', [ 'category' => isset( $data["category-{$iteration}"] ) ? $data["category-{$iteration}"] : '', 'iteration' => $iteration, 'categories' => $categories ] )->render();
        break;
        case '2' :
            echo view( 'widgets.featured-news.nth-latest-post-view', [ 'nth' => isset( $data["nth-post-{$iteration}"] ) ? $data["nth-post-{$iteration}"] : '', 'iteration' => $iteration ] )->render();
        break;
        case '3' :
            echo view( 'widgets.featured-news.said-post-view', [ 'title' => isset( $data["said-post-name-{$iteration}"] ) ? $data["said-post-name-{$iteration}"] : '', 'id' => isset( $data["said-post-id-{$iteration}"] ) ? $data["said-post-id-{$iteration}"] : '', 'iteration' => $iteration ] )->render();
        break;
    }
@endphp
