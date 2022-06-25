<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tmf2034_Group4_Project";
					
	//Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	$Price = "";
	$orchardID = "";
	
	$errorMessage="";
	$sucessMessage="";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$Price = $_POST["Price"];
		$orchardID = $_POST["orchardID"];
		
		do {
			if ( empty($Price) || empty($orchardID) )
			{
				$errorMessage = "All the fields are required";
				break;
			}
			
			// add new block to database
			$sql = "INSERT INTO block (Price, OrchardID)"
			. "VALUES ('$Price', '$orchardID')";
			$result = $conn->query($sql);
			
			if (!$result) {
				$errorMessage = "Invalid query: " . $conn->error;
				break;
			}
			
			$Price = "";
			$orchardID = "";
			
			$sucessMessage = "Block added successfully!";
			
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
	<title>Admin Add Block</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link>
	<script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <center><h1>Block</h1></center>
	
	<div class = "container my-5">
        <h2>New Block</h2>
		
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
			<label class="col-sm-3 col-form-label">Price</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="Price" placeholder="enter Price RMxxxx"  value="<?php echo $Price; ?>">
				</div>
		</div>
		<div class="row mb-3">
			<label class="col-sm-3 col-form-label">Orchard ID</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" name="orchardID" placeholder="enter orchard ID" value="<?php echo $orchardID; ?>">
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
				<a class="btn btn-outline-primary" href="/tmf2034/project/adminBlock.php" role="button">Cancel/Back</a>
			</div>
		</div>
		
	</div>
			
</body>
</html>