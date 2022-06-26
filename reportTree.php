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

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['back']))
        {
          header('location:admin.php');
        }
        }

?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Reports | Trees | Tree Profiling Management System</title>
  <link rel="shortcut icon" href="photo/tree.ico" />
  <link rel="stylesheet" href="CSS/report.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
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
	<h2>Record - Trees</h2>
</div>

<div class="content">
    <table style="width:100%">
      <tr>
        <th>Company ID</th>
        <th>Company Name</th>
        <th>Total Trees</th>
      </tr>
      <?php display_tree()?>
    </table>

    <div class="chart">
			<center><h4>Report Of Trees Owned By Companies</h4></center>
	
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
            </div>

<div class="admin">
   
   <a href="reportBlock.php"><button>Blocks of tree</button></a>
   <a href="reportOrchard.php"><button>Orchard of tree</button></a>
   <a href="reportTree.php"><button>Trees</button></a>
   <a href="reportTreePlantDate.php"><button>PlantingDate</button></a>
 </div>
  <form action="" method="post">
  <button type="submit" class="btn" name="back">Back to Admin Page</button>
  </form>
</div>

</body>
</html>