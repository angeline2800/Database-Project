<?php 
include "dbConnection.php";

// if ($_SESSION['adminID'] == "") {
// 	echo "
// 		<script type=\"text/javascript\">
// 			alert(\"You must login to view this page!\");
// 			window.location = '../login.html';
// 		</script>
// 	";
// } else if ($_SESSION['adminID'] != "") {
// 	if ((time() - $_SESSION['start']) > (30*60))
// 	{
// 		session_unset(); 
//     	session_destroy();
    		
//     	echo "
// 			<script type=\"text/javascript\">
// 				alert(\"Session expired! Please login again!\");
// 				window.location = '../Index.php';
// 			</script>
// 		";
// 	}
// 	else
// 	{
// 		$_SESSION['start'] = time();
// 	}
// } 


?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trees Reports | Weekly | Tree Profiling Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/login.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
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


  <div class="transaction">
    <div class="tranTitle"> 
  	  <h3>Trees Weekly Reports</h3>
    </div> <br>

    <form name="form"  method="POST">
      <div class="selectWeek">
        <h6><label for="weekly">Select week:</label>
        <input type="week"  name="weekly">
        <input type="submit" name="weekly_r"></h6>
      </div>
    </form>

    <table style="width:100%">
      <?php
      if (isset($_POST['weekly_r'])) 
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
      if (!($_POST['weekly']))
      {
        echo "<tr>";
        echo"<td>-------</td>";
        echo "<td>---- Please select the week..----</td>";
        echo"<td>-------</td>";
        echo "</tr>";
      }
      else
      {
        $weeks = new DateTime($_POST['weekly']);    
        $week = $weeks->format('W');
        $year = $weeks->format('Y');  

        $sql = "SELECT * FROM tree WHERE WEEK(plantDate)= $week AND YEAR(plantDate)=$year";
        $result = $conn->query($sql) ;

        $_SESSION['week_w']= $week;
        $_SESSION['year_w']= $year;
        
        echo "WEEK : WEEK  $week / $year"  ; 
      
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
    }
    ?>
     </table>
     <?php

    $weeks = new DateTime($_POST['weekly']);    
    $week = $weeks->format('W');
    $year = $weeks->format('Y');  

    $sqlChart = "SELECT * FROM tree WHERE WEEK(plantDate)= $week AND YEAR(plantDate)=$year";
    $resultChart = $conn->query($sqlChart) ;

    if ($resultChart->num_rows > 0) {
        echo "Total of Trees : ";
              echo "$resultChart->num_rows";
              
       }

       $sqlWeekly = "SELECT plantDate, COUNT(TreeID) AS 'totalTreeC'FROM tree
         WHERE WEEK(plantDate)= $week AND YEAR(plantDate)=$year
         group by plantDate";
     $resultWeekly = $conn->query($sqlWeekly) ;
  
     $plantDate = array();
     $totalTree=array();
  
     if ($resultWeekly->num_rows > 0) {
         while($row = mysqli_fetch_array($resultWeekly)){
             $plantDate[] = $row['plantDate'];
             $totalTree[] = $row['totalTreeC'];
         }
     }
    
    $_SESSION['Weekly'] = $_POST['weekly'];

  }  
  ?>

  <div class="chart">
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
            text: "Report | Total of Trees | Weekly"
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
              <button type="submit" class="btn" name="Logout">Logout</button>
    </body>
</html>