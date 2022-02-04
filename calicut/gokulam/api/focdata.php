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


$data = array("success" => 1,  "data" => $status  );
 

mysql_close($conn);
header("Content-type: application/json");
echo json_encode($data);


?>