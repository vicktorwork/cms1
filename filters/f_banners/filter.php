<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/
	function f_banners(&$text){

        $phrase = 'БАННЕР';

		if (mb_strpos($text, $phrase) === false){
			return true;
		}

		if(!cmsCore::getInstance()->isComponentEnable('banners')) { return true; }

 		$regex   = '/{('.$phrase.'=)\s*(.*?)}/i';
		$matches = array();

		preg_match_all( $regex, $text, $matches, PREG_SET_ORDER );
        if (!$matches){ return true; }

		cmsCore::loadModel('banners');

		foreach ($matches as $elm) {

            $elm[0] = str_replace('{', '', $elm[0]);
			$elm[0] = str_replace('}', '', $elm[0]);

			mb_parse_str( $elm[0], $args );

			$position = @$args[$phrase];

			if ($position){
				$output = cms_model_banners::getBannerHTML($position);
			} else {
                $output = '';
            }

			$text = str_replace('{'.$phrase.'='.$position.'}', $output, $text );

		}

		return true;

	}
?>