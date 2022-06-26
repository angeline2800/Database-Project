
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="stylesheet" href="CSS/assign.css">
		<link rel="shortcut icon" href="photo/tree.ico" />
		<title>Assign Block Client Form | Administration | Tree Profiling Management System </title>
		<style>
			* { margin: 0px; padding: 0px; }
			.slogan {
			    font: bold 45px 'Comfortaa',cursive;
			    color:#200062;
			    padding-right: 180px;
			}
			.slogan img
			{
			    width: 120px;
			    height: 100px;
			    float: left;
			    margin-left: 30px;
			    padding-left: 120px;
			}
			.slogan2 {
			    font-size: 30px;
			    padding-right: 270px;
			    font-family:'Courier New', Courier, monospace;
			    color:#454545;
			    padding-top: 3px;
			    margin-top: 5px;
			}
			.header-border {
			    background:#DCCCFF;
			    padding: 30px;
			    text-align: center;
			    border: 1px,solid;
			    padding-bottom: 19px;
			}
				
			.header {
            width: 40%;
            margin: 30px auto 0px;
            color: white;
            background: #5F9EA0;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;
            padding: 25px;
        }
         .content {
            width: 40%;
            margin: 0px auto;
            margin-bottom: 20px;
            padding: 25px;
            padding-bottom: 50px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }
		
		.assignTreeWorker {
			width: 90%;
			margin: 8px 70px;
			padding: 0px;
			margin-right: 0px;
			border: 1px,solid,black;
		}

			form{
				max-width: 400px;
				width: 100%;
				text-align: left;
				background: white;
				padding: 25px 30px;
				border-radius: 5px;
				display: block;
				/* background-color: #fff2e6; */
			}
			input[type=text], input[type=date] {
				width: 100%;
				padding: 12px 16px;
				margin: 8px 0;
				display: block;
				border: 1px solid black;
				box-sizing: border-box;
				font-size: 14px;
			}
			button{
				background-color: #1260cc;
				margin-bottom: 20px;
				padding: 10px 30px;
				color: white;
				border-radius: 5px;
				border: none;
				text-decoration: none;
				cursor: pointer;
				font-size: 15px;
				margin-left:130px;
				margin-top:20px;
				display: inline;
			}
			.assignBlockClient button
			{
				padding-left: 50px;
				padding-right: 50px;
				padding-top: 10px;
				padding-bottom: 10px;
				font-size: 20px;
				color: white;
				background: #5F9EA0;
				border: none;
				border-radius: 5px;
				margin-left: 18px;
				margin-top: 30px;
				margin-bottom: 5px;
				cursor: pointer;
				display:inline-block;
			}
			.assignBlockClient button:hover
			{
				background-color: #5353FF;
			}

		</style>
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
		<h2>Assignment Form </h2>
 </div>
		<div class="content">
		
			<center><h3>Block_Client</h3></center>
			<form action="" method="post">
			<div class="assignBlockClient">
			<p>Enter BlockID: <input type="text" name="blockId"></p>
			<p>Enter client's userID: <input type="text" name="userId"></p>
			<p>Enter purchase date: <input type="date" name="purchaseDate"></p>
			<p>Enter total price (RM): <input type="text" name="totalPrice"></p>
			<button type="submit" name="assign"> Assign </button>
			<a href="assignBlockClient.php"><button>Back</button></a>
			</div>
			</form>
			
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
