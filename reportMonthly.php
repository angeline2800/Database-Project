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
  <title>Trees Reports | Monthly | Tree Profiling Management System</title>
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
	<h2>Record Of Trees - Monthly</h2>
</div>

<div class = "content">
    <form name="form"  method="POST">
      <div class="selectMonth">
        <h6><label for="monthly">Select month:</label>
        <input type="month"  name="monthly">
        <button type="submit" class="btn" name="monthly_r">Submit</button></h6>
      </div>
    </form>

    <table style="width:100%">
    <?php 
    if (isset($_POST['monthly_r']))
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
       if (!($_POST['monthly']))
       {
         echo "<tr>";
         echo"<td>-------</td>";
         echo "<td>---- Please select the month.----</td>";
         echo"<td>-------</td>";
         echo "</tr>";
       }
       else
       {
         $mon = new DateTime($_POST['monthly']);    
         $month = $mon->format('m');
         $year = $mon->format('Y');  
 
 
         $sql = "SELECT * FROM tree WHERE MONTH(plantDate)= $month AND YEAR(plantDate)=$year";
         $result = $conn->query($sql) ;
 
         $_SESSION['month_mon']= $month;
         $_SESSION['year_mon']=$year;
         
         echo "MONTH : $month /  $year" ; 
       
         if ($result->num_rows > 0) 
         {
           while($row = $result->fetch_assoc())
             {
                echo"<tr>";
                echo" <td>" .$row['plantDate']." </td>";
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
     $mon = new DateTime($_POST['monthly']);    
     $month = $mon->format('m');
     $year = $mon->format('Y');  

     $sqlChart = "SELECT * FROM tree WHERE MONTH(plantDate)= $month AND YEAR(plantDate)=$year";
     $resultChart = $conn->query($sqlChart);

     if ($resultChart->num_rows > 0) {
    
      echo "Total of Trees : ";
            echo "$resultChart->num_rows";
            
     } 

     $sqlMonthly = "SELECT plantDate, COUNT(TreeID) AS 'totalTreeC'FROM tree
         WHERE MONTH(plantDate)= $month AND YEAR(plantDate)=$year 
         group by plantDate";
     $resultMonthly = $conn->query($sqlMonthly) ;
  
     $plantDate = array();
     $totalTree=array();
  
     if ($resultMonthly->num_rows > 0) {
         while($row = mysqli_fetch_array($resultMonthly)){
             $plantDate[] = $row['plantDate'];
             $totalTree[] = $row['totalTreeC'];
         }
     }
   
     $_SESSION['Monthly'] = $_POST['monthly']; 
 
   }  

  
   ?>

<div class="chart">
<center><h4>Report Of Tress | Planting Date | Monthly</h4></center>
            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>
			<script>
			var barColors = "#57C7FF";

        new Chart("myChart", {
        type: "bar",
        data: {
            labels:<?php  echo json_encode($plantDate);?>,
            datasets: [{
            backgroundColor: barColors,
            data:<?php  echo json_encode($totalTree);?>
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Report | Total of Trees | Monthly"
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
               <div class="admin">
      <a href="reportDaily.php"><button>Trees Planted Daily</button></a>
      <a href="reportWeekly.php"><button>Trees Planted Weekly</button></a>
    </div>
  <form action="" method="post">
  <button type="submit" class="back" name="back">Back to Admin Page</button>
  </form>
    </div>
    </body>
</html>