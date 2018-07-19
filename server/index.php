<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View Servers';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Asset Management - Add Servers';
		break;

	case 'edit' :
		$content 	= 'edit.php';		
		$pageTitle 	= 'Asset Management - Edit Servers';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View Servers';
}

$script    = array('server.js');

require_once '../template.php';
?>
