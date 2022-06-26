<?php
	include "dbConnection.php";
	
	$orchard_add = "";
	$orchard_location= "";
	$userID= "";
	
	$errorMessage="";
	$sucessMessage="";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$orchard_add = $_POST["orchard_add"];
		$orchard_location = $_POST["orchard_location"];
		$userID = $_POST["userID"];
		
		do {
			if ( empty($orchard_add) || empty($orchard_location) || empty($userID) )
			{
				$errorMessage = "All the fields are required";
				break;
			}
			
			// add new orchard to database
			$sql = "INSERT INTO orchard (orchard_add, orchard_location, userID)"
			. "VALUES ('$orchard_add', '$orchard_location', '$userID')";
			$result = $conn->query($sql);
			
			if (!$result) {
				$errorMessage = "Invalid query: " . $conn->error;
				break;
			}
			
			$orchard_add = "";
			$orchard_location= "";
			$userID= "";
			
			$sucessMessage = "Orchard added successfully!";
			
			header("location: adminOrchard.php ");
			exit;
			
		}while(false);
	}
	

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Orchard | Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/block.css">
	
</head>
<body>

<header class="header-border">
    <div class="header-content">
	
      <h1 class="slogan"><span><img src="photo/headerLogo.png" alt="System - Logo" height="90"></span>TREE PROFILING MANAGEMENT SYSTEM</h1>
        <div class="slogan2">
         <b> <p>YOUR GOOD HELPER IN LIFE</p></b>
        </div>
    </div>
  </header>

  <div class="header">
	<h2>Add A New Orchard</h2>
</div>

<div class="content">
<center><h3>Complete The Form Below To Add A New Orchard.</h3></center>
	<div class="addNewOrchard">
			<form action="" method="post">
			<div class="insertOrchard">
				<label>Orchard Address</label>
				<input type = "text" name="orchard_add" placeholder="Enter address">
				<label>Orchard Location</label>
				<input type = "text" name="orchard_location" placeholder="Enter orchard location"><br/>
				<label>User ID</label>
				<input type = "text" name="userID" placeholder="Enter user ID">

				<input type="submit"class="addSubmit" name="insert" value="Add" />
				<a href="adminOrchard.php"><button>Back to Orchard List</button></a>
			</div>
			</form>
		</div>	
	</div>		
</body>
</html>
