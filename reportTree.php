<?php 
include "dbConnection.php";

function display_tree()
{
  global $conn;

//   if (isset($_POST['daily_r'])) 
//   {
      
//     if($_SERVER["REQUEST_METHOD"]=="POST") 
//     {
        
    $sql = "SELECT user.userID, user.userName,
    COUNT(tree.treeID) AS 'totalTree'
FROM
    user
INNER JOIN orchard ON user.userID = orchard.userID
INNER JOIN block ON block.orchardID=orchard.orchardID
INNER JOIN tree ON tree.blockID=block.blockID
GROUP BY
    userID";
     $result = $conn->query($sql) ;
        
        echo "Report - Tree";
      
        if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc())
            {
              echo"<tr>";
              echo" <td>".$row['userID']."</td>";
              echo" <td>".$row['userName']."</td>";
              echo" <td>".$row['totalTree']." </td>";
              echo"</tr>";
            }
        }
        else
        {
          echo "<tr>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo "<td>---- No record available. ----</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo "</tr>";
        }

 
      }  
      $sqlChart ="SELECT user.userID,
      COUNT(tree.treeID) AS 'totalTreeC'
  FROM
      user
  INNER JOIN orchard ON user.userID = orchard.userID
  INNER JOIN block ON block.orchardID=orchard.orchardID
  INNER JOIN tree ON tree.blockID=block.blockID
  GROUP BY
      userID";
	$resultChart = $conn->query($sqlChart);
	$userID = array();
	$totalTreeC = array();


	if ($resultChart->num_rows > 0) {
		while($row = mysqli_fetch_array($resultChart)){
			$userID[] = $row['userID'];
			$totalTree[] = $row['totalTreeC'];
		}	
    }

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reports | Trees | Tree Profiling Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="photo/tree.ico" />
  <link rel="stylesheet" href="CSS/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
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

  <div class="transaction">
    <div class="tranTitle"> 
      <h3>Record - Trees</h3>
    </div> <br>

    <table style="width:100%">
      <tr>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Total Trees</th>
      </tr>
      <?php display_tree()?>
    </table>

    <div class="chart">
			<h4>Report Of Trees Owned By Companies</h4>
	
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
			<script>
			var barColors = "#57C7FF";

        new Chart("myChart", {
        type: "bar",
        data: {
            labels:<?php echo json_encode($userID); ?>,
            datasets: [{
            backgroundColor: barColors,
            data: <?php echo json_encode($totalTree); ?>
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Total Trees Owned By Companies"
            },
                        scales: {
                                yAxes: [{
                                    display: true,
                                    ticks: {
                                        beginAtZero: true,
                                    
                                    }
                                }]
                            }
        }
        });

			</script>

    <!-- <br />
    <a href="reportD.php" target="_blank"><button class="generateBtn">Generate Transaction Report</button></a>

    <br /> -->
    <div class="viewOpt">
      <a href="reportBlock.php"><button>Blocks of tree</button></a>
      <a href="reportOrchard.php"><button>Orchard of tree</button></a>
      <a href="reportTree.php"><button>Trees</button></a>
      <a href="reportTreePlantDate.php"><button>PlantingDate</button></a>
    </div>
  </div>
  <button type="submit" class="btn" name="Logout">Logout</button>

  <!-- <footer>
    <div class="footer">
      <h2>Contact Us</h2> 
      <hr size="2" width="30%" color=black>
      <p class="bold">Penny Juice of America
      <p><i class="fa fa-location-arrow"></i> Address: 915 40th Ave Bettendorf, IA 52722
      <p><i class="fa fa-envelope"></i> Email: <u>pennyjuice@hotmail.com</u>
      <p><i class="fa fa-phone"></i> Phone: 563-386-1999
      <i class="fa fa-fax"></i> Fax:563-386-6200 
      <br /> <br />
      <img src="../Images/PaymentOpts.png" alt="payment method" height="35">
    <div> <br />

    <div class="policy"> 
      <a href="https://b.link/privacy-policy" target="_blank">Privacy Policy</a>  |
      <a href="https://b.link/cookie-policy" target="_blank">Cookie Policy</a>  |
      <a href="https://b.link/conditions" target="_blank">Conditions of Use</a>  |
      <a href="https://b.link/infringement" target="_blank">Notice and Take Down Policy</a>  |
      <a href="https://b.link/website-accessibility-ae" target="_blank">Website AccessibilityPolicy</a> 
    </div> 

    <div class="policy">
      <p> &copy; 2021 The content on this website is owned by us and our licensors. Do not copy any content (including images) without our consent.
    </div> 
  </footer> -->

</body>
</html>