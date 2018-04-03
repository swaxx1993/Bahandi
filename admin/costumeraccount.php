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
 <div class="link1"><a href="order.php"><font color="#666666">Customer Order Management</font></a><br></div>
  <div class="link1" id="current"><a href="costumeraccount.php"><font color="#666666">Costumer Information</font></a><br></div>
    <div class="link1"><a href="employee_report.php"><font color="#666666">Reports</font></a><br></div>
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
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Customer Account Records:</font></legend> 
<div style="width:800px;height:auto;overflow:auto;">
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
		$result = $db->prepare("SELECT * FROM register ORDER by id DESC");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td width="auto" class="text2"><?php echo $row['name']; ?></td>
		<td width="auto" class="text2"><?php echo $row['address']; ?></td>
		<td width="auto" class="text2"><?php echo $row['contact']; ?></td>
        <td width="auto" class="text2"><?php echo $row['username']; ?></td>
        <td width="auto" class="text2"><?php echo $row['password']; ?></td>
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
    }else
        header('location:index.php');
?>