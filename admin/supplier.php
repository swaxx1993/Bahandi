

<?php
session_start();
if(isset($_SESSION['supplier'])){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Supplier Page</title>
<div id = "header">
<div id="user_info">
<?php
if(isset($_SESSION['supplier'])){
		$name=$_SESSION['name'];
		$address=$_SESSION['address'];
		$contact=$_SESSION['contact'];
}
?>	
<font face="Tahoma, Geneva, sans-serif" size="5" color="#CCC"><center><b>Profile Information</b></center></font>
<Font face="Tahoma, Geneva, sans-serif" color="#FFF">
<table cellpadding="3" cellspacing="3">
<tr>
<td>Fullname:</td>
<td><?php echo $name ?></td>
</tr>
<tr>
<td>Address:</td>
<td><?php echo $address ?></td>
</tr>
<tr>
<td>Contact no:</td>
<td><?php echo $contact ?></td>
</tr>
<tr>
<td>Username:</td>
<td><?php echo $_SESSION['user'];?></td>
</tr>
<tr>
<td>Access type:</td>
<td><?php echo $_SESSION['type'];?></td>
</tr>
</table>
</p>
</font>	
<br>
</div>
<img src="image/logo.png" height="300" width="350" class="logo">
</div>
</head>
<body>
<div id="leftnav">
 <div class="link1"><a href="supplierproductmanagement.php"><font color="#666666">Product Management</font></a><br></div>
 <div class="link1"><a href="supplier_monitor.php"><font color="#666666">Product Monitoring</font></a><br></div>
  <div class="link1"><a href="supplier_sale.php"><font color="#666666">Sale Report</font></a><br></div>
  <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>
    </div>
    </body>
    <div id="body2">
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,79,0"
id="setfocus" width="500" height="500">
<param name="movie" value="movie3.swf">
<param name="loop" value="false">
<param name="bgcolor" value="#FFFFFF">
<param name="quality" value="high">
<param name="wmode" value="visible">
<param name="allowscriptaccess" value="samedomain">
<embed type="application/x-shockwave-flash"
pluginspae="http://www.macromedi.com/go/getflashplayer"
width=100% height=100%
name="movie" src="swf/movie3.swf"
bgcolor="#FFFFFF" quality="high" loop="false"
wmode="transparent"
swLiveConnect="true" allowScriptAccess="samedomain">
</embed>
</object>
    </div>
<br><br>
<div id="footer"></div>
</html>
<?php 
    }else
        header('location:index.php');
?>