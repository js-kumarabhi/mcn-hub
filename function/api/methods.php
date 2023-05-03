<?php
include_once '../database.php';
class Cls_User{
    
    private $conn;
    public function __construct($db){
        $this->conn = $db;
    }

// Admin login
 public function login()
  {

            $query = " SELECT * FROM admin WHERE adminName = '$this->name' && adminPass = '$this->pass'";
            $stmt = $this->conn->prepare($query);
            //$stmt->bindParam(1,$this->Phone);
            $stmt->execute();
            $num = $stmt->rowCount();

            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row>0)
            {
            return json_encode($row); 
            }
           
         
}
// MCN Notice Fetch 
    public function notice()
  {

     $query = " SELECT * FROM post WHERE clg = '$this->clg'";

         $stmt = $this->conn->prepare($query);
  
            $stmt->execute();
            $num = $stmt->rowCount();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);

 			if ($row>0)
            {
                $id = $row['id'];
                $url = $row['url'];
                $caption = $row['caption'];
                $like=$row['likes'];
            } 
                
          while ($num) {
                 $succesfulladdressJsonData = array('id' =>$id,'url' =>$url,'caption' =>$caption,'Like' =>$like);

             return json_encode($succesfulladdressJsonData);

            }
   
    }
         
//Mcn students registration
 
 public function register()
  {
       
        $query = "INSERT INTO students (id,name,phone,clg)
              VALUES ('$this->id','$this->name','$this->phone','$this->clg')";
         $stmt = $this->conn->prepare($query);
         $stmt->execute();
         $num = $stmt->rowCount();
         if ($num>0) {

            $query =  "SELECT * FROM `college_list` WHERE `collegeName`='$this->clg'";

            $run = $this->conn->prepare($query);
            $run->execute();
            $num = $run->rowCount();
            $row = $run->fetch(PDO::FETCH_ASSOC);

            if ($row>0)
            {
            $college = $row['collegeName'];
            $code = $row['collegeCode'];
            $website = $row['collegeWebsite'];
            $university =$row['universityWebsite'];
            $banner = $row['banner'];

           } 

           $succesfulladdressJsonData = array("status"=>"Registration Succesfully","college"=>$college,"code"=>$code,"site"=>$website,"university"=>$university,"banner"=>$banner);
           
          
           
             return json_encode($succesfulladdressJsonData);
         }
         else{

             return false;
         }
         }

}
?>