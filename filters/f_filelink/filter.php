<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

	function getDownLoadLink($file, $title=''){

		$file     = preg_replace('/\.+\//', '', trim($file));
		$file     = htmlspecialchars($file);
		$filefull = PATH.$file;

        global $_LANG;

        if (file_exists($filefull)){

			$downloaded = cmsCore::fileDownloadCount($file);

			$filesize = round(filesize($filefull)/1024, 2);
			if($title == ''){
				$title = basename($file);
			}
			$link = '<span class="filelink">';
				//$link .= '<a href="/load/url=-'.base64_encode($file).'" alt="'.$_LANG['FILE_DOWNLOAD'].'">'.basename($file).'</a> ';
				$link .= '<a href="/load/url=-'.base64_encode($file).'" target="_blank" alt="'.$_LANG['FILE_DOWNLOAD'].'">'. $title .'</a> ';
				$link .= '<span>| '.$filesize.' '.$_LANG['SIZE_KB'].'</span> ';
				$link .= '<span>| '.$_LANG['FILE_DOWNLOADED'].': '.cmsCore::spellCount($downloaded, $_LANG['TIME1'], $_LANG['TIME2'], $_LANG['TIME1']).'</span>';
			$link .= '</span>';

		} else {
			$link = $_LANG['FILE'].' "'.$file.'" '.$_LANG['NOT_FOUND'];
		}

		return $link;

	}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	function f_filelink(&$text){

        $phrase = 'СКАЧАТЬ';
		//echo "<pre>"; var_dump($text);
		if (mb_strpos($text, $phrase) === false){
			return true;
		}
		
 		//$regex = '/{('.$phrase.'=)\s*(.*?)---(.*?)}/i';
 		$regex = '/{('.$phrase.'=\s*.*?)---(.*?)}/i';
 		//$regex = '/{('.$phrase.'=)\s*(.*?)}/i';
		$matches = array();
		preg_match_all( $regex, $text, $matches, PREG_SET_ORDER );
		foreach ($matches as $elm) {
		//echo "<pre>"; var_dump($matches);
			/* $elm[0] = str_replace('{', '', $elm[0]);
			$elm[0] = str_replace('}', '', $elm[0]); */
			//mb_parse_str( $elm[0], $args );
			mb_parse_str( $elm[1], $args );
			
			$file=@$args[$phrase];
			if ($file){// echo "<pre>"; var_dump($file);
				$output = getDownLoadLink($file, $elm[2]);
			} else { $output = ''; }
			
			$text = str_replace('{'.$phrase.'='.$file.'---'.$elm[2].'}', $output, $text );
			
			/*echo "<pre>"; var_dump($elm[2]);
			if($elm[2]){
				$text = str_replace('{'.$phrase.'='.$file.'---'.$elm[2].'}', $output, $text );
			}
			else{
				$text = str_replace('{'.$phrase.'='.$file.'}', $output, $text );
			}*/
		}

		return true;

	}
?>