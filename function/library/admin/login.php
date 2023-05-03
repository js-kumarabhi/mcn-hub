<?php

	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

	$sql = "SELECT * FROM librarian WHERE username = '$username' && password = '$password'";

		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
				$_SESSION['librarian'] = $row['id'];
				$_SESSION['librarianClg'] = $row['collegeCode'];
		}
		
	}
	else{
		$_SESSION['error'] = 'Input librarian credentials first';
	}

	header('location: index.php');

?>