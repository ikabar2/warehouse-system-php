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
		<title>search cars</title>
			<link rel="stylesheet" href="style.css">
		<script src="./nav.js"></script>
	</head>
	<body>
		<form action="" method="post">
			<input type="text" name="search">
			<input type="submit" name="submit" value="Search">
		</form>
		<br>
	</body>

	<table width="100%" border="1" style="border-collapse:collapse;">
	<thead>
	<tr><th><strong>Number</strong></th><th><strong>Make</strong></th><th><strong>Model</strong></th><th><strong>Year</strong></th><th><strong>VIN</strong></th><th><strong>Edit</strong></th><th><strong>Delete</strong></th></tr>
	</thead>

	<?php

	if (isset($_POST['submit'])) {
		$count = 1;
		$searchValue = $_POST['search'];
		if ($con->connect_error) {
			echo "connection Failed: " . $con->connect_error;
		} else {
			$sql = "SELECT * FROM cars WHERE vin LIKE '%$searchValue%' OR make LIKE '%$searchValue%' OR year LIKE '%$searchValue%' OR model LIKE '%$searchValue%'";

			$result = $con->query($sql);
			while($row = mysqli_fetch_assoc($result)) { ?>
				<tr><td align="center"><?php echo $count; ?></td><td align="center"><?php echo $row["make"]; ?></td><td align="center"><?php echo $row["model"]; ?></td><td align="center"><?php echo $row["year"]; ?></td><td align="center"><?php echo $row["vin"]; ?></td><td align="center"><a href="./edit_cars.php?id=<?php echo $row["id"]; ?>">Edit</a></td><td align="center"><a href="./delete_cars.php?id=<?php echo $row["id"]; ?>">Delete</a></td></tr>
				<?php $count++; }
		}   
	}

	?>

</html>