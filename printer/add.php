<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';


?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>printer/processPrinter.php?action=add" method="post" enctype="multipart/form-data" name="frmAddPrinter" id="frmAddPrinter">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add Printer</td>
   </tr>
  <tr> 
   <td width="150" class="label">Model Type</td>
   <td class="content"> <input name="txtMtype" type="text" id="txtMtype" size="30" maxlength="30"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Serial No</td>
   <td class="content"> <input name="txtSerialNo" type="text" id="txtSerialNo" value="" size="20" maxlength="20"></td>
  </tr>
  <tr>
    <td class="label">Model</td>
    <td class="content"><input name="txtModel" type="text" id="txtModel" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Asset Tag </td>
    <td class="content"><input name="txtAtag" type="text" id="txtAtag" value="" size="30" maxlength="30" /></td>
  </tr>
  
 </table>
 <p align="center"> 
  <input name="btnAddPrinter" type="button"   class="button" id="btnAddPrinter" value="Add Printer" onClick="checkAddPrinterForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>