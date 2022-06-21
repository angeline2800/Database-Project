<?php		
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tmf2034_Group4_Project";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if(!$conn)
	{
		die("connection failed: ". mysqli_error($conn));
	}
	
	//Table User
	$sqlUser = "CREATE TABLE User(
			userID INT(5) NOT NULL,
			userName VARCHAR(200) NOT NULL,
			userAdd VARCHAR(500) NOT NULL,
			userEmail VARCHAR(100) NOT NULL,
			userPW VARCHAR(20) NOT NULL,
			userPhone VARCHAR(15) NOT NULL,
			userCountry VARCHAR(200) NOT NULL,
			userType VARCHAR(200) NOT NULL,
			PRIMARY KEY(userID)
			)";
	
	if (mysqli_query($conn, $sqlUser)) {
		echo "Table User created successfully.\n";
	} else {
		echo "Error creating Table User: " . mysqli_error($conn);
	}
	
	//Table Worker
	$sqlWorker = "CREATE TABLE Worker(
			userID INT(5) NOT NULL,
			worker_position VARCHAR(100) NOT NULL,
			worker_department VARCHAR(100) NOT NULL,
			workerDOB DATE NOT NULL,
			PRIMARY KEY(userID),
			FOREIGN KEY(userID) REFERENCES User(userID)
			)";
	
	if (mysqli_query($conn, $sqlWorker)) {
		echo "Table Worker created successfully.\n";
	} else {
		echo "Error creating Table Worker: " . mysqli_error($conn);
	}

	//Table Client
	$sqlClient = "CREATE TABLE Client(
				userID INT(5) NOT NULL,
				client_photo BLOB NOT NULL, 
				PRIMARY KEY(userID),
				FOREIGN KEY(userID) REFERENCES User(userID)
			)";
	
	if (mysqli_query($conn, $sqlClient)) {
		echo "Table Client created successfully.\n";
	} else {
		echo "Error creating Table Client: " . mysqli_error($conn);
	}
	
	//Table Company
	$sqlCompany = "CREATE TABLE Company(
				userID INT(5) NOT NULL,
				companyDesc VARCHAR(200) NOT NULL,
				companyPhoto BLOB NOT NULL,
				PRIMARY KEY(userID),
				FOREIGN KEY(userID) REFERENCES User(userID)
			)";
	
	if (mysqli_query($conn, $sqlCompany)) {
		echo "Table Company created successfully.\n";
	} else {
		echo "Error creating Table Company: " . mysqli_error($conn);
	}
	
	//Table Orchard
	$sqlOrchard = "CREATE TABLE Orchard(
				orchardID INT(5) NOT NULL,
				orchard_add VARCHAR(200) NOT NULL,
				orchard_location VARCHAR(100) NOT NULL,
				userID INT(5) NOT NULL,
				PRIMARY KEY(orchardID),
				FOREIGN KEY(userID) REFERENCES User(userID)
			)";
	
	if (mysqli_query($conn, $sqlOrchard)) {
		echo "Table Orchard created successfully.\n";
	} else {
		echo "Error creating Table Orchard: " . mysqli_error($conn);
	}
	
	//Table Block
	$sqlBlock = "CREATE TABLE Block(
				BlockID INT(5) NOT NULL,
				Price VARCHAR(50) NOT NULL,
				orchardID INT(5) NOT NULL,
				PRIMARY KEY(BlockID),
				FOREIGN KEY(orchardID) REFERENCES Orchard(orchardID)
			)";
	
	if (mysqli_query($conn, $sqlBlock)) {
		echo "Table Block created successfully.\n";
	} else {
		echo "Error creating Table Block: " . mysqli_error($conn);
	}
	
	//Table Tree
	$sqlTree = "CREATE TABLE Tree(
				TreeID INT(5) NOT NULL,
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
				FOREIGN KEY(BlockID) REFERENCES Block(BlockID)
			)";
	
	if (mysqli_query($conn, $sqlTree)) {
		echo "Table Tree created successfully.\n";
	} else {
		echo "Error creating Table Tree: " . mysqli_error($conn);
	}
	
	//Table Block_Client
	$sqlBlkClt = "CREATE TABLE Block_Client(
				userID INT(5) NOT NULL,
				BlockID INT(5) NOT NULL,
				purchaseDate DATE NOT NULL,
				blockQty INT(5) NOT NULL,
				totalPrice VARCHAR(20) NOT NULL,
				FOREIGN KEY(userID) REFERENCES User(userID),
				FOREIGN KEY(BlockID) REFERENCES Block(BlockID)
			)";
			
	if (mysqli_query($conn, $sqlBlkClt)) {
		echo "Table Block_Client created successfully.\n";
	} else {
		echo "Error creating Table Block_Client: " . mysqli_error($conn);
	}
	
	//Table Tree_Worker
	$sqlTreeWrkr = "CREATE TABLE Tree_Worker(
					userID INT(5) NOT NULL,
					TreeID INT(5) NOT NULL, 
					Worker_startDate DATE NOT NULL,
					PRIMARY KEY(userID, TreeID),
					FOREIGN KEY(userID) REFERENCES user(userID),
					FOREIGN KEY(TreeID) REFERENCES Tree(TreeID)
				)";
	if (mysqli_query($conn, $sqlTreeWrkr)) {
		echo "Table Tree_Worker created successfully.\n";
	} else {
		echo "Error creating Table Tree_Worker: " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
	
?>