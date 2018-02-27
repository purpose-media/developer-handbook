<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class FeaturedNews extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.featured-news';

    /**
     * @var string
     */
    protected $name = 'Featured News Block';

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
        $this->data[ 'types' ] = [
            '' => 'please select a type',
            '1' => 'Latest post from said category',
            '2' => 'Nth latest news post',
            '3' => 'Said news post'
        ];
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
