<?php
	include "dbConnection.php";
	
	$Price = "";
	$orchardID = "";
	
	$errorMessage="";
	$sucessMessage="";
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST['submit']))
		{
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
				$errorMessage = "Invalid Orchard ID, Please input the valid Orchard ID!";
				break;
			}
			
			$Price = "";
			$orchardID = "";
			
			$sucessMessage = "Block added successfully!";
			
			header("location: adminBlock.php");
			exit;
			
		}while(false);
	}
	else
	{
		header("location: adminBlock.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Add New Block | Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/block.css">

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
	<h2>Add A New Block</h2>
</div>
		

<div class="content">
<center><h3> Please Insert The Info To Add A New Block.</h3></center>
	
	<div class="addNewBlock">
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
			
				<div class="insertBlock">
					<label>Price</label>
					<input type="text" name="Price" placeholder="Enter Price RMxxxx" value="<?php echo $Price; ?>"><br/>
		
					<label>Orchard ID</label>
					<input type="text" name="orchardID" placeholder="Enter Orchard ID" value="<?php echo $orchardID; ?>"><br/>
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
			
				
						<input type="submit"class="addSubmit" name="submit" value="Submit" />
						<a href="adminBlock.php"><button>Back to Block List</button></a>
				</div>
			</form>
		</div>
			
</body>
</html>
