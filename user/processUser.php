<?php
require_once '../library/config.php';
require_once '../library/functions.php';

checkUser();

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addUser();
		break;
		
	case 'edit' :
		modifyUser();
		break;
		
	case 'delete' :
		deleteUser();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to create single user in table tbl_users
*/
function addUser()
{
    $username = $_POST['txtUserName'];
	$userid = $_POST['txtUserId'];
	$hostname = $_POST['txtHostName'];
	$cpumodel = $_POST['txtCpuModel'];
	$servicetag = $_POST['txtServiceTag'];
    $liecnse = $_POST['txtLicense'];
    $monitormodel = $_POST['txtMonitorModel'];
    $phoneserialno = $_POST['txtPhSerial'];
    $phonext = $_POST['txtPhoneExt'];
	$headset = $_POST['txtHeadset'];
    $accesscad = $_POST['txtAccessCard'];
    $tokens = $_POST['txtTokens'];
    $oncallaptopsno = $_POST['txtOnCallLaptop'];
    $worklaptopsno = $_POST['txtLaptopSerialNo'];
    $dongle = $_POST['txtDongle'];
	$did = (int)$_POST['did'];
	
	
	
	$sql = "SELECT username
	        FROM assets
			WHERE username = '$username'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=adduser&error=' . urlencode('Username already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO assets (username, userid, hostname, cpumodel, servicetag, license, monitormodel, phoneserialno, phonext, headset, accesscard, tokens, oncallaptopsno, worklaptopsno, dongle, did)
		          VALUES ('$username', '$userid', '$hostname', '$cpumodel', '$servicetag', '$liecnse', '$monitormodel', '$phoneserialno', '$phonext', '$headset', '$accesscad', '$tokens', '$oncallaptopsno', '$worklaptopsno', '$dongle', $did)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=USER');	
	}
}

/*
	Modify a user, it will mdify, edit user and able to update user details
*/
function modifyUser()
{
 	$username = $_POST['txtUserName'];
	$userid = $_POST['txtUserId'];
	$hostname = $_POST['txtHostName'];
	$cpumodel = $_POST['txtCpuModel'];
	$servicetag = $_POST['txtServiceTag'];
    $liecnse = $_POST['txtLicense'];
    $monitormodel = $_POST['txtMonitorModel'];
    $phoneserialno = $_POST['txtPhSerial'];
    $phonext = $_POST['txtPhoneExt'];
	$headset = $_POST['txtHeadset'];
    $accesscad = $_POST['txtAccessCard'];
    $tokens = $_POST['txtTokens'];
    $oncallaptopsno = $_POST['txtOnCallLaptop'];
    $worklaptopsno = $_POST['txtLaptopSerialNo'];
    $dongle = $_POST['txtDongle'];
	$did = (int)$_POST['did'];
	
	
	// check if the username is taken
		$sql   = "UPDATE assets  
			SET username = '$username',  
				hostname = '$hostname', 
				cpumodel = '$cpumodel', 
				servicetag = '$servicetag', 
				license = '$liecnse', 
				monitormodel = '$monitormodel', 
				phoneserialno = '$phoneserialno', 
				phonext = '$phonext', 
				headset = '$headset', 
				accesscard = '$accesscad', 
				tokens = '$tokens', 
				oncallaptopsno = '$oncallaptopsno', 
				worklaptopsno = '$worklaptopsno', 
				dongle = '$dongle', 
				did = '$did'
				WHERE userid = '$userid' ";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=USER');	
	
}

/*
	Remove a user
*/
function deleteUser()
{
	
    $userid = $_GET['userId'];
    

	
	$sql = "DELETE FROM assets  WHERE userid LIKE $userid";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=USER');
}header('Location: ../menu.php?v=USER');
?>