<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id
$curdate =  date('Y-m-d');
$card_number = $_GET['card_number'];
// get user data
$sql = "DELETE from details_transaction where card_number = $card_number and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' ";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

 

$data = array("status" => "success", "message" => "successfully deleted" );


mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>