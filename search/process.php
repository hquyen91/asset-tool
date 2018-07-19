<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'search' :
		search();
		break;
		
	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}




function search()
{
	$type = $_POST['type'];
    $name = $_POST['name'];
	$hname = $_POST['hname'];
	$phonext = $_POST['phonext'];
	
	
	
	
	$hsql = "SELECT a.hostname, a.username, a.cpumodel, a.servicetag, a.monitormodel, a.phonext
	         FROM assets a WHERE a.username LIKE '%$name%' AND a.hostname LIKE '%$hname%' AND a.phonext LIKE '%$phonext%'";
			 
	$ssql = "SELECT a.hostname, a.username, a.cpumodel, a.servicetag, a.monitormodel, a.phonext
	         FROM assets a WHERE a.username LIKE '%$name%' AND a.hostname LIKE '%$hname%'";		 
	
	$data = array();
	if($type == 1){
		$result = dbQuery($hsql);
		if(dbNumRows($result) == 0) {
			header('Location: ../view.php?v=search&error=' . urlencode('No Hardware Found. Please try Again.'));	
		}else {
			while($row = dbFetchAssoc($result)){
				extract($row);
				$data[] = array('hname'       => $hostname, 
								'uname'         => $username, 
								'cmodel'         => $cpumodel, 
								'stag'          => $servicetag, 
								'mmodel'          => $monitormodel, 
								'pext'          => $phonext);
			}
			$_SESSION [result_data] = $data;
			header('Location: ../search');				
		}//else
	}
	else {
	
		$result = dbQuery($ssql);
		if(dbNumRows($result) == 0) {
			header('Location: ../view.php?v=search&error=' . urlencode('No Software Found. Please try Again.'));	
		}else {
			while($row = dbFetchAssoc($result)){
				extract($row);
				$data[] = array('hname'       => $hostname, 
								'uname'         => $username, 
								'cmodel'         => $cpumodel, 
								'stag'          => $sservicetag, 
								'mmodel'          => $monitormodel, 
								'pext'          => $phonext);
			}
			$_SESSION[result_data] = $data;
			header('Location: ../search');				
		}
	
	}
	
}

?>