<?php
	
	session_start();
	if(isset($_SESSION['public']))
{ 
$costumerid=$_SESSION['id2'];
$name=$_SESSION['name2'];
$address=$_SESSION['address2'];
$contact=$_SESSION['contact2'];		

if (isset($_POST['submit'])){ 
		  include('connection.php');
		  
		  $srp=$_POST['price'];
		  $pname=$_POST['pname'];
		  $detail=$_POST['detail'];
		  $category=$_POST['category'];
		  $product_id=$_POST['product_id'];
		  $quantity=$_POST['quantity'];
		  $item=$_POST['item'];
		   $total=$item * $srp;
  		  $result=mysql_query("SELECT * FROM adminproduct WHERE id='$id'");
					
					$date = date('Y-m-d H:i:s');
					
		if($_POST['quantity'] < $_POST['item']){
			echo "<script type='text/javascript'>alert('Quantity not allowed..');location='native.php';</script>";
		}else
		{
			include('connection.php');
			  $sql="INSERT INTO cart (cartid,prod_id,costumerid,name,address,contact,category,pname,detail,srp,quantity,total,date) VALUES ('$cartid','$product_id','$costumerid','$name','$address','$contact','$category','$pname','$detail','$srp','$item','$total','$date')";
			  $result=mysql_query($sql, $connect) or die('System Error: ' . mysql_error());
			
			echo "<script type='text/javascript'>alert('Item added to cart');location='native.php';</script>";
			  include('connection.php');
			  mysql_close($connect); 
}
		  	  
}


}
?>