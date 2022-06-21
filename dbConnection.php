<?php		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tmf2034_Group4_Project";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if(!$conn)
	{
		die("connection failed: ". mysqli_error($conn));
	}
	
?>