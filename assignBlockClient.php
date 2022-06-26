<?php
	include "dbConnection.php";
	/* session_start();
	if (isset($_SESSION['userID'] && ($_SESSION['userType'] == 'admin'))){ */
	
		?>
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="photo/tree.ico" />
		<title>Assignment Block Client | Administration | Tree Profiling Management System</title>
		
		<style>
		* { margin: 0px; padding: 0px; }
		
		body {
            font-size: 120%;
            background: #E8DDFF;
        }
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
            width: 50%;
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
            width: 50%;
            margin: 0px auto;
            margin-bottom: 50px;
            padding: 25px;
            padding-bottom: 30px;
            border: 1px solid #B0C4DE;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }
			table{
				width: 90%;
				background: white;
				font-family: verdana;
				margin-left:45px;
			}
			table th{
				padding-top: 12px;
				padding-bottom: 12px;
				background-color: #4e5ec8;
				color: white;
				text-align: center;
				font: 16px verdana;
				padding:5px 8px;
			}
			table td{
				text-align: center;
				padding: 5px;
				font-size: 14px;
				padding:5px 8px;
			}
			table tr:nth-child(even){
				background-color: #c4caed;
			}
			table tr:nth-child(odd){
				background-color: #ebedf9;
			}
			button {
				background-color: #1260cc;
				margin-top: 30px;
				padding: 10px 15px;
				color: white;
				border-radius: 5px;
				border: none;
				text-decoration: none;
				cursor: pointer;
				font-size: 15px;
				margin-left:300px;
			}
			button:hover{
				background-color: #051094;
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
		<h2>Assignment of Block and Client </h2>
	</div>

		<div class="content">
			<table>
			<tr>
				<th>BlockID</th>
				<th>UserID</th>
				<th>Client Photo</th>
				<th>Client Name</th>
				<th>Purchase Date</th>
				<th>Price</th>
			</tr>
		<?php
		$sql = "SELECT User.userID, User.userName, Block.BlockID, Block_Client.purchaseDate,  Block_Client.totalPrice, Client.client_photo
		FROM User
		INNER JOIN Client ON User.userID = Client.userID
		INNER JOIN Block_Client ON User.userID = Block_Client.userID
		INNER JOIN Block ON Block.BlockID = Block_Client.BlockID
		ORDER BY Block_Client.purchaseDate ASC";
		
		$result = mysqli_query($conn, $sql);
							
		if (mysqli_num_rows($result) > 0){
		
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>" .$row["BlockID"]. "</td>";
					echo "<td>" .$row["userID"]. "</td>";
					echo "<td>" .'<img width = "50px" height = "50px" src = "' . $row['client_photo']. '"/>'. "</td>";
					echo "<td>" .$row["userName"]. "</td>";
					echo "<td>" .$row["purchaseDate"]. "</td>";
					echo "<td>" .$row["totalPrice"]. "</td>";
					echo "</tr>";
				} //while
				?>
			</table>
			<a href="assignBlockClientForm.php">
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