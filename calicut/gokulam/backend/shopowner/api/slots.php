<?php
/* include db.config.php */
// include_once('db_config.php');
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
header('Access-Control-Allow-Origin: *');
$con = mysqli_connect('localhost', 'letspark', 'letspark123321','letspark') or die("DB Connection cant be established");
$id = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) : "";
$sql = "select two_wheeler_slot from client_settings";
$result3 = mysqli_query($con,$sql);
$org_slots=mysqli_fetch_row($result3);

$sql1 = "select four_wheeler_slot  from client_settings";
$result4 = mysqli_query($con,$sql1);
$org_slots1=mysqli_fetch_row($result4);



$query1 = "select count(id) as two_wheeler_slot from details_transaction where vehicle_type = '2' and status ='1'";
$result1 = mysqli_query($con,$query1);
$two_wheeler_slot=mysqli_fetch_row($result1);

if($result1){

$query2 = "select count(id) as four_wheeler_slot from details_transaction where vehicle_type = '4' and status ='1'";
$result2 = mysqli_query($con,$query2);
$four_wheeler_slot=mysqli_fetch_row($result2);
$data = array("result" => 1, "two_wheeler_slot_occupied" => $two_wheeler_slot ,"four_wheeler_slot_occupied" => $four_wheeler_slot, "two_wheeler_slot_capacity" =>$org_slots, "four_wheeler_slot_capacity" =>$org_slots1 );
} else {
$data = array("result" => 0, "message" => "Error!");
}

mysqli_close($con);
/* JSON Response */
header('Content-type: application/json');
echo json_encode($data);

?>