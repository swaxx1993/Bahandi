<?php
session_start();
if(isset($_SESSION['admin'])){

?>

<?php
require "connection.php";
$sid=$_GET['sid'];
{
	$query="DELETE from supplierproduct where sid='".$sid."'";
	$result=mysql_query($query);
	echo "<script>alert('Record succesfully deleted!')</script>
	<meta http-equiv='refresh' content='0; url=supplierproductmanagement.php'>";
}
?>
<?php 
    }else
        header('location:index.php');
?>

