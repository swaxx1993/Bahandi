<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Employee Page</title>
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
 <div class="link1"><a href="#" id="current"><font color="#666666">Customer's Account Management</font></a><br></div>
  <div class="link1"><a href="#"><font color="#666666">Product Information</font></a><br></div>
    <div class="link1"><a href="#"><font color="#666666">Reports</font></a><br></div>
    </div>
    
</body>
<br><br>
<div id="body">
<div id="table">
<?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM customeraccount WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<table align="left" height="auto" width="auto">
<tr>
<td>
<fieldset>
<legend><font color="#CCCCCC" size="5" face="Tahoma, Geneva, sans-serif">Product Entry</font></legend>
<form  action="editproccess_costumeraccount.php" method="post">
<input type="hidden" name="id" value="<?php echo $row ['id']; ?>" />
<br><font color="#999999" class="fontstyle">Enter Fullname Name:</font>&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="name" value="<?php echo $row['name']?>" class="text" />
<br><br><font color="#999999" class="fontstyle">Enter Address:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="address" value="<?php echo $row['address']?>" class="text"/>
<br><br><font color="#999999" class="fontstyle">Enter Cellphone no.:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="cellphone" value="<?php echo $row['contact']?>" class="text"/>
<br><br><font color="#999999" class="fontstyle">Enter Username:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="username" value="<?php echo $row['username']?>" class="text"/>
<br><br><font color="#999999" class="fontstyle">Enter Password:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="password" value="<?php echo $row['password']?>" class="text"/>
<br><br><input type="submit" name="update" value="Update" class="button"><input type="submit" name="delete" value="Delete" class="button"><input type='button' value='Back' onClick=window.location.href='costumeraccount.php' class="button">
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
		<th class="text1" > Costumer's Name </th>
		<th class="text1"> Address</th>
		<th class="text1"> Cellphone no. </th>
		<th class="text1"> username </th>
        <th class="text1"> password </th>
	</tr>
</thead>
<tbody>
	<?php
		include('connect.php');
		$result = $db->prepare("SELECT * FROM customeraccount");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td width="auto" class="text2"><?php echo $row['name']; ?></td>
		<td width="auto" class="text2"><?php echo $row['address']; ?></td>
		<td width="auto" class="text2"><?php echo $row['contact']; ?></td>
        <td width="auto" class="text2"><?php echo $row['username']; ?></td>
        <td width="auto" class="text2"><?php echo $row['password']; ?></td>
	</tr>
	<?php
		}
	?>
</tbody>
</table>
</div>
</fieldset></code>
</code>
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