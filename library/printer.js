function checkAddPrinterForm()
{
	with (window.document.frmAddPrinter) {
		if (isEmpty(txtMtype, 'Enter Printer Type')) {
			return;
		} else if (isEmpty(txtSerialNo, 'Enter Serial No')) {
			return;
		} else if (isEmpty(txtModel, 'Enter Model')) {
			return;
		} else if (isEmpty(txtAtag, 'Enter Asset Tag')) {
			return;
		}
        else {
			submit();
		}
	}
}

function addPrinter()
{
	window.location.href = 'index.php?view=add';
}

function editPrinter(serialno)
{
	window.location.href = 'printer/index.php?view=edit&id=' + serialno;
	//alert(id);
}

function deletePrinter(serialno)
{
	if (confirm('Delete this Printer?')) {
		window.location.href = 'printer/processPrinter.php?action=delete&serialNo=' + serialno;
	}
}