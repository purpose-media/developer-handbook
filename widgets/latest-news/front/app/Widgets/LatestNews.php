<?php

namespace Application\Front\Widgets;

use Purposemedia\FrontRegions\Libs\Renderer;

class LatestNews extends Renderer
{

    /**
     * @var string
     */
    protected $view = 'widgets.latest-news';

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
        if( $_data['category'] ) {
            $posts = get_latest_posts_from_category( $_data['category'], $_data['amount'] );
        } else {
            $posts = get_latest_posts( $_data['amount'] );
        }
        return view( $this->view, [ 'data' => (object) $_data, 'posts' => $posts ] )->render();
    }

}
