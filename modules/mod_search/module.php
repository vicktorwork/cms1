<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

function mod_search($module_id, $cfg){

    cmsCore::loadModel('search');
    cmsCore::loadLanguage('components/search');
    $model = cms_model_search::initModel();

    cmsPage::initTemplate('modules', $cfg['tpl'])->
            assign('enable_components', $model->getEnableComponentsWithSupportSearch())->
            display($cfg['tpl']);

    return true;

}