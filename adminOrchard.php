<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link>
</head>
<body>
    <center><h1>Orchard</h1></center>
	
	<div class = "container my-5">
        <h2>List of orchard</h2>
		<a class="btn btn-primary" href="/tmf2034/project/adminAddOrchard.php" role="button">Add - New Orchard</a>
        <br>
		<table class="table">
			<thead>
				<tr>
					<th>Orchard ID</th>
					<th>Orchard Address</th>
					<th>Orchard Location</th>
					<th>User ID</th>
					
				<tr>
			</thead>
			<tbody>
				<?php
					$servername = "localhost";
					$username = "root";
					$password = "";
					$dbname = "tmf2034_Group4_Project";
					
					//Create connection
					$conn = new mysqli($servername, $username, $password, $dbname);
					
					//Check connection
					if($conn->connect_error)
					{			
						die("connection failed: ". $conn->connect_error);
					}
					
					//read all row from database table orchard
					$sqlOrchard= "SELECT * FROM orchard";
					$result = $conn->query($sqlOrchard);
					
					if(!$result){
						die("Invalid query: " . $conn->error);
					}
					
					//read data of each row
					while($row = $result->fetch_assoc())
					{
						echo "
						<tr>
							<td>$row[orchardID]</td>
							<td>$row[orchard_add]</td>
							<td>$row[orchard_location]</td>
							<td>$row[userID]</td>
							
							<td>
								<a class='btn btn-primary btn-sm' href='/tmf2034/project/adminUpdateOrchard.php?orchardID=$row[orchardID]'>Update</a>
								<a class='btn btn-primary btn-sm' href='/tmf2034/project/adminDeleteOrchard.php?orchardID=$row[orchardID]'>Delete</a>
							</td>	
						</tr>
						";
					}
				?>				
				
			</tbody>

</body>
</html>
