<?php
/* include db.config.php */
include_once("db_config.php");
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
// Get user id
$vehicle_number = isset($_GET['vehicle_number']) ? mysql_real_escape_string($_GET['vehicle_number']) : "";
//$location = isset($_GET['location']) ? mysql_real_escape_string($_GET['id']) : "";
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}
$exit_time=  date('Y-m-d H:i:s');

if(empty($vehicle_number)){
$data = array("status" => "error", "message" => "Wrong user id Lets try once again!");
} else {
// get user data
//$sql1 = "select * from  details_transaction where vehicle_number=$vehicle_number";
//$select1 = mysql_query($sql1);
$sql = "UPDATE details_transaction SET exit_time= '$exit_time' and status = '0' where vehicle_number=$vehicle_number";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

$data = array("status" => "success", "exit_time" => $exit_time, "vehicle_number" => $vehicle_number );
}

mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>


