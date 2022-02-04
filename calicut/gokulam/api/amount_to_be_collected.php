<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
error_reporting(0);
@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id
$id = $_GET["id"];

if(empty($id)){
$data = array("status" => "error", "message" => "Not Found");
} else {
// get user data
$sql = "SELECT sum(amount) as amount FROM `details_transaction` where userid= '$id' AND status='0' AND flag=0";
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