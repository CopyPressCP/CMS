<?php
$g_current_path = "client_campaign";
require_once('../pre.php');//����������Ϣ
require_once('../cms_menu.php');

// let users who role is agency access this page
if (!user_is_loggedin() ||  User::getPermission() < 1) { // 2=>3
    header("Location: http://".$_SERVER['HTTP_HOST']."/logout.php");
    exit;
}

require_once CMS_INC_ROOT.'/Campaign.class.php';
require_once CMS_INC_ROOT.'/User.class.php';
require_once CMS_INC_ROOT.'/cp_campaign_ranking.class.php';

$quotiety = CpCampaignRanking::getAllQuotieties();
if (empty($quotiety)) { 
    echo "<script>alert('Ranking quotiety is EMPTY! Please set it first in System Setting!');</script>";
    echo "<script>window.location.href='modify_cp_ranking_quotiety.php';</script>";
}
$param = array();
if (count($_GET)) {
  $param = $_GET;
}
if (count($_POST)) {
    if (isset($_POST['c_id']) && !empty($_POST['c_id'])) {
        $_POST['campaign_id'] = $_POST['c_id'];
    }

    if (isset($_POST['cp_id']) && !empty($_POST['cp_id'])) {
        $_POST['copywriter_id'] = $_POST['cp_id'];
    }

    if (CpCampaignRanking::storeCpCampaignRanking($_POST)) {
        echo "<script>alert('Success!')</script>";
        if ($article_id > 0 && $keyword_id > 0 && $campaign_id > 0) {
            echo "<script>window.location.href='/article/approve_article.php?article_id={$article_id}&keyword_id={$keyword_id}&campaign_id={$campaign_id}';</script>";
            exit;
            break;
        } else {
            echo "<script>window.location.href='/client_campaign/cp_ranking_search.php';</script>";
        }
    } else {
        echo "<script>alert('failed')</script>";
    }
}

//// the url parameters
//$url_param = "article_id=" . $article_id . "&keyword_id=" . $keyword_id;

//get all campaign name
$campaign_res = Campaign::getCampaignByCampaignId('campaign_name', array('campaign_id'=>$campaign_id));
$campaign_name = $campaign_res[0]['campaign_name'];

//get the copywriter user name
$cp_res = User::getAllUsersByUserIDs('user_name_only', $copywriter_id);
$cp_username = $cp_res[$copywriter_id];
$campaigns = Campaign::getCampaignList('', $param);
$smarty->assign('campaigns', $campaigns);
$smarty->assign('cp_selected', $copywriter_id);
$smarty->assign('cp_username', $cp_username);
$smarty->assign('campaign_selected', $campaign_id);
$smarty->assign('campaign_name', $campaign_name);
$smarty->assign('article_id', $article_id);
$smarty->assign('keyword_id', $keyword_id);
$smarty->assign('ranking_id', $ranking_id);
$smarty->assign('cp_ranking', $g_tag['cp_ranking']);
$smarty->assign('search_choice', $g_tag['search_choice']);
$smarty->assign('feedback', $feedback);
$clients = Client::getAllClients('id_name_only');
$smarty->assign('clients', $clients);
//$smarty->assign('url_param', $url_param);
$smarty->display('client_campaign/cp_campaign_ranking.html');
?>