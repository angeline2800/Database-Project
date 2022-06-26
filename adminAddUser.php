<?php
	include "dbConnection.php";
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if(isset($_POST['insert'])){
		
		$userName = $_POST['userName'];
		$userAdd = $_POST['userAdd'];
		$userEmail = $_POST['userEmail'];
		$userPW = $_POST['userPW'];
		$encrypted_pwd = md5($userPW);
		$userPhone = $_POST['userPhone'];
		$userCountry = $_POST['userCountry'];
		$userType = $_POST['userType'];
		
		$client_photo = $_POST['client_photo'];
		
		$sql = "INSERT INTO `user`(`userID`, `userName`, `userAdd`, `userEmail`, `userPW`, `userPhone`, `userCountry`, `userType`)
				VALUES (NULL, '$userName', '$userAdd', '$userEmail', '$encrypted_pwd', '$userPhone', '$userCountry', '$userType')";
				
		$result = mysqli_query($conn, $sql);
		
		if($result){
				header("Location: admin.php?msg=New record created successfully");
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
<center><h3>Complete The Form Below To Add A New User.</h3></center>
	<div class="addNewUser">
			<form action="" method="post">
			<div class="insertUser">
				<label>User Name</label>
				<input type = "text" name="userName" placeholder="enter name">
					
				<label>User Address</label>
				<input type = "text" name="userAdd" placeholder="enter address">
					
				<label>User Email</label>
				<input type = "email" name="userEmail" placeholder="name@example.com">
				<label>User Password</label>
				<input type = "password" name="userPW" placeholder="enter password">
				<label>User Phone</label>
				<input type = "text" name="userPhone" placeholder="enter phone">
				<label>User Country</label>
				<input type = "text" name="userCountry" placeholder="enter country">
				<div class="usertype">
				<label>User Type </label><br>
				<input type = "radio" class="form-check-input" name="userType" id="client" value="client">
				<label for="client">Client</label>
				
				<input type = "radio" class="form-check-input" name="userType" id="company" value="company">
				<label for="client">Company</label>
				
				<input type = "radio" class="form-check-input" name="userType" id="worker" value="worker">
				<label for="client">Worker</label>
				</div>

				<input type="submit"class="addSubmit" name="insert" value="Save" />
				<a href="admin.php"><button>Cancel</button></a>
				</div>
			</form>
		</div>	
	</div>		
<<<<<<< HEAD
</body>
</html>
=======
					
		
	<!--Boostrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>
</html>
>>>>>>> d7d8e3d68365e8613d7072fda3b9ce521d0ef738
