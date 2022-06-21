<?php		
	$servername = "localhost";
	$username = "root";
	$password = "";

	$conn = new mysqli($servername, $username, $password);

	if(!$conn)
	{
		die("connection failed: ". mysqli_error($conn));
	}
	
	$sql = "CREATE DATABASE tmf2034_Group4_Project";
	if (mysqli_query($conn, $sql)) {
		echo "Database created successfully";
	} else {
		echo "Error creating database: " . mysqli_error($conn);
	}

	mysqli_close($conn);
	
?>