<?php
	
	session_start();
	if(isset($_SESSION['admin'])){
			
	 
		  include('connection.php');
		  $sid= $_GET['sid'];
  		  $result=mysql_query("SELECT * FROM supplierproduct WHERE sid='$sid'");
		  $rec = mysql_fetch_array($result);
		  $sname=$rec['sname'];
		  $status=$rec['status'];
		  $category=$rec['category'];
		  $pname=$rec['pname'];
		    $detail=$rec['detail'];
			  $price=$rec['price'];
			    $quantity=$rec['quantity'];
				  $date=$rec['date'];
				    $image=$rec['image'];
					$srp = $price * 1.05; 
					$total = $srp * $quantity; 
					
			include('connection.php');
			  $sql="INSERT INTO adminproduct (sname,sid,status,category,pname,detail,price,srp,quantity,total,date,image) VALUES ('$sname','$sid','$status','$category','$pname','$detail','$price','$srp','$quantity','$total','$date','$image')";
			  $result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
			
			include('connection.php');
		  	mysql_query("DELETE FROM supplierproduct WHERE sid='$sid'");
			
	
			echo "<script type='text/javascript'>alert('Sucessfully posted to public pages');location='product.php';</script>";
			  include('connection.php');
			  mysql_close($connect); 
}
		  	  
		
 
		 	  
	
?>