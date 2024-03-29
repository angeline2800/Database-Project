<html>
<head>
	<title> Update Tree | Management of Trees |Tree Profiling Management System</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
		<h2>Update A Tree</h2>
	</div>

	<div class="content">
		<center><h3> Please search the Tree ID to update the tree data.</h3></center>
		<div class="searchTree">
			<form action="" method="POST" >
				<div class="searching">
					<input type="text" name="TreeID" placeholder="Enter Tree ID for Search"/required><br/>
					<input type="submit"class="search" name="search" value="Search Data" />
				</div>
			</form>
		</div>
		
		<?php
		include "dbConnection.php";
		session_start();
			if(isset($_POST['search']))
			{
				$workerID = $_SESSION['user']['userID'];
				$TreeID = $_POST['TreeID'];
				$query = "SELECT * FROM Tree 
				INNER JOIN Tree_Worker ON Tree.TreeID = Tree_Worker.TreeID
				INNER JOIN Worker ON Worker.userID = Tree_Worker.userID
				where Tree.TreeID='$TreeID' and Worker.userID = '$workerID'";
				
				$query_run = mysqli_query($conn, $query);
				
				if($row = mysqli_fetch_array($query_run))
				{
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="updateTree">
						<input type="hidden" name="TreeID" value="<?php echo $row['TreeID'] ?>"/><br>
						<label>Spesies Name</label>
						<input type="text" name="spesiesName" value="<?php echo $row['spesiesName'] ?>"/><br>
						<label>Plant Date</label>
						<input type="text" name="plantDate" value="<?php echo $row['plantDate'] ?>"/><br>
						<label>Tree Height</label>
						<input type="text" name="tree_height" value="<?php echo $row['tree_height'] ?>"/><br>
						<label>Diameter</label>
						<input type="text" name="diameter" value="<?php echo $row['diameter'] ?>"/><br>
						<label>Status</label>
						<input type="text" name="status" value="<?php echo $row['status'] ?>"/><br>
						<label>GPS location</label>
						<input type="text" name="GPS_location" value="<?php echo $row['GPS_location'] ?>"/><br>
						<label>Tree Type</label>
						<input type="text" name="tree_type" value="<?php echo $row['tree_type'] ?>"/><br>
						<label>Block ID</label>
						<input type="text" name="BlockID" value="<?php echo $row['BlockID'] ?>"/><br>

						<input type="submit"class="updateBttn" name="updateBttn" value="Update Data" /><br>
					</div>
				</form>
				<?php
				}
				else
				{
					echo '<script type="text/javascript"> alert("The Tree Is Assigned To Other Worker...! Please Enter Again. ") </script>';
				}
			}
		?>

	</div>
</body>
</html>

<?php
	include "dbConnection.php";
	if(isset($_POST['updateBttn']))
	{
		$TreeID =$_POST['TreeID'];
		$spesiesName = $_POST['spesiesName'];
		$plantDate = $_POST['plantDate'];
		$tree_height = $_POST['tree_height'];
		$diameter = $_POST['diameter'];
		$status = $_POST['status'];
		$GPS_location = $_POST['GPS_location'];
		$tree_type = $_POST['tree_type'];
		$BlockID = $_POST['BlockID'];
		
		$query = "UPDATE tree SET spesiesName = '$spesiesName', plantDate = '$plantDate', tree_height = '$tree_height',
				diameter = '$diameter', status = '$status', GPS_location = '$GPS_location', tree_type = '$tree_type', BlockID = '$BlockID' where TreeID='$TreeID'";
		$query_run = mysqli_query($conn, $query);
		
		if($query_run)
		{
			echo"<script type=\"text/javascript\"> alert(\"Data Updated...!\");
			window.location = 'worker.php'; </script>";
		}
		else
		{
			echo '<script> alert("Data Not Updated") </script>';
		}
	}
?>