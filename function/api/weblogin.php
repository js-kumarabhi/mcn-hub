<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include_once '../database.php';// include database connection file

$web_token=$_POST['token'];
$id=$_POST['id'];
//checking user query to database query
$check_data = "UPDATE `students` SET `token`='$web_token' WHERE `id`='$id'";
 $run_query = mysqli_query($con, $check_data);
if($run_query>0){
		$value = array('result' => "success"); 
		// Use json_encode() function 
		$json = json_encode($value); 
		// Display the output 
		echo($json); 
}else{
    echo "Sorry WebLogin Authentication Failed";
}
?>