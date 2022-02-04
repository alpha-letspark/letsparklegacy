<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
//$users_android_token= $obj->users_android_token;
$client_id= $obj->client_id;
$card_number= $obj->card_number;
//$date = date("Y/m/d");
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');  
}
$date=  date('Y-m-d H:i:s');

if ($card_number >= "2000" and $card_number <= "2999" ) {
  $vehicle_type = 2;
} else {
  $vehicle_type = 4;
}



$client_id =$obj->client_id;
$shopowner_id =$obj->shopowner_id;
$amount_redemmed =$obj->amount_redemmed;
$redemption_flag =$obj->redemption_flag;
//$vehicle_type=$obj->vehicle_type;
$curdate = date('Y-m-d');

if ($vehicle_type == "4") {
     $max_amount =  "20";
} else {
     $max_amount =  "10";
}


$results = mysql_query("SELECT transaction_id, vehicle_type,entry_time, status,redemption_id FROM `details_transaction` where card_number= '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status= '0'");
$count = mysql_num_rows($results);

 if(mysql_num_rows($results) < 1 )

{
 $data = array("status" => false , "message" => "Redemption is not valid"  );  
}


else if(mysql_num_rows($results) == '1'){

	$results = mysql_query("SELECT * FROM redemption_shopowner where card_number= '$card_number' and DATE_FORMAT(created_at,'%Y-%m-%d') = '$curdate'");
	$count = mysql_num_rows($results);

    if(mysql_num_rows($results) >= '1')
    {
    $data = array("status" => false , "message" => "Already redemption Added.."  );
    }

     if(mysql_num_rows($results) < '1')
    {
    	$redemption_flag = '1';
     $query = "INSERT INTO redemption_shopowner(client_id,shopowner_id,amount_redemmed,max_amount,redemption_flag,vehicle_type,created_at,card_number) VALUES ('$client_id','$shopowner_id', '$amount_redemmed','$max_amount','$redemption_flag','$vehicle_type', '$date', '$card_number' )";
$insert = mysql_query($query);
if($insert){
$data = array("success" => 1, "message" => "Successfully Redemption added!" , "amount_redemmed" => "$amount_redemmed");
}

    }




}



mysql_close($conn);
/* JSON Response */
//header("Content-type: application/x-www-urlencoded");
header("Content-type: application/json");
echo json_encode($data);

?>