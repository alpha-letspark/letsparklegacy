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
               $amount = 10;
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

function computeAmountFourHotel($entryTime, $exitTime) {
	//Calculating time spent in hour by vehicle.
	//$durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
    //$durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
    //$durationInDay = ceil((strtotime($exitTime) - strtotime($entryTime))/60);
	$date1 = strtotime($entryTime);  
	$date2 = strtotime($exitTime);

	$diff = abs($date2 - $date1); 
	$durationInDay = floor($diff/ (60*60*24));
		

	$minDuration = 1;
	$addDuration = $durationInDay - $minDuration;
	$rate = 20;
	


	//If additional hour spent is there, need to add fare for that.
	if($durationInDay == 1) {
               $amount = 20;
 }

/*else if ( $durationInDay > 1  && $durationInDay <= 2 ) 
	
	{
         $amount = 40;
	}
	
*/	else 
	
	{
         $amount = $durationInDay * 20 ;
	}
		

	
	return $amount;
}
  


?>



<?php

function computeAmountTwoHotel($entryTime, $exitTime) {
	//Calculating time spent in hour by vehicle.
	//$durationInHr = ceil((strtotime($exitTime) - strtotime($entryTime))/3600);
    //$durationInSec = ceil(strtotime($exitTime) - strtotime($entryTime));
    $date1 = strtotime($entryTime);  
	$date2 = strtotime($exitTime);

	$diff = abs($date2 - $date1); 
	$durationInDay = floor($diff/ (60*60*24));
		

	$minDuration = 0;
	$addDuration = $durationInDay - $minDuration;
	$rate = 10;
	


	//If additional hour spent is there, need to add fare for that.
	if($durationInDay == 1) {
               $amount = 10;
 }

/*else if ( $durationInDay > 1  && $durationInDay <= 2 ) 
	
	{
         $amount = 40;
	}
	
*/	else
	
	{
         $amount =  $durationInDay * 10;
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
//$transaction_id = $_GET["transaction_id"];
$card_number = $_GET["card_number"];
$exit_user_id = $_GET["exit_user_id"];
$curdate=  date('Y-m-d');
if(empty($card_number)){
$data = array("status" => "error", "message" => "Not Found");
} else {

$transaction_id=str_pad(trim($transaction_id,'"'), 6, '0',STR_PAD_LEFT);

$status_info="init {$transaction_id }";
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
// get user data
//$transaction_id=776296;
$sql = "select transaction_id,vehicle_type,vehicle_number,entry_time,exit_time,amount,area from details_transaction where card_number = '$card_number' AND status= 0";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$initial_amount = $data['amount'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$exit_time =  date('Y-m-d H:i:s');
$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];

///taking card type from card number
 $q2 =  mysql_query("SELECT * FROM  card_details where card_number = '$card_number'") or die(mysql_error());
 $count = mysql_num_rows($q2);
//  echo $q1;
  while($row3 = mysql_fetch_array($q2)){

      $valid_from = $row3['valid_from'];
      $valid_to = $row3['valid_to'];
      $card_type = $row3['type'];
      
  }

if(($card_type =="1" || $card_type =="2" || $card_type =="3" ) && $area == 0)
{
	$amt = 0;
}
elseif (($card_type =="4") && $area == 0)
{
	$amt = computeAmountFour($entry_time, $exit_time);
}
elseif (($card_type =="5") && $area == 0)
{
	$amt = computeAmountTwo($entry_time, $exit_time);
}



elseif (($card_type =="1" || $card_type =="2" || $card_type =="3" ) && $area == 1)
{
	$amt = 0;
}
elseif ($card_type =="4" && $area == 1 )
{
	$amt = 40;
}
elseif ($card_type =="5" && $area == 1 )
{
	$amt = 30;
}

elseif (($card_type =="4") && $area == 2)
{
	$amt = computeAmountFourHotel($entry_time, $exit_time);
}
elseif (($card_type =="5") && $area == 2)
{
	$amt = computeAmountTwoHotel($entry_time, $exit_time);
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

$sql="SELECT count(*) as number FROM details_transaction WHERE  card_number = '$card_number' and status='0'";
	
}}

$results = mysql_query("SELECT * FROM details_transaction where card_number = '$card_number' AND status= '0'");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) == '1')
{
   $updateSql= "UPDATE details_transaction SET status='1',amount='$amount', exit_time='$exit_time' , exit_user_id ='$exit_user_id' , exit_pay ='$amount_due'  where card_number = '$card_number' AND status= 0";
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
//$data = array("status" => success, "data" => $status , "calculatedfinalamount" => $amt,"entry_time"=> $entry_time,"exit_time"=> $exit_time,"card_number" =>"$card_number" , "entrytwoprice" => "10" ,"entryfourprice" => "20" , "count" => "$count" , "gst" => "$gst"  );
	$data = array("status" => success, "data" => $status , "calculatedfinalamount" => $amt,"final_entry_time"=> $entry_time,"final_exit_time"=> $exit_time,"card_number" =>"$card_number" , "count" => "$count" , "gst" => "$gst" , "amount_paid" => "$paid_amount" ,  "amount_due" => "$amount_due",  "price" => "$price" , "area" => "$area" , "vehicle_number" => "$vehicle_number"  );

}
//mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>


