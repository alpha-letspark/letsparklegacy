<?php
/* include db.config.php */
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
//$users_android_token= $obj->users_android_token;
$client_id= $obj->client_id;
$transaction_id= $obj->transaction_id;
//$date = date("Y/m/d");
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$date=  date('Y-m-d H:i:s');
$curdate=  date('Y-m-d');



$client_id =$obj->client_id;
$shopowner_id =$obj->shopowner_id;
$amount_redemmed =$obj->amount_redemmed;
$vehicle_type=$obj->vehicle_type;


if ($vehicle_type == "4") {
     $max_amount =  "20";
} else {
     $max_amount =  "10";
}


 $q1 =  mysql_query("select * from details_transaction where transaction_id='$transaction_id' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'") or die(mysql_error());
  while($row2 = mysql_fetch_array($q1)){
 $redid = $row2['redemption_id'];
 $transaction = $row2['transaction_id'];

}

if($transaction_id == $transaction){

  $query = "INSERT INTO redemption_shopowner(client_id,redemption_id,shopowner_id,amount_redemmed,max_amount,redemption_flag,vehicle_type,created_at) VALUES ('$client_id', '$redemption','$shopowner_id', '$amount_redemmed','$max_amount','$redemption_flag','$vehicle_type', '$date' )";
     $insert = mysql_query($query);
  $data = array("success" => 1, "message" => "Successfully Redemption added!" , "amount_redemmed" => "$amount_redemmed", "redemption_id" => "$redid" );
} 


else{

	$data = array("success" => 0, "message" => "Redemption not added");
}



mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>