<?php
session_start();
if(isset($_SESSION['admin'])){

?>


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
	$type=$_POST['type'];
		$check=mysql_query("SELECT password FROM adminlogin where password='$password'");
			
		if(!mysql_num_rows($check)==0 or ($password!=$password2))
		{
			echo "<script>alert('Sorry cannot be process password might be already taken or unmatched password')</script><meta http-equiv='refresh' content='0;url=supplieraccount.php'>";
			mysql_close($connect);
			
		
		}else{
			echo "<script>alert('You have successfuly created an account Username: $username and Password: $password')</script><meta http-equiv='refresh' content='0;url=supplieraccount.php'>";
			$sql="INSERT INTO adminlogin (name,address,contact, username, password,type) VALUES ('$name','$address','$contact','$username','$password','$type')";		
			$result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
			
			$id= mysql_insert_id();
			mysql_close($connect);
	}
}

	
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
<img src="image/logo.png" height="300" width="350" class="logo">
</div>
</head>
<body>
<div id="leftnav">
 <div class="link1"><a href="product.php"><font color="#666666"> Products Management</font></a><br></div>
 <div class="link1"><a href="admin_order.php"><font color="#666666">Order Management</font></a><br></div>
 <div class="link1"><a href="admin_order.php"><font color="#666666">Order Management</font></a><br></div>
   <div class="link1" id="current"><a href="#"><font color="#666666"> Account Management</font></a><br></div>
    <div class="link1"><a href="admin_sale.php"><font color="#666666"> Report Management</font></a><br></div>
    <div class="link1"><a href="recycle.php"><font color="#666666">Recycle Bin</font></a><br></div>
    <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>
    </div>
    
</body>
<br><br>
<div id="body">
<div id="table">
<table align="left" height="auto" width="auto">
<tr>
<td>
<fieldset>
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Account Entry</font></legend>
<form id="form1" name="form1" method="post" action="supplieraccount.php"> 
<br><br><font color="#999999" class="fontstyle">Enter Fullname:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" class="text"  style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Address:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Contact no.:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="contact" class="text"style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Username:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Enter Password:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="password" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Re-type Password:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="password2" class="text" style="box-shadow: 3px 1px #000000;" required="required">
<br><br><font color="#999999" class="fontstyle">Access Type:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="type" class="text" style="box-shadow: 3px 1px #000000;"><option>Administrator</option><option>Supplier</option><option>Employee</option>
</select>
<br><br><input type="submit" name="save" id="save" value="Save" class="button"><input type="reset"  name="reset" value="clear" class="button">
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
        <th class="text1" > Address </th>
        <th class="text1" > Contact No. </th>
		<th class="text1"> Username</th>
		<th class="text1"> Password </th>
		<th class="text1"> Type </th>
        <th class="text1"> Action </th>
	</tr>
</thead>
<tbody>
<?php
		include('connect.php');
		$result = $db->prepare("SELECT * FROM adminlogin ORDER by id DESC");
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
		<td width="auto" class="edit" align="center"><a href="edit_supplieraccount.php?id=<?php echo $row['id']; ?>"> edit </a></td>
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
    }else
        header('location:index.php');
?>