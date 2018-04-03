<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Admin</title>
<div id = "header">
<div id="user_info">
<?php
if(isset($_SESSION['admin'])){
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
<img src="image/logo.png" height="300" width="350" class="logo" />

</div>
</head>
<body>
<div id="leftnav">
<div class="link1"><a href="product.php"><font color="#666666">Product Management</font></a><br></div>
<div class="link1" id="current"><a href="#"><font color="#666666">Sale Monitoring</font></a><br></div>
  <div class="link1"><a href="supplieraccount.php"><font color="#666666">Account Management</font></a><br></div>
<div class="link1"><a href="report.php"><font color="#666666">Report Management</font></a><br></div>
    <div class="link1"><a href="recycle.php"><font color="#666666">Recycle Bin</font></a><br></div>
    <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>
    </div>
    </body>
    <div id="body2">
   <br><br><br>
<font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Confirmed Orders:</font>
<br>
<br>
<table cellspacing="0" cellpadding="0" border="1" bordercolor="#CCCCCC" width="980">
<thead>
	<tr>
      

         <th class="text1"> Product ID </th>
         <th class="text1"> Costumer ID </th>
         <th class="text1">Product name </th>
         <th class="text1">Detail </th>
         <th class="text1"> Price </th>
         <th class="text1"> Quantity </th>
         <th class="text1"> Date </th>
        
        
	</tr>
</thead>

<?php

	error_reporting(E_ALL ^ E_NOTICE);
require 'connection.php'; 

$query = "select * from confirm_orders ORDER by confirm_orderid DESC";
$result=mysql_query($query);
$countRows=mysql_num_rows($result);
if ($countRows  > 0)
{
	$total = 0;
	while ($row=mysql_fetch_array($result))
		
	{	
			$total += $row['srp'];
			$quantity='1';
			$pname=$row['pname'];
			$srp=$row['srp'];
			$detail=$row['detail'];
			$confirm_orderid=$row['confirm_orderid'];
			$productid=$row['productid'];
			$costumerid=$row['costumerid'];
			$date=$row['date'];
			
			
		
			echo "<tr align='center' style='font-family:Tahoma, Geneva, sans-serif' size='3'>
			<td class='table'><center>$productid</center></td>
			<td class='table'><center>$costumerid</center></td>
			<td class='table'><center>$pname</center></td>
			<td class='table'><center>$detail</center></td>
			<td class='table'><center>Php&nbsp;$srp.00</center></td>
			<td class='table'><center>$quantity</center></td>
			<td class='table'><center>$date</center></td>
					
		
			
			</tr>";
	}
}
else
{
	echo "<tr><td>No confirmed product</td></tr>";
}

?>
<font face="Tahoma, Geneva, sans-serif" color="#666666">    
<label>Total amount of items:</label>&nbsp;<label><U><b>Php&nbsp;<?php echo $total ?>.00</b></u></label>&nbsp;&nbsp;&nbsp;<label>No. of ordered items:</label>&nbsp;<label><b><?php echo $countRows ?></b></label>
</font>

</code>
</code>

</table>
    </div>
<br><br>
<div id="footer"></div>
</html>
<?php 
    }else
        header('location:index.php');
?>