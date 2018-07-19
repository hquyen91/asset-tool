function checkAddServerForm()
{
	with (window.document.frmAddServer) {
		if (isEmpty(txtModel, 'Enter Server Model')) {
			return;
		} else if (isEmpty(txtStag, 'Enter Service Tag')) {
			return;
		} else if (isEmpty(txtExpresscode, 'Enter Express Tag')) {
			return;
		} else if (isEmpty(txtSname, 'Enter Server Name')) {
			return;
		} else if (isEmpty(txtSpurpose, 'Enter Serever Purpose')) {
			return;
		}
        else if (isEmpty(txtSos, 'Enter Server Operating System')) {
			return;
		}
        else if (isEmpty(txtPurdate, 'Enter Puchase Date')) {
			return;
		}
        else if (isEmpty(txtWend, 'Enter Warranty End')) {
			return;
		}
        else if (isEmpty(txtExtwarran, 'Enter Extended Warranty')) {
			return;
		}
        else if (isEmpty(txtAssettag, 'Enter Asset Tag')) {
			return;
		}
        
        else {
			submit();
		}
	}
}

function addServer()
{
	window.location.href = 'index.php?view=add';
}

function editServer(stag)
{
	window.location.href = 'server/index.php?view=edit&id=' + stag;
	//alert(id);
}

function deleteServer(stag)
{
	if (confirm('Delete this Server?')) {
		window.location.href = 'server/processUser.php?action=delete&userId=' + stag;
	}
}