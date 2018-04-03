<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<?php
// configuration
include('connect.php');
if(!$_POST['name']| !$_POST['username']| !$_POST['password']| !$_POST['type']){
				   	echo "	<script language='javascript'>
					alert('You did not fill in the required feilds!!!');
					window.location.href='supplieraccount.php';
					</script>";
}else
{		

// new data
$name = $_POST['name'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$username = $_POST['username'];
$password = $_POST['password'];
$type = $_POST['type'];
$id = $_POST['id'];
// query
$sql = "UPDATE adminlogin 
        SET name=?,address=?,contact=?, username=?, password=?, type=?
		WHERE id=?";
$q = $db->prepare($sql);
$q->execute(array($name,$address,$contact,$username,$password,$type,$id));
header("location: supplieraccount.php");

?>
<?php
require "connection.php";
$id=$_POST['id'];
if($_POST['delete'])
{
	
	$query="delete from adminlogin where id='".$id."'";
	$result=mysql_query($query);

	echo "<script>alert('Record succesfully deleted!')</script>
	<meta http-equiv='refresh' content='0; url=supplieraccount.php'>";
}
?>
<?php
}
?>
<?php 
    }else
        header('location:index.php');
?>