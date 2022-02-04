<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');

// Get user id
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";


if(empty($id)){
$data = array("status" => "error", "message" => "Wrong user id Lets try once again!");
} else {
// get user data
$sql = "SELECT details_transaction.transaction_id,redemption_shopowner.card_number, redemption_shopowner.amount_redemmed,(CASE WHEN redemption_shopowner.redemption_flag= '0' THEN 'Settled' ELSE 'Not Settled' END ) 
as status,  redemption_shopowner.vehicle_type,redemption_shopowner.created_at, redemption_shopowner.redemption_flag
FROM
    redemption_shopowner inner join details_transaction where redemption_shopowner.card_number =
 details_transaction.card_number 
and DATE_FORMAT(redemption_shopowner.created_at,'%Y-%m-%d') = '$curdate' and redemption_shopowner.shopowner_id = $id";
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