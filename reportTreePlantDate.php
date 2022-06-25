<?php include "dbConnection.php"; ?>

<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Trees Reports | Tree Profiling Management System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="CSS/login.css">
  <link rel="shortcut icon" href="photo/tree.ico" />
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
  	  <h3>Trees Reports</h3>
    </div> <br>

    <div class="viewOpt">
      <a href="reportDaily.php"><button>Trees Planted Daily</button></a>
      <a href="reportWeekly.php"><button>Trees Planted Weekly</button></a>
      <a href="reportMonthly.php"><button>Trees Planted Monthly</button></a>
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
      <br> <br>
      <img src="../Images/PaymentOpts.png" alt="payment method" height="35">
    <div> <br>

    <div class="policy"> 
      <a href="https://b.link/privacy-policy" target="_blank">Privacy Policy</a>  |
      <a href="https://b.link/cookie-policy" target="_blank">Cookie Policy</a>  |
      <a href="https://b.link/conditions" target="_blank">Conditions of Use</a>  |
      <a href="https://b.link/infringement" target="_blank">Notice and Take Down Policy</a>  |
      <a href="https://b.link/website-accessibility-ae" target="_blank">Website AccessibilityPolicy</a> 
    <div> 

    <div class="policy">
      <p> &copy; 2021 The content on this website is owned by us and our licensors. Do not copy any content (including images) without our consent.
    </div> 
  </footer> -->
</body>
</html>