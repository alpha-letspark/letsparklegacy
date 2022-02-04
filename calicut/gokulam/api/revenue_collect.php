<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$user_id= $obj->user_id;
$device_id= $obj->device_id;
$amount_received= $obj->amount_received;
$status= $obj->status;
$amount_due= $obj->amount_due;

if($_SERVER["REQUEST_METHOD"] == "POST"){

$query = "INSERT INTO revenuecollect (user_id,device_id,amount_received,status, amount_due) VALUES ('$user_id','$device_id','$amount_received','$status', '$amount_due' )";
$insert = mysql_query($query);

$query1 = "update details_transaction  set  flag = '1'  where userid = '$user_id' and status = '0'";
$insert1 = mysql_query($query1);


if($insert){
$data = array("success" => 1, "message" => "Successfully revenue details added!");
}} else {
$data = array("success" => 0, "message" => "Error!");
}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>
