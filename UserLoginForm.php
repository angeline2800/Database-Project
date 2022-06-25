<?php
include"dbConnection.php";

session_start();
//Getting Input value
if(isset($_POST['Login'])){
  $userID=mysqli_real_escape_string($conn,$_POST['userID']);
  $userPW=mysqli_real_escape_string($conn,$_POST['userPW']);
  if(empty($userID)&&empty($userPW)){
  $error= 'Fileds are Mandatory';
  }else{
 //Checking Login Detail
 $result=mysqli_query($conn,"SELECT*FROM user WHERE userID='$userID' AND userPW='$userPW'");
 $row=mysqli_fetch_assoc($result);
 $count=mysqli_num_rows($result);
 if($count==1){
      $_SESSION['user']=array(
   'userID'=>$row['userID'],
   'userPW'=>$row['userPW'],
   'userType'=>$row['userType']
   );
   $userType=$_SESSION['user']['userType'];
   //Redirecting User Based on Role
	switch($userType){
  		case 'company':
  		header('location:company.php');
  		break;
  		case 'worker':
  		header('location:worker.php');
  		break;
  		case 'client':
  		header('location:client.php');
  		break;
  		case 'admin':
		header('location:admin.php');
		break;
 }
 }else{
 $error='Your UserID or Password is Wrong!';
 }
}
}
?>

<html>
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="CSS/login.css">
	<title>User Login Form</title>
    
    
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
	<h2>User Login Form</h2>
</div>

<form method="post">
	<div class = "error">
    <center><?php if(isset($error)){ echo $error; }?></center>
</div>

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