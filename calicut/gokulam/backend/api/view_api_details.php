<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id
$card_number = $_GET['card_number'];
// get user data
$sql = "SELECT * FROM `details_transaction` WHERE card_number = '$card_number' and foc = '1' and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
	//$vec_final = $data['original_vehicle_number'];
	//$str1 = substr($vec_final, 9); 
$status[] = $data;
}

 

$data = array("status" => "success", "data" => $status  );


mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>