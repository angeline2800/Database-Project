<?php
	include "dbConnection.php";
	
	$userID = $_GET['userID'];
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if(isset($_POST['insert'])){
		
		$userName = $_POST['userName'];
		$userAdd = $_POST['userAdd'];
		$userEmail = $_POST['userEmail'];
		$userPW = $_POST['userPW'];
		$userPhone = $_POST['userPhone'];
		$userCountry = $_POST['userCountry'];
		
		
		$sql = "UPDATE `user` SET `userName`='$userName',`userAdd`='$userAdd',`userEmail`='$userEmail',
			`userPW`= SHA1('$userPW'),`userPhone`='$userPhone',`userCountry`='$userCountry' WHERE userID =$userID";
				
		$result = mysqli_query($conn, $sql);
		
		if($result){
				header("Location: adminClient.php?msg=Data updated successfully");
		}
		else
		{
			echo "Failed: " . mysqli_error($conn);
		}
	}
	else
	{
		header("location: admin.php");
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>Client| Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/adminAddUser.css">
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
		<h2>Update Client Information</h2>
	</div>

	<div class="content">
		<center><h3>Click update after changing any information</h3></center>
		
		<?php
			
			$sql = "SELECT * FROM `user` WHERE userID = $userID LIMIT 1";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
		?>
		
		<div class="updateUser">
		<form action="" method="post">
			<div class="editUser">
				<label>Client Name</label>
				<input type = "text" name="userName" value="<?php echo $row['userName']?>"><br>
					<label>Client Address</label>
					<input type = "text" name="userAdd" value="<?php echo $row['userAdd']?>"><br>
					<label>Client Email</label>
					<input type = "email" name="userEmail" value="<?php echo $row['userEmail']?>"><br>
					<label>Client Password</label>
					<input type = "password" name="userPW" value="<?php echo $row['userPW']?>"><br>
					<label>Client Phone</label>
					<input type = "text" name="userPhone" value="<?php echo $row['userPhone']?>"><br>
					<label>Client Country</label>
					<input type = "text" name="userCountry" value="<?php echo $row['userCountry']?>"><br>
					
					
					<input type="submit"class="addSubmit" name="insert" value="Save" />
					<a href="admin.php"><button>Cancel</button></a>
					</div>
				</div>
			</form>
		</div>	
	</div>
	
</body>
</html>
