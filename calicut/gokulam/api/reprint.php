<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$curdate=  date('Y-m-d');
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$vehicle_number= $obj->vehicle_number;
$card_number = $obj->card_number;
$date1= date('Y-m-d 03:00:00', strtotime('+1 days'));
//$date1= date('Y-m-d');
// Get user id

if($vehicle_number == "" && $card_number == "")
{
	$data = array("success" => 0, "message" => "Error! Invalid Entry");
}
elseif ($vehicle_number == "" && $card_number != "")
{
	$sql = "SELECT transaction_id,vehicle_number,vehicle_type,entry_time,exit_time,amount ,  ROUND((amount/1.18),2) as price , ROUND((amount - amount/1.18),2) as gst,card_number FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') >= '$curdate' and card_number = '$card_number' and status = 1 ";
	$select = mysql_query($sql);
	$status = array();
	while($data = mysql_fetch_assoc($select)) {
     $amount = $data['amount'];
$amount_due = $amount- $paid_amount;
$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;

$status[] = $data;
}

$data = array("message" => "success", "data" => $status   );
}
elseif ($vehicle_number != "" && $card_number == "")
{
	$sql = "SELECT transaction_id,vehicle_number,vehicle_type,entry_time,exit_time,amount ,  ROUND((amount/1.18),2) as price , ROUND((amount - amount/1.18),2) as gst,card_number FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'  and  vehicle_number= '$vehicle_number' and status = 1 ";
	$select = mysql_query($sql);
	$status = array();
	while($data = mysql_fetch_assoc($select)) {
		     $amount = $data['amount'];
$amount_due = $amount- $paid_amount;
$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;

	$status[] = $data;
}

$data = array("message" => "success", "data" => $status );
}
elseif ($vehicle_number != "" && $card_number != "")
{
	$sql = "SELECT transaction_id,vehicle_number,vehicle_type,entry_time,exit_time,amount , (amount/1.18) as price , (amount - amount/1.18) as gst,card_number FROM details_transaction where DATE_FORMAT(exit_time,'%Y-%m-%d') = '$curdate'  and  card_number = '$card_number' and vehicle_number = '$vehicle_number' and status = 1 ";
	$select = mysql_query($sql);
	$status = array();
	while($data = mysql_fetch_assoc($select)) {
				     $amount = $data['amount'];
$amount_due = $amount- $paid_amount;
$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
	$status[] = $data;
}

$data = array("message" => "success", "data" => $status );
}
/*get user data
$sql = "SELECT * FROM `details_transaction` where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and  vehicle_number= '$vehicle_number' or card_number = '$card_number' ";*/



mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>