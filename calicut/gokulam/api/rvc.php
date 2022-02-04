<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");
$curdate=  date('Y-m-d');

// Get user id
$vehicle_number = $_GET['vehicle_number'];
// get user data
$sql = "SELECT * FROM `details_transaction` WHERE vehicle_number = '$vehicle_number'  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate'";
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