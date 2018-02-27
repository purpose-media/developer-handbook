<?php

namespace Application\Front\Widgets;

use Purposemedia\FrontMediaManager\Contracts\Blueprints\MediaManager;
use Purposemedia\FrontRegions\Libs\Renderer;

class SingleCTA extends Renderer
{

    /**
     * @var string
     */
    protected $view = 'widgets.single-cta';

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
        if( isset( $_data['image1'] ) && $_data['image1'] ) {
            if( ! is_null( $media = app( MediaManager::class )->model()->find( (int) $_data['image1'] ) ) ) {
                $_data['image1'] = route( 'get.media-manager.size', [ 'cta--double', "{$media->name}.{$media->extension}" ] );
            } else {
                $_data['image1'] = null;
            }
        } else {
            $_data['image1'] = null;
        }
        return view( $this->view, [ 'data' => (object) $_data ] )->render();
    }

}
