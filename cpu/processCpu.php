<?php
require_once '../library/config.php';
require_once '../library/functions.php';


$action = isset($_GET['action']) ? $_GET['action'] : '';

switch ($action) {
	
	case 'add' :
		addCpu();
		break;
		
	case 'delete' :
		deleteCpu();
		break;

	default :
	    // if action is not defined or unknown
		// move to main user page
		header('Location: index.php');
}

/*
function used to add cpu in tbl_cpu
*/
function addCpu()
{
    $cpumodel = $_POST['txtCpumodel'];
	$cpusno = $_POST['txtCpusno'];
	$vid = (int)$_POST['txtVname'];
	$cpupdate = $_POST['txtCpupdate'];
	$cpuwend = $_POST['txtCpuwend'];
	$sql = "SELECT cpusno
	        FROM tbl_cpu
			WHERE cpusno = '$cpusno'";
	$result = dbQuery($sql);
	
	if (dbNumRows($result) == 1) {
		header('Location: ../view.php?v=addCpu&error=' . urlencode('cpu serial number already exist. Add another'));	
	} else {			
		$sql   = "INSERT INTO tbl_cpu (cpumodel, cpusno, vid, cpupdate, cpuwend)
		          VALUES ('$cpumodel', '$cpusno', $vid, '$cpupdate', $cpuwend)";
	
		dbQuery($sql);
		header('Location: ../menu.php?v=CPU');	
	}
}


/*
	Remove a cpu
*/
function deleteCpu()
{
	if (isset($_GET['id']) && (int)$_GET['id'] > 0) {
		$id = (int)$_GET['id'];
	} else {
		header('Location: index.php');
	}
	
	
	$sql = "DELETE FROM tbl_cpu
	        WHERE id = $id";
	dbQuery($sql);
	
	header('Location: ../menu.php?v=CPU');
}
?>