<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id
//$date = $_GET['date'];
// get user data
$sql = "SELECT card_number,vehicle_number,vehicle_type,entry_time from details_transaction where overnight_parking = '1' order by entry_time DESC";
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