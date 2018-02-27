<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class SingleCTA extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.single-cta';

    /**
     * @var string
     */
    protected $name = 'Single CTA Content Block';

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
