<?php

$g_menu = array();

$i = 0;
$g_menu[$i]['path'] = 'home';
$g_menu[$i]['liclass'] = 'home';
//if (User::getPermission() == 1 || User::getPermission() == 3) { 
if ((User::getPermission() >= 1 && User::getPermission() < 2) || User::getPermission() == 3) { 
    $g_menu[$i]['module_name'] = 'Dashboard';//首页
    $g_menu[$i]['image'] = 'topbar-1-dashboard';//首页
} else {
    $g_menu[$i]['module_name'] = 'Home';//首页
    $g_menu[$i]['image'] = 'topbar-1-home';//首页
}
 $g_menu[$i]['url'] = '/index.php';
$g_menu[$i]['sub_menu'] = array();
$j = 0;
$g_menu[$i]['sub_menu'][$j]['label'] = 'Home';
$g_menu[$i]['sub_menu'][$j]['url'] = '/index.php';
$g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/hp.gif" border="0">';

// added by snug xu 2006-11-24 13:43
// let user who role is agency access to client module 
// admin can see manager clients
if (User::getPermission() >= 4 || User::getPermission() == 2) { 
    $i ++;
    $g_menu[$i]['path'] = 'client';
    $g_menu[$i]['liclass'] = 'two';
    $g_menu[$i]['module_name'] = 'Clients';
    $g_menu[$i]['image'] = 'topbar-2-clients';
    $g_menu[$i]['url'] = '/client/list.php';

    $g_menu[$i]['sub_menu'] = array();
    $j = 0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Client List';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client/list.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cs.gif" border="0">';
    if (User::getPermission() >= 5 || User::getPermission() == 2) {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Client';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client/client_add.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ca.gif" border="0">';
    }
}

// added by snug xu 2006-11-24 14:53
// let agency user see client campaign management
if (User::getPermission() >= 4 || User::getPermission() == 2) { // 3=>4
    $i ++;
    $g_menu[$i]['path'] = 'client_campaign';
    $g_menu[$i]['liclass'] = 'three';
    $g_menu[$i]['module_name'] = 'Campaigns';
    $g_menu[$i]['image'] = 'topbar-3-campaigns';
    $g_menu[$i]['url'] = '/client_campaign/client_list.php';

    $g_menu[$i]['sub_menu'] = array();
    /*
    $j = 0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'campaign List';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/list.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    */
    $j = 0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Client Campaign';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/client_list.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    /*$j ++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Archived Campaigns';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/client_list.php?archived=1';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    if (User::getPermission() >= 4) {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'All Campaigns';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/campaigns.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    }*/
    /*$j ++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Archived Campaign';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/list.php?archived=1';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';*/
    $j ++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Add New Campaign';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/client_campaign_add.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
    if (User::getPermission() >= 4) {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Campaign Orders';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/order_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
    }
    if (User::getPermission() >= 5) // 4=>5
    {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Batch Campaign & Keyword';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/batch_client_campaign.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Add Ranking";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_campaign_ranking.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "End Campaigns";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/end_campaigns.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Keyword List";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/keyword_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Rollback finished articles";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/undo_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
    }
}

// added by snug xu 2006-11-24 14:53
// not let agency user  see Campaign & Article Management 
if (User::getPermission() >= 1 && User::getPermission() < 4 && User::getPermission() != 2) { // 3=>4
    //$g_current_path = 'article';
    $i++;
    $g_menu[$i]['path'] = 'client_campaign';
    $g_menu[$i]['liclass'] = 'three'; // the same as the admin role
    $g_menu[$i]['module_name'] = 'Campaigns';
    $g_menu[$i]['image'] = 'topbar-3-campaigns';
    if (User::getPermission() == 1) {
        //$g_menu[$i]['module_name'] = 'Campaigns';
        //$g_menu[$i]['image'] = 'topbar-3-campaigns';
        $g_menu[$i]['url'] = '/client_campaign/ed_cp_campaign_list.php';
    } elseif (User::getPermission() == 1.2) {
        $g_menu[$i]['url'] = '/graphics/designer_campaign_list.php';
    } else {
        //$g_menu[$i]['module_name'] = 'Campaign & Article Management';
        $g_menu[$i]['url'] = '/client_campaign/ed_cp_campaign_list.php';
        // $g_menu[$i]['url'] = '/client_campaign/client_list.php';
    }

    $g_menu[$i]['sub_menu'] = array();
    $j = 0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Campaigns';
    if (User::getPermission() == 1) {
        /*$g_menu[$i]['sub_menu'][$j]['label'] = 'Campaigns';
        $g_menu[$i]['image'] = 'topbar-3-campaigns';*/
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/ed_cp_campaign_list.php';
    } elseif (User::getPermission() == 1.2) {
        $g_menu[$i]['sub_menu'][$j]['url'] = '/graphics/designer_campaign_list.php';
    } else {
        /*$g_menu[$i]['sub_menu'][$j]['label'] = 'Campaign & Article Management';*/
        // $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/client_list.php';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/ed_cp_campaign_list.php';
    }
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
    if (User::getPermission() == 3) {
        /*$j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Image Campaign';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/graphics/designer_campaign_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';*/
    }
    //if (User::getPermission() == 1 || User::getPermission() == 3) {
    if ((User::getPermission() >= 1 && User::getPermission() < 2) || User::getPermission() == 3) {
        if (User::getPermission() <> 1.2) {
            $j ++;
            $g_menu[$i]['sub_menu'][$j]['label'] = 'Assignment Acceptance';
            $g_menu[$i]['sub_menu'][$j]['url'] = '/article/acceptance.php';
            $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        }
        if (User::getPermission() <> 1) {
            /*$j ++;
            $g_menu[$i]['sub_menu'][$j]['label'] = User::getPermission() == 1.2 ? 'Assignment Acceptance' : 'Image Assignment Acceptance';
            $g_menu[$i]['sub_menu'][$j]['url'] = '/graphics/acceptance.php';
            $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';*/
        }
    }

    /*
    $j ++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'My Keywords';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_keyword_list.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
    */
    if (User::getPermission() >= 2) {
        if (User::getPermission() > 3 && User::getPermission() != 2) {
            $j ++;
            $g_menu[$i]['sub_menu'][$j]['label'] = 'Reassign Keyword';
            $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/list_cpw.php';
            $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
        }
    }
    /*
     * add by liu shu fen 10:02 2007-12-24
     */
//    if (User::getPermission() == 1) {
//        $j++;
//        $g_menu[$i]['sub_menu'][$j]['label'] = 'Unassigned Keyword';
//        $g_menu[$i]['sub_menu'][$j]['url']   = '';// /client_campaign/unassigned_keyword.php
//        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
//
//    }
        /*if (User::getPermission() == 3) {
            $j++;
            $g_menu[$i]['sub_menu'][$j]['label'] = 'Extension Requests';
            $g_menu[$i]['sub_menu'][$j]['url'] = '/user/extension_requests.php';
            $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
        }*/
}
/*if (User::getPermission() == 3 || User::getPermission() == 2) {
    $j++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Copywriter Rating';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_campaign_ranking.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
}*/
if (User::getPermission() <> 1.2 ) {
    $j++;
    $g_menu[$i]['sub_menu'][$j]['label'] = "Comments";
    $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/comments.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
}

//if ((User::getPermission() == 1) || User::getPermission() == 3) {
if ((User::getPermission() >= 1 && User::getPermission() < 2) || User::getPermission() == 3) {
    $i ++;
    $g_menu[$i]['path'] = 'article';
    $g_menu[$i]['liclass'] = 'three'; // the same as the admin role
    $g_menu[$i]['module_name'] = 'Articles';
    $g_menu[$i]['image'] = 'topbar-8-articles';
    //if (User::getPermission() == 1) {
    if (User::getPermission() >= 1 && User::getPermission() < 2) {
        $g_menu[$i]['url'] = (User::getPermission() == 1.2 ? '/graphics/image_list.php':'/article/article_list.php');
        $j=0;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Articles';
        if (User::getPermission() == 1.2 ) {
            $g_menu[$i]['sub_menu'][$j]['url'] = '/graphics/image_keyword_list.php';
        } else {
            $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_keyword_list.php';
        }
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
    } else {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'My Articles';
		$g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_list.php';
        //$g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_list.php?article_status=1gc';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        if (User::getPermission() == 3) {
            /*$j ++;
            $g_menu[$i]['sub_menu'][$j]['label'] = 'My Images';
            $g_menu[$i]['sub_menu'][$j]['url'] = '/graphics/image_list.php?image_status=1';
            $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';*/
        }
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'My Archived Articles';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_list.php?archived=1';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cd.gif" border="0">';
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Article Version History';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_history_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    }
}
//========================================================================================
// let agency user see client campaign management
if (User::getPermission() >= 3) { // 3=>4
    $i ++;
    $g_menu[$i]['path'] = 'reporting';
    $g_menu[$i]['liclass'] = 'four';
    $g_menu[$i]['module_name'] = 'Reports';
    $g_menu[$i]['image'] = 'topbar-4-reports'; 
    if (User::getPermission() == 3) {
        $g_menu[$i]['url'] = '/article/edit_request_report.php';
    } else {
        $g_menu[$i]['url'] = '/client_campaign/cp_production_report.php';
    }
    $g_menu[$i]['sub_menu'] = array();
    if (User::getPermission() >= 3) {
        $j = 0;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Edit Request Report';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/article/edit_request_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
    }
    if (User::getPermission() >= 5)
    {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Writer Production Report';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_production_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Copywriter Accounting';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_acct_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Forcast Writer payroll';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/forecast_payroll.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Editor Accounting';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_acct_report.php?user_type=editor';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Editor Production Report';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/editor_production_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
        /*$j++;
//        $g_menu[$i]['sub_menu'][$j]['label'] = "Ranking Report";
        //$g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_ranking_search.php';
        $g_menu[$i]['sub_menu'][$j]['label'] = "Writer Performance Report";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_performance_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Writer Monthly Performance";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_month_performance_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';*/
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Writer Monthly Performance";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/cp_month_performance.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Possible Duplicate Report";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/duplicated_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Client Monthly Report";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/client_mreport.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Campaign Client Approval";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/campaign_amount_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        /*$j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Monthly Activity Report";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/monthly_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';*/
    }
    if (User::getPermission() >= 4) {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Overdue Articles Report";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_report.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    }
    if (User::getPermission() >= 5) {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = "Forecast Report";
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/estimatecost.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    }
}
//========================================================================================
if (User::getPermission() > 3 && User::getUserType() > 0) { //or we can use User::getPermission() >= 3
    $i ++;
    $g_menu[$i]['path'] = 'preference';
    $g_menu[$i]['liclass'] = 'five';
    $g_menu[$i]['module_name'] = 'Settings';
    $g_menu[$i]['image'] = 'topbar-5-settings';
    $g_menu[$i]['url'] = '/mail/ck_mailer.php';
    $g_menu[$i]['sub_menu'] = array();
    $j = 0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Company Mailer';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/mail/ck_mailer.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';

    if (User::getPermission() >= 5) { // 4=>5
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Mail Templates';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/mail/list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        /*
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Mail Templates';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/mail/add.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
        */
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'General Editorial Notes';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/general_notes.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
        /*
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add General Notes';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/add_general_notes.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
        */
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Update Ranking Quotiety';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/article_ranking_quotiety.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/as.gif" border="0">';
    }
    /*
    if (User::getPermission() >= 3) { // 2=>3
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Company Mailer';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/mail/ck_mailer.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
    }
    */
    if (User::getPermission() >= 4) {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Custom Campaign Cost';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/article_cost.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
    }
    if (User::getPermission() >= 5) { // 4=>5

        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add/Edit Article Type';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_type.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Preference';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/preference.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Esign Settings';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/esign_settings.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Specialty';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/category/add.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Article Type Questions';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_type_questions.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
    }
}
//////////////////////////////////


if (User::getPermission() >= 4 && User::getUserType() > 0) { // 3=>4
    $i++;
    $g_menu[$i]['path'] = 'user';
    $g_menu[$i]['liclass'] = 'six';
    $g_menu[$i]['module_name'] = 'Users';
    $g_menu[$i]['image'] = 'topbar-6-users';
    $g_menu[$i]['url'] = '/user/list.php';

    $g_menu[$i]['sub_menu'] = array();
    $j = 0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'User List';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/list.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/us.gif" border="0">';
    $j ++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'User Notes';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/notes.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ua.gif" border="0">';
    $j ++;
	$g_menu[$i]['sub_menu'][$j]['label'] = 'User Specialties and Availability';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/available_specialties_report.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
	/*$j ++;
	$g_menu[$i]['sub_menu'][$j]['label'] = 'Available Copywriters';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/available_users_report.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
	$j ++;
	$g_menu[$i]['sub_menu'][$j]['label'] = 'Copywriter Specialties';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/cp_specialty.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';*/
    // remove extension request
	/*$j++;
	$g_menu[$i]['sub_menu'][$j]['label'] = 'Extension Requests';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/extension_requests.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';*/
    if (User::getPermission() >= 5) {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'User Note Category';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/note_category.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ua.gif" border="0">';
        /*
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add New User';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/user_add.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ua.gif" border="0">';
        */
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Payment Information';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/payment.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/cp.gif" border="0">';
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'User Access Report';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/user_last_login_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ca.gif" border="0">';
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Candidate List Table';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/candidates.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';
    }
	/*$j++;
	$g_menu[$i]['sub_menu'][$j]['label'] = 'E-Sign List';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/user/esign_list.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ks.gif" border="0">';*/
}

// added by snug 2006-11-24 13:47
// don't let user who role is agency see the suggession menu
/*
if (User::getPermission() != 2)
{
    $i ++;
    $g_menu[$i]['path'] = 'suggestions';
    $g_menu[$i]['module_name'] = 'Suggestions';
    $g_menu[$i]['url'] = '/suggestions/suggestions.php';
}

if (User::getPermission() >= 3)
{
    $i ++;
    $g_menu[$i]['path'] = 'sat';
    $g_menu[$i]['module_name'] = 'Sat';
    $g_menu[$i]['url'] = '/sat/index.php';
}
*/
$i++;
$g_menu[$i]['path'] = 'my_account';
$g_menu[$i]['module_name'] = 'My Account';
$g_menu[$i]['url'] = '/user/user_detail.php';
$g_menu[$i]['image'] = 'topbar-7-my-account';
$g_menu[$i]['liclass'] = 'six';
$g_menu[$i]['sub_menu'] = array();
$j = 0;
$g_menu[$i]['sub_menu'][$j]['label'] = 'Update Password';
$g_menu[$i]['sub_menu'][$j]['url'] = '/user/passwd.php';
$g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
$j++;
$g_menu[$i]['sub_menu'][$j]['label'] = 'Update Google Plus URL';
$g_menu[$i]['sub_menu'][$j]['url'] = '/user/addtionalinfo.php';
$g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
if (User::getPermission() != 2) {
    /* remove update profile link
    $j++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Update Profile';
    if (User::getPermission() == 1 || User::getPermission() == 3) {
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/user_edit.php';
    } else {
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/user_info.php';
    }
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';*/
    //if (User::getPermission() == 1 || User::getPermission() == 3) {
    /*if ((User::getPermission() >= 1 && User::getPermission() < 2) || User::getPermission() == 3) {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'My Specialties';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/category/select.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
     }
	 */
    //if (User::getPermission() == 1 || User::getPermission() == 3) {
    if ((User::getPermission() >= 1 && User::getPermission() < 2) || User::getPermission() == 3) {
        /*$j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Payment Preference';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/user/payment_preference.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';*/
        if (User::getPermission() <> 1.2) {
            $j++;
            $g_menu[$i]['sub_menu'][$j]['label'] = 'Payment History';
            $g_menu[$i]['sub_menu'][$j]['url'] = '/user/payment_history.php';
            $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
        }
    }
    $j++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'View Contract';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/contractor.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';
}
//added by nancy xu 2012-08-20 19:27
/*$j++;
$g_menu[$i]['sub_menu'][$j]['label'] = 'Q&A';
$g_menu[$i]['sub_menu'][$j]['url'] = '/q2a';
$g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ak.gif" border="0">';*/
//end

if (User::getPermission() != 2) {

    $i++;
    $g_menu[$i]['path'] = 'help';
    $g_menu[$i]['module_name'] = 'Help';
    $g_menu[$i]['image'] = 'topbar-help';
    $g_menu[$i]['pos'] = 'right';
    $g_menu[$i]['liclass'] = 'two';
    $g_menu[$i]['url'] = '#';
    $g_menu[$i]['sub_menu'] = array();
    $j = 0;
    /*$g_menu[$i]['sub_menu'][$j]['label'] = 'Writer’s Manual';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/cmsf.php?t=wiki';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
    $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Tech Manual';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/cmsf.php?t=manual_content/TechnicalManual.pdf';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
	*/
    /*if (User::getPermission() == 3) {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Editor’s Manual';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/cmsf.php?t=ewiki';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
    }*/
    /*if (User::getPermission() >= 5 || User::getPermission() <= 3) {
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Handbooks';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/manual_content_list.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
    }
    if (User::getPermission() >= 5) {
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Handbook';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/add_manual_content.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ca.gif" border="0">';
        $j++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'Add Handbook Category';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/manual_content/add_content_category.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ca.gif" border="0">';

    }
	*/
	$g_menu[$i]['sub_menu'][$j]['label'] = 'CopyPress Creative Help';
    $g_menu[$i]['sub_menu'][$j]['url'] = 'http://community.copypress.com/copypress-creatives/" target="_blank';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
	$j++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Tech Support Form';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/suggestions/report_bugs.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
    $j++;
    //$g_menu[$i]['sub_menu'][$j]['label'] = 'Questions/Suggestions';
    //$g_menu[$i]['sub_menu'][$j]['label'] = 'Content Questions';
    //$g_menu[$i]['sub_menu'][$j]['url'] = '/suggestions/suggestions.php';
    //$g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';
    //if (User::getPermission() == 3 || User::getPermission() ==1) {
    if (User::getPermission() == 3 || (User::getPermission() == 5)) {
        $j ++;
        $g_menu[$i]['sub_menu'][$j]['label'] = 'General Editorial Notes';
        $g_menu[$i]['sub_menu'][$j]['url'] = '/client_campaign/general_notes.php';
        $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
    }
}

if (User::getPermission() >= 4 || User::getPermission() == 2) {
    if (User::getPermission() == 2) {
        $i++;
        $g_menu[$i]['path'] = 'help';
        $g_menu[$i]['module_name'] = 'Help';
        $g_menu[$i]['image'] = 'topbar-help';
        $g_menu[$i]['pos'] = 'right';
        $g_menu[$i]['liclass'] = 'two';
        $g_menu[$i]['url'] = '/article/article_search.php';
        $g_menu[$i]['sub_menu'] = array();
        $j = -1;
    }
    $j++;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Article Search';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/article/article_search.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/ps.gif" border="0">';
}


if (User::getPermission() != 2) {
    /*$i++;
    $g_menu[$i]['path'] = 'bbs';
    $g_menu[$i]['liclass'] = 'two';
    $g_menu[$i]['module_name'] = 'Forum';
    $g_menu[$i]['image'] = 'topbar-forum';
    $g_menu[$i]['pos'] = 'right';
    $g_menu[$i]['url'] = '/manual_content/cmsf.php?t=bbs';
    $g_menu[$i]['tab'] = 'pop';
    $i++;
    $g_menu[$i]['path'] = 'trends';
    $g_menu[$i]['pos'] = 'right';
    $g_menu[$i]['module_name'] = 'Trends';
    $g_menu[$i]['url'] = '#';
    $g_menu[$i]['onclick'] = "showWindowDialog('/trends/index.php','900','450', 'Trends');";
    $g_menu[$i]['image'] = 'topbar-trends';
    $g_menu[$i]['liclass'] = 'three';
    $g_menu[$i]['sub_menu'] = array();
    $j==0;
    $g_menu[$i]['sub_menu'][$j]['label'] = 'Trends';
    $g_menu[$i]['sub_menu'][$j]['url'] = '/trends/index.php';
    $g_menu[$i]['sub_menu'][$j]['image'] = '<img src="/image/icons/up.gif" border="0">';*/
}

$_top_level_menus = array('suggestions', 'candidates', 'account');
//////////////////////////////////////

unset($i, $j);

function get_cmi_by_path($path)
{
    global $g_menu;

    $count = count($g_menu);
    for ($i = 0; $i < $count; $i ++) {
        if ($g_menu[$i]['path'] == $path) {
            return $i;
        }
    }
}

$current_menu_index = get_cmi_by_path($g_current_path);

//============================ added by leo 8/7/2009 4:56 PM ==================================//
//shows up the top level menu on the tab right.
if (in_array($g_current_path, $_top_level_menus)) {
    $smarty->assign('show_toplevel_right', 'Y');
}
//============================ added by leo 8/7/2009 4:56 PM ==================================//

//echo "<pre>";
//print_r($g_menu);
$smarty->assign('main_menu', $g_menu);
$smarty->assign('current_menu_index', $current_menu_index);
$smarty->assign('sub_menu', $g_menu[$current_menu_index]['sub_menu']);

$smarty->assign('user_permission_int', User::getPermission());
$smarty->assign('search_type', $g_tag['search_type']);
$smarty->assign('g_current_path', $g_current_path);
//print_r($g_tag['search_type']);
?>