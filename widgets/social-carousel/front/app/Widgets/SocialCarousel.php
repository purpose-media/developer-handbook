<?php

namespace Application\Front\Widgets;

use Purposemedia\FrontRegions\Libs\Renderer;
use Purposemedia\FrontSocialFeeds\Models\SocialFeedItem;

class SocialCarousel extends Renderer
{

    /**
     * @var string
     */
    protected $view = 'widgets.social-carousel';

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
        $items = SocialFeedItem::limit( (int) isset( $_data['amount'] ) ? $_data['amount'] : 12 )->orderBy( 'published', 'desc' )->get();
        return view( $this->view, [ 'data' => (object) $_data, 'items' => $items ] )->render();
    }

}
