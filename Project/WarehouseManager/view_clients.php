<?php
require('db.php');

//start sesion
     session_start();
	
	if(!isset($_SESSION['USERNAME']))
	{
		header('Location:./Login_Page.html');
		exit();
	}
	if(!isset($_SESSION['MESSAGE']))
	{
		$_SESSION['MESSAGE'] = "";
	}
	$userName = $_SESSION['USERNAME'];


?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Clients</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<script src="./nav.js"></script>
	
	<body>

		<div class="form">



		<h2>View Clients</h2>
		<table width="100%" border="1" style="border-collapse:collapse;">
		<thead>
		<tr><th><strong>Number</strong></th><th><strong>Name</strong></th><th><strong>Address</strong></th><th><strong>Phone</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
		</thead>
		<tbody>
			<?php
			$count=1;
			$sel_query="Select * from clients ORDER BY id desc;";
			$result = mysqli_query($con,$sel_query);
			while($row = mysqli_fetch_assoc($result)) { ?>
			<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["name"]; ?></td><td align="center"><?php echo $row["address"]; ?></td><td align="center"><?php echo $row["phone"]; ?></td><td align="center"><a href="./edit_clients.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center"><a href="./delete_clients.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
			<?php $count++; } ?>
		</tbody>
		</table>

		</div>
	</body>
</html>