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
    <center><h1>Block</h1></center>
	
	<div class = "container my-5">
        <h2>List of Block</h2>
		<a class="btn btn-primary" href="/tmf2034/project/adminAddBlock.php" role="button">Add - New Block</a>
        <br>
		<table class="table">
			<thead>
				<tr>
					<th>Block ID</th>
					<th>Price</th>
					<th>Orchard ID</th>
					<th>Action</th>
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
					$sqlBlock= "SELECT * FROM block";
					$result = $conn->query($sqlBlock);
					
					if(!$result){
						die("Invalid query: " . $conn->error);
					}
					
					//read data of each row
					while($row = $result->fetch_assoc())
					{
						echo "
						<tr>
							<td>$row[BlockID]</td>
							<td>$row[Price]</td>
							<td>$row[orchardID]</td>
							<td>
								<a class='btn btn-primary btn-sm' href='/tmf2034/project/adminUpdateBlock.php?BlockID=$row[BlockID]'>Update</a>
								<a class='btn btn-primary btn-sm' href='/tmf2034/project/adminDeleteBlock.php?BlockID=$row[BlockID]'>Delete</a>
							</td>	
						</tr>
						";
					}
				?>				
				
			</tbody>

</body>
</html>