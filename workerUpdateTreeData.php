<html>
<head>
	<title> Update User Data</title>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/worker.css">
	
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

	<center>
		<h1> Search data by Tree ID and Update the Tree data</h1>
		<form action="" method="POST" style="background-color: lightblue">
			<input type="text" name="TreeID" placeholder="Enter Tree ID for Search"/><br/>
			<input type="submit" name="search" value="Search Data"/>
		</form>
		
		<?php
		include "dbConnection.php";
			
			if(isset($_POST['search']))
			{
				$TreeID = $_POST['TreeID'];
				$query = "SELECT * FROM tree where TreeID='$TreeID' ";
				$query_run = mysqli_query($conn, $query);
				
				while($row = mysqli_fetch_array($query_run))
				{
				?>
				<form action="" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="TreeID" value="<?php echo $row['TreeID'] ?>"/><br>
					
					<input type="text" name="spesiesName" value="<?php echo $row['spesiesName'] ?>"/><br>
					<input type="text" name="plantDate" value="<?php echo $row['plantDate'] ?>"/><br>
					<input type="text" name="tree_height" value="<?php echo $row['tree_height'] ?>"/><br>
					<input type="text" name="diameter" value="<?php echo $row['diameter'] ?>"/><br>
					<input type="text" name="status" value="<?php echo $row['status'] ?>"/><br>
					<input type="text" name="GPS_location" value="<?php echo $row['GPS_location'] ?>"/><br>
					<input type="text" name="tree_type" value="<?php echo $row['tree_type'] ?>"/><br>
					<input type="text" name="BlockID" value="<?php echo $row['BlockID'] ?>"/><br>
					
					<input type="submit" name="update" value="Update Data">
				</form>
				<?php
				}
			}
		?>
	</center>

</body>
</html>

<?php
	include "dbConnection.php";

/*fail updated等下改*/
	if(isset($_POST['update']))
	{
		//$file = addslashes(file_get_contents($_FILES["tree_Image"]["tmp_name"]));
		$spesiesName = $_POST["spesiesName"];
		$plantDate = $_POST["plantDate"];
		$tree_height = $_POST["tree_height"];
		$diameter = $_POST["diameter"];
		$status = $_POST["status"];
		$GPS_location = $_POST["GPS_location"];
		$tree_type = $_POST["tree_type"];
		$BlockID = $_POST["BlockID"];
		
		$query = "UPDATE `tree` SET spesiesName = '$_POST[spesiesName]', plantDate = '$_POST[plantDate]', tree_height = '$_POST[tree_height]',
				diameter = '$_POST[diameter]', status = '$_POST[status]', GPS_location = '$_POST[GPS_location]', tree_type = '$_POST[tree_type]', BlockID = '$_POST[BlockID] where TreeID='$_POST[TreeID]'";
		$query_run = mysqli_query($conn, $query);
		
		if($query_run)
		{
			echo '<script> alert("Data Updated") </script>';
		}
		else
		{
			echo '<script> alert("Data Not Updated") </script>';
		}
	}

?>
	
