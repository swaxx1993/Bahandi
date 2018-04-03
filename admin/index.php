<?php
session_start();
if(isset($_SESSION['admin'])){
header('location:admin.php');
}

?>
<?php
	$msg="";
if(isset($_POST['login'])){
		$pass=$_POST['pass'];
		$user=$_POST['user'];
		$type=$_POST['type'];
		$name=$_POST['name'];
		$id=$_POST['id'];
		$address=$_POST['address'];
		$contact=$_POST['contact'];
		
		
		
		include('connection.php');
			$sql="SELECT * from adminlogin where password='".$pass."' and username='".$user."' and type='".$type."'";
			$result=mysql_query($sql);
		if(mysql_num_rows($result)==1)
			{				
			$rec=mysql_fetch_array($result);
			date_default_timezone_set('Etc/GMT+8');
			session_start();
			// store session data
			$_SESSION['admin']="login";
			$_SESSION['supplier']="login";
			$_SESSION['employee']="login";
			$_SESSION['login']="login";
			$_SESSION['pass']=$rec['password'];
			$_SESSION['type']=$rec['type'];
			$_SESSION['user']=$rec['username'];
			$_SESSION['name']=$rec['name'];
			$_SESSION['id']=$rec['id'];
			$_SESSION['address']=$rec['address'];
			$_SESSION['contact']=$rec['contact'];
			
			if($_POST['type']=='Administrator'){	
			echo "<script>alert('You have sucessfully logged in $user')</script><meta http-equiv='refresh' content='0;url=admin.php'>";
			}
			if($_POST['type']=='Supplier'){	
			echo "<script>alert('You have sucessfully logged in $user')</script><meta http-equiv='refresh' content='0;url=supplier.php'>";
			}
			if($_POST['type']=='Employee'){	
			echo "<script>alert('You have sucessfully logged in $user')</script><meta http-equiv='refresh' content='0;url=employee.php'>";
			}
			}
		else
			{
			echo "<script>alert('Invalid entry please check again')</script><meta http-equiv='refresh' content='0;url=index.php'>";
}
mysql_close($connect);
			
}	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/index.css" rel="stylesheet" type="text/css">
<script src="js/slider.js" type="text/javascript"></script>
<title>Security</title>
<div id="header">
<div id = "header"><img src="image/header.jpg" style="position:absolute" height="auto" width="auto"><img src="image/logo.png" height="180" width="260" class="logo">
<marquee><font color="#00FF66" size="6" face="Tahoma, Geneva, sans-serif" style="position:absolute; margin: 160px 0px 0px 510px; text-shadow: 2px 1px #ff0000;">Welcome to Bahandi Online Ordering System</font></marquee>
</div>
</head>
<body>
<div id="slider">
 					<img src="image/0.jpg" alt="" />
					<img src="image/1.jpg" alt="" />
                    <img src="image/2.jpg" alt="" />
                    <img src="image/3.jpg" alt="" />
                    <img src="image/4.jpg" alt="" />
                    <img src="image/5.jpg" alt="" />
                    <img src="image/6.jpg" alt="" />
    
    
</div>
<div id="securitybox">
<hr  class="hr" color="#CCCCCC" size="5" width="300">
<hr  class="hr2"  color="#999999"size="5" width="280">
<font class="title" size="5">Administrator login</font><img src="image/padlock.png" class="lock" width="100" height= "100">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<br><br><font size="3" face="Tahoma, Geneva, sans-serif" class="text1">Username:</font><input type="text" name="user" value="" class="textbox1" required="required">
<br><font size="3" face="Tahoma, Geneva, sans-serif" class="text2">Password:</font><input type="password" name="pass"  class="textbox2" required="required">
<br><font size="3" face="Tahoma, Geneva, sans-serif" class="text2">Access type:</font><select name="type" class="textbox2"><option>Administrator</option><option>Supplier</option><option>Employee</option>
</select>
<br>
<br>
<input type="submit" name="login" value="login" class="btn1">&nbsp;&nbsp;<input type="reset" name="reset" value="Clear" class="btn2">
</form>
</div>
<div id="admin_detail">
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){ 
$("text").click(function(){
	$("p").slideToggle(); 
	});
	});
</script>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Site administrators can perform administrative functions such as modifying site pages, adding events, and customizing the contact database. As an administrator, you can log in and access the admin backend – an area reserved for site and account administration, and not seen by ordinary members or visitors to your site. You can designate contacts as administrators, and grant them full or partial administrative privileges. If you designate a contact who is not a member as an administrator, the contact can switch back and forth between admin view and public view.</p><b><text>hide/show details....</text></b>

</div>
</body>
<br>
<br />

<div id="footer">
<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0%26partnerid%3Dgplp0"><img src="image/g.png" class="icon1"></a>
<a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=ph"><img src="image/y.png" class="icon2"></a>
<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount"><img src="image/gg.png" class="icon3"></a>
<hr color="#CCC" size="2" width="900" align="center" style="margin: 50px auto;">

<center>Copyright © 2014 BPAEV - All Rights Reserved</center>

</div>
</html>
