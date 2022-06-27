<?php
	include "dbConnection.php";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['insert'])){
		
		$userName = $_POST['userName'];
		$userAdd = $_POST['userAdd'];
		$userEmail = $_POST['userEmail'];
		$userPW = $_POST['userPW'];
		$encrypted_pwd = SHA1($userPW);
		$userPhone = $_POST['userPhone'];
		$userCountry = $_POST['userCountry'];
		$userType = $_POST['userType'];
		
		$sql = "INSERT INTO `user`(`userID`, `userName`, `userAdd`, `userEmail`, `userPW`, `userPhone`, `userCountry`, `userType`)
				VALUES (NULL, '$userName', '$userAdd', '$userEmail', '$encrypted_pwd', '$userPhone', '$userCountry', '$userType')";
				
		$result = mysqli_query($conn, $sql);
		
		if($result){
			if($userType == 'client'){
				$sqlUserID = "SELECT userID FROM User WHERE userName = '$userName' AND userEmail = '$userEmail'";
				$result = mysqli_query($conn, $sqlUserID);
				if (mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_assoc($result);
					$userid = $row['userID'];
				}
					$file = $_FILES['client_photo']["name"];
					$target_dir = "upload/";
					$target_file = $target_dir.basename($_FILES['client_photo']["name"]);
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					$extensions_arr = array("jpg","jpeg","png","gif");
					if( in_array($imageFileType,$extensions_arr) ){
						if(move_uploaded_file($_FILES['client_photo']['tmp_name'],$target_dir.$file)){
							$sql = "INSERT INTO Client(userID, client_photo) VALUES('$userid', '".$file."')";
							$query_run = mysqli_query($conn, $sql);
				
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Client Data Uploaded") </script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Client Data Fail Uploaded") </script>';
							}
						}
					}
					
			}
			else if($userType == 'company'){
				$sqlUserID = "SELECT userID FROM User WHERE userName = '$userName' AND userEmail = '$userEmail'";
				$result = mysqli_query($conn, $sqlUserID);
				if (mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_assoc($result);
					$userid = $row['userID'];
				}
				$compDesc = $_POST['compDesc'];
					$file = $_FILES['company_photo']["name"];
					$target_dir = "upload/";
					$target_file = $target_dir.basename($_FILES['company_photo']["name"]);
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					$extensions_arr = array("jpg","jpeg","png","gif");
					if( in_array($imageFileType,$extensions_arr) ){
						if(move_uploaded_file($_FILES['company_photo']['tmp_name'],$target_dir.$file)){
							$sql = "INSERT INTO Company(userID, companyDesc,companyPhoto) VALUES('$userid', '$compDesc','".$file."')";
							$query_run = mysqli_query($conn, $sql);
				
							if($query_run)
							{
								echo '<script type="text/javascript">alert("Company Data Uploaded") </script>';
							}
							else
							{
								echo '<script type="text/javascript">alert("Company Data Fail Uploaded") </script>';
							}
						}
					}
					
			}
			else if($userType == 'worker'){
				$sqlUserID = "SELECT userID FROM User WHERE userName = '$userName' AND userEmail = '$userEmail'";
				$result = mysqli_query($conn, $sqlUserID);
				if (mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_assoc($result);
					$userid = $row['userID'];
				}
				$worker_position = $_POST['worker_position'];
				$worker_department = $_POST['worker_department'];
				$workerDOB = $_POST['workerDOB'];
				$sql = "INSERT INTO Worker(userID, worker_position, worker_department, workerDOB) VALUES('$userid', '$worker_position','$worker_department', '$workerDOB')";
				$query_run = mysqli_query($conn, $sql);
				
				if($query_run)
				{
					echo '<script type="text/javascript">alert("Worker Data Uploaded") </script>';
				}
				else
				{
					echo '<script type="text/javascript">alert("Worker Data Fail Uploaded") </script>';
				}
						
					
			}
				//header("Location: admin.php?msg=New record created successfully");
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

	<title>Admins | Administration | Tree Profiling Management System</title>
	<link rel="shortcut icon" href="photo/tree.ico" />
	<link rel="stylesheet" href="CSS/adminAddUser.css">
	<style type="text/css">
        .box {
            display: none;
        }
    </style>
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('input[type="radio"]').click(function(){
				var val = $(this).attr("value");
				var target = $("." + val);
				$(".box").not(target).hide();
				$(target).show();
			});
			
      	});
	</script>
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
	<h2>Add A New User</h2>
</div>
<div class="content">
	<div class="addBlock">
            <center><a href="admin.php"><button>Admin Home Page</button></a></center>
        </div>
	
	<center><h3>Complete The Form Below To Add A New User.</h3></center>
		<div class="addNewUser">
			<form action="" method="POST" enctype="multipart/form-data">
			<div class="insertUser">
				<label>User Name</label>
				<input type = "text" name="userName" placeholder="enter name" required><br>
					
				<label>User Address</label>
				<input type = "text" name="userAdd" placeholder="enter address"required><br>
					
				<label>User Email</label>
				<input type = "email" name="userEmail" placeholder="name@example.com"required><br>
				<label>User Password</label>
				<input type = "password" name="userPW" placeholder="enter password"required><br>
				<label>User Phone</label>
				<input type = "text" name="userPhone" placeholder="enter phone"required><br>
				<label>User Country</label>
				<input type = "text" name="userCountry" placeholder="enter country"required><br>
				
				<div class="usertype">
				<label>User Type </label><br>
				<input type = "radio" class="form-check-input" name="userType" id="client" value="client"required>
				<label for="client">Client</label>
				
				<input type = "radio" class="form-check-input" name="userType" id="company" value="company"required>
				<label for="client">Company</label>
				
				<input type = "radio" class="form-check-input" name="userType" id="worker" value="worker"required>
				<label for="client">Worker</label>
				</div>

				<div class="client box">
				<label>Client's photo</label>
				<input type = "file" name="client_photo" id="client_photo"><br>
				</div>

				<div class="company box">
				<label>Company's photo</label>
				<input type = "file" name="company_photo" id="companyPhoto"><br>
				<label>Company's Description</label>
				<input type = "text" name="compDesc" placeholder="enter company's description"><br>
				</div>

				<div class="worker box">
				<label>Worker's Position</label>
				<input type = "text" name="worker_position" placeholder="enter worker's position"><br>
				<label>Worker's Department</label>
				<input type = "text" name="worker_department" placeholder="enter worker's department"><br>
				<label>Worker's Date of Birth</label>
				<input type = "text" name="workerDOB" placeholder="1990-09-09"><br>
				</div>

				<input type="submit"class="addSubmit" name="insert" value="Save" />
				
				</div>
			</form>
		</div>	
	</div>		

</body>
</html>

					
		
	
