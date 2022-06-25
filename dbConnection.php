<?php	

	// CREATE dbConnection, Database, Tables, Data

	// Create Connection
	$servername = "localhost";
	$username = "root";
	$password = "";

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
		userPW VARCHAR(20) NOT NULL,
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
			FOREIGN KEY(userID) REFERENCES User(userID)
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
				FOREIGN KEY(userID) REFERENCES User(userID)
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
				FOREIGN KEY(userID) REFERENCES User(userID)
			)";

	if (mysqli_query($conn, $sqlCompany))
	{
	}
	else {
		echo "Error creating Table Company: " . mysqli_error($conn);
	}

	//Create Table Orchard
	$sqlOrchard = "CREATE TABLE IF NOT EXISTS Orchard(
				orchardID INT(5) NOT NULL AUTO_INCREMENT,
				orchard_add VARCHAR(200) NOT NULL,
				orchard_location VARCHAR(100) NOT NULL,
				userID INT(5) NOT NULL,
				PRIMARY KEY(orchardID),
				FOREIGN KEY(userID) REFERENCES User(userID)
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
				FOREIGN KEY(orchardID) REFERENCES Orchard(orchardID)
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
				FOREIGN KEY(BlockID) REFERENCES Block(BlockID) ON DELETE CASCADE
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
				PRIMARY KEY(userID, BlockID),
				FOREIGN KEY(userID) REFERENCES User(userID) ON DELETE CASCADE,
				FOREIGN KEY(BlockID) REFERENCES Block(BlockID) ON DELETE CASCADE
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
					PRIMARY KEY(userID, TreeID),
					FOREIGN KEY(userID) REFERENCES user(userID),
					FOREIGN KEY(TreeID) REFERENCES Tree(TreeID)
				)";
	if (mysqli_query($conn, $sqlTreeWrkr)) 
	{
	}
	else {
		echo "Error creating Table Tree_Worker: " . mysqli_error($conn);
	}


	//Insert User Data
	$sqlUserData = "INSERT INTO  User(userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType)
	SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
		FROM (SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10001 AS userID, 'Allyson Lim Kai Sheng' AS userName, 'No 11, Jalan Abell, 93100, Kuching, Sarawak' AS userAdd, 'allyson@gmail.com' AS userEmail,  SHA1('All@123') AS userPW,
				'0193467456' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType ) 
			AS temp_1 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10001)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10002 AS userID, 'Lisa Munisah Binti Aman' AS userName,'No 34, Jalan Batu Kawa, 93250, Kuching, Sarawak' AS userAdd, 'lisa12@gmail.com' AS userEmail,  SHA1('Lisa#82@') AS userPW,
			'0123890537' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_2 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10002)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10003 AS userID,  'Muhammad Ahmmad Bin Razak' AS userName,'No 99, Jalan Berjaya, 93300, Kuching, Sarawak' AS userAdd, 'ahmmad88@gmail.com' AS userEmail, SHA1('Ahmad!123') AS userPW,
			'0132435684' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_3 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10003)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10004 AS userID, 'Yuna Ting Ying Hui' AS userName, 'No 14, Jalan Deshon, 93100, Kuching, Sarawak' AS userAdd, 'yuna99@gmail.com' AS userEmail, SHA1('yuna&12') AS userPW,
			'0194578903' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_4 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10004)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10005 AS userID, 'Ahmed Hassin Bin Abdullah' AS userName, 'No 10, Jalan Enggang, 93050, Kuching, Sarawak' AS userAdd, 'ahmed02@gmail.com' AS userEmail, SHA1('ahmed$11') AS userPW,
			'0102341208' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_5 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10005)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10006 AS userID, 'Toh Jun Jie' AS userName,'Lot 15, Jalan Hijau, 93150, Kuching, Sarawak' AS userAdd, 'tjj66@gmail.com' AS userEmail, SHA1('7jj&66') AS userPW,
			'0176436858' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_6 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10006)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10007 AS userID, 'Muhammad Ismail bin Abdul' AS userName, 'Lot 18A, Jalan Gani, 93050, Kuching, Sarawak' AS userAdd, 'ismail@gmail.com' AS userEmail, SHA1('ism@11') AS userPW,
			'0126676816' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_7 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10007)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10008 AS userID, 'Ealingesh a/l Yugendran' AS userName, 'Lot 119, Jalan Berjaya, 93300, Kuching, Sarawak' AS userAdd, 'ealingesh33@gmail.com' AS userEmail, SHA1('3@3eal') AS userPW,
			'0193934693' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_8 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10008)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10009 AS userID, 'Subashan Vadibeler' AS userName, 'Lot 53, Jalan Utama, 93100, Kuching, Sarawak' AS userAdd, 'shandi@gmail.com' AS userEmail, SHA1('sV#234') AS userPW,
			'0109786234' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_9 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10009)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10010 AS userID, 'Chia Hui Min' AS userName, 'Lot 10, Jalan Enggang, 93050, Kuching, Sarawak' AS userAdd, 'huimin10@gmail.com' AS userEmail, SHA1('Chm1010') AS userPW,
			'0126785593' AS userPhone, 'Malaysia' AS userCountry, 'worker' AS userType  
			) AS temp_10 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10010)

			UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10011 AS userID, 'Amirah Aisyah Binti Karul' AS userName, 'No 18, Jalan Gani, 93050, Kuching, Sarawak' AS userAdd, 'amirah@gmail.com' AS userEmail, SHA1('Ami&40+') AS userPW,
			'0125674598' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_11 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10011)

		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10012 AS userID, 'Lam Kim Sam' AS userName, 'No 90, Jalan Green, 93150, Kuching, Sarawak' AS userAdd, 'kimsan@gmail.com' AS userEmail, SHA1('Kim*67M') AS userPW,
			'0194347890' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_12 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10012)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10013 AS userID, 'Muhammad Farid Bin Mohd Karim' AS userName, 'No 45, Jalan Istana, 93050, Kuching, Sarawak' AS userAdd, 'karim@gmail.com' AS userEmail, SHA1('kArim2#') AS userPW,
			'0101108903' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_13 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10013)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10014 AS userID, 'Amir Haji Bin Kharul' AS userName, 'No 88, Jalan Helang, 93050, Kuching, Sarawak' AS userAdd, 'amir13@gmail.com' AS userEmail, SHA1('amiR@&') AS userPW,
			'0179023125' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_14 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10014)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10015 AS userID, 'Lau Wei Ming' AS userName, 'No 66, Jalan Hijau, 93150, Kuching, Sarawak' AS userAdd, 'lau@gmail.com' AS userEmail, SHA1('Lau@wE') AS userPW,
			'0120932490' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_15 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10015)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10016 AS userID, 'Muhammad Fitri bin Musa' AS userName, 'No 113, Jalan Mewah, 93050, Kuching, Sarawak' AS userAdd, 'fitri@gmail.com' AS userEmail, SHA1('tRi&11') AS userPW,
			'0108705345' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_16 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10016)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10017 AS userID, 'Akesh Nair' AS userName, 'No 63, Taman Sentosa, 93150, Kuching, Sarawak' AS userAdd, 'akesh@gmail.com' AS userEmail, SHA1('ak97&1') AS userPW,
			'0181273561' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_17 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10017)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10018 AS userID, 'Lim Kok Kien' AS userName, 'No 85, Bukit Jade, 93050, Kuching, Sarawak' AS userAdd, 'kklim@gmail.com' AS userEmail, SHA1('85#Lim') AS userPW,
			'0162816878' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_18 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10018)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10019 AS userID, 'Javier Siow' AS userName, 'Lot 145, Jalan Indah, 93050, Kuching, Sarawak' AS userAdd, 
			'javier@gmail.com' AS userEmail, SHA1('jS127$') AS userPW,
			'0193937580' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_19 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10019)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10020 AS userID, 'Venessa Sim' AS userName, 'No 1123, Jalan Batu 3, 93150, Kuching, Sarawak' AS userAdd, 'venessa@gmail.com' AS userEmail, SHA1('venes$98') AS userPW,
			'0123875576' AS userPhone, 'Malaysia' AS userCountry, 'client' AS userType  
			) AS temp_20 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10020)

		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10021 AS userID, 'Kuching Sincere Sdn Bhd' AS userName, 'Lot 1836 (SL 5), RJ Business Hub Kuching-Kota Samarahan Expressway, 94300 Kuching, Sarawak' AS userAdd,
			'kuchingsincere@kchs.com.my' AS userEmail, SHA1('kchS#93') AS userPW, '082503993' AS userPhone, 'Malaysia' AS userCountry, 'company' AS userType  
			) AS temp_21 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10021)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10022 AS userID, 'Evergreen Kuala Lumpur Sdn Bhd' AS userName, 'Level 16, The Gardens South Tower, Lingkaran Syed Putra, Mid Valley City, 59200 Kuala Lumpur' AS userAdd,
			'evergreenkl@egkl.com.my' AS userEmail, SHA1('egkl@888') AS userPW, '0389662500' AS userPhone, 'Malaysia' AS userCountry, 'company' AS userType  
			) AS temp_22 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10022)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10023 AS userID, 'Bunga Raya Corporate Sdn Bhd' AS userName, 'Level 19, Tower B, Plaza 33, No. 1, Jalan Kemajuan, Seksyen 13, Petaling Jaya, 46200 Petaling Jaya, Selangor' AS userAdd,
			'brc@brc.com.my' AS userEmail, SHA1('168brc@') AS userPW, '0378836333' AS userPhone, 'Malaysia' AS userCountry, 'company' AS userType  
			) AS temp_23 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10023)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10024 AS userID, 'GUH Group' AS userName, 'Plot 1240 & 1241, Bayan Lepas Free Industrial Zone, Phase 3, 11900, Bayan Lepas, Penang' AS userAdd,
			'guhholdings@guh.com.my' AS userEmail, SHA1('guh&1240') AS userPW, '046166333' AS userPhone, 'Malaysia' AS userCountry, 'company' AS userType  
			) AS temp_24 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10024)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10025 AS userID, 'Sarawak Consolidated Industries Berhad' AS userName, 'Lot 1258, Jalan Utama, Pending Industrial Estate, 93450 Kuching, Sarawak' AS userAdd,
			'scib@scib.com.my' AS userEmail, SHA1('scib@scib') AS userPW, '082334485' AS userPhone, 'Malaysia' AS userCountry, 'company' AS userType  
			) AS temp_25 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10025)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10026 AS userID, 'Lim Jun Wei' AS userName, 'No 90, Jalan Merdeka, 93050, Kuching, Sarawak' AS userAdd,
			'junwei@gmail.com' AS userEmail, SHA1('jun@12Wei') AS userPW, '0121246543' AS userPhone, 'Malaysia' AS userCountry, 'admin' AS userType  
			) AS temp_26 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10026)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10027 AS userID, 'Abdul Alim Bin Masjid' AS userName, 'No 09, Jalan Merbau, 93450, Kuching, Sarawak' AS userAdd,
			'alim@gmail.com' AS userEmail, SHA1('alim*19') AS userPW, '0105897654' AS userPhone, 'Malaysia' AS userCountry, 'admin' AS userType  
			) AS temp_26 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10027)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10028 AS userID, 'Muhammad Nassir Bin Hussein' AS userName, 'No 76, Jalan Nanas, 93400, Kuching, Sarawak' AS userAdd,
			'nassir22@gmail.com' AS userEmail, SHA1('nAssiR@3') AS userPW, '0197653789' AS userPhone, 'Malaysia' AS userCountry, 'admin' AS userType  
			) AS temp_26 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10028)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10029 AS userID, 'Lina Ting Ling Ling' AS userName, 'No 48, Jalan Minggi, 93250, Kuching, Sarawak' AS userAdd,
			'lina35@gmail.com' AS userEmail, SHA1('Lina@gg') AS userPW, '0164893679' AS userPhone, 'Malaysia' AS userCountry, 'admin' AS userType  
			) AS temp_26 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10029)
		UNION ALL
			SELECT userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType
			FROM (SELECT 10030 AS userID, 'Halison Phang Ming Li' AS userName, 'No 15, Jalan Muhibbah, 93400, Kuching, Sarawak' AS userAdd,
			'halison678@gmail.com' AS userEmail, SHA1('haLison&p12') AS userPW, '0131578938' AS userPhone, 'Malaysia' AS userCountry, 'admin' AS userType  
			) AS temp_26 WHERE NOT EXISTS (SELECT userID FROM User WHERE userID = 10030)
	) alias_User ";


	if (mysqli_query($conn, $sqlUserData))
	{
	}
	else {
	echo "Error inserting into Table User: " . mysqli_error($conn);
	}

	// Insert Worker Data
	$sqlWorkerData = "INSERT INTO Worker(userID,worker_position,worker_department,workerDOB)
	SELECT userID,worker_position,worker_department,workerDOB
		FROM (SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10001 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1992-01-23' AS workerDOB) 
			AS temp_26 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10001)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10002 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1990-04-19' AS workerDOB) 
			AS temp_27 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10002)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10003 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1991-12-03' AS workerDOB) 
			AS temp_28 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10003)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10004 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1991-09-28' AS workerDOB) 
			AS temp_29 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10004)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10005 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1991-06-09' AS workerDOB) 
			AS temp_30 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10005)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10006 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1989-03-27' AS workerDOB) 
			AS temp_31 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10006)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10007 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1993-07-13' AS workerDOB) 
			AS temp_32 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10007)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10008 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1990-11-25' AS workerDOB) 
			AS temp_33 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10008)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10009 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1991-09-08' AS workerDOB) 
			AS temp_34 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10009)
		UNION ALL
			SELECT userID,worker_position,worker_department,workerDOB
			FROM (SELECT 10010 AS userID, 'Orchard Worker' AS worker_position, 'Plantation' AS worker_department, '1992-08-30' AS workerDOB) 
			AS temp_35 WHERE NOT EXISTS (SELECT userID FROM Worker WHERE userID = 10010)
	) alias_Worker ";


	 if (mysqli_query($conn, $sqlWorkerData))
	 {
	 }
	 else {
		echo "Error inserting into Table Worker: " . mysqli_error($conn);
	 }

	 //Insert Client Data
	 $sqlClientData = "INSERT INTO Client(userID,client_photo)
	 SELECT userID,client_photo
		FROM (SELECT userID,client_photo
		FROM (SELECT 10011 AS userID, 'woman.jpg' AS client_photo)
			AS temp_36 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10011)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10012 AS userID,  'man.jpg' AS client_photo)
			AS temp_37 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10012)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10013 AS userID,  'man.jpg' AS client_photo)
			AS temp_38 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10013)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10014 AS userID,  'man.jpg' AS client_photo)
			AS temp_39 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10014)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10015 AS userID,  'man.jpg' AS client_photo)
			AS temp_40 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10015)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10016 AS userID,  'man.jpg' AS client_photo)
			AS temp_41 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10016)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10017 AS userID,  'man.jpg' AS client_photo)
			AS temp_42 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10017)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10018 AS userID,  'man.jpg' AS client_photo)
			AS temp_43 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10018)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10019 AS userID,  'man.jpg' AS client_photo)
			AS temp_44 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10019)
		UNION ALL
			SELECT userID,client_photo
			FROM (SELECT 10020 AS userID,  'woman.jpg' AS client_photo)
			AS temp_45 WHERE NOT EXISTS (SELECT userID FROM Client WHERE userID = 10020)
	 ) alias_Client";

	 if (mysqli_query($conn, $sqlClientData))
	{
	}
	else {
	 echo "Error inserting into Table Client: " . mysqli_error($conn);
	 }

	 //Insert Company Data
	 $sqlCompanyData = "INSERT INTO Company(userID,companyDesc,companyPhoto)
	 SELECT userID,companyDesc,companyPhoto
		FROM (SELECT userID,companyDesc,companyPhoto
		FROM (SELECT 10021 AS userID, 'Corporate office' AS companyDesc, 'company.jpg' AS companyPhoto)
			AS temp_46 WHERE NOT EXISTS (SELECT userID FROM Company WHERE userID = 10021)
		UNION ALL
			SELECT userID,companyDesc,companyPhoto
			FROM (SELECT 10022 AS userID, 'Agricultural' AS companyDesc, 'company.jpg' AS companyPhoto)
			AS temp_47 WHERE NOT EXISTS (SELECT userID FROM Company WHERE userID = 10022)
		UNION ALL
			SELECT userID,companyDesc,companyPhoto
			FROM (SELECT 10023 AS userID, 'Plantation' AS companyDesc, 'company.jpg' AS companyPhoto)
			AS temp_48 WHERE NOT EXISTS (SELECT userID FROM Company WHERE userID = 10023)
		UNION ALL
			SELECT userID,companyDesc,companyPhoto
			FROM (SELECT 10024 AS userID, 'Manufacturer' AS companyDesc, 'company.jpg' AS companyPhoto)
			AS temp_49 WHERE NOT EXISTS (SELECT userID FROM Company WHERE userID = 10024)
		UNION ALL
			SELECT userID,companyDesc,companyPhoto
			FROM (SELECT 10025 AS userID, 'Plantation' AS companyDesc, 'company.jpg' AS companyPhoto)
			AS temp_50 WHERE NOT EXISTS (SELECT userID FROM Company WHERE userID = 10025)
	 ) alias_Company " ;

	 if (mysqli_query($conn, $sqlCompanyData))
	 {
	 }
	 else
	 {
		 echo "Error inserting into Table Company: " . mysqli_error($conn);
	 }

	 //Insert Orchard Data
	 $sqlOrchardData = "INSERT INTO Orchard(orchardID,orchard_add,orchard_location,userID)
	 SELECT orchardID,orchard_add,orchard_location,userID
		FROM (SELECT orchardID,orchard_add,orchard_location,userID
		FROM (SELECT 2001 AS orchardID, 'Lot 118A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.493661, 110.220412' AS orchard_location, 10023 AS userID)
			AS temp_51 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2001)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2002 AS orchardID, 'Lot 118B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.493901, 110.220412' AS orchard_location, 10023 AS userID)
			AS temp_52 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2002)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2003 AS orchardID, 'Lot 119A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.494305, 110.220380' AS orchard_location, 10022 AS userID)
			AS temp_53 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2003)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2004 AS orchardID, 'Lot 119B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.494294, 110.219822' AS orchard_location, 10025 AS userID)
			AS temp_54 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2004)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2005 AS orchardID, 'Lot 220A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.495369, 110.220404' AS orchard_location, 10025 AS userID)
			AS temp_55 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2005)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2006 AS orchardID, 'Lot 220B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.495603, 110.219522' AS orchard_location, 10024 AS userID)
			AS temp_56 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2006)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2007 AS orchardID, 'Lot 221A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.496000, 110.220724' AS orchard_location, 10024 AS userID)
			AS temp_57 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2007)
		UNION ALL
			SELECT orchardID,orchard_add,orchard_location,userID
			FROM (SELECT 2008 AS orchardID, 'Lot 221B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak' AS orchard_add, '1.496086, 110.219608' AS orchard_location, 10021 AS userID)
			AS temp_58 WHERE NOT EXISTS (SELECT orchardID FROM Orchard WHERE orchardID = 2008)
	) alias_Orchard";

	 if (mysqli_query($conn, $sqlOrchardData))
	 {
	 }
	 else
	 {
	 	echo "Error inserting into Table Orchard: " . mysqli_error($conn);
	 }

	 //Insert Block Data
	 $sqlBlockData = "INSERT INTO Block(BlockID,Price,orchardID)
	 SELECT BlockID,Price,orchardID
		FROM (SELECT BlockID,Price,orchardID
			FROM (SELECT 5001 AS BlockID, 'RM5000' AS Price, 2001 AS orchardID)
			AS temp_59 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5001)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5002 AS BlockID, 'RM4599' AS Price, 2001 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5002)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5003 AS BlockID, 'RM3899' AS Price, 2002 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5003)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5004 AS BlockID, 'RM4000' AS Price, 2002 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5004)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5005 AS BlockID, 'RM4100' AS Price, 2003 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5005)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5006 AS BlockID, 'RM5300' AS Price, 2003 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5006)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5007 AS BlockID, 'RM4899' AS Price, 2004 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5007)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5008 AS BlockID, 'RM5000' AS Price, 2004 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5008)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5009 AS BlockID, 'RM6388' AS Price, 2005 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5009)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5010 AS BlockID, 'RM5388' AS Price, 2005 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5010)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5011 AS BlockID, 'RM4888' AS Price, 2006 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5011)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5012 AS BlockID, 'RM5888' AS Price, 2006 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5012)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5013 AS BlockID, 'RM4688' AS Price, 2007 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5013)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5014 AS BlockID, 'RM4399' AS Price, 2007 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5014)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5015 AS BlockID, 'RM4000' AS Price, 2008 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5015)
		UNION ALL
			SELECT BlockID,Price,orchardID
			FROM (SELECT 5016 AS BlockID, 'RM4388' AS Price, 2008 AS orchardID)
			AS temp_60 WHERE NOT EXISTS (SELECT BlockID FROM Block WHERE BlockID = 5016)
	) alias_Block";

	 if (mysqli_query($conn, $sqlBlockData))
	 {
	 }
	 else
	 {
		 echo "Error inserting into Table Block: " . mysqli_error($conn);
	 }

	 //Insert Tree Data
	 $sqlTreeData = "INSERT INTO Tree(TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID)
	  SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
		FROM (SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
			FROM (SELECT 7001 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2012-03-08' AS plantDate,
				'40m' AS tree_height,'108cm' AS diameter, 'Bear fruits' AS status, '1.493661, 110.220418' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5001 AS BlockID)
				AS tem_1 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7001)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7002 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2012-03-08' AS plantDate,
				'43m' AS tree_height,'112cm' AS diameter, 'Bear fruits' AS status, '1.493719, 110.220419' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5001 AS BlockID)
				AS tem_2 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7002)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7003 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2012-03-08' AS plantDate,
				'38m' AS tree_height,'110cm' AS diameter, 'Bear fruits' AS status,'1.493769, 110.220328' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5001 AS BlockID)
				AS tem_3 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7003)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7004 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2012-03-08' AS plantDate,
				'45m' AS tree_height,'116cm' AS diameter, 'Bear fruits' AS status,  '1.493787, 110.220252' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5001 AS BlockID)
				AS tem_4 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7004)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7005 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2012-03-08' AS plantDate,
				'41m' AS tree_height,'108cm' AS diameter, 'Bear fruits' AS status, '1.493871, 110.220410' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5001 AS BlockID)
				AS tem_5 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7005)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7006 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-23' AS plantDate,
				'15m' AS tree_height,'53cm' AS diameter, 'Bear fruits' AS status, '1.493843, 110.220334' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5002 AS BlockID)
				AS tem_6 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7006)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7007 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-23' AS plantDate,
				'18m' AS tree_height,'57cm' AS diameter, 'Bear fruits' AS status, '1.493937, 110.220366' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5002 AS BlockID)
				AS tem_7 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7007)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7008 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-23' AS plantDate,
				'17m' AS tree_height,'55cm' AS diameter, 'Bear fruits' AS status, '1.493844, 110.220441' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5002 AS BlockID)
				AS tem_8 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7008)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7009 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-23' AS plantDate,
				'16m' AS tree_height,'58cm' AS diameter, 'Bear fruits' AS status,'1.493927, 110.220344' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5002 AS BlockID)
				AS tem_9 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7009)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7010 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-23' AS plantDate,
				'19m' AS tree_height,'60cm' AS diameter, 'Bear fruits' AS status, '1.494005, 110.220417' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5002 AS BlockID)
				AS tem_10 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7010)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7011 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-03-27' AS plantDate,
				'23m' AS tree_height,'55cm' AS diameter, 'Bear fruits' AS status, '1.493981, 110.220326' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5003 AS BlockID)
				AS tem_11 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7011)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7012 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-03-27' AS plantDate,
				'20m' AS tree_height,'60cm' AS diameter, 'Bear fruits' AS status, '1.493872, 110.220332' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5003 AS BlockID)
				AS tem_12 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7012)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7013 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-03-27' AS plantDate,
				'24m' AS tree_height,'56cm' AS diameter, 'Bear fruits' AS status, '1.493858, 110.220216' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5003 AS BlockID)
				AS tem_13 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7013)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7014 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-03-27' AS plantDate,
				'22m' AS tree_height,'58cm' AS diameter, 'Bear fruits' AS status, '1.493952, 110.220122' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5003 AS BlockID)
				AS tem_14 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7014)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7015 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-03-27' AS plantDate,
				'21m' AS tree_height,'57m' AS diameter, 'Bear fruits' AS status, '1.493847, 110.220077' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5003 AS BlockID)
				AS tem_15 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7015)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7016 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-04-15' AS plantDate,
				'30m' AS tree_height,'65cm' AS diameter, 'Bear fruits' AS status, '1.494137, 110.220404' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5004 AS BlockID)
				AS tem_16 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7016)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7017 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-04-15' AS plantDate,
				'27m' AS tree_height,'68cm' AS diameter, 'Bear fruits' AS status, '1.494093, 110.220261' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5004 AS BlockID)
				AS tem_17 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7017)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7018 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-04-15' AS plantDate,
				'26m' AS tree_height,'67cm' AS diameter, 'Bear fruits' AS status, '1.494079, 110.220103' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5004 AS BlockID)
				AS tem_18 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7018)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7019 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-04-15' AS plantDate,
				'28m' AS tree_height,'69cm' AS diameter, 'Bear fruits' AS status, '1.494098, 110.220468' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5004 AS BlockID)
				AS tem_19 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7019)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7020 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-04-15' AS plantDate,
				'20m' AS tree_height,'66cm' AS diameter, 'Bear fruits' AS status, '1.494221, 110.220454' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5004 AS BlockID)
				AS tem_20 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7020)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7021 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-07-21' AS plantDate,
				'17m' AS tree_height,'79cm' AS diameter, 'Bear fruits' AS status, '1.494329, 110.220251' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5005 AS BlockID)
				AS tem_21 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7021)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7022 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-07-21' AS plantDate,
				'18m' AS tree_height,'75cm' AS diameter, 'Bear fruits' AS status, '1.494316, 110.220080' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5005 AS BlockID)
				AS tem_22 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7022)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7023 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-07-21' AS plantDate,
				'20m' AS tree_height,'78cm' AS diameter, 'Bear fruits' AS status, '1.494385, 110.220066' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5005 AS BlockID)
				AS tem_23 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7023)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7024 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-07-21' AS plantDate,
				'18m' AS tree_height,'74cm' AS diameter, 'Bear fruits' AS status, '1.494393, 110.220187' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5005 AS BlockID)
				AS tem_24 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7024)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7025 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-07-21' AS plantDate,
				'18m' AS tree_height,'79cm' AS diameter, 'Bear fruits' AS status, '1.494461, 110.220034' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5005 AS BlockID)
				AS tem_25 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7025)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7026 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-03' AS plantDate,
				'20m' AS tree_height,'66cm' AS diameter, 'Bear fruits' AS status, '1.494474, 110.220211' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5006 AS BlockID)
				AS tem_26 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7026)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7027 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-03' AS plantDate,
				'18m' AS tree_height,'65cm' AS diameter, 'Bear fruits' AS status, '1.494557, 110.220203' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5006 AS BlockID)
				AS tem_27 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7027)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7028 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-03' AS plantDate,
				'17m' AS tree_height,'66cm' AS diameter, 'Bear fruits' AS status, '1.494565, 110.220080' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5006 AS BlockID)
				AS tem_28 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7028)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7029 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-03' AS plantDate,
				'19m' AS tree_height,'68cm' AS diameter, 'Bear fruits' AS status, '1.494536, 110.220305' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5006 AS BlockID)
				AS tem_29 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7029)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7030 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-03' AS plantDate,
				'20m' AS tree_height,'70cm' AS diameter, 'Bear fruits' AS status, '1.494420, 110.220286' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5006 AS BlockID)
				AS tem_30 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7030)	
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7031 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-10' AS plantDate,
				'5m' AS tree_height,'20cm' AS diameter, 'Bear fruits' AS status, '1.494310, 110.219774' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5007 AS BlockID)
				AS tem_31 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7031)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7032 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-10' AS plantDate,
				'4m' AS tree_height,'18cm' AS diameter, 'Bear fruits' AS status, '1.494305, 110.219736' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5007 AS BlockID)
				AS tem_32 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7032)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7033 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-10' AS plantDate,
				'4m' AS tree_height,'19cm' AS diameter, 'Bear fruits' AS status, '1.494299, 110.219699' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5007 AS BlockID)
				AS tem_33 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7033)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7034 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-10' AS plantDate,
				'5m' AS tree_height,'21cm' AS diameter, 'Bear fruits' AS status, '1.494307, 110.219696' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5007 AS BlockID)
				AS tem_34 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7034)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7035 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-10' AS plantDate,
				'6m' AS tree_height,'20cm' AS diameter, 'Bear fruits' AS status, '1.494309, 110.219645' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5007 AS BlockID)
				AS tem_35 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7035)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7036 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-11' AS plantDate,
				'15m' AS tree_height,'45cm' AS diameter, 'Bear fruits' AS status, '1.494360, 110.219729' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5008 AS BlockID)
				AS tem_36 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7036)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7037 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-11' AS plantDate,
				'14m' AS tree_height,'46cm' AS diameter, 'Bear fruits' AS status, '1.494385, 110.219803' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5008 AS BlockID)
				AS tem_37 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7037)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7038 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-11' AS plantDate,
				'16m' AS tree_height,'47cm' AS diameter, 'Bear fruits' AS status, '1.494330, 110.219845' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5008 AS BlockID)
				AS tem_38 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7038)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7039 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-11' AS plantDate,
				'15m' AS tree_height,'45cm' AS diameter, 'Bear fruits' AS status, '1.494312, 110.219771' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5008 AS BlockID)
				AS tem_39 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7039)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7040 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-11' AS plantDate,
				'15m' AS tree_height,'43cm' AS diameter, 'Bear fruits' AS status, '1.494279, 110.219832' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5008 AS BlockID)
				AS tem_40 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7040)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7041 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2020-10-01' AS plantDate,
				'28m' AS tree_height,'92cm' AS diameter, 'Growing' AS status, '1.495474, 110.220234' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5009 AS BlockID)
				AS tem_41 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7041)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7042 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2020-10-01' AS plantDate,
				'29m' AS tree_height,'90cm' AS diameter, 'Growing' AS status, '1.495527, 110.220157' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5009 AS BlockID)
				AS tem_42 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7042)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7043 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-04-21' AS plantDate,
				'22m' AS tree_height,'58cm' AS diameter, 'Bear fruits' AS status, '1.495504, 110.220330' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5009 AS BlockID)
				AS tem_43 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7043)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7044 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-05-17' AS plantDate,
				'27m' AS tree_height,'68cm' AS diameter, 'Bear fruits' AS status, '1.495388, 110.220336' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5009 AS BlockID)
				AS tem_44 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7044)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7045 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-26' AS plantDate,
				'15m' AS tree_height,'43cm' AS diameter, 'Bear fruits' AS status, '1.495393, 110.220223' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5009 AS BlockID)
				AS tem_45 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7045)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7046 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-10-05' AS plantDate,
				'18m' AS tree_height,'74cm' AS diameter, 'Bear fruits' AS status, '1.495423, 110.220472' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5010 AS BlockID)
				AS tem_46 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7046)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7047 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2020-08-18' AS plantDate,
				'2m' AS tree_height,'14cm' AS diameter, 'Growing' AS status, '1.495341, 110.220502' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5010 AS BlockID)
				AS tem_47 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7047)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7048 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2020-08-18' AS plantDate,
				'2m' AS tree_height,'13cm' AS diameter, 'Growing' AS status, '1.495384, 110.220570' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5010 AS BlockID)
				AS tem_48 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7048)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7049 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2020-08-18' AS plantDate,
				'2m' AS tree_height,'12cm' AS diameter, 'Growing' AS status, '1.495424, 110.220629' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5010 AS BlockID)
				AS tem_49 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7049)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7050 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-05-27' AS plantDate,
				'18m' AS tree_height,'66cm' AS diameter, 'Bear fruits' AS status, '1.495495, 110.220562' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5010 AS BlockID)
				AS tem_50 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7050)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7051 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-31' AS plantDate,
				'15m' AS tree_height,'45cm' AS diameter, 'Bear fruits' AS status, '1.495582, 110.219419' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5011 AS BlockID)
				AS tem_51 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7051)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7052 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-05-11' AS plantDate,
				'26m' AS tree_height,'68cm' AS diameter, 'Bear fruits' AS status, '1.495579, 110.219506' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5011 AS BlockID)
				AS tem_52 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7052)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7053 AS TreeID, 'mangosteen.jpg' AS tree_Image, 'Mangosteen' AS spesiesName, '2012-04-27' AS plantDate,
				'23m' AS tree_height,'57cm' AS diameter, 'Bear fruits' AS status, '1.495514, 110.219417' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5011 AS BlockID)
				AS tem_53 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7053)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7054 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-06-02' AS plantDate,
				'40m' AS tree_height,'110cm' AS diameter, 'Flowering' AS status, '1.495493, 110.219576' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5011 AS BlockID)
				AS tem_54 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7054)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7055 AS TreeID, 'durian.jpg' AS tree_Image,'Musang King Durian' AS spesiesName, '2015-05-26' AS plantDate,
				'40m' AS tree_height,'110cm' AS diameter, 'Bear fruits' AS status, '1.495594, 110.219593' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5011 AS BlockID)
				AS tem_55 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7055)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7056 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-10-10' AS plantDate,
				'18m' AS tree_height,'73cm' AS diameter, 'Bear fruits' AS status, '1.495678, 110.219398' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5012 AS BlockID)
				AS tem_56 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7056)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7057 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-03' AS plantDate,
				'18m' AS tree_height,'65cm' AS diameter, 'Bear fruits' AS status, '1.495676, 110.219519' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5012 AS BlockID)
				AS tem_57 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7057)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7058 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-06-18' AS plantDate,
				'40m' AS tree_height,'110cm' AS diameter, 'Flowering' AS status, '1.495675, 110.219614' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5012 AS BlockID)
				AS tem_58 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7058)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7059 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-04-16' AS plantDate,
				'26m' AS tree_height,'66cm' AS diameter, 'Flowering' AS status, '1.495741, 110.219575' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5012 AS BlockID)
				AS tem_59 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7059)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7060 AS TreeID, 'mangosteen.jpg' AS tree_Image,'Mangosteen' AS spesiesName, '2012-05-01' AS plantDate,
				'22m' AS tree_height,'57cm' AS diameter, 'Bear fruits' AS status, '1.495747, 110.219441' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5012 AS BlockID)
				AS tem_60 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7060)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7061 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-31' AS plantDate,
				'15m' AS tree_height,'44cm' AS diameter, 'Bear fruits' AS status, '1.495931, 110.220590' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5013 AS BlockID)
				AS tem_61 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7061)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7062 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-12' AS plantDate,
				'19m' AS tree_height,'68cm' AS diameter, 'Bear fruits' AS status, '1.495871, 110.220659' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5013 AS BlockID)
				AS tem_62 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7062)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7063 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-25' AS plantDate,
				'40m' AS tree_height,'110cm' AS diameter, 'Bear fruits' AS status, '1.495872, 110.220745' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5013 AS BlockID)
				AS tem_63 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7063)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7064 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2015-05-26' AS plantDate,
				'43m' AS tree_height,'112cm' AS diameter, 'Bear fruits' AS status, '1.495928, 110.220820' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5013 AS BlockID)
				AS tem_64 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7064)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7065 AS TreeID, 'mango.jpg' AS tree_Image,'Mango' AS spesiesName, '2014-10-11' AS plantDate,
				'17m' AS tree_height,'70cm' AS diameter, 'Bear fruits' AS status, '1.495938, 110.220715' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5013 AS BlockID)
				AS tem_65 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7065)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7066 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2015-05-26' AS plantDate,
				'44m' AS tree_height,'111cm' AS diameter, 'Bear fruits' AS status, '1.496102, 110.220568' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5014 AS BlockID)
				AS tem_66 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7066)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7067 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-06-01' AS plantDate,
				'14m' AS tree_height,'43cm' AS diameter, 'Bear fruits' AS status, '1.496101, 110.220717' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5014 AS BlockID)
				AS tem_67 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7067)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7068 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-25' AS plantDate,
				'4m' AS tree_height,'19cm' AS diameter, 'Bear fruits' AS status, '1.496107, 110.220847' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5014 AS BlockID)
				AS tem_68 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7068)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7069 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2014-02-25' AS plantDate,
				'4m' AS tree_height,'18cm' AS diameter, 'Bear fruits' AS status, '1.496136, 110.220626' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5014 AS BlockID)
				AS tem_69 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7069)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7070 AS TreeID, 'mangosteen.jpg' AS tree_Image,'Mangosteen' AS spesiesName, '2012-05-21' AS plantDate,
				'22m' AS tree_height,'58cm' AS diameter, 'Bear fruits' AS status, '1.496129, 110.220785' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5014 AS BlockID)
				AS tem_70 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7070)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7071 AS TreeID, 'mango.jpg' AS tree_Image, 'Mango' AS spesiesName, '2014-11-06' AS plantDate,
				'18m' AS tree_height,'72cm' AS diameter, 'Flowering' AS status,'1.496038, 110.219456' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5015 AS BlockID)
				AS tem_71 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7071)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7072 AS TreeID, 'dragonfruit.jpg' AS tree_Image, 'Dragon fruit' AS spesiesName, '2020-07-23' AS plantDate,
				'2m' AS tree_height,'14cm' AS diameter, 'Growing' AS status,'1.496041, 110.219604' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5015 AS BlockID)
				AS tem_72 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7072)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7073 AS TreeID, 'rambutan.jpg' AS tree_Image, 'Rambutan' AS spesiesName, '2016-05-24' AS plantDate,
				'40m' AS tree_height,'110cm' AS diameter, 'Bear fruits' AS status,'1.496002, 110.219534' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5015 AS BlockID)
				AS tem_73 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7073)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7074 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2015-05-26' AS plantDate,
				'43m' AS tree_height,'113cm' AS diameter, 'Bear fruits' AS status,'1.495953, 110.219448' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5015 AS BlockID)
				AS tem_74 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7074)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7075 AS TreeID, 'durian.jpg' AS tree_Image,'Musang King Durian' AS spesiesName, '2015-05-26' AS plantDate,
				'44m' AS tree_height,'111cm' AS diameter, 'Bear fruits' AS status,'1.495955, 110.219552' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5015 AS BlockID)
				AS tem_75 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7075)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7076 AS TreeID, 'durian.jpg' AS tree_Image, 'Musang King Durian' AS spesiesName, '2015-05-26' AS plantDate,
				'43m' AS tree_height,'115cm' AS diameter, 'Bear fruits' AS status,'1.496167, 110.219485' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5016 AS BlockID)
				AS tem_76 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7076)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7077 AS TreeID, 'langsat.jpg' AS tree_Image, 'Langsat' AS spesiesName, '2012-06-28' AS plantDate,
				'26m' AS tree_height,'66cm' AS diameter, 'Flowering' AS status,'1.496164, 110.219584' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5016 AS BlockID)
				AS tem_77 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7077)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7078 AS TreeID, 'cempedak.jpg' AS tree_Image, 'Cempedak' AS spesiesName, '2015-06-01' AS plantDate,
				'18m' AS tree_height,'66cm' AS diameter, 'Bear fruits' AS status,'1.496147, 110.219666' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5016 AS BlockID)
				AS tem_78 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7078)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7079 AS TreeID, 'ciku.jpg' AS tree_Image, 'Ciku' AS spesiesName, '2015-05-26' AS plantDate,
				'15m' AS tree_height,'45cm' AS diameter, 'Bear fruits' AS status,'1.496206, 110.219625' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5016 AS BlockID)
				AS tem_79 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7079)
			UNION ALL
				SELECT TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID
				FROM (SELECT 7080 AS TreeID, 'mangosteen.jpg' AS tree_Image,'Mangosteen' AS spesiesName, '2012-05-23' AS plantDate,
				'22m' AS tree_height,'58cm' AS diameter, 'Bear fruits' AS status,'1.496206, 110.219504' AS GPS_location, 'evergreen tropical tree' AS tree_type, 5016 AS BlockID)
				AS tem_80 WHERE NOT EXISTS (SELECT TreeID FROM Tree WHERE TreeID = 7080)

	) alias_Tree";

	 if (mysqli_query($conn, $sqlTreeData))
	 {
	 }
	 else
	 {
		 echo "Error inserting into Table Tree: " . mysqli_error($conn);
	 }

	 //Insert Block_Client Data
	 $sqlBlkCltData = "INSERT INTO Block_Client(userID,BlockID,purchaseDate,blockQty,totalPrice)
	 SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
		FROM (SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
			FROM (SELECT 10011 AS userID, 5001 AS BlockID, '2021-06-12' AS purchaseDate, 1 AS blockQty, 'RM5000' AS totalPrice)
				AS tempp1 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10011 AND BlockID = 5001)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10012 AS userID, 5002 AS BlockID, '2019-07-23' AS purchaseDate, 1 AS blockQty, 'RM4599' AS totalPrice)
				AS tempp2 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10012 AND BlockID = 5002)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10012 AS userID, 5003 AS BlockID, '2019-11-02' AS purchaseDate, 1 AS blockQty, 'RM3899' AS totalPrice)
				AS tempp3 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10012 AND BlockID = 5003)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10013 AS userID, 5004 AS BlockID, '2022-01-04' AS purchaseDate, 1 AS blockQty, 'RM4000' AS totalPrice)
				AS tempp4 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10013 AND BlockID = 5004)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10014 AS userID, 5007 AS BlockID, '2022-02-20' AS purchaseDate, 1 AS blockQty, 'RM4899' AS totalPrice)
				AS tempp5 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10014 AND BlockID = 5007)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10014 AS userID, 5014 AS BlockID, '2022-03-03' AS purchaseDate, 1 AS blockQty, 'RM4399' AS totalPrice)
				AS tempp6 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10014 AND BlockID = 5014)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10015 AS userID, 5005 AS BlockID, '2022-01-04' AS purchaseDate, 1 AS blockQty, 'RM4100' AS totalPrice)
				AS tempp7 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10015 AND BlockID = 5005)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10015 AS userID, 5006 AS BlockID, '2022-01-04' AS purchaseDate, 1 AS blockQty, 'RM5300' AS totalPrice)
				AS tempp8 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10015 AND BlockID = 5006)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10016 AS userID, 5010 AS BlockID, '2019-10-15' AS purchaseDate, 1 AS blockQty, 'RM5388' AS totalPrice)
				AS tempp9 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10016 AND BlockID = 5010)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10017 AS userID, 5011 AS BlockID, '2019-12-26' AS purchaseDate, 1 AS blockQty, 'RM4888' AS totalPrice)
				AS tempp10 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10017 AND BlockID = 5011)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10017 AS userID, 5012 AS BlockID, '2021-07-23' AS purchaseDate, 1 AS blockQty, 'RM5888' AS totalPrice)
				AS tempp11 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10017 AND BlockID = 5012)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10018 AS userID, 5013 AS BlockID, '2022-01-04' AS purchaseDate, 1 AS blockQty, 'RM4688' AS totalPrice)
				AS tempp12 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10018 AND BlockID = 5013)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10019 AS userID, 5015 AS BlockID, '2021-04-12' AS purchaseDate, 1 AS blockQty, 'RM4000' AS totalPrice)
				AS tempp13 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10019 AND BlockID = 5015)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10019 AS userID, 5016 AS BlockID, '2021-12-17' AS purchaseDate, 1 AS blockQty, 'RM4388' AS totalPrice)
				AS tempp14 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10019 AND BlockID = 5016)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10020 AS userID, 5008 AS BlockID, '2020-11-09' AS purchaseDate, 1 AS blockQty, 'RM5000' AS totalPrice)
				AS tempp15 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10020 AND BlockID = 5008)
			UNION ALL
				SELECT userID,BlockID,purchaseDate,blockQty,totalPrice
				FROM (SELECT 10020 AS userID, 5009 AS BlockID, '2020-11-09' AS purchaseDate, 1 AS blockQty, 'RM6388' AS totalPrice)
				AS tempp16 WHERE NOT EXISTS (SELECT userID,BlockID FROM Block_Client WHERE userID = 10020 AND BlockID = 5009)
	) alias_Block_Client";

	 if (mysqli_query($conn, $sqlBlkCltData))
	 {
	 }
	 else
	 {
		 echo "Error inserting into Table Block_Client: " . mysqli_error($conn);
	 }

	 //Insert Tree_Worker Data
	 $sqlTreeWrkrData = "INSERT INTO Tree_Worker(userID,TreeID,Worker_startDate)
	 SELECT userID,TreeID,Worker_startDate
		FROM (SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7001 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp1 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7001)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7002 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp2 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7002)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7003 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp3 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7003)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7004 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp4 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7004)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7005 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp5 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7005)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7006 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp6 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7006)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7007 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp7 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7007)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7008 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp8 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7008)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7009 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp9 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7009)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7010 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp10 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7010)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7011 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp11 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7011)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7012 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp12 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7012)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7013 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp13 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7013)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7014 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp14 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7014)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7015 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp15 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7015)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7016 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp16 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7016)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7017 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp17 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7017)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7018 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp18 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7018)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7019 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp19 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7019)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7020 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp20 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7020)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7021 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp21 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7021)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7022 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp22 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7022)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7023 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp23 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7023)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7024 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp24 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7024)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7025 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp25 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7025)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7026 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp26 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7026)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7027 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp27 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7027)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7028 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp28 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7028)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7029 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp29 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7029)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7030 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp30 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7030)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7031 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp31 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7031)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7032 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp32 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7032)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7033 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp33 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7033)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7034 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp34 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7034)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7035 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp35 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7035)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7036 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp36 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7036)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7037 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp37 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7037)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7038 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp38 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7038)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7039 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp39 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7039)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7040 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp40 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7040)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7041 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp41 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7041)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7042 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp42 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7042)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7043 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp43 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7043)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7044 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp44 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7044)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7045 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp45 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7045)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7046 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp46 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7046)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7047 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp47 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7047)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7048 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp48 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7048)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7049 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp49 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7049)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7050 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp50 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7050)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7051 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp51 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7051)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7052 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp52 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7052)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10001 AS userID, 7053 AS TreeID, '2019-06-07' AS Worker_startDate)
			AS temp53 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7053)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7054 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp54 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7054)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7055 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp55 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7055)
		UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10002 AS userID, 7056 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp56 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7056)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7057 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp57 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7057)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7058 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp58 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7058)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10003 AS userID, 7059 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp59 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7059)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7060 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp60 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7060)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7061 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp61 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7061)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10004 AS userID, 7062 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp62 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7062)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7063 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp63 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7063)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7064 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp64 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7064)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10005 AS userID, 7065 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp65 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7065)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7066 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp66 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7066)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7067 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp67 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7067)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10006 AS userID, 7068 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp68 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7068)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7069 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp69 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7069)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7070 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp70 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7070)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10007 AS userID, 7071 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp71 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7071)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7072 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp72 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7072)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7073 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp73 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7073)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10008 AS userID, 7074 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp74 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7074)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7075 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp75 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7075)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7076 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp76 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7076)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10009 AS userID, 7077 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp77 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7077)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7078 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp78 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7078)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7079 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp79 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7079)
			UNION ALL
			SELECT userID,TreeID,Worker_startDate
			FROM (SELECT 10010 AS userID, 7080 AS TreeID, '2020-11-09' AS Worker_startDate)
			AS temp80 WHERE NOT EXISTS (SELECT TreeID FROM Tree_Worker WHERE TreeID = 7080)
	) alias_TreeWorker";
		
	 if (mysqli_query($conn, $sqlTreeWrkrData))
	 {
	 }
	 else
	 {
	 	echo "Error inserting into Table Tree_Worker: " . mysqli_error($conn);
	 }

	// mysqli_close($conn);
	
?>