<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addPrinter();
		break;
		
	case 'edit' :
		modifyPrinter();
		break;
		
	case 'delete' :
		deletePrinter();
		break;
    

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to create single user in table tbl_users
*/
function addPrinter()
{
    $mtype = $_POST['txtMtype'];
	$serialno = $_POST['txtSerialNo'];
	$model = $_POST['txtModel'];
	$atag = $_POST['txtAtag'];
	
	
	
	$sql = "SELECT serialno
	        FROM printer
			WHERE serialno = '$serialno'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addprinter&error=' . urlencode('SerialNo already taken. Choose another one'));	
	} else {			
		$sql   = "INSERT INTO printer (mtype, serialno, model, atag) VALUES ('$mtype', '$serialno', '$model', '$atag')";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=PRINTER');	
	}
}

/*
	Modify a user, it will mdify, edit user and able to update user details
*/
function modifyPrinter()
{
    $mtype = $_POST['txtMtype'];
	$serialno = $_POST['txtSerialNo'];
	$model = $_POST['txtModel'];
	$atag = $_POST['txtAtag'];
	
	
	// check if the serialno is taken
		$sql   = "UPDATE printer  
			SET mtype = '$mtype',  
				serialno = '$serialno', 
				model = '$model', 
				atag = '$atag' ";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=PRINTER');	
	
}

/*
	Remove a printer
*/
function deletePrinter()
{
	
    $seialno = $_GET['serialno'];
    

	
	$sql = "DELETE FROM printer  WHERE serialno LIKE $serialno";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=PRINTER');
}header('Location: ../menu.php?v=PRINTER');
?>