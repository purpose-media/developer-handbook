<?php

namespace Application\Back\Contracts;

use Application\Back\Contracts\Blueprints\RoutesBlueprint;
use Illuminate\Routing\Router;


class Routes implements  RoutesBlueprint
{

    protected $menuItems = [];

    /**
     * @param Router $router
     * @return mixed
     */
    public function routes( Router $router )
    {

        $router->group( [ 'prefix' => 'widgets', 'middleware' => [ 'web' ] ], function( $router ) {

            $router->get( 'featured-news/type/{id}/{iteration}', [ 'uses' => 'WidgetsController@featuredNewsType' ] );

        });

    }

}
