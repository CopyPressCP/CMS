<?php
require_once 'pre.php';
if (!user_is_loggedin()) {
    header("Location: http://".$_SERVER['HTTP_HOST']."/login.php");
    exit;
}
$g_current_path = 'home';
require_once 'cms_menu.php';
require_once CMS_INC_ROOT.'/Campaign.class.php';
require_once CMS_INC_ROOT.'/Article.class.php';
require_once CMS_INC_ROOT.'/User.class.php';

require_once CMS_INC_ROOT.'/Notification.class.php';
if (!empty($_GET)) {
    $operation = $_GET['operation'];
    if ($operation == 'deletenote' && (isset($_GET['id']) || isset($_GET['uid']))) {
        if (isset($_GET['id']) && $_GET['id']) {
            $notification_id = $_GET['id'];
            $conditions = array('notification_id' => $notification_id);
        } else if (isset($_GET['uid']) && $_GET['uid']) {
             $uid = $_GET['uid'];
            $conditions = array('user_id' => $uid);
        }
        Notification::hiddenNotification($conditions);
        exit();
    }
}
// added by snug xu 2006-11-24 20:40
// let agency view admim home page, but he/she only can his own campaign process
$smarty->assign('uid', User::getID());
if (User::getPermission() >= 5) {
    $tasks = User::QATask(User::getID());
    $smarty->assign("tasks", $tasks);
}
if (User::getPermission() >= 4 || User::getPermission() == 2) { // 3=>4
	//get the campaign report
        $notifications = Notification::getNoticesByUserID(User::getID());
        $month = CpPaymentHistory::getMMonth();
        $monthes = getAllMonthes($month);
        // $monthes = addFirstMonthAndLastMonthToCurrentMonthes( $monthes );
        $pms = User::getAllUsers('id_name_only', 'admin', true) + User::getAllUsers('id_name_only', 'project manager', true);
        asort($pms);
        $pms  = array('' => '[choose]') + $pms ;
        $_GET['project_manager_id'] = User::getID();
        $smarty->assign("pms", $pms);
        $smarty->assign("month", date("Ym1", time()));
        $smarty->assign("monthes", $monthes);
        $smarty->assign("reports", $notifications);
		/*$campaign_reports = array();
		$campaigns = Article::getTotalArticleGroupByCampaignID(10);
		$i=0;
		foreach( $campaigns as $campaign_id => $campaign  )
		{
			$campaign_reports[$campaign_id] = $campaign;
            if ( $campaign['total'] > 0)
            {
                $submitted_total = Article::getTotalSubmittedAritcleByCampaignID($campaign_id, false);
                $today_submitted_total = Article::getTotalAritcleGroupByArticleTypeByCampaignID($campaign_id, true, true);
                 //START::Added By Snug 10:45 2006-8-9
                 // get total of possible gogole duplicated articles
                $campaign_reports[$campaign_id]['google_duplicated_total'] = Campaign::countArticleBySubWhere('1gd',1,', campaign_keyword AS ck', "AND ck.keyword_id=ar.keyword_id AND ck.campaign_id=$campaign_id AND ck.status!='D' ");
                //END Added
                $total_article_types = Article::getTotalAritcleGroupByArticleTypeByCampaignID($campaign_id);
            }
			if( count($submitted_total) )
			{
				$campaign_reports[$campaign_id]['submitted'] = $submitted_total[$campaign_id];
			}
			else
			{
				$campaign_reports[$campaign_id]['submitted'] = 0;
			}
			if( count( $today_submitted_total ) )
			{
				$campaign_reports[$campaign_id]['today_submitted'] = $today_submitted_total;
			}
            if (count($total_article_types))
            {
                foreach( $total_article_types as $article_type => $total )
                {
                    $campaign_reports[$campaign_id][$article_type] = $total; 
                }
            }
		}
	$smarty->assign('campaign_reports', $campaign_reports);
    $g_current_path = 'home';
    $search = Client::search($_GET);
    if ($search) {
        if (!empty($search['result'])) {
            foreach ($search['result'] as $k => $v) {
                $search['result'][$k]['id_name_campaign'] = Campaign::getAllCampaigns($mode = 'id_name_only', $v['client_id']);
            }
        }
        $smarty->assign('result', $search['result']);
    }

    // added by snug xu 10:17 2007-05-21 - STARTED
    // get type info
    $smarty->assign("article_types", $g_tag['article_type']);
    $smarty->assign("total_type", count($g_tag['article_type']));
    // added by snug xu 10:17 2007-05-21 - FINISHED
    */
    $smarty->display('user/admin_index.html');

	//$search_infos = User::Search($_GET);
	//print_r($search_infos);
} else {
    $smarty->assign('role', User::getRole());
    $thismonth = changeTimeToPayMonthFormat(time());
    $showmonth = changeTimeToPayMonthFormat(getDelayTime());
    $monthtitle = ($thismonth == $showmonth) ? 'this period':'last period';
    $smarty->assign('monthtitle', $monthtitle);
    $smarty->assign('showmonth', $showmonth);
    $smarty->assign('month', $thismonth);
    if (User::getRole() == 'copy writer') {
        require_once "js/xajax/xajax.inc.php";//call xajax file;
        require_once CMS_INC_ROOT.'/Campaign.class.php';
        
        $xajax = new xajax();
        $xajax->registerFunction("setConfirm");

        function setConfirm()
        {
            if (Campaign::confirmPending()) {
                $feedback = 'Success';
            } else {
                $feedback = 'Failure, Please try agian';
            }

            $objResponse = new xajaxResponse();
            $objResponse->addAssign("confirm_div","innerHTML","<font color='red'>".$feedback."</font>");
            $objResponse->addAlert($feedback);

            return $objResponse->getXML();
        }
		$user_id = User::getID();
		$clause = array('user_type'=>'all', 'user_id'=>$user_id );
		//Start:Added By Snug 13:34 2006-09-03
		/***获得当前copywriter所有支付历史时间**/
		$payment_info = User::getPaymentHistoryInfo( array('user_id'=>User::getID()) );
		$smarty->assign('payment_info', $payment_info );

        $reports = Campaign::reportCampaignByRole(0);
       
        /*add by liu shu fen 2008-1-28 10:16*/
        if (!empty($reports['img_report'])) {
            $arr = $reports['img_report'];
            
            foreach ($arr as $key => $value) {
                $rs[$key] = $value;
                $is_pop_style_guide = 0;
                
                require_once CMS_INC_ROOT.'/campaign_style_guide.class.php';
                require_once CMS_INC_ROOT.'/cp_style_guide_history.class.php';
                $campaign_id = $value['campaign_id'];
                $info = CampaignStyleGuide::getInfoByCampaignID($campaign_id);
                if (!empty($info) && $info['style_id'] > 0) {
                    if (!CpStyleGuideHistory::isExisted($user_id, $campaign_id)) {
                        $is_pop_style_guide  = 1;
                    }
                }
                $rs[$key]['is_pop_style_guide'] = $is_pop_style_guide;
            }
            
            $reports['img_report'] = $rs;
        }
        /*add end*/
        $smarty->assign('reports', $reports);
        $smarty->assign('feedback', $feedback);
        $xajax->processRequests();
        $smarty->assign('xajax_javascript', $xajax->getJavascript('/js/xajax/'));
        $smarty->display('user/copy_writer_index.html');
    } else if (User::getRole() == 'designer') {
        require_once CMS_INC_ROOT.'/image.class.php';
        require_once CMS_INC_ROOT.'/image_keyword.class.php';
        $reports = ImageKeyword::reportCampaignByRole(0);
        if (!empty($reports['img_report_image'])) {
            $arr = $reports['img_report_image'];
            foreach ($arr as $key => $value) {
                $rs[$key] = $value;
                $is_pop_style_guide = 0;
                
                require_once CMS_INC_ROOT.'/campaign_style_guide.class.php';
                require_once CMS_INC_ROOT.'/cp_style_guide_history.class.php';
                $campaign_id = $value['campaign_id'];
                $info = CampaignStyleGuide::getInfoByCampaignID($campaign_id);
                if (!empty($info) && $info['style_id'] > 0) {
                    if (!CpStyleGuideHistory::isExisted($user_id, $campaign_id)) {
                        $is_pop_style_guide  = 1;
                    }
                }
                $rs[$key]['is_pop_style_guide'] = $is_pop_style_guide;
            }
        }
        $smarty->assign('reports2', $reports);
        $smarty->assign('feedback', $feedback);        
        $smarty->display('user/designer_index.html');
    } else {
        require_once CMS_INC_ROOT.'/Campaign.class.php';
        $g_current_path = 'home';

        $now = time();
        $year = date('Y', $now);
        $month = date('m', $now);
        $today = date('d', $now);
        /*
        $day_nums_of_month = Article::_getdaynum($month, $year);
        $smarty->assign('day_nums_of_month', $day_nums_of_month);
        */
        $smarty->assign('today', $today);
        $reports = Campaign::reportCampaignByRole(0);
        require_once CMS_INC_ROOT.'/image.class.php';
        require_once CMS_INC_ROOT.'/image_keyword.class.php';
        $reports2 = ImageKeyword::reportCampaignByRole(0);
        $smarty->assign('reports', $reports);
        $smarty->assign('reports2', $reports2);
        $smarty->assign('feedback', $feedback);
        $smarty->display('user/editor_index.html');
    }
}
?>