<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/jquery.min.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.core.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.datepicker.js" language="javascript"></script>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="mobiles/processMobiles.php?action=add" method="post" enctype="multipart/form-data" name="frmAddMobiles" id="frmAddMobiles">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add Mobiles</td>
   </tr>
  <tr> 
   <td width="150" class="label">Mobile Name</td>
   <td class="content"> <input name="txtPhname" type="text" id="txtPhname" size="40" maxlength="50"></td>
  </tr>
  <tr> 
   <td width="150" class="label">Serial No</td>
   <td class="content"> <input name="txtSerialno" type="text" id="txtSerialno" value="" size="30" maxlength="40"></td>
  </tr>
  
  </table>
 <p align="center"> 
  <input name="btnAddMobiles" type="button"   class="button" id="btnAddUser" value="Add Mobile(+)" onClick="checkAddMobilesForm();">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>