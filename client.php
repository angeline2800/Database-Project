<?php include"dbConnection.php";

session_start();

function display_client()
{
      global $conn;

 
            
          if($_SERVER["REQUEST_METHOD"]=="POST") 
          {

      $query = "SELECT * FROM block_client WHERE userID=".$_SESSION['userID'];
      $result = mysqli_query($conn, $query);

      if($result-> num_rows > 0){
          while($row = mysqli_fetch_array($result))
          {
            echo"<tr>";
            echo "<td>" .$row['userID']."</td>";
            echo "<td>" .$row['BlockID']."</td>";
            echo "<td>" .$row['purchaseDate']."</td>";
            echo "<td>" .$row['blockQty']."</td>";
            echo "<td>" .$row['totalPrice']."</td>";
            echo"</tr>";
            }      
          }

    }
  }
 

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
    <link rel="stylesheet" href="CSS/Client.css">
    <title>Clients | Tree Profiling Management System </title>
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
	<h2>Welcome Back! Here Is Your Record</h2>
</div>
  <form method="POST">
            <table>
                <tr>
                    <th>User ID</th>
                    <th>Block ID</th>
                    <th>Purchase Date</th>
                    <th>Block Quantity</th>
                    <th>Total Price</th>
                </tr>
          
                <tr>
                    <th>TRY</th>
                    <th>TRY</th>
                    <th>TRY</th>
                    <th>TRY</th>
                    <th>TRY</th>
                </tr>
                   <?php display_client();?>
            </table> 
          <button type="submit" class="btn" name="Logout">Logout</button>
            </center>
</form>
            
            
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>