
// JavaScript Document
function checkMonitorForm()
{
	with (window.document.frmAddMonitor) {
		if (isEmpty(txtMmodel, 'Enter Monitor model name')) {
			return;
		} else if (isEmpty(txtMsno, 'Enter Monitor serial no.')) {
			return;
		} else if (isEmpty(txtMpdate, 'Enter Date of Purchase')) {
			return;
		} else if (isEmpty(txtMwend, 'Enter warranty ending date')) {
			return;
		} else {
			submit();
		}
	}
}

function addmonitor()
{
	//alert('addHardware');
	window.location.href = 'view.php?v=addmonitor';
}


function deleteMonitor(id)
{
	if (confirm('Delete this Monitor?')) {
		window.location.href = 'monitor/processMonitor.php?action=delete&id=' + id;
	}
}

