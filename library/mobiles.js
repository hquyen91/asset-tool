function checkAddMobilesForm()
{
	with (window.document.frmAddMobiles) {
		if (isEmpty(txtPhname, 'Enter Mobile Name')) {
			return;
		} else if (isEmpty(txtSerialno, 'Enter Mobile Serial No')) {
			return;
		} 
        else {
			submit();
		}
	}
}

function addMobiles()
{
	window.location.href = 'index.php?view=add';
}

function editMobiles(serialno)
{
	window.location.href = 'mobiles/index.php?view=edit&id=' + id;
	//alert(id);
}

function deleteMobile(serialno)
{
	if (confirm('Delete this Mobile?')) {
		window.location.href = 'mobiles/processMobiles.php?action=delete&serialNo=' + id;
	}
}