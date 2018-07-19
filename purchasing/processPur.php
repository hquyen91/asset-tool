<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addItem();
		break;
		
	case 'delete' :
		deleteItem();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to add cpu in tbl_cpu
*/
function addItem()
{
    $item = $_POST['txtItem'];
	$serialno = $_POST['txtSerialNo'];
	$vid = (int)$_POST['txtVname'];
	$purdate = $_POST['txtPurdate'];
	$wend = $_POST['txtWend'];
	$price = $_POST['txtPrice'];
	$sql = "SELECT serialno
	        FROM purchasing
			WHERE serialno = '$serialno'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addItem&error=' . urlencode(' serial number already exist. Add another'));	
	} else {			
		$sql   = "INSERT INTO purchasing (item, serialno, vid, purdate, wend, price)
		          VALUES ('$item', '$serialno', $vid, '$purdate', $wend, $price)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=PUR');	
	}
}


/*
	Remove a cpu
*/
function deleteItem()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM purchsaing
	        WHERE id = $id";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=PUR');
}
?>