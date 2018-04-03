
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
name="movie" src="../swf/header.swf"
bgcolor="#FFFFFF" quality="high" loop="false"
wmode="transparent"
swLiveConnect="true" allowScriptAccess="samedomain">
</embed>
</object></div>
<ul id="nav"> 
	<li><a href="../index.php">Home</a></li>
	<li><a href="#" class="currentview">Handicrafts</a></li>
   	<li><a href="public_native.php">Native Delicacies</a></li>
	<li><a href="../terms.php">Terms and Conditions</a></li>
	<li><a href="../about.php">About Us</a></li>
  
</ul>
</div>
</body>

</div>
<div id="ribbon"></div>
<div id="handicraft_body">
<form action="handicraft.php" method="post">
<div style="width:1250px;height:700px;overflow:auto;">
<br>

<font face="Tahoma, Geneva, sans-serif" color="#333333">
<?php
	require "connection.php";
	
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
                    Price:&nbsp;<b>Php<?php echo $row['srp'] ?>.00&nbsp;only!</b><br />
                        Product name:&nbsp;<?php echo $row['pname'] ?><br />
                        Description:&nbsp;<?php echo $row['detail'] ?><br />
                        Available Stock:<b>&nbsp;<?php echo $row['quantity'] ?></b><br />
                  <img src="<?php echo $row['image']; ?>" width="350" height="250" class="radius"/><br><br>
                   
                    </td>
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
</form>
</div>
<div id="footer_handicraft">
<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0%26partnerid%3Dgplp0"><img src="image/g.png" class="icon1"></a>
<a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=ph"><img src="image/y.png" class="icon2"></a>
<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount"><img src="image/gg.png" class="icon3"></a>
<font face="Tahoma, Geneva, sans-serif"></font>
<center><font face="Tahoma, Geneva, sans-serif">Copyright © 2014 BPAEV - All Rights Reserved</font></center>
</div>
</div>
</html>