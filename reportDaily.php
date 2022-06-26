<?php 
include "dbConnection.php";
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
  <title>Trees Reports | Daily | Tree Profiling Management System</title>
  <link rel="stylesheet" href="CSS/reportDWM.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <link rel="shortcut icon" href="photo/tree.ico" />
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
	<h2>Record Of Trees - Daily</h2>
</div>

<div class = "content">
    <form name="form"  method="POST">
      <div class="selectDaily">
        <h6><label for="daily">Select date:</label>
        <input type="date"  name="daily">
        <button type="submit" class="btn" name="daily_r">Submit</button></h6>
        
      </div>
    </form>

    <table style="width:100%">
     
<?php 
      if (isset($_POST['daily_r'])) 
  {
      
    if($_SERVER["REQUEST_METHOD"]=="POST") 
    {
        ?>
         <tr>
        <th>Planting Date</th>
        <th>Tree ID</th>
        <th>Spesies Name</th>
      </tr>
      <?php 
      if (!($_POST['daily']))
      {
         
        echo "<tr>";
        echo"<td>------------------</td>";
        echo "<td>---------- Please select the date.--------</td>";
        echo"<td>--------------</td>";
        echo "</tr>";
      }
      else
      {
         
       $date= $_POST['daily'];

        $sql = "SELECT * FROM tree WHERE plantDate = '$date'";
        $result = $conn->query($sql) ;
        
        echo "DATE : $date";
      
        if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc())
            {
              echo"<tr>";
              echo" <td> $date </td>";
              echo" <td>".$row['TreeID']."</td>";
              echo" <td>".$row['spesiesName']."</td>";
              echo"</tr>";
            }
            
        }
        else
        {
          echo "<tr>";
          echo"<td>-------</td>";
          echo "<td>---- No record available. ----</td>";
          echo"<td>-------</td>";
          echo "</tr>";
        }
      }  
     
    }?>
    </table>
    
    <?php
     $date= $_POST['daily'];

        $sqlChart ="SELECT* FROM tree WHERE plantDate = '$date'";
        $resultChart = $conn->query($sqlChart);

       if ($resultChart->num_rows > 0) {
      
        echo "Total of Trees : ";
              echo "$resultChart->num_rows";
              
       }  
      $_SESSION['Daily'] = $_POST['daily'];
      
  }  
  ?>

<div class="chart">
	
<center><h4>Report Of Tress | Planting Date | Daily</h4></center>
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
			<script>
                var xValues = ["<?php $date= $_POST['daily']; echo"$date"?>"];
                var yValues = [<?php echo"$resultChart->num_rows"?>];
			var barColors = "#57C7FF";

        new Chart("myChart", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
            backgroundColor: barColors,
            data: yValues,}]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Report | Total of Trees | Daily"
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
      <a href="reportWeekly.php"><button>Trees Planted Weekly</button></a>
      <a href="reportMonthly.php"><button>Trees Planted Monthly</button></a>
    </div>
  <form action="" method="post">
  <button type="submit" class="back" name="back">Back to Admin Page</button>
  </form>
    </div>
    </body>
</html>