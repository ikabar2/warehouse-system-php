<?php

	session_start();
	require('db.php');
	$id=$_REQUEST['id'];
	$query = "DELETE FROM clients WHERE id=$id"; 
	$result = mysqli_query($con,$query) or die ( mysqli_error());
	$_SESSION['MESSAGE'] = "Deleted client with client id=".$id." from clients.";
	header("Location: ./view_clients.php"); 
?>