<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="<?php echo WEB_ROOT; ?>css/jquery.ui.theme.css" rel="stylesheet" type="text/css" />
<script src="<?php echo WEB_ROOT; ?>library/jquery.min.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.core.js" language="javascript"></script>
<script src="<?php echo WEB_ROOT; ?>library/jquery.ui.datepicker.js" language="javascript"></script>
<script language="javascript">
	$(function() {
		$("input#sdate").datepicker({dateFormat: 'yy-mm-dd'});
		$("input#edate").datepicker({dateFormat: 'yy-mm-dd'});
	});
</script>

<?php
if (!defined('WEB_ROOT')) {
	exit;
}
$errorMessage = (isset($_GET['error']) && $_GET['error'] != '') ? $_GET['error'] : '&nbsp;';
$sql_v = "SELECT id, vname FROM tbl_vendors";
$res_v = dbQuery($sql_v);

$sql_c = "SELECT cid, cname, ctype FROM tbl_categories";
$res_c = dbQuery($sql_c);

?> 
<div class="prepend-2 span-13 append-4">
<p>&nbsp;</p>
<p class="errorMessage"><?php echo $errorMessage; ?></p>
<form action="<?php echo WEB_ROOT; ?>search/process.php?action=search" method="post"  name="frmListUser" id="frmListUser" style="border-radius:10px; border:1px solid #0000FF; padding:20px;">
<p><img src="<?php echo WEB_ROOT; ?>images/search.png" />
<strong>Search Form</strong>
</p>
<hr/>
  <table width="500" border="1" cellpadding="0" cellspacing="0">
    <tr>
      <td width="33%">&nbsp;</td>
      <td width="6%">&nbsp;</td>
      <td width="61%">&nbsp;</td>
    </tr>
    <tr>
      <td>User Name </td>
      <td>&nbsp;</td>
      <td><label>
        <input name="name" type="text" id="name" />
      </label></td>
    </tr>
	  <tr>
      <td>Host Name </td>
      <td>&nbsp;</td>
      <td><label>
        <input name="hname" type="text" id="hname" />
      </label></td>
    </tr>
	  <tr>
      <td>Phone Extension </td>
      <td>&nbsp;</td>
      <td><label>
        <input name="phonext" type="text" id="phonext" />
      </label></td>
    </tr>
    <tr>
      <td>Asset Type </td>
      <td>:</td>
      <td><label>
        <select name="type">
		<option value="1">Hardware</option>
		<option value="2">Software</option>
        </select>
      </label></td>
    </tr>
    
    
   
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value=" Search Now"  class="button"/></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php
if(isset($_SESSION["result_data"]) && count($_SESSION["result_data"]) > 0) {
echo "<pre>";
//print_r($_SESSION["result_data"]);
echo "</pre>";
?>
	

<table  border="0" align="center" cellpadding="2" cellspacing="1" class="text">

  <tr align="center" id="listTableHeader"> 
     <td>Hostname</td>	 
     <td>Username</td> 
     <td>Cpu Model</td>
	 <td>ServiceTag</td>
	 <td>Monitor Model</td>
	 <td>Phone Extension</td>
 </tr>
<?php
for($i = 0; $i<count($_SESSION["result_data"]); $i++) {
	extract($_SESSION["result_data"][$i]);
	
	if ($i%2) 
	{
		$class = 'row1';
	} else 
	{
		$class = 'row2';
	}
	
	//$i += 1;
?>
  <tr class="<?php echo $class; ?>"> 
   <td align="center"><?php echo $hname; ?></td>
   <td align="center"><?php echo $uname; ?></td>
   <td align="center"><?php echo $cmodel; ?></td>
   <td align="center"><?php echo $stag; ?> </td>
   <td align="center"><?php echo $mmodel; ?></td>
   <td align="center"><?php echo $pext; ?></td>
  </tr>
<?php
} // end for
?>
	
</table>

<?php
}//if
unset($_SESSION["result_data"]);

?>
</div>

