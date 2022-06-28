<?php include"dbConnection.php";

	session_start();

	if(isset($_POST['Logout']))
	{
	header('location:UserLogout.php');
	}
?>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="photo/tree.ico" />
    <link rel="stylesheet" href="CSS/worker.css">
    <title>Worker | Management of Trees |Tree Profiling Management System </title>
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

	<center>    
		<div class="header">
			<h2>Welcome Back! What do you want to do ?</h2>
		</div>

		 <div class="content">          
		  	<div class="workerTree">
		      	<a href="workerInsertTreeData.php"><button>Add Trees</button></a>
		      	<a href="workerUpdateTreeData.php"><button>Update Trees</button></a>
		      	<a href="workerDeleteTreeData.php"><button>Delete Trees</button></a>
			</div>
			<form method="POST">
				<button type="submit" class="btn" name="Logout">Logout</button>
			</form>
		</div>
	</center>
       
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>
