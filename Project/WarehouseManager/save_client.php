<?php
	
	//start session
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

	

    //get information
    $sName = $_POST["txtName"];
    $sPhone = $_POST["txtPhone"];
    $sAddress = $_POST["txtAddress"];
    
    //create the SQL query string
    $sql = "Insert into clients(name,phone,address) ".
              " values ('$sName','$sPhone','$sAddress')";

    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "warehousedb";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
  
    $result = $conn->query($sql);
	
	//we inserted with no error
    if ($result === TRUE) 
	{
        $last_id = $conn->insert_id;
        echo "Insert successfully. Last inserted ID is: " . $last_id;
		$_SESSION['MESSAGE'] = "Inserted " . $sName. "  with phone number " . $sPhone. " located at "  . $sAddress. " "  . " successfully.";
		header('Location:./Welcome.php');
    } 
	//error connection to db
	else 
	{
		echo "Error creating database: " . $conn->error;
		$_SESSION['MESSAGE'] = "Could not insert into Database, please contact an admin for assitance.";
		header('Location:./Welcome.php');
    }
    $conn->close();
?>