<?php
require_once '../library/config.php';
require_once '../library/functions.php';
$errorMessage = "";

$sql = "SELECT id, lname, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);
$userid =(int)$_GET["id"];
$sql_u = "SELECT * FROM assets WHERE userid = $userid";
$result_u = dbQuery($sql_u);
//echo $sql_u;
?> 
<div class="prepend-1 span-12">
<p align="center"><strong><font color="#660000"><?php echo $errorMessage; ?></font></strong></p>
<?php
if(dbAffectedRows() == 1){
while($d = dbFetchAssoc($result_u)){
extract($d);
?>
<form action="<?php echo WEB_ROOT; ?>user/processUser.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddUser" id="frmAddUser">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr align="center" id="listTableHeader">
      <td colspan="2">Edit User</td>
    </tr>
    <tr>
      <td width="150" class="label">User Name</td><input type="hidden" name="id" value="<?php echo $username; ?>">
      <td class="content"><input name="txtUserName" type="text" id="txtUserName" size="20"  value="<?php echo $username; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">UserId</td>
      <td class="content"><input name="txtUserId" type="text" id="txtUserId" value="<?php echo $userid; ?>"  /></td>
    </tr>
    <tr>
      <td class="label">Hostname</td>
      <td class="content"><input name="txtHostName" type="text" id="txtHostName"  size="20" value="<?php echo $hostname; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Cpumodel </td>
      <td class="content"><input name="txtCpuModel" type="text" id="txtCpuModel"  size="20" value="<?php echo $cpumodel; ?>" /></td>
    </tr>
    <tr>
      <td class="label">ServiceTag </td>
      <td class="content"><input name="txtServiceTag" type="text" id="txtServiceTag" value="<?php echo $servicetag; ?>" /></td>
    </tr>
	   <tr>
      <td width="150" class="label">License </td>
      <td class="content"><input name="txtLicense" type="text" id="txtLicense" size="20"  value="<?php echo $license; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">MonitorModel</td>
      <td class="content"><input name="txtMonitorModel" type="text" id="txtMonitorModel" value="<?php echo $monitormodel; ?>"  /></td>
    </tr>
    <tr>
      <td class="label">Phone serialNo</td>
      <td class="content"><input name="txtPhSerial" type="text" id="txtPhSerial"  size="20" value="<?php echo $phoneserialno; ?>" /></td>
    </tr>
    <tr>
      <td class="label">PhoneExt</td>
      <td class="content"><input name="txtPhoneExt" type="text" id="txtPhoneExt"  size="20" value="<?php echo $phonext; ?>" /></td>
    </tr>
	  <tr>
      <td class="label">Headset</td>
      <td class="content"><input name="txtHeadset" type="text" id="txtHeadset"  size="20" value="<?php echo $headset; ?>" /></td>
    </tr>
    <tr>
      <td class="label">AccessCard </td>
      <td class="content"><input name="txtAccessCard" type="text" id="txtAccessCard" value="<?php echo $accesscard; ?>"  /></td>
    </tr>
	   <tr>
      <td width="150" class="label">Tokens </td>
      <td class="content"><input name="txtTokens" type="text" id="txtTokens" size="20"  value="<?php echo $tokens; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">OnCallLaptopSNo</td>
      <td class="content"><input name="txtOnCallLaptop" type="text" id="txtOnCallLaptop" value="<?php echo $oncallaptopsno; ?>" /></td>
    </tr>
    <tr>
      <td class="label">WorkLaptopSNo</td>
      <td class="content"><input name="txtLaptopSerialNo" type="text" id="txtLaptopSerialNo"  size="20" value="<?php echo $oncallaptopsno; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Dongle </td>
      <td class="content"><input name="txtDongle" type="text" id="txtDongle"  size="20" value="<?php echo $dongle; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Dept Name</td>
      <td class="content"><select name="did">
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
    <input name="btnAddUser" type="button"   class="button" id="btnAddUser" value="Edit User" onClick="checkAddUserForm();" class="box">
    &nbsp;&nbsp;
    <input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">
  </p>
</form>
<?php 
}//while
}else {
?>
<p> No user found.</p>
<?php 
} 
?>
</div>