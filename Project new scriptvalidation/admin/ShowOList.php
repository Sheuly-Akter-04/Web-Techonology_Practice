<!DOCTYPE html>
<html>
<head>
	<title>Public Home</title>
</head>
<body>



	<table border="1" align="center" width="790px">
		<tr>
			<td colspan="2">
             <center><img src="../O.jpg" height="100px" width="150px">
<table  align="right"  ><br> This is an Order List</center>
	<tr>
		

</td>
</tr>
	</table>
</td>
</tr>
			</td>
		</tr>

		<tr>
			<td width="35%">
				<label><b><center>Menubar</center></b></label>
<hr>
				<table>	
				<tr>
					<td>
				<ul>
					<ol>
					<li><a href="AdminDashboard.php">Dashboard</a></li>
	<li><a href="UserList.php">User List</a></li>
	<li><a href="OrderList.php">Order List</a></li>
	<li><a href="SupplierList.php">Supplier List</a></li>
	<li><a href="DeliveryTeam.php">Delivery Team</a></li>
	<li><a href="logout.php">LogOut</a></li>
</ol>
</ul>
</td>
</table>
			<td>
				<?php
	
	include('header.php');

	$data = file_get_contents('../model/odata.json');
	
	$mydata = json_decode($data,true);

?>

	<br>
		
		<center>
			<table border="1">
		<tr>
			<td>ID:</td>
			<td>Food Code:</td>
			<td>Food Item:</td>
			<td>Price:</td>
			<td>VAT%:</td>
			<td>ACTION</td>
		</tr>
		<tr>
		<?php   $c=1;
			foreach ($mydata as $key => $value) {
				
				echo "<tr>";
				echo"<td>";
				echo $c;

				
				echo"</td>";
				foreach ($value as $k => $v) {
					
					
					if ($k!="password" ) {
						echo "<td>$v</td>"; 
						
					}else{ }
					
					
			
				} 	echo"<td>";
				echo" <a href=edit.php> ";
				echo" EDIT" ; echo"</a> ";
				
				echo" <a href=delete.html> ";
				echo"|";
				echo"DELETE";
				echo"</a>";
				

				
				echo"</td>";
			
				echo" </tr>"; $c=$c+1;
			}



		
		
		 
		  ?>
		</table>
		</center>
</td>
         <tr>
			<td colspan="2" align="center" height="30px">
				Copyright@2021
			</td>
		</tr>
	</table>
</body>
</html>