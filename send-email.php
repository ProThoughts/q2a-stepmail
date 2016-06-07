<?php
if (!defined('QA_VERSION')) {
	require_once dirname(empty($_SERVER['SCRIPT_FILENAME']) ? __FILE__ : $_SERVER['SCRIPT_FILENAME']).'/../../qa-include/qa-base.php';
   require_once QA_INCLUDE_DIR.'app/emails.php';
}

for($i=1; $i<=4; $i++){
	$bodyTemplate = qa_opt('q2a-stepmail-' . $i);
	$days = qa_opt('q2a-stepmail-day-' . $i);
	$title = qa_opt('q2a-stepmail-title-' . $i);
echo $bodyTemplate;
	sendXDaysMail($days, $bodyTemplate, $title);
}

function sendXDaysMail($days, $bodyTemplate, $title) {
	$users = getXDaysAgoRegisterUsers($days);
	foreach($users as $user) {
		$body = strtr($bodyTemplate,
				array(
					'^username' => $user['handle'],
					'^sitename' => qa_opt('site_title'),
					'^siteurl' => qa_opt('site_url')
				)
			);
		sendEmail($title, $body, $user['handle'], $user['email']);
	}
}

function sendEmail($title, $body, $toname, $toemail){

	$params['fromemail'] = qa_opt('from_email');
	$params['fromname'] = qa_opt('site_title');
	$params['subject'] = '【' . qa_opt('site_title') . '】' . $title;
	$params['htmlbody'] = $body;
	$params['toname'] = $toname;
	$params['toemail'] = $toemail;
	$params['html'] = true;

//	qa_send_email($params);

	$params['toemail'] = 'yuichi.shiga@gmail.com';
	qa_send_email($params);
}
