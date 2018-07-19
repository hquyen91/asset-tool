// JavaScript Document
function checkPhonesForm()
 {
	with (window.document.frmAddPhones) {
		
		if (isEmpty(txtPhsno, 'Enter Phone Serial Number')) 
		  {
			return;
		} 
		else if (isEmpty(txtPhext, 'Phone Extension number  ')) 
		{
			return;
		}  
		else 
		{
			submit();
		}
	}
}

function addPhones()
{
	//alert('addPhones');
	window.location.href = 'view.php?v=addphones';
}



function deletePhones(id)
{
	if (confirm('Delete this Phone?')) {
		window.location.href = 'phones/processphones.php?action=delete&id=' + id;
	}
}

