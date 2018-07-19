<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';

$sql = "SELECT id, lname, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-12">
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=add" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
 <table width="100%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
  <tr align="center" id="listTableHeader"> 
   <td colspan="2">Add User</td>
   </tr>
  <tr> 
   <td width="150" class="label">User Name</td>
   <td class="content"> <input name="txtUserName" type="text" id="txtUserName" size="30" maxlength="30"></td>
  </tr>
  <tr> 
   <td width="150" class="label">UserId</td>
   <td class="content"> <input name="txtUserId" type="text" id="txtUserId" value="" size="20" maxlength="20"></td>
  </tr>
  <tr>
    <td class="label">Hostname</td>
    <td class="content"><input name="txtHostName" type="text" id="txtHostName" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Cpumodel </td>
    <td class="content"><input name="txtCpuModel" type="text" id="txtCpuModel" value="" size="30" maxlength="30" /></td>
  </tr>
  <tr>
    <td class="label">ServiceTag </td>
    <td class="content"><input name="txtServiceTag" type="text" id="txtServiceTag" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">License </td>
    <td class="content"><input name="txtLicense" type="text" id="txtLicense" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">MonitorModel </td>
    <td class="content"><input name="txtMonitorModel" type="text" id="txtMonitorModel" value="" size="30" maxlength="30" /></td>
  </tr>
     <tr>
    <td class="label">Phone serialNo</td>
    <td class="content"><input name="txtPhSerial" type="text" id="txtPhSerial" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">PhoneExt </td>
    <td class="content"><input name="txtPhoneExt" type="text" id="txtPhoneExt" value="" size="20" maxlength="20" /></td>
  </tr>
	 <tr>
    <td class="label">Headset </td>
    <td class="content"><input name="txtHeadset" type="text" id="txtHeadset" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">AccessCard </td>
    <td class="content"><input name="txtAccessCard" type="text" id="txtAccessCard" value="" size="10" maxlength="10" /></td>
  </tr>
     <tr>
    <td class="label">Tokens </td>
    <td class="content"><input name="txtTokens" type="text" id="txtTokens" value="" size="40" maxlength="40" /></td>
  </tr>
     <tr>
    <td class="label">OnCallLaptopSNo</td>
    <td class="content"><input name="txtOnCallLaptop" type="text" id="txtOnCallLaptop" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">WorkLaptopSNo</td>
    <td class="content"><input name="txtLaptopSerialNo" type="text" id="txtLaptopSerialNo" value="" size="20" maxlength="20" /></td>
  </tr>
     <tr>
    <td class="label">Dongle</td>
    <td class="content"><input name="txtDongle" type="text" id="txtDongle" value="" size="20" maxlength="20" /></td>
  </tr>
  <tr>
    <td class="label">Dept Name</td>
    <td class="content">
	<select name="did">
	<?php
	while($row = dbFetchAssoc($result)) {
		extract($row);
	?>
	<option value="<?php echo $id; ?>"><?php echo $lname." (".$room_name. ", ".$floor." )"; ?></option>
	<?php
	}
	?>
	</select>
	</td>
  </tr>
 </table>
 <p align="center"> 
  <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Add User" onClick="checkAddUserForm();" class="box">
  &nbsp;&nbsp;<input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">  
 </p>
</form>
</div>