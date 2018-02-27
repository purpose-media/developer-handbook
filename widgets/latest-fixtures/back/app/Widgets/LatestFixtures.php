<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class LatestFixtures extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.latest-fixtures';

    /**
     * @var string
     */
    protected $name = 'Latest Fixtures Block';

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
