<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

function random_string($length) {
    $key = '';
    //$keys = array_merge(range(0, 9), range('A', 'Z'));
    $keys = array_merge(range(0, 9), range('A', 'Z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}


function random_string1($length) {
    $key = '';
    //$keys = array_merge(range(0, 9), range('A', 'Z'));
    $keys = array_merge(range(0, 9));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }

    return $key;
}
$redemption_id =  random_string1(4);
$entry_day=  date('dm');    
$entry_time =time();
//echo $entry_day.$entry_time;
$transaction = '';
$characters = array_merge( range('0','9'));
for ($i = 0; $i < 7; $i++) {
    $rand = mt_rand(0, count($characters)-1);
    $transaction .= $characters[$rand];

//$transaction_id =  $entry_time.$entry_day.$transaction; 
$transaction_id = round(microtime(true)* 1000)+””+ hexdec(uniqid());

$last= substr(strip_tags($transaction_id), 10,8);
//echo $transaction_id;


}
//echo $start;


$data = array( "message" => "Success", "transaction_id" => $transaction_id , "redemption_id" => $redemption_id );
echo json_encode($data);

header('Content-type: application/json');


?>