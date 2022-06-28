<?php
include"dbConnection.php";

session_start();

//Getting Input value
if(isset($_POST['Login'])){
  $userID=mysqli_real_escape_string($conn,$_POST['userID']);
  $userPW=mysqli_real_escape_string($conn,$_POST['userPW']);

  if(empty($userID)&&empty($userPW)){
    echo"<script type=\"text/javascript\">
      alert(\"Fields Are Mandatory...!\");
      window.location = 'UserLoginForm.php';
      </script>";
  }
  else{
    //Checking Login Detail
    $encryptedPW = SHA1($_POST['userPW']);
    $result=mysqli_query($conn,"SELECT*FROM User WHERE userID='$userID' AND userPW='$encryptedPW'");
    $row=mysqli_fetch_assoc($result);
    $count=mysqli_num_rows($result);
    if($count==1){
      $_SESSION['user']=array(
        'userID'=>$row['userID'],
        'userPW'=>$row['userPW'],
        'userType'=>$row['userType']
      );
      if ($_SESSION['user']['userID'] && $_SESSION['user']['userType'] == 'admin') {
        echo "
          <script type=\"text/javascript\">
          alert(\"Login Successfully...!\");
          window.location = 'admin.php';
          </script>
        ";
      }
      else if ($_SESSION['user']['userID'] && $_SESSION['user']['userType'] == 'worker') {
        echo "
          <script type=\"text/javascript\">
          alert(\"Login Successfully...!\");
          window.location = 'worker.php';
          </script>
        ";
      }
      else if ($_SESSION['user']['userID'] && $_SESSION['user']['userType'] == 'client') {
        echo "
          <script type=\"text/javascript\">
          alert(\"Login Successfully...!\");
          window.location = 'client.php';
          </script>
        ";
      }
      else if ($_SESSION['user']['userID'] && $_SESSION['user']['userType'] == 'company') {
        echo "
          <script type=\"text/javascript\">
          alert(\"Login Successfully...!\");
          window.location = 'company.php';
          </script>
        ";
      }
    }
    else{
      echo"<script type=\"text/javascript\">
        alert(\"Login Failed, UserID & Password Are Not Match...!\");
        window.location = 'UserLoginForm.php';
        </script>";
    }
  }
}
?>

<html>
<head>
  <meta charset="utf-8">
	<link rel="stylesheet" href="CSS/Login.css">
	<link rel="shortcut icon" href="photo/tree.ico" />
	<title>User Login Form | Tree Profiling Management System</title>  
</head>

<body>
  <header class="header-border">
    <div class="header-content">
      <h1 class="slogan"><span><img src="photo/headerLogo.png" alt="System - Logo" height="90"></span>TREE PROFILING MANAGEMENT SYSTEM</h1>
        <div class="slogan2">
          <b><p>YOUR GOOD HELPER IN LIFE</p></b>
        </div>
    </div>
  </header>

  <div class="header">
    <h2>User Login Form</h2>
  </div>

  <form method="post">
    <div class="input-group">
      <label>User ID:</label>
      <input type="text" name="userID">
    </div>
    
    <div class="input-group">
      <label>Password:</label>
      <input type="password" name="userPW">
    </div>
      
    <div class="input-group">
      <button type="submit" class="btn" name="Login">Login</button>
    </div>
  </form>

  <div class="container">
    <p><u>
      Any Problems, Please Inform Our Admin For Further Help.</u>
		</p>   
  </div>

</body>
</html>
