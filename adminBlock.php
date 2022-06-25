<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Blocks | Administration | Tree Profiling Management System </title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/worker.css">
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

    <center><h1>Block</h1></center>
	
	<div class = "container my-5">
        <h2>List of Block</h2>
		<br>
		<a class="btn btn-primary" href="adminAddBlock.php" role="button">Add - New Block</a>
        <br>
		<br>
		<center>
		<table class="table">
			<thead>
				<tr>
					<th>Block ID</th>
					<th>Price</th>
					<th>Orchard ID</th>
					<th>Action</th>
				<tr>
			</thead>
		</center>
			<tbody>
				<?php
					include "dbConnection.php";
					
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
								<a class='btn btn-primary btn-sm' href='adminAddBlock.php?BlockID=$row[BlockID]'>Update</a>
								
								<a class='btn btn-primary btn-sm' href='adminDeleteBlock.php?BlockID=$row[BlockID]'>Delete</a>
							</td>	
						</tr>
						";
					}
				?>				
				
			</tbody>

</body>
</html>
