<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT m.phname, m.serialno FROM mobiles m ORDER BY serialno";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">Mobiles Management</h2>
<p><img src="images/users.png" class="left"/>
<br/>
</p>

<form action="processMobiles.php?action=addMobiles" method="post"  name="frmListMobiles" id="frmListMobiles">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Mobile name</td>
   <td>Serial No</td>
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
   <td align="center"><?php echo $phname; ?></td>
   <td align="center"><?php echo $serialno; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deleteMobiles(<?php echo $serialno; ?>);">Delete</a>/<a  style="font-weight:normal;" href="javascript:editMobiles(<?php echo $serialno; ?>);">Edit</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddMobiles" type="button" id="btnAddMobiles" value="Add New Mobile(+)"  class="button" onClick="addMobiles()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>