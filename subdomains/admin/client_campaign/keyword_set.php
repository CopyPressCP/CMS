<?php
$g_current_path = "client_campaign";
require_once('../pre.php');//����������Ϣ
require_once('../cms_menu.php');

// added by snug xu 2006-11-24 14:41
// let agency user access this page
if (!user_is_loggedin() || (User::getPermission() < 4 && User::getPermission() != 2)) { // 3=>4
    header("Location: http://".$_SERVER['HTTP_HOST']."/logout.php");
    exit;
}
require_once CMS_INC_ROOT.'/Campaign.class.php';
require_once CMS_INC_ROOT.'/Client.class.php';
require_once CMS_INC_ROOT.'/Pref.class.php';
$keyword_info = Campaign::getKeywordInfo($_GET['keyword_id']);

if (trim($_POST['keyword_id']) && trim($_POST['keyword']) != '') {//ֻ��Ե���assign
    if (Campaign::setKeyword($_POST)){
        //sql_log();
        $rd = '/client_campaign/keyword_list.php';
        $qs = array();
        if (!empty($keyword_info['campaign_id'])) {
            $campaign_id = $keyword_info['campaign_id'];
            $qs[] = 'campaign_id=' . $campaign_id;
        }
        if (!empty($qs)) $rd .= '?' . implode('&', $qs);
        echo "<script>alert('".$feedback."');</script>";
        echo "<script>window.location.href='" . $rd . "';</script>";
        exit;
    }
}

$smarty->assign('keyword_info', $keyword_info);

$pref_info = Preference::getPrefById($keyword_info['keyword_category']);
$smarty->assign('pref_info', $pref_info);
//print_r($pref_info);

//$all_editor = User::getAllUsers($mode = 'id_name_only', $user_type = 'editor');
//$smarty->assign('all_editor', $all_editor);
//$all_copy_writer = User::getAllUsers($mode = 'id_name_only', $user_type = 'copy writer');
//$smarty->assign('all_copy_writer', $all_copy_writer);

//########quick pane########//
$quick_pane[0][lable] = "Client Campaign Management";
$quick_pane[0][url] = "/client_campaign/list.php";
if ($_GET['campaign_id']) {
    //$header = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?";
    $header = $_SERVER['PHP_SELF']."?";
    for ($i=0; $i<count($_GET); $i++)
    {
        $header .= key($_GET)."=".$_GET[key($_GET)]."&";
        next($_GET);
    }
    $campaign_info = Campaign::getInfo($_GET['campaign_id']);
    $header = substr($header,0,strlen($header)-1);
    //setcookie("campaign_label", $campaign_info['campaign_name'], time()+36000, '/');
    //setcookie("campaign_url", $header, time()+36000, '/');
    //echo $header;
    $_SESSION['campaign_lable'] = $campaign_info['campaign_name'];
    $_SESSION['campaign_url'] = $header;
}
if (isset($_SESSION['campaign_lable'])) {
	$quick_pane[1][lable] = $_SESSION['campaign_lable'];
	$quick_pane[1][url] = $_SESSION['campaign_url'];
}

if ($_GET['keyword_id']) {
    //$header = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?";
    $header = $_SERVER['PHP_SELF']."?";
    for ($i=0; $i<count($_GET); $i++)
    {
        $header .= key($_GET)."=".$_GET[key($_GET)]."&";
        next($_GET);
    }
	$quick_pane[2][lable] = $keyword_info['keyword'];
	$quick_pane[2][url] = $header;
}
$smarty->assign('quick_pane', $quick_pane);
//print_r($quick_pane);
//########quick pane########//
// added by nancy xu 2012-04-20 16:26
require_once CMS_INC_ROOT.'/custom_field.class.php';
if (!isset($campaign_info) || empty($campaign_info)) {
    $campaign_info = Campaign::getInfo($keyword_info['campaign_id']);
}
$fields = CustomField::getFieldLabels($campaign_info['client_id'], 'optional');
$smarty->assign('fields', $fields);
// end
//$smarty->assign('article_type', $g_tag['article_type']);
$smarty->assign('article_type', $g_tag['leaf_article_type']);
$smarty->assign('feedback', $feedback);
$smarty->display('client_campaign/keyword_set.html');
?>