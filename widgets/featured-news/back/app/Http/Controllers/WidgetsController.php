<?php

namespace Application\Back\Http\Controllers;

use Purposemedia\AdminBlog\Contracts\Blueprints\BlogCategories;
use Purposemedia\Authentication\Http\Controllers\Controller;

class WidgetsController extends Controller
{

    /**
     * @param $type
     * @param $iteration
     * @return array|string
     */
    public function featuredNewsType( $type, $iteration )
    {
        switch( $type ) {
            case '1' :
                return $this->getLatestPostFromSaidCategoryView( $iteration );
            break;
            case '2' :
                return $this->getNthLatestPostView( $iteration );
            break;
            case '3' :
                return $this->getSaidPostView( $iteration );
            break;
        }
        return '';
    }

    /**
     * @param $iteration
     * @return array
     */
    private function getSaidPostView( $iteration )
    {
        return [
            'url' => '/admin/blog-posts/search',
            'parameter' => 'query',
            'selector' => '[data-for="search-posts"]',
            'on' => 'keyup',
            'view' => view( 'widgets.featured-news.said-post-view', compact( 'iteration' ) )->render(),
            'type' => 'get',
            'parse' => 'parseSaidPosts'
        ];
    }

    /**
     * @param $iteration
     * @return array
     */
    private function getNthLatestPostView( $iteration )
    {
        return [
            'url' => '',
            'view' => view( 'widgets.featured-news.nth-latest-post-view', compact( 'iteration' ) )->render()
        ];
    }

    /**
     * @param $iteration
     * @return array
     */
    private function getLatestPostFromSaidCategoryView( $iteration )
    {
        $categories = app( BlogCategories::class )->model()->all()->pluck( 'title', 'id' )->toArray();
        return [
            'url' => '',
            'view' => view( 'widgets.featured-news.latest-post-from-said-category-view', compact( 'iteration', 'categories' ) )->render()
        ];
    }

}
