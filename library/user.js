// JavaScript Document
function checkAddUserForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtUserName, 'Enter user name')) {
			return;
		} else if (isEmpty(txtUserId, 'Enter UserId')) {
			return;
		} else if (isEmpty(txtHostName, 'Enter User Hostname')) {
			return;
		} 
		
        else if (isEmpty(txtAccessCard, 'Enter Access Card(Yes/No)')) {
			return;
		}
        else if (isEmpty(txtTokens, 'Enter Tokens(if Issued)')) {
			return;
		}
        else if (isEmpty(txtOnCallLaptop, 'Yes/No')) {
			return;
		}
        else if (isEmpty(txtLaptopSerialNo, 'Enter Laptop Serial No')) {
			return;
		}
        else if (isEmpty(txtDongle, 'Enter Dongle (Yes/No)')) {
			return;
		}
        else {
			submit();
		}
	}
}

function addUser()
{
	window.location.href = 'view.php?v=adduser';
}

function editUser(id)
{
	window.location.href = 'user/index.php?view=edit&id=' + id;
	//alert(id);
}

function deleteUser(id)
{
	if (confirm('Delete this user?')) {
		window.location.href = 'user/processUser.php?action=delete&userId=' + id;
	}
}

