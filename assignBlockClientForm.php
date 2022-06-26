
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/assign.css">
		<link rel="shortcut icon" href="photo/tree.ico" />
		<title>Assign Block Client Form | Administration | Tree Profiling Management System </title>
		
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
		<div class="content">
			<h1>Assignment Form</h1>
			<h3>Block_Client</h3>
			<form action="" method="post">
			<p>Enter BlockID: <input type="text" name="blockId"></p>
			<p>Enter client's userID: <input type="text" name="userId"></p>
			<p>Enter purchase date: <input type="date" name="purchaseDate"></p>
			<p>Enter total price (RM): <input type="text" name="totalPrice"></p>
			<button type="submit" name="assign"> Assign </button>
			</form>
			<p><a href="assignBlockClient.php">Back</a></p>
	<?php
		include "dbConnection.php";
		/* session_start();
		if (isset($_SESSION['userID'] && ($_SESSION['userType'] == 'admin'))){ */
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$blockid= $_POST["blockId"];
				$userid= $_POST["userId"];
				$date = $_POST["purchaseDate"];
				$price = $_POST["totalPrice"];
					
				if (empty($blockid)){
					echo "<p style='color:red; font-weight: bold;'>BlockID is required!</p>"; 
					exit();
				}
				else if (empty($userid)){
					echo "<p style='color:red; font-weight: bold;'>userID is required!</p>"; 
					exit();
				}
				else if (empty($date)){
					echo "<p style='color:red; font-weight: bold;'>Purchase date is required!</p>"; 
					exit();
				}
				else if (empty($price)){
					echo "<p style='color:red; font-weight: bold;'>Total price is required!</p>"; 
					exit();
				}
					
				else{
					if(isset($_POST["assign"])){
						$blockid = $_POST["blockId"];
						$userid = $_POST["userId"];
						$date = $_POST["purchaseDate"];
						$price = "RM".$_POST["totalPrice"];
							
						$sql = "SELECT * FROM Block b, Client c WHERE b.BlockID='$blockid' AND c.userID='$userid'"; 
						$result = mysqli_query($conn, $sql);
										
						if (mysqli_num_rows($result) > 0){
							$sql = "INSERT INTO Block_Client(userID,BlockID,purchaseDate,blockQty,totalPrice)
										VALUES ('$userid','$blockid', '$date',1,'$price')";
							mysqli_query($conn, $sql);
							echo "<h2 style='margin-bottom:50px;'>Assign successfully!</h2>";
						} //if
						else{
							echo "<h2 style='margin-bottom:50px;'>The BlockID or userID is incorrect! Please check again!</h2>";
						}
							
					}
				}
			}
			
	/* }
	else{
		header("Location: UserLoginForm.php");
		exit();
	} */
?>

		</div>
	</body>
</html>
