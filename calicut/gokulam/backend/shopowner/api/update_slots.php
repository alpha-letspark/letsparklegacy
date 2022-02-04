<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('localhost', 'letspark', 'letspark123321','letspark') or die("DB Connection cant be established");
$id = $_POST["id"];
$two_wheeler_slot = $_POST["two_wheeler_slot"];
$four_wheeler_slot = $_POST["four_wheeler_slot"];

$query = "UPDATE client_settings SET two_wheeler_slot={$two_wheeler_slot},four_wheeler_slot={$four_wheeler_slot} where id={$id}";
$update = mysqli_query($con,$query);

if($update){
$data = array("result" => 1, "message" => "Successfully slot updated! id:{$id} twp:{$two_wheeler_slot} 4_wheeler_slot {$four_wheeler_slot}");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>