<?php
/* include db.config.php */
// include_once('db_config.php');
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
if (function_exists('date_default_timezone_set'))
{
  date_default_timezone_set('Asia/Kolkata');
}

$jsondata = file_get_contents('php://input');
$obj = json_decode($jsondata);
//$x =var_dump(json_decode($obj));
$id= $obj->id;
$status = $obj->status;

$out = array_values($id);
$curdate = date('Y-m-d H:i:s');
$todaydate = date('Y-m-d', strtotime('-3 days'));
//mysql_connect("localhost","root","root") or die("DB Connection cant be established");
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
//$id = $_POST["id"];

$count = count($id);
if($status == 1)
{
	for($i=0;$i<$count;$i++)
	{
		$vop_udate = $id[$i];
	$query = "UPDATE details_transaction SET  overnight_parking = '1' ,  updated_at = '$curdate' where card_number = '$vop_udate' ";
	$update = mysqli_query($con,$query);

	}
}
elseif ($status == 2) {
	for($i=0;$i<$count;$i++)
	{
		$vop_udate = $id[$i];
	$query = "UPDATE details_transaction SET status='1' ,manual_vop_update = '1' ,  updated_at = '$curdate' where card_number = '$vop_udate' ";
	$update = mysqli_query($con,$query);

	}
}
else
{
	for($i=0;$i<$count;$i++)
	{
		$vop_udate = $id[$i];
	$query = "UPDATE details_transaction SET status='1' ,card_loss = '1' ,  updated_at = '$curdate' where card_number = '$vop_udate' ";
	$update = mysqli_query($con,$query);

	}
}


if($update){
$data = array("result" => 1, "message" => "Successfully Updated VOP" , "choice" => $status );
} else {
$data = array("result" => 0, "message" => "Error!");
}

mysqli_close($con);
/* JSON Response */

header('Content-type: application/json');
echo json_encode($data);

?>