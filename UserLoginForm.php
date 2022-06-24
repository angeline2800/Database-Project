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
	<title>User Login Form</title>
    
    <style>
        * { margin: 0px; padding: 0px; }
body {
	font-size: 120%;
	background: #F8F8FF;
}
.header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: #5F9EA0;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
#user_type {
	height: 40px;
	width: 98%;
	padding: 5px 10px;
	background: white;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}
.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: #5F9EA0;
	border: none;
	border-radius: 5px;
}
.error {
	width: 92%; 
	margin: 0px auto; 
	padding: 10px; 
	border: 1px solid #a94442; 
	color: #a94442; 
	background: #f2dede; 
	border-radius: 5px; 
	text-align: left;
}
.success {
	color: #3c763d; 
	background: #dff0d8; 
	border: 1px solid #3c763d;
	margin-bottom: 20px;
}
.profile_info img {
	display: inline-block; 
	width: 50px; 
	height: 50px; 
	margin: 5px;
	float: left;
}
.profile_info div {
	display: inline-block; 
	margin: 5px;
}
.profile_info:after {
	content: "";
	display: block;
	clear: both;
}
    </style>
</head>
<body>
<div class="header">
	<h2>User Login Form</h2>
</div>
<form method="post">
    <center><?php if(isset($error)){ echo $error; }?></center>
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
	<p>
		Don't have an account? <a href="register.php">Register</a>
	</p>
    
</form>
</body>
</html>