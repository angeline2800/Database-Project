<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tmf2034_Group4_Project";
					
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$userName = "";
	$userAdd = "";
	$userEmail = "";
	$userPW = "";
	$userPhone = "";
	$userCountry = "";
	$userType = "";
	
	$errorMessage="";
	$sucessMessage="";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$userName = $_POST["userName"];
		$userAdd = $_POST["userAdd"];
		$userEmail = $_POST["userEmail"];
		$userPW = $_POST["userPW"];
		$userPhone = $_POST["userPhone"];
		$userCountry = $_POST["userCountry"];
		$userType = $_POST["userType"];
		
		do {
			if ( empty($userName) || empty($userAdd) || empty($userEmail) || empty($userPW) || empty($userPhone) || empty($userCountry) || empty($userType) )
			{
				$errorMessage = "All the fields are required";
				break;
			}
			
			// add new user to database
			$sqlUser = "INSERT INTO user (userName, userAdd, userEmail, userPW, userPhone, userCountry, userType)"
			. "VALUES ('$userName', '$userAdd', '$userEmail', '$userPW', '$userPhone', '$userCountry', '$userType')";
			$result = $conn->query($sqlUser);
			
			if (!$result) {
				$errorMessage = "Invalid query: " . $conn->error;
				break;
			}
			
			$userName = "";
			$userAdd = "";
			$userEmail = "";
			$userPW = "";
			$userPhone = "";
			$userCountry = "";
			$userType = "";
			
			$sucessMessage = "User added successfully!";
			
			//header("location: /tmf2034/DisplayUser.php");
			//exit;
			
		}while(false);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link>
	<script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <center><h1>Register</h1></center>
	
	<div class = "container my-5">
        <h2>New User</h2>
		
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
			<label class="col-sm-3 col-form-label">Name</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userName" placeholder="enter name"  value="<?php echo $userName; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Address</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userAdd" placeholder="enter address" value="<?php echo $userAdd; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Email</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userEmail" placeholder="enter email" value="<?php echo $userEmail; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Password</label>
				<div class="col-sm-6">
					<input type="password" class="form-control" name="userPW" placeholder="enter password"  value="<?php echo $userPW; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Phone</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userPhone" placeholder="enter phone" value="<?php echo $userPhone; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Country</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userCountry" placeholder="enter country" value="<?php echo $userCountry; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">User Type</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="userType" placeholder="enter worker/client/company" value="<?php echo $userType; ?>">

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
				<a class="btn btn-outline-primary" href="/tmf2034/Report.php" role="button">Cancel</a>
			</div>
		</div>
		
		<a class="btn btn-primary" href="/tmf2034/updateUser.php" role="button">Update User Data</a>
		<a class="btn btn-primary" href="/tmf2034/deleteUser.php" role="button">Delete User Data</a>
	</div>
			
</body>
</html>