<?php
	include "dbConnection.php";
	
	if(isset($_POST['delete']))
	{
		$TreeID = $_POST['TreeID'];
		
		$query = "DELETE FROM `tree` WHERE TreeID='$TreeID' ";
		$query_run = mysqli_query($conn, $query);
		
		if($query_run)
		{
			echo"<script type=\"text/javascript\"> alert(\"Data Delete...!\");
			window.location = 'worker.php'; </script>";
		}
		else
		{
			echo '<script type="text/javascript"> alert("Data Not Delete") </script>';
		}
	}	
?>

<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="photo/tree.ico" />
    <link rel="stylesheet" href="CSS/tree.css">
	<title>Delete Tree | Management of Trees |Tree Profiling Management System</title>

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
	<h2>Delete Tree Data</h2>
</div>
<div class="content">
<center><h3> Please search the Tree ID to delete the tree data.</h3></center>
<div class="searchTree">
		<form action = "" method="POST">
		<div class="searching">
	<center>

		<form action = "worker.php" method="POST">
			<input type="text" name="TreeID" placeholder="Enter Tree ID" /><br>
			<input type="submit"class="delete" name="delete" value="Delete" />
</div>
</form>
</div>
</div>

</body>
</html>

