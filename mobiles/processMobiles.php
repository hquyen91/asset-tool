<?php
require_once '../library/config.php';
require_once '../library/functions.php';



$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addMobiles();
		break;
		
	case 'edit' :
		modifyMobiles();
		break;
		
	case 'delete' :
		deleteMobiles();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to create single user in table tbl_users
*/
function addMobiles()
{
    $phname = $_POST['txtPhname'];
	$serialno = $_POST['txtSerialno'];
	
	
	$sql = "SELECT serialno
	        FROM mobiles
			WHERE serialno = '$serialno'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addMobiles&error=' . urlencode('Service tag already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO mobiles (phname, serialno) VALUES ('$phname', '$serialno')";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=MOBILES');	
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
	
	header('Location: ../menu.php?v=MOBILES');
}header('Location: ../menu.php?v=MOBILES');
?>