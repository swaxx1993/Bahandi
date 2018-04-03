

<?php
require "connection.php";
$orderid=$_GET['orderid'];
{
	$query="DELETE from orders where orderid='".$orderid."'";
	$result=mysql_query($query);
	echo "<script>alert('Order Rejected!')</script>
	<meta http-equiv='refresh' content='0; url=order.php'>";
}
?>
