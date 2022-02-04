<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");

// Get user id
$id = $_GET["id"];

if(empty($id)){
$data = array("status" => "error", "message" => "Not Found");
} else {
// get user data
$sql = "SELECT * FROM revenuecollect where user_id = $id";
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
