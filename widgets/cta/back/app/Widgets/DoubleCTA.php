<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class DoubleCTA extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.double-cta';

    /**
     * @var string
     */
    protected $name = 'Double CTA Content Block';

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
