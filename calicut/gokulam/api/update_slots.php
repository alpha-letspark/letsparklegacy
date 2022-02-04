<?php
/* include db.config.php */
//include_once('db_config.php');
error_reporting(0);
@ini_set('display_errors', 0);
header('Access-Control-Allow-Origin: *');
$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
$two_wheeler_slot= $obj->two_wheeler_slot;
$four_wheeler_slot= $obj->four_wheeler_slot;

error_reporting(0);
@ini_set('display_errors', 0);
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
//$id = $_POST["id"];
//$two_wheeler_slot = $_POST["two_wheeler_slot"];
//$four_wheeler_slot = $_POST["four_wheeler_slot"];

$query = "UPDATE client_settings SET two_wheeler_slot= '$two_wheeler_slot' ,four_wheeler_slot= '$four_wheeler_slot' where id= '1'";
$update = mysqli_query($con,$query);

if($update){
$data = array("result" => 1, "message" => "Successfully slot updated!");
} else {
$data = array("result" => 0, "message" => "Error!");
}
mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>