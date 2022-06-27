<?php
	include "dbConnection.php";
	
	$orchardID = $_GET['orchardID'];
	
	$orchard_add="";
	$orchard_location="";
	$userID="";
	
	$result=mysqli_query($conn, "select * from orchard where orchardID=$orchardID");
	while($row = mysqli_fetch_array($result))
	{
		$orchard_add = $row["orchard_add"];
		$orchard_location = $row["orchard_location"];
		$userID = $row["userID"];
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
		<h2>Update Orchard Information</h2>
	</div>
	<div class="content">
			<center><h3>Click update after changing any information</h3></center>
			<div class="updateOrchard">
			<form action="" method="post">
				<div class="editOrchard">
					<label>Orchard Address</label>
					<input type = "text" name="orchard_add" id="orchard_add" value="<?php echo $orchard_add; ?>"><br>
					<label>Orchard Location</label>
					<input type = "text" name="orchard_location" id="orchard_location" value="<?php echo $orchard_location; ?>">
					<br/>
					<label>User ID</label>
					<input type = "text" name="userID" id="userID" value="<?php echo $userID; ?>">

					<input type="submit"class="updateSubmit" name="edit" value="Update" />
					<a href="adminOrchard.php"><button>Back to Orchard List</button></a>			
				</div>
			</form>
			</div>	
		</div>
</body>

	<?php
		if ($_SERVER['REQUEST_METHOD'] == 'POST') 
		{
			if(isset($_POST["edit"]))
			{
				mysqli_query($conn, "UPDATE orchard SET orchard_add='$_POST[orchard_add]', orchard_location='$_POST[orchard_location]', userID='$_POST[userID]' where orchardID=$orchardID");
	
				?><script type="text/javascript">window.location="adminOrchard.php"</script><?php
			}
			else
			{
			header("location: adminOrchard.php");
			}
		}
	?>
	

</html>
