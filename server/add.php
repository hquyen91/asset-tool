<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>server/processServer.php?action=add" method="post" enctype="multipart/form-data" name="frmAddServer" id="frmAddServer">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add Server</td>
   </tr>
  <tr> 
   <td width="150" class="label">Server Model</td>
   <td class="content"> <input name="txtModel" type="text" id="txtModel" size="30" maxlength="30"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Server  Tag</td>
   <td class="content"> <input name="txtStag" type="text" id="txtStag" value="" size="20" maxlength="20"></td>
  </tr>
  <tr>
    <td class="label">Express Code</td>
    <td class="content"><input name="txtExpresscode" type="text" id="txtExpresscode" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Server  Name </td>
    <td class="content"><input name="txtSname" type="text" id="txtSname" value="" size="40" maxlength="40" /></td>
  </tr>
  <tr>
    <td class="label">Server  Purpose </td>
    <td class="content"><input name="txtSpurpose" type="text" id="txtSpurpose" value="" size="50" maxlength="50" /></td>
  </tr>
     <tr>
    <td class="label">Server OS </td>
    <td class="content"><input name="txtSos" type="text" id="txtSos" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">Purchase Date </td>
    <td class="content"><input name="txtPurdate" type="text" id="txtPurdate" value="" size="30" maxlength="30" /></td>
  </tr>
     <tr>
    <td class="label">Warranty Ending </td>
    <td class="content"><input name="txtWend" type="text" id="txtWend" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">Extended Warranty </td>
    <td class="content"><input name="txtExtwarran" type="text" id="txtExtwarran" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">Asset Tag </td>
    <td class="content"><input name="txtAssettag" type="text" id="txtAssettag" value="" size="30" maxlength="30" /></td>
  </tr>
  </table>
 <p align="center"> 
  <input name="btnAddServer" type="button"   class="button" id="btnAddServer" value="Add Server" onClick="checkAddServerForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>