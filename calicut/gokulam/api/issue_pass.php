<?php
/* include db.config.php */
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);
header('Access-Control-Allow-Origin: *');
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$name= $obj->name;
$employee_id= $obj->employee_id;
$amount=$obj->amount;
$valid_from = $obj->valid_from;
$valid_to = $obj->valid_to;
$flag = 1;
//$date = date("Y/m/d");
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$date=  date('Y-m-d H:i:s');



if($_SERVER["REQUEST_METHOD"] == "POST"){

$query = "INSERT INTO employee_pass (name,employee_id,valid_from,valid_to,amount,flag) VALUES ('$name', '$employee_id','$valid_from', '$valid_to','$amount','1' )"; 
$insert = mysql_query($query);

if($insert){
$data = array("success" => 1, "message" => "Successfully Pass Issued!");
}} else {
$data = array("success" => 0, "message" => "Error!");
}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>