<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');

// Get user id
$shopowner_id = $_GET['shopowner_id'];
$date1 = $_GET['date1'];
$date2 = $_GET['date2'];


if(empty($shopowner_id)){
$data = array("status" => "error", "message" => "Wrong user id Lets try once again!");
} else {
// get user data
$sql = "SELECT COUNT(card_number) as redemptions, sum(amount_redemmed) as amount, DATE_FORMAT(created_at,'%Y-%m-%d') as created_at FROM `redemption_shopowner` where DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and shopowner_id = $shopowner_id GROUP by DATE_FORMAT(created_at,'%Y-%m-%d') ";

//$sql = "SELECT COUNT(card_number) as redemptions, sum(amount_redemmed) as amount, created_at FROM `redemption_shopowner`  GROUP by created_at and shopowner_id = $shopowner_id";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

$data = array("status" => "success", "data" => $status);
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>