<?php
/* include db.config.php */
// include_once('db_config.php');
//mysql_connect("localhost","mintmall","root") or die("DB Connection cant be established");
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$curdate=  date('Y-m-d');
$shopowner_id = $_GET['shopowner_id'];
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";
$sql = "SELECT COUNT(redemption_id) as count FROM  redemption_shopowner where  shopowner_id = $shopowner_id";
$result3 = mysqli_query($con,$sql);
$total_redemmed_transaction=mysqli_fetch_row($result3);

$sql1 = "SELECT SUM(amount_redemmed) as count FROM  redemption_shopowner where  shopowner_id = $shopowner_id";
$result4 = mysqli_query($con,$sql1);
$total_amount_redemmed=mysqli_fetch_row($result4);

$query1 = "SELECT COUNT(redemption_id) as count FROM  redemption_shopowner where  vehicle_type = '2' and shopowner_id = $shopowner_id";
$result1 = mysqli_query($con,$query1);
$two_wheeler_transaction_redemmed=mysqli_fetch_row($result1);

if($result1){

$query2 = "SELECT COUNT(redemption_id) as count FROM  redemption_shopowner  where vehicle_type = '4'and shopowner_id = $shopowner_id";
$result2 = mysqli_query($con,$query2);
$four_wheeler_transaction_redemmed=mysqli_fetch_row($result2);

$query3 = "SELECT SUM(amount_redemmed) as count FROM  redemption_shopowner  where vehicle_type = '2' and shopowner_id = $shopowner_id";
$result3 = mysqli_query($con,$query3);
$amount_from_two_wheeler=mysqli_fetch_row($result3);

$query4 = "SELECT SUM(amount_redemmed) as count FROM  redemption_shopowner where vehicle_type = '4' and shopowner_id = $shopowner_id";
$result4 = mysqli_query($con,$query4);
$amount_from_four_wheeler=mysqli_fetch_row($result4);



$data = array("result" => 1, "total_redemmed_transaction" => $total_redemmed_transaction ,"total_amount_redemmed" => $total_amount_redemmed, "two_wheeler_transaction_redemmed" =>$two_wheeler_transaction_redemmed, "four_wheeler_transaction_redemmed" =>$four_wheeler_transaction_redemmed ,"amount_from_two_wheeler" =>$amount_from_two_wheeler ,"amount_from_four_wheeler" =>$amount_from_four_wheeler ,   );
} else {
$data = array("result" => 0, "message" => "Error!");
}

mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>