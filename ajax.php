<?php 
$id = (int)$_GET['id'];
$con = mysqli_connect("localhost","root","YES") or die(mysqli_error());
mysqli_select_db($con , 'test');

$hsql = "SELECT h.id AS id, h.hw_name AS name, v.vname AS vname 
		 FROM tbl_hardwares h, tbl_vendors v
		 WHERE h.vid = v.id";

$ssql = "SELECT s.id AS id, s.sw_name AS name, v.vname AS vname 
		 FROM tbl_softwares s, tbl_vendors v
		 WHERE s.vid = v.id";

$result = mysqli_query($con , $id == 1 ? $hsql : $ssql);
$data = "<select name=\"type\">";
while($row = mysqli_fetch_assoc($result)){
	extract($row);
	$data .= "<option value=\"$id\">".$name." ( VENDOR : ".$vname." )</option>";
}
$data .="</select>";
mysqli_close($con);
echo $data;

?>