<?php
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
<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<title>Create Car object</title>
		<script type="text/javascript">
			function saveResult(sMessage) {
				var divStatus = document.getElementById("divStatus");
				divStatus.innerHTML = "Request completed: " + sMessage;
			}
		</script>
	</head>

	<script src="./nav.js"></script>

	<body>
		<form method="post" action="save_car.php" target="hiddenFrame">
			<h1>Enter Car information to be added:</h1>
			Car Make : <input type="text" name="txtMake" value="" /><br />
			Model: <input type="text" name="txtModel" value="" /><br />
			Year: <input type="number" name="txtYear" value="" /><br />
			Color: <input type="text" name="txtColor" value="" /><br />
			Vin: <input type="text" name="txtVin" value="" /><br />

			<input type="submit" value="Save Car Info" />
		</form>
		<div id="divStatus"></div>
	</body>
</html>
