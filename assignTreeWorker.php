<?php
	include "dbConnection.php";
	/* session_start();
	if (isset($_SESSION['userID'] && ($_SESSION['userType'] == 'admin'))){ */
	
		?>
		<html>
		<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<title>Assignment Tree Worker | Administration | Tree Profiling Management System</title>
		
		<style>
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
				background-color: #ffa557;
				color: white;
				text-align: center;
				font: 16px verdana;
			}
			table td{
				text-align: center;
				padding: 5px;
				font-size: 12px;
			}
			table tr:nth-child(even){
				background-color: #ffd7b3;
			}
			table tr:nth-child(odd){
				background-color: #fff2e6;
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
			
		</style>
		</head>
		<body>
		<div class="content">
			<h1>Assignment of Tree and Worker</h1>
			<table>
			<tr>
				<th>TreeID</th>
				<th>Tree Image</th>
				<th>Species Name</th>
				<th>UserID</th>
				<th>Worker Name</th>
				<th>Date of Responsibility</th>
			</tr>
		<?php
		$sql = "SELECT Tree.TreeID, Tree.tree_Image, Tree.spesiesName, Worker.userID, User.userName, Tree_Worker.Worker_startDate
		FROM User
		INNER JOIN Worker ON User.userID = Worker.userID
		INNER JOIN Tree_Worker ON User.userID = Tree_Worker.userID
		INNER JOIN Tree ON Tree.TreeID = Tree_Worker.TreeID
		ORDER BY Tree_Worker.Worker_startDate ASC";
		
		
		$result = mysqli_query($conn, $sql);
							
		if (mysqli_num_rows($result) > 0){
		
				while($row = mysqli_fetch_assoc($result)){
					echo "<tr>";
					echo "<td>" .$row["TreeID"]. "</td>";
					echo "<td>" .'<img width = "50px" height = "50px" src = "' . $row['tree_Image']. '"/>'. "</td>";
					echo "<td>" .$row["spesiesName"]. "</td>";
					echo "<td>" .$row["userID"]. "</td>";
					echo "<td>" .$row["userName"]. "</td>";
					echo "<td>" .$row["Worker_startDate"]. "</td>";
					echo "</tr>";
				} //while
				?>
			</table>
			<a href="assignTreeWorkerForm.php">
			<button> Assign tree to worker </button></a>
		<?php
		} //if
		else{
			echo "<h2>No Records Found!</h2>";
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