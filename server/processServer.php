<?php
require_once '../library/config.php';
require_once '../library/functions.php';



$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addServer();
		break;
		
	case 'edit' :
		modifyServer();
		break;
		
	case 'delete' :
		deleteServer();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to create single user in table tbl_users
*/
function addServer()
{
    $model = $_POST['txtModel'];
	$stag = $_POST['txtStag'];
	$expresscode = $_POST['txtExpresscode'];
	$sname = $_POST['txtSname'];
	$spurpose = $_POST['txtSpurpose'];
    $sos = $_POST['txtSos'];
    $purdate = $_POST['txtPurdate'];
    $wend = $_POST['txtWend'];
    $extwarran = $_POST['txtExtwarran'];
    $assettag = $_POST['txtAssettag'];
	
	
	
	$sql = "SELECT stag
	        FROM servers
			WHERE stag = '$stag'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=adduser&error=' . urlencode('Service tag already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO servers (model, stag, expresscode, sname, spurpose, sos, purdate, wend, extwarran, assettag) VALUES ('$model', '$stag', '$expresscode', '$sname', '$spurpose', '$sos', '$purdate', '$wend', '$extwarran', '$assettag')";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=SRVR');	
	}
}

/*
	Modify a user, it will mdify, edit user and able to update user details
*/
function modifyServer()
{
 	$model = $_POST['txtModel'];
	$stag = $_POST['txtStag'];
	$expresscode = $_POST['txtExpresscode'];
	$sname = $_POST['txtSname'];
	$spurpose = $_POST['txtSpurpose'];
    $sos = $_POST['txtSos'];
    $purdate = $_POST['txtPurdate'];
    $wend = $_POST['txtWend'];
    $extwarran = $_POST['txtExtwarran'];
    $assettag = $_POST['txtAssettag'];
	
	
	// check if the server tag is taken
		$sql   = "UPDATE servers  
			SET model = '$model',  
				expresscode = '$expresscode', 
				sname = '$sname', 
				spurpose = '$spurpose', 
				sos = '$sos', 
				purdate = '$purdate', 
				wend = '$wend', 
				extwarran = '$extwarran', 
				assettag = '$assettag', 
				WHERE stag = '$stag' ";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=SRVR');	
	
}

/*
	Remove a server
*/
function deleteServer()
{
	
    $stag = $_GET['stag'];
    

	
	$sql = "DELETE FROM servers  WHERE stag LIKE $stag";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=SRVR');
}header('Location: ../menu.php?v=SRVR');
?>