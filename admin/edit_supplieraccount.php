<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Supplier Page</title>
<script type='text/javascript'>
function confirmDelete()
{
   return confirm("Are you sure you want to delete this?");
}
</script>
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
<img src="image/logo.png" height="300" width="350" class="logo">
</div>
</head>
<body>
<div id="leftnav">
 <div class="link1"><a href="product.php"><font color="#666666">Product Management</font></a><br></div>
 <div class="link1"><a href="admin_order.php"><font color="#666666">Order Management</font></a><br></div>
  <div class="link1"  id="current"><a href="#"><font color="#666666">Account Management</font></a><br></div>
<div class="link1"><a href="admin_sale.php"><font color="#666666">Report Management</font></a><br></div>
    <div class="link1"><a href="recycle.php"><font color="#666666">Recycle Bin</font></a><br></div>
    <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>
    </div>
    
</body>
<br><br>
<div id="body">
<div id="table">

<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM adminlogin WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<table align="left" height="auto" width="auto">
<tr>
<td>
<fieldset>
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Account Entry</font></legend>
<form  action="editproccess_supplieraccount.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<br><br><font color="#999999" class="fontstyle">Enter Fullname:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $row['name']; ?>" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Address:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" class="text" value="<?php echo $row['address']; ?>" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Contact no.:</font>&nbsp;<input type="number" name="contact" class="text" value="<?php echo $row['contact']; ?>" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Username:</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" value="<?php echo $row['username'] ?>" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Password:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="password" value="<?php echo $row['password']?>" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Access Type:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="type" value="<?php echo $row['type'] ?>" class="text" style="box-shadow: 3px 1px #000000;"><option>Administrator</option><option>Supplier</option><option>Employee</option>
</select>
<br><br><input type="submit" value="Update" class="button">
<input type="submit" name="delete" id="delete" value="Delete" class="button"><input type='button' value='Back' onClick=window.location.href='supplieraccount.php' class="button">
<text class="button">Hide/Show all database records</text></b>
</form>
</fieldset>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){ 
$("text").click(function(){
	$("code").slideToggle(); 
	});
	});

</script>
<code>
<fieldset>
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Database records:</font></legend> 
<div style="width:800px;height:300px;overflow:auto;">
<table cellspacing="0" cellpadding="5" border="1" bordercolor="#CCCCCC" width="800">
<thead>
	<tr>
		<th class="text1" > Fullname </th>
        <th class="text1"> Address</th>
        <th class="text1"> Contact</th>
		<th class="text1"> Username</th>
		<th class="text1"> Password </th>
		<th class="text1"> Type </th>
	</tr>
</thead>
<tbody>
<?php
		include('connect.php');
		$result = $db->prepare("SELECT * FROM adminlogin");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td width="auto" class="text2"><?php echo $row['name']; ?></td>
        <td width="auto" class="text2"><?php echo $row['address']; ?></td>
        <td width="auto" class="text2"><?php echo $row['contact']; ?></td>
		<td width="auto" class="text2"><?php echo $row['username']; ?></td>
		<td width="auto" class="text2"><?php echo $row['password']; ?></td>
        <td width="auto" class="text2"><?php echo $row['type']; ?></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>
</div>
</fieldset></code>
</td>
</tr>
</table>
</div>
</div>
<div id="footer"></div>
</html>
<?php
	}
?>
<?php 
    }else
        header('location:index.php');
?>