<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

    function routes_forms(){

        $routes[] = array(
                            '_uri'  => '/^forms\/process$/i',
                            'do'    => 'view'
                         );

        return $routes;

    }

?>
