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
$vehicle_number = $_GET['vehicle_number'];
$card_number = $_GET['card_number'];
$date1= date('Y-m-d 03:00:00', strtotime('+1 days'));
// Get user id

$sql = "SELECT transaction_id,vehicle_number,vehicle_type,entry_time,exit_time,amount , (amount/1.18) as price , (amount - amount/1.18) as gst,card_number FROM details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') >= '$curdate' and card_number = '$card_number' and status = '0' ";
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


if(mysql_num_rows($select) < '1')
{
$data = array("status" => failed  );
}

else 

{

	$data = array("message" => "success", "data" => $status );
}



mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>