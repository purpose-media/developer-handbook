<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminAdsManager\Contracts\Blueprints\AdsManager;
use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class LeftContentRightAdvert extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.left-content-right-advert';

    /**
     * @var string
     */
    protected $name = 'Left Content Right Advert Block';

    /**
     * @var array
     */
    protected $data = [];

    /**
     * Pre Process
     */
    public function preProcess()
    {
        parent::preProcess();
        $this->data['adverts'] = app( AdsManager::class )->model()->all()->pluck( 'name', 'id' )->toArray();
    }

    /**
     * Process
     */
    public function process()
    {
        parent::process();
    }

    /**
     * @return string
     */
    public function getReference()
    {
        return $this->view;
    }

}
