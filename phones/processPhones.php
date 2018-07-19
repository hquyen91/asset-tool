<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addPhones();
		break;
		
	case 'delete' :
		deletePhones();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to add cpu in tbl_cpu
*/
function addPhones()
{
    $phsno = $_POST['txtPhsno'];
	$phext = $_POST['txtPhext'];
	$vid = (int)$_POST['txtVname'];
	$sql = "SELECT phsno
	        FROM tbl_phones
			WHERE phsno = '$phsno'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addPhones&error=' . urlencode('Phone serial number already exist. Add another'));	
	} else {			
		$sql   = "INSERT INTO tbl_phones (phsno, phext, vid)
		          VALUES ('$phsno', '$phext', $vid)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=PHONE');	
	}
}


/*
	Remove a cpu
*/
function deletePhones()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_phones
	        WHERE id = $id";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=PHONE');
}
?>