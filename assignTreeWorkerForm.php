<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="utf-8">
		<link rel="shortcut icon" href="photo/tree.ico" />
		<title>Assign Tree Worker Form | Administration | Tree Profiling Management System </title>
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
			.content{
				margin-top: 50px;
				margin-bottom: 50px;
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
				background-color: #fff2e6;
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
			<h3>Tree_Worker</h3>
			<form action="" method="post">
			<p>Enter TreeID: <input type="text" name="treeId"></p>
			<p>Enter worker's userID: <input type="text" name="userId"></p>
			<p>Enter date of responsibility: <input type="date" name="startDate"></p>
			<button type="submit" name="assign"> Assign </button>
			</form>
			<p><a href="assignTreeWorker.php">Back</a></p>
	<?php
		include "dbConnection.php";
		/* session_start();
		if (isset($_SESSION['userID'] && ($_SESSION['userType'] == 'admin'))){ */
			if ($_SERVER["REQUEST_METHOD"] == "POST") {
				$treeid= $_POST["treeId"];
				$userid= $_POST["userId"];
				$date = $_POST["startDate"];
					
				if (empty($treeid)){
					echo "<p style='color:red; font-weight: bold;'>TreeID is required!</p>"; 
					exit();
				}
				else if (empty($userid)){
					echo "<p style='color:red; font-weight: bold;'>userID is required!</p>"; 
					exit();
				}
				else if (empty($date)){
					echo "<p style='color:red; font-weight: bold;'>Date of responsibility is required!</p>"; 
					exit();
				}
					
				else{
					if(isset($_POST["assign"])){
						$treeid = $_POST["treeId"];
						$userid = $_POST["userId"];
						$date = $_POST["startDate"];
							
						$sql = "SELECT * FROM Tree t, Worker w WHERE t.TreeID='$treeid' AND w.userID='$userid'"; 
						$result = mysqli_query($conn, $sql);
										
						if (mysqli_num_rows($result) > 0){
							$sql = "INSERT INTO Tree_Worker(userID,TreeID,Worker_startDate)
										VALUES ('$userid','$treeid', '$date')";
							mysqli_query($conn, $sql);
							echo "<h2 style='margin-bottom:50px;'>Assign successfully!</h2>";
						} //if
						else{
							echo "<h2 style='margin-bottom:50px;'>The TreeID or userID is invalid! Please check again!</h2>";
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
