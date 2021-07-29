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


	$id=$_REQUEST['id'];
	$query = "SELECT * from clients where id='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update clients</title>
		<link rel="stylesheet" href="style.css">
	</head>
	
	<script src="./nav.js"></script>
	
	<body>
		<div class="form">
		<h1>Update Record</h1>
			<?php
			$status = "";
			if(isset($_POST['new']) && $_POST['new']==1)
			{
			$id=$_REQUEST['id'];
			$sName =$_REQUEST['name'];
			$sPhone =$_REQUEST['phone'];
			$sAddress =$_REQUEST['address'];
			$submittedby = $_SESSION["USERNAME"];
			$update="update clients set Name='".$sName."', Phone='".$sPhone."', Address='".$sAddress."'where id='".$id."'";
			mysqli_query($con, $update) or die(mysqli_error());
			$status = "Record Updated Successfully. </br></br><a href='./view_clients.php'>View Updated Record</a>";
			echo '<p style="color:#FF0000;">'.$status.'</p>';
			}else {
			?>
		<div>
		<form name="form" method="post" action=""> 
			<input type="hidden" name="new" value="1" />
			<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
			<p><input type="text" name="name" placeholder="Enter name" required value="<?php echo $row['name'];?>" /></p>
			<p><input type="text" name="phone" placeholder="Enter phone" required value="<?php echo $row['phone'];?>" /></p>
			<p><input type="text" name="address" placeholder="Enter address" required value="<?php echo $row['address'];?>" /></p>
			<p><input name="submit" type="submit" value="Update" /></p>
		</form>
		<?php } ?>
		</div>
		</div>
	</body>
</html>