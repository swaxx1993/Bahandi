

<?php
require 'connection.php';
if ($_POST['save'])

{
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$password2=$_POST['password2'];
		$check=mysql_query("SELECT password FROM register where password='$password'");
			
		if(!mysql_num_rows($check)==0 or ($password!=$password2))
		{
			echo "<script>alert('Sorry cannot be process password might be already taken or unmatched password')</script><meta http-equiv='refresh' content='0;url=register.php'>";
			mysql_close($connect);
			
		
		}else{
			echo "<script>alert('You have successfuly created an account Username: $username and Password: $password')</script><meta http-equiv='refresh' content='0;url=index.php'>";
			$sql="INSERT INTO register (name,address,contact, username, password) VALUES ('$name','$address','$contact','$username','$password')";		
			$result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
			
			$id= mysql_insert_id();
			mysql_close($connect);
	}
}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/index.css" rel="stylesheet" type="text/css">
<title>Registration Form</title>
</head>
<div id="header">
<div id = "header"><img src="image/header2.jpg" style="position:absolute" height="auto" width="auto"><img src="image/logo.png" height="180" width="260" class="logo">
<div id="object">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,79,0"
id="setfocus" width="500" height="500">
<param name="movie" value="header.swf">
<param name="loop" value="false">
<param name="bgcolor" value="#FFFFFF">
<param name="quality" value="high">
<param name="wmode" value="visible">
<param name="allowscriptaccess" value="samedomain">
<embed type="application/x-shockwave-flash"
pluginspae="http://www.macromedi.com/go/getflashplayer"
width=100% height=100%
name="movie" src="swf/header.swf"
bgcolor="#FFFFFF" quality="high" loop="false"
wmode="transparent"
swLiveConnect="true" allowScriptAccess="samedomain">
</embed>
</object></div>
<ul id="nav"> 
	<li><a href="index.php">Home</a></li>
	<li><a href="../admin/public_handicraft.php">Handicrafts</a></li>
   	<li><a href="#">Native Delicacies</a></li>
	<li><a href="#">Terms and Conditions</a></li>
	<li><a href="#">About Us</a></li>
	
</ul>
</div>
</div>
<body>
<div id="bodybox3">
<div id="caption3" align="center"><font face="Tahoma, Geneva, sans-serif" color="#FFFFFF" size="+2">Registration Form</font></div>
<br>
<br />
<form action="register.php" method="post">
<br>
<table width="50" height="auto" cellpadding="5" cellspacing="5" align="center">
  <tr>
    <td class="textbox1">Enter name:<input type="text" name="name" / class="textbox" required="required"></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="textbox1">Enter username:<input type="text" name="username" / class="textbox" required="required"></td>
  </tr>
  <tr>
    <td class="textbox1">Enter address:<input type="text" name="address" / class="textbox" required="required"></td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="textbox1">Enter password:<input type="text" name="password" / class="textbox" required="required"></td>
  </tr>
  <tr>
    <td class="textbox1">Enter contact no.:<input type="number" name="contact" / class="textbox" required="required"></td>
        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td class="textbox1">Re-type password:<input type="text" name="password2" / class="textbox" required="required"></td>
    <tr>
    <td><input type="submit" name="save" value="Register" class="button"/><input type="reset"  name="reset" value="clear" class="button"></td>
    </tr>
</table>
<label>&nbsp;&nbsp;&nbsp;&nbsp;Note: Before clicking the register button make sure that you have read the <i><a href="#">Terms and conditons</a></i>. Thank you!&nbsp;&nbsp;</label>
</form>
</div>
</body>
<div id="footer2">
<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0%26partnerid%3Dgplp0"><img src="image/g.png" class="icon1"></a>
<a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=ph"><img src="image/y.png" class="icon2"></a>
<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount"><img src="image/gg.png" class="icon3"></a>
<font face="Tahoma, Geneva, sans-serif"><p align="center"><a href="index.php" style="color:#666;">Home</a>|<a href="../admin/public_handicraft.php" style="color:#666;">Handicrafts</a>|<a href="#" style="color:#666;">Native Delicacies</a>|<a href="#" style="color:#666;">Terms and Conditions</a>|<a href="#" style="color:#666;">About Us</a></p></font>
<center><font face="Tahoma, Geneva, sans-serif">Copyright © 2014 BPAEV - All Rights Reserved</font></center>

</div>
</html>