<?php
session_start();
if(isset($_SESSION['public']))
{ 
$id=$_SESSION['id'];
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
name="movie" src="../swf/header.swf"
bgcolor="#FFFFFF" quality="high" loop="false"
wmode="transparent"
swLiveConnect="true" allowScriptAccess="samedomain">
</embed>
</object></div>
<ul id="nav"> 
	<li><a href="../index.php">Home</a></li>
	<li><a href="#" class="currentview">Handicrafts</a></li>
   	<li><a href="native.php" >Native Delicacies</a></li>
	<li><a href="../terms.php">Terms and Conditions</a></li>
	<li><a href="../about.php">About Us</a></li>
  
</ul>
</div>
</body>
<div id="leftnav" align="center">
<br><a href="../costumer.php"><font face="Arial Black, Gadget, sans-serif"  >Item List</font></a>
<br><a href="../myorders.php".php"><font face="Arial Black, Gadget, sans-serif" >My order</font></a>
<br><a href="../logout.php".php"><font face="Arial Black, Gadget, sans-serif" >Logout</font></a>

</div>
<div id="ribbon2"></div>
<div id="handicraft_body">
<div style="width:1250px;height:700px;overflow:auto;">
<font face="Tahoma, Geneva, sans-serif" color="#333333">
<br>
<?php

	require "connection.php";
	$id =$_POST['id'];
	$category =$_POST['category'];
	$productid =$_POST['productid'];
	$pname =$_POST['pname'];
	$detail =$_POST['detail'];
	$quantity =$_POST['quantity'];
	$srp =$_POST['srp'];
	$query="select * from adminproduct where category='handicraft' ORDER by id DESC";
	$result=mysql_query($query);
	
 
	$cols=3;		// Here we define the number of columns
	echo "<table>";	// The container table with $cols columns
	do{
		echo "<tr>";
		for($i=1;$i<=$cols;$i++){	// All the rows will have $cols columns even if
									// the records are less than $cols
			$row=mysql_fetch_array($result);
			if($row){
				
 ?>
        <td>
            <table>
                <tr>
                    <td>
                    <form action="cart2_process.php" method="POST">
                    <input type="text" name="category" value="<?php echo $row['category'] ?>" hidden="true" /></b><br>
                         Price:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Php<input type="text" name="price" value="<?php echo $row['srp'] ?>.00 only!" readonly / class="textini"><br />
                        Product name:&nbsp;&nbsp;<input type="text" name="pname" value="<?php echo $row['pname'] ?>" readonly / class="textini"><br />
                        Description:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="detail" value="<?php echo $row['detail'] ?>" readonly / class="textini"><br />
                        Available Stock:<b><input type="text" name="quantity" value="<?php echo $row['quantity'] ?>" readonly / class="textini"><input type="hidden" name="product_id" value="<?php echo $row['id'] ?>"></b><br />
                        Quantity:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="item" required="required" class="textini"><br />
                    <img src="<?php echo $row['image']; ?>" width="350" height="250" alt="Image path Invalid"  class="radius"/> 						
                       <br><input type="submit" name="submit" value="add to cart"></center>
                       <br>
                    </form></td>
                    <td width="50">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>	<!-- Create gap between columns -->
                </tr>
           </table>
        </td>
<?php
			}
			else{
				echo "<td>&nbsp;</td>";	//If there are no more records at the end, add a blank column
			}
		}
	} while($row);
	echo "</table>";

 ?>
</font>
</div>
</div>
<div id="footer_handicraft">
<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0%26partnerid%3Dgplp0"><img src="image/g.png" class="icon1"></a>
<a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=ph"><img src="image/y.png" class="icon2"></a>
<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount"><img src="image/gg.png" class="icon3"></a>
<font face="Tahoma, Geneva, sans-serif"><p align="center"><a href="../index.php" style="color:#666;">Home</a>|<a href="../admin/handicraft.php"" style="color:#666;">Handicrafts</a>|<a href="#" style="color:#666;">Native Delicacies</a>|<a href="#" style="color:#666;">Terms and Conditions</a>|<a href="#" style="color:#666;">About Us</a></p></font>
<center><font face="Tahoma, Geneva, sans-serif">Copyright © 2014 BPAEV - All Rights Reserved</font></center>
</div>
</div>
</html>

<?php 
    }else
        header('location:index.php');
?>