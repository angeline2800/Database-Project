<?php
/*****error!!!****/

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
	
	$orchardID = "";
	$orchard_add = "";
	$orchard_location = "";
	$userID = "";

	$errorMessage="";
	$sucessMessage="";
	
	if( $_SERVER['REQUEST_METHOD'] == 'GET'){
		//get method to show the date of orchard
		if (!isset($_GET["orchardID"])){
			header("location: /tmf2034/project/adminOrchard.php");
			exit;
		}
		
		$orchardID = $_GET["orchardID"];
		
		//read the row of the selected orchard from database table
		$sql = "SELECT * FROM orchard WHERE orchardID=$orchardID";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		
		if (!$row){
			header("location: /tmf2034/project/adminOrchard.php");
			exit;
		}
		
		$orchard_add = $row["orchard_add"];
		$orchard_location = $row["orchard_location"];
		$userID = $row["userID"];
	}
	else {
		//post method to update the data of orchard
		
		$orchardID = $_POST["orchardID"];
		$orchard_add = $_POST["orchard_add"];
		$orchard_location = $_POST["orchard_location"];
		$userID = $_POST["userID"];
		
		do {
			if ( empty($orchardID) || empty($orchard_add) || empty($orchard_location) || empty($userID) )
			{
				$errorMessage = "All the fields are required";
				break;
			}
			$sql = "UPDATE orchard" . 
					"SET orchard_add = '$orchard_add', orchard_location = '$orchard_location', userID = '$userID'" .
					"WHERE orchardID = $orchardID";
						
			$result = $conn->query($sql);
			
			if (!$result) {
				$errorMessage = "Invalid query: " . $conn->error;
				break;
			}
			
			$sucessMessage = "Orchard updated successfully!";
			
			header("location: /tmf2034/project/adminOrchard.php");
			exit;
			
		}while(true);
		
		
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin Update Orchard</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link>
	<script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <center><h1>Orchard</h1></center>
	
	<div class = "container my-5">
        <h2>Update Orchard</h2>
		
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
		<input type = "hidden" name="orchardID" value="<?php echo $orchardID; ?>">
		
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Orchard Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="orchard_add" placeholder="enter orchard address"  value="<?php echo $orchard_add; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Orchard Location</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="orchard_location" placeholder="enter orchard location" value="<?php echo $orchard_location; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">User ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userID" placeholder="enter user ID" value="<?php echo $userID; ?>">
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
			</div>
			<div class="col-sm-3 d-grid">
				<a class="btn btn-outline-primary" href="/tmf2034/project/adminOrchard.php" role="button">Cancel/Back</a>
			</div>
		</div>
		
	</div>
			
</body>
</html>
