<?php
			
	 if (isset($_POST['confirm'])){ 

		  include('connection.php');
		  $orderid=$rec['orderid'];
		  $id=$_POST['id'];
  		  $result=mysql_query("SELECT * FROM orders WHERE orderid='$orderid'");
		  $rec = mysql_fetch_array($result);
		   $product_id=$_POST['prod_id'];
		  $costumerid=$_POST['costumerid'];
		  $pname=$_POST['pname'];
		  $category=$_POST['category'];
		  $detail=$_POST['detail'];
		  $name=$_POST['name'];
		  $address=$_POST['address'];
		  $contact=$_POST['contactno'];
		  $srp=$_POST['srp'];
		  $quantity=$_POST['quantity'];
		  $date = date('Y-m-d H:i:s');
		  $total=$srp * $quantity;
	
			  $sql="INSERT INTO confirm_orders (confirm_orderid,costumerid,name,address,contact,category,pname,detail,srp,quantity,total,date) VALUES ('$confirm_orderid','$costumerid','$name','$address','$contact','$category','$pname','$detail','$srp','$quantity','$total','$date')";
			  $result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
	
			 include('connection.php');
			$result=mysql_query("SELECT * FROM adminproduct where id= '$product_id'");
		 	$rec = mysql_fetch_array($result);
			$quantityadmin=$rec['quantity'];
		 	$current_quantity=$_POST['quantity'];
			$less=$quantityadmin - $current_quantity;
			
			$sql2="Update adminproduct SET quantity = $less where id= '$product_id'";
			$result=mysql_query($sql2, $connect) or die('System Error: ' . mysql_error());
			
			
			$orderid=$_POST['orderid'];
			$query="DELETE from orders where orderid='".$orderid."'";
			   $result=mysql_query($query);
			echo "<script type='text/javascript'>alert('Item Confirmed');location='order.php';</script>";
			  include('connection.php');
			  mysql_close($connect); 

	 }
			  
?>