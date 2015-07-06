<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

    function routes_photos(){
        
        $routes[] = array(
                            '_uri'  => '/^photos\/([0-9]+)$/i',
                            1    => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/([0-9]+)\-([0-9]+)$/i',
                            1       => 'id',
                            2       => 'page'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/latest.html$/i',
                            'do'    => 'latest'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/top.html$/i',
                            'do'    => 'best'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/([0-9]+)\/addphoto.html$/i',
                            'do'    => 'addphoto',
							'do_photo' => 'addphoto',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/([0-9]+)\/submit_photo.html$/i',
                            'do'    => 'addphoto',
							'do_photo' => 'submit_photo',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/([0-9]+)\/uploaded.html$/i',
                            'do'    => 'addphoto',
							'do_photo'    => 'uploaded',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/editphoto([0-9]+).html$/i',
                            'do'    => 'editphoto',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/movephoto([0-9]+).html$/i',
                            'do'    => 'movephoto',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/delphoto([0-9]+).html$/i',
                            'do'    => 'delphoto',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/publish([0-9]+).html$/i',
                            'do'    => 'publish_photo',
                            1       => 'id'
                         );

        $routes[] = array(
                            '_uri'  => '/^photos\/photo([0-9]+).html$/i',
                            'do'    => 'viewphoto',
                            1       => 'id'
                         );

        return $routes;

    }

?>
