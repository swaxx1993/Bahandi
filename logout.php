<?php 
if(isset($_COOKIE['user'])){
	session_start(); 
	setcookie ("name", "", time() - 3600*12);
	setcookie ("address", "", time() - 3600*12);
	setcookie ("contact", "", time() - 3600*12);
	setcookie ("user", "", time() - 3600*12);
	setcookie("id","",time()- 3600*12);

	
	session_destroy();
	session_write_close();
	header('location:index.php');
}
else
	header('location:index.php');
?>
<?php
	session_start();
	if(isset($_SESSION['public'])){
		
	session_start(); 
	
	session_destroy();
	session_write_close();
	header('location:index.php');
}
else
	header('location:index.php');
?>