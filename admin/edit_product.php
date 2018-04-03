
<?php
session_start();
if(isset($_SESSION['admin'])){

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Admin Page</title>
<div id = "header">
<div id="user_info">
<?php
if(isset($_SESSION['admin'])){
		$name=$_SESSION['name'];
		$address=$_SESSION['address'];
		$contact=$_SESSION['contact'];
}
?>	
<font face="Tahoma, Geneva, sans-serif" size="5" color="#CCC"><center><b>Profile Information</b></center></font>
<Font face="Tahoma, Geneva, sans-serif" color="#FFF">
<table cellpadding="3" cellspacing="3">
<tr>
<td>Fullname:</td>
<td><?php echo $name ?></td>
</tr>
<tr>
<td>Address:</td>
<td><?php echo $address ?></td>
</tr>
<tr>
<td>Contact no:</td>
<td><?php echo $contact ?></td>
</tr>
<tr>
<td>Username:</td>
<td><?php echo $_SESSION['user'];?></td>
</tr>
<tr>
<td>Access type:</td>
<td><?php echo $_SESSION['type'];?></td>
</tr>
</table>
</p>
</font>	
<br>
</div>
<a href="index.php"><img src="image/logo.png" height="350" width="350" class="logo"></a>
</div>
</head>
<body>
<div id="leftnav">
 <div class="link1" id="current"><a href="#"><font color="#666666">Product Management</font></a><br></div>
 <div class="link1"><a href="admin_order.php"><font color="#666666">Order Management</font></a><br></div>
  <div class="link1"><a href="supplieraccount.php"><font color="#666666">Account Management</font></a><br></div>
<div class="link1"><a href="admin_sale.php"><font color="#666666">Report Management</font></a><br></div>
    <div class="link1"><a href="recycle.php"><font color="#666666">Recycle Bin</font></a><br></div>
    <div class="link1"><a href="logout.php"><font color="#666666">Log-out</font></a><br></div>
    </div>
    
</body>
<br><br>
<div id="body">
<div id="table">

<div id="uploadphoto"></div>
<script type="text/javascript">
    function validate(){
	 var filevalue=document.getElementById("file").value;
	 var description=document.getElementById("description").value;
	 if(filevalue=="" || filevalue.length<1){
		 alert("Select File.");
		 document.getElementById("file").focus();
		 return false;
	   }
	 if(description=="" || description.length<1){
		 alert("File Description must not be blank.");
		 document.getElementById("description").focus();
		 return false;
	  }
	 
	 return true;	
	}
  </script> 
  <?php
	include('connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM adminproduct WHERE id= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<table align="left" height="auto" width="auto">
<tr>
<td>
<font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Product Information Entry</font>
<form id="form1" method="post" action="editprocess_product.php" enctype="multipart/form-data" onSubmit="return validate()">
<div id="uploadphoto">
 <table align="center" >
	  <tr>
      <td>&nbsp;</td>
	    <td align="left"><img src="<?php echo $row['image']; ?>"width="350" height="300"/></td>	
	  </tr>
	</table>
   <?php
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 900000))
  {
	  if ($_FILES["file"]["error"] > 0)
	    {
		  echo "File Error :  " . $_FILES["file"]["error"] . "<br />";
	    }else {
		  echo "Upload File Name:  " . $_FILES["file"]["name"] . "<br />";	  
		  echo "File Description: ".$_POST['caption']."<br />";
		  
		  if (file_exists("photos/".$_FILES["file"]["name"]))
			{
			   echo "<b>".$_FILES["file"]["name"] . " already exists. </b>";
			}else
			{
			   move_uploaded_file($_FILES["file"]["tmp_name"],"photos/". $_FILES["file"]["name"]);
			   echo "Stored in: " . "photos/" . $_FILES["file"]["name"]."<br />";
			   ?>
			     
			     <img src="photos/<?php echo $_FILES["file"]["name"]; ?>"  width="400" height="300" alt="Image path Invalid" >
			  <?php
		   }
		}
	  }else
	  
?>
</div>
<form  action="editproccess_product.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id']; ?>" />
<br><br><font color="#999999" class="fontstyle">Enter Status:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="status" class="text"><option> <?php echo $row['status']?></option><option>Available</option><option>Coming soon</option></select>
<br><br><font color="#999999" class="fontstyle">Enter Category:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="category" class="text"><option> <?php echo $row['category']?></option><option>Native delicacies<option>Handicraft</option></option></select>
<br><br><font color="#999999" class="fontstyle">Enter Product Name:</font>&nbsp;&nbsp;<input type="text" name="pname" class="text" value="<?php echo $row['pname']?>" required="required"/>
<br><br><font color="#999999" class="fontstyle">Enter Detail:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="detail" class="text" value="<?php echo $row ['detail']; ?>" required="required"/>
<br><br><font color="#999999" class="fontstyle">Original Price:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="srp" class="text" value="<?php echo $row ['price']; ?>" disabled="disabled" required="required"/>
<br><br><font color="#999999" class="fontstyle">Enter SRP:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="srp" class="text" value="<?php echo $row ['srp']; ?>" required="required"/>
<br><br><input type="submit" value="Update" class="button"><input type='button' value='Back' onClick=window.location.href='product.php' class="button">
</b>
</form>
<script src="js/jquery.js"></script>
<script>
$(document).ready(function(){ 
$("text").click(function(){
	$("code").slideToggle(); 
	});
	});

</script>
<br>
<br>
<code>

</code>

</table>
</div>
</div>
<div id="footer"></div>
</html><?php
		}
	?>
	<?php 
    }else
        header('location:index.php');
?>