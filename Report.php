<?php include "dbConnection.php"; ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="CSS/worker.css">
  <link rel="shortcut icon" href="photo/tree.ico" />
  <title>Reports | Administration | Tree Profiling Management System</title>
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
	<h2>Reports</h2>
</div>
<div class="content">
    <div class="btn">
      <a href="reportBlock.php"><button>Blocks of tree</button></a>
      <a href="reportOrchard.php"><button>Orchard of tree</button></a>
      <a href="reportTree.php"><button>Trees</button></a>
      <a href="reportTreePlantDate.php"><button>PlantingDate</button></a>
    </div>


  <button type="submit" class="btn" name="Logout">Logout</button>
</div>
</body>
</html>