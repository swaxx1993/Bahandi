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
<div id = "header_product">
<div id="user_info2">
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
 <div class="link1" id="current"><a href="#"><font color="#666666">Product Management</font></a><br></div>
 <div class="link1"><a href="admin_order.php"><font color="#666666">Order Management</font></a><br></div>
  <div class="link1"><a href="supplieraccount.php"><font color="#666666">Account Management</font></a><br></div>
<div class="link1"><a href="admin_sale.php"><font color="#666666">Report Management</font></a><br></div>
    <div class="link1"><a href="recycle.php"><font color="#666666">Recycle Bin</font></a><br></div>
    <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>
    </div>
    
</body>
<br><br>
<div id="body">
<?php /*?><?php
require 'connection.php';
if ($_POST['markup'])
// new data

$price= $_POST['price'];
$total= $price * .05;
$id = $_POST['id'];

					
// query
$sql = "UPDATE product 
        SET total='$total'";
header("location: product.php");

?><?php */?>
<code>
<br><br><br><font color="#666666" size="5" face="Tahoma, Geneva sans-serif">Supplier product management</font>
<br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table cellspacing="0" cellpadding="0" border="1" bordercolor="#CCCCCC" width="1000">
<thead>
	<tr>
    	<th class="text1"> Supplier name</th>
        <th class="text1"> Status</th>
        <th class="text1"> Category</th>
		<th class="text1"> Product Name</th>
		<th class="text1"> Detail </th>
		<th class="text1"> Price </th>
        <th class="text1"> Quantity </th>
         <th class="text1"> Total </th>
         <th class="text1"> Date to be release </th>
         <th class="text1"> Image</th>
         <th class="text1"> Action</th>
        
         
        
	</tr>
</thead>
<tbody>
	
</thead>
<tbody>
	<?php
	
	
		include('connect.php');
		$image="photos/" . $_FILES["file"]["name"];
		$result = $db->prepare("SELECT * FROM supplierproduct ORDER by sid DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		
	?>
 
	<tr class="record">
    
 		<td width="auto" class="text2"><?php echo $row['sname']; ?></td>
		<td width="auto" class="text2"><?php echo $row['status']; ?></td>
		<td width="auto" class="text2"><?php echo $row['category']; ?></td>
		<td width="auto" class="text2"><?php echo $row['pname']; ?></td>
        <td width="auto" class="text2"><?php echo $row['detail']; ?></td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['price'];?>.00</td>
        <td width="auto" class="text2"><?php echo $row['quantity']; ?></td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['total']; ?>.00</td>
        <td width="auto" class="text2"><?php echo $row['date']; ?></td>
        <td width="auto" class="text2"><a href="view_image.php?sid=<?php echo $row['sid']; ?>"><img src="<?php echo $row['image']; ?>" "width="70" height="70" alt="Image path Invalid"  /></a></td> 
         <td><a href="post_public.php?sid=<?php echo $row['sid']; ?>">post now </a></td>
       
	</tr>
   
	<?php
		}
	?>
    
</tbody>
</table>
</form>
</code>


</td>
</tr>
</table>
<br><br><br><font color="#666666" size="5" face="Tahoma, Geneva sans-serif">Posted products</font>
<br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<table cellspacing="0" cellpadding="0" border="1" bordercolor="#CCCCCC" width="1000">
<thead>
	<tr>
    	<th class="text1"> Supplier name</th>
        <th class="text1"> Status</th>
        <th class="text1"> Category</th>
		<th class="text1"> Product Name</th>
		<th class="text1"> Detail </th>
		<th class="text1"> Original price </th>
        <th class="text1"> SRP </th>
        <th class="text1"> Quantity </th>
         <th class="text1"> Total </th>
         <th class="text1"> Date to be release </th>
         <th class="text1"> Image</th>
         <th class="text1"> Action</th>
         <th class="text1"> Action</th>
        
         
        
	</tr>
</thead>
<tbody>
	
</thead>
<tbody>
	<?php
	
	
		include('connect.php');
		$srp=$_POST['srp'];
	$quantity=$_POST['quantity'];
	$total = $srp * $quantity;
		$image="photos/" . $_FILES["file"]["name"];
		$result = $db->prepare("SELECT * FROM adminproduct ORDER by sname DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
		
		
	?>
 
	<tr class="record">
    
 		<td width="auto" class="text2"><?php echo $row['sname']; ?></td>
		<td width="auto" class="text2"><?php echo $row['status']; ?></td>
		<td width="auto" class="text2"><?php echo $row['category']; ?></td>
		<td width="auto" class="text2"><?php echo $row['pname']; ?></td>
        <td width="auto" class="text2"><?php echo $row['detail']; ?></td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['price'];?>.00</td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['srp'];?>.00</td>
        <td width="auto" class="text2"><?php echo $row['quantity']; ?></td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['total']; ?>.00</td>
        <td width="auto" class="text2"><?php echo $row['date']; ?></td>
        <td width="auto" class="text2"><a href="view_image.php?id=<?php echo $row['id']; ?>"><img src="<?php echo $row['image']; ?>" "width="70" height="70" alt="Image path Invalid"  /></a></td> 
         <td width="auto" class="edit" align="center"><a href="edit_product.php?id=<?php echo $row['id']; ?>"> edit </a></td>
        <td width="auto" class="edit" align="center"><a href="delete_product.php?id=<?php echo $row['id']; ?>"> Delete </a></td>
       
	</tr>
   
	<?php
		}
	?>
    
</tbody>
</table>
</form>
</code>


</td>
</tr>
</table>

  
</div>
</div>
<div id="footer"></div>
</html>
<?php 
    }else
        header('location:index.php');
?>