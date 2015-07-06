<?php
/******************************************************************************/
/********************************CMS.VADYUS.COM********************************/
/******************************************************************************/

function mod_polls($module_id, $cfg){

    cmsCore::loadModel('polls');
    $model = new cms_model_polls();

    if ($cfg['poll_id']>0){

        $poll = $model->getPoll($cfg['poll_id']);

    } else {

        $poll = $model->getPoll(0, 'RAND()');

    }

    if (!$poll) { return false; }

	cmsPage::initTemplate('modules', $cfg['tpl'])->
            assign('poll', $poll)->
            assign('is_voted', $model->isUserVoted($poll['id']))->
            assign('module_id', $module_id)->
            assign('cfg', $cfg)->
            display($cfg['tpl']);

    return true;

}