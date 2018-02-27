<?php

namespace Application\Front\Contracts;

use MiddlesexCcc\Front\Contracts\Blueprints\ApiBlueprint;
use Purposemedia\FrontAdsManager\Contracts\Blueprints\AdsManager;

class Api implements ApiBlueprint
{

    /**
     * @param $request
     * @param $id
     * @return string
     */
    public function advertWidget( $request, $id )
    {
        if( ! is_null( $advert = app()->make( AdsManager::class )->model()->find( $id ) ) ) {
            return do_shortcode('[advert ref="' . $advert->reference . '"]');
        }
        return '';
    }

}
