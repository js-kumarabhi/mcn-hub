<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['librarian']) || trim($_SESSION['librarian']) == ''){
		header('location: index.php');
	}

	$sql = "SELECT * FROM librarian WHERE id = '".$_SESSION['librarian']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>