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
	<link rel="stylesheet" href="CSS/worker.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link> -->
	
	<!--link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link>-->
	<script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
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
	
		<center><h1>Orchard</h1></center>
		
		<div class = "container my-5">
			<h2>New Orchard</h2>
			
			<?php
				if(!empty($errorMessage)){
					echo "
					<div class='alert alert-warning alert-dismissible fade show' role='alert'>
						<strong>$errorMessage</strong>
						<button type='button' class='btn-close' data-bs-dismiss='alert' atia-label='Close' </button>
					</div>
					";
				}
			?>
			
			<form method="post">
			
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">Orchard Address</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="orchard_add" placeholder="enter orchard address" required value="<?php echo $orchard_add; ?>">
						</div>
				</div>
				
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">Orchard Location</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="orchard_location" placeholder="enter orchard Location" required value="<?php echo $orchard_location; ?>">
						</div>
				</div>
				
				<div class="row mb-3">
					<label class="col-sm-3 col-form-label">User ID</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="userID" placeholder="enter userID" required value="<?php echo $userID; ?>">
						</div>
				</div>
			
				<?php
					if(!empty($sucessMessage)){
					echo "
					<div class='row mb-3'>
						<div class='offset -sm3 col-sm-6'>
							<div class='alert alert-warning alert-dismissible fade show' role='alert'>
								<strong>$sucessMessage</strong>
								<button type='button' class='btn-close' data-bs-dismiss='alert' atia-label='Close' </button>
							</div>
						</div>
					</div>
					";
					}
				?>
			
				<div class="row mb-3">
					<div class="offset-sm-3 col-sm-3 d-grid">
						<button type="submit" class="btn btn-primary">Submit</button>
				
						<a class="btn btn-outline-primary" href="adminOrchard.php" role="button">Cancel/Back</a>
					</div>
				</div>
			</form>
		</div>
			
</body>
</html>
