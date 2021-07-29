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
	$query = "SELECT * from cars where id='".$id."'"; 
	$result = mysqli_query($con, $query) or die ( mysqli_error());
	$row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update Car</title>
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
			$make =$_REQUEST['make'];
			$model =$_REQUEST['model'];
			$year =$_REQUEST['year'];
			$vin =$_REQUEST['vin'];
			$submittedby = $_SESSION["USERNAME"];
			$update="update cars set make='".$make."', model='".$model."', year='".$year."', vin='".$vin."'where id='".$id."'";
			mysqli_query($con, $update) or die(mysqli_error());
			$status = "Record Updated Successfully. </br></br><a href='./view_cars.php'>View Updated Record</a>";
			echo '<p style="color:#FF0000;">'.$status.'</p>';
			}else {
			?>
		<div>
		<form name="form" method="post" action=""> 
			<input type="hidden" name="new" value="1" />
			<input name="id" type="hidden" value="<?php echo $row['id'];?>" />
			<p><input type="text" name="make" placeholder="Enter make" required value="<?php echo $row['make'];?>" /></p>
			<p><input type="text" name="model" placeholder="Enter model" required value="<?php echo $row['model'];?>" /></p>
			<p><input type="text" name="year" placeholder="Enter year" required value="<?php echo $row['year'];?>" /></p>
			<p><input type="text" name="vin" placeholder="Enter vin" required value="<?php echo $row['vin'];?>" /></p>
			<p><input name="submit" type="submit" value="Update" /></p>
		</form>
		<?php } ?>
		</div>
		</div>
	</body>
</html>
