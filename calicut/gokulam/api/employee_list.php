<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
//error_reporting(0);
//@ini_set('display_errors', 0);
include_once("db_config.php");

// Get user id

// get user data
$sql = "SELECT id,name from cms_users";
$select = mysql_query($sql);
$status = array();
while($data = mysql_fetch_assoc($select)) {
$status[] = $data;
}

$data = array("status" => "success", "data" => $status);


mysql_close($conn);
/* JSON Response */
header("Content-type: application/json");
echo json_encode($data);

?>
