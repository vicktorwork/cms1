<?php
function mod_dt_newsslider($module_id, $cfg){

        $inDB = cmsDatabase::getInstance();
			
		cmsCore::loadModel('content');
		$model = new cms_model_content();
		
		if (!isset($cfg['cat_id'])) { $cfg['cat_id'] = 1; }
		
		if($cfg['cat_id']){

			if (!$cfg['subs']){
				$model->whereCatIs($cfg['cat_id']);
			} else {
				$rootcat = $inDB->getNsCategory('cms_category', $cfg['cat_id']);
				if(!$rootcat) { return false; }
				$model->whereThisAndNestedCats($rootcat['NSLeft'], $rootcat['NSRight']);
			}

		}
		
		$inDB->orderBy('con.ordering', 'ASC');
		$inDB->limit($cfg['newscount']);
		$slider_list = $model->getArticlesList();
		if(!$slider_list) { return false; }

			
		cmsPage::initTemplate('modules', 'mod_dt_newsslider')->
			assign('slider', $slider_list)->
			assign('cfg', $cfg)->
			assign('module_id', $module_id)->
			display('mod_dt_newsslider.tpl');
		return true;
}
?>
