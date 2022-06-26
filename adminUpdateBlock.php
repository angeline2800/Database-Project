<?php
	include "dbConnection.php";
	
	$BlockID = $_GET['BlockID'];
	
	$Price="";
	$orchardID="";
	
	$result=mysqli_query($conn, "select * from block where BlockID=$BlockID");
	while($row = mysqli_fetch_array($result))
	{
		$Price = $row["Price"];
		$orchardID = $row["orchardID"];
	
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Block | Administration | Tree Profiling Management System</title>
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
			<h3>Edit/Update Block Information</h3>
			<p class="text-muted">Click update after changing any information</p>
		</div>
	
		
		<div class="container d-flex justify-content-center">
			<form action="" method="post" style="width:50vw; min-width:300px;">
				<div class="row mb-3">
					<div class="mb-3">
						<label class="form-label">Price</label>
						<input type = "text" class="form-control" name="Price" id="Price" value="<?php echo $Price; ?>">
					</div>
					
					<div class="mb-3">
						<label class="form-label">Orchard ID</label>
						<input type = "text" class="form-control" name="orchardID" id="orchardID" value="<?php echo $orchardID; ?>">
					</div>
					
			
					<div>
						<button type="submit" class="btn btn-success" name="update">Update</button>
						<a href="adminBlock.php" class="btn btn-danger">Cancel/Back</a>
					</div>
				</div>
			</form>
		</div>	
	</div>		
					
		
	<!--Boostrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

	<?php
		if(isset($_POST["update"]))
	{
		mysqli_query($conn, "UPDATE block SET Price='$_POST[Price]', orchardID='$_POST[orchardID]' where BlockID=$BlockID");
	
		?><script type="text/javascript">window.location="adminBlock.php"</script><?php
	
	}
	
	?>
	

</html>
