<?php
	$conn = new mysqli('localhost', 'mcnonlin_main', 'Password@1234#', 'mcnonlin_main');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>