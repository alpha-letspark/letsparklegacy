<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');

// Get user id
$vehicle_number = $_GET['vehicle_number'];
$card_number = $_GET['card_number'];
// get user data

 if($vehicle_number == "") 
{
$sql = "SELECT transaction_id, vehicle_number, card_number, entry_time,vehicle_type,area from details_transaction where card_number = '$card_number' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = '0'";
}
else 
{
$sql = "SELECT transaction_id, vehicle_number, card_number, entry_time,vehicle_type,area from details_transaction where vehicle_number = '$vehicle_number'  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = '0'";
}
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {

$status[] = $data;
}

 

$data = array("status" => "success", "data" => $status  );


mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>