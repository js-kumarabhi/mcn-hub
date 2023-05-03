<?php

header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include_once '../database.php';// include database connection file

//checking user query to database query
$check_data = "SELECT * FROM `college_list` WHERE 1";
$run_query = mysqli_query($con, $check_data) or die("Error");

// if user query matched to database query we'll show the reply otherwise it go to else statement
if(mysqli_num_rows($run_query) > 0){
    //fetching replay from the database according to the user query

  
  while ($fetch_data = mysqli_fetch_assoc($run_query)) {


     $data[]=$fetch_data;
     $json = json_encode($data); 
  
    }


}else{
   		 $FailureJsonData = array('error' => "true",'status' => "Something wrong" ); 
       $json = json_encode($FailureJsonData); 
         
}
echo $json;

?>
