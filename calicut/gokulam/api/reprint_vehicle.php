<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

$date = $_GET['date'];
// get user data
$sql = "SELECT id,count,transaction_id,entry_time,card_number,vehicle_number,vehicle_type from details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and status = '1'   and vehicle_type in (2,4 ) order by transaction_id desc  ";
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
