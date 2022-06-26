<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Orchards | Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/orchard.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link> -->
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
	<h2>List of Orchards</h2>
</div>

	<div class="content">
		<div class="addOrchard">
			<center><a href="adminAddOrchard.php"><button>Add - New Orchard</button></a></center>
		</div>

		<center>
		<table>
			<thead>
				<tr>
					<th>Orchard ID</th>
					<th>Orchard Address</th>
					<th>Orchard Location</th>
					<th>User ID</th>
					<th>Action</th>				
				<tr>
			</thead>
		</center>
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
								<a class='btn btn-primary btn-sm' href='adminUpdateOrchard.php?orchardID=$row[orchardID]'>Update</a>
								<a class='btn btn-primary btn-sm' href='adminDeleteOrchard.php?orchardID=$row[orchardID]'>Delete</a>
							</td>
						</tr>
						";
					}
				?>				
				
			</tbody>
		</table>
				</div>
</body>
</html>
