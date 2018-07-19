<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT p.id, p.item, p.serialno, p.purdate, p.wend, p.vid, p.price,  v.vname as vname, v.thumb AS thumb
        FROM purchasing p,  tbl_vendors v
		WHERE p.vid = v.id 
		ORDER BY price";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<p><img src="<?php echo WEB_ROOT; ?>images/software.png" class="left"/>
<strong>IT Inventory
	</strong>

</p>

<form action="processPur.php?action=addItem" method="post"  name="frmListItem" id="frmListItem">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Vendor</td>
   <td>Item Name</td>
   <td>Serial No</td>
   <td> Purchase Date</td>
   <td> Warranty End</td>
	<td> Item Price</td>
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
   <td align="center"><?php echo $item; ?></td>
   <td align="center"><?php echo $serialno; ?></td>
   <td align="center"><?php echo $purdate; ?></td>
   <td align="center"><?php echo $wend; ?></td>
   <td align="center"><?php echo $price; ?></td>
<!--  <td align="center"><a href="javascript:deleteItem(<?php echo $id; ?>);">Delete</a></td> -->
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddItem" type="button" id="btnAddItem" value="Add New Item (+)" class="button" onClick="addItem()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>