<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 900000))
  {
	  if ($_FILES["file"]["error"] > 0)
	    {
		  echo "File Error :  " . $_FILES["file"]["error"] . "<br />";
	    }else {
		  echo "Upload File Name:  " . $_FILES["file"]["name"] . "<br />";	  
		  echo "File Description: ".$_POST['caption']."<br />";
		  
		  if (file_exists("photos/".$_FILES["file"]["name"]))
			{
			   echo "<b>".$_FILES["file"]["name"] . " already exists. </b>";
			}else
			{
			   move_uploaded_file($_FILES["file"]["tmp_name"],"photos/". $_FILES["file"]["name"]);
			   echo "Stored in: " . "photos/" . $_FILES["file"]["name"]."<br />";
			   ?>
			     
			  <?php
		   }
		}
	  }else
	  
?>
<?php
// configuration
include('connect.php');

// new data
$status=$_POST['status'];
	$category=$_POST['category'];
	$pname=$_POST['pname'];
	$detail=$_POST['detail'];
	$srp=$_POST['srp'];
	$quantity=$_POST['quantity'];
	$total = $srp * $quantity;
	$date=$_POST['date'];
	$image="photos/" . $_FILES["file"]["name"];
	
$id = $_POST['id'];
// query
$sql = "UPDATE adminproduct
        SET status=?, category=?, pname=?, detail=?, srp=?, quantity=?,total=?, date=?
		WHERE id=?";
			
$q = $db->prepare($sql);
$q->execute(array($status,$category,$pname,$detail,$srp,$quantity,$total,$date,$id));
header("location: product.php");

?>
<?php
require "connection.php";
$sid=$_POST['sid'];
if($_POST['delete'])
{
	$query="delete from supplierproduct where sid='".$sid."'";
	echo "<script>alert('1 record succesfully deleted')</script><meta http-equiv='refresh' content='0;url=product.php'>";
	$result=mysql_query($query);
}
?>
<?php 
    }else
        header('location:index.php');
?>
