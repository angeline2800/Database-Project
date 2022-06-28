<?php	

	// CREATE dbConnection, Database, Tables, Data

	// Create Connection
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tmf2034_Group4_Project";

	$conn = new mysqli($servername, $username, $password);

	if(!$conn)
	{
		die("connection failed: ". mysqli_error($conn));
	}
	
	// Create Database
	$sql = "CREATE DATABASE IF NOT EXISTS tmf2034_Group4_Project";

	if (mysqli_query($conn, $sql)) {
		$conn->select_db('tmf2034_Group4_Project');
	} else {
		echo "Error creating database: " . mysqli_error($conn);
	}

	// Create Table User
	$sqlUser = "CREATE TABLE IF NOT EXISTS User(
		userID INT(5) NOT NULL AUTO_INCREMENT,
		userName VARCHAR(200) NOT NULL,
		userAdd VARCHAR(500) NOT NULL,
		userEmail VARCHAR(100) NOT NULL,
		userPW VARCHAR(200) NOT NULL,
		userPhone VARCHAR(15) NOT NULL,
		userCountry VARCHAR(200) NOT NULL,
		userType VARCHAR(200) NOT NULL,
		PRIMARY KEY(userID)
		)";

	if (mysqli_query($conn, $sqlUser))
	{
	}
	else {
		echo "Error creating Table User: " . mysqli_error($conn);
	}

	//Create Table Worker
	$sqlWorker = "CREATE TABLE IF NOT EXISTS Worker(
			userID INT(5) NOT NULL,
			worker_position VARCHAR(100) NOT NULL,
			worker_department VARCHAR(100) NOT NULL,
			workerDOB DATE NOT NULL,
			PRIMARY KEY(userID),
			FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE
			)";

	if (mysqli_query($conn, $sqlWorker)) 
	{
	}
	else {
		echo "Error creating Table Worker: " . mysqli_error($conn);
	}

	//Create Table Client
	$sqlClient = "CREATE TABLE IF NOT EXISTS Client(
				userID INT(5) NOT NULL,
				client_photo BLOB NOT NULL, 
				PRIMARY KEY(userID),
				FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE
			)";

	if (mysqli_query($conn, $sqlClient))
	{
	}
	else {
		echo "Error creating Table Client: " . mysqli_error($conn);
	}

	//Create Table Company
	$sqlCompany = "CREATE TABLE IF NOT EXISTS Company(
				userID INT(5) NOT NULL,
				companyDesc VARCHAR(200) NOT NULL,
				companyPhoto BLOB NOT NULL,
				PRIMARY KEY(userID),
				FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE
			)";

	if (mysqli_query($conn, $sqlCompany))
	{
	}
	else {
		echo "Error creating Table Company: " . mysqli_error($conn);
	}

	//Create Table Admin
	$sqlAdmin = "CREATE TABLE IF NOT EXISTS `Admin`(
		userID INT(5) NOT NULL,
		employmentDate DATE NOT NULL,
		PRIMARY KEY(userID),
		FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE
		)";

	if (mysqli_query($conn, $sqlAdmin)) 
	{
	}
	else {
		echo "Error creating Table Admin: " . mysqli_error($conn);
	}

	//Create Table Orchard
	$sqlOrchard = "CREATE TABLE IF NOT EXISTS Orchard(
				orchardID INT(5) NOT NULL AUTO_INCREMENT,
				orchard_add VARCHAR(200) NOT NULL,
				orchard_location VARCHAR(100) NOT NULL,
				userID INT(5) NOT NULL,
				PRIMARY KEY(orchardID),
				FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE
			)";

	if (mysqli_query($conn, $sqlOrchard))
	{
	}
	else {
		echo "Error creating Table Orchard: " . mysqli_error($conn);
	}

	//Create Table Block
	$sqlBlock = "CREATE TABLE IF NOT EXISTS Block(
				BlockID INT(5) NOT NULL AUTO_INCREMENT,
				Price VARCHAR(50) NOT NULL,
				orchardID INT(5) NOT NULL,
				PRIMARY KEY(BlockID),
				FOREIGN KEY(orchardID) REFERENCES Orchard(orchardID) ON DELETE CASCADE
			)";

	if (mysqli_query($conn, $sqlBlock))
	{
	}
	else {
		echo "Error creating Table Block: " . mysqli_error($conn);
	}

	//Create Table Tree
	$sqlTree = "CREATE TABLE IF NOT EXISTS Tree(
				TreeID INT(5) NOT NULL AUTO_INCREMENT,
				tree_Image BLOB NOT NULL,
				spesiesName VARCHAR(200) NOT NULL,
				plantDate DATE NOT NULL,
				tree_height VARCHAR(100) NOT NULL,
				diameter VARCHAR(100) NOT NULL,
				status VARCHAR(50) NOT NULL,
				GPS_location VARCHAR(100) NOT NULL,
				tree_type VARCHAR(100) NOT NULL,
				BlockID INT(5) NOT NULL,
				PRIMARY KEY(TreeID),
				FOREIGN KEY(BlockID) REFERENCES `Block`(BlockID) ON DELETE CASCADE
			)";

	if (mysqli_query($conn, $sqlTree))
	{
	}
	else {
		echo "Error creating Table Tree: " . mysqli_error($conn);
	}

	//Create Table Block_Client
	$sqlBlkClt = "CREATE TABLE IF NOT EXISTS Block_Client(
				userID INT(5) NOT NULL,
				BlockID INT(5) NOT NULL,
				purchaseDate DATE NOT NULL,
				blockQty INT(5) NOT NULL,
				totalPrice VARCHAR(20) NOT NULL,
				PRIMARY KEY(userID, BlockID, purchaseDate),
				FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE,
				FOREIGN KEY(BlockID) REFERENCES `Block`(BlockID) ON DELETE CASCADE
			)";
			
	if (mysqli_query($conn, $sqlBlkClt))
	{
	}
	else {
		echo "Error creating Table Block_Client: " . mysqli_error($conn);
	}

	//Create Table Tree_Worker
	$sqlTreeWrkr = "CREATE TABLE IF NOT EXISTS Tree_Worker(
					userID INT(5) NOT NULL,
					TreeID INT(5) NOT NULL, 
					Worker_startDate DATE NOT NULL,
					PRIMARY KEY(userID, TreeID, Worker_startDate),
					FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE,
					FOREIGN KEY(TreeID) REFERENCES Tree(TreeID) ON DELETE CASCADE
				)";
	if (mysqli_query($conn, $sqlTreeWrkr)) 
	{
	}
	else {
		echo "Error creating Table Tree_Worker: " . mysqli_error($conn);
	}
	
?>