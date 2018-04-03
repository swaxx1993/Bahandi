<?php
	
	session_start();
	if(isset($_SESSION['admin'])){
			
	 
		  include('connection.php');
		  $id= $_GET['id'];
  		  $result=mysql_query("SELECT * FROM recycle_adminproduct WHERE id='$id'");
		  $rec = mysql_fetch_array($result);
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
			  $sql="INSERT INTO adminproduct (sname,sid,status,category,pname,detail,price,quantity,total,date,image) VALUES ('$sname','$sid','$status','$category','$pname','$detail','$price','$quantity','$total','$date','$image')";
			  $result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
	
			echo "<script type='text/javascript'>alert('Sucessfully retrieved the record in public pages');location='recycle.php';</script>";
			  $query="DELETE from recycle_adminproduct where id='".$id."'";
	
	$id=$_GET['id'];
	$result=mysql_query($query);
			  mysql_close($connect); 

	
?>
  
	<?php 
    }else
        header('location:index.php');
?>