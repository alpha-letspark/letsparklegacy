<?php
function computeAmountFour($entryTime, $exitTime) {
	//Calculating time spent in hour by vehicle.
	$durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
        $durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
	$minDuration = 4;
	$addDuration = $durationInHr - $minDuration;
	$rate = 10;
	
	//If additional hour spent is there, need to add fare for that.
	if($durationInSec < 900) {
               $amount = 0;
 }

else if ( $durationInSec >= 900  && $durationInSec <= 7200 ) 
	
	{
         $amount = 20;
	}
	
else if ( $durationInSec >= 7200  && $durationInSec <= 14400 ) 
	
	{
         $amount = 30;
	}


else if  ($durationInSec > 14400) {

		$amount = 30 + ($addDuration * $rate) ;
	}
	
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
	$rate = 10;
	
	//If additional hour spent is there, need to add fare for that.
	if($durationInSec < 900) {
               $amount = 0;
 }

else if ( $durationInSec >= 900  && $durationInSec <= 7200 ) 
	
	{
         $amount = 10;
	}
	
else if ( $durationInSec >= 7200  && $durationInSec <= 14400 ) 
	
	{
         $amount = 20;
	}


else if  ($durationInSec > 14400) {

		$amount = 20 + ($addDuration * $rate) ;
	}
	
	return $amount;
}
  


?>


<?php
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");
// Get user id
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$entry=  date('d');
//$transaction_id = $_GET["transaction_id"];
$vehicle_number = $_GET["vehicle_number"];
if(empty($vehicle_number)){
$data = array("status" => "error", "message" => "Not Found");
} else {

$transaction_id=str_pad(trim($transaction_id,'"'), 6, '0',STR_PAD_LEFT);

$status_info="init {$transaction_id }";
$con = mysqli_connect('localhost', 'focusnewdemo', 'focusnewdemo123321','mallofmysore') or die("DB Connection cant be established");
// get user data
//$transaction_id=776296;
$sql = "select transaction_id,vehicle_type,entry_time,exit_time,amount from details_transaction where vehicle_number = $vehicle_number";

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
$status[] = $data;
$vehicle_type = $data['vehicle_type'];
if( ($vehicle_type=="two_wheeler") ||($vehicle_type=="2") ){
$amt = computeAmountTwo($entry_time, $exit_time);
}
else{
$amt = computeAmountFour($entry_time, $exit_time);
}

$amount = $amt;
date_default_timezone_set("Asia/Calcutta");
$exit_time = date('Y-m-d H:i:s');
$durationInHr = ceil((strtotime($exit_time) - strtotime($entry_time))/3600);
//$exit_timetime=strtotime($exit_time);
$status_info="select {$select} {$transaction_id} vehicle type {$vehicle_type} exit time:{$exit_time} {$entry_time} duration {$durationInHr} amount {$initial_amount}";

$con = mysqli_connect('localhost', 'focusnewdemo', 'focusnewdemo123321','focusnewdemo') or die("DB Connection cant be established");

$updateSql= "UPDATE details_transaction SET status='1',amount='$amount',exit_time='$exit_time'  where vehicle_number = $vehicle_number";
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


$entrytwoprice = 10;
$entryfourprice = 20;
$data = array("status" => success, "data" => $status , "amount" => $amt,"entry_time"=> $entry_time,"exit_time"=> $exit_time,"vehicle_number" =>"$vehicle_number" , "entrytwoprice" => "10" ,"entryfourprice" => "20" );
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>


