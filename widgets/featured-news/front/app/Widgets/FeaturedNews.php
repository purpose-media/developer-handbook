<?php

namespace Application\Front\Widgets;

use Purposemedia\FrontBlog\Contracts\Blueprints\Blog;
use Purposemedia\FrontRegions\Libs\Renderer;

class FeaturedNews extends Renderer
{

    /**
     * @var string
     */
    protected $view = 'widgets.featured-news';

    /**
     * Renders the widget
     *
     * @param $widgetRef
     * @param $widgetModelId
     * @param null $data
     * @param array $options
     * @return string
     */
    public function render( $widgetRef, $widgetModelId, $data = null, $options = [] )
    {
        $_data = [];
        foreach( $data as $obj ) {
            $_data[camel_case($obj->name)] = $obj->value;
        }
        $posts = [];
        for( $i = 1; $i <= 5; $i++ ) {
            $type = $_data["type{$i}"];
            switch( $type ) {
                case '1' :
                    /** Latest post from said category */
                    $categoryId = isset( $_data["category{$i}"] ) ? $_data["category{$i}"] : null;
                    if( $categoryId ) {
                        if( ! is_null( $post = $this->getLatestPostFromCategory( $categoryId ) ) ) {
                            $posts[] = $post;
                        }
                    }
                break;
                case '2' :
                    /** Nth latest post */
                    $nthLatestPost = isset( $_data["nthPost{$i}"] ) ? $_data["nthPost{$i}"] : null;
                    if( $nthLatestPost ) {
                        if( ! is_null( $post = $this->getNthLatestPost( $nthLatestPost ) ) ) {
                            $posts[] = $post;
                        }
                    }
                break;
                case '3' :
                    /** Said post */
                    $postId = isset( $_data["saidPostId{$i}"] ) ? $_data["saidPostId{$i}"] : null;
                    if( $postId ) {
                        if( ! is_null( $post = $this->getPost( $postId ) ) ) {
                            $posts[] = $post;
                        }
                    }
                break;
            }
        }
        $posts = collect( $posts );
        return view( $this->view, [ 'data' => (object) $_data, 'posts' => $posts ] )->render();
    }

    /**
     * @param $categoryId
     * @return null
     */
    public function getLatestPostFromCategory( $categoryId )
    {
        if( is_null( $category = app( Blog::class )->getCategoryModel()->find( $categoryId ) ) ) {
            return null;
        }
        return $category->posts()->orderBy( 'published', 'desc' )->first();
    }

    /**
     * @param $nth
     * @return mixed
     */
    public function getNthLatestPost( $nth )
    {
        $post = app( Blog::class )->model();
        $post = config('site.default') ? $post->whereStatusId(2) : $post->whereHas('site', function ($query) { $query->whereStatusId(2); });

        return $post->orderBy( 'published', 'DESC' )
            ->live()
            ->skip( $nth-1 )
            ->take(1)
            ->first();
    }

    /**
     * @param $postId
     * @return mixed
     */
    public function getPost( $postId )
    {
        $post = app( Blog::class )->model();
        $post = config('site.default') ? $post->whereStatusId(2) : $post->whereHas('site', function ($query) { $query->whereStatusId(2); });
        return $post->live()->find( $postId );
    }

}
