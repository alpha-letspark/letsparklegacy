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
$fine_type= $obj->fine_type;
//$exit_user_id = $obj->exit_user_id;
$curdate=  date('Y-m-d');
$created_at = date('Y-m-d H:i:s');
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


//if condition stats checked by card number
if ($vehicle_number == "") {
 
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "select  transaction_id,vehicle_type,vehicle_number,entry_time,convert_tz(now(),@@session.time_zone,'+05:30') as exit_time,amount,area,card_number from details_transaction where card_number = '$card_number' AND status= '0' ";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];
//$exit_time = $data['exit_time'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];


}

$results = mysql_query("SELECT * FROM details_transaction where card_number = '$card_number' AND status= 0");
$results1 = mysql_query("SELECT * FROM details_transaction where card_number = '$card_number' AND status= 0 and fine = '1'");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already Fine Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number')";
$update = mysql_query($query);

$query1 = "UPDATE details_transaction SET fine = '1' where card_number = '$card_number'  and status = '0'";
$update1 = mysql_query($query1);

if($update){
$data = array("success" => 1,  "data" => $status , "message" => "Successfully fine details added!" );
}

} 
mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);




}
//if condition stats checked by card number ends here
//else condition stats checked by vehicle number
else if ($card_number == "") {


	$con = mysqli_connect('localhost', 'root', 'letspark123321','gokulam') or die("DB Connection cant be established");

$sql = "select  transaction_id,vehicle_type,vehicle_number,entry_time,convert_tz(now(),@@session.time_zone,'+05:30') as exit_time,amount,area,card_number from details_transaction where vehicle_number = '$vehicle_number' AND status= '0' ";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];
//$exit_time = $data['exit_time'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];


}


$results = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0");
$results1 = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0 and fine = '1'");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already Fine Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "INSERT INTO finedetails (fine_type,fined_amount,card_number,created_at,vehicle_number) VALUES ('$fine_type','$amount','$card_number','$created_at','$vehicle_number')";
$update = mysql_query($query);

$query1 = "UPDATE details_transaction SET fine = '1' where vehicle_number = '$vehicle_number'  and status = '0'";
$update1 = mysql_query($query1);

if($update){
$data = array("success" => 1,  "data" => $status , "message" => "Successfully fine details added!" );
}

} 
mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);




}
//else condition stats checked by vehicle number ends here

else

{

$data = array("success" => 0, "message" => "Error!");

}


?>