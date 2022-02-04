<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$userid= $obj->userid;
$card_number= $obj->card_number;
$vehicle_type= $obj->vehicle_type;
$client_id= $obj->client_id;
$vehicle_number= $obj->vehicle_number;
$redemption_id = $obj->redemption_id;
$remarks = $obj->remarks;
//$exit_user_id = $obj->exit_user_id;
$curdate=  date('Y-m-d');

$exit_time = date('Y-m-d H:i:s');
$flag= 1;
$status = 0;
$foc = 1;

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$exit_time=  date('Y-m-d H:i:s');


if ($fine_type == 1 )  {

$type = "Parking at Unauthorized Site" ;
$amount = "100"  ;
}

else if ($fine_type == 2 )  { 
$type = "Parking Obstructions" ;
$amount = "100"  ;
}
else if ($fine_type == 3 )  { 
$type = "Rash & Negligent Driving" ;
$amount = "100"  ;
}
else if ($fine_type == 4 )   { 
$type = "Defective/Damage Ticket Card" ;	
$amount = "100"  ;
}
else if ($fine_type == 5 )   { 
$type = "Lost Card" ;	
$amount = "100"  ;
}



if ($card_number != '' ) {


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number')";
$insert = mysql_query($query);

if($insert){
$data = array("success" => 1, "message" => "Successfully fine details added!" , "fined_mount" => "$amount" , "type" => "$type" , "vehicle_number" => "$vehicle_number" );
}


else if ($vehicle_number != '' ) 


{


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number')";
$insert = mysql_query($query);

if($insert){
$data = array("success" => 1, "message" => "Successfully fine details added!" , "fined_mount" => "$amount" , "type" => "$type" , "vehicle_number" => "$vehicle_number" );
}}




}




?>