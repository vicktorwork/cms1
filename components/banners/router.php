<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

    function routes_banners(){

        $routes[] = array(
                            '_uri'  => '/^banners\/([0-9]+)$/i',
                            'do'    => 'view',
                            1       => 'id'
                         );

        return $routes;

    }

?>
