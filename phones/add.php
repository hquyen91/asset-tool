<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/jquery.min.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.core.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.datepicker.js" language="javascript"></script>
<script language="javascript">
	$(function() {
		$("input#txtDp").datepicker({dateFormat: 'yy-mm-dd'});
		$("input#txtDx").datepicker({dateFormat: 'yy-mm-dd'});
	});
</script>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$vsql = "SELECT id, vname FROM tbl_vendors";
$vresult = dbQuery($vsql);


?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="phones/processPhones.php?action=add" method="post" enctype="multipart/form-data" name="frmAddPhones" id="frmAddphones">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add New Phone </td>
   </tr>
  <tr> 
   <td width="150" class="label">Phone Serial Number </td>
   <td class="content"> <input name="txtPhsno" type="text" id="txtPhsno" size="30" maxlength="40"></td>
  </tr>
  <tr>
    <td class="label">Phone extension number</td>
    <td class="content"><input name="txtPhext" type="text" id="txtPhext" size="40" maxlength="100" /></td>
  </tr>
  <tr>
    <td class="label">Vendor Name </td>
    <td class="content">
	<select name="txtVname" id="txtVname" >
	<?php
	while($row = dbFetchAssoc($vresult)) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>">&nbsp;&nbsp;<?php echo $vname; ?>&nbsp;&nbsp;</option>
	<?php
	}
	?>
	</select>	</td>
  </tr>
  
	 
 </table>
 <p align="center"> 
  <input name="btnAddPhones" type="button"   class="button" id="btnAddUser" value="Add New Phone (+)" onClick="checkPhonesForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value=" Cancel " onClick="window.location.href='phones/index.php';">  
 </p>
</form>
</div>