<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);

// Get user id
$shopowner_id = $_GET["shopowner_id"];

if(empty($shopowner_id)){
$data = array("status" => "error", "message" => "Not Found");
} else {
// get user data
$sql = "SELECT redemption_shopowner.redemption_id,details_transaction.transaction_id, redemption_shopowner.amount_redemmed,redemption_shopowner.vehicle_type, 
redemption_shopowner.created_at  FROM `redemption_shopowner` INNER JOIN details_transaction where redemption_shopowner.redemption_id = details_transaction.redemption_id and redemption_shopowner.shopowner_id = $shopowner_id";  
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