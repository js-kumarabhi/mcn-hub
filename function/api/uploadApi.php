<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: POST"); // here is define the request method

include '../database.php'; // include database connection file

$data = json_decode(file_get_contents("php://input"), true); // collect input parameters and convert into readable format
	
$fileName  =  $_FILES['sendimage']['name'];
$tempPath  =  $_FILES['sendimage']['tmp_name'];
$fileSize  =  $_FILES['sendimage']['size'];
$caption=$_POST['caption'];
$clg=$_POST['collegeName'];
$code=$_POST['collegeCode'];
		
if(empty($fileName))
{
	$errorMSG = json_encode(array("message" => "please select image", "status" => false));	
	echo $errorMSG;
}
else
{
	$upload_path = 'upload/notice/'; // set upload folder path 
	
	$fileExt = strtolower(pathinfo($fileName,PATHINFO_EXTENSION)); // get image extension
		
	// valid image extensions
	$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); 
					
	// allow valid image file formats
	if(in_array($fileExt, $valid_extensions))
	{				
		//check file not exist our upload folder path
		if(!file_exists($upload_path . $fileName))
		{
			// check file size '5MB'
			if($fileSize < 5000000){
				move_uploaded_file($tempPath, $upload_path . $fileName); // move file from system temporary path to our upload folder path 
			}
			else{		
				$errorMSG = json_encode(array("message" => "Sorry, your file is too large, please upload 5 MB size", "status" => false));	
				echo $errorMSG;
			}
		}
		else
		{		
			$errorMSG = json_encode(array("message" => "Sorry, file already exists check upload folder", "status" => false));	
			echo $errorMSG;
		}
	}
	else
	{		
		$errorMSG = json_encode(array("message" => "Sorry, only JPG, JPEG, PNG & GIF files are allowed", "status" => false));	
		echo $errorMSG;		
	}
}

$upload_date=date("Y/m/d");
$fileName  =  "https://mcnonline.in/function/api/upload/notice/".$fileName;
		
// if no error caused, continue ....
if(!isset($errorMSG))
{
  $query =  mysqli_query($con,'INSERT into post (url,caption,clg,code,upload_date) VALUES("'.$fileName.'","'.$caption.'","'.$clg.'","'.$code.'","'.$upload_date.'")');
			
	echo json_encode(array("message" => "Image Uploaded Successfully", "status" => true));	
}

?>