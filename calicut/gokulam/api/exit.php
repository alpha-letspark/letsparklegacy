<?php
function computeAmountFour($entryTime, $exitTime) {
  //Calculating time spent in hour by vehicle.
  $durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
        $durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
  $minDuration = 5;
  $addDuration = $durationInHr - $minDuration;
  $rate = 20;
  
  //If additional hour spent is there, need to add fare for that.
  if( $durationInSec > 0  && $durationInSec <= 4500 ) {
               $amount = 20;
 }

else if ( $durationInSec >= 4500  && $durationInSec <= 8100 ) 
  
  {
         $amount = 30;
  }
  
else if ( $durationInSec >= 8101  && $durationInSec <= 11700 ) 
  
  {
         $amount = 40;
  }

  else if ( $durationInSec >= 11701  && $durationInSec <= 18000 ) 
  
  {
         $amount = 50;
  }
  else if ( $durationInSec >= 18000  && $durationInSec <= 36000 ) 
  
  {
         $amount = 50 + ($addDuration * $rate) ;
  }



else if  ($durationInSec > 36000  && $durationInSec <= 86400 ) {

    $amount = 200 ;
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
  $minDuration = 5;
  $addDuration = $durationInHr - $minDuration;
  $rate = 10;
  
  //If additional hour spent is there, need to add fare for that.
  if($durationInSec < 900) {
               $amount = 0;
 }

else if ( $durationInSec >= 900  && $durationInSec <= 4500 ) 
  
  {
         $amount = 10;
  }
  
else if ( $durationInSec >= 4501  && $durationInSec <= 8100 ) 
  
  {
         $amount = 20;
  }

else if ( $durationInSec >= 8101  && $durationInSec <= 18000 ) 
  
  {
         $amount = 30;
  }

else if ( $durationInSec >= 18001  && $durationInSec <= 36000 ) 
  
  {
         $amount = 60;
  }

else if ( $durationInSec >= 36001  && $durationInSec <= 86400 ) 
  
  {
         $amount = 100;
  }   

  
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
$card_number = $_GET["card_number"];
$vehicle_number = $_GET["vehicle_number"];
$exit_user_id = $_GET["exit_user_id"];
$curdate=  date('Y-m-d');
if(empty($vehicle_number)){
$data = array("status" => "error", "message" => "Not Found");
} else {

$card_number=str_pad(trim($card_number,'"'), 6, '0',STR_PAD_LEFT);

$status_info="init {$card_number }";
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'root', 'letspark123321','gokulam') or die("DB Connection cant be established");
// get user data
//$transaction_id=776296;
$sql = "select transaction_id,vehicle_type,entry_time,exit_time,amount,area from details_transaction where card_number = '$card_number' AND status= 0";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$exit_time =  date('Y-m-d H:i:s');
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
$gstnew = $amt/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amt -$gst;
date_default_timezone_set("Asia/Calcutta");
$exit_time = date('Y-m-d H:i:s');
$durationInHr = ceil((strtotime($exit_time) - strtotime($entry_time))/3600);
//$exit_timetime=strtotime($exit_time);
$status_info="select {$select} {$transaction_id} vehicle type {$vehicle_type} exit time:{$exit_time} {$entry_time} duration {$durationInHr} amount {$initial_amount}";

$con = mysqli_connect('localhost', 'root','letspark123321','mallofmysoredemo') or die("DB Connection cant be established");

$sql="SELECT count(*) as number FROM details_transaction WHERE where card_number = $card_number and status='0'";
  
}}

$results = mysql_query("SELECT * FROM details_transaction where card_number = $card_number AND status= 0");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) == '1')
{
   $updateSql= "UPDATE details_transaction SET status='1',amount='$amount',exit_time='$exit_time' , exit_user_id ='$exit_user_id' , exit_pay ='$amount_due' where card_number = $card_number and status = '0'";
$updateTransaction=mysqli_query($con,$updateSql);
  
}

if ($vehicle_type == 2 ) {
    $amountsurface = 20;
} else {
    $amountsurface = 40;
}



if(mysql_num_rows($results) < '1')
{
$data = array("status" => failed  );
}

else {
//$data = array("status" => success, "data" => $status , "calculatedfinalamount" => $amt,"entry_time"=> $entry_time,"exit_time"=> $exit_time,"vehicle_number" =>"$vehicle_number" , "entrytwoprice" => "10" ,"entryfourprice" => "20" , "count" => "$count" , "gst" => "$gst"  );
  $data = array("status" => success, "data" => $status , "calculatedfinalamount" => $amt,"final_entry_time"=> $entry_time,"final_exit_time"=> $exit_time,"vehicle_number" =>"$vehicle_number" , "count" => "$count" , "gst" => "$gst" , "amount_paid" => "$paid_amount" ,  "amount_due" => "$amount_due",  "price" => "$price" , "area" => "$area"  );

}
//mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>

