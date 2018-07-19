<?php
require_once 'library/config.php';
require_once 'library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'adduser' :
		$content 	= 'user/add.php';		
		$pageTitle 	= 'Asset Management - Add Users';
		break;

	case 'addvendor' :
		$content 	= 'vendor/add.php';		
		$pageTitle 	= 'Asset Management - Add Vendor';
		break;
		
	case 'addcat' :
		$content 	= 'category/add.php';		
		$pageTitle 	= 'Asset Management - Add catgegory';
		break;	

	case 'search' :
		$content 	= 'search/search.php';		
		$pageTitle 	= 'Asset Management - Search Asset';
		break;	

	case 'addlab' :
		$content 	= 'labs/add.php';		
		$pageTitle 	= 'Asset Management - Add Laboratory';
		break;	

	case 'assign' :
		$content 	= 'assign/add.php';		
		$pageTitle 	= 'Asset Management - Assign Asset';
		break;	

	case 'addmonitor' :
		$content 	= 'monitor/add.php';		
		$pageTitle 	= 'Asset Management - Add Monitor';
		break;	

	case 'addphones' :
		$content 	= 'phones/add.php';		
		$pageTitle 	= 'Asset Management - Add  Phones';
		break;	
		
	case 'addcpu' :
		$content 	= 'cpu/add.php';		
		$pageTitle 	= 'Asset Management - Add  CPU';
		break;	
		
		
	case 'addserver' :
		$content 	= 'server/add.php';		
		$pageTitle 	= 'Asset Management - Add  Server';
		break;	
        
     case 'addprinter' :
		$content 	= 'printer/add.php';		
		$pageTitle 	= 'Asset Management - Add  Printer';
		break;	
		
	case 'addmobiles' :
		$content 	= 'mobiles/add.php';		
		$pageTitle 	= 'Asset Management - Add  Mobiles';
		break;	

	case 'additem' :
		$content 	= 'purchasing/add.php';		
		$pageTitle 	= 'Asset Management - Add  New Purchase';
		break;	
		
		
	default :
		$content 	= 'list.php';		
		$pageTitle 	= 'Admin Control Panel - View Users';
}

$script    = array('user.js','category.js','server.js','monitor.js','cpu.js','phones.js','mobiles.js','printer.js','purchasing.js');

require_once 'template.php';

?>