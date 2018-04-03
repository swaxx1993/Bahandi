<?php
session_start();
if(isset($_SESSION['public'])){
header('location:costumer.php');
}
?>
<?php
if(isset($_POST['login2'])){
		$pass=$_POST['pass'];
		$user=$_POST['user'];
		$address=$_POST['address'];
		$name=$_POST['name'];
		$contact=$_POST['contact'];
		$id=$_POST['id'];
		include('connection.php');
			$sql="SELECT * from register where password='".$pass."' and username='".$user."'";
						$result=mysql_query($sql);
		if(mysql_num_rows($result)==1)
			{				
			echo "<script>alert('You have sucessfully logged in $user')</script><meta http-equiv='refresh' content='0;url=costumer.php'>";

			$rec=mysql_fetch_array($result);
			session_start();
			// store session data
			$_SESSION['public']="login2";
			$_SESSION['pass2']=$rec['password'];
			$_SESSION['user2']=$rec['username'];
			$_SESSION['address2']=$rec['address'];
			$_SESSION['name2']=$rec['name'];
			$_SESSION['contact2']=$rec['contact'];
			$_SESSION['id2']=$rec['id'];
							
			}
		else
		
		{
			
			echo "<script>alert('Invalid entry please check again')</script><meta http-equiv='refresh' content='0;url=index.php'>";
}
$rec=mysql_fetch_array($result);
mysql_close($connect);
			
}	


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="themes/2/js-image-slider.css" rel="stylesheet" type="text/css" />
  <script src="themes/2/js-image-slider.js" type="text/javascript"></script>
<link href="css/index.css" rel="stylesheet" type="text/css">
<title>Public</title>
</head>
<div id="header">
<div id = "header">
<img src="image/header2.jpg" style="position:absolute" height="auto" width="auto"><img src="image/logo.png" height="180" width="260" class="logo">
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
	<li><a href="#" class="currentview">Home</a></li>
	<li><a href="admin/public_handicraft.php">Handicrafts</a></li>
   	<li><a href="admin/public_native.php">Native Delicacies</a></li>
	<li><a href="terms.php">Terms and Conditions</a></li>
	<li><a href="about.php">About Us</a></li>

</ul>
</div>
<div id="leftbox">
<div id="securitybox">
<a href="register.php"><div class="register">
<br><br><br><font class="text2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Not yet registered?</font>
</div></a>
<div id="public_detail"><font face="Tahoma, Geneva, sans-serif"><p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To our valuable costumers, in ordering items you need to have an account for you to be able to order or choose the desired items by clicking the register button above and before anything else make sure that you have read the <a href="terms.php"><i>terms and conditions</i></a> that regards on different types of payment processes. And if you like to be one of our product supplier with in the range of Eastern Visayan only don't hesitate to call us at <i><font color="#0033CC">09107625742</font></i> or email us at <i><font color="#0033CC">bahandi@yahoo.com</font></i>. Thank you!</p></font></div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table cellpadding="2" cellspacing="2">
<tr><td colspan="10" align="center" class="text">Sign in here ...</td></tr>
<tr align="center">
<td class="textbox1">Enter Username:</td>
<td><input type="text" name="user" id="username" class="textbox" required="required"></td>
</tr>
<tr align="center">
<br>
<td class="textbox1">Enter Password:</td>
<td><input type="password" name="pass" id="password" class="textbox" required="required"></td>
</tr>
<tr>
<td></td>
<td align="right"><input type="submit" name="login2" value="login"><input type="Reset" name="reset" value="Clear"></td>
</tr>
</table></form>
</div>
</div>
<body>
<div id="caption"><font face="Tahoma, Geneva, sans-serif" color="#FFFFFF" size="5">Welcome to Bahandi Online Ordering System . . .</font></div>
<div id="caption2"><font face="Tahoma, Geneva, sans-serif" color="#FFFFFF" size="5">These products are soon to be available . . .</font></div>


<br><br>
<div id="bodybox">
<div id="sliderFrame">
        <div id="slider">
                <img src="image/0.jpg" alt="Handicrafts" />
            	<a class="lazyImage" href="image/6.jpg" title="Native Delicacies"></a>
          		<b data-src="image/5.jpg">Image Slider</b>
            	<a class="lazyImage" href="image/4.jpg" title=""></a>
                <img src="image/1.jpg" alt="sample detail here" />
        </div>
        <!--thumbnails-->
        <div style="width:auto;height:320px;overflow:auto;">
        <div id="thumbs">
            <div class="thumb">
                <div class="frame"><img src="image/0.jpg" /></div>
                <div class="thumb-content"><p>sample details</p>sample details</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="image/6.jpg" /></div>
                <div class="thumb-content"><p>sample details</p>sample details</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="image/5.jpg" /></div>
                <div class="thumb-content"><p>sample details</p>sample details</div>
                <div style="clear:both;"></div>
            </div>
            <div class="thumb">
                <div class="frame"><img src="image/4.jpg" /></div>
                <div class="thumb-content"><p>sample details</p>sample details</div>
                <div style="clear:both;"></div>
			</div>
				<div class="thumb">
                <div class="frame"><img src="image/1.jpg" /></div>
                <div class="thumb-content"><p>sample details</p>sample details</div>
                <div style="clear:both;"></div>
            </div>
            </div>
            </div>
        </div>
        <!--clear above float:left elements. It is required if above #slider is styled as float:left. -->
        <div style="clear:both;height:0;"></div>
    </div>
</div>
</body>
<div id="footer">
<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0%26partnerid%3Dgplp0"><img src="image/g.png" class="icon1"></a>
<a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=ph"><img src="image/y.png" class="icon2"></a>
<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount"><img src="image/gg.png" class="icon3"></a>
<font face="Tahoma, Geneva, sans-serif"><p align="center"><a href="index.php" style="color:#666;">Home</a>|<a href="admin/public_handicraft.php" style="color:#666;">Handicrafts</a>|<a href="admin/public_native.php" style="color:#666;">Native Delicacies</a>|<a href="terms.php" style="color:#666;">Terms and Conditions</a>|<a href="about.php" style="color:#666;">About Us</a></p></font>
<center><font face="Tahoma, Geneva, sans-serif">Copyright © 2014 BPAEV - All Rights Reserved</font></center>

</div>
</html>
