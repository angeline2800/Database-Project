

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Clients | Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/clientAdmin.css">
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
	<h2>List of Clients</h2>
</div>
<div class="content">
		<div class="addBlock">
            <center><a href="adminAddBlock.php"><button>Add - New Block</button></a></center>
            <center><a href="adminAddUser.php"><button>Add - New User - Client, Company, Worker</button></a></center>
        </div>
	
			<?php
				if (isset($GET['msg'])){
					$msg = $_GET['msg'];
					echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					'.$msg.'
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
				}
			?>
		<center>	
			<table>
				<thead>
					<tr>
						hello
						<th>Client ID</th>
						<th>Client Name</th>
						<th>Client Address</th>
						<th>Client Email</th>
						<th>Client Phone</th>
						<th>Client Country</th>
						<th>User Type</th>
						<th>Action</th>
					</tr>
				</thead>
        </center>        
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
								<td><?php echo $row['userPhone'] ?></td>
								<td><?php echo $row['userCountry'] ?></td>
								<td><?php echo $row['userType'] ?></td>
								<td>
                                  				<a class='btn btn-primary btn-sm' href="adminUpdateUser.php?userID=<?php echo $row['userID'] ?>">Update</a>
							        <a class='btn btn-primary btn-sm' href="adminDeleteUser.php?userID=<?php echo $row['userID'] ?>">Delete</a>
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
