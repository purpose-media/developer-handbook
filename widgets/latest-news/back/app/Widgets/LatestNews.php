<?php

namespace Application\Back\Widgets;

use Purposemedia\AdminBlog\Contracts\Blueprints\BlogCategories;
use Purposemedia\AdminRegions\Libs\Stubs\Widget;
use Purposemedia\AdminRegions\Libs\Stubs\Blueprints\Widgetable;

class LatestNews extends Widget implements Widgetable
{

    /**
     * @var string
     */
    protected $view = 'widgets.latest-news';

    /**
     * @var string
     */
    protected $name = 'Latest News Block';

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
        $this->data['categories'] = app( BlogCategories::class )->model()->all()->pluck( 'title', 'slug' )->toArray();
        $this->data['display'] = [ '1' => 'Carousel', '2' => 'Grid' ];
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
