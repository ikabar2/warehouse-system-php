<?php

	session_start();
	require('db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM cars WHERE id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	$_SESSION['MESSAGE'] = "Deleted car with car id=".$id." from cars.";
	header("Location: ./view_cars.php"); 
?>