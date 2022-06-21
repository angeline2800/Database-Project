<?php 
include "dbConnection.php";

function display_tree()
{
  global $conn;

//   if (isset($_POST['daily_r'])) 
//   {
      
//     if($_SERVER["REQUEST_METHOD"]=="POST") 
//     {
        
        $sql = "SELECT * FROM tree";
        $result = $conn->query($sql) ;
        
        echo "Report - Tree";
      
        if ($result->num_rows > 0) 
        {
          while($row = $result->fetch_assoc())
            {
              echo"<tr>";
              echo" <td>".$row['TreeID']."</td>";
              echo" <td>".$row['tree_Image']."</td>";
              echo" <td>".$row['spesiesName']." </td>";
              echo" <td>".$row['plantDate']."</td>";
              echo" <td>".$row['tree_height']."</td>";
              echo" <td>".$row['diameter']."</td>";
              echo" <td>".$row['status']."</td>";
              echo" <td>".$row['GPS_location']."</td>";
              echo" <td>".$row['tree_type']."</td>";
              echo" <td>".$row['BlockID']."</td>";
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
//     }
//   }  

function display_treeToBlock()
{
  global $conn;

//   if (isset($_POST['daily_r'])) 
//   {
      
//     if($_SERVER["REQUEST_METHOD"]=="POST") 
//     {
        
    $sql2 = "SELECT * FROM block";
    $result2 = $conn->query($sql2) ;
    
    if ($result2->num_rows > 0) 
    {
      while($row = $result2->fetch_assoc())
        {
          echo"<tr>";
          echo" <td>".$row['BlockID']."</td>";
          echo" <td>".$row['Price']." </td>";
          echo" <td>".$row['orchardID']."</td>";
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
      
function display_blockToOrchard()
{
  global $conn;

//   if (isset($_POST['daily_r'])) 
//   {
      
//     if($_SERVER["REQUEST_METHOD"]=="POST") 
//     {
        
    $sql3 = "SELECT * FROM orchard";
    $result3 = $conn->query($sql3) ;
    
    if ($result3->num_rows > 0) 
    {
      while($row = $result3->fetch_assoc())
        {
          echo"<tr>";
          echo" <td>".$row['orchardID']."</td>";
          echo" <td>".$row['orchard_add']."</td>";
          echo" <td>".$row['orchard_location']." </td>";
          echo" <td>".$row['userID']."</td>";
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
            echo "</tr>";
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
  <title>Reports | Trees | Tree Profiling Management System</title>
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
    <a href="index.php"><span><img src="../Images/sidebar.png" alt="sidebar">Dashboard</span></a>
    <a href="userAcc.php"><span><img src="../Images/account.png" alt="account">Registered User Accounts</span></a>
    <a href="product.php"><span><img src="../Images/product.png" alt="product">All Products</span></a>
    <a class="active" href="transaction.php"><span><img src="../Images/transaction.png" alt="transaction">Transaction Records & Reports</span></a> -->


    <div class="fixed">
      <a href="Report.php"><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Back To Report Page </span></a>
      <br>
	  <a href=""><span><i class="fa fa-sign-out" style="font-size: 30px;"></i> Log Out </span></a>
	</div>
  <!-- </div> -->

  <div class="transaction">
    <div class="tranTitle"> 
      <h3>Record - Trees</h3>
    </div> <br>

    <table style="width:100%">
      <tr>
        <th>Tree ID</th>
        <th>Tree Image</th>
        <th>Spesies Name</th>
        <th>Plant Date</th>
        <th>Tree height</th>
        <th>Diameter</th>
        <th>Status</th>
        <th>GPS_location</th>
        <th>Tree Type</th>
        <th>Block ID</th>
      </tr>
      <?php display_tree()?>
    </table>

    <table style="width:100%">
      <tr>
        <th>Block ID</th>
        <th>Price</th>
        <th>Orchard ID</th>
      </tr>
      <?php display_treeToBlock()?>
    </table>

    <table style="width:100%">
      <tr>
        <th>Orchard ID</th>
        <th>Orchard Address</th>
        <th>Orchard Location</th>
        <th>Company ID</th>
      </tr>
      <?php display_blockToOrchard()?>
    </table>

    <!-- <br />
    <a href="reportD.php" target="_blank"><button class="generateBtn">Generate Transaction Report</button></a>

    <br /> -->
    <div class="viewOpt">
      <a href="reportBlock.php"><button>Blocks of tree</button></a>
      <a href="reportOrchard.php"><button>Orchard of tree</button></a>
      <a href="reportTree.php"><button>Trees</button></a>
    </div>
  </div>


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