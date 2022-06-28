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
      <link rel="stylesheet" href="CSS/admin.css">
      <title>Administration | Management Department </title>
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
    <h2>Welcome Back! Select An Option To Continue</h2>
  </div>

  <div class="content">
    <div class="admin">
        <a href="adminBlock.php"><button>Blocks</button></a>
        <a href="adminOrchard.php"><button>Orchards</button></a>
        <a href="adminClient.php"><button>Clients</button></a>
        <a href="adminCompany.php"><button>Company</button></a>
        <a href="adminWorker.php"><button>Workers</button></a>
        <a href="assignBlockClient.php"><button>Transaction</button></a>
        <a href="Report.php"><button>Report</button></a>
        <a href="assignTreeWorker.php"><button>Tree Management</button></a>
    </div>

    <form method="POST">
        <button type="submit" class="btn" name="Logout">Logout</button>
    </form>

</div>
</body>
</html>
