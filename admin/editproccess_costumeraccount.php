<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<?php
// configuration
include('connect.php');
if(!$_POST['name']| !$_POST['address']| !$_POST['cellphone']| !$_POST['username']| !$_POST['password']){
				   	echo "	<script language='javascript'>
					alert('You did not fill in the required feilds!!!');
					window.location.href='costumeraccount.php';
					</script>";
}else
{		

// new data
$name = $_POST['name'];
$address = $_POST['address'];
$cellphone = $_POST['cellphone'];
$username = $_POST['username'];
$password = $_POST['password'];
$id = $_POST['id'];
// query
$sql = "UPDATE customeraccount 
        SET name=?, address=?, cellphone=?, username=?, password=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($name, $address, $cellphone, $username, $password, $id));
header("location: costumeraccount.php");

?>
<?php
require "connection.php";
$id=$_POST['id'];
if($_POST['delete'])
{
	$query="delete from customeraccount where id='".$id."'";
	$result=mysql_query($query);
	echo "<script>alert('Record succesfully deleted!')</script>
	<meta http-equiv='refresh' content='0; url=costumeraccount.php'>";
}
?>
<?php
}
?>
<?php 
    }else
        header('location:index.php');
?>