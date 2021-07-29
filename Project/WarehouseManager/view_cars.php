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
		<title>View Cars</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<script src="./nav.js"></script>
	
	<body>

		<div class="form">



		<h2>View Cars</h2>
		<table width="100%" border="1" style="border-collapse:collapse;">
		<thead>
		<tr><th><strong>Number</strong></th><th><strong>Make</strong></th><th><strong>Model</strong></th><th><strong>Year</strong></th><th><strong>VIN</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
		</thead>
		<tbody>
			<?php
			$count=1;
			$sel_query="Select * from cars ORDER BY id desc;";
			$result = mysqli_query($con,$sel_query);
			while($row = mysqli_fetch_assoc($result)) { ?>
			<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["make"]; ?></td><td align="center"><?php echo $row["model"]; ?></td><td align="center"><?php echo $row["year"]; ?></td><td align="center"><?php echo $row["vin"]; ?></td><td align="center"><a href="./edit_cars.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center"><a href="./delete_cars.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
			<?php $count++; } ?>
		</tbody>
		</table>

		</div>
	</body>
</html>
