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
		<form method="post" action="save_client.php" target="hiddenFrame">
			<h1>Enter Client info:</h1>
			Name : <input type="text" name="txtName" value="" /><br />
			Phone: <input type="text" name="txtPhone" value="" /><br />
			Address: <input type="text" name="txtAddress" value="" /><br />

			<input type="submit" value="Save Client Info" />
		</form>
		<div id="divStatus"></div>
	</body>
</html>
