<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysoredemo') or die("DB Connection cant be established");
//$id = $_POST["id"];
$card_number = $_POST["card_number"];
$amount = $_POST["amount"];
$vehicle_type = $_POST["vehicle_type"];
$employee_id = $_POST["employee_id"];
$recharge_date = $_POST["recharge_date"];

$query = "INSERT INTO recharge_details (card_number,amount,vehicle_type,employee_id,recharge_date) VALUES ('$card_number','$amount','$vehicle_type','$employee_id','$amount')";
$update = mysqli_query($con,$query);

if(!$update){
$data = array("result" => 1, "message" => "Successfully slot updated! id:{$id} two:{$two_wheeler_slot} 4_wheeler_slot {$four_wheeler_slot}");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>