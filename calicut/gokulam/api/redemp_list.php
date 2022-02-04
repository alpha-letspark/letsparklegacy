<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);

// Get user id
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

if(!empty($id)){
$data = array("status" => "error", "message" => "Wrong user id Lets try once again!");
} else {
// get user data
$sql = "SELECT redemption_shopowner.redemption_id,details_transaction.transaction_id, redemption_shopowner.amount_redemmed,redemption_shopowner.vehicle_type, 
redemption_shopowner.created_at  FROM `redemption_shopowner` INNER JOIN details_transaction where redemption_shopowner.redemption_id = details_transaction.redemption_id";
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