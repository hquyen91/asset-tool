<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addMonitor();
		break;
		
	case 'delete' :
		deleteMonitor();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to add cpu in tbl_cpu
*/
function addMonitor()
{
    $mmodel = $_POST['txtMmodel'];
	$msno = $_POST['txtMsno'];
	$vid = (int)$_POST['txtVname'];
	$mpdate = $_POST['txtMpdate'];
	$mwend = $_POST['txtMwend'];
	$sql = "SELECT msno
	        FROM tbl_monitors
			WHERE msno = '$msno'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addmonitor&error=' . urlencode('Monitor serial number already exist. Add another'));	
	} else {			
		$sql   = "INSERT INTO tbl_monitors (mmodel, msno, vid, mpdate, mwend)
		          VALUES ('$mmodel', '$msno', $vid, '$mpdate', $mwend)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=MTR');	
	}
}


/*
	Remove a cpu
*/
function deleteMonitor()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_monitors
	        WHERE id = $id";
	dbQuery($sql);
	header('Location: ../menu.php?v=MTR');
}

?>