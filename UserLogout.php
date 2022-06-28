<?php
	session_start();
	session_unset();
	session_destroy();  
	echo"<script type=\"text/javascript\">
		alert(\"Logout Successfully...!\");
		window.location = 'UserLoginForm.php';
		</script>";
?>