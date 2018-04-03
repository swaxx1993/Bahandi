<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<?php
require "connection.php";
{

		  $id= $_GET['id'];
  		  $result=mysql_query("SELECT * FROM adminproduct WHERE id='$id'");
		  $rec= mysql_fetch_array($result);
		  $sname=$rec['sname'];
		  $status=$rec['status'];
		  $category=$rec['category'];
		  $pname=$rec['pname'];
		    $detail=$rec['detail'];
			  $price=$rec['price'];
			    $quantity=$rec['total'];
				  $date=$rec['date'];
				    $image=$rec['image'];
					$total=$rec['total'];
					
		  
			include('connection.php');
			  $sql="INSERT INTO recycle_adminproduct (sid,sname,status,category,pname,detail,price,quantity,total,date,image) VALUES ('$sid','$sname','$status','$category','$pname','$detail','$price','$quantity','$total','$date','$image')";
			  $result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
				
	

	$query="DELETE from adminproduct where id='".$id."'";
	
	$id=$_GET['id'];
	$result=mysql_query($query);
	echo "<script>alert('Record succesfully deleted!')</script>
	<meta http-equiv='refresh' content='0; url=product.php'>";
}
?>
<?php 
    }else
        header('location:index.php');
?>