<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$curdate=  date('Y-m-d');
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";
$sql = "SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = 0 and vehicle_type = 2";
$result3 = mysqli_query($con,$sql);
$two_wheeler_in_premises=mysqli_fetch_row($result3);

$sql1 = "SELECT COUNT(transaction_id) as statu FROM  details_transaction where DATE_FORMAT(entry_time,'%Y-%m-%d') = '$curdate' and status = 0 and vehicle_type = 4";
$result4 = mysqli_query($con,$sql1);
$four_wheeler_in_premises=mysqli_fetch_row($result4);



$query1 = "select count(id) as two_wheeler_slot from details_transaction where vehicle_type = '2' and status ='1'";
$result1 = mysqli_query($con,$query1);
$two_wheeler_slot=mysqli_fetch_row($result1);

if($result1){

$query2 = "select count(id) as four_wheeler_slot from details_transaction where vehicle_type = '4' and status ='1'";
$result2 = mysqli_query($con,$query2);
$four_wheeler_slot=mysqli_fetch_row($result2);
$data = array("result" => 1, "two_wheeler_in_premises" => $two_wheeler_in_premises ,"four_wheeler_in_premises" => $four_wheeler_in_premises );
} else {
$data = array("result" => 0, "message" => "Error!");
}

mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>