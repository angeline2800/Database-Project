<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Block Record</title>
<style>
    body
    {
        background-color: white;
    }
    table,th,td
    {
        border: 2px solid black;
        width: 600px;
        background-color: white;
    }
    .header {
	width: 40%;
	margin: 50px auto 0px;
	color: white;
	background: grey;
	text-align: center;
	border: 1px solid #B0C4DE;
	border-bottom: none;
	border-radius: 10px 10px 0px 0px;
	padding: 20px;
}
form, .content {
	width: 40%;
	margin: 0px auto;
	padding: 20px;
	border: 1px solid #B0C4DE;
	background: white;
	border-radius: 0px 0px 10px 10px;
}
.input-group {
	margin: 10px 0px 10px 0px;
}
.input-group label {
	display: block;
	text-align: left;
	margin: 3px;
}
.input-group input {
	height: 30px;
	width: 93%;
	padding: 5px 10px;
	font-size: 16px;
	border-radius: 5px;
	border: 1px solid gray;
}

.btn {
	padding: 10px;
	font-size: 15px;
	color: white;
	background: grey;
	border: none;
	border-radius: 5px;
}
  
</style>
</head>
<body>
<center>    
    <div class="header">
	<h2>Display Client Block Record</h2>
</div>
<form method="post">
    
	<div class="input-group">
		<label>User ID:</label>
		<input type="text" name="userID">
	</div>
    
	<div class="input-group">
		<center><button type="submit" class="btn" name="search">Search</button></center>
	</div>


            <table>
                <tr>
                    <th>User ID</th>
                    <th>Block ID</th>
                    <th>Purchase Date</th>
                    <th>Block Quantity</th>
                    <th>Total Price</th>
                </tr>
                <br>
                <?php
                include"dbConnection.php";

                if(isset($_POST['search']))
                {
                    $userID = $_POST['userID'];
                    $query = "SELECT * FROM block_client WHERE userID='$userID' ";
                    $result = mysqli_query($conn, $query);

                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                    <tr>
                        <td> <?php echo $row['userID']; ?> </td>
                        <td> <?php echo $row['BlockID']; ?> </td>
                        <td> <?php echo $row['purchaseDate']; ?> </td>
                        <td> <?php echo $row['blockQty']; ?> </td>
                        <td> <?php echo $row['totalPrice']; ?> </td>
                    </tr>
                    <?php
                    }
                }
                ?>
            </table>
            </form>
            Click here to <a href="UserLogout.php">Logout
            </center>
            
            
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>