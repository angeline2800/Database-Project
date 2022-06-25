<?php
	include "dbConnection.php";
	/* session_start();
	if (isset($_SESSION['userID'] && ($_SESSION['userType'] == 'admin'))){ */
	
		?>
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Assignment Block Client</title>
		<style>
			.content{
				display: flex;
				justify-content: flex-start;
				flex-direction: column;
				align-items: center;
			}
			table{
				width: 50%;
				background: white;
				font-family: verdana;
			}
			table th{
				padding-top: 12px;
				padding-bottom: 12px;
				background-color: #4e5ec8;
				color: white;
				text-align: center;
				font: 16px verdana;
			}
			table td{
				text-align: center;
				padding: 5px;
				font-size: 14px;
			}
			table tr:nth-child(even){
				background-color: #c4caed;
			}
			table tr:nth-child(odd){
				background-color: #ebedf9;
			}
			button {
				background-color: #1260cc;
				margin-top: 20px;
				padding: 10px 15px;
				color: white;
				border-radius: 5px;
				border: none;
				text-decoration: none;
				cursor: pointer;
				font-size: 15px;
			}
			button:hover{
				background-color: #051094;
			}
			a{
				
			}
		</style>
		</head>
		<body>
		<div class="content">
			<h1>Assignment of Block and Client</h1>
			<table>
			<tr>
				<th>BlockID</th>
				<th>UserID</th>
				<th>Client Photo</th>
				<th>Client Name</th>
				<th>Purchase Date</th>
			</tr>
		<?php
		$sql = "SELECT User.userID, User.userName, Block.BlockID, Block_Client.purchaseDate, Client.client_photo
		FROM User
		INNER JOIN Client ON User.userID = Client.userID
		INNER JOIN Block_Client ON User.userID = Block_Client.userID
		INNER JOIN Block ON Block.BlockID = Block_Client.BlockID";
		
		$result = mysqli_query($conn, $sql);
							
		if (mysqli_num_rows($result) > 0){
		
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>" .$row["BlockID"]. "</td>";
					echo "<td>" .$row["userID"]. "</td>";
					echo "<td>" .'<img width = "50px" height = "50px" src = "' . $row['client_photo']. '"/>'. "</td>";
					echo "<td>" .$row["userName"]. "</td>";
					echo "<td>" .$row["purchaseDate"]. "</td>";
					echo "</tr>";
				} //while
				?>
			</table>
			<a href="assignForm.php">
			<button> Assign block to client </button></a>
		<?php
		} //if
		else{
			echo "<h2>No Records Found!</h2>";
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
