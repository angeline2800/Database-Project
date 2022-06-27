<?php

	include "dbConnection.php";
	$userID = $_GET['userID'];
	$sql = "DELETE FROM `user` WHERE userID = $userID";

	$result = mysqli_query($conn, $sql);
	
	if($result){
			header("Location: admin.php?msg=Record deleted successfully");
	}
	else{
		echo "Failed: " . mysqli_error($conn);
	}
?>
