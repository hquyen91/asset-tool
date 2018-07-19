// JavaScript Document
function checkCpuForm()
 {
	with (window.document.frmAddCpu) {
		if (isEmpty(txtCpumodel, 'Enter CPU Model name')) {
			return;
		} else if (isEmpty(txtCpusno, 'Enter CPU Serial number ')) {
			return;
		} else if (isEmpty(txtCpupdate, 'Enter Date of Purchase')) {
			return;
		} else if (isEmpty(txtCpuwend, 'Enter Warranty Ending')) {
			return;
		}  else {
			submit();
		}
	}
}

function addCpu()
{
	//alert('addHardware');
	window.location.href = 'view.php?v=addcpu';
}



function deleteCpu(id)
{
	if (confirm('Delete this CPU?')) {
		window.location.href = 'cpu/processcpu.php?action=delete&id=' + id;
	}
}

