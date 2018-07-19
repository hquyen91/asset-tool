<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT s.model, s.stag, s.expresscode, s.sname, s.spurpose, s.sos, s.purdate, s.wend, s.extwarran, s.assettag  FROM servers s ORDER BY stag";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">Server Management</h2>
<p><img src="images/users.png" class="left"/>
<strong>This page allow an administrator to manage the servers in the system.</strong>
<br/>
</p>

<form action="processServer.php?action=addServer" method="post"  name="frmListServer" id="frmListServer">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Model</td>
   <td>Service Tag</td>
   <td>Express Code</td>
   <td>Server Name</td>
      <td>Server Purpose</td>
      <td>Server OS</td>
      <td>Purchase Date</td>
      <td>Warranty End</td>
      <td>Extended Warranty</td>
      <td>Asset Tag</td>
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
   <td><?php echo ucfirst($model); ?></td>
   <td align="center"><?php echo $model; ?></td>
   <td align="center"><?php echo $stag; ?></td>
    <td align="center"><?php echo $expresscode; ?></td>
      <td align="center"><?php echo $sname; ?></td>
      <td align="center"><?php echo $spurpose; ?></td>
      <td align="center"><?php echo $sos; ?></td>
      <td align="center"><?php echo $purdate; ?></td>
      <td align="center"><?php echo $wend; ?></td>
      <td align="center"><?php echo $extwarran; ?></td>
      <td align="center"><?php echo $assettag; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteServer(<?php echo $stag; ?>);">Delete</a>/<a  style="font-weight:normal;" href="javascript:editUser(<?php echo $stag; ?>);">Edit</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddServer" type="button" id="btnAddServer" value="Add New Server"  class="button" onClick="addServer()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>