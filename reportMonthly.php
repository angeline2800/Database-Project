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
  <!-- <meta name="keywords" content="100%  Fruit Juice Concentrate/ concentrated juice, 100 percent, blend, Apple, grape, white grape, orange  concentrated, flavors, Childcare, Preschool, Daycare, BASP, Extended Day, Before and After School, Head Start , JUICE, KID, CHILD, Natural, Brand, CACFP, USDA, No sugar added, no added sugar, Real fruit , organic, Best, leader, top, quality, exclusive, better , delicious, FREE DELIVERY"/>
  <meta name="description" content="563-386-1999 - FREE shipping. Juice concentrates for kids. Different juice flavors in a case. Fruit juice concentrates for childcare centers."/>
  <link rel="icon" type="image/x-icon" href="https://static-res-cdn.websites.hibu.com/runtime/favicon_d1_res.ico"/> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../CSS/adminStyle.css"> -->
  <title>Trees Reports | Monthly | Tree Profiling Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <link rel="shortcut icon" href="photo/tree.ico" />
</head>

<body>
  <!-- <header class="header-border">
    <div class="header-content">
      <a href="index.php"><img src="https://le-cdn.hibuwebsites.com/767557674d6e4362acfa088c81c84a89/dms3rep/multi/opt/pennyjuice-logo-462w.png" class="logo" alt="PENNYJUICE OF AMERICA - Logo" height="60"></a>
      <h1 class="slogan">It make cents</h1>
        <div>
          <p>Free Nationwide Shipping&nbsp;&nbsp;&nbsp;<span class="bold">563-386-1999</span>
          <p class="bold">LEADER IN CHILDCARE JUICE
        </div>
    </div>
  </header> -->


  <!-- <div class="sidenav">
    <a href=""><span><img src="../Images/sidebar.png" alt="sidebar">Dashboard</span></a>
    <a href=""><span><img src="../Images/account.png" alt="account">Registered User Accounts</span></a>
    <a href=""><span><img src="../Images/product.png" alt="product">All Products</span></a>
    <a class="active" href="Report.php"><span><img src="../Images/transaction.png" alt="transaction">Reports</span></a>

    <div class="fixed">
		<a href="../logout.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
	</div>
  </div> -->


  <div class="transaction">
    <div class="tranTitle"> 
  	  <h3>Trees Monthly Reports</h3>
    </div> <br>

    <form name="form"  method="POST">
      <div class="selectMonth">
        <h6><label for="monthly">Select month:</label>
        <input type="month"  name="monthly">
        <input type="submit" name="monthly_r"></h6>
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

    </body>
</html>