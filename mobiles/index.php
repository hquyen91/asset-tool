<?php
require_once '../library/config.php';
require_once '../library/functions.php';



$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : '';

switch ($view) {
	case 'list' :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View Mobiles';
		break;

	case 'add' :
		$content 	= 'add.php';		
		$pageTitle 	= 'Asset Management - Add Mobiles';
		break;

	case 'edit' :
		$content 	= 'edit.php';		
		$pageTitle 	= 'Asset Management - Edit Mobiles';
		break;

	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Asset Management - View Mobiles';
}

$script    = array('mobiles.js');

require_once '../template.php';
?>
