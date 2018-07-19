<?php
require_once '../library/config.php';
require_once '../library/functions.php';
$errorMessage = "";


$serialno =(int)$_GET["id"];
$sql_u = "SELECT * FROM printer WHERE serialno = $serialno";
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
<form action="<?php echo WEB_ROOT; ?>user/processPrinter.php?action=edit" method="post" enctype="multipart/form-data" name="frmAddPrinter" id="frmAddPrinter">
  <table width="80%" border="0" align="center" cellpadding="5" cellspacing="1" class="entryTable">
    <tr align="center" id="listTableHeader">
      <td colspan="2">Edit Printer</td>
    </tr>
    <tr>
      <td width="150" class="label">Model Type</td>
      <td class="content"><input name="txtMtype" type="text" id="txtMtype" size="20"  value="<?php echo $mtype; ?>" /></td>
    </tr>
    <tr>
      <td width="150" class="label">Serial No</td>
      <td class="content"><input name="txtSerialNo" type="text" id="txtSerialNo" value="<?php echo $serialno; ?>"  /></td>
    </tr>
    <tr>
      <td class="label">Model</td>
      <td class="content"><input name="txtModel" type="text" id="txtModel"  size="20" value="<?php echo $model; ?>" /></td>
    </tr>
    <tr>
      <td class="label">Asset Tag </td>
      <td class="content"><input name="txtAtag" type="text" id="txtAtag"  size="20" value="<?php echo $atag; ?>" /></td>
    </tr>
    
  </table>
  <p align="center">
    <input name="btnAddPrinter" type="button"   class="button" id="btnAddPrinter" value="Edit Printer" onClick="checkAddPrinterForm();" class="box">
    &nbsp;&nbsp;
    <input name="btnCancel" type="button" id="btnCancel" class="button"  value="Cancel" onClick="window.location.href='index.php';" class="box">
  </p>
</form>
<?php 
}//while
}else {
?>
<p> No Printer found.</p>
<?php 
} 
?>
</div>