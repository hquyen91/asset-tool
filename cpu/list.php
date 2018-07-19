<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT c.id, c.cpumodel, c.cpusno, c.cpupdate, c.cpuwend, c.vid,  v.vname as vname, v.thumb AS thumb
        FROM tbl_cpu c,  tbl_vendors v
		WHERE c.vid = v.id 
		ORDER BY cpusno";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT; ?>images/software.png" class="left"/>
<strong>A complete List of CPU</strong>

</p>

<form action="processCpu.php?action=addCpu" method="post"  name="frmListCpu" id="frmListCpu">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Vendor</td>
   <td>CPU Model</td>
   <td>CPU Serial No</td>
   <td>CPU Purchase Date</td>
   <td>CPU Warranty End</td>
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
   <td align="center"><?php echo $cpumodel; ?></td>
   <td align="center"><?php echo $cpusno; ?></td>
   <td align="center"><?php echo $cpupdate; ?></td>
   <td align="center"><?php echo $cpuwend; ?></td>
   <td align="center"><a href="javascript:deleteCpu(<?php echo $id; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddCpu" type="button" id="btnAddCpu" value="Add New CPU (+)" class="button" onClick="addCpu()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>