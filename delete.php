
<?php
require 'connection.php';
$id=$_GET['cartid'];
mysql_query("DELETE FROM cart WHERE cartid='$id'");
header("location: okdelete.php"); 

?>
