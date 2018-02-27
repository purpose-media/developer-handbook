<?php

namespace Application\Front\Widgets;

use Purposemedia\FrontAdsManager\Contracts\Blueprints\AdsManager;
use Purposemedia\FrontRegions\Libs\Renderer;

class LeftContentRightAdvert extends Renderer
{

    /**
     * @var string
     */
    protected $view = 'widgets.left-content-right-advert';

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
        $advert = app( AdsManager::class )->model()->find( (int) isset( $_data['advert'] ) ? $_data['advert'] : 0 );
        return view( $this->view, [ 'data' => (object) $_data, 'content' => $this->model->content, 'advert' => $advert ] )->render();
    }

}
