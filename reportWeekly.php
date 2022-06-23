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

function display_week()
{
  global $conn;

  if (isset($_POST['weekly_r'])) 
  {
    if($_SERVER["REQUEST_METHOD"]=="POST") 
    {
      if (!($_POST['weekly']))
      {
        echo "<tr>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo "<td>---- Please select the week..----</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo"<td>-------</td>";
        echo "</tr>";
      }
      else
      {
        $weeks = new DateTime($_POST['weekly']);    
        $week = $weeks->format('W');
        $year = $weeks->format('Y');  

        $sql = "SELECT COUNT(treeID) AS totalTree FROM tree WHERE WEEK(plantDate)= $week AND YEAR(plantDate)=$year";
        $result = $conn->query($sql) ;

        $_SESSION['week_w']= $week;
        $_SESSION['year_w']= $year;
        
        echo "WEEK : WEEK  $week / $year"  ; 
      
        if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc())
            {
              echo"<tr>";
              echo" <td>".$row['totalTree']."</td>";
              echo"</tr>";
            }
        }
        else
        {
          echo "<tr>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo "<td>---- No record available. ----</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo"<td>-------</td>";
          echo "</tr>";
        }
      }  
    }
    
    $_SESSION['Weekly'] = $_POST['weekly'];

  }  
}

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
  <title>Trees Reports | Weekly | Tree Profiling Management System</title>
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


  <div class="sidenav">
    <a href=""><span><img src="../Images/sidebar.png" alt="sidebar">Dashboard</span></a>
    <a href=""><span><img src="../Images/account.png" alt="account">Registered User Accounts</span></a>
    <a href=""><span><img src="../Images/product.png" alt="product">All Products</span></a>
    <a class="active" href="Report.php"><span><img src="../Images/transaction.png" alt="transaction">Reports</span></a>

    <div class="fixed">
		<a href="../logout.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
	</div>
  </div>


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
      <tr>
        <th>Total Trees</th>
      </tr>
      <h6><?php display_week()?></h6>
    </table>

    </body>
</html>