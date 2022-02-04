<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$userid= $obj->userid;
$transaction_id= $obj->transaction_id;
$vehicle_type= $obj->vehicle_type;
$client_id= $obj->client_settings_id;
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$entry_time=  date('Y-m-d H:i:s');
$exit_time= $obj->exit_time;
$extra=$obj->status;
$status=$obj->status;
//$amount=$obj->amount;

if ($vehicle_type == "2" )  {
$amount = "10"  ;
}
else { 
$amount = "20"  ;
}

//$date = date("Y/m/d"); // Here we set by default status active.


if($_SERVER["REQUEST_METHOD"] == "POST"){


$api_status="Insert new Transaction";
$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,exit_time,status,amount) VALUES ('$userid','$transaction_id','$vehicle_type','$entry_time','$exit_time','$status','$amount')";
$insert = mysql_query($query);

$api_status="New Transaction Add Status {$insert} newsLotsLeft: {$new_slots_left}";
if($insert){
$data = array("success" => 1, "message" => "Successfully added transaction details!","status"=> $api_status);
}else {
$data = array("success" => 0, "message" => "Error!","status"=> $api_status);
}





}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>