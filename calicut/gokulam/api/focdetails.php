<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$userid= $obj->userid;
$remarks= $obj->remarks;
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$date=  date('Y-m-d H:i:s');

if($_SERVER["REQUEST_METHOD"] == "POST"){
$query = "INSERT INTO focreport (userid,remarks,date) VALUES ('$userid','$remarks','$date')";
$insert = mysql_query($query);
if($insert){
$data = array("success" => 1, "message" => "Successfully remarks added!");
}else {
$data = array("success" => 0, "message" => "Error!");
}
}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>