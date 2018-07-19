<?php
require_once '../library/config.php';
require_once '../library/functions.php';
$errorMessage = "";

$sql = "SELECT id, lname, room_name, floor, building FROM tbl_depts";
$result = dbQuery($sql);
$userid =(int)$_GET["id"];
$sql_s = "SELECT * FROM servers WHERE stag = $stag";
$result_s = dbQuery($sql_s);
//echo $sql_u;
?> 
<div class="prepend-1 span-12">
<p align="center"><strong><font color="#660000"><?php echo $errorMessage; ?></font></strong></p>
<?php
if(dbAffectedRows() == 1){
while($d = dbFetchAssoc($result_u)){
extract($d);
?>
<form action="<?php echo WEB_ROOT; ?>user/processServer.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddServer" id="frmAddServer">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr align="center" id="listTableHeader">
      <td colspan="2">Edit Server</td>
    </tr>
    <tr>
      <td width="150" class="label">Server Model</td>
      <td class="content"><input name="txtModel" type="text" id="txtModel" size="20"  value="<?php echo $model; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">Server Tag</td>
      <td class="content"><input name="txtStag" type="text" id="txtStag" value="<?php echo $stag; ?>"  /></td>
    </tr>
    <tr>
      <td class="label">Express Code</td>
      <td class="content"><input name="txtExpresscode" type="text" id="txtExpresscode"  size="20" value="<?php echo $expresscode; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Server Name </td>
      <td class="content"><input name="txtSname" type="text" id="txtSname"  size="20" value="<?php echo $sanme; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Server Purpose </td>
      <td class="content"><input name="txtSpurpose" type="text" id="txtSpurpose" value="<?php echo $spurpose; ?>" /></td>
    </tr>
	   <tr>
      <td width="150" class="label">Server OS </td>
      <td class="content"><input name="txtSos" type="text" id="txtSos" size="20"  value="<?php echo $sos; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">Purchase Date</td>
      <td class="content"><input name="txtPurdate" type="text" id="txtPurdate" value="<?php echo $purdate; ?>"  /></td>
    </tr>
    <tr>
      <td class="label">Warranty Ending</td>
      <td class="content"><input name="txtWend" type="text" id="txtWend"  size="20" value="<?php echo $wend; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Extended Warranty</td>
      <td class="content"><input name="txtExtwarran" type="text" id="txtExtwarran"  size="20" value="<?php echo $extwarran; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Asset Tag </td>
      <td class="content"><input name="txtAssettag" type="text" id="txtAssettag" value="<?php echo $assettag; ?>"  /></td>
    </tr>
	   
    
  </table>
  <p align="center">
    <input name="btnAddServer" type="button"   class="button" id="btnAddServer" value="Edit Server" onClick="checkAddServerForm();" class="box">
    &nbsp;&nbsp;
    <input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">
  </p>
</form>
<?php 
}//while
}else {
?>
<p> No Server found.</p>
<?php 
} 
?>
</div>