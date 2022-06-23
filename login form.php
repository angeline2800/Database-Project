<?php
include"dbConnection.php";

if(isset($_POST['Login']))
{
    $userID = $_POST['userID'];
    $userPW = $_POST['userPW'];
    $usertype = $_POST['usertype'];
    $query = "SELECT * FROM user WHERE userID='".$userID."' and userPW= '".$userPW."' and userType='".$usertype."'";
    $result = mysqli_query($conn, $query);
    if($result)
    {
        while($row=mysqli_fetch_array($result))
        {
            echo'<script type="text/javascript">alert("You are login successfully and you are logined as ' .$row['userType'].'")</script>';
        }

        if($usertype=="worker") 
        {
            ?>
            <script type="text/javascript">window.location.href="worker.php"</script> 
        <?php
        }else if($usertype=="client"){
            ?>
            <script type="text/javascript">window.location.href="client.php"</script>
        <?php
        }else if($usertype=="company"){
            ?>
            <script type="text/javascript">window.location.href="company.php"</script>
        <?php
        }
        }
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>User Login Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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
            <label>Role:</label>
            <select name="usertype">
              <option value="">Select Role:</option>
              <option value="company">Company</option>
              <option value="worker">Worker</option>
              <option value="client">Client</option>
            </select>
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