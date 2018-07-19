<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT p.mtype, p.serialno, p.model, p.atag FROM printer p ORDER BY serialno";
$result = dbQuery($sql);

?> 
<div class="prepend-1 span-17">
<p>&nbsp;</p>
<h2 class="catHead">Printer Management</h2>
<p><img src="images/users.png" class="left"/>
<strong>This page allow an administrator to manage the Printers in the system.</strong>
<br/>
</p>

<form action="processPrinter.php?action=addPrinterr" method="post"  name="frmListPrinter" id="frmListPrinter">
 <table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">
  <tr align="center" id="listTableHeader"> 
   <td>Model Type</td>
   <td>Serial No</td>
   <td>Model</td>
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
   <td><?php echo ucfirst($mtype); ?></td>
   <td align="center"><?php echo $serialno; ?></td>
    <td align="center"><?php echo $model; ?></td>
      <td align="center"><?php echo $atag; ?></td>
   <td align="center"><a  style="font-weight:normal;" href="javascript:deletePrinter(<?php echo $serialno; ?>);">Delete</a>/<a  style="font-weight:normal;" href="javascript:editPrinter(<?php echo $serialno; ?>);">Edit</a></td>
  </tr>
<?php
} // end while

?>
  <tr> 
   <td colspan="5">&nbsp;</td>
  </tr>
  <tr> 
   <td colspan="5" align="right"><input name="btnAddPrinter" type="button" id="btnAddPrinter" value="Add New Printer"  class="button" onClick="addPrinter()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
</div>