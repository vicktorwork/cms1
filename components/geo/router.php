<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
    function routes_geo(){

        $routes[] = array(
                            '_uri'      => '/^geo\/city\/(.*)$/i',
                            'do'        => 'view',
                            1           => 'city_id'
                         );

        $routes[] = array(
                            '_uri'      => '/^geo\/get$/i',
                            'do'        => 'get'
                         );

        return $routes;

    }
?>
