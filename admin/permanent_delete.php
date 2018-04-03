<?php
session_start();
if(isset($_SESSION['admin'])){

?>

<?php
require "connection.php";
$id=$_GET['id'];
{
	$query="DELETE from recycle_adminproduct where id='".$id."'";
	$result=mysql_query($query);
	echo "<script>alert('Record permanently deleted!')</script>
	<meta http-equiv='refresh' content='0; url=recycle.php'>";
}
?>
<?php 
    }else
        header('location:index.php');
?>