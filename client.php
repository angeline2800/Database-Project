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
    <link rel="stylesheet" href="CSS/Client.css">
    <title>Clients | Tree Profiling Management System </title>
    <style>
      form{
            width: 80%;
        }
      .header {
            width: 80%;
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

  <center>    
    <div class="header">
	<h2>Welcome Back! Here Is Your Record</h2>
</div>
  <form method="POST">
            <table>
                <tr>
                    <th>Block ID</th>
                    <th>Tree ID</th>
                    <th>Tree Image</th>
                    <th>Species Name</th>
                    <th>Plant Date</th>
                    <th>Tree Height</th>
                    <th>Diameter</th>
                    <th>Status</th>
                    <th>GPS Location</th>
                    <th>Tree Type</th>
                </tr>

                <?php
                  if(isset($_SESSION['user']['userID'])) 
                  {
                   $userid = $_SESSION['user']['userID'];
                   $query = "SELECT t.*, b.BlockID FROM Tree t
                   INNER JOIN `Block` b ON  t.BlockID = b.BlockID
                   INNER JOIN Block_Client ON b.BlockID = Block_Client.BlockID
                   WHERE userID = $userid";
                   $result = mysqli_query($conn, $query);
           
                   if(mysqli_num_rows($result) > 0){
                     while($row = mysqli_fetch_array($result))
                     {
                       
                       echo"<tr>";
                       echo "<td>" .$row['BlockID']."</td>";
                       echo "<td>" .$row["TreeID"]. "</td>";
					             echo "<td>" .'<img width = "50px" height = "50px" src = "' . $row['tree_Image']. '"/>'. "</td>";
				               echo "<td>" .$row["spesiesName"]. "</td>";
                       echo "<td>" .$row["plantDate"]. "</td>";
                       echo "<td>" .$row["tree_height"]. "</td>";
                       echo "<td>" .$row['diameter']."</td>";
                       echo "<td>" .$row['status']."</td>";
                       echo "<td>" .$row['GPS_location']."</td>";
                       echo "<td>" .$row['tree_type']."</td>";
                       echo"</tr>";
                       }      
                   }
                   else{
                       echo "<h2>No Records Found!</h2>";
                   }
                 }
                ?>
            </table> 
          <button type="submit" class="btn" name="Logout">Logout</button>
            </center>
</form>
            
            
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
</html>