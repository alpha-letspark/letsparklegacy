<?php
/* include db.config.php */
header('Access-Control-Allow-Origin: *'); 
include_once("db_config.php");

// Get user id
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

if(!empty($id)){
$data = array("status" => "error", "message" => "Wrong user id Lets try once again!");
} else {
// get user data
$sql = "SELECT id as employee_id, name, email,id_cms_privileges FROM cms_users";
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