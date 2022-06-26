
<?php

	include "dbConnection.php";
	$orchardID = $_GET['orchardID'];
	$sql = "DELETE FROM `orchard` WHERE orchardID = $orchardID";
	$result = mysqli_query($conn, $sql);
	
	if($result){
			header("Location: adminOrchard.php?msg=Record deleted successfully");
	}
	else{
		echo "Failed: " . mysqli_error($conn);
	}
?>
