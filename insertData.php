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
	
	//Insert User
	$sqlUser = "INSERT INTO User(userID,userName,userAdd,userEmail,userPW,userPhone,userCountry,userType)
				VALUES (10001, 'Allyson Lim Kai Sheng', 'No 11, Jalan Abell, 93100, Kuching, Sarawak', 'allyson@gmail.com', SHA1('All@123'), '0193467456', 'Malaysia', 'worker'),
				(10002, 'Lisa Munisah Binti Aman', 'No 34, Jalan Batu Kawa, 93250, Kuching, Sarawak', 'lisa12@gmail.com', SHA1('Lisa#82@'), '0123890537', 'Malaysia', 'worker'),
				(10003, 'Muhammad Ahmmad Bin Razak', 'No 99, Jalan Berjaya, 93300, Kuching, Sarawak', 'ahmmad88@gmail.com', SHA1('Ahmad!123'), '0132435684', 'Malaysia', 'worker'),
				(10004, 'Yuna Ting Ying Hui', 'No 14, Jalan Deshon, 93100, Kuching, Sarawak', 'yuna99@gmail.com', SHA1('yuna&12'), '0194578903', 'Malaysia', 'worker'),
				(10005, 'Ahmed Hassin Bin Abdullah', 'No 10, Jalan Enggang, 93050, Kuching, Sarawak', 'ahmed02@gmail.com', SHA1('ahmed$11'), '0102341208', 'Malaysia', 'worker'),
				(10006, 'Toh Jun Jie', 'Lot 15, Jalan Hijau, 93150, Kuching, Sarawak', 'tjj66@gmail.com', SHA1('7jj&66'), '0176436858', 'Malaysia', 'worker'),
				(10007, 'Muhammad Ismail bin Abdul', 'Lot 18A, Jalan Gani, 93050, Kuching, Sarawak', 'ismail@gmail.com', SHA1('ism@11'), '0126676816', 'Malaysia', 'worker'),
				(10008, 'Ealingesh a/l Yugendran', 'Lot 119, Jalan Berjaya, 93300, Kuching, Sarawak', 'ealingesh33@gmail.com', SHA1('3@3eal'), '0193934693', 'Malaysia', 'worker'),
				(10009, 'Subashan Vadibeler', 'Lot 53, Jalan Utama, 93100, Kuching, Sarawak', 'shandi@gmail.com', SHA1('sV#234'), '0109786234', 'Malaysia', 'worker'),
				(10010, 'Chia Hui Min', 'Lot 10, Jalan Enggang, 93050, Kuching, Sarawak', 'huimin10@gmail.com', SHA1('Chm1010'), '0126785593', 'Malaysia', 'worker'),
				(31001, 'Amirah Aisyah Binti Karul', 'No 18, Jalan Gani, 93050, Kuching, Sarawak', 'amirah@gmail.com', SHA1('Ami&40+'), '0125674598', 'Malaysia', 'client'),
				(31002, 'Lam Kim Sam', 'No 90, Jalan Green, 93150, Kuching, Sarawak', 'kimsan@gmail.com', SHA1('Kim*67M'), '0194347890', 'Malaysia', 'client'),
				(31003, 'Muhammad Farid Bin Mohd Karim', 'No 45, Jalan Istana, 93050, Kuching, Sarawak', 'karim@gmail.com', SHA1('kArim2#'), '0101108903', 'Malaysia', 'client'),
				(31004, 'Amir Haji Bin Kharul', 'No 88, Jalan Helang, 93050, Kuching, Sarawak', 'amir13@gmail.com', SHA1('amiR@&'), '0179023125', 'Malaysia', 'client'),
				(31005, 'Lau Wei Ming', 'No 66, Jalan Hijau, 93150, Kuching, Sarawak', 'lau@gmail.com', SHA1('Lau@wE'), '0120932490', 'Malaysia', 'client'),
				(31006, 'Muhammad Fitri bin Musa', 'No 113, Jalan Mewah, 93050, Kuching, Sarawak', 'fitri@gmail.com', SHA1('tRi&11'), '0108705345', 'Malaysia', 'client'),
				(31007, 'Akesh Nair', 'No 63, Taman Sentosa, 93150, Kuching, Sarawak', 'akesh@gmail.com', SHA1('ak97&1'), '0181273561', 'Malaysia', 'client'),
				(31008, 'Lim Kok Kien', 'No 85, Bukit Jade, 93050, Kuching, Sarawak', 'kklim@gmail.com', SHA1('85#Lim'), '0162816878', 'Malaysia', 'client'),
				(31009, 'Javier Siow', 'Lot 145, Jalan Indah, 93050, Kuching, Sarawak', 'javier@gmail.com', SHA1('jS127$'), '0193937580', 'Malaysia', 'client'),
				(31010, 'Venessa Sim', 'No 1123, Jalan Batu 3, 93150, Kuching, Sarawak', 'venessa@gmail.com', SHA1('venes$98'), '0123875576', 'Malaysia', 'client'),
				(68001, 'Kuching Sincere Sdn Bhd', 'Lot 1836 (SL 5), RJ Business Hub Kuching-Kota Samarahan Expressway, 94300 Kuching, Sarawak', 'kuchingsincere@kchs.com.my', SHA1('kchS#93'), '082503993', 'Malaysia', 'company'),
				(68002, 'Evergreen Kuala Lumpur Sdn Bhd', 'Level 16, The Gardens South Tower, Lingkaran Syed Putra, Mid Valley City, 59200 Kuala Lumpur', 'evergreenkl@egkl.com.my', SHA1('egkl@888'), '0389662500', 'Malaysia', 'company'),
				(68003, 'Bunga Raya Corporate Sdn Bhd', 'Level 19, Tower B, Plaza 33, No. 1, Jalan Kemajuan, Seksyen 13, Petaling Jaya, 46200 Petaling Jaya, Selangor', 'brc@brc.com.my', SHA1('168brc@'), '0378836333', 'Malaysia', 'company'),
				(68004, 'GUH Group', 'Plot 1240 & 1241, Bayan Lepas Free Industrial Zone, Phase 3, 11900, Bayan Lepas, Penang', 'guhholdings@guh.com.my', SHA1('guh&1240'), '046166333', 'Malaysia', 'company'),
				(68005, 'Sarawak Consolidated Industries Berhad', 'Lot 1258, Jalan Utama, Pending Industrial Estate, 93450 Kuching, Sarawak', 'scib@scib.com.my', SHA1('scib@scib'), '082334485', 'Malaysia', 'company')";
	
	if (mysqli_query($conn, $sqlUser)) {
		echo "\nInsert User successfully.";
	} else {
		echo "Error inserting into Table User: " . mysqli_error($conn);
	}
	
	//Insert Worker
	$sqlWorker = "INSERT INTO Worker(userID,worker_position,worker_department,workerDOB)
					VALUES (10001, 'Orchard Worker', 'Plantation', '1992-01-23'),
					(10002, 'Orchard Worker', 'Plantation', '1990-04-19'),
					(10003, 'Orchard Worker', 'Plantation', '1991-12-03'),
					(10004, 'Orchard Worker', 'Plantation', '1991-09-28'),
					(10005, 'Orchard Worker', 'Plantation', '1991-06-09'),
					(10006, 'Orchard Worker', 'Plantation', '1989-03-27'),
					(10007, 'Orchard Worker', 'Plantation', '1993-07-13'),
					(10008, 'Orchard Worker', 'Plantation', '1990-11-25'),
					(10009, 'Orchard Worker', 'Plantation', '1991-09-08'),
					(10010, 'Orchard Worker', 'Plantation', '1992-08-30')";
	
	if (mysqli_query($conn, $sqlWorker)) {
		echo "\nInsert Worker created successfully. ";
	} else {
		echo "Error inserting into Table Worker: " . mysqli_error($conn);
	}

	//Insert Client
	$sqlClient = "INSERT INTO Client(userID,client_photo)
					VALUES (31001, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\woman.jpg')),
					(31002, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31003, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31004, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31005, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31006, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31007, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31008, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31009, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\man.jpg')),
					(31010, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\woman.jpg'))";
	
	if (mysqli_query($conn, $sqlClient)) {
		echo "\nInsert Client created successfully. ";
	} else {
		echo "Error inserting into Table Client: " . mysqli_error($conn);
	}
	
	//Insert Company
	$sqlCompany = "INSERT INTO Company(userID,companyDesc,companyPhoto)
					VALUES (68001, 'Corporate office', LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\company.jpg')),
					(68002, 'Agricultural', LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\company.jpg')),
					(68003, 'Plantation', LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\company.jpg')),
					(68004, 'Manufacturer', LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\company.jpg')),
					(68005, 'Plantation', LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\company.jpg'))";
	
	if (mysqli_query($conn, $sqlCompany)) {
		echo "\nInsert Company created successfully. ";
	} else {
		echo "Error inserting into Table Company: " . mysqli_error($conn);
	}
	
	//Insert Orchard
	$sqlOrchard = "INSERT INTO Orchard(orchardID,orchard_add,orchard_location,userID)
					VALUES (2001, 'Lot 118A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.493661, 110.220412', 68003),
					(2002, 'Lot 118B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.493901, 110.220412', 68003),
					(2003, 'Lot 119A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.494305, 110.220380', 68002),
					(2004, 'Lot 119B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.494294, 110.219822', 68005),
					(2005, 'Lot 220A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.495369, 110.220404', 68005),
					(2006, 'Lot 220B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.495603, 110.219522', 68004),
					(2007, 'Lot 221A, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.496000, 110.220724', 68004),
					(2008, 'Lot 221B, Jalan Sematan, Batu Kawa, 93250 Kuching, Sarawak', '1.496086, 110.219608', 68001)";
	
	if (mysqli_query($conn, $sqlOrchard)) {
		echo "\nInsert Orchard created successfully. ";
	} else {
		echo "Error inserting into Table Orchard: " . mysqli_error($conn);
	}
	
	//Insert Block
	$sqlBlock = "INSERT INTO Block(BlockID,Price,orchardID)
					VALUES (5001, 'RM5000', 2001),
					(5002, 'RM4599', 2001),
					(5003, 'RM3899', 2002),
					(5004, 'RM4000', 2002),
					(5005, 'RM4100', 2003),
					(5006, 'RM5300', 2003),
					(5007, 'RM4899', 2004),
					(5008, 'RM5000', 2004),
					(5009, 'RM6388', 2005),
					(5010, 'RM5388', 2005),
					(5011, 'RM4888', 2006),
					(5012, 'RM5888', 2006),
					(5013, 'RM4688', 2007),
					(5014, 'RM4399', 2007),
					(5015, 'RM4000', 2008),
					(5016, 'RM4388', 2008)";
	
	if (mysqli_query($conn, $sqlBlock)) {
		echo "\nInsert Block created successfully. ";
	} else {
		echo "Error inserting into Table Block: " . mysqli_error($conn);
	}
	
	//Insert Tree
	$sqlTree = "INSERT INTO Tree(TreeID,tree_Image,spesiesName, plantDate, tree_height,diameter,status,GPS_location,tree_type,BlockID)
				VALUES (7001, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2012-03-08', '40m', '108cm', 'Bear fruits', '1.493661, 110.220418','evergreen tropical tree', 5001),
				(7002, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2012-03-08', '43m', '112cm', 'Bear fruits', '1.493719, 110.220419', 'evergreen tropical tree', 5001),
				(7003, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2012-03-08', '38m', '110cm', 'Bear fruits', '1.493769, 110.220328', 'evergreen tropical tree', 5001),
				(7004, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2012-03-08', '45m', '116cm', 'Bear fruits', '1.493787, 110.220252', 'evergreen tropical tree', 5001),
				(7005, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2012-03-08', '41m', '108cm', 'Bear fruits', '1.493871, 110.220410', 'evergreen tropical tree', 5001),
				(7006, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2016-05-23', '40m', '110cm', 'Bear fruits', '1.493843, 110.220334', 'evergreen tropical tree', 5002),
				(7007, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2016-05-23', '40m', '110cm', 'Bear fruits', '1.493937, 110.220366', 'evergreen tropical tree', 5002),
				(7008, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2016-05-23', '40m', '110cm', 'Bear fruits', '1.493844, 110.220441', 'evergreen tropical tree', 5002),
				(7009, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2016-05-23', '40m', '110cm', 'Bear fruits', '1.493901, 110.220412', 'evergreen tropical tree', 5002),
				(7010, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2016-05-23', '40m', '110cm', 'Bear fruits', '1.493901, 110.220412', 'evergreen tropical tree', 5002),
				(7011, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2012-03-27', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5003),
				(7012, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2012-03-27', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5003),
				(7013, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2012-03-27', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5003),
				(7014, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2012-03-27', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5003),
				(7015, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2012-03-27', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5003),
				(7016, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2012-04-15', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5004),
				(7017, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2012-04-15', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5004),
				(7018, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2012-04-15', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5004),
				(7019, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2012-04-15', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5004),
				(7020, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2012-04-15', '40m', '110cm', 'Bear fruits', '1.493661, 110.220412', 'evergreen tropical tree', 5004),
				(7021, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2014-07-21', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5005),
				(7022, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2014-07-21', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5005),
				(7023, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2014-07-21', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5005),
				(7024, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2014-07-21', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5005),
				(7025, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2014-07-21', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5005),
				(7026, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-06-03', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5006),
				(7027, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-06-03', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5006),
				(7028, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-06-03', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5006),
				(7029, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-06-03', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5006),
				(7030, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-06-03', '40m', '110cm', 'Bear fruits', '1.494305, 110.220380', 'evergreen tropical tree', 5006),
				(7031, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2014-02-10', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5007),
				(7032, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2014-02-10', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5007),
				(7033, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2014-02-10', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5007),
				(7034, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2014-02-10', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5007),
				(7035, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2014-02-10', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5007),
				(7036, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-11', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5008),
				(7037, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-11', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5008),
				(7038, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-11', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5008),
				(7039, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-11', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5008),
				(7040, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-11', '40m', '110cm', 'Bear fruits', '1.494294, 110.219822', 'evergreen tropical tree', 5008),
				(7041, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2020-10-01', '40m', '110cm', 'Growing', '1.495369, 110.220404','evergreen tropical tree', 5009),
				(7042, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2020-10-01', '40m', '110cm', 'Growing', '1.495369, 110.220404','evergreen tropical tree', 5009),
				(7043, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2012-04-21', '40m', '110cm', 'Bear fruits', '1.495369, 110.220404', 'evergreen tropical tree', 5009),
				(7044, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2012-05-17', '40m', '110cm', 'Bear fruits', '1.495369, 110.220404', 'evergreen tropical tree', 5009),
				(7045, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495369, 110.220404', 'evergreen tropical tree', 5009),
				(7046, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2014-10-05', '40m', '110cm', 'Bear fruits', '1.495369, 110.220404', 'evergreen tropical tree', 5010),
				(7047, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2020-08-18', '40m', '110cm', 'Growing', '1.495369, 110.220404', 'evergreen tropical tree', 5010),
				(7048, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2020-08-18', '40m', '110cm', 'Growing', '1.495369, 110.220404', 'evergreen tropical tree', 5010),
				(7049, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2020-08-18', '40m', '110cm', 'Growing', '1.495369, 110.220404', 'evergreen tropical tree', 5010),
				(7050, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-05-27', '40m', '110cm', 'Bear fruits', '1.495369, 110.220404', 'evergreen tropical tree', 5010),
				(7051, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5011),
				(7052, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5011),
				(7053, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5011),
				(7054, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2015-05-26', '40m', '110cm', 'Flowering', '1.495603, 110.219522', 'evergreen tropical tree', 5011),
				(7055, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522','evergreen tropical tree', 5011),
				(7056, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5012),
				(7057, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5012),
				(7058, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2015-05-26', '40m', '110cm', 'Flowering', '1.495603, 110.219522', 'evergreen tropical tree', 5012),
				(7059, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5012),
				(7060, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.495603, 110.219522', 'evergreen tropical tree', 5012),
				(7061, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5013),
				(7062, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5013),
				(7063, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5013),
				(7064, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724','evergreen tropical tree', 5013),
				(7065, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5013),
				(7066, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724','evergreen tropical tree', 5014),
				(7067, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5014),
				(7068, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5014),
				(7069, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5014),
				(7070, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496000, 110.220724', 'evergreen tropical tree', 5014),
				(7071, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Mango', '2015-05-26', '40m', '110cm', 'Flowering', '1.496086, 110.219608', 'evergreen tropical tree', 5015),
				(7072, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Dragon fruit', '2015-05-26', '40m', '110cm', 'Growing', '1.496086, 110.219608', 'evergreen tropical tree', 5015),
				(7073, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Rambutan', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608', 'evergreen tropical tree', 5015),
				(7074, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608','evergreen tropical tree', 5015),
				(7075, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608','evergreen tropical tree', 5015),
				(7076, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Musang King Durian', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608','evergreen tropical tree', 5016),
				(7077, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Langsat', '2015-05-26', '40m', '110cm', 'Flowering', '1.496086, 110.219608', 'evergreen tropical tree', 5016),
				(7078, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Cempedak', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608', 'evergreen tropical tree', 5016),
				(7079, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'),'Ciku', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608', 'evergreen tropical tree', 5016),
				(7080, LOAD_FILE('C:\\xampp\\htdocs\\tmf2034\\project\\photo\\tree.jpg'), 'Mangosteen', '2015-05-26', '40m', '110cm', 'Bear fruits', '1.496086, 110.219608', 'evergreen tropical tree', 5016)";
	
	if (mysqli_query($conn, $sqlTree)) {
		echo "\nInsert Tree created successfully. ";
	} else {
		echo "Error inserting into Table Tree: " . mysqli_error($conn);
	}
	
	//Insert Block_Client
	$sqlBlkClt = "INSERT INTO Block_Client(userID,BlockID,purchaseDate,blockQty,totalPrice)
					VALUES (31001, 5001, '2021-06-12', 1, 'RM5000'),
					(31002, 5002, '2019-07-23', 1, 'RM4599'),
					(31002, 5003, '2019-11-02', 1, 'RM3899'),
					(31003, 5004, '2022-01-04', 1, 'RM4000'),
					(31004, 5007, '2020-02-20', 1, 'RM4899'),
					(31004, 5014, '2022-03-03', 1, 'RM4399'),
					(31005, 5005, '2022-01-04', 1, 'RM4100'),
					(31005, 5006, '2022-01-04', 1, 'RM5300'),
					(31006, 5010, '2019-10-15', 1, 'RM5388'),
					(31007, 5011, '2019-12-26', 1, 'RM4888'),
					(31007, 5012, '2021-07-23', 1, 'RM5888'),
					(31008, 5013, '2022-01-04', 1, 'RM4688'),
					(31009, 5015, '2021-04-12', 1, 'RM4000'),
					(31009, 5016, '2021-12-17', 1, 'RM4388'),
					(31010, 5008, '2020-11-09', 1, 'RM5000'),
					(31010, 5009, '2020-11-09', 1, 'RM6388')";
			
	if (mysqli_query($conn, $sqlBlkClt)) {
		echo "\nInsert Block_Client created successfully. ";
	} else {
		echo "Error inserting into Table Block_Client: " . mysqli_error($conn);
	}
	
	//Insert Tree_Worker
	$sqlTreeWrkr = "INSERT INTO Tree_Worker(userID,TreeID,Worker_startDate)
					VALUES (10001, 7001, '2019-06-07'),
					(10001, 7002, '2019-06-07'),
					(10001, 7003, '2019-06-07'),
					(10001, 7004, '2019-06-07'),
					(10001, 7005, '2019-06-07'),
					(10002, 7006, '2020-11-09'),
					(10002, 7007, '2020-11-09'),
					(10002, 7008, '2020-11-09'),
					(10002, 7009, '2020-11-09'),
					(10002, 7010, '2020-11-09'),
					(10003, 7011, '2020-11-09'),
					(10003, 7012, '2020-11-09'),
					(10003, 7013, '2020-11-09'),
					(10003, 7014, '2020-11-09'),
					(10003, 7015, '2020-11-09'),
					(10004, 7016, '2020-11-09'),
					(10004, 7017, '2020-11-09'),
					(10004, 7018, '2020-11-09'),
					(10004, 7019, '2020-11-09'),
					(10004, 7020, '2020-11-09'),
					(10005, 7021, '2020-11-09'),
					(10005, 7022, '2020-11-09'),
					(10005, 7023, '2020-11-09'),
					(10005, 7024, '2020-11-09'),
					(10005, 7025, '2020-11-09'),
					(10006, 7026, '2020-11-09'),
					(10006, 7027, '2020-11-09'),
					(10006, 7028, '2020-11-09'),
					(10006, 7029, '2020-11-09'),
					(10006, 7030, '2020-11-09'),
					(10007, 7031, '2020-11-09'),
					(10007, 7032, '2020-11-09'),
					(10007, 7033, '2020-11-09'),
					(10007, 7034, '2020-11-09'),
					(10007, 7035, '2020-11-09'),
					(10008, 7036, '2020-11-09'),
					(10008, 7037, '2020-11-09'),
					(10008, 7038, '2020-11-09'),
					(10008, 7039, '2020-11-09'),
					(10008, 7040, '2020-11-09'),
					(10009, 7041, '2020-11-09'),
					(10009, 7042, '2020-11-09'),
					(10009, 7043, '2020-11-09'),
					(10009, 7044, '2020-11-09'),
					(10009, 7045, '2020-11-09'),
					(10010, 7046, '2020-11-09'),
					(10010, 7047, '2020-11-09'),
					(10010, 7048, '2020-11-09'),
					(10010, 7049, '2020-11-09'),
					(10010, 7050, '2020-11-09'),
					(10001, 7051, '2020-11-09'),
					(10001, 7052, '2020-11-09'),
					(10001, 7053, '2020-11-09'),
					(10002, 7054, '2020-11-09'),
					(10002, 7055, '2020-11-09'),
					(10002, 7056, '2020-11-09'),
					(10003, 7057, '2020-11-09'),
					(10003, 7058, '2020-11-09'),
					(10003, 7059, '2020-11-09'),
					(10004, 7060, '2020-11-09'),
					(10004, 7061, '2020-11-09'),
					(10004, 7062, '2020-11-09'),
					(10005, 7063, '2020-11-09'),
					(10005, 7064, '2020-11-09'),
					(10005, 7065, '2020-11-09'),
					(10006, 7066, '2020-11-09'),
					(10006, 7067, '2020-11-09'),
					(10006, 7068, '2020-11-09'),
					(10007, 7069, '2020-11-09'),
					(10007, 7070, '2020-11-09'),
					(10007, 7071, '2020-11-09'),
					(10008, 7072, '2020-11-09'),
					(10008, 7073, '2020-11-09'),
					(10008, 7074, '2020-11-09'),
					(10009, 7075, '2020-11-09'),
					(10009, 7076, '2020-11-09'),
					(10009, 7077, '2020-11-09'),
					(10010, 7078, '2020-11-09'),
					(10010, 7079, '2020-11-09'),
					(10010, 7080, '2020-11-09')";
					
	if (mysqli_query($conn, $sqlTreeWrkr)) {
		echo "\nInsert Tree_Worker created successfully. ";
	} else {
		echo "Error inserting into Table Tree_Worker: " . mysqli_error($conn);
	}
	
	mysqli_close($conn);
	
?>