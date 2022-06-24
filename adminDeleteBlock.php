<?php

	if( isset($_GET["BlockID"]))
	{
		$BlockID = $_GET["BlockID"];
		
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
		$sql = "DELETE FROM block WHERE BlockID = $BlockID";
		$conn->query($sql);
		
	}
	
	
header("location: /tmf2034/project/adminBlock.php");
exit;

?>