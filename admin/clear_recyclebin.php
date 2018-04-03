<?php
	require "connection.php";
	$query="DELETE FROM recycle_adminproduct";
	$result=mysql_query($query);
	echo "<script>alert('all records are deleted!')</script>
	<meta http-equiv='refresh' content='0; url=recycle.php'>";

?>