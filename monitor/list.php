<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT m.id, m.mmodel, m.msno, m.mpdate, m.mwend, m.vid,  v.vname as vname, v.thumb AS thumb
        FROM tbl_monitors m,  tbl_vendors v
		WHERE m.vid = v.id 
		ORDER BY msno";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT; ?>images/software.png" class="left"/>
<strong>A complete List of Monitors</strong>

</p>

<form action="processMonitor.php?action=addmonitor" method="post"  name="frmListMonitor" id="frmListMonitor">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Vendor</td>
   <td>Monitor Model</td>
   <td>Monitor Serial No</td>
   <td>Monitor Purchase Date</td>
   <td>Monitor Warranty End</td>
   <td>Delete</td>
  </tr>
<?php
while($row = dbFetchAssoc($result)) {
	extract($row);
	
	if ($i%2) {
		$class = 'row1';
	} else {
		$class = 'row2';
	}
	if($thumb) {$img = WEB_ROOT . "images/vendors/".$thumb;}
	else {$img = "images/no-image-small.png";} 
	$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td align="center">
   <img src="<?php echo $img;?>" title="<?php echo $vname; ?>" /></td>
   <td align="center"><?php echo $mmodel; ?></td>
   <td align="center"><?php echo $msno; ?></td>
   <td align="center"><?php echo $mpdate; ?></td>
   <td align="center"><?php echo $mwend; ?></td>
   <td align="center"><a href="javascript:deleteMonitor(<?php echo $id; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddMonitor" type="button" id="btnAddMonitor" value="Add New Monitor (+)" class="button" onClick="addmonitor()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>