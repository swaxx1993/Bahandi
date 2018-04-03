<?php
session_start();
if(isset($_SESSION['admin'])){

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css">
<title>Supplier Page</title>
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
<a href="index.php"><img src="image/logo.png" height="300" width="350" class="logo"></a>
</div>
</head>
<body>
<div id="leftnav">
  <div class="link1" id="current"><a href="#"><font color="#666666">Products Management</font></a><br></div>
 <div class="link1"><a href="supplier_monitor.php"><font color="#666666">Sales Monitoring</font></a><br></div>
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
	$sid=$_GET['sid'];
	$result = $db->prepare("SELECT * FROM supplierproduct WHERE sid= :userid");
	$result->bindParam(':userid', $sid);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<table align="left" height="auto" width="auto">
<tr>
<td>
<fieldset>
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Product Information Entry</font></legend>
<form id="form1" method="post" action="editprocess_supplierproductmanagement.php" enctype="multipart/form-data" onSubmit="return validate()">
<div id="uploadphoto">
 <table align="center" >
	  <tr>
	    <td><label for="file" class="text2">File:</label></td>
		<td><input type="file" name="file" id="file" / class="text2" required="required"></td>
	  </tr>
	  <tr>
      <td>&nbsp;</td>
	    <td align="left"><img src="<?php echo $row['image']; ?>" height="350" width="350"/></td>	
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
<form  action="editproccess_supplieraccount.php" method="post">
<input type="hidden" name="sid" value="<?php echo $row['sid']; ?>" />
<br><br><font color="#999999" class="fontstyle">Enter Status:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="status" class="text"><option> <?php echo $row['status']?></option><option>Available</option><option>Coming soon</option></select>
<br><br><font color="#999999" class="fontstyle">Enter Category:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="category" class="text"><option> <?php echo $row['category']?></option><option>Native delicacies<option>Handicraft</option></option></select>
<br><br><font color="#999999" class="fontstyle">Enter Product Name:</font>&nbsp;&nbsp;<input type="text" name="pname" class="text" value="<?php echo $row['pname']?>" required="required"/>
<br><br><font color="#999999" class="fontstyle">Enter Detail:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="detail" class="text" value="<?php echo $row ['detail']; ?>" required="required"/>
<br><br><font color="#999999" class="fontstyle">Enter Price:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="price" class="text" value="<?php echo $row ['price']; ?>" required="required"/>
<br><br><font color="#999999" class="fontstyle">Enter Quantity:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="quantity" class="text" value="<?php echo $row ['quantity']; ?>" required="required"/>
<br><br><font color="#999999" class="fontstyle">Enter Date release:</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="date" class="text" value="<?php echo $row ['date']; ?>" required="required"/><br><br><input type="submit" value="Update" class="button"><input type='button' value='Back' onClick=window.location.href='supplierproductmanagement.php' class="button">
<text class="button">Hide/Show all database records</text></b>
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
<fieldset>
<legend><font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">Database records:</font></legend> 
<div style="width:800px;height:300px;overflow:auto;">
<table cellspacing="0" cellpadding="5" border="1" bordercolor="#CCCCCC" width="800">
<thead>
	<tr>
    	<th class="text1"> Status</th>
        <th class="text1"> Category</th>
		<th class="text1"> Product Name</th>
		<th class="text1"> Detail </th>
		<th class="text1"> Price </th>
        <th class="text1"> Quantity </th>
         <th class="text1"> Total </th>
         <th class="text1"> Date to be release </th>
         <th class="text1"> Image</th>

        
	</tr>
</thead>
<tbody>
	<?php
		include('connect.php');
		$image="photos/" . $_FILES["file"]["name"];
		$result = $db->prepare("SELECT * FROM supplierproduct");
		$result->execute();
		for($i=0; $row = $result->fetch(); $i++){
	?>
	<tr class="record">
		<td width="auto" class="text2"><?php echo  $row['status']; ?></td>
		<td width="auto" class="text2"><?php echo $row['category']; ?></td>
		<td width="auto" class="text2"><?php echo $row['pname']; ?></td>
        <td width="auto" class="text2"><?php echo $row['detail']; ?></td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['price']; ?>.00</td>
        <td width="auto" class="text2"><?php echo $row['quantity']; ?></td>
        <td width="auto" class="text2">Php&nbsp;<?php echo $row['total']; ?>.00</td>
        <td width="auto" class="text2"><?php echo $row['date']; ?></td>
        <td width="auto" class="text2"><img src="<?php echo $row['image']; ?>" "width="70" height="70" alt="Image path Invalid"  /></td>
	<?php
		}
	?>
</tbody>
</table>
</div>
</fieldset></code>
</fieldset>
</td>
</tr>
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