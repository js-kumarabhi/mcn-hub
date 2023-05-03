<?php
	$conn = new mysqli('localhost', 'root', '', 'id18895905_mcn');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>