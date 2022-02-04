<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$userid= $obj->userid;
//$transaction_id= $obj->transaction_id;
$vehicle_type= $obj->vehicle_type;
$client_id= $obj->client_id;
$vehicle_number= $obj->vehicle_number;
$redemption_id = $obj->redemption_id;
$area = $obj->area;
$card_number = $obj->card_number;
$curdate=  date('Y-m-d');
$flag= 1;
//$status = 0;


$entry_day=  date('dm');    
$entry_time =time();
//echo $entry_day.$entry_time;
$transaction = '';
$characters = array_merge( range('0','9'));
for ($i = 0; $i < 7; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $transaction .= $characters[$rand];

}

//$transaction_id =  $entry_time.$entry_day.$transaction; 
$transaction_id = round(microtime(true)* 1000);

//$last= substr(strip_tags($transaction_id), 10,8);


//$transaction_id = microtime(true) * 10000;

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$entry_time=  date('Y-m-d H:i:s');


if ($vehicle_type == "2" &&  $area == "1"   )  {
$amount = "30"  ;
$status = "1" ;
}
else if ($vehicle_type == "2" &&  $area == "0"   )  { 
$amount = "0";
$status = "0" ;
}
else if ($vehicle_type == "4" &&  $area == "1"   )  { 
$amount = "40"  ;
$status = "1" ;
}
else if ($vehicle_type == "4" &&  $area == "0"   )  { 
$amount = "0";
$status = "0" ;
}



//$date = date("Y/m/d"); // Here we set by default status active.
$gstnew = $amount/1.18;
$gst1 =  0.18*$gstnew;
$gst = round($gst1, 2);
$price = $amount -$gst;
$statusnew = $status;


 $q1 =  mysql_query("SELECT `vehicle_number` , 'status' , 'card_number' FROM details_transaction where card_number = '$card_number'") or die(mysql_error());
 $count = mysql_num_rows($q1);
//  echo $q1;
  while($row2 = mysql_fetch_array($q1)){

      $rep_vec = $row2['vehicle_number'];
      $status = $row2['status'];
      $card =  $row2['card_number'];

  }

 if( $card_number == $row2['card_number'] ){

$data = array("success" => 0, "message" => "Error!" , "vehicle_number" => $rep_vec , "status" => $status );
}


$results = mysql_query("SELECT * FROM card_details where card_number = $card_number and status = '1'");
$count = mysql_num_rows($results);
if(mysql_num_rows($results) < '1')

	{
$data = array("success" => 0, "message" => "Error! Invalid Card or Card not active");
}

$results = mysql_query("SELECT `vehicle_number` , 'status' , 'card_number' FROM details_transaction where card_number = '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = 0 ");
$count = mysql_num_rows($results);
 if(mysql_num_rows($results) >= '1')

	{
$data = array("success" => 0, "message" => "Card is already running" , "vehicle_number" => $rep_vec , "status" => '0');
}



//else if(empty($vehicle_number)){
 //   $data = array("success" => 0, "message" => "Error Empty Vehicle number!");
//}


else {

$query = "INSERT INTO details_transaction (userid,transaction_id,vehicle_type,entry_time,amount,client_id,vehicle_number,redemption_id,flag,status, area,card_number) VALUES ('$client_id','$transaction_id','$vehicle_type','$entry_time','$amount','$client_id','$vehicle_number','$redemption_id','$flag','$statusnew' ,'$area' , '$card_number')";
$insert = mysql_query($query);

$data = array("success" => 1, "message" => "Successfully added transaction details!" , "amount" => $amount , "area" => $area, "price" => $price , "gst" => $gst , "transaction_id" => $transaction_id, "card_number" => $card_number ,  "vehicle_number" => $vehicle_number , "status" => $statusnew);

}

mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>