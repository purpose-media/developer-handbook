<?php

namespace Application\Front\Widgets;

use Purposemedia\FrontFixtures\Contracts\Blueprints\FixturesBlueprint;
use Purposemedia\FrontRegions\Libs\Renderer;

class LatestFixtures extends Renderer
{

    /**
     * @var string
     */
    protected $view = 'widgets.latest-fixtures';

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
        if( $_data['type'] === 'fixtures' ) {
            $fixtures = app( FixturesBlueprint::class )->model()
                ->active()
                ->where( 'kick_off', '>=', date( 'y-m-d H:i:s', strtotime( '-2 hours' ) ) )
                ->orderBy( 'kick_off', 'asc' )
                ->take( $_data['amount'] )
                ->get();
        } else {
            $fixtures = app( FixturesBlueprint::class )->model()
                ->active()
                ->where( 'kick_off', '<', date( 'y-m-d' ) )
                ->orderBy( 'kick_off', 'desc' )
                ->take( $_data['amount'] )
                ->get();
        }
        return view( $this->view, [ 'data' => (object) $_data, 'fixtures' => $fixtures ] )->render();
    }

}
