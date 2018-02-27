<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminBlog\Contracts\Blueprints\BlogCategories;
use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class SocialCarousel extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.social-carousel';

    /**
     * @var string
     */
    protected $name = 'Social Carousel Block';

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
