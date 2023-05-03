<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


include_once '../database.php';
include_once './methods.php';

// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
$reseller_main = new Cls_User($db);

$data = json_decode(file_get_contents("php://input"));
if($_SERVER['REQUEST_METHOD'] === "POST")
{
if(isset($_POST['adminName']))
   {

     $reseller_main->name = $_POST['adminName'];
     $reseller_main->pass = $_POST['adminPass'];
    if($data =$reseller_main->login()){
        http_response_code(201);
        echo $data;
    }
    else{
        http_response_code(201);
        $faildBankJsonData = array("error"=>"true","message"=>"Error Admin not found .....");
        echo json_encode($faildBankJsonData);
    }

 }
 else
          {
            echo json_encode(array("error"=>"true","message"=>"wrong validation"));
          } 

}
else
{
  echo json_encode(array("error"=>"true","message"=>"Access Denied!"));
}


