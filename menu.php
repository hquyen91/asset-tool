<?php
require_once 'library/config.php';
require_once 'library/functions.php';

$_SESSION['login_return_url'] = $_SERVER['REQUEST_URI'];
checkUser();

$view = (isset($_GET['v']) && $_GET['v'] != '') ? $_GET['v'] : '';

switch ($view) {
	case 'USER' :
		$content 	= 'user/list.php';		
		$pageTitle 	= 'Asset Management - View Users';
		break;

	case 'CPU' :
		$content 	= 'cpu/list.php';		
		$pageTitle 	= 'Asset Management - View Cpu List';
		break;

	case 'LABS' :
		$content 	= 'labs/list.php';		
		$pageTitle 	= 'Asset Management - View Labs List';
		break;

	case 'STCK' :
		$content 	= 'stock/list.php';		
		$pageTitle 	= 'Asset Management - View Labs List';
		break;
		
		case 'SRVR' :
		$content 	= 'server/list.php';		
		$pageTitle 	= 'Asset Management - View Server List';
		break;
        
        case 'PRINTER' :
		$content 	= 'printer/list.php';		
		$pageTitle 	= 'Asset Management - View Printer List';
		break;
        
        case 'MOBILES' :
		$content 	= 'mobiles/list.php';		
		$pageTitle 	= 'Asset Management - View Mobiles List';
		break;
		
		case 'MTR' :
		$content 	= 'monitor/list.php';		
		$pageTitle 	= 'Asset Management - View Monitors List';
		break;
		
		case 'PHONE' :
		$content 	= 'phones/list.php';		
		$pageTitle 	= 'Asset Management - View Phones List';
		break;
		
		case 'PUR' :
		$content 	= 'purchasing/list.php';		
		$pageTitle 	= 'Asset Management - View Purchase List';
		break;

}

$script    = array('user.js', 'cpu.js', 'monitor.js', 'server.js', 'printer.js', 'mobiles.js','phones.js','purchasing.js');

require_once 'template.php';

?>