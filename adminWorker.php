<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Workers | Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/worker.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link> -->
	<!--Boostrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	
	<!--Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

    <center><h1>Worker</h1></center>
	<div class = "container my-5">
		<a class="btn btn-primary" href="adminAddBlock.php" role="button">Add - New Block</a> 
		<a class="btn btn-primary" href="adminAddUser.php" role="button">Add - New User - Client, Company, Worker</a> 
	
		<h2>List of Worker</h2>
		
	
			<?php
				if (isset($GET['msg'])){
					$msg = $_GET['msg'];
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					'.$msg.'
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				}
			?>
		
		
			
			<table class="table table-hover text-center">
				<thead class="table-dark">
					<tr>
						<th scope="col">Client ID</th>
						<th scope="col">Client Name</th>
						<th scope="col">Client Address</th>
						<th scope="col">Client Email</th>
						<th scope="col">Client Password</th>
						<th scope="col">Client Phone</th>
						<th scope="col">Client Country</th>
						<th scope="col">User Type</th>
						<th scope="col">Edit</th>
						<th scope="col">Delete</th>
					
					</tr>
				</thead>
				<tbody>
					<?php
						include "dbConnection.php";
						
						$sqlUser = "SELECT * FROM user WHERE usertype = 'client'";
						$result = $conn->query($sqlUser);
						
						if(!$result){
							die("Invalid query: " . $conn->error);
						}
						
						//read data of each row
						while ($row = mysqli_fetch_assoc($result)){
					?>
							<tr>
								<td><?php echo $row['userID'] ?></td>
								<td><?php echo $row['userName'] ?></td>
								<td><?php echo $row['userAdd'] ?></td>
								<td><?php echo $row['userEmail'] ?></td>
								<td><?php echo $row['userPW'] ?></td>
								<td><?php echo $row['userPhone'] ?></td>
								<td><?php echo $row['userCountry'] ?></td>
								<td><?php echo $row['userType'] ?></td>
								<td>
									<a href="adminUpdateUser.php?userID=<?php echo $row['userID'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-2"></i></a>
								</td>
								<td>
									<a href="adminDeleteUser.php?userID=<?php echo $row['userID'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 me-2"></i></a>
								</td>
							</tr>
					<?php
					}
					?>
				</tbody>
			</table>
	</div>

</body>
</html>
