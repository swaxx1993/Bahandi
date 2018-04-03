<?php
	session_start();
	if(isset($_SESSION['admin'])){
		
	session_start(); 
	
	session_destroy();
	session_write_close();
	header('location:index.php');
}
else
	header('location:index.php');
?>
