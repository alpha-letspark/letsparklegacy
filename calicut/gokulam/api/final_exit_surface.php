<?php
function computeAmountFour($entryTime, $exitTime) {
  //Calculating time spent in hour by vehicle.
  $durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
        $durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
  $minDuration = 4;
  $addDuration = $durationInHr - $minDuration;
  $amount = 40;
  //If additional hour spent is there, need to add fare for that.
  return $amount;
}

//$amt = computeAmount('2017-07-15 08:00:00', '2017-07-15 16:01:00', 2, 10, 10);
//echo $amt;
  


?>



<?php

function computeAmountTwo($entryTime, $exitTime) {
  //Calculating time spent in hour by vehicle.
  $durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
    $durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
  $minDuration = 4;
  $addDuration = $durationInHr - $minDuration;
    $amount = 20; 
  return $amount;
}
  


?>

<?php
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);
// Get user id
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$entry=  date('d');
$transaction_id = $_GET["transaction_id"];
$vehicle_number = $_GET["vehicle_number"];
$exit_user_id = $_GET["exit_user_id"];
error_reporting(0);
@ini_set('display_errors', 0);
if(empty($transaction_id)){
$data = array("status" => "error", "message" => "Not Found");
} else {

$transaction_id=str_pad(trim($transaction_id,'"'), 6, '0',STR_PAD_LEFT);

$status_info="init {$transaction_id }";
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
// get user data
//$transaction_id=776296;
$sql = "select transaction_id,vehicle_type,entry_time,exit_time,amount from details_transaction where transaction_id = $transaction_id";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$exit_time =  date('Y-m-d H:i:s');
$vehicle_number = $_GET["vehicle_number"];
$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];
if( ($vehicle_type=="two_wheeler") ||($vehicle_type=="2") ){
$amt = computeAmountTwo($entry_time, $exit_time);
}
else{
$amt = computeAmountFour($entry_time, $exit_time);
}

$amount = $amt;
$amount_due = $amt- $paid_amount;
$gst = 0.18*$amt;
date_default_timezone_set("Asia/Calcutta");
$exit_time = date('Y-m-d H:i:s');
$durationInHr = ceil((strtotime($exit_time) - strtotime($entry_time))/3600);
//$exit_timetime=strtotime($exit_time);
$status_info="select {$select} {$transaction_id} vehicle type {$vehicle_type} exit time:{$exit_time} {$entry_time} duration {$durationInHr} amount {$initial_amount}";

$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");

$updateSql= "UPDATE details_transaction SET status='1',amount='$amount',exit_time='$exit_time' , exit_user_id ='$exit_user_id' , exit_pay ='$amount_due'   where transaction_id = $transaction_id";
$updateTransaction=mysqli_query($con,$updateSql);
//$status_info="{$transaction_id} exit time:{$exit_time} {$entry_time} duration {$durationInHr} updateStatus {$updateTransaction} {$updateSql}";
if($updateTransaction){
$api_status="success";
}
else{
$api_status="failed";
}
mysqli_close($con);

}


$data = array("status" => success, "data" => $status , "calculatedfinalamount" => $amt,"final_entry_time"=> $entry_time,"final_exit_time"=> $exit_time,"vehicle_number" =>"$vehicle_number" , "gst" => "$gst" ,"amount_paid" => "$paid_amount" ,  "amount_due" => "$amount_due" );
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>


