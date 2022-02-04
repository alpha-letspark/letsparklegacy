<?php
/* include db.config.php */
// include_once('db_config.php');
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'gokulam','letspark123321') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";


$sql = "SELECT sum(amount) FROM `details_transaction` where userid= '$id'  and status = '0' and flag = '0'";
$result3 = mysqli_query($con,$sql);
$pending_amount=mysqli_fetch_row($result3);

$data = array("result" => 1, "amount_to_be_collected" => $pending_amount);
echo json_encode($data);
header('Content-type: application/json');

?>