// JavaScript Document
function checkItemForm()
 {
	with (window.document.frmAddItem) {
		if (isEmpty(txtItem, 'Enter Item name')) {
			return;
		}  else if (isEmpty(txtPurdate, 'Enter Date of Purchase')) {
			return;
		} 	else if (isEmpty(txtPrice, 'Enter Item Price')) {
			return;
		} 
		else {
			submit();
		}
	}
}

function addItem()
{
	//alert('addHardware');
	window.location.href = 'view.php?v=additem';
}



function deleteItem(id)
{
	if (confirm('Delete this Item?')) {
		window.location.href = 'purchasing/processpur.php?action=delete&id=' + id;
	}
}

