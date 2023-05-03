<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];
		 $code= $user['collegeCode'];
		
	//	$sql = "INSERT INTO category (name) VALUES ('$name')";

		$sql = "INSERT INTO `category`(`name`, `collegeCode`) VALUES ('$name','$code')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Category added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: category.php');

?>