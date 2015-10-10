<?php
/*
	Plugin Name: Step mail
	Plugin URI: 
	Plugin Description: send mail to new user step by step
	Plugin Version: 0.3
	Plugin Date: 2015-06-21
	Plugin Author:
	Plugin Author URI:
	Plugin License: GPLv2
	Plugin Minimum Question2Answer Version: 1.7
	Plugin Update Check URI: 
*/
if (!defined('QA_VERSION')) {
	header('Location: ../../');
	exit;
}

qa_register_plugin_module('module', 'q2a-stepmail-admin.php', 'q2a_stepmail_admin', 'step mail');

function getXDaysAgoRegisterUsers($days) {
	$mysqldate = date('Y-m-d', time() - $days * 24 * 60 * 60);
	$mysqldate .= " %";
	$sql = "select * from qa_users where created like '" . $mysqldate . "'";
	$result = qa_db_query_sub($sql); 
	return qa_db_read_all_assoc($result);
}


