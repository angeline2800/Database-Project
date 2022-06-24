<html>
<head>
	<title>Delete Tree Data</title>
	<style>
		body{
		background-color: lightblue;
	}
	input{
		width: 40%;
		height: 5%;
		border: 1px;
		border-radius: 05px;
		padding: 8px 15px 8px 15px;
		margin: 10px 0px 15px 0px;
		box-shadow: 1px 1px 2px 1px grey;
	}
	</style>
</head>
<body>
	<center>
		<h1>Delete Tree Data </h1>
		<form action = "" method="POST">
			<input type="text" name="TreeID" placeholder="Enter Tree ID" /><br>
			<input type="submit" name="delete" value="Delete" /><br>
	</center>

</body>
</html>

<?php
	include "dbConnection.php";
	
	if(isset($_POST['delete']))
	{
		$TreeID = $_POST['TreeID'];
		
		$query = "DELETE FROM `tree` WHERE TreeID='$TreeID' ";
		$query_run = mysqli_query($conn, $query);
		
		if($query_run)
		{
			echo '<script type="text/javascript"> alert("Data Delete") </script>';
		}
		else
		{
			echo '<script type="text/javascript"> alert("Data Not Delete") </script>';
		}
	}	
?>