</table>
<br><br><br>
<font color="#666666" size="5" face="Tahoma, Geneva, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bahandi Online Ordering System<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sales Report</font>
<br>
<br>
<table cellspacing="0" cellpadding="0"  bordercolor="#CCCCCC" width="980">
<thead>
	<tr>
      
         <th class="text1"> Costumer ID </th>
         <th class="text1">Product name </th>
         <th class="text1"> Price </th>
         <th class="text1"> Quantity </th>
         <th class="text1"> Date </th>
        
        
	</tr>
</thead>

<?php

	error_reporting(E_ALL ^ E_NOTICE);
require 'connection.php'; 

$query = "select * from confirm_orders ORDER by confirm_orderid DESC";
$result=mysql_query($query);
$countRows=mysql_num_rows($result);
if ($countRows  > 0)
{
	$total = 0;
	while ($row=mysql_fetch_array($result))
		
	{	
			$total += $row['srp'];
			$quantity=$row['quantity'];
			$detail=$row['detail'];
			$pname=$row['pname'];
			$srp=$row['srp'];
			$confirm_orderid=$row['confirm_orderid'];
			$productid=$row['productid'];
			$costumerid=$row['costumerid'];
			$date=$row['date'];
			
			
		
			echo "<tr align='center' style='font-family:Tahoma, Geneva, sans-serif' size='3'>
			<td class='table'><center>$costumerid</center></td>
			<td class='table'><center>$pname</center></td>
			<td class='table'><center>Php&nbsp;$srp.00</center></td>
			<td class='table'><center>$quantity</center></td>
			<td class='table'><center>$date</center></td>
					
		
			
			</tr>";
	}
}
else
{
	echo "<tr><td>no sale report</td></tr>";
}

?>


</code>
</code>

</table><br><br>
<font face="Tahoma, Geneva, sans-serif" color="#666666">    
<label>Total amount of items:</label>&nbsp;<label><U><b>Php&nbsp;<?php echo $total ?>.00</b></u></label>&nbsp;&nbsp;&nbsp;<label>No. of ordered items:</label>&nbsp;<label><b><?php echo $countRows ?></b></label>
</font>