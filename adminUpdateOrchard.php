<?php
//error!!!!!!!!!
	include "dbConnection.php";
	
	$orchardID = $_GET['orchardID'];

	if(isset($_POST['update'])){
		
		$orchard_add = $_POST['orchard_add'];
		$orchard_location = $_POST['orchard_location'];
		$userID = $_POST['userID'];
		
		$sql = "UPDATE `orchard` SET `orchard_add`='$orchard_add',`orchard_location`='$orchard_location,`userID`='$userID'
			 WHERE orchardID =$orchardID";
				
		$result = mysqli_query($conn, $sql);
		
		if($result){
				header("Location: adminOrchard.php?msg=Data updated successfully");
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

	<title>Orchard | Administration | Tree Profiling Management System</title>
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
			<h3>Edit/Update Orchard Information</h3>
			<p class="text-muted">Click update after changing any information</p>
		</div>
		
		<?php
			
			$sql = "SELECT * FROM `orchard` WHERE orchardID = $orchardID LIMIT 1";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
		?>
		
		<div class="container d-flex justify-content-center">
			<form action="" method="post" style="width:50vw; min-width:300px;">
				<div class="row mb-3">
					<div class="mb-3">
						<label class="form-label">Orchard Address</label>
						<input type = "text" class="form-control" name="orchard_add" value="<?php echo $row['orchard_add']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">Orchard Location</label>
						<input type = "text" class="form-control" name="orchard_location" value="<?php echo $row['orchard_location']?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">User ID</label>
						<input type = "text" class="form-control" name="userID" value="<?php echo $row['userID']?>">
					</div>
					
			
					<div>
						<button type="submit" class="btn btn-success" name="update">Update</button>
						<a href="adminOrchard.php" class="btn btn-danger">Cancel/Back</a>
					</div>
				</div>
			</form>
		</div>	
	</div>		
					
		
	<!--Boostrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
