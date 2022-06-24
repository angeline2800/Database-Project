<?php
	/*Fail uploaded image & data 等下改*/
	
	include"dbConnection.php";
	
	if(isset($_POST['insert']))
	{
		$file = addslashes(file_get_contents($_FILES["tree_Image"]["tmp_name"]));
		
		$spesiesName = $_POST['spesiesName'];
		$plantDate = $_POST['plantDate'];
		$tree_height = $_POST['tree_height'];
		$diameter = $_POST['diameter'];
		$status = $_POST['status'];
		$GPS_location = $_POST['GPS_location'];
		$tree_type = $_POST['tree_type'];
		$BlockID = $_POST['BlockID'];
		
		$query = "INSERT INTO `tree`(`tree_Image`, `spesiesName`, `plantDate`, `tree_height`, `diameter`, `status`, `GPS_location`, `tree_type`, `BlockID`) 
				VALUES ('$file', '$spesiesName', '$plantDate', '$tree_height', '$diameter', '$status', '$GPS_location', '$tree_type', '$BlockID')";
		$query_run = mysqli_query($conn, $query);
		
		if($query_run)
		{
			echo '<script type="text/javascript">alert("Tree Data Uploaded") </script>';
		}
		else
		{
			echo '<script type="text/javascript">alert("Tree Data Fail Uploaded") </script>';
		}
	}


?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Worker </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"></link>
	<script src ="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
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
			font-weight: bold;
		}	
	</style>
</head>
<body>
	<center>
		<h1>Insert Tree Data</h1>
		
		<form action="" method="POST" enctype="multipart/form-data">
		
			<label>Choose a Tree Image </label><br>
			<input type="file" name="tree_Image" id="tree_Image" /><br>
			
			<label>Spesies Name</label><br>
			<input type="text" name="spesiesName" placeholder="Enter Species Name" /><br>
			
			<label>Plant Date</label><br>
			<input type="text" name="plantDate" placeholder="Enter Plant Date yyyy-mm-dd" /><br>
			
			<label>Tree Height</label><br>
			<input type="text" name="tree_height" placeholder="Enter Tree Height (m)" /><br>
			
			<label>Diameter</label><br>
			<input type="text" name="diameter" placeholder="Enter Diameter (cm)" /><br>
			
			<label>Status</label><br>
			<input type="text" name="status" placeholder="Enter Status" /><br>
			
			<label>GPS location</label><br>
			<input type="text" name="GPS_location" placeholder="Enter GPS_location" /><br>
			
			<label>Tree Type</label><br>
			<input type="text" name="tree_type" placeholder="Enter Tree Type" /><br>
			
			<label>Block ID</label><br>
			<input type="text" name="BlockID" placeholder="Enter Block ID" /><br>
		
			<input type="submit" name="insert" value="Insert Image & Data" /><br>
			
			<a class="btn btn-primary" href="/tmf2034/Database-Project/workerUpdateTreeData.php" role="button">Update Tree Data</a>
			<a class="btn btn-primary" href="/tmf2034/Database-Project/workerDeleteTreeData.php" role="button">Delete Tree Data</a>
		</form>
	</center>
	
	
</body>
</html>

