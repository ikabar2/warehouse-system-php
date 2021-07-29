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
	</head>
	
	<script src="./nav.js"></script>
	
	<body>
		<h1><?php echo "Hello  ".$userName.", you are logged in."?><h1>
		<h2><?php echo $_SESSION["MESSAGE"]; ?>
	</body>

	<form method="post">
		<input type="submit" name="logout" id="logout" value="logout" />
	</form>
	<?php

	function logout()
	{
		unset($_SESSION['USERNAME']);
		header('Location:./Login_Page.html');
	}

	if(array_key_exists('logout',$_POST)){
		logout();
	}
	
	?>
</html>