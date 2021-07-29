<?php

    header("Content-Type: text/plain");
	
	//start session
    session_start();
	
	$_SESSION["MESSAGE"] = "";
	
    $sNAME = $_POST["txtName"];
	$sPASS = $_POST["txtPassword"];
    
    
    //database information
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "warehousedb";

    //create the SQL query string
    $sql = "Select * from users where name='".$sNAME."' AND password='".$sPASS."'";
              

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while ($row = $result->fetch_assoc()) {
			$_SESSION["USERNAME"] = $row['name'];
        }
		if(isset($_SESSION["USERNAME"]))
		{
			$_SESSION["MESSAGE"] = "Welcome";
			header('Location:./Welcome.php');
		}
    } else {
        echo "Invalid Credentials";
    }
    $conn->close();
?>

