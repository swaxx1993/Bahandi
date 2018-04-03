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
	$date=$_POST['date'];
	$image="photos/" . $_FILES["file"]["name"];
	
$id = $_POST['id'];
// query
$sql = "UPDATE adminproduct
        SET status=?, category=?, pname=?, detail=?, srp=?, quantity=?, date=?
		WHERE id=?";
			
$q = $db->prepare($sql);
$q->execute(array($status,$category,$pname,$detail,$srp,$quantity,$date,$id));
header("location: supplier_monitor.php");

?>
<?php 
    }else
        header('location:index.php');
?>
