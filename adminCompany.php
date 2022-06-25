

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!--Boostrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
	
	<!--Font Awesome-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	
	<title>Admin View Company</title>
	
</head>
<body>
	<nav class="navbar navbar-light justify-content-center fs-3 mb-5" style = "background-color: #00ff5573;"> Admin </nav>
	
	<div class = "container">
		<?php
		if (isset($GET['msg'])){
			$msg = $_GET['msg'];
			echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
				'.$msg.'
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>';
		}
		?>
		
		<a href="adminAddUser.php" class="btn btn-dark mb-3">Add New User - Client, Company, Worker</a>
			
		<table class="table table-hover text-center">
			<thead class="table-dark">
				<tr>
					<th scope="col">Company ID</th>
					<th scope="col">Company Name</th>
					<th scope="col">Company Address</th>
					<th scope="col">Company Email</th>
					<th scope="col">Company Password</th>
					<th scope="col">Company Phone</th>
					<th scope="col">Company Country</th>
					<th scope="col">Company Type</th>
					<th scope="col">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "dbConnection.php";
					
					$sqlUser = "SELECT * FROM user WHERE usertype = 'company'";
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
								<a href="adminUpdateUser.php?userID=<?php echo $row['userID'] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
								<a href="adminDeleteUser.php?userID=<?php echo $row['userID'] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5 me-3"></i></a>
							</td>
						</tr>
						<?php
					}
				?>
						
					
						
					
				
		
</body>
</html>	  