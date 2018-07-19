<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT p.id, p.phsno, p.phext, p.vid,  v.vname as vname, v.thumb AS thumb
        FROM tbl_phones p,  tbl_vendors v
		WHERE p.vid = v.id 
		ORDER BY phsno";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT; ?>images/software.png" class="left"/>
<strong>A complete List of Phones</strong>

</p>

<form action="processPhones.php?action=addPhones" method="post"  name="frmListPhones" id="frmListPhones">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Vendor</td>
   <td>Phone Serial number </td>
   <td>Phone Extension</td>
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
   <td align="center"><?php echo $phsno; ?></td>
   <td align="center"><?php echo $phext; ?></td>
   <td align="center"><a href="javascript:deletePhones(<?php echo $id; ?>);">Delete</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddPhones" type="button" id="btnAddPhones" value="Add New Phone (+)" class="button" onClick="addPhones()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>