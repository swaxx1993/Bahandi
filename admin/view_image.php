<?php
session_start();
if(isset($_SESSION['admin'])){
?>



  <?php
	include('connect.php');
	$sid=$_GET['sid'];
	$result = $db->prepare("SELECT * FROM supplierproduct WHERE sid= :userid");
	$result->bindParam(':userid', $sid);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

	    <td align="left"><img src="<?php echo $row['image']; ?>" "width="500" height="500" alt="Image path Invalid"  /></td>	
	 

	
	<?php
		}
	?>
<?php 
    }else
        header('location:index.php');
?>
<?php
session_start();
if(isset($_SESSION['admin'])){
?>



  <?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM adminproduct WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>

	    <td align="left"><img src="<?php echo $row['image']; ?>" "width="500" height="500" alt="Image path Invalid"  /></td>	
	 

	
	<?php
		}
	?>
<?php 
    }else
        header('location:index.php');
?>