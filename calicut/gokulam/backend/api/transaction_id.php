<?php
header('Access-Control-Allow-Origin: *');
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$entry_time=  date('d');
$transaction = '';
$characters = array_merge( range('0','9'));
for ($i = 0; $i < 4; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $transaction .= $characters[$rand];

$transaction_id =  $entry_time.$transaction; 

//echo $entry_time; echo "hello" ; echo $transaction_id;



$last= substr(strip_tags($transaction_id), 1,4);
//echo $transaction_id;


}
//echo $start;


$data = array( "message" => "Success", "transaction_id" => $last , "transaction_original_id" => $transaction_id);
echo json_encode($data);

header('Content-type: application/json');


?>