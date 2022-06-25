<?php include"dbConnection.php";
	
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
	<title> Add New Tree | Management of Trees |Tree Profiling Management System </title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/tree.css">
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
	<h2>Add A New Tree</h2>
</div>

<div class ="content">
		
		<form action="" method="POST" enctype="multipart/form-data">
		
		<div class="input-group">
			<label>Tree Image </label>
			<input type="file" name="tree_Image" id="tree_Image" /><br>
			
			<label>Spesies Name</label>
			<input type="text" name="spesiesName" placeholder="Enter Species Name" /><br>
			
			<label>Plant Date</label>
			<input type="text" name="plantDate" placeholder="Enter Plant Date yyyy-mm-dd" /><br>
			
			<label>Tree Height</label>
			<input type="text" name="tree_height" placeholder="Enter Tree Height (m)" /><br>
			
			<label>Diameter</label>
			<input type="text" name="diameter" placeholder="Enter Diameter (cm)" /><br>
			
			<label>Status</label>
			<input type="text" name="status" placeholder="Enter Status" /><br>
			
			<label>GPS location</label>
			<input type="text" name="GPS_location" placeholder="Enter GPS_location" /><br>
			
			<label>Tree Type</label>
			<input type="text" name="tree_type" placeholder="Enter Tree Type" /><br>
			
			<label>Block ID</label>
			<input type="text" name="BlockID" placeholder="Enter Block ID" /><br>
		
			<input type="submit"class="insert" name="insert" value="Insert Image & Data" /><br>
			
			
</div>

		</form>
		<div class="workerTree">
		<a href="workerUpdateTreeData.php"><button>Update Trees</button></a>
		<a href="workerDeleteTreeData.php"><button>Delete Trees</button></a>
</div>
</div>
		
</body>
</html>

