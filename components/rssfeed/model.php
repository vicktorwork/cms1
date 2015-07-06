<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

class cms_model_rssfeed{

	public function __construct(){
        $this->config = cmsCore::getInstance()->loadComponentConfig('rssfeed');
		cmsCore::loadLanguage('components/rssfeed');
    }

/* ========================================================================== */
/* ========================================================================== */

    public static function getDefaultConfig() {

        $cfg = array (
				  'addsite' => 1,
				  'maxitems' => 50,
				  'icon_on' => 1,
				  'icon_url' => HOST.'/images/rss.png'
				);

        return $cfg;

    }

}