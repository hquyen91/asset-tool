<?php
require_once '../library/config.php';
require_once '../library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= ' Admin Control Panel - View Phones';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= ' Admin Control Panel - Add Phone';
		break;


	default :
		$content 	= 'list.php';		
		$pageTitle 	= ' Admin Control Panel - View Phones';
}

$script    = array('phones.js');

require_once '../template.php';
?>
