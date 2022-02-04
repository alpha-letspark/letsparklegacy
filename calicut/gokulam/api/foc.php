<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
//@ini_set('display_errors', 0);
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
$amount = 0;
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$exit_time=  date('Y-m-d H:i:s');



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
$results1 = mysql_query("SELECT * FROM details_transaction where card_number = '$card_number' AND status= 0 and foc = 1");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already FOC Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "UPDATE details_transaction SET amount = '0' , exit_pay = '0' , foc = '1'  ,  remarks = '$remarks' , focuser = '$userid'  where card_number = '$card_number'  and status = '0' ";
$update = mysql_query($query);

if($update){
$data = array("success" => 1,  "data" => $status , "message" => "Successfully updated FOC  details!" );
}

} 
mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);




}
//if condition stats checked by card number ends here
//else condition stats checked by vehicle number
else if ($card_number == "") {

$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

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
$results1 = mysql_query("SELECT * FROM details_transaction where vehicle_number = '$vehicle_number' AND status= 0 and foc = 1");
$count = mysql_num_rows($results);
$count1 = mysql_num_rows($results1);

 if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

 if(mysql_num_rows($results1) >= '1')
{
$data = array("status" => 'Already FOC Added'  );
}

else if(mysql_num_rows($results) == '1'){


$query = "UPDATE details_transaction SET amount = '0' , exit_pay = '0' , foc = '1'  ,  remarks = '$remarks'  where vehicle_number = '$vehicle_number'  and status = '0' ";
$update = mysql_query($query);

if($update){
$data = array("success" => 1,  "data" => $status , "message" => "Successfully updated FOC  details!" );
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