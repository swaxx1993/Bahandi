<?php

require 'connection.php';
	session_start();
		if(isset($_POST['submit'])){
		$user=$_POST['username'];
		$pass=$_POST['password'];
$sel=mysql_query("select * from register where username='.$user.' and password='.$pass.'");
$result=mysql_query($sel);
if(mysql_num_rows($result)!=0)
{
$rec=mysql_fetch_array($result);

$_SESSION['public']="login";
$_SESSION['login']="login";

$date = date ("M d Y");
session_start();
$_SESSION['verify']=1;
echo "<script>alert('Welcome! Today is $date');
window.location.href='costumer.php';
</script>";
}
else
{
session_start();
$_SESSION['verify']=0;
echo "<script>alert('The Username or password is incorrect, please try again.');
</script><meta http-equiv='refresh' content='0;url=index.php'>";
}

?>


<?php
	}else
			header('location:index.php');
?>