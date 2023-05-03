<?php
header("Content-Type: application/json");
header("Acess-Control-Allow-Origin: *");
header("Acess-Control-Allow-Methods: GET");
header("Acess-Control-Allow-Headers: Acess-Control-Allow-Headers,Content-Type,Acess-Control-Allow-Methods, Authorization");

include_once '../database.php';// include database connection file

$c=$_POST['code'];
$result = mysqli_query($con,"SELECT * FROM post where code='$c'");
if(mysqli_num_rows($result) > 0){

    //fetching replay from the database according to the user query

  while ($fetch_data = mysqli_fetch_assoc($result)) {

     $data [] =$fetch_data;
     $json = json_encode($data); 
  
    }


}else{

       $FailureJsonData = array('error' => "true",'status' => "Something wrong" );    	  
       $json = json_encode($FailureJsonData); 
         
}
        print $json;

?>