<?php
/******************************************************************************/
/********************************CMC.VADYUS.COM********************************/
/******************************************************************************/
if(!defined('VALID_CMS')) { die('ACCESS DENIED'); }

class cms_model_files {

	public function __construct(){
        $this->inDB = cmsDatabase::getInstance();
		   
		$this->inCore = cmsCore::getInstance();
		$this->config = $this->inCore->loadComponentConfig('users');
		cmsCore::loadLanguage('components/file');
        cmsCore::loadClass('form');
    }
  

  public static function getDefaultConfig() {

        $cfg = array(
				'sw_comm'=>1,
				'sw_search'=>1,
				'sw_forum'=>1,
				'sw_photo'=>1,
				'sw_wall'=>1,
				'sw_blogs'=>1,
				'sw_clubs'=>1,
				'sw_feed'=>1,
				'sw_awards'=>1,
				'sw_board'=>1,
				'sw_msg'=>1,
				'sw_guest'=>1,
				'sw_gifts'=>1,
				'karmatime'=>1,
				'karmaint'=>'DAY',
				'photosize'=>0,
				'watermark'=>1,
				'smallw'=>64,
				'medw'=>200,
				'medh'=>500,
				'sw_files'=>1,
				'filessize'=>100,
				'users_perpage'=>10,
				'wall_perpage'=>10,
				'filestype'=>'jpeg,gif,png,jpg,bmp,zip,rar,tar',
				'privforms'=>array(),
				'deltime'=>6
        	);

        return $cfg;

    }
    public function increaseDownloadCount($fileurl) {

        $downloads = cmsCore::fileDownloadCount($fileurl);

        if ($downloads == 0){
            $sql = "INSERT INTO cms_downloads (fileurl, hits) VALUES ('$fileurl', '1')";
        } else {
            $sql = "UPDATE cms_downloads SET hits = hits + 1 WHERE fileurl = '$fileurl'";
        }

        $this->inDB->query($sql);

        return true;

    }

}