<?php

	include "dbConnection.php";
	$userID = $_GET['userID'];
	$sql = "DELETE FROM `client` WHERE userID = $userID";
	$sql = "DELETE FROM `company` WHERE userID = $userID";
	$sql = "DELETE FROM `worker` WHERE userID = $userID";
	$result = mysqli_query($conn, $sql);
	
	if($result){
			header("Location: admin.php?msg=Record deleted successfully");
	}
	else{
		echo "Failed: " . mysqli_error($conn);
	}
?>
