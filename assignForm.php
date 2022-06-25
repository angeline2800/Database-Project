
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Assign Block Client Form</title>
		<style>
			.content{
				display: flex;
				justify-content: flex-start;
				flex-direction: column;
				align-items: center;
			}
			form{
				max-width: 400px;
				width: 100%;
				text-align: left;
				background: white;
				padding: 25px 30px;
				border-radius: 5px;
				display: block;
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
				padding: 10px 15px;
				color: white;
				border-radius: 5px;
				border: none;
				text-decoration: none;
				cursor: pointer;
				font-size: 15px;
			}
		</style>
	</head>
	<body>
		<div class="content">
			<h1>Assignment Form</h1>
			<form action="" method="post">
			<p>Enter BlockID: <input type="text" name="blockId"></p>
			<p>Enter client's userID: <input type="text" name="userId"></p>
			<p>Enter purchase date: <input type="date" name="purchaseDate"></p>
			<p>Enter total price (RM): <input type="text" name="totalPrice"></p>
			<button type="submit" name="assign"> Assign </button>
			</form>
			<p><a href="assign.php">Back</a></p>
	<?php
		include "dbConnection2.php";
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
		header("Location: login.php");
		exit();
	} */
?>

		</div>
	</body>
</html>