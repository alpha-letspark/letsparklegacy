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
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
// get user data
//$transaction_id=776296;
$sql = "select transaction_id,vehicle_type,vehicle_number,entry_time,exit_time,amount,area,card_number from details_transaction where card_number = '$card_number' AND status= 0";

$select = mysql_query($sql);

$status_info="select {$select} {$transaction_id}  {$new_trans_id}";

$status = array();
while($data = mysql_fetch_assoc($select)) {

$entry_time = $data['entry_time'];
$area = $data['area'];
$vehicle_number = $data['vehicle_number'];
$transaction_id = $data['transaction_id'];

if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$exit_time =  date('Y-m-d H:i:s');
$status[] = $data;
$vehicle_type = $data['vehicle_type'];
$paid_amount = $data['amount'];
date_default_timezone_set("Asia/Calcutta");
$exit_time = date('Y-m-d H:i:s');
//$exit_timetime=strtotime($exit_time);
$status_info="select {$select} {$transaction_id}";

$con = mysqli_connect('localhost', 'root','letspark123321','mallofmysoredemo') or die("DB Connection cant be established");

$sql="SELECT count(*) as number FROM details_transaction WHERE  card_number = $card_number and status='0'";
	
}}

$results = mysql_query("SELECT * FROM details_transaction where card_number = $card_number AND status= 0");
$count = mysql_num_rows($results);



if(mysql_num_rows($results) == '0')
{
$data = array("status" => failed , "message" => "card not running"   );
}

else {

$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
$query = "SELECT `transaction_id` FROM details_transaction where card_number = '$card_number' and  DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'  and status= '0' ";
$result = mysqli_query($con, $query);
$row   = mysqli_fetch_row($result);

$transaction_id = $row['transaction_id'];



	$data = array("status" => success,"data" => $status   );

}
//mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>


