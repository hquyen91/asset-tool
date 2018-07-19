<script language="javascript">
$(document).ready(function(){
		$(".tab_content").hide(); //Hide all content
		$("ul.tabs li:first").addClass("active").show(); //Activate first tab
		$(".tab_content:first").show(); //Show first tab content
		
		//On Click Event
		$("ul.tabs li").click(function() {
			$("ul.tabs li").removeClass("active"); //Remove any "active" class
			$(this).addClass("active"); //Add "active" class to selected tab
			$(".tab_content").hide(); //Hide all tab content
			var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
			$(activeTab).fadeIn(1000); //Fade in the active content
			//$(activeTab).animate({ opacity:'toggle',height:'toggle'},1000); //Fade in the active content
			return false;
		});
	});

</script>
<style>
ul.tabs {margin:0;padding:0;float:left;list-style: none;height: 50px;border-bottom: 1px solid #999;border-left: 1px solid #999;width: 102%;}
ul.tabs li {float: left;margin: 0px;padding: 0;height: 49px;line-height: 49px;border: 1px solid #CCCCCC;border-left: none;margin-bottom: -1px;background: #e0e0e0;overflow: hidden;position: relative;}
ul.tabs li a {	text-decoration: none;color:#000000;display: block;font-size: 1.2em;padding: 0 20px;font-size:12px;border: 1px solid #fff;outline: none;}
ul.tabs li a:hover {background-color:#0094DB;color:#FFFFFF;}	
html ul.tabs li.active, html ul.tabs li.active a:hover  {background: #fff;border-bottom: 1px solid #fff;color:#000000;}
.tab_container {border: 1px solid #FFFFFF;border-top: none;clear: both;float: left; background: #fff;}
.tab_content {padding: 5px;font-size: 1.0em;width:670px;}
.tab_content img {float: left;margin: 0 15px 5px 0;border: 1px solid #ddd;padding: 2px;}
.tab_content h2 {color:#0094DB;padding:5px;padding-bottom:0px;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;	text-decoration:underline;}
.tab_content p {font-family:Verdana, Arial, Helvetica, sans-serif;font-size:14px;padding:5px;color:#333333;padding-top:-5px;line-height:20px;}
.tab_content a {font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;padding-top:-5px;line-height:20px;}
</style>
<div class="prepend-1 span-17">
<div class="container1" id="fix">
	<ul class="tabs">
        <li class=""><a href="#tab1"><img src="<?php echo WEB_ROOT; ?>images/print.png"  width="36" height="36" style="padding-top:5px; padding-right:5px;"/>Monitor Stocks</a></li>
        <li class=""><a href="#tab2"><img src="<?php echo WEB_ROOT; ?>images/software.png"  style="padding-top:5px; padding-right:5px;"/>CPU Stocks</a></li>
    </ul>
    <div class="tab_container">
        <div style="display: none;" id="tab1" class="tab_content">
      	<p>Following are the List of Available Monitor stocks</p>
		
		<form action="processMonitor.php?action=addmsonitor" method="post"  name="frmListMonitor" id="frmListMonitor">
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
   <td colspan="5" align="right"><input name="btnAddmonitor" type="button" id="btnAddmonitor" value="Add New Monitor (+)" class="button" onClick="addmonitor()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>

		
        </div>
        <div style="display: none;" id="tab2" class="tab_content">
      <h2>List of CPU availabe in stock </h2>
		<form action="processUser.php?action=addUser" method="post"  name="frmListUser" id="frmListUser">
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
while($row = dbFetchAssoc($result1)) {
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
   <td colspan="5" align="right"><input name="btnAddUser" type="button" id="btnAddUser" value="Add New CPU (+)" class="button" onClick="addCpu()"></td>
  </tr>
 </table>
 <p>&nbsp;</p>
</form>
  
		</div>
        <div style="display: none;" id="tab3" class="tab_content">
		
		</div>
    </div>
</div>
<br/><br/><br/>
</div>