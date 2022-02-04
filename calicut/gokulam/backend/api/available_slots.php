<?php
/* include db.config.php */
// include_once('db_config.php');
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('localhost', 'letspark', 'letspark123321','letspark') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";

$query1 = "select count(id) as two_wheeler_slot from details_transaction where vehicle_type = '2' and extra ='1'";
$result1 = mysqli_query($con,$query1);
$two_wheeler_slot=mysqli_fetch_row($result1);

if($result1){

$query2 = "select count(id) as four_wheeler_slot from details_transaction where vehicle_type = '4' and extra ='1'";
$result2 = mysqli_query($con,$query2);
$four_wheeler_slot=mysqli_fetch_row($result2);
$data = array("result" => 1, "two" => $two_wheeler_slot ,"four" => $four_wheeler_slot);
} else {
$data = array("result" => 0, "message" => "Error!");
}
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>