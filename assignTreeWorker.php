<?php include "dbConnection.php";?>
	
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="photo/tree.ico" />
		<title>Assignment Tree Worker | Administration | Tree Profiling Management System</title>
		<style>
			* { margin: 0px; padding: 0px; }
			body 
			{
				font-size: 120%;
				background: #E8DDFF;
			}
			.slogan 
			{
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
			.slogan2 
			{
				font-size: 30px;
				padding-right: 270px;
				font-family:'Courier New', Courier, monospace;
				color:#454545;
				padding-top: 3px;
				margin-top: 5px;
			}
			.header-border 
			{
				background:#DCCCFF;
				padding: 30px;
				text-align: center;
				border: 1px,solid;
				padding-bottom: 19px;
			}
			.header 
			{
				width: 60%;
				margin: 30px auto 0px;
				color: white;
				background: #5F9EA0;
				text-align: center;
				border: 1px solid #B0C4DE;
				border-bottom: none;
				border-radius: 10px 10px 0px 0px;
				padding: 25px;
			}
			.content
			{
				width: 60%;
				margin: 0px auto;
				margin-bottom: 50px;
				padding: 25px;
				padding-bottom: 30px;
				border: 1px solid #B0C4DE;
				background: white;
				border-radius: 0px 0px 10px 10px;
			}
			table
			{
				width: 100%;
				background: white;
				font-family: verdana;
				border:1px solid black;
			}
			table th
			{
				padding-top: 12px;
				padding-bottom: 12px;
				background-color:#FFC1C1;
				color: black;
				text-align: center;
				font: 15px verdana;
				border:1px solid black;
			}
			table td
			{
				text-align: center;
				padding: 0px;
				font-size: 12px;
				border:1px solid black;
			}
			table tr:nth-child(even)
			{
				background-color:#D7C4FF;
			}
			table tr:nth-child(odd)
			{
				background-color: #fff2e6;
			}
			button
			{
				background-color: #1260cc;
				margin-top: 40px;
				padding: 10px 15px;
				color: white;
				border-radius: 5px;
				border: none;
				text-decoration: none;
				cursor: pointer;
				font-size: 15px;
				margin-left:360px;
			}
			button:hover
			{
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
			<h2>Assignment of Tree and Worker</h2>
		</div>

		<div class="content">
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
				$sql = "SELECT Tree.TreeID, Tree.tree_Image, Tree.spesiesName, Worker.userID,
				User.userName, Tree_Worker.Worker_startDate FROM User
				INNER JOIN Worker ON User.userID = Worker.userID
				INNER JOIN Tree_Worker ON User.userID = Tree_Worker.userID
				INNER JOIN Tree ON Tree.TreeID = Tree_Worker.TreeID
				ORDER BY Tree_Worker.Worker_startDate ASC";
				$result = mysqli_query($conn, $sql);
								
				if (mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_assoc($result))
					{
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

			<a href="assignTreeWorkerForm.php"><button> Assign tree to worker </button></a>
			<a href="admin.php"><button> Back to Admin Page </button></a>

			<?php
				} //if
				else
				{
					echo "<h2>No Records Found!</h2>";
				}
			?>
		</div>
</body>
</html>
