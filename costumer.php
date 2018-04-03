<?php 
session_start();
if(isset($_SESSION['public'])){ 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/index.css" rel="stylesheet" type="text/css">
<title>Ordering Form</title>
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
	<li><a href="admin/handicraft.php">Handicrafts</a></li>
   	<li><a href="admin/native.php">Native Delicacies</a></li>
	<li><a href="terms.php">Terms and Conditions</a></li>
	<li><a href="about.php">About Us</a></li>
    <li><a href="logout.php">Log-out</a></li>
	
</ul>
</div>
<div id="leftbox">
<div id="securitybox">
<?php
		if(isset($_SESSION['public'])){
			
		$name=$_SESSION['name2'];
		$address=$_SESSION['address2'];
		$contact=$_SESSION['contact2'];
		$id=$_SESSION['id2'];
		}
?>	
<br>
<font face="Tahoma, Geneva, sans-serif" size="5" color="#333333"><center><b>Profile Information</b></center></font>
<Font face="Tahoma, Geneva, sans-serif" color="#666666">
<table cellpadding="2" cellspacing="2">
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
<td><?php echo $_SESSION['user2'];?></td>
</tr>
</table>
</font>	
<br>
</div>
<div id="public_detail"><font face="Tahoma, Geneva, sans-serif"><p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; To our valuable costumers, in ordering items you need to have an account for you to be able to order or choose the desired items by clicking the register button above and before anything else make sure that you have read the <a href="terms.php"><i>terms and conditions</i></a> that regards on different types of payment process. And if you like to be one of our product supplier with in the range of Eastern Visayan only dont hesistate to call us at <i><font color="#0033CC">09107625742</font></i>or email us at <i><font color="#0033CC">bahandi@yahoo.com</font></i>.Thank you!</p></font></div>
</div>
</div>
<body>

<div id="bodybox2">
<form action="#" method="POST">
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">List of order/s</font></legend>
<br><a href="myorders.php">View my order</a>
<div style="width:800px;height:300px;overflow:auto;">
<br><br>
<table cellspacing="0" cellpadding="3" border="1" bordercolor="#CCCCCC" width="800">
<thead>
	<tr>
        <th class="text1"> Cart id </th>
        <th class="text1"> Costumer id </th>
        <th class="text1"> Category</th>
        <th class="text1"> Product name </th>
        <th class="text1"> Detail </th>
         <th class="text1"> Price </th>
         <th class="text1"> Quantity </th>
         <th class="text1"> Total </th>
          <th class="text1"> Date </th>
          <th class="text1"> Action </th>
        
	</tr>
</thead>
<tbody>
<?php

	error_reporting(E_ALL ^ E_NOTICE);
require 'connection.php';
$cartid=$_POST['cartid'];
$query = "select * from cart where costumerid='$id' ORDER by cartid DESC";
$result=mysql_query($query);
$countRows=mysql_num_rows($result);
if ($countRows  > 0)
{
	$total = 0;
	while ($row=mysql_fetch_array($result))
		
	{	
			
			$srp= $row['srp'];
			$cartid=$row['cartid'];
			$quantity=$row['quantity'];
			$productid=$row['productid'];
			$costumerid=$row['costumerid'];
			$category=$row['category'];
			$pname=$row['pname'];
			$detail=$row['detail'];
			$status=$row['status'];
			$totalamount=$row['total'];
			$date=$row['date'];
			$total += $totalamount;
			$totalamount2=$quantity * $srp;
			$dellink="<a href=\"delete.php?cartid=" . $cartid . "\"><img src='image/del.ico'></a>";
			
			
			echo "<tr align='center' style='font-family:Tahoma, Geneva, sans-serif' size='3'>
			<form action='$_SERVER[PHP_SELF]' method='post'>
			<td class='table'><center><input type='text' name='cartid' value='$cartid' readonly / class='textini'></center></td>
			<td class='table'><center><input type='text' name='costumerid' value='$costumerid' readonly / class='textini'></center></td>
			<td class='table'><center><input type='text' name='category' value='$category' readonly /class='textini'></center></td>
			<td class='table'><center><input type='text' name='pname' value='$pname' readonly /class='textini'></center></td>
			<td class='table'><center><input type='text' name='detail' value='$detail' readonly /class='textini'></center></td>
			<td class='table'><center><input type='text' name='srp' value='Php$srp.00' readonly /class='textini'></center></td>
			<td class='table'><center><input type='text' name='quantity' value='$quantity' readonly /class='textini'></center></td>
			<td class='table'><center><input type='text' name='total' value='Php$totalamount2.00' readonly /class='textini'></center></td>
			<td class='table'><center><input type='text' name='date' value='$date' readonly /class='textini'></center></td>
			<td class='table'><center>$dellink</center></td>
			</form>
			</tr>";
	}
}
else
{
	echo "<tr><td>No item added</td></tr>";
}

?>
    
</tbody>
</table>

</div>
<font face="Tahoma, Geneva, sans-serif" color="#666666">    
<label>Total Amount:</label>&nbsp;<label><U><b>Php&nbsp;<?php echo $total ?>.00</b></u></label>&nbsp;&nbsp;&nbsp;<label>Cart:</label>&nbsp;<label><b><?php echo $countRows ?></b></label>

</font>


<?php
include('connection.php');
if ($_POST['submit'])

{
	
  		 $queryCheck = "INSERT into orders SELECT * FROM cart where costumerid='$id'";
		 $resultCheck = mysql_query($queryCheck);
		 echo "<script>alert('You have successfully submitted your order ')</script><meta http-equiv='refresh' content='0;url=costumer.php'>";
		 $queryCheck = "DELETE FROM cart where costumerid='$id'";
		 $resultCheck = mysql_query($queryCheck);
			  mysql_close($connect); 
			  
			  
			  
}


?>


</form>




<form action="costumer.php" method="post">
<br><input type="submit" name="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;Sumbit Order&nbsp;&nbsp;&nbsp;&nbsp;" class="text1">If payment is through (G-cash,Smartmoney,Cash)
</form>
</fieldset>
<form id="paypal_form" class="paypal" action="payments.php?total=<?php echo $total ?>&item=<?php echo $countRow ?>&confirm_orderid=<?php echo $id ?>" method="post">

    <input name="cmd" type="hidden" value="_xclick" />

    <input name="no_note" type="hidden" value="1" />

    <input name="lc" type="hidden" value="US" />

    <input name="currency_code" type="hidden" value="PHP" />

    <input name="bn" type="hidden" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

    <input name="first_name" type="hidden" value="Customer's First Name" />

    <input name="last_name" type="hidden" value="Customer's Last Name" />

    <input name="payer_email" type="hidden" value="customer@example.com" />

    <input name="item_number" type="hidden" value="<?php echo $id ?>" />

    <input type="submit" name="submit2" value="Checkout with Paypal" / class="text1">If you have a Paypal account
    

</form>

</font>
</div>
</body>

<div id="footer3">
<a href="https://accounts.google.com/ServiceLogin?service=oz&passive=1209600&continue=https://plus.google.com/?gpsrc%3Dgplp0%26partnerid%3Dgplp0"><img src="image/g.png" class="icon1"></a>
<a href="https://login.yahoo.com/config/mail?&.src=ym&.intl=ph"><img src="image/y.png" class="icon2"></a>
<a href="https://accounts.google.com/ServiceLogin?passive=1209600&continue=https%3A%2F%2Faccounts.google.com%2FManageAccount&followup=https%3A%2F%2Faccounts.google.com%2FManageAccount"><img src="image/gg.png" class="icon3"></a>
<font face="Tahoma, Geneva, sans-serif"><p align="center"><a href="index.php" style="color:#666;">Home</a>|<a href="admin/handicraft.php" style="color:#666;">Handicrafts</a>|<a href="admin/native.php" style="color:#666;">Native Delicacies</a>|<a href="terms.php" style="color:#666;">Terms and Conditions</a>|<a href="about.php" style="color:#666;">About Us</a></p></font>
<center><font face="Tahoma, Geneva, sans-serif">Copyright © 2014 BPAEV - All Rights Reserved</font></center>

</div>
</html>

<?php 
    }
?>