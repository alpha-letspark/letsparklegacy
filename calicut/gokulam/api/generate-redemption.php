<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$curdate=  date('Y-m-d');
$id = isset($_GET['date1']) ? mysql_real_escape_string($_GET['date1']) : "";
$id = isset($_GET['date2']) ? mysql_real_escape_string($_GET['date2']) : "";
$id = isset($_GET['vehicle_type']) ? mysql_real_escape_string($_GET['vehicle_type']) : "";
echo $date1;
$con = mysqli_connect('localhost', 'root', 'letspark123321','mallofmysore') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";
$sql = "SELECT COUNT(redemption_id) as count FROM  redemption_shopowner where  DATE_FORMAT(created_at,'%Y-%m-%d') >= $date1 and DATE_FORMAT(created_at,'%Y-%m-%d') <= $date2 ";
$result3 = mysqli_query($con,$sql);
$total_redemmed_transaction=mysqli_fetch_row($result3);

$sql1 = "SELECT SUM(amount_redemmed) as count FROM  redemption_shopowner where  DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' ";
$result4 = mysqli_query($con,$sql1);
$total_amount_redemmed=mysqli_fetch_row($result4);

$query1 = "SELECT COUNT(redemption_id) as count FROM  redemption_shopowner where  DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and vehicle_type = '2'";
$result1 = mysqli_query($con,$query1);
$two_wheeler_transaction_redemmed=mysqli_fetch_row($result1);

if($result1){

$query2 = "SELECT COUNT(redemption_id) as count FROM  redemption_shopowner where  DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and vehicle_type = '4'";
$result2 = mysqli_query($con,$query2);
$four_wheeler_transaction_redemmed=mysqli_fetch_row($result2);

$query3 = "SELECT SUM(amount_redemmed) as count FROM  redemption_shopowner where  DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and vehicle_type = '2'";
$result3 = mysqli_query($con,$query3);
$amount_from_two_wheeler=mysqli_fetch_row($result3);

$query4 = "SELECT SUM(amount_redemmed) as count FROM  redemption_shopowner where  DATE_FORMAT(created_at,'%Y-%m-%d') >= '$date1' and DATE_FORMAT(created_at,'%Y-%m-%d') <= '$date2' and vehicle_type = '4'";
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