<?php                                                                                                                                                                                                                                                                                    
/* include db.config.php */
include_once("db_config.php");
error_reporting(0);
@ini_set('display_errors', 0);

// Get user id
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

if(!empty($id)){
$data = array("status" => "error", "message" => "Wrong user id Lets try once again!");
} else {
// get user data
$sql = "select two_wheeler_slot as two_wheeler_slot, four_wheeler_slot  from client_settings";
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