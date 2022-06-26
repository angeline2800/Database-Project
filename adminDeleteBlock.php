
<?php

	include "dbConnection.php";
	$BlockID = $_GET['BlockID'];
	$sql = "DELETE FROM `block` WHERE BlockID = $BlockID";
	$result = mysqli_query($conn, $sql);
	
	if($result){
			header("Location: adminBlock.php?msg=Record deleted successfully");
	}
	else{
		echo "Failed: " . mysqli_error($conn);
	}
?>
