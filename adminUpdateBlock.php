<?php
	include "dbConnection.php";
	
	$BlockID = $_GET['BlockID'];
	
	$Price="";
	$orchardID="";
	
	$result=mysqli_query($conn, "select * from block where BlockId=$BlockID");
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
	<h2>Update Block Information</h2>
</div>
<div class="content">
			<center><h3>Click update after changing any information</h3></center>
			<div class="updateBlock">
			<form action="" method="post">
			<div class="editBlock">
				<label>Price</label>
				<input type="text" name="Price" id="Price" value="<?php echo $Price; ?>"><br/>
				<label>Orchard ID</label>
				<input type = "text" name="orchardID" id="orchardID" value="<?php echo $orchardID; ?>">

				<input type="submit"class="updateSubmit" name="edit" value="Update" />
				<a href="adminBlock.php"><button>Back to Block List</button></a>
			</div>
			</form>
		</div>	
</div>
</body>

	<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if(isset($_POST["update"]))
	{
		mysqli_query($conn, "UPDATE block SET Price='$_POST[Price]', orchardID='$_POST[orchardID]' where BlockID=$BlockID");
	
		?><script type="text/javascript">window.location="adminBlock.php"</script><?php
	

	}
	else
	{
		header("location: adminBlock.php");
	}
}
	?>
	

</html>