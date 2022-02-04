<?php
header('Access-Control-Allow-Origin: *');
error_reporting(0);
@ini_set('display_errors', 0);
$con = mysqli_connect('database-1.c4wzpvrkob8b.ap-south-1.rds.amazonaws.com', 'admin', 'letspark123321','gokulam') or die("DB Connection cant be established");
$employee_id =  $_GET['employee_id'];
$area =  $_GET['area'];
$date = $_GET['date'];

if ($area == 1 ) {

$sql = "SELECT count(*) as two_wheeler_count from details_transaction where exit_user_id = $employee_id  and DATE_FORMAT(entry_time,'%Y-%m-%d') = '$date' and  vehicle_type = '2' and area = '$area'";
$result3 = mysqli_query($con,$sql);
$two_wheeler_count=mysqli_fetch_row($result3);

echo $two_wheeler_count;

}

else if ($area == 0 ) {


echo "tanaynew" ;

}


?>