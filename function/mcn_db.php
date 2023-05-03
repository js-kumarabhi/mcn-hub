<?php
$servername = "192.0.2.1";
$username = "root";
$password = "";
$dbname = "mcnonline_main";

$con = mysqli_connect($servername,$username,$password,$dbname);

// Check connection
if (!$con) 
{
    die("Connection failed: " . mysqli_connect_error());
}
?>
