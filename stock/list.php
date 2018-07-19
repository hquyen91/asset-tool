<?php
if (!defined('WEB_ROOT')) {
	exit;
}

$sql = "SELECT h.id, h.mmodel, h.msno, h.mpdate, h.mwend, h.vid,  v.vname as vname, v.thumb AS thumb
        FROM tbl_monitors h,  tbl_vendors v
		WHERE h.vid = v.id 
		ORDER BY msno";
$result = dbQuery($sql);

$sql1 = "SELECT c.id, c.cpumodel, c.cpusno, c.cpupdate, c.cpuwend, c.vid,  v.vname as vname, v.thumb AS thumb
        FROM tbl_cpu c,  tbl_vendors v
		WHERE c.vid = v.id 
		ORDER BY cpusno";
$result1 = dbQuery($sql1);

?> 
<p>&nbsp;</p>
<?php include_once("tabs.php"); ?>
