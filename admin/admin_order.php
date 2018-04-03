<?php
session_start();
if(isset($_SESSION['admin']))
{

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Employee Page</title>
<div id = "header">
<img src="image/logo.png" height="300" width="350" class="logo">
</div>
</head>
<body>
<div id="leftnav">
 <div class="link1"><a href="product.php"><font color="#666666">Product Management</font></a><br></div>
<div class="link1"><a href="#"><font color="#666666">Order Management</font></a><br></div>
  <div class="link1"><a href="supplieraccount.php"><font color="#666666">Account Management</font></a><br></div>
<div class="link1"><a href="admin_sale.php"><font color="#666666">Report Management</font></a><br></div>
    <div class="link1"><a href="recycle.php"><font color="#666666">Recycle Bin</font></a><br></div>
    <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>

    </div>
    
</body>
<br><br>
<div id="body">

<font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Costumer Order Management:</font>
<br>
<br>
<div style="width:1000px;height:300px;overflow:auto;">
<table cellspacing="0" cellpadding="0"  bordercolor="#CCCCCC" width="980">
<thead>
	<tr>
      
		
     
        <th class="text1">Order ID </th>
         <th class="text1"> Costumer ID </th>
         <th class="text1"> Costumer Name </th>
         <th class="text1"> Address </th>
         <th class="text1"> Contact no </th>
         <th class="text1">Product name </th>
         <th class="text1"> Price </th>
         <th class="text1"> Quantity </th>
         <th class="text1"> Total </th>
         <th class="text1"> Date </th>
         <th class="text1"> Action </th>
          <th class="text1"> Action </th>
        
        
	</tr>
</thead>

<?php

	error_reporting(E_ALL ^ E_NOTICE);
require 'connection.php'; 

$query = "select * from orders ORDER by orderid DESC";
$result=mysql_query($query);
$countRows=mysql_num_rows($result);
if ($countRows  > 0)
{
	while ($row=mysql_fetch_array($result))
		
	{	
			
			$quantity=$row['quantity'];
			$pname=$row['pname'];
			$srp=$row['srp'];
			$orderid=$row['orderid'];
			$costumerid=$row['costumerid'];
			$name=$row['name'];
			$date = date('Y-m-d H:i:s');
			$total=$row['total'];
			$address=$row['address'];
			$contactno=$row['contact'];
			$orderid=$row['orderid'];
			$reject="<a href=\"reject.php?orderid=" . $orderid . "\">Reject</a>";
			$confirm="<input type='submit' name='confirm' value='Confirm'>";
			
			
		
			echo "<tr align='center' style='font-family:Tahoma, Geneva, sans-serif' size='3'>
			<form action='confirm.php' method='post'>
			<td class='table'><center><input type='text' name='orderid' value='$orderid' readonly /></center></td>
			<td class='table'><center><input type='text' name='costumerid' value='$costumerid' readonly /></center></td>
			<td class='table'><center><input type='text' name='name' value='$name' readonly /></center></td>
			<td class='table'><center><input type='text' name='address' value='$address' readonly /></center></td>
			<td class='table'><center><input type='text' name='contactno' value='$contactno' readonly /></center></td>
			<td class='table'><center><input type='text' name='pname' value='$pname' readonly /></center></td>
			<td class='table'><center><input type='text' name='srp' value='$srp' readonly /></center></td>
			
			<td class='table'><center><input type='text' name='quantity' value='$quantity' readonly /></center></td>
			<td class='table'><center><input type='text' name='total' value='$total' readonly /></center></td>
			<td class='table'><center><input type='text' name='date' value='$date' readonly /></center></td>
			<td class='table'><center>$confirm</center></td>
			<td class='table'><center>$reject</center></td>			
		</form>
			
			</tr>";
	}
}
else
{
	echo "<tr><td>No ordered item yet</td></tr>";
}

?>

</code>
</code>

</table>
</div>
<br><br><br>
<font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Confirmed Orders:</font>
<br>
<br>
<table cellspacing="0" cellpadding="0" border="1" bordercolor="#CCCCCC" width="980">
<thead>
	<tr>
      

        <th class="text1">Order ID </th>
         <th class="text1"> Costumer ID </th>
         <th class="text1"> Costumer Name </th>
         <th class="text1"> Address </th>
         <th class="text1"> Contact no </th>
         <th class="text1">Product name </th>
         <th class="text1"> Price </th>
         <th class="text1"> Quantity </th>
         <th class="text1"> Total </th>
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
			
			$quantity=$row['quantity'];
			$pname=$row['pname'];
			$srp=$row['srp'];
			$detail=$row['detail'];
			$name=$row['name'];
			$address=$row['address'];
			$contact=$row['contact'];
			$confirm_orderid=$row['confirm_orderid'];
			$costumerid=$row['costumerid'];
			$date = date('Y-m-d H:i:s');
			$totalamount=$quantity * $srp;
			$total += $totalamount;
			
			
		
			echo "<tr align='center' style='font-family:Tahoma, Geneva, sans-serif' size='3'>
			<td class='table'><center>$confirm_orderid</center></td>
			<td class='table'><center>$costumerid</center></td>
			<td class='table'><center>$name</center></td>
			<td class='table'><center>$address</center></td>
			<td class='table'><center>$contact</center></td>
			<td class='table'><center>$pname</center></td>
			<td class='table'><center>Php&nbsp;$srp.00</center></td>
			<td class='table'><center>$quantity</center></td>
			<td class='table'><center>Php&nbsp;$totalamount.00</center></td>
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
<div id="footer"></div>
</html>
<?php 
    }else
      header('location:index.php');
?>