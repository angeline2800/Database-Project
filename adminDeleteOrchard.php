<?php

	if( isset($_GET["orchardID"]))
	{
		$orchardID = $_GET["orchardID"];
		
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "tmf2034_Group4_Project";
					
		//Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);
	
		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
}
		$sql = "DELETE FROM orchard WHERE orchardID = $orchardID";
		$conn->query($sql);
		
	}
	
	
header("location: /tmf2034/project/adminOrchard.php");
exit;

?>