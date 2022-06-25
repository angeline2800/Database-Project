<?php
	include "dbConnection.php";
	
	$userID = $_GET['userID'];

	if(isset($_POST['update'])){
		
		$userName = $_POST['userName'];
		$userAdd = $_POST['userAdd'];
		$userEmail = $_POST['userEmail'];
		$userPW = $_POST['userPW'];
		$userPhone = $_POST['userPhone'];
		$userCountry = $_POST['userCountry'];
		$userType = $_POST['userType'];
		
		$client_photo = $_POST['client_photo'];
		
		$sql = "UPDATE `user` SET `userName`='$userName',`userAdd`='$userAdd]',`userEmail`='$userEmail',
				`userPW`='$userPW',`userPhone`='$userPhone',`userCountry`='$userCountry',`userType`='$userType' WHERE userID =$userID";
				
		$result = mysqli_query($conn, $sql);
		
		if($result){
				header("Location: admin.php?msg=Data updated successfully");
		}
		else
		{
			echo "Failed: " . mysqli_error($conn);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Clients | Administration | Tree Profiling Management System</title>
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
  <div class = "container">
		<div class="text-center mb-4">
			<h3>Edit/Update User Information</h3>
			<p class="text-muted">Click update after changing any information</p>
		</div>
		
		<?php
			
			$sql = "SELECT * FROM `user` WHERE userID = $userID LIMIT 1";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
		?>
		
		<div class="container d-flex justify-content-center">
			<form action="" method="post" style="width:50vw; min-width:300px;">
				<div class="row mb-3">
					<div class="mb-3">
						<label class="form-label">User Name</label>
						<input type = "text" class="form-control" name="userName" value="<?php echo $row['userName']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">User Address</label>
						<input type = "text" class="form-control" name="userAdd" value="<?php echo $row['userAdd']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">User Email</label>
						<input type = "email" class="form-control" name="userEmail" value="<?php echo $row['userEmail']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">User Password</label>
						<input type = "password" class="form-control" name="userPW" value="<?php echo $row['userPW']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">User Phone</label>
						<input type = "text" class="form-control" name="userPhone" value="<?php echo $row['userPhone']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">User Country</label>
						<input type = "text" class="form-control" name="userCountry" value="<?php echo $row['userCountry']?>">
					</div>
					
					<div class="mb-5">
						<label>User Type </label>
						<input type = "radio" class="form-check-input" name="userType" id="client" value="client" <?php echo ($row['userType']=='client')? "checked":""; ?>>
						<label for="client" class="form-input-label">Client</label>
						
						<input type = "radio" class="form-check-input" name="userType" id="company"value="company" <?php echo ($row['userType']=='company')? "checked":""; ?>>
						<label for="client" class="form-input-label">Company</label>
						
						<input type = "radio" class="form-check-input" name="userType" id="worker"value="worker" <?php echo ($row['userType']=='worker')? "checked":""; ?>>
						<label for="client" class="form-input-label">Worker</label>
					</div>
			
					<div>
						<button type="submit" class="btn btn-success" name="update">Update</button>
						<a href="admin.php" class="btn btn-danger">Cancel/Back</a>
					</div>
				</div>
			</form>
		</div>	
	</div>		
					
		
	<!--Boostrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>