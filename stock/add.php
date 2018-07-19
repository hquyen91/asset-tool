<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);

$vsql = "SELECT id, vname FROM tbl_vendors";
$vresult = dbQuery($vsql);



?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="hardware/processHardware.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Monitor </td>
   </tr>
  <tr> 
   <td width="150" class="label">Monitor Model Name</td>
   <td class="content"> <input name="txtMmodel" type="text" id="txtMmodel" size="30" maxlength="40"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Monitor Serial No</td>
   <td class="content"> <input name="txtMsno" type="text" id="txtMsno" value="" size="30" maxlength="30"></td>
  </tr>
  <tr>
    <td class="label">Vendor Name </td>
    <td class="content">
	<select name="txtVname" id="txtVname" >
	<?php
	while($row = dbFetchAssoc($vresult)) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo $vname; ?></option>
	<?php
	}
	?>
	</select>
	
	</td>
  </tr>
  <tr>
    <td class="label">Date of Purchase </td>
    <td class="content"><input name="txtMpdate" type="text" id="txtMpdate" value="" size="20" maxlength="20" /></td>
  </tr>
	   <tr>
    <td class="label">Warranty ends On </td>
    <td class="content"><input name="txtMwend" type="text" id="txtMwend" value="" size="20" maxlength="20" /></td>
  </tr>
 
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add Hardware (+)" onClick="checkMonitorForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Cancel " onClick="window.location.href='index.php';">  
 </p>
</form>
</div>