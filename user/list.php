<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT a.username, a.userid, a.hostname, a.cpumodel, a.servicetag, a.license, a.monitormodel, a.phoneserialno, a.phonext, a.headset, a.accesscard, a.tokens, a.oncallaptopsno, a.worklaptopsno, a.dongle, d.lname AS dname
        FROM assets a, tbl_depts d ORDER BY username";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">User Management</h2>
<p><img src="images/users.png" class="left"/>
<strong>This page allow an administrator to manage the users in the system.</strong>
<br/>
</p>

<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Username</td>
   <td>UserId</td>
   <td>Hostname</td>
   <td>CPUModel</td>
      <td>ServiceTag</td>
      <td>License</td>
      <td>Monitor Model</td>
      <td>PhoneSerialNo</td>
      <td>PhoneExt</td>
	  <td>Headset</td>
      <td>AccessCard</td>
      <td>Tokens</td>
      <td>OnCallLaptop/SerialNo</td>
      <td>WorkLaptop/SerialNo</td>
      <td>Dongle</td>
      <td>Department</td>
   <td>Delete&nbsp;/&nbsp;Edit</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td><?php echo ucfirst($username); ?></td>
   <td align="center"><a href="mailto:<?php echo $userid; ?>"><?php echo $userid; ?></a></td>
   <td align="center"><?php echo $hostname; ?></td>
    <td align="center"><?php echo $cpumodel; ?></td>
      <td align="center"><?php echo $servicetag; ?></td>
      <td align="center"><?php echo $license; ?></td>
      <td align="center"><?php echo $monitormodel; ?></td>
      <td align="center"><?php echo $phoneserialno; ?></td>
      <td align="center"><?php echo $phonext; ?></td>
	  <td align="center"><?php echo $headset; ?></td>
      <td align="center"><?php echo $accesscard; ?></td>
      <td align="center"><?php echo $tokens; ?></td>
      <td align="center"><?php echo $oncallaptopsno; ?></td>
      <td align="center"><?php echo $worklaptopsno; ?></td>
      <td align="center"><?php echo $dongle; ?></td>
      <td align="center"><?php echo $dname; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteUser(<?php echo $userid; ?>);">Delete</a>/<a  style="font-weight:normal;" href="javascript:editUser(<?php echo $userid; ?>);">Edit</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add New User"  class="button" onClick="addUser()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>